<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Studentmarks controller
 */
class Studentmarks extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Studentmarks_model','mark');

	}

	function loadstudentmarks()
	{
		$data['pagetitle'] = 'Marks';
		$data['page']=$this->load->view('student_pages/student_mark_view',NULL,TRUE);
		echo json_encode($data);		
	}
	function load_marks_parent()
	{
		$data['pagetitle'] = 'Marks';
		$data['page']=$this->load->view('parents_pages/parent_marks_view',NULL,TRUE);
		echo json_encode($data);		
	}	

	function pagination_search()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->mark->count_all_search();
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
			'mark_pagination_link' => $this->pagination->create_links(),
			'mark_table'	  => $this->mark->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_search_student()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->mark->count_all_search();
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
			'mark_pagination_link' => $this->pagination->create_links(),
			'mark_table'	  => $this->mark->fetch_details_search_student($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_search_parent()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->mark->count_all_search();
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
			'mark_pagination_link' => $this->pagination->create_links(),
			'mark_table'	  => $this->mark->fetch_details_search_parent($config['per_page'],$start)
		);
		echo json_encode($output);
	}		
	function loadmarkspage()
	{
		$data['pagetitle'] = 'Students Marks';
		$data['page']=$this->load->view('website/mark_view',NULL,TRUE);
		echo json_encode($data);
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
	function retriveacadmicyear()
	{
		$this->load->model('Academicyear_model');
		$acad = $this->Academicyear_model->retriveacademicyear();
		// academic years
		if (count($acad)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Academic Year</option>' ;
			foreach ($acad as $academicyear) {
				$pro_select_box .= '<option value="'. $academicyear->yearID .'">'.$academicyear->acadYear.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function retriveroomByid()
	{
		$id = $this->input->get('rom');
		$this->load->model('Room_model');
		$rooms = $this->Room_model->retriveroom();
		// grades
		if (count($rooms)>0) // fill select box
		{
			$checked = "";
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Room</option>' ;
			foreach ($rooms as $room) {
				if($room->roomID == $id){$checked ="selected";}else{$checked="";}
				$pro_select_box .= '<option '. $checked .' value="'. $room->roomID .'">'.$room->roomName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}	
	}	
	function get_student() // get all student related to room
	{
		$room_id = $this->input->get('room_id');
		$this->load->model('Student_model');
		$students = $this->Student_model->get_students_query($room_id);
		if (count($students)>0) {
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Student</option>' ;
			foreach ($students as $student) {
				$pro_select_box .= '<option value="'. $student->studentID .'">'.$student->englishName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}	
	}
	// language education
	function addnewmark_lang()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("type_name_add_lang", "Exam Type", 'required');
		$this->form_validation->set_rules("academic_name_add_lang", "Academic Year", 'required');
		$this->form_validation->set_rules("student_name_add_lang", "Student Name", 'required');
		$this->form_validation->set_rules("fullmark_lang", "Full Mark", 'required');
		$this->form_validation->set_rules("eng_al_lang", "A Level", 'required');
		$this->form_validation->set_rules("arabic_lang", "Arabic", 'required');
		$this->form_validation->set_rules("math_lang", "Math.", 'required');
		$this->form_validation->set_rules("science_lang", "Science", 'required');
		$this->form_validation->set_rules("social_lang", "Social", 'required');
		$this->form_validation->set_rules("eng_ol_lang", "O Level", 'required');
		$this->form_validation->set_rules("f_g_lang", "F / G", 'required');
		$this->form_validation->set_rules("total_lang", "Total", 'required');
		$this->form_validation->set_rules("score_lang", "Score", 'required');
		$this->form_validation->set_rules("percentage_lang", "Percentage", 'required');
		$this->form_validation->set_rules("religion_lang", "Religion", 'required');
		$this->form_validation->set_rules("computer_lang", "Computer", 'required');
		$this->form_validation->set_rules("art_lang", "Art", 'required');
		$this->form_validation->set_rules("act1_lang", "Act.1", 'required');
		$this->form_validation->set_rules("act2_lang", "Act.2", 'required');
		$this->form_validation->set_rules("notes_lang", "", 'required');

		// go to admin model and execute the method and get result true or false
		if ($this->form_validation->run() == true)
		{
			$result = $this->mark->addnewmark_lang();
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
	// language education
	function addnewmark_int()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("type_name_add_int", "Exam Type", 'required');
		$this->form_validation->set_rules("academic_name_add_int", "Academic Year", 'required');
		$this->form_validation->set_rules("student_name_add_int", "Student Name", 'required');
		$this->form_validation->set_rules("fullmark_int", "Full Mark", 'required');
		$this->form_validation->set_rules("eng_al_int", "English", 'required');
		$this->form_validation->set_rules("arabic_int", "Arabic", 'required');
		$this->form_validation->set_rules("math_int", "Math.", 'required');
		$this->form_validation->set_rules("science_int", "Science", 'required');
		$this->form_validation->set_rules("social_int", "Social", 'required');
		$this->form_validation->set_rules("f_g_int", "F / G", 'required');
		$this->form_validation->set_rules("total_int", "Total", 'required');
		$this->form_validation->set_rules("score_int", "Score", 'required');
		$this->form_validation->set_rules("percentage_int", "Percentage", 'required');
		$this->form_validation->set_rules("religion_int", "Religion", 'required');
		$this->form_validation->set_rules("notes_int", "", 'required');

		// go to admin model and execute the method and get result true or false
		if ($this->form_validation->run() == true)
		{
			$result = $this->mark->addnewmark_int();
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

	function deletemark()
	{
		$result = $this->mark->deletemark();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);		
	}	

	function getdatabyid()
	{
		$result = $this->mark->getdatabyid();
		echo json_encode($result);
	}

	function updatemarks_lang()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("eng_al_lang_update", "A Level", 'required');
		$this->form_validation->set_rules("arabic_lang_update", "Arabic", 'required');
		$this->form_validation->set_rules("math_lang_update", "Math.", 'required');
		$this->form_validation->set_rules("science_lang_update", "Science", 'required');
		$this->form_validation->set_rules("social_lang_update", "Social", 'required');
		$this->form_validation->set_rules("eng_ol_lang_update", "O Level", 'required');
		$this->form_validation->set_rules("f_g_lang_update", "F / G", 'required');
		$this->form_validation->set_rules("total_lang_update", "Total", 'required');
		$this->form_validation->set_rules("score_lang_update", "Score", 'required');
		$this->form_validation->set_rules("percentage_lang_update", "Percentage", 'required');
		$this->form_validation->set_rules("religion_lang_update", "Religion", 'required');
		$this->form_validation->set_rules("computer_lang_update", "Computer", 'required');
		$this->form_validation->set_rules("art_lang_update", "Art", 'required');
		$this->form_validation->set_rules("act1_lang_update", "Act.1", 'required');
		$this->form_validation->set_rules("act2_lang_update", "Act.2", 'required');
		$this->form_validation->set_rules("notes_lang_update", "", 'required');				
		// go to admin model and execute the method and get result true or false
		if ($this->form_validation->run() == true)
		{
			$result = $this->mark->updatemarks_lang();
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
	function updatemarks_int()
	{

		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("eng_al_int_update", "English", 'required');
		$this->form_validation->set_rules("arabic_int_update", "Arabic", 'required');
		$this->form_validation->set_rules("math_int_update", "Math.", 'required');
		$this->form_validation->set_rules("science_int_update", "Science", 'required');
		$this->form_validation->set_rules("social_int_update", "Social", 'required');
		$this->form_validation->set_rules("f_g_int_update", "F / G", 'required');
		$this->form_validation->set_rules("total_int_update", "Total", 'required');
		$this->form_validation->set_rules("score_int_update", "Score", 'required');
		$this->form_validation->set_rules("percentage_int_update", "Percentage", 'required');
		$this->form_validation->set_rules("religion_int_update", "Religion", 'required');
		$this->form_validation->set_rules("notes_int_update", "", 'required');		
		// go to admin model and execute the method and get result true or false
		if ($this->form_validation->run() == true)
		{
			$result = $this->mark->updatemarks_int();
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