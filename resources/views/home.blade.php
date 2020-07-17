<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inspektorat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('css/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('css/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/dist/css/adminlte.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('css/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('css/plugins/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('css/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <script src="{{ asset('css/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
  <style>
    .logout {
      position: absolute;
      right: 26px;
      cursor: pointer;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <div class="logout" onclick="logout()">
      <i class="fa fa-power-off" onc aria-hidden="true"></i>
    </div>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Auth::user()->level == 'admin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Surat
                <i class="fas fa-angle-left right"></i>
                @if(!empty($jumlah_surat))
                    <span class="badge badge-info right">{{ $jumlah_surat }}</span>
                @endif
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('surat') }}" class="nav-link">
                  <i class="fas fa-mail-bulk"></i>
                  <p>Daftar Surat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Daftar Pegawai
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('pegawai') }}" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p> Daftar Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pilih_surat_pegawai') }}" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p> Daftar Surat Pegawai</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Daftar Penilaian
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Auth::user()->level == 'pegawai')
              <li class="nav-item">
                <a href="{{ url('pilih_surat_penilaian') }}" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p> Penilaian</p>
                </a>
              </li>
              @endif
              @if(Auth::user()->level == 'admin')
              <li class="nav-item">
                <a href="{{ url('pilih_surat') }}" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p> Hasil Penilaian </p>
                </a>
              </li>
              @endif
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('surat') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @if(Auth::user()->level == 'admin')
          <div class="col-lg-3 col-6">
            <!-- small box -->
<!--             <div class="small-box bg-info">
              <div class="inner">
                <h3></h3>

                <p>Daftar Surat</p>
              </div>
              <div class="icon">
                <i class="fas fa-mail-bulk"></i>
              </div>
              <a href="{{ url('surat') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
<!--             <div class="small-box bg-info">
              <div class="inner">
                <h3></h3>

                <p>Daftar Pegawai</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-friends"></i>
              </div>
              <a href="{{ url('pegawai') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          @endif


          <div class="col-lg-3 col-6">
            <!-- small box -->
<!--             <div class="small-box bg-info">
              <div class="inner">
                <h3></h3>

                <p>Penilaian</p>
              </div>
              <div class="icon">
                <i class="fas fa-check"></i>
              </div>
              <a href="{{ url('penilaian') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <div class="col-lg-6">
            @if(session('pesan'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ session('pesan') }}
            </div>
            @endif
          </div>
        </div>
        <div class="row mb-2">
            @yield('list_surat')
            @yield('add_surat')
            @yield('edit_surat')
            @yield('list_pegawai')
            @yield('tambah_karyawan')
            @yield('edit_karyawan')
            @yield('penilaian')
            @yield('penilaian_pegawai')
            @yield('edit_nilai')
            @yield('filter_nomor')
            @yield('hasil_penilaian')
            @yield('view_penilaian')
            @yield('report_nilai')
            @yield('pilih_surat')
            @yield('pilih_surat_pegawai')
            @yield('hasil_keseluruhan')
            @yield('report_nilai_admin')
            @yield('pilih_pegawai_surat')
            @yield('buat_surat_pegawai')
            @yield('edit_surat_pegawai')
            @yield('pilih')
            @yield('pilih_pegawai')
            @yield('Report_penilaian')
        </div>
      </div><!-- /.container-fluid -->
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

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('css/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('css/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<!-- <script src="{{ asset('css/plugins/chart.js/Chart.min.js') }}"></script> -->
<!-- Sparkline -->
<script src="{{ asset('css/plugins/sparklines/sparkline.js') }}"></script>
<!-- <script src="{{ asset('css/plugins/jquery-knob/jquery.knob.min.js') }}"></script> -->
<!-- daterangepicker -->
<script src="{{ asset('css/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('css/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('css/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('css/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });

    function logout() {
      $.ajax({
        type: "POST",
        url: "{{ url('logout') }}",
        data: {
           _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            swal({
              title: 'logout',
              icon: 'success'
            });
            setTimeout(() => {
              return window.location.href = '{{ url('login') }}';
            }, 3000);
        }
      });
    }
  </script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('css/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('css/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('css/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('css/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('css/dist/js/pages/dashboard.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('css/dist/js/demo.js') }}"></script>
</body>
</html>
