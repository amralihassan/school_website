<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Administrator controller
*/
class Administrator extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Administrator_model','admin');
		$this->load->model('Mail_model','mail');
	}
	function index()
	{
		$data['pagetitle'] = 'Administrator | Dashboard';
		$data['page']=$this->load->view('dashboards/dashboard_admin_view',NULL,TRUE);
		echo json_encode($data);
	}
	function load_notification()
	{
		if ('Parent' == $_SESSION['role'])
		{
			$data['pagetitle'] = 'MEIS | Dashboard';	
		}
		else
		{
			$data['pagetitle'] = 'Posts';
		}
		
		$data['page']=$this->load->view('posts/notification_admin_view',NULL,TRUE);
		echo json_encode($data);		
	}
	function load_update_page()
	{
		$data['pagetitle'] = 'Update User';
		$data['page']=$this->load->view('administrator_pages/update_admin_page_view',NULL,TRUE);
		echo json_encode($data);			
	}
	function loadadministrators()
	{
		$data['pagetitle'] = 'Users';
		$data['page']=$this->load->view('administrator_pages/administrators_view',NULL,TRUE);
		echo json_encode($data);
	}
	function load_administrator_information()
	{
		$data['pagetitle'] = 'User Profile';
		$data['page'] = $this->load->view('administrator_pages/userinformation_view',NULL,TRUE);
		echo json_encode($data);
	}
	function update_photo()
	{
		//upload configuration
		$config = array(
			'upload_path' => 'public/dist/img/',
			'allowed_types' => 'gif|jpg|png|jpeg',
			'max_siza' => 512,
			'max_filename' => 0,
			'detect_mime' => true,
			'encrypt_name' => false
			);
		$this->load->library('upload',$config);

		if ($this->upload->do_upload('file_name'))
		{
			$result = $this->admin->update_photo();
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
	function get_total_rows()
	{
		$this->load->model('Sheet_model','she'); // load sheet model
		$this->load->model('Student_model','stu'); // load student model
		$this->load->model('Mail_model','mail'); // load student model

		$data['total_admin_rows'] = $this->admin->count_all_admin();
		$data['total_teachers_rows'] = $this->admin->count_all_teachers();
		$data['total_parents_rows'] = $this->admin->count_all_parents();	
		$data['total_student_rows'] = $this->stu->count_all();
		$data['total_messages_rows'] = $this->mail->get_total_msg();
		
		echo json_encode($data);	
	}
    function retrive_all_users()
    {
        $users = $this->admin->retrive_all_users();
        $output = "";
        $n=1;     
        if (count($users)>0) // fill select box
        {
            foreach ($users as $row) {
				$login_level_update ='';
				$login_level_delete ='';
				if ( 'Super Administrator' == $_SESSION['loginlevel']) 
				{
					$login_level_update ='update_admin';
					$login_level_delete ='delete_admin';
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
                        <td>'.$n.'</td>  
                        <td>'.$row->fullName.'</td>                    
						<td>'.$row->role.'</td>
						<td>'.$row->mobile.'</td>
						<td>'.$row->username.'</td>
						<td>'.$row->status.'</td>
						<td><a href="#" class="fa fa-lock btn btn-info btn-xs" onclick="changeAdminpassword('.$row->id_admin.')"></a></td>
						<td><a href="#" class="fa fa-edit btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->id_admin.')"></a></td>
						<td><a href="#" class="fa fa-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->id_admin.')"></a></td>

					</tr>
					';  
                    $n++;              
            };            
        }
        echo json_encode($output);
    }	

	function pagination_last_messages()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->admin->count_all();
		$config['per_page'] = 5;
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
			'administrator_pagination_link' => $this->pagination->create_links(),
			'last_messages'	  => $this->mail->fetch_read_last_messages($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function updatepassword()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("password", "New Password", 'required');
		$this->form_validation->set_rules("passwordc", "Confirm Password", 'required|matches[password]');

		if ($this->form_validation->run() == true) 
		{
			$id = $_SESSION['id_admin'];
			$result = $this->admin->updatepassword($id);
			$data['success'] = false;
			if ($result) {
				$data['success'] = true;
			}
			echo json_encode($data);			
		}
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);			
		}
	}
	function updateadminpassword()
	{
		$this->load->library('form_validation');
		// form validation

		$this->form_validation->set_rules("password", "New password", 'required');
		$this->form_validation->set_rules("passconfc", "New password", 'required');
		$this->form_validation->set_rules("passconfc", "Confirm Password", 'required|matches[password]');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->admin->updateadminpassword();
			$data['success'] = false;
			if ($result) {
				$data['success'] = true;
			}
			echo json_encode($data);
		}
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);
		}		
	}
	function changepassword()
	{
		//load page content
		$data['pagetitle'] = 'Change Password';
		$data['page'] = $this->load->view('administrator_pages/changepassword_view',NULL,TRUE);
		echo json_encode($data);
	}
	function addAdmin()
	{	
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("fullName_add", "Full Name", 'required');
		$this->form_validation->set_rules("role_add", "Role", 'required');
		$this->form_validation->set_rules("idcard_add", "ID Card", 'required');
		$this->form_validation->set_rules("job_add", "Job", 'required');
		$this->form_validation->set_rules("mobile_add", "Mobile", 'required');
		$this->form_validation->set_rules("username_add", "Username", 'required');
		$this->form_validation->set_rules("password_add", "Password", 'required');
		$this->form_validation->set_rules("passconf", "Password Confirmation", 'required|matches[password_add]');
		$this->form_validation->set_rules("status_add", "Status", 'required');

		if ($this->form_validation->run() == true) 
		{
			// go to admin model and execute the method and get result true or false
			$result = $this->admin->addAdmin();
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
	function deleteadministrator()
	{
		$result = $this->admin->deleteadministrator();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function getdatabyid()
	{
		$result = $this->admin->getdatabyid();
		echo json_encode($result);
	}
	function updateadministrator()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("fullName_update", "Full Name", 'required');
		$this->form_validation->set_rules("idcard_update", "ID Card", 'required');
		$this->form_validation->set_rules("job_update", "Job", 'required');
		$this->form_validation->set_rules("mobile_update", "Mobile", 'required');
		$this->form_validation->set_rules("username_update", "Username", 'required');
		$this->form_validation->set_rules("status_update", "Status", 'required');

		if ($this->form_validation->run() == true)
		{
			$result = $this->admin->updateadministrator();
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
	function retrive_users_mail()
	{
		$names = $this->admin->retrive_users_mail();
		// parents
		if (count($names)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Send To:</option>' ;
			foreach ($names as $parent) {
				$pro_select_box .= '<option value="'. $parent->id_admin .'">'.$parent->fullName.'__['.$parent->job.']</option>' ;
			}
			echo json_encode($pro_select_box);
		}		
	}
	function retrive_users_mail_return_roomID()
	{
		$names = $this->admin->retrive_users_mail_teachers();
		// parents
		if (count($names)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Send To:</option>' ;
			foreach ($names as $parent) {
				$pro_select_box .= '<option value="'. $parent->roomID .'">'.$parent->fullName.'__['.$parent->job.']</option>' ;
			}
			echo json_encode($pro_select_box);
		}		
	}	
	
	function retrive_users()
	{
		$names = $this->admin->retrive_users();
		// parents
		if (count($names)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Join:</option>' ;
			foreach ($names as $parent) {
				$pro_select_box .= '<option value="'. $parent->id_admin .'">'.$parent->fullName.'__['.$parent->job.']</option>' ;
			}
			echo json_encode($pro_select_box);
		}		
	}	
	function retrive_users_mail_teachers()
	{
		$names = $this->admin->retrive_users_mail_teachers();
		// parents
		if (count($names)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Send To:</option>' ;
			foreach ($names as $parent) {
				$pro_select_box .= '<option value="'. $parent->teacherID .'">'.$parent->fullName.'__['.$parent->subjectName.']</option>' ;
			}
			echo json_encode($pro_select_box);
		}		
	}	
	function retrive_class_parents()
	{
		$names = $this->admin->retrive_class_parents();
		// parents
		if (count($names)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Send To:</option>' ;
			foreach ($names as $parent) {
				$pro_select_box .= '<option value="'. $parent->id_admin .'">'.$parent->fullName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}		
	}	
	function retriveadministrative()
	{
		$names = $this->admin->retriveadministrative();
		// administrative
		if (count($names)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Administrative Name</option>' ;
			foreach ($names as $admini) {
				$pro_select_box .= '<option value="'. $admini->id_admin .'">'.$admini->fullName.' ['.$admini->department.']</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
}
 ?>