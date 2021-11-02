<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data User</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data user</h6>
          <div class="btn-group mb-1">
            <button type="button" class="m-0 btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa fa-plus"></i> Add User</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#AddDosen">Dosen</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#AddMahasiswa">Mahasiswa</a>
            </div>
          </div>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr align="center">
                <th>ID User</th>
                <th>Nama User</th>
                <th>User Grup</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($User as $b){
                $IdData = $b->ID_User;
                ?>
                <tr>
                  <td><?php echo $b->ID_User ?></td>
                  <td><?php echo $b->NamaUser ?></td>
                  <?php if ($b->IdGrup=='1') { ?>
                  <td align="center"><?php echo "Admin" ?></td>
                  <?php }elseif ($b->IdGrup=='2') { ?>
                  <td align="center"><?php echo "Dosen" ?></td>
                  <?php }else { ?>
                  <td align="center"><?php echo "Mahasiswa" ?></td>
                  <?php } if ($b->IdGrup=='1') { ?>
                  <td align="center">Aktif</td>
                  <?php }elseif ($b->Status=='Y') { ?>
                  <td align="center"><a href="" title="Edit" data-toggle="modal" data-target="#EditUser<?php echo $IdData; ?>" >Aktif</a></td>
                  <?php }elseif ($b->Status=='N') { ?>
                  <td align="center"><a href="" title="Edit" data-toggle="modal" data-target="#EditUser<?php echo $IdData; ?>" >Tidak Aktif</a></td>
                  <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</div>

<!-- ============== Modal Add Dosen User ====================== -->
<div class="modal fade" id="AddDosen" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<form action="<?php echo base_url('User/').'AddDosen'; ?>" method="post">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add User Dosen</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="exampleFormControlInput1">ID User</label>
          <select class="form-control mb-3" name="IdUser">
            <?php foreach($Dosen->result() as $ro):?>
            <option value="<?php echo $ro->NIP; ?>"><?php echo $ro->NIP.' ['.$ro->NamaDosen.']'; ?></option>
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

<!-- ============== Modal Add Maasiswa User ====================== -->
<div class="modal fade" id="AddMahasiswa" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<form action="<?php echo base_url('User/').'AddSiswa'; ?>" method="post">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add User Mahasiswa</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="exampleFormControlInput1">ID User</label>
          <select class="form-control mb-3" name="IdUser">
            <?php foreach($Mahasiswa->result() as $row):?>
            <option value="<?php echo $row->Nim; ?>"><?php echo $row->Nim.' ['.$row->NamaSiswa.']'; ?></option>
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

<!-- ============== Modal Edit User ====================== -->
<?php 
  foreach($User as $r){
    $IdData = $r->ID_User;
    $NamaUser = $r->NamaUser;
?>
<div class="modal fade" id="EditUser<?php echo $IdData; ?>" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<form action="<?php echo base_url('User/').'EditUser'; ?>" method="post">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Edit User</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="exampleFormControlInput1">Nama User</label>
          <input type="hidden" name="ID" value="<?php echo $IdData?>">
          <input type="text" class="form-control" name="NamaUser" value="<?php echo $NamaUser?>" required/>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Status</label>
          <select class="form-control mb-3" name="Status">
            <option value="N">Tidak Aktif</option>
            <option value="Y">Aktif</option>
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

<?php } ?>