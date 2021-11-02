<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Jurusan</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data Jurusan</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Jurusan</h6>
          <a href="#" class="m-0 float-right btn btn-success btn-sm" data-toggle="modal" data-target="#AddJurusan"><i class="fas fa fa-plus"></i> Add Jurusan</a>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>Kode Jurusan</th>
                <th>Jurusan</th>
                <th>Jenjang</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($Jurusan as $b){
                $IdData = $b->ID_Jurusan;
                $where = array('ID_Jenjang' => $b->ID_Jenjang);
                $DB = $this->DBWeb->edit_data($where,'jenjang')->result();
                foreach($DB as $a){
                  $Jenjang1 = $a->NamaJenjang;
                } 
                ?>
                <tr>
                  <td><a href="#" title="Edit Data" data-toggle="modal" data-target="#modal_edit<?php echo $IdData;?>"><?php echo $b->ID_Jurusan ?></a></td>
                  <td><?php echo $b->NamaJurusan ?></td>
                  <td><?php echo $Jenjang1 ?></td>
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
<div class="modal fade" id="AddJurusan" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<form action="<?php echo base_url('Master/').'AddJurusan'; ?>" method="post">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Jurusan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="exampleFormControlInput1">Kode Jurusan</label>
           <input class="form-control" type="text" name="Kode" value="<?php echo $ID ?>" readonly>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jurusan</label>
          <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" required/>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jenjang</label>
          <select class="form-control mb-3" name="Jenjang">
            <?php foreach($Jenjang->result() as $r):?>
              <option value="<?php echo $r->ID_Jenjang; ?>"><?php echo $r->NamaJenjang; ?></option>
            <?php endforeach;?>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <input type="submit" value="Tambah"  class="btn btn-sm btn-primary"/>
      </div>
    </div>
  </div>
</form>
</div>

<!-- ============== Modal Edit Dosen ====================== -->
<?php 
  foreach($Jurusan as $row){
    $Kode = $row->ID_Jurusan;
    $Jurusan = $row->NamaJurusan;
    // $Jenjang = $row->ID_Jenjang;
?>
<div class="modal animated zoomIn" id="modal_edit<?php echo $Kode;?>" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url('Master/').'EditJurusan'; ?>" method="post">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Edit Matakuliah</h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
          <label for="exampleFormControlInput1">Kode Jurusan</label>
           <input class="form-control" type="text" name="Kode" value="<?php echo $Kode ?>" readonly>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jurusan</label>
          <input type="text" class="form-control" name="jurusan" value="<?php echo $Jurusan ?>" required/>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jenjang</label>
          <select class="form-control mb-3" name="Jenjang">
            <?php foreach($Jenjang->result() as $i):?>
              <option value="<?php echo $i->ID_Jenjang; ?>"><?php echo $i->NamaJenjang; ?></option>
            <?php endforeach;?>
          </select>
        </div>

        </div>
        <div class="modal-footer">
          <input type="submit" value="Simpan"  class="btn btn-sm btn-primary"/>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- =========================== Delet Karyawan ============================== -->
  <div class="modal animated shake" id="modal_delete<?php echo $Kode; ?>">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
        <h4 class="modal-title" style="text-align:center;">Hapus Data ?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <form action="<?php echo base_url('Master').'/HapusJurusan'; ?>" method="post">
         <div class="modal-body">
          <input type="hidden" name="ID" value="<?php echo $Kode?>">
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