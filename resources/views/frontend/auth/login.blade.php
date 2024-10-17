@extends('frontend.layouts.master')
@section('content')
    <section>
        <div class="login">
            <div class="container">
                <div class="row">
                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>
                                    Now
                                    <b>Find <br>
                                        your life partner</b>
                                    Easy and fast.
                                </h2>
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
                                    <h1>Sign in to {{ $generalsetting->name }}</h1>
                                    <p>Not a member? <a href="{{ route('user.register') }}">Sign up now</a></p>
                                </div>
                                <div class="form-login">
                                    <form action="{{ route('user.loginSubmit') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="lb">Email:</label>
                                            <input type="email"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                id="email" placeholder="Enter email" name="email"
                                                value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="lb">Password:</label>
                                            <input type="password"
                                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                id="password" placeholder="Enter password" name="password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="remember">
                                                Remember me
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            Sign in
                                        </button>
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
