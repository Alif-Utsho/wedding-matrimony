@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-6">
                <div class="tit">
                    <h1>Services</h1>
                </div>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="box-com box-qui box-lig box-tab box-form">
            <div class="tit">
                <h3>Services</h3>
                <div class="dropdown">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.service.manage') }}">Manage service posts</a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="form-inp mt-2">
                <form action="{{ route('admin.service.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--PROFILE BIO-->
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <div class="edit-pro-parti">
                        <div class="form-group">
                            <label class="lb">Name:</label>
                            <input type="text" class="form-control" placeholder="Enter name*" name="name"
                                value="{{ $service->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="lb">Title:</label>
                            <input type="text" class="form-control" placeholder="Enter title*" name="title"
                                value="{{ $service->title }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="lb">Link:</label>
                            <input type="text" class="form-control" placeholder="Enter link*" name="link"
                                value="{{ $service->link }}">
                            @error('link')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="lb">Service photo:</label>
                            <div class="fil-img-uplo">
                                <span class="dumfil">Upload image</span>
                                <input type="file" name="image" accept="image/*,.jpg,.jpeg,.png" id="fileInput">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <img src="{{ asset($service->image) }}" alt="" class="backend-img">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="lb">Icon:</label>
                            <div class="fil-img-uplo">
                                <span class="dumfil">Upload image</span>
                                <input type="file" name="icon" accept="image/*,.jpg,.jpeg,.png" id="fileInput">
                                @error('icon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <img src="{{ asset($service->icon) }}" alt="" class="backend-img">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="lb">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="mySwitch1" name="status"
                                    {{ $service->status ? 'checked' : '' }}>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="cta-full cta-colr">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
