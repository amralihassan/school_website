
<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Parents Payments
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Parents Payments</li>
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
	<li class="active"><a href="#pay" aria-controls="pay" role="tab" data-toggle="tab">Payments</a></li>
	<li><a href="#new" id="btnAdd_payments"  aria-controls="new" role="tab" data-toggle="tab">New</a></li>
	<li><a href="#import" aria-controls="import" role="tab" data-toggle="tab">Import Data</a></li>
</ul>
<div class="tab-content">
	<!-- display payments -->
	<div role="tabpanel" class="tab-pane active" id="pay">
		
		<!-- displat data table -->
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Payments
						</div>
						<div class="panel-body">
							<div id="payments_table"></div>
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
					<div class="panel panel-default">
						<div class="panel-heading">
							New Payment
						</div>
						<div class="panel-body">
							<form method="post" action="" id="myform_add">
								<!-- date -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label>Date</label>
										</div>
										<div class="col-md-6">
							                <div class="input-group">
							                  <div class="input-group-addon">
							                    <i class="fa fa-calendar"></i>
							                  </div>
							                  <input class="form-control pull-right" type="date" name="date_action_add" required="required" min="2018-01-01" max="2030-12-31">
						                </div>	
										</div>
									</div>							
								</div>
								<!-- amount -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label>Amount</label>
										</div>
										<div class="col-md-6">
							              <div class="input-group">
							                <span class="input-group-addon">$</span>
							                <input type="text" class="form-control" name="amount_add" id="amount_id" required="required" placeholder="Enter Amount ex:2500">
							                <span class="input-group-addon">.00</span>
							              </div>									
										</div>
									</div>												 
								</div>
								<!-- Receipt -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label>Receipt No.</label>
										</div>
										<div class="col-md-6">
											<input class="form-control" type="text"  name="receipt_no_add" id="receipt_id_add" required="required" placeholder="Enter Receipt">
										</div>
									</div>												 
								</div>										
								<!-- division box -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label>Division</label>
										</div>
										<div class="col-md-6">
											<select required="required" class="form-control" name="division_name_add_lang" id="division_id_add_lang" required="required">
												<option value="">Select Division</option>
											</select>
										</div>
									</div>
								</div>
								<!-- grade -->
								<div class="form-group">
									<div class="row">
										 <div class="col-md-3">
										 	<label>Grade</label>
										 </div>
										 <div class="col-md-6">
										 	<select required="required" class="form-control" name="grade_name_add_lang" id="grade_id_add_lang" required="required">
												<option value="">Select Grade</option>
											</select>												 	
										 </div>
									</div>
								</div>
								<!-- room -->
								<div class="form-group">
									<div class="row">
										 <div class="col-md-3">
										 	<label>Classroom</label>
										 </div>
										 <div class="col-md-6">
											<select required="required" class="form-control" name="room_name_add_lang" id="room_id_add_lang" disabled="" required="required">
												<option value="">Select Classroom</option>
											</select>								 	
										 </div>
									</div>
								</div>
								<!-- student name -->
								<div class="form-group">
									<div class="row">
										 <div class="col-md-3">
										 	<label>Student Name</label>
										 </div>
										 <div class="col-md-6">
											<select required="required" class="form-control" name="student_ID_add" id="student_id_add_lang" disabled="" required="required">
												<option value="">Select Student</option>
											</select>								 	
										 </div>
									</div>
								</div>											
								<!-- for -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label>For</label>
										</div>
										<div class="col-md-6">
											<select  class="form-control" name="reason_add" id="reason_id_add" required="required">
												<option value="">Type Of Fees</option>
												<option value="School Fees">School Fees</option>
												<option value="Bus Fees">Bus Fees</option>
											</select>													
										</div>

									</div>												 
								</div>	
							</form>		
							<!-- button -->
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
									<!-- button -->
									<?php 
										$login_level_add ='';
										
										if ( 'Super Administrator' == $_SESSION['loginlevel']) 
										{
											$login_level_add ='<button type="button" id="btnSave" class="btn btn-success">Save</button>';
											
										}
										elseif ( 'Administrator' == $_SESSION['loginlevel']) 
										{
											$login_level_add ='<button type="button" id="btnSave" class="btn btn-success">Save</button>';
											
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
								<a target="_blank" href="<?php echo base_url("public/upload/files/payment.xlsx") ?>" style="color: white;" href="#"><i style=" color: white; margin-right: 5px;" class="fa fa-download"> </i> Download excel file</a>  
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<form method="post" id="import_form" enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-3">
												<label>Select Excel File</label>
											</div>
											<div class="col-md-6">
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
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModal" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">			
			<div class="modal-body">
				Do you want to delete this receipt?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- update-->
<div class="modal fade" id="updateModel_payment" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form method="post" action="" id="updateform_payment">
					<input type="text" name="id_update" hidden="">
					<!-- date -->
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>Date</label>
							</div>
							<div class="col-lg-9">
								<input class="form-control" type="date" name="date_action_update" required="required" min="2018-01-01" max="2030-12-31">
							</div>

						</div>							
					</div>
					<!-- amount -->
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>Amount</label>
							</div>
							<div class="col-lg-9">
								<input class="form-control" type="text" name="amount_update" required="required" placeholder="Enter Amount">
							</div>
						</div>												 
					</div>
					<!-- Receipt -->
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>Receipt No.</label>
							</div>
							<div class="col-lg-9">
								<input class="form-control" type="text"  name="receipt_no_update" id="receipt_id_add" required="required" placeholder="Enter Receipt">
							</div>
						</div>												 
					</div>																	
					<!-- for -->
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<label>For</label>
							</div>
							<div class="col-lg-9">
								<select  class="form-control" name="reason_update" id="reason_id_update" required="required">
									<option value="">Type Of Fees</option>
									<option value="School Fees">School Fees</option>
									<option value="Bus Fees">Bus Fees</option>
								</select>													
							</div>

						</div>												 
					</div>	
								
				</form>	
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate_payment" class="btn btn-success">Save changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end update-->	

<!-- end update-->


<script type="text/javascript">
	// load student users
	
	load_payments_data();
	function load_payments_data() {
		
		$.ajax({
			url:'<?php echo base_url() ?>Payments/retrive_all_payments/',
			method:'get',
			dataType:'json',
			success:function(data){
				$('#payments_table').html('<table id ="payment_dataTable" class="table table-hover table-bordered"><thead><tr><th>#</th><th>Student Name</th><th>Date</th><th>Receipt No.</th><th>Amount</th><th>For</th><th><i class="fa fa-edit"></i></th><th><i class="fa fa-trash"></i></th></tr></thead> ' + data + '</table>');
  					$('#payment_dataTable').DataTable({ 
                      "destroy": true, //use for reinitialize datatable
                   });
				$(".se-pre-con").fadeOut("slow");
			}
		});		
	}		
	//update
	function update_payment(id)
	{
		var id = id;
		$('#updateModel_payment').modal('show');
  		$('#updateModel_payment').find('.modal-title').text('Update payment');
  		$('#updateform_payment').attr('action','<?php echo base_url() ?>Payments/updatepayment');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Payments/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=id_update]').val(data.id);
  				$('input[name=amount_update]').val(data.amount);
  				$('input[name=date_action_update]').val(data.date_action);
  				$('input[name=receipt_no_update]').val(data.receipt_no);
  				$('Select[name=reason_update]').val(data.reason);
  				
  			}
  		});
	}	
	// update
  	$('#btnUpdate_payment').click(function(){
		var url = $('#updateform_payment').attr('action'); // action
		var data = $('#updateform_payment').serialize();

		$.ajax({
			type:'ajax',
			method:'post',
			url:url,
			data:data,
			async:false,
			dataType:'json',
			success:function(response){
				if (response.success) {
					$('#updateModel_payment').modal('hide');
					$('#updateform_payment')[0].reset();
					$('.alert-success').html('Updated payment successfully.').fadeIn().delay(4000).fadeOut('slow');
					load_payments_data(1);
				}else{
				}
			},
			error:function(){
				alert('Could not update account.');
					$('#updateModel_subject').modal('hide');
			}
		});

  	});	
	// add payments
	$('#btnAdd_payments').click(function(){	
		$('#myform_add').attr('action','<?php echo base_url() ?>Payments/addpayments');

		// load division
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Studentmarks/retrivedivision',
			dataType:'json',
			success:function(data)
			{
				$('#division_id_add_lang').html(data);
			}
		});
		// load grades
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Studentmarks/retrivegrade',
			dataType:'json',
			success:function(data)
			{
				$('#grade_id_add_lang').html(data);
			}
		});
	});	
	// load room for adding
	$('#division_id_add_lang').on('change', function(){
		var gradeID = $('select[name=grade_name_add_lang]').val();
		var divisionID = $(this).val();  //set country = country_id
		
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#room_id_add_lang').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#room_id_add_lang').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Student/get_room", // method that will get data
				type:"POST",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'gradeID' : gradeID, 'divisionID' : divisionID},
				dataType: 'json',
				success: function(data){
					$('#room_id_add_lang').html(data);
				},
				error: function(){
					$('#room_id_add_lang').prop('disabled', true); // set disable
				}
			});
		}
	});
	$('#grade_id_add_lang').on('change', function(){
		var divisionID = $('select[name=division_name_add_lang]').val();
		var gradeID = $(this).val();  //set country = country_id
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#room_id_add_lang').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#room_id_add_lang').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Student/get_room", // method that will get data
				type:"POST",
				data:{'gradeID_add' : gradeID, 'divisionID_add' : divisionID}, // gradeID_add,divisionID_add are post
				dataType: 'json',
				success: function(data){
					$('#room_id_add_lang').html(data);
				},
				error: function(){
					$('#room_id_add_lang').prop('disabled', true); // set disable
				}
			});
		}
	});	
	// load students
	$('#room_id_add_lang').on('change',function(){
		var room_id = $(this).val();
		if (room_id == '') {
			$('#student_id_add_lang').prop('disabled', true); // set disable
		}
		else{
			$('#student_id_add_lang').prop('disabled', false);	// set enable
			// load students using ajax
			$.ajax({
				url:"<?php echo base_url() ?>Studentmarks/get_student", // method that will get data
				type:"get",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'room_id' : room_id},
				dataType: 'json',
				success: function(data){
					$('#student_id_add_lang').html(data);
				},
				error: function(){
					$('#student_id_add_lang').prop('disabled', true); // set disable
				}
			});			
		}
	})	
	// btnSave 
	$('#btnSave').click(function(){
		var url = $('#myform_add').attr('action'); // action
		var data = $('#myform_add').serialize();
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#myform_add')[0].reset();
						$('.alert-success').html('Added successfully.').fadeIn().delay(2000).fadeOut('slow');
						load_payments_data();
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
					}

				}
			});		
	});		

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })  
	// delete
	function delete_payment(data)
	{
		var id = data;
  		$('#deleteModal').modal('show');
  		$('#btnDelete').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Payments/deletepayment',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal').modal('hide');
  						$('.alert-success').html('Deleted Payment successfully.').fadeIn().delay(4000).fadeOut('slow');
  						load_payments_data();
  					}
  				}
  			});
  		});
	}    

	// Numeric only control handler
	jQuery.fn.ForceNumericOnly =
	function()
	{
	    return this.each(function()
	    {
	        $(this).keydown(function(e)
	        {
	            var key = e.charCode || e.keyCode || 0;
	            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
	            // home, end, period, and numpad decimal
	            return (
	                key == 8 || 
	                key == 9 ||
	                key == 13 ||
	                key == 46 ||
	                key == 110 ||
	                key == 190 ||
	                (key >= 35 && key <= 40) ||
	                (key >= 48 && key <= 57) ||
	                (key >= 96 && key <= 105));
	        });
	    });
	};	
	$("#amount_id").ForceNumericOnly();										    		
	$("#receipt_id_add").ForceNumericOnly();	    
</script>
<!-- DataTables -->
<script src="<?php echo base_url();?>public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


