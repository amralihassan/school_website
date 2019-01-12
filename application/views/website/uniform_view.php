<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-6">
		        <h1 class="page-header">Unifrom</h1>
		    </div>
			<div class="col-lg-6">
				<button style=" float: right;margin-top: 40px;" type="button" class="btn btn-danger" onclick="autoload();">Back</button>
			</div>    
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#list" aria-controls="list" role="tab" data-toggle="tab">Uniform</a></li>
					<li><a href="#new" aria-controls="new" role="tab" data-toggle="tab">Update List Prise</a></li>
				</ul>				
			<!-- tab panes -->
			<div class="tab-content">
				<!-- display -->
				<div role="tabpanel" class="tab-pane active" id="list">
					<br>
					<div class="row"> 
						<div class="col-lg-12">
							<!-- panel primary -->
							<div class="panel panel-primary">
								<div class="panel-heading">
						            Uniform
						        </div>
						        <div class="panel-body">
						        	
						        	<!-- search -->
						        	<div class="row">
						        		<div class="col-lg-12">

						        		</div>
						        	</div>
						        	<div class="row">
						        		<div class="col-lg-12">
											<div id="uniform_table" class="animated fadeIn">
			       						
			       							</div>       	
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
					        						<label>Upload Prise List</label>
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
<script type="text/javascript">
    $('#file_name').on('change',function(e){
        var filename = e.target.value.split("\\").pop();
        $('#label_file').fadeIn();
        $('#label_file').text(filename);
    });	
    // load prise list
	function load_uniform_prise(page) 
	{
		// get word search

		$.ajax({
			url:'<?php echo base_url() ?>Uniform/pagination_search_parent/' + page,
			method:'get',
			// data:{id:id.val()},
			dataType:'json',
			success:function(data){
				$('#uniform_table').html(data.uniform_table);
				
			}
		});
	}    
	// add
	$('#btn_save').click(function(){
		$('#progress-bar').css('width', 0 + '%');
		var url = '<?php echo base_url() ?>Uniform/addUniform';
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
						
						$('.alert-success').html('Uploaded successfully.').fadeIn().delay(2000).fadeOut('slow');
						load_uniform_prise(1);
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
</script>