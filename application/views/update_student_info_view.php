<!DOCTYPE html>
<html lang="ar" dir="rtl">
	<head>
	    <title>شاشة تحديث البيانات</title>
	    <meta charset="utf-8">

	    <!-- for animation -->
	    <link rel="stylesheet" href="<?php echo base_url();?>public/site/css/animate.css">
	    <!-- w3 -->
	    <link href="<?php echo base_url();?>public/dist/css/w3.css" rel="stylesheet">

	    <link href="<?php echo base_url();?>public/vendor/bootstrap/css/w3.css" rel="stylesheet">
	    <!-- Bootstrap Core CSS -->
	    <link href="<?php echo base_url();?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    	<link rel="shortcut icon" href="<?php echo base_url();?>public/logo/logo.ico">

	    <!-- Custom Fonts -->
	    <link href="<?php echo base_url();?>public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	    <link href="<?php echo base_url();?>public/fonts/arabic_fonts.css" rel="stylesheet" type="text/css">

	    <!-- Jquery Library -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	    <!-- Custom CSS -->
	    <link href="<?php echo base_url();?>public/dist/css/sb-admin-2.css" rel="stylesheet">    
	</head>
	<body style="background-color: #39638c;">
		<div class="container" style="margin-top: 30px;margin-bottom:30px;background-color: #fff; border-radius: 7px;padding: 25px;">
			<!-- header image -->
			<div class="row">
				<div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.6s">
					<div>
						<img width="100%" src="<?php echo base_url();?>public/images/update_info.jpg" alt="Banner">
					</div>
				</div>
			</div>
			<!-- message title -->
			<h3 align="center" style="font-weight: bold;">قسم شئون الطلبة / تحديث بيانات الطالب</h3>
			<div class="row">
				<div class="col-lg-12 pull-right">
		            <div class="alert w3-panel w3-sand">
		            	<h4>الرجاء تحديث بيانات الطالب في موعد اقصاه يوم الخميس الموافق 2018/9/20 وذلك لعمل اﻻي دي الخاص بالطلاب</h4>  
		            </div>
				</div>
			</div>
			<!-- message alert -->
			<div class="row">
				<div class="col-lg-12 pull-right">
					<div class="alert alert-success w3-panel w3-green" style="display: none; font-size: 15px;"></div>
					<div class="alert alert-danger w3-panel w3-red" style="display: none;font-size: 15px;"></div>
				</div>
			</div>	
			<!-- button registration -->
			<div class="row">
				<div class="col-lg-12 pull-right">
					<button onclick="document.getElementById('id01').style.display='block'"  id="new_register" class="w3-btn w3-blue w3-round w3-large">التسجيل في موقع المدرسة</button>
				</div>
			</div>				
			<br>
			<!-- inputs -->
			<div class="row">
				<div class="col-lg-12 pull-right">
					<form action="" method="" id="myform">
						<fieldset>
					    	<legend style="color: red;">بيانات الطالب</legend>
					    	<div class="row">
					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>اسم الطالب</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="student_name" id="student_name">						    			
					    		</div>
					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>اسم الوالد</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="father_name" id="father_name">						    			
					    		</div>	
					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>اسم الجد</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="grand_name" id="grand_name">						    			
					    		</div>
					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>اللقب</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="last_name" id="last_name">						    			
					    		</div>					    							    						    		
					    	</div>
					    	<br>
							<div class="row">
								<div class="col-lg-12 col-sm-12 pull-right">
						  			<label class="w3-text-black"><b>اسم الطالب باللغة اﻻنجليزية</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="student_english_name" id="student_english_name">									
								</div>
							</div>					    	
					    	<br>
					    	<div class="row">
					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>النوع</b></label>
						            <select class="w3-select w3-border" name="gender">
						                <option value="">-- اختر --</option> 	
						                <option value="ذكر">ذكر</option> 	
						                <option value="انثى">انثى</option> 	
						            </select>						    			
					    		</div>
					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>الديانة</b></label>
						            <select class="w3-select w3-border" name="religion">
						                <option value="">-- اختر --</option> 	
						                <option value="مسلم / مسلمه">مسلم / مسلمه</option> 	
						                <option value="مسيحي / مسيحيه">مسيحي / مسيحيه</option> 	
						            </select>						    			
					    		</div>					    		
					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>تاريخ الميلاد</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="date" name="date_birth">						    			
					    		</div>

					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>الجنسية</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="nationality" id="nationality">						    			
					    		</div>					    							    							    		
					    	</div>
					    	<br>
					    	<div class="row">
					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>الرقم القومي للطالب</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="student_idcard" id="student_idcard">						    			
					    		</div>
					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>القسم</b></label>
						            <select class="w3-select w3-border" name="division">
						                <option value="">-- اختر --</option> 	
						                <option value="الدولي البريطانية">الدولي البريطانية</option> 	
						                <option value="سمي انترناشونال">سمي انترناشونال</option> 	
						                <option value="ناشونال">ناشونال</option> 	
						            </select>						    			
					    		</div>					    		
					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>المرحلة</b></label>
						            <select class="w3-select w3-border" name="grade">
						                <option value="">-- اختر --</option> 	
						                <option value="تمهيدي رياض اطفال">تمهيدي رياض اطفال</option> 	
						                <option value="اﻻول رياض اطفال">اﻻول رياض اطفال</option> 	
						                <option value="الثاني رياض اطفال">الثاني رياض اطفال</option> 	
						                <option value="اﻻول اﻻبتدائي">اﻻول اﻻبتدائي</option> 	
						                <option value="الثاني اﻻبتدائي">الثاني اﻻبتدائي</option> 	
						                <option value="الثالث اﻻبتدائي">الثالث اﻻبتدائي</option> 	
						                <option value="الرابع اﻻبتدائي">الرابع اﻻبتدائي</option> 	
						                <option value="الخامس اﻻبتدائي">الخامس اﻻبتدائي</option> 	
						                <option value="السادس اﻻبتدائي">السادس اﻻبتدائي</option> 	
						                <option value="اﻻول اﻻعدادي">اﻻول اﻻعدادي</option> 	
						                <option value="الثاني اﻻعدادي">الثاني اﻻعدادي</option> 	
						                <option value="الثالث اﻻعدادي">الثالث اﻻعدادي</option> 	
						                <option value="اﻻول الثانوي">اﻻول الثانوي</option> 	
						                <option value="الثاني الثانوي">الثاني الثانوي</option> 	
						                <option value="الثالث الثانوي">الثالث الثانوي</option> 	
						            </select>						    			
					    		</div>

					    		<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>اللغة الثانية</b></label>
						            <select class="w3-select w3-border" name="second_language">
						                <option value="">-- اختر --</option> 	
						                <option value="اللغة الفرنسية">اللغة الفرنسية</option> 	
						                <option value="اللغة اﻻلمانية">اللغة اﻻلمانية</option> 	
						            </select>							    			
					    		</div>					    							    							    		
					    	</div>
					    	<br>					    	
						</fieldset>	
						<br>
						<fieldset>
							<legend style="color: red;">بيانات ولي اﻻمر</legend>
							<div class="row">
								<div class="col-lg-6 col-sm-6 pull-right">
						  			<label class="w3-text-black"><b>الرقم القومي للوالد</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="father_idcard" id="father_idcard">										
								</div>
								<div class="col-lg-6 col-sm-6" pull-right>
						  			<label class="w3-text-black"><b>وظيفة الوالد</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="father_job" id="father_job">									
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-2 col-sm-2 pull-right">
						  			<label class="w3-text-black"><b>رقم العقار</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="home_no">										
								</div>
								<div class="col-lg-4 col-sm-4 pull-right">
						  			<label class="w3-text-black"><b>اسم الشارع</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="streat_name" id="streat_name">									
								</div>
								<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>الحي / المنطقة</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="area" id="area">									
								</div>
								<div class="col-lg-3 col-sm-3 pull-right">
						  			<label class="w3-text-black"><b>المحافظة</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="government" id="government">									
								</div>																
							</div>	
							<br>
							<div class="row">
								<div class="col-lg-12 col-sm-12 pull-right">
						  			<label class="w3-text-black"><b>اسم اﻻم ثلاثي</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="mother_name" id="mother_name">									
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-4 col-sm-4 pull-right">
						  			<label class="w3-text-black"><b>هاتف المنزل</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="home_phone" id="home_phone">										
								</div>
								<div class="col-lg-4 col-sm-4 pull-right">
						  			<label class="w3-text-black"><b>رقم موبايل الوالد</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="father_mobile" id="father_mobile">									
								</div>
								<div class="col-lg-4 col-sm-4 pull-right">
						  			<label class="w3-text-black"><b>رقم موبايل الوالدة</b></label>
						  			<input class="w3-input w3-border w3-light-grey" type="text" name="mother_mobile" id="mother_mobile">									
								</div>																
							</div>	
							<br>	
							<div class="row">
								<div class="col-lg-2 pull-right">
									<label class="w3-text-black"><b>تحميل صورة الطالب</b></label>
								</div>
								<div class="col-lg-10 pull-right">
									<a href="#" data-toggle="tooltip" title="Upload image"><label for="file_name" class="input-label btn btn-info"><i class="fa fa-upload fa-2x"></i></label></a> 
									<input style="display: none;" type="file" name="file_name" id="file_name">	
									<span id="label_file" style="display: none; font-size: 15px; color: #0f56a7;line-height: 2;background-color: #e0e6ec;padding: 5px;border-radius: 5px;"></span>								
								</div>												
							</div>															
						</fieldset>							  									
					</form>						
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-12">
						<button class="w3-btn w3-green w3-medium w3-round" id="btn_save">حفظ</button>	
				</div>
			</div>
			<br>	
		</div>	

		<!-- register model -->
		<div id="id01" class="w3-modal w3-animate-opacity">
		    <div class="w3-modal-content w3-card-4">
		      <header class="w3-container w3-blue"> 
		      	<br>
		        <h2 class="modal-title">التسجيل في موقع المدرسة</h2>
		        <br>
		      </header>
		      <div class="w3-container">
				<!-- message alert -->
				<div class="row">
					<div class="col-lg-12 pull-right">
						<div class="alert alert-success2 w3-panel w3-green" style="display: none; font-size: 15px;"></div>
						<div class="alert alert-danger2 w3-panel w3-red" style="display: none;font-size: 15px;"></div>
					</div>
				</div>		      	
		      	<form action="" method="post" id="form_registraiton">
		      		<br>
					<div class="row">
						<div class="col-sm-12 col-lg-12 pull-right">
				  			<label class="w3-text-black"><b>الرقم القومي للوالد</b></label>
				  			<input class="w3-input w3-border w3-light-grey" type="text" name="father_idcard_registrtion" id="father_idcard_registrtion">										
						</div>
					</div>
					<br>		      	
					<div class="row">
						<div class="col-sm-12 col-lg-12 pull-right">
				  			<label class="w3-text-black"><b>البريد اﻻلكتروني</b></label>
				  			<input class="w3-input w3-border w3-light-grey" type="email" name="email">										
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12 col-lg-12 pull-right">
				  			<label class="w3-text-black"><b>كلمة المرور</b></label>
				  			<input class="w3-input w3-border w3-light-grey" type="password" name="password">										
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12 col-lg-12 pull-right">
				  			<label class="w3-text-black"><b>تأكيد كلمة المرور</b></label>
				  			<input class="w3-input w3-border w3-light-grey" type="password" name="passwordc">										
						</div>
					</div>			      		
		      	</form>
		      </div>
		      <footer class="w3-container">
		      	<br>
		      	<button type="button" id="btnRegister" class="w3-btn w3-green w3-medium">تسجيل</button>
				<button type="button" class="w3-btn w3-red w3-medium" onclick="document.getElementById('id01').style.display='none'">الغاء</button><br><br>
		      </footer>
		    </div>
		</div>  
		<script type="text/javascript">
			
		    $('#file_name').on('change',function(e){
		        var filename = e.target.value.split("\\").pop();
		        $('#label_file').fadeIn();
		        $('#label_file').text(filename);
		    });	

		    $('#btnRegister').click(function(){
				var url = '<?php echo base_url() ?>Student_info/add_new_registration';
				var data = $('#form_registraiton').serialize();
				  // validation
			    var father_idcard_registrtion = $('input[name=father_idcard_registrtion]');
			    var email = $('input[name=email]');	
			    var password = $('input[name=password]');
			    var passwordc = $('input[name=passwordc]');	

				if (father_idcard_registrtion.val() == '') {
	            	$('.alert-danger2').html('الرجاء ادخال الرقم القومي للوالد').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}

				if (email.val() == '') {
	            	$('.alert-danger2').html('الرجاء ادخال البريد اﻻلكتروني').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}

				if (password.val() == '') {
	            	$('.alert-danger2').html('الرجاء ادخال كلمة المرور').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}

				if (passwordc.val() == '') {
	            	$('.alert-danger2').html('الرجاء ادخال تأكيد كلمة المرور').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (password.val() != passwordc.val())
				 {
	            	$('.alert-danger2').html('كلمة المرور ﻻ تطابق تأكيد كلمة المرور').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 				 	
				 }
					var exist = '';
					// check exist
			  		$.ajax({
			  			type:'ajax',
			  			method:'get',
			  			url:'<?php echo base_url() ?>Student_info/getdatabyid_registration',
			  			data:{id:father_idcard_registrtion.val()},
			  			async:false,
			  			dataType:'json',
			  			success:function(data){
			  				if (data) 
			  				{
				            	$('.alert-danger2').html('تم تسجيل البريد اﻻلكتروني مسبقا').fadeIn().delay(4000).fadeOut();
		                    	// go to top page
		                    	$('html, body').animate({ scrollTop: 0 }, 0);	

		                    	exist = true;
			  				}
			  				else{exist = false;}
			  			}
			  		});	
			  		if (exist == false) 
			  		{
						$.ajax({
							type:'ajax',
							method:'post',
							url:url,//action
							data:data,
							async:false,
							dataType:'json',
							success:function(response){
								if (response.success) {
									$('#form_registraiton')[0].reset();
									// go to top page
		                			$('.alert-success2').html('تم تسجيل بياناتك بنجاح').fadeIn().delay(4000).fadeOut();
			                    	// go to top page
			                    	$('html, body').animate({ scrollTop: 0 }, 0);	
         							$('#form_registraiton').modal('hide');
								}
							},
							error:function(){
								$('#form_registraiton')[0].reset();
							}		

						});				  			
			  		}																				    					    	
		    })

			// add
			$('#btn_save').click(function(){
				var url = '<?php echo base_url() ?>Student_info/add_student_information';
				var data = new FormData(document.getElementById("myform"));
				  // validation
			    var student_name = $('input[name=student_name]');
			    var father_name = $('input[name=father_name]');	
			    var grand_name = $('input[name=grand_name]');
			    var last_name = $('input[name=last_name]');
			    var student_english_name = $('input[name=student_english_name]');
				var gender = $('select[name=gender]');
				var religion = $('select[name=religion]');
			    var date_birth = $('input[name=date_birth]');	
			    var nationality = $('input[name=nationality]');
			    var student_idcard = $('input[name=student_idcard]');
				var division = $('select[name=division]');
				var grade = $('select[name=grade]');
			    var second_language = $('select[name=second_language]');	
			    var father_idcard = $('input[name=father_idcard]');
			    var father_job = $('input[name=father_job]');
				var home_no = $('input[name=home_no]');
				var streat_name = $('input[name=streat_name]');
			    var area = $('input[name=area]');	
			    var government = $('input[name=government]');
			    var mother_name = $('input[name=mother_name]');
				var home_phone = $('input[name=home_phone]');
				var father_mobile = $('input[name=father_mobile]');
				var mother_mobile = $('input[name=mother_mobile]');


				if (student_name.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال اسم الطالب').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (father_name.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال اسم الوالد').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (grand_name.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال اسم الجد').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (last_name.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال اﻻسم اﻻخير').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (student_english_name.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال اسم الطالب باللغة اﻻنجليزية').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}				
				if (gender.val() == '') {
	            	$('.alert-danger').html('الرجاء اختيار النوع').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (religion.val() == '') {
	            	$('.alert-danger').html('الرجاء اختيار الديانة').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (date_birth.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال تاريخ الميلاد').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (nationality.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال الجنسية').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (student_idcard.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال الرقم القومي للطالب').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (division.val() == '') {
	            	$('.alert-danger').html('الرجاء اختيار القسم').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (grade.val() == '') {
	            	$('.alert-danger').html('الرجاء اختيار المرحلة').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (second_language.val() == '') {
	            	$('.alert-danger').html('الرجاء اختيار اللغة الثانية').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (father_idcard.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال الرقم القومي للوالد').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
			    if (father_job.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال وظيفة الوالد').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (home_no.val() == '') {
	            	$('.alert-danger').html('الرجاء تحديد رقم العقار').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (streat_name.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال اسم الشارع').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
				if (area.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال اسم المنطقة او الحي').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
			    if (government.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال المحافظة').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
			    if (mother_name.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال اسم اﻻم').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
			    if (father_mobile.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال رقم موبايل الوالد').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return; 
				}
			    if (mother_mobile.val() == '') {
	            	$('.alert-danger').html('الرجاء ادخال رقم موبايل الوالدة').fadeIn().delay(4000).fadeOut();
                	// go to top page
                	$('html, body').animate({ scrollTop: 0 }, 0);
			      	return;                	
				}				
				var file = document.getElementById('file_name').files[0]; //userfile file tag id
		            if (file) {
		                data.append('file_name', file);
		            }
		            else
		            {
		            	$('.alert-danger').html('الرجاء ارفاق صورة الطالب').fadeIn().delay(4000).fadeOut();
                    	// go to top page
                    	$('html, body').animate({ scrollTop: 0 }, 0);		            	
		            }		            
					var exist = '';
					// check exist
			  		$.ajax({
			  			type:'ajax',
			  			method:'get',
			  			url:'<?php echo base_url() ?>Student_info/getdatabyid',
			  			data:{id:student_idcard.val()},
			  			async:false,
			  			dataType:'json',
			  			success:function(data){
			  				if (data) 
			  				{
				            	$('.alert-danger').html('تم تسجيل بيانات الطالب مسبقا').fadeIn().delay(4000).fadeOut();
		                    	// go to top page
		                    	$('html, body').animate({ scrollTop: 0 }, 0);	

		                    	exist = true;
			  				}
			  				else{exist = false;}
			  			}
			  		});	
			  		if (exist == false) 
			  		{
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
									$('#myform')[0].reset();
									// go to top page
		                			$('.alert-success').html('تم تسجيل بياناتك بنجاح').fadeIn().delay(4000).fadeOut();
			                    	// go to top page
			                    	$('html, body').animate({ scrollTop: 0 }, 0);	
			                    	$('#label_file').fadeOut();	            	

								}
							},
							error:function(){
								$('#myform')[0].reset();
							}		

						});				  			
			  		}					
			});	

			// Numeric only control handler
			jQuery.fn.ForceNumericOnly =
			function()
			{
			    return this.each(function()
			    {
			        $(this).keydown(function(e)
			        {
			            var key = e.charCode || e.keyCode || 0;
			            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
			            // home, end, period, and numpad decimal
			            return (
			                key == 8 || 
			                key == 9 ||
			                key == 13 ||
			                key == 46 ||
			                key == 110 ||
			                key == 190 ||
			                (key >= 35 && key <= 40) ||
			                (key >= 48 && key <= 57) ||
			                (key >= 96 && key <= 105));
			        });
			    });
			};	
			$("#home_phone").ForceNumericOnly();										    		
			$("#father_mobile").ForceNumericOnly();										    		
			$("#mother_mobile").ForceNumericOnly();										    		
			$("#father_idcard").ForceNumericOnly();										    		
			$("#student_idcard").ForceNumericOnly();

			// // Allow text box only for letters
		 //    $("#student_name").keypress(function(event){
		 //        var inputValue = event.charCode;
		 //        //alert(inputValue);
		 //        if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
		 //            event.preventDefault();
		 //        }
		 //    });		
		 //    $("#father_name").keypress(function(event){
		 //        var inputValue = event.charCode;
		 //        //alert(inputValue);
		 //        if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
		 //            event.preventDefault();
		 //        }
		 //    });	
		 //    $("#grand_name").keypress(function(event){
		 //        var inputValue = event.charCode;
		 //        //alert(inputValue);
		 //        if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
		 //            event.preventDefault();
		 //        }
		 //    });	
		 //    $("#last_name").keypress(function(event){
		 //        var inputValue = event.charCode;
		 //        //alert(inputValue);
		 //        if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
		 //            event.preventDefault();
		 //        }
		 //    });	
		 //    $("#student_english_name").keypress(function(event){
		 //        var inputValue = event.charCode;
		 //        //alert(inputValue);
		 //        if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
		 //            event.preventDefault();
		 //        }
		 //    });	
		 //    $("#nationality").keypress(function(event){
		 //        var inputValue = event.charCode;
		 //        //alert(inputValue);
		 //        if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
		 //            event.preventDefault();
		 //        }
		 //    });	
		 //    $("#father_job").keypress(function(event){
		 //        var inputValue = event.charCode;
		 //        //alert(inputValue);
		 //        if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
		 //            event.preventDefault();
		 //        }
		 //    });	
		 //    $("#streat_name").keypress(function(event){
		 //        var inputValue = event.charCode;
		 //        //alert(inputValue);
		 //        if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
		 //            event.preventDefault();
		 //        }
		 //    });	
		 //    $("#area").keypress(function(event){
		 //        var inputValue = event.charCode;
		 //        //alert(inputValue);
		 //        if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
		 //            event.preventDefault();
		 //        }
		 //    });	
		 //    $("#government").keypress(function(event){
		 //        var inputValue = event.charCode;
		 //        //alert(inputValue);
		 //        if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
		 //            event.preventDefault();
		 //        }
		 //    });	
		 //    $("#mother_name").keypress(function(event){
		 //        var inputValue = event.charCode;
		 //        //alert(inputValue);
		 //        if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
		 //            event.preventDefault();
		 //        }
		 //    });											    		
		</script>


		<!-- SCRIPTS -->   
		<!-- ============================== --> 
		<script src="<?php echo base_url();?>public/site/js/jquery.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>