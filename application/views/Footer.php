</div>
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - by
        <b><a href="https://facebook.com/widi.anto.718" target="_blank">Widianto</a></b>
      </span>
    </div>
  </div>
</footer>
<!-- Footer -->
</div>
</div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Are you sure you want to logout?</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
      <a href="<?php echo base_url('Logout')?>" class="btn btn-primary">Logout</a>
    </div>
  </div>
</div>
</div>


<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Select2 -->
  <script src="<?php echo base_url()?>assets/vendor/select2/dist/js/select2.min.js"></script>
<!-- Bootstrap Datepicker -->
<script src="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap Touchspin -->
<script src="<?php echo base_url()?>assets/vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
<script src="<?php echo base_url()?>assets/js/ruang-admin.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap-fileupload.js"></script>
<script>
  $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
<script type="text/javascript">
  $('.alert-dismissible').alert().delay(3000).slideUp('slow');
</script>
<script>
    $(document).ready(function () {


      $('.select2-single').select2();

      // Select2 Single  with Placeholder
      $('.select2-single-placeholder').select2({
        placeholder: "Select a Province",
        allowClear: true
      });      

      // Select2 Multiple
      $('.select2-multiple').select2();

      // Bootstrap Date Picker
      $('#simple-date1 .input-group.date').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: 'linked',
        todayHighlight: true,
        autoclose: true,        
      });

      $('#simple-date2 .input-group.date').datepicker({
        startView: 1,
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });

      $('#simple-date3 .input-group.date').datepicker({
        startView: 2,
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });

      $('#simple-date4 .input-group.date').datepicker({        
        startView: 2,
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });   //dobel 

    });
  </script>

  <script type="text/javascript">
    window.setTimeout("waktu()",100);
    function waktu()
    {
      var waktu = new Date();
      setTimeout("waktu()",100);
      var h=waktu.getHours();
      var m=waktu.getMinutes();
      var s=waktu.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
function checkTime(i)
{
  if (i<10)
  {
    i="0" + i;
  }
  return i;
}
}
</script>
<script type='text/javascript'>
window.setTimeout("hari()",0)
function hari(){
 var namah = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
 var namab = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "November", "Desember");
 var tanggal = new Date();
 setTimeout("hari()",0);
 document.getElementById("dino").innerHTML =namah[tanggal.getDay()]+", "+tanggal.getDate()+" "+namab[tanggal.getMonth()]+" "+tanggal.getFullYear();
}
</script>
</body>

</html>