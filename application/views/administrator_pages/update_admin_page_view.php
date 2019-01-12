<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Update User Information
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#" onclick="adminusers();"><i class="fa fa-dashboard"></i> Users Accounts</a></li><li class="active">Update user information</li>
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
<!-- update form -->
<div class="box-body">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Update User Information
				</div>
				<div class="panel-body">
					<form id="updateform_admin" action="" method="POST">
						<!-- fullname -->
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label>Full Name</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="id_admin" hidden="" value="">
							<input class="form-control" type="text" name="fullName_update" required="required" placeholder="Enter full name" >
								</div>
							</div>
						</div>
						<!-- role -->
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label class="w3-text-black">Role</label>
								</div>
								<div class="col-lg-6">
									<select id="role_id_update" class="form-control" required="required" name="role_update" >
							            <option value="">Select Role</option>
						             	<option value="Administrative">Administrative</option>
						            	<option value="Teacher">Teacher</option>
						            	<option value="Parent">Parent</option>
						            	
						          	</select>											
								</div>
							</div>
						</div>					
						<div id="fb_id_update" style="display: none;">
							<!-- finger print -->
							<div class="form-group" >
								<div class="row">
									<div class="col-lg-3">
										<label>Finger Print</label>
									</div>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="fp_update" required="required" placeholder="Enter finger print" >
									</div>
								</div>
							</div>	
							<!-- receive messages -->
							<div class="form-group">
								<div class="row">
									<div class="col-lg-3">
										<label class="w3-text-black">Receive Messages</label>
									</div>
									<div class="col-lg-6">
										<select class="form-control" required="required" name="no_msg_update" >
							             	<option value="Yes">Yes</option>
							            	<option value="No">No</option>
							          	</select>											
									</div>
								</div>
							</div>
							<!-- department -->
							<div class="form-group">
								<div class="row">
									<div class="col-lg-3">
										<label class="w3-text-black">Department</label>
									</div>
									<div class="col-lg-6">
										<select class="form-control" required="required" name="department_update" >
							             	<option value="">Select Department</option>
							             	<option value="Administration">Administration</option>
							            	<option value="Accounting">Accounting</option>
							            	<option value="IT">IT</option>
							            	<option value="Public Relations">Public Relations</option>
							            	<option value="The Clinic">The Clinic</option>
							            	<option value="Students Affairs">Students Affairs</option>
							            	<option value="HR">HR</option>
							            	<option value="Bookstore">Bookstore</option>
							            	<option value="Uniform">Uniform</option>
							            	<option value="Bus">Bus</option>
							            	<option value="English">English</option>
							            	<option value="Mathematics">Mathematics</option>
							            	<option value="Science">Science</option>
							            	<option value="Arabic">Arabic</option>
							            	<option value="French">French</option>
							            	<option value="German">German</option>
							          	</select>											
									</div>
								</div>
							</div>						
						</div>
						<!-- id card -->
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label>ID Card</label>
								</div>
								<div class="col-lg-6">
									<input class="form-control" type="text" name="idcard_update" required="required" placeholder="Enter id card" >
								</div>
							</div>
						</div>	
						<!-- gender -->
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label class="w3-text-black">Gender</label>
								</div>
								<div class="col-lg-6">
									<select class="form-control" required="required" name="gender_update" >
						             	<option value="Male">Male</option>
						            	<option value="Female">Female</option>
						          	</select>											
								</div>
							</div>
						</div>										
						<!-- job -->
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label>Job</label>
								</div>
								<div class="col-lg-6">
									<input class="form-control" type="text" name="job_update" required="required" placeholder="Enter job" >
								</div>
							</div>
						</div>
						<!-- mobile -->
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label>Mobile</label>
								</div>
								<div class="col-lg-6">
									<input class="form-control" type="text" name="mobile_update" required="required" placeholder="Enter mobile" >
								</div>
							</div>
						</div>
						<!-- username -->
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label>Username</label>
								</div>
								<div class="col-lg-6">
									<input class="form-control" type="text" name="username_update" required="required" placeholder="Enter username" >
								</div>
							</div>
						</div>
						<!-- status -->
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label>Status</label>
								</div>
								<div class="col-lg-6">
									<select class="form-control" required="required" name="status_update" >
							            <option value="">Select status</option>
						             	<option value="Enable">Enable</option>
						            	<option value="Disable">Disable</option>
						          	</select>
								</div>
							</div>
						</div>
						<!-- Login level -->
						<div class="form-group" id="loginlevel_id_update" style="display: none;">
							<div class="row">
								<div class="col-lg-3">
									<label class="w3-text-black">Login Level</label>
								</div>
								<div class="col-lg-6">
									<select class="form-control" required="required" name="loginlevel_update" id="loginlevel_id_update">
							            <option value="">Select Level</option>
						             	<option value="Super Administrator">Super Administrator</option>
						            	<option value="Administrator">Administrator</option>
						            	<option value="Member">Member</option>
						          	</select>											
								</div>
							</div>
							<fieldset>
								<legend style="color: red;">Privilege</legend>
								
									<!--Privilege  -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label><input type="checkbox" name="accounts_update" value="TRUE" id="id_accounts"> Accounts & Settings</label>
											</div>
											<div class="col-lg-3">
												<label><input type="checkbox" name="homework_update" value="TRUE" id="id_homework"> Homework</label>
											</div>
											<div class="col-lg-3">
												<label><input type="checkbox" name="agenda_update" value="TRUE" id="id_agenda"> Agenda</label>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-3">
												<label><input type="checkbox" name="attendance_update" value="TRUE" id="id_attandance"> Attandance</label>
											</div>
											
											<div class="col-lg-3">
												<label><input type="checkbox" name="sheet_update" value="TRUE" id="id_sheet"> Sheets</label>
											</div>
											<div class="col-lg-3">
												<label><input type="checkbox" name="exam_update" value="TRUE" id="id_exam"> Exam</label>
											</div>
											
										</div>
										<div class="row">
											<div class="col-lg-3">
												<label><input type="checkbox" name="transportation_update" value="TRUE" id="id_transportation"> Transportation</label>
											</div>
											
											<div class="col-lg-3">
												<label><input type="checkbox" name="marks_update" value="TRUE" id="id_marks"> Marks</label>
											</div>
											<div class="col-lg-3">
												<label><input type="checkbox" name="timetable_update" value="TRUE" id="id_timetable"> Timetable</label>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-3">
												<label><input type="checkbox" name="mail_update" value="TRUE" id="id_mail"> Mail</label>
											</div>
											<div class="col-lg-3">
												<label><input type="checkbox" name="calendar_update" value="TRUE" id="id_calendar"> Calendar</label>
											</div>
											<div class="col-lg-3">
												<label><input type="checkbox" name="uniform_update" value="TRUE" id="id_uniform"> Uniform</label>
											</div>
											
										</div>
										<div class="row">
											<div class="col-lg-3">
												<label><input type="checkbox" name="supplies_update" value="TRUE" id="id_supplies"> Supplies</label>
											</div>
											
											<div class="col-lg-3">
												<label><input type="checkbox" name="payments_update" value="TRUE" id="id_payments"> Paymnets</label>
											</div>
											<div class="col-lg-3">
												
											</div>
										</div>
									</div>						
							</fieldset>								
						</div>
					</form>		
					<button type="button" id="btnUpdate_admin" class="btn btn-success">Save changes</button>				
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $( document ).ready(function() {$(".se-pre-con").fadeOut("slow");});
	function load_data_user(data)
	{
		var id = data;
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Administrator/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=id_admin]').val(data.id_admin);
  				$('input[name=fullName_update]').val(data.fullName);
  				$('select[name=role_update]').val(data.role);
  				$('input[name=fp_update]').val(data.fp);
  				$('input[name=idcard_update]').val(data.idCard);
  				$('input[name=job_update]').val(data.job);
  				$('input[name=mobile_update]').val(data.mobile);
  				$('input[name=username_update]').val(data.username);
  				$('select[name=status_update]').val(data.status);
 				$('select[name=loginlevel_update]').val(data.loginlevel);
 				$('select[name=no_msg_update]').val(data.no_msg);
				$('select[name=department_update]').val(data.department);
				$('select[name=gender_update]').val(data.gender);


 				// finger print
				if (data.role == 'Parent') // is empty
				{
					$('#fb_id_update').fadeOut();
					$('#loginlevel_id_update').fadeOut();
				}
				else // is not empty
				{
					
					$('#fb_id_update').fadeIn();
					$('#loginlevel_id_update').fadeIn();
				} 				
				// Privilege
				if (data.role == 'Administrative') // is empty
				{
					$('#empPrivilage_update').fadeIn();

				}
				else // is not empty
				{
					
					$('#empPrivilage_update').fadeOut();
				} 				
  				if (data.accounts == 'TRUE') {
  					 document.getElementById("id_accounts").checked = true;
  				}
  				else{
  					 document.getElementById("id_accounts").checked = false;
  				}
  				if (data.homework == 'TRUE') {
  					 document.getElementById("id_homework").checked = true;
  				}
  				else{
  					 document.getElementById("id_homework").checked = false;
  				}
  				if (data.agenda == 'TRUE') {
  					 document.getElementById("id_agenda").checked = true;
  				}
  				else{
  					 document.getElementById("id_agenda").checked = false;
  				}
  				if (data.sheets == 'TRUE') {
  					 document.getElementById("id_sheet").checked = true;
  				}
  				else{
  					 document.getElementById("id_sheet").checked = false;
  				}
  				if (data.exam == 'TRUE') {
  					 document.getElementById("id_exam").checked = true;
  				}
  				else{
  					 document.getElementById("id_exam").checked = false;
  				}
  				if (data.attendance == 'TRUE') {
  					 document.getElementById("id_attandance").checked = true;
  				}
  				else{
  					 document.getElementById("id_attandance").checked = false;
  				}
  				if (data.transportation == 'TRUE') {
  					 document.getElementById("id_transportation").checked = true;
  				}
  				else{
  					 document.getElementById("id_transportation").checked = false;
  				}
  				if (data.marks == 'TRUE') {
  					 document.getElementById("id_marks").checked = true;
  				}
  				else{
  					 document.getElementById("id_marks").checked = false;
  				}
  				if (data.timetable == 'TRUE') {
  					 document.getElementById("id_timetable").checked = true;
  				}
  				else{
  					 document.getElementById("id_timetable").checked = false;
  				}
  				if (data.mail == 'TRUE') {
  					 document.getElementById("id_mail").checked = true;
  				}
  				else{
  					 document.getElementById("id_mail").checked = false;
  				}

  				if (data.calendar == 'TRUE') {
  					 document.getElementById("id_calendar").checked = true;
  				}
  				else{
  					 document.getElementById("id_calendar").checked = false;
  				}

  				if (data.uniform == 'TRUE') {
  					 document.getElementById("id_uniform").checked = true;
  				}
  				else{
  					 document.getElementById("id_uniform").checked = false;
  				}

  				if (data.supplies == 'TRUE') {
  					 document.getElementById("id_supplies").checked = true;
  				}
  				else{
  					 document.getElementById("id_supplies").checked = false;
  				}

  				if (data.payments == 'TRUE') {
  					 document.getElementById("id_payments").checked = true;
  				}
  				else{
  					 document.getElementById("id_payments").checked = false;
  				}  				  				  				  				
  			},
  			error:function(){
  				alert('Could not get data');
  			}
  		});
	}	
	// get data by id_admin
  	$('#btnUpdate_admin').click(function(){  		

		var data = $('#updateform_admin').serialize();
		// validation
		var fullName = $('input[name=fullName_update]');
		var role = $('select[name=role_update]');
		var idcard = $('input[name=idcard_update]');
		var job = $('input[name=job_update]');
		var mobile = $('input[name=mobile_update]');
		var username = $('input[name=username_update]');
		var status = $('select[name=status_update]');
		
		var result = '';

		if (fullName.val() == '') {
			fullName.parent().parent().addClass('has-error');
			alert('Please enter full name.');
			return;
		}else{
			fullName.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (role.val() == '') {
			role.parent().parent().addClass('has-error');
			alert('Please enter role.');
			return;
		}else{
			role.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (job.val() == '') {
			job.parent().parent().addClass('has-error');
			alert('Please enter job.');
			return;
		}else{
			job.parent().parent().removeClass('has-error');
			result +='3';
		}
		if (mobile.val() == '') {
			mobile.parent().parent().addClass('has-error');
			alert('Please enter mobile.');
			return;
		}else{
			mobile.parent().parent().removeClass('has-error');
			result +='4';
		}		
		if (username.val() == '') {
			username.parent().parent().addClass('has-error');
			alert('Please enter username.');
			return;
		}else{
			username.parent().parent().removeClass('has-error');
			result +='5';
		}
		if (status.val() == '') {
			alert('Please select Status.');
			return;
		}
		// idcard
		if (idcard.val() == '') {
			idcard.parent().parent().addClass('has-error');
			return;
		}else{
			idcard.parent().parent().removeClass('has-error');
			result +='6';
		}			
		if (result == '123456') {
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Administrator/updateadministrator',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('Updated user account successfully.').fadeIn().delay(4000).fadeOut('slow');						
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
	              		load_administrator_data();
					}
				}
			});

		}
  	});	
</script>