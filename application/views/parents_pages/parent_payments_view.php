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
					Payments
		            <div  style="float: right;">
						<a onclick="autoload();" href="#" style="color: white;" href="#"><i style=" color: white;" class="fa fa-times"> </i> </a>
					</div>					
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-3">
							<label>Student Name</label>
						</div>
						<div class="col-lg-9">
							<!-- my kids -->
							<select style="width: 250px; display: inline;margin-right: 5px;margin-bottom: 5px;" class="form-control" name="studentID" id="students_find">
								<option value="">Select Student</option>
							</select>	
							<!-- button -->
							<button style="margin-top: -3px;" type="button" class="btn btn-info" id="btnView_exam" onclick="searchData(1)">View</button>								
						</div>
					</div>
	        		<div class="col-lg-12">
						<div id="payments_table"></div>
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
		var student_id = $('select[name=studentID]');
		$.ajax({
			url:'<?php echo base_url() ?>Payments/pagination_search_parent/' + page,
			method:'get',
			data:{studentID:student_id.val()},
			dataType:'json',
			success:function(data){
				$('#payments_table').html(data.payments_table);
				
			}
		});
	}		
</script>