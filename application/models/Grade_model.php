<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Grade_model
*/
class Grade_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function retrivegrades()
	{
		$query = $this->db->get('grade');
		return $query->result();
	}

	function retrivegrade_private()
	{
		$this->db->where('teacherID',$_SESSION['id_admin']);
		$query = $this->db->get('teacher_grades');
		return $query->result();
	}
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('grade');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('grade');
		$this->db->order_by('gradeID');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='
			<table class="table table-responsive table-hover table-bordered">
				<thead>
					<tr class="bgTable">
						<th class="col-lg-9">Grade</th>
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
				$login_level_update ='update_grade';
				$login_level_delete ='delete_grade';
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
					<td>'.$row->gradeName.'</td>
					<td><a href="#" class="glyphicon glyphicon-pencil btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->gradeID.')"></a></td>
					<td><a href="#" class="glyphicon glyphicon-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->gradeID.')"></a></
				</tr>
			';
		}
		$output .='</table>';
		return $output;
	}
	function deletegrade()
	{
		if ($_GET['id'])
		{
			$id= filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('gradeID',$id);
			$this->db->delete('grade');
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
	function addgrade()
	{
		if (isset($_POST['gradeName']))
		{
			$data = array(
				'gradeName'=> filter_var($this->input->post('gradeName'),FILTER_SANITIZE_STRING)
			);
			$this->db->insert('grade',$data);
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
			$this->db->where('gradeID',$id);
			$query = $this->db->get('grade');
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
	function updategrade()
	{
		if (isset($_POST['gradeID']) && isset($_POST['gradeName_update']))
		{
			$id = filter_var($this->input->post('gradeID'),FILTER_SANITIZE_NUMBER_INT);
			$data = array(
				'gradeName'=> filter_var($this->input->post('gradeName_update'),FILTER_SANITIZE_STRING)
			);
			$this->db->where('gradeID',$id);
			$this->db->update('grade',$data);
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