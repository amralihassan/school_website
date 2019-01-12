<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Contact controller
*/
class Contact extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Contact_model','con');
	}
	function delete_more_one_contact()
	{
		foreach ($_POST['id'] as $id) {
			$result = $this->con->delete_more_one_contact($id);
		}
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}	
	function load_message()
	{
		if ($_GET['id'])
		{
			$data['id'] = $_GET['id'];
			$data['pagetitle'] = 'Website Messages';
			$data['page']=$this->load->view('web_structure/read_message_view',NULL,TRUE);
			echo json_encode($data);
		}
	}	
	function pagination()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->con->count_all();
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
			'contacts_pagination_link' => $this->pagination->create_links(),
			'contacts_table'	  => $this->con->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->con->count_all_search();
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
			'contacts_pagination_link' => $this->pagination->create_links(),
			'contacts_table'	  => $this->con->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_read_message()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = 1;
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
			'xxx' => $this->pagination->create_links(),
			'read_website_message_table'	  => $this->con->fetch_details_message($config['per_page'],$start)
		);
		echo json_encode($output);		
	}		
	function deletemessage()
	{
		$result = $this->con->deletemessage();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function addnew()
	{
		// form validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules("email", "", 'required');
		$this->form_validation->set_rules("subject", "", 'required');
		$this->form_validation->set_rules("message", "", 'required');				
		$this->form_validation->set_rules("name", "", 'required');	

		if ($this->form_validation->run() == true)
		{
			$result = $this->con->addnew();

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
}
 ?>