<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inspektorat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('css/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo e(asset('css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('css/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo e(asset('css/plugins/jqvmap/jqvmap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('css/dist/css/adminlte.css')); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo e(asset('css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('css/plugins/daterangepicker/daterangepicker.css')); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('css/plugins/summernote/summernote-bs4.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/plugins/datatables-bs4/css/dataTables.bootstrap4.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/print.min.css')); ?>">
  <script src="<?php echo e(asset('css/plugins/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/print.min.js')); ?>"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="height: 53px;">
    <!-- Left navbar links -->
    <div class="logout" onclick="logout()">
      <i class="fa fa-power-off" onc aria-hidden="true"></i>
    </div>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      
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
          <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if(Auth::user()->level == 'admin'): ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Surat
                <i class="fas fa-angle-left right"></i>
                <?php if(!empty($jumlah_surat)): ?>
                    <span class="badge badge-info right"><?php echo e($jumlah_surat); ?></span>
                <?php endif; ?>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('surat')); ?>" class="nav-link">
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
                <a href="<?php echo e(url('pegawai')); ?>" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p> Daftar Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('pilih_surat_pegawai')); ?>" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p> Daftar Surat Pegawai</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Daftar Penilaian
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if(Auth::user()->level == 'pegawai'): ?>
              <li class="nav-item">
                <a href="<?php echo e(url('pilih_surat_penilaian')); ?>" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p> Penilaian</p>
                </a>
              </li>
              <?php endif; ?>
              <?php if(Auth::user()->level == 'admin'): ?>
              <li class="nav-item">
                <a href="<?php echo e(url('pilih_surat')); ?>" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p> Hasil Penilaian </p>
                </a>
              </li>
              <?php endif; ?>
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
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url('surat')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
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
          <?php if(Auth::user()->level == 'admin'): ?>
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
              <a href="<?php echo e(url('surat')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="<?php echo e(url('pegawai')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <?php endif; ?>


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
              <a href="<?php echo e(url('penilaian')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <div class="col-lg-6">
            <?php if(session('pesan')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                <?php echo e(session('pesan')); ?>

            </div>
            <?php endif; ?>
          </div>
          <div class="col-lg-6">
            <?php if(session('error')): ?>
            <div class="alert alert-error alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Error!</h5>
                <?php echo e(session('error')); ?>

            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="row mb-2">
            <?php echo $__env->yieldContent('list_surat'); ?>
            <?php echo $__env->yieldContent('add_surat'); ?>
            <?php echo $__env->yieldContent('edit_surat'); ?>
            <?php echo $__env->yieldContent('list_pegawai'); ?>
            <?php echo $__env->yieldContent('tambah_karyawan'); ?>
            <?php echo $__env->yieldContent('edit_karyawan'); ?>
            <?php echo $__env->yieldContent('penilaian'); ?>
            <?php echo $__env->yieldContent('penilaian_pegawai'); ?>
            <?php echo $__env->yieldContent('edit_nilai'); ?>
            <?php echo $__env->yieldContent('filter_nomor'); ?>
            <?php echo $__env->yieldContent('hasil_penilaian'); ?>
            <?php echo $__env->yieldContent('view_penilaian'); ?>
            <?php echo $__env->yieldContent('report_nilai'); ?>
            <?php echo $__env->yieldContent('pilih_surat'); ?>
            <?php echo $__env->yieldContent('pilih_surat_pegawai'); ?>
            <?php echo $__env->yieldContent('hasil_keseluruhan'); ?>
            <?php echo $__env->yieldContent('report_nilai_admin'); ?>
            <?php echo $__env->yieldContent('pilih_pegawai_surat'); ?>
            <?php echo $__env->yieldContent('buat_surat_pegawai'); ?>
            <?php echo $__env->yieldContent('edit_surat_pegawai'); ?>
            <?php echo $__env->yieldContent('pilih'); ?>
            <?php echo $__env->yieldContent('pilih_pegawai'); ?>
            <?php echo $__env->yieldContent('Report_penilaian'); ?>
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
<script src="<?php echo e(asset('css/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('css/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- ChartJS -->
<!-- <script src="<?php echo e(asset('css/plugins/chart.js/Chart.min.js')); ?>"></script> -->
<!-- Sparkline -->
<script src="<?php echo e(asset('css/plugins/sparklines/sparkline.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('css/plugins/jquery-knob/jquery.knob.min.js')); ?>"></script> -->
<!-- daterangepicker -->
<script src="<?php echo e(asset('css/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('css/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('css/plugins/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('css/plugins/datatables-bs4/js/dataTables.bootstrap4.js')); ?>"></script>
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
        url: "<?php echo e(url('logout')); ?>",
        data: {
           _token: '<?php echo e(csrf_token()); ?>'
        },
        success: function (response) {
            swal({
              title: 'logout',
              icon: 'success'
            });
            setTimeout(() => {
              return window.location.href = '<?php echo e(url('login')); ?>';
            }, 3000);
        }
      });
    }
  </script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(asset('css/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- Summernote -->
<script src="<?php echo e(asset('css/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(asset('css/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('css/dist/js/adminlte.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo e(asset('css/dist/js/pages/dashboard.js')); ?>"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('css/dist/js/demo.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/home.blade.php ENDPATH**/ ?>