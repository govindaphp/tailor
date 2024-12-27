@extends('front.layouts.layout')

@section('content')
<style>
  .chat-container {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
  }
  .chat-header {
    border-bottom: 1px solid #ddd;
  }
  .chat-body {
    flex: 1;
  }
  .chat-footer {
    border-top: 1px solid #ddd;
  }
  .message-bubble {
    max-width: 100%;
  }
  input.form-control.me-2 {
    box-shadow: none !important;
}
  .message-avatar img {
    width: 40px;
    height: 40px;
  }
  /* Sidebar styling */
  .sidebar {
    width: 250px;
    background-color: #f8f9fa;
    border-right: 1px solid #ddd;
    padding: 20px;
  }
  .sidebar .status {
    font-size: 14px;
    color: #888;
  }
  .sidebar .status.online {
    color: green;
  }
  .sidebar .status.offline {
    color: red;
  }


</style>

<div class="banner-tailors">
  <div class="container browse-tailors">
    <div class="row browse-content">
      <h1 class="text-white">Messages</h1>
    </div>
  </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dashboard d-flex pt-5 pb-5">
  <!-- Sidebar -->
  <div class="sidebar">
    <h5>All Users</h5>
    <div class="status online">Online</div>
    <ul>
      @foreach ($allMerchecnts as $merchent)
      <li data-id="{{$merchent->vendor_id}}" class="merchant-item"><u>{{$merchent->name}}</u>
        @if ($merchent->online_status == 1)
        <i class="fa fa-circle text-success" aria-hidden="true" title="Online"></i>
        @endif
      </li>
      @endforeach
    </ul>

    <!-- You can add more information about the user here -->
  </div>

  <!-- Chat Container -->
  <div class="col-md-9">
    <h3 id="chat_head"><u>Please select a user:-</u> </h3>
    <form action="#" id="chat_form" method="POST" enctype="multipart/form-data">
    <div class="chat-container" id="chat_container" style="display: none">


      <div class="chat-body p-3 bg-light" style="height: 400px; overflow-y: scroll;" id="chat_div">
        <!-- Example message from the receiver -->

      </div>

      <div class="chat-footer d-flex align-items-center p-3 bg-white">
        <input type="hidden" name="auth_id" id="auth_id" value="{{auth('user')->id()? auth('user')->id() :'0'}}">
        <input type="text" id="my_msg" class="form-control me-2" placeholder="Type a message..." required>
        <button type="button" class="btn btn-primary me-2" onclick="myFunction()">
          <i class="bi bi-send"></i> Send
        </button>
        <label class="btn btn-secondary">
          <i class="bi bi-paperclip"></i>
          <input type="file" hidden>
        </label>
      </div>
      <div class="center-message text-center">
        <p id="error_message" class="text-danger" style="display:none;">Please enter a message!</p>
      </div>
    </div>
    </form>
  </div>
</div>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>

var currentUserId = $('#auth_id').val();

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('3807eb5cfd5189202b86', {
    cluster: 'ap2'
  });

  var channel = pusher.subscribe('Laravel-Chat');
  channel.bind('my-event', function(data) {
    var userData = data.user;

    var messageHtml;

    if (userData.sender_id == currentUserId ) {
    // Append the message to the sender container
    messageHtml =`
        <div class="d-flex justify-content-end mb-3">
        <div class="message-content text-end">
            <div class="message-bubble bg-primary text-white p-2 rounded">
                <p>${userData.msg}<br><span>${userData.time}</span></p>
            </div>
        </div>
        <div class="message-avatar ms-3">
            <img src="${userData.profile_image == null 
                ? window.location.origin +'/public/front_assets/images/reviw1.png' 
                : window.location.origin + '/public/admin/uploads/user/' + userData.profile_image}" 
            alt="Sender Avatar" class="rounded-circle">
            <p>${userData.name}</p>
        </div>
    </div>`;

  } else {
    // Append the message to the receiver container
    messageHtml =
    `<div class="chat-message d-flex mb-3">
    <div class="message-avatar ms-3">
        <img src="${userData.profile_image == null
            ? window.location.origin +'/public/front_assets/images/reviw1.png' 
            : window.location.origin +'/public/admin/uploads/user/' + userData.profile_image}" 
          alt="Sender Avatar" class="rounded-circle">
        <p>${userData.name}</p>
    </div>
      <div class="message-content">
        <div class="message-bubble bg-white p-2 rounded">
          <p>${userData.msg}<br><span>${userData.time}</span></p>
        </div>
      </div>
      </div>`;
  }

  $('#chat_div').append(messageHtml);

// Optionally scroll to the bottom of the chat for new messages
  $('#chat_div').animate({
        scrollTop: $('#chat_div')[0].scrollHeight
    }, 500);

  });
</script>

<script>

  $(document).on('click', '.merchant-item', function() {
    const merchantId = $(this).data('id'); // Get the data-id attribute

    // Perform AJAX request
    $.ajax({
        url: "{{url('/getMerchent')}}", // Replace with your backend route
        type: 'POST', 
        datatype: "html",// or 'GET' depending on your requirement
        data: {
            id: merchantId,
            _token: '{{ csrf_token() }}' // Include CSRF token for security if using Laravel
        },
        success: function(response) {
            $('#chat_container').show();
            $('#chat_head').hide();
            $('#chat_div').html(response)
        },
        error: function(xhr) {
            // Handle error
            console.error('Error:', xhr.responseText);
        }
    });
});

$(document).on('keypress', '#my_msg', function(event) {
		if (event.which == 13) {
			var message = $('#my_msg').val();
			//var  message = $("#message").val();
			if ($.trim(message) == '') {
				$('#error_message').show();
				return false;
			} else {
				event.preventDefault();
				myFunction();
			}
		}
});


</script>

<script>
  function myFunction() {
    var my_msg = $('#my_msg').val();
    var sender_id = $('#auth_id').val();
    var reciver_id = $('#reciver_id').val();
    var reply_message_id = $('#reply_message_id').val();

    if ($.trim(my_msg) == '') {
				$('#error_message').show();
				return false;
			} else {
        $('#error_message').hide();
		}

    var userTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;

    $.ajax({
        url: "{{url('/userMessageSubmit')}}", // Replace with your backend route
        type: 'POST', 
        datatype: "json",// or 'GET' depending on your requirement
        data: {
          my_msg: my_msg,
          sender_id: sender_id,
          reciver_id: reciver_id,
          reply_message_id: reply_message_id,
          userTimeZone: userTimeZone,
            _token: '{{ csrf_token() }}' // Include CSRF token for security if using Laravel
        },
        success: function(response) {
          $('#my_msg').val('');
          $('#chat_div').append(response.html);
        },
        error: function(xhr) {
            // Handle error
            console.error('Error:', xhr.responseText);
        }
    });

    
  }
</script>
@endsection
