<!doctype html>
<html lang="en">

<!-- Mirrored from rn53themes.net/themes/matrimo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Oct 2024 05:33:45 GMT -->

<head>
    <title>Wedding Matrimony</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="robots" content="noindex">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="https://rn53themes.net/themes/matrimo/images/fav.ico" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/admin-style.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- HEAD -->
    <!-- COPYRIGHTS -->
    <section>
        <div class="login">
            <div class="container">
                <div class="row">
                    <div class="inn">
                        <div class="rhs">
                            <div>
                                <div class="log-1">
                                    <div class="form-tit">
                                        <h4>Access admin-panel</h4>
                                        <h1>Admin login</h1>
                                        <p></p>
                                    </div>

                                    @if ($errors->any())
                                        <div class="text-center alert-danger alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="text-center alert-success alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <div class="form-login">
                                        <form action="{{ route('admin.loginSubmit') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="lb">Email:</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Enter email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label class="lb">Password:</label>
                                                <input type="password" class="form-control" id="password"
                                                    placeholder="Enter password" name="password">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Sign in</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="log-2">
                                    <div class="form-tit">
                                        <h4>Access admin-panel</h4>
                                        <h1>Forgot password</h1>
                                        <p></p>
                                    </div>
                                    <div class="form-login">
                                        <form>
                                            <div class="form-group">
                                                <label class="lb">Email:</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Enter email" name="email">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                {{-- <div class="log-bot">
                                        <ul>
                                            <li>
                                                <span class="ll-1">Login?</span>
                                            </li>
                                            <li>
                                                <span class="ll-2">Forgot password?</span>
                                            </li>
                                        </ul>
                                    </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/admin-custom.js') }}"></script>
    <script>
        $('.ll-1').on('click', function() {
            $('.log-1').slideDown();
            $('.log-2').slideUp();
        });
        $('.ll-2').on('click', function() {
            $('.log-2').slideDown();
            $('.log-1').slideUp();
        });
    </script>
</body>

<!-- Mirrored from rn53themes.net/themes/matrimo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Oct 2024 05:33:45 GMT -->

</html>
