<div class="se-pre-con"></div>
<div class="box-body">
    <?php 
        if ($_SESSION['role'] != 'Parent') 
        {
            $add_post =''; 
            $add_group =''; 
            if ('Member'== $_SESSION['loginlevel'])
             {
                $add_post = "private_post();";
             }
             else
             {
                $add_post = "makePost();";
                if ('Administrative' == $_SESSION['role']) 
                {
                     $add_group = '
                                    <div  style="display: inline;">
                                        <a onclick="addGroup();" href="#" style=" margin-right: 5px;" href="#"><i style="  font-size: 17" class="fa fa-users">  </i>  Groups </a>                        
                                    </div>
                     ';
                }
             }
            echo '
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div  style="display: inline;">
                                        <a onclick="'.$add_post.'" href="#" style=" margin-right: 5px;" href="#"><i style="  font-size: 17" class="fa fa-commenting-o">  </i>  New Post </a>                        
                                    </div> 
                                            '.$add_group.'                                                  
                                </div>
                            </div>     
                        </div>
                    </div> 
            ';
        }
        else
        {
           echo '
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div  style="display: inline;">
                                       All Posts Edited by MEIS Staff.                      
                                    </div>                      
                                </div>
                            </div>     
                        </div>
                    </div> 
            ';
        }
     ?>    

    <div id="eventcalender"> </div>   
</div>

<!-- delete modal -->
<div class="modal fade" id="delete_post" role="dialog" tabindex="1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
                <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
            </div>          
            <div class="modal-body">
                Do you want to delete this post?
            </div>
            <div class="modal-footer">
                <button name="post" id="btnDelete" name="delPost" class="btn btn-danger">Delete</button>           
            </div>
        </div>
    </div>
</div>
<!-- end delete modal -->
<!-- update-->
<div class="modal fade" id="updateModel_post" role="dialog" tabindex="1">
    <div class="modal-dialog" role="document">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
                <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
            </div>          
            <div class="modal-body">
                <form action="" method="post" id="new_post_form_update">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="id_update" hidden="">
                                <textarea class="form-control" name="post_details_update" style="height: 150px;width: 100%;">
                                    
                                </textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button name="post" id="btnUpdate_post" name="updatePost" class="btn btn-success">Update Post</button>
            </div>
        </div>
    </div>
</div>
<!-- end update-->


<script type="text/javascript">
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
    function makePost()
    {
      $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Notication/makePost',
          async:false,
          dataType:'json',
          success:function(response){
              $('#page-content').html(response.page);
              // go to top page
              $('html, body').animate({ scrollTop: 0 }, 0);
          }
      }); 
    } 
    function private_post()
    {
      $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Notication/private_post',
          async:false,
          dataType:'json',
          success:function(response){
              $('#page-content').html(response.page);
              // go to top page
              $('html, body').animate({ scrollTop: 0 }, 0);
          }
      });         
    }   

    $('#file_name').on('change',function(e){
        var filename = e.target.value.split("\\").pop();
        $('#label_file').fadeIn();
        $('#label_file').text(filename);
    });
    // post for teacher private only
    <?php 
        if ('Member'==$_SESSION['loginlevel']) 
        {
            echo "$('#private').fadeIn();";
        }
     ?>
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
    <?php 
        if ($_SESSION['role'] != "Parent")
        {
            echo "lastNotification();";
        }
        if ($_SESSION['role'] == "Parent")
        {
            echo "load_Parent_notifiction();";
        }

     ?>
    // load all posts

    function lastNotification() {
        $.ajax({
            url:'<?php echo base_url() ?>Notication/pagination_notifications/1',
            method:'get',
            dataType:'json',
            success:function(data){
                $('#eventcalender').html(data.notificationview_table);
                $(".se-pre-con").fadeOut("slow");
            }
        });
    }

    function load_Parent_notifiction() {
        $.ajax({
            url:'<?php echo base_url() ?>Notication/pagination_notifications_parent/1',
            method:'get',
            dataType:'json',
            success:function(data){
                $('#eventcalender').html(data.notificationview_table);
                $(".se-pre-con").fadeOut("slow");
            }  
        });
    }    

    // delete
    function delete_post(data)
    {
        $(':input[name="delPost"]').prop('disabled', true);
        var id = data;
        var img ='';
        $('#delete_post').modal('show');
        $('#delete_post').find('.modal-title').text('Delete Post');
        // get file name
        $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url() ?>Notication/getdatabyid',
            data:{id:id},
            async:false,
            dataType:'json',
            success:function(data){
                img = data.file_name;
            }
        });          
        $('#btnDelete').click(function(){
            $.ajax({
                type:'ajax',
                method:'get',
                async:false,
                url:'<?php echo base_url() ?>Notication/delete_post',
                data:{id:id,img:img},
                dataType:'json',
                success:function(response){
                    if (response.success) {
                        $('#delete_post').modal('hide');
                        $(':input[name="delPost"]').prop('disabled', false);
                            <?php 
                                if ($_SESSION['role'] != "Parent")
                                {
                                    echo "lastNotification();";
                                }
                                if ($_SESSION['role'] == "Parent")
                                {
                                    echo "load_Parent_notifiction();";
                                }

                             ?>                                                              
                    }
                }
            });
        });
    } 
    // update
    function update_post(data)
    {
        $('#updateModel_post').modal('show');
        $('#updateModel_post').find('.modal-title').text('Edit Post');
        var id = data;
        // get data by id
        $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url() ?>Notication/getdatabyid',
            data:{id:id},
            async:false,
            dataType:'json',
            success:function(data){
                $('input[name=id_update]').val(data.id);
                $('textarea[name=post_details_update]').val(data.post);
            
            }
        });              
    }
    // btn update
    $('#btnUpdate_post').click(function(){
        $(':input[name="updatePost"]').prop('disabled', true);
        var data = $('#new_post_form_update').serialize();
        $.ajax({
            type:'ajax',
            method:'post',
            url:'<?php echo base_url() ?>Notication/update_post',
            data:data,
            async:false,
            dataType:'json',
            success:function(response)
            {
                if (response.success) {
                    $('#updateModel_post').modal('hide');
                     $(':input[name="updatePost"]').prop('disabled', false);
                    $('#new_post_form_update')[0].reset();
                        <?php 
                            if ($_SESSION['role'] != "Parent")
                            {
                                echo "lastNotification();";
                            }
                            if ($_SESSION['role'] == "Parent")
                            {
                                echo "load_Parent_notifiction();";
                            }

                         ?>
                    }
            }
        });        
    });
    
</script>
