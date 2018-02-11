<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class pdashboard extends base_ctrl{
	function __construct(){
		parent::__construct();
		$this->load->model('settings_model', 'model');
	}
	public function index(){
		$this->load->view('pastor_dashboard');
	}
	
}

