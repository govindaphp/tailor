<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;
use App\Models\ChatMessage;
use App\Events\MessageSent;
use App\Models\ChatStatus;
use Validator,DB,Mail;
use Carbon\Carbon;

class MerchentChatController extends Controller
{
    public function vendorMessages()
	{
		//This function is for message from vendor
		$vendor_id = auth('vendor')->id();

		$data['user_id'] =  $vendor_id;

		$data['allUsers'] = User::where('is_deleted','0')->get();
		return view('front.vendor.message',$data);
	}
    public function getUser(Request $request){
		$data['customer'] = User::where('id', $request->id)->first();
		$data['merchent'] = Vendor::where('vendor_id', auth('vendor')->id())->first();

		$data['userChats'] = DB::table('chat_msg as c')
                                ->select('c.id as chat_id', 'c.sender_id', 'c.msg','c.created_at','c.is_share_file', 'c.is_link','c.is_meet_in_classroom','c.file_type','c.mime_type','c.is_reply','c.reply_message_id','c.reply_share_message_id','c.is_forward','c.track_duration','c.created_at','users.id','users.profile_image','users.first_name as sender_name','chat_msg_status.receiver_id')
                                ->Join('users', 'users.id', '=', 'c.sender_id')
                                ->Join('chat_msg_status', 'chat_msg_status.chat_msg_id', '=' , 'c.id')
                                ->where('c.sender_id', '=', $data['customer']->id) 
                                ->where('chat_msg_status.receiver_id', '=', $data['merchent']->vendor_id) // take data as merchent receiver_id
                                ->orderBy('chat_id', 'DESC')
                                ->limit(10)
                                ->get()
                                ->reverse();

		$data['merchentChats'] = DB::table('chat_msg as c')  
                                ->select('c.id as chat_id', 'c.sender_id', 'c.msg','c.created_at','c.is_share_file', 'c.is_link','c.is_meet_in_classroom','c.file_type','c.mime_type','c.is_reply','c.reply_message_id','c.reply_share_message_id','c.is_forward','c.track_duration','c.created_at','vendors.vendor_id','vendors.profile_img','vendors.name as sender_name','chat_msg_status.receiver_id')
                                ->Join('vendors', 'vendors.vendor_id', '=', 'c.sender_id')
                                ->Join('chat_msg_status', 'chat_msg_status.chat_msg_id', '=' , 'c.id')
                                ->where('c.sender_id', '=', $data['merchent']->vendor_id) 
                                ->where('chat_msg_status.receiver_id', '=', $data['customer']->id) // take data as customer receiver_id
                                ->orderBy('chat_id', 'DESC')
                                ->limit(10)
                                ->get()
                                ->reverse();

		$mergedChats = $data['merchentChats']->merge($data['userChats'])->sortBy('created_at');
		$data['chats'] = $mergedChats; 
	
		return view('front/vendor/conversation',$data);
	}

	public function merchentMessageSubmit(Request $request){

		$data['customer'] = User::where('id', $request->reciver_id)->first();
		$data['merchent'] = Vendor::where('vendor_id', auth('vendor')->id())->first();

		$my_msg = $request->my_msg;
		$sender_id = $request->sender_id;
		$reciver_id = $request->reciver_id;
		$userTimeZone  = $request->userTimeZone;
		$update_message_id = $request->input('update_message_id');
		$reply_message_id = $request->input('reply_message_id');

		$currentDateTime = Carbon::now($userTimeZone)->format('Y-m-d H:i:s');

		$newChat = new ChatMessage();
		$newChat->sender_id = $sender_id;
		$newChat->msg		= $my_msg;
		$newChat->status	= '1';
		$newChat->created_at = $currentDateTime;
		$newChat->save();
		$newChat_id = $newChat->id;

		$newChatStatus = new ChatStatus();
		$newChatStatus->receiver_id = $reciver_id;
		$newChatStatus->chat_msg_id = $newChat_id;
		$newChatStatus->is_read = 0;
		$newChatStatus->status = 0;
		$newChatStatus->chat_msg_type = 1;
		$newChatStatus->created_at = $currentDateTime;
		$newChatStatus->save();
		$newChatStatus_id = $newChatStatus->id;

		$time = Carbon::now($userTimeZone)->format('h:i A');

		$data = [
			'msg' =>$my_msg,
			'newChat_id' =>$newChat_id,
			'sender_id' =>$sender_id,
			'profile_image' => $data['merchent']->profile_image,
			'name' => $data['merchent']->first_name,
			'time' => $time,
		];

		event(new MessageSent($data));

		$data['customer'] = User::where('id', $request->reciver_id)->first();
		$data['merchent'] = Vendor::where('vendor_id', auth('vendor')->id())->first();

		$grpmsgs = DB::table('chat_msg as c')
					->select('c.id as chat_id', 'c.sender_id', 'c.msg','c.created_at','c.is_share_file', 'c.is_link','c.is_meet_in_classroom','c.file_type','c.mime_type','c.is_reply','c.reply_message_id','c.reply_share_message_id','c.is_forward','c.track_duration','vendors.vendor_id','vendors.profile_img','vendors.name as sender_name')
					->Join('vendors', 'vendors.vendor_id', '=', 'c.sender_id')
					->Join('chat_msg_status', 'chat_msg_status.chat_msg_id', '=' , 'c.id')
					->where('c.sender_id', '=', $data['merchent']->vendor_id) 
					->where('chat_msg_status.receiver_id', '=', $reciver_id)
					->orderBy('chat_id', 'DESC')
					->first();

					
		$html = '<div class="chat-message d-flex justify-content-end mb-3">
			<div class="message-content text-end">
				<div class="message-bubble bg-primary text-white p-2 rounded">';
		
		if (!empty($grpmsgs)) {

				$html .= '<p class="mb-0">' . $grpmsgs->msg . '<br><span>' . \Carbon\Carbon::parse($grpmsgs->created_at)->format('h:i A') . '</span></p>';

		}
	
		$html .= '</div>
			</div>
			<div class="message-avatar ms-3">
				<img src="' . (empty($data['merchent']->profile_image) ? 'https://via.placeholder.com/40' : url('/public/admin/uploads/user/' . $data['merchent']->profile_image)) . '" alt="Sender Avatar" class="rounded-circle">
			</div>
		</div>';
		
		return response()->json([
			'status' => 'success',
			'html' => $html
		]);
	}

}
