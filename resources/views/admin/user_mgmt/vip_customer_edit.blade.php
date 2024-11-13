@extends('admin.layouts.layout')

@section('title','Dashboard')
@section('admin-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Customer Management</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 customer-form-first">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Customer Edit </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ url('admin/customer_formAction') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" id="course_form">
                            {!! csrf_field() !!}
                            <input type="hidden"  value="{{ $user_detail->id }}" name="id">
                            <div class="form-group row">
                                <!-- First row -->
                                <div class="col-md-6">
                                    <label class="control-label">First Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" value="{{ $user_detail->first_name }}" placeholder="Enter First Name" name="first_name">
                                    @if ($errors->has('first_name'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('first_name') }}
                                    </span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <label class="control-label">Last Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" value="{{ $user_detail->last_name }}" placeholder="Enter Last Name" name="last_name">
                                    @if ($errors->has('last_name'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('last_name') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Second row -->
                                <div class="col-md-6">
                                    <label class="control-label">Email ID<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="email" class="form-control" id="email" value="{{ $user_detail->email_id }}" placeholder="Enter Email ID" name="email_id">
                                    @if ($errors->has('email_id'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('email_id') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Mobile Number<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" value="{{ $user_detail->mobile_number }}" placeholder="Enter Mobile Number" name="mobile_number">
                                    @if ($errors->has('mobile_number'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('mobile_number') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Third row -->
                                <div class="col-md-6">
                                    <label class="control-label">Password<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="password" class="form-control" value="{{ $user_detail->password }}" placeholder="Enter Password" name="password">
                                    @if ($errors->has('password'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>
                                <!-- <div class="col-md-6">
                                    <label class="control-label">Customer Type<span class="mandatory" style="color:red"> *</span></label>
                                    <select id="heard" class="form-control" required>
                                        <option value="" disabled>Choose Option</option>
                                        <option value="0">NON VIP</option>
                                        <option value="1">VIP</option>
                                    </select>
                                </div> -->

                                <div class="col-md-6">
                                    <label class="control-label">Profile Image</label>
                                    <input type="file" class="form-control"  placeholder="Enter Profile Image" name="profile_image">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <img src="{{ asset('public/admin/uploads/user/'. $user_detail->profile_image) }}" id="upload_image_display" style="margin-top: 10px;margin-left: 5px;border-radius: 10px;" alt="brand image" height="100px" width="100px">
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Fourth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Address<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" value="{{ $user_detail->user_address }}" placeholder="Enter Address" name="user_address">
                                    @if ($errors->has('user_address'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('user_address') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">City</label>
                                    <input type="text" class="form-control" value="{{ $user_detail->user_city }}" placeholder="Enter City" name="user_city">
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Fifth row -->
                                <div class="col-md-6">
                                    <label class="control-label">State</label>
                                    <input type="text" class="form-control" value="{{ $user_detail->user_states }}" placeholder="Enter State" name="user_states">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Zip Code</label>
                                    <input type="text" class="form-control" value="{{ $user_detail->user_zipcode }}" placeholder="Enter Zip Code" name="user_zipcode">
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Sixth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Country</label>
                                    <input type="text" class="form-control" value="{{ $user_detail->user_country }}" placeholder="Enter Country" name="user_country">
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Twitter</label>
                                    <input type="text" class="form-control" value="{{ $user_detail->user_twitter }}" placeholder="Enter Twitter Profile URL" name="user_twitter">
                                </div>

                            </div>



                            <div class="form-group row">
                                <!-- Tenth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Gender</label>
                                    <select id="heard12" class="form-control" name="gender" required>
                                        <option value="" disabled>Choose Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">YouTube</label>
                                    <input type="text" class="form-control" value="{{ $user_detail->user_youtube }}" placeholder="Enter YouTube Channel URL" name="user_youtube">
                                </div>

                            </div>
                            <div class="form-group row">
                                <!-- Ninth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Facebook</label>
                                    <input type="text" class="form-control" value="{{ $user_detail->user_facebook }}" placeholder="Enter Facebook Profile URL" name="user_facebook">
                                </div>

                            </div>


                            <div class="form-group row">
                                <div class="col-md-12 go-back-btn mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="submit" class="btn btn-primary">Go Back</button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

<script>
window.addEventListener('load', function() {
    $("#course_form").validate({
        rules: {
                first_name: { required: true },
                last_name: { required: true },
                email_id: {
                    required: true,
                    email: true ,
                    remote: {
                    url: "{{url('/admin/useremail')}}",
                    type: "post",
                    data: {
                        email: function() {
                        return $("#email").val();
                        },
                        '_token':'{{csrf_token()}}'
                    }
                    }
                },
                mobile_number: { required: true },
                user_address: { required: true },

            },
            messages: {
                first_name: { required: "First name is required" },
                last_name: { required: "Last name is required" },
                email_id: { required: "Email is required", email: "Enter a valid email",  remote: "This email is already taken" },
                mobile_number: { required: "Mobile number is required" },
                user_address: { required: "Address is required" },

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
    });
});

</script>