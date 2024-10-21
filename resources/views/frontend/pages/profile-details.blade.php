@extends('frontend.layouts.master')
@section('content')
    <!-- PROFILE -->
    <section>
        <div class="profi-pg profi-ban">
            <div class="">
                <div class="">
                    <div class="profile">
                        <div class="pg-pro-big-im">
                            <div class="s1">
                                <img src="{{ asset('frontend/images/profiles/profile-large.jpg') }}" loading="lazy"
                                    class="pro" alt="">
                            </div>
                            <div class="s3">
                                <a href="#!" class="cta fol cta-chat">Chat now</a>
                                <span class="cta cta-sendint" data-toggle="modal" data-target="#sendInter">Send
                                    interest</span>
                            </div>
                        </div>
                    </div>
                    <div class="profi-pg profi-bio">
                        <div class="lhs">
                            <div class="pro-pg-intro">
                                <h1>{{ $user->name }}</h1>
                                <div class="pro-info-status">
                                    <span class="stat-1"><b>100</b> viewers</span>
                                    <span class="stat-2"><b>Available</b> online</span>
                                </div>
                                <ul>
                                    <li>
                                        <div>
                                            <img src="{{ asset('frontend/images/icon/pro-city.png') }}" loading="lazy"
                                                alt="">
                                            <span>City: <strong>{{ $user->profile->city->name }}</strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="{{ asset('frontend/images/icon/pro-age.png') }}" loading="lazy"
                                                alt="">
                                            <span>Age: <strong>{{ $user->profile->age }}</strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            @php
                                                // Assuming $user->profile->height is in cm
                                                $heightInCm = $user->profile->height;
                                                $heightInFeet = $heightInCm * 0.0328084; // Convert cm to feet
                                                $feet = floor($heightInFeet); // Get the feet part
                                                $inches = round(($heightInFeet - $feet) * 12); // Convert remaining part to inches
                                            @endphp
                                            <img src="{{ asset('frontend/images/icon/pro-city.png') }}" loading="lazy"
                                                alt="">
                                            <span>Height: <strong>{{ $feet }}'{{ $inches }}</strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="{{ asset('frontend/images/icon/pro-city.png') }}" loading="lazy"
                                                alt="">
                                            <span>Job: <strong>{{ $user->profile->career->type }}</strong></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-abo">
                                <h3>About</h3>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                    it has a more-or-less normal distribution of letters, as opposed to using 'Content
                                    here, content here', making it look like readable English. </p>
                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                    default model text.</p>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-gal" id="gallery">
                                <h3>Photo gallery</h3>
                                <div id="image-gallery">
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img src="{{ asset('frontend/images/profiles/1.jpg') }}"
                                                    class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img src="{{ asset('frontend/images/profiles/6.jpg') }}"
                                                    class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img src="{{ asset('frontend/images/profiles/14.jpg') }}"
                                                    class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-conta">
                                <h3>Contact info</h3>
                                <ul>
                                    <li><span><i class="fa fa-mobile"
                                                aria-hidden="true"></i><b>Phone:</b>{{ $user->phone }}</span></li>
                                    <li><span><i class="fa fa-envelope-o"
                                                aria-hidden="true"></i><b>Email:</b>{{ $user->email }}</span>
                                    </li>
                                    <li><span><i class="fa fa fa-map-marker" aria-hidden="true"></i><b>Address:
                                            </b>{{ $user->profile->address }}</span></li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-info">
                                <h3>Personal information</h3>
                                <ul>
                                    <li><b>Name:</b> {{ $user->name }}</li>
                                    <li><b>Father's name:</b> {{ $user->profile->fathers_name }}</li>
                                    <li><b>Age:</b> {{ $user->profile->age }}</li>
                                    <li><b>Date of Birth: </b> {{ Carbon\Carbon::parse($user->profile->birth_date)->format('d M, Y') }}
                                    </li>
                                    <li><b>Height:</b> {{ $user->profile->height }}</li>
                                    <li><b>Weight:</b> {{ $user->profile->weight }}kg</li>
                                    <li><b>Degree:</b> {{ $user->profile->career->degree }}</li>
                                    <li><b>Religion:</b> Any</li>
                                    <li><b>Profession:</b> {{ $user->profile->career->type }}</li>
                                    <li><b>Company:</b> {{ $user->profile->career->company_name }}</li>
                                    <li><b>Position:</b> {{ $user->profile->career->position }}</li>
                                    <li><b>Salary:</b> {{ $user->profile->career->salary }}</li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            @if ($user->profile->hobbies->count() > 0)
                                <div class="pr-bio-c pr-bio-hob">
                                    <h3>Hobbies</h3>
                                    <ul>
                                        @forelse($user->profile->hobbies as $hobby)
                                            <li><span>{{ $hobby->hobby->name }}</span></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            @endif
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c menu-pop-soci pr-bio-soc">
                                <h3>Social media</h3>
                                <ul>
                                    @if ($user->profile->socialmedia->facebook)
                                        <li><a href="{{ $user->profile->socialmedia->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($user->profile->socialmedia->x)
                                        <li><a href="{{ $user->profile->socialmedia->x }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($user->profile->socialmedia->whatsApp)
                                        <li><a href="{{ $user->profile->socialmedia->whatsApp }}"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($user->profile->socialmedia->linkedin)
                                        <li><a href="{{ $user->profile->socialmedia->linkedin }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($user->profile->socialmedia->youtube)
                                        <li><a href="{{ $user->profile->socialmedia->youtube }}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($user->profile->socialmedia->instagram)
                                        <li><a href="{{ $user->profile->socialmedia->instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->


                        </div>

                        <!-- PROFILE lHS -->
                        <div class="rhs">
                            <!-- HELP BOX -->
                            <div class="prof-rhs-help">
                                <div class="inn">
                                    <h3>Tell us your Needs</h3>
                                    <p>Tell us what kind of service or experts you are looking.</p>
                                    <a href="sign-up.html">Register for free</a>
                                </div>
                            </div>
                            <!-- END HELP BOX -->
                            <!-- RELATED PROFILES -->
                            <div class="slid-inn pr-bio-c wedd-rel-pro">
                                <h3>Related profiles</h3>
                                <ul class="slider3">
                                    @foreach($related_users as $related)
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="{{ asset('frontend/images/profiles/1.jpg') }}" alt="">
                                                <span class="badge badge-success">{{ $related->profile->age }} Years old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5>{{ $related->name }}</h5>
                                                <span>City: <b>{{ $related->profile->city->name }}</b></span>
                                            </div>
                                            <a href="/profile/{{ $related->slug }}" class="fclick"></a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- END RELATED PROFILES -->
                        </div>
                        <!-- END PROFILE lHS -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PROFILE -->

    @push('script')
    <script src="{{ asset('frontend/js/gallery.js') }}"></script>
    @endpush
    
@endsection
