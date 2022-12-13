<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model 
{

	public function loginUser($data)
	{
		$this->db->select('*');
		$this->db->from('instructor');
		$this->db->where('password', $data['password']);
		$this->db->where('instructor_id', $data['id_number']);
		$this->db->limit(1);

		$query = $this->db->get();
		
		if ($query->num_rows()== 1) {
			return $query->row();
		}
		else {
			return false;
		}
	}

	public function getAllClass($instructor_id)
	{
		$this->db->select('*');
		$this->db->from('class_view');
		$this->db->where('instructor_id', $instructor_id);

		$query = $this->db->get();

		return $query;
	}

	public function getAllStudent($subject_id)
	{
		$this->db->select('*');
		$this->db->from('class_view');
		$this->db->where('subject_id', $subject_id);

		$query = $this->db->get();

		return $query;
	}

}