<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Student Absence Dates
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#" onclick="loadstudent_information();"><i class="fa fa-dashboard"></i> Attendance</a></li><li class="active">Update Student Absence Dates</li>
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
<!-- update form -->
<div class="box-body">
<div class="col-md-12">
  <div class="panel panel-default">
      <div class="panel-heading">
        <div id="studentName"></div>
      </div>
      <div class="panel-body">
        <div class="table table-responsive" id="absence_table"></div>                          
      </div>
  </div>
</div>
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModal" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
            <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
        </div>        
      <div class="modal-body">
        Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end delete modal -->

<script type="text/javascript">
	$( document ).ready(function() {$(".se-pre-con").fadeOut("slow");});
	function load_data_attendance(stuID)
	{
      $.ajax({
        url:'<?php echo base_url() ?>Absence/pagination_load_dates/1',
		method:'get',
		data:{id:stuID},
		dataType:'json',
        success:function(data){
          $('#absence_table').html(data.absence_table);
        }
      });		
	}	
  // delete 
  function delete_absence(data)
  {
    var id = data;

      $('#deleteModal').modal('show');
      $('#deleteModal').find('.modal-title').text('Delete abcence');
      $('#btnDelete').click(function(){
        $.ajax({
          type:'ajax',
          method:'get',
          async:false,
          url:'<?php echo base_url() ?>Absence/deleteabsence',
          data:{id:id},
          dataType:'json',
          success:function(response){
            if (response.success) {
              $('#deleteModal').modal('hide');
              $('.alert-success').html('Deleted successfully.').fadeIn().delay(2000).fadeOut('slow');
              load_data_attendance(data);
            }
          }
        });
      });
  }  
</script>