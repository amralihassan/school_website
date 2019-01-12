<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Academic Year
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Academic Year</li>
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
				<li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Academic year</a></li>
				<li><a href="#sday"  id="btnAdd_academic" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
			</ul>
			<!-- tab panes -->
			<div class="tab-content">
				<!-- display -->
				<div role="tabpanel" class="tab-pane active" id="fday">
		        	<!-- search -->
		        	<div class="box-body">
		        		<div class="row">
			        		<div class="col-md-12">
			        			<div class="panel panel-default">
			        				 <div class="panel-heading">
			        				 	Academic Year
			        				 </div>
			        				 <div class="panel-body">
											<div class="table table-responsive" id="academic_table"></div>
											<div align="center" id="academic_pagination_link"></div>				        
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
									New academic Year
								</div>
								<div class="panel-body">
									<!--form  -->
									<form id="myForm_academic" action="" method="post">				
										<!-- academic year -->
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Academic year</label>
												</div>
												<div class="col-md-6">
													<input class="form-control" type="text" name="acadYear" required="required" placeholder="Enter academic year like 2016 - 2017" >
												</div>
											</div>
										</div>	
										<!-- button -->
										<div class="form-group"> 
											<div class="row">
												<div class="col-md-12">
													<!-- button -->
													<?php 
														$login_level_add ='';
														
														if ( 'Super Administrator' == $_SESSION['loginlevel']) 
														{
															$login_level_add ='<button type="button" id="btnSave_academic" class="btn btn-success">Save</button>';
															
														}
														elseif ( 'Administrator' == $_SESSION['loginlevel']) 
														{
															$login_level_add ='<button type="button" id="btnSave_academic" class="btn btn-success">Save</button>';
															
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
				<br>
			</div>
		</div>
	</div>	
</div>


<!-- update-->
<div class="modal fade" id="updateModel_academic" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form id="updateform_academic" action="" method="POST">
					<div class="form-group">
						<label>Academic year</label>
						<input type="text" name="yearID" hidden="" value="">
						<input class="form-control" type="text" name="acadYear_update" required="required" placeholder="Enter academic year like 2016 - 2017" >
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate_academic" class="btn btn-success">Save changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end update-->

<!-- delete modal -->
<div class="modal fade" id="deleteModal_academic" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				Do you want to delete this academic year?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_academic" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->


<script type="text/javascript">	
	// load data
	load_academiyear_data(1);
	function load_academiyear_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Academicyear/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#academic_table').html(data.academic_table);
				$('#pagination_link').html(data.pagination_link);
				$(".se-pre-con").fadeOut("slow");	
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_academiyear_data(page);
	});
	// delete
	function delete_academicyear(data)
	{
		var id = data;
  		$('#deleteModal_academic').modal('show');
  		$('#deleteModal_academic').find('.modal-title').text('Delete academic year');
  		$('#btnDelete_academic').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Academicyear/deleteacademicyear',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal_academic').modal('hide');
  						$('.alert-success').html('Deleted academic year successfully.').fadeIn().delay(4000).fadeOut('slow');
  						load_academiyear_data(1);
  					}
  				},
  				error:function(){
  					alert('Error in deleteing.')
  				}
  			});
  		});
	}
	// btnAdd new 
	$('#btnAdd_academic').click(function(){

		// show add modal
		$('#myModal_academic').modal('show');
		$('#myModal_academic').find('.modal-title').text('Add New academic year'); // rename modal
		// add attribute
		$('#myForm_academic').attr('action','<?php echo base_url() ?>Academicyear/addacademic');
	});
	// btnSave new 
	$('#btnSave_academic').click(function(){
		var url = $('#myForm_academic').attr('action'); // action
		var data = $('#myForm_academic').serialize();
	
		// validation
		var acadYear = $('input[name=acadYear]');
		var result = '';

		if (acadYear.val() == '') {
			acadYear.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please enter academic year.').fadeIn().delay(4000).fadeOut('slow');			
			return;
		}else{
			acadYear.parent().parent().removeClass('has-error');
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
						$('#myModal_academic').modal('hide');
						$('#myForm_academic')[0].reset();
						$('.alert-success').html('Added new academic year successfully.').fadeIn().delay(4000).fadeOut('slow');
						load_academiyear_data(1);

					}
				},
				error:function(){
					alert('Could not save in database.')
				}
			});

		}
	});
	function update_academicyear(data)
	{
		var id = data;
		$('#updateModel_academic').modal('show');
  		$('#updateModel_academic').find('.modal-title').text('Update academic year');
  		$('#updateform_academic').attr('action','<?php echo base_url() ?>Academicyear/updateacademicyear');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Academicyear/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=yearID]').val(data.yearID);
  				$('input[name=acadYear_update]').val(data.acadYear);
  			},
  			error:function(){
  				alert('Could not get data');
  			}
  		});
	}
	// update
  	$('#btnUpdate_academic').click(function(){
		var url = $('#updateform_academic').attr('action'); // action
		var data = $('#updateform_academic').serialize();
		// validation
		var acadYear = $('input[name=acadYear_update]');
		var result = '';

		if (acadYear.val() == '') {
			acadYear.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please enter academic year.').fadeIn().delay(4000).fadeOut('slow');	
			return;
		}else{
			acadYear.parent().parent().removeClass('has-error');
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
						$('#updateModel_academic').modal('hide');
						$('#updateform_academic')[0].reset();
						$('.alert-success').html('Updated academic year successfully.').fadeIn().delay(4000).fadeOut('slow');
						load_academiyear_data(1);

					}
				}
			});
		}
  	});

</script>