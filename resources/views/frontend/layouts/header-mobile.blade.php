<!-- EXPLORE MENU POPUP -->
<div class="mob-me-all mobile_menu">
    <div class="mob-me-clo"><img src="{{ asset('frontend/images/icon/close.svg') }}" alt=""></div>
    <div class="mv-bus">
        <h4><i class="fa fa-globe" aria-hidden="true"></i> EXPLORE CATEGORY</h4>
        <ul>
            <li><a href="all-profiles.html">All profiles</a></li>
            <li><a href="plans.html">Plans</a></li>
            <li><a href="sign-up.html">Register</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>

        <div class="menu-pop-help">
            <h4>Support Team</h4>
            <div class="user-pro">
                <img src="{{ asset($advisor->image) }}" alt="" loading="lazy">
            </div>
            <div class="user-bio">
                <h5>{{ $advisor->title }}</h5>
                <span>{{ $advisor->designation }}</span>
                <a href="/enquiry" class="btn btn-primary btn-sm">Ask your doubts</a>
            </div>
        </div>
        <div class="menu-pop-soci">
            <ul>
                <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#!"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="late-news">
            <h4>Latest news</h4>
            <ul>
                @foreach ($blogs as $blog)
                    <li>
                        <div class="rel-pro-img">
                            <img src="{{ asset($blog->image) }}" alt="" loading="lazy">
                        </div>
                        <div class="rel-pro-con">
                            <h5>{{ $blog->title }}</h5>
                            <span class="ic-date">{{ \Carbon\Carbon::parse($blog->date)->format('d, M Y') }}</span>
                        </div>
                        <a href="/blog-details/{{ $blog->id }}" class="fclick"></a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="prof-rhs-help">
            <div class="inn">
                <h3>Tell us your Needs</h3>
                <p>Tell us what kind of service you are looking for.</p>
                <a href="/enquiry">Send Enquiry</a>
            </div>
        </div>
    </div>
</div>
<!-- END MOBILE MENU POPUP -->

<!-- MOBILE USER PROFILE MENU POPUP -->
<div class="mob-me-all dashbord_menu">
    <div class="mob-me-clo"><img src="{{ asset('frontend/images/icon/close.svg') }}" alt=""></div>
    <div class="mv-bus">
        @if (Auth::guard('user')->check())
            <div class="head-pro">
                <img src="{{ asset(Auth::guard('user')->user()->profile ? Auth::guard('user')->user()->profile->image : 'frontend/images/logoo.png') }}"
                    alt="" loading="lazy">
                <b>user profile</b><br>
                <h4>{{ Auth::guard('user')->user()->name }}</h4>
            </div>
            <ul>
                <li><a href="/plans">Pricing plans</a></li>
                <li><a href="/all-profile">Browse profiles</a></li>
            </ul>
        @else
            <ul>
                <li><a href="/user/login">Login</a></li>
                <li><a href="/user/register">Sign-up</a></li>
                <li><a href="/plans">Pricing plans</a></li>
                <li><a href="/all-profile">Browse profiles</a></li>
            </ul>
        @endif
    </div>
</div>
<!-- END USER PROFILE MENU POPUP -->
