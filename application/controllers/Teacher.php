<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Teacher Controller
*/
class Teacher extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Administrator_model','teacher');
	}
	function loadteachers()
	{
		$data['pagetitle'] = 'Teachers';
		$data['page']=$this->load->view('teacher_pages/teacher_view',NULL,TRUE);
		echo json_encode($data);
	}
	function load_classes()
	{
		$data['pagetitle'] = 'Teachers';
		$data['page']=$this->load->view('teacher_pages/teacher_class_view',NULL,TRUE);
		echo json_encode($data);		
	}	
	function load_join_teacher()
	{
		$data['pagetitle'] = 'Join Teacher';
		$data['page']=$this->load->view('teacher_pages/join_teacher_view',NULL,TRUE);
		echo json_encode($data);		
	}
	function joinclass()
	{
		$result = $this->teacher->joinclass();
		$msg['success'] = false;
		if ($result) {
			$msg['success']= true;
		}
		echo json_encode($msg);
	}
	function pagination_classes()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->teacher->count_all_classes();
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
			'pagination_link' => $this->pagination->create_links(),
			'Classes_teacher_table'	  => $this->teacher->fetch_details_classes($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_teacher_classes()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = 10;
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
			'pagination_link' => $this->pagination->create_links(),
			'classes_table'	  => $this->teacher->fetch_details_classes_teacher($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_joinclass_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = 15;
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
			'pagination_link' => $this->pagination->create_links(),
			'Classes_teacher_table'	  => $this->teacher->fetch_details_search_joinclass($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function retriveteacher()
	{
		$teachers = $this->teacher->retriveteacher();
		// teachers
		if (count($teachers)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Teacher</option>' ;
			foreach ($teachers as $teacher) {
				$pro_select_box .= '<option value="'. $teacher->id_admin .'">'.$teacher->fullName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function deletejoinclass()
	{
		$result = $this->teacher->deletejoinclass();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function getjoinclassbyid()
	{
		$result = $this->teacher->getjoinclassbyid();
		echo json_encode($result);
	}
	function Updatejoinclass()
	{
		$result = $this->teacher->Updatejoinclass();
		$msg['success'] = false;
		if ($result) {
			$msg['success']= true;
		}
		echo json_encode($msg);
	}
	function retriveteacherByid()
	{
		$id = $this->input->get('tech');
		$teachers = $this->teacher->retriveteacher();
		// grades
		if (count($teachers)>0) // fill select box
		{
			$checked = "";
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Division</option>' ;
			foreach ($teachers as $teacher) {
				if($teacher->teacherID == $id){$checked ="selected";}else{$checked="";}
				$pro_select_box .= '<option '. $checked .' value ="'. $teacher->teacherID .'">'.$teacher->teacherFullname.'</option>' ;
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
				$pro_select_box .= '<option disabled="" '. $checked .' value="'. $room->roomID .'">'.$room->roomName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}	
	}
	function retrivesubjectByid()
	{
		$id = $this->input->get('sub');
		$this->load->model('Subject_model');
		$subjects = $this->Subject_model->retivesubjects();
		// grades
		if (count($subjects)>0) // fill select box
		{
			$checked = "";
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Subject</option>' ;
			foreach ($subjects as $subject) {
				if($subject->subjectID == $id){$checked ="selected";}else{$checked="";}
				$pro_select_box .= '<option '. $checked .' value="'. $subject->subjectID .'">'.$subject->subjectName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}	
	}
	function get_room() // method that will fill select box
	{
		$gradeID = $this->input->post('gradeID');// parameter
		$divisionID = $this->input->post('divisionID');
		$this->load->model('Room_model');
		$rooms = $this->Room_model->get_rooms_query($divisionID, $gradeID); // using model will get countries
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
}
 ?>