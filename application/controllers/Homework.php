<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Homework controller
*/
class Homework extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Homework_model','hw');
	}
	function loadhomework()
	{
		$data['pagetitle'] = 'Homework';
		$data['page']=$this->load->view('hw/homework_view',NULL,TRUE);
		echo json_encode($data);
	}
	function load_teacher_homework()
	{
		$data['pagetitle'] = 'Homework';
		$data['page']=$this->load->view('hw/homework_teacher_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function load_parent_homework()
	{
		$data['pagetitle'] = 'Homework';
		$data['page']=$this->load->view('hw/homework_parent_view',NULL,TRUE);
		echo json_encode($data);
	}	
	function load_update_page()
	{
		$data['pagetitle'] = 'Edit Homework Mark';
		$data['page']=$this->load->view('hw/gradable_view',NULL,TRUE);
		echo json_encode($data);			
	}	
	function pagination()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->hw->count_all();
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
			'homework_pagination_link' => $this->pagination->create_links(),
			'homework_table'	  => $this->hw->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->hw->count_all_search();
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
			'homework_pagination_link' => $this->pagination->create_links(),
			'homework_table'	  => $this->hw->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}			
    function retrive_all_hw()
    {
        $users = $this->hw->retrive_all_hw();
        $output = "";
		$file_attachment ='';        
        if (count($users)>0) // fill select box
        {
            foreach ($users as $row) {
            	// login level
				$login_level_update ='';
				$login_level_delete ='';
				if ( 'Super Administrator' == $_SESSION['loginlevel']) 
				{
					$login_level_update ='update_homework';
					$login_level_delete ='delete_homework';
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
				// gradable
				$gradable = '';
				if ('True' == $row->gradable)
				{
					$gradable = '<a href="#" onclick="gradable('.$row->hwID.')">Insert Mark</a>';
				}
				else
				{
					$gradable = '-';
				}
	        	// check attachment
				if ($row->file_name != "")
				 { $file_attachment = '<a target="_blank" href="'.base_url('public/upload/sheets/').$row->file_name.'">'.$row->Details.'</a>';
				 } else{$file_attachment = $row->Details;}
				 
				$var = $row->dateHW;
				$var = date("d-m-Y", strtotime($var) ); 			            	
				$output .='
					<tr>
	                    <td>'.$var.'</td>                    
						<td>'.$row->subjectName.'</td>
						<td>'.$row->roomName.'</td>
						<td>'.$file_attachment.'</td>
						<td>'.$row->fullName.'</td>
						<td><a href="#" class="fa fa-edit btn btn-warning btn-xs" onclick="'. $login_level_update .'('.$row->hwID.')"></a></td>
						<td><a href="#" class="fa fa-trash btn btn-danger btn-xs" onclick="'. $login_level_delete .'('.$row->hwID.')"></a></td>
						<td>'.$gradable.'</td>					

					</tr>
					';              
            };            
        }
        echo json_encode($output);
    }
    function retrive_all_hw_student()
    {
        $users = $this->hw->retrive_all_hw_student();
        $output = "";
		$file_attachment ='';        
        if (count($users)>0) // fill select box
        {
            foreach ($users as $row) {
	        	// check attachment
				if ($row->file_name != "")
				 { $file_attachment = '<a target="_blank" href="'.base_url('public/upload/sheets/').$row->file_name.'"<i class="fa fa-download"></i></a>';
				 } else{$file_attachment = '';}
				 
				$var = $row->dateHW;
				$var = date("d-m-Y", strtotime($var) ); 			            	
				$output .='
					<tr>
	                    <td>'.$var.'</td>                    
						<td>'.$row->subjectName.'</td>
						<td>'.$row->Details.'</td>
						<td>'.$row->fullMark.'</td>
						<td>'.$row->mark.'</td>
						<td>'.$row->statusMark.'</td>
						<td>'.$row->notes.'</td>	
						<td>'.$file_attachment.'</td>										
					</tr>
					';              
            };            
        }
        echo json_encode($output);
    }    
	function retrive_all_hw_teacher()
	{
        $users = $this->hw->retrive_all_hw_teacher();
        $output = "";
		$file_attachment ='';        
        if (count($users)>0) // fill select box
        {
            foreach ($users as $row) {
        	// check attachment
			if ($row->file_name != "")
			 { $file_attachment = 'fa fa-download btn btn-info btn-xs';
			 } else{$file_attachment = "";}
			 
			$var = $row->dateHW;
			$var = date("d-m-Y", strtotime($var) ); 
			// gradable
			$gradable = '';
			if ('True' == $row->gradable)
			{
				$gradable = '<a href="#" onclick="gradable('.$row->hwID.')">Insert Mark</a>';
			}
			else
			{
				$gradable = '-';
			}						            	
			$output .='
				<tr>
                    <td>'.$var.'</td>                    
					<td>'.$row->subjectName.'</td>
					<td>'.$row->roomName.'</td>
					<td>'.$row->Details.'</td>
					<td><a class="'.$file_attachment.'" target="_blank" href="'.base_url('public/upload/sheets/').$row->file_name.'"></a></td>
					<td><a href="#" class="fa fa-edit btn btn-warning btn-xs" onclick="update_homework('.$row->hwID.')"></a></td>	
					<td>'.$gradable.'</td>				
				</tr>
				';              
            };            
        }
        echo json_encode($output);		
	}     	 	
	function load_student_homework()
	{
		$data['pagetitle'] = 'Homework';
		$data['page']=$this->load->view('student/student_homework_view',NULL,TRUE);
		echo json_encode($data);		
	}
	function pagination_class_gradable()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] =40;
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
			'xxx' => $this->pagination->create_links(),
			'class_table'	  => $this->hw->fetch_details_class_gradable($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_gradable_homework_student()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] =$this->hw->count_all_hw_student();
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
			'gradable_homework_table_pagination' => $this->pagination->create_links(),
			'gradable_homework_table'	  => $this->hw->fetch_details_gradable_homework_student($config['per_page'],$start)
		);
		echo json_encode($output);
	}	
	function pagination_view_homework_student()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] =40;
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
			'view_homework_table_pagination' => $this->pagination->create_links(),
			'view_homework_table'	  => $this->hw->fetch_details_view_homework_student($config['per_page'],$start)
		);
		echo json_encode($output);
	}		
	function insertMarks()
	{
		$result = $this->hw->insertMarks();
		echo json_encode($result);		
	}
	function pagination_homework_gradable()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] =40;
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
			'xxx' => $this->pagination->create_links(),
			'homework_table'	  => $this->hw->fetch_details_homework($config['per_page'],$start)
		);
		echo json_encode($output);
	}		
	function pagination_student_homework()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->hw->count_all();
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
			'student_homework_pagination_link' => $this->pagination->create_links(),
			'student_homework_table'	  => $this->hw->fetch_details_student_homework($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function addhomework()
	{
		$this->load->library('form_validation');
		// form validation

		$this->form_validation->set_rules("dateHW", "Date", 'required');
		$this->form_validation->set_rules("subjectID", "Subject", 'required');
		$this->form_validation->set_rules("roomID_add", "Class", 'required');
		$this->form_validation->set_rules("Details", "Deatils", 'required');

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
				$result = $this->hw->addhomework();
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
	function addhomework_no_attachement()
	{
		$this->load->library('form_validation');
		// form validation

		$this->form_validation->set_rules("dateHW", "Date", 'required');
		$this->form_validation->set_rules("subjectID", "Subject", 'required');
		$this->form_validation->set_rules("roomID_add", "Class", 'required');
		$this->form_validation->set_rules("Details", "Deatils", 'required');

		if ($this->form_validation->run() == true) 
		{
			$result = $this->hw->addhomework_no_attachement();
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
		// divisions
		if (count($subjects)>0) // fill select box
		{
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Subject</option>' ;
			foreach ($subjects as $sub) {
				$pro_select_box .= '<option value="'. $sub->subjectID .'">'.$sub->subjectName.'</option>' ;
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
	function deletehomework()
	{
		$result = $this->hw->deletehomework();
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);
	}
	function updatehomework()
	{
		$this->load->library('form_validation');
		// form validation

		$this->form_validation->set_rules("dateHW_update", "Homework Date", 'required');
		$this->form_validation->set_rules("subjectID_update", "Subject", 'required');
		$this->form_validation->set_rules("roomID_update", "Class", 'required');
		$this->form_validation->set_rules("Details_update", "Deatils", 'required');

		if ($this->form_validation->run() == true)
		{
			$result = $this->hw->updatehomework();
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
	function updatehomework_teacher()
	{
		$this->load->library('form_validation');
		// form validation
		$this->form_validation->set_rules("Details_update", "Homework", 'required');

		if ($this->form_validation->run() == true)
		{
			$result = $this->hw->updatehomework_teacher();
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
	function editMark()
	{
		$this->load->library('form_validation');
		// form validation

		$this->form_validation->set_rules("fullMark_edit", "Full Mark", 'required');
		$this->form_validation->set_rules("mark_edit", "Mark", 'required');
		$this->form_validation->set_rules("statusMark_edit", "Status", 'required');
		$result ='eee';
		if ($this->form_validation->run() == true)
		{
			$result = $this->hw->editMark();
			echo json_encode($result);
		}
		else
		{
			echo json_encode($result);	
		}
	}	
	function retrive_teacher_homework()
	{
		$homework = $this->hw->retrive_teacher_homework();
		// grades
		if (count($homework)>0) // fill select box
		{
			$checked = "";
			$pro_select_box = "";
			$pro_select_box .= '<option value="">Select Homework</option>' ;
			foreach ($homework as $home) {
				$pro_select_box .= '<option value="'. $home->hwID .'">'.$home->Details.'</option>' ;
			}
			echo json_encode($pro_select_box);
		}		
	}
	function getdatabyid()
	{
		$result = $this->hw->getdatabyid();
		echo json_encode($result);
	}
	function get_student_mark_id()
	{
		$result = $this->hw->get_student_mark_id();
		echo json_encode($result);
	}	
	function retrivedivisionByid_teacher()
	{
		if ($_GET['divi'])
		{
			$id = filter_var($this->input->get('divi'),FILTER_SANITIZE_NUMBER_INT);
			$this->load->model('Division_model');
			$divisions = $this->Division_model->retrivedivision_private();
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
	}
	function retrivegradeByid_teacher()
	{
		if ($_GET['gra'])
		{
			$id = filter_var($this->input->get('gra'),FILTER_SANITIZE_NUMBER_INT);
			$this->load->model('Grade_model');
			$grades = $this->Grade_model->retrivegrade_private();
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
	}
	function retriveroomByid_teacher()
	{
		if ($_GET['rom'])
		{
			$id = filter_var($this->input->get('rom'),FILTER_SANITIZE_NUMBER_INT);
			$this->load->model('Room_model');
			$rooms = $this->Room_model->retriveroom_private();
			// grades
			if (count($rooms)>0) // fill select box
			{
				$checked = "";
				$pro_select_box = "";
				$pro_select_box .= '<option value="">Select Room</option>' ;
				foreach ($rooms as $room) {
					if($room->roomID == $id){$checked ="selected";}else{$checked="";}
					$pro_select_box .= '<option '. $checked .' value="'. $room->roomID .'">'.$room->roomName.'</option>' ;
				}
				echo json_encode($pro_select_box);
			}
		}	
	}
	function retrivesubjectByid_teacher()
	{
		if ($_GET['sub'])
		{
			$id = filter_var($this->input->get('sub'),FILTER_SANITIZE_NUMBER_INT);
			$this->load->model('Subject_model');
			$subjects = $this->Subject_model->retivesubjects_teacher();
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
	function retrivedivisionByid()
	{
		if ($_GET['divi'])
		{
			$id = filter_var($this->input->get('divi'),FILTER_SANITIZE_NUMBER_INT);
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
	}
	function retrivegradeByid()
	{
		if ($_GET['gra'])
		{
			$id = filter_var($this->input->get('gra'),FILTER_SANITIZE_NUMBER_INT);
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
	}
	function retriveroomByid()
	{
		if ($_GET['rom'])
		{
			$id = filter_var($this->input->get('rom'),FILTER_SANITIZE_NUMBER_INT);
			$this->load->model('Room_model');
			$rooms = $this->Room_model->retriveroom();
			// grades
			if (count($rooms)>0) // fill select box
			{
				$checked = "";
				$pro_select_box = "";
				$pro_select_box .= '<option value="">Select Room</option>' ;
				foreach ($rooms as $room) {
					if($room->roomID == $id){$checked ="selected";}else{$checked="";}
					$pro_select_box .= '<option '. $checked .' value="'. $room->roomID .'">'.$room->roomName.'</option>' ;
				}
				echo json_encode($pro_select_box);
			}
		}	
	}
	function retrivesubjectByid()
	{
		if ($_GET['sub'])
		{
			$id = filter_var($this->input->get('sub'),FILTER_SANITIZE_NUMBER_INT);
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
}
 ?>