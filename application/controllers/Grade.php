<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Grade controller
*/
class Grade extends CI_controller
{
	function index()
	{
		$id = $this->uri->segment(1);
		if ($id== "Grade") {
			redirect('Logout');
		}
	}
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Grade_model','gra');
	}
	function loadgrade()
	{
		$data['pagetitle'] = 'Grades';
		$data['page']=$this->load->view('general_pages/grade_view',NULL,TRUE);
		echo json_encode($data);
	}
	function pagination()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->gra->count_all();
		$config['per_page'] = 20;
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
			'grade_pagination_link' => $this->pagination->create_links(),
			'grade_table'	  => $this->gra->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function deletegrade()
	{
		$result = $this->gra->deletegrade();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function addgrade()
	{
		
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("gradeName", "Grade", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->gra->addgrade();
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
	function updategrade()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("gradeName_update", "Grade", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->gra->updategrade();
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
		$result = $this->gra->getdatabyid();
		echo json_encode($result);
	}
}
 ?>