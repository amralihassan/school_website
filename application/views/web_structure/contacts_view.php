<div class="animated fadeIn" style="margin-top: 35px;">

	<!-- alert -->
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
		</div>
	</div>
	<!-- search -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
		            Contacts Messages
					<div  style="float: right;">
						<a onclick="autoload();" href="#" style="color: white;" href="#"><i style=" color: white;" class="fa fa-times"> </i> </a>
					</div>			            
		        </div>
		        <div class="panel-body" style="height: 900px;max-height: 1500px;">
		        	<!-- search -->
		        	<div class="row">
		        		<div class="col-lg-12" >
		        			<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span>
							                                  </span>
									<input class="form-control" type="search" name="txtSearch_contact"  placeholder="Search by name, email" id="id_of_textbox_contact">
								</div>
							</div>
		        		</div>
		        	</div>
		        	<div class="row">
		        		<div class="col-lg-12">

		        			<form action="Job/Delete_more_one_contact" method="post"  id="form_contact" name="frm">

		        				<div class="form-group">	
								<!-- button -->
								<?php 
									$login_level_delete ='';
									
									if ( 'Super Administrator' == $_SESSION['loginlevel']) 
									{
										$login_level_delete ='<a href="#" class="btn btn-danger" onclick="delete_contact();">Delete</a>';
										
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
							<div class="col-lg-5">
								<div style="height: 900px;max-height: 1500px;" class="table table-responsive" id="contacts_table"></div>
								<div align="center" id="contacts_pagination_link"></div>
							</div>
		        			</form>								


							<div class="col-lg-7">
								<div id="showMessage" style="border-left:5px solid #ded2d2;padding-right: 15px; height: 800px;">
										<form id="updateform" action="" method="post" style="margin-left: 7px;">
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<label id="name" style="color: #45709b; font-size: 25px;"></label>
													<br>
													<label id="dateTime" style="color: #6b737d; font-size: 13px;"></label>
													<br>
													<label id="subject" style="color: #d15656; font-size: 20;"></label>
													<br>
													<label id="email" style="color: #1b85a2; font-size: 13px;"></label>
													<br>													
													<hr>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div id="message" style="min-height: 300px; height:600px; overflow-x: auto; border:2px solid #ece3e3; padding: 10px; box-shadow: 5px 5px 5px 5px #d8cfcf; font-size: 18px; display: none;" >
														<!-- print message here... -->

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
	</div>
</div>
	
<!-- delete modal -->
<div class="modal fade" id="deleteModal" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>
			<div class="modal-body">
				Do you want to delete this message?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->

<!-- delete modal -->
<div class="modal fade" id="deleteModal_contact" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				Do you want to delete this record(s)?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_contacts" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->

<script type="text/javascript">

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
	// delete 
	function delete_contact()
	{
		var data = $('#form_contact').serialize();
		if (data == "") {alert("No record selected!");return;}
  		$('#deleteModal_contact').modal('show');
  		$('#deleteModal_contact').find('.modal-title').text('Delete');
  		$('#btnDelete_contacts').click(function(){
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Contact/Delete_more_one_contact',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('Deleted successfully.').fadeIn().delay(4000).fadeOut('slow');
						$('#deleteModal_contact').modal('hide');	
						load_contacts_data(1);

					}
				}
			});
  		});
	}	

	$('#id_of_textbox_contact').keyup(function(event){
	if (event.keyCode === 13) {
		searchData(1);
	}
	});
	// search
	function searchData(page) 
	{
		// get word search
		var searchtxt = $('input[name=txtSearch_contact]');
		$.ajax({
			url:'<?php echo base_url() ?>Contact/pagination_search/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#contacts_table').html(data.contacts_table);
				$('#contacts_pagination_link').html(data.contacts_pagination_link);
			}
		});
	}
  	function load_contacts_data(page) {
	$.ajax({
		url:'<?php echo base_url() ?>Contact/pagination/' + page,
		method:'get',
		dataType:'json',
		success:function(data){
			$('#contacts_table').html(data.contacts_table);
			$('#contacts_pagination_link').html(data.contacts_pagination_link);
		}
	});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_contacts_data(page);
	});
	// delete
	function delete_message(data)
	{
		var id = data;
  		$('#deleteModal').modal('show');
  		$('#deleteModal').find('.modal-title').text('Delete message');
  		$('#btnDelete').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Contact/deletemessage',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal').modal('hide');
  						$('.alert-success').html('Deleted message successfully.').fadeIn().delay(2000).fadeOut('slow');
  					}
  				}
  			});
  		});
	}
	function showDeatils(data)
	{
		var id = data;
		// $('#show_details').modal('show');
  // 		$('#show_details').find('.modal-title').text('Details');
		// load student data
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Contact/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=name]').val(data.name);
  				$('textarea[name=message]').val(data.message);

				$('#name').html(data.name);
  				$('#dateTime').html(data.dateTime);
  				$('#subject').html(data.subject);
  				$('#message').html(data.message);
  				$('#email').html('<a href="mailto:'+ data.email +'">' +data.email + '</a>');
  				
  				$('#message').fadeIn();  				
  			},
  			error:function(){
  				alert('Could not get data');
  			}
  		});
	}
</script>