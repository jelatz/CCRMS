<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCRMS extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();

		$this->load->model('authentication');
	}

// LOGIN
public function index()
{
	$this->load->view('templates/header');
	$this->load->view('login');
	$this->load->view('templates/footer');
	
}

	public function login(){
		$this->load->model('usermodel');

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
				$this->session->set_userdata('authenticated', 1);
				$this->session->set_userdata('auth_user', $result);
				
				redirect(base_url('dashboard'));
			}
			else {
				redirect(base_url('login'));
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
// INSERT SIGNED UP USER TO DB
	public function insert()
	{
		$this->form_validation->set_rules('id', 'Instructor ID', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('middle_name', 'Middle Name', 'required');

		if($this->form_validation->run()){
			$data = [
				'instructor_id' => $this->input->post('id'),
				'password' => md5($this->input->post('password')),
				'last_name' => $this->input->post('last_name'),
				'first_name' => $this->input->post('first_name'),
				'middle_name' => $this->input->post('middle_name'),
			];
			$this->load->model('UserModel','user');
			$this->user->insert($data);
			redirect(base_url('login'));
		}else{
			$this->signup();
		}
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
		$getAllClass = $getAllClass->result();
		$subids = $getAllClass;
		foreach($subids as $id) {
			$getAllStudent = $user->getAllStudent($id->subject_id);
			$data['students'] = $getAllStudent->result();
		}

		// var_dump($data['students']);
		// $data['subIDs'] = $subids->subject_id;
		
		// $getAllStudent = $user->getAllStudent($subject_id);
		// $data['students'] = $getAllStudent->result();

		$this->load->view('templates/header');
		// $this->load->view('pages/uploadstudent', $data);
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

