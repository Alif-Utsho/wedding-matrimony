@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-4">
                <div class="tit">
                    <h1>Billing Info</h1>
                </div>
            </div>
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Billing Info</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                        <h3>Billing Info</h3>
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>User Name</th>
                                <th>Package</th>
                                <th>Amount</th>
                                <th>Duration</th>
                                <th>Expired</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($billingInfo as $date => $payments)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payments->created_at }}</td>
                                    <td><span class="hig-blu">{{ $payments->user['name'] }}</span></td>
                                    <td>{{ $payments->package_name }}</td>
                                    <td>{{ $payments->amount }}</td>
                                    <td>{{ $payments->duration }}</td>
                                    <td>{{ $payments->expired_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
