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
<ul class="nav nav-tabs" role="tablist">
	<li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Users</a></li>
	<li><a href="#sday" id="btnAdd" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
</ul>
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
	// when press update button
  	function update_sheet(data)
	{
		var id = data;
		var divID = ""; // to set divisionID
		var graID = ""; // to set gradeID
		var subID =""; // to set subjectID
		$('#updateModel').modal('show');
  		$('#updateModel').find('.modal-title').text('Update sheet');
  		$('#updateform').attr('action','<?php echo base_url() ?>Sheet/updatesheet');
		// load  data
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Sheet/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=id]').val(data.id);
  				$('select[name=divisionID_update]').val(data.divisionID);
  				$('select[name=gradeID_update]').val(data.gradeID);
  				$('select[name=subjectID_update]').val(data.subjectID);
  				$('input[name=sheetName]').val(data.sheetName);
  				
  				// created to send as a get to selected from selected box
  				divID = data.divisionID
  				graID = data.gradeID;
  				subID = data.subjectID;
  				
  			}
  		});
  		// load division
		$.ajax({
			type:'ajax',
			method:'get',
			data:{divi:divID},
			url:'<?php echo base_url() ?>Sheet/retrivedivisionByid',
			dataType:'json',
			success:function(data)
			{
				$('#division_update').html(data);
			}
		});
		// load grades
		$.ajax({
			type:'ajax',
			method:'get',
			data:{gra:graID},
			url:'<?php echo base_url() ?>Sheet/retrivegradeByid',
			dataType:'json',
			success:function(data)
			{
				$('#grade_update').html(data);
			}
		});
		// load subjects
		$.ajax({
			type:'ajax',
			method:'get',
			data:{sub:subID},
			url:'<?php echo base_url() ?>Sheet/retrivesubjectByid',
			dataType:'json',
			success:function(data)
			{
				$('#subject_update').html(data);
			}
		});
	}
	// btnUpdate
	$('#btnUpdate').click(function(){
		var url = $('#updateform').attr('action'); // action
		var data = $('#updateform').serialize();
	
		// validation
		var subjectID = $('select[name=subjectID_update]');
		var divisionID = $('select[name=divisionID_update]');
		var gradeID = $('select[name=gradeID_update]');
		var sheetName = $('input[name=sheetName]');
		var result = '';
		
		if (subjectID.val() == '') {
			subjectID.parent().parent().addClass('has-error');
			$('.alert-danger').html('Subject is required.').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			subjectID.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (divisionID.val() == '') {
			divisionID.parent().parent().addClass('has-error');
			$('.alert-danger').html('Division is required.').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			divisionID.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (gradeID.val() == '') {
			gradeID.parent().parent().addClass('has-error');
			$('.alert-danger').html('Grade is required.').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			gradeID.parent().parent().removeClass('has-error');
			result +='3';
		}
		if (sheetName.val() == '') {
			sheetName.parent().parent().addClass('has-error');
			$('.alert-danger').html('Sheet name is required.').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			sheetName.parent().parent().removeClass('has-error');
			result +='4';
		}
		
		if (result == '1234') {
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#updateModel').modal('hide');
						$('#updateform')[0].reset();
						$('.alert-success').html('Updated successfully.').fadeIn().delay(2000).fadeOut('slow');
						load_sheets_data();
					}else{
						
					}
				}
			});
		}
	});
	// btnAdd new 
	$('#btnAdd').click(function(){

		$('#myForm').attr('action','<?php echo base_url() ?>Sheet/uploadfile');
		// load subject
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Sheet/retivesubjects',
			dataType:'json',
			success:function(data)
			{
				$('#subject').html(data);
			}
		});
		// load division
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Sheet/retrivedivision',
			dataType:'json',
			success:function(data)
			{
				$('#division').html(data);
			}
		});
		// load grades
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Sheet/retrivegrade',
			dataType:'json',
			success:function(data)
			{
				$('#grade').html(data);
			}
		});
	});
	// btnSave 
	$('#btnSave').click(function(){
		$('#progress-bar').css('width', 0 + '%');
		var url = $('#myForm').attr('action'); // action
		var data = new FormData(document.getElementById("myForm"));
		var file = document.getElementById('file_name').files[0]; //userfile file tag id

	    if (file) 
	    {
	        data.append('file_name', file); // add file to array
	        // check size before upload
	        if(($('#file_name')[0].files[0].size > 5000000 )) 
	        { // 512 Kbyte (this size is in bytes)
	            //Prevent default and display error
	            alert("File is over 5MB in size!");
	           return;
	        }           
	    }        
		// validation
		var subjectID = $('select[name=subjectID]');
		var divisionID = $('select[name=divisionID]');
		var gradeID = $('select[name=gradeID]');
		var sheetName = $('input[name=sheetName]');
		var file_name = $('input[name=file_name]');
		var result = '';
		if (subjectID.val() == '') {
			subjectID.parent().parent().addClass('has-error');
			$('.alert-danger').html('Subject is required.').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			subjectID.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (divisionID.val() == '') {
			divisionID.parent().parent().addClass('has-error');
			$('.alert-danger').html('Division is required.').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			divisionID.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (gradeID.val() == '') {
			gradeID.parent().parent().addClass('has-error');
			$('.alert-danger').html('Grade is required.').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			gradeID.parent().parent().removeClass('has-error');
			result +='3';
		}
		if (sheetName.val() == '') {
			sheetName.parent().parent().addClass('has-error');
			$('.alert-danger').html('Sheet name is required.').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			sheetName.parent().parent().removeClass('has-error');
			result +='4';
		}
		if (file_name.val() == '') {
			file_name.parent().parent().addClass('has-error');
			$('.alert-danger').html('You must upload file sheet.').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			file_name.parent().parent().removeClass('has-error');
			result +='5';
		}
		if (result == '12345') {
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:true,
				processData: false,
				contentType: false,
				cashe:false,
				dataType:'json',	
					
				success:function(response){
					if (response.success) {
						$('#myForm')[0].reset();
						$('.alert-success').html('Uploaded successfully.').fadeIn().delay(2000).fadeOut('slow');
						load_sheets_data();
					}
				},
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (event) {
                        if (event.lengthComputable) {
                        	$('#uploadProgress').fadeIn();
                        	var percentComplete = event.loaded / event.total;
                            percentComplete = parseInt(percentComplete * 100);
                            $('#progress-bar').text(percentComplete + '% Complete');
                            $('#progress-bar').css('width', percentComplete + '%');                            
                        }
                        else{
                        	$('#uploadProgress').fadeOut();
                        }
                    }, false);
                    return xhr;
                }				
			});
		}
	});	
	// delete 
	function delete_sheet(data)
	{
		var id = data;
  		$('#deleteModal').modal('show');
  		$('#btnDelete').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Sheet/deletesheet',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal').modal('hide');
  						$('.alert-success').html('Deleted successfully.').fadeIn().delay(2000).fadeOut('slow');
  						load_sheets_data();
  					}
  				}
  			});
  		});
	}	
	load_sheets_data();
	function load_sheets_data() 
	{
		$.ajax({
			url:'<?php echo base_url() ?>Sheet/retrive_all_files/',
			method:'get',
			dataType:'json',
			success:function(data){
				$('#sheet_table').html('<table id ="example1" class="table table-hover table-bordered">						<thead><tr><th>#</th><th>Date</th><th>Sheet Name</th><th>Division</th>								<th>Grade</th><th>Subject</th><th>Uploaded By</th></th><th><i class="fa fa-edit"></i></th><th><i class="fa fa-trash"></i></th></tr></thead> ' + data + '</table>');	
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