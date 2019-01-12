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
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<li class="active"><a href="#hw" aria-controls="hw" role="tab" data-toggle="tab">Homework</a></li>
	<li><a href="#new" id="btnAdd"  aria-controls="new" role="tab" data-toggle="tab">New</a></li>
  <li><a href="#load_view" id="btnView"  aria-controls="new" role="tab" data-toggle="tab">View Marks</a></li>
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
                            <textarea class="form-control" name="Details" required="required" placeholder="Enter homework details"></textarea>
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
                                <p class="help-block">Support files pdf|doc|docx|gif|jpg|png|jpeg|xlx|xlsx</p>
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
                        <button type="button" id="btnSave" class="btn btn-success">Save</button>
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
                      <select style="margin-bottom: 5px;" class="form-control" id="roomID_edit">
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
    <!-- View Marks homework -->
    <div rol="tabpanel" class="tab-pane" id="load_view">
      <div class="box-body">
        <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  View student Mark
                </div>
                <div class="panel-body">
                  <div class="row">                                 
                    <div class="col-md-3 col-xs-12">
                      <select style="margin-bottom: 5px;" class="form-control" id="roomID_view" name="roomID_view_name">
                        <option value="">Select Class</option>
                      </select>
                    </div>
                    <div class="col-md-9 col-xs-12">
                      <select style="margin-bottom: 5px; width: 100%" class="form-control select2" onchange="view_marks(1);" id="homework_view" name="homework">
                        <option value="">Select Homework</option>
                      </select>
                    </div>                    
                  </div>
                  <!-- display -->
                  <div class="row">
                    <div class="col-md-12">
                       <div id="view_homework_table"></div>
                       <div id="view_homework_table_pagination"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>          
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
          <!-- detasils -->
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label>Homework</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="hwID_update" hidden="">
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
<!-- edit mark -->
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
              <input type="text" name="fullMark_edit" class="form-control" readonly="">
            </div>            
          </div>
          <!-- student mark -->
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-md-2">
              <label>Mark</label>
            </div>
            <div class="col-md-10">
              <input type="text" name="mark_edit" id="mardeditID" class="form-control" required="">
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
          if (response == 4)
           {
            // go to top page
             $('#editModel').modal('hide');
            $('html, body').animate({ scrollTop: 0 }, 0);            
            $('.alert-danger').html("Please fill out all inputs." ).fadeIn().delay(4000).fadeOut('slow');               
           }
          if (response == 1)
           {
            // go to top page
             $('#editModel').modal('hide');
            $('html, body').animate({ scrollTop: 0 }, 0);            
            $('.alert-danger').html("Must be student's mark less than full mark." ).fadeIn().delay(4000).fadeOut('slow');            
           } 
          if (response == 2) {
            $('#editModel').modal('hide');
            get_homework_gradable_student(1);           
            $('.alert-success').html('Updated successfully.').fadeIn().delay(2000).fadeOut('slow');
            $('#editModel')[0].reset();
          }
        }
      });
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
  }  
  // load division for edit
  $('#load_edit_mark').click(function(){
    // load class
    $.ajax({
        type:'ajax',
        url:'<?php echo base_url() ?>Room/retrive_teacher_room',
        dataType:'json',
        success:function(data)
        {
          $('#roomID_edit').html(data);
        }
      });  
  })  
  // load students by class
  $('#roomID_edit').on('change',function(){
    var room_id = $(this).val();
    if (room_id == '') {
      $('#studentID_edit').prop('disabled', true); // set disable
    }
    else{
      $('#studentID_edit').prop('disabled', false); // set enable
      // load students using ajax
      $.ajax({
        url:"<?php echo base_url() ?>Student/get_student", // method that will get data
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
  // search
  function view_marks(page) 
  {
    // get word search
    var homework = $('select[name=homework]');
    var roomID = $('select[name=roomID_view_name')
    // vlidation
    if (roomID.val() == "")
    {
      $('.alert-danger').html("Please select classroom" ).fadeIn().delay(4000).fadeOut('slow');
      return;
    }    
    if (homework.val() == "")
    {
      $('.alert-danger').html("Please select homework" ).fadeIn().delay(4000).fadeOut('slow');
      return;
    }
    
    $.ajax({
      url:'<?php echo base_url() ?>Homework/pagination_view_homework_student/' + page,
      method:'get',
      data:{hw:homework.val(),roomID:roomID.val()},
      dataType:'json',
      success:function(data){
        $('#view_homework_table').html(data.view_homework_table);
      }
    });
  } 
  function get_homework_gradable_student(page)
  {
    // get word search
    var studentID = $('select[name=student_name]');
    // vlidation
    if (studentID.val() == "")
    {
      $('.alert-danger').html("Please select student" ).fadeIn().delay(4000).fadeOut('slow');
      return;
    }
    
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
  load_hw_data();
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })     
  function load_hw_data() {
    $.ajax({
      url:'<?php echo base_url() ?>Homework/retrive_all_hw_teacher',
      method:'get',
      dataType:'json',
      success:function(data){
        $('#homework_table').html('<table id ="example1" class="table table-hover table-bordered"><thead><tr><th>Date</th><th>Subject</th><th>Class</th><th>Homework</th><th>Download</th><th>Edit</th><th class="col-md-1">Gradable</th></tr></thead> ' + data + '</table>'); 
        $(".se-pre-con").fadeOut("slow");
        $('#example1').DataTable({ 
                  "destroy": true, //use for reinitialize datatable
               });          
      }
    });
  }  
  // btnAdd new 
  $('#btnAdd').click(function(){

    $('#myForm').attr('action','<?php echo base_url() ?>Homework/addhomework');
    
    // load subject
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Homework/retivesubjects_teacher',
      dataType:'json',
      success:function(data)
      {
        $('#subject').html(data);
      }
    });
    // load division
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Notication/retrivedivision_private',
      dataType:'json',
      success:function(data)
      {
        $('#division').html(data);
      }
    });
    // load grades
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Notication/retrivegrade_private',
      dataType:'json',
      success:function(data)
      {
        $('#grade').html(data);
      }
    });
  });
  // btnAdd new 
  $('#btnView').click(function(){
    // load class
    $.ajax({
        type:'ajax',
        url:'<?php echo base_url() ?>Room/retrive_teacher_room',
        dataType:'json',
        success:function(data)
        {
          $('#roomID_view').html(data);
        }
      });  
 

  });  
  $('#roomID_view').change(function(){
    // load homework
    var rom = $('select[name=roomID_view_name]').val();
    $.ajax({
        method:'get',
        data:{rom:rom},
        url:'<?php echo base_url() ?>Homework/retrive_teacher_homework',
        dataType:'json',
        success:function(data)
        {
          $('#homework_view').html(data);
        }
      });     
  })
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
  // when press update button
  function update_homework(data)
  {
    var id = data;
    $('#updateModel').modal('show');
      $('#updateModel').find('.modal-title').text('Update homework');
      $('#updateform').attr('action','<?php echo base_url() ?>Homework/updatehomework_teacher');
    // load  data
      $.ajax({
        type:'ajax',
        method:'get',
        url:'<?php echo base_url() ?>Homework/getdatabyid',
        data:{id:id},
        async:false,
        dataType:'json',
        success:function(data){
          $('input[name=hwID_update]').val(data.hwID);
          $('textarea[name=Details_update]').val(data.Details);
          if (data.gradable == 'True') {
             document.getElementById("gradeableID").checked = true;
          }
          else{
             document.getElementById("gradeableID").checked = false;
          }           
        }
      });
  }
  // btnUpdate
  $('#btnUpdate').click(function(){
    var url = $('#updateform').attr('action'); // action
    var data = $('#updateform').serialize();
  
    // validation
    var Details = $('textarea[name=Details_update]');
    var result = '';

    if (Details.val() == '') {
      Deails.parent().parent().addClass('has-error');
      return;
    }else{
      Details.parent().parent().removeClass('has-error');
      result +='1';
    }
    if (result == '1') {
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
  // Numeric only control handler
  jQuery.fn.ForceNumericOnly =
  function()
  {
      return this.each(function()
      {
          $(this).keydown(function(e)
          {
              var key = e.charCode || e.keyCode || 0;
              // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
              // home, end, period, and numpad decimal
              return (
                  key == 8 || 
                  key == 9 ||
                  key == 13 ||
                  key == 46 ||
                  key == 110 ||
                  key == 190 ||
                  (key >= 35 && key <= 40) ||
                  (key >= 48 && key <= 57) ||
                  (key >= 96 && key <= 105));
          });
      });
  };  
  $("#mardeditID").ForceNumericOnly(); 

 

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