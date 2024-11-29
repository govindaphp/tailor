@extends('front.layouts.layout') @section('content')
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
                                <form class="profile-input-form customer-profile-form" action="{{ url('/profile_update') }}" id="profile_form" enctype="multipart/form-data" method="POST">
                                @csrf
                                    <div class="row customer-input-inner">
                                    <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="exampleSelectGender">Category</label>
                                              <select class="form-select" name="category_id" id="category_id">
                                                <option value="" disabled >Choose Category</option>
                                                  @foreach($category as $categories)
                                                    <option value="{{ $categories->category_id }}" >{{ $categories->category_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                          </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Product Name</label>
                                                <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="First Name" value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Product Detail</label>
                                                <textarea class="form-control" name="product_detail" id="exampleTextarea1" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectGender">Product Type</label>
                                                <select class="form-select" name="product_type" id="product_type">
                                                    <option value="1">Readymade</option>
                                                    <option value="2">Fabric</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName2">Wear</label>
                                                <select class="form-select" name="product_type" id="product_type">
                                                    <option value="1">Men's wear</option>
                                                    <option value="2">Women's wear</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Price</label>
                                                <input type="text" class="form-control" name="price" id="exampleInputEmail3" placeholder="Price" value=""/>
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Size</label>
                                                        <select class="form-select" name="city_id" id="city">
                                                            @foreach($category as $categories)
                                                            <option value="{{ $categories->category_id }}" >{{ $categories->category_name }}
                                                            </option>
                                                            @endforeach 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Color</label>
                                                        <select class="form-select" name="city_id" id="city">
                                                            @foreach($category as $categories)
                                                            <option value="{{ $categories->category_id }}" >{{ $categories->category_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                <div class="btn btn-outline-danger plus" id="add">+</div>
                                                </div>   
                                            </div>    
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
<script>
    var i=1;

$('#add').click(function(){

    if (i < 4) {
        i++;

    $('#cls').append('<div class="row"><div class="col-md-6"><div class="form-group"><label for="exampleSelectGender">Size</label><select class="form-select" name="city_id" id="city"></select></div></div><div class="col-md-5"><div class="form-group"><label for="exampleSelectGender">Color</label><select class="form-select" name="city_id" id="city"></select></div></div><div class="col-md-1"><div class="btn btn-outline-danger plus remove">-</div></div></div>');

    } else {
        alert("You can only add up to 4 files.");
    }


});

$('#cls').on('click', '.remove', function() {
    $(this).closest('.row').remove();
    i--; 
});
</script>

                </div>
            </div>
        </div>


@endsection
