<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Mainsettings_model
*/
class Mainsettings_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function retriveAllsettings()
	{
		$q = $this->db->get('generalsetting');
	    return $q->result();
		if ($q->num_rows > 0) {
			return $q->result();
		}
		else
		{
			return false;
		}		
	}
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('generalsetting');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('generalsetting');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='';
		foreach ($query->result() as $row) 
		{
			$output .='
						<form id="form_settings" method="POST" action="">
							<div class="row">
								<div class="col-lg-3">
									<label>Site Name</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="sitename" class="form-control" value="'.$row->sitename.'">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Site Name (Shorutcut)</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="sitename_shortcut" class="form-control" value="'.$row->sitename_shortcut.'">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Site Name (Contacts)</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="sitename_contacts" class="form-control" value="'.$row->sitename_contacts.'">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Address</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="address" class="form-control" value="'.$row->address.'">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Phone</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="phone" class="form-control" value="'.$row->phone.'">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Mobile1</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="mob1" class="form-control" value="'.$row->mob1.'">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Mobile2</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="mob2" class="form-control" value="'.$row->mob2.'">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Email</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="email" class="form-control" value="'.$row->email.'">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Facebook</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="fb" class="form-control" value="'.$row->fb.'">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Youtube</label>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Link 1</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="link1" class="form-control" value="'.$row->link1.'">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Link 2</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="link2" class="form-control" value="'.$row->link2.'">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<label>Link 3</label>
								</div>
								<div class="col-lg-6">
									<input type="text" name="link3" class="form-control" value="'.$row->link3.'">
								</div>
							</div>
							<br>
	
						</form>				
			';
		}
		$output .='';
		return $output;
	}	
	function updateSettings()
	{
		if (isset($_POST['sitename']) && isset($_POST['sitename_contacts']) && isset($_POST['sitename_shortcut']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['mob1']) && isset($_POST['mob2']) && isset($_POST['fb']) && isset($_POST['link1']) && isset($_POST['link2']) && isset($_POST['link3']))
		{
			$data = array(
				'sitename'=>filter_var($this->input->post('sitename'),FILTER_SANITIZE_STRING),
				'sitename_contacts'=>filter_var($this->input->post('sitename_contacts'),FILTER_SANITIZE_STRING),
				'sitename_shortcut'=>filter_var($this->input->post('sitename_shortcut'),FILTER_SANITIZE_STRING),
				'address'=>filter_var($this->input->post('address'),FILTER_SANITIZE_STRING),
				'email'=>filter_var($this->input->post('email'),FILTER_SANITIZE_EMAIL),
				'phone'=>filter_var($this->input->post('phone'),FILTER_SANITIZE_STRING),
				'mob1'=>filter_var($this->input->post('mob1'),FILTER_SANITIZE_STRING),
				'mob2'=>filter_var($this->input->post('mob2'),FILTER_SANITIZE_STRING),
				'fb'=>filter_var($this->input->post('fb'),FILTER_SANITIZE_STRING),
				'link1'=>filter_var($this->input->post('link1'),FILTER_SANITIZE_STRING),
				'link2'=>filter_var($this->input->post('link2'),FILTER_SANITIZE_STRING),
				'link3'=>filter_var($this->input->post('link3'),FILTER_SANITIZE_STRING)
			);
			$this->db->update('generalsetting',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
		else
		{
			return false;
		}		
	}
}
 ?>