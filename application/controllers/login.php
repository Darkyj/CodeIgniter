<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('main.php');

class Login extends Main {

	//Loads the login view page
	public function load_login()
	{
		$this->load->view('login');
		$this->load->view('header');
	}

	//Defines a function for the home hyper link in the view
	public function home()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	//Defines a function for the register hyper link in the view
	public function register()
	{
		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}

	//Loads this project's CI model
	public function load_model()
	{
		$this->load->model('something_model');
	}

	//Log in function's validation
	public function process_login()
	{
		$this->load->model('something_model');
		$user = array(
			"email" => $this->input->post('email'),
			"password"=> $this->input->post('password')
			);
		$user = $this->something_model->log_in($user);
		if($user == null) 
		{
			$data['message'] = "Bad email/password";
			$this->load->library('form_validation');
			$this->load->view('header',$data);
			$this->load->view('login');
			$this->load->view('footer');			
		}
		else
		{
			$this->load->library('form_validation');
			$data['user'] = $user;
			$this->load->view('header');
			$this->load->view('dashboard',$data);
			$this->load->view('footer');
		}
	}

	//Register the user
	public function process_register()
	{
		$this->load->library('encrypt');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name','First Name','alpha|required|xss_clean');
		$this->form_validation->set_rules('last_name','Last Name','alpha|required|xss_clean');
		$this->form_validation->set_rules('email_register','Email','valid_email|required|is_unique[users.email]|xss_clean');
		$this->form_validation->set_rules('first_password','Password','min_length[6]|required|matches[last_password]|xss_clean');
		$this->form_validation->set_rules('last_password','Second Password','min_length[6]|required');
		if($this->form_validation->run() === FALSE) 
		{
			$data['message'] = validation_errors();
			$this->load->view('header');
			$this->load->view('register',$data);
			$this->load->view('footer');
		}
		else
		{
			$user = array(
						'first_name' => $this->input->post('first_name'),
						'last_name'=> $this->input->post('last_name'),
						'email' => $this->input->post('email_register'),
						'password' => $this->encrypt->encode($this->input->post('first_password')),
						'created_at' => date('Y-m-d h:i:s')						
						);
			$this->load_model();
			$this->something_model->register_user($user);
			$data['success'] = "You've been registered {$user['first_name']}";
			$this->load->view('header');
			$this->load->view('register',$data);
			$this->load->view('footer');
		}
	}

	//Lets the user log out
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
}
