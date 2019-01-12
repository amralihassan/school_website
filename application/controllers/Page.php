<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * 
 */
class Page extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
	}

	function index()
	{
		// load general settings model
		$this->load->model('Mainsettings_model','set');	
		$data['records'] = $this->set->retriveAllsettings();
		// load mail model settings
		$this->load->model('Mail_model','mail');
		$data['unread'] = $this->mail->retriveAllunreadmsg();
		$this->load->view('site',$data);		
	}
	function load_login()
	{
		$data['msg'] = '';
		$data['hide']='display:none';	
		$this->load->view("login",$data);
	}	
	function load_homepage()
	{
		$data['pagetitle'] = 'MEIS | Dashboard';
		$data['page']=$this->load->view('dashboards/admin_dashboard_view',NULL,TRUE);
		echo json_encode($data);		
	}
	function disable() // fail login
	{
		$data['msg'] = 'Your an account is diable, please contact with system administrator.';
		$data['hide']='display:inline-block';
		$this->load->view('login',$data);
	}
	function fail() // fail login
	{
		$data['msg'] = '<h5 style="color:red;text-align:center;padding-top:40px;">Invalid username or password</h5>';
		$data['hide']='display:inline-block';
		$this->load->view('login',$data);
	}	
	function empty() // fail login
	{
		$data['msg'] = '<h5 style="color:red;text-align:center;padding-top:40px;">Please enter username and password.</h5>';
		$data['hide']='display:inline-block';
		$this->load->view('login',$data);
	}	
}

 ?>