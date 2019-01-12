<?php 
/**
 * Job controller
 */
class Job extends CI_controller
{
	
	function __construct()
	{
		Parent :: __construct();
		$this->load->model('Job_model','job');
	}
	function addEmployee()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("full_name", "Full Name", 'required');
		$this->form_validation->set_rules("mobile", "Mobile", 'required');
		$this->form_validation->set_rules("id_card", "ID Card", 'required');		
		$this->form_validation->set_rules("email", "Email", 'required');		
		$this->form_validation->set_rules("job_title", "Job Title", 'required');		

		if ($this->form_validation->run() == true)
		{		
			//upload configuration
			$config = array(
				'upload_path' => 'public/upload/job/',
				'allowed_types' => 'pdf',
				'max_siza' => 0,
				'max_filename' => 0,
				'detect_mime' => true,
				'encrypt_name' => false
				);
			$this->load->library('upload',$config);

			if ($this->upload->do_upload('file_name'))
			{
				$result = $this->job->addEmployee();
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
	function loadjob()
	{
		$data['pagetitle'] = 'Job Applications';
		$data['page']=$this->load->view('website/applications_view',NULL,TRUE);
		echo json_encode($data);		
	}
	function loadjob_vacancy()
	{
		$data['pagetitle'] = 'Job Vacancies';
		$data['page']=$this->load->view('website/job_vacancy_view',NULL,TRUE);
		echo json_encode($data);		
	}	
	function pagination()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->job->count_all();
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
			'job_pagination_link' => $this->pagination->create_links(),
			'job_table'	  => $this->job->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->job->count_all_search();
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
			'job_pagination_link' => $this->pagination->create_links(),
			'job_table'	  => $this->job->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_search_vacancy()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->job->count_all_search_vacancy();
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
			'vacancy_pagination_link' => $this->pagination->create_links(),
			'vacancy_table'	  => $this->job->fetch_details_search_vacancy($config['per_page'],$start)
		);
		echo json_encode($output);
	}		
	function pagination_vacancy()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->job->count_all_vacancy();
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
			'vacancy_pagination_link' => $this->pagination->create_links(),
			'vacancy_table'	  => $this->job->fetch_details_vacancy($config['per_page'],$start)
		);
		echo json_encode($output);
	}			
	function Delete_more_one()
	{
		foreach ($_POST['id'] as $id) {
			//remove file from folder
			$get_file_name = $this->job->getFilenameById($id);
			@unlink('public/upload/job/'.$get_file_name->file_name);			
			$result = $this->job->delete_more_one($id);
		}
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function Delete_more_one_vacancy()
	{
		foreach ($_POST['id'] as $id) {
			$result = $this->job->delete_more_one_vacancy($id);
		}
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}	
	function addVacabcy()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("job_title_add", "Job Title", 'required');	
		$this->form_validation->set_rules("Vacancies_add", "Vacancy", 'required');		
		$this->form_validation->set_rules("about_add", "About the job", 'required');		

		if ($this->form_validation->run() == true)
		{		

			$result = $this->job->addVacabcy();
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
		$result = $this->job->getdatabyid();
		echo json_encode($result);		
	}
	function updatevacancy()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("job_title_update", "Job Title", 'required');
		$this->form_validation->set_rules("Vacancies_update", "Vacancy", 'required');		
		$this->form_validation->set_rules("about_update", "About the job", 'required');

		if ($this->form_validation->run() == true) 
		{
			$result = $this->job->updatevacancy();
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