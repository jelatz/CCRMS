<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploaderModel extends CI_Model 
{
	public function uploadStudents($data)
	{
		$this->db->insert_batch('student', $data);
		if($this->db->affected_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	public function uploadSubjects($data)
	{
		$this->db->insert_batch('subject', $data);
		if($this->db->affected_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
}