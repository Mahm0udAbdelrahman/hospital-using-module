



<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Material Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('dashboard/node_modules/mdi/css/materialdesignicons.min.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('dashboard/images/favicon.png')}}" />
</head>

<body>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    {{--  sidebar  --}}
<aside class="mdc-persistent-drawer mdc-persistent-drawer--open">

    @include('doctors::layouts.sidebar')
</aside>
    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    {{--  header  --}}
<header class="mdc-toolbar mdc-elevation--z4 mdc-toolbar--fixed">

    @include('doctors::layouts.header')
</header>

    <!-- partial -->
    <div class="page-wrapper mdc-toolbar-fixed-adjust">
      {{--  main  --}}
      <main class="content-wrapper">
      @yield('content')
      </main>
      <!-- partial:partials/_footer.html -->
     {{--  footer  --}}
     <footer>
     @include('doctors::layouts.footer')
     </footer>
      <!-- partial -->
    </div>
  </div>
  <!-- body wrapper -->
  <!-- plugins:js -->
  <script src="{{ asset('dashboard/node_modules/material-components-web/dist/material-components-web.min.js')}}"></script>
  <script src="{{ asset('dashboard/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('dashboard/node_modules/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{ asset('dashboard/node_modules/progressbar.js/dist/progressbar.min.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('dashboard/js/misc.js')}}"></script>
  <script src="{{ asset('dashboard/js/material.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('dashboard/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
</body>

</html>
