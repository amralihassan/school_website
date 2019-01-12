<div class="se-pre-con"></div>
    <!-- Main content -->
    <form action="" method="POST" id="from_mailID">
        <div id="mailid"></div>
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
                <li><a onclick="trash();" href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                <?php if ($_SESSION['loginlevel'] != 'Member' && $_SESSION['role'] != 'Parent')
                {
                  echo '<li><a onclick="website_messages();" href="#"><i class="fa fa-file-text-o"></i> Website Messages</a></li>';
                } ?>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>
            </div>
            <!-- /.box-header -->
            <div id="read_inbox_table">

          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

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
 
  function read_message()
  {
    var mailID = $('input[name=mailID_read]');
    $.ajax({
      url:'<?php echo base_url() ?>Mail/pagination_read_message/1' ,
      method:'get',
      data:{id:mailID.val()},
      dataType:'json',
      success:function(data){
        $('#read_inbox_table').html(data.read_inbox_table);
        $(".se-pre-con").fadeOut("slow");
      }
    });
  }

  function move_to_trash(mailID)
  {
    var id = mailID;
    $.ajax({
      type:'ajax',
      method:'get',
      async:false,
      url:'<?php echo base_url() ?>Mail/move_to_trash',
      data:{id:id},
      dataType:'json',
      success:function(response){
        if (response.success) {
          inbox();
        }
      }
    });
  }
</script>    