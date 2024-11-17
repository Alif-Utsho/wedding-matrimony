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
            <div class="box-com box-qui box-drk grn-box">
                <h4>New Users</h4>
                <h2>User requests</h2>
                <span class="bnum">69</span>
                <p>This count for today how many users can register.</p>
                <a href="admin-new-user-requests.html" class="fclick"></a>
            </div>
            <div class="box-com box-qui box-lig ali-cen">
                <h3>
                    <span>All</span> Members
                </h3>
                <span class="bnum">6900</span>
                <canvas id="Chart_users"></canvas>
                <!-- <a href="admin-new-user-requests.php" class="fclick"></a> -->
            </div>
            <div class="box-com box-qui live-box">
                <h4>Live visitos</h4>
                <h2>Currently Active Users</h2>
                <span class="bnum">3600</span>
                <p>Currently <span>3600</span> visitos survey in your website </p>
                <div class="live">
                    <span class="move"></span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box-com box-qui box-lig box-new-user">
                <h2>New Registrants</h2>
                <span class="bnum">38</span>
                <div class="users-cir-thum-hori">
                    <span>
                        <img src="{{ asset('backend/images/profiles/1.jpg') }}"
                            data-bs-toggle="tooltip" title="Hooray!">
                    </span>
                    <span>
                        <img src="{{ asset('backend/images/profiles/10.jpg') }}"
                            data-bs-toggle="tooltip" title="Hooray!">
                    </span>
                    <span>
                        <img src="{{ asset('backend/images/profiles/11.jpg') }}"
                            data-bs-toggle="tooltip" title="Hooray!">
                    </span>
                    <span>
                        <img src="{{ asset('backend/images/profiles/12.jpg') }}"
                            data-bs-toggle="tooltip" title="Hooray!">
                    </span>
                    <span>
                        <img src="{{ asset('backend/images/profiles/13.jpg') }}"
                            data-bs-toggle="tooltip" title="Hooray!">
                    </span>
                    <span>
                        <img src="{{ asset('backend/images/profiles/14.jpg') }}"
                            data-bs-toggle="tooltip" title="Hooray!">
                    </span>
                    <span>
                        <img src="{{ asset('backend/images/profiles/15.jpg') }}"
                            data-bs-toggle="tooltip" title="Hooray!">
                    </span>
                    <span>
                        <img src="{{ asset('backend/images/profiles/16.jpg') }}"
                            data-bs-toggle="tooltip" title="Hooray!">
                    </span>
                </div>
            </div>
            <div class="box-com box-qui box-lig ali-cen">
                <h3>
                    <span>Total</span> Earnings
                </h3>
                <span class="bnum">
                    <sub>$</sub>10,069 </span>
                <canvas id="Chart_earni"></canvas>
            </div>
            <div class="box-com box-qui box-drk box-lead-thum">
                <h2>Leads & Enquiry</h2>
                <span class="bnum">28</span>
                <div class="lead-cir-thum-hori">
                    <span data-bs-toggle="tooltip" title="Anna">A</span>
                    <span data-bs-toggle="tooltip" title="John">j</span>
                    <span data-bs-toggle="tooltip" title="Bailey">b</span>
                    <span data-bs-toggle="tooltip" title="Erick">e</span>
                    <span data-bs-toggle="tooltip" title="Boby">b</span>
                    <span data-bs-toggle="tooltip" title="Uma">u</span>
                    <span data-bs-toggle="tooltip" title="Maria">m</span>
                </div>
                <a href="admin-enquiry.html" class="fclick"></a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box-com box-qui box-lig ali-cen">
                <h3>
                    <span>Monthly</span> Earnings
                </h3>
                <span class="bnum">
                    <sub>$</sub>10,069 </span>
                <canvas id="Chart_earni_rece"></canvas>
            </div>
            <div class="box-com box-qui box-drk box-them-info">
                <h4>Template update status</h4>
                <ul>
                    <li>Current version you installed: <strong>3.6</strong>
                    </li>
                    <li>Latest version: <strong>4.2</strong>
                    </li>
                    <li>Template Activation: <strong>Yes</strong>
                    </li>
                </ul>
                <a href="#" class="btn-com btn-red">Update</a>
                <a href="#" class="btn-com btn-gre">Licance key</a>
                <a href="#" class="btn-com btn-line btn-whi">More details</a>
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
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-toggle="dropdown">
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
                                        <img src="{{ asset('backend/images/profiles/3.jpg') }}"
                                            alt="">
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
                                        <img src="{{ asset('backend/images/profiles/4.jpg') }}"
                                            alt="">
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
                            <td>3</td>
                            <td>
                                <div class="prof-table-thum">
                                    <div class="pro">
                                        <img src="{{ asset('backend/images/profiles/11.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="pro-info">
                                        <h5>Angelina Jolie</h5>
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
                            <td>4</td>
                            <td>
                                <div class="prof-table-thum">
                                    <div class="pro">
                                        <img src="{{ asset('backend/images/profiles/6.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="pro-info">
                                        <h5>Olivia mia</h5>
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
                            <td>5</td>
                            <td>
                                <div class="prof-table-thum">
                                    <div class="pro">
                                        <img src="{{ asset('backend/images/profiles/7.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="pro-info">
                                        <h5>Jennifer</h5>
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
                            <td>6</td>
                            <td>
                                <div class="prof-table-thum">
                                    <div class="pro">
                                        <img src="{{ asset('backend/images/profiles/15.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="pro-info">
                                        <h5>Emmy jack</h5>
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
        <div class="col-md-6">
            <div class="box-com box-qui box-lig box-tab">
                <div class="tit">
                    <h3>Renewal Reminder</h3>
                    <p>Below listed profils going to expairy soon.</p>
                    <div class="dropdown">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-toggle="dropdown">
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
                                        <img src="{{ asset('backend/images/profiles/men3.jpg') }}"
                                            alt="">
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
                                        <img src="{{ asset('backend/images/profiles/9.jpg') }}"
                                            alt="">
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
                        <tr>
                            <td>3</td>
                            <td>
                                <div class="prof-table-thum">
                                    <div class="pro">
                                        <img src="{{ asset('backend/images/profiles/men1.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="pro-info">
                                        <h5>Angelina Jolie</h5>
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
                            <td>4</td>
                            <td>
                                <div class="prof-table-thum">
                                    <div class="pro">
                                        <img src="{{ asset('backend/images/profiles/men2.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="pro-info">
                                        <h5>Olivia mia</h5>
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
                            <td>5</td>
                            <td>
                                <div class="prof-table-thum">
                                    <div class="pro">
                                        <img src="{{ asset('backend/images/profiles/6.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="pro-info">
                                        <h5>Jennifer</h5>
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
                            <td>6</td>
                            <td>
                                <div class="prof-table-thum">
                                    <div class="pro">
                                        <img src="{{ asset('backend/images/profiles/7.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="pro-info">
                                        <h5>Emmy jack</h5>
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