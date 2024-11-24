@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-6">
                <div class="tit">
                    <h1>Enquiries</h1>
                </div>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Enquiries</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-md-12">
                <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                        <h3>Enquiries</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Designation</th>
                                <td>Show on home page</td>
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
                                            <img src="{{ asset($value->image) }}" alt="">
                                        </div>
                                    </td>
                                    <td><span class="hig-blu">{{ $value->title }}</span></td>
                                    <td><span>{{ $value->designation }}</span></td>
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
                                                
                                                <form action="{{ route('admin.enquiry.delete', $value->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this enquiry?');"
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
            </div> --}}

            <div class="col-md-12">
                <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                        <h3>Enquiries &amp; Leads</h3>
                        <p>Here you can manage your leads and enquiry.</p>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Name</th>
                            <th>E-mail id</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Message</th>
                            <th>Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>
                                <div class="prof-table-thum">
                                    <div class="pro">
                                        <span class="name-init">a</span>
                                    </div>
                                </div>
                            </td>
                            <td>Ashley emyy</td>
                            <td><span class="hig-blu">ashleyipsum@gmail.com</span></td>
                            <td><span class="hig-red">3216548778</span></td>
                            <td>22, Feb 2024</td>
                            <td>12:30 PM</td>
                            <td>Lorem ipsum enquiry message dummy content</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" style="">
                                      <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).on('change', '.toggle-front', function() {
                const enquiryId = $(this).data('id');
                const isChecked = $(this).is(':checked');

                $.ajax({
                    url: "{{ route('admin.enquiry.togglestatus') }}", // Add this route in your Laravel backend
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        enquiry_id: enquiryId,
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
