<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class base_ctrl extends CI_Controller{
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('login_state') == FALSE) {
			redirect('modules');
		}else{
			$this->auth = $this->session->userdata('login_state');
		}
	}
	

	protected $auth;
	
}

