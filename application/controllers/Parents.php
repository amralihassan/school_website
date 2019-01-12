<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Parent controller
*/
class Parents extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Parent_model','par');
	}
	function retrive_parent_student()
	{
		$students = $this->par->retrive_students_parent();
		// students
		if (count($students)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Student</option>' ;
			foreach ($students as $stu) {
				$pro_select_box .= '<option value="'. $stu->studentID .'">'.$stu->englishName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}		
	}
	function changepassword()
	{
		//load page content
		$data['pagetitle'] = 'Change Password';
		$data['page'] = $this->load->view('parents_pages/changepassword_view',NULL,TRUE);
		echo json_encode($data);		
	}
	function load_parent_information()
	{
		$data['pagetitle'] = 'User Profile';
		$data['page'] = $this->load->view('parents_pages/parent_information_view',NULL,TRUE);
		echo json_encode($data);
	}		
	function updatepassword()
	{
		$result = $this->par->updatepassword();
		$data['page'] = $this->load->view('parents_pages/changepassword_view',NULL,TRUE);
		$data['success'] = false;
		if ($result) {
			$data['success'] = true;
		}
		echo json_encode($data);
	}	
	function index()
	{
		$data['pagetitle'] = 'Parents | Dashboard';
		$data['page']=$this->load->view('dashboards/dashboard_parent_view',NULL,TRUE);
		echo json_encode($data);
	}
	function pagination()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->par->count_all();
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
			'parent_pagination_link' => $this->pagination->create_links(),
			'parent_table'	  => $this->par->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->par->count_all_search();
		$config['per_page'] = 15;
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
			'parent_pagination_link' => $this->pagination->create_links(),
			'parent_table'	  => $this->par->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function addparent()
	{
		// go to admin model and execute the method and get result true or false
		$result = $this->par->addparent();
		$msg['success'] = false;
		if ($result) {
			$msg['success']= true;
		}
		echo json_encode($msg);
	}
	function deleteparent()
	{
		$result = $this->par->deleteparent();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
}
 ?>