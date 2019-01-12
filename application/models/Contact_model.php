<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Contact_model
*/
class Contact_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('contacts');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		// time zone
		date_default_timezone_set("Africa/Cairo"); 
		$output = '';		
		$query = $this->db->query("SELECT * FROM `contacts` ORDER by dateTime DESC");
		$query->result();
		$output .='<div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
				<thead>
					<tr>
						<th><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>					
						<th>Name</th>						
						<th>Subject</th>
						<th>Email</th>
			     	    <th>Message</th>
			     	    <th>Time</th>
					</tr>
				</thead>            
              <tbody>';
		if ($query ->num_rows()>0) {		
           foreach ($query->result() as $row)  {
				$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->dateTime);
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

				 // hide part of bosy message
				 $body_message ='';
				 if (strlen($row->message) > 50) 
				 {
				 	$body_message = substr($row->message,0, 50).'...';
				 }
				 else
				 {
				 	$body_message = $row->message;	
				 }	

				$output .='
		              <tr>
		                <td><input type="checkbox" value="'.$row->id.'" name="id[]"></td>
		                <td class="mailbox-name"><a href="#" onclick="read_message('.$row->id.');">'.$row->name.'</a></td>
		                <td class="mailbox-subject"><b>'.$row->subject.'</td>
		                <td class="mailbox-subject">'.$row->email.' </td>
		                <td>'.$body_message.' </td>
		                <td class="mailbox-date">'.$time.'</td>
		              </tr>		              			                      
					';             
            };
            $output .='</tbody>
                </table>';
		}	
		else
		{
			$output = '<br><div class="alert alert-danger">No messages to read.</div>';
		}			
		return $output;
	}	
	// read web site message
	function fetch_details_message($limit,$start)
	{
		if ($_GET['id'])
		{
			$id =filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->select('*');
			$this->db->from('contacts');
			$this->db->where('id',$id);			
			$this->db->order_by('dateTime','desc');
			$this->db->limit($limit,$start);
			$query = $this->db->get();
			$output ='';
			if ($query ->num_rows()>0) {		
	           foreach ($query->result() as $row)  {	
					// login level
					$login_level_delete ='';
					if ( 'Super Administrator' == $_SESSION['loginlevel']) 
					{
						$login_level_delete ='remove_message';
					}
					elseif ( 'Administrator' == $_SESSION['loginlevel']) 
					{
						$login_level_delete ='deny';
					}
					else 
					{
						$login_level_delete ='deny';
					}		           	                        	

					$output .='
			              <div  class="box-body no-padding">
			                <div class="mailbox-read-info">
			                  <h3>'.$row->name.'</h3>
			                  <h5>From: '.$row->email.'
			                    <span class="mailbox-read-time pull-right">'.$row->dateTime.'<mail</span></h5>
			                </div>
			                <!-- /.mailbox-read-info -->
			                <div class="mailbox-controls with-border text-center">
			                <!-- /.mailbox-controls -->
			                <div class="mailbox-read-message" style="text-align:justify;">
			                  '.$row->message.'
			                </div>
			                <!-- /.mailbox-read-message -->
			              </div>              
			            </div>
			            <!-- /.box-body -->
			            <div class="box-footer">
			              <button type="button" onclick="'.$login_level_delete.'('.$row->id.');" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
			            </div>
			            <!-- /.box-footer -->	              			                      
						';             
	            };
	            $output .='';
			}	
			else
			{
				$output = '<div class="alert alert-danger">No results.</div>';
			}						
		}
		return $output;
	}	
	function fetch_details_search($limit,$start)
	{
		if ($_GET['name'])
		{
			// time zone
			date_default_timezone_set("Africa/Cairo"); 			
			$value = filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$output = '';		
			$query = $this->db->query("SELECT * FROM `contacts` WHERE name Like '%".$value."%' OR email Like '%".$value."%' ORDER by dateTime DESC LIMIT ".$start.", ".$limit);
			$query->result();
			$output .='<div class="table-responsive mailbox-messages">
	            <table class="table table-hover table-striped">
					<thead>
						<tr>
							<th><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>					
							<th>Name</th>						
							<th>Subject</th>
							<th>Email</th>
				     	    <th>Message</th>
				     	    <th>Time</th>
						</tr>
					</thead>            
	              <tbody>';
			if ($query ->num_rows()>0) {		
	           foreach ($query->result() as $row)  {
					$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->dateTime);
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

					 // hide part of bosy message
					 $body_message ='';
					 if (strlen($row->message) > 50) 
					 {
					 	$body_message = substr($row->message,0, 50).'...';
					 }
					 else
					 {
					 	$body_message = $row->message;	
					 }				 
					$output .='
			              <tr>
			                <td><input type="checkbox" value="'.$row->id.'" name="id[]"></td>
			                <td class="mailbox-name"><a href="#" onclick="read_message('.$row->id.');">'.$row->name.'</a></td>
			                <td class="mailbox-subject"><b>'.$row->subject.'</td>
			                <td class="mailbox-subject">'.$row->email.' </td>
			                <td>'.$body_message.' </td>
			                <td class="mailbox-date">'.$time.'</td>
			              </tr>		              			                      
						';             
	            };
	            $output .='</tbody>
	                </table>';
			}	
			else
			{
				$output = '<br><div class="alert alert-danger">No messages to read.</div>';
			}			
			return $output;	
		}		
	}
	function count_all_search()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$name = $this->input->get('name');
			$this->db->like('email',$name);
			$this->db->or_like('name',$name);
			$query = $this->db->get('contacts');
			return $query->num_rows();	
		}
	}
	function deletemessage()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$this->db->delete('contacts');
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}
		}
	}
	function addnew()
	{
		if (isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) && isset($_POST['name']))
		{
			$data = array
			('email' => $this->input->post('email'),
			 'subject' => $this->input->post('subject'),
			 'message' => $this->input->post('message'),
			 'name' => ($this->input->post('name'))
			);
			$this->db->insert('contacts',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}
		}

	}
	function delete_more_one_contact($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('contacts');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}
}
 ?>