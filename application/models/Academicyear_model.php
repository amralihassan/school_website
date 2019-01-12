<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Academicyear_model
*/
class Academicyear_model extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}
	function retriveacademicyear()
	{
		$query = $this->db->get('academicyear');
		return $query->result();
	}
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('academicyear');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('academicyear');
		$this->db->order_by('yearID','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='
			<table class="table table-responsive table-hover table-bordered">
				<thead>
					<tr class="bgTable">
						<th class="col-lg-9">Academic year</th>
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
				$login_level_update ='update_academicyear';
				$login_level_delete ='delete_academicyear';
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
					<td>'.$row->acadYear.'</td>
					<td><a href="#" class="glyphicon glyphicon-pencil btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->yearID.')"></a></td>
					<td><a href="#" class="glyphicon glyphicon-trash btn btn-danger btn-xs" onclick="'.$login_level_delete.'('.$row->yearID.')"></a></td>
				</tr>
			';
		}
		$output .='</table>';
		return $output;
	}
	function deleteacademicyear()
	{
		if ($_GET)
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('yearID',$id);
			$this->db->delete('academicyear');
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
	function addacademic()
	{
		if (isset($_POST['acadYear'])) 
		{
			$data = array(
				'acadYear'=>filter_var($this->input->post('acadYear'),FILTER_SANITIZE_STRING)
			);
			$this->db->insert('academicyear',$data);
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
		if ($_GET)
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('yearID',$id);
			$query = $this->db->get('academicyear');
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
	function updateacademicyear()
	{
		if (isset($_POST['yearID']) && isset($_POST['acadYear_update']))
		{
			// filter id must be integer number
			$id = filter_var($this->input->post('yearID'),FILTER_SANITIZE_NUMBER_INT);
			$data = array(
				'acadYear'=>filter_var($this->input->post('acadYear_update'),FILTER_SANITIZE_STRING)
			);
			$this->db->where('yearID',$id);
			$this->db->update('academicyear',$data);
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