<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Grades
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Grades</li>
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
				<li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Grades</a></li>
				<li><a href="#sday"  id="btnAdd_grade" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
			</ul>
			<!-- tab panes -->
			<div class="tab-content">
				<!-- display -->
				<div role="tabpanel" class="tab-pane active" id="fday">
					<div class="row box-body">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									Grades
								</div>
								<div class="panel-body">
									<div class="table table-responsive" id="grade_table"></div>
									<div align="center" id="grade_pagination_link"></div>									
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
									Grades
								</div>
								<div class="panel-body">
									<!--form  -->
									<form id="myForm_grade" action="" method="post">
										<div class="form-group">
											<div class="row box-body">
												<div class="col-md-3">
													<label>Grade</label>
												</div>
												<div class="col-md-6">
													<input class="form-control" type="text" name="gradeName"  placeholder="Enter grade name" required="required">
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
															$login_level_add ='<button type="button" id="btnSave_grade" class="btn btn-success">Save</button>';
															
														}
														elseif ( 'Administrator' == $_SESSION['loginlevel']) 
														{
															$login_level_add ='<button type="button" id="btnSave_grade" class="btn btn-success">Save</button>';
															
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
				<br>
			</div>
		</div>
	</div>	
</div>

<!-- update-->
<div class="modal fade" id="updateModel_grade" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form id="updateform_grade" action="" method="POST">
					<div class="form-group">
						<label>Grade</label>
						<input type="text" name="gradeID" hidden="" value="">
						<input class="form-control" type="text" name="gradeName_update" required="required" placeholder="Enter grade name" >
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate_grade" class="btn btn-success">Save changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end update-->

<!-- delete modal -->
<div class="modal fade" id="deleteModal_grade" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				Do you want to delete this grade?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_grade" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->
<script type="text/javascript">
	load_grade_data(1);

	// load divisions
  	function load_grade_data(page) {
	$.ajax({
		url:'<?php echo base_url() ?>Grade/pagination/' + page,
		method:'get',
		dataType:'json',
		success:function(data){
			$('#grade_table').html(data.grade_table);
			$('#grade_pagination_link').html(data.grade_pagination_link);
			$(".se-pre-con").fadeOut("slow");	
		}
	});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_grade_data(page);
	});	
	// delete
	function delete_grade(data)
	{
		var id = data;
  		$('#deleteModal_grade').modal('show');
  		$('#deleteModal_grade').find('.modal-title').text('Delete grade');
  		$('#btnDelete_grade').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Grade/deletegrade',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal_grade').modal('hide');
  						$('.alert-success').html('Deleted grade successfully.').fadeIn().delay(4000).fadeOut('slow');
  						load_grade_data(1);
  					}
  				}
  			});
  		});
	}
	// btnAdd new 
	$('#btnAdd_grade').click(function(){

		// add attribute
		$('#myForm_grade').attr('action','<?php echo base_url() ?>Grade/addgrade');
	});
	// btnSave new 
	$('#btnSave_grade').click(function(){
		var url = $('#myForm_grade').attr('action'); // action
		var data = $('#myForm_grade').serialize();
	
		// validation
		var grade = $('input[name=gradeName]');
		var result = '';
		
		if (grade.val() == '') {
			grade.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please enter grade name').fadeIn().delay(4000).fadeOut('slow');
			return;
		}else{
			grade.parent().parent().removeClass('has-error');
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
						
						$('#myForm_grade')[0].reset();
						$('.alert-success').html('Added new grade successfully.').fadeIn().delay(4000).fadeOut('slow');
						load_grade_data(1);
					}
				}
			});

		}
	});
	function update_grade(data)
	{
		var id = data;
		$('#updateModel_grade').modal('show');
  		$('#updateModel_grade').find('.modal-title').text('Update grade');
  		$('#updateform_grade').attr('action','<?php echo base_url() ?>Grade/updategrade');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Grade/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=gradeID]').val(data.gradeID);
  				$('input[name=gradeName_update]').val(data.gradeName);
  			}
  		});
	}
	// update
  	$('#btnUpdate_grade').click(function(){
		var url = $('#updateform_grade').attr('action'); // action
		var data = $('#updateform_grade').serialize();
		// validation
		var grade = $('input[name=gradeName_update]');
		var result = '';

		if (grade.val() == '') {
			grade.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please enter grade name').fadeIn().delay(4000).fadeOut('slow');
			return;
		}else{
			grade.parent().parent().removeClass('has-error');
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
						$('#updateModel_grade').modal('hide');
						$('#updateform_grade')[0].reset();
						$('.alert-success').html('Updated grade successfully.').fadeIn().delay(4000).fadeOut('slow');
						load_grade_data(1);
					}
				}
			});
		}
  	});

</script>
