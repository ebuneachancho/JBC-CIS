<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class leaders_dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('leaders_model', 'model');
	}
	public function index(){
		$this->load->view('leaders_dashboard');
	}

	// Function to show the set leader login credential view
	public function leader_credential_view($member_id, $group_name, $role_name){
		$data['member_id'] = $member_id;
		$data['group_name'] = $group_name;
		$data['role_name'] = $role_name;

		$this->load->view('set_leaders_login_view', $data);
	}
	// function to set the leader's login credential
	public function set_leaders_credentials(){
		$this->form_validation->set_rules('leader_username', 'Leader Username', 'required|trim|min_length[3]');
		$this->form_validation->set_rules('leader_password', 'Leader Password', 'required|trim');
		$this->form_validation->set_rules('leader_id', 'Leader ID', 'required|trim|is_unique[leader_roles.member_id]');
		$this->form_validation->set_rules('leader_group', 'Leader Grouo', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$validate = array('leader_error' => validation_errors());
			$this->session->set_userdata($validate);
			redirect('dashboard');
		}else{

			$leader_username = $this->input->post('leader_username');
			$leader_password = md5($this->input->post('leader_password'));
			$leader_id = $this->input->post('leader_id');
			$leader_group = $this->input->post('leader_group');
			$role_name = $this->input->post('role_name');

			$data = array('group_name' => $leader_group, 'member_id' => $leader_id, 
							'role_name' => $role_name, 'username' => $leader_username,
							'password' => $leader_password);
			// Model: User_model
			$result = $this->model->save_leader_credentials($data);
			if ($result == true) {
				$data['leader_credential_set_success'] = "Login Information successfully set for this user";
				$this->load->view('set_leaders_login_view', $data);
			}
		}
	}
	// function to get leader's credentials and direct to the dashboard
	public function get_leaders_credentials(){

	}
	public function authenticate_leader($username, $password){
		return $something;
	}
	public function leaders_login(){
		$username = $this->input->post('leader_username');
		$password = md5($this->input->post('leader_password'));
		$leader_id = $this->input->post('leader_id');
		$result = $this->model->authenticate_leader($username, $password, $leader_id);
		if ($result) {
			$session = array('username' => $result->username, 
								'login_state' => TRUE, 
								'leader_name' => $result->first_name,
								'groupName' => $result->group_name,
								'userRole' => $result->role_name);
			$this->session->set_userdata($session);

			redirect('leaders_dashboard');
		}else{
			$msg = "<h4 class='alert alert-danger fade in text-center animated rubberBand'>Leader Username and Password not correct</h4>";
			$data['loginFailed'] = $msg;
			$this->load->view('modules', $data);
		}
	}
	public function get_leader_details($leader_id){
		$leader_details = $this->model->query_leader_details($leader_id);
		if ($leader_details) {
			return $leader_details;
		}else{
			return false;
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

