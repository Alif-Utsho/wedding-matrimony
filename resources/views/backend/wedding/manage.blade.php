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
        <div class="row">
            <div class="col-md-12">
                <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                        <h3>Weddings</h3>
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin.wedding.add') }}">Add new wedding post</a></li>
                            </ul>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <td>Status</td>
                                <th>Posted on</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show_data as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="pro">
                                            <img src="{{ asset($value->couple_image) }}" alt="">
                                        </div>
                                    </td>
                                    <td><span class="hig-blu">{{ $value->couple_name }}</span></td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input toggle-front" type="checkbox"
                                                id="mySwitch{{ $value->id }}" data-id="{{ $value->id }}"
                                                name="darkmode" @if ($value->status) checked @endif
                                                value="yes">
                                        </div>
                                    </td>
                                    <td>{{ $value->created_at->format('d, M Y') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-toggle="dropdown">
                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                    href="/wedding-details/{{ $value->id }}" target="_blank">View</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.wedding.edit', $value->id) }}">Edit</a></li>
                                                <form action="{{ route('admin.wedding.delete', $value->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this wedding?');"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="dropdown-item" value="Delete">
                                                </form>
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

    @push('script')
        <script>
            $(document).on('change', '.toggle-front', function() {
                const weddingId = $(this).data('id');
                const isChecked = $(this).is(':checked');

                $.ajax({
                    url: "{{ route('admin.wedding.togglefront') }}", // Add this route in your Laravel backend
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        wedding_id: weddingId,
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
