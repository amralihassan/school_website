<div class="animated fadeIn">
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
		            Today Date : <?php echo date('D   .d.M.Y'); ?>
		            <div  style="float: right;">
						<a onclick="autoload();" href="#" style="color: white;" href="#"><i style=" color: white;" class="fa fa-times"> </i> </a>
					</div>
		        </div>

		        <div class="panel-body">
		        	<div class="row">
		        		<div class="col-lg-12">
							<div class="table table-responsive" id="agenda_table"></div>
							<div align="center" id="agenda_pagination_link"></div>		       	
		        		</div>
		        	</div>
		        </div>
			</div>
		</div>
	</div>		
</div>


<script type="text/javascript">

	// load Agenda details
  	function Agenda()
  	{
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Agenda/loadagendadetails',
  			async:false,
  			dataType:'json',
  			success:function(response){
			$('#page').html(response.page);
		    // $('#mydatatable').html(html);
		    load_agenda_data(1);
		    // go to top page
        	$('html, body').animate({ scrollTop: 0 }, 0);
  			},
  			error:function(){
  			}
  		});
  	}
  	function load_agenda_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Agenda/pagination_parent/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#agenda_table').html(data.agenda_table);
				$('#agenda_pagination_link').html(data.agenda_pagination_link);
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_agenda_data(page);
	});

</script>
