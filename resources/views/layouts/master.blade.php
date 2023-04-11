<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
  <div class="bs-canvas-overlay bg-default position-fixed w-100 h-100"></div>
  <nav class="navbar navbar-expand-xl navbar-dark bg-info">
    <a class="navbar-brand" href="#">Kos 95  <img src="{{ asset('kos95.png') }}" alt="logo" width="50" class="shadow-light rounded-circle"></a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item mt-2">
          <a href="{{ '/home' }}" class="nav-link">
            <p class="nav-icon fas fa-tachometer-alt">  Dashboard</p>
            
          </a>
        </li>
        <li class="nav-item mt-2">
          <a href="{{ '/voucher' }}" class="nav-link ">
            <p class="fa fa-ticket"> 
              Voucher
            </p>
            
          </a>
        </li>
        <li class="nav-item mt-2">
          <a href="{{ '/log' }}" class="nav-link ">
            <p class="fa fa-sticky-note">
              Log
            </p>
          </a>
        </li>

        <li class="nav-item mt-2">
          <a href="{{ '/queue' }}" class="nav-link ">
            <p class="fa fa-bars">
              Queue
            </p>
          </a>
        </li>

        <li class="nav-item mt-2">
          <a href="{{ '/rebbot' }}" class="nav-link ">
            <p class="fa fa-filter">
              Filter
            </p>
          </a>
        </li>

        <li class="nav-item mt-2">
          <a href="{{ '/rebbot' }}" class="nav-link ">
            <p class="fa fa-power-off">
              Reboot
            </p>
          </a>
        </li>

<li class="nav-item dropdown mt-2">
          <a class="nav-link" href="{{ '/logout' }}" onclick="event.preventDefault(); document.getElementById('submit-form').submit()">
              <i class="fas fa-sign-out-alt" style="color: blue"></i>
          </a>
        </li>
        <form id="submit-form" action="{{ '/logout' }}" method="POST" class="hidden">
          @csrf
        </form>

      </ul>
      
    </div>    
  </nav>
  <style>
    .container{
      max-width: 1500px;
    }
  </style>
  @yield('content')
 

  </body>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->

<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
{{-- <script src="{{ asset('dist/js/adminlte.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
@stack('js-page')
</body>
</html>
