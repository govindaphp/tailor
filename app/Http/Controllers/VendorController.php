<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Session;

class VendorController extends Controller
{
    //
    public function ProfileSetting(){
        $vendorId = Auth::guard('vendor')->user()->vendor_id;
        $data['vendor'] = Vendor::where('vendor_id', $vendorId)->first();
        return view("front/vendor/profilesetting",$data);
    }


    public function profile_update(Request $request)
	{
        $name           = $request->name;
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

        $vendorId = Auth::guard('vendor')->user()->vendor_id;

        $vendor = Vendor::where('vendor_id', $vendorId)->first();
        $vendor->name                   = $name;
        $vendor->email                  = $email;
        $vendor->profile_img            = $imageName;
        $vendor->address                = $address;
        $vendor->save();

        Session::flash('message', 'Profile Update Sucessfully!');
        return redirect()->to('/ProfileSetting');

    }
}
