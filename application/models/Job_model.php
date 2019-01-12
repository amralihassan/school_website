<?php 
/**
 * Job_model
 */
class Job_model extends CI_model
{
	
	function __construct()
	{
		Parent :: __construct();
	}
	function addEmployee()
	{
		$data = array
		('full_name' 	=> $this->input->post('full_name'),
		 'mobile' 		=> $this->input->post('mobile'),
		 'id_card' 		=> $this->input->post('id_card'),
		 'email' 		=> $this->input->post('email'),
		 'job_title' 		=> $this->input->post('job_title'),
		 'summary' 		=> $this->input->post('summary'),
		 'file_name'	=> $this->upload->file_name
		);
		$this->db->insert('job',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else
		{
			return false;
		}		
	}
	function retriveAlljobs()
	{
		$query = $this->db->get('vacancy');
	    return $query->result();
		if ($query->num_rows > 0) {
			return $query->result();
		}
		else
		{
			return false;
		}		
	}
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('job');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->order_by('date','desc');
		$this->db->select('*');
		$this->db->from('job');
		// $this->db->order_by('englishName','ASC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		
		$output .='
			<table class="table table-responsive table-hover">
				<thead>
					<tr class="bgTable">
						<th ><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>
						<th>#</th>						
						<th class="col-lg-3">Full Name</th>
						<th class="col-lg-2">Job</th>
			     	    <th class="col-lg-1">Mobile</th>
			     	    <th class="col-lg-5">Summary</th>
			     	    <th class="col-lg-1">View</th>
					</tr>
				</thead>
		';
		$n = 1;
		foreach ($query->result() as $row) 
		{
			
			$output .='
				<tr>
					<td><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
					<td>'.$n.'</td>
					<td>'.$row->full_name.'</td>
					<td>'.$row->job_title.'</td>
					<td>'.$row->mobile.'</td>
					<td>'.$row->summary.'</td>
					<td><a class="fa fa-eye btn btn-info" target="_blank" href="'.base_url('public/upload/job/').$row->file_name.'"></a></td>
				</tr>
			';
			$n++;
		}
		$output .='</table>';

		return $output;
	}	
	function delete_more_one($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('job');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}		
	}
	function getFilenameById($id)
	{
		$this->db->where('id',$id);
		$get_file_name = $this->db->get('job')->row();
		return $get_file_name;
	}		
	function delete_more_one_vacancy($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('vacancy');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}		
	}	
	function addVacabcy()
	{
		$data = array
		('job_title' 	=> $this->input->post('job_title_add'),
		 'experience_from' 		=> $this->input->post('experience_from_add'),
		 'experience_to' 		=> $this->input->post('experience_to_add'),
		 'salary' 		=> $this->input->post('salary_add'),
		 'Vacancies' 		=> $this->input->post('Vacancies_add'),
		 'about' 		=> $this->input->post('about_add')
		);
		$this->db->insert('vacancy',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else
		{
			return false;
		}			
	}
	function count_all_vacancy()
	{
		// get number of rows
		$query = $this->db->get('vacancy');
		return $query->num_rows();
	}
	function fetch_details_vacancy($limit,$start)
	{
		$output = '';
		$this->db->order_by('id','desc');
		$this->db->select('*');
		$this->db->from('vacancy');
		// $this->db->order_by('englishName','ASC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		
		$output .='
			<table class="table table-responsive table-hover">
				<thead>
					<tr class="bgTable">
						<th ><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>
						<th>#</th>						
						<th class="col-lg-2">Job Title</th>
			     	    <th class="col-lg-2">Salary</th>
			     	    <th class="col-lg-2">Job Vacancies</th>
						<th class="col-lg-6">About the job</th>			     	    
						<th>Update</th>			     	    
					</tr>
				</thead>
		';
		$n = 1;
		foreach ($query->result() as $row) 
		{
			
			$output .='
				<tr>
					<td><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
					<td>'.$n.'</td>
					<td>'.$row->job_title.'</td>
					<td>'.$row->salary.'</td>
					<td>'.$row->Vacancies.'</td>
					<td>'.$row->about.'</td>
					<td><a href="#" class="glyphicon glyphicon-pencil btn btn-warning" onclick="update_vacancy('.$row->id.')"></a></td>					
				</tr>
			';
			$n++;
		}
		$output .='</table>';

		return $output;
	}	
	// job applications search	
	function count_all_search()
	{
		// get number of rows
		$value = $this->input->get('name');
		$this->db->like('job_title',$value);
		$this->db->or_like('full_name',$value);
		$query = $this->db->get('job');
		return $query->num_rows();
	}	
	// job applications search
	function fetch_details_search($limit,$start)
	{
		$value = $this->input->get('name');
		$output = '';
		$this->db->order_by('full_name');
		$this->db->like('job_title',$value);
		$this->db->or_like('full_name',$value);
		$this->db->limit($limit,$start);
		$query = $this->db->get('job');
		$output .='
			<table class="table table-responsive table-hover">
				<thead>
					<tr class="bgTable">
						<th ><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>
						<th>#</th>						
						<th class="col-lg-3">Full Name</th>
						<th class="col-lg-2">Job</th>
			     	    <th class="col-lg-1">Mobile</th>
			     	    <th class="col-lg-6">Summary</th>
					</tr>
				</thead>
		';
		$n = 1;
		foreach ($query->result() as $row) 
		{
			
			$output .='
				<tr>
					<td><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
					<td>'.$n.'</td>
					<td>'.$row->full_name.'</td>
					<td>'.$row->job_title.'</td>
					<td>'.$row->mobile.'</td>
					<td>'.$row->summary.'</td>
				</tr>
			';
			$n++;
		}
		$output .='</table>';

		return $output;
	}

	// job vacancy search	
	function count_all_search_vacancy()
	{
		// get number of rows
		$value = $this->input->get('name');
		$this->db->like('job_title',$value);
		$query = $this->db->get('vacancy');
		return $query->num_rows();
	}	
	// job vacancy search
	function fetch_details_search_vacancy($limit,$start)
	{
		$value = $this->input->get('name');
		$output = '';
		$this->db->order_by('job_title');
		$this->db->like('job_title',$value);
		$this->db->limit($limit,$start);
		$query = $this->db->get('vacancy');
		$output .='
			<table class="table table-responsive table-hover">
				<thead>
					<tr class="bgTable">
						<th ><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>
						<th>#</th>						
						<th class="col-lg-2">Job Title</th>
			     	    <th class="col-lg-2">Salary</th>
			     	    <th class="col-lg-2">Job Vacancies</th>
						<th class="col-lg-6">About the job</th>			     	    
						<th>Update</th>			     	    
					</tr>
				</thead>
		';
		$n = 1;
		foreach ($query->result() as $row) 
		{
			
			$output .='
				<tr>
					<td><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
					<td>'.$n.'</td>
					<td>'.$row->job_title.'</td>
					<td>'.$row->salary.'</td>
					<td>'.$row->Vacancies.'</td>
					<td>'.$row->about.'</td>
					<td><a href="#" class="glyphicon glyphicon-pencil btn btn-warning" onclick="update_vacancy('.$row->id.')"></a></td>					
				</tr>
			';
			$n++;
		}
		$output .='</table>';

		return $output;
	}	
	function getdatabyid()
	{
		$id = $this->input->get('id');
		$this->db->where('id',$id);
		$query = $this->db->get('vacancy');
		if ($query ->num_rows()>0) {
			return $query->row();
		}else{
			return false;
		}
	}	
	function updatevacancy()
	{
		$id = $this->input->post('id');
		$data = array
		('job_title' 	=> $this->input->post('job_title_update'),
		 'experience_from' 		=> $this->input->post('experience_from_update'),
		 'experience_to' 		=> $this->input->post('experience_to_update'),
		 'salary' 		=> $this->input->post('salary_update'),
		 'Vacancies' 		=> $this->input->post('Vacancies_update'),
		 'about' 		=> $this->input->post('about_update')
		);
		$this->db->where('id',$id);
		$this->db->update('vacancy',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}			
}
 ?>