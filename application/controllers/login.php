<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model', 'model');
	}

	public function index()
	{
		$this->load->view('login');
	}
	public function authenticate(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$result = $this->model->check_credentials($username, $password);
		if ($result == true) {
			$session = array('username' => $result->username, 
								'login_state' => TRUE, 
								'displayName' => $result->display_name,
								'userRole' => $result->role);
			$this->session->set_userdata($session);
			$role = $result->role;
			switch ($role) {
				case 'pastor':
					redirect('pdashboard', TRUE);
					break;
				case 'appointedDecon':
					redirect('appointedDecon_dashboard', TRUE);
					break;
				case 'churchSecretary':
					redirect('sdashboard', TRUE);
					break;
				case 'churchSecretary':
					redirect('appointedDecon', TRUE);
					break;
				case 'Supper Admin':
					redirect('dashboard', TRUE);
					break;
				default:
					$msg = "<h4 class='alert alert-danger fade in text-center animated rubberBand'>Username and password not correct</h4>";
					$data['loginFailed'] = $msg;
					$this->load->view('login', $data);
			}
		}else{
			$msg = "<h4 class='alert alert-danger fade in text-center animated rubberBand'>Username and password not correct</h4>";
			$data['loginFailed'] = $msg;
			$this->load->view('login', $data);
		}
	}

	public function leaders_login(){
		$username = $this->input->post('leader-username');
		$password = md5($this->input->post('leader-password'));
		$result = $this->model->authenticate_leader($username, $password);
		if ($result == true) {
			$session = array('username' => $result->username, 
								'login_state' => TRUE, 
								'displayName' => $result->display_name,
								'userRole' => $result->role);
			$this->session->set_userdata($session);
			$role = $result->role;
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
