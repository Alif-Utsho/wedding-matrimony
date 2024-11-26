@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-6">
                <div class="tit">
                    <h1>Wedding Stories</h1>
                </div>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.wedding.manage') }}">Weddings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Story</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                        <h3>Wedding Stories</h3>
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#addweddingstory">Add new weddingstory</a></li>
                            </ul>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Date</th>
                                <td>Status</td>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show_data as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="pro">
                                            <img src="{{ asset($value->image) }}" alt="">
                                        </div>
                                    </td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ \Carbon\Carbon::parse($value->date)->format('d, M Y') }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input toggle-status" type="checkbox"
                                                id="mySwitch{{ $value->id }}" data-id="{{ $value->id }}"
                                                name="darkmode" @if ($value->status) checked @endif
                                                value="yes">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-toggle="dropdown">
                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#updateweddingstory-{{ $value->id }}">Edit</a></li>

                                                <form action="{{ route('admin.weddingstory.delete', $value->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this weddingstory?');"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="dropdown-item" value="Delete">
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="updateweddingstory-{{ $value->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update weddingstory</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="form-inp">
                                                    <form action="{{ route('admin.weddingstory.update') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <!--PROFILE BIO-->
                                                        <input type="hidden" name="weddingstory_id" value="{{ $value->id }}">
                                                        <div class="edit-pro-parti">
                                                            <div class="form-group">
                                                                <label class="lb">Image:</label>
                                                                <div class="fil-img-uplo">
                                                                    <span class="dumfil">Upload image</span>
                                                                    <input type="file" name="image" value="{{ $value->image }}"
                                                                        accept="image/*,.jpg,.jpeg,.png" id="fileInput">
                                                                    @error('image')
                                                                        <small class="text-danger float-end">{{ $message }}</small>
                                                                    @enderror
                                                                    <div>
                                                                        <img src="{{ asset($value->image) }}" alt="" class="backend-img">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="lb">Title:</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter title*" required="" name="title"
                                                                    value="{{ $value->title }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="lb">Date:</label>
                                                                <input type="date" class="form-control" placeholder="Enter Date" name="date"
                                                                    value="{{ $value->date }}">
                                                                @error('date')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="cta-full cta-colr">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
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

    <div class="modal fade" id="addweddingstory">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create new weddingstory</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-inp">
                        <form action="{{ route('admin.weddingstory.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--PROFILE BIO-->                            
                            <input type="hidden" name="wedding_id" value="{{ request()->id }}">

                            <div class="edit-pro-parti">
                                <div class="form-group">
                                    <label class="lb">Image:</label>
                                    <div class="fil-img-uplo">
                                        <span class="dumfil">Upload image</span>
                                        <input type="file" name="image" accept="image/*,.jpg,.jpeg,.png"
                                            id="fileInput">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="lb">Title:</label>
                                    <input type="text" class="form-control" placeholder="Enter title*" required=""
                                        name="title">
                                </div>

                                <div class="form-group">
                                    <label class="lb">Date:</label>
                                    <input type="date" class="form-control" placeholder="Enter Date" name="date"
                                        value="{{ old('date') }}">
                                    @error('date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
        </div>
    </div>

    @push('script')
        <script>
            $(document).on('change', '.toggle-status', function() {
                const weddingstoryId = $(this).data('id');
                const isChecked = $(this).is(':checked');

                $.ajax({
                    url: "{{ route('admin.weddingstory.togglestatus') }}", // Add this route in your Laravel backend
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        weddingstory_id: weddingstoryId,
                        status: isChecked ? 1 : 0
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message, 'Success');
                        } else {
                            toastr.error(response.message, 'Error');
                        }
                    },
                    error: function() {
                        toastr.error('An error occurred. Please try again.', 'Error');
                    }
                });
            });
        </script>
    @endpush
@endsection
