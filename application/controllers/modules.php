<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class modules extends CI_Controller{
	function __construct(){
		parent::__construct();
		
	}
	
	public function index(){
		// loading all the models of the application
		$this->load->view('modules');
	}
	
}

