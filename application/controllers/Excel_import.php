<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* 	main controller
*/
class Excel_import extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Excel');
		// administrator
		$this->load->model('Administrator_model','admin');
		// student
		$this->load->model('Student_model','stu');
		// marks
		$this->load->model('Studentmarks_model','mark');
		// payments
		$this->load->model('Payments_model','pay');
	}
	// import excel file sheet to mysql database
	function import_students()
	{
		if (isset($_FILES['file']['name'])) {
			$path = $_FILES['file']['tmp_name'];

			$object = PHPExcel_IOFactory::load($path);

			foreach ($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for ($row=2; $row <= $highestRow; $row++)
					{ 
						$arabicName = $worksheet->getCellByColumnAndRow(0,$row)->getValue();
						$englishName = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
						$studentID = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
						$Nationality = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
						$divisionID = $worksheet->getCellByColumnAndRow(4,$row)->getValue();
						$gradeID = $worksheet->getCellByColumnAndRow(5,$row)->getValue();
						$roomID = $worksheet->getCellByColumnAndRow(6,$row)->getValue();
						$studentIDcard = $worksheet->getCellByColumnAndRow(7,$row)->getValue();
						$fatherIDcard = $worksheet->getCellByColumnAndRow(8,$row)->getValue();
						$fatherJob = $worksheet->getCellByColumnAndRow(9,$row)->getValue();
						$motherName = $worksheet->getCellByColumnAndRow(10,$row)->getValue();
						$status = $worksheet->getCellByColumnAndRow(11,$row)->getValue();
						$username = $worksheet->getCellByColumnAndRow(12,$row)->getValue();
						$password = $worksheet->getCellByColumnAndRow(13,$row)->getValue();
						$fatherMobile = $worksheet->getCellByColumnAndRow(14,$row)->getValue();
						$motherMobile = $worksheet->getCellByColumnAndRow(15,$row)->getValue();
						$student_status = $worksheet->getCellByColumnAndRow(16,$row)->getValue();
						$secondLanguage = $worksheet->getCellByColumnAndRow(17,$row)->getValue();
						$stage = $worksheet->getCellByColumnAndRow(18,$row)->getValue();
						$data[] = array(
							// database columns => variables
							'arabicName'		=> $arabicName,
							'englishName'		=> $englishName,
							'studentID'			=> $studentID,
							'Nationality'		=> $Nationality,
							'divisionID'		=> $divisionID,
							'gradeID'			=> $gradeID,
							'roomID'			=> $roomID,
							'studentIDcard '	=> $studentIDcard,
							'fatherIDcard'		=> $fatherIDcard,
							'fatherJob'			=> $fatherJob,
							'motherName'		=> $motherName,
							'status'		 	=> $status,
							'username'			=> $username,
							'password'			=> $password,
							'fatherMobile'		=> $fatherMobile,
							'motherMobile'		=> $motherMobile,
							'student_status'	=> $student_status,
							'secondLanguage'	=> $secondLanguage,
							'stage'	=> $stage
						);
					}	
			}
			$this->stu->insertExceldata($data);
			echo "Data Imported Successfully";
		}
	}
	function import_studentmarks()
	{
		if (isset($_FILES['file']['name'])) {
			$path = $_FILES['file']['tmp_name'];

			$object = PHPExcel_IOFactory::load($path);

			foreach ($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for ($row=2; $row <= $highestRow; $row++)
					{ 
						$type = $worksheet->getCellByColumnAndRow(0,$row)->getValue();
						$yearID = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
						$studentID = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
						$fullmark = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
						$a_level = $worksheet->getCellByColumnAndRow(4,$row)->getValue();
						$arabic = $worksheet->getCellByColumnAndRow(5,$row)->getValue();
						$math = $worksheet->getCellByColumnAndRow(6,$row)->getValue();
						$science = $worksheet->getCellByColumnAndRow(7,$row)->getValue();
						$social = $worksheet->getCellByColumnAndRow(8,$row)->getValue();
						$o_level = $worksheet->getCellByColumnAndRow(9,$row)->getValue();
						$f_g = $worksheet->getCellByColumnAndRow(10,$row)->getValue();
						$total = $worksheet->getCellByColumnAndRow(11,$row)->getValue();
						$score = $worksheet->getCellByColumnAndRow(12,$row)->getValue();
						$percentage = $worksheet->getCellByColumnAndRow(13,$row)->getValue();
						$total1 = $worksheet->getCellByColumnAndRow(14,$row)->getValue();
						$total2 = $worksheet->getCellByColumnAndRow(15,$row)->getValue();
						$percentage = $worksheet->getCellByColumnAndRow(16,$row)->getValue();
						$score = $worksheet->getCellByColumnAndRow(17,$row)->getValue();
						$notes = $worksheet->getCellByColumnAndRow(18,$row)->getValue();
						$type = $worksheet->getCellByColumnAndRow(19,$row)->getValue();
						$data[] = array(
							// database columns => variables
							'type'				=> $type,
							'yearID'			=> $yearID,
							'studentID'			=> $studentID,
							'fullmark'			=> $fullmark,
							'a_level'			=> $a_level,
							'arabic'			=> $arabic,
							'math'				=> $math,
							'science '			=> $science,
							'social'			=> $social,
							'o_level'			=> $o_level,
							'f_g'				=> $f_g,
							'total'		 		=> $total,
							'score'				=> $score,
							'percentage'		=> $percentage,
							'religion'			=> $religion,
							'computer'			=> $computer,
							'art'				=> $art,
							'act1'				=> $act1,
							'act2'				=> $act2,
							'notes'				=> $notes
						);
					}	
			}
			$this->mark->insertExceldata($data);
			echo "Data Imported Successfully";
		}		
	}
	function import_payments()
	{
		if (isset($_FILES['file']['name'])) {
			$path = $_FILES['file']['tmp_name'];

			$object = PHPExcel_IOFactory::load($path);

			foreach ($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for ($row=2; $row <= $highestRow; $row++)
					{ 
						// convert string date comes from excel sheet to date type
						$cellValue = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
			            $dateValue = PHPExcel_Shared_Date::ExcelToPHP($cellValue);                        
           				$date_action =  date('Y-m-d',$dateValue); 
						$student_ID = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
						$amount = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
						$reason = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
						$receipt_no = $worksheet->getCellByColumnAndRow(4,$row)->getValue();

						
						$data[] = array(
							// database columns => variables
							//
							'date_action'		=> $date_action,
							'student_ID'		=> $student_ID,
							'amount'			=> $amount,
							'reason'			=> $reason,
							'receipt_no'		=> $receipt_no
						
						);
					}	
			}
			$this->pay->insertExceldata($data);
			echo "Data Imported Successfully";
		}		
	}	
}
?>