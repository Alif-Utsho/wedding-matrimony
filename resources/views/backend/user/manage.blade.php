@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-4">
                <div class="tit">
                    <h1>@if(request()->plan) {{ ucfirst(request()->plan) }} @else All @endif users</h1>
                </div>
            </div>
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if(request()->plan) {{ ucfirst(request()->plan) }} @else All @endif users</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                        <h3>@if(request()->plan) {{ ucfirst(request()->plan) }} @else All @endif users</h3>
                        <p>@if(request()->plan) {{ ucfirst(request()->plan) }} @else All @endif user profiles</p>
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="admin-add-new-user.html">Add new user</a></li>
                                <li><a class="dropdown-item" href="admin-settings.html#new-user-request">User setting</a>
                                </li>
                                <li><a class="dropdown-item" href="admin-settings.html#new-user-request">Approval
                                        setting</a></li>
                                <li><a class="dropdown-item" href="admin-settings.html#plan">User plan</a></li>
                            </ul>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Profile</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Plan type</th>
                                <th>More</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="prof-table-thum">
                                            <div class="pro">
                                                <img src="{{ asset($user->profile->image) }}" alt="">
                                            </div>
                                            <div class="pro-info">
                                                <h5>{{ $user->name }}</h5>
                                                <p>{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->profile->city->name }}</td>
                                    <td><span
                                            class="@if ($user->isPremium()) hig-grn @else hig-red @endif">{{ $user->currentPackage()->name }}</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-toggle="dropdown">
                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                <li><a class="dropdown-item" href="#">Billing info</a></li>
                                                <li><a class="dropdown-item" href="#">View more details</a></li>
                                                <li><a class="dropdown-item" href="#">View profile</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
