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
                    <a href="index.html" class="logo-brand"><img src="{{ asset('frontend/images/logoo.png') }}"
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
                                            <li>
                                                <div class="menu-box menu-box-2">
                                                    <h5>Browse profiles <span>1200+ Verified profiles</span></h5>
                                                    <span class="explor-cta">More details</span>
                                                    <a href="all-profiles.html" class="fclick"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="menu-box menu-box-1">
                                                    <h5>Wedding page <span>Make reservation</span></h5>
                                                    <span class="explor-cta">More details</span>
                                                    <a href="wedding.html" class="fclick"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="menu-box menu-box-3">
                                                    <h5>All Services<span>Lorem ipsum dummy</span></h5>
                                                    <span class="explor-cta">More details</span>
                                                    <a href="services.html" class="fclick"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="menu-box menu-box-4">
                                                    <h5>Join Now <span>Lorem ipsum dummy</span></h5>
                                                    <span class="explor-cta">More details</span>
                                                    <a href="plans.html" class="fclick"></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                        <li><a href="all-profiles.html">All Profiles</a></li>
                        <li><a href="plans.html">Plans</a></li>
                        <li><a href="sign-up.html">Register</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li class="smenu-pare">
                            <span class="smenu">Dashboard</span>
                            <div class="smenu-open smenu-single">
                                <ul>
                                    <li><a href="user-dashboard.html">Dashboard</a></li>
                                    <li><a href="user-profile.html">My profile</a></li>
                                    <li><a href="user-interests.html">Interests</a></li>
                                    <li><a href="user-chat.html">Chat lists</a></li>
                                    <li><a href="user-plan.html">My plan details</a></li>
                                    <li><a href="user-setting.html">Profile settings</a></li>
                                    <li><a href="user-profile-edit.html">Edit full profile</a></li>
                                    <li><a href="login.html">Sign in</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- USER PROFILE -->
                <div class="al">
                    <div class="head-pro">
                        <img src="{{ asset('frontend/images/profiles/1.jpg') }}" alt="" loading="lazy">
                        <b>Advisor</b><br>
                        <h4>Ashley emyy</h4>
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
            </div>
        </div>
    </div>
</div>
<!-- END -->

<!-- EXPLORE MENU POPUP -->
<div class="mob-me-all mobile_menu">
    <div class="mob-me-clo"><img src="{{ asset('frontend/images/icon/close.svg') }}" alt=""></div>
    <div class="mv-bus">
        <h4><i class="fa fa-globe" aria-hidden="true"></i> EXPLORE CATEGORY</h4>
        <ul>
            <li><a href="all-profiles.html">All profiles</a></li>
            <li><a href="plans.html">Plans</a></li>
            <li><a href="sign-up.html">Register</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        
        <div class="menu-pop-help">
            <h4>Support Team</h4>
            <div class="user-pro">
                <img src="{{ asset('frontend/images/profiles/1.jpg') }}" alt="" loading="lazy">
            </div>
            <div class="user-bio">
                <h5>Ashley emyy</h5>
                <span>Senior personal advisor</span>
                <a href="enquiry.html" class="btn btn-primary btn-sm">Ask your doubts</a>
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
        <div class="prof-rhs-help">
            <div class="inn">
                <h3>Tell us your Needs</h3>
                <p>Tell us what kind of service you are looking for.</p>
                <a href="enquiry.html">Register for free</a>
            </div>
        </div>
    </div>
</div>
<!-- END MOBILE MENU POPUP -->

<!-- MOBILE USER PROFILE MENU POPUP -->
<div class="mob-me-all dashbord_menu">
    <div class="mob-me-clo"><img src="{{ asset('frontend/images/icon/close.svg') }}" alt=""></div>
    <div class="mv-bus">
        <div class="head-pro">
            <img src="{{ asset('frontend/images/profiles/1.jpg') }}" alt="" loading="lazy">
            <b>user profile</b><br>
            <h4>Ashley emyy</h4>
        </div>
        <ul>
            <li><a href="login.html">Login</a></li>
            <li><a href="sign-up.html">Sign-up</a></li>
            <li><a href="plans.html">Pricing plans</a></li>
            <li><a href="all-profiles.html">Browse profiles</a></li>
        </ul>
    </div>
</div>
<!-- END USER PROFILE MENU POPUP -->