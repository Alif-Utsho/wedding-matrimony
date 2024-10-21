@extends('frontend.layouts.usermaster')
@section('user_content')
    <div class="col-md-8 col-lg-9">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-8 db-sec-com">
                <h2 class="db-tit">Profiles status</h2>
                <div class="db-profile">
                    <div class="img">
                        <img src="{{ asset('frontend/images/profiles/12.jpg') }}" loading="lazy" alt="">
                    </div>
                    <div class="edit">
                        <a class="cta-dark" href="{{ route('user.profileEdit') }}" >Edit profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4 db-sec-com">
                <h2 class="db-tit">Profiles status</h2>
                <div class="db-pro-stat">
                    <h6>Profile completion</h6>
                    <div class="dropdown">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu" style="">
                            <li>
                                <a class="dropdown-item" href="#">Edid profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">View profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Profile visibility settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="db-pro-pgog">
                        <span>
                            <b class="count act">90</b>%
                        </span>
                    </div>
                    <ul class="pro-stat-ic">
                        <li>
                            <span>
                                <i class="fa fa-heart-o like" aria-hidden="true"></i>
                                <b>12</b>Likes
                            </span>
                        </li>
                        <li>
                            <span>
                                <i class="fa fa-eye view" aria-hidden="true"></i>
                                <b>12</b>Views
                            </span>
                        </li>
                        <li>
                            <span>
                                <i class="fa fa-handshake-o inte" aria-hidden="true"></i>
                                <b>12</b>Interests
                            </span>
                        </li>
                        <li>
                            <span>
                                <i class="fa fa-hand-pointer-o clic" aria-hidden="true"></i>
                                <b>12</b>Clicks
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        
        <div class="row">
            <div class="col-md-12 db-sec-com db-pro-stat-pg">
                <h2 class="db-tit">Profiles views</h2>
                <div class="db-pro-stat-view-filter cho-round-cor chosenini">
                    <div>
                        <select class="chosen-select">
                            <option value="">Current month</option>
                            <option value="">Jan 2024</option>
                            <option value="">Fan 2024</option>
                            <option value="">Mar 2024</option>
                            <option value="">Apr 2024</option>
                            <option value="">May 2024</option>
                            <option value="">Jun 2024</option>
                        </select>
                    </div>
                </div>
                <div class="chartin">
                    <canvas id="Chart_leads"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
