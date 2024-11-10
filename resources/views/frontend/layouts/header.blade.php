<!-- POPUP SEARCH -->
<div class="pop-search">
    <span class="ser-clo">+</span>
    <div class="inn">
        <form>
            <input type="text" placeholder="Search here...">
        </form>
        <div class="rel-sear">
            <h4>Top searches:</h4>
            <a href="/all-profile">Browse all profiles</a>
            <a href="/all-profile">Mens profile</a>
            <a href="/all-profile">Female profile</a>
            <a href="/all-profile">New profiles</a>
        </div>
    </div>
</div>
<!-- END -->

<!-- TOP MENU -->
<div class="head-top">
    <div class="container">
        <div class="row">
            <div class="lhs">
                <ul>
                    <li><a href="#!" class="ser-open"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="rhs">
                <ul>
                    <li><a href="tel:01678337722"><i class="fa fa-phone"
                                aria-hidden="true"></i>&nbsp;01678337722</a></li>
                    <li><a href="mailto: messageappsis@gmail.com "><i class="fa fa-envelope-o"
                                aria-hidden="true"></i>&nbsp; messageappsis@gmail.com </a></li>
                    <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END -->

<!-- MENU POPUP -->
<div class="menu-pop menu-pop1">
    <span class="menu-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
    <div class="inn">
        <img src="{{ asset('frontend/images/bibaaha.png') }}" alt="" loading="lazy" class="logo-brand-only">
        <p><strong>Best Wedding Matrimony</strong> lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu
            fringilla.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <ul class="menu-pop-info">
            <li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> {{ $contactinfo->phone }}</a></li>
            <li><a href="{{ $contactinfo->whatsapp }}"><i class="fa fa-whatsapp" aria-hidden="true"></i>{{ $contactinfo->phone }}
                </a></li>
            <li><a href="#!"><i class="fa fa-envelope-o" aria-hidden="true"></i>{{ $contactinfo->email }} </a>
            </li>
            <li><a href="#!"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $contactinfo->address }}</a></li>
        </ul>
        <div class="menu-pop-help">
            <h4>Support Team</h4>
            <div class="user-pro">
                <img src="{{ asset('frontend/images/profiles/1.jpg') }}" alt="" loading="lazy">
            </div>
            <div class="user-bio">
                <h5>Ashley emyy</h5>
                <span>Senior personal advisor</span>
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
    </div>
</div>
<!-- END -->

<!-- CONTACT EXPERT -->
<div class="menu-pop menu-pop2">
    <span class="menu-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
    <div class="inn">
        <div class="menu-pop-help">
            <h4>Support Team</h4>
            <div class="user-pro">
                <img src="{{ asset('frontend/images/profiles/1.jpg') }}" alt="" loading="lazy">
            </div>
            <div class="user-bio">
                <h5>Ashley emyy</h5>
                <span>Senior personal advisor</span>
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
                <li>
                    <div class="rel-pro-img">
                        <img src="{{ asset('frontend/images/couples/1.jpg') }}" alt="" loading="lazy">
                    </div>
                    <div class="rel-pro-con">
                        <h5>Long established fact that a reader distracted</h5>
                        <span class="ic-date">12 Dec 2023</span>
                    </div>
                    <a href="blog-detail.html" class="fclick"></a>
                </li>
                <li>
                    <div class="rel-pro-img">
                        <img src="{{ asset('frontend/images/couples/3.jpg') }}" alt="" loading="lazy">
                    </div>
                    <div class="rel-pro-con">
                        <h5>Long established fact that a reader distracted</h5>
                        <span class="ic-date">12 Dec 2023</span>
                    </div>
                    <a href="blog-detail.html" class="fclick"></a>
                </li>
                <li>
                    <div class="rel-pro-img">
                        <img src="{{ asset('frontend/images/couples/4.jpg') }}" alt="" loading="lazy">
                    </div>
                    <div class="rel-pro-con">
                        <h5>Long established fact that a reader distracted</h5>
                        <span class="ic-date">12 Dec 2023</span>
                    </div>
                    <a href="blog-detail.html" class="fclick"></a>
                </li>
            </ul>
        </div>

        <!-- HELP BOX -->
        <div class="prof-rhs-help">
            <div class="inn">
                <h3>Tell us your Needs</h3>
                <p>Tell us what kind of service you are looking for.</p>
                <a href="/enquiry">Register for free</a>
            </div>
        </div>
        <!-- END HELP BOX -->
    </div>
</div>
<!-- END -->

<!-- MAIN MENU -->
<div class="hom-top">
    <div class="container">
        <div class="row">
            <div class="hom-nav">
                <!-- LOGO -->
                <div class="logo">
                    <span class="menu desk-menu">
                        <i></i><i></i><i></i>
                    </span>
                    <a href="/" class="logo-brand"><img src="{{ asset($generalsetting->logo) }}"
                            alt="" loading="lazy" class="ic-logo"></a>
                </div>

                <!-- EXPLORE MENU -->
                <div class="bl">
                    <ul>
                        <li class="smenu-pare">
                            <span class="smenu">Explore</span>
                            <div class="smenu-open smenu-box">
                                <div class="container">
                                    <div class="row">
                                        <h4 class="tit">Explore category</h4>
                                        <ul>
                                            @foreach($navServices as $service)
                                            <li>
                                                <div class="menu-box menu-box-{{ $loop->iteration }}" style="background-image: url({{ asset($service->image) }})">
                                                    <h5>{{ $service->name }} <span>{{ $service->title }}</span></h5>
                                                    <span class="explor-cta">More details</span>
                                                    <a href="{{ url($service->link) }}" class="fclick"></a>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                        <li><a href="/all-profile">All Profiles</a></li>
                        <li><a href="/plans">Plans</a></li>
                        @if(!Auth::guard('user')->check())
                        <li><a href="/user/register">Register</a></li>
                        @endif
                        <li><a href="/contact">Contact</a></li>
                        @if(Auth::guard('user')->check())
                        <li class="smenu-pare">
                            <span class="smenu">Dashboard</span>
                            <div class="smenu-open smenu-single">
                                <ul>
                                    <li><a href="/user/dashboard">Dashboard</a></li>
                                    <li><a href="/user/profile">My profile</a></li>
                                    <li><a href="/user/invitations">Interests</a></li>
                                    <li><a href="{{ route('user.chat.list') }}">Chat lists</a></li>
                                    <li><a href="/user/plan">My plan details</a></li>
                                    <li><a href="/user/setting">Profile settings</a></li>
                                    <li><a href="/user/profile-edit">Edit full profile</a></li>
                                </ul>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>

                
                <!-- USER PROFILE -->
                @if(Auth::guard('user')->check())
                <div class="al">
                    <div class="head-pro">
                        <img src="{{ asset(Auth::guard('user')->user()->profile ? Auth::guard('user')->user()->profile->image : 'frontend/images/logoo.png') }}" alt="" loading="lazy">
                        <b>Welcome</b><br>
                        <h4>{{ Auth::guard('user')->user()->name }}</h4>
                        <span class="fclick"></span>
                    </div>
                </div>

                <!--MOBILE MENU-->
                <div class="mob-menu">
                    <div class="mob-me-ic">
                        <span class="ser-open mobile-ser">
                            <img src="{{ asset('frontend/images/icon/search.svg') }}" alt="">
                        </span>
                        <span class="mobile-exprt" data-mob="dashbord">
                            <img src="{{ asset('frontend/images/icon/users.svg') }}" alt="">
                        </span>
                        <span class="mobile-menu" data-mob="mobile">
                            <img src="{{ asset('frontend/images/icon/menu.svg') }}" alt="">
                        </span>
                    </div>
                </div>
                <!--END MOBILE MENU-->
                @endif
            </div>
        </div>
    </div>
</div>
<!-- END -->