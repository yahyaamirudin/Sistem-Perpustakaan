<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url() ?>assets/AdminLTE/dist/img/avatar5.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= $user['nama'] ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU UTAMA</li>
      <li>
        <a class="treeview active" href="<?= base_url('home'); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i> <span>Data Anggota</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a class="treeview" href="<?= base_url(); ?>anggota">
              <i class="fa fa-circle-o"></i><span>Data Anggota</span>
            </a>
          </li>
          <li>
            <a class="treeview" href="<?= base_url(); ?>UserData">
              <i class="fa fa-circle-o"></i><span>Data User</span>
            </a>
          </li>
        </ul>
      </li>

      <li>
        <a class="treeview" href="<?= base_url(); ?>buku">
          <i class="fa fa-book"></i> <span>Data Buku</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a class="treeview" href="<?= base_url(); ?>transaksi">
              <i class="fa fa-circle-o"></i><span>peminjaman</span>
            </a>
          </li>
          <li>
            <a class="treeview" href="<?= base_url(); ?>kembali">
              <i class="fa fa-circle-o"></i><span>pengembalian</span>
            </a>
          </li>
          <li>
            <a class="treeview" href="<?= base_url(); ?>rekap">
              <i class="fa fa-circle-o"></i><span>rekap peminjaman</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </section>
</aside>