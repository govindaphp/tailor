@extends('admin.layouts.layout')

@section('title','Customer Support')
@section('admin-content')



<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 reply-ticket-list-show">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            <div class="reply-ticket-list">
                                <span># <span class="name">{{$ticket->ticket_id}}</span> [ {{$ticket->ticket_subject}} ]</span>
                            </div>
                                <div class="chat-container">
                                    <ul class="chat-box chatContainerScroll" id="chatContainer">
                                    @if($replylist->count() > 0)
                                        @foreach($replylist as $value)
                                            @if($value->sender_type==1)
                                        <li class="chat-left">
                                            <div class="chat-avatar">
                                                <img src="{{$ticket->profile_image==''?url('public/default.jpg'):url('public/admin/uploads/user',$ticket->profile_image)}}" alt="Customer">
                                                <div class="chat-name">{{$ticket->first_name}}</div>
                                            </div>
                                            <div class="chat-text">
                                            {{$value->detail_text}}
                                                <div class="chat-hour">{{$value->created_at}}</div>
                                            </div>
                                        </li>
                                        @else
                                        <li class="chat-right">
                                            <div class="chat-text">
                                            {{$value->detail_text}}
                                                <div class="chat-hour">{{$value->created_at}}</div>
                                            </div>
                                            <div class="chat-avatar">
                                                <img src="{{ url('/public') }}/front_assets/images/design2.png" alt="Admin">
                                                <div class="chat-name">Admin</div>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </ul>
                                    @if($ticket->is_closed==0)
                                    <form class="profile-input-form customer-profile-form" action="{{ url('/admin/replyTicket/' .$ticket->id) }}" id="support_form" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group mt-3 mb-0 typr-your-msg">
                                        <textarea class="form-control" rows="3" placeholder="Type your message here..." name="reply_text"></textarea>
                                            <div class="chat-buttons mt-2 d-flex justify-content-end two-btn-send">
                                                <button class="btn btn-outline-primary me-2">Send</button>
                                            </div>
                                    </div>
                                    </form>
                                    @endif
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const chatContainer = document.getElementById('chatContainer');
        if (chatContainer) {
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
    });
</script>
<script>
    $(document).ready(function() {
        @if(Session::has('message'))
            toastr.success("{{ Session::get('message') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    });
</script>
@endsection