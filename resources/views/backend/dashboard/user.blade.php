@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-4">
                <div class="tit">
                    <h1>User Dashboard</h1>
                </div>
            </div>
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Library</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box-com box-qui box-drk grn-box ali-cen">
                    <h4>New Users</h4>
                    <h2>User requests</h2>
                    <span class="bnum">{{ $today_registered }}</span>
                    <p>This count for today how many users can register.</p>
                    {{-- <a href="admin-new-user-requests.html" class="fclick"></a> --}}
                </div>
                <div class="box-com box-qui box-lig ali-cen">
                    <h3>
                        <span>All</span> Members
                    </h3>
                    <span class="bnum">{{ $users }}</span>
                    <canvas id="Chart_users"></canvas>
                    <!-- <a href="admin-new-user-requests.php" class="fclick"></a> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="box-com box-qui box-lig box-new-user ali-cen">
                    <h2>New Registrants</h2>
                    <span class="bnum">{{ $weeklyRegistered }}</span>
                    <div class="users-cir-thum-hori">
                        <span>
                            <img src="{{ asset('backend/images/profiles/1.jpg') }}" data-bs-toggle="tooltip">
                        </span>
                        <span>
                            <img src="{{ asset('backend/images/profiles/10.jpg') }}" data-bs-toggle="tooltip">
                        </span>
                        <span>
                            <img src="{{ asset('backend/images/profiles/11.jpg') }}" data-bs-toggle="tooltip">
                        </span>
                        <span>
                            <img src="{{ asset('backend/images/profiles/12.jpg') }}" data-bs-toggle="tooltip">
                        </span>
                        <span>
                            <img src="{{ asset('backend/images/profiles/13.jpg') }}" data-bs-toggle="tooltip">
                        </span>
                        <span>
                            <img src="{{ asset('backend/images/profiles/14.jpg') }}" data-bs-toggle="tooltip">
                        </span>
                    </div>
                </div>
                <div class="box-com box-qui box-lig ali-cen">
                    <h3>
                        <span>Total</span> Earnings
                    </h3>
                    <span class="bnum">
                        &#2547; {{ $totalEarnings }} </span>
                    <canvas id="Chart_earni"></canvas>
                </div>

            </div>

            <div class="col-md-6">
                <div class="box-com box-qui box-lig ali-cen">
                    <h3>
                        <span>Monthly</span> Earnings
                    </h3>
                    <span class="bnum">
                        &#2547; {{ number_format(array_sum($monthlyEarnings), 2) }} </span>
                    <canvas id="Chart_earni_rece"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                        <h3>Recent members</h3>
                        <p>Recently joined members</p>
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">

                                @foreach ($plans as $plan)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.user.manage', ['plan' => strtolower($plan->name)]) }}"
                                            class="{{ request()->routeIs('admin.user.manage') && request()->plan == strtolower($plan->name) ? 's-act' : '' }}">{{ $plan->name }}
                                            View all profile</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userList as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-toggle="dropdown">
                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.user.show', $user->id) }}">View profile</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.user.bill', $user->id) }}">Billing info</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-com box-qui box-lig box-tab">
                    <div class="tit">
                        <h3>Renewal Reminder</h3>
                        <p>Below listed profils going to expairy soon.</p>
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($plans as $plan)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.user.manage', ['plan' => strtolower($plan->name)]) }}"
                                            class="{{ request()->routeIs('admin.user.manage') && request()->plan == strtolower($plan->name) ? 's-act' : '' }}">{{ $plan->name }}
                                            View all profile</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Package</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $info)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $info->user->name }}</td>
                                    <td>{{ $info->user->phone }}</td>
                                    <td>{{ $info->user->email }}</td>
                                    <td><span class="hig-blu">{{ $info->package_name }}</span></td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-toggle="dropdown">
                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.user.show', $info->user->id) }}">View
                                                        profile</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.user.bill', $info->user->id) }}">Billing
                                                        info</a>
                                                </li>
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

@push('script')
    <script>
        //ARNING CHART

        var platinumEarnings = @json($platinumEarnings);
        var goldEarnings = @json($goldEarnings);

        // Set the data for the pie chart
        var earningsData = {
            labels: ["Platinum", "Gold"], // Labels for the chart
            datasets: [{
                data: [platinumEarnings, goldEarnings], // Data for Platinum and Gold
                backgroundColor: ["#8463FF", "#6384FF"] // Background colors for the segments
            }]
        };

        // Create the pie chart
        var earningCanvas = document.getElementById("Chart_earni");
        var pieChart = new Chart(earningCanvas, {
            type: 'pie', // Pie chart type
            data: earningsData // Data for the chart
        });

        //USER CHART
        var usersCanvas = document.getElementById("Chart_users");

        var usersData = {
            labels: ["Platinum", "Gold", "Free"],
            datasets: [{
                data: [40, 30, 30],
                backgroundColor: ["#198754", "#ffc107", "#6c757d"]
            }]
        };

        var pieChart = new Chart(usersCanvas, {
            type: 'pie',
            data: usersData
        });
        //USER CHART

        // Get the data from the Blade template
        var monthlyEarnings = @json($monthlyEarnings);

        // Prepare data for the chart
        var labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var data = [];

        // Populate the data array with monthly earnings 
        for (var month = 1; month <= 12; month++) {
            data.push(monthlyEarnings[month] || 0);
        }

        // Get the chart context
        var ctx = document.getElementById("Chart_earni_rece").getContext('2d');

        // Create the bar chart
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Earnings',
                    data: data,
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    borderWidth: 2,
                    hoverBackgroundColor: "rgba(255,99,132,0.4)",
                    hoverBorderColor: "rgba(255,99,132,1)"
                }]
            }
        });
    </script>
@endpush
