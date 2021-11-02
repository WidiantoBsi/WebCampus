<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
    </ol>
  </div>
<?php // alert Input File
  if($this->session->flashdata('alert')){ ?>
  <div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
   <?php echo $this->session->flashdata('alert'); ?>
  </div>
  <?php } ?>
  <!-- Row -->
  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
          <a href="#" class="m-0 float-right btn btn-success btn-sm" data-toggle="modal" data-target="#AddMahasiswa"><i class="fas fa fa-plus"></i> Add Mahasiswa</a>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>Nim</th>
                <th>Nama Mahasiswa</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($Mahasiswa as $b){
                $IdData = $b->Nim;
                $where = array('ID_Jurusan' => $b->ID_Jurusan);
                $DB = $this->DBWeb->edit_data($where,'jurusan')->result();
                foreach($DB as $a){
                  $Jurusan = $a->NamaJurusan;
                } 
                ?>
                <tr>
                  <td><a href="#" title="Edit Data" data-toggle="modal" data-target="#modal_edit<?php echo $IdData;?>"><?php echo $b->Nim ?></a></td>
                  <td><?php echo $b->NamaSiswa ?></td>
                  <?php if ($b->JenisKelamin=='L') { ?>
                  <td><?php echo "Laki-Laki" ?></td>
                  <?php }else{ ?>
                  <td><?php echo "Perempuan" ?></td>
                  <?php } ?>
                  <td><?php echo $b->Tgl_Lahir ?></td>
                  <td><?php echo $b->NoTelepon ?></td>
                  <td><?php echo $b->Alamat ?></td>
                  <td><?php echo $Jurusan ?></td>
                  <td>
                    <a class="btn btn-warning btn-sm" title="Hapus" data-toggle="modal" data-target="#modal_delete<?php echo $IdData; ?>" ><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</div>

<!-- ============== Modal Add Dosen ====================== -->
<div class="modal fade" id="AddMahasiswa" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<form action="<?php echo base_url('Master/').'AddMahasiswa'; ?>" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Mahasiswa</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="exampleFormControlInput1">NIM</label>
          <input class="form-control" type="text" name="Nim" value="<?php echo $ID ?>" readonly>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Nama Mahasiswa</label>
          <input type="text" class="form-control" name="Nama" placeholder="Nama Mahasiswa" required/>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jenis Kelamin</label>
          <select class="form-control mb-3" name="JK">
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>

        <div class="form-group">
          <label for="decadeView">Tanggal Lahir</label>
          <div class="input-group date">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="date" class="form-control" name="Tgl_Lahir" value="dd/mm/yyyy" id="decadeView" required/>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">No Telepon</label>
          <input type="text" class="form-control" name="NoHp" placeholder="No Telepon" required/>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Alamat</label>
          <textarea class="form-control" name="Alamat" rows="3" required/></textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jurusan</label>
          <select class="form-control mb-3" name="Jurusan">
            <?php foreach($jurusan->result() as $row):?>
              <option value="<?php echo $row->ID_Jurusan; ?>"><?php echo $row->NamaJurusan; ?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Photo</label>
          <div class="">
            <div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                <img src="<?php echo base_url().'assets/img/No Image.jpg' ; ?>">
              </div>
              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
              <div>
                <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                <input type="file" name="foto"></span>
                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
              </div>
            </div>
          </div> 
        </div>

      </div>
      <div class="modal-footer">
        <input type="submit" value="Tambah"  class="btn btn-sm btn-primary"/>
      </div>
    </div>
  </div>
</form>
</div>

<!-- ============== Modal Edit Mahasiswa ====================== -->
<?php 
  foreach($Mahasiswa as $row){
    $IdData = $row->Nim;
    $Nama = $row->NamaSiswa;
    $Tgl = $row->Tgl_Lahir;
    $NoHp = $row->NoTelepon;
    $Alamat = $row->Alamat;
    $Photo = $row->Photo;
?>
<div class="modal animated zoomIn" id="modal_edit<?php echo $IdData;?>" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url('Master/').'EditMahasiswa'; ?>" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Edit Mahasiswa</h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="exampleFormControlInput1">NIM</label>
            <input type="text" class="form-control" name="Nim" value="<?php echo $IdData ?>"readonly>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="Nama" value="<?php echo $Nama ?>" required/>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Jenis Kelamin</label>
            <select class="form-control mb-3" name="JK">
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>

          <div class="form-group" id="simple-date3">
            <label for="decadeView">Tanggal Lahir</label>
            <div class="input-group date">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
              </div>
              <input type="text" class="form-control" name="Tgl_Lahir" value="<?php echo $Tgl ?>" id="decadeView" required/>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">No Telepon</label>
            <input type="text" class="form-control" name="NoHp" value="<?php echo $NoHp ?>" required/>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea class="form-control" name="Alamat" rows="3" required/><?php echo $Alamat ?></textarea>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Jurusan</label>
            <select class="form-control mb-3" name="Jurusan">
              <?php foreach($jurusan->result() as $row):?>
              <option value="<?php echo $row->ID_Jurusan; ?>"><?php echo $row->NamaJurusan; ?></option>
              <?php endforeach;?>
            </select>
          </div>

          <div class="">
            <div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="fileupload-new thumbnail" style="width: 200px; height: 140px;"><img src="<?php echo base_url().'assets/upload/'.$Photo ; ?>" alt="gambar tidak ada"></div>
              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
              <div>
                <span class="btn btn-file btn-primary"><span class="fileupload-new">Edit image</span><span class="fileupload-exists">Change</span>
                <input type="file" name="foto"></span>
                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <input type="submit" value="Simpan"  class="btn btn-sm btn-primary"/>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- =========================== Delet Mahasiswa ============================== -->
  <div class="modal animated shake" id="modal_delete<?php echo $IdData; ?>">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
        <h4 class="modal-title" style="text-align:center;">Hapus Data ?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <form action="<?php echo base_url('Master').'/HapusSiswa'; ?>" method="post">
         <div class="modal-body">
          <input type="hidden" name="ID" value="<?php echo $IdData?>">
          Apakah Anda yakin ingin membuang data ini ke tempat sampah?
         </div>   
        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <button type="submit" class="btn-sm btn-danger">Delete</button>
          <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>

