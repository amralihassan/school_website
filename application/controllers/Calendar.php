<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Calendar controller
 */
class Calendar extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Calendar_model','cal');
	}
	function load_calendar()
	{
		$data['pagetitle'] = 'Calendar';
		$data['page']=$this->load->view('website/calendar_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function load_calendar_parent()
	{
		$data['pagetitle'] = 'Calendar';
		$data['page']=$this->load->view('parents_pages/parent_calendar_view',NULL,TRUE);
		echo json_encode($data);
	}
	// retrive calendar
	function retrive_title_calendar()
	{
		$titles = $this->cal->retrive_title_calendar();
		// titles
		if (count($titles)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Calendar</option>' ;
			foreach ($titles as $row) {
				$pro_select_box .= '<option value="'. $row->id .'">'.$row->title.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}			
	}
	function pagination_search_parent()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->cal->count_all_search();
		$config['per_page'] = 25;
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
			'calendar_pagination_link' => $this->pagination->create_links(),
			'calendar_table'	  => $this->cal->fetch_details_search_parent($config['per_page'],$start)
		);
		echo json_encode($output);		
	}
	function addCalendar()
	{
		//upload configuration
		$config = array(
			'upload_path' => 'public/upload/cal/',
			'allowed_types' => 'jpg|jpeg',
			'max_siza' => 0,
			'max_filename' => 0,
			'detect_mime' => true,
			'encrypt_name' => false
			);
		$this->load->library('upload',$config);

		if ($this->upload->do_upload('file_name'))
		{
			$result = $this->cal->addCalendar();
			$msg['success'] = false;
			if ($result) {
				$msg['success']= true;
			}
			echo json_encode($msg);
		}
		else{
			$msg['error'] = $this->upload->display_errors();
			echo json_encode($msg);
		}		
	}
	function deleteCalendar()
	{
		//remove file from folder
		$get_file_name = $this->cal->getFilenameById();
		@unlink('public/upload/cal/'.$get_file_name->file_name);
		$result = $this->cal->deleteCalendar();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);		
	}
}
 ?>