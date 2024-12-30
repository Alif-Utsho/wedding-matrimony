@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-6">
                <div class="tit">
                    <h1>Sub Package Edit</h1>
                </div>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sub Package</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="box-com box-qui box-lig box-tab box-form">
            <div class="tit">
                <h3>Sub Package Edit</h3>
                <div class="dropdown">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.subpackage.manage') }}">Manage package posts</a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="form-inp mt-2">
                <form action="{{ route('admin.subpackage.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--PROFILE BIO-->
                    <input type="hidden" name="sub_package_id" value="{{ $subPackage->id }}">

                    <div class="edit-pro-parti">

                        <div class="form-group">
                            <label class="lb">Package: <span class="text-danger">*</span></label>
                            <select class="form-select chosen-select" data-placeholder="Select Package" name="package_id"
                                required>
                                <option value="">Select Package</option>

                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}"
                                        {{ $package->id == $subPackage->package_id ? 'selected' : '' }}>{{ $package->name }}
                                    </option>
                                @endforeach

                            </select>
                            @error('package_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="lb">Price:</label>
                            <input type="number" class="form-control" placeholder="Enter package price" name="price"
                                value="{{ $subPackage->price }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="lb">Old Price:</label>
                            <input type="number" class="form-control" placeholder="Enter package old_price"
                                name="old_price" value="{{ $subPackage->old_price }}">
                            @error('old_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="lb">Duration:</label>
                            <input type="number" class="form-control" placeholder="Enter days" name="duration"
                                value="{{ $subPackage->duration }}">
                            @error('duration')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="lb">Descriptions:</label>
                            <textarea value="{{ $subPackage->name }}" class="form-control" id="" cols="30" rows="5"
                                name="details">{{ $subPackage->details }}</textarea>
                            @error('details')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="chosenini">
                            <div class="form-group">
                                <label class="lb">Accesses:</label>
                                <select class="chosen-select" data-placeholder="Select package Tags" multiple
                                    name="accesses[]">
                                    <option></option>
                                    @foreach ($accesses as $access)
                                        <option value="{{ $access->id }}"
                                            {{ in_array($access->id, $subPackage->package->accesses->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $access->name }}</option>
                                    @endforeach
                                </select>
                                @error('accesses')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="lb">Popular</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="mySwitch1" name="popular"
                                    {{ $subPackage->popular ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="lb">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="mySwitch1" name="status"
                                    {{ $subPackage->status ? 'checked' : '' }}>
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
