    <!DOCTYPE html>
    <html>

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>{{$titlePage}}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset ('assets') }}/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset ('assets') }}/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{ asset ('assets') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    @stack('css')
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset ('assets') }}/css/argon.css?v=1.1.0" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    </head>

    <body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="/admin">
            <img src="{{ asset ('assets') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
            <!-- Sidenav toggler -->
            <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                </div>
            </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
            <ul class="navbar-nav">

                <li class="nav-item">
                <a class="nav-link  {{(request()->is('admin')) ? 'active' : ''}}" href="{{route('admin.home')}}">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
                </li>

            </ul>
            <!-- Divider -->
            </div>
        </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <nav class="navbar navbar-top navbar-expand navbar-light bg-secondary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->

                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center ml-md-auto">
                    <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                    </li>
                    <li class="nav-item d-sm-none">
                    <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                        <i class="ni ni-zoom-split-in"></i>
                    </a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('assets') }}/img/theme/user.png"">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{auth()->user()->name}}</span>
                        </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                        </a>
                    </div>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
            <div class="row align-items-center">
                {{-- <div class="col-lg-6 col-7">
                <h6 class="h2 d-inline-block mb-0">Admin Dashboard</h6>

                </div> --}}

            </div>
            </div>
        </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            @yield('content')

        <div class="card-deck flex-column flex-xl-row">
            <!-- Members list group card -->
        </div>
        <!-- Footer -->

        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset ('assets') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset ('assets') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset ('assets') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset ('assets') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{ asset ('assets') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    {{-- <script src="{{ asset ('assets') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset ('assets') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset ('assets') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset ('assets') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script> --}}
    @stack('js')
    <!-- Argon JS -->
    <script src="{{ asset ('assets') }}/js/argon.js?v=1.1.0"></script>
    <!-- Demo JS - remove this in your project -->

    </body>

    </html>
