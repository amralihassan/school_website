<div class="animated fadeIn">
	<!-- title -->
	<div class="row">
		<div class="col-lg-6">
	        <h1 class="page-header">Student Marks</h1>
	    </div>
		<div class="col-lg-6">
			<button style=" float: right;margin-top: 40px;" type="button" class="btn btn-danger" onclick="autoload();">Back</button>
		</div>    
	</div>
	<!-- alert -->
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
		</div>
	</div>
	<!-- tab -->
	<div class="row">
		<div class="col-lg-12">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#tab_1" aria-controls="tab_1" role="tab" data-toggle="tab">Marks</a></li>
				<li><a href="#tab_2"  id="btnAdd_mark" aria-controls="tab_2" role="tab" data-toggle="tab">New</a></li>
				<li><a href="#tab_3" aria-controls="tab_3" role="tab" data-toggle="tab">Import Data</a></li>
			</ul>
			<!-- tab panes -->
			<div class="tab-content">
				<!-- display -->
				<div role="tabpanel" class="tab-pane active" id="tab_1">
					<br>
					<div class="row"> 
						<div class="col-lg-12">
							<!-- panel primary -->
							<div class="panel panel-primary">
								<div class="panel-heading">
						            Student marks
						        </div>
						        <div class="panel-body">
						        	<!-- search -->
						        	<div class="row">
						        		<div class="col-lg-12">
							        		<div class="form-group">
												<!-- division box -->
												<select style="width: 200px; display: inline;margin-right: 5px;margin-bottom: 5px;" class="form-control" name="divisionID" id="division_find">
													<option value="">Select Division</option>
												</select>
												<!-- grade box -->
												<select style="width: 200px; display: inline;margin-right: 5px;margin-bottom: 5px;" class="form-control" name="gradeID" id="grade_find">
													<option value="">Select Grade</option>
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
												<button style="margin-top: -3px;" type="button" class="btn btn-info" id="btnView_exam" onclick="searchData(1)">View</button>
											</div>	        			
						        		</div>
						        	</div>
						        	<div class="row">
						        		<div class="col-lg-12">
											<div class="table table-responsive" id="mark_table"></div>
											<div align="center" id="mark_pagination_link"></div>	      	
						        		</div>
						        	</div>
						        </div>
							</div>
						</div>
					</div>	
				</div>
				<!-- new form -->
				<div role="tabpanel" class="tab-pane" id="tab_2">
					<div class="row">
						<div class="col-lg-12">
							<br>
							<div class="panel panel-primary">
								<div class="panel-heading">
									Add student marks
								</div>
								<div class="panel-body">
									<!-- select education type -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>Select Education</label>
											</div>
											<div class="col-lg-9">
												<select class="form-control" id="education_id" name="education">
													<option value="">Select Education</option>
													<option value="Language">Language</option>
													<option value="Intenational">Intenational</option>
												</select>
											</div>
										</div>
									</div>	
									<!-- language education add-->
									<fieldset id="lang" style="display: none;">
										<legend style="color: crimson;">Language Education</legend>
										<!-- new form language-->
										<form method="post" id="myForm_lang" action="">

											<!-- exam type -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-3">
														<label>Exam Type</label>
													</div>
													<div class="col-lg-9">
														<select class="form-control" name="type_name_add_lang" required="required">
															<option value="">Select Exam Type</option>
															<option value="First Term">First Term</option>
															<option value="Final">Final</option>
														</select>
													</div>
												</div>
											</div>										
											<!-- academc year -->
											<div class="form-group">
												<div class="row">
													 <div class="col-lg-3">
													 	<label>Academic Year</label>
													 </div>
													 <div class="col-lg-9">
													 	<select required="required" class="form-control" name="academic_name_add_lang" id="academic_id_add_lang">
															<option value="">Select Academic Year</option>
														</select>
													 </div>
												</div>
											</div>											
											<!-- division box -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-3">
														<label>Division</label>
													</div>
													<div class="col-lg-9">
														<select required="required" class="form-control" name="division_name_add_lang" id="division_id_add_lang">
															<option value="">Select Division</option>
														</select>
													</div>
												</div>
											</div>
											<!-- grade -->
											<div class="form-group">
												<div class="row">
													 <div class="col-lg-3">
													 	<label>Grade</label>
													 </div>
													 <div class="col-lg-9">
													 	<select required="required" class="form-control" name="grade_name_add_lang" id="grade_id_add_lang">
															<option value="">Select Grade</option>
														</select>												 	
													 </div>
												</div>
											</div>
											<!-- room -->
											<div class="form-group">
												<div class="row">
													 <div class="col-lg-3">
													 	<label>Classroom</label>
													 </div>
													 <div class="col-lg-9">
														<select required="required" class="form-control" name="room_name_add_lang" id="room_id_add_lang" disabled="">
															<option value="">Select Classroom</option>
														</select>								 	
													 </div>
												</div>
											</div>
											<!-- student name -->
											<div class="form-group">
												<div class="row">
													 <div class="col-lg-3">
													 	<label>Student Name</label>
													 </div>
													 <div class="col-lg-9">
														<select required="required" class="form-control" name="student_name_add_lang" id="student_id_add_lang" disabled="">
															<option value="">Select Student</option>
														</select>								 	
													 </div>
												</div>
											</div>	
											<!-- full mark -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-3">
														<label>Full Mark</label>
													</div>
													<div class="col-lg-9">
														<input id="fullmark_id_lang" class="form-control" type="text" name="fullmark_lang" required="required">
													</div>
												</div>
											</div>								
											<!-- main marks -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-1">
														<label>A Level</label>
														<input id="eng_al_id_lang" class="form-control" type="text" name="eng_al_lang" required="required">
													</div>
													<div class="col-lg-1">
														<label>Arabic</label>
														<input id="arabic_id_lang" class="form-control" type="text" name="arabic_lang" required="required">
													</div>
													<div class="col-lg-1">
														<label>Math.</label>
														<input class="form-control" id="math_id_lang" type="text" name="math_lang" required="required">
													</div>
													<div class="col-lg-1">
														<label>Science</label>
														<input class="form-control" id="science_id_lang" type="text" name="science_lang" required="required">
													</div>
													
													<div class="col-lg-1">
														<label>Social</label>
														<input class="form-control" id="social_id_lang" type="text" name="social_lang" required="required">
													</div>
													<div class="col-lg-1">
														<label>O Level</label>
														<input class="form-control" id="eng_ol_id_lang" type="text" name="eng_ol_lang" required="required">
													</div>
													<div class="col-lg-1">
														<label>F / G</label>
														<input class="form-control" id="f_g_id_lang" type="text" name="f_g_lang" required="required">
													</div>
													<!-- total -->
													<div class="col-lg-1">
														<label>Total</label>
														<input id="total_id_lang" class="form-control" type="text" name="total_lang"required="required" readonly="">
													</div>
										
													<div class="col-lg-2">
														<label>Score</label>
														<input class="form-control" type="text" name="score_lang"  required="required" id="score_id_lang" readonly="">
													</div>	
													<div class="col-lg-2">
														<label>Percentage</label>
														<input class="form-control" id="percentage_id_lang" type="text" name="percentage_lang"  required="required" readonly="">
													</div>
												</div>												
											</div>
											<!-- other marks -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-1">
														<label>Religion</label>
														<input class="form-control" type="text" name="religion_lang" required="required">
													</div>
													<div class="col-lg-1">
														<label>Computer</label>
														<input class="form-control" type="text" name="computer_lang" required="required">
													</div>
													<div class="col-lg-1">
														<label>Art</label>
														<input class="form-control" type="text" name="art_lang" required="required">
													</div>
													<div class="col-lg-1">
														<label>Act.1</label>
														<input class="form-control" type="text" name="act1_lang" required="required">
													</div>
													<div class="col-lg-1">
														<label>Act.2</label>
														<input class="form-control" type="text" name="act2_lang" required="required">
													</div>
											
												</div>												
											</div>
											<!-- notes -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-12">
														<input type="text" name="notes_lang" class="form-control" placeholder="Enter notes here ..." required="required">
													</div>
												</div>
											</div>
											<!-- button -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-12">
												<!-- button -->
												<?php 
													$login_level_add ='';
													
													if ( 'Super Administrator' == $_SESSION['loginlevel']) 
													{
														$login_level_add ='<button type="button" id="btnSave_mark_lang" class="btn btn-success">Save</button>';
														
													}
													elseif ( 'Administrator' == $_SESSION['loginlevel']) 
													{
														$login_level_add ='<button type="button" id="btnSave_mark_lang" class="btn btn-success">Save</button>';
														
													}
													else 
													{
														$login_level_add ='<button type="button"  class="btn btn-success">Save</button>';
														
													}
													echo $login_level_add;
												 ?>
													</div>
												</div>
											</div>													
										</form>
									</fieldset>
									<!-- international education add-->
									<fieldset id="int" style="display: none;">
										<legend style="color: crimson;">International Education</legend>
										<!-- new form language-->
										<form method="post" id="myForm_int" action="">
											<!-- exam type -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-3">
														<label>Exam Type</label>
													</div>
													<div class="col-lg-9">
														<select class="form-control" name="type_name_add_int" required="required">
															<option value="">Select Exam Type</option>
															<option value="First Term">First Term</option>
															<option value="Final">Final</option>
														</select>
													</div>
												</div>
											</div>										
											<!-- academc year -->
											<div class="form-group">
												<div class="row">
													 <div class="col-lg-3">
													 	<label>Academic Year</label>
													 </div>
													 <div class="col-lg-9">
													 	<select required="required" class="form-control" name="academic_name_add_int" id="academic_id_add_int">
															<option value="">Select Academic Year</option>
														</select>
													 </div>
												</div>
											</div>											
											<!-- division box -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-3">
														<label>Division</label>
													</div>
													<div class="col-lg-9">
														<select required="required" class="form-control" name="division_name_add_int" id="division_id_add_int">
															<option value="">Select Division</option>
														</select>
													</div>
												</div>
											</div>
											<!-- grade -->
											<div class="form-group">
												<div class="row">
													 <div class="col-lg-3">
													 	<label>Grade</label>
													 </div>
													 <div class="col-lg-9">
													 	<select required="required" class="form-control" name="grade_name_add_int" id="grade_id_add_int">
															<option value="">Select Grade</option>
														</select>												 	
													 </div>
												</div>
											</div>
											<!-- room -->
											<div class="form-group">
												<div class="row">
													 <div class="col-lg-3">
													 	<label>Classroom</label>
													 </div>
													 <div class="col-lg-9">
														<select required="required" class="form-control" name="room_name_add_int" id="room_id_add_int" disabled="">
															<option value="">Select Classroom</option>
														</select>								 	
													 </div>
												</div>
											</div>
											<!-- student name -->
											<div class="form-group">
												<div class="row">
													 <div class="col-lg-3">
													 	<label>Student Name</label>
													 </div>
													 <div class="col-lg-9">
														<select required="required" class="form-control" name="student_name_add_int" id="student_id_add_int" disabled="">
															<option value="">Select Student</option>
														</select>								 	
													 </div>
												</div>
											</div>	
											<!-- full mark -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-3">
														<label>Full Mark</label>
													</div>
													<div class="col-lg-9">
														<input id="fullmark_id_int" class="form-control" type="text" name="fullmark_int" required="required">
													</div>
												</div>
											</div>								
											<!-- main marks -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-1">
														<label>A Level</label>
														<input id="eng_al_id_int" class="form-control" type="text" name="eng_al_int" required="required">
													</div>
													<div class="col-lg-1">
														<label>Arabic</label>
														<input id="arabic_id_int" class="form-control" type="text" name="arabic_int" required="required">
													</div>
													<div class="col-lg-1">
														<label>Math.</label>
														<input class="form-control" id="math_id_int" type="text" name="math_int" required="required">
													</div>
													<div class="col-lg-1">
														<label>Science</label>
														<input class="form-control" id="science_id_int" type="text" name="science_int" required="required">
													</div>
													
													<div class="col-lg-1">
														<label>Social</label>
														<input class="form-control" id="social_id_int" type="text" name="social_int" required="required">
													</div>
													<div class="col-lg-1">
														<label>F / G</label>
														<input class="form-control" id="f_g_id_int" type="text" name="f_g_int" required="required">
													</div>
													<!-- total -->
													<div class="col-lg-1">
														<label>Total</label>
														<input id="total_id_int" class="form-control" type="text" name="total_int"required="required" readonly="">
													</div>
										
													<div class="col-lg-2">
														<label>Score</label>
														<input class="form-control" type="text" name="score_int"  required="required" id="score_id_int" readonly="">
													</div>	
													<div class="col-lg-2">
														<label>Percentage</label>
														<input class="form-control" id="percentage_id_int" type="text" name="percentage_int"  required="required" readonly="">
													</div>
													<div class="col-lg-1">
														<label>Religion</label>
														<input class="form-control" type="text" name="religion_int" required="required">
													</div>
												</div>												
											</div>
											<!-- notes -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-12">
														<input type="text" name="notes_int" class="form-control" placeholder="Enter notes here ..." required="required">
													</div>
												</div>
											</div>
											<!-- button -->
											<div class="form-group">
												<div class="row">
													<div class="col-lg-12">
												<!-- button -->
												<?php 
													$login_level_add ='';
													
													if ( 'Super Administrator' == $_SESSION['loginlevel']) 
													{
														$login_level_add ='<button type="button" id="btnSave_mark_int" class="btn btn-success">Save</button>';
														
													}
													elseif ( 'Administrator' == $_SESSION['loginlevel']) 
													{
														$login_level_add ='<button type="button" id="btnSave_mark_int" class="btn btn-success">Save</button>';
														
													}
													else 
													{
														$login_level_add ='<button type="button"  class="btn btn-success">Save</button>';
														
													}
													echo $login_level_add;
												 ?>
													</div>
												</div>
											</div>													
										</form>
									</fieldset>									
								</div>
							</div>
						</div>
					</div>
				</div>	
				<!-- import data -->
				<div class="tab-pane" id="tab_3" role="tabpanel">
					<div class="row">
						<div class="col-lg-12">
							<br>
							<div class="panel panel-primary">
								<div class="panel-heading">
									Import Data 
									<div  style="float: right;">
										<a target="_blank" href="<?php echo base_url("public/upload/files/marks.xlsx") ?>" style="color: white;" href="#"><i style=" color: white; margin-right: 5px;" class="fa fa-download"> </i> </a>  Download excel file
									</div>
									
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<form method="post" id="import_form" enctype="multipart/form-data">
												<div class="row">
													<div class="col-lg-3">
														<label>Select Excel File</label>
													</div>
													<div class="col-lg-9">
													<a href="#" data-toggle="tooltip" title="Upload image"><label for="file_name" class="input-label btn btn-info"><i class="fa fa-upload fa-2x"></i></label></a> 
													<input style="display: none;" type="file" name="file" id="file" accept=".xls, .xlsx" required="">	
													<span id="label_file" style="display: none; font-size: 15px; color: #0f56a7;line-height: 2;background-color: #e0e6ec;padding: 5px;border-radius: 5px;"></span>														 
													</div>
												</div>
												<div class="row">
													<div class="col-lg-3">
														
													</div>
													<div class="col-lg-9">
														<br>
														 <input type="submit" name="import" value="Import" class="btn btn-success">
													</div>
												</div>
												
												
							
											</form>
										</div>
									</div>											
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				<br>
		</div>
	</div>	

	
</div>

<!-- delete modal -->
<div class="modal fade" id="deleteModal" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>				
			<div class="modal-body">
				Do you want to delete this student's marks?
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- update-->
<div class="modal fade" id="updateModel_mark" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document" style="width: 1200px;">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				
					<input type="text" name="markid" hidden="" value="">
					<!-- language education update -->
					<fieldset id="lang_update" style="display: none;">
						<legend style="color: crimson;">Language Education</legend>
						<!-- new form language-->
						<form method="post" id="myForm_lang_update" action="">	
							<input type="text" name="markid_lang_update" hidden="" value="">				<label id="studentname_lang"></label>									
							<!-- main marks -->
							<div class="form-group">
								
								<!-- full mark -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<label>Full Mark</label>
										</div>
										<div class="col-lg-9">
											<input id="fullmark_id_lang_update" class="form-control" type="text" name="fullmark_lang_update" required="required" readonly="">
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-lg-1">
										<label>A Level</label>
										<input id="eng_al_id_lang_update" class="form-control" type="text" name="eng_al_lang_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>Arabic</label>
										<input id="arabic_id_lang_update" class="form-control" type="text" name="arabic_lang_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>Math.</label>
										<input class="form-control" id="math_id_lang_update" type="text" name="math_lang_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>Science</label>
										<input class="form-control" id="science_id_lang_update" type="text" name="science_lang_update" required="required">
									</div>
									
									<div class="col-lg-1">
										<label>Social</label>
										<input class="form-control" id="social_id_lang_update" type="text" name="social_lang_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>O Level</label>
										<input class="form-control" id="eng_ol_id_lang_update" type="text" name="eng_ol_lang_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>F / G</label>
										<input class="form-control" id="f_g_id_lang_update" type="text" name="f_g_lang_update" required="required">
									</div>
									<!-- total -->
									<div class="col-lg-1">
										<label>Total</label>
										<input id="total_id_lang_update" class="form-control" type="text" name="total_lang_update"required="required" readonly="">
									</div>
						
									<div class="col-lg-2">
										<label>Score</label>
										<input class="form-control" type="text" name="score_lang_update"  required="required" id="score_id_lang_update" readonly="">
									</div>	
									<div class="col-lg-2">
										<label>Percentage</label>
										<input class="form-control" id="percentage_id_lang_update" type="text" name="percentage_lang_update"  required="required" readonly="">
									</div>
								</div>												
							</div>
							<!-- other marks -->
							<div class="form-group">
								<div class="row">
									<div class="col-lg-1">
										<label>Religion</label>
										<input class="form-control" type="text" name="religion_lang_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>Computer</label>
										<input class="form-control" type="text" name="computer_lang_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>Art</label>
										<input class="form-control" type="text" name="art_lang_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>Act.1</label>
										<input class="form-control" type="text" name="act1_lang_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>Act.2</label>
										<input class="form-control" type="text" name="act2_lang_update" required="required">
									</div>
							
								</div>												
							</div>
							<!-- notes -->
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<input type="text" name="notes_lang_update" class="form-control" placeholder="Enter notes here ..." required="required">
									</div>
								</div>
							</div>										
						</form>
						<button type="button" id="btnUpdate_mark_lang" class="btn btn-success">Save changes</button>
					</fieldset>
					<!-- international education update -->
					<fieldset id="int_update" style="display: none;">
						<legend style="color: crimson;">International Education</legend>
						<!-- new form language-->
						<form method="post" id="myForm_int_update" action="">		
							<label id="studentname_int"></label>
							<input type="text" name="markid_int_update" hidden="" value="">	
							<!-- full mark -->
							<div class="form-group">
								<div class="row">
									<div class="col-lg-3">
										<label>Full Mark</label>
									</div>
									<div class="col-lg-9">
										<input id="fullmark_id_int_update" class="form-control" type="text" name="fullmark_int_update" required="required" readonly="">
									</div>
								</div>
							</div>													
							<!-- main marks -->
							<div class="form-group">
								<div class="row">
									<div class="col-lg-1">
										<label>A Level</label>
										<input id="eng_al_id_int_update" class="form-control" type="text" name="eng_al_int_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>Arabic</label>
										<input id="arabic_id_int_update" class="form-control" type="text" name="arabic_int_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>Math.</label>
										<input class="form-control" id="math_id_int_update" type="text" name="math_int_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>Science</label>
										<input class="form-control" id="science_id_int_update" type="text" name="science_int_update" required="required">
									</div>
									
									<div class="col-lg-1">
										<label>Social</label>
										<input class="form-control" id="social_id_int_update" type="text" name="social_int_update" required="required">
									</div>
									<div class="col-lg-1">
										<label>F / G</label>
										<input class="form-control" id="f_g_id_int_update" type="text" name="f_g_int_update" required="required">
									</div>
									<!-- total -->
									<div class="col-lg-1">
										<label>Total</label>
										<input id="total_id_int_update" class="form-control" type="text" name="total_int_update"required="required" readonly="">
									</div>
						
									<div class="col-lg-2">
										<label>Score</label>
										<input class="form-control" type="text" name="score_int_update"  required="required" id="score_id_int_update" readonly="">
									</div>	
									<div class="col-lg-2">
										<label>Percentage</label>
										<input class="form-control" id="percentage_id_int_update" type="text" name="percentage_int_update"  required="required" readonly="">
									</div>
									<div class="col-lg-1">
										<label>Religion</label>
										<input class="form-control" type="text" name="religion_int_update" required="required">
									</div>
								</div>												
							</div>
							<!-- notes -->
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<input type="text" name="notes_int_update" class="form-control" placeholder="Enter notes here ..." required="required">
									</div>
								</div>
							</div>												
						</form>
						<button type="button" id="btnUpdate_mark_int" class="btn btn-success">Save changes</button>
					</fieldset>						
				
			</div>
			<div class="modal-footer">
				
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
	function update_mark(data)
	{
		var id = data;
		$('#updateModel_mark').modal('show');
  		$('#updateModel_mark').find('.modal-title').text('Update Student Marks');

  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Studentmarks/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				if (data.o_level != null)
  				{
  					$('#lang_update').fadeIn();
  					$('#int_update').fadeOut();
  					// student name
  					$('#studentname_lang').html('<h2>' + data.englishName + '</h2>')
  					$('input[name=fullmark_lang_update]').val(data.fullmark);
   					$('input[name=markid_lang_update]').val(data.markID);
  					$('input[name=eng_al_lang_update]').val(data.a_level);
  					$('input[name=arabic_lang_update]').val(data.arabic);
  					$('input[name=math_lang_update]').val(data.math);
  					$('input[name=science_lang_update]').val(data.science);
  					$('input[name=social_lang_update]').val(data.social);
  					$('input[name=eng_ol_lang_update]').val(data.o_level);
  					$('input[name=f_g_lang_update]').val(data.f_g);
  					$('input[name=total_lang_update]').val(data.total);
  					$('input[name=score_lang_update]').val(data.score);
  					$('input[name=percentage_lang_update]').val(data.percentage);
  					$('input[name=religion_lang_update]').val(data.religion);
  					$('input[name=notes_lang_update]').val(data.notes);
  					$('input[name=computer_lang_update]').val(data.computer);
  					$('input[name=art_lang_update]').val(data.art);
  					$('input[name=act1_lang_update]').val(data.act1);
  					$('input[name=act2_lang_update]').val(data.act2);
  				}
  				else
  				{
  					$('#int_update').fadeIn();
  					$('#Lang_update').fadeOut();
  					// student name
  					$('#studentname_int').html('<h2>' + data.englishName + '</h2>')
  					$('input[name=fullmark_int_update]').val(data.fullmark);
  					$('input[name=markid_int_update]').val(data.markID);
  					$('input[name=eng_al_int_update]').val(data.a_level);
  					$('input[name=arabic_int_update]').val(data.arabic);
  					$('input[name=math_int_update]').val(data.math);
  					$('input[name=science_int_update]').val(data.science);
  					$('input[name=social_int_update]').val(data.social);
  					$('input[name=f_g_int_update]').val(data.f_g);
  					$('input[name=total_int_update]').val(data.total);
  					$('input[name=score_int_update]').val(data.score);
  					$('input[name=percentage_int_update]').val(data.percentage);
  					$('input[name=religion_int_update]').val(data.religion);
  					$('input[name=notes_int_update]').val(data.notes);
  				}
  				
  		
  			},
  			error:function(){
  				alert('Could not get data');
  			}
  		});
	}
	// delete
	function delete_mark(data)
	{
		var id = data;

  		$('#deleteModal').modal('show');
  		$('#deleteModal').find('.modal-title').text('Delete student marks');
  		$('#btnDelete').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Studentmarks/deletemark',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal').modal('hide');
  						$('.alert-success').html('Deleted student marks successfully.').fadeIn().delay(2000).fadeOut('slow');
  						searchData(1);
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
  					}
  				},
  				error:function(){
  					alert('Error in deleteing.')
  				}
  			});
  		});
	}

	// get data by id_admin
  	$('#btnUpdate_mark_lang').click(function(){
  		var url = '<?php echo base_url() ?>Studentmarks/updatemarks_lang'; 
		var data = $('#myForm_lang_update').serialize();
		var result = "";
		// vaidation
		var eng_al_lang = $('input[name=eng_al_lang_update]');
		var arabic_lang = $('input[name=arabic_lang_update]');
		var math_lang = $('input[name=math_lang_update]');
		var science_lang = $('input[name=science_lang_updateg]');
		var social_lang = $('input[name=social_lang_update]');
		var eng_ol_lang = $('input[name=eng_ol_lang_update]');
		var f_g_lang = $('input[name=f_g_lang_update]');
		var total_lang = $('input[name=total_lang_update]');
		var score_lang = $('input[name=score_lang_update]');
		var percentage_lang = $('input[name=percentage_lang_update]');
		var religion_lang = $('input[name=religion_lang_update]');
		var computer_lang = $('input[name=computer_lang_update]');
		var art_lang = $('input[name=art_lang_update]');
		var act1_lang = $('input[name=act1_lang_update]');
		var act2_lang = $('input[name=act2_lang_update]');
		var notes_lang = $('input[name=notes_lang_update]');		


		if (eng_al_lang.val() == '') {
			eng_al_lang.parent().parent().addClass('has-error');
			return;
		}else{
			eng_al_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (arabic_lang.val() == '') {
			arabic_lang.parent().parent().addClass('has-error');
			return;
		}else{
			arabic_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (math_lang.val() == '') {
			math_lang.parent().parent().addClass('has-error');
			return;
		}else{
			math_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (science_lang.val() == '') {
			science_lang.parent().parent().addClass('has-error');
			return;
		}else{
			science_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (social_lang.val() == '') {
			social_lang.parent().parent().addClass('has-error');
			return;
		}else{
			social_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (eng_ol_lang.val() == '') {
			eng_ol_lang.parent().parent().addClass('has-error');
			return;
		}else{
			eng_ol_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (f_g_lang.val() == '') {
			f_g_lang.parent().parent().addClass('has-error');
			return;
		}else{
			f_g_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (total_lang.val() == '') {
			total_lang.parent().parent().addClass('has-error');
			return;
		}else{
			total_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (score_lang.val() == '') {
			score_lang.parent().parent().addClass('has-error');
			return;
		}else{
			score_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (percentage_lang.val() == '') {
			percentage_lang.parent().parent().addClass('has-error');
			return;
		}else{
			percentage_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (religion_lang.val() == '') {
			religion_lang.parent().parent().addClass('has-error');
			return;
		}else{
			religion_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (computer_lang.val() == '') {
			computer_lang.parent().parent().addClass('has-error');
			return;
		}else{
			computer_lang.parent().parent().removeClass('has-error');
			result +='*';
		}		

		if (art_lang.val() == '') {
			art_lang.parent().parent().addClass('has-error');
			return;
		}else{
			art_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (act1_lang.val() == '') {
			act1_lang.parent().parent().addClass('has-error');
			return;
		}else{
			act1_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (act2_lang.val() == '') {
			act2_lang.parent().parent().addClass('has-error');
			return;
		}else{
			act2_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (notes_lang.val() == '') {
			notes_lang.parent().parent().addClass('has-error');
			return;
		}else{
			notes_lang.parent().parent().removeClass('has-error');
			result +='*';
		}	

		if (result = "****************")
		{
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#updateModel_mark').modal('hide');
						$('#myForm_lang_update')[0].reset();
						$('.alert-success').html('Updated successfully.').fadeIn().delay(4000).fadeOut('slow');
						searchData(1);
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
					}
				},
				error:function(){
					alert('Could not update account.');
				}
			});			
		}		

  	});	

	// get data by id_admin
  	$('#btnUpdate_mark_int').click(function(){
  		var url = '<?php echo base_url() ?>Studentmarks/updatemarks_int';
		var data = $('#myForm_int_update').serialize();

		// vaidation
		
		var eng_al_int = $('input[name=eng_al_int_update]');
		var arabic_int = $('input[name=arabic_int_update]');
		var math_int = $('input[name=math_int_update]');
		var science_int = $('input[name=science_int_update]');
		var social_int = $('input[name=social_int_update]');
		var f_g_int = $('input[name=f_g_int_update]');
		var total_int = $('input[name=total_int_update]');
		var score_int = $('input[name=score_int_update]');
		var percentage_int= $('input[name=percentage_int_update]');
		var religion_int = $('input[name=religion_int_update]');
		var notes_int = $('input[name=notes_int_update]');

		var result = '';		

		if (eng_al_int.val() == '') {
			eng_al_int.parent().parent().addClass('has-error');
			return;
		}else{
			eng_al_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (arabic_int.val() == '') {
			arabic_int.parent().parent().addClass('has-error');
			return;
		}else{
			arabic_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (math_int.val() == '') {
			math_int.parent().parent().addClass('has-error');
			return;
		}else{
			math_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (science_int.val() == '') {
			science_int.parent().parent().addClass('has-error');
			return;
		}else{
			science_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (social_int.val() == '') {
			social_int.parent().parent().addClass('has-error');
			return;
		}else{
			social_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (f_g_int.val() == '') {
			f_g_int.parent().parent().addClass('has-error');
			return;
		}else{
			f_g_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (total_int.val() == '') {
			total_int.parent().parent().addClass('has-error');
			return;
		}else{
			total_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (score_int.val() == '') {
			score_int.parent().parent().addClass('has-error');
			return;
		}else{
			score_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (percentage_int.val() == '') {
			percentage_int.parent().parent().addClass('has-error');
			return;
		}else{
			percentage_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (religion_int.val() == '') {
			religion_int.parent().parent().addClass('has-error');
			return;
		}else{
			religion_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (notes_int.val() == '') {
			notes_int.parent().parent().addClass('has-error');
			return;
		}else{
			notes_int.parent().parent().removeClass('has-error');
			result +='*';
		}		
		if (result == "***********")
		{
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#updateModel_mark').modal('hide');
						$('#myForm_int_update')[0].reset();
						$('.alert-success').html('Updated successfully.').fadeIn().delay(4000).fadeOut('slow');
						searchData(1);
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
					}
				},
				error:function(){
					alert('Could not update account.');
  				}
			});			
		}

  	});	  	

  	// insert language education
	$('#btnSave_mark_lang').click(function(){
		var data = $('#myForm_lang').serialize();

		// vaidation
		var type_name_add_lang = $('select[name=type_name_add_lang]');
		var academic_name_add_lang = $('select[name=academic_name_add_lang]');
		var student_name_add_lang = $('select[name=student_name_add_lang]');
		var fullmark_lang = $('input[name=fullmark_lang]');
		var eng_al_lang = $('input[name=eng_al_lang]');
		var arabic_lang = $('input[name=arabic_lang]');
		var math_lang = $('input[name=math_lang]');
		var science_lang = $('input[name=science_lang]');
		var social_lang = $('input[name=social_lang]');
		var eng_ol_lang = $('input[name=eng_ol_lang]');
		var f_g_lang = $('input[name=f_g_lang]');
		var total_lang = $('input[name=total_lang]');
		var score_lang = $('input[name=score_lang]');
		var percentage_lang = $('input[name=percentage_lang]');
		var religion_lang = $('input[name=religion_lang]');
		var computer_lang = $('input[name=computer_lang]');
		var art_lang = $('input[name=art_lang]');
		var act1_lang = $('input[name=act1_lang]');
		var act2_lang = $('input[name=act2_lang]');
		var notes_lang = $('input[name=notes_lang]');

		var result = '';

		if (type_name_add_lang.val() == '') {
			type_name_add_lang.parent().parent().addClass('has-error');
			return;
		}else{
			type_name_add_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (academic_name_add_lang.val() == '') {
			academic_name_add_lang.parent().parent().addClass('has-error');
			return;
		}else{
			academic_name_add_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (student_name_add_lang.val() == '') {
			student_name_add_lang.parent().parent().addClass('has-error');
			return;
		}else{
			student_name_add_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (fullmark_lang.val() == '') {
			fullmark_lang.parent().parent().addClass('has-error');
			return;
		}else{
			fullmark_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (eng_al_lang.val() == '') {
			eng_al_lang.parent().parent().addClass('has-error');
			return;
		}else{
			eng_al_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (arabic_lang.val() == '') {
			arabic_lang.parent().parent().addClass('has-error');
			return;
		}else{
			arabic_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (math_lang.val() == '') {
			math_lang.parent().parent().addClass('has-error');
			return;
		}else{
			math_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (science_lang.val() == '') {
			science_lang.parent().parent().addClass('has-error');
			return;
		}else{
			science_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (social_lang.val() == '') {
			social_lang.parent().parent().addClass('has-error');
			return;
		}else{
			social_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (eng_ol_lang.val() == '') {
			eng_ol_lang.parent().parent().addClass('has-error');
			return;
		}else{
			eng_ol_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (f_g_lang.val() == '') {
			f_g_lang.parent().parent().addClass('has-error');
			return;
		}else{
			f_g_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (total_lang.val() == '') {
			total_lang.parent().parent().addClass('has-error');
			return;
		}else{
			total_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (score_lang.val() == '') {
			score_lang.parent().parent().addClass('has-error');
			return;
		}else{
			score_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (percentage_lang.val() == '') {
			percentage_lang.parent().parent().addClass('has-error');
			return;
		}else{
			percentage_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (religion_lang.val() == '') {
			religion_lang.parent().parent().addClass('has-error');
			return;
		}else{
			religion_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (computer_lang.val() == '') {
			computer_lang.parent().parent().addClass('has-error');
			return;
		}else{
			computer_lang.parent().parent().removeClass('has-error');
			result +='*';
		}		

		if (art_lang.val() == '') {
			art_lang.parent().parent().addClass('has-error');
			return;
		}else{
			art_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (act1_lang.val() == '') {
			act1_lang.parent().parent().addClass('has-error');
			return;
		}else{
			act1_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (act2_lang.val() == '') {
			act2_lang.parent().parent().addClass('has-error');
			return;
		}else{
			act2_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (notes_lang.val() == '') {
			notes_lang.parent().parent().addClass('has-error');
			return;
		}else{
			notes_lang.parent().parent().removeClass('has-error');
			result +='*';
		}

		// done
		if (result == "********************")
		{
			$.ajax({
				type:'ajax',
				method:'post',
				url:"<?php echo base_url() ?>Studentmarks/addnewmark_lang",
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#myForm_lang')[0].reset();
						$('.alert-success').html('Added new successfully.').fadeIn().delay(4000).fadeOut('slow');
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
					}
				},
				error:function(){
					$('#myForm_mark')[0].reset();
				}
			});
		}
			
	});

	// insert international education
	$('#btnSave_mark_int').click(function(){
		var data = $('#myForm_int').serialize();

		// vaidation
		var type_name_add_int = $('select[name=type_name_add_int]');
		var academic_name_add_int = $('select[name=academic_name_add_int]');
		var student_name_add_int = $('select[name=student_name_add_int]');
		var fullmark_int = $('input[name=fullmark_int]');
		var eng_al_int = $('input[name=eng_al_int]');
		var arabic_int = $('input[name=arabic_int]');
		var math_int = $('input[name=math_int]');
		var science_int = $('input[name=science_int]');
		var social_int = $('input[name=social_int]');
		var f_g_int = $('input[name=f_g_int]');
		var total_int = $('input[name=total_int]');
		var score_int = $('input[name=score_int]');
		var percentage_int= $('input[name=percentage_int]');
		var religion_int = $('input[name=religion_int]');
		var notes_int = $('input[name=notes_int]');

		var result = '';

		if (type_name_add_int.val() == '') {
			type_name_add_int.parent().parent().addClass('has-error');
			return;
		}else{
			type_name_add_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (academic_name_add_int.val() == '') {
			academic_name_add_int.parent().parent().addClass('has-error');
			return;
		}else{
			academic_name_add_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (student_name_add_int.val() == '') {
			student_name_add_int.parent().parent().addClass('has-error');
			return;
		}else{
			student_name_add_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (fullmark_int.val() == '') {
			fullmark_int.parent().parent().addClass('has-error');
			return;
		}else{
			fullmark_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (eng_al_int.val() == '') {
			eng_al_int.parent().parent().addClass('has-error');
			return;
		}else{
			eng_al_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (arabic_int.val() == '') {
			arabic_int.parent().parent().addClass('has-error');
			return;
		}else{
			arabic_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (math_int.val() == '') {
			math_int.parent().parent().addClass('has-error');
			return;
		}else{
			math_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (science_int.val() == '') {
			science_int.parent().parent().addClass('has-error');
			return;
		}else{
			science_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (social_int.val() == '') {
			social_int.parent().parent().addClass('has-error');
			return;
		}else{
			social_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (f_g_int.val() == '') {
			f_g_int.parent().parent().addClass('has-error');
			return;
		}else{
			f_g_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (total_int.val() == '') {
			total_int.parent().parent().addClass('has-error');
			return;
		}else{
			total_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (score_int.val() == '') {
			score_int.parent().parent().addClass('has-error');
			return;
		}else{
			score_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (percentage_int.val() == '') {
			percentage_int.parent().parent().addClass('has-error');
			return;
		}else{
			percentage_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (religion_int.val() == '') {
			religion_int.parent().parent().addClass('has-error');
			return;
		}else{
			religion_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		if (notes_int.val() == '') {
			notes_int.parent().parent().addClass('has-error');
			return;
		}else{
			notes_int.parent().parent().removeClass('has-error');
			result +='*';
		}

		// done
		if (result == "***************")
		{
			$.ajax({
				type:'ajax',
				method:'post',
				url:"<?php echo base_url() ?>Studentmarks/addnewmark_int",
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#myForm_int')[0].reset();
						$('.alert-success').html('Added new successfully.').fadeIn().delay(4000).fadeOut('slow');
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
					}
				},
				error:function(){
					$('#myForm_int')[0].reset();
				}
			});
		}
			
	});
  	// imprt data fron excel sheet
	$("#import_form").on("submit",function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>Excel_import/import_studentmarks",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cashe:false,
			processData:false,
			success: function(data)
			{
				$("#file").val('');
				$('.alert-success').html(data).fadeIn().delay(4000).fadeOut('slow');
				load_administrator_data(1);
				
			}
		});
	});	
	// search
	function searchData(page) 
	{
		// get word search
		var division_id = $('select[name=divisionID]');
		var grade_id = $('select[name=gradeID]');
		var academicyear_id = $('select[name=yearID]');
		var examtype_id = $('select[name=examtype]');
		$.ajax({
			url:'<?php echo base_url() ?>Studentmarks/pagination_search/' + page,
			method:'get',
			data:{divi:division_id.val(),gra:grade_id.val(),year:academicyear_id.val(),extype:examtype_id.val()},
			dataType:'json',
			success:function(data){
				$('#mark_table').html(data.mark_table);
				$('#mark_pagination_link').html(data.mark_pagination_link);
			}
		});
	}	

	// select education
	$('#education_id').on('change', function(){
		var edu = $(this).val();  //set country = country_id
		
		if (edu == 'Language') // is empty
		{
			$('#int').fadeOut();
			$('#lang').fadeIn();
		}
		else // is not empty
		{
			
			$('#lang').fadeOut();
			$('#int').fadeIn();
		}
	});	
	// add
	$('#btnAdd_mark').click(function(){
		
		// language education
		// load division
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Studentmarks/retrivedivision',
			dataType:'json',
			success:function(data)
			{
				$('#division_id_add_lang').html(data);
			}
		});
		// load grades
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Studentmarks/retrivegrade',
			dataType:'json',
			success:function(data)
			{
				$('#grade_id_add_lang').html(data);
			}
		});
		// load acadmic year
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Studentmarks/retriveacadmicyear',
			dataType:'json',
			success:function(data)
			{
				$('#academic_id_add_lang').html(data);
			}
		});

		// international education
		// load division
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Studentmarks/retrivedivision',
			dataType:'json',
			success:function(data)
			{
				$('#division_id_add_int').html(data);
			}
		});
		// load grades
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Studentmarks/retrivegrade',
			dataType:'json',
			success:function(data)
			{
				$('#grade_id_add_int').html(data);
			}
		});
		// load acadmic year
		$.ajax({
			type:'ajax',
			url:'<?php echo base_url() ?>Studentmarks/retriveacadmicyear',
			dataType:'json',
			success:function(data)
			{
				$('#academic_id_add_int').html(data);
			}
		});		
	});	
	// ================== LANGUAGE EDUCATION ===================
	// load room for adding
	$('#division_id_add_lang').on('change', function(){
		var gradeID = $('select[name=grade_name_add_lang]').val();
		var divisionID = $(this).val();  //set country = country_id
		
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#room_id_add_lang').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#room_id_add_lang').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Student/get_room", // method that will get data
				type:"POST",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'gradeID' : gradeID, 'divisionID' : divisionID},
				dataType: 'json',
				success: function(data){
					$('#room_id_add_lang').html(data);
				},
				error: function(){
					$('#room_id_add_lang').prop('disabled', true); // set disable
				}
			});
		}
	});
	$('#grade_id_add_lang').on('change', function(){
		var divisionID = $('select[name=division_name_add_lang]').val();
		var gradeID = $(this).val();  //set country = country_id
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#room_id_add_lang').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#room_id_add_lang').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Student/get_room", // method that will get data
				type:"POST",
				data:{'gradeID_add' : gradeID, 'divisionID_add' : divisionID}, // gradeID_add,divisionID_add are post
				dataType: 'json',
				success: function(data){
					$('#room_id_add_lang').html(data);
				},
				error: function(){
					$('#room_id_add_lang').prop('disabled', true); // set disable
				}
			});
		}
	});	
	// load students
	$('#room_id_add_lang').on('change',function(){
		var room_id = $(this).val();
		if (room_id == '') {
			$('#student_id_add_lang').prop('disabled', true); // set disable
		}
		else{
			$('#student_id_add_lang').prop('disabled', false);	// set enable
			// load students using ajax
			$.ajax({
				url:"<?php echo base_url() ?>Studentmarks/get_student", // method that will get data
				type:"get",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'room_id' : room_id},
				dataType: 'json',
				success: function(data){
					$('#student_id_add_lang').html(data);
				},
				error: function(){
					$('#student_id_add_lang').prop('disabled', true); // set disable
				}
			});			
		}
	})	
	// =========================================================


	// ================== INTERNATIONAL EDUCATION ===================
	// load room for adding
	$('#division_id_add_int').on('change', function(){
		var gradeID = $('select[name=grade_name_add_int]').val();
		var divisionID = $(this).val();  //set country = country_id
		
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#room_id_add_int').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#room_id_add_int').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Student/get_room", // method that will get data
				type:"POST",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'gradeID' : gradeID, 'divisionID' : divisionID},
				dataType: 'json',
				success: function(data){
					$('#room_id_add_int').html(data);
				},
				error: function(){
					$('#room_id_add_int').prop('disabled', true); // set disable
				}
			});
		}
	});
	$('#grade_id_add_int').on('change', function(){
		var divisionID = $('select[name=division_name_add_int]').val();
		var gradeID = $(this).val();  //set country = country_id
		if (gradeID == '' && divisionID == '') // is empty
		{
			$('#room_id_add_int').prop('disabled', true); // set disable
		}
		else // is not empty
		{
			$('#room_id_add_int').prop('disabled', false);	// set enable
			//using 
			$.ajax({
				url:"<?php echo base_url() ?>Student/get_room", // method that will get data
				type:"POST",
				data:{'gradeID_add' : gradeID, 'divisionID_add' : divisionID}, // gradeID_add,divisionID_add are post
				dataType: 'json',
				success: function(data){
					$('#room_id_add_int').html(data);
				},
				error: function(){
					$('#room_id_add_int').prop('disabled', true); // set disable
				}
			});
		}
	});	
	// load students
	$('#room_id_add_int').on('change',function(){
		var room_id = $(this).val();
		if (room_id == '') {
			$('#student_id_add_int').prop('disabled', true); // set disable
		}
		else{
			$('#student_id_add_int').prop('disabled', false);	// set enable
			// load students using ajax
			$.ajax({
				url:"<?php echo base_url() ?>Studentmarks/get_student", // method that will get data
				type:"get",
				//data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
				data:{'room_id' : room_id},
				dataType: 'json',
				success: function(data){
					$('#student_id_add_int').html(data);
				},
				error: function(){
					$('#student_id_add_int').prop('disabled', true); // set disable
				}
			});			
		}
	})	
	// =========================================================

	// ================ LANGUAGE ADD ===============================
	// english o level
	$('#eng_al_id_lang').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang]').val() * 1;
		var arabic = $('input[name=arabic_lang]').val() * 1;
		var math = $('input[name=math_lang]').val() * 1;
		var science = $('input[name=science_lang]').val() * 1;
		var social = $('input[name=social_lang]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang]').val() * 1;
		var f_g = $('input[name=f_g_lang]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang').val('Failed') ;			
		}		
	});
	// arabic
	$('#arabic_id_lang').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang]').val() * 1;
		var arabic = $('input[name=arabic_lang]').val() * 1;
		var math = $('input[name=math_lang]').val() * 1;
		var science = $('input[name=science_lang]').val() * 1;
		var social = $('input[name=social_lang]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang]').val() * 1;
		var f_g = $('input[name=f_g_lang]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang').val('Failed') ;			
		}				
	});	
	// math
	$('#math_id_lang').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang]').val() * 1;
		var arabic = $('input[name=arabic_lang]').val() * 1;
		var math = $('input[name=math_lang]').val() * 1;
		var science = $('input[name=science_lang]').val() * 1;
		var social = $('input[name=social_lang]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang]').val() * 1;
		var f_g = $('input[name=f_g_lang]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang').val('Failed') ;			
		}			
	});	
	// science
	$('#science_id_lang').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang]').val() * 1;
		var arabic = $('input[name=arabic_lang]').val() * 1;
		var math = $('input[name=math_lang]').val() * 1;
		var science = $('input[name=science_lang]').val() * 1;
		var social = $('input[name=social_lang]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang]').val() * 1;
		var f_g = $('input[name=f_g_lang]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang').val('Failed') ;			
		}			
	});	
	// social
	$('#social_id_lang').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang]').val() * 1;
		var arabic = $('input[name=arabic_lang]').val() * 1;
		var math = $('input[name=math_lang]').val() * 1;
		var science = $('input[name=science_lang]').val() * 1;
		var social = $('input[name=social_lang]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang]').val() * 1;
		var f_g = $('input[name=f_g_lang]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang').val('Failed') ;			
		}			
	});	
	// english o level
	$('#eng_ol_id_lang').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang]').val() * 1;
		var arabic = $('input[name=arabic_lang]').val() * 1;
		var math = $('input[name=math_lang]').val() * 1;
		var science = $('input[name=science_lang]').val() * 1;
		var social = $('input[name=social_lang]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang]').val() * 1;
		var f_g = $('input[name=f_g_lang]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang').val('Failed') ;			
		}						
	});	
	// f/g
	$('#f_g_id_lang').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang]').val() * 1;
		var arabic = $('input[name=arabic_lang]').val() * 1;
		var math = $('input[name=math_lang]').val() * 1;
		var science = $('input[name=science_lang]').val() * 1;
		var social = $('input[name=social_lang]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang]').val() * 1;
		var f_g = $('input[name=f_g_lang]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang').val('Failed') ;			
		}				
	});	
	// ==========================================================
	
	// ================ LANGUAGE UPDATE ===============================
	// english o level
	$('#eng_al_id_lang_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang_update]').val() * 1;
		var arabic = $('input[name=arabic_lang_update]').val() * 1;
		var math = $('input[name=math_lang_update]').val() * 1;
		var science = $('input[name=science_lang_update]').val() * 1;
		var social = $('input[name=social_lang_update]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang_update]').val() * 1;
		var f_g = $('input[name=f_g_lang_update]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang_update').val('Failed') ;			
		}		
	});
	// arabic
	$('#arabic_id_lang_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang_update]').val() * 1;
		var arabic = $('input[name=arabic_lang_update]').val() * 1;
		var math = $('input[name=math_lang_update]').val() * 1;
		var science = $('input[name=science_lang_update]').val() * 1;
		var social = $('input[name=social_lang_update]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang_update]').val() * 1;
		var f_g = $('input[name=f_g_lang_update]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang_update').val('Failed') ;			
		}						
	});	
	// math
	$('#math_id_lang_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang_update]').val() * 1;
		var arabic = $('input[name=arabic_lang_update]').val() * 1;
		var math = $('input[name=math_lang_update]').val() * 1;
		var science = $('input[name=science_lang_update]').val() * 1;
		var social = $('input[name=social_lang_update]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang_update]').val() * 1;
		var f_g = $('input[name=f_g_lang_update]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang_update').val('Failed') ;			
		}						
					
	});	
	// science
	$('#science_id_lang_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang_update]').val() * 1;
		var arabic = $('input[name=arabic_lang_update]').val() * 1;
		var math = $('input[name=math_lang_update]').val() * 1;
		var science = $('input[name=science_lang_update]').val() * 1;
		var social = $('input[name=social_lang_update]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang_update]').val() * 1;
		var f_g = $('input[name=f_g_lang_update]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang_update').val('Failed') ;			
		}			
	});	
	// social
	$('#social_id_lang_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang_update]').val() * 1;
		var arabic = $('input[name=arabic_lang_update]').val() * 1;
		var math = $('input[name=math_lang_update]').val() * 1;
		var science = $('input[name=science_lang_update]').val() * 1;
		var social = $('input[name=social_lang_update]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang_update]').val() * 1;
		var f_g = $('input[name=f_g_lang_update]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang_update').val('Failed') ;			
		}					
	});	
	// english o level
	$('#eng_ol_id_lang_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang_update]').val() * 1;
		var arabic = $('input[name=arabic_lang_update]').val() * 1;
		var math = $('input[name=math_lang_update]').val() * 1;
		var science = $('input[name=science_lang_update]').val() * 1;
		var social = $('input[name=social_lang_update]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang_update]').val() * 1;
		var f_g = $('input[name=f_g_lang_update]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang_update').val('Failed') ;			
		}							
	});	
	// f/g
	$('#f_g_id_lang_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_lang_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_lang_update]').val() * 1;
		var arabic = $('input[name=arabic_lang_update]').val() * 1;
		var math = $('input[name=math_lang_update]').val() * 1;
		var science = $('input[name=science_lang_update]').val() * 1;
		var social = $('input[name=social_lang_update]').val() * 1;
		var eng_ol = $('input[name=eng_ol_lang_update]').val() * 1;
		var f_g = $('input[name=f_g_lang_update]').val() * 1;
		total = eng_al + arabic + math + science + social + eng_ol + f_g;
		$('#total_id_lang_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_lang_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_lang_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_lang_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_lang_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_lang_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_lang_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_lang_update').val('Failed') ;			
		}					
	});	
	// ==========================================================

	// ================ INTERNATIONAL ADD ===============================
	// english o level
	$('#eng_al_id_int').keyup(function(event){
		var fullmark = $('input[name=fullmark_int]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int]').val() * 1;
		var arabic = $('input[name=arabic_int]').val() * 1;
		var math = $('input[name=math_int]').val() * 1;
		var science = $('input[name=science_int]').val() * 1;
		var social = $('input[name=social_int]').val() * 1;
		var f_g = $('input[name=f_g_int]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int').val('Failed') ;			
		}		
	});
	// arabic
	$('#arabic_id_int').keyup(function(event){
		var fullmark = $('input[name=fullmark_int]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int]').val() * 1;
		var arabic = $('input[name=arabic_int]').val() * 1;
		var math = $('input[name=math_int]').val() * 1;
		var science = $('input[name=science_int]').val() * 1;
		var social = $('input[name=social_int]').val() * 1;
		var f_g = $('input[name=f_g_int]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int').val('Failed') ;			
		}					
	});	
	// math
	$('#math_id_int').keyup(function(event){
		var fullmark = $('input[name=fullmark_int]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int]').val() * 1;
		var arabic = $('input[name=arabic_int]').val() * 1;
		var math = $('input[name=math_int]').val() * 1;
		var science = $('input[name=science_int]').val() * 1;
		var social = $('input[name=social_int]').val() * 1;
		var f_g = $('input[name=f_g_int]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int').val('Failed') ;			
		}				
	});	
	// science
	$('#science_id_int').keyup(function(event){
		var fullmark = $('input[name=fullmark_int]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int]').val() * 1;
		var arabic = $('input[name=arabic_int]').val() * 1;
		var math = $('input[name=math_int]').val() * 1;
		var science = $('input[name=science_int]').val() * 1;
		var social = $('input[name=social_int]').val() * 1;
		var f_g = $('input[name=f_g_int]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int').val('Failed') ;			
		}				
	});	
	// social
	$('#social_id_int').keyup(function(event){
		var fullmark = $('input[name=fullmark_int]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int]').val() * 1;
		var arabic = $('input[name=arabic_int]').val() * 1;
		var math = $('input[name=math_int]').val() * 1;
		var science = $('input[name=science_int]').val() * 1;
		var social = $('input[name=social_int]').val() * 1;
		var f_g = $('input[name=f_g_int]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int').val('Failed') ;			
		}				
	});	
	// f/g
	$('#f_g_id_int').keyup(function(event){
		var fullmark = $('input[name=fullmark_int]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int]').val() * 1;
		var arabic = $('input[name=arabic_int]').val() * 1;
		var math = $('input[name=math_int]').val() * 1;
		var science = $('input[name=science_int]').val() * 1;
		var social = $('input[name=social_int]').val() * 1;
		var f_g = $('input[name=f_g_int]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int').val('Failed') ;			
		}					
	});	
	// ==========================================================	

		// ================ INTERNATIONAL UPDATE ===============================
	// english o level
	$('#eng_al_id_int_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_int_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int_update]').val() * 1;
		var arabic = $('input[name=arabic_int_update]').val() * 1;
		var math = $('input[name=math_int_update]').val() * 1;
		var science = $('input[name=science_int_update]').val() * 1;
		var social = $('input[name=social_int_update]').val() * 1;
		var f_g = $('input[name=f_g_int_update]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int_update').val('Failed') ;			
		}		
	});
	// arabic
	$('#arabic_id_int_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_int_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int_update]').val() * 1;
		var arabic = $('input[name=arabic_int_update]').val() * 1;
		var math = $('input[name=math_int_update]').val() * 1;
		var science = $('input[name=science_int_update]').val() * 1;
		var social = $('input[name=social_int_update]').val() * 1;
		var f_g = $('input[name=f_g_int_update]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int_update').val('Failed') ;			
		}					
	});	
	// math
	$('#math_id_int_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_int_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int_update]').val() * 1;
		var arabic = $('input[name=arabic_int_update]').val() * 1;
		var math = $('input[name=math_int_update]').val() * 1;
		var science = $('input[name=science_int_update]').val() * 1;
		var social = $('input[name=social_int_update]').val() * 1;
		var f_g = $('input[name=f_g_int_update]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int_update').val('Failed') ;			
		}				
	});	
	// science
	$('#science_id_int_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_int_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int_update]').val() * 1;
		var arabic = $('input[name=arabic_int_update]').val() * 1;
		var math = $('input[name=math_int_update]').val() * 1;
		var science = $('input[name=science_int_update]').val() * 1;
		var social = $('input[name=social_int_update]').val() * 1;
		var f_g = $('input[name=f_g_int_update]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int_update').val('Failed') ;			
		}				
	});	
	// social
	$('#social_id_int_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_int_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int_update]').val() * 1;
		var arabic = $('input[name=arabic_int_update]').val() * 1;
		var math = $('input[name=math_int_update]').val() * 1;
		var science = $('input[name=science_int_update]').val() * 1;
		var social = $('input[name=social_int_update]').val() * 1;
		var f_g = $('input[name=f_g_int_update]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int_update').val('Failed') ;			
		}				
	});	
	// f/g
	$('#f_g_id_int_update').keyup(function(event){
		var fullmark = $('input[name=fullmark_int_update]').val() * 1;
		var total = "";
		var eng_al = $('input[name=eng_al_int_update]').val() * 1;
		var arabic = $('input[name=arabic_int_update]').val() * 1;
		var math = $('input[name=math_int_update]').val() * 1;
		var science = $('input[name=science_int_update]').val() * 1;
		var social = $('input[name=social_int_update]').val() * 1;
		var f_g = $('input[name=f_g_int_update]').val() * 1;
		total = eng_al + arabic + math + science + social + f_g;
		$('#total_id_int_update').val(total) ;

		var result = (total / fullmark) * 100;
		$('#percentage_id_int_update').val(Math.round(result) + ' %');

		// score
		if (result >= 95) 
		{
			$('#score_id_int_update').val('A*') ;			
		}

		if (result >= 85 & result < 94) 
		{
			$('#score_id_int_update').val('A') ;			
		}	

		if (result >= 75 & result < 84) 
		{
			$('#score_id_int_update').val('B') ;			
		}	

		if (result >= 65 & result < 74) 
		{
			$('#score_id_int_update').val('C') ;			
		}	

		if (result >= 50 & result < 64) 
		{
			$('#score_id_int_update').val('D') ;			
		}

		if (result < 50) 
		{
			$('#score_id_int_update').val('Failed') ;			
		}					
	});	
	// ==========================================================	

</script>
