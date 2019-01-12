<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Absence controller
*/
class Absence extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Absence_model','abs');
	}
	function load_attendance()
	{
		$data['pagetitle'] = 'Attendance';
		$data['page']=$this->load->view('attendance/attendance_view',NULL,TRUE);
		echo json_encode($data);		
	}
	function load_show_dates_page()
	{
		$data['pagetitle'] = 'Attendance';
		$data['page']=$this->load->view('attendance/show_dates_view',NULL,TRUE);
		echo json_encode($data);			
	}
	function pagination_student_attendance_class_report()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = 40;
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
			'xxx' => $this->pagination->create_links(),
			'attendance_table'	  => $this->abs->fetch_details_student_attendance_class_report($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_load_dates()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = 40;
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
			'xxx' => $this->pagination->create_links(),
			'absence_table'	  => $this->abs->fetch_details_student_absence($config['per_page'],$start)
		);
		echo json_encode($output);		
	}
	function addAbsence()
	{
		$result = $this->abs->addAbsence();
		$msg['success'] = false;
		if ($result) {
			$msg['success']= true;
		}
		echo json_encode($msg);
	}
	function deleteabsence()
	{
		$result = $this->abs->deleteabsence();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
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
				$pro_select_box .= '<option value="'. $student->stuID .'">'.$student->englishName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}	
	}	
}
 ?>