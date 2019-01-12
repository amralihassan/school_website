<div class="animated fadeIn">
	<div class="row">
		<div class="col-lg-6">
	        <h1 class="page-header">Lecture Schedule</h1>
	    </div>
		<div class="col-lg-6">
			<button style=" float: right;margin-top: 40px;" type="button" class="btn btn-danger" onclick="autoload();">Back</button>
		</div>    
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
		            Today Date : <?php echo date('D   .d.M.Y'); ?>
		        </div>
		        <div class="panel-body">
		        	<div class="row">
		        		<div class="col-lg-12">
	       					<div id="lecture_id">
	       						
	       					</div>
		        		</div>
		        	</div>
	        	
		        </div>
			</div>

		</div>
	</div>		
</div>

<script type="text/javascript">
	load_lecture_image();
	function load_lecture_image() 
	{
		$('#lecture_id').html('<img width="100%" src="<?php echo base_url();?>public/upload/lecture/Capture.png" alt="Banner">');
	}
</script>