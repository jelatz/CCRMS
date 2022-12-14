<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();

		if($this->session->has_userdata('authenticated'))
		{
			// $this->session->set_flashdata('status', 'You are already logged in');

			redirect(base_url('dashboard'));
		}

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('usermodel');
  	}
	
	// LOGIN VIEW
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
				$this->session->set_userdata('authenticated', $result->instructor_id);
				$this->session->set_userdata('auth_user', $result);
				
				redirect(base_url('dashboard'));
			}
			else {
				$this->session->set_flashdata('status', 'Invalid ID Number or Password');
				$this->index();
			}
		}
	}
}