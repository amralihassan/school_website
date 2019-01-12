<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Sheet controller
*/
class Sheet extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Sheet_model','she');
	}
	function loadsheets_forStudent()
	{
		$data['pagetitle'] = 'Sheets';
		$data['page']=$this->load->view('student_pages/student_sheet_view',NULL,TRUE);
		echo json_encode($data);
	}
	function loadsheets()
	{
		$data['pagetitle'] = 'Sheets';
		$data['page']=$this->load->view('sheet/sheet_view',NULL,TRUE);
		echo json_encode($data);
	}
	function load_sheet_parent()
	{
		$data['pagetitle'] = 'Sheets';
		$data['page']=$this->load->view('sheet/sheet_parent_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function load_sheet_teacher()
	{
		$data['pagetitle'] = 'Sheets';
		$data['page']=$this->load->view('sheet/sheet_teacher_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function load_sheet_student()
	{
		$data['pagetitle'] = 'Sheets';
		$data['page']=$this->load->view('sheet/sheet_student_view',NULL,TRUE);
		echo json_encode($data);
	}		
	function retrive_all_files()
	{
        $users = $this->she->retrive_all_files();
        $output = "";
        $n=1;
		$output .='';        
        if (count($users)>0) // fill select box
        {
            foreach ($users as $row) {
				$login_level_update ='';
				$login_level_delete ='';
				if ( 'Super Administrator' == $_SESSION['loginlevel'] && 'Parent' != $_SESSION['role']) 
				{
					$login_level_update ='<td><a href="#" class="fa fa-edit btn btn-warning btn-xs" onclick="update_sheet('.$row->id.')"></a></td>';
					$login_level_delete ='<td><a href="#" class="fa fa-trash btn btn-danger btn-xs" onclick="delete_sheet('.$row->id.')"></a></td>';
				}

				$var = $row->dateUpload;
				$var = date("d-m-Y", strtotime($var) );            	
				$output .='
					<tr>
                        <td>'.$n.'</td>  
                        <td>'.$var.'</td>                    
						<td><a target="_blank" href="'.base_url('public/upload/sheets/').$row->file_name.'">'.$row->sheetName.'</a></td>
						<td>'.$row->divisionName.'</td>
						<td>'.$row->gradeName.'</td>
						<td>'.$row->subjectName.'</td>
						<td>'.$row->fullName.'</td> '.$login_level_update.'
						'.$login_level_delete.'
						
					</tr>
					';  
                    $n++;              
            };            
        }
        echo json_encode($output);		
	}
	function retrive_all_teacher_files()
	{
        $users = $this->she->retrive_all_teacher_files();
        $output = "";
        $n=1;
		$output .='';        
        if (count($users)>0) // fill select box
        {
            foreach ($users as $row) {
	        	// check attachment
				if ($row->file_name != "")
				 { $file_attachment = 'fa fa-download btn btn-info btn-xs';
				 } else{$file_attachment = "";}

				$var = $row->dateUpload;
				$var = date("d-m-Y", strtotime($var) );            	
				$output .='
					<tr>
                        <td>'.$n.'</td>  
                        <td>'.$var.'</td>                    
						<td>'.$row->sheetName.'</td>
						<td>'.$row->divisionName.'</td>
						<td>'.$row->gradeName.'</td>
						<td>'.$row->subjectName.'</td>
						<td><a class="'.$file_attachment.'" target="_blank" href="'.base_url('public/upload/sheets/').$row->file_name.'"></a></td>
						<td><a href="#" class="fa fa-edit btn btn-warning btn-xs" onclick="update_sheet('.$row->id.')"></a></td>						
					</tr>
					';  
                    $n++;              
            };            
        }
        echo json_encode($output);			
	}
	function retrive_all_student_files()
	{
        $users = $this->she->retrive_all_student_files();
        $output = "";
        $n=1;
		$output .='';        
        if (count($users)>0) // fill select box
        {
            foreach ($users as $row) {
	        	// check attachment
				if ($row->file_name != "")
				 { $file_attachment = 'fa fa-download btn btn-info btn-xs';
				 } else{$file_attachment = "";}

				$var = $row->dateUpload;
				$var = date("d-m-Y", strtotime($var) );            	
				$output .='
					<tr>
                        <td>'.$n.'</td>  
                        <td>'.$var.'</td>                    
						<td>'.$row->sheetName.'</td>
						<td>'.$row->divisionName.'</td>
						<td>'.$row->gradeName.'</td>
						<td>'.$row->subjectName.'</td>
						<td><a class="'.$file_attachment.'" target="_blank" href="'.base_url('public/upload/sheets/').$row->file_name.'"></a></td>					
					</tr>
					';  
                    $n++;              
            };            
        }
        echo json_encode($output);			
	}	
	function pagination_load_latest_extra_sheet()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = 4;
		$config['per_page'] = 4;
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
			'sss' => $this->pagination->create_links(),
			'latest_extra_sheet_table'	  => $this->she->fetch_details_load_latest_extra_sheet($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_student()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->she->count_all();
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
			'sheet_pagination_link' => $this->pagination->create_links(),
			'sheet_table'	  => $this->she->fetch_details_student($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function retivesubjects()
	{
		$this->load->model('Subject_model');
		$subjects = $this->Subject_model->retivesubjects();
		// subjects
		if (count($subjects)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Subject</option>' ;
			foreach ($subjects as $subject) {
				$pro_select_box .= '<option value="'. $subject->subjectID .'">'.$subject->subjectName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function retivesubjects_teacher()
	{
		$this->load->model('Subject_model');
		$subjects = $this->Subject_model->retivesubjects_teacher();
		// subjects
		if (count($subjects)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Subject</option>' ;
			foreach ($subjects as $subject) {
				$pro_select_box .= '<option value="'. $subject->subjectID .'">'.$subject->subjectName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}	
	function retrivedivision()
	{
		$this->load->model('Division_model');
		$divisions = $this->Division_model->retriveDivisions();
		// divisions
		if (count($divisions)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Division</option>' ;
			foreach ($divisions as $division) {
				$pro_select_box .= '<option value="'. $division->divisionID .'">'.$division->divisionName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function retriveDivisions_teacher()
	{
		$this->load->model('Division_model');
		$divisions = $this->Division_model->retriveDivisions_teacher();
		// divisions
		if (count($divisions)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Division</option>' ;
			foreach ($divisions as $division) {
				$pro_select_box .= '<option value="'. $division->divisionID .'">'.$division->divisionName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}	
	function retrivegrade()
	{
		$this->load->model('Grade_model');
		$grades = $this->Grade_model->retrivegrades();
		// grades
		if (count($grades)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Grade</option>' ;
			foreach ($grades as $grade) {
				$pro_select_box .= '<option value="'. $grade->gradeID .'">'.$grade->gradeName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function retrivegrade_teacher()
	{
		$this->load->model('Grade_model');
		$grades = $this->Grade_model->retrivegrade_teacher();
		// grades
		if (count($grades)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Grade</option>' ;
			foreach ($grades as $grade) {
				$pro_select_box .= '<option value="'. $grade->gradeID .'">'.$grade->gradeName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}	
	function uploadfile()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("divisionID", "Division", 'required');		
		$this->form_validation->set_rules("gradeID", "Grade", 'required');		
		$this->form_validation->set_rules("subjectID", "Subject", 'required');		
		$this->form_validation->set_rules("sheetName", "Sheet Name", 'required');		
		//upload configuration
		$config = array(
			'upload_path' => 'public/upload/sheets/',
			'allowed_types' => 'pdf|doc|docx|gif|jpg|png|jpeg|xls|xlsx',
			'max_siza' => 0,
			'max_filename' => 0,
			'detect_mime' => true,
			'encrypt_name' => false
			);
		$this->load->library('upload',$config);

		if ($this->form_validation->run() == true) 
		{
			if ($this->upload->do_upload('file_name'))
			{
				$result = $this->she->uploadfile();
				$msg['success'] = false;
				if ($result) {
					$msg['success']= true;
				}
				echo json_encode($msg);
			}
			else{
				$msg['error'] = $this->upload->display_errors();
				echo json_encode($msg);
			}
		}
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);			
		}
	}
	function deletesheet()
	{
		//remove file from folder
		$get_file_name = $this->she->getFilenameById();
		@unlink('public/upload/sheets/'.$get_file_name->file_name);
		$result = $this->she->deletesheet();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function updatesheet()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("divisionID_update", "Division", 'required');		
		$this->form_validation->set_rules("gradeID_update", "Grade", 'required');		
		$this->form_validation->set_rules("subjectID_update", "Subject", 'required');		
		$this->form_validation->set_rules("sheetName", "Sheet Name", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->she->updatesheet();
			$msg['success'] = false;
			if ($result) {
				$msg['success']= true;
			}
			echo json_encode($msg);
		}
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);	
		}
	}
	function updatesheet_sheetname()
	{
		$this->load->library('form_validation');
		// form validation	
		$this->form_validation->set_rules("sheetName_update", "Sheet Name", 'required');
		if ($this->form_validation->run() == true) 
		{
			$result = $this->she->updatesheet_sheetname();
			$msg['success'] = false;
			if ($result) {
				$msg['success']= true;
			}
			echo json_encode($msg);
		}
		else
		{
			$msg['success'] = false;
			echo json_encode($msg);	
		}
	}	
	function getdatabyid()
	{
		$result = $this->she->getdatabyid();
		echo json_encode($result);
	}
	function retrivedivisionByid()
	{
		$id = $this->input->get('divi');
		$this->load->model('Division_model');
		$divisions = $this->Division_model->retriveDivisions();
		// grades
		if (count($divisions)>0) // fill select box
		{
			$checked = "";
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Division</option>' ;
			foreach ($divisions as $division) {
				if($division->divisionID == $id){$checked ="selected";}else{$checked="";}
				$pro_select_box .= '<option '. $checked .' value ="'. $division->divisionID .'">'.$division->divisionName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function retrivegradeByid()
	{
		$id = $this->input->get('gra');
		$this->load->model('Grade_model');
		$grades = $this->Grade_model->retrivegrades();
		// grades
		if (count($grades)>0) // fill select box
		{
			$checked = "";
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Grade</option>' ;
			foreach ($grades as $grade) {
				if($grade->gradeID == $id){$checked ="selected";}else{$checked="";}
				$pro_select_box .= '<option '. $checked .' value="'. $grade->gradeID .'">'.$grade->gradeName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}
	}
	function retrivesubjectByid()
	{
		$id = $this->input->get('sub');
		$this->load->model('Subject_model');
		$subjects = $this->Subject_model->retivesubjects();
		// grades
		if (count($subjects)>0) // fill select box
		{
			$checked = "";
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Subject</option>' ;
			foreach ($subjects as $subject) {
				if($subject->subjectID == $id){$checked ="selected";}else{$checked="";}
				$pro_select_box .= '<option '. $checked .' value="'. $subject->subjectID .'">'.$subject->subjectName.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}	
	}
}
 ?>
