    <!-- Main content -->
    <form action="" method="POST" id="from_id">
        <div id="message_id"></div>
    </form>

    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="#"  onclick="compose();" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#" onclick="inbox();"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right" ><div id="num_msg6"></div></span></a></li>
                <li><a onclick="sent();" href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                </li>

                <li><a onclick="trash();" href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                <li class="active"><a onclick="website_messages();" href="#"><i class="fa fa-file-text-o"></i> Website Messages</a></li>                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read Website Message</h3>
            </div>
            <!-- /.box-header -->
            <div id="read_website_message_table">

          </div>
            <!-- alert -->
            <div class="row box-body">
              <div class="col-md-12">
                <div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
              </div>
            </div>          
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<!-- delete modal -->
<div class="modal fade" id="deleteModal_website_message" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
            <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
        </div>      
      <div class="modal-body">
        Do you want to delete this message?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnDelete_contacts" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end delete modal -->    
<!-- deny modal -->
<div class="modal fade" id="deny_model" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
            <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
        </div>      
      <div class="modal-body">
        You don't have permission to delete.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end deny modal -->    

<script type="text/javascript">
  loading_num_msg();
  function loading_num_msg() {
      $.ajax({
        type:'ajax',
        url:'<?php echo base_url() ?>Mail/get_total_msg',
        async:false,
        dataType:'json',
        success:function(response){
          // load count of administrators , teachers and studends
          $('#num_msg6').html(response.num_msg);
        }
      });
  } 
 
  function read_web_message()
  {
    var id = $('input[name=id_read]');
    $.ajax({
      url:'<?php echo base_url() ?>Contact/pagination_read_message/1' ,
      method:'get',
      data:{id:id.val()},
      dataType:'json',
      success:function(data){
        $('#read_website_message_table').html(data.read_website_message_table);
      }
    });
  }

  function remove_message(id)
  {
      $('#deleteModal_website_message').modal('show');
      $('#deleteModal_website_message').find('.modal-title').text('Delete Message');
      $('#btnDelete_contacts').click(function(){
        $.ajax({
          type:'ajax',
          method:'get',
          async:false,
          url:'<?php echo base_url() ?>Contact/deletemessage',
          data:{id:id},
          dataType:'json',
          success:function(response){
            if (response.success) {
              
              $('#deleteModal_website_message').modal('hide');
             $('.alert-success').html('Deleted message successfully. To return to website messages <a href="#" onclick="website_messages();">Click here</a>').fadeIn();
            }
            
          }
        });
      });
  }  
  function deny()
  {
      $('#deny_model').modal('show');
      $('#deny_model').find('.modal-title').text('Alert');
  } 
</script>    