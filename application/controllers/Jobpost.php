<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobpost extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_token')) {
			redirect('/login/');
		}
		$this->load->model('Businessprofilemodel');

	}

	public function index()
	{
		
		$this->load->view('inc/header');	
		$this->load->view('Jobpost');
		
		
	}


	public function fetchdataforprofile(){
		$user_token = $this->session->userdata('user_token');
		if ($data = $this->Businessprofilemodel->profilefetch($user_token)) {
			foreach ($data as $profile) {
				?>
					<div class="col-md-1 col-2 float-left no-padding"> 
					
	                	<div class="job_img">
	                		<?php if ($profile->business_logo == NULL) {
							?>
	                    	<img src="<?php echo base_url('assets/images/business_img.png'); ?>" class="mr-3 job_img">
	                    	<?php }
	                    	else{
	                    		?>
	                    		<img src="<?php echo base_url('uploads/').$profile->business_logo; ?>" class="mr-3 job_img">
	                    		<?php
	                    	} ?>
	                	</div>
	            	</div>
            	<div class="col-md-8 col-10 float-left" style="padding-left: 30px !important;">
            	 <?php if ($profile->business_name) {
            	 	?>
                	<span class="primery_title w-100 float-left"> <?php echo $profile->business_name ?> </span>
                	<?php } ?>
                	<?php if ($profile->business_city) {
            	 	?>
                	<span class="second_subtitle w-100 float-left"> <?php echo $profile->business_city ?> </span>
                	<?php } ?>
                	<a href="<?php echo base_url('businessprofile/'); ?>" class="add_link" style="margin-top: 10px; float: left;"> Edit Profile </a>
            	</div>
            	<?php
			}
			
		}else{
			show_404();
		}
	}



	public function insertbusinesspostdata(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('job_title', 'Job Title', 'required|trim');
		$this->form_validation->set_rules('job_description', 'Job Description', 'required|trim');
		$this->form_validation->set_rules('job_location', 'Job Location', 'required|trim');
		$this->form_validation->set_rules('Job_state', 'Job City', 'required|trim');

		if ($this->form_validation->run()) {
			$job_title = $this->input->post("job_title");
			$job_description = $this->input->post("job_description");
			$job_location = $this->input->post("job_location");
			$Job_state = $this->input->post("Job_state");
			$experience = $this->input->post("experience");
			$job_type = $this->input->post("job_type");
			$accommodation_provided = $this->input->post("accommodation_provided");
			$pn_duty_food_provided = $this->input->post("pn_duty_food_provided");
			$monthly_salary = $this->input->post("monthly_salary");
			$salary_annual = $this->input->post("salary_annual");
			$ESI_provided = $this->input->post("ESI_provided");
			$PF_provided = $this->input->post("PF_provided");
			$minimum_contract_period = $this->input->post("minimum_contract_period");
			$business_type = $this->input->post("business_type");
			$working_hours = $this->input->post("working_hours");
			$monthly_paid_pff_days = $this->input->post("monthly_paid_pff_days");
			

			$token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;


			$last = $this->Businessprofilemodel->getlastid();
			foreach ($last as $lastid) {
				$last3chars = substr($lastid['job_id'], -5);
				$n = $last3chars;
				$n2 = str_pad($n + 1, 5, 0, STR_PAD_LEFT);
				$n3 = "ADD".$n2;
				$getcom = $this->Businessprofilemodel->fetchprofileinfo($this->session->userdata('user_token'));
				foreach ($getcom as $value) {
					$companyname = $value['business_name'];
					$company_logo = $value['business_logo'];
				
					if ($this->Businessprofilemodel->businesspostjobmodel($token, $this->session->userdata('user_token'), $n3, $companyname, $company_logo, $job_title, $job_description, $job_location, $Job_state, $experience, $job_type, $accommodation_provided, $pn_duty_food_provided, $monthly_salary, $salary_annual, $ESI_provided, $PF_provided, $minimum_contract_period, $business_type, $working_hours, $monthly_paid_pff_days)) {
						echo "Successfully Inserted data";
					}else{
						echo "Data not inserted";
					}
				}
			}
			
		}else{
			echo "Please fill all fields";
		}
	}
}
