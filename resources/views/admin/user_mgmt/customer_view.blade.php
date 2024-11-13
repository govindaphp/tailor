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
                        <h2>Customer View </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="course_form" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <!-- First row -->
                                <div class="col-md-6">
                                    <label class="control-label">First Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control"  name="first_name" value="{{ $user_detail->first_name }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Last Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $user_detail->last_name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Second row -->
                                <div class="col-md-6">
                                    <label class="control-label">Email ID<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="email" class="form-control"  name="email_id" value="{{ $user_detail->email_id }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Mobile Number<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control"  name="mobile_number" value="{{ $user_detail->mobile_number }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Third row -->
                                <div class="col-md-6">
                                    <label class="control-label">Password<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="password" class="form-control"  name="password" value="{{ $user_detail->password }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Customer Type<span class="mandatory" style="color:red"> *</span></label>
                                    <select id="heard12" class="form-control" disabled>
                                        <option value="0" {{ $user_detail->customer_type == 0 ? 'selected' : '' }}>NON VIP</option>
                                        <option value="1" {{ $user_detail->customer_type == 1 ? 'selected' : '' }}>VIP</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Fourth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Address<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control"  name="user_address" value="{{ $user_detail->user_address }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">City</label>
                                    <input type="text" class="form-control" name="user_city" value="{{ $user_detail->user_city }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Fifth row -->
                                <div class="col-md-6">
                                    <label class="control-label">State</label>
                                    <input type="text" class="form-control" name="user_states" value="{{ $user_detail->user_states }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Zip Code</label>
                                    <input type="text" class="form-control"  name="user_zipcode" value="{{ $user_detail->user_zipcode }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Sixth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Country</label>
                                    <input type="text" class="form-control" name="user_country" value="{{ $user_detail->user_country }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Profile Image</label>
                                    <div>
                                        <!-- Image Display -->
                                        <img src="{{ asset('public/admin/uploads/user/'. $user_detail->profile_image) }}" id="upload_image_display" style="margin-top: 10px; border-radius: 10px;" alt="brand image" height="80px" width="100px">
                                    </div>
                                </div>
                            </div>




                            <div class="form-group row">
                                <!-- Tenth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Gender</label>
                                    <select id="heard" class="form-control" name="gender" disabled>
                                        <option value="Male" {{ $user_detail->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $user_detail->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">YouTube</label>
                                    <input type="text" class="form-control"  name="user_youtube" value="{{ $user_detail->user_youtube }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- Ninth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Facebook</label>
                                    <input type="text" class="form-control" name="user_facebook" value="{{ $user_detail->user_facebook }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Twitter</label>
                                    <input type="text" class="form-control"  name="user_twitter" value="{{ $user_detail->user_twitter }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 go-back-btn mt-3">
                                    <a href="{{ url('admin/customer-list') }}" class="btn btn-primary">Go Back</a>
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
