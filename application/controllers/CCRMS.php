<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCRMS extends CI_Controller {
	public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	
	/*load database libray manually*/
	$this->load->database();
	
	/*load Model*/
	$this->load->model('UserModel');
	}
// LOGIN
public function index()
{
	$this->load->view('templates/header');
	$this->load->view('login');
	$this->load->view('templates/footer');
	
}

public function login()
{
	$this->load->model('UserModel');
	$this->form_validation->set_rules('id', 'ID Number', 'trim|numeric|required'); 
	$this->form_validation->set_rules('password', 'Password', 'trim|required');  
	
	if($this->form_validation->run() == FALSE) {
		$this->index();
	}
	else {
		$data = [
			'id_number' => $this->input->post('id'),
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

			redirect(base_url('dasboard'));
		}
		else {
			$this->session->set_flashdata('status', 'Invalid ID Number or Password');
			redirect(base_url('index'));
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
				'password' => $this->input->post('password'),
				'last_name' => $this->input->post('last_name'),
				'first_name' => $this->input->post('first_name'),
				'middle_name' => $this->input->post('middle_name'),
			];
			$this->load->model('UserModel','user');
			$this->user->insert($data);
			redirect(base_url('signup'));
		}else{
			$this->signup();
		}
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

