<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Login_model extends CI_Model{
 	
 	function __construct(){
 		parent::__construct();
 	}
 	public function check_credentials($username, $password){

 		$this->db->where('username', $username);
 		$this->db->where('password', $password);
 		$result = $this->db->get('users');

 		if ($result->num_rows() == 1) {
 			$row = $result->row();
 			return $row;
 		}else{
 			return false;
 		}
	 }
	 public function authenticate_leader($username, $password){
		$this->db->where('username', $username);
		 $this->db->where('password', $password);
		 $result = $this->db->get('users');

 		if ($result->num_rows() == 1) {
 			$row = $result->row();
 			return $row;
 		}else{
 			return false;
 		}
	 }



 }


