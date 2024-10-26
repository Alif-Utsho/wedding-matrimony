@extends('frontend.layouts.master')
@section('content')

    <!-- BANNER & SEARCH -->
    <section>
        <div class="str">
            <div class="hom-head">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <span><i class="no1">#1</i> Matrimony</span>
                                <h1>Find your<br><b>Right Match</b> here</h1>
                                <p>Most trusted Matrimony Brand in the World.</p>
                            </div>
                            <div class="ban-search chosenini">
                                <form action="/all-profile" method="GET">
                                    <ul>
                                        <li class="sr-look">
                                            <div class="form-group">
                                                <label>I'm looking for</label>
                                                <select class="chosen-select" name="gender">
                                                    <option value="">I'm looking for</option>
                                                    <option value="Men">Men</option>
                                                    <option value="Women">Women</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-age">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <select class="chosen-select" name="age_range">
                                                    <option value="">Age</option>
                                                    <option value="18-to-30">18 to 30</option>
                                                    <option value="31-to-40">31 to 40</option>
                                                    <option value="41-to-50">41 to 50</option>
                                                    <option value="51-to-60">51 to 60</option>
                                                    <option value="61-to-70">61 to 70</option>
                                                    <option value="71-to-80">71 to 80</option>
                                                    <option value="81-to-90">81 to 90</option>
                                                    <option value="91-to-100">91 to 100</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-reli">
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <select class="chosen-select" name="religion">
                                                    <option>Religion</option>
                                                    <option>Any</option>
                                                    <option>Hindu</option>
                                                    <option>Muslim</option>
                                                    <option>Jain</option>
                                                    <option>Christian</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-cit">
                                            <div class="form-group">
                                                <label>City</label>
                                                <select class="chosen-select" name="location">
                                                    <option value="">Location</option>
                                                    <option value="">Any Location</option>
                                                    @foreach($cities as $city)
                                                    <option value="{{ $city->name }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-btn">
                                            <input type="submit" value="Search">
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- BANNER SLIDER -->
    <section>
        <div class="hom-ban-sli">
            <div>
                <ul class="ban-sli">
                    @foreach($banners as $banner)
                    <li>
                        <div class="image">
                            <img src="{{ asset($banner->image) }}" alt="" loading="lazy">
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- QUICK ACCESS -->
    <section>
        <div class="str home-acces-main">
            <div class="container">
                <div class="row">
                    <!-- BACKGROUND SHAPE -->
                    <div class="wedd-shap">
                        <span class="abo-shap-1"></span>
                        <span class="abo-shap-4"></span>
                    </div>
                    <!-- END BACKGROUND SHAPE -->

                    <div class="home-tit">
                        <p>Quick Access</p>
                        <h2><span>Our Services</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="home-acces">
                        <ul class="hom-qui-acc-sli">
                            @foreach($services as $service)
                            <li>
                                <div class="wow fadeInUp hacc" data-wow-delay="0.1s" style="background-image: url({{ asset($service->image) }});">
                                    <div class="con">
                                        <img src="{{ asset($service->icon) }}" alt="" loading="lazy">
                                        <h4>{{ $service->name }}</h4>
                                        <p>{{ $service->title }}</p>
                                        <a href="{{ $service->link }}">View more</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- TRUST BRANDS -->
    <section>
        <div class="hom-cus-revi">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>trusted brand</p>
                        <h2><span>Trust by <b class="num">1500</b>+ Couples</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="slid-inn cus-revi">
                        <ul class="slider3">
                            @foreach($testimonials as $testimonial)
                            <li>
                                <div class="cus-revi-box">
                                    <div class="revi-im">
                                        <img src="{{ asset($testimonial->image) }}" alt="" loading="lazy">
                                        <i class="cir-com cir-1"></i>
                                        <i class="cir-com cir-2"></i>
                                        <i class="cir-com cir-3"></i>
                                    </div>
                                    <p>{{ $testimonial->description }}</p>
                                    <h5>{{ $testimonial->title }}</h5>
                                    <span>{{ $testimonial->location }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="cta-full-wid">
                        <a href="#!" class="cta-dark">More customer reviews</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ban-home">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <span><i class="no1">#1</i> Wedding Website</span>
                                <h2>Why choose us</h2>
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
        <div class="ab-sec2">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <div class="animate animate__animated animate__slower" data-ani="animate__flipInX"
                                data-dely="0.1">
                                <img src="{{ asset('frontend/images/icon/prize.png') }}" alt="" loading="lazy">
                                <h4>Genuine profiles</h4>
                                <p>Contact genuine profiles with 100% verified mobile</p>
                            </div>
                        </li>
                        <li>
                            <div class="animate animate__animated animate__slower" data-ani="animate__flipInX"
                                data-dely="0.3">
                                <img src="{{ asset('frontend/images/icon/trust.png') }}" alt="" loading="lazy">
                                <h4>Most trusted</h4>
                                <p>The most trusted wedding matrimony brand lorem</p>
                            </div>
                        </li>
                        <li>
                            <div class="animate animate__animated animate__slower" data-ani="animate__flipInX"
                                data-dely="0.6">
                                <img src="{{ asset('frontend/images/icon/rings.png') }}" alt="" loading="lazy">
                                <h4>2000+ weddings</h4>
                                <p>Lakhs of peoples have found their life partner</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- ABOUT START -->
    <section>
        <div class="ab-wel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ab-wel-lhs">
                            <span class="ab-wel-3"></span>
                            <img src="{{ asset('frontend/images/about/1.jpg') }}" alt="" loading="lazy" class="ab-wel-1">
                            <img src="{{ asset('frontend/images/couples/20.jpg') }}" alt="" loading="lazy" class="ab-wel-2">
                            <span class="ab-wel-4"></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ab-wel-rhs">
                            <div class="ab-wel-tit">
                                <h2>Welcome to <em>SIS MEDIA</em></h2>
                                <p>Best wedding matrimony It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout. </p>
                                <p> <a href="plans.html">Click here to</a> Start you matrimony service now.</p>
                            </div>
                            <div class="ab-wel-tit-1">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour, or randomised words which
                                    don't look even slightly believable.</p>
                            </div>
                            <div class="ab-wel-tit-2">
                                <ul>
                                    <li>
                                        <div>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <h4>Enquiry <em>01678337722</em></h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <h4>Get Support <em>messageappsis@gmail.com </em></h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- COUNTS START -->
    <section>
        <div class="ab-cont">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                <div>
                                    <h4>2K</h4>
                                    <span>Couples pared</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <div>
                                    <h4>4000+</h4>
                                    <span>Registerents</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-male" aria-hidden="true"></i>
                                <div>
                                    <h4>1600+</h4>
                                    <span>Mens</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-female" aria-hidden="true"></i>
                                <div>
                                    <h4>2000+</h4>
                                    <span>Womens</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- MOMENTS START -->
    <section>
        <div class="wedd-tline">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>Moments</p>
                        <h2><span>How it works</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="inn">
                        <ul>
                            @foreach($wedding_steps as $step)
                            @if($loop->iteration%2==0)
                            <li>
                                <div class="tline-inn tline-inn-reve">
                                    <div class="tline-con animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <h5>{{ $step->title }}</h5>
                                        <span>{{ $step->time }}</span>
                                        <p>{{ $step->description }}</p>
                                    </div>
                                    <div class="tline-im animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <img src="{{ asset($step->image) }}" alt="" loading="lazy">
                                    </div>
                                </div>
                            </li>
                            @else
                            <li>
                                <div class="tline-inn">
                                    <div class="tline-im animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <img src="{{ asset($step->image) }}" alt="" loading="lazy">
                                    </div>
                                    <div class="tline-con animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <h5>{{ $step->title }}</h5>
                                        <span>{{ $step->time }}</span>
                                        <p>{{ $step->description }}</p>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- RECENT COUPLES -->
    <section>
        <div class="hom-couples-all">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>trusted brand</p>
                        <h2><span>Recent Couples</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                </div>
            </div>
            <div class="hom-coup-test">
                <ul class="couple-sli">
                    @foreach($weddings as $wedding)
                    <li>
                        <div class="hom-coup-box">
                            <span class="leaf"></span>
                            <img src="{{ asset($wedding->couple_image) }}" alt="" loading="lazy">
                            <div class="bx">
                                <h4>{{ $wedding->couple_name }} <span>{{ $wedding->location }}</span></h4>
                                <a href="/wedding-details/{{ $wedding->id }}" class="sml-cta cta-dark">View more</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
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


    <!-- GALLERY START -->
    <section>
        <div class="wedd-gall home-wedd-gall">
            <div class="">
                <div class="gall-inn">
                    <div class="home-tit">
                        <p>collections</p>
                        <h2><span>Photo gallery</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    
                    @foreach ($galleries->chunk(2) as $chunkIndex => $galleryChunk)
                        @if ($chunkIndex % 2 == 0)
                            <!-- Use col-md-2 for odd chunks -->
                            <div class="col-md-2">
                                @foreach ($galleryChunk as $gallery)
                                    <div class="gal-im animate animate__animated animate__slower"
                                        data-ani="animate__flipInX">
                                        <img src="{{ asset($gallery->image) }}" class="gal-siz-{{ $loop->first ? 1 : 2 }}"
                                            alt="">
                                        <div class="txt">
                                            <span>Wedding</span>
                                            <h4>{{ $wedding->couple_name }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <!-- Use col-md-3 for even chunks -->
                            <div class="col-md-3">
                                @foreach ($galleryChunk as $gallery)
                                    <div class="gal-im animate animate__animated animate__slower"
                                        data-ani="animate__flipInX">
                                        <img src="{{ asset($gallery->image) }}" class="gal-siz-{{ $loop->first ? 2 : 1 }}"
                                            alt="">
                                        <div class="txt">
                                            <span>Wedding</span>
                                            <h4>{{ $wedding->couple_name }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- BLOG POSTS START -->
    <section>
        <div class="hom-blog">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>Blog posts</p>
                        <h2><span>Blog & Articles</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="blog">
                        <ul>
                            @foreach($blogs as $blog)
                            <li>
                                <div class="blog-box">
                                    <img src="{{ asset($blog->image) }}" alt="" loading="lazy">
                                    <span>{{ $blog->tag }}</span>
                                    <h2>{{ $blog->title }}</h2>
                                    <p>{{ $blog->short_description }}</p>
                                    <a href="/blog-details/{{ $blog->id }}" class="cta-dark"><span>Read more</span></a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- FIND YOUR MATCH BANNER -->
    <section>
        <div class="str count">
            <div class="container">
                <div class="row">
                    <div class="fot-ban-inn">
                        <div class="lhs">
                            <h2>Find your perfect Match now</h2>
                            <p>lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.Lorem Ipsum is
                                simply dummy text of the printing and typesetting industry.</p>
                            <a href="sign-up.html" class="cta-3">Register Now</a>
                            <a href="sign-up.html" class="cta-4">Help & Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

@endsection