<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Users
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Users Accounts</li>
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
	<li><a href="#sday" id="btnAdd_admin" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
</ul>
<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="fday">
		<!-- displat data table -->
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							 Users
						</div>
						<div class="panel-body">
							<div id="administrator_table"></div>
						</div>
					</div>
				</div>
			</div>
		</div>					
	</div>
	<div role="tabpanel" class="tab-pane" id="sday">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							User Information
						</div>
						<div class="panel-body">
							<form id="myForm_admin" action="" method="post">
								<!-- fullname -->
								<div class="form-group">
									
									<div class="row">
										<div class="col-lg-3">
											<label>Full Name</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="fullName_add" required="required" placeholder="Enter full name" >
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
											<select id="role_id" class="form-control" required="required" name="role_add" >
									            <option value="">Select Role</option>
								             	<option value="Administrative">Administrative</option>
								            	<option value="Teacher">Teacher</option>
								            	<option value="Parent">Parent</option>
								            	
								          	</select>											
										</div>
									</div>
								</div>
								<!-- for administrative and teachers only -->
								<div id="fb_id" style="display: none;">
									<!-- finger print -->
									<div class="form-group" >
										<div class="row">
											<div class="col-lg-3">
												<label>Finger Print</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" type="text" name="fp_add" required="required" placeholder="Enter finger print" >
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
												<select class="form-control" required="required" name="department_add" >
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
									            	<option value="Social">Social</option>
									            	<option value="Religion">Religion</option>
									            	<option value="Music">Music</option>
									            	<option value="P.E">P.E</option>
									            	<option value="Computer">Computer</option>
									          	</select>											
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
												<select class="form-control" required="required" name="no_msg_add" >
									             	<option value="Yes">Yes</option>
									            	<option value="No">No</option>
									          	</select>											
											</div>
										</div>
									</div>													

								</div>
																						
								<!-- id card -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label class="w3-text-black">ID Card</label>		
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="idcard_add" required="required" placeholder="Enter id card" >
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
											<select class="form-control" required="required" name="gender_add" >
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
											<label class="w3-text-black">Job</label>		
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="job_add" required="required" placeholder="Enter job" >
										</div>
									</div>									
								</div>
								<!-- mobile -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label class="w3-text-black">Mobile</label>		
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="mobile_add" required="required" placeholder="Enter mobile" >
										</div>
									</div>									
								</div>
								<!-- username -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label class="w3-text-black">Username</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="username_add" required="required" placeholder="Enter username" >
										</div>
									</div>
								</div>
								<!-- password -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label class="w3-text-black">Password</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="password" name="password_add" required="required">
										</div>
									</div>
								</div>
								<!-- password confirm -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label class="w3-text-black">Confirm Password</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="password" name="passconf" required="required">
										</div>
									</div>
								</div>	
								<!-- status -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label class="w3-text-black">Status</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" required="required" name="status_add" >
									            <option value="">Select status</option>
								             	<option value="Enable">Enable</option>
								            	<option value="Disable">Disable</option>
								          	</select>											
										</div>
									</div>
								</div>
								<!-- Login level -->
								<div class="form-group" id="loginlevel_id_add" style="display: none;">
									<div class="row">
										<div class="col-lg-3">
											<label class="w3-text-black">Login Level</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" required="required" name="loginlevel_add"  >
									            <option value="">Select Level</option>
								             	<option value="Super Administrator">Super Administrator</option>
								            	<option value="Administrator">Administrator</option>
								            	<option value="Member">Member</option>
								          	</select>											
										</div>
									</div>
								</div>
							
								<fieldset style="display: none;" id="empPrivilage_add">												
									<legend style="color: red;">Privilege</legend>
										<!--Privilege  -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-2">
													<label><input type="checkbox" name="accounts_add" value="TRUE"> Accounts & Settings</label>
												</div>
												<div class="col-lg-2">
													<label><input type="checkbox" name="homework_add" value="TRUE"> Homework</label>
												</div>
												<div class="col-lg-2">
													<label><input type="checkbox" name="agenda_add" value="TRUE"> Agenda</label>
												</div>
												<div class="col-lg-2">
													<label><input type="checkbox" name="sheets_add" value="TRUE"> Sheets</label>
												</div>
												<div class="col-lg-2">
													<label><input type="checkbox" name="exam_add" value="TRUE"> Exam</label>
												</div>
												<div class="col-lg-2">
													<label><input type="checkbox" name="attendance_add" value="TRUE"> Attandance</label>
												</div>

											</div>
											<div class="row">
												<div class="col-lg-2">
													<label><input type="checkbox" name="transportation_add" value="TRUE"> Transportation</label>
												</div>
												<div class="col-lg-2">
													<label><input type="checkbox" name="marks_add" value="TRUE"> Marks</label>
												</div>
												<div class="col-lg-2">
													<label><input type="checkbox" name="timetable_add" value="TRUE"> Timetable</label>
												</div>
												<div class="col-lg-2">
													<label><input type="checkbox" name="mail_add" value="TRUE"> Mail</label>
												</div>
												<div class="col-lg-2">
													<label><input type="checkbox" name="payments_add" value="TRUE"> Payments</label>
												</div>
												<div class="col-lg-2">
													<label><input type="checkbox" name="calendar_add" value="TRUE"> Calendar</label>
												</div>															

											</div>
											<div class="row">
												<div class="col-lg-2">
													<label><input type="checkbox" name="uniform_add" value="TRUE"> Uniform</label>
												</div>
												<div class="col-lg-2">
													<label><input type="checkbox" name="supplies_add" value="TRUE"> Supplies</label>
												</div>
					
											</div>	
										</div>
								
								</fieldset>
								<div class="row">

									<div class="col-lg-12">
									<!-- button -->
									<?php 
										$login_level_add ='';
										
										if ( 'Super Administrator' == $_SESSION['loginlevel']) 
										{
											$login_level_add ='<button type="button" id="btnSave_admin" class="btn btn-success">Save</button>';
											
										}
										elseif ( 'Administrator' == $_SESSION['loginlevel']) 
										{
											$login_level_add ='<button type="button" id="btnSave_admin" class="btn btn-success">Save</button>';
											
										}
										else 
										{
											$login_level_add ='<button type="button"  class="btn btn-success">Save</button>';
											
										}
										echo $login_level_add;
									 ?>
									</div>
								</div>	
							</form>							
						</div>
					</div>
				</div>
			</div>							
		</div>
	</div>					
</div>

<!-- change password -->
<!-- chnage password modal -->
<div class="modal fade" id="passwordmodal_admin" role="dialog" tabindex="1">
	<div style="width: 700px;"  class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>
			<div class="modal-body">
				<form id="updatepassword_admin" action="" method="POST">
					<div class="form-group">
						
						<input hidden="" type="text" name="id_admin" hidden value="">
						<!-- new password -->
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label class="w3-text-black">New password</label>
								</div>
								<div class="col-lg-6">
									<input class="form-control" type="password" name="password" required="required">
								</div>
							</div>
						</div>	
						<!-- confirm -->					
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label class="w3-text-black">Confirm Password</label>
								</div>
								<div class="col-lg-6">
									<input class="form-control" type="password" name="passconfc" required="required">
								</div>
							</div>
						</div>						
						<input hidden="" type="text" name="fullName_update" hidden>
						<input hidden="" type="text" name="role_update">
						<input hidden="" type="text" name="job_update">
						<input hidden="" type="text" name="username_update">
						<select hidden name="status_update" >
				            <option value="">Select status</option>
			             	<option value="Enable">Enable</option>
			            	<option value="Disable">Disable</option>
			          	</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnChangepassword_admin" class="btn btn-success">Change</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModal_admin" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>
			<div class="modal-body">
				Do you want to delete this administrator?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// load admin users
	load_administrator_data();
	
	function load_administrator_data() {
		$.ajax({
			url:'<?php echo base_url() ?>Administrator/retrive_all_users/',
			method:'get',
			dataType:'json',
			success:function(data){
				$('#administrator_table').html('<table id ="example1" class="table table-hover table-bordered">						<thead><tr><th>#</th><th>Full Name</th><th>Role</th><th>Mobile</th>								<th>Username</th><th>Status</th><th><i class="fa fa-lock"></i></th><th><i class="fa fa-edit"></i></th><th><i class="fa fa-trash"></i></th></tr></thead> ' + data + '</table>');	
  					$('#example1').DataTable({ 
                      "destroy": true, //use for reinitialize datatable
                   });
				$(".se-pre-con").fadeOut("slow");				
			}
		});
	}
	// change password
	function changeAdminpassword(data)
	{
		var id = data;
		$('#passwordmodal_admin').modal('show');
  		$('#passwordmodal_admin').find('.modal-title').text('Change administrator password');
  		$('#updatepassword_admin').attr('action','<?php echo base_url() ?>Administrator/updateadminpassword');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Administrator/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=id_admin]').val(data.id_admin);
  			}
  		});
	}
	// delete user
	function delete_admin(data)
	{
		var id = data;

  		$('#deleteModal_admin').modal('show');
  		$('#deleteModal_admin').find('.modal-title').text('Delete User Account');
  		$('#btnDelete').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Administrator/deleteadministrator',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal_admin').modal('hide');
  						$('.alert-success').html('Deleted administrator account successfully.').fadeIn().delay(4000).fadeOut('slow');
  						load_administrator_data();
  					}
  				}
  			});
  		});
	}	
	// select role
	$('#role_id').on('change', function(){
		var role = $(this).val();  //set country = country_id
		
		if (role == 'Parent') // is empty
		{
			$('#fb_id').fadeOut();
			$('#loginlevel_id_add').fadeOut();
		}
		else // is not empty
		{
			$('#fb_id').fadeIn();
			$('#loginlevel_id_add').fadeIn();
		}
		// ------------
		if (role == 'Administrative') // is empty
		{
			$('#empPrivilage_add').fadeIn();

		}
		else // is not empty
		{			
			$('#empPrivilage_add').fadeOut();
		}		
	});	
	// select role
	$('#role_id_update').on('change', function(){
		var role = $(this).val();  //set country = country_id
		
		if (role == 'Parent') // is empty
		{
			$('#fb_id_update').fadeOut();
			$('#loginlevel_id_update').fadeOut();
		}
		else // is not empty
		{			
			$('#fb_id_update').fadeIn();
			$('#loginlevel_id_update').fadeIn();
		}
		// ------------
		if (role == 'Administrative') // is empty
		{
			$('#loginlevel_id_update').fadeIn();
		}
		else // is not empty
		{
			$('#loginlevel_id_update').fadeOut();
		}		
	});			
	// btnAdd new administrator
	$('#btnAdd_admin').click(function(){
		// add attribute
		$('#myForm_admin').attr('action','<?php echo base_url() ?>Administrator/addAdmin');
	});
	// btnSave new administrator
	$('#btnSave_admin').click(function(){
		var url = $('#myForm_admin').attr('action'); // action
		var data = $('#myForm_admin').serialize();
	
		// validation
		var fullName = $('input[name=fullName_add]');
		var role = $('select[name=role_add]');
		var idcard = $('input[name=idcard_add]');
		var job = $('input[name=job_add]');
		var mobile = $('input[name=mobile_add]');
		var username = $('input[name=username_add]');
		var password = $('input[name=password_add]');
		var passconf = $('input[name=passconf]');
		var status = $('select[name=status_add]');
		var result = '';
		// fullname
		if (fullName.val() == '') {
			fullName.parent().parent().addClass('has-error');
			return;
		}else{
			fullName.parent().parent().removeClass('has-error');
			result +='1';
		}
		// role
		if (role.val() == '') {
			role.parent().parent().addClass('has-error');
			return;
		}else{
			role.parent().parent().removeClass('has-error');
			result +='2';
		}
		// job
		if (job.val() == '') {
			job.parent().parent().addClass('has-error');
			return;
		}else{
			job.parent().parent().removeClass('has-error');
			result +='3';
		}
		// mobile
		if (mobile.val() == '') {
			mobile.parent().parent().addClass('has-error');
			return;
		}else{
			mobile.parent().parent().removeClass('has-error');
			result +='4';
		}		
		// username
		if (username.val() == '') {
			username.parent().parent().addClass('has-error');
			return;
		}else{
			username.parent().parent().removeClass('has-error');
			result +='5';
		}
		// password
		if (password.val() == '') {
			password.parent().parent().addClass('has-error');
			return;
		}else{
			password.parent().parent().removeClass('has-error');
			result +='6';
		}
		// confirm
		if (passconf.val() == '') {
			passconf.parent().parent().addClass('has-error');
			return;
		}else{
			passconf.parent().parent().removeClass('has-error');
			result +='7';
		}
		// password matching
		if (password.val() != passconf.val())
		{
			passconf.parent().parent().addClass('has-error');
			$('.alert-danger').html('Password not match !!').fadeIn();
			// go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
			return;
		}
		else{
			$('.alert-danger').html('Password not match !!').fadeOut();
		}

		// status
		if (status.val() == '') {
			status.parent().parent().addClass('has-error');
			return;
		}
		else{
			status.parent().parent().removeClass('has-error');
			result +='8';
		}		
		// idcard
		if (idcard.val() == '') {
			idcard.parent().parent().addClass('has-error');
			return;
		}else{
			idcard.parent().parent().removeClass('has-error');
			result +='6';
		}		
		if (result == '123456786') {
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#myModal_admin').modal('hide');
						$('#myForm_admin')[0].reset();
						$('.alert-danger').fadeOut();
						$('.alert-success').html('Added new user successfully.').fadeIn().delay(4000).fadeOut('slow');
						load_administrator_data();
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
					}
					else{
						$('.alert-danger').html('Invalid data entry.').fadeIn().delay(2000);
					}
				}
			});
		}
	});
  	$('#btnChangepassword_admin').click(function(){
  		var url = $('#updatepassword_admin').attr('action'); // action
		var data = $('#updatepassword_admin').serialize();
		// validation
		var password = $('input[name=password]');
		var passconf = $('input[name=passconfc]');		
		// password
		if (password.val() == '') {
			password.parent().parent().addClass('has-error');
			alert("Please enter new password !");
			return;
		}else{
			password.parent().parent().removeClass('has-error');
			
		}
		// confirm
		if (passconf.val() == '') {
			passconf.parent().parent().addClass('has-error');
			alert("Please enter new confirm password !");
			return;
		}else{
			passconf.parent().parent().removeClass('has-error');
		}		
		// password matching
		if (password.val() != passconf.val())
		{
			passconf.parent().parent().addClass('has-error');
			alert("Password not match !!");
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
					$('#passwordmodal_admin').modal('hide');
					$('#updatepassword_admin')[0].reset();
					$('.alert-success').html('Updated password successfully.').fadeIn().delay(4000).fadeOut('slow');
					retriveallusers();
				}
			},
		});
  	});	
  	// update page
  	function update_admin(data)
  	{
	  	var id = data;
	  	$.ajax({
	    	type:'ajax',
				method:'get',
				url:'<?php echo base_url() ?>Administrator/load_update_page',
				data:{id:id},
				async:false,
				dataType:'json',
	       		success:function(response){
		          $('#pagetitle').html(response.pagetitle);
		          $('#page-content').html(response.page);                  
		          // go to top page
		          $('html, body').animate({ scrollTop: 0 }, 0);
		           load_data_user(data);  
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
