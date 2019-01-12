<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Student Report
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Student Report</li>
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
        Student Reprot
      </div>
      <div class="panel-body">
          <div class="row">
            <div class="col-md-4 col-xs-12">
              <!-- my kids -->
              <select style="margin-bottom: 5px;margin-bottom: 5px;" onchange="searchData();" class="form-control" name="studentID" id="stu_id">
                <option value="">Select Student</option>
              </select> 
              
            </div>
          </div> 
          <div class="row">
              <div class="col-md-12">
                  <div id="studentReport_table"></div>
              </div>              
          </div> 
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function show_absence($stuID)
  {
    alert($stuID);
  }
  function searchData()
  {
    var stuID = $('select[name=studentID]');
    $.ajax({
      url:'<?php echo base_url() ?>Student/get_student_reprot',
      method:'get',
      data:{stuID:stuID.val()},  
      dataType:'json',
      success:function(data)
      {
        $('#studentReport_table').html(data);
      }
    });     

  }
  load_students();
  function load_students() 
  {
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Student/retrive_student_and_class',
      dataType:'json',
      success:function(data)
      {
        $('#stu_id').html(data);
        $(".se-pre-con").fadeOut("slow");
      }
    });  
  }    
</script>
