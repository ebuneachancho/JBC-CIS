<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class churchFinance extends CI_Model{
 	
 	function __construct(){
 		parent::__construct();
 	}	

 	public function saveOfferings($data){
 		$query = $this->db->insert('offerings', $data);
 		if ($query == true) {
 			return true;
 		}else{
 			return false;
 		}
 	}
 	public function recordTiths($data){
 		$query = $this->db->insert('tiths', $data);
 		if ($query == true) {
 			return true;
 		}else{
 			return false;
 		}
 	}
 	public function saveDonation($data){
 		$query = $this->db->insert('personal_donations', $data);
 		if ($query == true) {
 			return true;
 		}else{
 			return false;
 		}
 	}
 }



