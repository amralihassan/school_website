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
					Student Marks
		            <div  style="float: right;">
						<a onclick="autoload();" href="#" style="color: white;" href="#"><i style=" color: white;" class="fa fa-times"> </i> </a>
					</div>					
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<!-- my kids -->
							<select style="width: 300px; display: inline;margin-right: 5px;margin-bottom: 5px;" class="form-control" name="studentID" id="students_find">
								<option value="">Select Student</option>
							</select>	
							<!-- academic year box -->
							<select style="width: 200px; display: inline;margin-right: 5px;margin-bottom: 5px;" class="form-control" name="yearID" id="academicyear_find">
								<option value="">Select Academic Year</option>
							</select>
							<!-- exam type -->
							<select style="width: 200px; display: inline;margin-right: 5px;margin-bottom: 5px;" class="form-control" name="examtype" id="examtype_find">
								<option value="">Select Exam</option>
								<option value="First Term">First Term</option>
								<option value="Final">Final</option>
							</select>					
							<!-- button -->
							<button style="margin-top: -3px;" type="button" class="btn btn-info" id="btnView_exam" onclick="searchData(1)">View</button>								
						</div>
					</div>

		        		<div class="col-lg-12">
							<div id="mark_table"></div>
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
		var academicyear_id = $('select[name=yearID]');
		var examtype_id = $('select[name=examtype]');
		$.ajax({
			url:'<?php echo base_url() ?>Studentmarks/pagination_search_parent/' + page,
			method:'get',
			data:{studentID:student_id.val(),year:academicyear_id.val(),extype:examtype_id.val()},
			dataType:'json',
			success:function(data){
				$('#mark_table').html(data.mark_table);
				$('#mark_pagination_link').html(data.mark_pagination_link);
			}
		});
	}		
</script>