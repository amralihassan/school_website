<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    Classes
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Classes</li>
  </ol>
</section>
<br>
<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Your Classes
        </div>
        <div class="panel-body">
          <div id="classes_table"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
   
	load_techer_classes();
  function load_techer_classes() {
    $.ajax({
      url:'<?php echo base_url() ?>Teacher/pagination_teacher_classes/1',
      method:'get',
      dataType:'json',
      success:function(data){
        $('#classes_table').html(data.classes_table);
        $(".se-pre-con").fadeOut("slow");
      }
    });   
  }	
</script>