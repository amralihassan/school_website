<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Calendar_model
 */
class Calendar_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function retrive_title_calendar()
	{
		$query = $this->db->get('calendar');
		return $query->result();		
	}
	function count_all_search()
	{
		// get number of rows
		$query = $this->db->get('calendar');
		return $query->num_rows();
	}	
	function fetch_details_search_parent()
	{
		$id = $this->input->get('id');
		$output = '';
		$this->db->where(array('id'=>$id));
		// $this->db->limit($limit,$start);
		$query = $this->db->get('calendar');

		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='	<br>
						<a href="#" class="btn btn-danger pull-right" style="margin-bottom:5px;" onclick="Delete_calendar('.$row->id.');"><i class="fa fa-trash"></i> Delete</a>				
						<img width="100%" src="'. base_url('public/upload/cal/').$row->file_name.'" alt="Calendar">
				';
				$output .='
					
	 			';
			}			
		}
		else
		{
			$output = '<div class="alert alert-warning">No results found</div>';
		}


		return $output;		
	}

	function addCalendar()
	{
		$data = array
		('title' => $this->input->post('title'),
			'file_name' => $this->upload->file_name
		);
		$this->db->insert('calendar',$data);
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}
		
	}	
	function getFilenameById($id)
	{
		
		$this->db->where('id',$id);
		$get_file_name = $this->db->get('calendar')->row();
		return $get_file_name;
	}	
	function deleteCalendar()
	{
		$id=$this->input->get('id');

		$this->db->where('id',$id);
		$this->db->delete('calendar');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}
	}	
}
 ?>