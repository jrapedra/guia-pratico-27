<?php

Class User_Authentication extends CI_Controller {

	public function __construct() {
		parent::__construct();

		//session_start();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('login_database');
	}

	// Check for user login process
	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Invalid Username or Password');
			redirect("welcome/index");
		} else {
			$data = array
					(
						'user_name' => $this->input->post('username'),
						'user_email' => $this->input->post('email_value'),
						'user_password' => $this->input->post('password')
					);
		}
	}

}

?>