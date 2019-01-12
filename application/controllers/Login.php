<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Login controller
*/

class Login extends CI_controller
{
	
	function __construct(){
		parent :: __construct();
		// load login model
		$this->load->model('Login_model');
	}

	function index()
	{
		// check session
		if ($this->session->userdata('logged_in')==True) {
			//$this->session->sess_destroy();
			if ($this->session->userdata('role')=='Administrative') 
			{
				$this->load->view('index');
			}
			elseif ($this->session->userdata('role')=='Teacher')
			{
				$this->load->view('index_teacher_view');
			}
			elseif ($this->session->userdata('role')=='Student')
			{
				$this->load->view('index_student_view');
			}
			elseif ($this->session->userdata('role')=='Parent')
			{
				$this->load->view('index_parent_view');
			}
		}
		else
		{
			// check submit post
			if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) 
			{
				// load login model
				$this->load->model('Login_model');
				// load validation library
				$this->load->library('form_validation');
				// form validation
				$this->form_validation->set_rules("username", "", 'required');
				$this->form_validation->set_rules("password", "", 'required');
				$this->form_validation->set_rules("role", "", 'required');
				if ($this->form_validation->run() != true) 
				{
					redirect('Page/empty'); 
				}

				// recieve input post
				//---------------------
				if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role']))
				{
					// exist post usernme and pssword
					$username = filter_var($this->input->post('username'),FILTER_SANITIZE_STRING);
					// don't forget to use md5 for encrypt
					$password = filter_var($this->input->post('password'),FILTER_SANITIZE_STRING);
					$role = $this->input->post('role');
					// administrator
					if ($this->input->post('role')=='Administrative') {
						//log in administrator users
						if ($this->Login_model->checkUsername_administrator($username,$password,$role)) 
						{
							$myData['records']=$this->Login_model->checkUsername_administrator($username,$password,$role);
							// create session
							foreach ($myData['records'] as $row) {
								// insert in login details
								// $this->Login_model->addlogin($row->id_admin);
								// load mail model
								$this->load->model('Mail_model','mail');
								$photo='';
								if ($row->photo == '')
								{
									if ($row->gender=='Male') 
									{
										$photo='avatar.png';
										echo '
											<script type="text/javascript">
											    alert("Please update your photo profile;");
											</script>
										';
									}
									else
									{
										$photo='avatar3.png';
									}
									
								}
								else
								{
									$photo=$row->photo;
								}
								$userData = array(
								'id_admin'=> $row->id_admin,
								'fullName'=>  $row->fullName,
								'role'=>  $row->role,
								'department'=>  $row->department,
								'fp'=>  $row->fp,
								'job'=>  $row->job,
								'mobile'=>  $row->mobile,
								'username'=> $row->username,
								'status'=> $row->status,
								'photo'=> $photo,
								'logged_in'=>TRUE,
								'last_login_timestamp' => time(),
								'accounts' => $row->accounts,
								'homework' => $row->homework,
								'agenda' => $row->agenda,
								'sheets' => $row->sheets,
								'exam' => $row->exam,
								'attendance' => $row->attendance,
								'transportation' => $row->transportation,
								'marks' => $row->marks,
								'timetable' => $row->timetable,
								'calendar' => $row->calendar,
								'uniform' => $row->uniform,
								'supplies' => $row->supplies,
								'payments' => $row->payments,
								'mail' => $row->mail,
								'loginlevel' => $row->loginlevel
								);
							}
							
							$userData['login_details_id'] = $this->Login_model->lastInsertId();

							$this->session->set_userdata($userData);
							
							// if account is diabled
							if ($this->session->userdata('status')=='Disable'){
									$this->session->sess_destroy();
									
									redirect('Page/disable');
								}
							$this->load->view('index');
						}
						else{
							// in case falied login
							redirect('Page/fail'); 
						}
					}
					// student
					elseif ($this->input->post('role')=='Student'){
						//log in student users
						if ($this->Login_model->checkUsername_student($username,$password,$role)) 
						{
							$myData['records']=$this->Login_model->checkUsername_student($username,$password,$role);
							// create session
							foreach ($myData['records'] as $row) {
								$userData = array(
								'stuID'=> $row->stuID,
								'englishName'		=> $row->englishName,
								'studentID'			=> $row->studentID,
								'divisionID'		=> $row->divisionID,
								'gradeID'			=> $row->gradeID,
								'roomID'			=> $row->roomID,
								'fatherIDcard'		=> $row->fatherIDcard,
								'username'			=> $row->username,
								'student_status'	=> $row->student_status,
								'status'			=> $row->status,
								'logged_in'			=>TRUE,
								'last_login_timestamp' => time(),
								'role'				=>'Student'
								);
							}
							$this->session->set_userdata($userData);
							// if account is diabled
							if ($this->session->userdata('status')=='Disable'){
									$this->session->sess_destroy();
									redirect('Page/disable'); 
								}

							$this->load->view('index_student_view');
						}
						else{
							// in case falied login
							redirect('Page/fail'); 
						}
					}
					// teacher
					elseif ($this->input->post('role')=='Teacher'){
						//log in teacher users
						if ($this->Login_model->checkUsername_administrator($username,$password,$role)) 
						{
							$myData['records']=$this->Login_model->checkUsername_teacher($username,$password,$role);
							// create session
							foreach ($myData['records'] as $row) {
								// insert in login details
								// $this->Login_model->addlogin($row->id_admin);
								// load mail model
								$this->load->model('Mail_model','mail');
								$photo='';
								if ($row->photo == '')
								{
									if ($row->gender=='Male') 
									{
										$photo='avatar.png';
										echo '
											<script type="text/javascript">
											    alert("Please update your photo profile;");
											</script>
										';										
									}
									else
									{
										$photo='avatar3.png';
									}
								}
								else
								{
									$photo=$row->photo;
								}
								
								$userData = array(
								'id_admin'=> $row->id_admin,
								'fullName'=>  $row->fullName,
								'role'=>  $row->role,
								'department'=>  $row->department,
								'fp'=>  $row->fp,
								'job'=>  $row->job,
								'mobile'=>  $row->mobile,
								'username'=> $row->username,
								'status'=> $row->status,
								'photo'=> $photo,
								'logged_in'=>TRUE,
								'last_login_timestamp' => time(),
								'loginlevel' => $row->loginlevel
								);
							}
							
							$userData['login_details_id'] = $this->Login_model->lastInsertId();

							$this->session->set_userdata($userData);
							
							// if account is diabled
							if ($this->session->userdata('status')=='Disable'){
									$this->session->sess_destroy();
									
									redirect('Page/disable');
								}
							$this->load->view('index_teacher_view');
						}
						else{
							// in case falied login
							redirect('Page/fail'); 
						}
					}
					// parent
					elseif ($this->input->post('role')=='Parent'){
						//log in teacher users
						if ($this->Login_model->checkUsername_administrator($username,$password,$role)) 
						{
							$myData['records']=$this->Login_model->checkUsername_administrator($username,$password,$role);
							// create session
							foreach ($myData['records'] as $row) {
								// insert in login details
								// $this->Login_model->addlogin($row->id_admin);
								// load mail model
								$this->load->model('Mail_model','mail');
								$photo='';
								if ($row->photo == '')
								{
									if ($row->gender=='Male') 
									{
										$photo='avatar.png';
										echo '
											<script type="text/javascript">
											    alert("Please update your photo profile;");
											</script>
										';										
									}
									else
									{
										$photo='avatar3.png';
									}
								}
								else
								{
									$photo=$row->photo;
								}
								
								$userData = array(
								'id_admin'=> $row->id_admin,
								'fullName'=>  $row->fullName,
								'role'=>  $row->role,
								'department'=>  $row->department,
								'fp'=>  $row->fp,
								'job'=>  $row->job,
								'mobile'=>  $row->mobile,
								'username'=> $row->username,
								'status'=> $row->status,
								'idCard'=>$row->idCard,
								'photo'=> $photo,
								'logged_in'=>TRUE,
								'last_login_timestamp' => time(),
								'loginlevel' => $row->loginlevel
								);
							}
							$userData['login_details_id'] = $this->Login_model->lastInsertId();
							$this->session->set_userdata($userData);
							
							// if account is diabled
							if ($this->session->userdata('status')=='Disable'){
									$this->session->sess_destroy();
									
									redirect('Page/disable');
								}
							$this->load->view('index_parent_view');
						}
						else{
							// in case falied login
							redirect('Page/fail'); 
						} 
					}
				}				
				
			}
			else
			{
				redirect('Page'); 
			}
		}
	}

	function loadusers()
	{
		$data['page']=$this->load->view('general_pages/allusers_view',NULL,TRUE);
		echo json_encode($data);
	}	

	function pagination_allusers()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->Login_model->count_all_users();
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
			'allusers_table'	  => $this->Login_model->fetch_users($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	// update last activity
	function updatelastactivity()
	{
		$this->load->model('Login_model');
		$result = $this->Login_model->updatelastactivity();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);		
	}

}
 ?>