<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg" style="height: 64px"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="<?php echo base_url(); ?>dist/index" class="navbar-brand">Stisla</a>
        <form class="form-inline mr-auto">
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Menu</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?php echo base_url(); ?>histori" class="dropdown-item has-icon">
                <i class="fas fa-home"></i> Dasbor
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('login/logout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
