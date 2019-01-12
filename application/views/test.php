<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title id="pagetitle"></title>
    <link rel="shortcut icon" href="<?php echo base_url();?>public/logo/logo.ico">
    <!-- for animation -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/site/css/animate.css">
    
    <!-- w3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">    
    <link href="<?php echo base_url();?>public/vendor/bootstrap/css/w3.css" rel="stylesheet">
        
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>public/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Jquery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"  onclick="autoload();">Middle East Schools</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell "></i> <i class="fa fa-caret-down"></i>
                    </a>

                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" onclick="userProfile();"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>

                        <li class="divider"></li>
                        <li><a href="<?php echo site_url("Logout"); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#" onclick="autoload();"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#" onclick="chpass();"><i class="fa fa-lock fa-fw"></i> Change Password</a>
                        </li>
                         <li>
                            <a href="#" onclick="lecture();"><i class="fa fa-table fa-fw"></i>Lecture Schedule</a>
                        </li>
                        <li>
                            <a href="#" onclick="homework();"><i class="fa fa-book fa-fw"></i> Homework</a>
                        </li>
                        <li>
                            <a href="#" onclick="agenda();"><i class="fa fa-edit fa-fw"></i> Agenda</a>
                        </li>   
                        <li>
                            <a href="#" onclick="sheet();"><i class="fa fa-files-o fa-fw"></i> Extra Sheets</a>
                        </li>                                             
                        <li>
                            <a href="#" onclick="exam();"><i class="fa fa-table fa-fw"></i> Exams Table</a>
                        </li>
                        <li>
                            <a href="#" onclick="mark();"><i class="fa fa-table fa-fw"></i>Marks</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">


        </div>
        <!-- /#page-wrapper -->
        <script type="text/javascript">
            autoload();
            function autoload() {
                $.ajax({
                  type:'ajax',
                  method:'get',
                  url:'<?php echo base_url() ?>Student',
                  async:false,
                  dataType:'json',
                  success:function(response){
                    $('#pagetitle').html(response.pagetitle);
                    $('#maintitle').html(response.pagetitle);
                    $('#page-wrapper').hide();
                    $('#page-wrapper').html(response.page);
                    $('#page-wrapper').fadeIn('slow');

                    // go to top page
                    $('html, body').animate({ scrollTop: 0 }, 0);
                  },
                  error:function(){
                    alert('failed to load page title');
                  }
                });
            }     
            //load change password view
            function chpass()
            {
                $.ajax({
                    type:'ajax',
                    method:'get',
                    url:'<?php echo base_url() ?>Student/changepassword',
                    async:false,
                    dataType:'json',
                    success:function(response){
                        $('#maintitle').html(response.pagetitle);
                        $('#pagetitle').html(response.pagetitle);
                        $('#page-wrapper').hide();
                        $('#page-wrapper').html(response.page);
                        $('#page-wrapper').fadeIn('slow');
                        // go to top page
                        $('html, body').animate({ scrollTop: 0 }, 0);
                    },
                    error:function(){

                    }
                });
            }   
            // load all user profile
            function userProfile()
            {
                $.ajax({
                    type:'ajax',
                    method:'get',
                    url:'<?php echo base_url() ?>Student/load_student_information',
                    async:false,
                    dataType:'json',
                    success:function(response){
                        $('#maintitle').html(response.pagetitle);
                        $('#pagetitle').html(response.pagetitle);
                        $('#page-wrapper').hide();
                        $('#page-wrapper').html(response.page);
                        $('#page-wrapper').fadeIn('slow');
                        // $('#mydatatable').html(html);
                        load_administrator_data(1);
                        // go to top page
                        $('html, body').animate({ scrollTop: 0 }, 0);
                    },
                    error:function(){
                    }
                });
            }  
            // load Homework
            function homework()
            {
                $.ajax({
                    type:'ajax',
                    method:'get',
                    url:'<?php echo base_url() ?>Homework/load_student_homework',
                    async:false,
                    dataType:'json',
                    success:function(response){
                        $('#maintitle').html(response.pagetitle);
                        $('#pagetitle').html(response.pagetitle);
                        $('#page-wrapper').hide();
                        $('#page-wrapper').html(response.page);
                        $('#page-wrapper').fadeIn('slow');
                        // $('#mydatatable').html(html);
                        load_homework_data(1);
                        // go to top page
                        $('html, body').animate({ scrollTop: 0 }, 0);
                    },
                    error:function(){
                    }
                });
            }
            // load Agenda details
            function agenda()
            {
                $.ajax({
                    type:'ajax',
                    method:'get',
                    url:'<?php echo base_url() ?>Agenda/loadagendadetails_student',
                    async:false,
                    dataType:'json',
                    success:function(response){
                        $('#maintitle').html(response.pagetitle);
                        $('#pagetitle').html(response.pagetitle);
                        $('#page-wrapper').html(response.page);
                        load_agenda_data(1);
                        $('html, body').animate({ scrollTop: 0 }, 0);
                    },
                    error:function(){
                    }
                });
            }  
            // load sheet
            function sheet()
            {
                $.ajax({
                    type:'ajax',
                    method:'get',
                    url:'<?php echo base_url() ?>Sheet/loadsheets_forStudent',
                    async:false,
                    dataType:'json',
                    success:function(response){
                        $('#maintitle').html(response.pagetitle);
                        $('#pagetitle').html(response.pagetitle);
                        $('#page-wrapper').hide();
                        $('#page-wrapper').html(response.page);
                        $('#page-wrapper').fadeIn('slow');
                        // $('#mydatatable').html(html);
                        load_sheet_data(1);
                        // go to top page
                        $('html, body').animate({ scrollTop: 0 }, 0);
                    },
                    error:function(){
                    }
                });
            }   
            // lecture schedule
            function lecture()
            {
                $.ajax({
                    type:'ajax',
                    method:'get',
                    url:'<?php echo base_url() ?>Lecture/loadstudentLecture',
                    async:false,
                    dataType:'json',
                    success:function(response){
                        $('#maintitle').html(response.pagetitle);
                        $('#pagetitle').html(response.pagetitle);
                        $('#page-wrapper').html(response.page);

                        $('html, body').animate({ scrollTop: 0 }, 0);
                    },
                    error:function(){
                    }
                });
            }             
            // exam
            function exam()
            {
                $.ajax({
                    type:'ajax',
                    method:'get',
                    url:'<?php echo base_url() ?>Exam/loadexams_student',
                    async:false,
                    dataType:'json',
                    success:function(response){
                        $('#maintitle').html(response.pagetitle);
                        $('#pagetitle').html(response.pagetitle);
                        $('#page-wrapper').hide();
                        $('#page-wrapper').html(response.page);
                        $('#page-wrapper').fadeIn('slow');
                        // $('#mydatatable').html(html);
                        load_exam_data(1);
                        // go to top page
                        $('html, body').animate({ scrollTop: 0 }, 0);
                    },
                    error:function(){
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
            // mark
            function mark()
            {
                $.ajax({
                    type:'ajax',
                    method:'get',
                    url:'<?php echo base_url() ?>Studentmarks/loadstudentmarks',
                    async:false,
                    dataType:'json',
                    success:function(response){
                        $('#maintitle').html(response.pagetitle);
                        $('#pagetitle').html(response.pagetitle);
                        $('#page-wrapper').hide();
                        $('#page-wrapper').html(response.page);
                        $('#page-wrapper').fadeIn('slow');
                        // load_agenda_data(1);
                        // go to top page
                        $('html, body').animate({ scrollTop: 0 }, 0);
                    },
                    error:function(){
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
            }              
            // load absence
            function student_absence()
            {
                $.ajax({
                    type:'ajax',
                    method:'get',
                    url:'<?php echo base_url() ?>Absence/load_student_absence',
                    async:false,
                    dataType:'json',
                    success:function(response){
                        $('#maintitle').html(response.pagetitle);
                        $('#pagetitle').html(response.pagetitle);
                        $('#page-wrapper').hide();
                        $('#page-wrapper').html(response.page);
                        $('#page-wrapper').fadeIn('slow');
                        // $('#mydatatable').html(html);
                        load_studentlist_data(1);
                        // go to top page
                        $('html, body').animate({ scrollTop: 0 }, 0);
                    },
                    error:function(){
                    }
                });
            }            
        </script>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>public/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>public/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>public/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>public/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>public/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>public/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>public/dist/js/sb-admin-2.js"></script>

</body>

</html>
