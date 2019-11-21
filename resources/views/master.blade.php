<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Fuel Management System</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
  <!-- jQuery UI -->
  <link rel="stylesheet" href="/adminlte/plugins/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/jquery-ui/jquery-ui.theme.min.css">
  <style>
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 0;
    }

    .form-control label {
      text-transform: capitalize;
    }



    .select2-selection__rendered {
      line-height: 31px !important;
    }

    .select2-container .select2-selection--single {
      height: 35px !important;
    }

    .select2-selection__arrow {
      height: 34px !important;
    }
  </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/home" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fa fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fa fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fa fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
      </ul>
      <!-- Logout -->
      <a href="{{route('logout')}}" class="btn btn-light" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>
        {{ __('Logout')}}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
      </form>
      <!-- Tutup Logout -->
    </nav>
    <!-- /.navbar -->
    {{-- #9C5C22 --}}
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-8" style="background-color: #9C5C22">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <!-- logo_fms.png -->
        <img src="/adminlte/dist/img/logo_fms.png" style="width: 70px; height: 70px;" alt="Titan Infra"
          style="opacity: .9">
        <span class="brand-text font-weight-light">
          <h5>Fuel Management System</h5>
        </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          {{-- <div class="image">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
          <div class="info">
            {{-- <a href="#" class="d-block">Alexander Pierce</a> --}}
            <a id="navbarDropdown" class="d-block" href="#" role="button" aria-haspopup="true" aria-expanded="false"
              v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
          </div>
        </div>

        @include('menu')
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">


          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          @yield('content')
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2019 <a href="#">WidRuStudio</a>.</strong>
      All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="/adminlte/dist/js/adminlte.js"></script>
  <!-- FastClick -->
  <script src="{{asset('adminlte/plugins/fastclick/fastclick.js')}}"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="/adminlte/plugins/chart.js/Chart.min.js"></script>
  <script src="/adminlte/dist/js/demo.js"></script>
  <script src="/adminlte/dist/js/pages/dashboard3.js"></script>
  <!-- DataTables -->
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
  <!-- App scripts -->
  <!-- DataTables -->
  <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
  <!-- jQuery UI -->
  <script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>

  @stack('scripts')

  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
      $('.set-to-select2').select2();
    });
  </script>
  <script>
     function update()
     {
         Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Data berhasil di update',
            showConfirmButton: false,
            timer: 1300
            })
     }
</script>
<script>
     function simpan()
     {
         Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Data berhasil di simpan',
            showConfirmButton: false,
            timer: 1300
            })
     }
</script>
</body>
</html>