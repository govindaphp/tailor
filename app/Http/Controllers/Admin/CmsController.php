<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Policy;
use App\Models\DocumentProd;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;
use DB;
use Hash;


class CmsController extends Controller
{
    public function privacyPolicy(Request $request)
    {
        //This function is for add/update/show the privacy policy
        $privacy = Policy::where('policy_type', 3)->first();
        if ($request->isMethod('post')) 
        {
            
            $policy_content=$request->policy_content;
            if($privacy)
            {
                //Now update the privacy Policy
                DB::table('policy')
                  ->where('policy_type', 3)
                  ->update([
                  'policy_content' => $request->policy_content
              ]);

              Session::flash('message', 'Privacy Policy Updated Sucessfully!');
              return redirect()->to('/admin/privacyPolicy');
            }
            else
            {
                //add the privacy Policy
                $user = new Policy;
				
				$user->policy_content = $request->policy_content;
				$user->policy_type = "3";
				$user->is_active = "1";
				$user->created_at = date('Y-m-d H:i:s');
				$user->save();
				$user_id = $user->policy_id;
				Session::flash('message', 'Policy added Sucessfully!');
	
				return redirect()->to('/admin/privacyPolicy');
            }
        }
        return view('admin.cms.privacy_policy',compact('privacy'));
    }
    public function aboutUs(Request $request)
    {
        //This function is for add/update/show the privacy policy
        $about = Policy::where('policy_type', 2)->first();
        if ($request->isMethod('post')) 
        {
            
            $policy_content=$request->policy_content;
            if($about)
            {
                //Now update the privacy Policy
                DB::table('policy')
                  ->where('policy_type', 2)
                  ->update([
                  'policy_content' => $request->policy_content
              ]);

              Session::flash('message', 'About Us Updated Sucessfully!');
              return redirect()->to('/admin/aboutUs');
            }
            else
            {
                //add the privacy Policy
                $user = new Policy;
				
				$user->policy_content = $request->policy_content;
				$user->policy_type = "2";
				$user->is_active = "1";
				$user->created_at = date('Y-m-d H:i:s');
				$user->save();
				$user_id = $user->policy_id;
				Session::flash('message', 'About Us added Sucessfully!');
	
				return redirect()->to('/admin/aboutUs');
            }
        }
        return view('admin.cms.about_us',compact('about'));
    }
    public function termsConditions(Request $request)
    {
        //This function is for add/update/show the privacy policy
        $terms = Policy::where('policy_type', 1)->first();
        if ($request->isMethod('post')) 
        {
            
            $policy_content=$request->policy_content;
            if($terms)
            {
                //Now update the privacy Policy
                DB::table('policy')
                  ->where('policy_type', 1)
                  ->update([
                  'policy_content' => $request->policy_content
              ]);

              Session::flash('message', 'Terms & Conditions Updated Sucessfully!');
              return redirect()->to('/admin/termsConditions');
            }
            else
            {
                //add the privacy Policy
                $user = new Policy;
				
				$user->policy_content = $request->policy_content;
				$user->policy_type = "1";
				$user->is_active = "1";
				$user->created_at = date('Y-m-d H:i:s');
				$user->save();
				$user_id = $user->policy_id;
				Session::flash('message', 'Terms & Conditions added Sucessfully!');
	
				return redirect()->to('/admin/termsConditions');
            }
        }
        return view('admin.cms.terms_conditions',compact('terms'));
    }
    /**********************************[ VENDOR DOCUMENT START ]**********************************/
    public function listDocument(Request $request)
    {
        //This function is for vendor document list

        $query = DB::table('documents')
                    ->join('vendors', 'documents.vendor_id', '=', 'vendors.vendor_id')
                    ->where('documents.is_deleted', '0')
                    ->select('documents.*', 'vendors.name', 'vendors.last_name', 'vendors.mobile_no');

        
            
        if ($request->input('action') === 'reset') 
        {
            return redirect()->route('listDocument');
        } 
        elseif ($request->input('action') === 'search' || $request->has('page')) 
        {
            
            $first_name     = $request->first_name;
            $mobile_number  = $request->mobile_number;
            $doc_name       = $request->doc_name;
            $doc_status     = $request->doc_status;

            if (!empty($first_name)) {
                $query->where(function ($q) use ($first_name) {
                    $q->where('vendors.name', 'like', '%' . $first_name . '%')
                      ->orWhere('vendors.last_name', 'like', '%' . $first_name . '%')
                      ->orWhere('vendors.username', 'like', '%' . $first_name . '%');
                });
                
            }
    
            if (!empty($mobile_number)) {
                $query->where('vendors.mobile_no', 'like', '%' . $mobile_number . '%');
            }
    
            if (!empty($doc_name)) {
                $query->where('documents.doc_name', 'like', '%' . $doc_name . '%');
            }
    
            if ($doc_status!=3) {
                $query->where('documents.verification_status', '=', $doc_status);
            }
        }
        
        $document = $query->orderBy('documents.id', 'desc')->paginate(10);
       /* $document = DB::table('documents')
						->join('vendors', 'documents.vendor_id', '=', 'vendors.vendor_id')
                        ->where('documents.is_deleted', '0')
						->select('documents.*', 'vendors.name','vendors.last_name','vendors.mobile_no')
                        ->orderBy('documents.id', 'desc')
						->get();*/
                     
                    
        return view('admin.cms.document_list',compact('document'));
    }
    public function deleteDocument($id)
    {
        $result = DB::table('documents')
            ->where('id', $id)
            ->update(['is_deleted' => 1]);

        if ($result > 0) {
            // Successfully updated at least one row
            Session::flash('message', 'Document deleted successfully!');
        } else {
            // No rows updated
            Session::flash('message', 'Failed to delete Document or already deleted.');
        }

        return redirect()->to('/admin/listDocument');
    }
    public function documentStatus(Request $request)
    {
        $result =  DB::table('documents')
                ->where('id', $request->id)
                ->update(
                    ['verification_status' => $request->status]
                );
        if ($result){
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else{
            return response()->json(['success' => false, 'message' => 'Failed to update status']);
        }
    }
    /**********************************[ VENDOR DOCUMENT END ]**********************************/
}