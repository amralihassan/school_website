<div class="animated fadeIn">
	<!-- title -->
	<div class="row">
		<div class="col-lg-6">
	        <h1 class="page-header">Job Vacancies</h1>
	    </div>
		<div class="col-lg-6">
			<button style=" float: right;margin-top: 40px;" type="button" class="btn btn-danger" onclick="autoload();">Back</button>
		</div>    
	</div>
	<!-- alerts -->
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
		</div>
		<div class="col-lg-12">
			<div class="alert alert-danger w3-panel w3-green" style="display: none;"></div>
		</div>
	</div>

	<!--Add tab -->
	<div class="row">
		<div class="col-lg-12">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">

				<li class="active"><a href="#jobV" aria-controls="jobV" role="tab" data-toggle="tab">Job Vacancies</a></li>				
				<li><a href="#sday"  id="btnAdd_student" aria-controls="sday" role="tab" data-toggle="tab">New Job Vacancy</a></li>
				

			</ul>
			<!-- tab panes -->
			<div class="tab-content">
				<!-- display -->
				<div role="tabpanel" class="tab-pane active" id="jobV">
					<br>
					<div class="row"> 
						<div class="col-lg-12">
							<!-- panel primary -->
							<div class="panel panel-primary">
								<div class="panel-heading">
						            Job Vacancies 
						        </div>
						        <!-- search -->
						        <div class="panel-body">
						        	
						        	<div class="row">
						        		<div class="col-lg-12">		        			
						        			<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon">
														<span class="glyphicon glyphicon-search"></span>
											        </span>
													<input class="form-control" type="search" name="txtSearch"  placeholder="Search by job title" id="id_of_textbox">
												</div>
											</div>
						        		</div>
						        	</div>
						        	<div class="row">
						        		<div class="form-group">
							        		<div class="col-lg-12">

							        			<form action="Job/Delete_more_one_vacancy" method="post"  id="job_form_vacancy" name="frm">

							        				<div class="form-group">	
													<!-- button -->
													<?php 
														$login_level_delete ='';
														
														if ( 'Super Administrator' == $_SESSION['loginlevel']) 
														{
															$login_level_delete ='<a href="#" class="btn btn-danger" onclick="delete_job_vacancy();">Delete</a>';
															
														}
														elseif ( 'Administrator' == $_SESSION['loginlevel']) 
														{
															$login_level_delete ='<a href="#" class="btn btn-danger" >Delete</a>';
															
														}
														else 
														{
															$login_level_delete ='<a href="#" class="btn btn-danger">Delete</a>';
															
														}
														echo $login_level_delete;
													 ?>							        				
								        			</div>		  				        			
													<div class="table table-responsive animated fadeInUp" id="vacancy_table"></div>
													<div align="center" id="vacancy_pagination_link"></div>	
							        			</form>
							        			
													    	
							        		</div>						        			
						        		</div>

						        	</div>
						        </div>
							</div>						
						</div>
					</div>	
				</div>				
				<!-- new form -->
				<div role="tabpanel" class="tab-pane" id="sday">
					<div class="row">
						<div class="col-lg-12">
							<br>
							<!--form  -->
							<form id="myForm_job" action="" method="POST">
								<!-- student information -->
								<div class="panel panel-primary">
									<div class="panel-heading">
										Job Information
									</div>
									<div class="panel-body">
										<!-- job title -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-3">
													<label>Job Title</label>
												</div>
												<div class="col-lg-9">
													<input class="form-control" type="text" name="job_title_add" required="required" placeholder="job title" >
												</div>
											</div>
										</div>	
										<!-- experience from -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-3">
													<label>Experience</label>
												</div>
												<div class="col-lg-1">
													<input class="form-control" type="text" name="experience_from_add" required="required" placeholder="0">
												</div>
												<div class="col-lg-1">
													<input class="form-control" type="text" name="experience_to_add" required="required" placeholder="1">
												</div>years.										
											</div>
										</div>
										<!-- salary -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-3">
													<label>Salary</label>
												</div>
												<div class="col-lg-9">
													<input class="form-control" type="text" name="salary_add" required="required" placeholder="you can leave salary empty" >
												</div>
											</div>
										</div>		
										<!-- Vacancies  -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-3">
													<label>Vacancy</label>
												</div>
												<div class="col-lg-9">
													<input class="form-control" type="text" name="Vacancies_add" required="required" placeholder="number of vacancies open" >
												</div>
											</div>
										</div>	
										<!-- about the job  -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-3">
													<label>About the job</label>
												</div>
												<div class="col-lg-9">
													<input class="form-control" type="text" name="about_add" required="required" placeholder="something about the job" >
												</div>
											</div>
										</div>																<!-- button -->
										<div class="row">
											<div class="col-lg-3">
												
											</div>
											<div class="col-lg-9">
														<!-- button -->
														<?php 
															$login_level_add ='';
															
															if ( 'Super Administrator' == $_SESSION['loginlevel']) 
															{
																$login_level_add ='<button type="button" id="btnSave_job" class="btn btn-success">Save</button>';
																
															}
															elseif ( 'Administrator' == $_SESSION['loginlevel']) 
															{
																$login_level_add ='<button type="button" id="btnSave_job" class="btn btn-success">Save</button>';
																
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
							</form>					
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
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>				
			<div class="modal-body">
				<form id="updateform" action="" method="post">
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>Job Title</label>								
							</div>
							<div class="col-lg-9">
								<input type="text" name="id" hidden="" value="">
								<input class="form-control" type="text" name="job_title_update" required="required">								
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label for="subject">Experience</label>								
							</div>
							<div class="col-lg-2">
								<input class="form-control" type="text" name="experience_from_update" required="required">								
							</div>
							<div class="col-lg-2">
								<input class="form-control" type="text" name="experience_to_update" required="required">								
							</div>							
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>Salary</label>								
							</div>
							<div class="col-lg-9">
								<input class="form-control" type="text" name="salary_update" required="required">
							</div>
						</div>						

						
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>Vacancy</label>
							</div>
							<div class="col-lg-9">
								<input class="form-control" type="text" name="Vacancies_update" required="required">
							</div>
						</div>				
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<!-- room box -->
								<label>About the job</label>
							</div>
							<div class="col-lg-9">
								<input class="form-control" type="text" name="about_update" required="required">
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
<!-- end update model -->

<!-- delete modal -->
<div class="modal fade" id="deleteModal_vacancy" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				Do you want to delete this record(s)?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_vacancy" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->

<script type="text/javascript">

	// when press update button
  	function update_vacancy(data)
	{
		var id = data;
		$('#updateModel').modal('show');
  		$('#updateModel').find('.modal-title').text('Update');
  		$('#updateform').attr('action','<?php echo base_url() ?>Job/updatevacancy');
		// load  data
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Job/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=id]').val(data.id);
  				$('input[name=job_title_update]').val(data.job_title);
  				$('input[name=experience_from_update]').val(data.experience_from);
  				$('input[name=experience_to_update]').val(data.experience_to);
  				$('input[name=salary_update]').val(data.salary);
  				$('input[name=Vacancies_update]').val(data.Vacancies);
  				$('input[name=about_update]').val(data.about);

  			}
  		});

	}	
	// update 
	$('#btnUpdate').click(function(){
		var url = $('#updateform').attr('action'); // action
		var data = $('#updateform').serialize();

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
					load_vacancy_data(1);
					}
			}
		});

	});	

    $('#file_name').on('change',function(e){
        var filename = e.target.value.split("\\").pop();
        $('#label_file').fadeIn();
        $('#label_file').text(filename);
    });	

	function checkall()
	{
		var totalelements = document.forms[0].elements.length;

		for(var i=0; i<totalelements; i++)
		{
			var elementName = document.forms[0].elements[i].name;

			if (elementName!=undefined & elementName.indexOf("id")!= -1)
			{
				document.forms[0].elements[i].checked = document.frm.chk_all.checked;
			}
		}
	}	

	$('#id_of_textbox').keyup(function(event){
		if (event.keyCode === 13) {
			searchData(1);
		}
	});

	// search
	function searchData(page) 
	{
		// get word search
		var searchtxt = $('input[name=txtSearch]');
		$.ajax({
			url:'<?php echo base_url() ?>Job/pagination_search_vacancy/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#vacancy_table').html(data.vacancy_table);
				$('#vacancy_pagination_link').html(data.vacancy_pagination_link);
			}
		});
	}

	// load job data
	function load_vacancy_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Job/pagination_vacancy/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#vacancy_table').html(data.vacancy_table);
				$('#vacancy_pagination_link').html(data.vacancy_pagination_link);
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_vacancy_data(page);
		 $('html, body').animate({ scrollTop: 0 }, 0);
	});	

	// btnSave new 
	$('#btnSave_job').click(function(){
		var url = '<?php echo base_url() ?>Job/addVacabcy'; // action
		var data = $('#myForm_job').serialize();	

		$.ajax({
			type:'ajax',
			method:'post',
			url:url,//action
			data:data,
			async:false,
			dataType:'json',
			success:function(response){
				if (response.success) {

					$('#myForm_job')[0].reset();
					$('.alert-success').html('Added new vacancy successfully.').fadeIn().delay(4000).fadeOut('slow');
					load_vacancy_data(1);
					// go to top page
              		$('html, body').animate({ scrollTop: 0 }, 0);
				}
			}
		});
	});

	// delete 
	function delete_job_vacancy()
	{
		var data = $('#job_form_vacancy').serialize();
		if (data == "") {alert("No record selected!");return;}
  		$('#deleteModal_vacancy').modal('show');
  		$('#deleteModal_vacancy').find('.modal-title').text('Delete');
  		$('#btnDelete_vacancy').click(function(){
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Job/Delete_more_one_vacancy',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('Deleted successfully.').fadeIn().delay(4000).fadeOut('slow');
						$('#deleteModal_vacancy').modal('hide');	
						load_vacancy_data(1);

					}
				}
			});
  		});
	}	


</script>