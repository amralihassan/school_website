<div class="animated fadeIn">
	<!-- title -->
	<div class="row">
		<div class="col-lg-6">
	        <h1 class="page-header">Job Applications</h1>
	    </div>
		<div class="col-lg-6">
			<button style=" float: right;margin-top: 40px;" type="button" class="btn btn-danger" onclick="autoload();">Back</button>
		</div>    
	</div>
	<!-- alerts -->
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
		</div>
		<div class="col-lg-12">
			<div class="alert alert-danger w3-panel w3-green" style="display: none;"></div>
		</div>
	</div>

	<!--Add tab -->
	<div class="row">
		<div class="col-lg-12">
			<!-- panel primary -->
			<div class="panel panel-primary">
				<div class="panel-heading">
		            Applied 
		        </div>
		        <!-- search -->
		        <div class="panel-body">
		        	
		        	<div class="row">
		        		<div class="col-lg-12">		        			
		        			<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-search"></span>
							        </span>
									<input class="form-control" type="search" name="txtSearch"  placeholder="Search by name, job title" id="id_of_textbox">
								</div>
							</div>
		        		</div>
		        	</div>
		        	<div class="row">
		        		<div class="form-group">
			        		<div class="col-lg-12">

			        			<form action="Job/Delete_more_one" method="post"  id="job_form" name="frm">

			        				<div class="form-group">	
									<!-- button -->
									<?php 
										$login_level_delete ='';
										
										if ( 'Super Administrator' == $_SESSION['loginlevel']) 
										{
											$login_level_delete ='<a href="#" class="btn btn-danger" onclick="delete_job();">Delete</a>';
											
										}
										elseif ( 'Administrator' == $_SESSION['loginlevel']) 
										{
											$login_level_delete ='<a href="#" class="btn btn-danger" >Delete</a>';
											
										}
										else 
										{
											$login_level_delete ='<a href="#" class="btn btn-danger">Delete</a>';
											
										}
										echo $login_level_delete;
									 ?>							        				
				        			</div>		  				        			
									<div class="table table-responsive animated fadeInUp" id="job_table"></div>
									<div align="center" id="job_pagination_link"></div>	
			        			</form>
			        			
									    	
			        		</div>						        			
		        		</div>

		        	</div>
		        </div>
			</div>	
		</div>
	</div>	
</div>

<!-- delete modal -->
<div class="modal fade" id="deleteModal_job" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				Do you want to delete this record(s)?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_job" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->


<script type="text/javascript">


    $('#file_name').on('change',function(e){
        var filename = e.target.value.split("\\").pop();
        $('#label_file').fadeIn();
        $('#label_file').text(filename);
    });	

	// check all
	function checkall()
	{
		var totalelements = document.forms[0].elements.length;

		for(var i=0; i<totalelements; i++)
		{
			var elementName = document.forms[0].elements[i].name;

			if (elementName!=undefined & elementName.indexOf("id")!= -1)
			{
				document.forms[0].elements[i].checked = document.frm.chk_all.checked;
			}
		}
	}

	$('#id_of_textbox').keyup(function(event){
		if (event.keyCode === 13) {
			searchData(1);
		}
	});

	// search
	function searchData(page) 
	{
		// get word search
		var searchtxt = $('input[name=txtSearch]');
		$.ajax({
			url:'<?php echo base_url() ?>Job/pagination_search/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#job_table').html(data.job_table);
				$('#job_pagination_link').html(data.job_pagination_link);
			}
		});
	}
	// load job data
	function load_job_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Job/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#job_table').html(data.job_table);
				$('#job_pagination_link').html(data.job_pagination_link);
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_job_data(page);
		 $('html, body').animate({ scrollTop: 0 }, 0);
	});

	// delete 
	function delete_job()
	{
		var data = $('#job_form').serialize();
		if (data == "") {alert("No record selected!");return;}
  		$('#deleteModal_job').modal('show');
  		$('#deleteModal_job').find('.modal-title').text('Delete');
  		$('#btnDelete_job').click(function(){
		$.ajax({
			type:'ajax',
			method:'post',
			url:'<?php echo base_url() ?>Job/Delete_more_one',
			data:data,
			async:false,
			dataType:'json',
			success:function(response){
				if (response.success) {
					$('.alert-success').html('Deleted successfully.').fadeIn().delay(4000).fadeOut('slow');
					$('#deleteModal_job').modal('hide');
		
					load_job_data(1);

				}
			}
		});
  		});
	}
</script>