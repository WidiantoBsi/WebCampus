<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/icon" href="<?php echo base_url()?>assets/img/WD.png">
  <title>Campus - Login</title>
  <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form action="<?php echo base_url('User/').'Login'; ?>" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control" name="ID" placeholder="ID User" autocomplete='off'>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="Password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <!-- <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div> -->
                    </div>
                    <div class="form-group">
                      <!-- <a href="index.html" class="btn btn-primary btn-block">Login</a> -->
                      <input type="submit" value="LogIn" class="btn btn-primary btn-block" />
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <?php
                    if($this->session->flashdata('alert')){ ?>
                     <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <?php echo $this->session->flashdata('alert'); ?>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/ruang-admin.min.js"></script>
</body>

</html>