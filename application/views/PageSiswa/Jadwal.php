<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jadwal Mahasiswa</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Jadwal Mahasiswa</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Jadwal Mahasiswa</h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>Mata Kuliah</th>
                <th>Nama Dosen</th>
                <th>Ruangan</th>
                <th>Jurusan</th>
                <th>Hari</th>
                <th>Jam</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($Jadwal as $b){
                // Tampil Nama Dosen
                $where = array('NIP' => $b->NIP);
                $DB = $this->DBWeb->edit_data($where,'dosen')->result();
                foreach($DB as $row){
                  $Dosen = $row->NamaDosen;
                } 
                //Tampil Ruangan
                $where2 = array('ID_Ruang' => $b->ID_Ruangan);
                $DB2 = $this->DBWeb->edit_data($where2,'ruangan')->result();
                foreach($DB2 as $rw){
                  $Ruangan = $rw->NamaRuangan;
                } 
                //Tampil Jurusan
                $where3 = array('ID_Jurusan' => $b->ID_Jurusan);
                $DB3 = $this->DBWeb->edit_data($where3,'jurusan')->result();
                foreach($DB3 as $w){
                  $Jurusan = $w->NamaJurusan;
                } 
                //Tampil Matakuliah
                $where4 = array('ID_Matakuliah' => $b->ID_Matakuliah);
                $DB4 = $this->DBWeb->edit_data($where4,'matakuliah')->result();
                foreach($DB4 as $wr){
                  $Matkul = $wr->Matakuliah;
                } 
                ?>
                <tr>
                  <td><?php echo $Matkul ?></td>
                  <td><?php echo $Dosen ?></td>
                  <td><?php echo $Ruangan ?></td>
                  <td><?php echo $Jurusan ?></td>
                  <td><?php echo $b->Hari ?></td>
                  <td><?php echo $b->Jam ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</div>