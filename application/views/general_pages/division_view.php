<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Divisions
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Divisions</li>
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
				<li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Divisions</a></li>
				<li><a href="#sday"  id="btnAdd_division" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
			</ul>
			<!-- tab panes -->
			<div class="tab-content">
				<!-- display -->
				<div role="tabpanel" class="tab-pane active" id="fday">
					<div class="row box-body">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									Divisions
								</div>
								<div class="panel-body">
									<div class="table table-responsive" id="division_table"></div>
									<div align="center" id="division_pagination_link"></div>								
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
									New Division
								</div>
								<div class="panel-body">
										<!--form  -->
									<form id="myForm_division" action="" method="post">
										<div class="form-group">
											<br>
											<div class="row">
												<div class="col-md-3">
													<label>Division</label>
												</div>
												<div class="col-md-6">
													<input class="form-control" type="text" name="divisionName" placeholder="Enter division name" required="required">
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
																	$login_level_add ='<button type="button" id="btnSave_division" class="btn btn-success">Save</button>';
																	
																}
																elseif ( 'Administrator' == $_SESSION['loginlevel']) 
																{
																	$login_level_add ='<button type="button" id="btnSave_division" class="btn btn-success">Save</button>';
																	
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
<div class="modal fade" id="updateModel_division" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form id="updateform_division" action="" method="POST">
					<div class="form-group">
						<label>Division</label>
						<input type="text" name="divisionID" hidden="" value="">
						<input class="form-control" type="text" name="divisionName_update" required="required" placeholder="Enter division name" >
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate_division" class="btn btn-success">Save changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end update-->

<!-- delete modal -->
<div class="modal fade" id="deleteModal_division" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				Do you want to delete this division?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_division" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->
<script type="text/javascript">
	// delete
	function delete_division(data)
	{
		var id = data;
  		$('#deleteModal_division').modal('show');
  		$('#deleteModal_division').find('.modal-title').text('Delete division');
  		$('#btnDelete_division').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Division/deletedivision',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal_division').modal('hide');
  						$('.alert-success').html('Deleted division successfully.').fadeIn().delay(4000).fadeOut('slow');
  						load_division_data(1);
  					}
  				},
  				error:function(){
  					alert('Error in deleteing.')
  				}
  			});
  		});
	}
	load_division_data(1);
	// load divisions
	function load_division_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Division/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#division_table').html(data.division_table);
				$(".se-pre-con").fadeOut("slow");	
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_division_data(page);
	});
	// btnAdd new 
	$('#btnAdd_division').click(function(){
		// add attribute
		$('#myForm_division').attr('action','<?php echo base_url() ?>Division/adddivision');
	});
	// btnSave new 
	$('#btnSave_division').click(function(){
		var url = $('#myForm_division').attr('action'); // action
		var data = $('#myForm_division').serialize();
	
		// validation
		var division = $('input[name=divisionName]');
		var result = '';

		if (division.val() == '') {
			division.parent().parent().addClass('has-error');
			$('.alert-danger').html('Plese enter division name').fadeIn().delay(4000).fadeOut('slow');
			return;
		}else{
			division.parent().parent().removeClass('has-error');
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
						$('#myModal_division').modal('hide');
						$('#myForm_division')[0].reset();
						$('.alert-success').html('Added new division successfully.').fadeIn().delay(4000).fadeOut('slow');
						load_division_data(1);

					}
				},
				error:function(){
					alert('Could not save in database.')
				}
			});

		}
	});
	function update_division(data)
	{
		var id = data;
		$('#updateModel_division').modal('show');
  		$('#updateModel_division').find('.modal-title').text('Update division');
  		$('#updateform_division').attr('action','<?php echo base_url() ?>Division/updatedivision');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Division/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=divisionID]').val(data.divisionID);
  				$('input[name=divisionName_update]').val(data.divisionName);
  				
  			},
  			error:function(){
  				alert('Could not get data');
  			}
  		});
	}
	// update
  	$('#btnUpdate_division').click(function(){
  		
		var url = $('#updateform_division').attr('action'); // action
		var data = $('#updateform_division').serialize();
		// validation
		var division = $('input[name=divisionName_update]');
		var result = '';

		if (division.val() == '') {
			division.parent().parent().addClass('has-error');
			$('.alert-danger').html('Plese enter division name').fadeIn().delay(4000).fadeOut('slow');
			return;
		}else{
			division.parent().parent().removeClass('has-error');
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
						
						$('#updateModel_division').modal('hide');
						$('#updateform_division')[0].reset();
						$('.alert-success').html('Updated division successfully.').fadeIn().delay(4000).fadeOut('slow');
						load_division_data(1);
					}else{
					
					}
				},
				error:function(){
					alert('Could not update account.');
						$('#updateModel_division').modal('hide');
				}
			});
		}
  	});

</script>
