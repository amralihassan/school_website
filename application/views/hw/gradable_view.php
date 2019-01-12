<div class="se-pre-con"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Homework
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#" onclick="homework();"><i class="fa fa-dashboard"></i> Homework</a></li>
    <li class="active">gradble</li>
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
            Homework
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                  <div id="homework_table"></div>
                  <form method="POST" name="form_grdable" id="form_grdable_id">   
                      <div class="row">
                        <div class="col-md-1">
                          <label><b>Full Mark</b></label>
                        </div>
                        <div class="col-md-1">
                          <input type="text" name="fullMark[]" class="form-control" id="fullMarkID">
                        </div>
                      </div>  
                      <br>
                      <div class="row">
                        <div class="col-md-12">
                          <div id="class_table"></div>
                        </div>
                      </div>                 
                      
                  </form>                
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <button class="form-control btn btn-success" onclick="insertMarks();">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>          
  </div>
</div>

<script type="text/javascript">

  // Numeric only control handler
  jQuery.fn.ForceNumericOnly =
  function()
  {
      return this.each(function()
      {
          $(this).keydown(function(e)
          {
              var key = e.charCode || e.keyCode || 0;
              // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
              // home, end, period, and numpad decimal
              return (
                  key == 8 || 
                  key == 9 ||
                  key == 13 ||
                  key == 46 ||
                  key == 110 ||
                  key == 190 ||
                  (key >= 35 && key <= 40) ||
                  (key >= 48 && key <= 57) ||
                  (key >= 96 && key <= 105));
          });
      });
  };  
  $("#fullMarkID").ForceNumericOnly(); 
  // get homework data by roomID

  function load_homework_details(hwID)
  {
    var roomID ='';
    // load homework details
    $.ajax({
      url:'<?php echo base_url() ?>Homework/pagination_homework_gradable/1',
      method:'get',
      data:{hwID:hwID},
      dataType:'json',
      success:function(data){
        $('#homework_table').html(data.homework_table);
        // load student class
        roomID = $('input[name=txtSearch_roomID]').val(); 
        $(".se-pre-con").fadeOut("slow");
        load_class_students(roomID,hwID);
      }
    });  
  }
  // load student class
  function load_class_students(roomID,hwID)
  {
    $.ajax({
      url:'<?php echo base_url() ?>Homework/pagination_class_gradable/1',
      method:'get',
      data:{roomID:roomID,hwID:hwID},
      dataType:'json',
      success:function(data){
        $('#class_table').html(data.class_table);
        $(".se-pre-con").fadeOut("slow");
      }
    });     
  }
  // insert data
  function insertMarks()
  {
    var data = $('#form_grdable_id').serialize();
      $.ajax({
        type:'ajax',
        method:'post',
        url:'<?php echo base_url() ?>Homework/insertMarks',
        data:data,
        async:false,
        dataType:'json',
        success:function(response){
          if (response == 4)
           {
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);            
            $('.alert-danger').html("Please fill out all inputs." ).fadeIn().delay(4000).fadeOut('slow');               
           }
          if (response == 0)
           {
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);            
            $('.alert-danger').html("You have alerady added student's marks" ).fadeIn().delay(4000).fadeOut('slow');            
           }
          if (response == 1)
           {
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);            
            $('.alert-danger').html("Must be student's mark less than full mark." ).fadeIn().delay(4000).fadeOut('slow');            
           }           
          if (response == 2) {
            $('#form_grdable_id')[0].reset();
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);            
            $('.alert-success').html('Added successfully.').fadeIn().delay(4000).fadeOut('slow');
          }
        }
      });    
  }

</script>