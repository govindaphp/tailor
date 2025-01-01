@extends('front.layouts.layout') @section('content')

<!-- Bootstrap Toggle CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet" />

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Message</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard customer-dash">
    @include('front.user.sidebar')
    <div class="col-md-9">
        <div class="row message-list">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card m-0">
                        <!-- Row start -->
                        <div class="row no-gutters">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 message-list-left">
                                <div class="users-container">
                                    <div class="chat-search-box">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Search" />
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-info">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="users">
                                        @foreach ($allMerchecnts as $merchent)
                                            <li class="person merchant-item" data-chat="person1" data-id="{{$merchent->vendor_id}}">
                                                <div class="user">
                                                    <img src="{{$merchent->profile_img==''? url('/public').'/images/tailor-img-two.png': url('/public').'/admin/uploads/user/'.$merchent->profile_img}}" alt="Vendor" />
                                                    <!--span-- class="status busy"></!--span-->
                                                </div>
                                                <p class="name-time">
                                                    <span class="name">{{$merchent->name}}</span>
                                                </p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9 message-list-right">
                                <div class="selected-user">
                                    <span>To: <span class="name">Emily Russell</span></span>
                                </div>
                                <div class="chat-container" >
                                    <ul class="chat-box chatContainerScroll" style="height: 400px; overflow-y: scroll;" id="chat_div">
                                        
                                        <li class="chat-right">
                                            <div class="chat-hour">08:59</div>
                                            <div class="chat-text">Have you faced any problems at the last phase of the project?</div>
                                            <div class="chat-avatar">
                                                <img src="https://votivetech.in/tailor_hub/public/front_assets/images/reviw1.png" alt="Retail Admin" />
                                                <div class="chat-name">Jin</div>
                                            </div>
                                        </li>
                                        <li class="chat-left">
                                            <div class="chat-avatar">
                                                <img src="https://votivetech.in/tailor_hub/public/front_assets/images/reviw3.png" alt="Retail Admin" />
                                                <div class="chat-name">Russell</div>
                                            </div>
                                            <div class="chat-text">
                                                Actually everything was fine. <br />
                                                I'm very excited to show this to our team.
                                            </div>
                                            <div class="chat-hour">07:00</div>
                                        </li>

                                    </ul>
                                    <div class="form-group mt-3 mb-0">
                                        <input type="hidden" name="auth_id" id="auth_id" value="{{auth('user')->id()? auth('user')->id() :'0'}}">
                                        <textarea class="form-control" rows="3" placeholder="Type your message here..." id="my_msg"></textarea>
                                    </div>
                                    <div class="chat-buttons mt-2 d-flex justify-content-end two-btn-send">
                                        <button class="btn btn-primary me-2" onclick="myFunction()">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
