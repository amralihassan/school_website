<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MEIS | Login</title>
  <!-- logo -->
  <link rel="shortcut icon" href="<?php echo base_url();?>public/logo/logo.ico">  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
<body class="hold-transition login-page" style="height: 100%; background-image: url('<?php echo base_url()?>/public/images/bg1.png');  background-repeat: no-repeat;background-size: cover; ">
  <div class="se-pre-con"></div>
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url();?>public/index2.html"><b>School Every Where</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo base_url('Login'); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usernme or Email" name="username" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
        <select name="role" class="form-control">
            <option value="">Domain role</option>
            <option value="Administrative">Administrative</option>
            <option value="Teacher">Teacher</option>
            <option value="Student">Student</option>
            <option value="Parent">Parent</option>        	
        </select>
      </div>      
      <div class="row">
        <div class="col-xs-8">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input name="submit" type="submit" class="btn btn-primary btn-block btn-flat" value="Login"/>
        </div>
        <!-- /.col -->
            <div style="<?php echo $hide; ?> text-align: center;">
                <?php echo $msg; ?>
            </div>             
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>

<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>public/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>public/dist/js/demo.js"></script>
<script>
$( document ).ready(function() {$(".se-pre-con").fadeOut("slow"); });  
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
</body>
</html>