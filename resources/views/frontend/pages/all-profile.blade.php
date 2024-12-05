@extends('frontend.layouts.master')
@section('content')
    <!-- SUB-HEADING -->
    <section>
        <div class="all-pro-head">
            <div class="container">
                <div class="row">
                    <h1>Lakhs of Happy Marriages</h1>
                    <a href="sign-up.html">Join now for Free <i class="fa fa-handshake-o" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!--FILTER ON MOBILE VIEW-->
        <div class="fil-mob fil-mob-act">
            <h4>Profile filters <i class="fa fa-filter" aria-hidden="true"></i> </h4>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="all-weddpro all-jobs all-serexp chosenini">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 fil-mob-view">
                        <span class="filter-clo">+</span>
                        <!-- START -->
                        <form action="" method="GET">
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-search" aria-hidden="true"></i> I'm looking for</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="gender">
                                        <option value="">I'm looking for</option>
                                        @foreach (\App\Enums\GenderEnum::options() as $gender)
                                            <option value="{{ $gender }}"
                                                {{ request()->gender == $gender ? 'selected' : '' }}>{{ $gender }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- END -->
                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-clock-o" aria-hidden="true"></i>Age</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="age_range">
                                        <option value="">Select age</option>
                                        <option value="18-to-30" {{ request()->age_range == '18-to-30' ? 'selected' : '' }}>
                                            18
                                            to 30</option>
                                        <option value="31-to-40" {{ request()->age_range == '31-to-40' ? 'selected' : '' }}>
                                            31
                                            to 40</option>
                                        <option value="41-to-50" {{ request()->age_range == '41-to-50' ? 'selected' : '' }}>
                                            41
                                            to 50</option>
                                        <option value="51-to-60" {{ request()->age_range == '51-to-60' ? 'selected' : '' }}>
                                            51
                                            to 60</option>
                                        <option value="61-to-70" {{ request()->age_range == '61-to-70' ? 'selected' : '' }}>
                                            61
                                            to 70</option>
                                        <option value="71-to-80" {{ request()->age_range == '71-to-80' ? 'selected' : '' }}>
                                            71
                                            to 80</option>
                                        <option value="81-to-90" {{ request()->age_range == '81-to-90' ? 'selected' : '' }}>
                                            81
                                            to 90</option>
                                        <option value="91-to-100"
                                            {{ request()->age_range == '91-to-100' ? 'selected' : '' }}>
                                            91 to 100</option>
                                    </select>
                                </div>
                            </div>
                            <!-- END -->
                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-bell-o" aria-hidden="true"></i>Select Religion</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="religion">
                                        <option value="">Religion</option>
                                        <option value="">Any</option>
                                        @foreach (App\Enums\Religion::all() as $religion)
                                            <option value="{{ $religion }}"
                                                {{ request()->religion == $religion ? 'selected' : '' }}>
                                                {{ $religion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- END -->
                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="location">
                                        <option value="">Select location</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->name }}"
                                                {{ request()->location == $city->name ? 'selected' : '' }}>
                                                {{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- END -->
                            <!-- START -->
                            <div class="filt-com lhs-rati lhs-avail lhs-cate">
                                <h4><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Availablity</h4>
                                <ul>
                                    <li>
                                        <div class="rbbox">
                                            <input type="radio" value="all" name="availability" class="rating_check"
                                                {{ request()->availability == 'all' ? 'checked' : '' }} id="exav1"
                                                checked>
                                            <label for="exav1">All</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rbbox">
                                            <input type="radio" value="online" name="availability" class="rating_check"
                                                {{ request()->availability == 'online' ? 'checked' : '' }} id="exav2">
                                            <label for="exav2">Available</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rbbox">
                                            <input type="radio" value="offline" name="availability" class="rating_check"
                                                {{ request()->availability == 'offline' ? 'checked' : '' }} id="exav3">
                                            <label for="exav3">Offline</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- END -->

                            <!-- START -->
                            <div class="filt-com lhs-rati lhs-ver lhs-cate">
                                <h4><i class="fa fa-shield" aria-hidden="true"></i>Profile</h4>
                                <ul>
                                    <li>
                                        <div class="rbbox">
                                            <input type="radio" value="all" name="profiletype" class="rating_check"
                                                {{ request()->profiletype == 'all' ? 'checked' : '' }} id="exver1"
                                                checked>
                                            <label for="exver1">All</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rbbox">
                                            <input type="radio" value="premium" name="profiletype" class="rating_check"
                                                {{ request()->profiletype == 'premium' ? 'checked' : '' }} id="exver2">
                                            <label for="exver2">Premium</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rbbox">
                                            <input type="radio" value="free" name="profiletype" class="rating_check"
                                                {{ request()->profiletype == 'free' ? 'checked' : '' }} id="exver3">
                                            <label for="exver3">Free</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- END -->
                            <!-- START -->

                            <div class="my-4">
                                <button type="submit" class="btn btn-danger btn-sm col-12">Filter Profiles</button>
                            </div>
                        </form>
                        <div class="filt-com filt-send-query">
                            <div class="send-query">
                                <h5>What are you looking for?</h5>
                                <p>We will help you to arrage the best match to you.</p>
                                <a href="#!" data-toggle="modal" data-target="#expfrm">Send your queries</a>
                            </div>
                        </div>
                        <!-- END -->
                    </div>
                    <div class="col-md-9">
                        <div class="short-all">
                            <div class="short-lhs">
                                Showing <b>{{ $users->count() }}</b> profiles
                            </div>
                            <div class="short-rhs">
                                <ul>
                                    <li>
                                        Sort by:
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <select class="chosen-select">
                                                <option value="">Most relative</option>
                                                <option value="Men">Date listed: Newest</option>
                                                <option value="Men">Date listed: Oldest</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sort-grid sort-grid-1">
                                            <i class="fa fa-th-large" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sort-grid sort-grid-2 act">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="all-list-sh">
                            <ul>
                                @forelse($users as $user)
                                    <li>
                                        <div class="all-pro-box user-avil-onli" data-useravil="avilyes"
                                            data-aviltxt="Available online">
                                            <!--PROFILE IMAGE-->
                                            <div class="pro-img">
                                                <a href="/profile/{{ $user->slug }}">
                                                    <img src="{{ asset($user->profile->image) }}" alt="">
                                                </a>
                                                @if ($user->active_status)
                                                    <div class="pro-ave" title="User currently available">
                                                        <span class="pro-ave-yes"></span>
                                                    </div>
                                                    <div class="pro-avl-status">
                                                        <h5>Available Online</h5>
                                                    </div>
                                                @endif
                                            </div>
                                            <!--END PROFILE IMAGE-->

                                            <!--PROFILE NAME-->
                                            <div class="pro-detail">
                                                <h4><a href="/profile/{{ $user->slug }}">{{ $user->name }}</a>
                                                    @if ($user->verified)
                                                        <i class="fa fa-check-circle text-success"></i>
                                                    @endif
                                                </h4>
                                                <div class="pro-bio">
                                                    <span>{{ $user->profile->career->degree }}</span>
                                                    <span>{{ $user->profile->career->type }}</span>
                                                    <span>{{ $user->profile->age }} Years Old</span>
                                                    <span>Height: {{ $user->profile->height }}cm</span>
                                                </div>
                                                <div class="links">
                                                    <span class="cta-chat chat-now-btn"
                                                        data-user-id="{{ $user->id }}">
                                                        Chat now
                                                        @auth('user')
                                                            @if (auth('user')->user()->hasAccessTo('send-message'))
                                                            @else
                                                                <i class="fa fa-lock"></i>
                                                            @endif
                                                        @else
                                                            <i class="fa fa-lock"></i>
                                                        @endauth
                                                    </span>
                                                    <a href="#!">WhatsApp</a>
                                                    <a href="#!" class="cta cta-sendint" data-bs-toggle="modal"
                                                        data-bs-target="#sendInter">Send interest</a>
                                                    <a href="/profile/{{ $user->slug }}">More detaiils</a>
                                                </div>
                                            </div>
                                            <!--END PROFILE NAME-->
                                            <!--SAVE-->
                                            <span
                                                class="enq-sav like-btn {{ isset($likedUsers[$user->id]) ? 'liked' : '' }}"
                                                data-toggle="tooltip" data-user-id="{{ $user->id }}"
                                                title="{{ isset($likedUsers[$user->id]) ? 'Profile liked' : 'Click to like this profile' }}""><i
                                                    class="fa fa-thumbs-o-up {{ isset($likedUsers[$user->id]) ? 'sav-act' : '' }} "
                                                    aria-hidden="true"></i></span>
                                            <!--END SAVE-->
                                        </div>
                                    </li>
                                @empty

                                    <div class="mx-auto text-center my-3">
                                        <div class="alert ">
                                            <h5>No Profiles Found</h5>
                                        </div>
                                    </div>
                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->


    <!-- INTEREST POPUP -->
    <div class="modal fade" id="sendInter">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title seninter-tit">Send interest to <span class="intename2">Jolia</span></h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body seninter">
                    <div class="lhs">
                        <img src="{{ asset('frontend/images/profiles/1.jpg') }}" alt="" class="intephoto2">
                    </div>
                    <div class="rhs">
                        <h4>Permissions: <span class="intename2">Jolia</span> Can able to view the below details</h4>
                        <ul>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_about" checked="">
                                    <label for="pro_about">About section</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_photo">
                                    <label for="pro_photo">Photo gallery</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_contact">
                                    <label for="pro_contact">Contact info</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_person">
                                    <label for="pro_person">Personal info</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_hobbi">
                                    <label for="pro_hobbi">Hobbies</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_social">
                                    <label for="pro_social">Social media</label>
                                </div>
                            </li>
                        </ul>
                        <div class="form-floating">
                            <textarea class="form-control" id="comment" name="text" placeholder="Comment goes here"></textarea>
                            <label for="comment">Write some message to <span class="intename"></span></label>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Send interest</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    <!-- END INTEREST POPUP -->

    @push('script')
        <script>
            $(document).ready(function() {
                $('.like-btn').on('click', function() {
                    const userId = $(this).data('user-id');
                    const $button = $(this);

                    var isAuthenticated = {{ Auth::guard('user')->check() ? 'true' : 'false' }};
                    if (!isAuthenticated) {
                        $('#loginModal').modal('show');
                        return;
                    }

                    $.ajax({
                        url: `/user/profile/${userId}/like`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $button.toggleClass('liked');
                            if ($button.hasClass('liked')) {
                                $button.find('i').addClass('sav-act');
                            } else {
                                $button.find('i').removeClass('sav-act');
                            }
                            toastr.success(response.message);
                        },
                        error: function(xhr) {
                            toastr.error('Something went wrong!');
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
