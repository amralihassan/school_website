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
        <!-- search -->
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
                <!-- division box -->
                <select class="form-control" name="divisionID" id="division_find">
                  <option value="">Select Division</option>
                </select>                              
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <!-- grade box -->
                <select class="form-control" name="gradeID" id="grade_find">
                  <option value="">Select Grade</option>
                </select>                              
            </div>
          </div>
          <div class="col-md-4">
              <button  type="button" class="btn btn-info" id="btnView_exam" onclick="searchData(1)">View</button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
              <div class="table table-responsive" id="exam_table"></div>       
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  

<script type="text/javascript">
    $(".se-pre-con").fadeOut("slow"); 
  // search
  function searchData(page) 
  {
    // get word search
    var division_id = $('select[name=divisionID]');
    var grade_id = $('select[name=gradeID]');
    $.ajax({
      url:'<?php echo base_url() ?>Exam/pagination_search_teacher/' + page,
      method:'get',
      data:{divi:division_id.val(),gra:grade_id.val()},
      dataType:'json',
      success:function(data){
        $('#exam_table').html(data.exam_table);
      }
    });
  } 
</script>