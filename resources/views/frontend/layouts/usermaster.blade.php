@extends('frontend.layouts.master')

@section('content')
    <section>
        <div class="db">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="db-nav">
                            <div class="db-nav-pro"><img src="{{ asset(Auth::guard('user')->user()->profile->image) }}"
                                    class="img-fluid" alt=""></div>
                            <div class="db-nav-list">
                                <ul>
                                    <li>
                                        <a href="{{ route('user.dashboard') }}"
                                            class="{{ request()->routeIs('user.dashboard') ? 'act' : '' }}">
                                            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile') }}"
                                            class="{{ request()->routeIs('user.profile') ? 'act' : '' }}">
                                            <i class="fa fa-male" aria-hidden="true"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.invitations') }}"
                                            class="{{ request()->routeIs('user.invitations') ? 'act' : '' }}">
                                            <i class="fa fa-handshake-o" aria-hidden="true"></i>Interests
                                        </a>
                                    </li>
                                    <li><a href="{{ route('user.chat.list') }}"
                                            class="{{ request()->routeIs('user.chat.list') ? 'act' : '' }}"><i
                                                class="fa fa-commenting-o" aria-hidden="true"></i>Chat list</a></li>
                                    <li><a href="{{ route('user.plan') }}"
                                            class="{{ request()->routeIs('user.plan') ? 'act' : '' }}"><i
                                                class="fa fa-money" aria-hidden="true"></i>Plan</a></li>
                                    <li><a href="{{ route('user.setting') }}"
                                            class="{{ request()->routeIs('user.setting') ? 'act' : '' }}"><i
                                                class="fa fa-cog" aria-hidden="true"></i>Setting</a></li>
                                    <li>
                                        <a href="{{ route('user.logout') }}"><i class="fa fa-sign-out"
                                                aria-hidden="true"></i>Log out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @yield('user_content')
                </div>
            </div>
        </div>
    </section>

    @push('script')
        <script src="{{ asset('frontend/js/Chart.js') }}"></script>

        <script>
            //COMMON SLIDER
            $('.slider').slick({
                infinite: false,
                slidesToShow: 5,
                arrows: false,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: false,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        centerMode: false
                    }
                }]

            });

            $('.count').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

            var xValues = "0";
            var yValues = "50";

            new Chart("Chart_leads", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "#f1bb51",
                        borderColor: "#fae9c8",
                        data: yValues
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 100
                            }
                        }]
                    }
                }
            });
        </script>
        @stack('user-script')
    @endpush
@endsection
