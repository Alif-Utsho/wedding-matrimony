<div class="col-md-12 col-lg-6 col-xl-4 db-sec-com">
    <h2 class="db-tit">Profiles status</h2>
    <div class="db-pro-stat">
        <h6>Profile completion</h6>
        {{-- <div class="dropdown">
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
        </div> --}}
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