<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Login_model model
*/
class Login_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function checkUsername_administrator($username,$password,$role)
	{
		$encrypt_password = $this->db->select('*')->from('administrator')->where(array('username' =>$username,'role'=>$role))->limit(1)->get()->row('password');

		if (password_verify($password,$encrypt_password))
		{
			// Administrator users
			$query = $this->db->get_where('administrator',array('username' =>$username,'role'=>$role));
	    	return $query->result();
	    	if ($query->num_rows > 0) {
				return $query->result();	
			}
			else
			{
				return false;
			}
		}
	}
	function checkUsername_teacher($username,$password,$role)
	{
		$encrypt_password = $this->db->select('*')->from('administrator')->where(array('username' =>$username,'role'=>$role))->limit(1)->get()->row('password');

		if (password_verify($password,$encrypt_password))
		{
			// Administrator users
			$query = $this->db->get_where('administrator',array('username' =>$username,'role'=>$role));
	    	return $query->result();
	    	if ($query->num_rows > 0) {
				return $query->result();	
			}
			else
			{
				return false;
			}
		}
	}	
	function checkUsername_student($username,$password,$role)
	{
		$encrypt_password = $this->db->select('*')->from('student_parent')->where(array('username' =>$username))->limit(1)->get()->row('password');
		if (password_verify($password,$encrypt_password)) 
		{
			// stundet users
			$query = $this->db->get_where('student_parent',array('username' =>$username));
	    	return $query->result();
	    	if ($query->num_rows > 0) {
				return $query->result();	
			}
			else
			{
				return false;
			}
		}
	}


	function count_all_users()
	{
		// get number of rows
		$query = $this->db->get('full_login_details');
		return $query->num_rows();
	}

	function fetch_users($limit,$start)
	{
		// time zone
		date_default_timezone_set("Africa/Cairo"); 
		$current_timestamp = strtotime(date('Y-m-d H:i:s') . '-30 second');
		$current_timestamp = date('Y-m-d H:i:s',$current_timestamp);
		$output = '';
		$this->db->order_by('fullName');
		$this->db->select('DISTINCT(user_id) , fullName ,last_activity, role, username,photo,gender');
		$this->db->where('last_activity >', $current_timestamp);
		$this->db->from('full_login_details');
		
		// $this->db->limit(1);
		$query = $this->db->get();
		$output .='
          <div class="box-body no-padding">
            <ul class="users-list clearfix">'
				;
				foreach ($query->result() as $row) 
				{
					$photo='';
					if ($row->photo == '')
					{
						if ($row->gender=='Male') 
						{
							$photo='avatar.png';
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
					$output .='
		              <li>		                
		                <img src="'.base_url('public/dist/img/').$photo.'" alt="User Image">
		                <a class="users-list-name" href="#">'. $row->fullName .'</a>
		                <span class="users-list-date">'. $row->role .'</span>
		              </li>';
				}
				$output.='</ul>
          </div>';
		return $output;
	}	

	// select last row
	function lastInsertId()
	{
		return $this->db->select('*')->from('login_details')->limit(1)->order_by('login_details_id','desc')->get()->row('login_details_id');
	}
	function updatelastactivity()
	{
		// time zone
		date_default_timezone_set("Africa/Cairo"); 
		$login_details_id  = $_SESSION['login_details_id'];
		
		$last_activity = date('Y-m-d H:i:s');
		$data = array(
			'last_activity'=>$last_activity
		);
		// $this->db->where('login_details_id',$login_details_id );
		$this->db->where('user_id',$_SESSION['id_admin']);
		$this->db->update('login_details',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}		
	}

}
 ?>