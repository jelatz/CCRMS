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

	public function updateUserPassword($instructor_id, $password)
	{
		$query = $this->db->query("UPDATE instructor SET password = '$password' WHERE instructor_id = $instructor_id");
	
		if ($this->db->affected_rows() == -1) {
			return false;
		}
		else {
			return $query;
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
		$this->db->from('student_view');
		$this->db->where('subject_id', $subject_id);
		$this->db->order_by('subject');

		$query = $this->db->get();

		return $query;
	}

}