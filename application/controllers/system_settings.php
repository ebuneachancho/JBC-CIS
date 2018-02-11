<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class system_settings extends base_ctrl{
	function __construct(){
		parent::__construct();
		$this->load->model('settings_model', 'model');
	}
	public function index(){
		//$data['roleSuccess'] = "Role Successfully Save";
		$this->load->view('systemSettings');
	}
	// the pg method will load all pages in the application
	public function page_($page = 'dashboard'){
		if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
			show_404();
		}
		$this->load->view($page);
	}
	public function add_roles(){
		$role = $this->input->post('role');
		$data = array('role_name' => $role);
		$query = $this->model->save_role($data);
		if ($query == true) {
			$message = array('roleSuccess' => 'Role Successfully Save');
			$this->session->set_flashdata($validate);
			redirect('system_settings');
		}else{
			echo "Could not save roles to the database";
		}
	}
	public function save_church_name(){
		$this->form_validation->set_rules('applicationName', 'Application Name', 'required|trim|is_unique[settings.setting_name]');
		if ($this->form_validation->run() == FALSE) {
			$validate = array('error' => validation_errors());
			$this->session->set_flashdata($validate);
			redirect('system_settings');
		}else{
			$church_name = $this->security->xss_clean($this->input->post('applicationName'));
			$data = array('setting_name' => 'church name', 'setting_value' => $church_name);
			$query = $this->model->save_church($data);
			if ($query == true) {
				$message = array('save_church_name_success' => 'Church Name has successfully been changed');
				$this->session->set_flashdata($message);
				redirect('system_settings');
			}
		}
		
	}
	public function save_church_logo(){
		$this->form_validation->set_rules('picture', 'Application Name', 'required|trim|is_unique[settings.setting_name]');
		if ($this->form_validation->run() == FALSE) {
			$validate = array('error' => validation_errors());
			$this->session->set_flashdata($validate);
			redirect('system_settings');
		}else{
			$church_logo = $this->do_upload();
			$data = array('setting_name' => 'church logo', 'setting_value' => $church_logo);
			$query = $this->model->save_church_logo($data);
			if ($query == true) {
				$message = array('save_church_logo_success' => 'Church logo has successfully been changed');
				$this->session->set_flashdata($message);
				redirect('system_settings');
			}
		}
		
	}
	private function do_upload(){
        $type = explode('.', $_FILES["picture"]["name"]);
        $type = $type[count($type)-1];
        $url = "./resources/churchLogos/". uniqid(rand()). '.' . $type;
        if (in_array($type, array("jpg", "jpeg", "png", "gif", "JPG"))) {
            if (is_uploaded_file($_FILES["picture"]["tmp_name"])) {
                if ( move_uploaded_file($_FILES["picture"]["tmp_name"], $url)){
                    
                    $church_logo = $url;
					$data = array('setting_name' => 'church logo', 'setting_value' => $church_logo);
					$query = $this->model->save_church_logo($data);
					if ($query == true) {
						$message = array('save_church_logo_success' => 'Church logo has successfully been changed');
						$this->session->set_flashdata($message);
						redirect('system_settings');
					}
                }
        	}
        }
        
    }
	public function add_user_role(){
		$this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[16]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('userRole', 'User Role', 'required|trim');
		$this->form_validation->set_rules('displayName', 'Display Name', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$validate = array('error' => validation_errors());
			$this->session->set_flashdata($validate);
			redirect('system_settings');
		}else{
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$userRole = $this->security->xss_clean($this->input->post('userRole'));
			$displayName = $this->security->xss_clean($this->input->post('displayName'));

			$data = array('username' => $username, 'password' => md5($password), 
						'display_name' => $displayName, 'role' => $userRole, 'is_admin' => 1);
			$result = $this->model->save_new_user($data);
			if ($result == true) {
				$message = array('user_role_add_success' => 'New User has been Created.');
				$this->session->set_flashdata($message);
				redirect('system_settings');
			}else{
				$validate = array('error' => 'User could not be created. please check your internet connection and try again');
				$this->session->set_flashdata($validate);
				redirect('system_settings');
			}
			
		}
	}
	
}

