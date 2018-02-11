<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    public function index(){
        return $query = $this->db->get('members');
        /*
        note i am returning 
        the query object instead of 
        $query->result() or $query->result_array()
        */
    }
}
