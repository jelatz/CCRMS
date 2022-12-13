<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model 
{
// LOGIN 
	public function loginUser($data)
	{
		$this->db->select('*');
		$this->db->from('instructor');
		$this->db->where('password', $data['password']);
		$this->db->or_where('instructor_id', $data['instructor_id']);
		$this->db->limit(1);

		$query = $this->db->get();
		
		if ($query->num_rows()== 1) {
			return $query->row();
		}
		else {
			return false;
		}
	}

// CHANGE PASSWORD
public function updateUserPassword($id, $password)
	{
		$query = $this->db->query("UPDATE users SET password = '$password' WHERE user_id = $id");
	
		if ($this->db->affected_rows() == -1) {
			return false;
		}
		else {
			return $query;
		}
	}

// SIGN UP
public function insert($data){
    return $this->db->insert('instructor', $data);
}


    


}