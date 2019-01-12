<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    My Kids
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">My Kids</li>
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
        Display my kids information
      </div>
      <div class="panel-body">
          <div class="row">
            <div class="col-md-4 col-xs-12">
              <!-- my kids -->
              <select style="margin-bottom: 5px;margin-bottom: 5px;" onchange="searchData();" class="form-control" name="studentID" id="stu_id">
                <option value="">-- Select --</option>
              </select> 
              
            </div>
          </div> 
          <div class="row">
              <div class="col-md-12">
                  <div id="kids_table"></div>
              </div>              
          </div> 
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  load_students();
   $( document ).ready(function() {$(".se-pre-con").fadeOut("slow");});
  // search
  function searchData() 
  {
    // get word search
    var student_id = $('select[name=studentID]');
    $.ajax({
      url:'<?php echo base_url() ?>Student/retrive_kids',
      method:'get',
      data:{studentID:student_id.val()},
      dataType:'json',
      success:function(data){
        $('#kids_table').html(data);
        
      }
    });
  }   
  
  function load_students() 
  {
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Student/retrive_student_for_parent',
      dataType:'json',
      success:function(data)
      {
        $('#stu_id').html(data);
      }
    });  
  }    


</script>