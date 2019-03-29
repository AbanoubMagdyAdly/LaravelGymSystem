<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Laravel Gym System </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> q
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css')}}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
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
      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">


      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{auth()->user()->getRoleNames()[0]}}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              @can('CRUD_city_managers')
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-edit"></i>
                <p>
                  City manager
                  <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/citymanager/create" class="nav-link">
                        <i class="fa fa-plus-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/citymanager/data" class="nav-link">
                        <i class="fa fa-eye nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>
            </ul>
            </li>
            @endcan
            <!-- Create icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                @can('CRUD_city_gyms_manager')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>
                            Gym manager
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href='/gymmanager/create' class="nav-link">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/gymmanager/data" class="nav-link">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Show All</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                    @can('CRUD_gyms')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            <p>
                                Gyms
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/gyms/create" class="nav-link">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/gyms/data" class="nav-link">
                                    <i class="fa fa-eye nav-icon"></i>
                                    <p>Show All</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
    @can('CRUD_trainingPackage')
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-bicycle"></i>
            <p>
                training Packages
                <i class="right fa fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="../../trainingpackages/create" class="nav-link">
                    <i class="fa fa-plus-circle nav-icon"></i>
                    <p>Create</p>
                </a>
            </li>
            <a href="../../trainingpackages/all" class="nav-link">
                <i class="fa fa-eye nav-icon"></i>
                <p>Show All</p>
            </a>
        </li>
        <li class="nav-item">
        </ul>
    </li>
    @endcan
    @can('CRUD_training_sessions')
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-gamepad"></i>
            <p>
                training Sessions
                <i class="right fa fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../../trainingsession/create" class="nav-link">
                        <i class="fa fa-plus-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <a href="../../trainingsession/all" class="nav-link">
                    <i class="fa fa-eye nav-icon"></i>
                    <p>Show All</p>
                </a>
            </li>
            <li class="nav-item">
            </ul>
        </li>
        @endcan
        @can('buy_sessions_to_users')
        <li class="nav-item has-treeview">
            <a href="/revenue/create" class="nav-link">
                <i class="nav-icon fa fa-plus"></i>
                <p>
                    Buy Package For User
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
        </li>
        @endcan
        @can('assign_coaches_to_sessions')
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user-secret"></i>
                <p>
                    Coaches
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/coaches/create" class="nav-link">
                        <i class="fa fa-plus-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/coaches/data" class="nav-link">
                        <i class="fa fa-eye nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        @can('attendance')
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                  Attendance
                  <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/attendance/data" class="nav-link">
                        <i class="fa fa-eye nav-icon"></i>
                        <p>Show All</p>
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        @can('revenue')
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-line-chart"></i>
                <p>
                    Revenue
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="../../revenue/data" class="nav-link">
                    <i class="fa fa-eye nav-icon"></i>
                    <p>Show All</p>
                </a>
            </li>
        </ul>
    </li>
    @endcan
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>LaraGym</h1>
                    </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show">
          {{ session()->get('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        @yield('content')

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{ asset('plugins/fastclick/fastclick.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dist/js/demo.js')}}"></script>
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>
</body>

</html>
