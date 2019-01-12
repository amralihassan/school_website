<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Lecture model
 */
class Lecture_model extends CI_model
{
	
	function __construct()
	{
		parent ::__construct();
	}
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('lecture_room');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('lecture_room');
		$this->db->order_by('file_name');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='';
		foreach ($query->result() as $row) 
		{
			// '. $login_level_update .'
			// '. $login_level_delete .'
			
			$login_level_delete ='';
			if ( 'Super Administrator' == $_SESSION['loginlevel']) 
			{
				$login_level_delete ='delete_image';
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
        			<div class="col-lg-4">
						<div class="gallery">
						  <a target="_blank" href="'.base_url('public/upload/lecture/').$row->file_name.'">
						    <img src="'.base_url('public/upload/lecture/').$row->file_name.'" alt="5Terre" width="370" height="200">
						  </a>
						  <div class="desc" style="text-align:left;margin-bottom:15px;">'. $row->roomName .' <a href="#" style="float:right; color:red;" onclick="'. $login_level_delete .'('. $row->id .');">Remove</a></div>
						</div>							        				
        			</div>
			';

		}

		return $output;
	}	
	function count_all_search()
	{
		// get number of rows
		$value = $this->input->get('name');
		$this->db->like('roomName',$value);
		$this->db->or_like('file_name',$value);
		$query = $this->db->get('lecture_room');
		return $query->num_rows();
	}
	function fetch_details_search($limit,$start)
	{
		$value = $this->input->get('name');
		$output = '';
		$this->db->select('*');
		$this->db->from('lecture_room');
		$this->db->order_by('file_name');
		$this->db->like('roomName',$value);
		$this->db->or_like('file_name',$value);
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='';
		foreach ($query->result() as $row) 
		{
			$output .='
        			<div class="col-lg-4">
						<div class="gallery">
						  <a target="_blank" href="'.base_url('public/upload/lecture/').$row->file_name.'">
						    <img src="'.base_url('public/upload/lecture/').$row->file_name.'" alt="5Terre" width="370" height="200">
						  </a>
						  <div class="desc" style="text-align:left;margin-bottom:15px;">'. $row->roomName .' <a href="#" style="float:right; color:red;" onclick="delete_image('. $row->id .');">Remove</a></div>
						</div>							        				
        			</div>
			';

		}

		return $output;
	}	
	function addlectureschedule()
	{
		$data = array
		(	
			'roomID' => $this->input->post('roomID_add'),
			'file_name' => $this->upload->file_name
		);
		
		$this->db->insert('lecture',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else
		{
			return false;
		}
	}	
	function deletelecture_schedule()
	{
		$id=$this->input->get('id');
		if ($_GET['img']) {
			$img=$this->input->get('img');
			unlink("public/upload/lecture/".$img);
		}
		
		$this->db->where('id',$id);
		$this->db->delete('lecture');
		
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}		
	}
	function getdatabyid()
	{
		$id = $this->input->get('id');
		$this->db->where('id',$id);
		$query = $this->db->get('lecture');
		if ($query ->num_rows()>0) {
			return $query->row();
		}else{
			return false;
		}		
	}
}
 ?>