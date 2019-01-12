<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Payments controller
 */
class Payments extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Payments_model','pay');
	}
	function load_payments_parent()
	{
		$data['pagetitle'] = 'Payments';
		$data['page']=$this->load->view('payments/parent_payments_view',NULL,TRUE);
		echo json_encode($data);
	}
	function load_update_page2()
	{
		$data['pagetitle'] = 'Payments';
		$data['page']=$this->load->view('payments/update_payment_view',NULL,TRUE);
		echo json_encode($data);		
	}
	function load_payments()
	{
		$data['pagetitle'] = 'Payments';
		$data['page']=$this->load->view('payments/payments_view',NULL,TRUE);
		echo json_encode($data);		
	}
    function retrive_all_payments()
    {
        $users = $this->pay->retrive_all_payments();
        $output = "";
        $n=1;
		$output .='';        
        if (count($users)>0) // fill select box
        {
            foreach ($users as $row) {
				// '. $login_level_update .'
				// '. $login_level_delete .'
				$loginlevelupdate ='';
				$login_level_delete ='';
				if ( 'Super Administrator' == $_SESSION['loginlevel']) 
				{
					$loginlevelupdate ='update_payment';
					$login_level_delete ='delete_payment';
				}
				elseif ( 'Administrator' == $_SESSION['loginlevel']) 
				{
					$loginlevelupdate ='deny';
					$login_level_delete ='deny';
				}
				else 
				{
					$loginlevelupdate ='deny';
					$login_level_delete ='deny';
				}	            	
				$output .='
					<tr>
                        <td>'.$n.'</td>  
						<td>'.$row->englishName.'</td>
						<td>'.$row->date_action.'</td>
						<td>'.$row->receipt_no.'</td>
						<td>'.$row->amount.'</td>
						<td>'.$row->reason.'</td>
						<td><a href="#" class="fa fa-edit btn btn-warning btn-xs" onclick="'. $loginlevelupdate .'('.$row->id.')"></a></td>	
						<td><a href="#" class="fa fa-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->id.')"></a></td>						
					</tr>
					';  
                    $n++;              
            };            
        }
        echo json_encode($output);
    }	
	function pagination_search_parent()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->pay->count_all_parent();
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
			'payments_pagination_link' => $this->pagination->create_links(),
			'payments_table'	  => $this->pay->fetch_details_search_parent($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->pay->count_all();
		$config['per_page'] = 15;
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
			'payments_pagination_link' => $this->pagination->create_links(),
			'payments_table'	  => $this->pay->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->pay->count_all_search();
		$config['per_page'] = 15;
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
			'payments_pagination_link' => $this->pagination->create_links(),
			'payments_table'	  => $this->pay->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function addpayments()
	{
		
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("date_action_add", "Date", 'required');
		$this->form_validation->set_rules("student_ID_add", "Student Name", 'required');
		$this->form_validation->set_rules("amount_add", "Amount", 'required');
		$this->form_validation->set_rules("reason_add", "For", 'required');
		$this->form_validation->set_rules("receipt_no_add", "Receipt No.", 'required');

		
		// go to admin model and execute the method and get result true or false
		if ($this->form_validation->run() == true)
		{
			$result = $this->pay->addpayments();
			$msg['success'] = false;
			if ($result) {
				$msg['success']= true;
			}
			echo json_encode($msg);
		}
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);	
		}	
	}	
	function deletepayment()
	{
		$result = $this->pay->deletepayment();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}	
	function updatepayment()
	{
		
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("date_action_update", "Date", 'required');
		$this->form_validation->set_rules("amount_update", "Amount", 'required');
		$this->form_validation->set_rules("reason_update", "For", 'required');
		$this->form_validation->set_rules("receipt_no_update", "Receipt No.", 'required');

		
		// go to admin model and execute the method and get result true or false
		if ($this->form_validation->run() == true)
		{
			$result = $this->pay->updatepayment();
			$msg['success'] = false;
			if ($result) {
				$msg['success']= true;
			}
			echo json_encode($msg);
		}
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);	
		}	
	}	
	function getdatabyid()
	{
		$result = $this->pay->getdatabyid();
		echo json_encode($result);
	}		
}
 ?>