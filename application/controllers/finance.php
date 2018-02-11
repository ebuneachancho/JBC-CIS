<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class finance extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('churchFinance', 'model');
		
	}
	public function index(){
		$this->load->view('churchFinance');
	}
	// saving church offerings
	public function saveOfferings(){
		$amount = $this->security->xss_clean($this->input->post('amount'));
		$offeringType = $this->security->xss_clean($this->input->post('offeringType'));
		$data = array('offering_name' => $offeringType, 
						'offering_amount' => $amount, 
						'date_recorded' => date('Y-m-d'));
		
		$query = $this->model->saveOfferings($data);
		if ($query == true) {
			$message = array('offeringSaved' => 'Offering has been successfully saved for this sunday.');
			$this->session->set_userdata($message);
			redirect('finance');
		}else{
			echo "Move me out of here";
			
		}
	}
	public function tiths(){
		$firstName = $this->security->xss_clean($this->input->post('firstName'));
		$lastName = $this->security->xss_clean($this->input->post('lastName'));
		$amount = $this->security->xss_clean($this->input->post('amount'));
		$prayerRequest = $this->security->xss_clean($this->input->post('prayerRequest'));
		$data = array('first_name' => $firstName, 
						'last_name' => $lastName,
						'amount' => $amount, 
						'date' => date('Y-m-d'),
						'prayer_request' => $prayerRequest);

		$query = $this->model->recordTiths($data);
		if($query == true) {
			$message = array('tithSaved' => 'Tiths for this christian has been saved successfully.');
			$this->session->set_userdata($message);
			redirect('finance');
		}else{
			echo "Move me out of here";
		}
	}
	public function freeDonations(){
		$firstName = $this->security->xss_clean($this->input->post('firstName'));
		$lastName = $this->security->xss_clean($this->input->post('lastName'));
		$amount = $this->security->xss_clean($this->input->post('amount'));
		$donatedItem = $this->security->xss_clean($this->input->post('donatedItem'));
		$data = array('first_name' => $firstName, 
						'last_name' => $lastName,
						'amount' => $amount, 
						'date' => date('Y-m-d'),
						'item_donated' => $donatedItem);

		$query = $this->model->saveDonation($data);
		if ($query == true) {
			$message = array('freeDonations' => 'Donation has been saved for this Christian.');
			$this->session->set_userdata($message);
			redirect('finance');
		}else{
			echo "Move me out of here";
		}
	}
	
}

