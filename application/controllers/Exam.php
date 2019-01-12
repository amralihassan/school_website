<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Exam controller
*/
class Exam extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Exam_model','ex');
	}
	function loadexams()
	{
		$data['pagetitle'] = 'Exam';
		$data['page']=$this->load->view('exam/exam_view',NULL,TRUE);
		echo json_encode($data);
	}
	function loadexams_parent()
	{
		$data['pagetitle'] = 'Exam Table';
		$data['page'] = $this->load->view('exam/exam_parent_view',NULL,TRUE);
		echo json_encode($data);
	}
	function loadexams_teacher()
	{
		$data['pagetitle'] = 'Exam';
		$data['page']=$this->load->view('exam/exam_teacher_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function loadexams_student()
	{
		$data['pagetitle'] = 'Exam';
		$data['page']=$this->load->view('exam/exam_student_view',NULL,TRUE);
		echo json_encode($data);
	}	

	function pagination_search()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->ex->count_all_search();
		$config['per_page'] = 10;
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
			'exam_pagination_link' => $this->pagination->create_links(),
			'exam_table'	  => $this->ex->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_search_teacher()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->ex->count_all_search();
		$config['per_page'] = 10;
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
			'exam_pagination_link' => $this->pagination->create_links(),
			'exam_table'	  => $this->ex->fetch_details_search_teacher($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_search_parent()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = 10;
		$config['per_page'] = 10;
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
			'exam_pagination_link' => $this->pagination->create_links(),
			'exam_table'	  => $this->ex->fetch_details_search_parent($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function retrive_all_student_exam()
	{
        $exam = $this->ex->retrive_all_student_exam();

		$output ='';        
        if (count($exam)>0) // fill select box
        {
            foreach ($exam as $row) {
				$var = $row->dateExam;
				$date = date("d-m-Y", strtotime($var) );

				$timestamp = strtotime($row->dateExam);
				$day = date('l', $timestamp);
				$mon = date('M', $timestamp);
				$dd = date('l', $timestamp);

				$output .='
					<tr>
						<td>'.$day.'</td>
						<td>'.$date.'</td>
						<td>'.$row->subjectName.'</td>
						<td>'.$row->from_hour.':'.$row->from_minute.' '.$row->day_status1.'</td>
						<td>'.$row->to_hour.':'.$row->to_minute.' '.$row->day_status2.'</td>
						<td>'.$row->examName.'</td>					
					</tr>
				';	        
            };            
        }
        echo json_encode($output);			
	}
	function addexam()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("dateExam", "Date", 'required');
		$this->form_validation->set_rules("division_ID", "Division", 'required');
		$this->form_validation->set_rules("gradeID", "Grade", 'required');
		$this->form_validation->set_rules("subjectID", "Subject", 'required');
		$this->form_validation->set_rules("examName", "Exam Name", 'required');

		// go to admin model and execute the method and get result true or false
		if ($this->form_validation->run() == true)
		{
			$result = $this->ex->addexam();
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
		$result = $this->ex->getdatabyid();
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
	function retivesubjects()
	{
		$this->load->model('Subject_model');
		$subjects = $this->Subject_model->retivesubjects();
		// subjects
		if (count($subjects)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Subject</option>' ;
			foreach ($subjects as $subject) {
				$pro_select_box .= '<option value="'. $subject->subjectID .'">'.$subject->subjectName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function deleteexam()
	{
		$result = $this->ex->deleteexam();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function updateexam()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("dateExam1", "Date", 'required');
		$this->form_validation->set_rules("division_ID2", "Division", 'required');
		$this->form_validation->set_rules("gradeID2", "Grade", 'required');
		$this->form_validation->set_rules("subjectID2", "Subject", 'required');
		$this->form_validation->set_rules("examName1", "Exam Name", 'required');

		// go to admin model and execute the method and get result true or false
		if ($this->form_validation->run() == true)
		{
			$result = $this->ex->updateexam();
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
	
}
 ?>