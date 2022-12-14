<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCRMS extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();

		if(!$this->session->has_userdata('authenticated'))
		{
			// $this->session->set_flashdata('status', 'You are already logged in');

			redirect(base_url('login'));
		}
		
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');

	}

	public function changepassword()
	{
		$this->load->model('usermodel'); 

		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required'); 
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');  
		
		if($this->form_validation->run() == FALSE) {
			$this->settings();
		}
		else {
			$instructor_id = $this->session->userdata('auth_user')->instructor_id;
			
			$updatedPassword = md5($this->input->post('confirm_password'));

			if($this->input->post('new_password') != $this->input->post('confirm_password')) {
				$this->session->set_flashdata('status', 'Passwords do not match');
				redirect(base_url('settings'));
			}
			else {
				$user = new UserModel;
				$result = $user->updateUserPassword($instructor_id, $updatedPassword);
				
				if($result != FALSE) {
					$this->session->unset_userdata('authenticated');
					$this->session->unset_userdata('auth_user');

					$this->session->set_flashdata('status', 'Update Password Success. Please log in again.');
					redirect(base_url('login'));
				}
				else {
					$this->session->unset_userdata('authenticated');
					$this->session->unset_userdata('auth_user');
					
					$this->session->set_flashdata('status', 'Something went wrong. Try logging in your old or new or contact administrator if issue still exists.');
					redirect(base_url('login'));
				}
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('authenticated');
		$this->session->unset_userdata('auth_user');

		redirect(base_url('login'));
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
		$this->load->model('usermodel');
		$user = new UserModel();
		$instructor_id = $this->session->userdata('auth_user')->instructor_id;

		$getAllClass = $user->getAllClass($instructor_id);
		$data['subjects'] = $getAllClass->result();

		$this->load->view('templates/header');
		$this->load->view('pages/uploadclass', $data);
		$this->load->view('templates/footer');	
	}
// UPLOAD
	public function uploadstudent()
	{
		$this->load->model('usermodel');
		$user = new UserModel();
		$instructor_id = $this->session->userdata('auth_user')->instructor_id;
	
		$getAllClass = $user->getAllClass($instructor_id);
		
		foreach( $getAllClass->result() as $class) {
			$getAllStudent = $user->getAllStudent($class->subject_id);

			if(count($getAllStudent->result()) > 0) {
				foreach($getAllStudent->result() as $student) {
					$data[] = $student;
				}
			}
		}
		// var_dump($data);
		$data['students'] = $data;
		// echo json_encode($data);
		$this->load->view('templates/header');
		$this->load->view('pages/uploadstudent', $data);
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

