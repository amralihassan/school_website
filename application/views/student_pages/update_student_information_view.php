<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Update Student Information
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#" onclick="studentusers();"><i class="fa fa-dashboard"></i> Students Accounts</a></li><li class="active">Update student information</li>
  </ol>
</section>
<!-- update form -->
<div class="box-body">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
		</div>
	</div>	
	<div class="col-md-12">	
		<form id="updateform_student" action="" method="post">
			<!-- student information -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4><b>Student Information</b></h4>
				</div>
				<div class="panel-body">
					<!--Student Identify  -->
					<input hidden="" type="text" name="stuID" hidden value="">
					<!-- arabic name -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Arabic Student Name</label>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="text" name="arabicName_update" required="required" placeholder="Enter arabic student name" >
							</div>
						</div>
					</div>
					<!-- english name -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>English Student Name</label>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="text" name="englishName_update" required="required" placeholder="Enter english student name" >
							</div>
						</div>
					</div>
					<!-- Student number -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Student Number</label>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="text" name="studentID_update" required="required" placeholder="Enter student number" >
							</div>
						</div>
					</div>											
					<!-- Nationality -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Nationality</label>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="text" name="Nationality_update" required="required" placeholder="Enter nationality" >
							</div>
						</div>
					</div>
					<!-- Division -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label for="division">Division</label>
							</div>
							<div class="col-md-6">
								<select class="form-control" name="divisionID_update" id="divisionID" required="required">
									<option value="">Select Division</option>
								</select>
								<!-- end select box -->
							</div>
						</div>
					</div>
					<!-- Grade -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label for="grade">Grade</label>
							</div>
							<div class="col-md-6">
								<select class="form-control" name="gradeID_update" id="gradeID" required="required">
									<option value="">Select Grade</option>
								</select>
								<!-- end select box -->
							</div>
						</div>
					</div>
					<!-- Room -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label for="class">Class</label>
							</div>
							<div class="col-md-6">
								<select class="form-control" name="roomID_update" id="roomID" disabled="" required="required">
									<option value="">Select Class</option>
								</select>
								<!-- end select box -->
							</div>
						</div>
					</div>
					<!-- Student ID -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Student ID</label>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="text" name="studentIDcard_update" required="required" placeholder="Enter student ID" >
							</div>
						</div>
					</div>
					<!--student status  -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Student Status</label>
							</div>
							<div class="col-md-6">
								<select class="form-control" required="required" name="student_status_update" >
				            <option value="">Select Student Status</option>
			             	<option value="New">New</option>
			            	<option value="Moved">Moved</option>
			            	<option value="Listener">Listener</option>
			          	</select>
							</div>
						</div>
					</div>	
					<!--second language  -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Second Language</label>
							</div>
							<div class="col-md-6">
								<select class="form-control" required="required" name="secondLanguage_update" >
				            <option value="">Select Second language</option>
			             	<option value="French">French</option>
			            	<option value="German">German</option>
			          	</select>
							</div>
						</div>
					</div>			
					<!--statge  -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Stage</label>
							</div>
							<div class="col-md-6">
								<select class="form-control" required="required" name="stage_update" >
				            <option value="">Select Stage</option>
			             	<option value="Foundation">Foundation</option>
			            	<option value="Primary(1-3)">Primary(1-3)</option>
			            	<option value="Primary(4-6)">Primary(4-6)</option>
			            	<option value="Preparatory">Preparatory</option>
			            	<option value="Secondary">Secondary</option>
			          	</select>
							</div>
						</div>
					</div>		
                  <!--  start school date -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        <label>Start School Date</label>
                      </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control" type="date" name="start_school_update" required="required" min="2018-01-01" max="2030-12-31">
                            </div>  
                        </div>                        
                    </div>
                  </div>									
					<!--Status  -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Status</label>
							</div>
							<div class="col-md-6">
								<select class="form-control" required="required" name="status_update" >
				            <option value="">Select Status</option>
			             	<option value="Enable">Enable</option>
			            	<option value="Disable">Disable</option>
			          	</select>
							</div>
						</div>
					</div>																			
					<!--Username  -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Username</label>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="text" name="username_update" required="required" placeholder="Enter username" >
							</div>
						</div>
					</div>					
				</div>		
			</div>
			<!-- parents information -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4><b>Parents Information</b></h4>
				</div>
				<div class="panel-body">
					<!-- mother name -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Mother Name</label>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="text" name="motherName_update" required="required" placeholder="Enter mother name" >
							</div>
						</div>
					</div>					
					<!-- Father ID -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Father ID</label>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="text" name="fatherIDcard_update" required="required" placeholder="Enter father ID" >
							</div>
						</div>
					</div>	
					<!-- Father job -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Fatehr Job</label>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="text" name="fatherJob_update" required="required" placeholder="Enter father job" >
							</div>
						</div>
					</div>				
					<!-- Father mobile -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Father Mobile</label>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="text" name="fatherMobile_update" required="required" placeholder="Enter father mobile" >
							</div>
						</div>
					</div>
					<!-- mother mobile -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Mother Mobile</label>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="text" name="motherMobile_update" required="required" placeholder="Enter mother mobile" >
							</div>
						</div>
					</div>						
				</div>		
			</div>				
		</form>	
	</div>
	<!-- button sve changes -->
	<button type="button" id="btnUpdate_student" class="btn btn-success">Save changes</button>	
</div>
<script type="text/javascript">
    $( document ).ready(function() {$(".se-pre-con").fadeOut("slow");});	
	// update 
	$('#btnUpdate_student').click(function(){
		var data = $('#updateform_student').serialize();
	
		// validation
		var arabicName = $('input[name=arabicName_update]');
		var englishName = $('input[name=englishName_update]');
		var studentNumber = $('input[name=studentNumber_update]');
		var nationality = $('input[name=nationality_update]');
		var divisionID = $('select[name=divisionID_update]');
		var gradeID = $('select[name=gradeID_update]');
		var roomID = $('select[name=roomID_update]');
		var studentID = $('input[name=studentID_update]');
		var fatherID = $('input[name=fatherID_update]');
		var fatherJob = $('input[name=fatherJob_update]');
		var motherName = $('input[name=motherName_update]');
		var stage = $('select[name=stage_update]');
		var username = $('input[name=username_update]');
		var status = $('select[name=status_update]');
		var result = '';

		if (arabicName.val() == '') {
			arabicName.parent().parent().addClass('has-error');
			return;
		}else{
			arabicName.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (englishName.val() == '') {
			englishName.parent().parent().addClass('has-error');
			return;
		}else{
			englishName.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (studentNumber.val() == '') {
			studentNumber.parent().parent().addClass('has-error');
			return;
		}else{
			studentNumber.parent().parent().removeClass('has-error');
			result +='3';
		}
		if (nationality.val() == '') {
			nationality.parent().parent().addClass('has-error');
			return;
		}else{
			nationality.parent().parent().removeClass('has-error');
			result +='4';
		}
		if (divisionID.val() == '') {
			divisionID.parent().parent().addClass('has-error');
			return;
		}else{
			divisionID.parent().parent().removeClass('has-error');
			result +='5';
		}
		if (gradeID.val() == '') {
			gradeID.parent().parent().addClass('has-error');
			return;
		}else{
			gradeID.parent().parent().removeClass('has-error');
			result +='6';
		}
		if (roomID.val() == '') {
			roomID.parent().parent().addClass('has-error');
			return;
		}else{
			roomID.parent().parent().removeClass('has-error');
			result +='7';
		}
		if (studentID .val() == '') {
			studentID .parent().parent().addClass('has-error');
			return;
		}else{
			studentID .parent().parent().removeClass('has-error');
			result +='8';
		}
		if (fatherID.val() == '') {
			fatherID.parent().parent().addClass('has-error');
			return;
		}else{
			fatherID.parent().parent().removeClass('has-error');
			result +='6';
		}
		if (fatherJob.val() == '') {
			fatherJob.parent().parent().addClass('has-error');
			return;
		}else{
			fatherJob.parent().parent().removeClass('has-error');
			result +='10';
		}
		if (motherName.val() == '') {
			motherName.parent().parent().addClass('has-error');
			return;
		}else{
			motherName.parent().parent().removeClass('has-error');
			result +='11';
		}						
		if (stage.val() == '') {
			stage.parent().parent().addClass('has-error');
			return;
		}else{
			stage.parent().parent().removeClass('has-error');
			result +='12';
		}
		if (username.val() == '') {
			username.parent().parent().addClass('has-error');
			return;
		}else{
			username.parent().parent().removeClass('has-error');
			result +='13';
		}
		
		if (status.val() == '') {
			status.parent().parent().addClass('has-error');
			return;
		}else{
			status.parent().parent().removeClass('has-error');
			result +='14';
		}
		if (result == '1234567861011121314') {
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Student/updatestudent',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('Updated student account successfully.').fadeIn().delay(2000).fadeOut('slow');
						load_student_data(1);
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);						
					}
				}
			});
		}
	});	
  	function load_data_student(data)
	{
		var id = data;
		var divID = ""; // to set divisionID
		var graID = ""; // to set gradeID
		var romID =""; // to set roomID

		// load student data
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Student/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=stuID]').val(data.stuID);
  				$('input[name=arabicName_update]').val(data.arabicName);
  				$('input[name=englishName_update]').val(data.englishName);
  				$('input[name=studentID_update]').val(data.studentID);
  				$('input[name=Nationality_update]').val(data.Nationality);
  				$('select[name=divisionID_update]').val(data.divisionID);
  				$('select[name=gradeID_update]').val(data.gradeID);
  				$('select[name=roomID_update]').val(data.roomID);
  				$('input[name=studentIDcard_update]').val(data.studentIDcard);
  				$('input[name=start_school_update]').val(data.start_school);
  				$('input[name=fatherIDcard_update]').val(data.fatherIDcard);
  				$('input[name=fatherJob_update]').val(data.fatherJob);
  				$('input[name=motherName_update]').val(data.motherName);
  				$('select[name=status_update]').val(data.status);
  				$('select[name=stage_update]').val(data.stage);
  				$('input[name=username_update]').val(data.username);
  				$('input[name=fatherMobile_update]').val(data.fatherMobile);
  				$('input[name=motherMobile_update]').val(data.motherMobile);
  				$('select[name=student_status_update]').val(data.student_status);
  				$('select[name=secondLanguage_update]').val(data.secondLanguage);
  				
  				// created to send as a get to selected from selected box
  				divID = data.divisionID;
  				graID = data.gradeID;
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
			url:'<?php echo base_url() ?>Student/retrivedivisionByid',
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
			url:'<?php echo base_url() ?>Student/retrivegradeByid',
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
			url:'<?php echo base_url() ?>Student/retriveroomByid',
			dataType:'json',
			success:function(data)
			{
				$('#roomID').html(data);
				$('#roomID').prop('disabled', false);
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
				url:"<?php echo base_url() ?>Student/get_room", // method that will get data
				type:"POST",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'gradeID_update' : gradeID, 'divisionID_update' : divisionID},
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
				url:"<?php echo base_url() ?>Student/get_room_for_updating", // method that will get data
				type:"POST",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'gradeID_update' : gradeID, 'divisionID_update' : divisionID},
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

</script>