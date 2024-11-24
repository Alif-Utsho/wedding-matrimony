@extends('frontend.layouts.master')
@section('content')
    <section>
        <div class="login">
            <div class="container">
                <div class="row">

                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Find your life partner</b> Easy and fast.</h2>
                            </div>
                            <div class="im">
                                <img src="{{ asset('frontend/images/login-couple.png') }}" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs">
                            <div>
                                <div class="form-tit">
                                    <h4>Start for free</h4>
                                    <h1>Sign up to {{ $generalsetting->name }}</h1>
                                    <p>Already a member? <a href="{{ route('user.login') }}">Login</a></p>
                                </div>
                                <div class="form-login">
                                    <form action="{{ route('user.registerSubmit') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="lb">Name:</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Enter your full name" name="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="lb">Email:</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter email" name="email" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="lb">Phone:</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Enter phone number" name="phone" value="{{ old('phone') }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="lb">Password:</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Enter password" name="password">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input @error('agree') is-invalid @enderror"
                                                    type="checkbox" name="agree">
                                                Creating an account means you’re okay with our <a href="#!">Terms of
                                                    Service</a>, Privacy Policy, and our default Notification Settings.
                                            </label>
                                            @error('agree')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Create Account</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
