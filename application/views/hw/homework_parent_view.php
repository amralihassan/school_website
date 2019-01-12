<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Homework
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Homework</li>
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
        Homework
      </div>
      <div class="panel-body">
          <div class="row">
            <div class="col-md-2 col-xs-12">
              <label>Student Name</label>
            </div>
            <div class="col-md-4 col-xs-12">
              <!-- my kids -->
              <select style="margin-bottom: 5px;margin-bottom: 5px;" class="form-control" name="stuID" id="stu_id">
                <option value="">Select Student</option>
              </select> 
              
            </div>
            <div class="col-md-2 col-xs-12">
                  <!-- button -->
                  <button style="margin-top: -3px;" type="button" class="btn btn-info" id="btnView_exam" onclick="load_homework_data(1)">View</button>                              
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-search"></span>
                     </span>
                    <input class="form-control" type="search" name="txtSearch_subject"  placeholder="Search by homework" id="id_of_textbox_fees">
                  </div>
                </div>  
            </div>
          </div> 
          <div class="row">
              <div class="col-md-12">
                  <div id="homework_table"></div>
                  <div id="homework_pagination_table"></div>
              </div>              
          </div> 
      </div>
    </div>
  </div>
</div>
<!-- DataTables -->
<script src="<?php echo base_url();?>public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  // search press enter
  $('#id_of_textbox_fees').keyup(function(event){
    if (event.keyCode === 13) {
      searchData(1);
    }
  });
  function searchData(page) 
  {
    var roomID = $('select[name=stuID]');
    if (roomID.val() == "")
     {
        $('.alert-danger').html("Please select student").fadeIn().delay(2000).fadeOut('slow');
        return;
     }      
    // get word search
    var searchtxt = $('input[name=txtSearch_subject]');
    $.ajax({
      url:'<?php echo base_url() ?>Homework/pagination_search/' + page,
      method:'get',
      data:{value:searchtxt.val(),roomID:roomID.val()},
      dataType:'json',
      success:function(data){
        $('#homework_table').html(data.homework_table);
        $('#homework_pagination_table').html(data.homework_pagination_table);
      }
    });
  }  

  // load divisions
  function load_homework_data(page) {
    // get word search
    var stuID = $('select[name=stuID]');
    if (stuID.val() == "")
     {
        $('.alert-danger').html("Please select student").fadeIn().delay(2000).fadeOut('slow');
        return;
     }    
    $.ajax({
      url:'<?php echo base_url() ?>Homework/pagination/' + page,
      method:'get',
      data:{stuID:stuID.val()},
      dataType:'json',
      success:function(data){
        $('#homework_table').html(data.homework_table);
        $('#homework_pagination_table').html(data.homework_pagination_table);
      }
    });
  }
  $(document).on('click',".pagination li a", function(event){
    event.preventDefault();
    var page = $(this).data('ci-pagination-page');
    load_division_data(page);
  });  
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
  $(document).ready(function(){ $('#example').DataTable(); }); 
</script>

