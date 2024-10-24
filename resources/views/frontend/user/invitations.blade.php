@extends('frontend.layouts.usermaster')
@section('user_content')
    <div class="col-md-8 col-lg-9">
        <div class="row">
            <div class="col-md-12 db-sec-com">
                <h2 class="db-tit">Interest request</h2>
                <div class="db-pro-stat">
                    
                    <div class="db-inte-main">

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#allinvitations">New requests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#accepted">Accepted request</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#deny">Deny request</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#sent">Sent request</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="allinvitations" class="container tab-pane active"><br>
                                <div class="db-inte-prof-list">
                                    <ul>
                                        
                                        @forelse($invitations as $invitation)
                                            @if($invitation->status==null)
                                            <li>
                                                <div class="db-int-pro-1"> <img src="{{ asset($invitation->from_user->profile->image) }}" alt="">
                                                    <span class="badge bg-primary user-pla-pat">Platinum user</span></div>
                                                <div class="db-int-pro-2">
                                                    <h5>{{ $invitation->from_user->name }}</h5>
                                                    <ol class="poi">
                                                        <li>City: <strong>{{ $invitation->from_user->profile->city->name }}</strong></li>
                                                        <li>Age: <strong>{{ $invitation->from_user->profile->age }}</strong></li>
                                                        <li>Height: <strong>{{ $invitation->from_user->profile->height }}</strong></li>
                                                        <li>Job: <strong>{{ $invitation->from_user->profile->career->type }}</strong></li>
                                                    </ol>
                                                    <ol class="poi poi-date">
                                                        <li>Request on: {{ $invitation->created_at->format('h:i A, d F Y') }}</li>
                                                    </ol>
                                                    <a href="/profile/{{ $invitation->from_user->slug }}" class="cta-5" target="_blank">View full
                                                        profile</a>
                                                </div>
                                                <div class="db-int-pro-3">
                                                    <button type="button" class="btn btn-success btn-sm">Accept</button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm">Deny</button>
                                                </div>
                                            </li>
                                            @endif
                                        @empty
                                        <p>No Invitations</p>
                                        @endforelse
                                        
                                    </ul>
                                </div>
                            </div>
                            <div id="accepted" class="container tab-pane fade"><br>
                                <div class="db-inte-prof-list">
                                    <ul>
                                        @forelse($invitations as $invitation)
                                            @if($invitation->status==1)
                                            <li>
                                                <div class="db-int-pro-1"> <img src="{{ asset($invitation->from_user->profile->image) }}" alt="">
                                                    <span class="badge bg-primary user-pla-pat">Platinum user</span></div>
                                                <div class="db-int-pro-2">
                                                    <h5>{{ $invitation->from_user->name }}</h5>
                                                    <ol class="poi">
                                                        <li>City: <strong>{{ $invitation->from_user->profile->city->name }}</strong></li>
                                                        <li>Age: <strong>{{ $invitation->from_user->profile->age }}</strong></li>
                                                        <li>Height: <strong>{{ $invitation->from_user->profile->height }}</strong></li>
                                                        <li>Job: <strong>{{ $invitation->from_user->profile->career->type }}</strong></li>
                                                    </ol>
                                                    <ol class="poi poi-date">
                                                        <li>Request on: {{ $invitation->created_at->format('h:i A, d F Y') }}</li>
                                                    </ol>
                                                    <a href="/profile/{{ $invitation->from_user->slug }}" class="cta-5" target="_blank">View full
                                                        profile</a>
                                                </div>
                                                <div class="db-int-pro-3">
                                                    <button type="button" class="btn btn-success btn-sm">Accept</button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm">Deny</button>
                                                </div>
                                            </li>
                                            @endif
                                        @empty
                                        <p>No Invitations</p>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                            <div id="deny" class="container tab-pane fade"><br>
                                <div class="db-inte-prof-list">
                                    <ul>
                                        @forelse($invitations as $invitation)
                                            @if($invitation->status===0)
                                            <li>
                                                <div class="db-int-pro-1"> <img src="{{ asset($invitation->from_user->profile->image) }}" alt="">
                                                    <span class="badge bg-primary user-pla-pat">Platinum user</span></div>
                                                <div class="db-int-pro-2">
                                                    <h5>{{ $invitation->from_user->name }}</h5>
                                                    <ol class="poi">
                                                        <li>City: <strong>{{ $invitation->from_user->profile->city->name }}</strong></li>
                                                        <li>Age: <strong>{{ $invitation->from_user->profile->age }}</strong></li>
                                                        <li>Height: <strong>{{ $invitation->from_user->profile->height }}</strong></li>
                                                        <li>Job: <strong>{{ $invitation->from_user->profile->career->type }}</strong></li>
                                                    </ol>
                                                    <ol class="poi poi-date">
                                                        <li>Request on: {{ $invitation->created_at->format('h:i A, d F Y') }}</li>
                                                    </ol>
                                                    <a href="/profile/{{ $invitation->from_user->slug }}" class="cta-5" target="_blank">View full
                                                        profile</a>
                                                </div>
                                                <div class="db-int-pro-3">
                                                    <button type="button" class="btn btn-success btn-sm">Accept</button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm">Deny</button>
                                                </div>
                                            </li>
                                            @endif
                                        @empty
                                        <p>No Invitations</p>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>

                            <div id="sent" class="container tab-pane fade"><br>
                                <div class="db-inte-prof-list">
                                    <ul>
                                        @forelse($sent_invitations as $invitation)
                                            <li>
                                                <div class="db-int-pro-1"> <img src="{{ asset($invitation->to_user->profile->image) }}" alt="">
                                                    <span class="badge bg-primary user-pla-pat">Platinum user</span></div>
                                                <div class="db-int-pro-2">
                                                    <h5>{{ $invitation->to_user->name }}</h5>
                                                    <ol class="poi">
                                                        <li>City: <strong>{{ $invitation->to_user->profile->city->name }}</strong></li>
                                                        <li>Age: <strong>{{ $invitation->to_user->profile->age }}</strong></li>
                                                        <li>Height: <strong>{{ $invitation->to_user->profile->height }}</strong></li>
                                                        <li>Job: <strong>{{ $invitation->to_user->profile->career->type }}</strong></li>
                                                    </ol>
                                                    <ol class="poi poi-date">
                                                        <li>Request on: {{ $invitation->created_at->format('h:i A, d F Y') }}</li>
                                                    </ol>
                                                    <a href="/profile/{{ $invitation->to_user->slug }}" class="cta-5" target="_blank">View full
                                                        profile</a>
                                                </div>
                                                <div class="db-int-pro-3">
                                                    <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                </div>
                                            </li>
                                        @empty
                                        <p>No Invitations</p>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('user-script')
    @endpush
@endsection
