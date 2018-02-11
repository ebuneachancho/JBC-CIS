<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Member extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('member_model', 'model');
	}
	public function index()
	{
		$this->load->view('addNewMember');
	}
	public function member_update_index(){
		$data['memberUpdateSuccess'] = "Member has been  successfully Updated";
		$this->load->view('viewAllMembers', $data);
		
	}
	
	public function register_member(){
		$this->form_validation->set_rules('firstName', 'First Name', 'required|trim|max_length[16]');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('idNumber', 'Identification Number', 'required|trim|is_unique[members.id_number]');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('phoneNumber', 'Numbers', 'required|trim|max_length[14]|min_length[9]|is_unique[members.mobile_number]');
		$this->form_validation->set_rules('birthDate', 'Birth Date', 'required|trim');
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('maritalStatus', 'Marital Status', 'required|trim');
		$this->form_validation->set_rules('social', 'Social', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		$this->form_validation->set_rules('fatherName', 'Fathers Name', 'required|trim');
		$this->form_validation->set_rules('motherName', 'Mothers Name', 'required|trim');
		$this->form_validation->set_rules('familyPhoneNumber', 'Family Phone Number', 'required|trim');
		$this->form_validation->set_rules('parentAddress', 'Parent Address', 'required|trim');
		$this->form_validation->set_rules('isBaptised', 'Baptism', 'required|trim');
		$this->form_validation->set_rules('baptismDate', 'Baptism Date', 'required|trim');
		$this->form_validation->set_rules('denomination', 'Denomination', 'required|trim');
		$this->form_validation->set_rules('pastorName', 'Pastors Name', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$validate = array('error' => validation_errors());
			$this->session->set_userdata($validate);
			redirect('member');
		}else{
			$firstName = $this->security->xss_clean($this->input->post('firstName'));
			$lastName = $this->security->xss_clean($this->input->post('lastName'));
			$idNumber = $this->security->xss_clean($this->input->post('idNumber'));
			$address = $this->security->xss_clean($this->input->post('address'));
			$phoneNumber = $this->security->xss_clean($this->input->post('phoneNumber'));
			$birthDate = $this->security->xss_clean($this->input->post('birthDate'));
			$gender = $this->security->xss_clean($this->input->post('gender'));
			$maritalStatus = $this->security->xss_clean($this->input->post('maritalStatus'));
			$social = $this->security->xss_clean($this->input->post('social'));
			$status = $this->security->xss_clean($this->input->post('status'));
			$fatherName = $this->security->xss_clean($this->input->post('fatherName'));
			$motherName = $this->security->xss_clean($this->input->post('motherName'));
			$familyPhoneNumber = $this->security->xss_clean($this->input->post('familyPhoneNumber'));
			$parentAddress = $this->security->xss_clean($this->input->post('parentAddress'));
			$isBaptised = $this->security->xss_clean($this->input->post('isBaptised'));
			$baptismDate = $this->security->xss_clean($this->input->post('baptismDate'));
			$denomination = $this->security->xss_clean($this->input->post('denomination'));
			$pastorName = $this->security->xss_clean($this->input->post('pastorName'));
			$picture = $this->do_upload();

			$data = array('first_name' => $firstName, 'last_name' => $lastName, 
						'id_number' => $idNumber, 'address' => $address, 
						'mobile_number' => $phoneNumber, 'date_of_birth' => $birthDate, 
						'sex' => $gender, 'marital_status' => $maritalStatus, 
						'social' => $social, 'status' => $status, 'father_name' => $fatherName, 
						'mother_name' => $motherName, 'parent_number' => $familyPhoneNumber, 
						'parent_address' => $parentAddress, 'is_baptised' => $isBaptised, 'baptism_date' => $baptismDate,
						'denomination' => $denomination, 'pastor_name' => $pastorName, 
						'picture' => $picture);
			$result = $this->model->saveMember($data);
			if ($result == true) {
				$message = "Member has been  successfully registered to the Church";
				$data['memberRegisterSuccess'] = $message;
				$this->load->view('addNewMember', $data);
			}else{
				$message = "Unable to save member to Jerusalem Baptist Church. Please check your internet connection and try again";
				$data['memberRegisterFailed'] = $message;
				$this->load->view('addNewMember', $data);
			}
		}
	}

	private function do_upload(){
        $type = explode('.', $_FILES["picture"]["name"]);
        $type = $type[count($type)-1];
        $url = "./resources/uploadPics/". uniqid(rand()). '.' . $type;
        if (in_array($type, array("jpg", "jpeg", "png", "gif", "JPG"))) {
            if (is_uploaded_file($_FILES["picture"]["tmp_name"])) {
                if ( move_uploaded_file($_FILES["picture"]["tmp_name"], $url)){
                    return $url;
                }
        }
        }
        
    }

    public function update_member(){
		$this->form_validation->set_rules('firstName', 'First Name', 'required|trim|max_length[16]');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('idNumber', 'Identification Number', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('phoneNumber', 'Numbers', 'required|trim|max_length[12]|min_length[9]');
		$this->form_validation->set_rules('birthDate', 'Birth Date', 'required|trim');
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('maritalStatus', 'Marital Status', 'required|trim');
		$this->form_validation->set_rules('social', 'Social', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		$this->form_validation->set_rules('fatherName', 'Fathers Name', 'required|trim');
		$this->form_validation->set_rules('motherName', 'Mothers Name', 'required|trim');
		$this->form_validation->set_rules('familyPhoneNumber', 'Family Phone Number', 'required|trim');
		$this->form_validation->set_rules('parentAddress', 'Parent Address', 'required|trim');
		$this->form_validation->set_rules('isBaptised', 'Baptism', 'required|trim');
		$this->form_validation->set_rules('baptismDate', 'Baptism Date', 'required|trim');
		$this->form_validation->set_rules('denomination', 'Denomination', 'required|trim');
		$this->form_validation->set_rules('pastorName', 'Pastors Name', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$validate = array('error' => validation_errors());
			$this->session->set_flashdata($validate);
			redirect('member/member_update_index');
		}else{
			$firstName = $this->security->xss_clean($this->input->post('firstName'));
			$lastName = $this->security->xss_clean($this->input->post('lastName'));
			$idNumber = $this->security->xss_clean($this->input->post('idNumber'));
			$address = $this->security->xss_clean($this->input->post('address'));
			$phoneNumber = $this->security->xss_clean($this->input->post('phoneNumber'));
			$birthDate = $this->security->xss_clean($this->input->post('birthDate'));
			$gender = $this->security->xss_clean($this->input->post('gender'));
			$maritalStatus = $this->security->xss_clean($this->input->post('maritalStatus'));
			$social = $this->security->xss_clean($this->input->post('social'));
			$status = $this->security->xss_clean($this->input->post('status'));
			$fatherName = $this->security->xss_clean($this->input->post('fatherName'));
			$motherName = $this->security->xss_clean($this->input->post('motherName'));
			$familyPhoneNumber = $this->security->xss_clean($this->input->post('familyPhoneNumber'));
			$parentAddress = $this->security->xss_clean($this->input->post('parentAddress'));
			$isBaptised = $this->security->xss_clean($this->input->post('isBaptised'));
			$baptismDate = $this->security->xss_clean($this->input->post('baptismDate'));
			$denomination = $this->security->xss_clean($this->input->post('denomination'));
			$pastorName = $this->security->xss_clean($this->input->post('pastorName'));
			$picture = $this->do_upload();
			$id = $this->input->post('id');

			$data = array('first_name' => $firstName, 'last_name' => $lastName, 
						'id_number' => $idNumber, 'address' => $address, 
						'mobile_number' => $phoneNumber, 'date_of_birth' => $birthDate, 
						'sex' => $gender, 'marital_status' => $maritalStatus, 
						'social' => $social, 'status' => $status, 'father_name' => $fatherName, 
						'mother_name' => $motherName, 'parent_number' => $familyPhoneNumber, 
						'parent_address' => $parentAddress, 'is_baptised' => $isBaptised, 'baptism_date' => $baptismDate,
						'denomination' => $denomination, 'pastor_name' => $pastorName, 
						'picture' => $picture);
			$result = $this->model->updateMember($data, $id);
			if ($result == true) {
				redirect('member/member_update_index');
				
			}else{
				$message = "Unable to save member to Jerusalem Baptist Church. Please check your internet connection and try again";
				$data['memberRegisterFailed'] = $message;
				$this->load->view('addNewMember', $data);
			}
		}
	}

    public function memberGroupAssignment(){
		$groupName = $this->input->post('groupName');
		$memberName = $this->input->post('memberName');
		$memberRole = $this->input->post('memberRole');
		$data = array('member_group' => $groupName, 'member_role' => $memberRole);
		$result = $this->model->saveMemberGroup($data, $memberName);
		if ($result == true) {
			$message = "Group successfully assigned to member";
			$data['groupAssignSuccess'] = $message;
			$this->load->view('groupAssignmentHelper', $data);
		}else{
			$message = "Group was unable to assigned to member";
			$data['groupAssignFailed'] = $message;
			$this->load->view('groupAssignmentHelper', $data);
		}
	}

	public function getCurrentMember(){
		
	}
	public function view($id){
		$record = $this->getSingleMemberRecord($id);
		$data['memberData'] = $record;
		$this->load->view('viewMember', $data);
		
	}
	public function delete_member(){

	}
	public function edit_member($id){
		$record = $this->getSingleMemberRecord($id);
		if ($record) {
			$data['memberData'] = $record;
			$this->load->view('updateMember', $data);
		}
	}
	private function getSingleMemberRecord($id){
		$data =$id;
		$result = $this->model->getSingleMember($data);
		if ($result) {
			return $result;
		}
	}
	public function viewGroupMembers($groupName){
		$members = $this->getGroupMembers($groupName);
		if ($members) {
			$data['groupMembers'] = $members;
			$data['groupName'] = $groupName;
			$this->load->view('viewGroupMembers', $data);
		}
	}
	private function getGroupMembers($groupName){
		$data = $groupName;
		$members = $this->model->getAllGroupMembers($data);
		if ($members != null) {
			return $members;
		}else{
			echo "error";
		}
	}
}
