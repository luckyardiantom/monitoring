
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MONITORING| CMS TMI</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
  {{-- Select2css --}}
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/select2.min.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->

</head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
    </li>

    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li> --}}


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
        <img src="{{asset('image/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-5" style="opacity: .6">
      <span class="brand-text font-weight-light">CMS TMI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}
      <div class="sidebar">
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        {{-- <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li> --}}
    @endguest
    </ul>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item active">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-file"></i>
                  <p>
               MONITORING
              </p>
             </a>
             <ul class="nav nav-treeview">
                <li class="">
                    {{-- <a href="{{url('/produk')}}"> --}}
                        <a href="/produk" class="nav-link {{ 'produk' == request()->path() ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                      <p>Monitoring Produk CMS</p>
                    </a>
                  </li>
                   <li class="">
                    <a href="{{url('/master_plu')}}" class="nav-link {{ 'master_plu' == request()->path() ? 'active' : ''}} ">
                          <i class="far fa-circle nav-icon"></i>
                      <p>Monitoring Produk TMI </p>
                    </a>
                  </li>
                 <li class="">
                <a href="{{url('/barcode')}}" class="nav-link {{ 'barcode' == request()->path() ? 'active' : ''}} ">
                    <i class="far fa-circle nav-icon"></i>
                  <p>Monitoring Barcode</p>
                </a>
              </li>
                 <li class="">
                <a href="{{url('/transaksi')}}" class="nav-link {{ 'transaksi' == request()->path() ? 'active' : ''}} ">
                    <i class="far fa-circle nav-icon"></i>
                  <p>Monitoring BTB </p>
                </a>
              </li>
                 <li class="">
                <a href="{{url('/failed')}}" class="nav-link {{ 'failed' == request()->path() ? 'active' : ''}} ">
                    <i class="far fa-circle nav-icon"></i>
                  <p>Monitoring Failed Jobs</p>
                </a>
              </li>
                 <li class="">
                <a href="{{url('/prodmast')}}" class="nav-link {{ 'prodmast' == request()->path() ? 'active' : ''}}" ">
                    <i class="far fa-circle nav-icon"></i>
                  <p>Monitoring Tarikan Master Produk</p>
                </a>
              </li>
                    <li class="">
                <a href="{{url('/permintaan')}}" class="nav-link {{ 'permintaan' == request()->path() ? 'active' : ''}} ">
                    <i class="far fa-circle nav-icon"></i>
                 <p>Monitoring Permintaan Barang</p>
                </a>
              </li>
              {{-- <li class="">
                <a href="{{url('/margin')}}" class="nav-link {{ 'margin' == request()->path() ? 'active' : ''}}" ">
                    <i class="far fa-circle nav-icon"></i>
                  <p>Master Margin</p>
                </a>
              </li> --}}
            </ul>
          </li>

          <li class="nav-item active">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-file"></i>
              <p>
                MASTER MARGIN
          </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="">
                {{-- <a href="{{url('/produk')}}"> --}}
                    <a href="/margin" class="nav-link {{ 'margin' == request()->path() ? 'active' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                  <p>List Master Margin</p>
                </a>
              </li>

        </ul>
      </li>



      <li class="nav-item active">
        <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-file"></i>
          <p>
            MASTER PRODUK
      </p>
     </a>
     <ul class="nav nav-treeview">
        <li class="">
            {{-- <a href="{{url('/produk')}}"> --}}
                <a href="/maping" class="nav-link {{ 'maping' == request()->path() ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
              <p>Maping Status Produk</p>
            </a>
          </li>

          <li class="">
            {{-- <a href="{{url('/produk')}}"> --}}
                <a href="/plu" class="nav-link {{ 'plu' == request()->path() ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
              <p>Maping Tipe Produk</p>
            </a>
          </li>

    </ul>
  </li>

        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

 <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <main class="py-4">
                        @yield('content')
                    </main>


            </div>
            <!-- End of Main Content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->

  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->

    <!-- Default to the left -->
    <strong>Copyright &copy; Software Development I @2021.</strong>

  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->



<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>


<!-- DataTables  & Plugins -->
<script src="{{asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
   {{-- Select2js --}}
   <script src="{{asset('AdminLTE/dist/js/select2.min.js')}}"></script>


   {{-- test --}}


{{-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> --}}


<script>
    var $disabledResults = $(".js-example-disabled-results");
$disabledResults.select2();
</script>
</body>
</html>
