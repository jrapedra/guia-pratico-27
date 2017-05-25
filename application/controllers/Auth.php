<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the login model
		$this->load->model('Auth_model');
	}

	public function index(){
		$data['content'] = 'auth/index';
		$data['active_menu'] = 'auth';
		$data['css_files'] = ['auth.css'];
		$this->load->view('init', $data);
	}

	public function login(){
		//get the posted values
		$username = $this->input->post("form-username");
		$password = $this->input->post("form-password");

		//set validations
		$this->form_validation->set_rules("form-username", "Username", "trim|required");
		$this->form_validation->set_rules("form-password", "Password", "trim|required");

		if ($this->form_validation->run() == FALSE)
		{
		   	//validation fails
			$data['content'] = 'auth/index';
			$data['active_menu'] = 'auth';
			$data['css_files'] = ['auth.css'];
			$this->load->view('init',$data);
		}
		else
		{
	        //check if username and password is correct
	        $usr_result = $this->Auth_model->get_user($username, $password);
	        if ($usr_result > 0) //active user record is present
	        {
	            //set the session variables
	            $sessiondata = array(
	                'username' => $username,
	                'loginuser' => TRUE
	            );
	            $this->session->set_userdata($sessiondata);
				redirect('welcome/index','refresh');
	        }
	        else
	        {
	        	$this->session->set_flashdata('msg_type','alert-danger');
	            $this->session->set_flashdata('msg_error', 'Nome de utilizador ou password incorrecta!');
				$data['content'] = 'auth/index';
				$data['active_menu'] = 'auth';
				$data['css_files'] = ['auth.css'];
				$this->load->view('init',$data);
	        }
		}
	}

	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('loginuser');
		$this->session->sess_destroy();
		redirect('welcome/index','refresh');
	}

}

?>