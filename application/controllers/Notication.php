<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Notification controller
 */
class Notication extends CI_controller
{	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Notication_model','note');
	}
	function loadnotifications()
	{
		$data['page']=$this->load->view('general_pages/notifiation_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function loadGroups()
	{
		$data['page'] = $this->load->view('posts/groups_view',NULL,TRUE);
		echo json_encode($data);
	}
	function load_joinClass()
	{
		$data['page'] = $this->load->view('posts/joinClass_view',NULL,TRUE);
		echo json_encode($data);
	}
	function load_groups_teacher()
	{
		$groups = $this->note->load_groups_teacher();
		// divisions
		if (count($groups)>0) // fill select box
		{
			$pro_select_box = "";
			// $pro_select_box .= '<option value="">Select Division</option>' ;
			foreach ($groups as $group) {
				$pro_select_box .= '<option value="'. $group->group_id .'">'.$group->group_name.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}			
	}
	function makePost()
	{
		$data['page'] = $this->load->view('posts/makePost_view',NULL,TRUE);
		echo json_encode($data);
	}
	function private_post()
	{
		$data['page'] = $this->load->view('posts/makePost_teacher_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function load_group_users()
	{
		$data['page'] = $this->load->view('posts/group_users_view',NULL,TRUE);
		echo json_encode($data);
	}
	function load_groups_data()
	{
        $groups = $this->note->load_groups_data();
        $output = "";     
        if (count($groups)>0) // fill select box
        {
            foreach ($groups as $row) {	            	
				$output .='
					<tr>
                        <td><a href="#" onclick="addUsers('.$row->group_id.');">'.$row->group_name.' | '.$row->roomName.'</a></td>                    
						<td><a href="#" class="fa fa-edit btn btn-warning btn-xs" onclick="update_group('.$row->group_id.')"></a></td>
						<td><a href="#" class="fa fa-trash btn btn-danger btn-xs" onclick="delete_group('.$row->group_id.')"></a></td>

					</tr>
					';            
            };            
        }
        echo json_encode($output);		
	}
	function load_group_users_data()
	{
        $users = $this->note->load_group_users_data();
        $output = "";     
        if (count($users)>0) // fill select box
        {
            foreach ($users as $row) {	            	
				$output .='
					<tr>
						<td>'.$row->fullName.'</td>
						<td>'.$row->mobile.'</td>
						<td>'.$row->role.'</td>                
						<td><a href="#" class="fa fa-trash btn btn-danger btn-xs" onclick="delete_user('.$row->id.','.$row->group_id.')"></a></td>

					</tr>
					';            
            };            
        }
        echo json_encode($output);			
	}
	function load_group_name()
	{
		$result = $this->note->load_group_name();
		echo json_encode($result);	
	}
	function addGroup()
	{
		$result = $this->note->addGroup();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);			
	}
	function addUser()
	{
		$result = $this->note->addUser();
		$msg['status']=2;
		if ($result==1) {
			$msg['status']=1;
		}
		elseif ($result == 0)
		{
			$msg['status']=0;
		}

		echo json_encode($msg);			
	}
	function updateGroup()
	{
		$result = $this->note->updateGroup();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);			
	}
	function deleteGroup()
	{
		$result = $this->note->deleteGroup();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);				
	}
	function deleteUser()
	{
		$result = $this->note->deleteUser();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);				
	}	
	function pagination_notifications()
	{		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->note->count_all_notification();
		$config['per_page'] = 30;
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
			'agendaview_pagination_link' => $this->pagination->create_links(),
			'notificationview_table'	  => $this->note->fetch_details_notification($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_notifications_parent()
	{		
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->note->count_all_notification();
		$config['per_page'] = 30;
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
			'notificationview_table'	  => $this->note->fetch_details_notification_parent($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_notifications_class()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->note->count_all_notification();
		$config['per_page'] = 30;
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
			'notificationview_table'	  => $this->note->fetch_details_notification_class($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function getdatabyid()
	{
		$result = $this->note->getdatabyid();
		echo json_encode($result);		
	}	
	function getdatabyid_groups()
	{
		$result = $this->note->getdatabyid_groups();
		echo json_encode($result);		
	}	
	function new_post()
	{
		$result = $this->note->new_post();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);		
	}
	function update_post()
	{
		$result = $this->note->update_post();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);		
	}	
	function new_post_image()
	{
		//upload configuration
		$config = array(
			'upload_path' => 'public/dist/img/',
			'allowed_types' => 'gif|jpg|png|jpeg',
			'max_siza' => 1024000,
			'max_filename' => 0,
			'detect_mime' => true,
			'encrypt_name' => false
			);
		$this->load->library('upload',$config);	
		if ($this->upload->do_upload('file_name'))
			{
				$result = $this->note->new_post_image();
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
	function delete_post()
	{
		$result = $this->note->delete_post();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);		
	}	
	function retrivedivision_private()
	{
		$this->load->model('Division_model');
		$divisions = $this->Division_model->retrivedivision_private();
		// divisions
		if (count($divisions)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Division</option>' ;
			foreach ($divisions as $division) {
				$pro_select_box .= '<option value="'. $division->divisionID .'">'.$division->divisionName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function load_groups()
	{
		$groups = $this->note->load_groups();
		// divisions
		if (count($groups)>0) // fill select box
		{
			$pro_select_box = "";
			// $pro_select_box .= '<option value="">Select Division</option>' ;
			foreach ($groups as $group) {
				$pro_select_box .= '<option value="'. $group->group_id .'">'.$group->group_name.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}		
	}
	function retrivegrade_private()
	{
		$this->load->model('Grade_model');
		$grades = $this->Grade_model->retrivegrade_private();
		// grades
		if (count($grades)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Grade</option>' ;
			foreach ($grades as $grade) {
				$pro_select_box .= '<option value="'. $grade->gradeID .'">'.$grade->gradeName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
}

 ?>