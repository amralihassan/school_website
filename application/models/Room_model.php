<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Room_model
*/
class Room_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function get_rooms_query($divisionID,$gradeID)
	{
		$query = $this->db->get_where('room' ,
			array('gradeID' => $gradeID,'divisionID' => $divisionID));
		return $query->result();
	}
	function retriveroom()
	{
		$query = $this->db->get('room');
		return $query->result();
	}
	function retriveroom_private()
	{
		$this->db->where('teacherID',$_SESSION['id_admin']);
		$query = $this->db->get('teacherjobs_full_data');
		return $query->result();
	}	
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('room');
		return $query->num_rows();
	}
	function count_all_search()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$id = filter_var($this->input->get('name'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('divisionID',$id);
			$query = $this->db->get('room');
			return $query->num_rows();
		}

	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('room_division_grade');
		$this->db->order_by('roomID');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='
			<table class="table table-responsive table-hover table-bordered">
				<thead>
					<tr class="bgTable">
						<th class="col-lg-3">Division</th>
						<th class="col-lg-3">Grade</th>
						<th class="col-lg-3">Class</th>
						<th colspan="3" class="col-lg-1">Action</th>
					</tr>
				</thead>
		';
		foreach ($query->result() as $row) 
		{
			// '. $login_level_update .'
			// '. $login_level_delete .'
			$login_level_update ='';
			$login_level_delete ='';
			if ( 'Super Administrator' == $_SESSION['loginlevel']) 
			{
				$login_level_update ='update_room';
				$login_level_delete ='delete_room';
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
			$output .='
				<tr>
					<td>'.$row->divisionName.'</td>
					<td>'.$row->gradeName.'</td>
					<td>'.$row->roomName.'</td>
					<td><a href="#" class="glyphicon glyphicon-pencil btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->roomID.')"></a></td>
					<td><a href="#" class="glyphicon glyphicon-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->roomID.')"></a></
				</tr>
			';
		}
		$output .='</table>';
		return $output;
	}
	function fetch_details_search($limit,$start)
	{
		if ($_GET['name'])
		{
			$id = filter_var($this->input->get('name'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->order_by('roomID');
			$this->db->where('divisionID',$id);
			$this->db->limit($limit,$start);
			$query = $this->db->get('room_division_grade');
			$output .='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr class="bgTable">
							<th class="col-lg-3">Division</th>
							<th class="col-lg-3">Grade</th>
							<th class="col-lg-3">Class</th>
							<th colspan="3" class="col-lg-1">Action</th>
						</tr>
					</thead>
			';
			foreach ($query->result() as $row) 
			{
				// '. $login_level_update .'
				// '. $login_level_delete .'
				$login_level_update ='';
				$login_level_delete ='';
				if ( 'Super Administrator' == $_SESSION['loginlevel']) 
				{
					$login_level_update ='update_room';
					$login_level_delete ='delete_room';
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
				$output .='
					<tr>
						<td>'.$row->divisionName.'</td>
						<td>'.$row->gradeName.'</td>
						<td>'.$row->roomName.'</td>
						<td><a href="#" class="glyphicon glyphicon-pencil btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->roomID.')"></a></td>
						<td><a href="#" class="glyphicon glyphicon-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->roomID.')"></a></
					</tr>
				';
			}
			$output .='</table>';
			return $output;
		}
	}
	function deleteroom()
	{
		if ($_GET['id'])
		{
			$id= filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('roomID',$id);
			$this->db->delete('room');
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}
		}
		else
		{
		return false;
		}
	}
	function addroom()
	{
		if (isset($_POST['roomName']) && isset($_POST['divisionID_add']) && isset($_POST['gradeID_add']))
		{
			$data = array(
		 		'roomName'=>filter_var($this->input->post('roomName'),FILTER_SANITIZE_STRING),
		 		'divisionID'=>filter_var($this->input->post('divisionID_add'),FILTER_SANITIZE_NUMBER_INT),
		 		'gradeID'=>filter_var($this->input->post('gradeID_add'),FILTER_SANITIZE_NUMBER_INT)
		 	);
		 	$this->db->insert('room',$data);
		 	if ($this->db->affected_rows() > 0) {
		 		return true;
		 	}else
		 	{
		 		return false;
		 	}
		}
		else
		{
			return false;
		}
	}
	function getdatabyid()
	{
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('roomID',$id);
			$query = $this->db->get('room_division_grade');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	function getRoombtdivisionID()
	{
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('divisionID',$id);
			$query = $this->db->get('room_division_grade');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	function updateroom()
	{
		if (isset($_POST['roomName_update']) && isset($_POST['divisionID_edit']) && isset($_POST['gradeID_edit']))
		{
			$id = filter_var($this->input->post('roomID'),FILTER_SANITIZE_NUMBER_INT);
		 	$data = array(
				'roomName'=>filter_var($this->input->post('roomName_update'),FILTER_SANITIZE_STRING),
				'divisionID'=>filter_var($this->input->post('divisionID_edit'),FILTER_SANITIZE_NUMBER_INT),
		 		'gradeID'=>filter_var($this->input->post('gradeID_edit'),FILTER_SANITIZE_NUMBER_INT)
		 	);
		 	$this->db->where('roomID',$id);
		 	$this->db->update('room',$data);
		 	if ($this->db->affected_rows() > 0) {
		 		return true;
		 	}else{
		 		return false;
			}
		}
		else
		{
			return false;
		}
	}
}
 ?>