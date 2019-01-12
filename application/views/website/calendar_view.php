<div class="animated fadeIn">
	<!-- title -->
	<div class="row">
		<div class="col-lg-6">
	        <h1 class="page-header">Calendar</h1>
	    </div>
		<div class="col-lg-6">
			<button style=" float: right;margin-top: 40px;" type="button" class="btn btn-danger" onclick="autoload();">Back</button>
		</div>    
	</div>
	<!-- to display message -->
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
		</div>
	</div>
		<div class="row">
			<div class="col-lg-12">
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#list" aria-controls="list" role="tab" data-toggle="tab">Calendar</a></li>
					<li><a href="#new" aria-controls="new" role="tab" data-toggle="tab">New</a></li>
				</ul>				
			<!-- tab panes -->
			<div class="tab-content">
				<!-- display -->
				<div role="tabpanel" class="tab-pane active" id="list">
					<br>
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
				<!-- new form -->
				<div role="tabpanel" class="tab-pane" id="new">
					<br>
					<!-- panel primary -->
					<div class="panel panel-primary">
						<div class="panel-heading">
				            Uniform
				        </div>
				        <div class="panel-body">
							<div id="uploadProgress" style="display: none;">
					            <div class="progress">
					                <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:0%;">0%</div>
					            </div>								
							</div>					        	
				        	<div class="row">
				        		<div class="col-lg-12">
				        			<form method="" action="" id="form_add">
				        				<div class="form-group">
				        					<div class="row">
					        					<div class="col-lg-3">
					        						<label>Title</label>
					        					</div>
					        					<div class="col-lg-9">
													<input type="text" name="title" class="form-control" placeholder="Enter title" required="">					        						
					        					</div>				        						
				        					</div>
				        				</div>
				        				<div class="form-group">
				        					<div class="row">
					        					<div class="col-lg-3">
					        						<label>Upload File</label>
					        					</div>
					        					<div class="col-lg-9">
													<a href="#" data-toggle="tooltip" title="Upload image"><label for="file_name" class="input-label btn btn-info"><i class="fa fa-upload fa-2x"></i></label></a> 
													<input style="display: none;" type="file" name="file_name" id="file_name">	
													<span id="label_file" style="display: none; font-size: 15px; color: #0f56a7;line-height: 2;background-color: #e0e6ec;padding: 5px;border-radius: 5px;"></span>					        						
					        					</div>				        						
				        					</div>
				        				</div>	
				        			</form>				        				
				        				<div class="form-group">
				        					<div class="row">

					        					<div class="col-lg-12">
													<button id="btn_save" class="btn btn-success">Update</button>					        						
					        					</div>				        						
				        					</div>
				        				</div>						        							        				

				        		</div>
				        	</div>

			        	
				        </div>
					</div>

				</div>
			</div>				
			</div>
		</div>	
</div>

<!-- delete modal -->
<div class="modal fade" id="deleteModal" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #065293; color: #d5dee0;">
				<h4 class="modal-title">Delete</h4>
			</div>
			<div class="modal-body">
				Do you want to delete this calendar?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
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

	// add
	$('#btn_save').click(function(){
		$('#progress-bar').css('width', 0 + '%');
		var url = '<?php echo base_url() ?>Calendar/addCalendar';
		var data = new FormData(document.getElementById("form_add"));
		var file = document.getElementById('file_name').files[0]; //userfile file tag id
            if (file) {
                data.append('file_name', file);
            }
		
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:true,
				processData: false,
				contentType: false,
				cashe:false,
				dataType:'json',	
					
				success:function(response){
					if (response.success) {
						$('#form_add')[0].reset();
						load_titles();
						$('.alert-success').html('Uploaded successfully.').fadeIn().delay(2000).fadeOut('slow');

					}
				},
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (event) {
                        if (event.lengthComputable) {
                        	$('#uploadProgress').fadeIn();
                        	var percentComplete = event.loaded / event.total;
                            percentComplete = parseInt(percentComplete * 100);
                            $('#progress-bar').text(percentComplete + '% Complete');
                            $('#progress-bar').css('width', percentComplete + '%');
                            
                        }
                        else{
                        	$('#uploadProgress').fadeOut();
                        }
                    }, false);
                    return xhr;
                }				

			});
			
	});	
	function load_titles()
	{
            // load calendar titles
            $.ajax({
                type:'ajax',
                url:'<?php echo base_url() ?>Calendar/retrive_title_calendar',
                dataType:'json',
                success:function(data)
                {
                    $('#calendar_find').html(data);
                    // searchData(1);
                }
            });  		
	}
	function Delete_calendar(data)
	{
		var id = data;
		$('#deleteModal').modal('show');
  		$('#btnDelete').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Calendar/deleteCalendar',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal').modal('hide');
  						$('.alert-success').html('Deleted successfully.').fadeIn().delay(2000).fadeOut('slow');
  						load_titles();

  					}
  				}
  			});
  		});		
	}
</script>