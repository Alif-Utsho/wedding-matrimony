@extends('frontend.layouts.usermaster')
@section('user_content')
    <div class="col-md-8 col-lg-9">
        <div class="row">
            @include('frontend.includes.plan-card')
            <div class="col-md-8 db-sec-com">
                <h2 class="db-tit">All invoice</h2>
                <div class="db-invoice">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Plan type</th>
                                <th>Duration</th>
                                <th>Cost</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                @php
                                    $months = floor($payment->duration / 30);
                                    $days = $payment->duration % 30;
                                @endphp
                                <tr>
                                    <td>{{ $payment->package_name }}</td>
                                    <td>
                                        @if($months > 0)
                                            {{ $months }} Month{{ $months > 1 ? 's' : '' }} 
                                        @endif
                                        @if($days > 0)
                                            {{ $days }} Day{{ $days > 1 ? 's' : '' }} 
                                        @endif
                                        ({{ \Carbon\Carbon::parse($payment->created_at)->format('F Y') }} -
                                        {{ \Carbon\Carbon::parse($payment->expired_at)->format('F Y') }})
                                    </td>
                                    <td>${{ $payment->amount }}</td>
                                    <td>
                                        <a href="#" class="cta-dark cta-sml" download="">
                                            <span>Download</span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No invoices available.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 db-sec-com">
                <div class="alert alert-warning db-plan-canc">
                    <p><strong>Plan cancellation:</strong> <a href="#" data-bs-toggle="modal"
                            data-bs-target="#plancancel">Click here</a> to cancell the current plan.</p>
                </div>
            </div>
            <div class="col-md-12 db-sec-com">
                <div class="alert alert-warning db-plan-canc db-plan-canc-app">
                    <p>Your plan cancellation request has been successfully received by the admin. Once the admin approves
                        your cancellation, the cost will be sent to you.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
