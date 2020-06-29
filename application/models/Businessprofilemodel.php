<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Businessprofilemodel extends CI_model {

	/*this function for new register user*/

	public function businessprofilemodeladata($token, $user_token, $business_name, $business_about, $business_type, $business_website, $business_outlet, $business_people,$business_cuissing, $business_address, $business_state, $business_city, $business_pin, $business_c_person, $business_c_number, $business_operational_1, $business_operational_2, $business_gst,$business_fssai)
	{
		$timenow=time();
		date_default_timezone_set("Asia/Kolkata");
		$current_time = (date("Y-m-d h:i:s",$timenow));

		$data = array(
                        'business_profile_token' => "$token",
                        'user_token' => "$user_token",
                        'business_name' => "$business_name",
                        'business_about' => "$business_about",
                        'business_type' => "$business_type",
                        'business_website' => "$business_website",
                        'business_outlet' => "$business_outlet",
                        'business_people' => "$business_people",
                        'business_cuissing' => "$business_cuissing",
                        'business_address' => "$business_address",
                        'business_state' => "$business_state",
                        'business_city' => "$business_city",
                        'business_pin' => "$business_pin",
                        'business_c_person' => "$business_c_person",
                        'business_c_number' => "$business_c_number",
                        'business_operational_1' => "$business_operational_1",
                        'business_operational_2' => "$business_operational_2",
                        'business_gst' => "$business_gst",
                        'business_fssai' => "$business_fssai",
                        'created_at' => "$current_time"

		);
		if ($this->db->insert('business_profile', $data)) {
			return true;
		}else{
			return false;
		}
	}

        public function getprofilemodel(){
                $get = $this->db->select('*')
                                ->from('business_profile')
                                ->join('employee_user', 'employee_user.user_token = business_profile.user_token')
                                ->get();
                if ($get->num_rows()>0) {
                        return $get->result();
                }else{
                        return false;
                }
        }


        public function getprofiledatamodel(){
                $get = $this->db->select('*')
                                ->from('business_profile')
                                ->join('employee_user', 'employee_user.user_token = business_profile.user_token')
                                ->get();
                if ($get->num_rows()>0) {
                        return $get->result();
                }else{
                        return false;
                }
        }


        public function profiledatafetch($user_token){
                $q = $this->db->where('user_token', $user_token)
                                ->get('business_profile');
                if ($q->num_rows()>0) {
                        
                        return $q->result();
                        
                }else{
                        return false;
                }       
        }

        public function profiledatafetchdata($user_token){
                $q = $this->db->where('user_token', $user_token)
                                ->where('user_type', 2)
                                ->get('employee_user');
                if ($q->num_rows()>0) {
                        
                        return $q->result();
                        
                }else{
                        return false;
                }       
        }


        public function businessprofilemodelupdate($user_token, $business_name, $business_about, $business_type, $business_website, $business_outlet, $business_people,$business_cuissing, $business_address, $business_state, $business_city, $business_pin, $business_c_person, $business_c_number, $business_operational_1, $business_operational_2, $business_gst,$business_fssai)
        {
                $timenow=time();
                date_default_timezone_set("Asia/Kolkata");
                $current_time = (date("Y-m-d h:i:s",$timenow));

                $da = $this->db->where('user_token', $user_token)
                                ->get('business_profile');
                if ($da->num_rows() > 0) {

                        $data = array(
                                'business_name' => "$business_name",
                                'business_about' => "$business_about",
                                'business_type' => "$business_type",
                                'business_website' => "$business_website",
                                'business_outlet' => "$business_outlet",
                                'business_people' => "$business_people",
                                'business_cuissing' => "$business_cuissing",
                                'business_address' => "$business_address",
                                'business_state' => "$business_state",
                                'business_city' => "$business_city",
                                'business_pin' => "$business_pin",
                                'business_c_person' => "$business_c_person",
                                'business_c_number' => "$business_c_number",
                                'business_operational_1' => "$business_operational_1",
                                'business_operational_2' => "$business_operational_2",
                                'business_gst' => "$business_gst",
                                'business_fssai' => "$business_fssai",
                                'updated_at' => "$current_time"

                        );
                        $this->db->where('user_token', $user_token)
                                        ->update('business_profile', $data);
                        return true;
                        
                }else{
                        return false;
                }
        }


        public function business_save_upload_image($user_token,$image,$token){
                $timenow=time();
                date_default_timezone_set("Asia/Kolkata");
                $current_time = (date("Y-m-d h:i:s",$timenow));
                $da = $this->db->where('user_token', $user_token)
                                ->get('business_profile');
                if ($da->num_rows() > 0) {
                        $data = array(
                                'business_logo' => $image,
                ); 
                $this->db->where('user_token',$user_token)
                                                ->update('business_profile', $data);
             
                        return true;
                }else{
                        $data = array(
                                'business_profile_token' => "$token",
                                'user_token' => "$user_token",
                                'business_logo' => "$image",
                                'created_at' => "$current_time"
                );
                        $this->db->insert('business_profile', $data);
                        return false;
                }
        
        }


        public function getbusinessimageadhar($user_token){
                $da = $this->db->where('user_token', $user_token)
                                ->get('business_profile');
                if ($da->num_rows() > 0) {
                        return $da->result();
                        
                }else{
                        return false;
                }
        }

        public function deleteimagedata($user_token){
                $data = array(
                        'business_logo' => NULL,
                );
                if ($this->db->where('user_token', $user_token)
                                        ->update('business_profile', $data)) {
                        return true;
                }else{
                        return false;
                }
        }

        public function profilefetch($user_token){
                $q = $this->db->where('user_token', $user_token)
                                ->get('business_profile');
                if ($q->num_rows()>0) {
                        
                        return $q->result();
                        
                }else{
                        return false;
                }       
        }

        public function getlastid(){
            $this->db->select("*");
            $this->db->from("job_detail");
            $this->db->limit(1,0);
            $this->db->order_by('Job_detail_id',"DESC");
            $query = $this->db->get();
            return $query->result_array();       
        }


        public function fetchprofileinfo($user_token){
                $q = $this->db->where('user_token', $user_token)
                                ->get('business_profile');
                if ($q->num_rows()>0) {
                        
                        return $q->result_array();
                        
                }else{
                        return false;
                }       
        }

        public function businesspostjobmodel($token, $user_token, $n3, $companyname, $company_logo, $job_title, $job_description, $job_location, $Job_state, $experience, $job_type, $accommodation_provided, $pn_duty_food_provided, $monthly_salary, $salary_annual, $ESI_provided, $PF_provided, $minimum_contract_period, $business_type, $working_hours, $monthly_paid_pff_days){
                $timenow=time();
                date_default_timezone_set("Asia/Kolkata");
                $current_time = (date("Y-m-d h:i:s",$timenow));

                $da = $this->db->where('user_token', $user_token)
                        ->get('business_profile');


                if ($da->num_rows()>0) {
                    $data = array(
                        'Job_detail_token' => "$token",
                        'employeer_user_token' => "$user_token",
                        'company_logo' => "$company_logo",
                        'job_title' => "$job_title",
                        'company_name' => "$companyname",
                        'job_id' => "$n3",
                        'experience' => "$experience",
                        'job_type' => "$job_type",
                        'job_location' => "$job_location",
                        'Job_state' => "$Job_state",
                        'posted_days_ago' => "$current_time",
                        'job_description' => "$job_description",
                        'monthly_salary' => "$monthly_salary",
                        'salary_annual' => "$salary_annual",
                        'working_hours' => "$working_hours",
                        'monthly_paid_pff_days' => "$monthly_paid_pff_days",
                        'accommodation_provided' => "$accommodation_provided",
                        'pn_duty_food_provided' => "$pn_duty_food_provided",
                        'ESI_provided' => "$ESI_provided",
                        'PF_provided' => "$PF_provided",
                        'business_type' => "$business_type",
                        'minimum_contract_period' => "$minimum_contract_period",
                        'created_at' => "$current_time"

                );
                $this->db->insert('job_detail', $data);
                return true;
            }else{
                return false;

            }
        }

    
}
