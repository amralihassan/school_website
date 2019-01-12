<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Subject
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Subject</li>
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
				<li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Subjects</a></li>
				<li><a href="#sday"  id="btnAdd_subject" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
			</ul>
			<!-- tab panes -->
			<div class="tab-content">
				<!-- display -->
				<div role="tabpanel" class="tab-pane active" id="fday">
		        	<!-- search -->
		        	<div class="row box-body">
		        		<div class="col-md-12">
		        			<div class="panel panel-default">
		        				<div class="panel-heading">
		        					School Subjects
		        				</div>
		        				<div class="panel-body">
		        					<div class="row">
		        						<div class="col-md-12">
						        			<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span>
											                                  </span>
													<input class="form-control" type="search" name="txtSearch_subject"  placeholder="Search by name" id="id_of_textbox_fees">
												</div>
											</div>		        							
		        						</div>
		        					</div>
						        	<div class="row">
						        		<div class="col-md-12">
											<div class="table table-responsive" id="subject_table"></div>
											<div align="center" id="subject_pagination_link"></div>		       	
						        		</div>
						        	</div>		        					
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
									New Subject
								</div>
								<div class="panel-body">
									<!--form  -->
									<form id="myForm_subject" action="" method="post">
										<div class="form-group">
											<br>
											<div class="row">
												<div class="col-md-3">
													<label>Subject</label>
												</div>
												<div class="col-md-6">
													<input class="form-control" type="text" name="subjectName" required="required" placeholder="Enter subject name" >
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12">
															<!-- button -->
															<?php 
																$login_level_add ='';
																
																if ( 'Super Administrator' == $_SESSION['loginlevel']) 
																{
																	$login_level_add ='<button type="button" id="btnSave_subject" class="btn btn-success">Save</button>';
																	
																}
																elseif ( 'Administrator' == $_SESSION['loginlevel']) 
																{
																	$login_level_add ='<button type="button" id="btnSave_subject" class="btn btn-success">Save</button>';
																	
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
									</form>										
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>	
</div>

<!-- update-->
<div class="modal fade" id="updateModel_subject" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form id="updateform_subject" action="" method="POST">
					<div class="form-group">
						<label>Subject</label>
						<input type="text" name="subjectID" hidden="" value="">
						<input class="form-control" type="text" name="subjectName_update" required="required" placeholder="Enter subject name" >
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate_subject" class="btn btn-success">Save changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end update-->

<!-- delete modal -->
<div class="modal fade" id="deleteModal_subject" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				Do you want to delete this subject?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_subject" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->
<script type="text/javascript">
	  $( document ).ready(function() {$(".se-pre-con").fadeOut("slow");}); 
	// search press enter
	$('#id_of_textbox_fees').keyup(function(event){
		if (event.keyCode === 13) {
			searchData(1);
		}
	});

	// search
	function searchData(page) 
	{
		// get word search
		var searchtxt = $('input[name=txtSearch_subject]');
		$.ajax({
			url:'<?php echo base_url() ?>Subject/pagination_search/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#subject_table').html(data.subject_table);
				$('#subject_pagination_link').html(data.subject_pagination_link);
			}
		});
	}
		$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		searchData(page);
	});

	// delete
	function delete_subject(data)
	{
		var id = data;
  		$('#deleteModal_subject').modal('show');
  		$('#deleteModal_subject').find('.modal-title').text('Delete subject');
  		$('#btnDelete_subject').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Subject/deletesubject',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal_subject').modal('hide');
  						$('.alert-success').html('Deleted subject successfully.').fadeIn().delay(4000).fadeOut('slow');
  						searchData(1);
  					}
  				}
  			});
  		});
	}
	load_subject_data(1);
	// load Subjects
	function load_subject_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Subject/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#subject_table').html(data.subject_table);
				$('#subject_pagination_link').html(data.subject_pagination_link);
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_subject_data(page);
	});
	// btnAdd new 
	$('#btnAdd_subject').click(function(){
		// add attribute
		$('#myForm_subject').attr('action','<?php echo base_url() ?>Subject/addsubject');
	});
	// btnSave new 
	$('#btnSave_subject').click(function(){
		var url = $('#myForm_subject').attr('action'); // action
		var data = $('#myForm_subject').serialize();
	
		// validation
		var subject = $('input[name=subjectName]');
		var result = '';

		if (subject.val() == '') {
			subject.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please enter subject name.').fadeIn().delay(4000).fadeOut('slow');
			return;
		}else{
			subject.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (result == '1') {
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#myModal_subject').modal('hide');
						$('#myForm_subject')[0].reset();
						$('.alert-success').html('Added new subject successfully.').fadeIn().delay(4000).fadeOut('slow');
						load_subject_data(1);
					}
				}
			});

		}
	});
	function update_subject(data)
	{
		var id = data;
		$('#updateModel_subject').modal('show');
  		$('#updateModel_subject').find('.modal-title').text('Update subject');
  		$('#updateform_subject').attr('action','<?php echo base_url() ?>Subject/updatesubject');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Subject/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=subjectID]').val(data.subjectID);
  				$('input[name=subjectName_update]').val(data.subjectName);
  			}
  		});
	}
	// update
  	$('#btnUpdate_subject').click(function(){
		var url = $('#updateform_subject').attr('action'); // action
		var data = $('#updateform_subject').serialize();
		// validation
		var subject = $('input[name=subjectName_update]');
		var result = '';

		if (subject.val() == '') {
			subject.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please enter subject name.').fadeIn().delay(4000).fadeOut('slow');
			return;
		}else{
			subject.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (result == '1') 
		{
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#updateModel_subject').modal('hide');
						$('#updateform_subject')[0].reset();
						$('.alert-success').html('Updated subject successfully.').fadeIn().delay(4000).fadeOut('slow');
						searchData(1);
					}
				}
			});
		}
  	});

</script>
