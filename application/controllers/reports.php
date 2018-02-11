<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class reports extends base_ctrl{
	function __construct(){
		parent::__construct();
		$this->load->model('report_model', 'model');
	}
	public function index(){
		 // $this->load->model('report_model');
	  //   $this->load->dbutil();
	  //   $this->load->helper('file');
	  //   /* get the object   */
	  //   $report = $this->report_model->index();
	  //   /*  pass it to db utility function  */
	  //   $new_report = $this->dbutil->csv_from_result($report);
	  //   /*  Now use it to write file. write_file helper function will do it */
	  //   write_file('csv_file.csv',$new_report);
   //  	/*  Done    */

   //  	 write_file($this->file_path . '/csv_file.csv', $new_report);
	  //   //force download from server
	  //   $this->load->helper('download');
	  //   $data = file_get_contents($this->file_path . '/csv_file.csv');
	  //   $name = 'name-'.date('d-m-Y').'.csv';
	  //   force_download($name, $data);

		 $query = $this->db->get('members');
      $result = $query->result();
      $data = array();
      if (!empty($result)) {
        foreach ($result as $result_data) {
          $data[] = $result_data;
        }
      }
      print json_encode($data);

	}
	public function getdata(){
		 $query = $this->db->get('members');
      $result = $query->result();
      $data = array();
      if (!empty($result)) {
        foreach ($result as $result_data) {
          $data[] = $result_data;
        }
      }
      print json_encode($data);
	}
	
	
}

