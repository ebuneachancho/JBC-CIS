<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class load extends base_ctrl{
	function __construct(){
		parent::__construct();
		$this->load->model('member_model', 'model');
	}
	public function index(){
		
	}
	// the pg method will load all pages in the application
	public function page_($page = 'dashboard'){
		if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
			show_404();
		}
		$this->load->view($page);
	}
	
}

