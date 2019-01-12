<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Exam Table
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Exam Table</li>
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
    <!-- panel primary -->
    <div class="panel panel-default">
      <div class="panel-heading">
              Exam Table
      </div>
      <div class="panel-body">
          <div class="row">
            <div class="col-md-4 col-xs-12">
              <!-- my kids -->
              <select style="margin-bottom: 5px;margin-bottom: 5px;" onchange="searchData(1);" class="form-control" name="studentID" id="stu_id">
                <option value="">Select Student</option>
              </select> 
              
            </div>
          </div> 
          <div class="row">
              <div class="col-md-12">
                  <div id="exam_table"></div>
              </div>              
          </div> 
      </div>
    </div>
  </div>
</div>  

<script type="text/javascript">
  load_students();
  function load_students() 
  {
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Student/retrive_student_for_parent',
      dataType:'json',
      success:function(data)
      {
        $('#stu_id').html(data);
        $(".se-pre-con").fadeOut("slow"); 
      }
    });  
  } 
  // search
  function searchData(page) 
  {
    // get word search
    var studentID = $('select[name=studentID]');
    $.ajax({
      url:'<?php echo base_url() ?>Exam/pagination_search_parent/' + page,
      method:'get',
      data:{studentID:studentID.val()},
      dataType:'json',
      success:function(data){
        $('#exam_table').html(data.exam_table);
        $('#exam_pagination_link').html(data.exam_pagination_link);
      }
    });
  }  

</script>