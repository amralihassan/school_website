<div class="animated fadeIn">
	<!-- to display message -->
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-success w3-panel w3-green" style="display: none;"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Uniform Prices List
		            <div  style="float: right;">
						<a onclick="autoload();" href="#" style="color: white;" href="#"><i style=" color: white;" class="fa fa-times"> </i> </a>
					</div>					
				</div>
				<div class="panel-body">
		        	<div class="row">
		        		<div class="col-lg-12">
	       					<div id="uniform_table">
	       						
	       					</div>
		        		</div>
		        	</div>					
				</div>
			</div>
		</div>
	</div>	


</div>
<script type="text/javascript">
	function load_uniform_prise(page) 
	{
		// get word search

		$.ajax({
			url:'<?php echo base_url() ?>Uniform/pagination_search_parent/' + page,
			method:'get',
			// data:{id:id.val()},
			dataType:'json',
			success:function(data){
				$('#uniform_table').html(data.uniform_table);
				
			}
		});
	}
</script>