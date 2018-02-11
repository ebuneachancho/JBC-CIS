<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('member_model', 'model');
	}

	public function index()
	{
	}
	public function load($page = ''){
		if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
			show_404();
		}
		$data['success'] = "Data was handled successfully";
		$this->load->view($page, $data);
	}
	// function that loads the all visitors page inother to show success message
	public function vis_update(){
		$data['update_success'] = "Data Successfully Updated";
		$this->load->view('viewAllVisitors', $data);
	}
	public function register_visitor($id = null){
		$first_name = $this->input->post('firstName');
		$last_name = $this->input->post('lastName');
		$denomination = $this->input->post('denomination');
		$observation = $this->input->post('observation');
		$registerInfo = array('first_name' => $first_name, 
							'last_name' => $last_name, 
							'observation' => $observation, 
							'denomination' => $denomination,
							'date_recorded' => date('Y-m-d'));
		if ($id != null) {
			$update = $this->model->update_visitor($registerInfo, $id);
			if ($update == 'success') {
				$message = "Record Successfully Updated";
				$data['visitorUpdateSuccess'] = $message;
				$this->load->view('viewAllVisitors', $data);
			}
		}else{
			$saveVisitor = $this->model->save_visitor($registerInfo);
			if ($saveVisitor == true) {
				$message = "Thanks for Visiting. Your data has been successfully save.";
				$data['visitorSaved'] = $message;
				$this->load->view('registerVisitor', $data);
			}else{
				$message = "Sorry your data was unable to save. Please check your internet connection and try again";
				$data['visitorSaveFailed'] = $message;
				$this->load->view('registerVisitor', $data);
			}
		}
	}

	public function ajax_load_visitors(){
		$result = $this->model->get_visitors();
		if ($result) {
			$data['all_visitors'] = $result;
			$this->load->view('viewAllVisitors', $data);
		}else{
			echo "Information has not been collected in the database";
		}
	}
	
	public function edit($id){
		$record = $this->getSingleMemberRecord($id);
		if ($record) {
			$data['visitorData'] = $record;
			$this->load->view('updateVisitor', $data);
		}
	}

	public function view($id){
		$record = $this->getSingleMemberRecord($id);
		if ($record) {
			$data['visitorData'] = $record;
			$this->load->view('viewVisitors', $data);
		}
	}

	private function getSingleMemberRecord($id){
		$data =$id;
		$result = $this->model->getSingleVisitor($data);
		if ($result) {
			return $result;
		}
	}
	public function edit_visitor($visitor_id){

	}

	public function update_visitor($id){
		$first_name = $this->input->post('firstName');
		$last_name = $this->input->post('lastName');
		$denomination = $this->input->post('denomination');
		$observation = $this->input->post('observation');
		$registerInfo = array('first_name' => $first_name, 
							'last_name' => $last_name, 
							'observation' => $observation, 
							'denomination' => $denomination,
							'date_recorded' => date('Y-m-d'));
		$id = $this->input->post('id');
		if ($id != null) {
			$update = $this->model->update_visitor($registerInfo, $id);
			if ($update == 'success') {
				// redirect to vis_update function inother to load the success message and vis page
				redirect('visitor/vis_update');
			}else{
				$message = "Unable to Update Record. Please try again";
				$data['visitorUpdateFailed'] = $message;
				$this->load->view('viewAllVisitors', $data);
			}
		}
	}
}
