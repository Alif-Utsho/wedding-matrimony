@extends('backend.layouts.master')
@section('content')
<div class="pan-rhs">
    <div class="row main-head">
        <div class="col-md-6">
            <div class="tit">
                <h1>Push Notification</h1>
            </div>
        </div>
        <div class="col-md-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Push Notification</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="box-com box-qui box-lig box-tab box-form">
        <div class="tit">
            <h3>Push Notification</h3>
        </div>

        <div class="form-inp mt-2">
            <form action="{{ route('admin.push-notification.send') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!--PROFILE BIO-->
                <div class="edit-pro-parti">


                    <div class="form-group">
                        <label class="lb">Send To:</label>
                        <select class="form-select chosen-select" data-placeholder="Select Category" name="send_to">
                            <option value="">All</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('send_to')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="lb">Title:</label>
                        <input type="text" class="form-control" placeholder="Enter title*" name="title"
                            value="{{ old('title') }}">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label class="lb">Body:</label>
                        <textarea value="{{ old('body') }}" class="form-control" id="" cols="30" rows="10"
                            name="body" value="{{ old('body') }}"></textarea>
                        @error('body')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label class="lb"></label>
                        <div></div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="cta-full cta-colr">Send</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection