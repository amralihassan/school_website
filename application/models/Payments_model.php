<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * Payments_model
 */
class Payments_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function count_all_parent()
	{
		// get number of rows
		$query = $this->db->get('full_data_payments');
		return $query->num_rows();
	}	
	function retrive_all_payments()
	{
		$query = $this->db->get('full_data_payments');
		return $query->result();
	}			
	// fetch data for parent
	function fetch_details_search_parent($limit,$start)
	{
		$studentID = $this->input->get('studentID');

		$output = '';
		$this->db->order_by('date_action');
		$this->db->where(array('student_ID' =>$studentID));
		$this->db->limit($limit,$start);
		$query = $this->db->get('full_data_payments');
		$n=1;
		$output .='
			<table class="table table-responsive table-hover table-bordered">
				<thead>
					<tr class="bgTable">
						<th class="col-lg-1">No.</th>
						<th class="col-lg-2">Date</th>
						<th class="col-lg-3">Receipt No.</th>
						<th class="col-lg-3">Amount</th>
						<th class="col-lg-3">For</th>
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$var = $row->date_action;
				$var = date("d-m-Y", strtotime($var) ); 				
				$output .='
					<tr>
						<td>'.$n.'</td>
						<td>'.$var.'</td>
						<td>'.$row->receipt_no.'</td>
						<td>'.$row->amount.'</td>
						<td>'.$row->reason.'</td>
					</tr>
				';
				$n++;
			}	
			$output .='</table>';					
		}
		else
		{
			$output = '<div class="alert alert-warning">No results found</div>';
		}


		return $output;
	}	
	function deletepayment()
	{
		if ($_GET['id'])
		{
			$id=filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$this->db->delete('payments');
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}			
		}
	}				
	// Inset excel data
	function insertExceldata($data)
	{
		$this->db->insert_batch('payments',$data);
	}	
	function addpayments()
	{
		if (isset($_POST['date_action_add']) && isset($_POST['student_ID_add']) && isset($_POST['amount_add']) && isset($_POST['reason_add']) && isset($_POST['receipt_no_add']))
		{
			$data = array(
				'date_action'=>filter_var($this->input->post('date_action_add'),FILTER_SANITIZE_STRING),
				'student_ID'=>filter_var($this->input->post('student_ID_add'),FILTER_SANITIZE_NUMBER_INT),
				'amount'=>filter_var($this->input->post('amount_add'),FILTER_SANITIZE_NUMBER_INT),
				'reason'=>filter_var($this->input->post('reason_add'),FILTER_SANITIZE_STRING),
				'receipt_no'=>filter_var($this->input->post('receipt_no_add'),FILTER_SANITIZE_NUMBER_INT)
			);
			$this->db->insert('payments',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}
		}
	}	
	function updatepayment()
	{
		if (isset($_POST['id_update']) && isset($_POST['date_action_update']) && isset($_POST['amount_update']) && isset($_POST['reason_update']) && isset($_POST['receipt_no_update']))
		{
			$id = filter_var($this->input->post('id_update'),FILTER_SANITIZE_NUMBER_INT);
			$data = array(
				'date_action'=>filter_var($this->input->post('date_action_update'),FILTER_SANITIZE_STRING),
				'amount'=>filter_var($this->input->post('amount_update'),FILTER_SANITIZE_NUMBER_INT),
				'reason'=>filter_var($this->input->post('reason_update'),FILTER_SANITIZE_STRING),
				'receipt_no'=>filter_var($this->input->post('receipt_no_update'),FILTER_SANITIZE_NUMBER_INT)
			);
			$this->db->where('id',$id);
			$this->db->update('payments',$data);
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
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$query = $this->db->get('payments');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}	
}
 ?>