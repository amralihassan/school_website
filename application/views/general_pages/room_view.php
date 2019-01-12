<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Classroom
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Classroom</li>
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
<div class="box box-primary">
	<!-- tab -->
	<div class="row">
		<div class="col-md-12">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Classrooms</a></li>
				<li><a href="#sday"  id="btnAdd_room" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
			</ul>
			<!-- tab panes -->
			<div class="tab-content">
				<!-- display -->
				<div role="tabpanel" class="tab-pane active" id="fday">
		        	<div class="row box-body">
		        		<div class="col-md-12">
		        			<div class="panel panel-default">
		        				<div class="panel-heading">
		        					Classes
		        				</div>
		        				<div class="panel-body">
					        			<!-- select box -->
									<div class="form-group">
										<div class="form-group">
											<div class="col-md-4">
												<!-- division box -->
												<select class="form-control" name="divisionID" id="division_find" onchange="searchData(1);">
													<option value="">Select Division</option>
												</select>									
											</div>

										</div>
									</div>
									<!-- end select box -->
									<div class="table table-responsive" id="room_table"></div>
									<div align="center" id="room_pagination_link"></div>				        			
		        				</div>
		        			</div>
       	
		        		</div>
		        	</div>	
				</div>
				<!-- new form -->
				<div role="tabpanel" class="tab-pane" id="sday">
					<div class="row box-body">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									New Class
								</div>
								<div class="panel-body">
									<!--form  -->
									<form id="myForm_room" action="" method="post">
										<div class="form-group">
											<br>
											<!-- division box -->
											<div class="form-group">
												<div class="row">
													<div class="col-md-3">
														<label for="grade">Division</label>
													</div>
													<div class="col-md-6">
														<select class="form-control" name="divisionID_add" id="division_add">
															<option value="">Select Division</option>
														</select>
													</div>
												</div>
											</div>
											<!-- grade box -->
											<div class="form-group">
												<div class="row">
														<div class="col-md-3">
															<label for="grade">Grade</label>
														</div>
														<div class="col-md-6">
															<select class="form-control" name="gradeID_add" id="grade_add">
																<option value="">Select Grade</option>
															</select>
															<!-- end select box -->
														</div>
													</div>
											</div>
											<div class="form-group">
												<div class="row">
														<div class="col-md-3">
															<label>Classroom</label>
														</div>
														<div class="col-md-6">
															<input class="form-control" type="text" name="roomName" required="required" placeholder="Enter room name" >
														</div>
													</div>
											</div>
										</div>
									</form>		
									<div class="row">
										<div class="col-md-12">
													<!-- button -->
													<?php 
														$login_level_add ='';
														
														if ( 'Super Administrator' == $_SESSION['loginlevel']) 
														{
															$login_level_add ='<button type="button" id="btnSave_room" class="btn btn-success">Save</button>';
															
														}
														elseif ( 'Administrator' == $_SESSION['loginlevel']) 
														{
															$login_level_add ='<button type="button" id="btnSave_room" class="btn btn-success">Save</button>';
															
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
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>


<!-- update  model -->
<div class="modal fade" id="updateModel_room" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form id="updateform_room" action="" method="post">
					<div class="form-group">
						<div class="form-group">
						<!-- division box -->
						<label for="grade">Division</label>
						<input type="text" name="roomID" hidden="" value="">
						<select class="form-control" name="divisionID_edit" id="division_update" required="required">
							<option value="">Select Division</option>
						</select>
						<!-- end select box -->
					</div>
					<div class="form-group">
						<!-- grade box -->
						<label for="grade">Grade</label>
						<select class="form-control" name="gradeID_edit" id="grade_update" required="required">
							<option value="">Select Grade</option>
						</select>
						<!-- end select box -->
					</div>
						<label>Classroom</label>
						<input class="form-control" type="text" name="roomName_update" required="required" placeholder="Enter room name" >
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate_room" class="btn btn-success">Save changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end update model -->

<!-- delete modal -->
<div class="modal fade" id="deleteModal_room" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				Do you want to delete this classroom?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_room" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->
<script type="text/javascript">
    $( document ).ready(function() {$(".se-pre-con").fadeOut("slow");});	
	$('#id_of_textbox').keyup(function(event){
		if (event.keyCode === 13) {
			$('#id_of_button').click();
		}
	});
	// search
	function searchData(page) 
	{
		var searchtxt = $('select[name=divisionID]');
		// get word search
		//var searchtxt = $('input[name=txtSearch]');
		$.ajax({
			url:'<?php echo base_url() ?>Room/pagination_search/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#room_table').html(data.room_table);
				$('#room_pagination_link').html(data.room_pagination_link);
			}
		});
	}

	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		searchData(page);
	});

	// delete
	function delete_room(data)
	{
		var id = data;
  		$('#deleteModal_room').modal('show');
  		$('#deleteModal_room').find('.modal-title').text('Delete classroom');
  		$('#btnDelete_room').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Room/deleteroom',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal_room').modal('hide');
  						$('.alert-success').html('Deleted classroom successfully.').fadeIn().delay(4000).fadeOut('slow');
  						searchData(1);
  					}
  				}
  			});
  		});
	}
	// btnAdd new 
	$('#btnAdd_room').click(function(){
		// show add modal
		$('#myModal_room').modal('show');
		$('#myModal_room').find('.modal-title').text('Add New classroom'); // rename modal
		// add attribute
		$('#myForm_room').attr('action','<?php echo base_url() ?>Room/addroom');
		// load division
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Room/retrivedivision',
			dataType:'json',
			success:function(data)
			{
				$('#division_add').html(data);
			}
		});
		// load grades
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Room/retrivegrade',
			dataType:'json',
			success:function(data)
			{
				$('#grade_add').html(data);
			}
		});
	});
	// btnSave new 
	$('#btnSave_room').click(function(){
		var url = $('#myForm_room').attr('action'); // action
		var data = $('#myForm_room').serialize();
	
		// validation
		var divisionID = $('select[name=divisionID_add]');
		var gradeID = $('select[name=gradeID_add]');
		var roomName = $('input[name=roomName]');
		var result = '';

		if (divisionID.val() == '') {
			divisionID.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please select division').fadeIn().delay(4000).fadeOut('slow');
			return;
		}
		if (gradeID.val() == '') {
			gradeID.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please select grade').fadeIn().delay(4000).fadeOut('slow');
			return;
		}
		if (roomName.val() == '') {
			roomName.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please enter room name').fadeIn().delay(4000).fadeOut('slow');
			return;
		}
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#myModal_room').modal('hide');
						$('#myForm_room')[0].reset();
						$('.alert-success').html('Added new classroom successfully.').fadeIn().delay(4000).fadeOut('slow');
						searchData(1);

					}
				}
			});
	});
	// update
	function update_room(data)
	{
		var id = data;
		var divID = ""; // to set divisionID
		var graID = ""; // to set gradeID
		$('#updateModel_room').modal('show');
  		$('#updateModel_room').find('.modal-title').text('Update classroom');
  		$('#updateform_room').attr('action','<?php echo base_url() ?>Room/updateroom');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Room/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=roomID]').val(data.roomID);
  				$('select[name=divisionID_updated]').val(data.divisionID);
  				$('select[name=gradeID_updated]').val(data.gradeID);
  				$('input[name=roomName_update]').val(data.roomName);
  				divID = data.divisionID;
  				graID = data.gradeID;
  			}
  		});
  		// load division
		$.ajax({
			type:'ajax',
			method:'get',
			data:{divi:divID},
			url:'<?php echo base_url() ?>Room/retrivedivisionByid',
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
			url:'<?php echo base_url() ?>Room/retrivegradeByid',
			dataType:'json',
			success:function(data)
			{
				$('#grade_update').html(data);
			}
		});
	}
	// update
  	$('#btnUpdate_room').click(function(){
		var url = $('#updateform_room').attr('action'); // action
		var data = $('#updateform_room').serialize();
		// validation
		var divisionID = $('select[name=divisionID_updated]');
		var gradeID = $('select[name=gradeID_updated]');
		var roomName = $('input[name=roomName_update]');
		var result = '';

		if (divisionID.val() == '') {
			divisionID.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please select division').fadeIn().delay(4000).fadeOut('slow');
			return;
		}
		if (gradeID.val() == '') {
			gradeID.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please select grade').fadeIn().delay(4000).fadeOut('slow');
			return;
		}
		if (roomName.val() == '') {
			roomName.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please enter room name').fadeIn().delay(4000).fadeOut('slow');
			return;
		}
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#updateModel_room').modal('hide');
						$('#updateform_room')[0].reset();
						$('.alert-success').html('Updated classroom successfully.').fadeIn().delay(4000).fadeOut('slow');
						searchData(1);
					}
				}
			});
		
  	});

</script>
