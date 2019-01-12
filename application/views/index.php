<!DOCTYPE html>
<html lang="ar" dir="ltr">
	<head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title id="pagetitle"></title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <script type="text/javascript" src="<?php echo base_url();?>public/dist/js/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/Ionicons/css/ionicons.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
      <!-- Select2 -->
      <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/select2/dist/css/select2.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/skins/_all-skins.min.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap-daterangepicker/daterangepicker.css">      
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="<?php echo base_url();?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="<?php echo base_url();?>public/plugins/iCheck/flat/blue.css">    
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">            
	    <!-- logo -->
	    <link rel="shortcut icon" href="<?php echo base_url();?>public/logo/logo.ico">
      <link href="multiple-select.css" rel="stylesheet"/>
		  <!-- custom css -->
		  <link href="<?php echo base_url();?>public/dist/css/style.css" rel="stylesheet"> 
      <style type="text/css">
          /* Paste this css to your style sheet file or under head tag */
          /* This only works with JavaScript, 
          if it's not present, don't show loader */
          /*.no-js #loader { display: none;  }*/
          /*.js #loader { display: block; position: absolute; left: 100px; top: 0; }*/
          .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(<?php echo base_url('public/images/loader-64x/Preloader_7.gif') ?>) center no-repeat #fff;        }
      </style>     
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
  <!-- loading -->

  <audio autoplay>
    <source src="<?php echo base_url();?>public/sound/new_msg.mp3" type="audio/mpeg">
  </audio>    

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" onclick="autoload();" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MEIS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Middle East </b>Schools</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success" id="num_msg"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span id="num_msg2"></span> messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <div id="last_messages">
               
                </div>

              </li>
              <li class="footer"><a href="#" onclick="inbox();">See All Messages</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>public/dist/img/<?php echo $_SESSION['photo']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['fullName']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>public/dist/img/<?php echo $_SESSION['photo']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['fullName']; ?> - <?php echo $_SESSION['job']; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#"  onclick="userProfile();" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url("Logout"); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>public/dist/img/<?php echo $_SESSION['photo']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['fullName']; ?></p>
          <div id="connection"></div>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->


      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Dashboard -->
          <li>
            <a href="#" onclick="autoload();">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>      
        <!-- Post -->
          <li>
            <a href="#" onclick="load_last_notification();">
              <i class="fa fa-commenting"></i> <span>Post</span>
            </a>
          </li>   
          <?php if ($_SESSION['mail']) { ?>
        <!-- Mail Box -->
          <li>
            <a href="#" onclick="inbox();">
              <i class="fa fa-envelope"></i> <span>Mailbox</span>
            </a>
          </li>   
          <?php } ?>                  
        <!-- change password -->
          <li>
            <a href="#" onclick="chpass();">
              <i class="fa fa-lock"></i> <span>Change Password</span>
            </a>
          </li>
          <?php if ($_SESSION['accounts']) { ?>  
        <!-- accounts -->          
          <li class="header">Accounts</li>                      
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Accounts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#" onclick="adminusers();"><i class="fa fa-circle-o"></i> Users</a></li>
              <li><a href="#" onclick="studentusers();"><i class="fa fa-circle-o"></i> Students</a></li>
            </ul>
          </li>
          <?php } ?>              
        <!-- parents service -->
          
          <?php if ($_SESSION['payments']) { ?>    
          <li class="header">Parents Services</li>                 
        <!-- payments -->
          <li>
            <a href="#" onclick="payments();">
              <i class="fa fa-credit-card"></i> <span>Payments</span>
            </a>
          </li>   
          <?php } ?>      
        <!-- agenda -->
        <?php if ($_SESSION['agenda']) { ?>
          <li>
            <a href="#" onclick="agenda();">
              <i class="fa fa-flag"></i> <span>Agenda</span>
            </a>
          </li>   
          <?php } ?>      
        <!-- attandance -->
        <?php if ($_SESSION['attendance']) { ?>
          <li>
            <a href="#" onclick="loadstudent_information();">
              <i class="fa fa-table"></i> <span>Attendance</span>
            </a>
          </li>       
          <?php } ?>  
        <!-- trsportation -->
        <?php if ($_SESSION['transportation']) { ?>
          <li>
            <a href="#" onclick="transportation();">
              <i class="fa fa-bus"></i> <span>Trasportation</span>
            </a>
          </li>      
          <?php } ?>   
        <!-- calendar -->
        <?php if ($_SESSION['calendar']) { ?>
          <li>
            <a href="#" onclick="calendar();">
              <i class="fa fa-calendar-o"></i> <span>Calendar</span>
            </a>
          </li>      
          <?php } ?>   
        <!-- homework -->
        <?php if ($_SESSION['homework']) { ?>
        <!-- student service -->
          <li class="header">Student Services</li>            
          <li>
            <a href="#" onclick="homework();">
              <i class="fa fa-book"></i> <span>Homework</span>
            </a>
          </li>         
        <?php } ?>
        <!-- extra sheets -->
        <?php if ($_SESSION['sheets']) { ?>
          <li>
            <a href="#" onclick="sheet();">
              <i class="fa fa-files-o"></i> <span>Extra Sheets</span>
            </a>
          </li>         
        <?php } ?>
        <!-- exam -->
        <?php if ($_SESSION['exam']) { ?>
          <li>
            <a href="#" onclick="exam();">
              <i class="fa fa-edit"></i> <span>Exam</span>
            </a>
          </li>         
        <?php } ?>
        <!-- marks -->
        <?php if ($_SESSION['marks']) { ?>
          <li>
            <a href="#" onclick="allmarks();">
              <i class="fa fa-check-square-o"></i> <span>Marks</span>
            </a>
          </li>         
        <?php } ?>
        <!-- lecture schedule -->
        <?php if ($_SESSION['timetable']) { ?>
          <li>
            <a href="#" onclick="lecture();">
              <i class="fa fa-check-square-o"></i> <span>Lecture Schedule</span>
            </a>
          </li>   
        <?php } ?>
             
        <!-- jobs -->
        <?php if ($_SESSION['accounts']) { ?>
          <!-- others -->
          <li class="header">Other Services</li>              
          <li>
            <a href="#" onclick="jobs();">
              <i class="fa fa-briefcase"></i> <span>Jobs</span>
            </a>
          </li>         
        <?php } ?>
        <!-- student information -->        
        <?php if ($_SESSION['accounts']) { ?>
          <li>
            <a href="#" onclick="studentInformation();">
              <i class="fa fa-graduation-cap"></i> <span>Student Information</span>
            </a>
          </li>         
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="se-pre-con"></div>
    <!-- Main content -->
    <section id="page-content">
      <div class="se-pre-con"></div>
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="#">Amr Ali Hassan</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#" data-toggle="tab">General Settings</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Set Website Settings</h3>
        <ul class="control-sidebar-menu">
          <!-- Main settings -->
          <li>
            <a href="#" onclick="main_settings();">
              <i class="menu-icon fa fa-gears bg-red"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Main Settings</h4>
                <p>Set website settings.</p>
              </div>
            </a>
          </li>
          <!-- Division -->
          <li>
            <a href="#" onclick="division();">
              <i class="menu-icon fa fa-puzzle-piece  bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Division</h4>

                <p>Create new division</p>
              </div>
            </a>
          </li>
          <!-- grade -->
          <li>
            <a href="#" onclick="grade();">
              <i class="menu-icon fa fa-graduation-cap  bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Grade</h4>

                <p>Create new grade</p>
              </div>
            </a>
          </li>
          <!-- Classroom -->
          <li>
            <a href="#" onclick="classroom();">
              <i class="menu-icon fa fa-graduation-cap   bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Classroom</h4>

                <p>Add new room.</p>
              </div>
            </a>
          </li>
          <!-- Subjects -->
          <li>
            <a href="#" onclick="subject();">
              <i class="menu-icon fa fa-book bg-orange"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Subjects</h4>

                <p>Add new subject.</p>
              </div>
            </a>
          </li>  
          <!-- holidays -->
          <li>
            <a href="#" onclick="holidays();">
              <i class="menu-icon fa fa-book bg-teal"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Holidays</h4>

                <p>Add holidays</p>
              </div>
            </a>
          </li>              
          <!-- join teacher -->
          <li>
            <a href="#" onclick="join_teacher();">
              <i class="menu-icon fa fa-user bg-maroon"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Join Teacher</h4>
                <p>Join teacher to divsion, grade and classroom</p>
              </div>
            </a>
          </li>             
          <!-- Academic year -->
          <li>
            <a href="#" onclick="academic_year();">
              <i class="menu-icon fa fa-calendar bg-navy"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Academic Year</h4>
                <p>Create new academic year.</p>
              </div>
            </a>
          </li>          
        </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
<div class="control-sidebar-bg"></div>
</div>     

    <script type="text/javascript">
    auto_refresh_msg();

      autoload();
      $( document ).ready(function() {$(".se-pre-con").fadeOut("slow"); });
      
      // refresh page
      setInterval("auto_refresh_msg();",20000);
      function auto_refresh_msg()
      {

          loading_num_msg();
          update_last_activity();
          load_last_messages(1);   
           if(navigator.onLine){
            $('#connection').html('<h6><i class="fa fa-circle text-success"></i> Online</h6>');
           } else {
            $('#connection').html('<h6><i class="fa fa-circle text-danger"></i> Offline</h6>');
           }                
      } 
      auto_refresh_msg();   
      function load_last_messages(page) {
          $.ajax({
              url:'<?php echo base_url() ?>Administrator/pagination_last_messages/' + page,
              method:'get',
              dataType:'json',
              success:function(data){
                  $('#last_messages').html(data.last_messages);
              }
          });
      }    
      // update last activity
      function update_last_activity()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Login/updatelastactivity',
              async:false,
              dataType:'json',
              success:function(data){
                  if (data.success == true)
                  {
        
                  }
              
              }
          });
      }             
      // Toggle between showing and hiding the sidebar, and add overlay effect
      
      function autoload()
      {
          $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url() ?>Page/load_homepage',
            async:false,
            dataType:'json',
            success:function(response){
              $('#pagetitle').html(response.pagetitle);
              $('#page-content').html(response.page);
              // go to top page
              $('html, body').animate({ scrollTop: 0 }, 0);
              load_last_messages(1);
              update_last_activity();              
            }
          });   
      }        
      // calendar
      function calendar()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Calendar/load_calendar',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);

                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
          // load calendar titles
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Calendar/retrive_title_calendar',
              dataType:'json',
              success:function(data)
              {
                  $('#calendar_find').html(data);
              }
          });                 
      } 
      // join teacher
      function join_teacher()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Teacher/load_join_teacher',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
          // load calendar titles
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Calendar/retrive_title_calendar',
              dataType:'json',
              success:function(data)
              {
                  $('#calendar_find').html(data);
              }
          });                 
      }         
      // supplies
      function supplies()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Supplies/load_supplies',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);

                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
          // load calendar titles
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Supplies/retrive_title_supplies',
              dataType:'json',
              success:function(data)
              {
                  $('#supplies_find').html(data);
              }
          });                 
      }            
      // payments
      function payments()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Payments/load_payments',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);                    
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });          
      }                 
      //load students marks
      function allmarks()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Studentmarks/loadmarkspage',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
          // load divisions
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Studentmarks/retrivedivision',
              dataType:'json',
              success:function(data)
              {
                  $('#division_find').html(data);
              }
          });
          // load grade
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Studentmarks/retrivegrade',
              dataType:'json',
              success:function(data)
              {
                  $('#grade_find').html(data);
              }
          });
          // load academic year
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Studentmarks/retriveacadmicyear',
              dataType:'json',
              success:function(data)
              {
                  $('#academicyear_find').html(data);
              }
          });
      }
      function load_inbox_msg() 
      {
        $.ajax({
          url:'<?php echo base_url() ?>Mail/pagination_msgs/' + 1,
          method:'get',
          dataType:'json',
          success:function(data){
              $('#inbox_messages').html(data.inbox_messages);
                  }
              });
        }            
      function studentInformation()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Student_info/find_stundent_info',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }          
      function load_last_notification() {
          $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url() ?>Administrator/load_notification',
            async:false,
            dataType:'json',
            success:function(response){
              $('#pagetitle').html(response.pagetitle);
              $('#maintitle').html(response.pagetitle);
              $('#page-content').html(response.page);

              // go to top page
              $('html, body').animate({ scrollTop: 0 }, 0);
            }
          });
      }                 
      // load all user profile
      function userProfile()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Administrator/load_administrator_information',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      } 
      //load change password view
      function chpass()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Administrator/changepassword',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }   
      // load all administrator
      function adminusers()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Administrator/loadadministrators',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }  
      // load all teacher
      function teacherusers()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Teacher/loadteachers',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }
      // load all student
      function studentusers()
      {
          // get student page
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Student/loadstudent',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
          // load divisions
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Studentmarks/retrivedivision',
              dataType:'json',
              success:function(data)
              {
                  $('#division_id_add').html(data);
              }
          });
          // load grade
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Studentmarks/retrivegrade',
              dataType:'json',
              success:function(data)
              {
                  $('#grade_id_add').html(data);
              }
          });                
      }   
      // main settings
      function main_settings()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Mainsettings/display_main_settings',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  load_data(1);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }               
      // academic year
      function academic_year()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Academicyear/current_academic_year',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }    
      // division
      function division()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Division/loaddivision',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }  
      // grade
      function grade()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Grade/loadgrade',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }    
      // room
      function classroom()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Room/loadroom',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
          // load divisions
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Room/retrivedivision',
              dataType:'json',
              success:function(data)
              {
                  $('#division_find').html(data);
              }
          });
      } 
      // holidays
      function holidays()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Holidays/load_holidays',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }
      // subject
      function subject()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Subject/loadsubject',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }        
      // inbox
      function inbox()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Mail/load_inbox',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);                  
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }  
      // website messages
      function website_messages()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Mail/load_website_messages',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);                  
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }          
      function compose()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Mail/load_compose',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);

                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }            
      loading_num_msg();
      function loading_num_msg() {
          $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Mail/get_total_msg',
            async:false,
            dataType:'json',
            success:function(response){
              // load count of administrators , teachers and studends
              $('#num_msg').html(response.num_msg);
              $('#num_msg2').html(response.num_msg);
              $('#num_msg3').html(response.num_msg);
            }
          });
      }                     
      // sent
      function sent()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Mail/load_sent',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }    
      // trash
      function trash()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Mail/load_trash',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }                           
      // contact messages
      function contacts_page()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Contact/loadAllmessages',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  load_contacts_data(1);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }
      // load Homework
      function homework()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Homework/loadhomework',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }
      // load job
      function jobs()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Job/loadjob',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  load_job_data(1);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }   
      // load job vacancy
      function jobs_vacancy()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Job/loadjob_vacancy',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  load_vacancy_data(1);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }               
      // load uniform
      function uniform()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Uniform/loaduniform',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  load_uniform_prise(1);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }            
      // load lecture schedule
      function lecture()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Lecture/loadlecture',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  load_schedleTables_data(1);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }            
      // load Agenda details
      function agenda()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Agenda/loadagendadetails',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }  
      // load sheet
      function sheet()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Sheet/loadsheets',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
      }   
      // exam
      function exam()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Exam/loadexams',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  load_exam_data(1);
                  $(".se-pre-con").fadeOut("slow");
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
          // load divisions
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Exam/retrivedivision',
              dataType:'json',
              success:function(data)
              {
                  $('#division_find').html(data);
              }
          });
          // load grade
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Exam/retrivegrade',
              dataType:'json',
              success:function(data)
              {
                  $('#grade_find').html(data);
              }
          });
      }
      // load absence
      function loadstudent_information()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Absence/load_attendance',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
          // load divisions
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Studentmarks/retrivedivision',
              dataType:'json',
              success:function(data)
              {
                  $('#division_id_add').html(data);
              }
          });
          // load grade
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Studentmarks/retrivegrade',
              dataType:'json',
              success:function(data)
              {
                  $('#grade_id_add').html(data);
              }
          });             
      }
    </script>
    <!-- Page Script -->
    <script>
      $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('.mailbox-messages input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
          var clicks = $(this).data('clicks');
          if (clicks) {
            //Uncheck all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
          } else {
            //Check all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
          }
          $(this).data("clicks", !clicks);
        });

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function (e) {
          e.preventDefault();
          //detect type
          var $this = $(this).find("a > i");
          var glyph = $this.hasClass("glyphicon");
          var fa = $this.hasClass("fa");

          //Switch states
          if (glyph) {
            $this.toggleClass("glyphicon-star");
            $this.toggleClass("glyphicon-star-empty");
          }

          if (fa) {
            $this.toggleClass("fa-star");
            $this.toggleClass("fa-star-o");
          }
        });
      });
    </script>    

  <!-- jQuery 3 -->
  <script src="<?php echo base_url();?>public/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- iCheck -->
  <script src="<?php echo base_url();?>public/plugins/iCheck/icheck.min.js"></script>

  <!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>public/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>

  $.widget.bridge('uibutton', $.ui.button); 
</script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url();?>public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>public/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>public/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->


	</body>
</html>