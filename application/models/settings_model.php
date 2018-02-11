<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function save_role($request){
        $query = $this->db->insert('roles', $request);
        if ($query == true) {
            return true;
        }else{
            return false;
        }
    }
    public function save_church($request){
        $this->db->where('setting_name', 'church name');
        $query = $this->db->update('settings', $request);
        if ($query == true) {
            return true;
        }else{
            return false;
        }
    }
    public function save_church_logo($request){
        $this->db->where('setting_name', 'church logo');
        $query = $this->db->update('settings', $request);
        if ($query == true) {
            return true;
        }else{
            return false;
        }
    }
    public function save_new_user($request){
        $query = $this->db->insert('users', $request);
        if ($query == true) {
            return true;
        }else{
            return false;
        }
    }
}
