<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}"> --}}
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-bar-rating/css-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.dataTables.min.css" rel="stylesheet">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/guru.css') }}" />

    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <style>
        table.user_datatable tbody td {
            word-break: break-word;
            word-break: break-all;
            white-space: normal;
        }

        table.inbox_datatable tbody td {
            word-break: break-word;
            word-break: break-all;
            white-space: normal;
        }

        table.dispo_datatable tbody td {
            word-break: break-word;
            word-break: break-all;
            white-space: normal;
        }

        td.details-control {
            background: url('{{ URL::asset('assets/details_open.png') }}') no-repeat center center;
            cursor: pointer;
        }

        tr.details td.details-control {
            background: url('{{ URL::asset('assets/details_close.png') }}') no-repeat center center;
        }
    </style>
</head>


<body>
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo" href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" style="height: auto" />

                        </a>
                        <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}"><img
                                src="{{ asset('assets/images/favicon.ico') }}" alt="logo" /></a>
                    </div>
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <div class="nav-profile-img">
                                        <img src="{{ asset('storage/avatar/' . auth()->user()->avatar) }}"
                                            alt="image" />
                                    </div>
                                    <div class="nav-profile-text">
                                        <p class="text-black font-weight-semibold m-0"> {{ $nama }} </p>
                                        <span class="font-13 online-color">online <i
                                                class="mdi mdi-chevron-down"></i></span>
                                    </div>
                                </a>
                                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('user_setting') }}" class="dropdown-item">
                                        <i class="mdi mdi-account mr-2 text-primary"></i> Pengaturan Akun </a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item" ">
                                        <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </button></form>

                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </div>

            </nav>
            @yield('navbar')
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper" style="margin-bottom: 2rem">
            <div class="main-panel">
                <div class="content-wrapper pb-0">
                    @yield('content')
                </div>


            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.stack.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- End custom js for this page -->
    @yield('customjs')
</body>

<script src="http://localhost:35729/livereload.js"></script>

</html>
