<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Student Accounts
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Student Accounts</li>
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
	<li class="active"><a href="#stu" aria-controls="stu" role="tab" data-toggle="tab">Student Accounts</a></li>
	<li><a href="#new" id="btnAdd_student"  aria-controls="new" role="tab" data-toggle="tab">New</a></li>
	<li><a href="#import" aria-controls="import" role="tab" data-toggle="tab">Import Data</a></li>
	<li><a href="#query"  aria-controls="query" role="tab" data-toggle="tab">Query</a></li>
</ul>
<div class="tab-content">
	<!-- display students accounts -->
	<div role="tabpanel" class="tab-pane active" id="stu">
		<!-- displat data table -->
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Student Accounts
						</div>
						<div class="panel-body">
							<div id="student_table"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- new -->
	<div role="tabpanel" class="tab-pane" id="new">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<!--form  -->
					<form id="myForm_student" action="" method="POST">
						<!-- student information -->
						<div class="panel panel-default">
							<div class="panel-heading">
								Student Information
							</div>
							<div class="panel-body">
								<!-- arabic name -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Arabic Student Name</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="arabicName_add" required="required" placeholder="Enter arabic student name" >
										</div>
									</div>
								</div>	
								<!-- english name -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>English Student Name</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="englishName_add" required="required" placeholder="Enter english student name" >
										</div>
									</div>
								</div>
								<!-- Student number -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Student Number</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="studentID_add" required="required" placeholder="Enter student number" >
										</div>
									</div>
								</div>											
								<!-- Nationality -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Nationality</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="Nationality_add" required="required" placeholder="Enter nationality" >
										</div>
									</div>
								</div>
								<!-- Division -->
								<div class="form-group">
									<!-- division box -->
									<div class="row">
										<div class="col-lg-3">
											<label for="grade">Division</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" name="divisionID_add" id="division" required="">
												<option value="">Select Division</option>
											</select>
											<!-- end select box -->
										</div>
									</div>
								</div>
								<!-- Grade -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label for="grade">Grade</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" name="gradeID_add" id="grade" required="">
										<option value="">Select Grade</option>
									</select>
									<!-- end select box -->
										</div>
									</div>
								</div>
								<!-- room -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label for="grade">Class</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" name="roomID_add" id="room" disabled="" required="">
												<option value="">Select Class</option>
											</select>
											<!-- end select box -->
										</div>
									</div>
								</div>
								<!-- Student ID -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Student ID</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="studentIDcard_add" required="required" placeholder="Enter student ID" >
										</div>
									</div>
								</div>
								<!--statge  -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Stage</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" required="required" name="stage_add" >
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
								<!--student status  -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Student Status</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" required="required" name="student_status_add" >
							            <option value="">Select Student Status</option>
						             	<option value="New">New</option>
						            	<option value="Moved">Moved</option>
						            	<option value="Listener">Listener</option>
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
				                                <input class="form-control" type="date" name="start_school_add" required="required" min="2018-01-01" max="2030-12-31">
				                            </div>  
				                        </div>                        
				                    </div>
				                  </div>																	
								<!--second language  -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Second Language</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" required="required" name="secondLanguage_add" >
							            <option value="">Select Second language</option>
						             	<option value="French">French</option>
						            	<option value="German">German</option>
						          	</select>
										</div>
									</div>
								</div>										
								<!--Username  -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Username</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="username_add" required="required" placeholder="Enter username" >
										</div>
									</div>
								</div>
								<!-- Password -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Password</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="password" name="password_add" required="required">
										</div>
									</div>
								</div>
								<!--Confirm Password -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Confirm Password</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="password" name="passwordconfirm_add" required="required">
										</div>
									</div>
								</div>
								<!--Status  -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Status</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" required="required" name="status_add" >
							            <option value="">Select Status</option>
						             	<option value="Enable">Enable</option>
						            	<option value="Disable">Disable</option>
						          	</select>
										</div>
									</div>
								</div>										
							</div>
						</div>
						<!-- parents information -->
						<div class="panel panel-default">
							<div class="panel-heading">
								Parents Information
							</div>
							<div class="panel-body">
								<!-- mother name -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Mother Name</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="motherName_add" required="required" placeholder="Enter mother name" >
										</div>
									</div>
								</div>									
								<!-- Father ID -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Father ID</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="fatherIDcard_add" required="required" placeholder="Enter father ID" >
										</div>
									</div>
								</div>	
								<!-- Father job -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Fatehr Job</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="fatherJob_add" required="required" placeholder="Enter father job" >
										</div>
									</div>
								</div>
								<!-- Father mobile -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Father Mobile</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="fatherMobile_add" required="required" placeholder="Enter father mobile" >
										</div>
									</div>
								</div>								

								<!-- mother mobile -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Mother Mobile</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" name="motherMobile_add" required="required" placeholder="Enter mother mobile" >
										</div>
									</div>
								</div>										
							</div>
						</div>
						<!-- button -->
						<div class="row">

							<div class="col-lg-6">
										<!-- button -->
										<?php 
											$login_level_add ='';
											
											if ( 'Super Administrator' == $_SESSION['loginlevel']) 
											{
												$login_level_add ='<button type="button" id="btnSave_student" class="btn btn-success">Save</button>';
												
											}
											elseif ( 'Administrator' == $_SESSION['loginlevel']) 
											{
												$login_level_add ='<button type="button" id="btnSave_student" class="btn btn-success">Save</button>';
												
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
	<!-- import data -->
	<div role="tabpanel" class="tab-pane" id="import">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Import Data
							<div  style="float: right;">
							<a target="_blank" href="<?php echo base_url("public/upload/files/student.xlsx") ?>" href="#"><i style="margin-right: 5px;" class="fa fa-download"> </i> Download excel file</a>  
						</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form method="post" id="import_form" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-3">
												<label>Select Excel File</label>
											</div>
											<div class="col-lg-9">
								                <div class="form-group">
								                  <div class="btn btn-default btn-file">
								                    <i class="fa fa-paperclip"></i> Upload File
								                    <input type="file" name="file_name" id="file_name">                    
								                  </div>                 
								                </div>								 
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<br>
												 <input type="submit" name="import" value="Import" class="btn btn-success">
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
	</div>
	<!-- query -->
	<div role="tabpanel" class="tab-pane" id="query">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Select student by classroom
						</div>
						<div class="panel-body">
							<!-- query -->
							<div class="row">
								<!-- division -->		        			
			        			<div class="col-md-4">
									<select style="margin-bottom: 5px;" required="required" class="form-control" name="division_name_add" id="division_id_add">
										<option value="">Select Division</option>
									</select>
								</div>						        				
		            			<!-- grade -->
		    					<div class="col-md-4">
								 	<select style="margin-bottom: 5px;" required="required" class="form-control" name="grade_name_add" id="grade_id_add">
										<option value="">Select Grade</option>
									</select>												 	
								</div>						        	     			
		        				<!-- room -->
		   						<div class="col-md-4">
									<select style="margin-bottom: 5px;" required="required" class="form-control" name="room_name_add" id="room_id_add" disabled="" onchange="searchData_by_classroom();">
										<option value="">Select Classroom</option>
									</select>								 	
								</div>									
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				 <div class="panel-heading">
				 	Class Name List
				 </div>
				 <div class="panel-body">
        			<form action="" method="post"  id="student_form" name="frm">	  				        			
						<!-- button -->
						<?php 
							$login_level_delete ='';
							
							if ( 'Super Administrator' == $_SESSION['loginlevel']) 
							{
								$login_level_delete ='<a href="#" class="btn btn-danger" onclick="delete_student();">Delete Student</a>';
								
							}
							elseif ( 'Administrator' == $_SESSION['loginlevel']) 
							{
								$login_level_delete ='<a href="#" class="btn btn-danger" >Delete Student</a>';
								
							}
							else 
							{
								$login_level_delete ='<a href="#" class="btn btn-danger">Delete Student</a>';
								
							}
							echo $login_level_delete;
						 ?>		
						 <div id="student_query_table">
						 	<br>
						 	<div class="alert alert-info">No results.</div>
						 </div>					        				
        			</form>	 				 	
				 </div>
			</div>			
		</div>
	</div>			
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModal_student" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				Do you want to delete this student?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_student" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->

<!-- chnage password modal -->
<div class="modal fade" id="passwordmodal_student" role="dialog" tabindex="1">
	<div style="width: 700px;" class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form id="updatepassword_student" action="" method="POST">
					<input hidden="" type="text" name="stuID" hidden value="">
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>New password</label>
							</div>
							<div class="col-lg-9">
								<input class="form-control" type="password" name="password" required="required">
							</div>
						</div>
					</div>
					<!-- confirm -->					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>Confirm Password</label>
							</div>
							<div class="col-lg-9">
								<input class="form-control" type="password" name="passconfc" required="required">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnChangepassword_student" class="btn btn-success">Change</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	// load student users
	load_student_data(); 
	function load_student_data() {
		$.ajax({
			url:'<?php echo base_url() ?>Student/retrive_all_student/',
			method:'get',
			dataType:'json',
			success:function(data){
				$('#student_table').html('<table id ="stu_example1" class="table table-hover table-bordered">						<thead><tr><th>#</th><th>Student ID</th><th>Student Name</th><th>Division</th><th>Father Mobile</th><th>Mother Mobile</th><th><i class="fa fa-lock"></i></th><th><i class="fa fa-edit"></i></th></tr></thead> ' + data + '</table>');
  					
  					$('#stu_example1').DataTable({ 
                      "destroy": true, //use for reinitialize datatable
                   });
				$(".se-pre-con").fadeOut("slow");
			}
		});
	}	    
	function searchData_by_classroom() 
	{

		// get word search
		var division_id = $('select[name=division_name_add]');
		var grade_id = $('select[name=grade_name_add]');
		var room_id = $('select[name=room_name_add]');
		// vlidation
		if (division_id.val() == "") {alert("Please select  division!");return;}
		
		$.ajax({
			url:'<?php echo base_url() ?>Student/pagination_search_by_room/1',
			method:'get',
			data:{divi:division_id.val(),gra:grade_id.val(),rom:room_id.val()},
			dataType:'json',
			success:function(data){
				$('#student_query_table').html(data.student_query_table);
			}
		});
	}	
	// check all
	function checkall()
	{
		var totalelements = document.forms[2].elements.length;

		for(var i=0; i<totalelements; i++)
		{
			var elementName = document.forms[2].elements[i].name;

			if (elementName!=undefined & elementName.indexOf("stu")!= -1)
			{
				document.forms[2].elements[i].checked = document.frm.chk_all.checked;
			}
		}
	}	
	// btnAdd new 
	$('#btnAdd_student').click(function(){
		
		$('#myForm_student').attr('action','<?php echo base_url() ?>Student/addstudent');
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
	// btnSave new 
	$('#btnSave_student').click(function(){
		var url = $('#myForm_student').attr('action'); // action
		var data = $('#myForm_student').serialize();
	
		// validation
		var arabicName = $('input[name=arabicName_add]');
		var englishName = $('select[name=englishName_add]');
		var studentID = $('select[name=studentID_add]');
		var Nationality = $('select[name=Nationality_add]');
		var divisionID = $('input[name=divisionID_add]');
		var gradeID = $('input[name=gradeID_add]');
		var roomID = $('input[name=roomID_add]');
		var studentIDcard = $('input[name=studentIDcard_add]');
		var fatherIDcard = $('select[name=fatherIDcard_add]');
		var fatherJob = $('input[name=fatherJob_add]');
		var motherName = $('select[name=motherName_add]');
		var status = $('select[name=status_add]');
		var username = $('select[name=username_add]');
		var password = $('input[name=password_add]');
		var passconf = $('input[name=passwordconfirm_add]');
		var fatherMobile = $('input[name=fatherMobile_add]');
		var motherMobile = $('input[name=motherMobile_add]');
		var student_status = $('input[name=student_status_add]');
		var secondLanguage = $('select[name=secondLanguage]');

		var result = '';
		if (arabicName.val() == '') {
			arabicName.parent().parent().addClass('has-error');
			return;
		}else{
			arabicName.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (englishName.val() == '') {
			englishName.parent().parent().addClass('has-error');
			return;
		}else{
			englishName.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (studentID.val() == '') {
			studentID.parent().parent().addClass('has-error');
			return;
		}else{
			studentID.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (Nationality.val() == '') {
			Nationality.parent().parent().addClass('has-error');
			return;
		}else{
			Nationality.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (divisionID.val() == '') {
			divisionID.parent().parent().addClass('has-error');
			return;
		}else{
			divisionID.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (gradeID.val() == '') {
			gradeID.parent().parent().addClass('has-error');
			return;
		}else{
			gradeID.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (roomID.val() == '') {
			roomID.parent().parent().addClass('has-error');
			return;
		}else{
			roomID.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (studentIDcard.val() == '') {
			studentIDcard.parent().parent().addClass('has-error');
			return;
		}else{
			studentIDcard.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (fatherIDcard.val() == '') {
			fatherIDcard.parent().parent().addClass('has-error');
			return;
		}else{
			fatherIDcard.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (fatherJob.val() == '') {
			fatherJob.parent().parent().addClass('has-error');
			return;
		}else{
			fatherJob.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (motherName.val() == '') {
			motherName.parent().parent().addClass('has-error');
			return;
		}else{
			motherName.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (status.val() == '') {
			status.parent().parent().addClass('has-error');
			return;
		}else{
			status.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (username.val() == '') {
			username.parent().parent().addClass('has-error');
			return;
		}else{
			username.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (password.val() == '') {
			password.parent().parent().addClass('has-error');
			return;
		}else{
			password.parent().parent().removeClass('has-error');
			result +='*';
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
		else
		{
			$('.alert-danger').html('Password not match !!').fadeOut();
		}

		if (fatherMobile.val() == '') {
			fatherMobile.parent().parent().addClass('has-error');
			return;
		}else{
			fatherMobile.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (motherMobile.val() == '') {
			motherMobile.parent().parent().addClass('has-error');
			return;
		}else{
			motherMobile.parent().parent().removeClass('has-error');
			result +='*';
		}
		if (student_status.val() == '') {
			student_status.parent().parent().addClass('has-error');
			return;
		}else{
			student_status.parent().parent().removeClass('has-error');
			result +='*';
		}
		if (secondLanguage.val() == '') {
			secondLanguage.parent().parent().addClass('has-error');
			return;
		}else{
			secondLanguage.parent().parent().removeClass('has-error');
			result +='*';
		}
		
		if (result == '******************') {
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#myModal_student').modal('hide');
						$('#myForm_student')[0].reset();
						$('.alert-success').html('Added new student successfully.').fadeIn().delay(4000).fadeOut('slow');
						load_student_data();
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
					}
				},
				error:function(){
					
					$('#myModal_student').modal('hide');
					$('#myForm_student')[0].reset();
				}
			});

		}
	});	
  	// imprt data fron excel sheet
	$("#import_form").on("submit",function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>Excel_import/import_students",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cashe:false,
			processData:false,
			success: function(data)
			{
				$("#file").val('');
				$('.alert-success').html(data).fadeIn().delay(4000).fadeOut('slow');
				load_student_data();				
			}
		});
	});
	// whene press change password
  	function changestudentpassword(data)
	{
		var id = data;
		$('#passwordmodal_student').modal('show');
  		$('#passwordmodal_student').find('.modal-title').text('Change student password');
  		$('#updatepassword_student').attr('action','<?php echo base_url() ?>Student/updatestudentpassword');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Student/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=stuID]').val(data.stuID);
  			},
  			error:function(){
  				alert('Could not get data');
  			}
  		});
	}	
  	function update_student(data)
  	{
	  	var id = data;
	  	$.ajax({
	    	type:'ajax',
				method:'get',
				url:'<?php echo base_url() ?>Student/load_update_page',
				data:{id:id},
				async:false,
				dataType:'json',
	        success:function(response){
	          $('#pagetitle').html(response.pagetitle);
	          $('#page-content').html(response.page);                  
	          // go to top page
	          $('html, body').animate({ scrollTop: 0 }, 0);
	           load_data_student(data);  
	      }
	  	});
  	}  	
  	// for query
	// load room for query
	$('#division_id_add').on('change', function(){
		var gradeID = $('select[name=grade_name_add]').val();
		var divisionID = $(this).val();  //set country = country_id
		
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#room_id_add').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#room_id_add').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Student/get_room", // method that will get data
				type:"POST",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'gradeID' : gradeID, 'divisionID' : divisionID},
				dataType: 'json',
				success: function(data){
					$('#room_id_add').html(data);
				},
				error: function(){
					$('#room_id_add').prop('disabled', true); // set disable
				}
			});
		}
	});
	$('#grade_id_add').on('change', function(){
		var divisionID = $('select[name=division_name_add]').val();
		var gradeID = $(this).val();  //set country = country_id
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#room_id_add').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#room_id_add').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Student/get_room", // method that will get data
				type:"POST",
				data:{'gradeID_add' : gradeID, 'divisionID_add' : divisionID}, // gradeID_add,divisionID_add are post
				dataType: 'json',
				success: function(data){
					$('#room_id_add').html(data);
				},
				error: function(){
					$('#room_id_add').prop('disabled', true); // set disable
				}
			});
		}
	});	
	// load class
	$('#room_id_add').on('change',function(){
		var room_id = $(this).val();
		if (room_id == '') {
			$('#student_id_add').prop('disabled', true); // set disable
		}
		else{
			$('#student_id_add').prop('disabled', false);	// set enable
			// load students using ajax
			$.ajax({
				url:"<?php echo base_url() ?>Studentmarks/get_student", // method that will get data
				type:"get",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'room_id' : room_id},
				dataType: 'json',
				success: function(data){
					$('#student_id_add').html(data);
				},
				error: function(){
					$('#student_id_add').prop('disabled', true); // set disable
				}
			});			
		}
	})	  
	// delete 
	function delete_student()
	{
		var data = $('#student_form').serialize();
		if (data == "") {alert("No student selected!");return;}
  		$('#deleteModal_student').modal('show');
  		$('#deleteModal_student').find('.modal-title').text('Delete student');
  		$('#btnDelete_student').click(function(){
		$.ajax({
			type:'ajax',
			method:'post',
			url:'<?php echo base_url() ?>Student/Delete_more_one',
			data:data,
			async:false,
			dataType:'json',
			success:function(response){
				if (response.success) {
					$('.del').html('Deleted student account successfully.').fadeIn().delay(4000).fadeOut('slow');
					$('#deleteModal_student').modal('hide');		
					searchData_by_classroom();
				}
			}
		});
  		});
	}		

</script>
<!-- DataTables -->
<script src="<?php echo base_url();?>public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
