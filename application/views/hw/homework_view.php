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
      <div class="alert alert-success" style="display: none;"></div>
      <div class="alert alert-danger" style="display: none;"></div>
    </div>  
  </div>  
</div>  
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<li class="active"><a href="#hw" aria-controls="hw" role="tab" data-toggle="tab">Homework</a></li>
	<li><a href="#new" id="btnAdd" aria-controls="new" role="tab" data-toggle="tab">New</a></li>
  <li><a href="#edit_mark" id="load_edit_mark"  aria-controls="edit_mark" role="tab" data-toggle="tab">Edit Mark</a></li>
</ul>
<div class="tab-content">
    <!-- display homework -->
    <div role="tabpanel" class="tab-pane active" id="hw">
      <!-- displat data table -->
      <div class="box-body">
        <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Homework
                </div>
                <div class="panel-body">
                  <div id="homework_table"></div>
                </div>
              </div>
            </div>          
        </div>
      </div>
    </div>
    <!-- new form -->
    <div role="tabpanel" class="tab-pane" id="new">
        <div class="box-body">
          <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      New Homework
                    </div>
                    <div class="panel-body">
                      <form id="myForm" action="" method="post">
                        <!-- date -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-3">
                              <label>Date</label>
                            </div>
                              <div class="col-md-6">
                                  <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input class="form-control" type="date" name="dateHW" required="required" min="2018-01-01" max="2030-12-31">
                                  </div>  
                              </div>                        
                          </div>
                        </div>
                        <!-- subject -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-3">
                              <label>Subject</label>
                            </div>
                            <div class="col-md-6">
                              <select class="form-control" name="subjectID" id="subject">
                            <option value="">Select Subject</option>
                          </select>
                            </div>
                          </div>
                        </div>
                        <!-- division -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-3">
                              <label>Division</label>
                            </div>
                            <div class="col-md-6">
                              <select class="form-control" name="divisionID_add" id="division">
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
                              <select class="form-control" name="gradeID_add" id="grade">
                            <option value="">Select Grade</option>
                          </select>
                            </div>
                          </div>
                        </div>
                        <!-- room -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-3">
                              <label>Class</label>
                            </div>
                            <div class="col-md-6">
                              <select class="form-control" name="roomID_add" id="room" disabled="">
                            <option value="">Select Class</option>
                          </select>
                            </div>
                          </div>
                        </div>
                        <!-- deatils -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-3">
                              <label>Homework</label>
                            </div>
                            <div class="col-md-6">
                              <textarea class="form-control" name="Details" required="required" placeholder="Enter homework deatils"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-3">
                              
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <div class="btn btn-default btn-file">
                                    <i class="fa fa-paperclip"></i> Attachment
                                    <input type="file" name="file_name" id="file_name">                    
                                  </div>                 
                                  <p class="help-block">Support files .doc - .docx - pdf</p>
                                </div>                        
                            </div>
                          </div>
                        </div>
                        <!-- gradeable -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-3">
                            
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" name="gradeable_add" value="True"> Gradable
                            </div>
                          </div>
                        </div>                        
                      </form>                       
                      <div class="row">
                         <div class="col-md-12">
                                <!-- button -->
                                <?php 
                                  $login_level_add ='';
                                  
                                  if ( 'Super Administrator' == $_SESSION['loginlevel']) 
                                  {
                                    $login_level_add ='<button type="button" id="btnSave" class="btn btn-success">Save</button>';
                                    
                                  }
                                  elseif ( 'Administrator' == $_SESSION['loginlevel']) 
                                  {
                                    $login_level_add ='<button type="button" id="btnSave" class="btn btn-success">Save</button>';
                                    
                                  }
                                  else 
                                  {
                                    $login_level_add ='<button type="button"  class="btn btn-success">Save</button>';
                                    
                                  }
                                  echo $login_level_add;
                                 ?>
                         </div>
                      </div>                     
                    </div>
                </div>
              </div>            
          </div> 
          <br>
          <div class="form-group">
            <div class="row">
              <div class="col-md-8">
                  <div id="uploadProgress" style="display: none;">
                      <div class="progress">
                          <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:0%;">0%</div>
                      </div>                
                  </div>                
              </div>
            </div>            
          </div>                        
        </div>
    </div>
    <!-- edit mark -->
    <div rol="tabpanel" class="tab-pane" id="edit_mark">
      <div class="box-body">
        <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Edit student Mark
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-3 col-xs-12">
                      <select style="margin-bottom: 5px;" class="form-control" id="divisionID_edit" name="divisionID_edit_name">
                        <option value="">Select Division</option>
                      </select>
                    </div>   
                    <div class="col-md-3 col-xs-12">
                      <select style="margin-bottom: 5px;" class="form-control" id="gradeID_edit" name="gradeID_edit_name">
                        <option value="">Select Grade</option>
                      </select>
                    </div>                                     
                    <div class="col-md-3 col-xs-12">
                      <select style="margin-bottom: 5px;" class="form-control" disabled="" id="roomID_edit">
                        <option value="">Select Class</option>
                      </select>
                    </div>
                    <div class="col-md-3 col-xs-12">
                      <select style="margin-bottom: 5px; width: 100%" class="form-control select2" disabled="" onchange="get_homework_gradable_student(1);" id="studentID_edit" name="student_name">
                        <option value="">Select Student</option>
                      </select>
                    </div>                    
                  </div>
                  <!-- display -->
                  <div class="row">
                    <div class="col-md-12">
                       <div id="gradable_homework_table"></div>
                       <div id="gradable_homework_table_pagination"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>          
        </div>
      </div>      
    </div>
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModal" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body">
        Do you want to delete this homework?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- update modal -->
<div class="modal fade" id="updateModel" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
            <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
        </div>        
      <div class="modal-body">
        <form id="updateform" action="" method="post">
          <!-- select dat -->
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                 <label>Homework Date</label>
              </div>
              <div class="col-md-9">
                <input type="text" name="hwID" hidden="" value="">
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control" type="date" name="dateHW_update" required="required" min="2018-01-01" max="2030-12-31">
                </div>                  
              </div>
            </div>
          </div>
          <!-- select subject -->
          <div class="form-group">
              <div class="row">
                  <div class="col-md-3">
                      <label for="subject">Subject</label>                
                  </div>
                  <div class="col-md-9">
                      <!-- subject box -->
                      <select class="form-control" name="subjectID_update" id="subject_update">
                        <option value="">Select Subject</option>
                      </select>
                      <!-- end select box -->                 
                  </div>
              </div>
          </div>
          <!-- select division -->
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="grade">Division</label>
                </div>
                <div class="col-md-9">
                  <!-- division box -->
                  <select class="form-control" name="divisionID_update" id="division_update">
                    <option value="">Select Division</option>
                  </select>
                  <!-- end select box -->
                </div>               
            </div>
          </div>
          <!-- select grade -->
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="grade">Grade</label>
                </div>
                <div class="col-md-9">
                  <!-- grade box -->
                  <select class="form-control" name="gradeID_update" id="grade_update">
                    <option value="">Select Grade</option>
                  </select>
                  <!-- end select box -->
                </div>              
            </div>
          </div>            
            <!-- classroom -->
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label for="grade">Class</label>
                </div>
                <div class="col-md-9">
                    <!-- room box -->
                    <select class="form-control" name="roomID_update" id="room_update" disabled="">
                      <option value="">Select Class</option>
                    </select>
                    <!-- end select box -->                 
                </div>              
            </div>
          </div>            
          <!-- detasils -->
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label>Homework</label>
                </div>
                <div class="col-md-9">
                    <textarea class="form-control" name="Details_update" required="required" placeholder="Enter homework deatils"></textarea>                 
                </div>              
            </div>
          </div>  
          <!-- gradeable -->
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
              
              </div>
              <div class="col-md-6">
                <input type="checkbox" name="gradeable_update" id="gradeableID" value="True"> Gradable
              </div>
            </div>
          </div>                      
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnUpdate" class="btn btn-success">Save chnages</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- edit mark model -->
<!-- update modal -->
<div class="modal fade" id="editModel" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <!-- Modal content -->
    <div class="modal-content">     
      <div class="modal-body">
        <form id="edit_mark_form" method="POST" action="">
          <!-- full mark -->
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-md-2">
              <input type="text" name="id_edit" hidden="">
              <label>Full Mark</label>
            </div>
            <div class="col-md-10">
              <input type="text" name="fullMark_edit" class="form-control">
            </div>            
          </div>
          <!-- student mark -->
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-md-2">
              <label>Mark</label>
            </div>
            <div class="col-md-10">
              <input type="text" name="mark_edit" class="form-control" required="">
            </div>            
          </div>   
          <!-- status -->
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-md-2">
              <label>Status</label>
            </div>
            <div class="col-md-10">
                <select class="form-control" name="statusMark_edit" required="">
                  <option value="">Status</option>
                  <option value="Excellent">Excellent</option>
                  <option value="Very Good">Very Good</option>
                  <option value="Good">Good</option>
                  <option value="Poor">Poor</option>
                </select>              
            </div>            
          </div> 
          <!-- notes -->
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-md-2">
              <label>Notes</label>
            </div>
            <div class="col-md-10">
                <input class="form-control" type="text" name="notes_edit" required="">              
            </div>            
          </div>                   
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnEdit" class="btn btn-success">Save chnages</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function edit_hw_mark(id)
  {
    $('#editModel').modal('show');
    // load  data
      $.ajax({
        type:'ajax',
        method:'get',
        url:'<?php echo base_url() ?>Homework/get_student_mark_id',
        data:{id:id},
        async:false,
        dataType:'json',
        success:function(data){
          $('input[name=id_edit]').val(data.id);
          $('input[name=fullMark_edit]').val(data.fullMark);
          $('input[name=mark_edit]').val(data.mark);
          $('select[name=statusMark_edit]').val(data.statusMark);
          $('input[name=notes_edit]').val(data.notes);
        }
      });    
  }
  // load division for edit
  $('#load_edit_mark').click(function(){
    // load divisions
    $.ajax({
        type:'ajax',
        url:'<?php echo base_url() ?>Studentmarks/retrivedivision',
        dataType:'json',
        success:function(data)
        {
            $('#divisionID_edit').html(data);
        }
    });
    // load grade
    $.ajax({
        type:'ajax',
        url:'<?php echo base_url() ?>Studentmarks/retrivegrade',
        dataType:'json',
        success:function(data)
        {
            $('#gradeID_edit').html(data);
        }
    });  
  })
  $('#btnEdit').click(function() {

      var data = $('#edit_mark_form').serialize();
      $.ajax({
        type:'ajax',
        method:'post',
        url:'<?php echo base_url() ?>Homework/editMark',
        data:data,
        async:false,
        dataType:'json',
        success:function(response){
          if (response.success) {
            $('#editModel').modal('hide');
            get_homework_gradable_student(1);           
            $('.alert-success').html('Updated successfully.').fadeIn().delay(2000).fadeOut('slow');
            $('#editModel')[0].reset();
          }
        }
      });
  })
  // load room for query
  $('#divisionID_edit').on('change', function(){
    var gradeID = $('select[name=gradeID_edit_name]').val();
    var divisionID = $(this).val();  //set country = country_id
    
    if (gradeID == '' && divisionID == '') // is empty
    {
      $('#roomID_edit').prop('disabled', true); // set disable
    }
    else // is not empty
    {
      $('#roomID_edit').prop('disabled', false);  // set enable
      //using 
      $.ajax({
        url:"<?php echo base_url() ?>Student/get_room", // method that will get data
        type:"POST",
        //data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
        data:{'gradeID' : gradeID, 'divisionID' : divisionID},
        dataType: 'json',
        success: function(data){
          $('#roomID_edit').html(data);
        },
        error: function(){
          $('#roomID_edit').prop('disabled', true); // set disable
        }
      });
    }
  });
  $('#gradeID_edit').on('change', function(){
    var divisionID = $('select[name=divisionID_edit_name]').val();
    var gradeID = $(this).val();  //set country = country_id
    if (gradeID == '' && divisionID == '') // is empty
    {
      $('#roomID_edit').prop('disabled', true); // set disable
    }
    else // is not empty
    {
      $('#roomID_edit').prop('disabled', false);  // set enable
      //using 
      $.ajax({
        url:"<?php echo base_url() ?>Student/get_room", // method that will get data
        type:"POST",
        data:{'gradeID_add' : gradeID, 'divisionID_add' : divisionID}, // gradeID_add,divisionID_add are post
        dataType: 'json',
        success: function(data){
          $('#roomID_edit').html(data);
        },
        error: function(){
          $('#roomID_edit').prop('disabled', true); // set disable
        }
      });
    }
  }); 
  // load class
  $('#roomID_edit').on('change',function(){
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
  function gradable(hwID)
  {
      $.ajax({
        type:'ajax',
        method:'get',
        url:'<?php echo base_url() ?>Homework/load_update_page',
        async:false,
        dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);
            $('#page-content').html(response.page);                  
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
             load_homework_details(hwID);  
        }
      });  
      // check exist
      $.ajax({
        type:'ajax',
        method:'get',
        data:{hwID:hwID},
        url:'<?php echo base_url() ?>Homework/check_exist_homework',
        async:false,
        dataType:'json',
          success:function(homework){               
            if (homework != 0) 
            {
              load_homework_details(hwID); 
            }
        }
      });        
  }
  load_hw_data();
  
  function load_hw_data() {
    $.ajax({
      url:'<?php echo base_url() ?>Homework/retrive_all_hw/',
      method:'get',
      dataType:'json',
      success:function(data){
        $('#homework_table').html('<table id ="example1" class="table table-hover table-bordered"><thead><tr><th class="col-md-2">Date</th><th class="col-md-1">Subject</th><th class="col-md-1">Class</th><th class="col-md-5">Homework</th><th class="col-md-2">Edit By</th><th class="col-md-0">Edit</th><th class="col-md-0">Delete</th><th class="col-md-1">Gradable</th></tr></thead> ' + data + '</table>'); 
        $(".se-pre-con").fadeOut("slow");
        $('#example1').DataTable({ 
                  "destroy": true, //use for reinitialize datatable
               });          
      }
    });
  }  
  // search
  function get_homework_gradable_student(page) 
  {
    // get word search
    var studentID = $('select[name=student_name]');
    // vlidation
    if (studentID.val() == "") {alert("Please select student!");return;}
    
    $.ajax({
      url:'<?php echo base_url() ?>Homework/pagination_gradable_homework_student/' + page,
      method:'get',
      data:{stu:studentID.val()},
      dataType:'json',
      success:function(data){
        $('#gradable_homework_table').html(data.gradable_homework_table);
        $('#gradable_homework_table_pagination').html(data.gradable_homework_table_pagination);
      }
    });
  }  
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })    
  // btnAdd new 
  $('#btnAdd').click(function(){

    $('#myForm').attr('action','<?php echo base_url() ?>Homework/addhomework');
      // load subject
      $.ajax({
        type:'ajax',
        url:'<?php echo base_url() ?>Homework/retivesubjects',
        dataType:'json',
        success:function(data)
        {
          $('#subject').html(data);
        }
      });
      // load division
      $.ajax({
        type:'ajax',
        url:'<?php echo base_url() ?>Homework/retrivedivision',
        dataType:'json',
        success:function(data)
        {
          $('#division').html(data);
        }
      });
      // load grades
      $.ajax({
        type:'ajax',
        url:'<?php echo base_url() ?>Homework/retrivegrade',
        dataType:'json',
        success:function(data)
        {
          $('#grade').html(data);
        }
      });
  });
  // load room for adding
  $('#division').on('change', function(){
    var gradeID = $('select[name=gradeID_add]').val();
    var divisionID = $(this).val();  //set country = country_id
    
    if (gradeID == '' && divisionID == '') // is empty
    {
      $('#room').prop('disabled', true); // set disable
    }
    else // is not empty
    {
      $('#room').prop('disabled', false); // set enable
      //using 
      $.ajax({
        url:"<?php echo base_url() ?>Student/get_room", // method that will get data
        type:"POST",
        //data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
        data:{'gradeID' : gradeID, 'divisionID' : divisionID},
        dataType: 'json',
        success: function(data){
          $('#room').html(data);
        },
        error: function(){
          $('#room').prop('disabled', true); // set disable
        }
      });
    }
  });
  $('#grade').on('change', function(){
    var divisionID = $('select[name=divisionID_add]').val();
    var gradeID = $(this).val();  //set country = country_id
    if (gradeID == '' && divisionID == '') // is empty
    {
      $('#room').prop('disabled', true); // set disable
    }
    else // is not empty
    {
      $('#room').prop('disabled', false); // set enable
      //using 
      $.ajax({
        url:"<?php echo base_url() ?>Student/get_room", // method that will get data
        type:"POST",
        data:{'gradeID_add' : gradeID, 'divisionID_add' : divisionID}, // gradeID_add,divisionID_add are post
        dataType: 'json',
        success: function(data){
          $('#room').html(data);
        },
        error: function(){
          $('#room').prop('disabled', true); // set disable
        }
      });
    }
  });
  // load students
  $('#roomID_edit').on('change',function(){
    var room_id = $(this).val();
    if (room_id == '') {
      $('#studentID_edit').prop('disabled', true); // set disable
    }
    else{
      $('#studentID_edit').prop('disabled', false);  // set enable
      // load students using ajax
      $.ajax({
        url:"<?php echo base_url() ?>Absence/get_student", // method that will get data
        type:"get",
        //data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
        data:{'room_id' : room_id},
        dataType: 'json',
        success: function(data){
          $('#studentID_edit').html(data);
        },
        error: function(){
          $('#studentID_edit').prop('disabled', true); // set disable
        }
      });     
    }
  })    
  // btnSave 
  $('#btnSave').click(function(){
    $('#progress-bar').css('width', 0 + '%');
    var data = new FormData(document.getElementById("myForm"));
    var file = document.getElementById('file_name').files[0]; //userfile file tag id

    if (file) {
        data.append('file_name', file); // add file to array
        url =  '<?php echo base_url() ?>Homework/addhomework';
        // check size before upload
        if(($('#file_name')[0].files[0].size > 5000000 )) 
        { // 512 Kbyte (this size is in bytes)
            //Prevent default and display error
            alert("File is over 5MB in size!");
           return;
        }           
    }
    else
    {
      // no attachement file
       url =  '<?php echo base_url() ?>Homework/addhomework_no_attachement';
    }   

    // validation
    var dateHW = $('input[name=dateHW]');
    var roomID = $('select[name=roomID]');
    var subjectID = $('select[name=subjectID]');
    var Details = $('textarea[name=Details]');
    var result = '';

    if (dateHW.val() == '') {
      dateHW.parent().parent().addClass('has-error');
      return;
    }else{
      dateHW.parent().parent().removeClass('has-error');
      result +='1';
    }
    if (roomID.val() == '') {
      roomID.parent().parent().addClass('has-error');
      return;
    }else{
      roomID.parent().parent().removeClass('has-error');
      result +='2';
    }
    if (subjectID.val() == '') {
      subjectID.parent().parent().addClass('has-error');
      return;
    }else{
      subjectID.parent().parent().removeClass('has-error');
      result +='3';
    }
    if (Details.val() == '') {
      Deails.parent().parent().addClass('has-error');
      return;
    }else{
      Details.parent().parent().removeClass('has-error');
      result +='4';
    }
    if (result == '1234') {
      $.ajax({
        type:'ajax',
        method:'post',
        url:url,//action
        data:data,
        async:true,
        processData: false,
        contentType: false,
        cashe:false,
        dataType:'json',  
          
        success:function(response){
          if (response.success) {
            $('#myForm')[0].reset();
            
            $('.alert-success').html('Uploaded successfully.').fadeIn().delay(2000).fadeOut('slow');
            load_hw_data();
          }
        },
        xhr: function () {
            var xhr = new XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (event) {
                if (event.lengthComputable) {
                  if (file)
                  {
                    $('#uploadProgress').fadeIn();
                  }                  
                  var percentComplete = event.loaded / event.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progress-bar').text(percentComplete + '% Complete');
                    $('#progress-bar').css('width', percentComplete + '%');  
                    // go to top page
                    $('html, body').animate({ scrollTop: 0 }, 0);                                      
                }
                else{
                  $('#uploadProgress').fadeOut();
                }
            }, false);
            return xhr;
        }       
      });
    }
  });  
  // delete 
  function delete_homework(data)
  {
    var id = data;

      $('#deleteModal').modal('show');
      $('#btnDelete').click(function(){
        $.ajax({
          type:'ajax',
          method:'get',
          async:false,
          url:'<?php echo base_url() ?>Homework/deletehomework',
          data:{id:id},
          dataType:'json',
          success:function(response){
            if (response.success) {
              $('#deleteModal').modal('hide');              
              load_hw_data();
            }
          }
        });
      });
  }  
  // when press update button
  function update_homework(data)
  {
    var id = data;
    var divID = ""; // to set divisionID
    var graID = ""; // to set gradeID
    var romID =""; // to set roomID
    var subID =""; // to set subjectID
    $('#updateModel').modal('show');
      $('#updateModel').find('.modal-title').text('Update homework');
      $('#updateform').attr('action','<?php echo base_url() ?>Homework/updatehomework');
    // load  data
      $.ajax({
        type:'ajax',
        method:'get',
        url:'<?php echo base_url() ?>Homework/getdatabyid',
        data:{id:id},
        async:false,
        dataType:'json',
        success:function(data){
          $('input[name=hwID]').val(data.hwID);
          $('input[name=dateHW_update]').val(data.dateHW);
          $('select[name=divisionID_update]').val(data.divisionID);
          $('select[name=gradeID_update]').val(data.gradeID);
          $('select[name=subjectID_update]').val(data.subjectID);
          $('select[name=roomID_update]').val(data.roomID);
          $('textarea[name=Details_update]').val(data.Details);
          if (data.gradable == 'True') {
             document.getElementById("gradeableID").checked = true;
          }
          else{
             document.getElementById("gradeableID").checked = false;
          }          
          
          // created to send as a get to selected from selected box
          divID = data.divisionID;
          graID = data.gradeID;
          subID = data.subjectID;
          romID = data.roomID;
        },
        error:function(){
          alert('Could not get data');
        }
      });
      // load division
    $.ajax({
      type:'ajax',
      method:'get',
      data :{divi:divID},
      url:'<?php echo base_url() ?>Homework/retrivedivisionByid',
      dataType:'json',
      success:function(data)
      {
        $('#division_update').html(data);
        $('#division_update').prop('disabled', false);
      }
    });
    // load grades
    $.ajax({
      type:'ajax',
      method:'get',
      data:{gra:graID},
      url:'<?php echo base_url() ?>Homework/retrivegradeByid',
      dataType:'json',
      success:function(data)
      {
        $('#grade_update').html(data);
      }
    });
    // load rooms
    $.ajax({
      type:'ajax',
      method:'get',
      data:{rom:romID},
      url:'<?php echo base_url() ?>Homework/retriveroomByid',
      dataType:'json',
      success:function(data)
      {
        $('#room_update').html(data);
        $('#room_update').prop('disabled', false);
      }
    });
    // load subjects
    $.ajax({
      type:'ajax',
      method:'get',
      data:{sub:subID},
      url:'<?php echo base_url() ?>Homework/retrivesubjectByid',
      dataType:'json',
      success:function(data)
      {
        $('#subject_update').html(data);
      }
    });
  }
  // load room for update
  $('#division_update').on('change', function(){
    var gradeID = $('select[name=gradeID_update]').val();
    var divisionID = $(this).val();  //set country = country_id
    if (gradeID == '' && divisionID == '') // is empty
    {
      $('#room_update').prop('disabled', true); // set disable
    }
    else // is not empty
    {
      $('#room_update').prop('disabled', false);  // set enable
      //using 
      $.ajax({
        url:"<?php echo base_url() ?>Student/get_room", // method that will get data
        type:"POST",
        //data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
        data:{'gradeID_update' : gradeID, 'divisionID_update' : divisionID},
        dataType: 'json',
        success: function(data){
          $('#room_update').html(data);
        },
        error: function(){
          $('#room_update').prop('disabled', true); // set disable
        }
      });
    }
  });
  $('#grade_update').on('change', function(){
    var divisionID = $('select[name=divisionID_update]').val();
    var gradeID = $(this).val();  //set country = country_id
    
    if (gradeID == '' && divisionID == '') // is empty
    {
      $('#room_update').prop('disabled', true); // set disable
    }
    else // is not empty
    {
      $('#room_update').prop('disabled', false);  // set enable
      //using 
      $.ajax({
        url:"<?php echo base_url() ?>Student/get_room", // method that will get data
        type:"POST",
        //data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
        data:{'gradeID_update' : gradeID, 'divisionID_update' : divisionID},
        dataType: 'json',
        success: function(data){
          $('#room_update').html(data);
        },
        error: function(){
          $('#room_update').prop('disabled', true); // set disable
        }
      });
    }
  });
  // btnUpdate
  $('#btnUpdate').click(function(){
    var url = $('#updateform').attr('action'); // action
    var data = $('#updateform').serialize();
  
    // validation
    var dateHW = $('input[name=dateHW_update]');
    var roomID = $('select[name=roomID_update]');
    var subjectID = $('select[name=subjectID_update]');
    var Details = $('textarea[name=Details_update]');
    var result = '';

    if (dateHW.val() == '') {
      dateHW.parent().parent().addClass('has-error');
      return;
    }else{
      dateHW.parent().parent().removeClass('has-error');
      result +='1';
    }
    if (roomID.val() == '') {
      roomID.parent().parent().addClass('has-error');
      return;
    }else{
      roomID.parent().parent().removeClass('has-error');
      result +='2';
    }
    if (subjectID.val() == '') {
      subjectID.parent().parent().addClass('has-error');
      return;
    }else{
      subjectID.parent().parent().removeClass('has-error');
      result +='3';
    }
    if (Details.val() == '') {
      Deails.parent().parent().addClass('has-error');
      return;
    }else{
      Details.parent().parent().removeClass('has-error');
      result +='4';
    }
    if (result == '1234') {
      $.ajax({
        type:'ajax',
        method:'post',
        url:url,//action
        data:data,
        async:false,
        dataType:'json',
        success:function(response){
          if (response.success) {
            $('#updateModel').modal('hide');
            $('#updateform')[0].reset();
            $('.alert-success').html('Updated successfully.').fadeIn().delay(2000).fadeOut('slow');
            load_hw_data();
          }
        }
      });
    }
  });  
</script>
<!-- DataTables -->
<script src="<?php echo base_url();?>public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>