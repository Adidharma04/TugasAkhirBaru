
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" >
<!-- Wrapper -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<div class="wrapper">

<?php
  $uriSegment = $this->uri->segment(2);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('user/dashboard_user')?>" class="brand-link">
      <img src="<?= base_url().'assets/Gambar/Website/Title_SMA.png'?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMA Negeri Ploso</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php
            $img = "";
            // foto default 
            if ($this->session->userdata('sess_jenis_kelamin') == "l") {

                $img = base_url('assets/Gambar/Website/male.png');
            } else {

                $img = base_url('assets/Gambar/Website/female.png');
            }
          ?>

          <img src="<?= $img?>">
        </div>
        <div class="info">
          <a href="<?= base_url('admin/profile_admin/index')?>" class="d-block"><?php echo ucfirst($this->session->userdata('sess_name')) ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="<?php echo base_url('admin/dashboard_admin')?>" class="nav-link <?php if ($uriSegment == "dashboard_admin") echo 'active'; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/profile')?>" class="nav-link <?php if ($uriSegment == "profile") echo 'active'; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/siswa')?>" class="nav-link <?php if ($uriSegment == "siswa") echo 'active'; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa / Alumni</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/pegawai')?>" class="nav-link <?php if ($uriSegment == "pegawai") echo 'active'; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pegawai</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
          <a href="<?= base_url().'admin/tracer_alumni'?>" class="nav-link <?php if ($uriSegment == "tracer_alumni") echo 'active'; ?>">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Tracer Alumni
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url().'admin/penilaian'?>" class="nav-link <?php if ($uriSegment == "penilaian") echo 'active'; ?>">
              <i class="nav-icon fa fa-comments-o"></i>
              <p>
                Kritik dan Saran
              </p>
            </a>
          </li>
          <li class="nav-header">INFORMASI</li>
          <li class="nav-item">
            <a href="<?= base_url().'admin/event'?>" class="nav-link <?php if ($uriSegment == "event") echo 'active'; ?>">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Event
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url().'admin/informasi_umum'?>"class="nav-link <?php if ($uriSegment == "informasi_umum") echo 'active'; ?>">
              <i class="nav-icon far fa-newspaper-o"></i>
              <p>
                Informasi Kuliah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'admin/sharing_loker'?>" class="nav-link <?php if ($uriSegment == "sharing_loker") echo 'active'; ?>">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Lowongan Kerja
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'admin/forum_diskusi'?>" class="nav-link <?php if ($uriSegment == "forum_diskusi") echo 'active'; ?>" >
              <i class="nav-icon fa fa-comments"></i>
              <p>
                Forum Diskusi
              </p>
            </a>
          </li>
          <li class="nav-header"> REGISTRASI PENGGUNA</li>
          <li class="nav-item">
            <a href="<?php echo base_url("admin/pegawai/tambah")?>" class="nav-link <?php if ($uriSegment == "pegawai") echo 'active'; ?>">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Registrasi Pegawai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/registrasi_siswa/index') ?>" class="nav-link <?php if ($uriSegment == "registrasi_siswa") echo 'active'; ?>">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Registrasi Siswa
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  