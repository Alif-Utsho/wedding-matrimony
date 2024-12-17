@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-6">
                <div class="tit">
                    <h1>All Packages Payment</h1>
                </div>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Packages Payment</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                        <h3>All Packages Payment</h3>
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
                                <th>Payment Date</th>
                                <th>User Name</th>
                                <th>Package Name</th>
                                <th>Amount</th>
                                <th>Duration</th>
                                <th>Expired</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payment_list as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td><span class="hig-blu">{{ $value->user['name'] }}</span></td>
                                    <td>{{ $value->package_name }}</td>
                                    <td>{{ $value->amount }}</td>
                                    <td>{{ $value->duration }}</td>
                                    <td>{{ $value->expired_at }}</td>
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
                const packageId = $(this).data('id');
                const isChecked = $(this).is(':checked');

                $.ajax({
                    url: "{{ route('admin.package.togglestatus') }}", // Add this route in your Laravel backend
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        package_id: packageId,
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
