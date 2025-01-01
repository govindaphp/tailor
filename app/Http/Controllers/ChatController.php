<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator,
    DB;
use App\Models\User;
use App\Models\ChatMessage;
use App\Models\ChatStatus;
use App\Models\Vendor;
use App\Models\Conversation;

use Illuminate\Validation\Rule;
use Session;
use Exception;
use File;
use App\Libraries\BigBlueButton;
use ZipArchive;
use Hash;
use Artisan;
use App\Helpers\Helper;
use App\Events\MessageSent;
use App\Events\Myevent;
use Carbon\Carbon;
use App\memberShool;
use App\chatGroup;
use App\chatMsg;
use VideoThumbnail;

use FFMpeg;
use Config;

class ChatController extends Controller 
{
    public function message()
    {
		$vendor_id 		= request('vendor_id');
		$customer_id 	= request('customer_id');
		$user_id	 	= auth('user')->id();
		$check=Conversation::where('customer_id', $customer_id)->where('vendor_id', $vendor_id)->first();
		if(!$check)
		{
			$conv = new Conversation;
			$conv->customer_id = auth('user')->id();
			$conv->vendor_id = $vendor_id;
			$conv->created_at = date('Y-m-d H:i:s');
			$conv->save();
		}

        $data['user_id'] =  $user_id;
		$data['allMerchecnts'] = DB::table('conversations')
								->join('vendors', 'conversations.vendor_id', '=', 'vendors.vendor_id')
								->where('conversations.customer_id', $customer_id)
								->select('vendors.*')
								->get();

        
  
        return view('front.user.message',$data);
  
      }
      public function getMerchent(Request $request){
		$data['customer'] = User::where('id', auth('user')->id())->first();
		$data['merchent'] = Vendor::where('vendor_id', $request->id)->first();
		$data['merchentChats'] = DB::table('chat_msg as c')  
		->select('c.id as chat_id', 'c.sender_id', 'c.msg','c.created_at','c.is_share_file', 'c.is_link','c.is_meet_in_classroom','c.file_type','c.mime_type','c.is_reply','c.reply_message_id','c.reply_share_message_id','c.is_forward','c.track_duration','c.created_at','users.id','users.profile_image','users.first_name as sender_name','chat_msg_status.receiver_id')
		->Join('users', 'users.id', '=', 'c.sender_id')
		->Join('chat_msg_status', 'chat_msg_status.chat_msg_id', '=' , 'c.id')
		->where('c.sender_id', '=', $data['merchent']->vendor_id) 
		->where('chat_msg_status.receiver_id', '=', $data['customer']->id) // take data as customer receiver_id
		->orderBy('chat_id', 'DESC')
		->limit(10)
		->get()
		->reverse();

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

		$mergedChats = $data['merchentChats']->merge($data['userChats'])->sortBy('created_at');


		$data['chats'] = $mergedChats; 
		
		
		return view('front/user/conversation',$data);
	}
    public function userMessageSubmit(Request $request){
		$data['customer'] = User::where('id', auth('user')->id())->first();
		$data['merchent'] = Vendor::where('vendor_id', $request->reciver_id)->first();
        
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
			'profile_image' => $data['customer']->profile_image,
			'name' => $data['customer']->first_name,
			'time' => $time,
		];

		event(new MessageSent($data));

        $data['customer'] = User::where('id', auth('user')->id())->first();
		$data['merchent'] = Vendor::where('vendor_id', $request->reciver_id)->first();

		$userChat = DB::table('chat_msg as c')
                    ->select('c.id as chat_id', 'c.sender_id', 'c.msg','c.created_at','c.is_share_file', 'c.is_link','c.is_meet_in_classroom','c.file_type','c.mime_type','c.is_reply','c.reply_message_id','c.reply_share_message_id','c.is_forward','c.track_duration','users.id','users.profile_image','users.first_name as sender_name')
                    ->Join('users', 'users.id', '=', 'c.sender_id')
                    ->Join('chat_msg_status', 'chat_msg_status.chat_msg_id', '=' , 'c.id')
                    ->where('chat_msg_status.receiver_id', '=', $data['merchent']->vendor_id)
                    ->orderBy('chat_id', 'DESC')
                    ->first();

		
		$html = '<div class="chat-message d-flex justify-content-end mb-3">
			<div class="message-content text-end">
				<div class="message-bubble bg-primary text-white p-2 rounded">';
		
		if (!empty($userChat)) {

				$html .= '<p class="mb-0">' . $userChat->msg . '<br><span>' . \Carbon\Carbon::parse($userChat->created_at)->format('h:i A') . '</span></p>';

		}
	
		$html .= '</div>
			</div>
			<div class="message-avatar ms-3">
				<img src="' . (empty($data['customer']->profile_image) ? 'https://via.placeholder.com/40' : url('/public/admin/uploads/user/' . $data['customer']->profile_image)) . '" alt="Sender Avatar" class="rounded-circle">
				<p>'.$data['customer']->first_name.'</p>
			</div>
		</div>';

		return response()->json([
			'status' => 'success',
			'html' => $html
		]);
	


    }

}

