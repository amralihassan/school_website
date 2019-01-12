	<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Division controller
*/
class Division extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Division_model','divi');
	}
	function loaddivision()
	{
		$data['pagetitle'] = 'Divisions';
		$data['page']=$this->load->view('general_pages/division_view',NULL,TRUE);
		echo json_encode($data);
	}
	function pagination()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->divi->count_all();
		$config['per_page'] = 7;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['num_links'] = 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start =($page - 1) * $config['per_page'];
		$output = array(
			'division_pagination_link' => $this->pagination->create_links(),
			'division_table'	  => $this->divi->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function deletedivision()
	{
		$result = $this->divi->deletedivision();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function adddivision()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("divisionName", "Division", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->divi->addDivision();
			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);
		}
		
	}
	function updatedivision()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("divisionName_update", "Division", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->divi->updatedivision();
			$msg['success'] = false;
			if ($result) {
				$msg['success']= true;
			}
			echo json_encode($msg);		
		}
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);
		}
	
	}
	function getdatabyid()
	{
		$result = $this->divi->getdatabyid();
		echo json_encode($result);
	}
}
 ?>