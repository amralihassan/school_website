<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Lectuer controller
 */
class Lecture extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Lecture_model','lec');
	}
	// load page
	function loadstudentLecture()
	{
		$data['pagetitle'] = 'Lecture Schedule';
		$data['page']=$this->load->view('student_pages/student_lecture_view',NULL,TRUE);
		echo json_encode($data);
	}
	function loadlecture()
	{
		$data['pagetitle'] = 'Lecture Schedule';
		$data['page']=$this->load->view('website/lectureschedule_view',NULL,TRUE);
		echo json_encode($data);
	}
	function pagination()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->lec->count_all();
		$config['per_page'] = 9;
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
			'lecture_pagination_link' => $this->pagination->create_links(),
			'lecture_table'	  => $this->lec->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->lec->count_all_search();
		$config['per_page'] = 6;
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
			'lecture_pagination_link' => $this->pagination->create_links(),
			'lecture_table'	  => $this->lec->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}	

	function addlectureschedule()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("roomID_add", "Class", 'required');		
		
		//upload configuration
		$config = array(
			'upload_path' => 'public/upload/lecture/',
			'allowed_types' => 'jpg|png|jpeg',
			'max_siza' => 0,
			'max_filename' => 0,
			'detect_mime' => true,
			'encrypt_name' => false
			);
		$this->load->library('upload',$config);

		if ($this->form_validation->run() == true) 
		{
			if ($this->upload->do_upload('file_name'))
			{
				$result = $this->lec->addlectureschedule();
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
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);			
		}

	}	
	function deletelecture_schedule()
	{
		$result = $this->lec->deletelecture_schedule();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);		
	}
	function getdatabyid()
	{
		$result = $this->lec->getdatabyid();
		echo json_encode($result);		
	}
}
 ?>