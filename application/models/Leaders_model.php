<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaders_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    public function authenticate_leader($username, $password, $leader_id) {
        $this->db->select('*');
        $this->db->from('leader_roles');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $this->db->select('*');
            $this->db->from('leader_roles, members');
            $this->db->where('member_id', $leader_id);
            // $this->db->join('members', 'leader_roles.member_id = members.id');
            // $this->db->limit(1);
            $sql = 'SELECT * FROM leader_roles, members WHERE member_id = members.id AND member_id = "'.$leader_id.'"';
            $this->db->query($sql);
            // produces: 
            // SELECT * FROM leader_roles JOIN members ON members.id=leader_roles.member_id
            //$query = $this->db->get();
            echo "<pre>";
            echo print_r($query->result());
            echo "</pre>";
            //return $query->result();
        }
        return false;
    }
    public function query_leader_details($leader_id){
         $this->db->select('*');
        $this->db->from('members');
        $this->db->where('id', $leader_id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();
            return $row;
        }else{
            return false;
        }
    }   

    public function save_leader_credentials($request){
        $query = $this->db->insert('leader_roles', $request);
        if ($query == true) {
            return true;
        }else{
            return false;
        }
    }
    private function check_leader_exits(){
        $sql = "SELECT member_id FROM leader_roles";
        $query = $this->db->query($sql);

    }
}
