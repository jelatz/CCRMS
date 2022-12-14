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

	public function selectPrelimData(){
		$query = $this->db->get('overall_view');
		return $query->result();
	}

	public function selectMidtermData(){
		$query = $this->db->get('overall_view');
		return $query->result();
	}

	public function selectPrefiData(){
		$query = $this->db->get('overall_view');
		return $query->result();
	}

	public function selectFinalData(){
		$query = $this->db->get('overall_view');
		return $query->result();
	}

	public function getDay($instructor_id, $day){
		$this->db->select('*');
		$this->db->from('class_view');
		$this->db->where('instructor_id', $instructor_id);
		$this->db->like('class_day', $day);
		
		$query = $this->db->get();
		return $query->result();
	}
}