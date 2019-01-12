<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Agenda_model
*/
class Agenda_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('agenda_details');
		return $query->num_rows();
	}
	function count_all_search()
	{
		// get number of rows
		$name = $this->input->get('name');
		$this->db->like('title',$name);
		$query = $this->db->get('agenda_details');
		return $query->num_rows();
	}
	function count_all_today_events()
	{
		// get number of rows
		$query = $this->db->get('agenda_details');
		return $query->num_rows();
	}
	function count_all_today_events_forGrade()
	{
		// get number of rows
		$query = $this->db->get('agenda_details');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$todayDate = date('Y.m.d');

		$output = '';
		$this->db->select('*');
		$this->db->from('agenda_details');
		$this->db->where(array('date >='=>$todayDate));
		$this->db->order_by('date');
		$this->db->limit($limit,$start);
		$query = $this->db->get();

		// check results
		if ($query ->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$share = "";
				$public_color ="";

				if ($row->divisionID == 0 and $row->gradeID == 0) 
				{
					$share = '<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"><strong> All sections</span>';
					$public_color = "#f3f3f3";
				}
				if ($row->divisionID != 0 and $row->gradeID == 0) 
				{
					$share = '
						<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"><strong> '. $row->divisionName.' Section</span>				
					';
					$public_color = "#e7e7e7";
				}	
				if ($row->divisionID != 0 and $row->gradeID != 0) 
				{
					$share = '
						<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"><strong> '. $row->divisionName.' Section</span><span style=" margin-top: 5px; font-size: 15px;"> | </i></span>  <span style="color: #b94949; margin-top: 5px; font-size: 15px;"> Stage '. $row->gradeName .'</strong></span>													
					';
					$public_color = "#e7e7e7";
				}							
			// '. $login_level_update .'
			// '. $login_level_delete .'
			$login_level_update ='';
			$login_level_delete ='';
			if ( 'Super Administrator' == $_SESSION['loginlevel']) 
			{
				$login_level_update ='update_agenda';
				$login_level_delete ='delete_agenda';
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
				$timestamp = strtotime($row->date);

				$day = date('d', $timestamp);
				$mon = date('M', $timestamp);
				$dd = date('l', $timestamp);

				$output .='
					<div class="col-lg-12 animated fadeIn" style="font-size: 20px;">
	                            <div style="border: 1px solid #bcb6b6; background-color:'. $public_color .'; border-radius: 5px;padding: 15px;margin-bottom:5px;">
	                            	<div class="row">
	                            		<div class = "col-lg-12">
											<div class = "col-lg-1">
												<div class="row">
													<div class="col-lg-12" style="margin-bottom:5px;">
														<span style = "background-color:#6c757d; padding: 10px; border-radius: 5px;font-size:30px; color:white;">
															'.$day.'
															</span>
													</div>										
												</div>
												<div class="row">
													<div class="col-lg-12">										
															<span style = "font-size:27px; ">'.$mon.'</span>

													</div>												
												</div>											
	                            			</div>	
	                            			<div class = "col-lg-11">
												<div class="row">
												<span style = "font-size:26px;font-weight: bold;color:#0685b7; ">'.$row->title.'</span> <br>
												<span style = "font-size:20px; ">'.$dd.'
													<a href="#" onclick="'. $login_level_update .'('.$row->agendaID.')"><i class="fa fa-edit"></i></a>
													<a href="#" onclick="'. $login_level_delete .'('.$row->agendaID.')"><i class="fa fa-trash"></i></a></span>
												<br>
												 '. $share .'
												</div>
												<div class="row" style="font-size:15px;">
													<span style = "font-size:13px;color:#154275;">Posted by '.$row->fullName.'</span>
												</div>	
	                            			</div>
	                            		</div>
	                            	</div>


	                            </div>

	                       </div>
				';
			}
		}
		else
		{
			$output = '<div class="alert alert-warning">No results found</div>';
		}



		return $output;
	}
	function fetch_details_student($limit,$start)
	{
		$todayDate = date('Y.m.d'); // today date
		$output = '';
		$this->db->where(array('divisionID'=>$_SESSION['divisionID'],'date >='=>$todayDate));
		$this->db->order_by('date');
		$this->db->limit($limit,$start);
		$query = $this->db->get('agenda_details');

		// check results
		if ($query ->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{

				$timestamp = strtotime($row->date);

				$day = date('d', $timestamp);
				$mon = date('M', $timestamp);
				$dd = date('l', $timestamp);

				$output .='
					<div class="col-lg-12 animated fadeInUp" style="font-size: 20px;">
	                            <div style="border: 1px solid #bcb6b6; background-color: #f3f3f3; border-radius: 5px;padding: 15px;margin-bottom:5px;">
	                            	<div class="row">
	                            		<div class = "col-lg-12">
											<div class = "col-lg-1">
												<div class="row">
													<div class="col-lg-12" style="margin-bottom:5px;">
														<span style = "background-color:#6c757d; padding: 10px; border-radius: 5px;font-size:30px; color:white;">
															'.$day.'
															</span>
													</div>										
												</div>
												<div class="row">
													<div class="col-lg-12">										
															<span style = "font-size:27px; ">'.$mon.'</span>

													</div>												
												</div>											
	                            			</div>	
	                            			<div class = "col-lg-11">
												<div class="row">
												<span style = "font-size:26px;font-weight: bold; ">'.$row->title.'</span> <br>
												<span style = "font-size:20px; ">'.$dd.'
												</span>
												<br>
												 <span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"><strong> '. $row->divisionName.' Section</span><span style=" margin-top: 5px; font-size: 15px;"> | </i></span>  <span style="color: #b94949; margin-top: 5px; font-size: 15px;"> Stage '. $row->gradeName .'</strong></span>
												</div>
												<div class="row" style="font-size:17px;">
													'.$row->details.'
													<br>
													<span style = "font-size:16px;font-weight:bold;">Posted by '.$row->username.'</span>
												</div>
	                            			</div>
	                            		</div>
	                            	</div>


	                            </div>

	                       </div>
				';
			}
		}
		else
		{
			$output = '<div class="alert alert-warning">No results found</div>';
		}

		return $output;
	}	
	function fetch_details_parent($limit,$start)
	{
		$todayDate = date('Y.m.d'); // today date
		$output = '';
		$this->db->where(array('date >='=>$todayDate));
		$this->db->order_by('date');
		$this->db->limit($limit,$start);
		$query = $this->db->get('agenda_details');

		if ($query ->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$share = "";
				$public_color ="";

				if ($row->divisionID == 0 and $row->gradeID == 0) 
				{
					$share = '<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"><strong> All sections</span>';
					$public_color = "#f3f3f3";
				}
				if ($row->divisionID != 0 and $row->gradeID == 0) 
				{
					$share = '
						<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"><strong> '. $row->divisionName.' Section</span>				
					';
					$public_color = "#e7e7e7";
				}	
				if ($row->divisionID != 0 and $row->gradeID != 0) 
				{
					$share = '
						<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"><strong> '. $row->divisionName.' Section</span><span style=" margin-top: 5px; font-size: 15px;"> | </i></span>  <span style="color: #b94949; margin-top: 5px; font-size: 15px;"> Stage '. $row->gradeName .'</strong></span>													
					';
					$public_color = "#e7e7e7";
				}							
			// '. $login_level_update .'
			// '. $login_level_delete .'
			$login_level_update ='';
			$login_level_delete ='';
			if ( 'Super Administrator' == $_SESSION['loginlevel']) 
			{
				$login_level_update ='update_agenda';
				$login_level_delete ='delete_agenda';
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
				$timestamp = strtotime($row->date);

				$day = date('d', $timestamp);
				$mon = date('M', $timestamp);
				$dd = date('l', $timestamp);

				$output .='
					<div class="col-lg-12 animated fadeInUp" style="font-size: 20px;">
	                            <div style="border: 1px solid #bcb6b6; background-color:'. $public_color .'; border-radius: 5px;padding: 15px;margin-bottom:5px;">
	                            	<div class="row">
	                            		<div class = "col-lg-12">
											<div class = "col-lg-1">
												<div class="row">
													<div class="col-lg-12" style="margin-bottom:5px;">
														<span style = "background-color:#6c757d; padding: 10px; border-radius: 5px;font-size:30px; color:white;">
															'.$day.'
															</span>
													</div>										
												</div>
												<div class="row">
													<div class="col-lg-12">										
															<span style = "font-size:27px; ">'.$mon.'</span>

													</div>												
												</div>											
	                            			</div>	
	                            			<div class = "col-lg-11">
												<div class="row">
												<span style = "font-size:26px;font-weight: bold;color:#d81c65; ">'.$row->title.'</span> <br>
												<span style = "font-size:20px; ">'.$dd.'
													<a href="#" onclick="'. $login_level_update .'('.$row->agendaID.')"><i class="fa fa-edit"></i></a>
													<a href="#" onclick="'. $login_level_delete .'('.$row->agendaID.')"><i class="fa fa-trash"></i></a></span>
												<br>
												 '. $share .'
												</div>
												<div class="row" style="font-size:17px;">
													'.$row->details.'
													<br>
													<span style = "font-size:16px;font-weight:bold;">Posted by '.$row->username.'</span>
												</div>
	                            			</div>
	                            		</div>
	                            	</div>


	                            </div>

	                       </div>
				';
			}
		}
		else
		{
			$output = '<div class="alert alert-warning">No results found</div>';
		}

		return $output;
	}	
	function fetch_details_search($limit,$start)
	{
		$value = $this->input->get('name');
		$output = '';
		$this->db->like('title',$value);
		$this->db->or_like('divisionName',$value);
		$this->db->or_like('gradeName',$value);
		$this->db->or_like('details',$value);
		$this->db->order_by('date');
		$this->db->limit($limit,$start);
		$query = $this->db->get('agenda_details');


		if ($query ->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$share = "";
				$public_color ="";

				if ($row->divisionID == 0 and $row->gradeID == 0) 
				{
					$share = '<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"><strong> All sections</span>';
					$public_color = "#f3f3f3";
				}
				if ($row->divisionID != 0 and $row->gradeID == 0) 
				{
					$share = '
						<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"><strong> '. $row->divisionName.' Section</span>				
					';
					$public_color = "#e7e7e7";
				}	
				if ($row->divisionID != 0 and $row->gradeID != 0) 
				{
					$share = '
						<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"><strong> '. $row->divisionName.' Section</span><span style=" margin-top: 5px; font-size: 15px;"> | </i></span>  <span style="color: #b94949; margin-top: 5px; font-size: 15px;"> Stage '. $row->gradeName .'</strong></span>													
					';
					$public_color = "#e7e7e7";
				}							
			// '. $login_level_update .'
			// '. $login_level_delete .'
			$login_level_update ='';
			$login_level_delete ='';
			if ( 'Super Administrator' == $_SESSION['loginlevel']) 
			{
				$login_level_update ='update_agenda';
				$login_level_delete ='delete_agenda';
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
				$timestamp = strtotime($row->date);

				$day = date('d', $timestamp);
				$mon = date('M', $timestamp);
				$dd = date('l', $timestamp);

				$output .='
					<div class="col-lg-12 animated fadeInUp" style="font-size: 20px;">
	                            <div style="border: 1px solid #bcb6b6; background-color:'. $public_color .'; border-radius: 5px;padding: 15px;margin-bottom:5px;">
	                            	<div class="row">
	                            		<div class = "col-lg-12">
											<div class = "col-lg-1">
												<div class="row">
													<div class="col-lg-12" style="margin-bottom:5px;">
														<span style = "background-color:#6c757d; padding: 10px; border-radius: 5px;font-size:30px; color:white;">
															'.$day.'
															</span>
													</div>										
												</div>
												<div class="row">
													<div class="col-lg-12">										
															<span style = "font-size:27px; ">'.$mon.'</span>

													</div>												
												</div>											
	                            			</div>	
	                            			<div class = "col-lg-11">
												<div class="row">
												<span style = "font-size:26px;font-weight: bold;color:#d81c65; ">'.$row->title.'</span> <br>
												<span style = "font-size:20px; ">'.$dd.'
													<a href="#" onclick="'. $login_level_update .'('.$row->agendaID.')"><i class="fa fa-edit"></i></a>
													<a href="#" onclick="'. $login_level_delete .'('.$row->agendaID.')"><i class="fa fa-trash"></i></a></span>
												<br>
												 '. $share .'
												</div>
												<div class="row" style="font-size:17px;">
													'.$row->details.'
													<br>
													<span style = "font-size:16px;font-weight:bold;">Posted by '.$row->username.'</span>
												</div>
	                            			</div>
	                            		</div>
	                            	</div>


	                            </div>

	                       </div>
				';
			}
		}
		else
		{
			$output = '<div class="alert alert-warning">No results found</div>';
		}

		return $output;
	}
	function fetch_details_today($limit,$start)
	{
		$todayDate = date('Y.m.d');
		$output = '';
		$this->db->select('*');
		$this->db->where('date',$todayDate);
		$this->db->from('agenda_details');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='';

		if ($query ->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$share = "";
				$public_color ="";

				if ($row->divisionID == 0 and $row->gradeID == 0) 
				{
					$share = '<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"> All sections</span>';
					$public_color = "#f3f3f3";
				}
				if ($row->divisionID != 0 and $row->gradeID == 0) 
				{
					$share = '
						<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;">'. $row->divisionName.' Section</span>				
					';
					$public_color = "#e7e7e7";
				}	
				if ($row->divisionID != 0 and $row->gradeID != 0) 
				{
					$share = '
						<span style="color: #0c68ab; margin-top: 5px; font-size: 15px;"> '. $row->divisionName.' Section</span><span style=" margin-top: 5px; font-size: 15px;"> | </i></span>  <span style="color: #b94949; margin-top: 5px; font-size: 15px;"> Stage '. $row->gradeName .'</span>													
					';
					$public_color = "#e7e7e7";
				}							
			// '. $login_level_update .'
			// '. $login_level_delete .'
			$login_level_update ='';
			$login_level_delete ='';
			if ( 'Super Administrator' == $_SESSION['loginlevel']) 
			{
				$login_level_update ='update_agenda';
				$login_level_delete ='delete_agenda';
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
				$timestamp = strtotime($row->date);

				$day = date('d', $timestamp);
				$mon = date('M', $timestamp);
				$dd = date('l', $timestamp);

				$output .='
				<div >
					<div class="col-md-12">
                        <div style="border: 1px solid #bcb6b6; background-color:'. $public_color .'; border-radius: 5px;padding: 15px;margin-bottom:5px;">
                        	<div class="row">
                        		<div class = "col-md-12">
									<div>
									<span style = "font-size:20px;font-weight: bolder;color:#4d4950;text-transform: uppercase;">'.$row->title.'</span> 
									<br>

									 '. $share .'
									</div>
									<div class="row" style="font-size:15px;">
										<span style = "margin-left:15px;font-size:13px;color:#154275;">Posted by '.$row->fullName.'</span>
									</div>										
								
                        		</div>
                        	</div>
                        </div>
	                </div>				
				</div>

				';
			}
		}
		else
		{
			$output = '<div class="alert alert-warning">No results found</div>';
		}


		return $output;
	}
	function fetch_details_today_forGrade($limit,$start)
	{
		$todayDate = date('Y.m.d');
		$output = '';
		$this->db->select('*');
		$this->db->where(array('divisionID' =>$_SESSION['divisionID'],'gradeID'=>$_SESSION['gradeID'],'date'=>$todayDate));
		$this->db->from('agenda_details');
		$this->db->order_by('date','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='';

		// check results
		if ($query ->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$output .='<div class="w3-card-2"> <p style=padding:5px;><span style=color:deepskyblue;font-weight:bold;>'. $row->divisionName.'</span>  '.$row->gradeName.' '.$row->title . '</div>';
			}
			$output .='</p>';
		}
		else
		{
			$output = '<div class="alert alert-danger">No messages to read.</div>';
		}		

		return $output;
	}

	function addevent()
	{
		$data = array(
			'date'=>$this->input->post('date_add'),
			'title'=>$this->input->post('title_add'),
			// 'details'=>$this->input->post('details_add'),
			'divisionID'=>$this->input->post('divisionID_add'),
			'gradeID'=>$this->input->post('gradeID_add'),
			'accID'=>$_SESSION['id_admin'],
			'share'=>$this->input->post('share_add')
		);
		
		$this->db->insert('agenda',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else
		{
			return false;
		}
	}
	function deleteagenda()
	{
		$id=$this->input->get('id');
		$this->db->where('agendaID',$id);
		$this->db->delete('agenda');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}
	}
	function getdatabyid()
	{
		$id = $this->input->get('id');
		$this->db->where('agendaID',$id);
		$query = $this->db->get('agenda_details');
		if ($query ->num_rows()>0) {
			return $query->row();
		}else{
			return false;
		}
	}
	function updateagenda()
	{
		$id=$this->input->post('agendaID');
		$filed= array(
			'date'=>$this->input->post('date'),
			'title'=>$this->input->post('title'),
			'details'=>$this->input->post('details'),
			'divisionID'=>$this->input->post('divisionID_update'),
			'gradeID'=>$this->input->post('gradeID_update'),
			'username'=>$_SESSION['fullName']
		);
		$this->db->where('agendaID', $id);
		$this->db->update('agenda',$filed);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
}
 ?>