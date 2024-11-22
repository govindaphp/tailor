@extends('front.vendor.layouts.layout')

@section('content')


<div class="content-wrapper">
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Product</h4>
            <p class="card-description">Basic Details</p>
            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Product name</label>
                <input type="text" name="product_name" class="form-control" id="exampleInputUsername1" placeholder="Username" required>
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1" class="form-label">Product Variant</label>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="form-group">
                    <label for="exampleInputSize" class="form-label">Size</label>

                    <select name="sizes[]" id="exampleInputSize" class="form-select" multiple>
                        <option value="" disabled>Select Type</option>
                        @foreach ($sizes as $value)
                          <option value="{{ $value->id }}">{{ $value->size_name }}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputColor" class="form-label">Color</label>
                    <select name="color[]" id="exampleInputColor" class="form-select" multiple>
                        <option value="" disabled>Select Type</option>
                        @foreach ($colors as $value)
                          <option value="{{ $value->color_id }}">{{ $value->color_name }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Product Image</label>
                <input type="file" id="img" name="img" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Product Galary Images</label>
                <div id="dynamic_field">
                    <input type="file" id="img" name="galary_img[]" class="form-control">

                    <button type="button" name="add" id="add" class="btn btn-block btn-primary btn-sm font-weight-medium mt-2 mb-2">Add More</button>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Product Type</label>
                <select class="form-select" name="product_type" id="product_type" required>
                    <option value="">Select Type</option>
                    <option value="1">Readymade</option>
                    <option value="2">Fabric</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Product Gender Type</label>
                <select class="form-select" name="gender_type" id="product_type" required>
                    <option value="">Select Type</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                  </select>
              </div>
              <div class="form-group" id="feb_div">
                <label for="exampleInputPassword1">Fabric</label>
                <select class="form-select" name="fabric_type" id="product_type" required>
                    <option value="">Select Type</option>
                    @foreach ($febrictype as $value)
                    <option value="{{ $value->febric_type_id }}">{{ $value->febric_type_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Product Details</label>
                <textarea class="form-control" name="product_details" id="exampleTextarea1" rows="4" required>
                </textarea>
              </div>

              <button type="submit" class="btn btn-primary me-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready( function () {

        $('#exampleInputSize').select2({
            placeholder: "Select Type", // Placeholder for the select
            allowClear: true           // Allow users to clear selection
        });

        $('#feb_div').hide();
        $('#product_type').change(function () {
        var selectedValue = $(this).val(); // Get the selected value

            if (selectedValue === "2") {
                $('#feb_div').show();
            }else{
                $('#feb_div').hide();
            }
        });

        var i=1;



        $('#add').click(function(){

            if (i < 4) {
                i++;

            $('#dynamic_field').append('<div id="row'+i+'"><div style="display: flex; gap: 10px; align-items: center;"><input type="file" name="galary_img[]" placeholder="Enter your Name" class="form-control name_list" /><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');

            } else {
                alert("You can only add up to 4 files.");
            }


        });



        $(document).on('click', '.btn_remove', function(){

            var button_id = $(this).attr("id");

            $('#row'+button_id+'').remove();

            i--;

        });


} );

  </script>
@endsection
