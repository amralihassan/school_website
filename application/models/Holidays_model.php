<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Holidays_model
 */
class Holidays_model extends CI_model
{
	
	function __construct()
	{
		Parent :: __construct();
	}
	function retrive_holidays_dates()
	{
		$query = $this->db->get('holiday');
		return $query->result();
	}	
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('holiday');
		$this->db->order_by('date_holiday');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		$output .='
			<table class="table table-responsive table-hover table-bordered">
				<thead>
					<tr>
						<th class="col-md-3">Date</th>
						<th class="col-md-7">Title</th>
						<th class="col-md-1"><i class="fa fa-edit"></i></th>
						<th class="col-md-1"><i class="fa fa-trash"></i></th>
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				// '. $login_level_update .'
				// '. $login_level_delete .'
				$login_level_update ='';
				$login_level_delete ='';
				if ( 'Super Administrator' == $_SESSION['loginlevel']) 
				{
					$login_level_update ='update_holiday';
					$login_level_delete ='delete_holiday';
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
				$date = $row->date_holiday;
				$date = date("d-m-Y", strtotime($date) ); 	
				$output .='
					<tr>
						<td>'.$date.'</td>
						<td>'.$row->title.'</td>
						<td><a href="#" class="glyphicon glyphicon-pencil btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->id.')"></a></td>
						<td><a href="#" class="glyphicon glyphicon-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->id.')"></a></
					</tr>
				';
			}
			$output .='</table>';
		}
		else
		{
			$output = '<div class="alert alert-danger">No Holidays Added</div>';
		}

		return $output;
	}	
	function delete_holiday()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$this->db->delete('holiday');
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}
		}
		else{
			return false;
		}		
	}
	function addHolidays()
	{
		if (isset($_POST['date_holiday']) && isset($_POST['title']))
		{
			$data = array(
				'date_holiday'=>$this->input->post('date_holiday'),
				'title'=>filter_var($this->input->post('title'),FILTER_SANITIZE_STRING)
			);
			$this->db->insert('holiday',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}
		}
		else
		{
			return false;
		}		
	}
	function getdatabyid()
	{
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$query = $this->db->get('holiday');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
		else
		{
			return false;
		}
	}	
	function update_holiday()
	{
		if (isset($_POST['id_update']) && isset($_POST['title_update']) && isset($_POST['date_holiday_update']))
		{
			$id = filter_var($this->input->post('id_update'),FILTER_SANITIZE_NUMBER_INT);
			$data = array(
				'date_holiday'=>$this->input->post('date_holiday_update'),
				'title'=>filter_var($this->input->post('title_update'),FILTER_SANITIZE_STRING)
			);
			$this->db->where('id',$id);
			$this->db->update('holiday',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
		else
		{
			return false;
		}		
	}
}
 ?>