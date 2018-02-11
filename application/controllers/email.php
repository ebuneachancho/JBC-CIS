<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class email extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('email_model', 'model');
		
	}
	public function index(){
		
	}
	public function sendGroupMessage(){
		$groupName = $this->security->xss_clean($this->input->post('groupName'));
		$message = $this->security->xss_clean($this->input->post('message'));
		$sendMail = $this->security->xss_clean($this->input->post('sendMail'));
		echo $groupName;
		if ($sendMail) {
			# write code to also send email to the users of the group selected
		}
		$numbers = $this->getGroupMemberNumbers($groupName);
		print_r($numbers);
		$numberArray = array();
		$numberArray = $numbers;
		$sendMessage = $this->sendSMSMessage($numbers, $message);
		if ($sendMessage) {
			echo "Success";
		}else{
			echo "Failed to send message";
		}
		// use a loop to send messages to all the contact in this group
	}
	// also check if the group is 'church'. if church then, select every record in the database and send email to them
	private function getGroupMemberNumbers($groupName){
		$groupMemberNumbers = $this->model->getAllGroupMembers($groupName);
		if (!empty($groupMemberNumbers)) {
			return $groupMemberNumbers;
		}else{
			echo "no record found for this group";
		}
	}

	/*===================================================================
	  ============ MY FUNCTION TO SEND SMS MESSAGES TO MEMBERS ==========
	  ===================================================================
	*/
	private function sendSMSMessage($numbers, $sendMessage){
		 // load library
        $this->load->library('nexmo');
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');
        /*
        // **********************************Text Message*************************************
        */
        $from = 'Jerusalem Baptist Church';
        //$to = $numbers;
       	if (is_array($numbers) || is_object($numbers)) {
       		foreach ($numbers as $to) {
	       		 $message = array(
	            	'text' => $sendMessage,
				 );
				 $person = $to;
		         $response = $this->nexmo->send_message($from, $person, $message);
       		}
       	}
        echo "<h1>Text Message</h1>";
        $this->nexmo->d_print($response);
        echo "<h3>Response Code: ".$this->nexmo->get_http_status()."</h3>";

	}
	
}

