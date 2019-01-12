<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Notication_model
 */
class Notication_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function getdatabyid()
	{
		if ($_GET['id'])
		{
			$id= filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$query = $this->db->get('notication');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}	
	function getdatabyid_groups()
	{
		if ($_GET['id'])
		{
			$id= filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('group_id',$id);
			$query = $this->db->get('group_table');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}	
	function load_groups_data()
	{
		$this->db->order_by('group_name');
		$query = $this->db->get('full_group_table');
		return $query->result();
	}	
	function load_groups()
	{
		$this->db->order_by('group_name');
		$query = $this->db->get('group_table');
		return $query->result();
	}	
	function load_groups_teacher()
	{
		$this->db->where('id_admin',$_SESSION['id_admin']);
		$this->db->order_by('group_name');
		$query = $this->db->get('users_group_table_name');
		return $query->result();
	}		
	function load_group_users_data()
	{
		if ($_GET['group_id'])
		{
			$group_id = filter_var($_GET['group_id'],FILTER_SANITIZE_NUMBER_INT);
			$this->db->order_by('fullName');			
			$this->db->where('group_id',$group_id);
			$query = $this->db->get('group_users');
			return $query->result();
		}
	}	
	function count_all_notification()
	{
		// get number of rows
		$query = $this->db->get('notify_private_div_gra');
		return $query->num_rows();
	}
	function fetch_details_notification($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->where('id_admin',$_SESSION['id_admin']);		
		$this->db->from('parent_notification');
		$this->db->order_by('date_notify','DESC');
		$this->db->limit(50);
		$query = $this->db->get();
		$output .='';
		// time zone
		date_default_timezone_set("Africa/Cairo"); 
		if ($query ->num_rows()>0) {

			$share = "";
			foreach ($query->result() as $row) 
			{
				$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->date_notify);
				$months = floor($seconds / (3600*24*30));
		        $day = floor($seconds / (3600*24));
		        $hours = floor($seconds / 3600);
		        $mins = floor(($seconds - ($hours*3600)) / 60);
		        $secs = floor($seconds % 60);	
		        
				if($seconds < 60)
		            $time = $secs." seconds ago";
		        else if($seconds < 60*60 )
		            $time = $mins." min ago";
		        else if($seconds < 24*60*60)
		            $time = $hours." hours ago";
		        else if($seconds < 24*60*60*60)
		            $time = $day." day ago";
		        else
		            $time = $months." month ago";
		        $show_delete ='';
		        $show_update ='';
		        if ($_SESSION['id_admin'] == $row->userID)
		        {
		        	$show_update.= '<button  onclick="update_post('.$row->id.')" type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-edit fa-1x"></i>
									            </button>';
		        	$show_delete .= '<button onclick="delete_post('.$row->id.')" type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-trash fa-1x"></i></button>';
		        }

		        if ('Super Administrator' == $_SESSION['loginlevel'])
		        {
		        	$show_delete ='';
		        	$show_update ='';		        	
		        	$show_update.= '<button  onclick="update_post('.$row->id.')" type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-edit fa-1x"></i>
									            </button>';
		        	$show_delete .= '<button onclick="delete_post('.$row->id.')" type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-trash fa-1x"></i></button>';
		        }

				// display image
				if ($row->file_name == '')
				{
					$img = "style='display:none;'"	;
				}
				else
				{
					$img = ""	;
				}		        
				$output .='
							<div class="col-md-7">
								<!-- Box Comment -->
								      <div class="box box-widget">
								        <div class="box-header with-border">
								          <div class="user-block">
								            <img class="img-circle" src="'.base_url('public/dist/img/').$row->photo.'" alt="Photo">
								            <span class="username"><a href="#">'. $row->group_name .' | '.$row->fullName.'</a></span>
								            <span class="description"> Since '. $time.'</span>
								          </div>
								          <!-- /.user-block -->
								          <div class="box-tools">'.$show_update.' '.$show_delete.'
								            
								          </div>
								          <!-- /.box-tools -->
								        </div>
								        <!-- /.box-header -->
								        <div class="box-body">
								          <img '.$img.' class="img-responsive pad" src="'. base_url('public/dist/img/').$row->file_name.'" alt="Photo">

								          <p>'.$row->post.'</p>

								      </div>
								      <!-- /.box -->
								    </div>  
								 </div>  								
						';
			}
			
		}
		else
		{
			$output = '<div class="alert alert-warning">No posts.</div>';
		}		

		return $output;
	}
	function fetch_details_notification_parent()
	{
		$output = '';
		$this->db->select('*');
		// $this->db->where('share','Public');
		$this->db->where('id_admin',$_SESSION['id_admin']);
		$this->db->from('parent_notification');
		$this->db->order_by('date_notify','DESC');
		$this->db->limit(50);
		$query = $this->db->get();
		$output .='';
		$img="";
		// time zone
		date_default_timezone_set("Africa/Cairo"); 
		if ($query ->num_rows()>0) {
			$share = "";
			$post = "";
			foreach ($query->result() as $row) 
			{
				if ("Private" == $row->share) {

					$post='<img class="" src="'.base_url('public/dist/img/10-512.png').'" alt="">';
				}
				else
				{
					// public
					$share = 'MEIS';
					$post='<img class="" src="'.base_url('public/dist/img/images.png').'" alt="">';
				}

				// display image
				if ($row->file_name == '')
				{
					$img = "style='display:none;'"	;
				}
				else
				{
					$img = ""	;
				}
				$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->date_notify);
				$months = floor($seconds / (3600*24*30));
		        $day = floor($seconds / (3600*24));
		        $hours = floor($seconds / 3600);
		        $mins = floor(($seconds - ($hours*3600)) / 60);
		        $secs = floor($seconds % 60);	
		        
				if($seconds < 60)
		            $time = $secs." seconds ago";
		        else if($seconds < 60*60 )
		            $time = $mins." min ago";
		        else if($seconds < 24*60*60)
		            $time = $hours." hours ago";
		        else if($seconds < 24*60*60*60)
		            $time = $day." day ago";
		        else
		            $time = $months." month ago";

				$output .='
							<div class="col-md-7">
								<!-- Box Comment -->
								      <div class="box box-widget">
								        <div class="box-header with-border">
								          <div class="user-block">
								            '.$post.'
								            <span class="username"><a href="#">'. $row->group_name .' | '.$row->fullName.'</a></span>
								            <span class="description"> Since '. $time.'</span>
								          </div>
								        </div>
								        <!-- /.box-header -->
								        <div class="box-body">
								          <img '.$img.' class="img-responsive pad" src="'. base_url('public/dist/img/').$row->file_name.'" alt="Photo">

								          <p>'.$row->post.'</p>

								      </div>
								      <!-- /.box -->
								    </div>  
								 </div>  								
						';	            
			}
		}
		else
		{
			$output = '<div class="alert alert-warning">No posts.</div>';
		}		

		return $output;
	}
	function fetch_details_notification_class()
	{
		$output = '';
		$this->db->select('*');
		// $this->db->where('share','Public');
		$this->db->where('stuID',$_SESSION['stuID']);
		$this->db->from('student_posts');
		$this->db->order_by('date_notify','DESC');
		$this->db->limit(50);
		$query = $this->db->get();
		$output .='';
		$img="";
		// time zone
		date_default_timezone_set("Africa/Cairo"); 
		if ($query ->num_rows()>0) {
			$share = "";
			$post = "";
			foreach ($query->result() as $row) 
			{
				if ("Private" == $row->share) {

					$post='<img class="" src="'.base_url('public/dist/img/10-512.png').'" alt="">';
				}
				else
				{
					// public
					$share = 'MEIS';
					$post='<img class="" src="'.base_url('public/dist/img/images.png').'" alt="">';
				}

				// display image
				if ($row->file_name == '')
				{
					$img = "style='display:none;'"	;
				}
				else
				{
					$img = ""	;
				}
				$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->date_notify);
				$months = floor($seconds / (3600*24*30));
		        $day = floor($seconds / (3600*24));
		        $hours = floor($seconds / 3600);
		        $mins = floor(($seconds - ($hours*3600)) / 60);
		        $secs = floor($seconds % 60);	
		        
				if($seconds < 60)
		            $time = $secs." seconds ago";
		        else if($seconds < 60*60 )
		            $time = $mins." min ago";
		        else if($seconds < 24*60*60)
		            $time = $hours." hours ago";
		        else if($seconds < 24*60*60*60)
		            $time = $day." day ago";
		        else
		            $time = $months." month ago";

				$output .='
							<div class="col-md-7">
								<!-- Box Comment -->
								      <div class="box box-widget">
								        <div class="box-header with-border">
								          <div class="user-block">
								            '.$post.'
								            <span class="username"><a href="#">'. $row->group_name .' | '.$row->fullName.'</a></span>
								            <span class="description"> Since '. $time.'</span>
								          </div>
								        </div>
								        <!-- /.box-header -->
								        <div class="box-body">
								          <img '.$img.' class="img-responsive pad" src="'. base_url('public/dist/img/').$row->file_name.'" alt="Photo">

								          <p>'.$row->post.'</p>

								      </div>
								      <!-- /.box -->
								    </div>  
								 </div>  								
						';	            
			}
		}
		else
		{
			$output = '<div class="alert alert-warning">No posts.</div>';
		}		

		return $output;
	}		
	function addGroup()
	{
		if (isset($_POST['group_name']) && isset($_POST['roomID_add']))
		{
			$data = array(
				'group_name'=>$this->input->post('group_name'),
				'roomID'=>$this->input->post('roomID_add')
			);
			// insert into notifiction
			$this->db->insert('group_table',$data);	
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else
			{
				return false;
			}			
		}
	}
	function check_exist($id_admin,$group_id)
	{
		$this->db->where('id_admin',$id_admin);		
		$this->db->where('group_id',$group_id);		
		$query = $this->db->get('users_table');
		return $query->num_rows();
	}		
	function addUser()
	{
		if (isset($_POST['group_id_name']) && isset($_POST['username']))
		{
			// check username exists
			if ($this->check_exist(filter_var($this->input->post('username'),FILTER_SANITIZE_NUMBER_INT),filter_var($this->input->post('group_id_name'),FILTER_SANITIZE_NUMBER_INT)) > 0)
			{
				return 0;
			}			
			$data = array(
				'group_id'=> filter_var($this->input->post('group_id_name'),FILTER_SANITIZE_NUMBER_INT),
				'id_admin'=>filter_var($this->input->post('username'),FILTER_SANITIZE_NUMBER_INT)
			);
			// insert into notifiction
			$this->db->insert('users_table',$data);	
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else
			{
				return 2;
			}			
		}
	}	
	function updateGroup()
	{
		if (isset($_POST['group_name_update']) && isset($_POST['group_id']))
		{
			$group_id = filter_var($_POST['group_id'],FILTER_SANITIZE_NUMBER_INT);
			$data = array(
				'group_name'=>$this->input->post('group_name_update')
			);
			// insert into notifiction
			$this->db->where('group_id',$group_id);
			$this->db->update('group_table',$data);	
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else
			{
				return false;
			}			
		}
	}	
	function deleteGroup()
	{
		if ($_GET['id'])
		{
			$group_id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
		}
		$this->db->where('group_id',$group_id);
		$this->db->delete('group_table');
		if ($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function deleteUser()
	{
		if ($_GET['id'])
		{
			$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
		}
		$this->db->where('id',$id);
		$this->db->delete('users_table');
		if ($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}	
	function load_group_name()
	{
		if ($_GET['group_id'])
		{
			$group_id = filter_var($_GET['group_id'],FILTER_SANITIZE_NUMBER_INT);
			$group_name = $this->db->select('*')->from('group_table')->where(array('group_id' =>$group_id))->limit(1)->get()->row('group_name');
			return $group_name;
		}
	}
	function retrive_groupName()
	{
		$this->db->order_by('group_name');
		$query = $this->db->get('group_table');
		return $query->result();		
	}
	// public post
	function new_post()
	{
		if (isset($_POST['post_details']) &&  isset($_POST['share_add']))
		{
			$groups = '';
			if ('Private' == $_POST['share_add']) 
			{
				$groups = $this->input->post('groupName');
				foreach ($groups as $gro) 
				{

					$data = array(
						'post'=>$this->input->post('post_details'),
						'share'=>$this->input->post('share_add'),
						'userID'=>$_SESSION['id_admin'],
						'group_id'=>$gro
					);
					// insert into notifiction
					$this->db->insert('notication',$data);					
				}					
			}
			else
			{
				// load all groups
				$groups = $this->load_groups_data();
				foreach ($groups as $gro) 
				{

					$data = array(
						'post'=>$this->input->post('post_details'),
						'share'=>$this->input->post('share_add'),
						'userID'=>$_SESSION['id_admin'],
						'group_id'=>$gro->group_id
					);
					// insert into notifiction
					$this->db->insert('notication',$data);					
				}										
			}
			

			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else
			{
				return false;
			}							
		}
	}	
	function new_post_image()
	{
		if (isset($_POST['post_details']) && isset($_POST['share_add']) && isset($_POST['share_add']))
		{
			$groups = '';
			if ('Private' == $_POST['share_add']) 
			{
				$groups = $this->input->post('groupName');
				foreach ($groups as $gro) 
				{

					$data = array(
						'post'=>$this->input->post('post_details'),
						'share'=>$this->input->post('share_add'),
						'userID'=>$_SESSION['id_admin'],
						'file_name' => $this->upload->file_name,
						'group_id'=>$gro
					);
					// insert into notifiction
					$this->db->insert('notication',$data);					
				}					
			}
			else
			{
				// load all groups
				$groups = $this->load_groups_data();
				foreach ($groups as $gro) 
				{

					$data = array(
						'post'=>$this->input->post('post_details'),
						'share'=>$this->input->post('share_add'),
						'userID'=>$_SESSION['id_admin'],
						'file_name' => $this->upload->file_name,
						'group_id'=>$gro->group_id
					);
					// insert into notifiction
					$this->db->insert('notication',$data);					
				}										
			}				

			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else
			{
				return false;
			}			
		}				
	}	
	function update_post()
	{
		if (isset($_POST['id_update']) && isset($_POST['post_details_update']))
		{
			$id = filter_var($this->input->post('id_update'),FILTER_SANITIZE_NUMBER_INT);
			$data = array(
				'post'=> filter_var($this->input->post('post_details_update'),FILTER_SANITIZE_STRING)
			);
			// $this->db->where('id',$id);
			$this->db->where(array('id' => $id,'userID'=> $_SESSION['id_admin']));
			$this->db->update('notication',$data);

			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}			
		}				
	}		
	function delete_post()
	{
		if ($_GET['id'])
		{
			$id= filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			if ($_GET['img']) {
				$img=$this->input->get('img');
				unlink("public/dist/img/".$img);
			}			
			if ('Administrative' == $_SESSION['role'])
			{
				$this->db->where(array('id' => $id));
			}else
			{
				$this->db->where(array('id' => $id,'userID'=> $_SESSION['id_admin']));	
			}
			
			$this->db->delete('notication');

			
			if ($this->db->affected_rows() >0) {
				$this->db->where('id_post',$id);
				$this->db->delete('private_post');
				return true;
			}else{
				return false;
			}
		}
	}	
}
 ?>

