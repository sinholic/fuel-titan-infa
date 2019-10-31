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
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">

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
  </nav>
  <!-- /.navbar -->
  {{-- #9C5C22 --}}
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-8" style="background-color: #9C5C22">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/adminlte/dist/img/logo_titaninfra.png" alt="Titan Infra"
           style="opacity: .9">
      <span class="brand-text font-weight-light"><h5>Fuel Management System</h5></span>
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
          <a id="navbarDropdown" class="d-block" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="text-light fa fa nav-icon"></i>
                        <p  class="text-light">
                            Master Station
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview offset-md-1">


                        <li class="nav-item offset-md-3">
                            <a href="/fix" class="nav-link">
                              <i class="fas fa-gas-pump"></i>
                                Fix Master Station
                            </a>
                        </li>
                        
                        <li class="nav-item offset-md-3">
                            <a href="/mobile" class="nav-link">
                              <i class="fas fa-building"></i>
                                Mobile Master Station
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>

            <ul class="nav nav-treeview offset-md-2">
              {{-- <li class="nav-item">
                <a href="/station" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                    Master Station
                </a>
              </li> --}}
              
              <li class="nav-item">
                <a href="/equipment" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p> Master Equipment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/owner" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>Owner</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/fuelman" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>Fuelman</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/organization" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>User HE</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/voucher" class="nav-link">
                  <i class="fas fa-qrcode"></i>
                  <p>Voucher</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/userlv" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>User LV</p>
                </a>
              </li>
            </ul>

          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                 Pengisian Ulang Mobil Station
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">


              <li class="nav-item">
                <a href="/reloading" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>Reloading Fuel</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                Penerimaan Solar
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                Pengisian Solar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">

              <li class="nav-item">
                <a href="#" class="nav-link">
                  
                  <p>On Mobile Station</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>On Fix Station</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>Daftar Pengisian</p>
                </a>
              </li>

            </ul>
          </li>

           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                Peminjaman Solar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">

              <li class="nav-item">
                <a href="#" class="nav-link">
                  
                  <p>On Mobile Station</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>On Fix Station</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>Daftar Pengisian</p>
                </a>
              </li>

            </ul>
          </li>

           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                Pengembalian Solar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">

              <li class="nav-item">
                <a href="#" class="nav-link">
                  
                  <p>On Mobile Station</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>On Fix Station</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>Daftar Pengisian</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                Consignment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">

              <li class="nav-item">
                <a href="#" class="nav-link">
                  
                  <p>On Mobile Station</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>On Fix Station</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-gas-pump"></i>
                  <p>Daftar Pengisian</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                Non Consignment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">

              <li class="nav-item">
                <a href="#" class="nav-link">
                  
                  <p>On Mobile Station</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link pull-right"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>
                  {{ __('Logout')}}
            </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
              </form> 
          </li>
        </ul>
        

      </nav>
      <!-- /.sidebar-menu -->
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

@stack('scripts')
</body>
</html>

<script>
  $(document).ready(function(){
    $('#myTable').DataTable();
  });
</script>