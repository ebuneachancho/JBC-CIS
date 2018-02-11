<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Dashboard extends base_ctrl{
	function __construct(){
		parent::__construct();
		$this->load->model('member_model', 'model');
	}
	public function index(){
		$data['recentVisitor'] = $this->get_latest_registered_visitors();
		$data['recentMember'] = $this->get_latest_registered_member();
		$this->load->view('dashboard', $data);
	}
	// Loading the pastor's pastor_dashboard
	public function pastor(){
		$this->load->view('pastor_dashboard');
	}
	// the pg method will load all pages in the application
	public function pg($page = 'dashboard'){
		if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
			show_404();
		}
		$this->load->view($page);
	}
	// function to handle all redirects with success or failes messages
	public function load($page = ''){
		if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
			show_404();
		}
		$data['success'] = "Data was handled successfully";
		$this->load->view($page, $data);
	}
	// function that loads the view all project page inother to show success message
	public function pro_update(){
		$data['update_success'] = "Project Successfully Updated";
		$this->load->view('viewAllProjects', $data);
	}

	public function group(){
		$groupName = $this->input->post('groupName');
		$data = array('group_name' => $groupName);
		$result = $this->model->saveGroup($data);
		if ($result == true) {
			$message = "New Group Successfully created";
			$data['groupCreated'] = $message;
			$this->load->view("listGroup", $data);
		}else{
			$message = "Unable to create group. Please check your internet connection and try again";
			$data['unableCreateGroup'] = $message;
			$this->load->view("listGroup", $data);
		}
	}
	public function create_project(){
		$projectName = $this->input->post('projectName');
		$projectType = $this->input->post('projectType');
		$projectAssigned = $this->input->post('projectAssigned');
		$amount = $this->input->post('amount');
		$projectCloseDate = $this->input->post('projectCloseDate');
		$projectDescription = $this->input->post('projectDescription');
		$data = array('project_name' => $projectName, 
					'project_type' => $projectType, 'project_assigned_to' => $projectAssigned, 
					'amount' => $amount, 'project_closing' => $projectCloseDate,
					'project_description' => $projectDescription);

		$result = $this->model->save_project($data);
		if ($result == true) {
			redirect('dashboard/load/viewAllProjects');
		}else{
			$message = "Unable to create group. Please check your internet connection and try again";
			$data['unableCreateGroup'] = $message;
			$this->load->view("viewAllProjects", $data);
		}
	}
	public function edit_project($id){
		$record = $this->getSingleProject($id);
		if ($record) {
			$data['projectData'] = $record;
			$this->load->view('updateProject', $data);
		}
	}
	public function update_project(){
		$projectName = $this->input->post('projectName');
		$projectType = $this->input->post('projectType');
		$projectAssigned = $this->input->post('projectAssigned');
		$amount = $this->input->post('amount');
		$projectCloseDate = $this->input->post('projectCloseDate');
		$projectDescription = $this->input->post('projectDescription');
		$id = $this->input->post('project_id');

		$data = array('project_name' => $projectName, 
					'project_type' => $projectType, 'project_assigned_to' => $projectAssigned, 
					'amount' => $amount, 'project_closing' => $projectCloseDate,
					'project_description' => $projectDescription);

		$result = $this->model->update_project($data, $id);
		if ($result == true) {
			redirect('dashboard/pro_update');
		}else{
			$message = "Unable to create group. Please check your internet connection and try again";
			$data['unableCreateGroup'] = $message;
			$this->load->view("viewAllProjects", $data);
		}
	}
	public function view($id){
		$record = $this->getSingleMemberRecord($id);
		if ($record) {
			$data['visitorData'] = $record;
			$this->load->view('viewVisitors', $data);
		}
	}

	private function getSingleProject($id){
		$data =$id;
		$result = $this->model->getSingleProject($data);
		if ($result) {
			return $result;
		}
	}

	private function get_latest_registered_visitors(){
		$result = $this->model->get_latest_registered_visitors();
		if ($result) {
			return $result;
		}
	}
	private function get_latest_registered_member(){
		$result = $this->model->get_latest_registered_members();
		if ($result) {
			return $result;
		}
	}
	
}

