<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $judul ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.css"> -->
  <!-- dataTables -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/css/jquery.dataTables.css">

  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/css/dataTables.bootstrap.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/plugins/iCheck/square/blue.css">
  <!-- export button -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/export button/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/export button/css/buttons.dataTables.min.css" />
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/dist/css/skins/_all-skins.min.css">

  <!-- export button -->
  <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.css"> -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<? base_url() ?>assets/bootstrap/DataTables/datatables.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <!-- SCRIPT -->
  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>assets/AdminLTE/dist/js/demo.js"></script>
  <!-- dataTables -->
  <script src="<?= base_url() ?>assets/bootstrap/js/script.js"></script>
  <script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/jquery.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/jquery.dataTables.js"></script>
  <!-- iCheck -->
  <script src="<?= base_url() ?>assets/AdminLTE/plugins/iCheck/icheck.min.js"></script>
  <!-- export button -->
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/export button/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/export button/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/export button/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/export button/js/jszip.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/export button/js/pdfmake.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/export button/js/vfs_fonts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/export button/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/export button/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/script.js"></script>
  <!-- export button -->
  <!-- select2 -->
  <script src="<?= base_url() ?>assets/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- SCRIPT -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url() ?>assets/AdminLTE/index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>DP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>PD</b>Perpus</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <span class="hidden-xs"><?= $user['nama'] ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url() ?>upload/product/<?= $bio['gambar'] ?>" class="profile-user-img img-responsive img-circle" alt="User Image" width='50' height='50'>

                  <p>
                    <?= $user['nama'] ?>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <!-- <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li> -->
          </ul>
        </div>
      </nav>
    </header>