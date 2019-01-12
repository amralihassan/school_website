<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    New Post
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#" onclick="load_last_notification();">Posts</a></li>
    <li class="active">New Post</li>
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
    <div class="box-body">
      <form method="POST" action="" id="new_post_form">
          <div class="row" style="margin-bottom: 5px; display: none;">
            <div class="col-md-4">
                <select class="form-control" name="share_add" id="share_id">
                    <option value="Private">Private</option>
                </select>                
            </div>
          </div>
          <!-- select group -->
          <label>Select Group</label>
          <div class="row" style="margin-bottom: 5px;" id="private">
            <div class="col-md-4">
                <select multiple="multiple" class="form-control" name="groupName[]"  id="groupNameID" required="">
                </select>
            </div>
          </div>
          <!-- post -->
          <div class="row">
            <div class="col-md-12">
              <textarea name="post_details" class="form-control" style="height: 200px;margin-bottom: 5px;"></textarea>
            </div>
          </div>
          <!-- attachement -->
          <div class="form-group">
            <div class="btn btn-default btn-file">
              <i class="fa fa-paperclip"></i> Attachment
              <input type="file" name="file_name" id="file_name">                    
            </div>                 
            <p class="help-block">Max. 5MB</p>
          </div>           
      </form>
      <button class="btn btn-success" onclick="publish();">Publish</button>      
    </div>

</div>


<script type="text/javascript">
    load_groups_teacher();
    function load_groups_teacher()
    {
      // load groups
      $.ajax({
          type:'ajax',
          url:'<?php echo base_url() ?>Notication/load_groups_teacher',
          dataType:'json',
          success:function(data)
          {
              $('#groupNameID').html(data);
              $(".se-pre-con").fadeOut("slow");
          }
      });      
    }

    function publish()
    {
        $(':input[name="post"]').prop('disabled', true);
        var url='';
        // var url = $('#myForm').attr('action'); // action
        var data = new FormData(document.getElementById("new_post_form"));
        var file = document.getElementById('file_name').files[0]; //userfile file tag id
            if (file) {
                data.append('file_name', file); // add file to array
                url =  '<?php echo base_url() ?>Notication/new_post_image';
                // check size before upload
                if(($('#file_name')[0].files[0].size > 1000000 )) 
                { // 512 Kbyte (this size is in bytes)
                    //Prevent default and display error
                    alert("File is over 1MB in size!");
                   return;
                }               
            }
            else
            {
                // no attachement file
                 url =  '<?php echo base_url() ?>Notication/new_post';
            }    

            var post_details = $('textarea[name=post_details]');
            if (post_details.val().trim() == '')
            {
                $('.alert-danger').html('Please enter post to publish').fadeIn().delay(4000).fadeOut('slow');
                return;
            }
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
                    $(':input[name="post"]').prop('disabled', false);
                    load_last_notification();
                    $('#new_post_form')[0].reset();        
                }
            }
        });      

    }

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
</script>