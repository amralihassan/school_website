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

<div class="box box-primary">
  <div class="row">
    <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Exams</a></li>
          <li><a href="#sday"  id="btnAdd_exam" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
        </ul>  
        <!-- tab panes -->
        <div class="tab-content">
          <!-- display -->
          <div role="tabpanel" class="tab-pane active" id="fday">
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
                          <div align="center" id="exam_pagination_link"></div>            
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
          <!-- new form -->
          <div role="tabpanel" class="tab-pane" id="sday">
            <div class="row box-body">
              <div class="col-md-12">
                 <div class="panel panel-default">
                    <div class="panel-heading">
                      New Exam
                    </div>
                    <div class="panel-body">
                      <!--form  -->
                      <form id="myForm_exam" action="" method="post">
                            <!-- date -->
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                  <label>Date</label>
                                </div>
                                <div class="col-md-6">
                                  <input class="form-control" type="date" name="dateExam" required="required">
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
                                  <select class="form-control" name="division_ID" id="division_add">
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
                                  <select class="form-control" name="gradeID" id="grade_add">
                                    <option value="">Select Grade</option>
                                  </select>                     
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
                                  <select class="form-control" name="subjectID" id="subject_add">
                                    <option value="">Select Subject</option>
                                  </select>                       
                                </div>
                              </div>
                            </div>                          
                            <!-- exam name -->
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                  <label>Notes</label>
                                </div>
                                <div class="col-md-6">
                                  <input class="form-control" type="text" name="examName" placeholder="Notes" >
                                </div>
                              </div>
                            </div>
                            <!-- from hour -->
                            <div class="form-group">
                              <div class="row">
                                <!-- from -->
                                <div class="col-md-3">
                                  <label style="width: 80px;">From </label>
                                </div>
                                <div class="col-md-6">
                                  <select class="form-control" required="required" name="from_hour" style="width: 65px;display: inline;">
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                          <option value="9">9</option>
                                          <option value="10">10</option>
                                          <option value="11">11</option>
                                          <option value="12">12</option>
                                        </select> 
                                        <select class="form-control" required="required" name="from_minute" style="width: 65px;display: inline;">
                                          <option value="00">00</option>
                                          <option value="05">05</option>
                                          <option value="10">10</option>
                                          <option value="15">15</option>
                                          <option value="20">20</option>
                                          <option value="25">25</option>
                                          <option value="30">30</option>
                                          <option value="35">35</option>
                                          <option value="40">40</option>
                                          <option value="45">45</option>
                                          <option value="50">50</option>
                                          <option value="55">55</option>
                                        </select> 
                                        <select class="form-control" required="required" name="day_status1" style="width: 70px;display: inline;">
                                          <option value="Am">Am</option>
                                          <option value="Pm">Pm</option>
                                        </select>                                 
                                </div>
                              </div>
                            </div>
                            <!-- to -->
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                  <label>To</label>
                                </div>
                                <div class="col-md-6">
                                  <select class="form-control" required="required" name="to_hour" style="width: 65px;display: inline;">
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                          <option value="9">9</option>
                                          <option value="10">10</option>
                                          <option value="11">11</option>
                                          <option value="12">12</option>
                                        </select>
                                        <select class="form-control" required="required" name="to_minute" style="width: 65px;display: inline;">
                                          <option value="00">00</option>
                                          <option value="05">05</option>
                                          <option value="10">10</option>
                                          <option value="15">15</option>
                                          <option value="20">20</option>
                                          <option value="25">25</option>
                                          <option value="30">30</option>
                                          <option value="35">35</option>
                                          <option value="40">40</option>
                                          <option value="45">45</option>
                                          <option value="50">50</option>
                                          <option value="55">55</option>
                                        </select>
                                        <select class="form-control" required="required" name="day_status2" style="width: 70px;display: inline;">
                                          <option value="Am">Am</option>
                                          <option value="Pm">Pm</option>
                                        </select>                       
                                </div>
                              </div>
                            </div>
                      </form>  
                      <!-- save button -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <button type="button" id="btnSave_exam" class="btn btn-success">Save</button>
                          </div>
                        </div>
                      </div>  
                      <!-- end   -->
                    </div>
                 </div>
              </div>
            </div>
            <!-- button -->
          </div>  
        </div>            
    </div>
  </div>
</div>

<!-- delete modal -->
<div class="modal fade" id="deleteModal_exam" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">   
      <div class="modal-body">
        Do you want to delete this exam?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnDelete_exam" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end delete modal -->

<!-- update-->
<div class="modal fade" id="updateModel_exam" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
            <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
        </div>      
      <div class="modal-body">
        <form id="updateform_exam" action="" method="POST">
          <div class="form-group">
            <input type="text" name="id" hidden="" value="">
            <!-- date -->
            <div class="form-group">
              <div class="row">
                <div class="col-lg-3">
                  <label>Date</label>
                </div>
                <div class="col-lg-9">
                  <input class="form-control" type="date" name="dateExam1" required="required">   
                </div>
              </div>
            </div>
            <!-- division -->
            <div class="form-group">
              <div class="row">
                <div class="col-lg-3">
                  <label>Division</label>
                </div>
                <div class="col-lg-9">
                  <select class="form-control" name="division_ID2" id="divisionID_update">
                    <option value="">Select Division</option>
                  </select>                 
                </div>
              </div>
            </div>
            <!-- grade -->
            <div class="form-group">
              <div class="row">
                <div class="col-lg-3">
                  <label>Grade</label>
                </div>
                <div class="col-lg-9">
                  <select class="form-control" name="gradeID2" id="gradeID_update">
                    <option value="">Select Grade</option>
                  </select>                 
                </div>
              </div>
            </div>
            <!-- subject -->
            <div class="form-group">
              <div class="row">
                <div class="col-lg-3">
                  <label>Subject</label>
                </div>
                <div class="col-lg-9">
                  <select class="form-control" name="subjectID2" id="subjectID_update">
                    <option value="">Select Subject</option>
                  </select>                 
                </div>
              </div>              
            </div>      
            <!-- exam name -->
            <div class="form-group">
              <div class="row">
                <div class="col-lg-3">
                  <label>Notes</label>
                </div>
                <div class="col-lg-9">
                  <input class="form-control" type="text" name="examName1"placeholder="Notes" >
                </div>
              </div>                
            </div>
            <!-- from -->
            <div class="form-group">
              <div class="row">
                <div class="col-lg-3">
                  <label>From Hour</label>
                </div>
                <div class="col-lg-9">
                  <select class="form-control" required="required" name="from_hour1" style="width: 65px;display: inline;">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                        </select>
                        <select class="form-control" required="required" name="from_minute1" style="width: 65px;display: inline;">
                          <option value="00">00</option>
                          <option value="05">05</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="20">20</option>
                          <option value="25">25</option>
                          <option value="30">30</option>
                          <option value="35">35</option>
                          <option value="40">40</option>
                          <option value="45">45</option>
                          <option value="50">50</option>
                          <option value="55">55</option>
                        </select>
                        <select class="form-control" required="required" name="day_status11" style="width: 70px;display: inline;">
                          <option value="Am">Am</option>
                          <option value="Pm">Pm</option>
                        </select>                 
                </div>
              </div>              
            </div>
            <!-- to -->
            <div class="form-group">
              <div class="row">
                <div class="col-lg-3">
                  <label>To Hour</label>
                </div>
                <div class="col-lg-9">
                  <select class="form-control" required="required" name="to_hour1" style="width: 65px;display: inline;">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                        </select>
                        <select class="form-control" required="required" name="to_minute1" style="width: 65px;display: inline;">
                          <option value="00">00</option>
                          <option value="05">05</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="20">20</option>
                          <option value="25">25</option>
                          <option value="30">30</option>
                          <option value="35">35</option>
                          <option value="40">40</option>
                          <option value="45">45</option>
                          <option value="50">50</option>
                          <option value="55">55</option>
                        </select>
                        <select class="form-control" required="required" name="day_status21" style="width: 70px;display: inline;">
                          <option value="Am">Am</option>
                          <option value="Pm">Pm</option>
                        </select>                 
                </div>
              </div>              
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnUpdate_exam" class="btn btn-success">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end update-->

<script type="text/javascript">

  function load_exam_data(page) {
    $.ajax({
      url:'<?php echo base_url() ?>Exam/pagination_search/' + page,
      method:'get',
      dataType:'json',
      success:function(data){
        $('#exam_table').html(data.exam_table);
        $('#exam_pagination_link').html(data.exam_pagination_link);
        $(".se-pre-con").fadeOut("slow");
      }
    });
  }
  $(document).on('click',".pagination li a", function(event){
    event.preventDefault();
    var page = $(this).data('ci-pagination-page');
    load_exam_data(page);
  });
  // add
  $('#btnAdd_exam').click(function(){
    // add attribute
    $('#myForm_exam').attr('action','<?php echo base_url() ?>Exam/addexam');
    // load division
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Exam/retrivedivision',
      dataType:'json',
      success:function(data)
      {
        $('#division_add').html(data);
      }
    });
    // load grades
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Exam/retrivegrade',
      dataType:'json',
      success:function(data)
      {
        $('#grade_add').html(data);
      }
    });
    // load subjects
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Exam/retivesubjects',
      dataType:'json',
      success:function(data)
      {
        $('#subject_add').html(data);
      }
    });
  });
  // btnSave new 
  $('#btnSave_exam').click(function(){
    var url = $('#myForm_exam').attr('action'); // action
    var data = $('#myForm_exam').serialize();
    
    // validation
    var division_ID = $('select[name=division_ID]');
    var gradeID = $('select[name=grade_add]');
    var subjectID = $('select[name=subjectID]');
    var dateExam = $('input[name=dateExam]');
    var from_hour = $('select[name=from_hour]');
    var from_minute = $('select[name=from_minute]');
    var to_hour = $('select[name=to_hour]');
    var to_minute = $('select[name=to_minute]');
    var day_status1 = $('select[name=day_status1]');
    var day_status2 = $('select[name=day_status2]');
    var result = '';

    if (division_ID.val() == '') {
      division_ID.parent().parent().addClass('has-error');
      return;
    }else{
      division_ID.parent().parent().removeClass('has-error');
      result +='1';
    }
    if (gradeID.val() == '') {
      gradeID.parent().parent().addClass('has-error');
      return;
    }else{
      gradeID.parent().parent().removeClass('has-error');
      result +='2';
    }
    if (subjectID.val() == '') {
      subjectID.parent().parent().addClass('has-error');
      return;
    }else{
      subjectID.parent().parent().removeClass('has-error');
      result +='3';
    }
    if (dateExam.val() == '') {
      dateExam.parent().parent().addClass('has-error');
      return;
    }else{
      dateExam.parent().parent().removeClass('has-error');
      result +='4';
    }
    if (from_hour.val() == '') {
      from_hour.parent().parent().addClass('has-error');
      return;
    }else{
      from_hour.parent().parent().removeClass('has-error');
      result +='5';
    }
    if (from_minute.val() == '') {
      from_minute.parent().parent().addClass('has-error');
      return;
    }else{
      from_minute.parent().parent().removeClass('has-error');
      result +='6';
    }
    if (to_hour.val() == '') {
      to_hour.parent().parent().addClass('has-error');
      return;
    }else{
      to_hour.parent().parent().removeClass('has-error');
      result +='7';
    }
    if (to_minute.val() == '') {
      to_minute.parent().parent().addClass('has-error');
      return;
    }else{
      to_minute.parent().parent().removeClass('has-error');
      result +='8';
    }
    if (day_status1.val() == '') {
      day_status1.parent().parent().addClass('has-error');
      return;
    }else{
      day_status1.parent().parent().removeClass('has-error');
      result +='9';
    }
    if (day_status2.val() == '') {
      day_status2.parent().parent().addClass('has-error');
      return;
    }else{
      day_status2.parent().parent().removeClass('has-error');
      result +='10';
    }
    if (result == '12345678910') {
      $.ajax({
        type:'ajax',
        method:'post',
        url:url,//action
        data:data,
        async:false,
        dataType:'json',
        success:function(response){
          if (response.success) {
            $('#myModal_exam').modal('hide');
            $('#myForm_exam')[0].reset();
            $('.alert-success').html('Added successfully.').fadeIn().delay(4000).fadeOut('slow');
                // as press view button
                $('#btnView_exam').click();
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);                
          }
        }
      });

    }
  });
  // search
  function searchData(page) 
  {
    // get word search
    var division_id = $('select[name=divisionID]');
    var grade_id = $('select[name=gradeID]');
    $.ajax({
      url:'<?php echo base_url() ?>Exam/pagination_search/' + page,
      method:'get',
      data:{divi:division_id.val(),gra:grade_id.val()},
      dataType:'json',
      success:function(data){
        $('#exam_table').html(data.exam_table);
        $('#exam_pagination_link').html(data.exam_pagination_link);
      }
    });
  }
  // delete 
  function delete_exam(data)
  {
    var id = data;

      $('#deleteModal_exam').modal('show');
      $('#deleteModal_exam').find('.modal-title').text('Delete exam');
      $('#btnDelete_exam').click(function(){
        $.ajax({
          type:'ajax',
          method:'get',
          async:false,
          url:'<?php echo base_url() ?>Exam/deleteexam',
          data:{id:id},
          dataType:'json',
          success:function(response){
            if (response.success) {
              $('#deleteModal_exam').modal('hide');
              $('.alert-success').html('Deleted exam successfully.').fadeIn().delay(4000).fadeOut('slow');
              // as press view button
                $('#btnView_exam').click();
            }
          },
          error:function(){
            alert('Error in deleteing.')
          }
        });
      });
  }
  function update_exam(data)
  {
    var id = data;
    var divID = ""; // to set divisionID
    var graID = ""; // to set gradeID
    var subID =""; // to set subjectID
    $('#updateModel_exam').modal('show');
    $('#updateModel_exam').find('.modal-title').text('Update exam');
      $('#updateform_exam').attr('action','<?php echo base_url() ?>Exam/updateexam');
      $.ajax({
        type:'ajax',
        method:'get',
        url:'<?php echo base_url() ?>Exam/getdatabyid',
        data:{id:id},
        async:false,
        dataType:'json',
        success:function(data){
          $('input[name=id]').val(data.id);
          $('select[name=division_ID2]').val(data.divisionID);
          $('select[name=subjectID2]').val(data.gradeID);
          $('select[name=subjectID2]').val(data.subjectID);
          $('input[name=dateExam1]').val(data.dateExam);
          $('input[name=examName1]').val(data.examName);
          $('select[name=from_hour1]').val(data.from_hour);
          $('select[name=from_minute1]').val(data.from_minute);
          $('select[name=to_hour1]').val(data.to_hour);
          $('select[name=to_minute1]').val(data.to_minute);
          $('select[name=day_status11]').val(data.day_status1);
          $('select[name=day_status21]').val(data.day_status2);
          // created to send as a get to selected from selected box
          divID = data.divisionID;
          graID = data.gradeID;
          subID = data.subjectID;
        }
      });
      // load division
    $.ajax({
      type:'ajax',
      method:'get',
      data:{divi:divID},
      url:'<?php echo base_url() ?>Exam/retrivedivisionByid',
      dataType:'json',
      success:function(data)
      {
        $('#divisionID_update').html(data);
      }
    });
    // load grades
    $.ajax({
      type:'ajax',
      method:'get',
      data:{gra:graID},
      url:'<?php echo base_url() ?>Exam/retrivegradeByid',
      dataType:'json',
      success:function(data)
      {
        $('#gradeID_update').html(data);
      }
    });
    // load subjects
    $.ajax({
      type:'ajax',
      method:'get',
      data:{sub:subID},
      url:'<?php echo base_url() ?>Exam/retrivesubjectByid',
      dataType:'json',
      success:function(data)
      {
        $('#subjectID_update').html(data);
      }
    });
  }
    // update 
  $('#btnUpdate_exam').click(function(){
    var url = $('#updateform_exam').attr('action'); // action
    var data = $('#updateform_exam').serialize();
    
    // validation
    var division_ID2 = $('select[name=division_ID2]');
    var gradeID = $('select[name=gradeID2]');
    var subjectID = $('select[name=subjectID2]');
    var dateExam = $('input[name=dateExam1]');
    var from_hour = $('select[name=from_hour1]');
    var from_minute = $('select[name=from_minute1]');
    var to_hour = $('select[name=to_hour1]');
    var to_minute = $('select[name=to_minute1]');
    var day_status1 = $('select[name=day_status11]');
    var day_status2 = $('select[name=day_status21]');
    var result = '';
    if (division_ID2.val() == '') {
      division_ID2.parent().parent().addClass('has-error');
      return;
    }else{
      division_ID2.parent().parent().removeClass('has-error');
      result +='1';
    }
    if (gradeID.val() == '') {
      gradeID.parent().parent().addClass('has-error');
      return;
    }else{
      gradeID.parent().parent().removeClass('has-error');
      result +='2';
    }
    if (subjectID.val() == '') {
      subjectID.parent().parent().addClass('has-error');
      return;
    }else{
      subjectID.parent().parent().removeClass('has-error');
      result +='3';
    }
    if (dateExam.val() == '') {
      dateExam.parent().parent().addClass('has-error');
      return;
    }else{
      dateExam.parent().parent().removeClass('has-error');
      result +='4';
    }
    if (from_hour.val() == '') {
      from_hour.parent().parent().addClass('has-error');
      return;
    }else{
      from_hour.parent().parent().removeClass('has-error');
      result +='5';
    }
    if (from_minute.val() == '') {
      from_minute.parent().parent().addClass('has-error');
      return;
    }else{
      from_minute.parent().parent().removeClass('has-error');
      result +='6';
    }
    if (to_hour.val() == '') {
      to_hour.parent().parent().addClass('has-error');
      return;
    }else{
      to_hour.parent().parent().removeClass('has-error');
      result +='7';
    }
    if (to_minute.val() == '') {
      to_minute.parent().parent().addClass('has-error');
      return;
    }else{
      to_minute.parent().parent().removeClass('has-error');
      result +='8';
    }
    if (day_status1.val() == '') {
      day_status1.parent().parent().addClass('has-error');
      return;
    }else{
      day_status1.parent().parent().removeClass('has-error');
      result +='9';
    }
    if (day_status2.val() == '') {
      day_status2.parent().parent().addClass('has-error');
      return;
    }else{
      day_status2.parent().parent().removeClass('has-error');
      result +='10';
    }
    if (result == '12345678910') {
      $.ajax({
        type:'ajax',
        method:'post',
        url:url,//action
        data:data,
        async:false,
        dataType:'json',
        success:function(response){
          if (response.success) {
            $('#updateModel_exam').modal('hide');
            $('#updateform_exam')[0].reset();
            $('.alert-success').html('Updated successfully.').fadeIn().delay(2000).fadeOut('slow');
              // as press view button
              $('#btnView_exam').click();
          }
          else
          {
            alert("error");
          }          
        }
      });
    }
  });    
</script>