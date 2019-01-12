<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Trash
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Mailbox</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="#" onclick="compose();" class="btn btn-primary btn-block margin-bottom">Compose</a>

      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Folders</h3>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a onclick="inbox();" href="#"><i class="fa fa-trash"></i> Inbox
              <span class="label label-primary pull-right" ><div id="num_msg4"></div></span></a></li>
            <li><a onclick="sent();" href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
            <li class="active"><a onclick="trash();" href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
            <?php if ($_SESSION['loginlevel'] != 'Member' && $_SESSION['role'] != 'Parent')
            {
              echo '<li><a onclick="website_messages();" href="#"><i class="fa fa-file-text-o"></i> Website Messages</a></li>';
            } ?>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Trash</h3>

          <div class="box-tools pull-right">
            <div class="has-feedback">
              <input type="text" class="form-control input-sm" placeholder="Search" id="id_of_textbox_trash" name="txtSearch_trash">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <div class="mailbox-controls">
            <form action="" method="POST" id="trash_form" name="frm">
              <!-- /.btn-group -->
              <button type="button" onclick="move_to_inbox();" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
              <!-- /.pull-right -->   
              <div id="trash_table"></div>
              <div style="float: right;margin-right: 50px;" id="trash_pagination_link"></div>           
            </form>

          </div>
          
          
          <!-- /.mail-box-messages -->
        </div>
      </div>
      <!-- /. box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<!-- delete modal -->
<div class="modal fade" id="deleteModal_trash" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">    
      <div class="modal-body">
        Do you want to move these messages to inbox?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnMove" class="btn btn-danger">Ok</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- end delete modal -->

<script type="text/javascript"> 
  // check all
  function checkall()
  {
    var totalelements = document.forms[0].elements.length;

    for(var i=0; i<totalelements; i++)
    {
      var elementName = document.forms[0].elements[i].name;

      if (elementName!=undefined & elementName.indexOf("mailID")!= -1)
      {
        document.forms[0].elements[i].checked = document.frm.chk_all.checked;
      }
    }
  }  

  // delete 
  function move_to_inbox()
  {
    var data = $('#trash_form').serialize();
    if (data == "") {alert("No message selected!");return;}
      $('#deleteModal_trash').modal('show');
      $('#btnMove').click(function(){
        $.ajax({
          type:'ajax',
          method:'post',
          url:'<?php echo base_url() ?>Mail/move_more_one_msg_to_inbox',
          data:data,
          async:false,
          dataType:'json',
          success:function(response){
            if (response.success) {
               $('#deleteModal_trash').modal('hide');
              load_trash_msg(1);
            }
          }
        });
      });
  }  
  // search
  function searchData(page) 
  {
    // get word search
    var searchtxt = $('input[name=txtSearch_trash]');
    $.ajax({
      url:'<?php echo base_url() ?>Mail/pagination_search_trash/' + page,
      method:'get',
      data:{name:searchtxt.val()},
      dataType:'json',
      success:function(data){
        $('#trash_table').html(data.trash_table);
        $('#trash_pagination_link').html(data.trash_pagination_link);
      }
    });
  }
  $('#id_of_textbox_trash').keyup(function(event){
    if (event.keyCode === 13) {
      searchData(1);
    }
  });  
  load_trash_msg(1);
  loading_num_msg();
    // load data
  function load_trash_msg(page) {
    $.ajax({
      url:'<?php echo base_url() ?>Mail/pagination_trash/' + page,
      method:'get',
      dataType:'json',
      success:function(data){
        $('#trash_table').html(data.trash_table);
        $('#trash_pagination_link').html(data.trash_pagination_link);
        $(".se-pre-con").fadeOut("slow");
      }
    });   
  }
  $(document).on('click',".pagination li a", function(event){
    event.preventDefault();
    var page = $(this).data('ci-pagination-page');
    load_trash_msg(page);
    // go to top page
    $('html, body').animate({ scrollTop: 0 }, 0);
  });  

  function loading_num_msg() {
      $.ajax({
        type:'ajax',
        url:'<?php echo base_url() ?>Mail/get_total_msg',
        async:false,
        dataType:'json',
        success:function(response){
          // load count of administrators , teachers and studends
          $('#num_msg4').html(response.num_msg);
          $('#num_msg5').html(response.num_msg+' new messages');
        }
      });
  }  
  // trash
  function read_mail(mailID)
  {
      var mailID = mailID;
      $.ajax({
          type:'ajax',
          method:'get',
          data :{id:mailID},
          url:'<?php echo base_url() ?>Mail/load_mail',
          async:false,
          dataType:'json',
          success:function(response){
              $('#pagetitle').html(response.pagetitle);
              $('#page-content').html(response.page); 
              $('#mailid').html('<input type="text" name="mailID_read" hidden="" value="'+response.mailID+'">');                 
              // go to top page
              $('html, body').animate({ scrollTop: 0 }, 0);
               read_message();  
          }
      });
  }      
</script>
