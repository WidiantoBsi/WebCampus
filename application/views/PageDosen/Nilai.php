<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Nilai</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tugas</li>
    </ol>
  </div>
<?php // alert Input File
if($this->session->flashdata('alert')){ ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
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
          <h6 class="m-0 font-weight-bold text-primary">Nilai Mahasiswa</h6>
    </div>
    <div class="table-responsive p-3">
      <table class="table align-items-center table-flush" id="dataTable">
        <thead class="thead-light">
          <tr align="center">
            <th>NIM</th>
            <th>Matakuliah</th>
            <th>Berkas</th>
            <th>Nilai</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($Tugas as $RQ){
           $where = array('ID_Matakuliah' => $RQ->ID_Matakuliah);
            $DB2 = $this->DBWeb->edit_data($where,'tugas')->result();
            foreach($DB2 as $rw){
              $Id = $rw->ID_Tugas;
              $Berkas = $rw->Berkas;
              $Nim =  $rw->Nim;
              $Nilai = $rw->Nilai;
            $where2 = array('ID_Matakuliah' => $RQ->ID_Matakuliah);
            $db = $this->DBWeb->edit_data($where2,'matakuliah')->result();
            foreach($db as $row){
              $Matkul = $row->Matakuliah;
            }        
          ?>
          <tr>
            <td><?php echo $Nim ;?></td>
            <td><?php echo $Matkul ;?></td>
            <?php if ($Nilai==Null) { ?>
            <td><a href="<?php echo base_url('AdmDosen/UploadFile/').$Berkas ?>"><?php echo $Berkas ;?></a></td>
            <?php }else{ ?>
            <td><?php echo $Berkas ;?></td>
            <?php } ?>
            <td><?php echo $Nilai ;?></td>
            <td align="center">
              <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal_add<?php echo $Id; ?>" >Input</a>
              <a href="#" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal_delete<?php echo $Id; ?>" >Delete</a>
            </td>
          </tr>
           <?php } } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<!-- ============== Modal Add Nilai ====================== -->
<?php 
foreach($Tugas as $row){
  $where = array('ID_Matakuliah' => $row->ID_Matakuliah);
  $DB2 = $this->DBWeb->edit_data($where,'tugas')->result();
  foreach($DB2 as $rw){
    $Id = $rw->ID_Tugas;
    $Berkas = $rw->Berkas;
    $Nim =  $rw->Nim;
    $Nilai = $rw->Nilai;
    $where2 = array('ID_Matakuliah' => $row->ID_Matakuliah);
    $db = $this->DBWeb->edit_data($where2,'matakuliah')->result();
    foreach($db as $QR){
      $Matkul = $QR->Matakuliah;
    } 
?>
<div class="modal fade" id="modal_add<?php echo $Id;?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <form action="<?php echo base_url('AdmDosen/').'EditNilai'; ?>" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Add Nilai Mahasiswa</h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleFormControlInput1">NIM Mahasiswa</label>
            <input type="hidden" name="ID" value="<?php echo $Id ?>">
            <input type="text" class="form-control" name="Nim" value="<?php echo $Nim ?>" readonly/>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Matakuliah</label>
            <input type="text" class="form-control" name="Matkul" value="<?php echo $Matkul ?>" readonly/>
          </div>


          <div class="form-group">
            <label for="user">Nilai</label>
            <select name="Nilai" class="form-control">
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
            </select>
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
  <div class="modal animated shake" id="modal_delete<?php echo $Id; ?>">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
        <h4 class="modal-title" style="text-align:center;">Hapus Data ?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <form action="<?php echo base_url('AdmDosen').'/HapusNilai'; ?>" method="post">
         <div class="modal-body">
          <input type="hidden" name="ID" value="<?php echo $Id?>">
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
<?php } } ?>

</div>