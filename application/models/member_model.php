<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class member_model extends CI_Model{
 	
 	function __construct(){
 		parent::__construct();
 	}
 	public function save_visitor($request){
 		$query = $this->db->insert('visitors', $request);
 		if ($query) {
 			return true;
 		}else{
 			return false;
 		}
 	}
 	public function update_visitor($request, $id){
 		$this->db->where('id', $id);
 		$query = $this->db->update('visitors', $request);
 		if ($query) {
 			$msg = "success";
 			return $msg;
 		}else{
 			$msg = "failed";
 			return $msg;
 		}
 	}
 	public function get_visitors(){

		$query = $this->db->get('visitors');
		$row = array();
		if ($query->num_rows() > 0) {
			$row = $query->result();
			return $row;
		}else{
			echo "No record found in the database";
		}
 	}
 	public function save_project($request){
 		$query = $this->db->insert('projects', $request);
 		if ($query) {
 			return true;
 		}else{
 			return false;
 		}
 	}
 	public function saveGroup($request){
 		$query = $this->db->insert('groups', $request);
 		if ($query) {
 			return true;
 		}else{
 			return false;
 		}
 	}
 	public function saveMember($request){
 		$query = $this->db->insert('members', $request);
 		if ($query == true) {
 			return true;
 		}else{
 			return false;
 		}
 	}
 	// method to update a member record
 	public function updateMember($request, $id){
 		$this->db->where('id', $id);
 		$query = $this->db->update('members', $request);
 		if ($query) {
 			return true;
 		}else{
 			return false;
 		}
 	}
 	public function saveMemberGroup($request, $id){
 		$this->db->where('id', $id);
 		$query = $this->db->update('members', $request);
 		if ($query == true) {
 			return true;
 		}else{
 			return false;
 		}
 	}
 	// getting a single visitor record from the database
 	public function getSingleVisitor($id){
 		$this->db->where('id', $id);
 		$result = $this->db->get('visitors');
 		if ($result->num_rows() == 1) {
 			$row = $result->row();
 			return $row;
 		}else{
 			return false;
 		}
 	}
 	// getting a single member record from the database
 	public function getSingleMember($id){
 		$this->db->where('id', $id);
 		$result = $this->db->get('members');
 		if ($result->num_rows() == 1) {
 			$row = $result->row();
 			return $row;
 		}else{
 			return false;
 		}
 	}
 	public function getSingleProject($id){
 		$this->db->where('id', $id);
 		$result = $this->db->get('projects');
 		if ($result->num_rows() == 1) {
 			$row = $result->row();
 			return $row;
 		}else{
 			return false;
 		}
 	}
 	public function update_project($request, $id){
 		$this->db->where('id', $id);
 		$query = $this->db->update('projects', $request);
 		if ($query) {
 			return true;
 		}else{
 			return false;
 		}
 	}
 	// private function getMemberFullnames($memberId){
 	// 	// $this->db->where('id', $memberId);
 	// 	// $query = $this->db->get('members');
 	// 	$sql = 'SELECT first_name, last_name FROM members WHERE id="'.$memberId.'"';
 	// 	$query = $this->db->query($sql);
 	// 	if ($query->num_rows == 1) {
 	// 		return $query->result();
 	// 	}else{
 	// 		return false;
 	// 	}

 	// }

 	public function get_latest_registered_visitors(){
 		$this->db->select('*');
 		$this->db->from('visitors');
 		$this->db->order_by('id', 'desc');
 		$this->db->limit('3');
 		$query = $this->db->get();
 		return $query->result();
 	}
 	public function get_latest_registered_members(){
 		$this->db->select('*');
 		$this->db->from('members');
 		$this->db->order_by('id', 'desc');
 		$this->db->limit('6');
 		$query = $this->db->get();
 		return $query->result();
 	}

 	// Getting group members belonging to a partivular group
 	public function getAllGroupMembers($groupName){
 		$this->db->where('member_group', $groupName);
 		$query = $this->db->get('members');
 		$row = array();
 		if ($query->num_rows() > 0) {
 			$row = $query->row();
 			return $row;
 		}else{
 			return false;
 		}
 	}

 }


