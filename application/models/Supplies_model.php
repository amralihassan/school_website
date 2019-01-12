<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Supplies_model
 */
class Supplies_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function retrive_title_supplies()
	{
		$query = $this->db->get('supplies');
		return $query->result();		
	}
	function count_all_search()
	{
		// get number of rows
		$query = $this->db->get('supplies');
		return $query->num_rows();
	}	
	function fetch_details_search_parent()
	{
		$id = $this->input->get('id');
		$output = '';
		$this->db->where(array('id'=>$id));
		// $this->db->limit($limit,$start);
		$query = $this->db->get('supplies');

		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='					
						<img width="100%" src="'. base_url('public/upload/sup/').$row->file_name.'" alt="Banner">
				';
				$output .='
					
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
 ?>