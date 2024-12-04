<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function vendorDashboard()
    {
        //This function is for vendor dashboard
        if (Auth::guard('vendor')->check()) {
			// Redirect to the user dashboard if authenticated
			return view("front.vendor.vendor_dash");
		}
		else{
			return redirect()->to('/login');
		}
    }
    public function ProfileSetting(Request $request)
	{
		$vendorId = Auth::guard('vendor')->user()->vendor_id;
        $data['vendor'] = Vendor::where('vendor_id', $vendorId)->first();
        $data['countries'] = DB::table('master_country')->select('country_id','country_name')->where('country_status',1)->get();
        $data['state']     = DB::table('master_state')->select('state_id','state_name')->where('state_country_id',1)->get();
        $data['city']      = DB::table('master_city')->select('city_id','city_name')->where('city_state_id',1)->get();
		return view("front.vendor.tailor_profile",$data);
	}

	public function profile_update(Request $request)
	{
        $name           = $request->name;
        $email          = $request->email;
        $gender         = $request->gender;
        $img            = $request->img;
        $address        = $request->address;
        $country_id     = $request->country_id;
        $state_id       = $request->state_id;
        $city_id        = $request->city_id;
        $business_name  = $request->business_name;
        $zipcode        = $request->zipcode;


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
        $vendor->business_name          = $business_name;
        $vendor->country_id             = $country_id;
        $vendor->state_id               = $state_id;
        $vendor->city_id                = $city_id;
        $vendor->zip_code               = $zipcode;
        $vendor->save();

        Session::flash('message', 'Profile Update Sucessfully!');
        return redirect()->to('/ProfileSetting');

    }
    public function vendorProduct()
	{
		//This function is for vendor product list
		$products = DB::table('products')
						->join('category', 'products.category_id', '=', 'category.category_id')
						->where('products.vendor_id', auth('vendor')->id())
						->where('products.is_deleted', '0')
						->select('products.*', 'category.category_name as category_name')
						->get();
		return view("front/vendor/product_list",compact('products'));
	}
	public function productStatus(Request $request)
	{
		if($request->type=='availability')
		{
			$result =  DB::table('products')
             ->where('id', $request->id)
             ->update(
                 ['is_available' => $request->status]
             );
			if ($result){
				return response()->json(['success' => true, 'message' => 'Availability updated successfully']);
			} else{
				return response()->json(['success' => false, 'message' => 'Failed to update Availability']);
			}
		}
		if($request->type=='is_active')
		{
			$result =  DB::table('products')
             ->where('id', $request->id)
             ->update(
                 ['is_active' => $request->status]
             );
			if ($result){
				return response()->json(['success' => true, 'message' => 'Status updated successfully']);
			} else{
				return response()->json(['success' => false, 'message' => 'Failed to update status']);
			}
		}
	}
	public function deleteProduct($id){

		$result = DB::table('products')
    		->where('id', $id)
    		->update(['is_deleted' => 1]);

		if ($result > 0) {
			// Successfully updated at least one row
			Session::flash('message', 'Product deleted successfully!');
		} else {
			// No rows updated
			Session::flash('message', 'Failed to delete product or already deleted.');
		}

		return redirect()->to('/vendorProduct');
	}
	public function addProduct(Request $request, $id = null)
	{
		//This function is for add product
		$category           = $request->category_id;
        $product_name       = $request->name;
        $galary_img         = $request->galary_img;
		$old_image          = $request->old_image;
        $product_type       = $request->product_type;
        $fabric_type        = $request->fabric_type;
        $gender_type        = $request->gender_type;
        $product_details    = $request->product_detail;
		$price   			= $request->price;
		$discount			= $request->discounted_price;
		$sizes              = $request->sizes;
		$vendor_id			= auth('vendor')->id();



		$data['product'] = '';
		if($id)
		{
            $data['product'] = Product::where('id', $id)->first();
			$data['productImages'] = ProductImage::where('product_id', $id)->get();
			$data['ProductVariants'] = ProductVariant::where('product_id', $id)->get()->groupBy('size_id');
        }
		if ($request->isMethod('post')) {
			if($request->product_id){

				$productUpdate = Product::where('id', $request->product_id)->first();
				$productUpdate->category_id     = $category;
				$productUpdate->product_name    = $product_name;
				$productUpdate->product_details = $product_details;
				$productUpdate->product_type    = $product_type;
				$productUpdate->gender_type     = $gender_type;
				$productUpdate->final_price 	 = $price;
				$productUpdate->is_available    = '1';
				$productUpdate->is_available    = '1';
				$productUpdate->is_deleted      = '0';
				$productUpdate->vendor_id 		 = $vendor_id;
				$productUpdate->save();

				// //Galary image Update code =========================================================================================

				ProductImage::where('product_id', $request->product_id)->delete();
				if($galary_img){
					foreach($galary_img  as $img){
						$imageName = uniqid().'.'.$img->extension();
						$img->move(public_path('Productupload'), $imageName);
						$newProduct_images                  = new ProductImage();
						$newProduct_images->product_id      = $productUpdate->id;
						$newProduct_images->product_image   = $imageName;
						$newProduct_images->save();
					}
				}else{
					foreach($old_image  as $img){
						$newProduct_images                  = new ProductImage();
						$newProduct_images->product_id      = $productUpdate->id;
						$newProduct_images->product_image   = $img;
						$newProduct_images->save();
					}
				}

				//ProductVariant Update code =========================================================================================

				ProductVariant::where('product_id', $request->product_id)->delete();

				foreach ($request->sizes as $index => $sizeId) {
					$colors = $request->colors[$index] ?? [];
					foreach ($colors as $colorId) {
						$newProductVariant = new ProductVariant();
						$newProductVariant->product_id = $productUpdate->id; 
						$newProductVariant->size_id = $sizeId;
						$newProductVariant->colour_id = $colorId;
						$newProductVariant->save();
					}
				}

				Session::flash('message', 'Product Update Sucessfully!');
				return redirect()->to('/vendorProduct');



			}else{

				$newProduct                  = new Product();
				$newProduct->category_id     = $category;
				$newProduct->product_name    = $product_name;
				$newProduct->product_details = $product_details;
				$newProduct->product_type    = $product_type;
				$newProduct->gender_type     = $gender_type;
				$newProduct->final_price 	 = $price;
				$newProduct->is_available    = '1';
				$newProduct->is_available    = '1';
				$newProduct->is_deleted      = '0';
				$newProduct->vendor_id 		 = $vendor_id;
				$newProduct->save();

				// save product==================================================================================================

				foreach($galary_img  as $img){
					$imageName = uniqid().'.'.$img->extension();
					$img->move(public_path('Productupload'), $imageName);
					$newProduct_images                  = new ProductImage();
					$newProduct_images->product_id      = $newProduct->id;
					$newProduct_images->product_image   = $imageName;
					$newProduct_images->save();
				}

				// save product images ==================================================================================================


				foreach ($request->sizes as $index => $sizeId) {
					$colors = $request->colors[$index] ?? [];
					foreach ($colors as $colorId) {
						$newProductVariant = new ProductVariant();
						$newProductVariant->product_id = $newProduct->id; 
						$newProductVariant->size_id = $sizeId;
						$newProductVariant->colour_id = $colorId;
						$newProductVariant->save();
					}
				}

				// save product Variant ==================================================================================================

			}


			Session::flash('message', 'Product Create Sucessfully!');
			return redirect()->to('/vendorProduct');

		}





		$data['category'] = DB::table('category')->select('category_id','category_name')->where('is_active',1)->where('is_deleted',0)->get();
		$data['colors'] = DB::table('color_master')->select('color_id','color_name','color_code')->where('is_active',1)->where('is_deleted',0)->get();
		$data['sizes'] = DB::table('size_master')->select('id','size_name')->where('is_active',1)->where('is_deleted',0)->get();

		return view('front.vendor.add_product',$data);
	}

}
