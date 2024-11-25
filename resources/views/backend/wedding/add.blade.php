@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-6">
                <div class="tit">
                    <h1>Weddings</h1>
                </div>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Weddings</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="box-com box-qui box-lig box-tab box-form">
            <div class="tit">
                <h3>Weddings</h3>
                <div class="dropdown">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.wedding.manage') }}">Manage wedding posts</a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="form-inp mt-2">
                <form action="{{ route('admin.wedding.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--PROFILE BIO-->
                    <div class="edit-pro-parti">
                        <div class="form-group">
                            <label class="lb">Couple Name:</label>
                            <input type="text" class="form-control" placeholder="Enter couple_name*" name="couple_name"
                                value="{{ old('couple_name') }}">
                            @error('couple_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="lb">Couple Image:</label>
                            <div class="fil-img-uplo">
                                <span class="dumfil">Upload image</span>
                                <input type="file" name="couple_image" value="{{ old('couple_image') }}"
                                    accept="image/*,.jpg,.jpeg,.png" id="fileInput">
                                @error('couple_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="lb">Location:</label>
                            <input type="text" class="form-control" placeholder="Enter wedding location" name="location"
                                value="{{ old('location') }}">
                            @error('location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="lb">Date:</label>
                            <input type="date" class="form-control" placeholder="Enter Date" name="date"
                                value="{{ old('date') }}">
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="lb">Descriptions:</label>
                            <textarea value="{{ old('description') }}"class="form-control" id="" cols="30" rows="10"
                                name="description" value="{{ old('description') }}"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="lb">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="mySwitch1" name="status"
                                    {{ old('status') ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="edit-pro-parti">
                            <h5>Appearance</h5>
                        </div>

                        <div class="form-group">
                            <label class="lb">Type:</label>
                            <select class="form-select chosen-select" data-placeholder="Select Category" name="type">
                                <option value="">Select</option>
                                <option value="image_based" {{ old('type') == 'image_based' ? 'selected' : '' }}>Image
                                    Based</option>
                                <option value="video_based" {{ old('type') == 'video_based' ? 'selected' : '' }}>Video
                                    Based</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="imagebased-section">
                            <div class="form-group">
                                <label class="lb">Image 1:</label>
                                <div class="fil-img-uplo">
                                    <span class="dumfil">Upload image</span>
                                    <input type="file" name="image1" value="{{ old('image1') }}"
                                        accept="image/*,.jpg,.jpeg,.png" id="fileInput">
                                    @error('image1')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="lb">Image 2:</label>
                                <div class="fil-img-uplo">
                                    <span class="dumfil">Upload image</span>
                                    <input type="file" name="image2" value="{{ old('image2') }}"
                                        accept="image/*,.jpg,.jpeg,.png" id="fileInput">
                                    @error('image2')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="lb">Image 3:</label>
                                <div class="fil-img-uplo">
                                    <span class="dumfil">Upload image</span>
                                    <input type="file" name="image3" value="{{ old('image3') }}"
                                        accept="image/*,.jpg,.jpeg,.png" id="fileInput">
                                    @error('image3')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="videobased-section">
                            <div class="form-group">
                                <label class="lb">Thumbnail:</label>
                                <div class="fil-img-uplo">
                                    <span class="dumfil">Upload image</span>
                                    <input type="file" name="thumbnail" value="{{ old('thumbnail') }}"
                                        accept="image/*,.jpg,.jpeg,.png" id="fileInput">
                                    @error('thumbnail')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="lb">Embed Link:</label>
                                <textarea value="{{ old('video') }}"class="form-control" id="" cols="30" rows="10"
                                    name="video" value="{{ old('video') }}"></textarea>
                                @error('video')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="lb"></label>
                            <div></div>
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

    @push('script')
        <script>
            $(document).ready(function() {
                const oldValue = $('select[name="type"]').val();
                if (oldValue === "image_based") {
                    $('.imagebased-section').show();
                    $('.videobased-section').hide();
                } else if (oldValue === "video_based") {
                    $('.videobased-section').show();
                    $('.imagebased-section').hide();
                } else {
                    $('.imagebased-section').hide();
                    $('.videobased-section').hide();
                }

                $('select[name="type"]').on('change', function() {
                    const selectedValue = $(this).val();

                    if (selectedValue === "image_based") {
                        $('.imagebased-section').show();
                        $('.videobased-section').hide();
                    } else if (selectedValue === "video_based") {
                        $('.videobased-section').show();
                        $('.imagebased-section').hide();
                    } else {
                        $('.imagebased-section').hide();
                        $('.videobased-section').hide();
                    }
                });
            });
        </script>
    @endpush
@endsection
