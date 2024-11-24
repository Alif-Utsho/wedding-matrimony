@extends('frontend.layouts.usermaster')
@section('user_content')

    <div class="col-md-8 col-lg-9">
        @if ($matchingUsers->count() > 0)
            <div class="col-md-12 db-sec-com db-new-pro-main">
                <h2 class="db-tit">New Profiles Matches</h2>
                <ul class="slider">
                    @foreach ($matchingUsers as $matchingUser)
                        <li>
                            <div class="db-new-pro">
                                <img src="{{ asset($matchingUser->profile->image) }}" alt="" class="profile">
                                <div>
                                    <h5>{{ $matchingUser->name }}</h5>
                                    <span class="city">{{ $matchingUser->profile->city->name }}</span>
                                    <span class="age">{{ $matchingUser->profile->age }} Years old</span>
                                </div>
                                {{-- <div class="pro-ave" title="User currently available">
                        <span class="pro-ave-yes"></span>
                    </div> --}}
                                <a href="/profile/{{ $matchingUser->slug }}" class="fclick" target="_blank">&nbsp;</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            @include('frontend.includes.profile-card')
            @include('frontend.includes.plan-card')
            <div class="col-lg-12 col-xl-4 db-sec-com">
                <h2 class="db-tit">Recent chat list</h2>
                <div class="db-pro-stat">
                    <div class="db-inte-prof-list db-inte-prof-chat">
                        <ul>
                            @forelse($chatListUsers as $chatuser)
                                <li>
                                    <div class="db-int-pro-1"> <img src="{{ asset($chatuser->profile->image) }}"
                                            alt=""> </div>
                                    <div class="db-int-pro-2">
                                        <h5>{{ $chatuser->name }}</h5> <span>{{ $chatuser->profile->city->name }}</span>
                                    </div>
                                </li>
                            @empty
                                <li>Not available</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 db-sec-com">
                <h2 class="db-tit">Profiles views</h2>
                <div class="chartin">
                    <canvas id="Chart_leads"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection
