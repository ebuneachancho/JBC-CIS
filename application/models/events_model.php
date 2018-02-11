<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class events_model extends CI_Model{
 	
 	function __construct(){
 		parent::__construct();
 	}	

 	public function get_events($start, $end){
	    return $this->db->where("start >=", $start)->where("end <=", $end)->get("calendar_events");
	}

	public function add_event($data){
	    $this->db->insert("calendar_events", $data);
	}

	public function get_event($id){
	    return $this->db->where("id", $id)->get("calendar_events");
	}

	public function update_event($id, $data){
	    $this->db->where("id", $id)->update("calendar_events", $data);
	}

	public function delete_event($id){
	    $this->db->where("id", $id)->delete("calendar_events");
	}

 }



