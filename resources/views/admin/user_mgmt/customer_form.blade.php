@extends('admin.layouts.layout')

@section('title','Dashboard')
@section('admin-content')

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
                        <h2>Customer Form </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ url('admin/customer_formAction') }}" id="course_form" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        {!! csrf_field() !!}

                            <div class="form-group row">
                                <!-- First row -->
                                <div class="col-md-6">
                                    <label class="control-label">First Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Enter First Name" name="first_name"  autofocus onkeyup="value=value.replace(/[^\a-\z\A-\Z ]/g,'')">
                                    @if ($errors->has('first_name'))
                                            <span class="" style="color:red">
                                                {{ $errors->first('first_name') }}
                                            </span>
                                            @endif
                                </div>


                                <div class="col-md-6">
                                    <label class="control-label">Last Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control"     autofocus
                                    onkeyup="value=value.replace(/[^\a-\z\A-\Z ]/g,'')" placeholder="Enter Last Name" name="last_name">
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
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email ID" name="email_id">
                                    @if ($errors->has('email_id'))
                                            <span class="" style="color:red">
                                                {{ $errors->first('email_id') }}
                                            </span>
                                            @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Mobile Number<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile_number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" title="Only numbers are allowed" minlength="10" maxlength="12" required>
                                    <!-- <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile_number"> -->
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
                                    <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                    @if ($errors->has('password'))
                                            <span class="" style="color:red">
                                                {{ $errors->first('password') }}
                                            </span>
                                            @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Profile Image</label>
                                    <input type="file" class="form-control" placeholder="Enter Profile Image" name="profile_image">
                                </div>
                                <!-- <div class="col-md-6">
                                    <label class="control-label">Customer Type<span class="mandatory" style="color:red"> *</span></label>
                                    <select id="heard12" class="form-control" required>
													<option value="" disabled>Choose Option</option>
													<option value="0">NON VIP</option>
													<option value="1">VIP</option>
												</select>
                                </div> -->
                            </div>

                            <div class="form-group row">
                                <!-- Fourth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Address<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="user_address">
                                    @if ($errors->has('user_address'))
                                            <span class="" style="color:red">
                                                {{ $errors->first('user_address') }}
                                            </span>
                                            @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">City</label>
                                    <input type="text"     autofocus
                                    onkeyup="value=value.replace(/[^\a-\z\A-\Z ]/g,'')" class="form-control" placeholder="Enter City" name="user_city">
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Fifth row -->
                                <div class="col-md-6">
                                    <label class="control-label">State</label>
                                    <input type="text"     autofocus
                                    onkeyup="value=value.replace(/[^\a-\z\A-\Z ]/g,'')" class="form-control" placeholder="Enter State" name="user_states">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Zip Code</label>
                                    <input type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" placeholder="Enter Zip Code" name="user_zipcode">
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Sixth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Country</label>
                                    <input type="text"     autofocus
                                    onkeyup="value=value.replace(/[^\a-\z\A-\Z ]/g,'')" class="form-control" placeholder="Enter Country" name="user_country">
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Twitter</label>
                                    <input type="text" class="form-control" placeholder="Enter Twitter Profile URL" name="user_twitter">
                                </div>

                            </div>



                            <div class="form-group row">
                                <!-- Tenth row -->
                                <div class="col-md-6">
                                    <label class="control-label" >Gender</label>
                                    <select id="heard" class="form-control" name="gender"  required>
													<option value="" disabled>Choose Gender</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">YouTube</label>
                                    <input type="text" class="form-control" placeholder="Enter YouTube Channel URL" name="user_youtube">
                                </div>

                            </div>
                            <div class="form-group row">
                                <!-- Ninth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Facebook</label>
                                    <input type="text" class="form-control" placeholder="Enter Facebook Profile URL" name="user_facebook">
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
                profile_image: { required: true },
            },
            messages: {
                first_name: { required: "First name is required" },
                last_name: { required: "Last name is required" },
                email_id: { required: "Email is required", email: "Enter a valid email",  remote: "This email is already taken" },
                mobile_number: { required: "Mobile number is required" },

                user_address: { required: "Address is required" },
                profile_image: { required: "Profile Image is required" },

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