<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;


class Uploader extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
	}

	public function StudentTableFormatDownload() 
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="Student Table Format.xlsx"');
		$worksheet = new Spreadsheet();
		$sheet = $worksheet->getActiveSheet();
		$sheet->setCellValue('A1', 'studentid');
		$sheet->setCellValue('B1', 'last_name');
		$sheet->setCellValue('C1', 'first_name');
		$sheet->setCellValue('D1', 'middle_name');
		$sheet->setCellValue('E1', 'email_address');
		$sheet->setCellValue('F1', 'course');
		$sheet->setCellValue('G1', 'year_level');
		$sheet->setCellValue('H1', 'subject_id');

		$writer = new Xlsx($worksheet);
		$writer->save("php://output");
	}

	public function uploadStudents()
	{
		$file = $_FILES['file']['name'];
		$extension = pathinfo($file, PATHINFO_EXTENSION);

		if($extension=='xls') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		} 

		$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
		$sheetdata = $spreadsheet->getActiveSheet()->toArray();
		$sheetcount = count($sheetdata);

		if($sheetcount>1)
		{
			for($i=1; $i < $sheetcount; $i++)
			{
				$studentid  	= $sheetdata[$i][0];
				$last_name   	= $sheetdata[$i][1];
				$first_name  	= $sheetdata[$i][2];
				$middle_name 	= $sheetdata[$i][3];
				$email_address 	= $sheetdata[$i][4];
				$course 	 	= $sheetdata[$i][5];
				$year_level  	= $sheetdata[$i][6];
				$subject_id  	= $sheetdata[$i][7];

				$data[] = array(
					'student_id'  	=> $studentid,
					'last_name'   	=> $last_name,
					'first_name'  	=> $first_name,
					'middle_name' 	=> $middle_name,
					'email_address' => $email_address,
					'course'      	=> $course,
					'year_level'  	=> $year_level,
					'subject_id'  	=> $subject_id,
				);
			}
			
			$this->load->model('uploadermodel');
			$uploader = new UploaderModel();
			$uploadStudents = $uploader->uploadStudents($data);

			if($uploadStudents) {
				echo 'Data uploaded successfully';
			} else {
				echo 'Data not uploaded. Please try again.';
			}
		}
	}

	public function SubjectTableFormatDownload() 
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="Subject Table Format.xlsx"');
		$worksheet = new Spreadsheet();
		$sheet = $worksheet->getActiveSheet();
		$sheet->setCellValue('A1', 'subject_code');
		$sheet->setCellValue('B1', 'subject_description');
		$sheet->setCellValue('C1', 'section');
		$sheet->setCellValue('D1', 'class_time');
		$sheet->setCellValue('E1', 'class_day');
		$sheet->setCellValue('F1', 'room_location');
		$sheet->setCellValue('G1', 'semester');
		$sheet->setCellValue('H1', 'school_year');
		$sheet->setCellValue('I1', 'instructor_id');

		$writer = new Xlsx($worksheet);
		$writer->save("php://output");
	}

	public function uploadSubjects()
	{
		$this->load->model('uploadermodel');
		$uploader = new UploaderModel();

		$file = $_FILES['file']['name'];
		$extension = pathinfo($file, PATHINFO_EXTENSION);

		if($extension=='xls') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		} 

		$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
		$sheetdata = $spreadsheet->getActiveSheet()->toArray();
		$sheetcount = count($sheetdata);

		if($sheetcount>1)
		{
			for($i=1; $i < $sheetcount; $i++)
			{
				$subject_code  		 = $sheetdata[$i][0];
				$subject_description = $sheetdata[$i][1];
				$section 		 	 = $sheetdata[$i][2];
				$class_time 		 = $sheetdata[$i][3];
				$class_day 		 	 = $sheetdata[$i][4];
				$room_location 		 = $sheetdata[$i][5];
				$semester  		 	 = $sheetdata[$i][6];
				$school_year 		 = $sheetdata[$i][7];
				$instructor_id 		 = $sheetdata[$i][8];

				$subject[] = array(
					'subject_code'  		=> $subject_code,
					'subject_description' 	=> $subject_description,
					'section' 				=> $section,
					'class_time' 			=> $class_time,
					'class_day' 			=> $class_day,
					'room_location' 		=> $room_location,
					'semester'  			=> $semester,
					'school_year'   		=> $school_year,
					'instructor_id'   		=> $instructor_id,
				);
			}

			$uploadSubjects = $uploader->uploadSubjects($subject);
			if($uploadSubjects) {
				echo 'Data uploaded successfully';
			} else {
				echo 'Data not uploaded. Please try again.';
			}
		}
	}
}