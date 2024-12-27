
<input type="hidden" name="" id="reciver_id" value="{{$merchent->vendor_id? $merchent->vendor_id :'0'}}">
  @foreach ($chats as $chat)
      @if ($chat->sender_id != $customer->id)
          <!-- User's (Sender) Message -->
          
          <div class="chat-message d-flex mb-3">
              <div class="message-avatar me-3">
                <img src="{{$merchent->profile_image==''? url('/public').'/front_assets/images/reviw1.png': url('/public').'/admin/uploads/user/'.$merchent->profile_image}}" alt="Receiver Avatar" class="rounded-circle">
                <p>{{$merchent->first_name}}</p>
              </div>
              <div class="message-content">
                <div class="message-bubble bg-white p-2 rounded">
                  <p>{{ $chat->msg }}<br><span class="timestamp">{{ \Carbon\Carbon::parse($chat->created_at)->format('h:i A') }}</span></p>
                </div>
              </div>
            </div>

      @else
          <!-- Merchant's (Receiver) Message -->
        
          <div class="chat-message d-flex justify-content-end mb-3">
            <div class="message-content text-end">
              <div class="message-bubble bg-primary text-white p-2 rounded">
                <p>{{ $chat->msg }}<br><span class="timestamp">{{ \Carbon\Carbon::parse($chat->created_at)->format('h:i A') }}</span></p>
              </div>
            </div>
            <div class="message-avatar ms-3">
              <img src="{{$customer->profile_image==''? url('/public').'/front_assets/images/reviw1.png': url('/public').'/admin/uploads/user/'.$customer->profile_image}}" alt="Sender Avatar" class="rounded-circle">
              <p>{{$customer->first_name}}</p>
            </div>
          </div>
      @endif
  @endforeach


