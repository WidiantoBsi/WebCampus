<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Jadwal</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data Jadwal</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Jadwal</h6>
          <a href="#" class="m-0 float-right btn btn-success btn-sm" data-toggle="modal" data-target="#AddJadwal"><i class="fas fa fa-plus"></i> Add Jadwal</a>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>Matakuliah</th>
                <th>Dosen</th>
                <th>Ruangan</th>
                <th>Jurusan</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($Jadwal as $b){
                $IdData = $b->ID_Jadwal;
                $where = array('ID_Matakuliah' => $b->ID_Matakuliah);
                $DB = $this->DBWeb->edit_data($where,'matakuliah')->result();
                foreach($DB as $a){
                  $Matkul = $a->Matakuliah;
                }
                $where2 = array('NIP' => $b->NIP);
                $Db = $this->DBWeb->edit_data($where2,'dosen')->result();
                foreach($Db as $ab){
                  $dosen = $ab->NamaDosen;
                }
                $where3 = array('ID_Ruang' => $b->ID_Ruangan);
                $dB = $this->DBWeb->edit_data($where3,'ruangan')->result();
                foreach($dB as $ac){
                  $ruang = $ac->NamaRuangan;
                }
                $where4 = array('ID_Jurusan' => $b->ID_Jurusan);
                $cek = $this->DBWeb->edit_data($where4,'jurusan')->result();
                foreach($cek as $ad){
                  $jurusan = $ad->NamaJurusan;
                }
                ?>
                <tr>
                  <td><a href="#" title="Edit Data" data-toggle="modal" data-target="#modal_edit<?php echo $IdData;?>"><?php echo $Matkul ?></a></td>
                  <td><?php echo $dosen?></td>
                  <td><?php echo $ruang ?></td>
                  <td><?php echo $jurusan ?></td>
                  <td><?php echo $b->Hari ?></td>
                  <td><?php echo $b->Jam ?></td>
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
<?php
  $daftarhari[] = "Senin";
  $daftarhari[] = "Selasa";
  $daftarhari[] = "Rabu";
  $daftarhari[] = "Kamis";
  $daftarhari[] = "Jumat";
  $daftarhari[] = "Sabtu";
  $daftarhari[] = "Minggu";
?>
<div class="modal fade" id="AddJadwal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<form action="<?php echo base_url('Master/').'AddJadwal'; ?>" method="post">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Jadwal</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="exampleFormControlInput1">Matakuliah</label>
          <input type="hidden" name="ID" value="<?php echo $ID; ?>">
          <select class="form-control mb-3" name="Matakuliah">
            <?php foreach($Matakuliah->result() as $rw):?>
              <option value="<?php echo $rw->ID_Matakuliah; ?>"><?php echo $rw->Matakuliah; ?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Dosen</label>
          <select class="form-control mb-3" name="Dosen">
            <?php foreach($Dosen->result() as $ro):?>
              <option value="<?php echo $ro->NIP; ?>"><?php echo $ro->NamaDosen; ?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Ruangan</label>
          <select class="form-control mb-3" name="Ruangan">
            <?php foreach($Ruangan->result() as $w):?>
              <option value="<?php echo $w->ID_Ruang; ?>"><?php echo $w->NamaRuangan; ?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jurusan</label>
          <select class="form-control mb-3" name="Jurusan">
            <?php foreach($Jurusan->result() as $r):?>
              <option value="<?php echo $r->ID_Jurusan; ?>"><?php echo $r->NamaJurusan; ?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Hari</label>
         <select class="form-control mb-3" name="Hari">
          <?php
          for($hari=0; $hari<count($daftarhari); $hari++)
            { ?>
              <option value="<?php echo $daftarhari[$hari]; ?>"><?php echo $daftarhari[$hari] ?></option>
          <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jam Mulai</label>
          <input type="time" class="form-control" name="JamIn" placeholder="Jam Mulai" required/>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jam Selesai</label>
          <input type="time" class="form-control" name="JamOut" placeholder="Jam Selesai" required/>
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
foreach($Jadwal as $bc){
  $IdData = $bc->ID_Jadwal;
  $Jam = $bc->Jam;
  $Hari = $bc->Hari;
?>
<div class="modal animated zoomIn" id="modal_edit<?php echo $IdData;?>" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url('Master/').'EditJadwal'; ?>" method="post">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Edit Jadwal</h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
          <label for="exampleFormControlInput1">Matakuliah</label>
           <input type="hidden" name="ID" value="<?php echo $IdData ?>">
          <select class="form-control mb-3" name="Matakuliah">
            <?php foreach($Matakuliah->result() as $o):?>
              <option value="<?php echo $o->ID_Matakuliah; ?>"><?php echo $o->Matakuliah; ?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Dosen</label>
          <select class="form-control mb-3" name="Dosen">
            <?php foreach($Dosen->result() as $ab):?>
              <option value="<?php echo $ab->NIP; ?>"><?php echo $ab->NamaDosen; ?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Ruangan</label>
          <select class="form-control mb-3" name="Ruangan">
            <?php foreach($Ruangan->result() as $ac):?>
              <option value="<?php echo $ac->ID_Ruang; ?>"><?php echo $ac->NamaRuangan; ?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jurusan</label>
          <select class="form-control mb-3" name="Jurusan">
            <?php foreach($Jurusan->result() as $rw):?>
              <option value="<?php echo $rw->ID_Jurusan; ?>"><?php echo $rw->NamaJurusan; ?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Hari</label>
         <select class="form-control mb-3" name="Hari">
          <?php
          for($hari=0; $hari<count($daftarhari); $hari++)
            { ?>
              <option value="<?php echo $daftarhari[$hari]; ?>"><?php echo $daftarhari[$hari] ?></option>
          <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jam Mulai</label>
          <input type="time" class="form-control" name="JamIn" placeholder="Jam Mulai" required/>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Jam Selesai</label>
          <input type="time" class="form-control" name="JamOut" placeholder="Jam Selesai" required/>
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
  <div class="modal animated shake" id="modal_delete<?php echo $IdData; ?>">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
        <h4 class="modal-title" style="text-align:center;">Hapus Data ?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <form action="<?php echo base_url('Master').'/HapusJadwal'; ?>" method="post">
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