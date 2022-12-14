<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
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
	
	// SIGNUP
    public function index()
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
			$this->index();
		}
	}
}