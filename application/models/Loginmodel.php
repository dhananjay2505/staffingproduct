<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_model {

	/*this function for new register user*/

	public function loginmodeldata($username,$password)
	{
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		$data = array(
        'user_mobile_number' => "$username",
        'user_pwd' => "$password",
		);
		$q = $this->db->where('user_mobile_number', $username)
						->where('user_pwd',$password)
						->where('user_type', 1)
						->get('employee_user');

		$email = $this->db->where('user_email_id', $username)
						->where('user_pwd',$password)
						->where('user_type', 1)
						->get('employee_user');
		if ($q->num_rows()>0) {
			return $q->result();
			
		}else if ($email->num_rows()>0){
			return $email->result();
		}else{
			return false;
		}
		
	}

	public function businessloginmodeldata($username,$password)
	{
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		$data = array(
        'user_mobile_number' => "$username",
        'user_pwd' => "$password",
		);
		$q = $this->db->where('user_mobile_number', $username)
						->where('user_pwd',$password)
						->where('user_type', 2)
						->get('employee_user');

		$email = $this->db->where('user_email_id', $username)
						->where('user_pwd',$password)
						->where('user_type', 2)
						->get('employee_user');
		if ($q->num_rows()>0) {
			return $q->result();
			
		}else if ($email->num_rows()>0){
			return $email->result();
		}else{
			return false;
		}
		
	}

	public function change_password($password, $number){
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		$data = array(
	        'user_mobile_number' => $number,
	        'user_pwd' => $password,
	        'pwd_update_time' => $current_time
    	);
    	$this->db->where('user_mobile_number', $number);
    	$this->db->update('employee_user', $data);
    	return true;
	}


	public function otpchecklogin($number){
		$number = $this->db->where('user_mobile_number', $number)
							->where('user_type', 1)
						->get('employee_user');
		if ($number->num_rows()>0) {
			return $number->result();
		}
		else{
			return false;
		}
						
	}

	public function businessotpchecklogin($number){
		$number = $this->db->where('user_mobile_number', $number)
							->where('user_type', 2)
							->get('employee_user');
		if ($number->num_rows()>0) {
			return $number->result();
		}
		else{
			return false;
		}
						
	}

	public function getnumbermodel($number){
		$nu = $this->db->where('user_mobile_number', $number)
						->where('user_type', 1)
						->get('employee_user');
		if ($nu->num_rows()>0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function businessgetnumbermodel($number){
		$nu = $this->db->where('user_mobile_number', $number)
						->where('user_type', 2)
						->get('employee_user');
		if ($nu->num_rows()>0) {
			return true;
		}
		else{
			return false;
		}
	}
	
}
