<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Sent
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Sentbox</li>
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
            <li><a onclick="inbox();" href="#"><i class="fa fa-inbox"></i> Inbox
              <span class="label label-primary pull-right" ><div id="num_msg4"></div></span></a></li>
            <li class="active"><a onclick="sent();" href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
            <li><a onclick="trash();" href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
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
          <h3 class="box-title">Sent</h3>

          <div class="box-tools pull-right">
            <div class="has-feedback">
              <input type="text" class="form-control input-sm" placeholder="Search" id="id_of_textbox_inbox" name="txtSearch_inbox">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <div class="mailbox-controls">
              <div id="sent_table"></div>
              <div style="float: right;margin-right: 50px;" id="sent_pagination_link"></div>  
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
<div class="modal fade" id="deleteModal_inbox" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">    
      <div class="modal-body">
        Do you want to delete these messages?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnDelete_msg" class="btn btn-danger">Delete</button>
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

  // move to trash
  function delete_msg()
  {
    var data = $('#inbox_form').serialize();
    if (data == "") {alert("No message selected!");return;}
      $('#deleteModal_inbox').modal('show');
      $('#btnDelete_msg').click(function(){
    $.ajax({
      type:'ajax',
      method:'post',
      url:'<?php echo base_url() ?>Mail/move_from_inbox_to_trash',
      data:data,
      async:false,
      dataType:'json',
      success:function(response){
        if (response.success) {
          $('.alert-success').html('Deleted messages successfully.').fadeIn().delay(4000).fadeOut('slow');
          $('#deleteModal_inbox').modal('hide');
  
          load_inbox_msg(1);

        }
      }
    });
      });
  }  
  // search
  function searchData(page) 
  {
    // get word search
    var searchtxt = $('input[name=txtSearch_inbox]');
    $.ajax({
      url:'<?php echo base_url() ?>Mail/pagination_search_inbox/' + page,
      method:'get',
      data:{name:searchtxt.val()},
      dataType:'json',
      success:function(data){
        $('#sent_table').html(data.sent_table);
        $('#sent_pagination_link').html(data.sent_pagination_link);
      }
    });
  }
  $('#id_of_textbox_inbox').keyup(function(event){
    if (event.keyCode === 13) {
      searchData(1);
    }
  });  
  load_sent_msg(1);
  loading_num_msg();
    // load data
  function load_sent_msg(page) {
    $.ajax({
      url:'<?php echo base_url() ?>Mail/pagination_sent/' + page,
      method:'get',
      dataType:'json',
      success:function(data){
        $('#sent_table').html(data.sent_table);
        $('#sent_pagination_link').html(data.sent_pagination_link);
        $(".se-pre-con").fadeOut("slow");
      }
    });   
  }
  $(document).on('click',".pagination li a", function(event){
    event.preventDefault();
    var page = $(this).data('ci-pagination-page');
    load_sent_msg(page);
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
  // inbox
  function sent_mail(mailID)
  {
      var mailID = mailID;
      $.ajax({
          type:'ajax',
          method:'get',
          data :{id:mailID},
          url:'<?php echo base_url() ?>Mail/load_sent_mail',
          async:false,
          dataType:'json',
          success:function(response){
              $('#pagetitle').html(response.pagetitle);
              $('#page-content').html(response.page); 
              $('#read_mailid').html('<input type="text" name="mailID_read" hidden="" value="'+response.mailID+'">');                 
              // go to top page
              $('html, body').animate({ scrollTop: 0 }, 0);
               read_message();  
          }
      });
  }      
</script>
