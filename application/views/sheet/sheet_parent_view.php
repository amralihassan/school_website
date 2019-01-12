<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Extra Sheets
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Extra Sheets</li>
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
<!-- Nav tabs -->
<?php 
	if ('Administrator' == $_SESSION['loginlevel'])
	{
		echo '
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Users</a></li>
				<li><a href="#sday" id="btnAdd" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
			</ul>
		';
	}

 ?>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="fday">
		<!-- displat data table -->
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Extra Sheet
						</div>
						<div class="panel-body">
							<div id="sheet_table"></div>
						</div>
					</div>
				</div>
			</div>
		</div>					
	</div>
	<!-- new form -->
	<div role="tabpanel" class="tab-pane" id="sday">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Sheet Information
						</div>
						<div class="panel-body">
							<form id="myForm" action="" method="post" enctype="multipart/form-data">
								<!-- Division -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Division</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" name="divisionID" id="division" required="">
												<option value="">Select Division</option>
											</select>												 
										</div>
									</div>
								</div>
								<!-- Grade -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Grade</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" name="gradeID" id="grade" required="">
												<option value="">Select Grade</option>
											</select>												
										</div>
									</div>
								</div>
								<!-- Subject -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Subject</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" name="subjectID" id="subject" required=""> 
												<option value="">Select Subject</option>
											</select>												 
										</div>
									</div>
								</div>
								<!-- Sheet name -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Sheet Name</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="sheetName" required="required" placeholder="Sheet name" id="filename">
										</div>
									</div>
								</div>
								<!-- file name -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Select File</label>
										</div>
					                      <div class="col-md-6">
					                          <div class="form-group">
					                            <div class="btn btn-default btn-file">
					                              <i class="fa fa-paperclip"></i> Attachment
					                              <input type="file" name="file_name" id="file_name" required="">
					                            </div>                 
					                            <p class="help-block">Max Size 5MG / Support files .doc - .docx - pdf </p>
					                          </div>                        
					                      </div>
									</div>
								</div>				
							</form>	
							<div id="uploadProgress" style="display: none;">
					            <div class="progress">
					                <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:0%;">0%</div>
					            </div>								
							</div>				
							<button type="button" id="btnSave" class="btn btn-success">Save</button>				
						</div>
					</div>
				</div>
			</div>		
								
		</div>
	</div>					
</div>
<!-- update model -->
<div class="modal fade" id="updateModel" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #065293; color: #d5dee0;">
				<h4 class="modal-title">Title</h4>
			</div>
			<div class="modal-body">
				<form id="updateform" action="" method="post">
					<!-- Division -->
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>Division</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="id" hidden="" value="">
								<select class="form-control" name="divisionID_update" id="division_update" required="">
									<option value="">Select Division</option>
								</select>
							</div>
						</div>
					</div>
					<!-- Grade -->
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>Grade</label>
							</div>
							<div class="col-lg-9">
								<select class="form-control" name="gradeID_update" id="grade_update" required="">
									<option value="">Select Grade</option>
								</select>	
							</div>
						</div>						
					</div>
					<!-- Subject -->
					<div class="form-group">
						<div class="row">
							 <div class="col-lg-3">
							 	<label>Subject</label>
							 </div>
							 <div class="col-lg-9">
								<select class="form-control" name="subjectID_update" id="subject_update" required="">
									<option value="">Select Subject</option>
								</select>							 	
							 </div>
						</div>
					</div>
					<!-- Sheet Name -->
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>Sheet Name</label>
							</div>
							<div class="col-lg-9">
								<input class="form-control" type="text" name="sheetName" required="required" placeholder="Sheet name">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate" class="btn btn-success">Save chnages</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModal" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				Do you want to delete this sheet?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	load_sheets_data();
	
	function load_sheets_data() {
		$.ajax({
			url:'<?php echo base_url() ?>Sheet/retrive_all_files/',
			method:'get',
			dataType:'json',
			success:function(data){
				$('#sheet_table').html('<table id ="example1" class="table table-hover table-bordered">						<thead><tr><th>#</th><th>Date</th><th>Sheet Name</th><th>Division</th>								<th>Grade</th><th>Subject</th><th>Uploaded By</th></th></tr></thead> ' + data + '</table>');
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