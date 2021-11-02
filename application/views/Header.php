<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/icon" href="<?php echo base_url()?>assets/img/WD.png">
  <title>Campus</title>
  <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/animate.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- Select2 -->
  <link href="<?php echo base_url()?>assets/vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap Touchspin -->
  <link href="<?php echo base_url()?>assets/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" >
  <!-- Bootstrap DatePicker -->  
  <link href="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" >
   <!-- Bootsrap File Upload -->
  <link href="<?php echo base_url()?>assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href=".<?php echo base_url()?>assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="<?php echo base_url()?>assets/img/WD.jpg">
        </div>
        <div class="sidebar-brand-text mx-3">Campus</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item <?php if($this->uri->segment(1)=="Welcome" || $this->uri->segment(1)==""){echo "active";}?>">
        <a class="nav-link" href="<?php echo base_url('Welcome')?>">
          <i class="fas fa-fw fa-tachometer-alt" title="Dashboard"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item <?php if($this->uri->segment(1)=="Master"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-list-alt" title="Data Master"></i>
          <span>Data Master</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Master</h6>
            <a class="collapse-item <?php if($this->uri->segment(2)=="Jenjang"){echo "active";}?>" href="<?php echo base_url('Master/').'Jenjang' ?>">Jenjang</a>
            <a class="collapse-item <?php if($this->uri->segment(2)=="Jurusan"){echo "active";}?>" href="<?php echo base_url('Master/').'Jurusan' ?>">Jurusan</a>
            <a class="collapse-item <?php if($this->uri->segment(2)=="Ruangan"){echo "active";}?>" href="<?php echo base_url('Master/').'Ruangan' ?>">Ruangan</a>
          </div>
        </div>
      </li>
       
      <li class="nav-item <?php if($this->uri->segment(1)=="Dosen"){echo "active";}?>">
        <a class="nav-link" href="<?php echo base_url('Dosen')?>">
          <i class="fas fa-fw fa-user" title="Data Dosen"></i>
          <span>Data Dosen</span>
        </a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1)=="Mahasiswa"){echo "active";}?>">
        <a class="nav-link" href="<?php echo base_url('Mahasiswa') ?>">
          <i class="fas fa-fw fa-users" title="Data Mahasiswa"></i>
          <span>Data Mahasiswa</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item <?php if($this->uri->segment(1)=="Matakuliah"){echo "active";}?>">
        <a class="nav-link" href="<?php echo base_url('Matakuliah')?>">
          <i class="fas fa-fw fa-book" title="Data Matakuliah"></i>
          <span>Data Matakuliah</span>
        </a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1)=="Jadwal"){echo "active";}?>">
        <a class="nav-link" href="<?php echo base_url('Jadwal') ?>">
          <i class="fas fa-fw fa-calendar" title="Data Jadwal"></i>
          <span>Data Jadwal</span>
        </a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1)=="User"){echo "active";}?>">
        <a class="nav-link" href="<?php echo base_url('AddUser') ?>">
          <i class="fas fa-fw fa-sitemap" title="Data User"></i>
          <span>Data User</span>
        </a>
      </li>
      <hr class="sidebar-divider">
    </ul>