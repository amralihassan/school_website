<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Student controller
*/
class Student extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Student_model','stu');
	}
	function index()
	{
		
		$data['pagetitle'] = 'Student | Dashboard';
		$data['page']=$this->load->view('dashboards/dashboard_student_view',NULL,TRUE);
		echo json_encode($data);
	}
	function changepassword()
	{
		//load page content
		$data['pagetitle'] = 'Change Password';
		$data['page'] = $this->load->view('student_pages/changepassword_view',NULL,TRUE);
		echo json_encode($data);		
	}
	function load_posts()
	{
		$data['pagetitle'] = 'MEIS | Posts';
		$data['page'] = $this->load->view('student/student_posts_view',NULL,TRUE);
		echo json_encode($data);		
	}
	function load_my_kids()
	{
		$data['pagetitle'] = 'My Kids';
		$data['page'] = $this->load->view('student_pages/my_kids',NULL,TRUE);
		echo json_encode($data);
	}
	function load_studentReport()
	{
		$data['pagetitle'] = 'Student Report';
		$data['page'] = $this->load->view('student_pages/studentReport_view',NULL,TRUE);
		echo json_encode($data);
	}
	// load student information
	function load_student_information()
	{
		$data['pagetitle'] = 'User Profile';
		$data['page'] = $this->load->view('student_pages/student_information',NULL,TRUE);
		echo json_encode($data);		
	}
	function updatepassword()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("password", "New Password", 'required');
		$this->form_validation->set_rules("passwordc", "Confirm Password", 'required|matches[password]');

		if ($this->form_validation->run() == true) 
		{
			$id = $_SESSION['stuID'];
			$result = $this->stu->updatepassword($id);
			$data['success'] = false;
			if ($result) {
				$data['success'] = true;
			}
			echo json_encode($data);			
		}
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);			
		}	
	}
	function loadstudent()
	{
		$data['pagetitle'] = 'Students';
		$data['page']=$this->load->view('student_pages/student_view',NULL,TRUE);
		echo json_encode($data);
	}
	function load_update_page()
	{
		$data['pagetitle'] = 'Update User';
		$data['page']=$this->load->view('student_pages/update_student_information_view',NULL,TRUE);
		echo json_encode($data);			
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
    function retrive_all_student()
    {
        $users = $this->stu->retrive_all_student();
        $output = "";
        $n=1;
		$output .='';        
        if (count($users)>0) // fill select box
        {
            foreach ($users as $row) {
			$login_level_update ='';
			if ( 'Super Administrator' == $_SESSION['loginlevel']) 
			{
				$login_level_update ='update_student';
			}
			elseif ('Administrator' == $_SESSION['loginlevel']) 
			{
				$login_level_update ='deny';
			}
			else 
			{
				$login_level_update ='deny';
			}	            	
				$output .='
					<tr>
                        <td>'.$n.'</td>  
						<td>'.$row->studentID.'</td>
						<td>'.$row->englishName.'</td>
						<td>'.$row->divisionName.'</td>
						<td>'.$row->fatherMobile.'</td>
						<td>'.$row->motherMobile.'</td>
						<td><a href="#" class="fa fa-lock btn btn-info btn-xs" onclick="changestudentpassword('.$row->stuID.')"></a></td>
						<td><a href="#" class="fa fa-edit btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->stuID.')"></a></td>
					</tr>
					';  
                    $n++;              
            };            
        }
        echo json_encode($output);
    }	
    function retrive_all_student_data()
    {
        $stuInfo = $this->stu->retrive_all_student_data();
        $output = "";     
        if (count($stuInfo)>0) // fill select box
        {
            foreach ($stuInfo as $row) {            	
				$output .='
					<table class="table table-hover table-bordered" style="width: 75%;">
					  <thead>
					    <tr><th class="col-md-3">Arabic Student Name</th><td>'.$row->arabicName.'</td></tr>	
					      <tr><th class="col-md-3">English Student Name</th><td>'.$row->englishName.'</td></tr>
					      <tr><th class="col-md-3">Student Number</th><td>'.$row->studentID.'</td></tr>
					      <tr><th class="col-md-3">Nationality</th><td>'.$row->Nationality.'</td></tr>
					      <tr><th class="col-md-3">Division</th><td>'.$row->divisionName.'</td></tr>
					      <tr><th class="col-md-3">Grade</th><td>'.$row->gradeName.'</td></tr>
					      <tr><th class="col-md-3">Class</th><td>'.$row->roomName.'</td></tr>
					      <tr><th class="col-md-3">Student ID</th><td>'.$row->studentIDcard.'</td></tr>
					      <tr><th class="col-md-3">Student Status</th><td>'.$row->student_status.'</td></tr>
					      <tr><th class="col-md-3">Second Language</th><td>'.$row->secondLanguage.'</td></tr>
					      <tr><th class="col-md-3">Start School Date</th><td>'.$row->start_school.'</td></tr>
					      <tr><th class="col-md-3">Mother Name</th><td>'.$row->motherName.'</td></tr>
					      <tr><th class="col-md-3">Father ID</th><td>'.$row->englishName.'</td></tr>
					      <tr><th class="col-md-3">Fatehr Job</th><td>'.$row->fatherJob.'</td></tr>
					      <tr><th class="col-md-3">Father Mobile</th><td>'.$row->fatherMobile.'</td></tr>
					      <tr><th class="col-md-3">Mother Mobile</th><td>'.$row->motherMobile.'</td></tr>
					  </thead>
					</table>
					';  
            };            
        }
        echo json_encode($output);    	
    }
    function get_student_reprot()
    {
    	if ($_GET['stuID'])
    	{
    		$stuID = filter_var($this->input->get('stuID'),FILTER_SANITIZE_NUMBER_INT);
    		$this->load->model('Absence_model','att');
			// student start school date
			$student_days_school = $this->att->get_school_days($stuID);
			// count absence for student
	        $student_days_absence = $this->att->get_count_absence($stuID);
	        $tot_att = $student_days_school - $student_days_absence;
	        if ($tot_att == $student_days_school)
	        {
	        	// color full days 
	        	$color = '#0b6c24;';
	        }
	        else
	        {
	        	$color = '#c51212;';
	        }
			// attendance days
			$attendance_days = '<span style="color:'.$color.'">'.$tot_att.'</span>';	        

	    	$output ='
			<table class="table table-responsive table-bordered" style="width:50%;">
			  <thead>
			    <tr><th class="col-md-5">Class</th><td>Grade 1</td></tr>
			    <tr><th class="col-md-5"><a href="#" onclick="show_absence('.$stuID.');">Attendance</a></th><td>'.$attendance_days .' / '.$student_days_school.'</td></tr>
			    <tr><th class="col-md-5">Education Average Level</th><td>undefined</td></tr>
			    <tr><th class="col-md-5">Behaviour</th><td>undefined</td></tr>
			    <tr><th class="col-md-5">Talent</th><td>undefined</td></tr>
			  </thead>
			</table>
	    	';

	    	
    	}
    	else
    	{
	    	$output ='
			<table class="table table-responsive table-bordered" style="width:50%;">
			  <thead>
			    <tr><th class="col-md-5">Student Name</th><td></td></tr>
			    <tr><th class="col-md-5">Class</th><td></td></tr>
			    <tr><th class="col-md-5">Attendance</th><td></td></tr>
			    <tr><th class="col-md-5">Education Average Level</th><td></td></tr>
			    <tr><th class="col-md-5">Behaviour</th><td></td></tr>
			    <tr><th class="col-md-5">Talent</th><td></td></tr>
			  </thead>
			</table>
	    	';
    	}
    	echo json_encode($output);
    }
    function retrive_kids()
    {
    	$users = $this->stu->retrive_kids();
        $output = "";
     
        if (count($users)>0) // fill select box
        {
            foreach ($users as $row) {
            	
				$output .='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr><th class="col-md-3">Arabic Student Name</th><td>'.$row->arabicName.'</td></tr>
						<tr><th class="col-md-3">English Student Name</th><td>'.$row->englishName.'</td></tr>
						<tr><th class="col-md-3">Student Number</th><td>'.$row->studentID.'</td></tr>
						<tr><th class="col-md-3">Nationality</th><td>'.$row->Nationality.'</td></tr>
						<tr><th class="col-md-3">Division</th><td>'.$row->divisionName.'</td></tr>
						<tr><th class="col-md-3">Grade</th><td>'.$row->gradeName.'</td></tr>
						<tr><th class="col-md-3">Class</th><td>'.$row->roomName.'</td></tr>
						<tr><th class="col-md-3">Student ID</th><td>'.$row->studentIDcard.'</td></tr>
						<tr><th class="col-md-3">Student Status</th><td>'.$row->student_status.'</td></tr>
						<tr><th class="col-md-3">Start School Date</th><td>'.$row->start_school.'</td></tr>
						<tr><th class="col-md-3">Second Language</th><td>'.$row->secondLanguage.'</td></tr>
						<tr><th class="col-md-3">Mother Name</th><td>'.$row->motherName.'</td></tr>
						<tr><th class="col-md-3">Father ID</th><td>'.$row->fatherIDcard.'</td></tr>
						<tr><th class="col-md-3">Fatehr Job</th><td>'.$row->fatherJob.'</td></tr>
						<tr><th class="col-md-3">Father Mobile</th><td>'.$row->fatherMobile.'</td></tr>
						<tr><th class="col-md-3">Mother Mobile</th><td>'.$row->motherMobile.'</td></tr>
					</thead>
				</table>
					';            
            };            
        }
        echo json_encode($output);
    }	
	function pagination_search_by_room()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->stu->count_all_search_by_room();
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
			'student_pagination_link' => $this->pagination->create_links(),
			'student_query_table'	  => $this->stu->fetch_details_search_by_room($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function addstudent()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("arabicName_add", "Arabic Student Name", 'required');
		$this->form_validation->set_rules("englishName_add", "English Student Name", 'required');
		$this->form_validation->set_rules("studentID_add", "Student Number", 'required');
		$this->form_validation->set_rules("Nationality_add", "Nationality", 'required');
		$this->form_validation->set_rules("divisionID_add", "Division", 'required');
		$this->form_validation->set_rules("gradeID_add", "Grade", 'required');
		$this->form_validation->set_rules("roomID_add", "Class", 'required');
		$this->form_validation->set_rules("studentIDcard_add", "Student ID", 'required');
		$this->form_validation->set_rules("fatherIDcard_add", "Father ID", 'required');
		$this->form_validation->set_rules("fatherJob_add", "Fatehr Job", 'required');
		$this->form_validation->set_rules("motherName_add", "Mother Name", 'required');
		$this->form_validation->set_rules("status_add", "Status", 'required');
		$this->form_validation->set_rules("username_add", "Username", 'required');
		$this->form_validation->set_rules("password_add", "Password", 'required');
		$this->form_validation->set_rules("passwordconfirm_add", "Confirm Password", 'required|matches[password_add]');
		$this->form_validation->set_rules("fatherMobile_add", "Father Mobile", 'required');
		$this->form_validation->set_rules("motherMobile_add", "Mother Mobile", 'required');
		$this->form_validation->set_rules("student_status_add", "Student Status", 'required');
		$this->form_validation->set_rules("secondLanguage_add", "Current Password", 'required');

		if ($this->form_validation->run() == true)
		{
			$result = $this->stu->addstudent();
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
	function retrivedivision()
	{
		$this->load->model('Division_model');
		$divisions = $this->Division_model->retriveDivisions();
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
	function retrive_student_for_parent() // get all student related to parent
	{
		$this->load->model('Student_model');
		$students = $this->Student_model->retrive_student_for_parent();
		if (count($students)>0) {
			$pro_select_box = "";
			$pro_select_box .= '<option value="">-- Select --</option>' ;
			foreach ($students as $student) {
				$pro_select_box .= '<option value="'. $student->studentID .'">'.$student->englishName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}	
	
	function retrive_student_and_class() // get all student related to parent
	{
		$this->load->model('Student_model');
		$students = $this->Student_model->retrive_student_for_parent();
		if (count($students)>0) {
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Student</option>' ;
			foreach ($students as $student) {
				$pro_select_box .= '<option value="'. $student->stuID .'">'.$student->englishName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}	
	function retrive_student_by_class() // get all student related to parent
	{
		$this->load->model('Student_model');
		$students = $this->Student_model->retrive_student_for_parent();
		if (count($students)>0) {
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Student</option>' ;
			foreach ($students as $student) {
				$pro_select_box .= '<option value="'. $student->roomID .'">'.$student->englishName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}				
	function retrivedivisionByid()
	{
		if ($_GET['divi']) 
		{
			$id = filter_var($this->input->get('divi'),FILTER_SANITIZE_NUMBER_INT);
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
	function retrivegradeByid()
	{
		if ($_GET['gra'])
		{
			$id = filter_var($this->input->get('gra'),FILTER_SANITIZE_NUMBER_INT);
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
	function retriveroomByid()
	{
		if ($_GET['rom'])
		{
			$id = filter_var($this->input->get('rom'),FILTER_SANITIZE_NUMBER_INT);
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
	}
	function get_room() // method that will fill select box
	{
		if (isset($_POST['gradeID_add']) && isset($_POST['divisionID_add']))
		{
			$gradeID = filter_var($this->input->post('gradeID_add'),FILTER_SANITIZE_NUMBER_INT);// parameter
			$divisionID = filter_var($this->input->post('divisionID_add'),FILTER_SANITIZE_NUMBER_INT);

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
	function get_room_for_updating() // method that will fill select box
	{
		if (isset($_POST['gradeID_update']) && isset($_POST['divisionID_update']))
		{
			$gradeID = $this->input->post('gradeID_update');// parameter
			$divisionID = $this->input->post('divisionID_update');
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
	function retrive_student() // get all student related to room
	{
		if (isset($_POST['room_id']))
		{
			$room_id = $this->input->post('room_id');
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
	}	
	function Delete_more_one()
	{
		if (isset($_POST['stuID']))
		{
			foreach ($_POST['stuID'] as $stuID) {
				$result = $this->stu->deletestudent_more_one($stuID);
			}
			$msg['success']=false;
			if ($result) {
				$msg['success']=true;
			}
			echo json_encode($msg);	
		}
	}
	function updatestudentpassword()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("password", "New password", 'required');
		$this->form_validation->set_rules("passconfc", "Confirm Password", 'required');
		$this->form_validation->set_rules("passconfc", "Confirm Password", 'required|matches[password]');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->stu->updatestudentpassword();
			$data['success'] = false;
			if ($result) {
				$data['success'] = true;
			}
			echo json_encode($data);
		}
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);
		}
	}
	function getdatabyid()
	{
		$result = $this->stu->getdatabyid();
		echo json_encode($result);
	}
	function updatestudent()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("arabicName_update", "Arabic Student Name", 'required');
		$this->form_validation->set_rules("englishName_update", "English Student Name", 'required');
		$this->form_validation->set_rules("studentID_update", "Student Number", 'required');
		$this->form_validation->set_rules("Nationality_update", "Nationality", 'required');
		$this->form_validation->set_rules("divisionID_update", "Division", 'required');
		$this->form_validation->set_rules("gradeID_update", "Grade", 'required');
		$this->form_validation->set_rules("roomID_update", "Class", 'required');
		$this->form_validation->set_rules("studentIDcard_update", "Student ID", 'required');
		$this->form_validation->set_rules("fatherIDcard_update", "Father ID", 'required');
		$this->form_validation->set_rules("fatherJob_update", "Fatehr Job", 'required');
		$this->form_validation->set_rules("motherName_update", "Mother Name", 'required');
		$this->form_validation->set_rules("status_update", "Status", 'required');
		$this->form_validation->set_rules("username_update", "Username", 'required');
		$this->form_validation->set_rules("fatherMobile_update", "Father Mobile", 'required');
		$this->form_validation->set_rules("motherMobile_update", "Mother Mobile", 'required');
		$this->form_validation->set_rules("student_status_update", "Student Status", 'required');
		$this->form_validation->set_rules("secondLanguage_update", "Second Language", 'required');

		if ($this->form_validation->run() == true)
		{
			$result = $this->stu->updatestudent();
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