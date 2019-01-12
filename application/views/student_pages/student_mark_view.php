<div class="animated fadeIn">
	<div class="row">
		<div class="col-lg-6">
	        <h1 class="page-header">Marks</h1>
	    </div>
		<div class="col-lg-6">
			<button style=" float: right;margin-top: 40px;" type="button" class="btn btn-danger" onclick="autoload();">Back</button>
		</div>    
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
		            Today Date : <?php echo date('D.d.M.Y'); ?>
		        </div>
		        <div class="panel-body">
					<div class="row">
						 <div class="col-lg-12">
						 	<select style="width: 200px; display: inline;margin-bottom: 5px;" required="required" class="form-control" name="academic_name_add_lang" id="academic_id_add_lang" >
								<option value="">Select Academic Year</option>
							</select>
							<!-- exam type -->
							<select style="width: 200px; display: inline;margin-right: 5px;margin-bottom: 5px;" class="form-control" name="examtype" id="examtype_find">
								<option value="">Select Exam</option>
								<option value="First Term">First Term</option>
								<option value="Final">Final</option>
							</select>							
							<button style="margin-bottom: 5px;" type="button" class="btn btn-info" id="btnView_exam" onclick="searchData(1)">View</button>
						 </div>
						 
					</div>
		        	<div class="row">
		        		<div class="col-lg-12">

							<div  id="mark_table"></div>
							<div align="center" id="mark_pagination_link"></div>		       	
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

		var academicyear_id = $('select[name=academic_name_add_lang]');
		var examtype_id = $('select[name=examtype]');
		$.ajax({
			url:'<?php echo base_url() ?>Studentmarks/pagination_search_student/' + page,
			method:'get',
			data:{year:academicyear_id.val(),extype:examtype_id.val()},
			dataType:'json',
			success:function(data){
				$('#mark_table').html(data.mark_table);
				$('#mark_pagination_link').html(data.mark_pagination_link);
			}
		});
	}	
</script>