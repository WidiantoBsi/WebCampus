<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Data Jadwal -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Jadwal Kuliah</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->DBWeb->get_data('jadwal')->num_rows(); ?></div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span>Data Jadwal Kuliah</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Data Dosen -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Dosen</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->DBWeb->get_data('dosen')->num_rows(); ?></div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span>Data Dosen</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Data Mahasiswa -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Mahasiswa</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $this->DBWeb->get_data('mahasiswa')->num_rows(); ?></div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span>Data Mahasiswa</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-info"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Data User -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">User Pengguna</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->DBWeb->get_data('user')->num_rows(); ?></div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span>Data Pengguna</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-sitemap fa-2x text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!---Container Fluid-->
</div>