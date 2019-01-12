<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Division_model
*/
class Division_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function retriveDivisions()
	{
		$query = $this->db->get('division');
		return $query->result();
	}
	function retrivedivision_private()
	{
		$this->db->select("DISTINCT(divisionName),teacherID,divisionID");
		$this->db->where('teacherID',$_SESSION['id_admin']);
		$this->db->from('teacherjobs_full_data');
		$query = $this->db->get();
		return $query->result();
	}	
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('division');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('division');
		$this->db->order_by('divisionID');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='
			<table class="table table-responsive table-hover table-bordered">
				<thead>
					<tr class="bgTable">
						<th class="col-lg-9">Division</th>
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
				$login_level_update ='update_division';
				$login_level_delete ='delete_division';
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
					<td><a href="#" class="glyphicon glyphicon-pencil btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->divisionID.')"></a></td>
					<td><a href="#" class="glyphicon glyphicon-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->divisionID.')"></a></td>
				</tr>
			';
		}
		$output .='</table>';
		return $output;
	}
	function deletedivision()
	{
		if ($_GET['id'])
		{
			$id= filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('divisionID',$id);
			$this->db->delete('division');
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
	function addDivision()
	{
		if (isset($_POST['divisionName']))
		{
			$data = array(
				'divisionName'=>filter_var($this->input->post('divisionName'),FILTER_SANITIZE_STRING)
			);
			$this->db->insert('division',$data);
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
			$this->db->where('divisionID',$id);
			$query = $this->db->get('division');
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
	function updatedivision()
	{
		if (isset($_POST['divisionID']) && isset($_POST['divisionName_update']))
		{
			$id = filter_var($this->input->post('divisionID'),FILTER_SANITIZE_NUMBER_INT);
			$data = array(
				'divisionName'=> filter_var($this->input->post('divisionName_update'),FILTER_SANITIZE_STRING)
			);
			$this->db->where('divisionID',$id);
			$this->db->update('division',$data);
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