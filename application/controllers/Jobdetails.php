<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobdetails extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_token')) {
			redirect('/login/');
		}
		$this->load->model('Jobdetailsmodel');
	}	

	public function index($value = '')
	{
		if ($this->uri->segment('2')) {
			$data['jobid'] = $this->Jobdetailsmodel->fetch_data($this->uri->segment('2'));
			$data['fetchapplytoken'] = $this->Jobdetailsmodel->fetch_data_apply($this->uri->segment('2'));
			$this->load->view('Jobdetails', $data);

		}else{
			show_404();
		}
		
	}


	public function jobdetailsaplly(){
		$emp = base64_decode($this->input->post('emp'));
		$job = base64_decode($this->input->post('job'));
		$token1 = bin2hex(uniqid());
		$token2 = bin2hex(openssl_random_pseudo_bytes(16));
		$apply_token = $token1.$token2;

		if ($this->Jobdetailsmodel->insertjobdetails($apply_token, $emp,$job, $this->session->userdata('user_token'))) {
			echo "success";
		}else{
			echo "something error";
		}
		
	}

	public function getmsgfile($id){

	}
}
