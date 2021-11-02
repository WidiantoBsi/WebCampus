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
  <!-- <meta http-equiv="refresh" content="5" /> -->
  <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/animate.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- Select2 -->
  <link href="<?php echo base_url()?>assets/vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap Touchspin -->
  <link href="<?php echo base_url()?>assets/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" >
  <!-- Bootstrap DatePicker -->  
  <link href="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" >
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
      <li class="nav-item <?php if($this->uri->segment(1)=="AdmMahasiswa"){echo "active";}?>">
        <a class="nav-link" href="<?php echo base_url('AdmMahasiswa')?>">
          <i class="fas fa-fw fa-calendar" title="Data Dosen"></i>
          <span>Jadwal</span>
        </a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1)=="Nilai"){echo "active";}?>">
        <a class="nav-link" href="<?php echo base_url('Nilai') ?>">
          <i class="fas fa-fw fa-book" title="Data Tugas"></i>
          <span>Tugas</span>
        </a>
      </li>
      <hr class="sidebar-divider">
    </ul>