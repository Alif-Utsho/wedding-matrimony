<!doctype html>
<html lang="en">

<!-- Mirrored from rn53themes.net/themes/matrimo/admin/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Oct 2024 05:32:52 GMT -->

<head>
    <title>Bibaha</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/admin-style.css') }}">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- HEAD -->
    @include('backend.layouts.navbar')
    <!-- END -->
    <!-- COPYRIGHTS -->
    <section>
        <div class="main">
            <div class="incon">
                <div class="row">
                    @include('backend.layouts.sidebar')

                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
    <!-- COPYRIGHTS -->
    <section>
        <div class="cr">
            <div class="container">
                <div class="row">
                    <p>Copyright ©
                        <a href="https://www.quicktech-ltd.com/" target="_blank">QuickTechIT</a> All
                        rights reserved.
                    </p>
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
    <script src="{{ asset('backend/js/select-opt.js') }}"></script>
    <script src="{{ asset('backend/js/chart.js') }}"></script>
    <script src="{{ asset('backend/js/admin-custom.js') }}"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            @if (session('toastr_success'))
                toastr.success("{{ session('toastr_success') }}");
            @endif

            @if (session('toastr_error'))
                toastr.error("{{ session('toastr_error') }}");
            @endif

            @if (session('toastr_warning'))
                toastr.warning("{{ session('toastr_warning') }}");
            @endif

            @if (session('toastr_info'))
                toastr.info("{{ session('toastr_info') }}");
            @endif
        });
    </script>



    @stack('script')
</body>

<!-- Mirrored from rn53themes.net/themes/matrimo/admin/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Oct 2024 05:33:26 GMT -->

</html>
