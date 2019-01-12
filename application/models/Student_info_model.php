<?php 
/**
 * Student_info_model
 */
class Student_info_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function count_all_search_by_room()
	{
		// get number of rows
		$division = $this->input->get('divi');
		$grade = $this->input->get('gra');
		$this->db->where(array('division'=>$division,'grade'=>$grade));
		$query = $this->db->get('student_info');
		return $query->num_rows();
	}

	function fetch_details_search_by_room($limit,$start)
	{
		$division = $this->input->get('divi');
		$grade = $this->input->get('gra');
		$output = '';
		$this->db->order_by('id');
		$this->db->where(array('division'=>$division,'grade'=>$grade));
	
		$this->db->limit($limit,$start);
		$query = $this->db->get('student_info');
		foreach ($query->result() as $row) 
		{
			$output .='
					<div class="col-lg-3 col-md-3 col-md-6">
					
				  <div class="card" style="width:170px height:170px;">
				    <img width="150px" height="200px" class="card-img-top" src="'. base_url().'/public/upload/student_photo/'. $row->file_name .'" alt="Card image">
				    <div class"row">
				    	<div class"col-lg-12" style="height:110px;">
						    <div class="card-body">
						      <h4 class="card-title" style="font-size:15px; font-weight:bold;color:red;">'.$row->student_name.'</h4>
						      <label class="card-text">'.$row->father_name.' '.$row->grand_name.' '.$row->last_name.'</label><br>
						      <label class="card-text">'.$row->division.'</label>				      
						      <p class="card-text">F: '.$row->father_mobile.'<br> M:'.$row->mother_mobile.'</p>
						    </div>
				    	</div>
				    </div>
					<div class"row">
				    	<div class"col-lg-12">
						    <div class="card-body">
						      <a href="#" class="fa fa-eye btn btn-info" style="text-align:center;margin-bottom:15px;" onclick="show_details('.$row->id.')"></a>
						    </div>
				    	</div>
				    </div>

				  </div>
				</div>
			';				
		}
		return $output;
	}		
	function add_student_information()
	{
		$data = array
		('student_english_name' => $this->input->post('student_english_name'),
		 'student_name' 	=> $this->input->post('student_name'),
		 'father_name' 		=> $this->input->post('father_name'),
		 'grand_name' 		=> $this->input->post('grand_name'),
		 'last_name' 		=> $this->input->post('last_name'),
		 'gender' 			=> $this->input->post('gender'),
		 'religion' 		=> $this->input->post('religion'),
		 'date_birth' 		=> $this->input->post('date_birth'),
		 'nationality' 		=> $this->input->post('nationality'),
		 'student_idcard' 	=> $this->input->post('student_idcard'),
		 'division' 		=> $this->input->post('division'),
		 'grade' 			=> $this->input->post('grade'),		 
		 'second_language' 	=> $this->input->post('second_language'),
		 'father_idcard' 	=> $this->input->post('father_idcard'),
		 'father_job' 		=> $this->input->post('father_job'),
		 'home_no' 			=> $this->input->post('home_no'),
		 'streat_name' 		=> $this->input->post('streat_name'),
		 'area' 			=> $this->input->post('area'),
		 'government' 		=> $this->input->post('government'),
		 'mother_name' 		=> $this->input->post('mother_name'),
		 'home_phone' 		=> $this->input->post('home_phone'),
		 'father_mobile' 	=> $this->input->post('father_mobile'),		 		 
		 'mother_mobile' 	=> $this->input->post('mother_mobile'),		 		 
		 'file_name'	=> $this->upload->file_name
		);

		$this->db->where('student_idcard',$this->input->post('student_idcard'));
		$query = $this->db->get('student_info');
		if ($query ->num_rows()>0) {
			return false;
		}else{
			
			$this->db->insert('student_info',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}				
		}		
	}
	function getdatabyid()
	{
		$id = $this->input->get('id');
		$this->db->where('student_idcard',$id);
		$query = $this->db->get('student_info');
		if ($query ->num_rows()>0) {
			return $query->row();
		}else{
			return false;
		}
	}	


	function add_new_registration()
	{
		$data = array
		('father_idcard' => $this->input->post('father_idcard_registrtion'),
		 'email' 	=> $this->input->post('email'),
		 'password' 		=> $this->input->post('password')
		);	
		$this->db->where('father_idcard',$this->input->post('father_idcard_registrtion'));
		$query = $this->db->get('parents_registration');
		if ($query ->num_rows()>0) {
			return false;
		}else{
			
			$this->db->insert('parents_registration',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}				
		}				
	}
	function getdatabyid_registration()
	{
		$id = $this->input->get('id');
		$this->db->where('father_idcard',$id);
		$query = $this->db->get('parents_registration');
		if ($query ->num_rows()>0) {
			return $query->row();
		}else{
			return false;
		}
	}
	function getdatabyid_student()
	{
		$id = $this->input->get('id');
		$this->db->where('id',$id);
		$query = $this->db->get('student_info');
		if ($query ->num_rows()>0) {
			return $query->row();
		}else{
			return false;
		}
	}		
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('student_info');
		return $query->num_rows();
	}	
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->select('*');
		$this->db->from('student_info');
		$this->db->order_by('id');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		foreach ($query->result() as $row) 
		{
			$output .='
					<div class="col-lg-3 col-md-3 col-md-6">
					
				  <div class="card" style="width:170px;">
				    <img width="150px" height="200px" class="card-img-top" src="'. base_url().'/public/upload/student_photo/'. $row->file_name .'" alt="Card image">
				    <div class"row">
				    	<div class"col-lg-12" style="height:110px;">
						    <div class="card-body">
						      <h4 class="card-title" style="font-size:15px; font-weight:bold;color:red;">'.$row->student_name.'</h4>
						      <label class="card-text">'.$row->father_name.' '.$row->grand_name.' '.$row->last_name.'</label><br>
						      <label class="card-text">'.$row->division.'</label>				      
						      <p class="card-text">F: '.$row->father_mobile.'<br> M:'.$row->mother_mobile.'</p>
						    </div>
				    	</div>
				    </div>
					<div class"row">
				    	<div class"col-lg-12">
						    <div class="card-body">
						      <a href="#" class="fa fa-eye btn btn-info" style="text-align:center;margin-bottom:15px;" onclick="show_details('.$row->id.')"></a>
						    </div>
				    	</div>
				    </div>

				  </div>
				</div>
			';				
		}

	

		return $output;
	}	
	function count_all_search()
	{
		// get number of rows
		$value = $this->input->get('name');
		$this->db->like('student_name',$value);
		$this->db->or_like('father_name',$value);
		$this->db->or_like('grand_name',$value);
		$this->db->or_like('last_name',$value);
		$this->db->or_like('division',$value);
		$this->db->or_like('grade',$value);
		$this->db->or_like('nationality',$value);
		$this->db->or_like('student_idcard',$value);
		$this->db->or_like('father_idcard',$value);
		$this->db->or_like('father_job',$value);
		$this->db->or_like('streat_name',$value);
		$this->db->or_like('area',$value);
		$this->db->or_like('mother_name',$value);
		$this->db->or_like('home_phone',$value);
		$this->db->or_like('father_mobile',$value);
		$this->db->or_like('mother_mobile',$value);
		$query = $this->db->get('student_info');
		return $query->num_rows();
	}	
	function fetch_details_search($limit,$start)
	{
		$value = $this->input->get('name');
		$output = '';
		$this->db->order_by('id');
		$this->db->like('student_name',$value);
		$this->db->or_like('father_name',$value);
		$this->db->or_like('grand_name',$value);
		$this->db->or_like('last_name',$value);
		$this->db->or_like('division',$value);
		$this->db->or_like('grade',$value);
		$this->db->or_like('nationality',$value);
		$this->db->or_like('student_idcard',$value);
		$this->db->or_like('father_idcard',$value);
		$this->db->or_like('father_job',$value);
		$this->db->or_like('streat_name',$value);
		$this->db->or_like('area',$value);
		$this->db->or_like('mother_name',$value);
		$this->db->or_like('home_phone',$value);
		$this->db->or_like('father_mobile',$value);
		$this->db->or_like('mother_mobile',$value);
		$this->db->limit($limit,$start);
		$query = $this->db->get('student_info');
		foreach ($query->result() as $row) 
		{
			$output .='
					<div class="col-lg-3 col-md-3 col-md-6">
					
				  <div class="card" style="width:170px;">
				    <img width="150px" height="200px" class="card-img-top" src="'. base_url().'/public/upload/student_photo/'. $row->file_name .'" alt="Card image">
				    <div class"row">
				    	<div class"col-lg-12" style="height:110px;">
						    <div class="card-body">
						      <h4 class="card-title" style="font-size:15px; font-weight:bold;color:red;">'.$row->student_name.'</h4>
						      <label class="card-text">'.$row->father_name.' '.$row->grand_name.' '.$row->last_name.'</label><br>
						      <label class="card-text">'.$row->division.'</label>				      
						      <p class="card-text">F: '.$row->father_mobile.'<br> M:'.$row->mother_mobile.'</p>
						    </div>
				    	</div>
				    </div>
					<div class"row">
				    	<div class"col-lg-12">
						    <div class="card-body">
						      <a href="#" class="fa fa-eye btn btn-info" style="text-align:center;margin-bottom:15px;" onclick="show_details('.$row->id.')"></a>
						    </div>
				    	</div>
				    </div>

				  </div>
				</div>
			';				
		}
		return $output;
	}	

}
 ?>