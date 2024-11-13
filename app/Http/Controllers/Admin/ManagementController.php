<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DocumentProd;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;
use DB;


class ManagementController extends Controller
{

    public function customer_list(){
        $user_list = User::all();
        // echo "<pre>"; print_r($user_list);die;
        $user_list = User::orderBy('id', 'desc')->get();
        return view('admin.user_mgmt.customer_list',compact('user_list'));
        // return view('admin.user_mgmt.customer_list');
    }

    public function customerForm(){
        // echo "test";die;
        return view('admin.user_mgmt.customer_form');
      }

      public function customerFormAction(Request $request)
      {
        //   print_r($request->all());die;
          // dd($request);
          $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',

            'mobile_number' => 'required|string',
            'user_address' => 'nullable|string',
        ]);

          $request->all();
          $id = $request->id;
          if($id==0){
            // echo "test";die;
                if ($request->hasFile('profile_image')) {
                  $image = $request->file('profile_image');
                  $imageName = "cus".time().'.'.$image->getClientOriginalExtension();
                  $image->move(public_path('/admin/uploads/user'), $imageName);
              }
            //   $user = Auth::guard("customer")->user();
              $user = new User;
              $user->first_name = trim($request->first_name);
              $user->last_name = trim($request->last_name);
              $user->email_id = $request->email_id;
              $user->profile_image = $imageName;
              $user->gender = $request->gender;
              $user->customer_type = $request->customer_type;
              $user->mobile_number = $request->mobile_number;
              $user->password = $request->password;
              $user->user_address = $request->user_address;
              $user->user_city = $request->user_city;
              $user->user_states = $request->user_states;
              $user->user_zipcode = $request->user_zipcode;
              $user->user_country = $request->user_country;
              $user->user_youtube = $request->user_youtube;
              $user->user_facebook = $request->user_facebook;
              $user->user_twitter = $request->user_twitter;
              $user->user_status = "1";
              $user->save();
              $user_id = $user->id;
              Session::flash('message', 'User Inserted Sucessfully!');

              return redirect()->to('/admin/customer-list');

          }
          else{
            // echo "test";die;

            $user = User::find($id);

            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $imageName = "cus" . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/admin/uploads/user'), $imageName);
            } else {
                $imageName = $user->profile_image;  // Retain existing image if no new image is uploaded
            }


           DB::table('users')
                  ->where('id', $id)
                  ->update([
                  'first_name' => trim($request->first_name),
                  'last_name' => trim($request->last_name),
                  'email_id' => $request->email_id,
                  'profile_image' => $imageName,
                  'gender' => $request->gender,
                  'customer_type' => $request->customer_type,
                  'mobile_number' => $request->mobile_number,
                  'password' => $request->password,
                  'user_address' => $request->user_address,
                  'user_city' => $request->user_city,
                  'user_states' => $request->user_states,
                  'user_zipcode' => $request->user_zipcode,
                  'user_country' => $request->user_country,
                  'user_youtube' => $request->user_youtube,
                  'user_facebook' => $request->user_facebook,
                  'user_twitter' => $request->user_twitter,
                //   'photo'=> $imageName,
                //   'description'  => trim($request->description),
              ]);

              Session::flash('message', 'User Updated Sucessfully!');
              return redirect()->to('/admin/customer-list');
          }
      }

      public function customerStatus(Request $request)
      {

          $user = User::find($request->id);
          $user->user_status = $request->status;
          if ($user->save()) {
              session()->flash('success', 'Status updated successfully');
              return response()->json(['success' => true]);
          } else {
              session()->flash('error', 'Status not updated');
              return response()->json(['success' => false]);
          }
      }
      public function delete_user_list($id){
        // $id = base64_decode($id);
       //  print_r($id);die;
            $user = User::find($id);
            $user->delete();
            // $course = DigitalMedias::find($id);
            if ($user) {
               //  session()->flash('success','User Delete successfully');
                Session::flash('message', 'User Deleted Successfully!');
            } else {
                Session::flash('error', 'User not found or could not be deleted!');
            }
            return Redirect('admin/customer-list');
   }

   public function customer_edit($id = ""){
    //  print_r($id);die;
    $user_detail = User::find($id);
    // echo "<pre>";print_r($user_detail);die;
    return view('admin.user_mgmt.customer_edit',compact('user_detail'));

}

   public function customer_view($id = ""){
    //  print_r($id);die;
    $user_detail = User::find($id);
    // echo "<pre>";print_r($user_detail);die;
    return view('admin.user_mgmt.customer_view',compact('user_detail'));

}

public function checkEmailuser(Request $request) {
    // print_r($request);die;
    $email = $request->input('email_id');
    $user = User::where('email_id', $email)->first();

    if($user){
        echo  "false" ;

    }else{
        echo  "true";
     }

}


//Old project data
    public function user_list(){
        // $user_list = User::all();
        $user_list = User::orderBy('id', 'desc')->get();
    //    echo "<pre>"; print_r($user);die;
        return view('admin.student_mgmt.student_list',compact('user_list'));
    }



    public function user_editaction(Request $request)
{
    // print_r($request->all());die;

    $adduser = User::find($request->sid);
    // print_r($adduser);die;
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
    ]);


    $adduser->name = $request->name;
    $adduser->last_name = $request->last_name;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('assets/images/user'), $imageName);
        $adduser->profile_image = $imageName;
    }

    $adduser->email = $request->email;
    $adduser->country_of_study = $request->country_of_study;
    $adduser->institution = $request->institution;
    $adduser->education = $request->education;
    $adduser->academic_year = $request->academic_year;
    $adduser->dob = $request->dob;
    $adduser->title_shop = $request->title_shop;
    $adduser->description_store = $request->description_store;
    $adduser->status = "1";

    $adduser->save();

    // Redirect to the user list page
    return redirect('/admin/user-list')->with('success',"Student Profile has been updated successfully");
}


  public function studentview($id){

    $user_detail = User::find($id);

    return view('admin.student_mgmt.student_view',compact('user_detail'));
 }



   public function studyMaterial(){

    // $user_list = User::all();
    $user_list = User::orderBy('id', 'desc')->get();
    //    echo "<pre>"; print_r($user);die;
        // return view('admin.student_mgmt.student_list',compact('user_list'));
      return view('admin.document_mgmt.student_list_material',compact('user_list'));
   }

   public function documentList($id){
    //  print_r($request->all());die;

    // $user_list = User::all();
    $document_list = DocumentProd::orderBy('id', 'desc')->where('user_id',$id)->get();

      return view('admin.document_mgmt.document_list',compact('document_list','id'));
   }
   public function addDocument(Request $request){
       $id = $request->id;
    //    echo $id;die;
      return view('admin.document_mgmt.add_document');
   }
   public function addDocumentAction(Request $request)
   {
       // Validate the request
       $request->validate([
           'title' => 'required|string|max:255',
           'language' => 'required|string|max:255',
           'main_document' => 'required|mimes:pdf|max:10000',
           'preview_document' => 'nullable|mimes:pdf|max:5000',
           'price' => 'required|numeric',
           'kayword' => 'required|string|max:255',
           'description_store' => 'required|string',
       ]);

       // Handle file uploads
       if ($request->hasFile('main_document')) {
           $mainDocument = $request->file('main_document');
           $mainDocumentName = time() . '_' . $mainDocument->getClientOriginalName();
           $mainDocumentPath = $mainDocument->storeAs('documents', $mainDocumentName, 'public');

           // Generate preview document if not provided
           if ($request->hasFile('preview_document')) {
               $previewDocument = $request->file('preview_document');
               $previewDocumentName = time() . '_preview_' . $previewDocument->getClientOriginalName();
               $previewDocumentPath = $previewDocument->storeAs('documents/previews', $previewDocumentName, 'public');
           } else {
               // Logic to generate preview PDF from the first 3 pages of the main document
               $previewDocumentName = time() . '_preview_' . $mainDocument->getClientOriginalName();
               $previewDocumentPath = 'documents/previews/' . $previewDocumentName;

               // Use a package like `fpdi` to extract the first 3 pages
               $pdf = new \setasign\Fpdi\Fpdi();
               $pageCount = $pdf->setSourceFile(storage_path('app/public/' . $mainDocumentPath));

               $pdf->AddPage();
               for ($i = 1; $i <= min(3, $pageCount); $i++) {
                   $templateId = $pdf->importPage($i);
                   $pdf->useTemplate($templateId, 10, 10, 200);

                   if ($i < 3) {
                       $pdf->AddPage();
                   }
               }

               $pdf->Output(storage_path('app/public/' . $previewDocumentPath), 'F');
           }
       }

       // Save document information to the database
       $document = new DocumentProd();
       $document->title = $request->title;
       $document->language = $request->language;
       $document->main_document = $mainDocumentPath;
       $document->preview_document = $previewDocumentPath;
       $document->price = $request->price;
       $document->kayword = $request->kayword;
       $document->description_store = $request->description_store;
       $document->save();

       return redirect()->route('admin.documentList')->with('success', 'Document added successfully!');
   }

}
