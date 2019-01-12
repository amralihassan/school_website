<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Absence_model
*/
class Absence_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function retrive_holidays_dates()
	{
		$query = $this->db->get('holiday');
		return $query->result();
	}		
	function get_school_days($stuID)
	{

	    $holidays=$this->retrive_holidays_dates(); // get from database
	    // get start date for student
	    $startDate = $this->db->select('*')->from('student')->where(array('stuID' =>$stuID))->limit(1)->get()->row('start_school'); // get from database for each student
	    $endDate = date("Y-m-d"); 
	    // do strtotime calculations just once
	    $endDate = strtotime($endDate);
	    $startDate = strtotime($startDate);


	    //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
	    //We add one to inlude both dates in the interval.
	    $days = ($endDate - $startDate) / 86400 + 1;

	    $no_full_weeks = floor($days / 7);
	    $no_remaining_days = fmod($days, 7);

	    //It will return 1 if it's Monday,.. ,7 for Sunday
	    $the_first_day_of_week = date(7, mktime(0, 0, 0, date("m", $startDate) , date("d", $startDate)-date("d", $startDate)+1, date("Y", $startDate)));
	    $the_last_day_of_week = date("N", $endDate);

	    //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
	    //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
	    if ($the_first_day_of_week <= $the_last_day_of_week) {
	        if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
	        if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
	    }
	    else {
	        // (edit by Tokes to fix an edge case where the start day was a Sunday
	        // and the end day was NOT a Saturday)

	        // the day of the week for start is later than the day of the week for end
	        if ($the_first_day_of_week == 7) {
	            // if the start date is a Sunday, then we definitely subtract 1 day
	            $no_remaining_days--;

	            if ($the_last_day_of_week == 6) {
	                // if the end date is a Saturday, then we subtract another day
	                $no_remaining_days--;
	            }
	        }
	        else {
		            // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
		            // so we skip an entire weekend and subtract 2 days
		            $no_remaining_days -= 2;
		        }
		    }

		   $workingDays = $no_full_weeks * 5;
		    if ($no_remaining_days > 0 )
		    {
		      $workingDays += $no_remaining_days;
		    }

		    //We subtract the holidays
	    	foreach($holidays as $holiday){
	        $time_stamp=strtotime($holiday->date_holiday);
	        //If the holiday doesn't fall in weekend

	        if ($startDate <= $time_stamp && $time_stamp <= $endDate && date(7, mktime(0, 0, 0, date("m", $time_stamp) , date("d", $time_stamp)-date("d", $time_stamp)+1, date("Y", $time_stamp))) != 6 && date(7, mktime(0, 0, 0, date("m", $time_stamp) , date("d", $time_stamp)-date("d", $time_stamp)+1, date("Y", $time_stamp))) != 1)
	            $workingDays--;
	    }

	    return intval($workingDays);		
	}
	function get_count_absence($stuID)
	{
		// get number of rows
		$this->db->where('stuID',$stuID);
		$query = $this->db->get('absences');
		return $query->num_rows();
	}
	function fetch_details_student_attendance_class_report($limit,$start)
	{
		if ($_GET['divi'] && $_GET['gra'] && $_GET['rom'])
		{
			$division = filter_var($this->input->get('divi'),FILTER_SANITIZE_NUMBER_INT);
			$grade = filter_var($this->input->get('gra'),FILTER_SANITIZE_NUMBER_INT);
			$room = filter_var($this->input->get('rom'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->order_by('englishName');
			$this->db->where(array('divisionID'=>$division,'gradeID'=>$grade,'roomID'=>$room));			

			$query = $this->db->get('student_parent');
			$output .='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr class="bgTable">
							<th>#</th>						
							<th>Stu. No.</th>						
							<th>Student Name</th>
							<th><span style="color:#c51212;">Attendnce Days</span> / Total School Days</th>
						</tr>
					</thead>
			';
			$n = 1;
			$student_days_absence = '';
			$color='';
			foreach ($query->result() as $row) 
			{
				// student start school date
				$student_days_school = $this->get_school_days($row->stuID);
				// count absence for student
		        $student_days_absence = $this->get_count_absence($row->stuID);
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

				$output .='
					<tr>
						<td>'.$n.'</td>
						<td>'.$row->studentID.'</td>
						<td><a href="#" onclick="show_dates('.$row->stuID.',/ '.$row->englishName.' /);">'.$row->englishName.'</a></td>
						<td>'.$attendance_days .' / '.$student_days_school.'</td>
					</tr>
				';
				$n++;
			}
			$output .='</table>';
			return $output;
		}		
	}
	function fetch_details_student_absence($limit,$start)
	{
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->select('*');
			$this->db->where('stuID',$id);
			$this->db->from('student_information_absences');
			$this->db->order_by('dateAbsence');
			$this->db->limit($limit,$start);
			$query = $this->db->get();
			$output .='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr>
							<th class="col-md-2">Day</th>
							<th class="col-md-8">Date</th>
							<th class="col-md-2">Delete</th>
						</tr>
					</thead>
			';
			if ($query->num_rows()>0)
			{
				foreach ($query->result() as $row) 
				{
					// '. $delete_absence .'
					$login_level_update ='';
					$login_level_delete ='';
					if ( 'Super Administrator' == $_SESSION['loginlevel']) 
					{
						// $login_level_update ='update_academicyear';
						$login_level_delete ='delete_absence';
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
						$date = $row->dateAbsence;
						$date = date("d-m-Y", strtotime($date) ); 

						$timestamp = strtotime($row->dateAbsence);
						$day = date('l', $timestamp);				
					$output .='
						<tr>
							<td>'.$day.'</td>					
							<td>'.$date.'</td>
							<td><a href="#" class="fa fa-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->id .')"></a></td>
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
	}		
	function addAbsence()
	{
		if (isset($_POST['stuID'])) 
		{
			$stuID = filter_var($this->input->post('stuID'),FILTER_SANITIZE_NUMBER_INT);
			$todayDate = date('Y.m.d');
			
			$data = array(
				'dateAbsence'=>$todayDate,
				'stuID'=>$stuID
			);
			$this->db->insert('absences',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}
		}
	}
	function deleteabsence()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$this->db->delete('absences');
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}
		}
	}
}
 ?>