<?php 
/**
 * Student_info controller
 */
class Student_info extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Student_info_model','stuInfo');
	}
	function pagination_search_by_room()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->stuInfo->count_all_search_by_room();
		$config['per_page'] = 40;
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
			'student_information_pagination_link' => $this->pagination->create_links(),
			'student_information_table'	  => $this->stuInfo->fetch_details_search_by_room($config['per_page'],$start)
		);
		echo json_encode($output);
	}		
	function add_student_information()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("student_english_name", "اسم الطالب باللغة اﻻنجليزية", 'required');
		$this->form_validation->set_rules("student_name", "اسم الطالب", 'required');
		$this->form_validation->set_rules("father_name", "اسم الوالد", 'required');
		$this->form_validation->set_rules("grand_name", "اسم الجد", 'required');
		$this->form_validation->set_rules("last_name", "اللقب", 'required');
		$this->form_validation->set_rules("gender", "النوع", 'required');
		$this->form_validation->set_rules("religion", "الديانة", 'required');
		$this->form_validation->set_rules("date_birth", "تاريخ الميلاد", 'required');
		$this->form_validation->set_rules("nationality", "الجنسية", 'required');
		$this->form_validation->set_rules("student_idcard", "الرقم القومي للطالب", 'required');
		$this->form_validation->set_rules("division", "القسم", 'required');
		$this->form_validation->set_rules("grade", "المرحلة", 'required');
		$this->form_validation->set_rules("second_language", "اللغة الثانية", 'required');
		$this->form_validation->set_rules("father_idcard", "الرقم القومي للوالد", 'required');
		$this->form_validation->set_rules("father_job", "وظيفة الوالد", 'required');
		$this->form_validation->set_rules("home_no", "رقم العقار", 'required');
		$this->form_validation->set_rules("streat_name", "اسم الشارع", 'required');
		$this->form_validation->set_rules("area", "الحي / المنطقة", 'required');
		$this->form_validation->set_rules("government", "المحافظة", 'required');
		$this->form_validation->set_rules("mother_name", "اسم اﻻم ثلاثي", 'required');
		$this->form_validation->set_rules("home_phone", "اسم الطالب", 'required');
		$this->form_validation->set_rules("father_mobile", "رقم موبايل الوالد", 'required');
		$this->form_validation->set_rules("mother_mobile", "رقم موبايل الوالدة", 'required');
		
		if ($this->form_validation->run() == true)
		{
			//upload configuration
			$config = array(
				'upload_path' => 'public/upload/student_photo/',
				'allowed_types' => 'jpeg|jpg|png',
				'max_siza' => 0,
				'max_filename' => 0,
				'detect_mime' => true,
				'encrypt_name' => false
				);
			$this->load->library('upload',$config);

			if ($this->upload->do_upload('file_name'))
			{
				$result = $this->stuInfo->add_student_information();
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
	function add_new_registration()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("father_idcard_registrtion", "الرقم القومي للوالد", 'required');
		$this->form_validation->set_rules("email", "البريد اﻻلكتروني", 'required');
		$this->form_validation->set_rules("password", "كلمة المرور", 'required');
		
		
		if ($this->form_validation->run() == true)
		{
			$result = $this->stuInfo->add_new_registration();
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
		$result = $this->stuInfo->getdatabyid();
		echo json_encode($result);
	}	

	function getdatabyid_registration()
	{
		$result = $this->stuInfo->getdatabyid_registration();
		echo json_encode($result);
	}
	function getdatabyid_student()
	{
		$result = $this->stuInfo->getdatabyid_student();
		echo json_encode($result);
	}	
	function find_stundent_info()
	{
		$data['pagetitle'] = 'Student Information';
		$data['page'] = $this->load->view('find_student_info_view',NULL,TRUE);
		echo json_encode($data);
	}
	function pagination()
	{
		// load student model
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->stuInfo->count_all();
		$config['per_page'] = 30;
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
			'student_information_pagination_link' => $this->pagination->create_links(),
			'student_information_table'	  => $this->stuInfo->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->stuInfo->count_all_search();
		$config['per_page'] = 30;
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
			'student_information_pagination_link' => $this->pagination->create_links(),
			'student_information_table'	  => $this->stuInfo->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}		
}
 ?>