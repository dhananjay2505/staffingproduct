<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobdetailsmodel extends CI_model {

	

	public function insertjobdetails($token, $emp,$job, $user_token)
	{
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));
		
		
		$data = array(
			'job_apply_token' => "$token",
		    'user_token' => "$user_token",
		    'employer_token' => "$emp",
		    'job_token' => "$job",
		    
		    'job_apply_time' => "$current_time"
		);
		$this->db->insert('job_apply', $data);
		return $this->db->insert_id();
		   
	}

	public function fetch_data($query)
	{
	  $this->db->where('Job_detail_id', $query);
	  $query = $this->db->get('job_detail');
	  if($query->num_rows()>0)
	  {
	  	return $query->result_array();
	  	
	  }else{
	  	return false;
	  }
	   
	 }
	 public function fetch_data_apply($query)
	{
	  $this->db->where('job_token', $query);
	  $query = $this->db->get('job_apply');
	  if($query->num_rows()>0)
	  {
	  	return $query->result_array();
	  	
	  }else{
	  	return "1";
	  }
	   
	 }
	
}
