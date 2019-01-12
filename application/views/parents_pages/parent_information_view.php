<div class="animated  fadeIn">
	<!-- header -->
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
		        <h1 class="page-header">User Profile</h1>
		    </div>
			<div class="col-lg-6">
				<button style=" float: right;margin-top: 40px;" type="button" class="btn btn-danger" onclick="autoload();">Back</button>
			</div>    
		</div>
	</div>
	
	<!-- full name -->
	<div class="form-group">
		<div class="row">
			<div class="col-lg-3">
				<label>Full Name</label>
			</div>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="" value="<?php echo $_SESSION['fullName']; ?>">
			</div>
		</div>
	</div>

	<!-- job -->
	<div class="form-group">
		<div class="row">
			<div class="col-lg-3">
				<label>Job</label>
			</div>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="" value="<?php echo $_SESSION['job']; ?>">
			</div>
		</div>		
	</div>

	<!-- mobile -->
	<div class="form-group">
		<div class="row">
			<div class="col-lg-3">
				<label>Mobile</label>
			</div>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="" value="<?php echo $_SESSION['mobile']; ?>">
			</div>
		</div>		
	</div>

	<!-- username -->
	<div class="form-group">
		<div class="row">
			<div class="col-lg-3">
				<label>Username</label>
			</div>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="" value="<?php echo $_SESSION['username']; ?>">
			</div>
		</div>		
	</div>

</div>
