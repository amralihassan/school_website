<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Monthly Plan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Agenda</li>
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
<!--  tab-->
<div class="box box-primary">
  <!-- tab -->
  <div class="row">
    <div class="col-md-12">
      <!-- Nav tabs -->
      <?php 
          if ('Administrative' == $_SESSION['role'])
          {
            echo '
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Divisions</a></li>
                <li><a href="#sday"  id="btnAdd_agenda" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
              </ul>
            ';
          }
       ?>
      <!-- tab panes -->
      <div class="tab-content">
        <!-- display -->
        <div role="tabpanel" class="tab-pane active" id="fday">
          <div class="row box-body">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Agenda
                </div>
                <div class="panel-body">
                      <!-- search -->
                      <?php 
                          if ('Administrator' == $_SESSION['loginlevel'])
                          {
                              echo '
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span>
                                                                    </span>
                                      <input class="form-control" type="search" name="txtSearch_agenda"  placeholder="Search by name" id="id_of_textbox_agenda">
                                    </div>
                                  </div>
                                    </div>
                                  </div>
                              ';
                          }
                       ?>
                      <div class="row">
                        <div class="col-md-12">
                      <div id="agenda_table"></div>
                      <div align="center" id="agenda_pagination_link"></div>            
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
                  New Event
                </div>
                <div class="panel-body">
                    <!--form  -->
                  <form id="myForm_agenda" action="" method="post">
                    <!-- Date -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label>Date</label>
                        </div>
                        <div class="col-md-6">
                          <input class="form-control" type="date" name="date_add" required="required">
                        </div>
                      </div>                    
                    </div>
                    
                    <!-- Title -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label>Title</label>
                        </div>
                        <div class="col-md-6">
                          <input class="form-control" type="text" name="title_add" required="required" placeholder="Enter title" >
                        </div>
                      </div>                    
                    </div>
                    
                    <!-- Deatils -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label>Deatils</label>
                        </div>
                        <div class="col-md-6">
                          <textarea class="form-control" name="details_add" required="required"></textarea>
                        </div>
                      </div>                      
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label>Share</label>
                        </div>
                        <div class="col-md-6">
                          <select class="form-control" name="share_add" id="share_id">
                            <option value="Public">Public</option>
                            <option value="Private">Private</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div id="private" style="display: none;">
                      <!-- Division -->
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
                      
                      <!-- Grade -->
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
                    </div>
                  </form> 
                  <!-- button -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        
                      </div>
                      <div class="col-md-6">
                        <!-- button -->
                        <?php 
                          $login_level_add ='';
                          
                          if ( 'Super Administrator' == $_SESSION['loginlevel']) 
                          {
                            $login_level_add ='<button type="button" id="btnSave_agenda" class="btn btn-success">Save</button>';
                            
                          }
                          elseif ( 'Administrator' == $_SESSION['loginlevel']) 
                          {
                            $login_level_add ='<button type="button" id="btnSave_agenda" class="btn btn-success">Save</button>';
                            
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
          </div>
          
        </div>
        <br>
      </div>
    </div>
  </div>  
</div>

<!-- update model -->
<div class="modal fade" id="updateModel_agenda" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
            <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
        </div>        
      <div class="modal-body">
        <form id="updateform_agenda" action="" method="post">
          <!-- Date -->
          <div class="form-group">
            <div class="row">
              <input type="text" name="agendaID" hidden="">
              <div class="col-md-3">
                <label>Date</label>
              </div>
              <div class="col-md-6">
                <input class="form-control" type="date" name="date" required="required">    
              </div>
            </div>
          </div>
          <!-- Title -->
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label>Title</label>
              </div>
              <div class="col-md-6">
                <input class="form-control" type="text" name="title" required="required" placeholder="Enter title" >
              </div>
            </div>
          </div>
          <!-- Deatils -->
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label>Deatils</label>
              </div>
              <div class="col-md-6">
                <textarea class="form-control" name="details" required="required">
                </textarea>
              </div>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnUpdate_agenda" class="btn btn-success">Save chnages</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end update model -->


<!-- delete modal -->
<div class="modal fade" id="deleteModal_agenda" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
            <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
        </div>      
      <div class="modal-body">
        Do you want to delete this event?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnDelete_agenda" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  load_agenda_data(1);
  //select share public or private
  $('#share_id').change(function(){
      var share = $('select[name=share_add]');
      if (share.val() == "Public")
      {
          $('#private').fadeOut();
      }
      else
      {
          $('#private').fadeIn();
      }   
  }); 

  $('#id_of_textbox_agenda').keyup(function(event){
    if (event.keyCode === 13) {
      searchData(1);
    }
  });
  // search
  function searchData(page) 
  {
    // get word search
    var searchtxt = $('input[name=txtSearch_agenda]');
    $.ajax({
      url:'<?php echo base_url() ?>Agenda/pagination_search/' + page,
      method:'get',
      data:{name:searchtxt.val()},
      dataType:'json',
      success:function(data){
        $('#agenda_table').html(data.agenda_table);
        $('#agenda_pagination_link').html(data.agenda_pagination_link);
      }
    });
  }
  // load Agenda details
  function Agenda()
  {
    $.ajax({
      type:'ajax',
      method:'get',
      url:'<?php echo base_url() ?>Agenda/loadagendadetails',
      async:false,
      dataType:'json',
      success:function(response){
    $('#page').html(response.page);
      // $('#mydatatable').html(html);
      load_agenda_data(1);
      // go to top page
        $('html, body').animate({ scrollTop: 0 }, 0);
      },
      error:function(){
      }
    });
  }
  function load_agenda_data(page) {
    $.ajax({
      url:'<?php echo base_url() ?>Agenda/pagination/' + page,
      method:'get',
      dataType:'json',
      success:function(data){
        $('#agenda_table').html(data.agenda_table);
        $('#agenda_pagination_link').html(data.agenda_pagination_link);
        $(".se-pre-con").fadeOut("slow");
      }
    });
  }
  $(document).on('click',".pagination li a", function(event){
    event.preventDefault();
    var page = $(this).data('ci-pagination-page');
    load_agenda_data(page);
  });
  // btnAdd new 
  $('#btnAdd_agenda').click(function(){
    // show add modal
    $('#myModal_agenda').modal('show');
    $('#myModal_agenda').find('.modal-title').text('Add New Event'); // rename modal
    // add attribute
    $('#myForm_agenda').attr('action','<?php echo base_url() ?>Agenda/addevent');
    // load division
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Studentmarks/retrivedivision',
      dataType:'json',
      success:function(data)
      {
        $('#division').html(data);
      }
    });
    // load grades
    $.ajax({
      type:'ajax',
      url:'<?php echo base_url() ?>Studentmarks/retrivegrade',
      dataType:'json',
      success:function(data)
      {
        $('#grade').html(data);
      }
    });
  });
  // btnSave new 
  $('#btnSave_agenda').click(function(){
    var url = $('#myForm_agenda').attr('action'); // action
    var data = $('#myForm_agenda').serialize();
  
    // validation
    var dayIS = $('select[name=dayIS_add]');
    var date = $('input[name=date_add]');
    var title = $('input[name=title_add]');
    var details = $('textarea[name=details_add]');

    var result = '';

    if (dayIS.val() == '') {
      dayIS.parent().parent().addClass('has-error');
      return;
    }else{
      dayIS.parent().parent().removeClass('has-error');
      result +='1';
    }
    if (date.val() == '') {
      date.parent().parent().addClass('has-error');
      return;
    }else{
      date.parent().parent().removeClass('has-error');
      result +='2';
    }
    if (title.val() == '') {
      title.parent().parent().addClass('has-error');
      return;
    }else{
      title.parent().parent().removeClass('has-error');
      result +='3';
    }
    if (details.val() == '') {
      details.parent().parent().addClass('has-error');
      return;
    }else{
      details.parent().parent().removeClass('has-error');
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
            $('#myModal_agenda').modal('hide');
            $('#myForm_agenda')[0].reset();
            $('.alert-success').html('Added successfully.').fadeIn().delay(4000).fadeOut('slow');
            load_agenda_data(1);

          }
        },
        error:function(){
          alert('Could not save in database.')
        }
      });

    }
  });
  // delete 
  function delete_agenda(data)
  {
    var id = data;

      $('#deleteModal_agenda').modal('show');
      $('#deleteModal_agenda').find('.modal-title').text('Delete event or activity');
      $('#btnDelete_agenda').click(function(){
        $.ajax({
          type:'ajax',
          method:'get',
          async:false,
          url:'<?php echo base_url() ?>Agenda/deleteagenda',
          data:{id:id},
          dataType:'json',
          success:function(response){
            if (response.success) {
              $('#deleteModal_agenda').modal('hide');
              $('.alert-success').html('Deleted successfully.').fadeIn().delay(4000).fadeOut('slow');
              load_agenda_data(1);
            }
          },
          error:function(){
            alert('Error in deleteing.')
          }
        });
      });
  }
  // when press update button
  function update_agenda(data)
  {
    var id = data;
    var divID = ""; // to set divisionID
    var graID = ""; // to set gradeID
    $('#updateModel_agenda').modal('show');
      $('#updateModel_agenda').find('.modal-title').text('Update Agenda');
      $('#updateform_agenda').attr('action','<?php echo base_url() ?>Agenda/updateagenda');
    // load student data
      $.ajax({
        type:'ajax',
        method:'get',
        url:'<?php echo base_url() ?>Agenda/getdatabyid',
        data:{id:id},
        async:false,
        dataType:'json',
        success:function(data){
          $('input[name=agendaID]').val(data.agendaID);
          $('select[name=dayIS]').val(data.dayIS);
          $('input[name=date]').val(data.date);
          $('input[name=title]').val(data.title);
          $('textarea[name=details]').val(data.details);
          // created to send as a get to selected from selected box
          divID = data.divisionID;
          graID = data.gradeID;
        },
        error:function(){
          alert('Could not get data');
        }
      });
  }
  // update 
  $('#btnUpdate_agenda').click(function(){
    var url = $('#updateform_agenda').attr('action'); // action
    var data = $('#updateform_agenda').serialize();
  
    // validation
    
    var date = $('input[name=date]');
    var title = $('input[name=title]');
    var details = $('textarea[name=details]');
    var result = '';

    if (date.val() == '') {
      date.parent().parent().addClass('has-error');
      return;
    }else{
      date.parent().parent().removeClass('has-error');
      result +='2';
    }
    if (title.val() == '') {
      title.parent().parent().addClass('has-error');
      return;
    }else{
      title.parent().parent().removeClass('has-error');
      result +='3';
    }
    if (details.val() == '') {
      details.parent().parent().addClass('has-error');
      return;
    }else{
      details.parent().parent().removeClass('has-error');
      result +='4';
    }

    if (result == '234') {
      $.ajax({
        type:'ajax',
        method:'post',
        url:url,//action
        data:data,
        async:false,
        dataType:'json',
        success:function(response){
          if (response.success) {
            $('#updateModel_agenda').modal('hide');
            $('#updateform_agenda')[0].reset();
            $('.alert-success').html('Updated successfully.').fadeIn().delay(2000).fadeOut('slow');
            load_agenda_data(1);
            }
            else
            {
              alert("false");
            }
        }
      });

    }
  });
</script>