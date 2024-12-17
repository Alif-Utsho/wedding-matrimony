@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-4">
                <div class="tit">
                    <h1>Profile Info</h1>
                </div>
            </div>
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Info</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-com box-qui box-lig box-form">
                    <div class="form-inp">
                        <div class="profile-card">
                            <div class="profile-header d-flex text-decoration-center align-items-center">
                                @if ($user->profile && $user->profile->image)
                                    <img class="img-responsive rounded" src="{{ asset($user->profile->image) }}"
                                        width="250" loading="lazy" alt="">
                                @endif
                            </div>
                            <div class="profile-body">
                                <h3 class="name">{{ $user->name }}</h3>
                                <p class="bio"></p>
                            </div>
                            <hr>
                            <div class="contact-info">
                                <p><strong>Email:</strong>{{ $user->email }}</p>
                                <p><strong>Phone:</strong>{{ $user->phone }}</p>
                            </div>
                            <hr>
                            <div class="personal-info">
                                <p><strong>Gender:</strong>{{ $user->profile['gender'] }}</p>
                                <p><strong>Religion:</strong>{{ $user->profile['religion'] }}</p>
                            </div>
                            <div class="social-links">
                                <a href="#" class="social-link">LinkedIn</a>
                                <a href="#" class="social-link">GitHub</a>
                                <a href="#" class="social-link">Twitter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
