<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Attendance
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Attendance</li>
  </ol>
</section>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success" style="display: none;"></div>
    <div class="alert alert-danger" style="display: none;"></div>
	</div>
</div>	
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#query" aria-controls="query" role="tab" data-toggle="tab">Attendance Report</a></li>
  <li><a href="#new" id="btnAdd"  aria-controls="new" role="tab" data-toggle="tab">New</a></li>
</ul>
<div class="tab-content">
  <!-- query -->
  <div role="tabpanel" class="tab-pane active" id="query">
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              Select student by classroom
            </div>
            <div class="panel-body">
              <!-- query -->
              <div class="row">
                <!-- division -->                 
                    <div class="col-md-4">
                  <select style="margin-bottom: 5px;" required="required" class="form-control" name="division_name_add" id="division_id_add">
                    <option value="">Select Division</option>
                  </select>
                </div>                            
                      <!-- grade -->
                  <div class="col-md-4">
                  <select style="margin-bottom: 5px;" required="required" class="form-control" name="grade_name_add" id="grade_id_add">
                    <option value="">Select Grade</option>
                  </select>                         
                </div>                                
                    <!-- room -->
                  <div class="col-md-4">
                  <select style="margin-bottom: 5px;" required="required" class="form-control" name="room_name_add" id="room_id_add" disabled="" onchange="searchData_by_classroom();">
                    <option value="">Select Classroom</option>
                  </select>                 
                </div>                  
              </div>
            </div>
          </div>
        </div>
      </div>      
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel panel-default"> 
              <div class="panel-heading">
                Class Names
              </div>
              <div class="panel-body">
                   <div id="attendance_table">
                      <div class="alert alert-info">No results.</div>
                   </div>                         
              </div>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </div>  
  <!-- new -->
  <div role="tabpanel" class="tab-pane" id="new">
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default"> 
              <div class="panel-heading">
                  Add Student Absent
              </div>
              <div class="panel-body">
                  <form id="myForm_absence"   action="" method="POST">
                      <!-- division box -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label>Division</label>
                          </div>
                          <div class="col-md-6">
                            <select required="required" class="form-control" name="division_name_add_lang" id="division_id_add_lang">
                              <option value="">Select Division</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- grade -->
                      <div class="form-group">
                        <div class="row">
                           <div class="col-md-3">
                            <label>Grade</label>
                           </div>
                           <div class="col-md-6">
                            <select required="required" class="form-control" name="grade_name_add_lang" id="grade_id_add_lang">
                              <option value="">Select Grade</option>
                            </select>                         
                           </div>
                        </div>
                      </div>
                      <!-- room -->
                      <div class="form-group">
                        <div class="row">
                           <div class="col-md-3">
                            <label>Classroom</label>
                           </div>
                           <div class="col-md-6">
                            <select required="required" class="form-control" name="room_name_add_lang" id="room_id_add_lang" disabled="">
                              <option value="">Select Classroom</option>
                            </select>                 
                           </div>
                        </div> 
                      </div>
                      <!-- student name -->
                      <div class="form-group">
                        <div class="row">
                           <div class="col-md-3">
                            <label>Student Name</label>
                           </div>
                           <div class="col-md-6">
                            <select required="required" class="form-control" name="stuID" id="stuID_id" disabled="">
                              <option value="">Select Student</option>
                            </select>                 
                           </div>
                        </div>
                      </div>                
                  </form>    
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <!-- button -->
                        <?php 
                          $login_level_add ='';
                          
                          if ( 'Super Administrator' == $_SESSION['loginlevel']) 
                          {
                            $login_level_add ='<button type="button" id="btnSave_absence" class="btn btn-success">Save</button>';
                            
                          }
                          elseif ( 'Administrator' == $_SESSION['loginlevel']) 
                          {
                            $login_level_add ='<button type="button" id="btnSave_absence" class="btn btn-success">Save</button>';
                            
                          }
                          else 
                          {
                            $login_level_add ='<button type="button" class="btn btn-success">Save</button>';
                            
                          }
                          echo $login_level_add;
                         ?>                           
                      </div>                        
                    </div>
                  </div>                                  
              </div>
            </div>                 
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $( document ).ready(function() {$(".se-pre-con").fadeOut("slow");});  

  function searchData_by_classroom() 
  {
    // get word search
    var division_id = $('select[name=division_name_add]');
    var grade_id = $('select[name=grade_name_add]');
    var room_id = $('select[name=room_name_add]');

    $.ajax({
      url:'<?php echo base_url() ?>Absence/pagination_student_attendance_class_report',
      method:'get',
      data:{divi:division_id.val(),gra:grade_id.val(),rom:room_id.val()},
      dataType:'json',
      success:function(data){
        $('#attendance_table').html(data.attendance_table);
      }
    });
  } 
  // load room for query
  $('#division_id_add').on('change', function(){
    var gradeID = $('select[name=grade_name_add]').val();
    var divisionID = $(this).val();  //set country = country_id
    
    if (gradeID == '' && divisionID == '') // is empty
    {
      $('#room_id_add').prop('disabled', true); // set disable
    }
    else // is not empty
    {
      $('#room_id_add').prop('disabled', false);  // set enable
      //using 
      $.ajax({
        url:"<?php echo base_url() ?>Student/get_room", // method that will get data
        type:"POST",
        //data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
        data:{'gradeID' : gradeID, 'divisionID' : divisionID},
        dataType: 'json',
        success: function(data){
          $('#room_id_add').html(data);
        },
        error: function(){
          $('#room_id_add').prop('disabled', true); // set disable
        }
      });
    }
  });
  $('#grade_id_add').on('change', function(){
    var divisionID = $('select[name=division_name_add]').val();
    var gradeID = $(this).val();  //set country = country_id
    if (gradeID == '' && divisionID == '') // is empty
    {
      $('#room_id_add').prop('disabled', true); // set disable
    }
    else // is not empty
    {
      $('#room_id_add').prop('disabled', false);  // set enable
      //using 
      $.ajax({
        url:"<?php echo base_url() ?>Student/get_room", // method that will get data
        type:"POST",
        data:{'gradeID_add' : gradeID, 'divisionID_add' : divisionID}, // gradeID_add,divisionID_add are post
        dataType: 'json',
        success: function(data){
          $('#room_id_add').html(data);
        },
        error: function(){
          $('#room_id_add').prop('disabled', true); // set disable
        }
      });
    }
  }); 
  // load students
  $('#room_id_add').on('change',function(){
    var room_id = $(this).val();
    if (room_id == '') {
      $('#student_id_add').prop('disabled', true); // set disable
    }
    else{
      $('#student_id_add').prop('disabled', false); // set enable
      // load students using ajax
      $.ajax({
        url:"<?php echo base_url() ?>Studentmarks/get_student", // method that will get data
        type:"get",
        //data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
        data:{'room_id' : room_id},
        dataType: 'json',
        success: function(data){
          $('#student_id_add').html(data);
        },
        error: function(){
          $('#student_id_add').prop('disabled', true); // set disable
        }
      });     
    }
  })     
  function show_dates(stuID,student_name)
  {
      $.ajax({
        type:'ajax',
        method:'get',
        url:'<?php echo base_url() ?>Absence/load_show_dates_page',
        async:false,
        dataType:'json',
            success:function(response){
              $('#pagetitle').html(response.pagetitle);
              $('#page-content').html(response.page);   
              $('#studentName').html('<h4>'+student_name+'</h4>');               
              // go to top page
              $('html, body').animate({ scrollTop: 0 }, 0);
               load_data_attendance(stuID);  
        }
      });
  } 
  $('#btnAdd').click(function(){
    // load division
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Student/retrivedivision',
      dataType:'json',
      success:function(data)
      {
        $('#division_id_add_lang').html(data);
      }
    });
    // load grades
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Student/retrivegrade',
      dataType:'json',
      success:function(data)
      {
        $('#grade_id_add_lang').html(data);
      }
    });    
  })
  // load room for adding
  $('#division_id_add_lang').on('change', function(){
    var gradeID = $('select[name=grade_name_add_lang]').val();
    var divisionID = $(this).val();  //set country = country_id
    
    if (gradeID == '' && divisionID == '') // is empty
    {
      $('#room_id_add_lang').prop('disabled', true); // set disable
    }
    else // is not empty
    {
      $('#room_id_add_lang').prop('disabled', false); // set enable
      //using 
      $.ajax({
        url:"<?php echo base_url() ?>Student/get_room", // method that will get data
        type:"POST",
        //data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
        data:{'gradeID' : gradeID, 'divisionID' : divisionID},
        dataType: 'json',
        success: function(data){
          $('#room_id_add_lang').html(data);
        },
        error: function(){
          $('#room_id_add_lang').prop('disabled', true); // set disable
        }
      });
    }
  });
  $('#grade_id_add_lang').on('change', function(){
    var divisionID = $('select[name=division_name_add_lang]').val();
    var gradeID = $(this).val();  //set country = country_id
    if (gradeID == '' && divisionID == '') // is empty
    {
      $('#room_id_add_lang').prop('disabled', true); // set disable
    }
    else // is not empty
    {
      $('#room_id_add_lang').prop('disabled', false); // set enable
      //using 
      $.ajax({
        url:"<?php echo base_url() ?>Student/get_room", // method that will get data
        type:"POST",
        data:{'gradeID_add' : gradeID, 'divisionID_add' : divisionID}, // gradeID_add,divisionID_add are post
        dataType: 'json',
        success: function(data){
          $('#room_id_add_lang').html(data);
        },
        error: function(){
          $('#room_id_add_lang').prop('disabled', true); // set disable
        }
      });
    }
  }); 
  // load students
  $('#room_id_add_lang').on('change',function(){
    var room_id = $(this).val();
    if (room_id == '') {
      $('#stuID_id').prop('disabled', true); // set disable
    }
    else{
      $('#stuID_id').prop('disabled', false);  // set enable
      // load students using ajax
      $.ajax({
        url:"<?php echo base_url() ?>Absence/get_student", // method that will get data
        type:"get",
        //data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
        data:{'room_id' : room_id},
        dataType: 'json',
        success: function(data){
          $('#stuID_id').html(data);
        },
        error: function(){
          $('#stuID_id').prop('disabled', true); // set disable
        }
      });     
    }
  })  
  
  $('#btnSave_absence').click(function(){
    var data = $('#myForm_absence').serialize();
    // validation
    var stuID = $('select[name=stuID]');
    var result = '';

    if (stuID.val() == '') {
      stuID.parent().parent().addClass('has-error');
      $('.alert-danger').html('Please select student name.').fadeIn().delay(4000).fadeOut('slow');
      return;
    }else{
      stuID.parent().parent().removeClass('has-error');
      result +='1';
    }    
    if (result == '1')
    {
        $.ajax({
            type:'ajax',
            method:'post',
            async:false,
            url:'<?php echo base_url() ?>Absence/addAbsence',
            data:data,
            dataType:'json',
            success:function(response){
              if (response.success) {
                $('.alert-success').html('Added successfully.').fadeIn().delay(2000).fadeOut('slow');
                searchData_by_classroom();          
              }
            }
          });         
      }  
  });  
</script>	