<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    User Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User Profile</li>
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
	<div class="box-body">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>public/dist/img/<?php echo $_SESSION['photo']; ?>" alt="User profile picture">

          <h3 class="profile-username text-center"><?php echo $_SESSION['fullName']; ?></h3>
          <p class="text-muted text-center"><?php echo $_SESSION['department']; ?>  <?php echo $_SESSION['job']; ?></p>
        </div>		
	<!-- mobile -->
		<div class="form-group">
			<div class="row">
				<div class="col-md-3">
					<label>Mobile</label>
				</div>
				<div class="col-md-6">
					<input type="text" readonly="" class="form-control" name="" value="<?php echo $_SESSION['mobile']; ?>">
				</div>
			</div>		
		</div>
		<!-- username -->
		<div class="form-group">
			<div class="row">
				<div class="col-md-3">
					<label>Username</label>
				</div>
				<div class="col-md-6">
					<input type="text" readonly="" class="form-control" name="" value="<?php echo $_SESSION['username']; ?>">
				</div>
			</div>		
		</div>
		<!-- login level -->
		<?php 
			if ($_SESSION['role'] != 'Parent') {
				echo '
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label>Login Level</label>
								</div>
								<div class="col-md-6">
									<input type="text" readonly="" class="form-control" name="" value="'.$_SESSION["loginlevel"].'">
								</div>
							</div>		
						</div>
				';
			}
		 ?>


		<form action="" id="myForm" method="POST">
			<!-- file upload -->
			<div class="row">
				<!-- upload -->
				<div class="col-md-3">
					
				</div>
				<div class="col-md-6">
			        <div class="form-group">
			          <div class="btn btn-default btn-file">
			            <i class="fa fa-paperclip"></i> Attachment
			            <input type="file" name="file_name" id="file_name">                    
			          </div>                 
			          <p class="help-block">Max. 512 Kbyte</p>
			        </div>				
				</div>			
			</div>
		</form>
		<!-- button save -->
		<div class="row">
			<!-- upload -->
			<div class="col-md-3">
				
			</div>
			<div class="col-md-6">
				<button type="submit" class="btn btn-success" id="btnUpdate_profile"><i class="fa fa-upload"></i> Upload & Save</button>				
			</div>			
		</div>			
	</div>
</div>
<script type="text/javascript">
    $( document ).ready(function() {$(".se-pre-con").fadeOut("slow");});	
	$('#btnUpdate_profile').click(function(){
		var data = new FormData(document.getElementById("myForm"));
		var file = document.getElementById('file_name').files[0]; //userfile file tag id
        if (file) {
            data.append('file_name', file);
        }	
        // check size before upload
		if(!($('#file_name')[0].files[0].size > 550 )) 
		{ // 512 Kbyte (this size is in bytes)
	        //Prevent default and display error
	        alert("File is over 512 Kbyte in size!");
	       return;
	    }            
		// validation

		var file_name = $('input[name=file_name]');
		var result = '';
		if (file_name.val() == '') {
			alert("No photo selected.");
			return;
		}else{
			file_name.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (result == '1') {
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Administrator/update_photo',
				data:data,
				async:true,
				processData: false,
				contentType: false,
				cashe:false,
				dataType:'json',	
				success:function(response){
					if (response.success) {						
						location.reload();
					}
				}			
			});
		}
	});	
</script>
