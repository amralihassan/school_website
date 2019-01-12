<div class="se-pre-con"></div>
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php 
        if ($_SESSION['loginlevel'] == 'Super Administrator' )
        {
            echo '
            <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3 id="admin"></h3>
                      <p>Administrators</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">More Deatils <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3 id="teachers">53<sup style="font-size: 20px">%</sup></h3>

                      <p>Teacher</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">More Deatils <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3 id="parents"></h3>

                      <p>Parents</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">More Deatils <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3 id="student"></h3>

                      <p>Students</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-graduation-cap"></i>
                    </div>
                    <a href="#" class="small-box-footer">More Deatils <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row --> ' ;   
        }
       ?>

      <!-- Main row -->

      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Today Events</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="eventcalender">

            </div>
          </div>
          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Extra Sheets Uploaded</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <div id="latest_extra_sheet_table"></div>

                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="#" onclick="sheet();" class="uppercase">View All Sheets</a>
            </div>
            <!-- /.box-footer -->
          </div>   
          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>
              <h3 class="box-title">Calendar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
          </div>
          <!-- /.box -->           
                
        
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable" >
          <!-- USERS LIST -->
          <div class="box box-danger" style="min-height: 730px;">
            <div class="box-header with-border">
              <h3 class="box-title">Online Users</h3>
            </div>
            <!-- /.box-header -->
             <div id="allusers_table">
             
            </div>

            <!-- /.box-body -->
          </div>          


     

        </section>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript">
    $( document ).ready(function() {$(".se-pre-con").fadeOut("slow");});  
      // refresh page
      setInterval("auto_refresh_msg();",60000);
      function auto_refresh_msg()
      {
          update_last_activity();   
          load_latest_extra_sheet();
          // load all users
          onlineusers();          

      }     
    // function autoload to load home page
    update_last_activity();
    loading_deatils();
    onlineusers();    

    // load agenda details
    agendatoday();
    function loading_deatils() {
        $.ajax({
          type:'ajax',
          url:'<?php echo base_url() ?>Administrator/get_total_rows',
          async:false,
          dataType:'json',
          success:function(response){
            // load count of administrators , teachers and studends
            $('#admin').html(response.total_admin_rows);
            $('#student').html(response.total_student_rows);
            $('#teachers').html(response.total_teachers_rows);
            $('#parents').html(response.total_parents_rows);

          }
        });
    }


    function load_latest_extra_sheet()
    {
      $.ajax({
        url:'<?php echo base_url() ?>Sheet/pagination_load_latest_extra_sheet/1',
        method:'get',
        dataType:'json',
        success:function(data){
          $('#latest_extra_sheet_table').html(data.latest_extra_sheet_table);
        }
      }); 
    }

    function agendatoday()
    {
        $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url() ?>Agenda/loadevents',
            async:false,
            dataType:'json',
            success:function(response){
            $('#eventcalender').html(response.page);
            load_agenda_data2(1);
            // go to top page
            }
        });
    }
    function load_agenda_data2(page) {
        $.ajax({
            url:'<?php echo base_url() ?>Agenda/pagination_todayevents/' + page,
            method:'get',
            dataType:'json',
            success:function(data){
                $('#agendaview_table').html(data.agendaview_table);
                $('#agendaview_pagination_link').html(data.agendaview_pagination_link);
            }
        });
    }

    function load_last_messages(page) {
        $.ajax({
            url:'<?php echo base_url() ?>Administrator/pagination_last_messages/' + page,
            method:'get',
            dataType:'json',
            success:function(data){
                $('#last_messages').html(data.last_messages);
            }
        });
    }    
    
    function onlineusers()
    {
        $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url() ?>Login/loadusers',
            async:false,
            dataType:'json',
            success:function(response){
            // $('#loadallusers').html(response.page);
            load_users(1);
            // go to top page
            }
        });
    }
    function load_users() {
        $.ajax({
            url:'<?php echo base_url() ?>Login/pagination_allusers/1',
            method:'get',
            dataType:'json',
            success:function(data){
                $('#allusers_table').html(data.allusers_table);
            }
        });
    }    
    // update last activity
    function update_last_activity()
    {
        $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url() ?>Login/updatelastactivity',
            async:false,
            dataType:'json',
            success:function(data){
                if (data.success == true)
                {
                   
                }
            
            }
        });
    }   
    // refresh page
    setInterval("auto_refresh_onlineusers();",60000);
    function auto_refresh_onlineusers(){
        update_last_activity();
        loading_deatils();
    }    
</script>
<script src="<?php echo base_url();?>public/dist/js/pages/dashboard.js"></script>
