<div class="se-pre-con"></div>
<div class="box-body">
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
    <div id="eventcalender"> </div>   
</div>

<script type="text/javascript">
    load_class_posts();
    function load_class_posts() {
        $.ajax({
            url:'<?php echo base_url() ?>Notication/pagination_notifications_class/1',
            method:'get',
            dataType:'json',
            success:function(data){
                $('#eventcalender').html(data.notificationview_table);
                $(".se-pre-con").fadeOut("slow");
            }  
        });
    }    

</script>
