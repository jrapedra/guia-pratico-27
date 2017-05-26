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
		//set validations
		$this->form_validation->set_rules("form-login-username", "Username", "trim|required");
		$this->form_validation->set_rules("form-login-password", "Password", "trim|required");

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
			//get the posted values
			$username = $this->input->post("form-login-username");
			// Aceder à BD com o username
			$password = $this->input->post("form-login-password");
	        //check if username and password is correct
	        if ($this->Auth_model->get_user($username, $password)) //active user record is present
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

	public function register(){
		//set validations
		$this->form_validation->set_rules('form-register-firstname', 'Primeiro nome', 'trim|required');
		$this->form_validation->set_rules('form-register-lastname', 'Último nome', 'trim|required');
		$this->form_validation->set_rules('form-register-username', 'Nome de utilizador', 'trim|required');
		$this->form_validation->set_rules('form-register-email', 'E-mail', 'trim|required');
		$this->form_validation->set_rules('form-register-password', 'Password', 'trim|required');

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
			//get the posted values
			$username = $this->input->post("form-register-username");
			$password = $this->input->post("form-register-password");
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	        //check if username and password is correct
	        if ($this->Auth_model->get_user($username, $password)) //new user record present in system
	        {
	        	$this->session->set_flashdata('msg_type','alert-danger');
	            $this->session->set_flashdata('msg_error', 'Nome de utilizador já existente!');
				redirect('welcome/index','refresh');
	        }
	        else
	        {
				$firstname = $this->input->post("form-register-firstname");
				$lastname = $this->input->post("form-register-lastname");
				$email = $this->input->post("form-register-email");
	        	$status = 'active';
	            if ($this->Auth_model->new_user($firstname, $lastname, $email, $username, $hashed_password, $status)) {
		            //set the session variables
		            $sessiondata = array(
		                'username' => $username,
		                'loginuser' => TRUE
		            );
		            $this->session->set_userdata($sessiondata);
					redirect('welcome/index','refresh');
	            } else {
		        	$this->session->set_flashdata('msg_type','alert-danger');
		            $this->session->set_flashdata('msg_error', 'Problemas com o registo. Por favor tente novamente!');
					redirect('welcome/index','refresh');
	            }
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