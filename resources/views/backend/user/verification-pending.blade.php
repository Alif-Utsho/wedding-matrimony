@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-4">
                <div class="tit">
                    <h1>Verifications</h1>
                </div>
            </div>
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Verifications</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                        <h3>Verifications</h3>
                        <p>Verifications profiles</p>
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin.user.verification') }}">All</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.user.verification', ['status' => 'verified']) }}">Verified</a>
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.user.verification', ['status' => 'pending']) }}">Pending</a>
                                </li>
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
                                <th>Verification</th>
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
                                                <img src="{{ asset(@$user->profile->image) }}" alt="">
                                            </div>
                                            <div class="pro-info">
                                                <h5>{{ $user->name }}</h5>
                                                <p>{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ @$user->profile->city->name }}</td>
                                    <td>
                                        <button class="cta cta-grn" data-bs-toggle="modal"
                                            data-bs-target="#viewVerification-{{ $user->id }}">View</button>

                                        @if ($user->verified !== 1)
                                            <form action="{{ route('admin.user-verification.verify') }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to make verified?');"
                                                style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="verification_id"
                                                    value="{{ $user->verification->id }}">
                                                <button type="submit" class="cta">Verified</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-toggle="dropdown">
                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form
                                                        action="{{ route('admin.user-verification.delete', $user->verification->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this verification?');"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="dropdown-item" value="Delete">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="viewVerification-{{ $user->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">View Verification Data of
                                                    <b>{{ $user->name }}</b>
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="form-inp">
                                                    <div class="edit-pro-parti">
                                                        <div class="form-group">
                                                            <label class="lb">Front Side:</label>
                                                            <div>
                                                                <img src="{{ asset($user->verification->image) }}"
                                                                    alt="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="lb">Back Side:</label>
                                                            <div>
                                                                <img src="{{ asset($user->verification->image_back) }}"
                                                                    alt="">
                                                            </div>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="cta-full cta-colr">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
