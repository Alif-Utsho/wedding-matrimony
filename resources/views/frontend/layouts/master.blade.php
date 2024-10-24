<!doctype html>
<html lang="en">



<head>
    <title>Wedding Matrimony</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="{{ asset($generalsetting->favicon) }}" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    @stack('css')

</head>

<body>
    <!-- PRELOADER -->
    <div id="preloader">
        <div class="plod">
            <span class="lod1"><img src="{{ asset('frontend/images/loder/1.png') }}" alt=""
                    loading="lazy"></span>
            <span class="lod2"><img src="{{ asset('frontend/images/loder/2.png') }}" alt=""
                    loading="lazy"></span>
            <span class="lod3"><img src="{{ asset('frontend/images/loder/3.png') }}" alt=""
                    loading="lazy"></span>
        </div>
    </div>
    <div class="pop-bg"></div>
    <!-- END PRELOADER -->

    @include('frontend.layouts.header')
    @include('frontend.layouts.header-mobile')

    @include('frontend.includes.login-modal')
    
    @yield('content')


    <!-- FOOTER -->
    <section class="wed-hom-footer">
        <div class="container">
            <div class="row foot-supp">
                <h2><span>Free support:</span> {{ $contactinfo->phone }} |<span>Email:</span>
                    {{ $contactinfo->email }}</h2>
            </div>
            <div class="row wed-foot-link wed-foot-link-1">
                <div class="col-md-4">
                    <h4>Get In Touch</h4>
                    <p>Address: {{ $contactinfo->address }}
                    </p>
                    <p>Phone: <a href="tel:{{ $contactinfo->phone }}">{{ $contactinfo->phone }}</a></p>
                    <p>Email: <a href="mailto:{{ $contactinfo->email }} ">{{ $contactinfo->email }} </a></p>
                </div>
                <div class="col-md-4">
                    <h4>HELP &amp; SUPPORT</h4>
                    <ul>
                        <li><a href="about-us.html">About company</a>
                        </li>
                        <li><a href="#!">Contact us</a>
                        </li>
                        <li><a href="#!">Feedback</a>
                        </li>
                        <li><a href="about-us.html#faq">FAQs</a>
                        </li>
                        <li><a href="about-us.html#testimonials">Testimonials</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 fot-soc">
                    <h4>SOCIAL MEDIA</h4>
                    <ul>
                        <li><a href="#!"><img src="{{ asset('frontend/images/social/1.png') }}"
                                    alt=""></a></li>
                        <li><a href="#!"><img src="{{ asset('frontend/images/social/2.png') }}"
                                    alt=""></a></li>
                        <li><a href="#!"><img src="{{ asset('frontend/images/social/3.png') }}"
                                    alt=""></a></li>
                        <li><a href="#!"><img src="{{ asset('frontend/images/social/5.png') }}"
                                    alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="row foot-count">
                <p>Sis Media - Trusted by over thousands of Boys & Girls for successfull marriage. <a
                        href="sign-up.html" class="btn btn-primary btn-sm">Join us today !</a></p>
            </div>
        </div>
    </section>
    <!-- END -->


    <!-- COPYRIGHTS -->
    <section>
        <div class="cr">
            <div class="container">
                <div class="row">
                    <p>Copyright © 2024 <a href="#!" target="_blank">sismedia.com</a> All
                        rights reserved.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/select-opt.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    @stack('script')
    
</body>

</html>
