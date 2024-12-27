@extends('admin.layouts.layout')

@section('title','Customer Support')
@section('admin-content')

<style>
      .invalid-feedback {
    font-size: 100% !important;
}

 /* form#course_form span {
    width: 50%;
    padding-left: 11px;
} */
</style>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 customer-form-first">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        @if($supportTickets->count()>0)
                        @foreach($supportTickets as $value)
                        <a href="{{ route('replyTicket',$value->id)}}">
                        <div class="ticket-list-show">
                            <div class="first-ticket-list">
                                <div class="inner-fab-list">
                                    <span class="list-tikt"># {{$value->ticket_id}}</span>
                                    <sapn class="title">{{$value->ticket_subject}}</sapn>
                                    <span class="card-title">{{$value->last_message}}</span>
                                </div>
                                <div class="inner-list-tic">
                                    @if($value->is_closed==0)
                                    <a href="javascript:void(0);" class="cls-list-btn" ticket_id="{{$value->id}}">Close</a>
                                    @else
                                    <span>Closed</span>
                                    @endif
                                    <span class="fa fa-paper-clip">{{$value->last_message_time}}</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   $(document).on('click', '.cls-list-btn', function() {
    var ticket_id   = $(this).attr('ticket_id');
    var button = $(this);
    $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo url('/admin/closeTicket'); ?>",
            data: {
                _token: '{{ csrf_token() }}',
                'ticket_id': ticket_id
            },
            success: function(data) {
                if (data.success) {
                    toastr.success('Ticket Closed successfully');
                    button.hide(); 
                    button.after('<span>Closed</span>');

                } else {
                    toastr.error('Failed to Close Ticket');
                    
                }
            },
        });
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