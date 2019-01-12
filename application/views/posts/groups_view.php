<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Create New Group
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#" onclick="load_last_notification();"><i class="fa fa-comment"></i> Posts</a></li>
    <li class="active">Create New Group</li>
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
<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-heading">
          <a href="#" onclick="load_last_notification();"> Posts</a> | <a href="#" onclick="addGroup();"> Create group</a>
         </div>
         <div class="panel-body">
            <div class="table table-responsive" id="groups_table"></div>              
         </div>
      </div>
    </div>                  
  </div>
</div>
<!-- add model -->
<div class="modal fade" id="addModel_group" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
            <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
        </div>      
      <div class="modal-body">
        <form id="addForm_group" action="" method="POST">
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
          <!-- group name -->
          <div class="form-group">
            <label>Group Name</label>
            <input class="form-control" type="text" name="group_name" required="required" placeholder="Group Name" >
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btSave_group" class="btn btn-success">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- update model -->
<div class="modal fade" id="updateModel_group" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
            <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
        </div>      
      <div class="modal-body">
        <form id="updateform_group" action="" method="POST">
          <!-- group name -->
          <div class="form-group">
            <label>Group Name</label>
            <input type="text" name="group_id" hidden="" value="">
            <input class="form-control" type="text" name="group_name_update" required="required" placeholder="Group Name" >
          </div>
       
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnUpdate_group" class="btn btn-success">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModal_group" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">   
      <div class="modal-body">
        Do you want to delete this group?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnDelete_group" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function update_group(group_id)
  {
    var id = group_id;
    $('#updateModel_group').modal('show');
      $('#updateModel_group').find('.modal-title').text('Update group name');
      $.ajax({
        type:'ajax',
        method:'get',
        url:'<?php echo base_url() ?>Notication/getdatabyid_groups',
        data:{id:id},
        async:false,
        dataType:'json',
        success:function(data){
          $('input[name=group_id]').val(data.group_id);
          $('input[name=group_name_update]').val(data.group_name);
        }
      });
  }  
  $('#btnUpdate_group').click(function(){
    var data = $('#updateform_group').serialize();
    // validation
    var group_name_update = $('input[name=group_name_update]');
    var result = '';

    if (group_name_update.val() == '') {
      group_name_update.parent().parent().addClass('has-error');
      alert('Please enter group name');
      $('.alert-danger').html('Please enter group_name.').fadeIn().delay(4000).fadeOut('slow');      
      return;
    }else{
      group_name_update.parent().parent().removeClass('has-error');
      result +='1';
    }
    if (result == '1') {
      $.ajax({
        type:'ajax',
        method:'post',
        url:'<?php echo base_url() ?>Notication/updateGroup',//action
        data:data,
        async:false,
        dataType:'json',
        success:function(response){
          if (response.success) {
            $('#updateModel_group').modal('hide');
            $('#updateform_group')[0].reset();
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);            
            $('.alert-success').html('Updated group name successfully.').fadeIn().delay(4000).fadeOut('slow');
            load_groups_data();
          }
        }
      });
    }  
  });
  function addGroup() 
  {
    $('#addModel_group').find('.modal-title').text('Create New Group'); // rename modal
    $('#addModel_group').modal('show');
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
  }
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
  $('#btSave_group').click(function(){
    var data = $('#addForm_group').serialize();
    // validation
    var group_name = $('input[name=group_name]');
    var result = '';

    if (group_name.val() == '') {
      group_name.parent().parent().addClass('has-error');
      $('.alert-danger').html('Please enter group_name.').fadeIn().delay(4000).fadeOut('slow');      
      return;
    }else{
      group_name.parent().parent().removeClass('has-error');
      result +='1';
    }   
    if (result == '1') {
      $.ajax({
        type:'ajax',
        method:'post',
        url:'<?php echo base_url() ?>Notication/addGroup',//action
        data:data,
        async:false,
        dataType:'json',
        success:function(response){
          if (response.success) {
            $('#addModel_group').modal('hide');
              // go to top page
              $('html, body').animate({ scrollTop: 0 }, 0);            
            $('#addForm_group')[0].reset();
            $('.alert-success').html('Added new group successfully.').fadeIn().delay(4000).fadeOut('slow');
            load_groups_data();
          }

        }
      });
    }     
  });

  load_groups_data();

  function load_groups_data()
  {
    $.ajax({
      url:'<?php echo base_url() ?>Notication/load_groups_data/',
      method:'get',
      dataType:'json',
      success:function(data){
        $('#groups_table').html('<table id ="example1" class="table table-hover table-bordered"><thead><tr><th class="col-md-10">Group Name</th><th class="col-md-1">Edit</th><th class="col-md-1">Remove</th></tr></thead> ' + data + '</table>'); 
            $('#example1').DataTable({"destroy": true,});
            $(".se-pre-con").fadeOut("slow");       
      }
    });    
  }

  function addUsers(group_id)
  {
      $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Notication/load_group_users',
          async:false,
          dataType:'json',
          success:function(response){
              $('#page-content').html(response.page);
              // go to top page
              $('html, body').animate({ scrollTop: 0 }, 0);
              load_group_users_data(group_id);
          }
      }); 
  }
  function delete_group(group_id)
  {
    var id = group_id;
      $('#deleteModal_group').modal('show');
      $('#btnDelete_group').click(function(){
        $.ajax({
          type:'ajax',
          method:'get',
          async:false,
          url:'<?php echo base_url() ?>Notication/deleteGroup',
          data:{id:id},
          dataType:'json',
          success:function(response){
            if (response.success) {
              $('#deleteModal_group').modal('hide');
              $('.alert-success').html('Deleted group successfully.').fadeIn().delay(4000).fadeOut('slow');
              // go to top page
              $('html, body').animate({ scrollTop: 0 }, 0);              
              load_groups_data();
            }
          }
        });
      });
  }  

  
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