@extends('backend.layouts.master')
@section('content')
    <div class="pan-rhs">
        <div class="row main-head">
            <div class="col-md-4">
                <div class="tit">
                    <h1>Admin Dashboard</h1>
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
                    <a href="admin-new-user-requests.html" class="fclick"></a>
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
                            <img src="{{ asset('backend/images/profiles/1.jpg') }}" data-bs-toggle="tooltip"
                                title="Hooray!">
                        </span>
                        <span>
                            <img src="{{ asset('backend/images/profiles/10.jpg') }}" data-bs-toggle="tooltip"
                                title="Hooray!">
                        </span>
                        <span>
                            <img src="{{ asset('backend/images/profiles/11.jpg') }}" data-bs-toggle="tooltip"
                                title="Hooray!">
                        </span>
                        <span>
                            <img src="{{ asset('backend/images/profiles/12.jpg') }}" data-bs-toggle="tooltip"
                                title="Hooray!">
                        </span>
                        <span>
                            <img src="{{ asset('backend/images/profiles/13.jpg') }}" data-bs-toggle="tooltip"
                                title="Hooray!">
                        </span>
                        <span>
                            <img src="{{ asset('backend/images/profiles/14.jpg') }}" data-bs-toggle="tooltip"
                                title="Hooray!">
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
                                <li>
                                    <a class="dropdown-item" href="#">View all profile</a>
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
                                <th>Join date</th>
                                <th>Plan type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="prof-table-thum">
                                        <div class="pro">
                                            <img src="{{ asset('backend/images/profiles/3.jpg') }}" alt="">
                                        </div>
                                        <div class="pro-info">
                                            <h5>Ashley emyy</h5>
                                            <p>ashleyipsum@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>01 321-998-91</td>
                                <td>22, Feb 2024</td>
                                <td>
                                    <span class="hig-grn">Premium</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#">More details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">View profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="prof-table-thum">
                                        <div class="pro">
                                            <img src="{{ asset('backend/images/profiles/4.jpg') }}" alt="">
                                        </div>
                                        <div class="pro-info">
                                            <h5>Elizabeth Taylor</h5>
                                            <p>ashleyipsum@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>01 321-998-91</td>
                                <td>22, Feb 2024</td>
                                <td>
                                    <span class="hig-grn">Premium</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#">More details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">View profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
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
                                <li>
                                    <a class="dropdown-item" href="#">View all profile</a>
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
                                <th>Expairy date</th>
                                <th>Plan type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="prof-table-thum">
                                        <div class="pro">
                                            <img src="{{ asset('backend/images/profiles/men3.jpg') }}" alt="">
                                        </div>
                                        <div class="pro-info">
                                            <h5>Ashley emyy</h5>
                                            <p>ashleyipsum@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>01 321-998-91</td>
                                <td>
                                    <span class="hig-red">22, Feb 2024</span>
                                </td>
                                <td>
                                    <span class="hig-grn">Premium</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#">More details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">View profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="prof-table-thum">
                                        <div class="pro">
                                            <img src="{{ asset('backend/images/profiles/9.jpg') }}" alt="">
                                        </div>
                                        <div class="pro-info">
                                            <h5>Elizabeth Taylor</h5>
                                            <p>ashleyipsum@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>01 321-998-91</td>
                                <td>
                                    <span class="hig-red">22, Feb 2024</span>
                                </td>
                                <td>
                                    <span class="hig-grn">Premium</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#">More details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">View profile</a>
                                            </li>
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
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Get the data from the Blade template
        var monthlyEarnings = @json($monthlyEarnings);

        // Prepare data for the chart
        var labels = [];
        var data = [];
        for (var month = 1; month <= 12; month++) {
            labels.push(month);
            data.push(monthlyEarnings[month] || 0);
        }

        // Create the chart using Chart.js
        var ctx = document.getElementById('Chart_earni_rece').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Earnings',
                    data: data,
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'Tk ' + tooltipItem.raw.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Earnings (Tk)'
                        }
                    }
                }
            }
        });
    </script>
@endpush
