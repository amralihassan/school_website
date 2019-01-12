<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Holidays
 */
class Holidays extends CI_controller
{
	
	function __construct()
	{
		Parent :: __construct();
		$this->load->model('Holidays_model','hol');
	}
	function load_holidays()
	{
		$data['pagetitle'] = 'Holidays';
		$data['page']=$this->load->view('general_pages/holidays_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function pagination()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = 15;
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
			'Holidays_table'	  => $this->hol->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function delete_holiday()
	{
		$result = $this->hol->delete_holiday();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);		
	}
	function addHolidays()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("date_holiday", "Holidays", 'required');
		$this->form_validation->set_rules("title", "Title", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->hol->addHolidays();
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
	function update_holiday()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("date_holiday_update", "Holidays", 'required');
		$this->form_validation->set_rules("title_update", "Title", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->hol->update_holiday();
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
		$result = $this->hol->getdatabyid();
		echo json_encode($result);
	}	
}

 ?>