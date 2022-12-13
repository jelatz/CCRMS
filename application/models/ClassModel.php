<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassModel extends CI_Model 
{
	public function getAllClass($subject_id)
	{
		$this->db->select('*');
		$this->db->from('classview');
		$this->db->where('subject_id', $subject_id);

		$query = $this->db->get();

		return $query;
	}
}