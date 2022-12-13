<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCRMS extends CI_Controller {

// LOGIN
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('login');
		$this->load->view('templates/footer');

	}

	public function login(){
		$this->form_validation->set_rules('id_number', 'ID Number', 'trim|numeric|required'); 
		$this->form_validation->set_rules('password', 'Password', 'trim|required');  
		
		if($this->form_validation->run() == FALSE) {
			$this->index();
		}
		else {
			$data = [
				'id_number' => $this->input->post('id_number'),
				'password' => md5($this->input->post('password')),
			]; 

			$user = new UserModel;
			$result = $user->loginUser($data);

			if($result != FALSE) {
				$this->session->set_userdata('authenticated', $result->user_type_id);
				// set user details
				$this->session->set_userdata('auth_user', $result);
				$this->session->set_flashdata('status', 'Login Success');
				
				if($result->user_type_id == 3) {
					redirect(base_url('admin'));
				}

				redirect(base_url('user'));
			}
			else {
				$this->session->set_flashdata('status', 'Invalid ID Number or Password');
				redirect(base_url('login'));
			}
		}
	}
// FORGOT PASSWORD
    public function forgot()
	{
		$this->load->view('templates/header');
		$this->load->view('forgot');
		$this->load->view('templates/footer');
	}
// SIGNUP
    public function signup()
	{
		$this->load->view('templates/header');
		$this->load->view('signup');
		$this->load->view('templates/footer');
	}
// DASHBOARD
	public function dashboard()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/dashboard');
		$this->load->view('templates/footer');	
	}
// UPLOAD
	public function uploadclass()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/uploadclass');
		$this->load->view('templates/footer');	
	}
// UPLOAD
	public function uploadstudent()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/uploadstudent');
		$this->load->view('templates/footer');	
	}
	
// SETTINGS
	public function settings()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/settings');
		$this->load->view('templates/footer');	
	}
// CLASSRECORD
	public function classrecord()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/classrecord');
		$this->load->view('templates/footer');	
	}
// EXAMINATION
	public function Examination(){
		$data1 = array('Hello World');  
		$data2 = array('Lanete,Jlad');
		$data = array_merge($data1,$data2);   

		$this->load->view('pages/exam');
	}
// ATTENDANCE
	public function attendance(){
		$this->load->view('templates/header');
		$this->load->view('pages/attendance');
		$this->load->view('templates/footer');
	}


}
?>

