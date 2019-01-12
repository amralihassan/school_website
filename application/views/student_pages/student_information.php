<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Student Information
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Student Information</li>
  </ol>
</section>
<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
      <div class="alert alert-danger w3-panel w3-red" style="display: none;"></div>
    </div>  
  </div>  
</div>  
<div class="row box-body">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Student Information
      </div>
      <div class="panel-body">
          <div class="row">
              <div class="col-md-12">
                  <div id="student_table"></div>
              </div>              
          </div> 
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  load_student_data();
  
  function load_student_data() {
    $.ajax({
      url:'<?php echo base_url() ?>Student/retrive_all_student_data/',
      method:'get',
      dataType:'json',
      success:function(data){
        $('#student_table').html(data); 
        
        $(".se-pre-con").fadeOut("slow");

      }
    });
  }    

</script>


