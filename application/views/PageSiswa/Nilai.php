<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tugas</li>
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
          <h6 class="m-0 font-weight-bold text-primary">Tugas Mahasiswa</h6>
          <a class="m-0 float-right btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#AddNilai">Upload <i class="fas fa-upload"></i></a>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>Mata Kuliah</th>
                <th>Tugas</th>
                <th>Berkas</th>
                <th>Nilai</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              // Data Tugas
              foreach($Tugas as $b){  
                // Tampil data Matakuliah
                $Id = $b->ID_Tugas;
                $where = array('ID_Matakuliah' => $b->ID_Matakuliah);
                $DB = $this->DBWeb->edit_data($where,'matakuliah')->result();
                foreach($DB as $r){
                  $NamaMatkul = $r->Matakuliah;
                }
                ?>
                <tr>
                  <?php if ($b->Nilai==Null && $b->Keterangan=='1') { ?>
                    <td><a href="" data-toggle="modal" data-target="#modal_edit<?php echo $Id;?>"><?php echo $NamaMatkul ;?></a></td>
                  <?php }else{ ?>
                    <td><?php echo $NamaMatkul ;?></td>
                  <?php } ?>
                  <td><?php echo $b->Judul ;?></td>
                  <td><?php echo $b->Berkas;?></td>
                  <?php 
                  $Ket = $b->Keterangan;
                  if ($Ket=="1") { ?>
                    <td><a title="Hapus" data-toggle="modal" data-target="#modal_delete<?php echo $Id; ?>" ><i class="fa fa-trash"></i></a></td>
                  <?php }elseif ($Ket=="2") { ?>
                    <td><?php echo $b->Nilai;?></td>
                  <?php } ?>
                </tr>
              <?php } ?> 
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
      
<!-- ============== Modal Add Nilai ====================== -->
<div class="modal fade" id="AddNilai" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<form action="<?php echo base_url('AdmMahasiswa/').'AddTugas'; ?>" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Upload Tugas</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="exampleFormControlInput1">Mata Kuliah</label>
          <input type="hidden" name="ID" value="<?php echo $IdTugas; ?>">
          <select class="form-control mb-3" name="Matkul">
          <?php foreach($Matakuliah->result() as $rw):?>
            <option value="<?php echo $rw->ID_Matakuliah ;?>"><?php echo $rw->Matakuliah ;?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Judul</label>
          <input type="hidden" name="Nim" value="<?php echo $Nim; ?>">
          <input type="text" class="form-control" name="Judul" placeholder="Judul" required/>
        </div>

        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="File">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <input type="submit" value="Submit"  class="btn btn-sm btn-primary"/>
      </div>
    </div>
  </div>
</form>
</div>

<!-- ============== Modal Edit Tugas ====================== -->
<?php 
  foreach($Tugas as $row){
    $IdData = $row->ID_Tugas;
    $Judul = $row->Judul;
?>
<div class="modal fade" id="modal_edit<?php echo $IdData;?>" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<form action="<?php echo base_url('AdmMahasiswa/').'EditTugas'; ?>" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Upload Tugas</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="exampleFormControlInput1">Mata Kuliah</label>
          <input type="hidden" name="ID" value="<?= $IdData; ?>">
          <select class="form-control mb-3" name="Matkul">
          <?php foreach($Matakuliah->result() as $rw):?>
            <option value="<?php echo $rw->ID_Matakuliah ;?>"><?php echo $rw->Matakuliah ;?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Judul</label>
          <!-- <input type="hidden" name="Nim" value="<?= $Nim; ?>"> -->
          <input type="text" class="form-control" name="Judul" value="<?php echo $Judul ?>" required/>
        </div>

        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="File">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <input type="submit" value="Submit"  class="btn btn-sm btn-primary"/>
      </div>
    </div>
  </div>
</form>
</div>

<!-- =========================== Delet Tugas ============================== -->
  <div class="modal animated shake" id="modal_delete<?php echo $IdData; ?>">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
        <h4 class="modal-title" style="text-align:center;">Hapus Data ?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <form action="<?php echo base_url('AdmMahasiswa').'/HapusTugas'; ?>" method="post">
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

</div>