<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Studentmarks_model
 */
class Studentmarks_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	// import data
	function insertExceldata($data)
	{
		$this->db->insert_batch('studentmark',$data);
	}
	function count_all_search()
	{
		// get number of rows
		$query = $this->db->get('studentmark');
		return $query->num_rows();
	}	
	function fetch_details_search($limit,$start)
	{
		$divi = $this->input->get('divi');
		$gra = $this->input->get('gra');
		$year = $this->input->get('year');
		$examtype = $this->input->get('extype');
		$output = '';
		$this->db->order_by('percentage');
		$this->db->where(array('divisionID'=>$divi,'gradeID'=>$gra,'yearID'=>$year,'type'=>$examtype));
		$this->db->limit($limit,$start);
		$query = $this->db->get('full_data_student_mark');


		$output .='
			<table class="table table-responsive table-hover">
				<thead>
					<tr class="bgTable">
						<th class="col-lg-4">Student Name</th>
						<th class="col-lg-1">Percentage</th>
						<th class="col-lg-1">Score</th>
						<th class="col-lg-5">Notes</th>
						<th colspan="2" class="col-lg-1">Action</th>
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
				$login_level_update ='update_mark';
				$login_level_delete ='delete_mark';
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
				$output .='
					<tr>
						<td>'.$row->englishName.'</td>
						<td>'.$row->percentage.'</td>
						<td>'.$row->score.'</td>
						<td>'.$row->notes.'</td>
						<td><a href="#" class="glyphicon glyphicon-pencil btn btn-warning" onclick="'. $login_level_update .'('.$row->markID.')"></a></td>
						<td><a href="#" class="glyphicon glyphicon-trash btn btn-danger" onclick="'. $login_level_delete .'('.$row->markID.')"></a></td>
					</tr>
				';
			}
			$output .='</table>';
		}
		else
		{
			$output = '<div class="alert alert-warning">No results found</div>';
		}		

		return $output;
	}	

	// fetch data for student
	function fetch_details_search_student($limit,$start)
	{
		$divi = $_SESSION['divisionID'];
		$gra = $_SESSION['gradeID'];
		$studentID = $_SESSION['studentID'];
		$year = $this->input->get('year');
		$examtype = $this->input->get('extype');
		$output = '';
		$this->db->order_by('percentage');
		$this->db->where(array('divisionID'=>$divi,'gradeID'=>$gra,'yearID'=>$year,'type'=>$examtype, 'studentID' =>$studentID));
		$this->db->limit($limit,$start);
		$query = $this->db->get('full_data_student_mark');

		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='					
				<br>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" center;" name="" readonly="" class="form-control" value="'.$row->notes.'">
							</div>
						</div>	
					</div>				
					<br>
					<div class="row">
						
						<div class="col-lg-6">
							<table class="table table-responsive table-hover ">
								<tr>
									<th>Subject</th><th>Full Mark</th><td>Student Mark</td>
								</tr>				
								<tr>
									<th>A_level</th><th>40</th><td>'.$row->a_level.'</td>
								</tr>
								<tr>
									<th>Arabic</th><th>100</th><td>'.$row->arabic.'</td>
								</tr>
								<tr>
									<th>Math.</th><th>80</th><td>'.$row->math.'</td>
								</tr>
								<tr>
									<th>Science</th><th>40</th><td>'.$row->science.'</td>
								</tr>	
								<tr>
									<th>Social</th><th>40</th><td>'.$row->social.'</td>
								</tr>	
								<tr>
									<th>O Level</th><th>40</th><td>'.$row->o_level.'</td>
								</tr>
								<tr>
									<th>F / G</th><th>40</th><td>'.$row->f_g.'</td>
								</tr>
								<tr>
									<th style="font-weight:bold; color : cornflowerblue;">Total</th><th style="font-weight:bold; color : cornflowerblue;">380</th><td style="font-weight:bold; color : cornflowerblue;">'.$row->total.'</td>
								</tr>
								<tr>
									<th style="font-weight:bold; color : firebrick;">Score</th><th style="font-weight:bold; color : firebrick;">A*</th><td style="font-weight:bold; color : firebrick;">'.$row->score.'</td>
								</tr>
								<tr>
									<th>Percentage</th><th>100%</th><td>'.$row->percentage.'</td>
								</tr>
								<tr>
									<th>Religion</th><th>40</th><td>'.$row->religion.'</td>
								</tr>
								<tr>
									<th>Computer</th><th>20</th><td>'.$row->computer.'</td>
								</tr>
								<tr>
									<th>Art</th><th>20</th><td>'.$row->art.'</td>
								</tr>
								<tr>
									<th>Act.1</th><th>20</th><td>'.$row->act1.'</td>
								</tr>																					
								<tr>
									<th>Act.2</th><th>20</th><td>'.$row->act2.'</td>
								</tr>										
							</table>
						</div>
					</div>

				';
				$output .='
				<br>
				
	 			';
			}			
		}
		else
		{
			$output = '<div class="alert alert-warning">No results found</div>';
		}


		return $output;
	}	

	// fetch data for student
	function fetch_details_search_parent($limit,$start)
	{
		$studentID = $this->input->get('studentID');
		$year = $this->input->get('year');
		$examtype = $this->input->get('extype');
		$output = '';
		$this->db->where(array('yearID'=>$year,'type'=>$examtype, 'studentID' =>$studentID));
		$this->db->limit($limit,$start);
		$query = $this->db->get('full_data_student_mark');

		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='					
				<br>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" center;" name="" readonly="" class="form-control" value="'.$row->notes.'">
							</div>
						</div>	
					</div>				
					<br>
					<div class="row">
						
						<div class="col-lg-6">
							<table class="table table-responsive table-hover ">
								<tr>
									<th>Subject</th><th>Full Mark</th><td>Student Mark</td>
								</tr>				
								<tr>
									<th>A_level</th><th>40</th><td>'.$row->a_level.'</td>
								</tr>
								<tr>
									<th>Arabic</th><th>100</th><td>'.$row->arabic.'</td>
								</tr>
								<tr>
									<th>Math.</th><th>80</th><td>'.$row->math.'</td>
								</tr>
								<tr>
									<th>Science</th><th>40</th><td>'.$row->science.'</td>
								</tr>	
								<tr>
									<th>Social</th><th>40</th><td>'.$row->social.'</td>
								</tr>	
								<tr>
									<th>O Level</th><th>40</th><td>'.$row->o_level.'</td>
								</tr>
								<tr>
									<th>F / G</th><th>40</th><td>'.$row->f_g.'</td>
								</tr>
								<tr>
									<th style="font-weight:bold; color : cornflowerblue;">Total</th><th style="font-weight:bold; color : cornflowerblue;">380</th><td style="font-weight:bold; color : cornflowerblue;">'.$row->total.'</td>
								</tr>
								<tr>
									<th style="font-weight:bold; color : firebrick;">Score</th><th style="font-weight:bold; color : firebrick;">A*</th><td style="font-weight:bold; color : firebrick;">'.$row->score.'</td>
								</tr>
								<tr>
									<th>Percentage</th><th>100%</th><td>'.$row->percentage.'</td>
								</tr>
								<tr>
									<th>Religion</th><th>40</th><td>'.$row->religion.'</td>
								</tr>
								<tr>
									<th>Computer</th><th>20</th><td>'.$row->computer.'</td>
								</tr>
								<tr>
									<th>Art</th><th>20</th><td>'.$row->art.'</td>
								</tr>
								<tr>
									<th>Act.1</th><th>20</th><td>'.$row->act1.'</td>
								</tr>																					
								<tr>
									<th>Act.2</th><th>20</th><td>'.$row->act2.'</td>
								</tr>										
							</table>
						</div>
					</div>

				';
				$output .='
				<br>
				
	 			';
			}			
		}
		else
		{
			$output = '<div class="alert alert-warning">No results found</div>';
		}


		return $output;
	}		
	// language education
	function addnewmark_lang()
	{

		$data = array(
			
			'type'=>$this->input->post('type_name_add_lang'),
			'yearID'=>$this->input->post('academic_name_add_lang'),
			'studentID'=>$this->input->post('student_name_add_lang'),
			'fullmark'=>$this->input->post('fullmark_lang'),
			'a_level'=>$this->input->post('eng_al_lang'),
			'arabic'=>$this->input->post('arabic_lang'),
			'math'=>$this->input->post('math_lang'),
			'science'=>$this->input->post('science_lang'),
			'social'=>$this->input->post('social_lang'),
			'o_level'=>$this->input->post('eng_ol_lang'),
			'f_g'=>$this->input->post('f_g_lang'),
			'total'=>$this->input->post('total_lang'),
			'score'=>$this->input->post('score_lang'),
			'percentage'=>$this->input->post('percentage_lang'),
			'religion'=>$this->input->post('religion_lang'),
			'computer'=>$this->input->post('computer_lang'),
			'art'=>$this->input->post('art_lang'),
			'act1'=>$this->input->post('act1_lang'),
			'act2'=>$this->input->post('act2_lang'),
			'notes'=>$this->input->post('notes_lang')
		);	
		$this->db->insert('studentmark',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else
		{
			return false;
		}		
	}
	// international education
	function addnewmark_int()
	{
		$data = array(
			'type'=>$this->input->post('type_name_add_int'),
			'yearID'=>$this->input->post('academic_name_add_int'),
			'studentID'=>$this->input->post('student_name_add_int'),
			'fullmark'=>$this->input->post('fullmark_int'),
			'a_level'=>$this->input->post('eng_al_int'),
			'arabic'=>$this->input->post('arabic_int'),
			'math'=>$this->input->post('math_int'),
			'science'=>$this->input->post('science_int'),
			'social'=>$this->input->post('social_int'),
			'f_g'=>$this->input->post('f_g_int'),
			'total'=>$this->input->post('total_int'),
			'score'=>$this->input->post('score_int'),
			'percentage'=>$this->input->post('percentage_int'),
			'religion'=>$this->input->post('religion_int'),
			'notes'=>$this->input->post('notes_int')
		);	
		$this->db->insert('studentmark',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else
		{
			return false;
		}		
	}	
	// delete
	function deletemark()
	{
		$id=$this->input->get('id');
		$this->db->where('markID',$id);
		$this->db->delete('studentmark');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}
	}

	function getdatabyid()
	{
		$id = $this->input->get('id');
		$this->db->where('markID',$id);
		$query = $this->db->get('full_data_student_mark');
		if ($query ->num_rows()>0) {
			return $query->row();
		}else{
			return false;
		}
	}

	function updatemarks_lang()
	{
		$id = $this->input->post('markid_lang_update');
		$data = array(	
			'a_level'=>$this->input->post('eng_al_lang_update'),
			'arabic'=>$this->input->post('arabic_lang_update'),
			'math'=>$this->input->post('math_lang_update'),
			'science'=>$this->input->post('science_lang_update'),
			'social'=>$this->input->post('social_lang_update'),
			'o_level'=>$this->input->post('eng_ol_lang_update'),
			'f_g'=>$this->input->post('f_g_lang_update'),
			'total'=>$this->input->post('total_lang_update'),
			'score'=>$this->input->post('score_lang_update'),
			'percentage'=>$this->input->post('percentage_lang_update'),
			'religion'=>$this->input->post('religion_lang_update'),
			'computer'=>$this->input->post('computer_lang_update'),
			'art'=>$this->input->post('art_lang_update'),
			'act1'=>$this->input->post('act1_lang_update'),
			'act2'=>$this->input->post('act2_lang_update'),
			'notes'=>$this->input->post('notes_lang_update')
		);	
		$this->db->where('markID',$id);
		$this->db->update('studentmark',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}		
	}
	
	function updatemarks_int()
	{
		$id = $this->input->post('markid_int_update');
		$data = array(	
			'a_level'=>$this->input->post('eng_al_int_update'),
			'arabic'=>$this->input->post('arabic_int_update'),
			'math'=>$this->input->post('math_int_update'),
			'science'=>$this->input->post('science_int_update'),
			'social'=>$this->input->post('social_int_update'),
			'f_g'=>$this->input->post('f_g_int_update'),
			'total'=>$this->input->post('total_int_update'),
			'score'=>$this->input->post('score_int_update'),
			'percentage'=>$this->input->post('percentage_int_update'),
			'religion'=>$this->input->post('religion_int_update'),
			'notes'=>$this->input->post('notes_int_update')
		);	
		$this->db->where('markID',$id);
		$this->db->update('studentmark',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}		
	}	
}
 ?>