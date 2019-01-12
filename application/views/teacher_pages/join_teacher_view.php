<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Join Teacher
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Join Teacher</li>
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
	<li class="active"><a href="#join" aria-controls="join" role="tab" data-toggle="tab">Classes</a></li>
	<li><a href="#new" id="btnjoinclass"  aria-controls="new" role="tab" data-toggle="tab">New</a></li>
</ul>
<div class="tab-content">
	<!-- display students accounts -->
	<div role="tabpanel" class="tab-pane active" id="join">
		<!-- displat data table -->
		<section class="Content">
			<div class="row box-body">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Class Teacher
						</div>
						<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<select class="form-control select2" style="width: 100%;" onchange="searchData_by_teacherID();" name="teacher_search" id="teacherID_search">
											<option value="">Select Teacher</option>
										</select>									
										<!-- end select box -->									
									</div>
								</div>	
								<div id="Classes_teacher_table"></div>						
						</div>
					</div>			
				</div>
			</div>	
		</section>
	</div>
	<!-- new -->
	<div role="tabpanel" class="tab-pane" id="new">
		<div class="box-body">		
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Join class
						</div>
						<div class="panel-body">
							<!--form  -->
							<form id="myForm_class" action="" method="post">
								<!-- teacher box -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="teacher">Teacher</label>
										</div>
										<div class="col-md-6">
											<select class="form-control select2" style="width: 100%;" name="teacherID" id="teacher">
												<option value="">Select Teacher</option>
											</select>									
											<!-- end select box -->									
										</div>
									</div>
								</div>
								<!-- subject box -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="subject">Subject</label>
										</div>
										<div class="col-md-6">
											<select class="form-control" name="subjectID" id="subject">
												<option value="">Select Subject</option>
											</select>
											<!-- end select box -->									
										</div>
									</div>							
								</div>
								<!-- division box -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="grade">Division</label>
										</div>
										<div class="col-md-6">
											<select class="form-control" name="divisionID_add" id="division">
												<option value="">Select Division</option>
											</select>
											<!-- end select box -->									
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
											<select class="form-control" name="gradeID_add" id="grade">
												<option value="">Select Grade</option>
											</select>
											<!-- end select box -->									
										</div>
									</div>													
								</div>
								<!-- room box -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="grade">Class</label>									
										</div>
										<div class="col-md-6">
											<select class="form-control" name="roomID_add" id="room" disabled="">
												<option value="">Select Class</option>
											</select>
											<!-- end select box -->		
										</div>
									</div>							
								</div>
							</form>		
							<!-- button -->
							<button type="button" id="btnSave_class" class="btn btn-success">Save</button>					
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>
<!-- update model -->
<div class="modal fade" id="updateModel_class" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-body">
				<form id="updateform_class" action="" method="post">
					<div class="form-group">
						<!-- subject box -->
						<input type="text" name="id_update" hidden="" value="">
						<label for="subject">Subject</label>
						<select class="form-control" name="subjectID_update" id="subjectID">
							<option value="">Select Subject</option>
						</select>
						<!-- end select box -->
					</div>
					<div class="form-group">
						<!-- division box -->
						<label for="grade">Division</label>
						<select class="form-control" name="divisionID_update" id="divisionID">
							<option value="">Select Division</option>
						</select>
						<!-- end select box -->
					</div>
					<div class="form-group">
						<!-- grade box -->
						<label for="grade">Grade</label>
						<select class="form-control" name="gradeID_update" id="gradeID">
							<option value="">Select Grade</option>
						</select>
						<!-- end select box -->
					</div>
					<div class="form-group">
						<!-- room box -->
						<label for="grade">Class</label>
						<select class="form-control" name="roomID_update" id="roomID" disabled="">
							<option value="">Select Class</option>
						</select>
						<!-- end select box -->
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate_class" class="btn btn-success">Save changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end update model -->

<!-- delete modal -->
<div class="modal fade" id="deleteModal_class" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				Do you want to delete this class?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_class" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->
<script type="text/javascript">	
	// search
	function searchData_by_teacherID() 
	{
		// get word search
		var teacherID = $('select[name=teacher_search]');
		$.ajax({
			url:'<?php echo base_url() ?>Teacher/pagination_joinclass_search/1',
			method:'get',
			data:{teacherID:teacherID.val()},
			dataType:'json',
			success:function(data){
				$('#Classes_teacher_table').html(data.Classes_teacher_table);
			}
		});	
	}	
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })  	
  load_teacher_names();
  function load_teacher_names()
  {
		// load teacher
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Teacher/retriveteacher',
			dataType:'json',
			success:function(data)
			{
				$('#teacherID_search').html(data);
				$(".se-pre-con").fadeOut("slow");
			}
		});	  	
  }
	// btnAdd new 
	$('#btnjoinclass').click(function(){
		// add attribute
		$('#myForm_class').attr('action','<?php echo base_url() ?>Teacher/joinclass');
		// load teacher
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Teacher/retriveteacher',
			dataType:'json',
			success:function(data)
			{
				$('#teacher').html(data);
			}
		});
		// load subject
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Subject/retivesubjects',
			dataType:'json',
			success:function(data)
			{
				$('#subject').html(data);
			}
		});
		// load division
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Student/retrivedivision',
			dataType:'json',
			success:function(data)
			{
				$('#division').html(data);
			}
		});
		// load grades
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Student/retrivegrade',
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
	$('#btnSave_class').click(function(){
		var url = $('#myForm_class').attr('action'); // action
		var data = $('#myForm_class').serialize();
	
		// validation
		var teacherID = $('select[name=teacherID]');
		var subjectID = $('select[name=subjectID]');
		var divisionID = $('select[name=divisionID_add]');
		var gradeID = $('select[name=gradeID_add]');
		var roomID = $('select[name=roomID]');
		var result = '';

		if (teacherID.val() == '') {
			teacherID.parent().parent().addClass('has-error');
			return;
		}else{
			teacherID.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (subjectID.val() == '') {
			subjectID.parent().parent().addClass('has-error');
			return;
		}else{
			subjectID.parent().parent().removeClass('has-error');
			result +='2';
		}
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
		if (roomID.val() == '') {
			roomID.parent().parent().addClass('has-error');
			return;
		}else{
			roomID.parent().parent().removeClass('has-error');
			result +='5';
		}
		if (result == '12345') {
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#myModal_class').modal('hide');
						$('#myForm_class')[0].reset();
						$('.alert-success').html('Added successfully.').fadeIn().delay(2000).fadeOut('slow');
						searchData_by_teacherID();
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);						

					}
				},
				error:function(){
					alert('Could not save in database.')
				}
			});

		}
	});
	// delete 
	function delete_teacherjobs(data)
	{
		var id = data;

  		$('#deleteModal_class').modal('show');
  		$('#btnDelete_class').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Teacher/deletejoinclass',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal_class').modal('hide');
  						$('.alert-success').html('Deleted successfully.').fadeIn().delay(4000).fadeOut('slow');
  						searchData_by_teacherID();
  					}
  				}
  			});
  		});
	}
	// when press update button
  	function update_teacherjobs(data)
	{
		var id = data;
		var divID = ""; // to set divisionID
		var graID = ""; // to set gradeID
		var romID =""; // to set roomID
		var subID =""; // to set subjectID
		$('#updateModel_class').modal('show');
  		$('#updateModel_class').find('.modal-title').text('Update');
  		$('#updateform_class').attr('action','<?php echo base_url() ?>Teacher/Updatejoinclass');
		// load student data
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Teacher/getjoinclassbyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=id_update]').val(data.id);
  				$('select[name=divisionID_update]').val(data.divisionID);
  				$('select[name=gradeID]').val(data.gradeID);
  				$('select[name=roomID]').val(data.roomID);
  				$('select[name=subjectID]').val(data.subjectID);
  				// created to send as a get to selected from selected box
  				techID = data.teacherID;
  				divID = data.divisionID;
  				graID = data.gradeID;
  				subID = data.subjectID;
  				romID = data.roomID;
  				
  			},
  			error:function(){
  				alert('Could not get data');
  			}
  		});
  		// load division
		$.ajax({
			type:'ajax',
			method:'get',
			data:{divi:divID},
			url:'<?php echo base_url() ?>Teacher/retrivedivisionByid',
			dataType:'json',
			success:function(data)
			{
				$('#divisionID').html(data);
			}
		});
		// load grades
		$.ajax({
			type:'ajax',
			method:'get',
			data:{gra:graID},
			url:'<?php echo base_url() ?>Teacher/retrivegradeByid',
			dataType:'json',
			success:function(data)
			{
				$('#gradeID').html(data);
			}
		});
		// load rooms
		$.ajax({
			type:'ajax',
			method:'get',
			data:{rom:romID},
			url:'<?php echo base_url() ?>Teacher/retriveroomByid',
			dataType:'json',
			success:function(data)
			{
				$('#roomID').html(data);
				$('#roomID').prop('disabled', false);
			}
		});
		// load subjects
		$.ajax({
			type:'ajax',
			method:'get',
			data:{sub:subID},
			url:'<?php echo base_url() ?>Teacher/retrivesubjectByid',
			dataType:'json',
			success:function(data)
			{
				$('#subjectID').html(data);
			}
		});
	}
	// load room for update
	$('#divisionID').on('change', function(){
		var gradeID = $('select[name=gradeID_update]').val();
		var divisionID = $(this).val();  //set country = country_id
		
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#roomID').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#roomID').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Teacher/get_room", // method that will get data
				type:"POST",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'gradeID' : gradeID, 'divisionID' : divisionID},
				dataType: 'json',
				success: function(data){
					$('#roomID').html(data);
				},
				error: function(){
					$('#roomID').prop('disabled', true); // set disable
				}
			});
		}
	});
	$('#gradeID').on('change', function(){
		var divisionID = $('select[name=divisionID_update]').val();
		var gradeID = $(this).val();  //set country = country_id
		
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#roomID').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#roomID').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Teacher/get_room", // method that will get data
				type:"POST",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'gradeID' : gradeID, 'divisionID' : divisionID},
				dataType: 'json',
				success: function(data){
					$('#roomID').html(data);
				},
				error: function(){
					$('#roomID').prop('disabled', true); // set disable
				}
			});
		}
	});
	// btnUpdate
	$('#btnUpdate_class').click(function(){
		var url = $('#updateform_class').attr('action'); // action
		var data = $('#updateform_class').serialize();
	
		// validation
		var subjectID = $('select[name=subjectID_update]');
		var divisionID = $('select[name=divisionID_update]');
		var gradeID = $('select[name=gradeID_update]');
		var roomID = $('select[name=roomID_update]');
		var result = '';
		if (subjectID.val() == '') {
			subjectID.parent().parent().addClass('has-error');
			return;
		}else{
			subjectID.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (divisionID.val() == '') {
			divisionID.parent().parent().addClass('has-error');
			return;
		}else{
			divisionID.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (gradeID.val() == '') {
			gradeID.parent().parent().addClass('has-error');
			return;
		}else{
			gradeID.parent().parent().removeClass('has-error');
			result +='3';
		}
		if (roomID.val() == '') {
			roomID.parent().parent().addClass('has-error');
			return;
		}else{
			roomID.parent().parent().removeClass('has-error');
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
						$('#updateModel_class').modal('hide');
						$('#updateform_class')[0].reset();
						$('.alert-success').html('Updated successfully.').fadeIn().delay(2000).fadeOut('slow');
						searchData_by_teacherID();
					}
				}
			});
		}
	});	
</script>