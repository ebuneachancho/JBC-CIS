<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class email_model extends CI_Model{
 	
 	function __construct(){
 		parent::__construct();
 	}	

 	public function getAllGroupMembers($groupName){
 		$this->db->select('mobile_number');
 		$this->db->from('members');
 		$this->db->where('member_group', $groupName);
 		$query = $this->db->get();
 		$row = array();
 		if ($query->num_rows() > 0) {
 			$row = $query->result();
 			return $row;
 		}else{
 			return false;
 		}
 	}
 }



