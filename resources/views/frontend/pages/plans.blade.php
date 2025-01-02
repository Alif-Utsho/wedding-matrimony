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
                        @foreach ($packages as $plan)
                            <li>
                                <div class="pri-box @if ($plan->package->popular) pri-box-pop @endif">
                                    @if ($plan->package->popular)
                                        <span class="pop-pln">Most popular plan</span>
                                    @endif
                                    <h2>{{ $plan->package->name }}</h2>
                                    <p>Printer took a type and scrambled </p>
                                    {{-- <a href="sign-up.html" class="cta">Get Started</a> --}}
                                    <a href="javascript:void(0);" class="cta"
                                        onclick="document.getElementById('subscription-form-{{ $plan->id }}').submit();">Get
                                        Started</a>

                                    <form id="subscription-form-{{ $plan->id }}" action="{{ route('user.subscribe') }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $plan->id }}">
                                        <input type="hidden" name="package_id" value="{{ $plan->package_id }}">
                                    </form>
                                    <span class="pri-cou">
                                        <b>${{ $plan->price }}</b>
                                        @if ($plan->price > 0)
                                            <small style="font-size: 18px;">/
                                                @if ($plan->duration >= 30)
                                                    {{ round($plan->duration / 30, 1) }}
                                                    {{ Str::plural('Month', round($plan->duration / 30, 1)) }}
                                                @else
                                                    {{ $plan->duration }}
                                                    {{ Str::plural('Day', $plan->duration) }}
                                                @endif
                                            </small>
                                        @endif
                                    </span>
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
