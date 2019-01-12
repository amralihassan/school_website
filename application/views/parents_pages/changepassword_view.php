<div class="animated fadeIn">

	<!-- to display message -->
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Chnage Password
		            <div  style="float: right;">
						<a onclick="autoload();" href="#" style="color: white;" href="#"><i style=" color: white;" class="fa fa-times"> </i> </a>
					</div>					
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<form id="myform" action="" method="POST">
								<div class="form-group">
									<label>Password</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>
								                                  </span>
								    	<input  type="password" name="password" required="required" class="form-control">	
									</div>
								</div>
							    <input id="updatepassword" class="btn btn-success" style="display: inline-block;" type="submit" value="Update" name="Update">
							</form>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<!-- script -->
<script type="text/javascript">
	$('#updatepassword').click(function(){
		// action form
		var url = 'Parents/updatepassword';
		// data 'new password'
		var data = $('#myform').serialize();
		var pass = $('input[name=password]');
		var result='';
		// validation
		if (pass.val() == '') {
			pass.parent().parent().addClass('has-error');
		}else{
			pass.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (result == '1') {
			$.ajax({
				type:'ajax',
				method:'post',
				url : '<?php base_url() ?>' + url,
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						// load chnage password again
						$('#page-wrapper').html(response.page);
						// message for user
						$('.alert-success').html('Password updated successfully.').fadeIn().delay(2000).fadeOut('slow');
					}else{
						alert('Try to enter new password.');
						
					}
				},
				error:function(){
					alert('Could not update password');
				}
			});
		}
	});
</script>

