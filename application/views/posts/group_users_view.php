<div class="se-pre-con"></div>
<section class="content-header">
  <h1 id="head_gn">
   
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#" onclick="load_last_notification();">Posts</a></li>
    <li><a href="#" onclick="addGroup();">Groups</a></li>
    <li class="active" id="link_gn"></li>
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
              <a style="display: inline;" href="#" onclick="addGroup();">Groups | <div style="display: inline;" id="title_gn"></div></a>
          </div>
          <div class="panel-body">
               <div class="row">
                 <form method="POST" action="" id="joinFormid">
                     <input type="text" name="group_id_name" hidden="" id="group_id">
                     <div class="col-md-10">
                        <div class="form-group">
                          <!-- <input class="form-control" placeholder="To:"> -->
                          <select class="form-control select2" name="username" id="usernameID">
                            <option value="">-- Select --</option>
                          </select>                
                        </div>                     
                     </div>
                 </form>
                 <div class="col-md-2">
                      <button class="btn btn-success" name="btnJoin" onclick="joinGroup();">Join Group</button>
                 </div>
               </div>  
               <hr>
               <div class="row">
                 <div class="col-md-12">
                      <div id="groupTable"></div>                   
                 </div>
               </div>                 
          </div>
      </div>
    </div>                  
  </div>
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModal_group" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">   
      <div class="modal-body">
        Do you want to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnDelete_group" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

    function joinGroup()
    {
      $(':input[name="btnJoin"]').prop('disabled', true);
      $group_id = $('input[name=group_id_name]').val();
      var data = $('#joinFormid').serialize();
      // validation
      var username = $('select[name=username]');
      var result = '';

      if (username.val() == '') {
        username.parent().parent().addClass('has-error');
        $('.alert-danger').html('Please select user.').fadeIn().delay(4000).fadeOut('slow');      
        return;
      }else{
        username.parent().parent().removeClass('has-error');
        result +='1';
      }
      if (result == '1') {
        $.ajax({
          type:'ajax',
          method:'post',
          url:'<?php echo base_url() ?>Notication/addUser',//action
          data:data,
          async:false,
          dataType:'json',
          success:function(response){

            if (response.status == 1) {
              // $('#joinFormid')[0].reset();
              $('.alert-success').html('User joined successfully.').fadeIn().delay(4000).fadeOut('slow');
              load_group_users_data($group_id);
              $(':input[name="btnJoin"]').prop('disabled', false);
            }
             else
            {
              $('#addModel_group').modal('hide');
              $(':input[name="btnJoin"]').prop('disabled', false);
              // $('#addForm_group')[0].reset();
              // go to top page
              $('html, body').animate({ scrollTop: 0 }, 0);              
              $('.alert-success').html('The user alredy exists in the group.').fadeIn().delay(4000).fadeOut('slow');

            }            
          }
        });
      }              
    }
    // load all users
    load_users();
    function load_users()
    {
      $.ajax({
          type:'ajax',
          url:'<?php echo base_url() ?>Administrator/retrive_users',
          dataType:'json',
          success:function(data)
          {
            $('#usernameID').html(data);
            $('.se-pre-con').fadeOut('slow');
          }
        });      
    }
    //load user
    function load_group_users_data(group_id)
    {
      $('input[name=group_id_name]').val(group_id);
      // load group name
      load_group_name(group_id);

      //load users inside group
      $.ajax({
        url:'<?php echo base_url() ?>Notication/load_group_users_data',
        method:'get',
        data:{group_id:group_id},        
        dataType:'json',
        success:function(data){
          $('#groupTable').html('<table id ="example1" class="table table-hover table-bordered"><thead><tr><th class="col-md-7">Full Name</th><th class="col-md-2">Mobile</th><th class="col-md-2">Role</th><th class="col-md-1">Remove</th></tr></thead> ' + data + '</table>'); 
              $('#example1').DataTable({"destroy": true,});
              $(".se-pre-con").fadeOut("slow");       
        }
      });       
    }
    function load_group_name(group_id)
    {
      // load group name
      $.ajax({
        url:'<?php echo base_url() ?>Notication/load_group_name',
        method:'get',
        data:{group_id:group_id},
        dataType:'json',
        success:function(group_name){
          $('#head_gn').html(group_name);
          $('#title_gn').html(group_name);
          $('#link_gn').html(group_name);
        }
      });      
    }
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })       
    function addGroup()
      {
        $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url() ?>Notication/loadGroups',
            async:false,
            dataType:'json',
            success:function(response){
                $('#page-content').html(response.page);
                // go to top page
                $('html, body').animate({ scrollTop: 0 }, 0);
            }
        }); 
      }    
    function delete_user(id,group_id)
    {
      var id = id;
        $('#deleteModal_group').modal('show');
        $('#btnDelete_group').click(function(){
          $.ajax({
            type:'ajax',
            method:'get',
            async:false,
            url:'<?php echo base_url() ?>Notication/deleteUser',
            data:{id:id},
            dataType:'json',
            success:function(response){
              if (response.success) {
                $('#deleteModal_group').modal('hide');
                // go to top page
                $('html, body').animate({ scrollTop: 0 }, 0);                
                $('.alert-success').html('Deleted user successfully.').fadeIn().delay(4000).fadeOut('slow');
                load_group_users_data(group_id);
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