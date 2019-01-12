<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Supplies controller
 */
class Supplies extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Supplies_model','sup');
	}
	function load_supplies()
	{
		$data['pagetitle'] = 'Supplies';
		$data['page']=$this->load->view('website/supplies_view',NULL,TRUE);
		echo json_encode($data);
	}		
	function load_supplies_parent()
	{
		$data['pagetitle'] = 'Supplies';
		$data['page']=$this->load->view('parents_pages/parent_supplies_view',NULL,TRUE);
		echo json_encode($data);
	}
	// retrive calendar
	function retrive_title_supplies()
	{
		$titles = $this->sup->retrive_title_supplies();
		// titles
		if (count($titles)>0) // fill select box
		{
			$pro_select_box = "";
			
			foreach ($titles as $row) {
				
				$pro_select_box .= '<li><a target="_blanke" href="'. base_url('public/upload/sup/').$row->file_name.'">'.$row->title.'</a></li>' ;
			}
			echo json_encode($pro_select_box);
		}			
	}
	function pagination_search_parent()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->sup->count_all_search();
		$config['per_page'] = 25;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['num_links'] = 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start =($page - 1) * $config['per_page'];
		$output = array(
			'supplies_pagination_link' => $this->pagination->create_links(),
			'supplies_table'	  => $this->sup->fetch_details_search_parent($config['per_page'],$start)
		);
		echo json_encode($output);		
	}	
}
 ?>