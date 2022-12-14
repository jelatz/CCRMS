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

// DASHBOARD
	public function dashboard()
	{
		$this->load->model('ClassModel');
		$class = new ClassModel();
		$instructor_id = $this->session->userdata('auth_user')->instructor_id;

		$data['monday'] = $class->getDay($instructor_id, 'mon');
		$data['tues'] = $class->getDay($instructor_id, 'tue');
		$data['wed'] = $class->getDay($instructor_id, 'wed');
		$data['thur'] = $class->getDay($instructor_id, 'thu');
		$data['fri'] = $class->getDay($instructor_id, 'fri');
		$data['sat'] = $class->getDay($instructor_id, 'sat');

		$this->load->view('templates/header');
		$this->load->view('pages/dashboard', $data);
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
// CLASSRECORD/PRELIM
	public function classrecord()
	{
		$this->load->model('ClassModel');
		$data['all_data'] = $this->ClassModel->selectPrelimData();		
		// $this->load->view('classrecord', $data);

		$this->load->view('templates/header');
		$this->load->view('pages/classrecord' , $data);
		$this->load->view('templates/footer');
	}
	
// MIDTERM
	public function midterm(){
		$this->load->model('ClassModel');
		$data['midterm_data'] = $this->ClassModel->selectMidtermData();	
		
		$this->load->view('templates/header');
		$this->load->view('pages/midterm', $data);
		$this->load->view('templates/footer');
	}
// PREFINAL
	public function prefi(){
		$this->load->model('ClassModel');
		$data['prefi_data'] = $this->ClassModel->selectPrefiData();	

		$this->load->view('templates/header');
		$this->load->view('pages/prefi', $data);
		$this->load->view('templates/footer');
	}
// FINAL
public function final(){
	$this->load->model('ClassModel');
	$data['final_data'] = $this->ClassModel->selectFinalData();	

	$this->load->view('templates/header');
	$this->load->view('pages/final', $data);
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
// CLASS PARTICIPATION
	public function cp(){
		$this->load->view('templates/header');
		$this->load->view('pages/classparticipation');
		$this->load->view('templates/footer');
	}
// PERIODICAL TEST
	public function periodictest(){
		$this->load->view('templates/header');
		$this->load->view('pages/periodictest');
		$this->load->view('templates/footer');
	}
}
?>

