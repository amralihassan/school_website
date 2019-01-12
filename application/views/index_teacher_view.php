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
            background: url(<?php echo base_url('public/images/loader-64x/Preloader_7.gif') ?>) center no-repeat #fff;        
      </style>     
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
      <div class="se-pre-con"></div>
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
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-info"></i></a>
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
        <!-- Mail Box -->
          <li>
            <a href="#" onclick="inbox();">
              <i class="fa fa-envelope"></i> <span>Mailbox</span>
            </a>
          </li>                
        <!-- change password -->
          <li>
            <a href="#" onclick="chpass();">
              <i class="fa fa-lock"></i> <span>Change Password</span>
            </a>
          </li> 
        <!-- Classes -->
          <li>
            <a href="#" onclick="classes();">
              <i class="fa fa-television"></i> <span>Classes</span>
            </a>
          </li>                 
        <!-- homework -->     
          <li>
            <a href="#" onclick="homework();">
              <i class="fa fa-book"></i> <span>Homework</span>
            </a>
          </li>         
        <!-- extra sheets -->
          <li>
            <a href="#" onclick="sheet();">
              <i class="fa fa-files-o"></i> <span>Extra Sheets</span>
            </a>
          </li>         
        <!-- exam -->
          <li>
            <a href="#" onclick="exam();">
              <i class="fa fa-edit"></i> <span>Exam Table</span>
            </a>
          </li>           
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section id="page-content" style="min-height: 700px;">

   
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
</div>     

    <script type="text/javascript">

     
    $( document ).ready(function() {$(".se-pre-con").fadeOut("slow"); });  
      auto_refresh_msg();
      // refresh page
      setInterval("auto_refresh_msg();",20000);
      function auto_refresh_msg()
      {
          loading_num_msg();
          load_last_messages(1);   
          update_last_activity();
           if(navigator.onLine){
            $('#connection').html('<h6><i class="fa fa-circle text-success"></i> Online</h6>');
           } else {
            $('#connection').html('<h6><i class="fa fa-circle text-danger"></i> Offline</h6>');
           }                   
      }    
      update_last_activity();
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
      load_last_messages(1);
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
      // Toggle between showing and hiding the sidebar, and add overlay effect
      autoload();
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
      function load_last_notification() 
      {
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
      // load Homework
      function homework()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Homework/load_teacher_homework',
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
              url:'<?php echo base_url() ?>Sheet/load_sheet_teacher',
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
              url:'<?php echo base_url() ?>Exam/loadexams_teacher',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  load_exam_data(1);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });
          // load divisions
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Notication/retrivedivision_private',
              dataType:'json',
              success:function(data)
              {
                  $('#division_find').html(data);
              }
          });
          // load grade
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Notication/retrivegrade_private',
              dataType:'json',
              success:function(data)
              {
                  $('#grade_find').html(data);
              }
          });
      }
      function classes()
      {
          $.ajax({
              type:'ajax',
              method:'get',
              url:'<?php echo base_url() ?>Teacher/load_classes',
              async:false,
              dataType:'json',
              success:function(response){
                  $('#maintitle').html(response.pagetitle);
                  $('#pagetitle').html(response.pagetitle);
                  $('#page-content').html(response.page);
                  load_absence_data(1);
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);
              }
          });        
      }
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
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>public/plugins/iCheck/icheck.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>public/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
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

    </body>
</html>