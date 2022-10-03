
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php base_url() ?>public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
        <?php if ($this->session->userdata('role')=='admin') : ?>
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?= site_url('master-pelayanan') ?>"><i class="fa fa-archive"></i> Master Pelayanan</a></li>
        <li><a href="<?= site_url('pelayanan') ?>"><i class="fa fa-book"></i> Pelayanan</a></li>
        <li><a href="<?= site_url('users') ?>"><i class="fa fa-user"></i> <span>Data Pengguna</span></a></li>
        <?php endif; ?>
        <li class="header">More</li>
        <li><a href="<?= site_url('informasi') ?>"><i class="fa fa-info"></i> <span>Informasi</span></a></li>
        <li><a href="<?= site_url('logout') ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
