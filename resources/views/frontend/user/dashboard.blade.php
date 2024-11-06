@extends('frontend.layouts.usermaster')
@section('user_content')

<div class="col-md-8 col-lg-9">
    @if($matchingUsers->count()>0)
    <div class="col-md-12 db-sec-com db-new-pro-main">
        <h2 class="db-tit">New Profiles Matches</h2>
        <ul class="slider">
            @foreach($matchingUsers as $matchingUser)
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
        <div class="col-md-12 col-lg-6 col-xl-4 db-sec-com">
            <h2 class="db-tit">Profiles status</h2>
            <div class="db-pro-stat">
                <h6>Profile completion</h6>
                <div class="dropdown">
                    <button type="button" class="btn btn-outline-secondary"
                        data-bs-toggle="dropdown">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('user.profileEdit') }}">Edit profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">View Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.setting') }}">Profile Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="db-pro-pgog">
                    <span><b class="count">{{ $profile_completion }}</b>%</span>
                </div>
                <ul class="pro-stat-ic">
                    <li><span><i class="fa fa-heart-o like" aria-hidden="true"></i><b>{{ Auth::guard('user')->user()->profileLikes()->count() }}</b>Likes</span></li>
                    <li><span><i class="fa fa-eye view" aria-hidden="true"></i><b>{{ Auth::guard('user')->user()->profileViews()->count() }}</b>Views</span></li>
                    <li><span><i class="fa fa-handshake-o inte" aria-hidden="true"></i><b>{{ Auth::guard('user')->user()->invitations()->count() }}</b>Interests</span></li>
                    <li><span><i class="fa fa-hand-pointer-o clic" aria-hidden="true"></i><b>{{ Auth::guard('user')->user()->profileClicks()->count() }}</b>Clicks</span></li>
                </ul>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4 db-sec-com">
            <h2 class="db-tit">Plan details</h2>
            <div class="db-pro-stat">
                <h6 class="tit-top-curv">Current plan</h6>
                <div class="dropdown">
                    <button type="button" class="btn btn-outline-secondary"
                        data-bs-toggle="dropdown">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('user.plan') }}">View Details</a></li>
                        <li><a class="dropdown-item" href="{{ url('plans') }}">Plan Change</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.plan') }}">Download Invoice</a></li>
                    </ul>
                </div>
                <div class="db-plan-card">
                    <img src="{{ asset('frontend/images/icon/plan.png') }}" alt="">
                </div>
                <div class="db-plan-detil">
                    <ul>
                        <li>Plan name: <strong>{{ $package->name }}</strong></li>
                        @if ($userPackage !== null)
                            <li>Validity:
                                <strong>
                                    @if ($package->duration >= 30)
                                        {{ round($package->duration / 30, 1) }}
                                        {{ Str::plural('Month', round($package->duration / 30, 1)) }}
                                    @else
                                        {{ $package->duration }} {{ Str::plural('Day', $package->duration) }}
                                    @endif
                                </strong>
                            </li>
                            <li>Valid till
                                <strong>{{ Carbon\Carbon::parse($userPackage->expired_at)->format('d M Y') }}</strong>
                            </li>
                        @endif
                        <li><a href="/plans" class="cta-3">Upgrade now</a></li>
                    </ul>
                </div>
            </div>
        </div>
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