<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Exam_model
*/
class Exam_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function count_all_search()
	{
		// get number of rows
		$query = $this->db->get('exam_full_data');
		return $query->num_rows();
	}
	function fetch_details_search($limit,$start)
	{
		if ($_GET['divi'] && $_GET['gra'])
		{
			$divi = filter_var($this->input->get('divi'),FILTER_SANITIZE_NUMBER_INT);
			$gra = filter_var($this->input->get('gra'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->order_by('dateExam');
			$this->db->where(array('divisionID'=>$divi,'gradeID'=>$gra));
			$this->db->limit($limit,$start);
			$query = $this->db->get('exam_full_data');

			$output ='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr>
							<th class="col-md-1">Day</th>
							<th class="col-md-2">Date</th>
							<th class="col-md-2">Subject</th>
							<th class="col-md-2">From</th>
							<th class="col-md-1">To</th>
							<th class="col-md-3">Notes</th>
							<th class="col-md-1">Edit</th>
							<th class="col-md-1">Delete</th>
						</tr>
					</thead>				
			';

			foreach ($query->result() as $row) 
			{
				$login_level_update ='';
				$login_level_delete ='';
				if ( 'Super Administrator' == $_SESSION['loginlevel']) 
				{
					$login_level_update ='update_exam';
					$login_level_delete ='delete_exam';
				}
				elseif ( 'Administrator' == $_SESSION['loginlevel']) 
				{
					$login_level_update ='deny';
					$login_level_delete ='deny';
				}
				else 
				{
					$login_level_update ='deny';
					$login_level_delete ='deny';
				}
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
						<td><a href="#" onclick="'. $login_level_update .'('.$row->id.')"><i class="fa fa-edit btn btn-warning btn-xs"></i></a></td>
						<td><a href="#" onclick="'. $login_level_delete .'('.$row->id.')"><i class="fa fa-trash btn btn-danger btn-xs"></i></a></td>					
					</tr>
				';		
			}			
			return $output;
		}
	}
	function fetch_details_search_parent($limit,$start)
	{
		if ($_GET['studentID'])
		{
			$studentID = filter_var($this->input->get('studentID'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->order_by('dateExam');
			$this->db->where(array('studentID'=>$studentID));
			$this->db->limit($limit,$start);
			$query = $this->db->get('exam_full_data_student');

			$output ='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr>
							<th class="col-md-1">Day</th>
							<th class="col-md-1">Date</th>
							<th class="col-md-2">Subject</th>
							<th class="col-md-2">From</th>
							<th class="col-md-1">To</th>
							<th class="col-md-5">Notes</th>
						</tr>
					</thead>				
			';
			if ($query ->num_rows()>0)
			{
				foreach ($query->result() as $row) 
				{

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
				}	
			}
			else
			{
				$output = '<div class="alert alert-danger">No results found.</div>';
			}
		
			return $output;
		}		
	}	
	function fetch_details_search_teacher($limit,$start)
	{
		if ($_GET['divi'] && $_GET['gra'])
		{
			$divi = filter_var($this->input->get('divi'),FILTER_SANITIZE_NUMBER_INT);
			$gra = filter_var($this->input->get('gra'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->order_by('dateExam');
			$this->db->where(array('divisionID'=>$divi,'gradeID'=>$gra));
			$this->db->limit($limit,$start);
			$query = $this->db->get('exam_full_data');

			$output ='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr>
							<th>Day</th>
							<th>Date</th>
							<th>Subject</th>
							<th>From</th>
							<th>To</th>
							<th>Notes</th>
						</tr>
					</thead>				
			';

			foreach ($query->result() as $row) 
			{

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
			}			
			return $output;
		}
	}	
	function retrive_all_student_exam()
	{
		$todayDate = date('Y.m.d'); // today date
		$this->db->order_by('dateExam');
		$this->db->where('divisionID',$_SESSION['divisionID']);
		$this->db->where('gradeID',$_SESSION['gradeID']);
				
		// $this->db->where('dateExam >=',$todayDate);
		$query = $this->db->get('exam_full_data');
		return $query->result();		
	}
	function fetch_details_search_student($limit,$start)
	{
		$output = '';
		$this->db->order_by('dateExam');
		$this->db->where(array('divisionID'=>$_SESSION['divisionID'],'gradeID'=>$_SESSION['gradeID']));
		$this->db->limit($limit,$start);
		$query = $this->db->get('exam_full_data');
		$output .='
			<table class="table table-responsive table-hover">
				<thead>
					<tr class="bgTable">
						<th class="col-lg-1">Day</th>
						<th class="col-lg-2">Date</th>
						<th colspan="1" class="col-lg-2">From</th>
						<th colspan="1" class="col-lg-2">To</th>
						<th class="col-lg-5">Exam Name</th>
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='
					<tr>
						<td>'.$row->day.'</td>
						<td>'.$row->dateExam.'</td>
						<td>'.$row->from_hour.' : '.$row->from_minute.' '.$row->day_status1.'</td>
						<td>'.$row->to_hour.' : '.$row->to_minute.' '.$row->day_status2.'</td>
						<td><span style="color:firebrick;">'.$row->subjectName.' </span>'.$row->examName.'</td>
					</tr>
				';
			}
			$output .='</table>';		
		}
		else
		{
			$output = '<div class="alert alert-danger">No results found.</div>';
		}		

		return $output;
	}	
	function addexam()
	{
		if (isset($_POST['division_ID']) && isset($_POST['gradeID']) && isset($_POST['subjectID']) && isset($_POST['dateExam']) && isset($_POST['from_hour']) && isset($_POST['from_minute']) && isset($_POST['to_hour']) && isset($_POST['to_minute']) && isset($_POST['day_status1']) && isset($_POST['day_status2'])) {
				$data = array(
			 		'divisionID'=>filter_var($this->input->post('division_ID'),FILTER_SANITIZE_NUMBER_INT),
			 		'gradeID'=>filter_var($this->input->post('gradeID'),FILTER_SANITIZE_NUMBER_INT),
			 		'subjectID'=>filter_var($this->input->post('subjectID'),FILTER_SANITIZE_NUMBER_INT),
			 		'dateExam'=>$this->input->post('dateExam'),
			 		'examName'=>$this->input->post('examName'),
			 		'from_hour'=>$this->input->post('from_hour'),
			 		'from_minute'=>$this->input->post('from_minute'),
			 		'to_hour'=>$this->input->post('to_hour'),
			 		'to_minute'=>$this->input->post('to_minute'),
			 		'day_status1'=>$this->input->post('day_status1'),
			 		'day_status2'=>$this->input->post('day_status2')
			 	);
			 	$this->db->insert('exam',$data);
			 	if ($this->db->affected_rows() > 0) {
			 		return true;
			 	}else
			 	{
			 		return false;
			 	}			
			 }
	}
	function getdatabyid()
	{
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$query = $this->db->get('exam_full_data');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}
	function deleteexam()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$this->db->delete('exam');
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}
		}
	}
	function updateexam()
	{
		if (isset($_POST['id']) && isset($_POST['division_ID2']) && isset($_POST['gradeID2']) && isset($_POST['subjectID2']) && isset($_POST['dateExam1']) && isset($_POST['from_hour1']) && isset($_POST['from_minute1']) && isset($_POST['to_hour1']) && isset($_POST['to_minute1']) && isset($_POST['day_status11']) && isset($_POST['day_status21']))
		{
			$id=filter_var($this->input->post('id'),FILTER_SANITIZE_NUMBER_INT);
			$data = array(
		 		'divisionID'=>filter_var($this->input->post('division_ID2'),FILTER_SANITIZE_NUMBER_INT),
		 		'gradeID'=>filter_var($this->input->post('gradeID2'),FILTER_SANITIZE_NUMBER_INT),
		 		'subjectID'=>filter_var($this->input->post('subjectID2'),FILTER_SANITIZE_NUMBER_INT),
		 		'dateExam'=>$this->input->post('dateExam1'),
		 		'examName'=>$this->input->post('examName1'),
		 		'from_hour'=>$this->input->post('from_hour1'),
		 		'from_minute'=>$this->input->post('from_minute1'),
		 		'to_hour'=>$this->input->post('to_hour1'),
		 		'to_minute'=>$this->input->post('to_minute1'),
		 		'day_status1'=>$this->input->post('day_status11'),
		 		'day_status2'=>$this->input->post('day_status21')
		 	);
			$this->db->where('id', $id);
			$this->db->update('exam',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}
}
 ?>