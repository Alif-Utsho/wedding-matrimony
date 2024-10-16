@extends('frontend.layouts.master')
@section('content')
    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ab-ban pg-cont">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <span>We are here to assist you.</span>
                                <h1>Contact us</h1>
                                <p>Most Trusted and premium Matrimony Service in the World.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="ab-sec2 pg-cont">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <div class="we-here">
                                <h3>Our office</h3>
                                <p>{{ $contactinfo->bio }}</p>
                                <span><i class="fa fa-phone" aria-hidden="true"></i>{{ $contactinfo->phone }}</span>
                                <span><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $contactinfo->email }} </span>
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $contactinfo->address }} </span>
                            </div>
                        </li>
                        <li>
                            <div class="we-cont">
                                <img src="{{ asset('frontend/images/icon/trust.png') }}" alt="">
                                <h4>Customer Relations</h4>
                                <p>Most Trusted and premium Matrimony Service in the World.</p>
                                <a href="#!" class="cta-rou-line">Get Support</a>
                            </div>
                        </li>
                        <li>
                            <div class="we-cont">
                                <img src="{{ asset('frontend/images/icon/telephone.png') }}" alt="">
                                <h4>WhatsApp Support</h4>
                                <p>Most Trusted and premium Matrimony Service in the World.</p>
                                <a href="{{ $contactinfo->whatsapp }}" class="cta-rou-line">Talk to sales</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- REGISTER -->
    <section>
        <div class="login pg-cont">
            <div class="container">
                <div class="row">

                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Contact to us</b> Easy and fast.</h2>
                            </div>
                            <div class="im">
                                <img src="{{ asset('frontend/images/login-couple.png') }}" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs">
                            <div>
                                <div class="form-tit">
                                    <h4>Let's talk</h4>
                                    <h1>Send your enquiry now </h1>
                                </div>
                                <div class="form-login">
                                    <form class="cform fvali" method="post"
                                        action="https://rn53themes.net/themes/matrimo/mail/mail-contact.php">
                                        <div class="alert alert-success cmessage" style="display: none" role="alert">
                                            Your message was sent successfully.
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Name:</label>
                                            <input type="text" id="name" class="form-control"
                                                placeholder="Enter your full name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Email:</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Phone:</label>
                                            <input type="number" class="form-control" id="phone"
                                                placeholder="Enter phone number" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Message:</label>
                                            <textarea name="message" class="form-control" id="message" placeholder="Enter message" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send Enquiry</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="ab-team pg-abo-ab-team">
            <div class="container">
                <div class="row">
                    @include('frontend.includes.ourteam')
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
@endsection