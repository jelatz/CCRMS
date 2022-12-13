<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassModel extends CI_Model 
{
	public function getAllClass($instructor_id)
	{
		$this->db->select('*');
		$this->db->from('class_view');
		$this->db->where('instructor_id', $instructor_id);

		$query = $this->db->get();

		return $query;
	}
}