<div class="animated fadeIn">
	<!-- title -->
	<div class="row">
		<div class="col-lg-6">
	        <h1 class="page-header">Lecture Schedule</h1>
	    </div>
		<div class="col-lg-6">
			<button style=" float: right;margin-top: 40px;" type="button" class="btn btn-danger" onclick="autoload();">Back</button>
		</div>    
	</div>
	<!-- alert -->
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
		</div>
	</div>
	<!-- tab -->
	<div class="row">
		<div class="col-lg-12">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Lecture Schedule</a></li>
				<li><a href="#sday"  id="btnAdd" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
			</ul>
			<!-- tab panes -->
			<div class="tab-content">
				<!-- display -->
				<div role="tabpanel" class="tab-pane active" id="fday">
					<br>
					<div class="row"> 
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
						            All Lecture schedule
						        </div>
						        <div class="panel-body">
						        	<!-- search -->
						        	<div class="row">
						        		<div class="col-lg-12">
						        			<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span>
											                                  </span>
													<input class="form-control" type="search" name="txtSearch_lecture"  placeholder="Search by class name" id="id_of_textbox_lecture">
												</div>
											</div>
						        		</div>
						        	</div>
						        	<div class="row">
						        		<div class="col-lg-12">
											<div class="table table-responsive" id="lecture_table"></div>
											<div align="center" id="lecture_pagination_link"></div> 	        			
						        		</div>
						        	</div>
						        </div>
							</div>
						</div>
					</div>	
				</div>
				<!-- new form -->
				<div role="tabpanel" class="tab-pane" id="sday">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Add LectureSchedule
						</div>
						<div class="panel-body">
							<div id="uploadProgress" style="display: none;">
					            <div class="progress">
					                <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:0%;">0%</div>
					            </div>								
							</div>							
							<div class="row">
								<div class="col-lg-12">
									<form id="myForm" action="" method="post">
										<!-- division -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-3">
													<label>Division</label>
												</div>
												<div class="col-lg-9">
													<select class="form-control" name="divisionID_add" id="division">
												<option value="">Select Division</option>
											</select>
												</div>
											</div>
										</div>
										<!-- grade -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-3">
													<label>Grade</label>
												</div>
												<div class="col-lg-9">
													<select class="form-control" name="gradeID_add" id="grade">
												<option value="">Select Grade</option>
											</select>
												</div>
											</div>
										</div>
										<!-- room -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-3">
													<label>Class</label>
												</div>
												<div class="col-lg-9">
													<select class="form-control" name="roomID_add" id="room" disabled="">
												<option value="">Select Class</option>
											</select>
												</div>
											</div>
										</div>										
										<!-- select file -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-3">
													<label>Select File</label>
												</div>
												<div class="col-lg-9">
													<a href="#" data-toggle="tooltip" title="Upload image"><label for="file_name" class="input-label btn btn-info"><i class="fa fa-upload fa-2x"></i></label></a> 
													<input style="display: none;" type="file" name="file_name" id="file_name">	
													<span id="label_file" style="display: none; font-size: 15px; color: #0f56a7;line-height: 2;background-color: #e0e6ec;padding: 5px;border-radius: 5px;"></span>
												</div>
											</div>
										</div>

									</form>						
								</div>
							</div>
							<div class="row">
								 <div class="col-lg-3">
								 	
								 </div>
								 <div class="col-lg-9">
												<!-- button -->
												<?php 
													$login_level_add ='';
													
													if ( 'Super Administrator' == $_SESSION['loginlevel']) 
													{
														$login_level_add ='<button type="button" id="btnSave" class="btn btn-success">Save</button>';
														
													}
													elseif ( 'Administrator' == $_SESSION['loginlevel']) 
													{
														$login_level_add ='<button type="button" id="btnSave" class="btn btn-success">Save</button>';
														
													}
													else 
													{
														$login_level_add ='<button type="button"  class="btn btn-success">Save</button>';
														
													}
													echo $login_level_add;
												 ?>
								 </div>
							</div>						
						</div>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>		

</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModal" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>				
			<div class="modal-body">
				Do you want to delete this lecture schedule?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->
<script type="text/javascript">

    $('#file_name').on('change',function(e){
        var filename = e.target.value.split("\\").pop();
        $('#label_file').fadeIn();
        $('#label_file').text(filename);
    });

	$('#id_of_textbox_lecture').keyup(function(event){
		if (event.keyCode === 13) {
			searchData(1);
		}
	});

	// delete 
	function delete_image(data)
	{
		var id = data;
        var img ='';

  		$('#deleteModal').modal('show');
  		$('#deleteModal').find('.modal-title').text('Delete lecture schedule');
  		$('#btnDelete').click(function(){

		// get file name
	        $.ajax({
	            type:'ajax',
	            method:'get',
	            url:'<?php echo base_url() ?>Lecture/getdatabyid',
	            data:{id:id},
	            async:false,
	            dataType:'json',
	            success:function(data){
	                img = data.file_name;
	            }
	        });     			
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Lecture/deletelecture_schedule',
  				data:{id:id,img:img},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal').modal('hide');
  						$('.alert-success').html('Deleted lecture schedule successfully.').fadeIn().delay(2000).fadeOut('slow');
  						load_schedleTables_data(1);
  					}
  				}
  			});
  		});
	}	
	// search
	function searchData(page) 
	{
		// get word search
		var searchtxt = $('input[name=txtSearch_lecture]');
		$.ajax({
			url:'<?php echo base_url() ?>Lecture/pagination_search/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#lecture_table').html(data.lecture_table);
				$('#lecture_pagination_link').html(data.lecture_pagination_link);
			}
		});
	}	
		// load
	function load_schedleTables_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Lecture/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#lecture_table').html(data.lecture_table);
				$('#lecture_pagination_link').html(data.lecture_pagination_link);
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_schedleTables_data(page);
	});
	// btnAdd new 
	$('#btnAdd').click(function(){

		$('#myForm').attr('action','<?php echo base_url() ?>Homework/addhomework');
		// load division
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Homework/retrivedivision',
			dataType:'json',
			success:function(data)
			{
				$('#division').html(data);
			}
		});
		// load grades
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Homework/retrivegrade',
			dataType:'json',
			success:function(data)
			{
				$('#grade').html(data);
			}
		});
	});	
	// load room for adding
	$('#division').on('change', function(){
		var gradeID = $('select[name=gradeID_add]').val();
		var divisionID = $(this).val();  //set country = country_id
		
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#room').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#room').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Student/get_room", // method that will get data
				type:"POST",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'gradeID' : gradeID, 'divisionID' : divisionID},
				dataType: 'json',
				success: function(data){
					$('#room').html(data);
				},
				error: function(){
					$('#room').prop('disabled', true); // set disable
				}
			});
		}
	});
	$('#grade').on('change', function(){
		var divisionID = $('select[name=divisionID_add]').val();
		var gradeID = $(this).val();  //set country = country_id
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#room').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#room').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Student/get_room", // method that will get data
				type:"POST",
				data:{'gradeID_add' : gradeID, 'divisionID_add' : divisionID}, // gradeID_add,divisionID_add are post
				dataType: 'json',
				success: function(data){
					$('#room').html(data);
				},
				error: function(){
					$('#room').prop('disabled', true); // set disable
				}
			});
		}
	});	

	// btnSave 
	$('#btnSave').click(function(){
		$('#progress-bar').css('width', 0 + '%');
		var url = $('#myForm').attr('action'); // action
		var data = new FormData(document.getElementById("myForm"));
		var file = document.getElementById('file_name').files[0]; //userfile file tag id
            if (file) {
                data.append('file_name', file);
            }
		// validation
		var divisionID = $('select[name=divisionID_add]');
		var gradeID = $('select[name=gradeID_add]');
		var file_name = $('input[name=file_name]');
		var result = '';

		if (divisionID.val() == '') {
			divisionID.parent().parent().addClass('has-error');
			return;
		}else{
			divisionID.parent().parent().removeClass('has-error');
			result +='3';
		}
		if (gradeID.val() == '') {
			gradeID.parent().parent().addClass('has-error');
			return;
		}else{
			gradeID.parent().parent().removeClass('has-error');
			result +='4';
		}
		if (file_name.val() == '') {
			file_name.parent().parent().addClass('has-error');
			return;
		}else{
			file_name.parent().parent().removeClass('has-error');
			result +='6';
		}
		if (result == '346') {
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Lecture/addlectureschedule',//action
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
						load_schedleTables_data(1);
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
</script>