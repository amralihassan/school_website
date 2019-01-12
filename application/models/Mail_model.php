<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Mail_model
*/
class Mail_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}
	// SENDING MESSAGE
	function sendMessage()
	{
		if (isset($_POST['reciver_add']) && isset($_POST['subject_add']) && isset($_POST['bodyMessage_add'])) 
		{
			$data = array(
			'sender'=> $_SESSION['id_admin'],
			'reciver'=>$this->input->post('reciver_add'),
			'subject'=>$this->input->post('subject_add'),
			'bodyMessage'=>$this->input->post('bodyMessage_add'),
			'senderName'=>$_SESSION['fullName'],
			'file_name' => $this->upload->file_name
		);
		
			$this->db->insert('mail',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}				
		}
	}
	function sendMessage_no_attachement()
	{
		if (isset($_POST['reciver_add']) && isset($_POST['subject_add']) && isset($_POST['bodyMessage_add']))
		{
			$data = array(
				'sender'=> $_SESSION['id_admin'],
				'reciver'=>$this->input->post('reciver_add'),
				'subject'=>$this->input->post('subject_add'),
				'bodyMessage'=>$this->input->post('bodyMessage_add'),
				'senderName'=>$_SESSION['fullName']
			);
			
			$this->db->insert('mail',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}	
		}		
	
	}
	// ======================================================================
	// INBOX MESSAGES
	function count_all_inbox()
	{
		// get number of rows
		$this->db->where('reciver',$_SESSION['id_admin']);	
		$query = $this->db->get('mailbox');
		return $query->num_rows();
	}
	function fetch_details_inbox($limit,$start)
	{
		// time zone
		date_default_timezone_set("Africa/Cairo"); 
		$output = '';		
		$query = $this->db->query("SELECT * FROM `mailbox` WHERE reciver = ".$_SESSION['id_admin']." ORDER by mailDate DESC LIMIT ".$start.", ".$limit);
		$query->result();
		$output .='<div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
				<thead>
					<tr>
						<th><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>					
						<th>From</th>						
						<th>Subject</th>
						<th>Message</th>
			     	    <th><i class="fa fa-paperclip"></th>
			     	    <th>Time</th>
					</tr>
				</thead>            
              <tbody>';
		$file_attachment="";
		if ($query ->num_rows()>0) {		
           foreach ($query->result() as $row)  {
				$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->mailDate);
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
            	// check attachment
				if ($row->file_name != "")
				 { $file_attachment = '<i class="fa fa-paperclip">';
				 } else{$file_attachment = "";}
				 // hide part of bosy message
				 $body_message ='';
				 if (strlen($row->bodyMessage) > 50) 
				 {
				 	$body_message = substr($row->bodyMessage,0, 50).'...';
				 }
				 else
				 {
				 	$body_message = $row->bodyMessage;	
				 }				 
				$output .='
		              <tr>
		                <td><input type="checkbox" value="'.$row->mailID.'" name="mailID[]"></td>
		                <td class="mailbox-name"><a href="#" onclick="read_mail('.$row->mailID.');">'.$row->senderName.'</a></td>
		                <td class="mailbox-subject"><b>'.$row->subject.' </b>
		                </td>
		                <td>'.$body_message.'
		                </td>
		                <td class="mailbox-attachment">'.$file_attachment.'</i></td>
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
	function count_all_search_inbox()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$name = filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$this->db->where('reciver',$_SESSION['id_admin']);	
			$this->db->like('senderName',$name);
			$this->db->or_like('subject',$name);			
			$query = $this->db->get('mailbox');
			return $query->num_rows();
		}
	}		
	function fetch_details_search_inbox($limit,$start)
	{
		if ($_GET['name'])
		{
			$name =filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$output = '';
			$query = $this->db->query("SELECT * FROM `mailbox` WHERE reciver = ".$_SESSION['id_admin']." AND senderName Like '%".$name."%' OR subject Like '%".$name."%' ORDER by mailDate DESC LIMIT ".$start.", ".$limit);
			$query->result();
			$output .='<div class="table-responsive mailbox-messages">
	            <table class="table table-hover table-striped">
					<thead>
						<tr>
							<th><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>		
							<th>From</th>						
							<th>Subject</th>
							<th>Message</th>
				     	    <th><i class="fa fa-paperclip"></th>
				     	    <th>Time</th>
						</tr>
					</thead> 	            
	              <tbody>';
			$file_attachment="";
			// time zone
			date_default_timezone_set("Africa/Cairo"); 
			if ($query ->num_rows()>0) {		
	           foreach ($query->result() as $row)  {
					$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->mailDate);
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
	            	// check attachment
					if ($row->file_name != "")
					 { $file_attachment = '<i class="fa fa-paperclip">';
					 } else{$file_attachment = "";}
					 // hide part of bosy message
					 $body_message ='';
					 if (strlen($row->bodyMessage) > 20) 
					 {
					 	$body_message = substr($row->bodyMessage,0, 50) . '...';
					 }
					 else
					 {
					 	$body_message = $row->bodyMessage;	
					 }
					$output .='
			              <tr>
			                <td><input type="checkbox"></td>
			                <td class="mailbox-name"><a href="#" onclick="read_mail('.$row->mailID.');">'.$row->senderName.'</a></td>
			                <td class="mailbox-subject"><b>'.$row->subject.' </b>
			                </td>
			                <td>'.$body_message .'
			                </td>
			                <td class="mailbox-attachment">'.$file_attachment.'</i></td>
			                <td class="mailbox-date">'.$time.'</td>
			              </tr>		              			                      
						';             
	            };
	            $output .='</tbody>
	                </table>';
			}	
			else
			{
				$output = '<br><div class="alert alert-danger">No results.</div>';
			}						
		}
		return $output;
	}	
	// ======================================================================
	// SENT MESSAGE
	function count_all_sent()
	{
		// get number of rows
		$this->db->where('sender',$_SESSION['id_admin']);	
		$query = $this->db->get('sents_messages');
		return $query->num_rows();
	}	
	function fetch_details_sent($limit,$start)
	{
		$output = '';		
		$query = $this->db->query("SELECT * FROM `sents_messages` WHERE sender = ".$_SESSION['id_admin']." ORDER by mailDate DESC LIMIT ".$start.", ".$limit);			
		$query->result();
		$output .='<div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
				<thead>
					<tr>					
						<th>To</th>						
						<th>Subject</th>
						<th>Message</th>
			     	    <th><i class="fa fa-paperclip"></th>
			     	    <th>Time</th>
			     	    <th>Status</th>
					</tr>
				</thead>            
              <tbody>';
		$file_attachment="";
		// time zone
		date_default_timezone_set("Africa/Cairo"); 		
		if ($query ->num_rows()>0) {		
           foreach ($query->result() as $row)  {
				$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->mailDate);
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
	 			// check status
				if($row->readStatus == 1)
				{
					$checked ='seen';
					$status = " style='color:green;'" ;
				}
				else
				{
					$checked="unread"; 
					$status = " style='color:red;'";
				}		                        	
            	// check attachment
				if ($row->file_name != "")
				 { $file_attachment = '<i class="fa fa-paperclip">';
				 } else{$file_attachment = "";}
				 // hide part of bosy message
				 $body_message ='';
				 if (strlen($row->bodyMessage) > 50) 
				 {
				 	$body_message = substr($row->bodyMessage,0, 50).'...';
				 }
				 else
				 {
				 	$body_message = $row->bodyMessage;	
				 }				 
				$output .='
		              <tr>
		                <td class="mailbox-name"><a href="#" onclick="sent_mail('.$row->mailID.');">'.$row->fullName.'</a></td>
		                <td class="mailbox-subject"><b>'.$row->subject.' </b>
		                </td>
		                <td>'.$body_message.'
		                </td>
		                <td class="mailbox-attachment">'.$file_attachment.'</i></td>
		                <td class="mailbox-date">'.$time.'</td>
		                <td'.$status.' >'.$checked.'</td>
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
	// ======================================================================
	// TRASH MESSAGES
	function count_all_trash()
	{
		// get number of rows
		$this->db->where('reciver', $_SESSION['id_admin']);	
		$query = $this->db->get('full_mail_trash');
		return $query->num_rows();
	}		
	function fetch_details_trash($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('full_mail_trash');
		$this->db->where('reciver', $_SESSION['id_admin']);	
		$this->db->order_by('mailDate','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='<div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
				<thead>
					<tr>
						<th><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>					
						<th>From</th>						
						<th>Subject</th>
						<th>Message</th>
			     	    <th><i class="fa fa-paperclip"></th>
			     	    <th>Time</th>
					</tr>
				</thead>            
              <tbody>';
		$file_attachment="";
		// time zone
		date_default_timezone_set("Africa/Cairo"); 		
		if ($query ->num_rows()>0) {		
           foreach ($query->result() as $row)  {
				$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->mailDate);
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
            	// check attachment
				if ($row->file_name != "")
				 { $file_attachment = '<i class="fa fa-paperclip">';
				 } else{$file_attachment = "";}
				 // hide part of bosy message
				 $body_message ='';
				 if (strlen($row->bodyMessage) > 50) 
				 {
				 	$body_message = substr($row->bodyMessage,0, 50).'...';
				 }
				 else
				 {
				 	$body_message = $row->bodyMessage;	
				 }				 
				$output .='
		              <tr>
		                <td><input type="checkbox" value="'.$row->mailID.'" name="mailID[]"></td>
		                <td class="mailbox-name"><a href="#" onclick="read_mail('.$row->mailID.');">'.$row->senderName.'</a></td>
		                <td class="mailbox-subject"><b>'.$row->subject.' </b>
		                </td>
		                <td>'.$body_message.'
		                </td>
		                <td class="mailbox-attachment">'.$file_attachment.'</i></td>
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
	function count_all_search_trash()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$name = filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$this->db->where('reciver', $_SESSION['id_admin']);	
			$this->db->like('senderName',$name);
			$this->db->or_like('subject',$name);		
			$query = $this->db->get('full_mail_trash');
			return $query->num_rows();
		}
	}		
	function fetch_details_search_trash($limit,$start)
	{
		if ($_GET['name'])
		{
			$name =filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$output = '';
			$query = $this->db->query("SELECT * FROM `full_mail_trash` WHERE reciver = ".$_SESSION['id_admin']." AND senderName Like '%".$name."%' OR subject Like '%".$name."%' ORDER by mailDate DESC LIMIT ".$start.", ".$limit);
			$query->result();
			$output .='<div class="table-responsive mailbox-messages">
	            <table class="table table-hover table-striped">
					<thead>
						<tr>
							<th><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>		
							<th>From</th>						
							<th>Subject</th>
							<th>Message</th>
				     	    <th><i class="fa fa-paperclip"></th>
				     	    <th>Time</th>
						</tr>
					</thead> 	            
	              <tbody>';
			$file_attachment="";
		// time zone
		date_default_timezone_set("Africa/Cairo"); 			
			if ($query ->num_rows()>0) {		
	           foreach ($query->result() as $row)  {
					$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->mailDate);
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
	            	// check attachment
					if ($row->file_name != "")
					 { $file_attachment = '<i class="fa fa-paperclip">';
					 } else{$file_attachment = "";}
					 // hide part of bosy message
					 $body_message ='';
					 if (strlen($row->bodyMessage) > 20) 
					 {
					 	$body_message = substr($row->bodyMessage,0, 50) . '...';
					 }
					 else
					 {
					 	$body_message = $row->bodyMessage;	
					 }
					$output .='
			              <tr>
			                <td><input type="checkbox"></td>
			                <td class="mailbox-name"><a href="#" onclick="read_mail('.$row->mailID.');">'.$row->senderName.'</a></td>
			                <td class="mailbox-subject"><b>'.$row->subject.' </b>
			                </td>
			                <td>'.$body_message .'
			                </td>
			                <td class="mailbox-attachment">'.$file_attachment.'</i></td>
			                <td class="mailbox-date">'.$time.'</td>
			              </tr>		              			                      
						';             
	            };
	            $output .='</tbody>
	                </table>';
			}	
			else
			{
				$output = '<br><div class="alert alert-danger">No results.</div>';
			}						
		}
		return $output;
	}
	// ======================================================================
	function fetch_read_last_messages($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('mail_with_photo');
		$this->db->where('reciver',$_SESSION['id_admin']);	
		$this->db->order_by('mailDate','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		// time zone
		date_default_timezone_set("Africa/Cairo"); 
		$output .='';
		if ($query ->num_rows()>0)
		{
			$output .='<ul class="menu">';
			foreach ($query->result() as $row) 
			{
					$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->mailDate);
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
		                    <li>
		                      <a href="#">
		                        <div class="pull-left">
		                          <img src="'.base_url('public/dist/img/').$row->photo.'" class="img-circle" alt="Image">
		                        </div>
		                        <h4>
		                          '.$row->senderName.'<br>
		                          <small><i class="fa fa-clock-o"></i>'.$time.'</small>
		                        </h4>
		                        <p>'.$row->subject.'</p>
		                      </a>
		                    </li>
	                        '; 
			}
			$output .='</ul> ';
		}
		return $output;
	}		

	// ======================================================================
	// READ MESSAGE
	// READ INBOX MESSAGE
	function fetch_details_message($limit,$start)
	{
		$this->readMessage();
		if ($_GET['id'])
		{
			$id =filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->select('*');
			$this->db->from('mail_with_photo');
			$this->db->where('mailID',$id);			
			$this->db->order_by('mailDate','desc');
			$this->db->limit($limit,$start);
			$query = $this->db->get();
			$output .='';
			// time zone
			date_default_timezone_set("Africa/Cairo"); 			
			$file_attachment="";
			if ($query ->num_rows()>0) {		
	           foreach ($query->result() as $row)  {
					$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->mailDate);
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
            	// check attachment
				if ($row->file_name != "")
				 { 
				 	$file_attachment = '
			            <div class="box-footer">
			              <ul class="mailbox-attachments clearfix">
			                <li>
			                  <div class="mailbox-attachment-info">
			                    <a target="_blank" href="'.base_url('public/upload/mail_attachment/').$row->file_name.'" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> '.$row->file_name .'</a>
			                        <span class="mailbox-attachment-size">
			                          1,245 KB
			                          <a target="_blank" href="'.base_url('public/upload/mail_attachment/').$row->file_name.'" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
			                        </span>
			                  </div>
			                </li>
			              </ul>
			            </div>
			            <!-- /.box-footer -->
				 	';
				 } else{$file_attachment = "";}			                        	

					$output .='
			              <div  class="box-body no-padding">
			                <div class="mailbox-read-info">
			                  <h3>'.$row->subject.'</h3>
			                  <h5>From: '.$row->senderName.'
			                    <span class="mailbox-read-time pull-right">'.$row->mailDate.'<mail</span></h5>
			                </div>
			                <!-- /.mailbox-read-info -->
			                <div class="mailbox-controls with-border text-center">
			                <!-- /.mailbox-controls -->
			                <div class="mailbox-read-message" style="text-align:justify;">
			                  '.$row->bodyMessage.'
			                </div>
			                <!-- /.mailbox-read-message -->
			              </div>              
			            </div>

			            <!-- /.box-body -->
			            '.$file_attachment.'

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
	// READ SENT MESSAGE
	function fetch_details_sent_message($limit,$start)
	{ 		
		if ($_GET['id'])
		{
			$id =filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$output = '';
			$this->db->select('*');
			$this->db->from('sents_messages');
			$this->db->where('mailID',$id);			
			$this->db->order_by('mailDate','desc');
			$this->db->limit($limit,$start);
			$query = $this->db->get();
			$output .='';
			$file_attachment="";
			// time zone
			date_default_timezone_set("Africa/Cairo"); 			
			if ($query ->num_rows()>0) {		
	           foreach ($query->result() as $row)  {
					$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($row->mailDate);
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
            	// check attachment
				if ($row->file_name != "")
				 { 
				 	$file_attachment = '
			            <div class="box-footer">
			              <ul class="mailbox-attachments clearfix">
			                <li>
			                  <div class="mailbox-attachment-info">
			                    <a target="_blank" href="'.base_url('public/upload/mail_attachment/').$row->file_name.'" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> '.$row->file_name .'</a>
			                        <span class="mailbox-attachment-size">
			                          1,245 KB
			                          <a target="_blank" href="'.base_url('public/upload/mail_attachment/').$row->file_name.'" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
			                        </span>
			                  </div>
			                </li>
			              </ul>
			            </div>
			            <!-- /.box-footer -->
				 	';
				 } else{$file_attachment = "";}			                        	

					$output .='
			              <div  class="box-body no-padding">
			                <div class="mailbox-read-info">
			                  <h3>'.$row->subject.'</h3>
			                  <h5>To: '.$row->fullName.'
			                    <span class="mailbox-read-time pull-right">'.$row->mailDate.'<mail</span></h5>
			                </div>
			                <!-- /.mailbox-read-info -->
			                <div class="mailbox-controls with-border text-center">
			                <!-- /.mailbox-controls -->
			                <div class="mailbox-read-message" style="text-align:justify;">
			                  '.$row->bodyMessage.'
			                </div>
			                <!-- /.mailbox-read-message -->
			              </div>              
			            </div>

			            <!-- /.box-body -->
			            '.$file_attachment.'
			            <div class="box-footer">
			              <div class="pull-right">
			              </div>
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
	// UPDATE MESSAGE STATUS
	function readMessage()
	{
		if ($_GET['id'])
		{
			$id =filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$data = array('readStatus'=> '1');
			$this->db->where('mailID',$id);
			$this->db->update('mail',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}	
		}
	}		
	// ======================================================================
	// MOVE TO TRASH
	// DELETE MESSAGE FROM TRASH
	function move_to_trash()
	{
		if ($_GET['id'])
		{
			$data = array(
				'mailID'=>filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT)
			);
			$this->db->insert('mail_trash',$data);	
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}
		}		
	}	
	// MOVE MESSAGE TO TRASH BOX
	function move_from_inbox_to_trash($mailID)
	{
		$data = array(
			'mailID'=>filter_var($mailID,FILTER_SANITIZE_NUMBER_INT)
		);
			$this->db->insert('mail_trash',$data);				
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}		
	}
	// BACK MESSAGE TO INBOX 
	function move_more_one_msg_to_inbox($mailID)
	{
		$this->db->where('mailID',$mailID);
		$this->db->delete('mail_trash');	
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}		
	}	
	// ======================================================================	
	function get_total_msg()
	{
		// get number of rows
		$this->db->where(array('readStatus' =>0 ,'reciver'=>$_SESSION['id_admin'] ));	
		$query = $this->db->get('mail');
		return $query->num_rows();
	}
	function get_current_msg($user_id)
	{
		// get number of rows
		$this->db->where(array('readStatus' =>0 ,'reciver'=> $user_id));	
		$query = $this->db->get('mail');
		return $query->num_rows();
	}				
		
	function count_all_outbox()
	{
		// get number of rows
		$query = $this->db->get('sents_messages');
		return $query->num_rows();
	}
	function fetch_details_outbox($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('sents_messages');
		$this->db->where('sender',$_SESSION['id_admin']);		
		$this->db->order_by('mailDate','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='
			<table class="table table-responsive table-hover">
				<thead>
					<tr class="bgTable">
						<th class="col-lg-2"></th>
						<th class="col-lg-2"></th>
						<th class="col-lg-1"></th>
					</tr>
				</thead>
		';
		$checked = "";
		$status = "";
		$file_attachment="";
		if ($query ->num_rows()>0) {				
		foreach ($query->result() as $row) 
		{
			// check attachment
			if ($row->file_name != "")
			 { $file_attachment = '<i class="fa fa-paperclip" aria-hidden="true"></i>';
			 } else{$file_attachment = "";}
			 // check status
			if($row->readStatus == 1)
			{
				$checked ='seen';
				$status = " style='color:green;'" ;
			}
			else
			{
				$checked="unread"; 
				$status = " style='color:red;'";
			}
			$output .='
				<tr>
					<td '.$checked.'><a href="#" onclick="showDeatils('.$row->mailID.')">'.$row->fullName.'</a></td>
					<td>'.$row->subject.'</td>
					<td'.$status.' >'.$checked.'</td>
				</tr>
			';
		}
		$output .='</table>';
	}
		else
		{
			$output = '<div class="alert alert-danger">No messages to read.</div>';
		}		
		return $output;
	}	
	function fetch_details_search_outbox($limit,$start)
	{
		$value = $this->input->get('name');
		$output = '';
		$this->db->order_by('mailDate' , 'desc');
		$this->db->like('fullName',$value);
		$this->db->where('sender',$_SESSION['id_admin']);	
		$this->db->limit($limit,$start);
		$query = $this->db->get('sents_messages');
		$output .='
			<table class="table table-responsive table-hover">
				<thead>
					<tr class="bgTable">
						<th class="col-lg-2"></th>
						<th class="col-lg-2"></th>
						<th class="col-lg-1"></th>
					</tr>
				</thead>
		';
		$checked = "";
		$status = "";
		if ($query ->num_rows()>0) {		
		foreach ($query->result() as $row) 
		{
			// check attachment
			if ($row->file_name != "")
			 { $file_attachment = '<i class="fa fa-paperclip" aria-hidden="true"></i>';
			 } else{$file_attachment = "";}
			 // check status
			if($row->readStatus == 1)
			{
				$checked ='seen';
				$status = " style='color:green;'" ;
			}
			else
			{
				$checked="unread"; 
				$status = " style='color:red;'";
			}
			$output .='
				<tr>
					<td '.$checked.'><a href="#" onclick="showDeatils('.$row->mailID.')">'.$row->fullName.'</a></td>
					<td>'.$row->subject.'</td>
					<td'.$status.' >'.$checked.'</td>
				</tr>
			';
		}
		$output .='</table>';
		}
		else
		{
			$output = '<div class="alert alert-danger">No messages to read.</div>';
		}		
		return $output;
	}	
	function getdatabyid()
	{
		
		$id = $this->input->get('id');
		$this->db->where('mailID',$id);
		$query = $this->db->get('sents_messages');
		if ($query ->num_rows()>0) {
			return $query->row();
		}else{
			return false;
		}
	}
	function retriveAllunreadmsg()
	{
		$this->db->where('readStatus',0);
		$q = $this->db->get('mail');
	    return $q->result();
		if ($q->num_rows > 0) {
			return $q->result();
		}
		else
		{
			return false;
		}		
	}
	function count_all_search_outbox()
	{
		// get number of rows
		$name = $this->input->get('name');
		$this->db->like('senderName',$name);
		$this->db->where('sender',$_SESSION['id_admin']);
		$query = $this->db->get('sents_messages');
		return $query->num_rows();
	}	
		
}
 ?>