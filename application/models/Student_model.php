<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Student_model
*/
class Student_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function updatepassword($id)
	{
		if (isset($_POST['password']))
		{
			$encrypt = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$filed=array('password'=>$encrypt);
			$this->db->where('stuID', filter_var($id,FILTER_SANITIZE_NUMBER_INT));
			$this->db->update('student',$filed);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}
	function retrive_all_student()
	{
		$query = $this->db->get('student_parent');
		return $query->result();
	}
	function retrive_all_student_data()
	{
		$this->db->where('stuID',$_SESSION['stuID']);
		$query = $this->db->get('student_parent');
		return $query->result();		
	}	
	function retrive_kids()
	{
		if ($_GET['studentID']) 
		{
			$studentID= $this->input->get('studentID');
			$this->db->where('studentID',$studentID);
			$query = $this->db->get('student_parent');
			return $query->result();
		}
	}		
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('student');
		return $query->num_rows();
	}
	function count_all_search_by_room()
	{
		// get number of rows
		$division = $this->input->get('divi');
		$grade = $this->input->get('gra');
		$room = $this->input->get('room');
		$this->db->where(array('divisionID'=>$division,'gradeID'=>$grade,'roomID'=>$room));
		$query = $this->db->get('student_parent');
		return $query->num_rows();
	}	
	function fetch_details_search_by_room($limit,$start)
	{
		if ($_GET['divi'] && $_GET['gra'] && $_GET['rom'])
		{
			$division = $this->input->get('divi');
			$grade = $this->input->get('gra');
			$room = $this->input->get('rom');
			$output = '';
			$this->db->order_by('englishName');
			// where
			if ($grade == "" and $room == "")
			{
				$this->db->where(array('divisionID'=>$division));
			}
			elseif ($grade != "" and $room == "")
			{
				$this->db->where(array('divisionID'=>$division,'gradeID'=>$grade));
			}
			else
			{
				$this->db->where(array('divisionID'=>$division,'gradeID'=>$grade,'roomID'=>$room));
			}
			
			$this->db->limit($limit,$start);
			$query = $this->db->get('student_parent');
			$output .='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr class="bgTable">
							<th><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>
							<th>#</th>						
							<th>Stu. No.</th>						
							<th>Student Name</th>
							<th>Division</th>
				     	    <th>Grade</th>
				     	    <th>Father Mobile</th>
				     	    <th>Mother Mobile</th>
						</tr>
					</thead>
			';
			$n = 1;
			foreach ($query->result() as $row) 
			{
				
				$output .='
					<tr>
						<td><input type="checkbox" class="chkCheckBoxId" value="'.$row->stuID.'" name="stuID[]"></td>
						<td>'.$n.'</td>
						<td>'.$row->studentID.'</td>
						<td>'.$row->englishName.'</td>
						<td>'.$row->divisionName.'</td>
						<td>'.$row->gradeName.'</td>
						<td>'.$row->fatherMobile.'</td>
						<td>'.$row->motherMobile.'</td>
					</tr>
				';
				$n++;
			}
			$output .='</table>';
			return $output;
		}
	}	
	function addstudent()
	{
		if (isset($_POST['arabicName_add']) && isset($_POST['englishName_add']) && isset($_POST['studentID_add']) && isset($_POST['Nationality_add']) && isset($_POST['divisionID_add']) && isset($_POST['gradeID_add']) && isset($_POST['roomID_add']) && isset($_POST['studentIDcard_add']) && isset($_POST['fatherIDcard_add']) && isset($_POST['fatherJob_add']) && isset($_POST['motherName_add']) && isset($_POST['status_add']) && isset($_POST['stage_add']) && isset($_POST['username_add']) && isset($_POST['password_add']) && isset($_POST['fatherMobile_add']) && isset($_POST['motherMobile_add']) && isset($_POST['student_status_add']) && isset($_POST['start_school_add']) && isset($_POST['secondLanguage_add'])) 
		{
			$encrypt = password_hash($this->input->post('password_add'), PASSWORD_DEFAULT);
			$data = array(
				'arabicName'=>$this->input->post('arabicName_add'),
				'englishName'=>$this->input->post('englishName_add'),
				'studentID'=>$this->input->post('studentID_add'),
				'Nationality'=>$this->input->post('Nationality_add'),
				'divisionID'=>$this->input->post('divisionID_add'),
				'gradeID'=>$this->input->post('gradeID_add'),
				'roomID'=>$this->input->post('roomID_add'),
				'studentIDcard'=>$this->input->post('studentIDcard_add'),
				'fatherIDcard'=>$this->input->post('fatherIDcard_add'),
				'fatherJob'=>$this->input->post('fatherJob_add'),
				'motherName'=>$this->input->post('motherName_add'),
				'status'=>$this->input->post('status_add'),
				'stage'=>$this->input->post('stage_add'),
				'username'=>$this->input->post('username_add'),
				'password'=>$encrypt,
				'fatherMobile'=>$this->input->post('fatherMobile_add'),
				'motherMobile'=>$this->input->post('motherMobile_add'),
				'student_status'=>$this->input->post('student_status_add'),
				'start_school'=>$this->input->post('start_school_add'),
				'secondLanguage'=>$this->input->post('secondLanguage_add')
			);
			
			$this->db->insert('student',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}
		}
	}
	function updatestudent()
	{
		if (isset($_POST['arabicName_update']) && isset($_POST['englishName_update']) && isset($_POST['studentID_update']) && isset($_POST['Nationality_update']) && isset($_POST['divisionID_update']) && isset($_POST['gradeID_update']) && isset($_POST['roomID_update']) && isset($_POST['studentIDcard_update']) && isset($_POST['fatherIDcard_update']) && isset($_POST['fatherJob_update']) && isset($_POST['motherName_update']) && isset($_POST['status_update']) && isset($_POST['stage_update']) && isset($_POST['username_update']) && isset($_POST['fatherMobile_update']) && isset($_POST['motherMobile_update']) && isset($_POST['start_school_update']) && isset($_POST['student_status_update']) && isset($_POST['secondLanguage_update']))
		{
			$id = $this->input->post('stuID');
				$data = array(
				'arabicName'=>$this->input->post('arabicName_update'),
				'englishName'=>$this->input->post('englishName_update'),
				'studentID'=>$this->input->post('studentID_update'),
				'Nationality'=>$this->input->post('Nationality_update'),
				'divisionID'=>$this->input->post('divisionID_update'),
				'gradeID'=>$this->input->post('gradeID_update'),
				'roomID'=>$this->input->post('roomID_update'),
				'studentIDcard'=>$this->input->post('studentIDcard_update'),
				'fatherIDcard'=>$this->input->post('fatherIDcard_update'),
				'fatherJob'=>$this->input->post('fatherJob_update'),
				'motherName'=>$this->input->post('motherName_update'),
				'status'=>$this->input->post('status_update'),
				'stage'=>$this->input->post('stage_update'),
				'username'=>$this->input->post('username_update'),
				'fatherMobile'=>$this->input->post('fatherMobile_update'),
				'motherMobile'=>$this->input->post('motherMobile_update'),
				'student_status'=>$this->input->post('student_status_update'),
				'start_school'=>$this->input->post('start_school_update'),
				'secondLanguage'=>$this->input->post('secondLanguage_update')
			);
			$this->db->where('stuID',$id);
			$this->db->update('student',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}	
	function deletestudent_more_one($stuid)
	{
		$this->db->where('stuID',$stuid);
		$this->db->delete('student');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}
	}
	function getdatabyid()
	{
		if ($_GET['id'])
		{
			$id= filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('stuID',$id);
			$query = $this->db->get('student_parent');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}
	function get_students_query($roomID)
		{
		$this->db->order_by('englishName','ASC');
		$this->db->where('roomID',$roomID);
		$query = $this->db->get('student_parent');
		return $query->result();
	}
	function retrive_student_for_parent()
	{
		$this->db->where('fatherIDcard',$_SESSION['idCard']);
		$query = $this->db->get('student');
		return $query->result();	
	}
	
	function updatestudentpassword()
	{
		if (isset($_POST['stuID']) && isset($_POST['password'])) 
		{
			$id= filter_var($this->input->post('stuID'),FILTER_SANITIZE_NUMBER_INT);
			$filed=array('password'=>md5($this->input->post('password')));
			$this->db->where('stuID', $id);
			$this->db->update('student',$filed);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}
	// Inset excel data
	function insertExceldata($data)
	{
		$this->db->insert_batch('student',$data);
	}

}
 ?>