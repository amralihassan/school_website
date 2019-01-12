<div class="se-pre-con"></div>
<section class="content-header">
  <h1>
    General Settings
  </h1>
  <ol class="breadcrumb">
    <li><a href="#" onclick="autoload();"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">General Settings</li>
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
	<!-- inputs -->
	<div class="box-body row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Website Main Settings
				</div>
				<div class="panel-body">
					<div id="settings_table"></div>	
					<button class="btn btn-success" type="submit" id="btn_savesettings">Save changes</button>				
				</div>
			</div>
		</div>	
	</div>	
</div>

<script type="text/javascript">

	// load data
	function load_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Mainsettings/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#settings_table').html(data.settings_table);
				$('#settings_pagination_link').html(data.settings_pagination_link);
				 $(".se-pre-con").fadeOut("slow");
			}
		});
	}
	// save changes
	$('#btn_savesettings').click(function(){
		var data = $('#form_settings').serialize();
		var url = '<?php echo base_url() ?>Mainsettings/updateSettings';
		// validation
		var sitename = $('input[name=sitename]');
		var sitename_contacts = $('input[name=sitename_contacts]');
		var sitename_shortcut = $('input[name=sitename_shortcut]');
		var fb = $('input[name=fb]');
		var email = $('input[name=email]');
		var phone = $('input[name=phone]');
		var mob1 = $('input[name=mob1]');
		var mob2 = $('input[name=mob2]');
		var address = $('input[name=address]');
		var link1 = $('input[name=link1]');
		var link2 = $('input[name=link2]');
		var link3 = $('input[name=link3]');
		result = '';

		// validation
		if (sitename.val() == '') {
			sitename.parent().parent().addClass('has-error');
			return;
		}else{
			sitename.parent().parent().removeClass('has-error');
			result +='1';
		}	
		
		if (sitename_contacts.val() == '') {
			sitename_contacts.parent().parent().addClass('has-error');
			return;
		}else{
			sitename_contacts.parent().parent().removeClass('has-error');
			result +='2';
		}

		if (sitename_shortcut.val() == '') {
			sitename_shortcut.parent().parent().addClass('has-error');
			return;
		}else{
			sitename_shortcut.parent().parent().removeClass('has-error');
			result +='3';
		}

		if (fb.val() == '') {
			fb.parent().parent().addClass('has-error');
			return;
		}else{
			fb.parent().parent().removeClass('has-error');
			result +='4';
		}

		if (email.val() == '') {
			email.parent().parent().addClass('has-error');
			return;
		}else{
			email.parent().parent().removeClass('has-error');
			result +='5';
		}

		if (phone.val() == '') {
			phone.parent().parent().addClass('has-error');
			return;
		}else{
			phone.parent().parent().removeClass('has-error');
			result +='6';
		}

		if (mob1.val() == '') {
			mob1.parent().parent().addClass('has-error');
			return;
		}else{
			mob1.parent().parent().removeClass('has-error');
			result +='7';
		}

		if (mob2.val() == '') {
			mob2.parent().parent().addClass('has-error');
			return;
		}else{
			mob2.parent().parent().removeClass('has-error');
			result +='8';
		}

		if (address.val() == '') {
			address.parent().parent().addClass('has-error');
			return;
		}else{
			address.parent().parent().removeClass('has-error');
			result +='9';
		}

		if (link1.val() == '') {
			link1.parent().parent().addClass('has-error');
			return;
		}else{
			link1.parent().parent().removeClass('has-error');
			result +='10';
		}

		if (link2.val() == '') {
			link2.parent().parent().addClass('has-error');
			return;
		}else{
			link2.parent().parent().removeClass('has-error');
			result +='11';
		}

		if (link3.val() == '') {
			link3.parent().parent().addClass('has-error');
			alert("sdsd");
			return;
		}else{
			link3.parent().parent().removeClass('has-error');
			result +='12';
		}	

		if (result == '123456789101112') {
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#form_settings')[0].reset();
						$('.alert-success').html('Saved chnages successfully.').fadeIn().delay(2000).fadeOut('slow');
						load_data(1);
						// go to top page
	                    $('html, body').animate({ scrollTop: 0 }, 0);
					}
					
				},
				error:function(){
					alert('Could not save in database.')
				}
			});			
		}
	});
	function do_save()
	{
		$("#btn_savesettings").click();
	}


</script>