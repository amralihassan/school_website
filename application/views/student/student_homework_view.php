<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Homework
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Homework</li>
  </ol>
</section>
<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
      <div class="alert alert-danger w3-panel w3-red" style="display: none;"></div>
    </div>  
  </div>  
</div>  
<div class="row box-body">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Homework
      </div>
      <div class="panel-body">
          <div class="row">
              <div class="col-md-12">
                  <div id="homework_table"></div>
              </div>              
          </div> 
      </div>
    </div>
  </div>
</div>
<!-- DataTables -->
<script src="<?php echo base_url();?>public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  load_hw_data();
  
  function load_hw_data() {
    $.ajax({
      url:'<?php echo base_url() ?>Homework/retrive_all_hw_student/',
      method:'get',
      dataType:'json',
      success:function(data){
        $('#homework_table').html('<table id ="example" class="table table-hover table-bordered"><thead><tr><th class="col-md-1">Date</th><th class="col-md-1">Subject</th><th class="col-md-3">Homework</th><th class="col-md-1">Full Mark</th><th class="col-md-0">Mark</th><th class="col-md-2">Status</th><th class="col-md-2">Notes</th><th class="col-md-0">Download</th></tr></thead> ' + data + '</table>'); 
        $('#example').DataTable({ 
                  "destroy": true, //use for reinitialize datatable
               });          
        $(".se-pre-con").fadeOut("slow");

      }
    });
  }    

  
 
  $(document).ready(function(){ $('#example').DataTable(); }); 
</script>

