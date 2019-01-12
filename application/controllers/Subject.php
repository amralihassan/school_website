<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Subject controller
*/
class Subject extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Subject_model','sub');
	}
	function loadsubject()
	{
		$data['pagetitle'] = 'Subjects';
		$data['page']=$this->load->view('general_pages/subject_view',NULL,TRUE);
		echo json_encode($data);
	}
	function pagination()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->sub->count_all();
		$config['per_page'] = 10;
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
			'subject_pagination_link' => $this->pagination->create_links(),
			'subject_table'	  => $this->sub->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->sub->count_all_search();
		$config['per_page'] = 10;
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
			'subject_pagination_link' => $this->pagination->create_links(),
			'subject_table'	  => $this->sub->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function deletesubject()
	{
		$result = $this->sub->deletesubject();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function addsubject()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("subjectName", "Subject", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->sub->addsubject();
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
	function updatesubject()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("subjectName_update", "Subject", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->sub->updatesubject();
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
		$result = $this->sub->getdatabyid();
		echo json_encode($result);
	}
	function retivesubjects()
	{
		$subjects = $this->sub->retivesubjects();
		// subjects
		if (count($subjects)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Subject</option>' ;
			foreach ($subjects as $subject) {
				$pro_select_box .= '<option value="'. $subject->subjectID .'">'.$subject->subjectName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}		
	}



}
 ?>