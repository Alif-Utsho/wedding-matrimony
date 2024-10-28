
@forelse($messages as $chat)
    @if($chat->sender_id == Auth::guard('user')->user()->id)
    <div class="row">
        <div class="col-12 mb-1">
            <div class="chat-rhs">{{ $chat->message }}</div> 
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-12 mb-1">
            <div class="chat-lhs">{{ $chat->message }}</div>
        </div>
    </div>
    @endif
@empty
<span class="chat-wel">Start a new chat!!! now</span>
@endforelse