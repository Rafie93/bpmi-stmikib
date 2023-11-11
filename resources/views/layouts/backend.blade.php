<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">

    <title>Admin - BPMI STMIK IB</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/sleek-dashboard/dist/assets/css/sleek.min.css" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('backend/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

    <!-- No Extra plugin used -->
    <link href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}" rel='stylesheet'>

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{ asset('backend/css/sleek.css') }}" />

    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />

    <script src="{{ asset('backend/plugins/nprogress/nprogress.js') }}"></script>
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        @include('layouts.backend.sidebar')
        <!-- ====================================
        ——— PAGE WRAPPER
        ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            @include('layouts.backend.header')

            <!-- ====================================
          ——— CONTENT WRAPPER
          ===================================== -->
            <div class="content-wrapper">
                @yield('content')
            </div> <!-- End Content Wrapper -->


            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        Copyright Rafie &copy; <span id="copy-year"></span> a template by <a class="text-primary"
                            href="https://themefisher.com" target="_blank">Themefisher</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper -->


    <!-- <script type="module">
        import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

        const el = document.createElement('pwa-update');
        document.body.appendChild(el);
    </script> -->

    <!-- Javascript -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/plugins/jekyll-search.min.js') }}"></script> --}}
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/js/sleek.js') }}"></script>
    <script src="{{ asset('backend/plugins/ckeditor/ckeditor.js') }}"></script>
    @yield('script')
</body>

</html>
