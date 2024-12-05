<!-- CHAT CONVERSATION BOX START -->
<div class="chatbox">
    <span class="comm-msg-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>

    <div class="inn">
        <div class="s1">
            <img src="{{ asset($user->profile->image) }}" class="intephoto2" alt="">
            <h4><b class="intename2">{{ $user->name }}</b></h4>
            @if ($user->active_status)
                <span class="avlsta avilyes">Available online</span>
            @else
                <span class="avlsta avilno">{{ \Carbon\Carbon::parse($user->last_active)->diffForHumans() }}</span>
            @endif
        </div>
        <div class="s2 chat-box-messages h-100">

            <div class="chat-con" id="chat-box-message">

            </div>
            <div class=""></div>
        </div>
        <form method="post">
            <div class="s3">
                <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                <input type="text" name="chat_message" placeholder="Type a message here.." required="">
                <button id="chat_send1" name="chat_send" type="submit">Send <i class="fa fa-paper-plane-o"
                        aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<!-- END -->

<script>
    $(document).ready(function() {
        function loadMessages(receiverId) {
            $.ajax({
                url: "{{ route('chat.getMessages') }}",
                type: 'GET',
                data: {
                    receiver_id: receiverId,
                },
                success: function(response) {
                    // $('.chat-box-messages').empty();
                    $('#chat-box-message').html(response);
                    scrollToBottom();
                },
                error: function(xhr) {
                    console.log('Error:', xhr.responseText);
                }
            });
        }

        function scrollToBottom() {
            const chatContainer = $('.chat-box-messages');
            chatContainer.scrollTop(chatContainer[0].scrollHeight);
        }

        $('form').on('submit', function(e) {
            e.preventDefault();
            var receiverId = $('input[name="receiver_id"]').val();
            var message = $('input[name="chat_message"]').val();

            if (message.trim() === '') {
                alert('Please type a message.');
                return;
            }

            $.ajax({
                url: "{{ route('user.chat.send') }}",
                type: 'POST',
                data: {
                    receiver_id: receiverId,
                    message: message,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('input[name="chat_message"]').val('');
                    // $('#chat-box-content').append('<p>' + response.message + '</p>');
                    loadMessages(receiverId);
                },
                error: function(xhr) {
                    console.log('Error:', xhr.responseText);
                }
            });
        });

    });
</script>

<script>
    $(".comm-msg-pop-clo").on('click', function() {
        $(".chatbox").removeClass("open")
    });
</script>
