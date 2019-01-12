<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Change Password
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Change Password</li>
  </ol>
</section>
<br>
<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
      <div class="alert alert-danger w3-panel w3-red" style="display: none;"></div>
    </div>  
  </div>  
</div>	
<div class="box box-primary">
	<!-- alerts -->
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Update Password
					</div>
					<div class="panel-body">
						<!-- form start -->
						<form role="form" action="" method="POST" id="myform">
						  <div class="box-body">
						  	<div class="row">
						  		<div class="col-lg-6">
								    <div class="form-group">
								      <label>New Password</label>
								      <input type="password" class="form-control"placeholder="New Password" name="password">
								    </div>	  			
						  		</div>
						  	</div>
						  	<div class="row">
						  		<div class="col-lg-6">
								    <div class="form-group">
								      <label>Confirm Password</label>
								      <input type="password" class="form-control"  placeholder="Confirm Password" name="passwordc">
								    </div>	  			
						  		</div>
						  	</div>	  	
						  </div>
						</form>
						<input id="updatepassword" class="btn btn-success" type="submit" value="Update" name="Update"> 	
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- script -->
<script type="text/javascript">
    $( document ).ready(function() {$(".se-pre-con").fadeOut("slow");});	
	$('#updatepassword').click(function(){
		// data 'new password'
		var data = $('#myform').serialize();
		var password = $('input[name=password]');
		var passwordc = $('input[name=passwordc]');
		var result='';
		// validation
		if (password.val() == '') {
			password.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please enter New password.').fadeIn().delay(4000).fadeOut('slow');
			return;
		}
		if (passwordc.val() == '') {
			passwordc.parent().parent().addClass('has-error');
			$('.alert-danger').html('Please enter confirm password.').fadeIn().delay(4000).fadeOut('slow');
			return;
		}		
		if (password.val()!==passwordc.val())
		{
			passwordc.parent().parent().addClass('has-error');
			$('.alert-danger').html('Confirm password not match.').fadeIn().delay(4000).fadeOut('slow');
			return;			
		}

		$.ajax({
			type:'ajax',
			method:'post',
			url : '<?php base_url() ?>Administrator/updatepassword',
			data:data,
			async:false,
			dataType:'json',
			success:function(response){
				if (response.success) {
					$('.alert-success').html('Password updated successfully.').fadeIn().delay(4000).fadeOut('slow');
					$('#myform')[0].reset();
				}else{
					alert('Yoy tried to enter same password.');
					// load chnage password again
					$('#page-wrapper').html(response.page);
				}
			},
			error:function(){
				alert('Could not update password');
			}
		});

	});
</script>

