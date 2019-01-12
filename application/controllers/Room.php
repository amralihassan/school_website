<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Division controller
*/
class Room extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Room_model','rom');
	}
	function loadroom()
	{
		$data['pagetitle'] = 'Classroom';
		$data['page']=$this->load->view('general_pages/room_view',NULL,TRUE);
		echo json_encode($data);
	}
	function pagination()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->rom->count_all();
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
			'room_pagination_link' => $this->pagination->create_links(),
			'room_table'	  => $this->rom->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->rom->count_all_search();
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
			'room_pagination_link' => $this->pagination->create_links(),
			'room_table'	  => $this->rom->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function deleteroom()
	{
		$result = $this->rom->deleteroom();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function addroom()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("divisionID_add", "Division", 'required');
		$this->form_validation->set_rules("gradeID_add", "Grade", 'required');
		$this->form_validation->set_rules("roomName", "Classroom", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->rom->addroom();
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
	function updateroom()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("divisionID_edit", "Division", 'required');
		$this->form_validation->set_rules("gradeID_edit", "Grade", 'required');
		$this->form_validation->set_rules("roomName_update", "Classroom", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->rom->updateroom();
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
		$result = $this->rom->getdatabyid();
		echo json_encode($result);
	}
	function retrivedivision()
	{
		$this->load->model('Division_model');
		$divisions = $this->Division_model->retriveDivisions();
		// divisions
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
	function retrive_teacher_room()
	{
		$this->load->model('Room_model');
		$rooms = $this->Room_model->retriveroom_private();
		// divisions
		if (count($rooms)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Class</option>' ;
			foreach ($rooms as $room) {
				$pro_select_box .= '<option value="'. $room->roomID .'">'.$room->roomName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}		
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