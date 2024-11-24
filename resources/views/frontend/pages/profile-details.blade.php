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
                                <img src="{{ asset($user->profile->image) }}" loading="lazy" class="pro" alt="">
                            </div>
                            <div class="s3">
                                <a href="#!" class="cta fol cta-chat chat-now chat-now-btn"
                                    data-user-id="{{ $user->id }}">
                                    Chat Now

                                    @if (!auth('user')->user()->hasAccessTo('send-message'))
                                        <i class="fa fa-lock"></i>
                                    @endif
                                </a>

                                <button class="cta cta-sendint send-invitation" data-loading-text="Sending..."
                                    {{ $invitationSent || $invitationAccepted ? 'disabled' : '' }}>
                                    @if ($invitationSent)
                                        Invited
                                    @elseif($invitationReceived)
                                        Requested
                                    @elseif($invitationAccepted)
                                        Connected
                                    @else
                                        Send Interest
                                    @endif

                                    @if (!auth('user')->user()->hasAccessTo('send-interest'))
                                        <i class="fa fa-lock"></i>
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="profi-pg profi-bio">
                        <div class="lhs">
                            @auth('user')
                                @if (auth('user')->user()->hasAccessTo('profile-view'))
                                    <div class="pro-pg-intro">
                                        <h1>{{ $user->name }}</h1>
                                        <div class="pro-info-status">
                                            <span class="stat-1"><b>{{ $user->profileViews()->count() }}</b> viewers</span>
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
                                                    <img src="{{ asset('frontend/images/icon/pro-city.png') }}" loading="lazy"
                                                        alt="">
                                                    <span>Height:
                                                        <strong class="heightToFeet"
                                                            data-height="{{ $user->profile->height }}">
                                                            {{ $user->profile->height }}
                                                        </strong>
                                                    </span>
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
                                @else
                                    <h1>Please Subscribe
                                @endif
                            @endauth
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
                            @if ($user->profile->images->count() > 0)
                                <div class="pr-bio-c pr-bio-gal" id="gallery">
                                    <h3>Photo gallery</h3>
                                    <div id="image-gallery">
                                        @foreach ($user->profile->images as $userimage)
                                            <div class="pro-gal-imag">
                                                <div class="img-wrapper">
                                                    <a href="#!"><img src="{{ asset($userimage->image) }}"
                                                            class="img-responsive" alt=""></a>
                                                    <div class="img-overlay"><i class="fa fa-arrows-alt"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
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
                                    <li><b>Date of Birth: </b>
                                        {{ Carbon\Carbon::parse($user->profile->birth_date)->format('d M, Y') }}
                                    </li>
                                    <li><b>Height:</b> <span class="heightToFeet"
                                            data-height="{{ $user->profile->height }}">
                                            {{ $user->profile->height }}</li>
                                    <li><b>Weight:</b> {{ $user->profile->weight }}kg</li>
                                    <li><b>Degree:</b> {{ $user->profile->career->degree }}</li>
                                    <li><b>Religion:</b> {{ $user->profile->religion }}</li>
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
                                        <li><a href="{{ $user->profile->socialmedia->facebook }}"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($user->profile->socialmedia->x)
                                        <li><a href="{{ $user->profile->socialmedia->x }}"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($user->profile->socialmedia->whatsApp)
                                        <li><a href="{{ $user->profile->socialmedia->whatsApp }}"><i class="fa fa-whatsapp"
                                                    aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($user->profile->socialmedia->linkedin)
                                        <li><a href="{{ $user->profile->socialmedia->linkedin }}"><i class="fa fa-linkedin"
                                                    aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($user->profile->socialmedia->youtube)
                                        <li><a href="{{ $user->profile->socialmedia->youtube }}"><i
                                                    class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($user->profile->socialmedia->instagram)
                                        <li><a href="{{ $user->profile->socialmedia->instagram }}"><i
                                                    class="fa fa-instagram" aria-hidden="true"></i></a></li>
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
                                    @foreach ($related_users as $related)
                                        <li>
                                            <div class="wedd-rel-box">
                                                <div class="wedd-rel-img">
                                                    <img src="{{ asset($related->profile->image) }}" alt="">
                                                    <span class="badge badge-success">{{ $related->profile->age }} Years
                                                        old</span>
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

    <!-- SUCCESS MODAL -->
    <div class="modal fade" id="successModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title successTitle">Success</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <svg class="success-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="success-checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="success-checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>

                    <p class="my-4 text-center successText">Your Invitation has been Successfully Sent!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Accepting or Denying Invitation -->
    <div class="modal fade" id="invitationModal" tabindex="-1" role="dialog" aria-labelledby="invitationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invitationModalLabel">Invitation Received</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    You have received an invitation. Would you like to accept or deny it?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="accept-invitation">Accept</button>
                    <button type="button" class="btn btn-danger" id="deny-invitation">Deny</button>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="{{ asset('frontend/js/gallery.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.send-invitation').on('click', function(e) {
                    e.preventDefault();

                    var $this = $(this);
                    var originalText = $this.html();
                    var userId = {{ $user->id }};

                    var isAuthenticated = {{ Auth::guard('user')->check() ? 'true' : 'false' }};
                    if (!isAuthenticated) {
                        $('#loginModal').modal('show');
                        return;
                    }

                    if ({{ $invitationReceived ? 'true' : 'false' }}) {
                        $('#invitationModal').modal('show');
                        return;
                    }

                    $this.prop('disabled', true).html($this.data('loading-text'));

                    $.ajax({
                        url: "{{ route('send.invitation') }}",
                        method: 'POST',
                        data: {
                            userId: userId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $this.html('Invited')
                                .addClass('sent')
                                .prop('disabled', true);

                            $('#successModal').modal('show');
                        },
                        error: function(xhr) {
                            if (xhr.status === 403 && xhr.responseJSON.redirect_url) {
                                alert(xhr.responseJSON.message);
                                window.location.href = xhr.responseJSON.redirect_url;
                            } else {
                                $this.prop('disabled', false).html(originalText);
                                alert('Something went wrong!');
                            }
                        }

                    });
                });

                $('#accept-invitation').on('click', function() {
                    var receivedInvitationId = "{{ $invitationReceivedId }}";

                    $.post("{{ route('accept.invitation') }}", {
                        invitationId: receivedInvitationId,
                        _token: '{{ csrf_token() }}'
                    }, function(response) {
                        $('#invitationModal').modal('hide');

                        $('.send-invitation').html('Connected')
                            .addClass('sent')
                            .prop('disabled', true);

                        $('.successTitle').html('Invitation Accepted');
                        $('.successText').html('Invitation accepted successfully!');
                        $('#successModal').modal('show');
                    }).fail(function() {
                        alert('Error accepting invitation.');
                    });
                });

                $('#deny-invitation').on('click', function() {
                    var receivedInvitationId = "{{ $invitationReceivedId }}";

                    $.post("{{ route('deny.invitation') }}", {
                        invitationId: receivedInvitationId,
                        _token: '{{ csrf_token() }}'
                    }, function(response) {
                        $('#invitationModal').modal('hide');
                        location.reload();
                    }).fail(function() {
                        alert('Error denying invitation.');
                    });
                });
            });
        </script>
    @endpush

@endsection
