<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <!-- TopBar -->
    <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
      <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
          <span class="nav-link dropdown-toggle" id="dino" aria-haspopup="true" aria-expanded="false"></span>
        </li>
        <li class="nav-item dropdown no-arrow">
          <span class="nav-link dropdown-toggle" id="txt" aria-haspopup="true" aria-expanded="false"></span>
        </li>
        <!-- Sesion User -->
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <?php $JPG = $this->session->userdata('Photo'); ?>
          <img class="img-profile rounded-circle" src="<?php echo base_url().'/assets/upload/'.$JPG; ?>" style="max-width: 60px">
          <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $this->session->userdata('Nama'); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
         <!--  <div class="dropdown-divider"></div> -->
          <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>