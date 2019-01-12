<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Administrator_model model
*/
class Administrator_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('administrator');
		return $query->num_rows();
	}	
	function retrive_all_users()
	{
		$query = $this->db->get('administrator');
		return $query->result();
	}	
	function update_photo()
	{	
		if (isset($this->upload->file_name)) 
		{
			$id = $_SESSION['id_admin'];
		 	$data = array
			(	'photo' => $this->upload->file_name
			);
			// get photo name bu id_admin
			$photo_name = $this->db->select('*')->from('administrator')->where(array('id_admin' =>$id))->limit(1)->get()->row('photo');
			if ($photo_name != '')
			{
				unlink("public/dist/img/". $photo_name);
			}
			
			// update photo session value
			$this->session->set_userdata('photo', $this->upload->file_name);
		 	$this->db->where('id_admin',$id);
		 	$this->db->update('administrator',$data);
		 	if ($this->db->affected_rows() > 0) {
		 		return true;
		 	}else{
		 		return false;
			}	
		}
	}	
	function count_all_admin()
	{
		// get number of rows
		$this->db->where('role','Administrative');
		$query = $this->db->get('administrator');
		return $query->num_rows();
	}
	function count_all_teachers()
	{
		// get number of rows
		$this->db->where('role','Teacher');
		$query = $this->db->get('administrator');
		return $query->num_rows();
	}
	function count_all_parents()
	{
		// get number of rows
		$this->db->where('role','Parent');
		$query = $this->db->get('administrator');
		return $query->num_rows();
	}				
	function retrive_class_parents()
	{
		if ($_GET['roomID'])
		{
			$roomID = filter_var($this->input->get('roomID'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->select("DISTINCT(fullName),id_admin,roomID");
			$this->db->where('roomID',$roomID);
			$this->db->from('student_parent');
			$query = $this->db->get();			
			return $query->result();
		}
		
	}
	function retriveadministrative()
	{
		$this->db->where('no_msg','Yes');
		$this->db->where('role','Administrative');			
		$query = $this->db->get('administrator');
		return $query->result();
	}
	function retrive_users()
	{
		$query = $this->db->get('administrator');
		return $query->result();		
	}	
	function retrive_users_mail()
	{
		if ('Administrative' != $_SESSION['role'])
		{
			$this->db->where('no_msg','Yes');
			$this->db->where('role','Administrative');				
		}
		else
		{
			$this->db->where('no_msg','Yes');
		}

		$this->db->where('id_admin <>',$_SESSION['id_admin']);
		$query = $this->db->get('administrator');
		return $query->result();		
	}		
	function retrive_users_mail_teachers()
	{
		if ($_GET['roomID'])
		{
			$this->db->where('roomID',$_GET['roomID']);
			// $this->db->where('id_admin <>',$_SESSION['id_admin']);
			$query = $this->db->get('mail_to_teacher');
			return $query->result();				
		}	
	}		

	function retriveteacher()
	{
		$this->db->where('role','Teacher');
		$query = $this->db->get('administrator');
		return $query->result();		
	}
	function joinclass()
	{
		if (isset($_POST['teacherID']) && isset($_POST['divisionID_add']) && isset($_POST['gradeID_add']) && isset($_POST['roomID_add']) && isset($_POST['subjectID'])) 
		{
			$data = array(
				'teacherID'=>$this->input->post('teacherID'),
				'divisionID'=>$this->input->post('divisionID_add'),
				'gradeID'=>$this->input->post('gradeID_add'),
				'roomID'=>$this->input->post('roomID_add'),
				'subjectID'=>$this->input->post('subjectID')
			);
			
			$this->db->insert('teacherjobs',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}		
		}
	}	
	function getjoinclassbyid()
	{
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$query = $this->db->get('teacherjobs_full_data');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}	
	function Updatejoinclass()
	{
		if (isset($_POST['id_update']) && isset($_POST['divisionID_update']) && isset($_POST['gradeID_update']) && isset($_POST['roomID_update']) && isset($_POST['subjectID_update'])) {
			# code...
		}
		$id = filter_var($this->input->post('id_update'),FILTER_SANITIZE_NUMBER_INT);
		$data = array(
			'divisionID'=>$this->input->post('divisionID_update'),
			'gradeID'=>$this->input->post('gradeID_update'),
			'roomID'=>$this->input->post('roomID_update'),
			'subjectID'=>$this->input->post('subjectID_update')
		);
		$this->db->where('id',$id);
		$this->db->update('teacherjobs',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}	
	function fetch_details_search_joinclass($limit,$start)
	{
		if ($_GET['teacherID']) 
		{
			$teacherID = filter_var($this->input->get('teacherID'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->order_by('gradeName');
			$this->db->where('teacherID',$teacherID);
			$this->db->limit($limit,$start);
			$query = $this->db->get('teacherjobs_full_data');
			$output .='
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr>
				     	    <th>Division</th>
				     	    <th>Grade</th>
							<th>Class</th>
				   		    <th>Subject</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
			';
			foreach ($query->result() as $row) 
			{
				$login_level_update ='';
				$login_level_delete ='';
				if ( 'Super Administrator' == $_SESSION['loginlevel']) 
				{
					$login_level_update ='update_teacherjobs';
					$login_level_delete ='delete_teacherjobs';
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
						<td>'.$row->divisionName.'</td>
						<td>'.$row->gradeName.'</td>
						<td>'.$row->roomName.'</td>
						<td>'.$row->subjectName.'</td>
						<td><a href="#" class="fa fa-edit btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->id.')"></a></td>
						<td><a href="#" class="fa fa-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->id.')"></a></td>
					</tr>
				';
			}
			$output .='</table>';
			return $output;
		}
		else
		{
			$output ='<div class="alert alert-warning">No results found</div>';
			return $output;
		}
	}	
	function fetch_details_classes_teacher($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('teacherjobs_full_data');
		$this->db->where('teacherID',$_SESSION['id_admin']);
		$this->db->order_by('roomName','ASC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='
			<table class="table table-responsive table-hover table-bordered">
				<thead>
					<tr>
			     	    <th>Division</th>
			     	    <th>Grade</th>
						<th>Class</th>
			   		    <th>Subject</th>
					</tr>
				</thead>
		';
		foreach ($query->result() as $row) 
		{
			$output .='
				<tr>
					<td>'.$row->divisionName.'</td>
					<td>'.$row->gradeName.'</td>
					<td>'.$row->roomName.'</td>
					<td>'.$row->subjectName.'</td>
				</tr>
			';
		}
		$output .='</table>';
		return $output;
	}	
	function deletejoinclass()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$this->db->delete('teacherjobs');
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}
		}
	}	

	function updatepassword($id)
	{
		if (isset($_POST['password']))
		{
			$encrypt = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$data=array('password'=>$encrypt);
			$this->db->where('id_admin', filter_var($id,FILTER_SANITIZE_NUMBER_INT));
			$this->db->update('administrator',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}
	function updateadminpassword()
	{
		if (isset($_POST['id_admin']))
		{
			$encrypt = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$id=filter_var($this->input->post('id_admin'),FILTER_SANITIZE_NUMBER_INT);
			$filed=array('password'=>$encrypt);
			$this->db->where('id_admin', $id);
			$this->db->update('administrator',$filed);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}
	// insert login deatils
	function addlogin()
	{
		$id_admin = $this->lastInsertId();
		$data = array(
			'user_id'=>$id_admin
		);
		
		$this->db->insert('login_details',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else
		{
			return false;
		}
	}	
	function lastInsertId()
	{
		return $this->db->select('*')->from('administrator')->limit(1)->order_by('id_admin','desc')->get()->row('id_admin');
	}		

	function addAdmin()
	{
		if (isset($_POST['fullName_add']) && isset($_POST['role_add']) && isset($_POST['idcard_add']) && isset($_POST['username_add']) && isset($_POST['password_add']) && isset($_POST['status_add']) && isset($_POST['loginlevel_add']) && isset($_POST['mobile_add']) && isset($_POST['no_msg_add']))
		{
			$encrypt = password_hash($this->input->post('password_add'), PASSWORD_DEFAULT);
			
			$data = array(
				'fullName'=>$this->input->post('fullName_add'),
				'role'=>$this->input->post('role_add'),
				'idCard'=>$this->input->post('idcard_add'),
				'job'=>$this->input->post('job_add'),
				'fp'=>$this->input->post('fp_add'),
				'username'=>$this->input->post('username_add'),
				'password'=>$encrypt,
				'status'=>$this->input->post('status_add'),
				'accounts'=>$this->input->post('accounts_add'),
				'homework'=>$this->input->post('homework_add'),
				'agenda'=>$this->input->post('agenda_add'),
				'sheets'=>$this->input->post('sheets_add'),
				'exam'=>$this->input->post('exam_add'),
				'attendance'=>$this->input->post('attendance_add'),
				'transportation'=>$this->input->post('transportation_add'),
				'marks'=>$this->input->post('marks_add'),
				'timetable'=>$this->input->post('timetable_add'),
				'loginlevel'=>$this->input->post('loginlevel_add'),
				'mobile'=>$this->input->post('mobile_add'),
				'mail'=>$this->input->post('mail_add'),
				'no_msg'=>$this->input->post('no_msg_add'),
				'department'=>$this->input->post('department_add'),
				'calendar'=>$this->input->post('calendar_add'),
				'uniform'=>$this->input->post('uniform_add'),
				'supplies'=>$this->input->post('supplies_add'),
				'payments'=>$this->input->post('payments_add'),
				'gender'=>$this->input->post('gender_add')
			);
			
			$this->db->insert('administrator',$data);
			if ($this->db->affected_rows() > 0) {
				$this->addlogin();
				return true;
			}else
			{
				return false;
			}
		}
	}
	function deleteadministrator()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id_admin',$id);
			$this->db->delete('administrator');
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}
		}
	}
	function getdatabyid()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id_admin',$id);
			$query = $this->db->get('administrator');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}
	function updateadministrator()
	{
		if (isset($_POST['id_admin'])) 
		{
			$id =filter_var($this->input->post('id_admin'),FILTER_SANITIZE_NUMBER_INT);
			if (isset($_POST['fullName_update']) && isset($_POST['role_update']) && isset($_POST['idcard_update']) && isset($_POST['username_update']) && isset($_POST['status_update']) && isset($_POST['loginlevel_update']) && isset($_POST['no_msg_update']) && isset($_POST['mobile_update']))
			{
				$data = array(
					'fullName'=>$this->input->post('fullName_update'),
					'role'=>$this->input->post('role_update'),
					'idCard'=>$this->input->post('idcard_update'),
					'fp'=>$this->input->post('fp_update'),
					'job'=>$this->input->post('job_update'),
					'username'=>$this->input->post('username_update'),
					'status'=>$this->input->post('status_update'),
					'accounts'=>$this->input->post('accounts_update'),
					'homework'=>$this->input->post('homework_update'),
					'agenda'=>$this->input->post('agenda_update'),
					'sheets'=>$this->input->post('sheet_update'),
					'exam'=>$this->input->post('exam_update'),
					'attendance'=>$this->input->post('attendance_update'),
					'transportation'=>$this->input->post('transportation_update'),
					'marks'=>$this->input->post('marks_update'),
					'timetable'=>$this->input->post('timetable_update'),
					'loginlevel'=>$this->input->post('loginlevel_update'),
					'mobile'=>$this->input->post('mobile_update'),
					'mail'=>$this->input->post('mail_update'),
					'no_msg'=>$this->input->post('no_msg_update'),
					'department'=>$this->input->post('department_update'),
					'calendar'=>$this->input->post('calendar_update'),
					'uniform'=>$this->input->post('uniform_update'),
					'supplies'=>$this->input->post('supplies_update'),
					'payments'=>$this->input->post('payments_update'),
					'gender'=>$this->input->post('gender_update')
				);
				$this->db->where('id_admin',$id);
				$this->db->update('administrator',$data);
				if ($this->db->affected_rows() > 0) {
					return true;
				}else{
					return false;
				}
			}

		}

	}
}
 ?>