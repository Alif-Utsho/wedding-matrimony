@extends('frontend.layouts.usermaster')
@section('user_content')
    <div class="col-md-8 col-lg-9">
        <div class="row">
            <div class="col-md-12 db-sec-com">
                <h2 class="db-tit">Chat list</h2>
                <div class="db-pro-stat">
                    <div class="db-chat">
                        <ul>
                            @forelse($chatListUsers as $chatuser)
                                <li class="db-chat-trig chat-now-btn" data-user-id="{{ $chatuser->id }}">
                                    <div class="db-chat-pro"> <img src="{{ asset($chatuser->profile->image) }}"
                                            alt=""> </div>
                                    <div class="db-chat-bio">
                                        <h5>{{ $chatuser->name }}</h5>
                                        <span
                                            class="message-text {{ $chatuser->message->sender_id == $chatuser->id && !$chatuser->message->is_read ? 'fw-bold' : '' }}">{{ $chatuser->message->message }}</span>
                                    </div>
                                    <div class="db-chat-info">
                                        <div class="time new">
                                            {{-- <span class="timer">{{ $chatuser->message->created_at->format(show only time with pm/am if time less than 24 hour, else show data ) }}</span> --}}
                                            <span class="timer">
                                                @if ($chatuser->message->created_at->isToday())
                                                    {{ $chatuser->message->created_at->format('h:i A') }}
                                                @else
                                                    {{ $chatuser->message->created_at->format('M d, Y') }}
                                                @endif
                                            </span>
                                            @if ($chatuser->unread > 0)
                                                <span class="cont unread-count">{{ $chatuser->unread }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
