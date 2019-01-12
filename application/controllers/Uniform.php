<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * uniform controller
 */
class Uniform extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Uniform_model','uni');
	}
	function loaduniform()
	{
		$data['pagetitle'] = 'Uniform';
		$data['page']=$this->load->view('website/uniform_view',NULL,TRUE);
		echo json_encode($data);
	}
	
	function load_uniform_parent()
	{
		$data['pagetitle'] = 'Uniform';
		$data['page']=$this->load->view('parents_pages/parent_uniform_view',NULL,TRUE);
		echo json_encode($data);
	}

	function pagination_search_parent()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->uni->count_all_search();
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
			'uniform_pagination_link' => $this->pagination->create_links(),
			'uniform_table'	  => $this->uni->fetch_details_search_parent($config['per_page'],$start)
		);
		echo json_encode($output);		
	}	
	function addUniform()
	{
	
		//upload configuration
		$config = array(
			'upload_path' => 'public/upload/uni/',
			'allowed_types' => 'jpg|jpeg',
			'max_siza' => 0,
			'max_filename' => 0,
			'detect_mime' => true,
			'encrypt_name' => false
			);
		$this->load->library('upload',$config);

		if ($this->upload->do_upload('file_name'))
		{
			$result = $this->uni->addUniform();
			$msg['success'] = false;
			if ($result) {
				$msg['success']= true;
			}
			echo json_encode($msg);
		}
		else{
			$msg['error'] = $this->upload->display_errors();
			echo json_encode($msg);
		}

	}
}
 ?>