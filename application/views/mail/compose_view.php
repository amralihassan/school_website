<div class="se-pre-con"></div>
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="#" onclick="inbox();" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a onclick="inbox();" href="#"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right" ><div id="num_msg4"></div></span></a></li>
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
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <!-- /.box-header -->
            <form action="" method="POST" id="myForm_newmessage">
              <div class="box-body">
                <?php 
                  if ('Member' == $_SESSION['loginlevel'])
                  {
                    echo '
                        <div class="form-group">
                              <select class="form-control" name="roomID_add" id="room" required="">
                                <option value="">Select Class</option>
                              </select>
                        </div> 
                    ';
                  }
                  if ('Parent' == $_SESSION['role'])
                  {
                    echo '
                       <label>To whom you want to send the message? </label><br>
                       <div class="row">
                         <div class="col-md-2">
                            <input type="radio" checked="" name="sendTo" onclick="load_administrtors();" id="Administrators" value="Administrators"> Administrative                      
                         </div>
                       </div>                 
                       <div class="row"> 
                         <div class="col-md-2">
                           <input type="radio" name="sendTo" onclick="load_students();" id="teacher" value="teacher" > Teacher
                         </div>

                       </div>
                       <div class="row">
                         <div class="col-md-6"> 
                           <select style="display:none;" name="student_class" id="stu_id" class="form-control" onchange="load_teachers();">
                             <option value="">Select Student</option>
                           </select>
                         </div>
                       </div>

                       <br>
                    ';
                  }
                 ?>


                 <div class="row">
                   <div class="col-md-12">
                      <div class="form-group">
                        <!-- <input class="form-control" placeholder="To:"> -->
                        <select class="form-control select2" name="reciver_add" id="parentname_id">
                          <option value="">Send To:</option>
                        </select>                
                      </div>                     
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12">
                      <div class="form-group">
                        <input class="form-control" placeholder="Subject:" name="subject_add">
                      </div>                     
                   </div>
                 </div>

                <div class="form-group">
                      <textarea id="compose-textarea" class="form-control" style="height: 200px" name="bodyMessage_add"></textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Attachment
                    <input type="file" name="file_name" id="file_name">                    
                  </div>                 
                  <p class="help-block">Max. 5MB</p>
                </div>
                <!-- progree bar -->
                <div class="form-group"> 
                  <div id="uploadProgress" style="display: none;">
                      <div class="progress">
                          <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:0%;">0%</div>
                      </div>                
                  </div>                 
                </div>
               
              </div>              
            </form>

            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="submit" class="btn btn-primary" id="btnSend_message"><i class="fa fa-envelope-o"></i> Send</button>
              </div>
              <button onclick="inbox();" type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<!-- alert message -->
<div class="modal fade" id="alert_model" role="dialog" tabindex="1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">    
      <div class="modal-body" style="background-color: #138f06; color: white;">
        <div id="message_text"></div>
      </div>
    </div>
  </div>
</div>    
    <script type="text/javascript">   
      function alert_message(msg)
      {
          $('#message_text').html(msg);
          $('#alert_model').modal('show');  
      }  
      // hide message automatic
      setTimeout(function(){$('#alert_model').modal('hide')}, 7000);   

      loading_num_msg();
      function loading_num_msg() {
          $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Mail/get_total_msg',
            async:false,
            dataType:'json',
            success:function(response){
              // load count of administrators , teachers and studends
              $('#num_msg4').html(response.num_msg);
               $('.se-pre-con').fadeOut('slow');
            }
          });
      }  
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      })    

      // load_administrtors();
      load_classes();
      function load_classes() 
      {
        // load classes
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Room/retrive_teacher_room',
            dataType:'json',
            success:function(data)
            {
              $('#room').html(data);
              $('.se-pre-con').fadeOut('slow');
            }
          });  
      }

      function load_administrtors()
      {
          $.ajax({
              type:'ajax',
              url:'<?php echo base_url() ?>Administrator/retrive_users_mail_return_roomID',
              dataType:'json',
              success:function(data)
              {
                $('#parentname_id').html(data);
                $('#stu_id').hide();
                $('.se-pre-con').fadeOut('slow');
              }
            });  
      } 
      function load_students()
      {
        $('#parentname_id').html("");
        // load students
        $.ajax({
          type:'ajax',
          url:'<?php echo base_url() ?>Student/retrive_student_and_class',
          dataType:'json',
          success:function(data)
          {
            $('#stu_id').html(data);
            $('#stu_id').show();
          }
        });        
      }       
      function load_teachers()
      {
       
        // load techers
        var roomID = $('select[name=student_class]');
        alert(roomID.val());
        $.ajax({
          url:'<?php echo base_url() ?>Administrator/retrive_users_mail_return_roomID',
          method:'get',
          data:{roomID:roomID.val()},
          dataType:'json',
          success:function(data){
            $('#parentname_id').html(data);
          }
        });     
      }        

    $('#room').on('change', function(){
      var roomID = $(this).val();  //set country = country_id
      
      if (roomID == '') // is empty
      {
        // $('#parentname_id').prop('disabled', true); // set disable
        load_administrtors();
      }
      else // is not empty
      {
        $('#parentname_id').prop('disabled', false); // set enable
        //using 
        $.ajax({
          url:"<?php echo base_url() ?>Administrator/retrive_class_parents", // method that will get data
          type:"get",
          //data:jQuery.param ({gradeID : 'gradeID' , divisionID : 'divisionID'}), 
          data:{'roomID' : roomID},
          dataType: 'json',
          success: function(data){
            $('#parentname_id').html(data);
          },
          error: function(){
            $('#parentname_id').prop('disabled', true); // set disable
          }
        });
      }
    });      
      $('#btnSend_message').click(function(){

        $('#progress-bar').css('width', 0 + '%');
        
        var url='';
        // var url = $('#myForm').attr('action'); // action
        var data = new FormData(document.getElementById("myForm_newmessage"));
        var file = document.getElementById('file_name').files[0]; //userfile file tag id
        if (file) {
            data.append('file_name', file); // add file to array
            url =  '<?php echo base_url() ?>Mail/sendMessage';
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
           url =  '<?php echo base_url() ?>Mail/sendMessage_no_attachement';
        }
       
      
        // var data = $('#myForm_newmessage').serialize();
        // var url = '<?php echo base_url() ?>Mail/sendMessage';
        var result = '';
        var reciver = $('select[name=reciver_add]');
        var subject = $('input[name=subject_add]');
        var bodyMessage = $('textarea[name=bodyMessage_add]');
        
        // validation
        if (reciver.val() == '') {
          alert("Please select someone to send message.");
          return;
        }else{
          reciver.parent().parent().removeClass('has-error');
          result +='1';
        }
        if (subject.val() == '') {
          subject.parent().parent().addClass('has-error');
          return;
        }else{
          subject.parent().parent().removeClass('has-error');
          result +='2';
        }
        if (bodyMessage.val() == '') {
          bodyMessage.parent().parent().addClass('has-error');
          return;
        }else{
          bodyMessage.parent().parent().removeClass('has-error');
          result +='3';
        }   

        if (result == '123') {
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
                  $('#myForm_newmessage')[0].reset();
                  load_administrtors();        
                  alert_message("<h5 style='text-align:center;'>Message Sent</h5>");
                  // go to top page
                  $('html, body').animate({ scrollTop: 0 }, 0);

                  $('#uploadProgress').fadeOut();
                }
                else
                {
                    alert_message("Message not sent");
                    alert_message("<h5 style='text-align:center;'>Message not sent</h5>");
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
    </script>