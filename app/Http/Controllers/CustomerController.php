<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class CustomerController extends Controller
{
    //
    public function ProfileSetting(){
        $data['customer'] = User::where('id', auth('user')->id())->first();
        return view("front/user/profilesetting",$data);
    }


    public function profile_update(Request $request)
	{
        $first_name     = $request->first_name;
        $last_name      = $request->last_name;
        $email          = $request->email;
        $gender         = $request->gender;
        $img            = $request->img;
        $address        = $request->address;

        if($img){
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('upload'), $imageName);
        }else{
            $imageName = $request->old_image;
        }




        $customer = User::where('id', auth('user')->id())->first();
        $customer->first_name             = $request->first_name;
        $customer->last_name              = $request->last_name;
        $customer->email_id               = $request->email;
        $customer->gender                 = $request->gender;
        $customer->profile_image          = $imageName;
        $customer->address                = $address;
        $customer->save();

        Session::flash('message', 'Profile Update Sucessfully!');
        return redirect()->to('/ProfileSetting');

    }
}
