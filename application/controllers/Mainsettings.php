<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Main settings controller
*/
class Mainsettings extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Mainsettings_model','set');		
	}
	function display_main_settings()
	{
		$data['pagetitle'] = 'Main Settings';
		$data['page']=$this->load->view('general_pages/mainsettings_view',NULL,TRUE);
		echo json_encode($data);
	}
	function pagination()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->set->count_all();
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
			'settings_pagination_link' => $this->pagination->create_links(),
			'settings_table'	  => $this->set->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function updateSettings()
	{
		$result = $this->set->updateSettings();
		$msg['success'] = false;
		if ($result) {
			$msg['success']= true;
		}
		echo json_encode($msg);		
	}

}
 ?>