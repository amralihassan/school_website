<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Sheet_model
*/
class Sheet_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function retrive_all_files()
	{
		$this->db->order_by('dateUpload','DESC');
		$query = $this->db->get('sheet_division_grade');
		return $query->result();
	}
	function retrive_all_teacher_files()
	{
		$this->db->where('user_id',$_SESSION['id_admin']);
		$this->db->order_by('dateUpload','DESC');
		$query = $this->db->get('sheet_division_grade');
		return $query->result();
	}
	function retrive_all_student_files()
	{
		$this->db->where('divisionID',$_SESSION['divisionID']);
		$this->db->where('gradeID',$_SESSION['gradeID']);
		$this->db->order_by('dateUpload','DESC');
		$query = $this->db->get('sheet_division_grade');
		return $query->result();
	}			
	function fetch_details_load_latest_extra_sheet($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('sheet_division_grade');
		$this->db->order_by('dateUpload','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		foreach ($query->result() as $row) 
		{
			// '. $login_level_update .'
			// '. $login_level_delete .'
			$login_level_update ='';
			$login_level_delete ='';
			if ( 'Super Administrator' == $_SESSION['loginlevel']) 
			{
				$login_level_update ='update_sheet';
				$login_level_delete ='delete_sheet';
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
			$var = $row->dateUpload;
			$var = date("d-m-Y", strtotime($var) ); 
			$output .='
                <li class="item">
                    <a href="#" class="product-title"><a target="_blank" href="'.base_url('public/upload/sheets/').$row->file_name.'">'.$row->sheetName.'</a>
                      <span class="label label-warning pull-right">'.$var.'</span></a>
                    <span class="product-description">
                          '.$row->divisionName.' - '.$row->gradeName.' - '.$row->subjectName.'
                        </span>
                </li>			
			';
		}
		return $output;		
	}			
	function uploadfile()
	{
		if (isset($_POST['divisionID']) && isset($_POST['gradeID']) && isset($_POST['subjectID']) && isset($_POST['sheetName']) && isset($this->upload->file_name))
		{
			$todayDate = date('Y.m.d'); // today date
			$data = array
			('dateUpload' => $todayDate,
				'divisionID' => filter_var($this->input->post('divisionID'),FILTER_SANITIZE_NUMBER_INT),
				'gradeID' => filter_var($this->input->post('gradeID'),FILTER_SANITIZE_NUMBER_INT),
				'subjectID' => filter_var($this->input->post('subjectID'),FILTER_SANITIZE_NUMBER_INT),
				'sheetName' => filter_var($this->input->post('sheetName'),FILTER_SANITIZE_STRING),
				'user_id' => $_SESSION['id_admin'],
				'file_name' => $this->upload->file_name
			);
			$this->db->insert('sheet',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}
		}
	}
	function getFilenameById()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$get_file_name = $this->db->get('sheet')->row();
			return $get_file_name;
		}
	}
	function deletesheet()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			// unlink image
			$img=$this->db->select('*')->from('uniform')->where('id',$id)->get()->row('file_name');
			
			$this->db->where('id',$id);
			$this->db->delete('sheet');
			if ($this->db->affected_rows() >0) {
				if ($img != "") {
					unlink("public/upload/sheets/".$img);
				}
				
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
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$query = $this->db->get('sheet');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}
	function updatesheet()
	{
		if (isset($_POST['id']) && isset($_POST['divisionID_update']) && isset($_POST['gradeID_update']) && isset($_POST['subjectID_update']))
		{
			$id = filter_var($this->input->post('id'),FILTER_SANITIZE_NUMBER_INT);
		 	$data = array
			(	'divisionID' => filter_var($this->input->post('divisionID_update'),FILTER_SANITIZE_NUMBER_INT),
				'gradeID' => filter_var($this->input->post('gradeID_update'),FILTER_SANITIZE_NUMBER_INT),
				'subjectID' => filter_var($this->input->post('subjectID_update'),FILTER_SANITIZE_NUMBER_INT),
				'sheetName' => filter_var($this->input->post('sheetName'),FILTER_SANITIZE_STRING)
			);
		 	$this->db->where('id',$id);
		 	$this->db->update('sheet',$data);
		 	if ($this->db->affected_rows() > 0) {
		 		return true;
		 	}else{
		 		return false;
			}
		}
	}
	function updatesheet_sheetname()
	{
		if (isset($_POST['sheetName_update']) && isset($_POST['id']))
		{
			$id = filter_var($this->input->post('id'),FILTER_SANITIZE_NUMBER_INT);
		 	$data = array
			(	'sheetName' => filter_var($this->input->post('sheetName_update'),FILTER_SANITIZE_STRING),
				'user_id' => $_SESSION['id_admin']
			);
		 	$this->db->where('id',$id);
		 	$this->db->update('sheet',$data);
		 	if ($this->db->affected_rows() > 0) {
		 		return true;
		 	}else{
		 		return false;
			}
		}
	}	
}
 ?>