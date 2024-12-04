@extends('front.layouts.layout') @section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
   .plus {
    margin-top: 34px;
}
</style>


<div class="banner-tailors">
   <div class="container browse-tailors">
      <div class="row browse-content">
         <h1 class="text-white">Profile</h1>
      </div>
   </div>
</div>
<div class="container-fluid page-body-wrapper vendor-dasboard">
   @include('front.vendor.vendor_sidebar')
   <div class="col-md-9">
      <div class="row profile-setting-form customer-profile">
         <div class="col-md-12 grid-margin stretch-card customer-profile-card">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Product </h4>
                  <p class="card-description">Add/Update Product</p>
                  <form class="profile-input-form customer-profile-form" action="{{ url('/addProduct') }}" id="profile_form" enctype="multipart/form-data" method="POST">
                     @csrf
                     <div class="row customer-input-inner">
                     <input type="hidden" name="product_id" value="{{@$product->id }}">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleSelectGender">Category</label>
                              <select class="form-select" name="category_id" id="category_id" required>
                                 <option value="">Choose Category</option>
                                 @foreach($category as $categories)
                                 <option value="{{ $categories->category_id }}" {{@$product->category_id == $categories->category_id ? 'selected' :''}}>{{ $categories->category_name }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleInputName1">Product Name</label>
                              <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name" value="{{ @$product->product_name }}" required/>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="exampleTextarea1">Product Details</label>
                              <textarea class="form-control" name="product_detail" id="exampleTextarea1" rows="4" required>{{ @$product->product_details }}</textarea>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Product Galary Images</label>
                              <div id="dynamic_field">
                                    @if(!empty($productImages) && count($productImages) > 0)
                                       @foreach($productImages as $index => $image)
                                          <div class="input-group mb-2" id="row{{ $index }}">
                                             <img src="{{url('public/Productupload',$image->product_image)}}" height="50px" width="50px">
                                             <input type="file" id="img_{{ $index }}" name="galary_img[]" class="form-control">
                                             <input type="hidden" name="old_image[]" value="{{ $image->product_image }}">
                                             <button type="button" name="remove" id="{{$index }}" class="btn btn-danger btn-sm btn_remove2">X</button>
                                          </div>
                                          @endforeach
                                          <button type="button" id="addSelect" data-counter="{{ is_countable($productImages) ? count($productImages) : 0 }}" class="btn btn-block btn-primary btn-sm font-weight-medium mt-2 mb-2">Add More</button>
                                       @else
                                       <input type="file" id="img" name="galary_img[]" class="form-control" required>
                                       <button type="button" id="addSelect" data-counter="{{0}}" class="btn btn-block btn-primary btn-sm font-weight-medium mt-2 mb-2">Add More</button>
                                    @endif


                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleSelectGender">Product Type</label>
                              <select class="form-select" name="product_type" id="product_type" required>
                                 <option value="">Choose Product Type</option>
                                 <option value="1" {{@$product->product_type == '1' ? 'selected' :''}}>Readymade</option>
                                 <option value="2" {{@$product->product_type == '2' ? 'selected' :''}}>Fabric</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleInputName2">Wear</label>
                              <select class="form-select" name="gender_type" id="product_type" required>
                                 <option value="">Choose Wear Type</option>
                                 <option value="1" {{@$product->gender_type == '1' ? 'selected' :''}}>Men's wear</option>
                                 <option value="2" {{@$product->gender_type == '2' ? 'selected' :''}}>Women's wear</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleInputEmail3">Price</label>
                              <input type="text" class="form-control" name="price" id="exampleInputEmail3" placeholder="Price" value="{{@$product->final_price}}" required/>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleInputName2">Discount(%)</label>
                              <input type="text" class="form-control" name="discount" id="exampleInputName2" placeholder="Discount(%)" value="" />
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleInputName2">Discounted Price</label>
                              <input type="text" class="form-control" name="discounted_price" id="exampleInputName2" placeholder="Discounted Price" value="" readonly/>
                           </div>
                        </div>
                        <div id="cls">
                        @if(!empty($ProductVariants))

                        @foreach($ProductVariants as $index => $variants)
                        @php
                           $size_id = [];
                           $colors_id = [];
                        @endphp

                        @foreach($variants as $variant)
                           @php
                              $size_id[] = $variant->size_id;
                              $colors_id[] = $variant->colour_id;
                           @endphp
                        @endforeach

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleSelectGender">Size</label>
                                 <select name="sizes[]" class="form-select">
                                    <option value="">Select Type</option>
                                    @foreach ($sizes as $value)
                                       <option value="{{ $value->id }}" 
                                          @if(in_array($value->id, $size_id)) selected @endif>
                                          {{ $value->size_name }}
                                       </option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>

                           <div class="col-md-5">
                              <div class="form-group">
                                 <label for="exampleSelectGender">Color</label>
                                 <select name="colors[{{ ++$loop->index }}][]" class="form-select exampleInputColor" multiple="multiple">
                                    <option value="">Select Color</option>
                                    @foreach ($colors as $value)
                                       <option value="{{ $value->color_id }}" 
                                          @if(in_array($value->color_id, $colors_id)) selected @endif>
                                          {{ $value->color_name }}
                                       </option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>

                           <div class="col-md-1">
                              <div class="btn btn-outline-danger plus remove">-</div>
                           </div>
                        </div>
                     @endforeach


                        <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="exampleSelectGender">Size</label>
                                    <select  name="sizes[]" class="form-select" >
                                       <option value="">Select Type</option>
                                       @foreach ($sizes as $value)
                                       <option value="{{ $value->id }}">{{ $value->size_name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-5">
                                 <div class="form-group">
                                    <label for="exampleSelectGender">Color</label>
                                    <select  name="colors[{{ 0 }}][]" class="form-select exampleInputColor" multiple="multiple">
                                       <option value="" disabled>Select Color</option>
                                       @foreach ($colors as $value)
                                       <option value="{{ $value->color_id }}">{{ $value->color_name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-1">
                                 <div class="btn btn-outline-success plus" id="add" data-counter="{{ count($ProductVariants) ?? 0 }}">+</div>
                              </div>
                           </div>
                        @else
                        <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="exampleSelectGender">Size</label>
                                    <select  name="sizes[]" class="form-select" required>
                                       <option value="">Select Type</option>
                                       @foreach ($sizes as $value)
                                       <option value="{{ $value->id }}">{{ $value->size_name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-5">
                                 <div class="form-group">
                                    <label for="exampleSelectGender">Color</label>
                                    <select  name="colors[{{ 0 }}][]" class="form-select exampleInputColor" multiple="multiple" required>
                                       <option value="" disabled>Select Color</option>
                                       @foreach ($colors as $value)
                                       <option value="{{ $value->color_id }}">{{ $value->color_name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-1">
                                 <div class="btn btn-outline-success plus" id="add" data-counter="{{ 0 }}">+</div>
                              </div>
                           </div>
                        @endif
                        </div>
                     </div>
                     <div class="d-flex mt-3 sub-cen-btn">
                        <button type="submit" class="btn btn-outline-success me-2">Submit</button>
                        <button class="btn btn-outline-danger">Cancel</button>
                     </div>
               </div>
            </div>
         </div>
         </form>
      </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
// Add more images code ============================================================================

let loop = parseInt($('#add').data('counter'), 10);


   

$('#add').click(function(){
    initializeMultiSelect();

    if (loop < 4) {
      loop++;

    $('#cls').append(`<div class="row"><div class="col-md-6"><div class="form-group"><label for="exampleSelectGender">Size</label><select  name="sizes[]" class="form-select" required><option value="">Select Type</option>@foreach ($sizes as $value)<option value="{{ $value->id }}">{{ $value->size_name }}</option>@endforeach</select></div></div><div class="col-md-5"><div lass="form-group"><label for="exampleSelectGender">Color</label><select  name="colors[${loop}][]" class="form-select exampleInputColor" multiple="multiple"><option value="">Select Color</option>@foreach ($colors as $value)<option value="{{ $value->color_id }}">{{ $value->color_name }}</option>@endforeach</select></div></div><div class="col-md-1"><div class="btn btn-outline-danger plus remove">-</div></div></div>`);
    initializeMultiSelect();
    } else {
        alert("You can only add up to 4 files.");
    }


});

$('#cls').on('click', '.remove', function() {
    $(this).closest('.row').remove();
    i--;
});

// Add more images code ============================================================================



// add more and select 2 code ===========================================================================================================

$('.exampleInputColor').select2({
            placeholder: "Select options",
            allowClear: true
});


let counter = parseInt($('#addSelect').data('counter'), 10);


$('#addSelect').click(function(){

   if (counter < 4) {
      counter++;

    $('#dynamic_field').append('<div id="row'+counter+'"><div style="display: flex; gap: 10px; align-items: center;"><input type="file" name="galary_img[]" placeholder="Enter your Name" class="form-control name_list" /><button type="button" name="remove" id="'+counter+'" class="btn btn-danger btn-sm btn_remove2">X</button></div></div>');

   } else {
        alert("You can only add up to 4 files.");
    }

});

$(document).on('click', '.btn_remove2', function(){

    var button_id = $(this).attr("id");

    $('#row'+button_id+'').remove();

    counter--;

});


function initializeMultiSelect() {
    $('.exampleInputColor').each(function () {
    if (!$(this).hasClass('initialized')) {
        $(this).addClass('initialized');
        $(this).select2(); // Replace with your multi-select library initialization code
        }
    });
}


// add more and select 2 code ===========================================================================================================

</script>

@endsection
