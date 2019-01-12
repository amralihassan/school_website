<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Exam Table
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Exam Table</li>
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

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="fday">
		<!-- displat data table -->
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Exam Table
						</div>
						<div class="panel-body">
							<div id="exam_table"></div>
						</div>
					</div>
				</div>
			</div>
		</div>					
	</div>				
</div>

<script type="text/javascript">

	load_sheets_data();
	function load_sheets_data() {
		$.ajax({
			url:'<?php echo base_url() ?>Exam/retrive_all_student_exam/',
			method:'get',
			dataType:'json',
			success:function(data){
				$('#exam_table').html('<table id ="example1" class="table table-hover table-bordered">						<thead><tr><th>Day</th><th>Date</th><th>Subject</th><th>From</th><th>To</th>							<th>Notes</th></tr></thead> ' + data + '</table>');
				$(".se-pre-con").fadeOut("slow");	
        		$('#example1').DataTable({ 
                  "destroy": true, //use for reinitialize datatable
               });     				
			}
		});
	}	
</script>
<!-- DataTables -->
<script src="<?php echo base_url();?>public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>