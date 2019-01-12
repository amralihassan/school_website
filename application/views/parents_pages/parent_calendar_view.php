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
		            Today Date : <?php echo date('D   .d.M.Y'); ?>
		            <div  style="float: right;">
						<a onclick="autoload();" href="#" style="color: white;" href="#"><i style=" color: white;" class="fa fa-times"> </i> </a>
					</div>		            
		        </div>
		        <div class="panel-body">
		        	<div class="row">
		        		<div class="col-lg-2">
		        			<label>Select Calendar</label>
		        		</div>
		        		<div class="col-lg-10">
							<!-- my kids -->
							<select style="width: 300px; display: inline;margin-right: 5px;margin-bottom: 5px;" class="form-control" name="calendar_id" id="calendar_find">
								<option value="">Select Calendar</option>
							</select>	
			
							<!-- button -->
							<button style="margin-top: -3px;" type="button" class="btn btn-info" id="btnView_calendar" onclick="searchData(1)">View</button>	
		        		</div>
		        	</div>
		        	<div class="row">
		        		<div class="col-lg-12 ">
		        			<div  id="calendar_table"></div>
		        		</div>
		        	</div>
	        	
		        </div>
			</div>

		</div>
	</div>	


</div>
<script type="text/javascript">
	// search
	function searchData(page) 
	{
		// get word search
		var id = $('select[name=calendar_id]');
		$.ajax({
			url:'<?php echo base_url() ?>Calendar/pagination_search_parent/' + page,
			method:'get',
			data:{id:id.val()},
			dataType:'json',
			success:function(data){
				$('#calendar_table').html(data.calendar_table);

			}
		});
	}
</script>