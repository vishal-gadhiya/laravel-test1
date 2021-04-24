<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Test') }}</title>
    <!-- Fonts -->
    <link href="{{ asset('vendors/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/spinner/spinner.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/sweetalert/sweetalert.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css').'?'.time() }}" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('user.layouts.sidebar')
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                  <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ ucfirst(Auth::user()->fname).' '.ucfirst(Auth::user()->lname) }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('images/profile.jpg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('user.profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Laravel Test {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendors/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Form Validate JavaScript-->
    <script src="{{ asset('vendors/validate/validate.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('vendors/spinner/spinner.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript">var site_url = "{{ url('/') }}/";@if($message = Session::get('success_message')) var success_message = "{!! $message !!}"; @endif @if($message = Session::get('error_message')) var error_message = "{!! $message !!}"; @endif @if($message = Session::get('info_message')) var info_message = "{!! $message !!}"; @endif</script>
    <script src="{{ asset('js/custom.js').'?'.time() }}"></script>
    @stack('scripts')
</body>
</html>