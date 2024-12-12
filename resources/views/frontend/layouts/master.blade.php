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

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

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

    <div class="chatboxsection" id="chat-box-content">
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

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
                        <li><a href="about-us.html">About company</a></li>
                        <li><a href="#!">Contact us</a></li>
                        <li><a href="#!">Feedback</a></li>
                        <li><a href="about-us.html#faq">FAQs</a></li>
                        <li><a href="about-us.html#testimonials">Testimonials</a></li>
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

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            @if (session('toastr_success'))
                toastr.success("{{ session('toastr_success') }}");
            @endif

            @if (session('toastr_error'))
                toastr.error("{{ session('toastr_error') }}");
            @endif

            @if (session('toastr_warning'))
                toastr.warning("{{ session('toastr_warning') }}");
            @endif

            @if (session('toastr_info'))
                toastr.info("{{ session('toastr_info') }}");
            @endif
        });
    </script>

    <script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
    <script>
        window.OneSignalDeferred = window.OneSignalDeferred || [];
        OneSignalDeferred.push(async function(OneSignal) {
            await OneSignal.init({
                appId: "b2f6e117-f9e9-44a2-9764-c0a20514de0e",
            });

            const pushSubscription = OneSignal.User.PushSubscription.id;

            console.log(pushSubscription);
            if (pushSubscription) {
                fetch('/api/save-subscription-id', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ subscription_id: pushSubscription }),
                })
                .then(response => response.json())
                .then(data => console.log('Subscription ID saved successfully:', data))
                .catch(error => console.error('Error saving subscription ID:', error));
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.heightToFeet').each(function() {
                var heightInCm = $(this).data('height');

                var heightInFeet = heightInCm * 0.0328084;
                var feet = Math.floor(heightInFeet);
                var inches = Math.round((heightInFeet - feet) * 12);

                $(this).html(feet + "' " + inches);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function loadMessages(receiverId) {
                $.ajax({
                    url: "{{ route('chat.getMessages') }}",
                    type: 'GET',
                    data: {
                        receiver_id: receiverId,
                    },
                    success: function(response) {
                        // $('.chat-box-messages').empty();
                        $('#chat-box-message').html(response);
                        scrollToBottom();
                        $(`li[data-user-id="${receiverId}"] .unread-count`).hide();
                        $(`li[data-user-id="${receiverId}"] .message-text`).removeClass('fw-bold');

                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            }

            function scrollToBottom() {
                const chatContainer = $('.chat-box-messages');
                chatContainer.scrollTop(chatContainer[0].scrollHeight);
            }

            $('.chat-now-btn').on('click', function(e) {
                var isAuthenticated = {{ Auth::guard('user')->check() ? 'true' : 'false' }};
                if (!isAuthenticated) {
                    $('#loginModal').modal('show');
                    return;
                }

                e.preventDefault();
                $(".chatbox").removeClass("open");
                var userId = $(this).data('user-id');

                $.ajax({
                    url: "{{ route('user.chatnow') }}",
                    type: 'POST',
                    data: {
                        userId: userId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#chat-box-content').html(response);
                        $(".chatbox").addClass("open");
                        loadMessages(userId);
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
        });
    </script>

    @stack('script')

</body>

</html>
