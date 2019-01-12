<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Holidays
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Holidays</li>
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
  <!-- tab -->
  <div class="row">
    <div class="col-md-12">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">Holidays</a></li>
        <li><a href="#sday"  id="btnAdd_holidays" aria-controls="sday" role="tab" data-toggle="tab">New</a></li>
      </ul>
      <!-- tab panes -->
      <div class="tab-content">
        <!-- display -->
        <div role="tabpanel" class="tab-pane active" id="fday">
              <!-- search -->
              <div class="row box-body">
                <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        Holidays This year
                      </div>
                      <div class="panel-body">
                        <div class="table table-responsive" id="Holidays_table"></div>
                        <div align="center" id="Holidays_pagination_link"></div>                            
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
                      Add Hoilday 
                    </div>
                    <div class="panel-body">
                      <!--form  -->
                      <form id="myForm_Holidays" action="" method="post">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-3">
                              <label>Holidays</label>
                            </div>
                            <div class="col-md-6">
                              <input class="form-control" type="date" name="date_holiday" required="required">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-3">
                              <label>Title</label>
                            </div>
                            <div class="col-md-6">
                              <input class="form-control" type="text" name="title" required="required" placeholder="Please enter title">
                            </div>
                          </div>
                        </div>                        
                          <div class="row">
                            <div class="col-md-12">
                                  <!-- button -->
                                  <?php 
                                    $login_level_add ='';
                                    
                                    if ( 'Super Administrator' == $_SESSION['loginlevel']) 
                                    {
                                      $login_level_add ='<button type="button" id="btnSave_Holidays" class="btn btn-success">Save</button>';
                                      
                                    }
                                    elseif ( 'Administrator' == $_SESSION['loginlevel']) 
                                    {
                                      $login_level_add ='<button type="button" id="btnSave_Holidays" class="btn btn-success">Save</button>';
                                      
                                    }
                                    else 
                                    {
                                      $login_level_add ='<button type="button"  class="btn btn-success">Save</button>';
                                      
                                    }
                                    echo $login_level_add;
                                   ?>
                            </div>
                          </div>
                      </form>                            
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

<!-- update-->
<div class="modal fade" id="updateModel_Holidays" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
            <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
        </div>      
      <div class="modal-body">
        <form id="updateform_Holidays" action="" method="POST">
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>Holidays</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="id_update" hidden="">
                  <input class="form-control" type="date" name="date_holiday_update" required="required">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>Title</label>
                </div>
                <div class="col-md-6">
                  <input class="form-control" type="text" name="title_update" required="required" placeholder="Please enter title">
                </div>
              </div>
            </div> 
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnUpdate_Holidays" class="btn btn-success">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end update-->

<!-- delete modal -->
<div class="modal fade" id="deleteModal_Holidays" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
            <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
        </div>      
      <div class="modal-body">
        Do you want to delete this Date?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnDelete_Holidays" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end delete modal -->
<script type="text/javascript">

    load_Holidays_data();
    // load Holidayss
    function load_Holidays_data() {
      $.ajax({
        url:'<?php echo base_url() ?>Holidays/pagination/1',
        method:'get',
        dataType:'json',
        success:function(data){
          $('#Holidays_table').html(data.Holidays_table);
          $(".se-pre-con").fadeOut("slow");
        }
      });
    }

  // delete
  function delete_holiday(data)
  {
    var id = data;
      $('#deleteModal_Holidays').modal('show');
      $('#deleteModal_Holidays').find('.modal-title').text('Delete Holidays');
      $('#btnDelete_Holidays').click(function(){
        $.ajax({
          type:'ajax',
          method:'get',
          async:false,
          url:'<?php echo base_url() ?>Holidays/delete_holiday',
          data:{id:id},
          dataType:'json',
          success:function(response){
            if (response.success) {
              $('#deleteModal_Holidays').modal('hide');
              $('.alert-success').html('Deleted Holidays successfully.').fadeIn().delay(4000).fadeOut('slow');
              load_Holidays_data();
            }
          }
        });
      });
  }

  // btnAdd new 
  $('#btnAdd_Holidays').click(function(){
    // add attribute
    $('#myForm_Holidays').attr('action','<?php echo base_url() ?>Holidays/addHolidays');
  });
  // btnSave new 
  $('#btnSave_Holidays').click(function(){
    var data = $('#myForm_Holidays').serialize();
  
    // validation
    var date_holiday = $('input[name=date_holiday]');
    var title = $('input[name=title]');
    var result = '';

    if (date_holiday.val() == '') {
      date_holiday.parent().parent().addClass('has-error');
      $('.alert-danger').html('Please enter date holiday.').fadeIn().delay(4000).fadeOut('slow');
      return;
    }else{
      date_holiday.parent().parent().removeClass('has-error');
      result +='1';
    }
    if (title.val() == '') {
      title.parent().parent().addClass('has-error');
      $('.alert-danger').html('Please enter title.').fadeIn().delay(4000).fadeOut('slow');
      return;
    }else{
      title.parent().parent().removeClass('has-error');
      result +='2';
    }    
    if (result == '12') {
      $.ajax({
        type:'ajax',
        method:'post',
        url:'<?php echo base_url() ?>Holidays/addHolidays',
        data:data,
        async:false,
        dataType:'json',
        success:function(response){
          if (response.success) {
            $('#myModal_Holidays').modal('hide');
            $('#myForm_Holidays')[0].reset();
            $('.alert-success').html('Added new Holidays successfully.').fadeIn().delay(4000).fadeOut('slow');
            load_Holidays_data();
          }
        }
      });
    }
  });
  function update_holiday(data)
  {
    var id = data;
    $('#updateModel_Holidays').modal('show');
      $('#updateModel_Holidays').find('.modal-title').text('Update Holidays');
      $('#updateform_Holidays').attr('action','<?php echo base_url() ?>Holidays/update_holiday');
      $.ajax({
        type:'ajax',
        method:'get',
        url:'<?php echo base_url() ?>Holidays/getdatabyid',
        data:{id:id},
        async:false,
        dataType:'json',
        success:function(data){
          $('input[name=id_update]').val(data.id);
          $('input[name=date_holiday_update]').val(data.date_holiday);
          $('input[name=title_update]').val(data.title);
        }
      });
  }
  // update
    $('#btnUpdate_Holidays').click(function(){
    var url = $('#updateform_Holidays').attr('action'); // action
    var data = $('#updateform_Holidays').serialize();
    // validation
    var date_holiday = $('input[name=date_holiday_update]');
    var title = $('input[name=title_update]');
    var result = '';

    if (date_holiday.val() == '') {
      date_holiday.parent().parent().addClass('has-error');
      $('.alert-danger').html('Please enter date holiday.').fadeIn().delay(4000).fadeOut('slow');
      return;
    }else{
      date_holiday.parent().parent().removeClass('has-error');
      result +='1';
    }
    if (title.val() == '') {
      title.parent().parent().addClass('has-error');
      $('.alert-danger').html('Please enter title.').fadeIn().delay(4000).fadeOut('slow');
      return;
    }else{
      title.parent().parent().removeClass('has-error');
      result +='2';
    }    
    if (result == '12') 
    {
      $.ajax({
        type:'ajax',
        method:'post',
        url:'<?php echo base_url() ?>Holidays/update_holiday',
        data:data,
        async:false,
        dataType:'json',
        success:function(response){
          if (response.success) {
            $('#updateModel_Holidays').modal('hide');
            $('#updateform_Holidays')[0].reset();
            $('.alert-success').html('Updated Holidays successfully.').fadeIn().delay(4000).fadeOut('slow');
            load_Holidays_data();
          }
        }
      });
    }
    });

</script>
