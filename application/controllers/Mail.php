<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Mail controller
*/
class Mail extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Mail_model','mail');
	}
	function get_total_msg()
	{
		$data['num_msg'] = $this->mail->get_total_msg();
		echo json_encode($data);		
	}
	function play_sound()
	{
		if ($_SESSION['total_messages'] != $this->mail->get_total_msg())
		{
			$data['play_sound'] = "<embed name='sound_file' src='/assets/music/sound_file.mp3' loop='true' hidden='true' autostart='true')";
		}
		
		echo json_encode($data);		
	}
	// =================================================================================
	// LOAD PAGES
	function load_inbox()
	{
		$data['pagetitle'] = 'Mailbox';
		$data['page']=$this->load->view('mail/mailbox_view',NULL,TRUE);
		echo json_encode($data);
	}
	function load_mail()
	{
		if ($_GET['id'])
		{
			$data['mailID'] = $_GET['id'];
			$data['pagetitle'] = 'Mailbox';
			$data['page']=$this->load->view('mail/readmail_view',NULL,TRUE);
			echo json_encode($data);
		}
	}
	function load_website_messages()
	{
		$data['pagetitle'] = 'Website Messages';
		$data['page']=$this->load->view('mail/website_message_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function load_sent_mail()
	{
		if ($_GET['id'])
		{
			$data['mailID'] = $_GET['id'];
			$data['pagetitle'] = 'Sent';
			$data['page']=$this->load->view('mail/read_sent_mail_view',NULL,TRUE);
			echo json_encode($data);
		}
	}	
	function load_trash()
	{
		$data['pagetitle'] = 'Trash';
		$data['page']=$this->load->view('mail/trash_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function load_sent()
	{
		$data['pagetitle'] = 'Sent';
		$data['page']=$this->load->view('mail/sentbox_view',NULL,TRUE);
		echo json_encode($data);
	}			
	function load_compose()
	{
		$data['pagetitle'] = 'Compose';
		if ("Parent" == $_SESSION['role'])
		{
			$data['page']=$this->load->view('mail/compose_parent_view',NULL,TRUE);			
		}
		else
		{
			$data['page']=$this->load->view('mail/compose_view',NULL,TRUE);			
		}
		
		echo json_encode($data);
	}	
	// =================================================================================	
	// SEND MESSAGE
	function sendMessage()
	{
		// validation
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("reciver_add", "Parent Name", 'required');
		$this->form_validation->set_rules("subject_add", "Subject", 'required');
		$this->form_validation->set_rules("bodyMessage_add", "Message", 'required');
		
		if ($this->form_validation->run() == true)
		{
			//upload configuration
			$config = array(
				'upload_path' => 'public/upload/mail_attachment/',
				'allowed_types' => 'pdf|doc|docx|gif|jpg|png|jpeg|xls|xlsx',
				'max_siza' => 5120,
				'max_filename' => 0,
				'detect_mime' => true,
				'encrypt_name' => false
				);
			$this->load->library('upload',$config);	
			if ($this->upload->do_upload('file_name'))
				{
					$result = $this->mail->sendMessage();
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
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);	
		}
	}
	function sendMessage_no_attachement()
	{
		// validation

		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("reciver_add", "Parent Name", 'required');
		$this->form_validation->set_rules("subject_add", "Subject", 'required');
		$this->form_validation->set_rules("bodyMessage_add", "Message", 'required');

		// go to admin model and execute the method and get result true or false
		if ($this->form_validation->run() == true)
		{
			$result = $this->mail->sendMessage_no_attachement();
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
	function readMessage()
	{
		$result = $this->mail->readMessage();
		$msg['success'] = false;
		if ($result) {
			$msg['success']= true;
		}
		echo json_encode($msg);		
	}
	// =================================================================================	
	// PAGINATION
	function pagination_inbox()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->mail->count_all_inbox();
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
			'inbox_pagination_link' => $this->pagination->create_links(),
			'inbox_table'	  => $this->mail->fetch_details_inbox($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_search_inbox()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->mail->count_all_search_inbox();
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
			'inbox_pagination_link' => $this->pagination->create_links(),
			'inbox_table'	  => $this->mail->fetch_details_search_inbox($config['per_page'],$start)
		);
		echo json_encode($output);		
	}			
	function pagination_sent()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->mail->count_all_sent();
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
			'sent_pagination_link' => $this->pagination->create_links(),
			'sent_table'	  => $this->mail->fetch_details_sent($config['per_page'],$start)
		);
		echo json_encode($output);
	}		
	function pagination_trash()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->mail->count_all_trash();
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
			'trash_pagination_link' => $this->pagination->create_links(),
			'trash_table'	  => $this->mail->fetch_details_trash($config['per_page'],$start)
		);
		echo json_encode($output);
	}		
	function pagination_search_trash()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->mail->count_all_search_inbox();
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
			'trash_pagination_link' => $this->pagination->create_links(),
			'trash_table'	  => $this->mail->fetch_details_search_trash($config['per_page'],$start)
		);
		echo json_encode($output);		
	}	
	function pagination_read_message()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = 1;
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
			'xxx' => $this->pagination->create_links(),
			'read_inbox_table'	  => $this->mail->fetch_details_message($config['per_page'],$start)
		);
		echo json_encode($output);		
	}	
	function pagination_sent_message()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = 1;
		$config['per_page'] = 1;
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
			'read_inbox_pagination_table' => $this->pagination->create_links(),
			'read_inbox_table'	  => $this->mail->fetch_details_sent_message($config['per_page'],$start)
		);
		echo json_encode($output);		
	}
	// =================================================================================
	// MOVE TO TRASH
	function move_to_trash()
	{
		$result = $this->mail->move_to_trash();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}	
	function move_from_inbox_to_trash()
	{
		if ($_POST['mailID'])
		{
			foreach ($_POST['mailID'] as $mailID) {
				$result = $this->mail->move_from_inbox_to_trash($mailID);
			}
			$msg['success']=false;
			if ($result) {
				$msg['success']=true;
			}
			echo json_encode($msg);	
		}			
	}	
	function move_more_one_msg_to_inbox()
	{
		if ($_POST['mailID'])
		{
			foreach ($_POST['mailID'] as $mailID) {
				$result = $this->mail->move_more_one_msg_to_inbox($mailID);
			}
			$msg['success']=false;
			if ($result) {
				$msg['success']=true;
			}
			echo json_encode($msg);	
		}			
	}	
	// =================================================================================
	function pagination_msgs()
	{
		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->mail->count_all_inbox();
		$config['per_page'] = 10;
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
			'inbox_pagination_link' => $this->pagination->create_links(),
			'inbox_table'	  => $this->mail->fetch_details_unread($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function getdatabyid()
	{
		$result = $this->mail->getdatabyid();
		echo json_encode($result);
	}
	function load_parent_inbox()
	{
		$data['pagetitle'] = 'Mailbox';
		$data['page']=$this->load->view('mail/inbox_parent_view',NULL,TRUE);
		echo json_encode($data);		
	}
	
	function load_parent_sent()
	{
		$data['pagetitle'] = 'Inbox';
		$data['page']=$this->load->view('mail/sent_parent_view',NULL,TRUE);
		echo json_encode($data);
	}		
	function pagination_outbox()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->mail->count_all_outbox();
		$config['per_page'] = 10000;
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
			'outbox_pagination_link' => $this->pagination->create_links(),
			'outbox_table'	  => $this->mail->fetch_details_outbox($config['per_page'],$start)
		);
		echo json_encode($output);
	}		
		
	function pagination_search_outbox()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->mail->count_all_search_outbox();
		$config['per_page'] = 10000;
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
			'outbox_pagination_link' => $this->pagination->create_links(),
			'outbox_table'	  => $this->mail->fetch_details_search_outbox($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
		
}
 ?>