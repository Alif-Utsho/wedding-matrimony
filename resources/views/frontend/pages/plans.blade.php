@extends('frontend.layouts.master')
@section('content')
    <section>
        <div class="plans-ban">
            <div class="container">
                <div class="row">
                    <span class="pri">Pricing</span>
                    <h1>Get Started <br> Pick your Plan Now</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    <span class="nocre">No credit card required</span>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="plans-main">
            <div class="container">
                <div class="row">
                    <ul>
                        @foreach($plans as $plan)
                        <li>
                            <div class="pri-box @if($plan->popular) pri-box-pop @endif">
                                @if($plan->popular)
                                <span class="pop-pln">Most popular plan</span>
                                @endif
                                <h2>{{ $plan->name }}</h2>
                                <p>Printer took a type and scrambled </p>
                                <a href="sign-up.html" class="cta">Get Started</a>
                                <span class="pri-cou"><b>${{ $plan->price }}</b></span>
                                {!! $plan->details !!}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
