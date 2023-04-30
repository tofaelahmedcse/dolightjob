<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote-django/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Aug 2022 06:41:49 GMT -->
<head>

    <meta charset="utf-8" />
    <title>User | Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/userdas/')}}/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/userdas/')}}/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/userdas/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/userdas/')}}/css/app.min.css"  rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/userdas/')}}/style.css"  rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/userdas/')}}/admin.css"  rel="stylesheet" type="text/css" />


    <link href="{{asset('assets/dashboard/')}}/table/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>

    <!-- Responsive datatable examples -->
    <link
        href="{{asset('assets/dashboard/')}}/table/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css"/>
 @stack('css')
</head>

<body data-sidebar="light">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">


    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex logo-wrap">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{ route('index') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/userdas/')}}/images/logo.png" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/userdas/')}}/images/logo.png" alt="" height="17">
                                </span>
                    </a>

                    <a href="{{ route('index') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/userdas/')}}/images/logo.png" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/userdas/')}}/images/logo.png" alt="" height="19">
                                </span>
                    </a>
                </div>

            </div>

            <div class="d-flex header-content-wrap">

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <div class="header-content-right">

                                        <div class="depo-earn-wrap">
                                            <div class="deposite-btn float-start">
                                                <a href="#" class="btn btn-sm btn-primary px-3 py-2 font-size-14 font-weight-bold">Deposite <em>${{number_format(Auth::user()->balance,2)}}</em></a>
                                            </div>
                                            <div class="earning-btn float-start">
                                                <a href="#" class="btn btn-sm bg-success bg-gradient text-light px-3 py-2 font-size-14 font-weight-bold">Earning <em>${{number_format(Auth::user()->earning_bal,2)}}</em></a>
                                            </div>
                                        </div>

                                        <div class="userId float-start">
                                            <a href="#" class="font-size-14">ID <em class="font-weight-bold">126685</em></a>
                                        </div>

                    <div class="dropdown d-inline-block ">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-bell bx-tada"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                             aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small" key="t-view-all"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="javascript: void(0);" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="bx bx-cart"></i>
                                                    </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1" key="t-your-order">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript: void(0);" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('images') }}/{{ Auth::user()->avatar }}"
                                             class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">James Lemire</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1" key="t-simplified">It will seem like simplified English.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript: void(0);" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                                        <i class="bx bx-badge-check"></i>
                                                    </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1" key="t-shipped">Your item is shipped</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="javascript: void(0);" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('images') }}/{{ Auth::user()->avatar }}"
                                             class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Salena Layfield</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1" key="t-occidental">As a skeptical Cambridge friend of mine occidental.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="share-facebook float-start ">
                        <a href="#" class="font-size-14"><i class="mdi mdi-facebook"></i> Share <em class="font-weight-bold">126685k</em></a>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset('images') }}/{{ Auth::user()->avatar }}"
                                 alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{Auth::user()->name}}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                            <a class="dropdown-item" href="{{ route('user.wallet') }}"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a>
                            <a class="dropdown-item d-block" href="{{ route('user.profile') }}"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                            <a class="dropdown-item" href="{{ route('user.lockscreen') }}"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Menu</li>

                    <li>
                        <a href="{{route('home')}}" class="waves-effect">
                            <i class="bx bxs-dashboard"></i>
                            <span key="t-dashboards">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('user.find.job')}}" class="waves-effect">
                            <i class="mdi mdi-account-cog-outline"></i>
                            <span>Find Job</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.post.job')}}" class="waves-effect">
                            <i class="mdi mdi-account-cog-outline"></i>
                            <span>Post Job</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('user.my.jobs')}}" class="waves-effect">
                            <i class="mdi mdi-account-cog-outline"></i>
                            <span>My Jobs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.my.tasks')}}" class="waves-effect">
                            <i class="mdi mdi-account-cog-outline"></i>
                            <span>My Task</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.deposit')}}" class="waves-effect">
                            <i class="mdi mdi-account-cog-outline"></i>
                            <span>Deposit</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.withdraw')}}" class="waves-effect">
                            <i class="mdi mdi-account-cog-outline"></i>
                            <span>Withdraw</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.all.transaction')}}" class="waves-effect">
                            <i class="mdi mdi-account-cog-outline"></i>
                            <span>All Transaction</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.transfer.balance')}}" class="waves-effect">
                            <i class="mdi mdi-account-cog-outline"></i>
                            <span>Transfer</span>
                        </a>
                    </li>

                    <li>
                        <?php
                        $count_dep = \App\Models\user_notification::where('user_id', Auth::user()->id)->where('is_view', 1)->count();
                        ?>
                        <a href="{{route('user.all.notification')}}" class="waves-effect">
                            <i class="mdi mdi-account-cog-outline"></i>
                            <span>Notifications</span>
                        </a>
                    </li>




                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">


                @yield('user')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->



        <footer class="footer">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-3 text-dark footer-item">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear( ) )
                        </script>&nbsp; dolightjob.
                    </div>
                    <div class="col-sm-9 footer-item">
                        <div class="text-sm-end d-none d-sm-block">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item"><a href="{{route('about')}}" target="_blank" class="nav-link text-dark">About US</a></li>
                                <li class="nav-item"><a href="{{route('treanms.condition')}}" target="_blank" class="nav-link text-dark">Terms & Conditions</a></li>
                                <li class="nav-item"><a href="{{route('privacy.policy')}}" target="_blank" class="nav-link text-dark">Privacy Policy</a></li>
                                <li class="nav-item"><a href="#" target="_blank" class="nav-link text-dark">Download Mobile App</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="{{asset('assets/userdas/')}}/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{asset('assets/userdas/')}}/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{asset('assets/userdas/')}}/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{asset('assets/userdas/')}}/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
            </div>
            <div class="form-check form-switch mb-5">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
            </div>


        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/userdas/')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/userdas/')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/userdas/')}}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('assets/userdas/')}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('assets/userdas/')}}/libs/node-waves/waves.min.js"></script>


<!-- jquery step -->
<script src="{{asset('assets/portal/')}}/libs/jquery-steps/build/jquery.steps.min.js"></script>

<!-- form wizard init -->
<script src="{{asset('assets/portal/')}}/js/pages/form-wizard.init.js"></script>


<!-- App js -->

<script src="{{asset('assets/userdas/')}}/js/app.js"></script>
<script src="{{asset('assets/userdas/')}}/js/main.js"></script>



<script src="{{asset('assets/dashboard/')}}/table/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/dashboard/')}}/table/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
@yield('js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')
@if (\Session::get('locked') === true)
    <script>window.location.href = "{{ route('user.lockscreen') }}";</script>
@endif
</body>


<!-- Mirrored from themesbrand.com/skote-django/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Aug 2022 06:44:35 GMT -->
</html>
