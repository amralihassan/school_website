<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Uniform_model
 */
class Uniform_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function count_all_search()
	{
		// get number of rows
		$query = $this->db->get('uniform');
		return $query->num_rows();
	}	
	function fetch_details_search_parent()
	{

		$output = '';
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get('uniform');

		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='			
						<h2 style="text-align: center;color:#1283b0;">'.$row->title.'<h2>		
						<img width="100%" src="'. base_url('public/upload/uni/').$row->file_name.'" alt="Prise List">
				';
				$output .='
					
	 			';
			}			
		}
		else
		{
			$output = '<div class="alert alert-warning">No results found.</div>';
		}


		return $output;		
	}	
	function addUniform()
	{
		$data = array
		('title' => $this->input->post('title'),
			'file_name' => $this->upload->file_name
		);
		// unlink image
		$img=$this->db->select('*')->from('uniform')->limit(1)->order_by('id')->get()->row('file_name');
		$id=$this->db->select('*')->from('uniform')->limit(1)->order_by('id')->get()->row('id');
		unlink("public/upload/uni/".$img);
			
		// delete image
		$this->db->where('id',$id);
		$this->db->delete('uniform');
		if ($this->db->affected_rows() >0) {
			$this->db->insert('uniform',$data);
			return true;
		}else{
			return false;
		}
		
	}
}
 ?>