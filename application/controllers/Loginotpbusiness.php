<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginotpbusiness extends CI_Controller {

	
	public function index()
	{

		$this->load->view('loginotpbusiness');
		
	}

	public function businessotplogin(){
			$this->load->model('Loginmodel');
		
			if (isset($_SESSION['otp']) && isset($_SESSION['number']) && !empty($this->input->post("b"))) {

				if ($this->input->post("b")==$_SESSION['otp']) {
					if ($getnumber = $this->Loginmodel->businessotpchecklogin($_SESSION['number'])) {
						foreach ($getnumber as $getnumbervalue) {
						
							$userdata= array(
								'user_token'  => $getnumbervalue->user_token,
								'user_email_id' => $getnumbervalue->user_email_id,
								'user_type' => $getnumbervalue->user_type,
							);
							$this->session->set_userdata($userdata);
							echo "success";
						}
					}else{
						echo "Login faild";
					}
				}else{
					echo "OTP invalid";
					
				}
			}else{
				echo "Please click Get OTP link";
			}
	}
	
	public function businessgetnumbermodel(){
		$this->load->library('form_validation');
		$this->load->model('Loginmodel');

		
		if (is_numeric($this->input->post("n"))) {
			if ($this->Loginmodel->businessgetnumbermodel($this->input->post("n"))) {
				echo "ok";
			}else{
				echo "number not register";
			}
		}else{
			echo "Please enter number";
		}
	}
}
