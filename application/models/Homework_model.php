<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Homework_model
*/
class Homework_model extends CI_model
{
	function __construct()
	{
		parent :: __construct();
	}
	function retrive_all_hw()
	{
		$this->db->order_by('dateHW','DESC');
		$query = $this->db->get('homework_room_subject');
		return $query->result();
	}	
	function retrive_all_hw_student()
	{
		$this->db->order_by('dateHW','DESC');
		$this->db->where('roomID',$_SESSION['roomID']);
		$this->db->where('stuID',Null);
		$this->db->or_where('stuID',$_SESSION['stuID']);
		$query = $this->db->get('homework_for_parent');
		return $query->result();
	}	
	function count_all()
	{
		if ($_GET['stuID'] || $_SESSION['roomID'])
		{
			// get number of rows
			$room = "";
			if ($_GET['stuID'])
			{
				$room = $this->input->get('stuID');
			}
			else
			{
				$room = $_SESSION['roomID'];
			}		
			$query = $this->db->get('homework_for_parent');
			return $query->num_rows();
		}
	}	
	function count_all_search()
	{
		if ($_GET['roomID'] && $_GET['value'])
		{
		$this->db->or_like('Details',filter_var($this->input->get('value'),FILTER_SANITIZE_STRING));
			$this->db->where('roomID',filter_var($this->input->get('roomID'),FILTER_SANITIZE_NUMBER_INT));			
			$query = $this->db->get('homework_room_subject');
			return $query->num_rows();
		}
	}	
	function fetch_details_search($limit,$start)
	{
		if ($_GET['roomID'] && $_GET['value'])
		{
			$file_attachment ='';     
			$output = '';
			$this->db->order_by('dateHW','DESC');
			$this->db->where('roomID',filter_var($this->input->get('roomID'),FILTER_SANITIZE_NUMBER_INT));		
			$this->db->or_like('Details',filter_var($this->input->get('value'),FILTER_SANITIZE_STRING));	
			$this->db->limit($limit,$start);
			$query = $this->db->get('homework_room_subject');
			if ($query->num_rows() <0) {
				$output = 'No results found.';
				return $output; 
			}
			$output = '
			<table id ="example" class="table table-hover table-bordered"><thead><tr><th>Date</th><th>Subject</th><th>Homework</th><th>Edit By</th><th>Download</th></tr></thead>
			';
            foreach ($query->result() as $row) 
            {
	        	// check attachment
				if ($row->file_name != "")
				 { $file_attachment = 'fa fa-download btn btn-info btn-xs';
				 } else{$file_attachment = "";}
				 
				$var = $row->dateHW;
				$var = date("d-m-Y", strtotime($var) ); 			            	
				$output .='
				<tr>
                    <td>'.$var.'</td>                    
					<td>'.$row->subjectName.'</td>
					<td>'.$row->Details.'</td>
					<td>'.$row->fullName.'</td>
					<td><a class="'.$file_attachment.'" target="_blank" href="'.base_url('public/upload/sheets/').$row->file_name.'"></a></td>
				</tr>
				';              
            }; 
			$output .='</table>';
			return $output;
		}
	}			
	function retrive_all_hw_teacher()
	{
		$this->db->where('id_admin',$_SESSION['id_admin']);
		$this->db->order_by('dateHW','DESC');
		$query = $this->db->get('homework_room_subject');
		return $query->result();
	}
	function count_all_hw_student()
	{
		if ($_GET['stu'])
		{
			$this->db->where('stuID',filter_var($this->input->get('stu'),FILTER_SANITIZE_NUMBER_INT));
			$query = $this->db->get('homework_gradable_student_parent');
			return $query->num_rows();
		}
	}		
	function fetch_details_student_homework($limit,$start)
	{
		if ($_GET['roomID'] || $_SESSION['roomID'])
		{
			$room = "";
			if ($_GET['roomID'])
			{
				$room = $this->input->get('roomID');
			}
			else
			{
				$room = $_SESSION['roomID'];
			}
			$output = '';
			$this->db->where('roomID',$room);
			$this->db->limit($limit,$start);
			$query = $this->db->get('homework_room_subject');
			if ($query->num_rows() <0) {
				$output = 'No results found.';
				return $output; 
			}
			$output .='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr class="bgTable">
							<th class="col-md-3">Subject</th>
							<th class="col-md-9">Homework</th>
						</tr>
					</thead>
			';
			foreach ($query->result() as $row) 
			{
				$output .='
					<tr>
						<td>'.$row->subjectName.'</td>
						<td>'.$row->Details.'</td>
					</tr>
				';
			}
			$output .='</table>';
			return $output;
		}
	}
	function fetch_details_gradable_homework_student($limit,$start)
	{
		if ($_GET['stu'])
		{
			$stuID = filter_var($this->input->get('stu'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->where('stuID',$stuID);
			$this->db->limit($limit,$start);
			$query = $this->db->get('homework_gradable_student_parent');
			if ($query->num_rows() <0) {
				$output = 'No results found.';
				return $output; 
			}
			$output .='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr>
							<th class="col-md-1">Subject</th>
							<th class="col-md-2">Date</th>
							<th class="col-md-3">Homework</th>
							<th class="col-md-1">Full Mark</th>
							<th class="col-md-1">Mark</th>
							<th class="col-md-2">Status</th>
							<th class="col-md-2">Notes</th>
							<th class="col-md-0">Edit</th>
						</tr>
					</thead>
			';
			foreach ($query->result() as $row) 
			{
				$var = $row->dateHW;
				$var = date("d-m-Y", strtotime($var) ); 					
				$output .='
					<tr>
						<td>'.$row->subjectName.'</td>
						<td>'.$var.'</td>
						<td>'.$row->Details.'</td>
						<td>'.$row->fullMark.'</td>
						<td>'.$row->mark.'</td>
						<td>'.$row->statusMark.'</td>
						<td>'.$row->notes.'</td>
						<td><a class="fa fa-edit btn-xs btn btn-info" onclick="edit_hw_mark('.$row->id.')"></a></td>						
					</tr>
				';
			}
			$output .='</table>';
			return $output;
		}
	}	
	function fetch_details_view_homework_student($limit,$start)
	{
		if ($_GET['hw'] && $_GET['roomID'] )
		{
			$hw = filter_var($this->input->get('hw'),FILTER_SANITIZE_NUMBER_INT);
			$room = filter_var($this->input->get('roomID'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->where('hwID',$hw);
			$this->db->where('roomID',$room);
			$this->db->where('id_admin',$_SESSION['id_admin']);
			$this->db->limit($limit,$start);
			$query = $this->db->get('view_student_marks');
			if ($query->num_rows() <0) {
				$output = 'No results found.';
				return $output; 
			}
			$output .='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr>
							<th class="col-md-3">Student Name</th>
							<th class="col-md-2">Full Mark</th>
							<th class="col-md-1">Mark</th>
							<th class="col-md-2">Status</th>
							<th class="col-md-4">Notes</th>
						</tr>
					</thead>
			';
			foreach ($query->result() as $row) 
			{					
				$output .='
					<tr>
						<td>'.$row->englishName.'</td>
						<td>'.$row->fullMark.'</td>
						<td>'.$row->mark.'</td>
						<td>'.$row->statusMark.'</td>
						<td>'.$row->notes.'</td>					
					</tr>
				';
			}
			$output .='</table>';
			return $output;
		}
	}		
	function retrive_teacher_homework()
	{
		if ($_GET['rom'])
		{
			$this->db->where('roomID',$_GET['rom']);
			$this->db->where('id_admin',$_SESSION['id_admin']);
			$query = $this->db->get('homework_room_subject');
			return $query->result();
		}
		
	}
	function fetch_details($limit,$start)
	{
		if ($_GET['stuID'])
		{
			$file_attachment ='';     
			$output = '';
			$this->db->order_by('dateHW','DESC');
			$this->db->where('stuID',filter_var($this->input->get('stuID'),FILTER_SANITIZE_NUMBER_INT));
			$this->db->limit($limit,$start);
			$query = $this->db->get('homework_for_parent');
			if ($query->num_rows() <0) {
				$output = 'No results found.';
				return $output; 
			}
			$output = '
			<table id ="example" class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="col-md-1">Date</th>
						<th class="col-md-1">Subject</th>
						<th class="col-md-3">Homework</th>
						<th class="col-md-1">Full Mark</th>
						<th class="col-md-1">Mark</th>
						<th class="col-md-2">Status</th>
						<th class="col-md-3">Notes</th>
						<th class="col-md-0">Download</th>
					</tr>
				</thead>
			';
            foreach ($query->result() as $row) 
            {
	        	// check attachment
				if ($row->file_name != "")
				 { $file_attachment = 'fa fa-download btn btn-info btn-xs';
				 } else{$file_attachment = "";}
				 
				$var = $row->dateHW;
				$var = date("d-m-Y", strtotime($var) ); 			            	
				$output .='
				<tr>
                    <td>'.$var.'</td>                    
					<td>'.$row->subjectName.'</td>
					<td>'.$row->Details.'</td>
					<td>'.$row->fullMark.'</td>
					<td>'.$row->mark.'</td>
					<td>'.$row->statusMark.'</td>
					<td>'.$row->notes.'</td>
					<td><a class="'.$file_attachment.'" target="_blank" href="'.base_url('public/upload/sheets/').$row->file_name.'"></a></td>
				</tr>
				';              
            }; 
			$output .='</table>';
			return $output;
		}
	}	
	
	function fetch_details_class_gradable($limit,$start)
	{
		if ($_GET['roomID'] && $_GET['hwID'])
		{
			$room = filter_var($this->input->get('roomID'),FILTER_SANITIZE_NUMBER_INT); 
			$hwID = filter_var($this->input->get('hwID'),FILTER_SANITIZE_NUMBER_INT); 
			$output = '';
			$this->db->where('roomID',$room);
			$this->db->where('hwID',$hwID);
			$this->db->limit($limit,$start);
			$query = $this->db->get('homework_student');
			if ($query->num_rows() <0) {
				$output = 'No results found.';
				return $output; 
			}
			$output .='				
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr>
							<th class="col-md-4">Student Name</th>
							<th class="col-md-1">Mark</th>
							<th class="col-md-2">Status</th>
							<th class="col-md-5">Notes</th>

						</tr>
					</thead>
			';
			foreach ($query->result() as $row) 
			{
				$output .='
					<tr>					
						<td><input type="text" name="hwID[]" value="'.$row->hwID.'" hidden=""><input type="text" name="stuID[]" value="'.$row->stuID.'" hidden=""><input class="form-control" type="text" value="'.$row->englishName.'" readonly=""></td>
						<td><input class="form-control" type="text" name="mark[]" id="markID" required=""></td>	
						<td>
						    <select class="form-control" name="statusMark[]" required="">
						      <option value="">Status</option>
						      <option value="Excellent">Excellent</option>
						      <option value="Very Good">Very Good</option>
						      <option value="Good">Good</option>
						      <option value="Poor">Poor</option>
						    </select>
						</td>
						<td><input class="form-control" type="text" name="notes[]"required=""></td>						
					</tr>
				';
			}
			$output .='</table>';
			return $output;
		}
	}	
	function fetch_details_homework($limit,$start)
	{
		if ($_GET['hwID'])
		{
			$hwID = filter_var($this->input->get('hwID'),FILTER_SANITIZE_NUMBER_INT);  
			$output = '';
			$this->db->where('hwID',$hwID);
			$this->db->limit($limit,$start);
			$query = $this->db->get('homework_room_subject');
			$output .='				
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th class="col-md-2">Date</th>
							<th class="col-md-2">Subject</th>
							<th class="col-md-2">Class</th>
							<th class="col-md-6">Homework</th>
						</tr>
					</thead>
			';
            foreach ($query->result() as $row) 
            {
				$var = $row->dateHW;
				$var = date("d-m-Y", strtotime($var) ); 			            	
				$output .='
					<tr>
	                    <td><input style="display:none;" type="text" class="form-control" name="txtSearch_roomID" id="roomID" value="'.$row->roomID.'">'.$var.'</td>                    
						<td>'.$row->subjectName.'</td>
						<td>'.$row->roomName.'</td>
						<td>'.$row->Details.'</td>
					</tr>
				';              
            }; 
			$output .='</table>';
			return $output;
		}
	}	
	function addhomework()
	{
		if (isset($_POST['dateHW']) && isset($_POST['roomID_add']) && isset($_POST['subjectID']) && isset($_POST['Details'])) 
		{
			$data = array(
				'dateHW'=>$this->input->post('dateHW'),
				'roomID'=>filter_var($this->input->post('roomID_add'),FILTER_SANITIZE_NUMBER_INT),
				'subjectID'=>filter_var($this->input->post('subjectID'),FILTER_SANITIZE_NUMBER_INT),
				'Details'=>$this->input->post('Details'),
				'id_admin' => $_SESSION['id_admin'],
				'file_name' => $this->upload->file_name,
				'gradable' =>$this->input->post('gradeable_add')
			);
			
			$this->db->insert('homework',$data);
			if ($this->db->affected_rows() > 0) 
			{
				return true;
			}else
			{
				return false;
			}
		}
	}
	function check_exist($homeworkID)
	{
		$this->db->where('hwID',$homeworkID);		
		$query = $this->db->get('homework_gradable');
		return $query->num_rows();
	}	
	function insertMarks()
	{
		// 0 insert homework more one time
		// 1 insert mark greater than full mark
		// 2 ok
		// 3 error
		// 4 fill all fields
		if ((array_filter($_POST['stuID'])) && (array_filter($_POST['hwID'])) && (array_filter($_POST['fullMark'])) && (array_filter($_POST['mark'])) && (array_filter($_POST['statusMark'])))
		{
			$hwID = filter_var($_POST['hwID'],FILTER_SANITIZE_NUMBER_INT);

			$stuID = $this->input->post('stuID[]');
			$hwID = $this->input->post('hwID[]');
			$homeworkID = $hwID[0];
			// check is the homework insert before
			if ($this->check_exist($homeworkID) > 0)
			{
				return 0;
			}
			$fullMark = $this->input->post('fullMark[]');
			$mark = $this->input->post('mark[]');
			// ensure mark less than full mark
			foreach ($mark as $value) 
			{
				if ($fullMark[0] < $value)
				{
					return 1;
				}
				if ($value < 0)
				{
					return 4;
				}				

			}			
			$statusMark = $this->input->post('statusMark[]');
			$notes = $this->input->post('notes[]');

			$value = array();
			$array_count = count($stuID);
			$data=array();
			for ($i=0; $i < $array_count; $i++) { 
				$value[$i] = array(
					'stuID'=>$stuID[$i],
					'hwID'=>$hwID[$i],
					'fullMark'=>$fullMark[0],
					'mark'=>$mark[$i],
					'statusMark' => $statusMark[$i],
					'notes' =>$notes[$i]
				);

			}		

			$this->db->insert_batch('homework_gradable',$value);	
			if ($this->db->affected_rows() > 0) 
			{
				return 2;
			}else
			{
				return 1;
			}
		}
		else
		{
			return 4;
		}
	}	
	function addhomework_no_attachement()
	{
		if (isset($_POST['dateHW']) && isset($_POST['roomID_add']) && isset($_POST['subjectID']) && isset($_POST['Details'])) 
		{
			$data = array(
				'dateHW'=>$this->input->post('dateHW'),
				'roomID'=>filter_var($this->input->post('roomID_add'),FILTER_SANITIZE_NUMBER_INT),
				'subjectID'=>filter_var($this->input->post('subjectID'),FILTER_SANITIZE_NUMBER_INT),
				'Details'=>$this->input->post('Details'),
				'id_admin' => $_SESSION['id_admin'],
				'gradable' =>$this->input->post('gradeable_add')
			);
			
			$this->db->insert('homework',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}
		}
	}	
	function deletehomework()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('hwID',$id);
			$this->db->delete('homework');
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}
		}
	}
	function getdatabyid()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('hwID',$id);
			$query = $this->db->get('homework_room_subject');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}
	function get_student_mark_id()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$query = $this->db->get('homework_gradable_student_parent');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}	
	function updatehomework()
	{
		if (isset($_POST['hwID']) && isset($_POST['dateHW_update']) && isset($_POST['roomID_update']) && isset($_POST['subjectID_update']) && isset($_POST['Details_update'])) 
		{
			$id = filter_var($this->input->post('hwID'),FILTER_SANITIZE_NUMBER_INT);
			$data = array(
				'dateHW'=>$this->input->post('dateHW_update'),
				'roomID'=>filter_var($this->input->post('roomID_update'),FILTER_SANITIZE_NUMBER_INT),
				'subjectID'=>filter_var($this->input->post('subjectID_update'),FILTER_SANITIZE_NUMBER_INT),
				'Details'=>$this->input->post('Details_update'),
				'id_admin' => $_SESSION['id_admin'],
				'gradable' =>$this->input->post('gradeable_update')
			);
			$this->db->where('hwID',$id);
			$this->db->update('homework',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}
	function updatehomework_teacher()
	{
		if (isset($_POST['Details_update']) && isset($_POST['hwID_update'])) 
		{
			$id = filter_var($this->input->post('hwID_update'),FILTER_SANITIZE_NUMBER_INT);
			$data = array(
				'Details'=>$this->input->post('Details_update'),
				'id_admin' => $_SESSION['id_admin'],
				'gradable' =>$this->input->post('gradeable_update')
			);
			$this->db->where('hwID',$id);
			$this->db->update('homework',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}	
	function editMark()
	{
		// 0 insert homework more one time
		// 1 insert mark greater than full mark
		// 2 ok
		// 3 error
		// 4 fill all fields		
		if (isset($_POST['id_edit']) && isset($_POST['fullMark_edit']) && isset($_POST['mark_edit']) && isset($_POST['statusMark_edit']) && isset($_POST['notes_edit'])) 
		{
			if ($_POST['fullMark_edit'] < $_POST['mark_edit'])
			{
				return 1;
			}
			$id = filter_var($this->input->post('id_edit'),FILTER_SANITIZE_NUMBER_INT);
			$data = array(
				'fullMark'=>filter_var($this->input->post('fullMark_edit'),FILTER_SANITIZE_NUMBER_INT),
				'mark'=>filter_var($this->input->post('mark_edit'),FILTER_SANITIZE_NUMBER_INT),
				'statusMark'=>$this->input->post('statusMark_edit'),
				'notes' =>filter_var($this->input->post('notes_edit'),FILTER_SANITIZE_STRING)
			);
			$this->db->where('id',$id);
			$this->db->update('homework_gradable',$data);
			if ($this->db->affected_rows() > 0) {
				return 2;
			}else{
				return 3;
			}
		}
		else
		{
			return 4;
		}

	}	
}
?>