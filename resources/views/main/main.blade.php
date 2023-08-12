<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rentalku</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('sidebar/assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('sidebar/assets/css/styles.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
  @yield('head')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/" class="text-nowrap logo-img">
            {{-- <img src="{{ asset('sidebar/assets/images/logos/dark-logo.svg') }}" width="180" alt="" /> --}}
            <h3><b>Rentalku</b></h3>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        @include('main.sidebar')
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->

        @yield('content')


      </div>
    </div>
  </div>
  <script src="{{ asset('sidebar/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('sidebar/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('sidebar/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('sidebar/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('sidebar/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('sidebar/assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('sidebar/assets/js/dashboard.js') }}"></script>
  @yield('bottom')
</body>

</html>
