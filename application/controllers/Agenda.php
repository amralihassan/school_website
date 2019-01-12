<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Agenda controller
*/
class Agenda extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Agenda_model','age');
	}
	function loadagendadetails()
	{
		$data['pagetitle'] = 'Agenda';
		$data['page']=$this->load->view('agenda/agenda_view',NULL,TRUE);
		echo json_encode($data);
	}
	function loadagendadetails_student()
	{
		$data['pagetitle'] = 'Agenda';
		$data['page']=$this->load->view('student_pages/student_agenda_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function loadagendadetails_parent()
	{
		$data['pagetitle'] = 'Agenda';
		$data['page']=$this->load->view('parents_pages/parent_agenda_view',NULL,TRUE);
		echo json_encode($data);
	}	

	function loadevents()
	{
		$data['page']=$this->load->view('general_pages/agenda_events_view',NULL,TRUE);
		echo json_encode($data);
	}
	function pagination()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->age->count_all();
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
			'agenda_pagination_link' => $this->pagination->create_links(),
			'agenda_table'	  => $this->age->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_student()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->age->count_all();
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
			'agenda_pagination_link' => $this->pagination->create_links(),
			'agenda_table'	  => $this->age->fetch_details_student($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_parent()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->age->count_all();
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
			'agenda_pagination_link' => $this->pagination->create_links(),
			'agenda_table'	  => $this->age->fetch_details_parent($config['per_page'],$start)
		);
		echo json_encode($output);
	}		
	function pagination_todayevents()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->age->count_all_today_events();
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
			'agendaview_pagination_link' => $this->pagination->create_links(),
			'agendaview_table'	  => $this->age->fetch_details_today($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_todayevents_forGrade()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->age->count_all_today_events_forGrade();
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
			'agendaview_pagination_link' => $this->pagination->create_links(),
			'agendaview_table'	  => $this->age->fetch_details_today_forGrade($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->age->count_all_search();
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
			'agenda_pagination_link' => $this->pagination->create_links(),
			'agenda_table'	  => $this->age->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function retrivedivision()
	{
		$this->load->model('Division_model');
		$divisions = $this->Division_model->retriveDivisions();
		// grades
		if (count($divisions)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Division</option>' ;
			foreach ($divisions as $division) {
				$pro_select_box .= '<option value="'. $division->divisionID .'">'.$division->divisionName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function retrivegrade()
	{
		$this->load->model('Grade_model');
		$grades = $this->Grade_model->retrivegrades();
		// grades
		if (count($grades)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Grade</option>' ;
			foreach ($grades as $grade) {
				$pro_select_box .= '<option value="'. $grade->gradeID .'">'.$grade->gradeName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function addevent()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("date_add", "Date", 'required');
		$this->form_validation->set_rules("title_add", "Title", 'required');
		$this->form_validation->set_rules("details_add", "Deatils", 'required');
		$this->form_validation->set_rules("share_add", "Share", 'required');
		// go to admin model and execute the method and get result true or false
		if ($this->form_validation->run() == true)
		{
			$result = $this->age->addevent();
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
	function deleteagenda()
	{
		$result = $this->age->deleteagenda();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function updateagenda()
	{
		$this->load->library('form_validation');
		// form validation

		$this->form_validation->set_rules("date", "Date", 'required');
		$this->form_validation->set_rules("title", "Title", 'required');
		$this->form_validation->set_rules("details", "Deatils", 'required');

		// go to admin model and execute the method and get result true or false
		if ($this->form_validation->run() == true)
		{
			$result = $this->age->updateagenda();
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
		$result = $this->age->getdatabyid();
		echo json_encode($result);
	}
	function retrivedivisionByid()
	{
		$id = $this->input->get('divi');
		$this->load->model('Division_model');
		$divisions = $this->Division_model->retriveDivisions();
		// grades
		if (count($divisions)>0) // fill select box
		{
			$checked = "";
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Division</option>' ;
			foreach ($divisions as $division) {
				if($division->divisionID == $id){$checked ="selected";}else{$checked="";}
				$pro_select_box .= '<option '. $checked .' value ="'. $division->divisionID .'">'.$division->divisionName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function retrivegradeByid()
	{
		$id = $this->input->get('gra');
		$this->load->model('Grade_model');
		$grades = $this->Grade_model->retrivegrades();
		// grades
		if (count($grades)>0) // fill select box
		{
			$checked = "";
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Grade</option>' ;
			foreach ($grades as $grade) {
				if($grade->gradeID == $id){$checked ="selected";}else{$checked="";}
				$pro_select_box .= '<option '. $checked .' value="'. $grade->gradeID .'">'.$grade->gradeName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
}
 ?>