<div class="animated fadeIn">	
	<!-- tab -->
	<div class="row">
		<div class="col-lg-12">
			<!-- display -->
			<div class="row"> 
				<div class="col-lg-12">
					<!-- panel primary -->
					<div class="panel panel-primary">
						<div class="panel-heading">
				            Exam
				        </div>
				        <div class="panel-body">
				        	<!-- search -->
				        	<div class="row">
				        		<div class="col-lg-12">
					        		<div class="form-group">
										<!-- division box -->
										<select style="width: 200px; display: inline;margin-bottom: 5px;" class="form-control" name="divisionID" id="division_find">
											<option value="">Select Division</option>
										</select>
										<!-- grade box -->
										<select style="width: 200px; display: inline;margin-bottom: 5px;" class="form-control" name="gradeID" id="grade_find">
											<option value="">Select Grade</option>
										</select>
										<button style="margin-bottom: 5px;" type="button" class="btn btn-info" id="btnView_exam" onclick="searchData(1)">View</button>
									</div>	        			
				        		</div>
				        	</div>
				        	<div class="row">
				        		<div class="col-lg-12">
									<div class="table table-responsive" id="exam_table"></div>
									<div align="center" id="exam_pagination_link"></div>		       	
				        		</div>
				        	</div>
			        	
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
		var division_id = $('select[name=divisionID]');
		var grade_id = $('select[name=gradeID]');
		$.ajax({
			url:'<?php echo base_url() ?>Exam/pagination_search_parent/' + page,
			method:'get',
			data:{divi:division_id.val(),gra:grade_id.val()},
			dataType:'json',
			success:function(data){
				$('#exam_table').html(data.exam_table);
				$('#exam_pagination_link').html(data.exam_pagination_link);
			}
		});
	}

</script>