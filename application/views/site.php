<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<!--
		Middle east international schools
		
		-->
		<?php foreach ($records as $record): ?>
			<title><?php echo $record->sitename; ?></title>	
		<?php endforeach; ?>
		
				
		<meta name="description" content="">
		<meta name="author" content="">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="<?php echo base_url();?>public/logo/logo.ico">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/site/css/animate.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/site/css/owl.theme.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/site/css/owl.carousel.css">

		<!-- Main css -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/site/css/style.css">

		<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>

		<!-- Jquery Library -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	</head>
	<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">
		<!-- =========================
		     PRE LOADER       
		============================== -->
		<div class="preloader">
			<div class="sk-rotating-plane"></div>
		</div>		
		<!-- =========================
		NAVIGATION LINKS     
		============================== -->
		<div class="navbar navbar-fixed-top custom-navbar" role="navigation">
			<div class="container">

				<!-- navbar header -->
				<div class="navbar-header">
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
					</button>
					<?php foreach ($records as $record): ?>
						<a href="#" class="navbar-brand"><?php echo $record->sitename_shortcut; ?></a>
					<?php endforeach; ?>					
				</div>

				<div class="collapse navbar-collapse">

					<ul class="nav navbar-nav navbar-right">
						<li><a href="#intro" class="smoothScroll">Intro</a></li>
						<li><a href="#program" class="smoothScroll">About MEIS</a></li>
						<li><a href="#speakers" class="smoothScroll">British Classes</a></li>
						<li><a href="#meisdivision" class="smoothScroll">Divisions</a></li>
						<!-- <li><a href="<?php echo base_url(); ?>Pages/supplies" class="smoothScroll">Supplies</a></li> -->
						<li><a href="#register" class="smoothScroll">Contacts</a></li>
						<!-- <li><a href="<?php echo base_url(); ?>Pages/job" class="smoothScroll">Jobs</a></li> -->
						<li><a href="<?php echo base_url(); ?>Page/load_login"  class="smoothScroll">Login</a></li>
					</ul>

				</div>

			</div>
		</div>
		<!-- =========================
		    INTRO SECTION   
		============================== -->
		<section id="intro" class="parallax-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<img width="120" height="120" src="<?php echo base_url();?>public/logo/logo.ico">
					</div>
					<div class="col-md-12 col-sm-12">
						<h3 class="wow bounceIn" data-wow-delay="0.9s">Middle East International Schools</h3>
						<h1 class="wow fadeInUp" data-wow-delay="1.6s">Authentic British Education</h1>
					</div>


				</div>
			</div>
		</section>
		<!-- =========================

		ABOUT MEIS SECTION   
		============================== -->
		<section id="program" class="parallax-section">
			<div class="container">
				<div class="row">

					<div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.6s">
						<div class="section-title">
							<h2>ABOUT MEIS</h2>
							<p>Middle East schools founded in 2013. MEIS has a uniquely atmosphere where its students feel like they are part of bigger family</p>
						</div>
					</div>

					<div class="wow fadeInUp col-md-10 col-sm-10" data-wow-delay="0.9s">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Vision</a></li>
							<li><a href="#sday" aria-controls="sday" role="tab" data-toggle="tab">Mission</a></li>
							<li><a href="#tday" aria-controls="tday" role="tab" data-toggle="tab">Philosophy</a></li>
						</ul>
						<!-- tab panes -->
						<div class="tab-content">

							<div role="tabpanel" class="tab-pane active" id="fday">
								<!-- program speaker here -->
								<div class="col-md-2 col-sm-2">
									<img src="<?php echo base_url();?>public/site/images/program-img1.jpg" class="img-responsive" alt="program">
								</div>
								<div class="col-md-10 col-sm-10">
									<p>We are and will be a school where design and social research drive approaches to studying issues of our time, such as democracy, urbanization, technological change, economic empowerment, sustainability, migration, and globalization. We will be the preeminent intellectual and creative school for effective engagement in a world that increasingly demands better-designed objects, communication, systems, and organizations to meet social needs</p>
								</div>

							</div>

							<div role="tabpanel" class="tab-pane" id="sday">
								<!-- program speaker here -->
								<div class="col-md-2 col-sm-2">
									<img src="<?php echo base_url();?>public/site/images/program-img4.jpg" class="img-responsive" alt="program">
								</div>
								<div class="col-md-10 col-sm-10">
									<p>• MEIS aims to contribute in creating a wonderful world by working on improving its student’s skills.<br>
    								• MEIS education respects national as well as international cultures and histories.<br>
    								• MEIS seeks to develop future leaders who are tolerant, reflective, creative and disciplined.<br>
								    • MEIS creates value through embracing all, teachers, students, in an atmosphere of genuine care and love. </p>
								</div>

								
							</div>

							<div role="tabpanel" class="tab-pane" id="tday">
								<!-- program speaker here -->
								<div class="col-md-2 col-sm-2">
									<img src="<?php echo base_url();?>public/site/images/program-img7.jpg" class="img-responsive" alt="program">
								</div>
								<div class="col-md-10 col-sm-10">
									<p>Our focus at MEIS is our students. We endeavor to provide a balanced education that encompasses 'academic excellence' on the one hand, and ‘moral and ethical values’ on the other, thus our students acquire the tools and ethos necessary to soar through this challenging life with the benefit of both wings.
									Our balanced system of pedagogy is implemented by our caring, competent staff who, not only are dedicated to our students’ academic excellence, but also present themselves as role models to the children.</p>
								</div>
							</div>
						</div>
					</div>
			</div>
		</section>			
		<!-- =========================
		BRITISH CLASSES SECTION   
		============================== -->
		<section id="speakers" class="parallax-section">
			<div class="container">
				<div class="row">

					<div class="col-md-12 col-sm-12 wow bounceIn">
						<div class="section-title">
							<h2>British Classes</h2>
							<!-- <p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p> -->
						</div>
					</div>

					<!-- Testimonial Owl Carousel section
					================================================== -->
					<div id="owl-speakers" class="owl-carousel">

						<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
							<div class="speakers-wrapper">
								<div class="british-classes block1">
									<h3>Etiquette</h3>
       								<p>Always try to be positive rather than negative when instructing you child.<br> Instead of asking them to don't do something, ask them to do the opposite.<br> For example, instead of telling your child never to be rude, tell them always to be polite.</p>
								</div>
								
							</div>
						</div>

						<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
							<div class="speakers-wrapper">
								<div class="british-classes block2">
									<h3>Montessori</h3>
	   								<p>A great education begins with a great kindergarten experience, so now we have a motor skills programs with separates sessions in the schedule. P re-kindergartners benefit from experiences that support the development of fine motor skills in the hands and fingers. Children should have strength and dexterity in their hands and fingers before being asked to manipulate a pencil on paper.
	 							</p>
								</div>	
							</div>
						</div>

						<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
							<div class="speakers-wrapper">
								<div class="british-classes block3">
									<h3>Meditation</h3>
							    	<p>This is like a course that will make a great results with them, and match smarter.<br>
							    	according to yogic science, it takes 40 days to fully develop a new health-remoting habit or
							    	drop any negative destrcutive habit, Practice Yoga every day for 40 days straight and break through any
							    	limiting beliefs that block you from experiencing your total Radiant self!</p>
								</div>
							</div>
						</div>

						<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
							<div class="speakers-wrapper">
								<div class="british-classes block4">
									<h3>Sports Acadmic</h3>
       								<p>Physical exercise is good for mind, body and spirit. Furthermore, team sports are good for learning accountability, dedication, and leadership, among many other traits. Putting it all together by playing a sport is a winning combination.</p>
								</div>		
							</div>
						</div>

						
					</div>

				</div>
			</div>
		</section>
		<!-- =========================
		    DIVISIONS SECTION   
		============================== -->
		<section id="meisdivision" class="parallax-section">
			<div class="container">
				<div class="row">
					<div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.6s">
						<div class="section-title">
							<h2>Divisions</h2>
						</div>
					</div>

					<div class="wow fadeInUp col-md-10 col-sm-10" data-wow-delay="0.9s">

						<!-- tab panes -->
						<div class="tab-content">

							<div role="tabpanel" class="tab-pane active">
								<!-- program speaker here -->
								<div class="col-md-2 col-sm-2">
									<img src="<?php echo base_url();?>public/site/images/program1.jpg" class="img-responsive" alt="program">
								</div>
								<div class="col-md-10 col-sm-10">
									<h3>British Division</h3>
									<p>The world of higher education is changing and the world in which higher education plays a significant role is changing. The international dimension of higher education is becoming increasingly important. It is therefore timely to reexamine and update the conceptual frameworks underpinning the notion of inter-nationalization in light of today’s changes and challenges. </p>
								</div>

								<!-- program divider -->
								<div class="program-divider col-md-12 col-sm-12"></div>

								<!-- program speaker here -->
								<div class="col-md-2 col-sm-2">
									<img src="<?php echo base_url();?>public/site/images/program2.jpg" class="img-responsive" alt="program">
								</div>
								<div class="col-md-10 col-sm-10">
									<h3>Semi-International Division</h3>
									<h4>Why should you choose Semi International Division?</h4>
									<p>
										1- In Semi International division we have the International English curriculum. <br>
										2- Conversation sessions.<br>
										3- Semi International teachers are allowed to attend Cambridge training courses.<br>
										4- Semi International students attend the physics and chemistry sessions in our well prepared laboratories.<br>
										5- Physical Education (PE) (Two sessions per week): Semi International Students are allowed to join the football. Academy for one of these sessions For the second sessions students are allowed to join the self defiance academy as well. </p>
								</div>

								<!-- program divider -->
								<div class="program-divider col-md-12 col-sm-12"></div>

								<!-- program speaker here -->
								<div class="col-md-2 col-sm-2">
									<img src="<?php echo base_url();?>public/site/images/program3.jpg" class="img-responsive" alt="program">
								</div>
								<div class="col-md-10 col-sm-10">
									<h3>National Division</h3>
									<p>The national division level has an important influence on the international dimensions through policy, funding, programs, and regulatory frameworks. Yet it is usually at the institutional level that the real process of internationalization is taking place.</p>
								</div>
							</div>

						</div>

				</div>
			</div>
		</section>			
		<!-- =========================
		MEIS CERMONIES SECTION   
		============================== -->
		<section id="detail" class="parallax-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 wow bounceIn">
						<div class="section-title">
							<h2>MEIS Cermonies</h2>
						</div>
					</div>
					<?php foreach ($records as $record): ?>
						<title><?php echo $record->sitename; ?></title>	

						<div class="wow fadeInLeft col-md-4 col-sm-4" data-wow-delay="0.3s">
							<iframe  src="<?php echo $record->link1; ?>" frameborder="0" allowfullscreen></iframe>
	    					<p>MEIS graduation ceremony promo 1 2016-2017</p>
						</div>

						<div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.6s">
							<iframe  src="<?php echo $record->link2; ?>" frameborder="0" allowfullscreen></iframe>
	    					<p>MEIS graduation ceremony promo 2 2016-2017</p>
						</div>

						<div class="wow fadeInRight col-md-4 col-sm-4" data-wow-delay="0.9s">
							<iframe  src="<?php echo $record->link3; ?>" frameborder="0" allowfullscreen></iframe>
	      					<p>Mother's Day part a 2016-2017</p>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</section>

		<!-- =========================
		WELCOME SECTION   
		============================== -->
		<section id="overview" class="parallax-section">
			<div class="container">
				<div class="row">

					<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s">
						<h3>Welcome to Middle East Schools Official Website</h3>
						<p>A high-quality education gives students a wider choice and better chances in college and university. <br>
						In these pages, you can learn more about MEIS, the curriculum, extracurricular activities, facilities, and requirements for admission, registration procedures, and other aspects of the schools that may be of interest to you.</p>
					</div>
							
					<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.9s">
						<h3>Welcome message of the School Chairman</h3>
						<p>Welcome message of the school Chairman:
          				Thank you for taking an interest in Middle East International School (MIES) founded in 2013.
          				We are very proud to offer our students, of all nationalities, a quality international education.<br>
          				MEIS represents and develops the student's national identities and prepares them with the skills and knowledge needed to contribute in making their world a better place.<br>
          				Looking forward to welcoming you in our horizon, seeking for brilliant future.<br><br>
          				<span style="font-family: Brush Script MT,serif; font-size: 18px;">Dr. Mohammed Shanan</span></p>
					</div>

				</div>
			</div>
		</section>
		<!-- =========================
		SCHOOL POLICIES SECTION   
		============================== -->
		<section id="faq" class="parallax-section">
			<div class="container">
				<div class="row">

					<!-- Section title
					================================================== -->
					<div class="wow bounceIn col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 text-center">
						<div class="section-title">
							<h2>School Policies</h2>
							<p>We do have our rules<p>
						</div>
					</div>

					<div class="wow fadeInUp col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10" data-wow-delay="0.9s">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

		  					<div class="panel panel-default">
		   						<div class="panel-heading" role="tab" id="headingOne">
		      						<h4 class="panel-title">
		        						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
		          							 Uniform Policy
		        						</a>
		      						</h4>
		    					</div>
		   						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
		      						<div class="panel-body">
		        						<p>All MEIS students wear uniforms to help themselves develop sense of belonging and commitment to the school community. The school uniform is important for our discipline policy, helping us maintain high standers of behaviour and achievement. </p>
		      						</div>
		   						 </div>
		 					</div>

		    				<div class="panel panel-default">
		   						<div class="panel-heading" role="tab" id="headingTwo">
		      						<h4 class="panel-title">
		        						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		          							Transportation System Policy
		        						</a>
		      						</h4>
		    					</div>
		   						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		      						<div class="panel-body">
		                            	<p>1. Parents are responsible for supervising over their children between home and the school bus collection point in the morning and afternoon.<br>
										2. Parents are responsible for letting the children arrive at the collection point 5 minutes earlier than the scheduled pick-up-time.<br>
										3. Buses will not wait for students more than 5 minutes.<br>
										4. If there is nobody to pick up the student, he/she will be returned to school and parents will be requested to pick them up from school.<br>
										5. Changing the child’s route (for any reason) requires a clearly- written message from the parent to be sent to school before 12 pm to take the proper measures.<br>
										6. No changes in routes are accepted except for emergency cases or with the approval of the principal/ Management.<br>
										7. Students should be fully informed of the school buses policy and the expected behavior for taking the bus to school.<br>
										8. Buses drivers mustn’t be distracted by students’ misbehaviors, and if any violation of the rules take place, students may be temporarily/ permanently suspended from using the transportation system. </p>
		      						</div>
		   						 </div>
		 					</div>

		 					<div class="panel panel-default">
		   						<div class="panel-heading" role="tab" id="headingThree">
		      						<h4 class="panel-title">
		        						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		          							Policy of using School Computers
		        						</a>
		      						</h4>
		    					</div>
		   						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		      						<div class="panel-body">
		                            	<p>MEIS encourages all staff and students to use the computer laboratory. Students are not allowed to interfere in any setup of any programs or hardware’s or changing the system configurations. Students aren't allowed to use other users' logon or password.
										Students are not allowed to violate any law related to copyright or privacy. Students are not allowed to intentionally damage any computer hardware or furnishings. Students are not allowed to give someone else’s personal information or even spread rumors about them. </p>
		      						</div>
		   						 </div>
		 					 </div>

		 					<div class="panel panel-default">
		   						<div class="panel-heading" role="tab" id="headingFour">
		      						<h4 class="panel-title">
		        						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
		          							Policy of using School Library
		        						</a>
		      						</h4>
		    					</div>
		   						<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
		      						<div class="panel-body">
		                            	<p>The school library is a vital teaching and learning environment in the school . In compliance with the school policy, the students must stick to the following rules: </p>
		        						<p>
									    1- Silence must be observed at all times.<br>
									    2- Food and beverages and juice are prohibited.<br>
									    3- Head phones and other devices are not permitted.<br>
									    4- Disrespectable language against any library personnel is not acceptable.<br>
									    5- Only note books needed for study may be brought inside the library.<br>
									    6- Students must look after books, never tear them or marking inside it.<br>
									    7- Students should leave the library clean, tidy and bush their chairs to desks.<br>
									    8- In case of borrowing students have to return the borrowed books on the due date but if he or she delay books for long time, they have to pay the current price of the book.<br>
									</p>
		      						</div>
		   						 </div>
		 					 </div>

		    				<div class="panel panel-default">
		   						<div class="panel-heading" role="tab" id="headingFive">
		      						<h4 class="panel-title">
		        						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
		          							Lost and Found Policy
		        						</a>
		      						</h4>
		    					</div>
		   						<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
		      						<div class="panel-body">
		                            	<p>1- Labelling the children's possessions is a must to easily locate the lost item.<br>
										2- Children should learn not to bring any valuable items to the school.<br>
										3- The lost and found box will be located in the head department office.<br>
										4- Children are encouraged to be responsible for their own belongings and the school is 5- not to be blamed for any lost property.<br>
										6- If the lost item is not claimed within a year, it will be donated to charity.</p>
		      						</div>
		   						 </div>
		 					</div>

		 					<div class="panel panel-default">
		   						<div class="panel-heading" role="tab" id="headingSix">
		      						<h4 class="panel-title">
		        						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
		          							School Visitors Policy
		        						</a>
		      						</h4>
		    					</div>
		   						<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
		      						<div class="panel-body">
		                            	<p>It is the policy of our school to ensure safety for all guests and students.
										Visitors are welcome in the school but they must sign in at the school gate and leave their ID with the Security Team.
										Students are not allowed to have non-student guests to school premises unless parents take permission from the Vice Principal. </p>
		      						</div>
		   						 </div>
		 					 </div>
		 				 </div>
					</div>

				</div>
			</div>
		</section>
		<!-- =========================
		   CONTACTS SECTION   
		============================== -->
		<section id="register" class="parallax-section" style="background: url('<?php echo base_url();?>public/site/images/register_bg.jpg') 50% 0 repeat-y fixed;">
			<div class="container">
				<div class="row">

					<div class="wow fadeInUp col-md-7 col-sm-7" data-wow-delay="0.6s">
						<h2>Contacts</h2>
			            <form>
	            			<?php foreach ($records as $record): ?>
								<title><?php echo $record->sitename; ?></title>	
							
				                <legend style="color: peachpuff;"><?php echo $record->sitename_contacts; ?></legend>
				                <address>
				                    <strong>Address</strong><br>
				                    <?php echo $record->address; ?><br>
				                    <abbr title="Phone">
				                    <strong>Phone: </strong></abbr><?php echo $record->phone; ?>
				                    <br>
				                    <abbr title="Phone">
				                    <strong>Mobile 1: </strong></abbr><?php echo $record->mob1; ?> <br>
				                    <strong>Mobile 2: </strong></abbr><?php echo $record->mob2; ?>
				                </address>
				                <address>
				                    <strong>Email</strong><br>
				                    <a href="mailto:'.<?php echo $record->email; ?>.'"><?php echo $record->email; ?></a>
				                </address>
			                <?php endforeach; ?>
			            </form>
					</div>

					<div class="wow fadeInUp col-md-5 col-sm-5" data-wow-delay="1s">
						<form id="myForm" accept-charset="UTF-8" action="" method="POST">
							<input name="name" type="text" class="form-control" id="firstname" placeholder="Name">
							<input name="email" type="email" class="form-control" id="email" placeholder="Email Address">
                       		<select name="subject" class="form-control" required="required">
                                <option value="" selected="">Select Subject</option>
                                <option value="Inqueries">Inqueries</option>
                                <option value="Suggestions">Suggestions</option>
                                <option value="Complaints">Complaints</option>
                            </select>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                  placeholder="Message"></textarea>


						</form>
							<div class="col-md-offset-6 col-md-6 col-sm-offset-1 col-sm-10">
								<input name="submit" type="submit" class="form-control" id="btnSave" value="SEND MESSAGE">
							</div>						
					</div>

					<div class="col-md-1"></div>

				</div>
			</div>
		</section>
		<!-- =========================
		    SPONSORS SECTION   
		============================== -->
		<section id="sponsors" class="parallax-section">
			<div class="container">
				<div class="row">

					<div class="wow bounceIn col-md-12 col-sm-12">
						<div class="section-title">
							<h2>Our Sponsors</h2>
						</div>
					</div>

					<div class="wow fadeInUp col-md-4 col-sm-6 col-xs-6" data-wow-delay="0.3s">
						<img src="<?php echo base_url();?>public/site/images/sponsor1.jpg" class="img-responsive" alt="sponsors">	
					</div>

					<div class="wow fadeInUp col-md-4 col-sm-6 col-xs-6" data-wow-delay="0.6s">
						<img src="<?php echo base_url();?>public/site/images/sponsor2.jpg" class="img-responsive" alt="sponsors">	
					</div>

					<div class="wow fadeInUp col-md-4 col-sm-6 col-xs-6" data-wow-delay="0.9s">
						<img src="<?php echo base_url();?>public/site/images/sponsor3.jpg" class="img-responsive" alt="sponsors">	
					</div>
				</div>
			</div>
		</section>
		<!-- =========================
		    FOOTER SECTION   
		============================== -->
		<footer>
			<div class="container">
				<div class="row">

					<div class="col-md-12 col-sm-12">
						<p class="wow fadeInUp" data-wow-delay="0.6s">Copyright &copy; 2017 Middle East Schools 
		                    
		                    | Design: <a rel="nofollow" href="#" target="_parent">Amr Ali Hssan</a></p>

						<ul class="social-icon">
							<li><a target="_blank" href="https://www.facebook.com/MiddleEastInternationalSchools/" class="fa fa-facebook wow fadeInUp" data-wow-delay="1s"></a></li>
						</ul>

					</div>
					
				</div>
			</div>
		</footer>
		<!-- Back top -->
		<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>


	<script type="text/javascript">
		$('#btnSave').click(function(){
		    var url = 'Contact/addnew';
		    var data = $('#myForm').serialize();
		    // validation
		    var email = $('input[name=email]');
		    var subject = $('select[name=subject]');
		    var message = $('textarea[name=message]');
		    var name = $('input[name=name]');
		    var result = '';

		    if (email.val() == '') {
		      email.parent().parent().addClass('has-error');
		      return;
		    }else{
		      email.parent().parent().removeClass('has-error');
		      result +='1';
		    }
		     if (subject.val() == '') {
		      subject.parent().parent().addClass('has-error');
		      return;
		    }else{
		      subject.parent().parent().removeClass('has-error');
		      result +='2';
		    }
		     if (message.val() == '') {
		      message.parent().parent().addClass('has-error');
		      return;
		    }else{
		      message.parent().parent().removeClass('has-error');
		      result +='3';
		    }
		     if (name.val() == '') {
		      name.parent().parent().addClass('has-error');
		      return;
		    }else{
		      name.parent().parent().removeClass('has-error');
		      result +='4';
		    }
		    if (result == '1234') {
		      $.ajax({
		        type:'ajax',
		        method:'post',
		        url:'<?php base_url(); ?>' + url,
		        data:data,
		        async:false,
		        dataType:'json',
		        success:function(response){
		          if (response.success) {
					$('#myForm')[0].reset();
		           alert('Message Sent');
		            $('.alert-success').html('Message Sent.').fadeIn().delay(4000).fadeOut('slow');
		          }else{
		            
		          }
		        }
		      });
		    }
		  });
 		function run(path){
	        <?php 
	          if ($this->session->userdata('logged_in')==True) {
	            //$this->session->sess_destroy();
	            redirect ('Login');
	          }
	         ?>
              $.ajax({
	                type:'ajax',
	                method:'get',
	                url:'<?php echo base_url(); ?>'+path,
	                async:false,
	                dataType:'json',
	                success:function(response){
	                  $('#myslideshow').html('');
	                  // title page
	                  $('#myTitle').html(response.title);
	                  // page content
	                  $('#page').hide();
	                  $('#page').html(response.page);
	                  $('#page').fadeIn('slow');

	                  var html='';
	                  var i;
	                  for(i=0; i <response.records.length; i++)
	                  {
	                    html += '<tr><td><b>'+response.records[i].gradeName +'</b></td><td><b>'+ response.records[i].ig +'</b></td><td><b>'+ response.records[i].semi +'</b></td><td><b>'+ response.records[i].na +'</b></td></tr>';
	                  }
	                  $('#showdata').html(html);
	          

	                },
	                error:function(){
	                  // alert('failed to load page title');

	                }
              });
            }
	</script>

		<!-- SCRIPTS -->   
		<!-- ============================== --> 
		<script src="<?php echo base_url();?>public/site/js/jquery.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>public/site/js/jquery.parallax.js"></script>
		<script src="<?php echo base_url();?>public/site/js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url();?>public/site/js/smoothscroll.js"></script>
		<script src="<?php echo base_url();?>public/site/js/wow.min.js"></script>
		<script src="<?php echo base_url();?>public/site/js/custom.js"></script>

	</body>
</html>