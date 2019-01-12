<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Subject_model
*/
class Subject_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function retivesubjects()
	{
		$query = $this->db->get('subject');
		return $query->result();
	}
	function retivesubjects_teacher()
	{
		$this->db->select("DISTINCT(subjectName),teacherID,subjectID");
		$this->db->where('teacherID',$_SESSION['id_admin']);
		$this->db->from('teacherjobs_full_data');
		$query = $this->db->get();
		return $query->result();		
	}	
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('subject');
		return $query->num_rows();
	}
	function count_all_search()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$name =filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$this->db->like('subjectName',$name);
			$query = $this->db->get('subject');
			return $query->num_rows();
		}
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('subject');
		$this->db->order_by('subjectID');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='
			<table class="table table-responsive table-hover table-bordered">
				<thead>
					<tr class="bgTable">
						<th class="col-lg-9">Subject</th>
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
				$login_level_update ='update_subject';
				$login_level_delete ='delete_subject';
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
					<td>'.$row->subjectName.'</td>
					<td><a href="#" class="glyphicon glyphicon-pencil btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->subjectID.')"></a></td>
					<td><a href="#" class="glyphicon glyphicon-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->subjectID.')"></a></
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
			$value =filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$output = '';
			$this->db->order_by('subjectName');
			$this->db->like('subjectName',$value);
			$this->db->limit($limit,$start);
			$query = $this->db->get('subject');
			$output .='
				<table class="table table-responsive table-hover">
					<thead>
						<tr class="bgTable">
							<th class="col-lg-9">Subject</th>
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
					$login_level_update ='update_subject';
					$login_level_delete ='delete_subject';
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
						<td>'.$row->subjectName.'</td>
						<td><a class="glyphicon glyphicon-pencil btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->subjectID.')"></a></td>
						<td><a class="glyphicon glyphicon-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->subjectID.')"></a></
					</tr>
				';
			}
			$output .='</table>';
			return $output;
		}
		else
		{
			$output='<div class="alert alert-info">Please enter subject name to start search.</div>';
			return $output;
		}
	}
	function deletesubject()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('subjectID',$id);
			$this->db->delete('subject');
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	function addsubject()
	{
		if (isset($_POST['subjectName']))
		{
			$data = array(
				'subjectName'=>filter_var($this->input->post('subjectName'),FILTER_SANITIZE_STRING)
			);
			$this->db->insert('subject',$data);
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
			$this->db->where('subjectID',$id);
			$query = $this->db->get('subject');
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
	function updatesubject()
	{
		if (isset($_POST['subjectID']) && isset($_POST['subjectName_update']))
		{
			$id = filter_var($this->input->post('subjectID'),FILTER_SANITIZE_NUMBER_INT);
			$data = array(
				'subjectName'=>filter_var($this->input->post('subjectName_update'),FILTER_SANITIZE_STRING)
			);
			$this->db->where('subjectID',$id);
			$this->db->update('subject',$data);
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