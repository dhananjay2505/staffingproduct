<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilecandidate extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_token')) {
			redirect('/login/');
		}
		$this->load->model('Profilecandidatemodel');

	}

	public function index()
	{
		$this->load->model('Profilecandidatemodel');

		$profile['h'] = $this->Profilecandidatemodel->profiledata($this->session->userdata('user_token'));
		$profile['get_personal'] = $this->Profilecandidatemodel->getpersonaldatamodel($this->session->userdata('user_token'));
		$profile['state'] = $this->Profilecandidatemodel->getstate();
		$this->load->view('Profilecandidate', $profile);
		
		
	}
/*personal information insert and update*/

	public function insertpersonaldata(){

		$this->load->library('form_validation');
		$this->load->model('Profilecandidatemodel');

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|alpha|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|alpha|min_length[2]|max_length[20]');

		if ($this->form_validation->run()) {
			$firstname = $this->input->post("firstname");
			$lastname = $this->input->post("lastname");
			$state = $this->input->post("state");
			$city = $this->input->post("city");
			$address = $this->input->post("address");
			$gender = $this->input->post("gender");
			$dob = $this->input->post("dob");
			$expyear = $this->input->post("expyear");
			$expmonth = $this->input->post("expmonth");
			$c_salary_lac = $this->input->post("c_salary_lac");
			$c_salary_thousand = $this->input->post("c_salary_thousand");
			$languages = $this->input->post("languages");

			$token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;
			
			if ($this->Profilecandidatemodel->insertpersonaldata($token, $this->session->userdata('user_token'), $firstname, $lastname, $state, $city, $address, $gender,$dob, $expyear, $expmonth, $c_salary_lac, $c_salary_thousand, $languages)) {
				
				echo "Successfully Inserted data";
			}else{
				echo "Already personal information added";
			}
			
		}else{
			echo "Something error";
		}

	}


	
	public function updatepersonaldata(){

		$this->load->library('form_validation');
		$this->load->model('Profilecandidatemodel');

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|alpha|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|alpha|min_length[2]|max_length[20]');

		if ($this->form_validation->run()) {
			$firstname = $this->input->post("firstname");
			$lastname = $this->input->post("lastname");
			$state = $this->input->post("state");
			$city = $this->input->post("city");
			$address = $this->input->post("address");
			$gender = $this->input->post("gender");
			$dob = $this->input->post("dob");
			$expyear = $this->input->post("expyear");
			$expmonth = $this->input->post("expmonth");
			$c_salary_lac = $this->input->post("c_salary_lac");
			$c_salary_thousand = $this->input->post("c_salary_thousand");
			$languages = $this->input->post("languages");
			
			if ($this->Profilecandidatemodel->updatepersonalmodel($this->session->userdata('user_token'), $firstname, $lastname, $state, $city, $address, $gender,$dob, $expyear, $expmonth, $c_salary_lac, $c_salary_thousand, $languages)) {
				
				echo "Updated Successfully";

			}else{
				echo "Already personal information added1";
			}
			
		}else{
			show_404();
		}

	}
	/*end this function*/

	/*function for experince section insert update delete*/

	public function insertexperience(){

		$this->load->library('form_validation');
		$this->load->model('Profilecandidatemodel');

		$this->form_validation->set_rules('comapnyname', 'Comapny Name', 'trim|required');

		if ($this->form_validation->run()) {
			$positionname = $this->input->post("positionname");
			$comapnyname = $this->input->post("comapnyname");
			$state = $this->input->post("state");
			$city = $this->input->post("city");
			$startyear = $this->input->post("startyear");
			$startmonth = $this->input->post("startmonth");
			$currentcompany = $this->input->post("currentcompany");
			$token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;

			if ($currentcompany=="Yes") {
				$present = "Present";
				if ($this->Profilecandidatemodel->insertexperincemodel($token, $this->session->userdata('user_token'), $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $present)) {
					echo "Successfully Inserted data";
				}else{
					echo "Something error";
				}
			}else{
				$endyear = $this->input->post("endyear");
				$endmonth = $this->input->post("endmonth");
				if ($this->Profilecandidatemodel->insertexperincemodelcondition($token, $this->session->userdata('user_token'), $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $endyear, $endmonth)) {
					echo "Successfully Inserted data";
				}else{
					echo "Something error";
				}
			}
			
		}else{
			echo "Something error";
		}

	}


	
	public function addmoreexperience(){

		$this->load->library('form_validation');
		$this->load->model('Profilecandidatemodel');

		$this->form_validation->set_rules('comapnyname', 'Comapny Name', 'trim|required');

		if ($this->form_validation->run()) {
			$positionname = $this->input->post("positionname");
			$comapnyname = $this->input->post("comapnyname");
			$state = $this->input->post("state");
			$city = $this->input->post("city");
			$startyear = $this->input->post("startyear");
			$startmonth = $this->input->post("startmonth");
			$currentcompany = $this->input->post("currentcompany");
			$token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;
			
			if ($currentcompany=="Yes") {
				$present = "Present";
				if ($this->Profilecandidatemodel->insertexperincemodelmore($token, $this->session->userdata('user_token'), $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $present)) {
					echo "Successfully Inserted data";
				}else{
					echo "Something error";
				}
			}else{
				$endyear = $this->input->post("endyear");
				$endmonth = $this->input->post("endmonth");
				if ($this->Profilecandidatemodel->insertexperincemodelconditionmore($token, $this->session->userdata('user_token'), $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $endyear, $endmonth)) {
					echo "Successfully Inserted data";
				}else{
					echo "Something error";
				}
			}
			
		}else{
			echo "Something error";
		}

	}



	/*for fatching the data  for experince*/

	public function getdata(){

		if ($getexpdata = $this->Profilecandidatemodel->getexpdatamodel($this->session->userdata('user_token'))) {
			?>
			<h1 class="section_title">Experience </h1>
                <a href="" class="add_link float-right" data-toggle="modal" data-target="#experience">Add</a>
                    
                <ul class="cpmmon_ul">
			<?php
			$count = 1;
			foreach ($getexpdata as $k_value) {
				?>
				
                    <li>
                        <div class="w-100 float-left">
                            <span class="font_14 w-100 bold float-left"><?php echo $k_value->work_experience_position; ?>
                            <input type="hidden" value="<?php echo $count; ?>">	
                            	<a href="" class="editexp" id="<?php echo $k_value->work_experience_token; ?>">Edit</a>
                            	<a href="" class="deleteexp" id="<?php echo $k_value->work_experience_token; ?>">Delete</a>
                            </span>

                            <span class="second_subtitle w-100 float-left"><?php echo $k_value->work_experience_company_name; ?></span>
                            <span class="second_subtitle w-100"><?php echo $k_value->work_experience_start_month." ".$k_value->work_experience_start_year." - "; if ($k_value->work_experience_end_year !=NULL && $k_value->work_experience_end_month !=NULL) {
                            	echo $k_value->work_experience_end_year." ".$k_value->work_experience_end_month;
                            }else{
                            	echo $k_value->work_experience_still_working;
                            } ?></span>
                        </div>
                    </li>
            	
				<?php
			
			}
			?>
			</ul>
			<?php
		}else{
			?>
			<h1 class="section_title">Experience </h1>
                <a href="" class="add_link float-right" data-toggle="modal" data-target="#experience">Add</a>
                <!-- If there is no data =========== -->
                <div class="w-100 float-left mt_20" id="notfound">
                	<img src="<?php echo base_url('assets/images/icon_1.svg'); ?>" class="float-left">
                	<span class="subtitle float-left w-100 mt_10"> Mention your employment details including your current and previous company work experience. </span> 
                </div>
			<?php
		}
	}


	/*for update fetchin data*/

	public function fetchexpdata(){
		$experience_token = $this->input->post('employee_id');
		$user_token = $this->session->userdata('user_token');
		if ($fetchdata = $this->Profilecandidatemodel->getexpdataforupdate($experience_token, $user_token)) {	
			echo json_encode($fetchdata);
		}else{
			show_404();
		}
	}

	public function updateexprencedata(){
		$u_token = $this->input->post('abcdata');
		$positionname = $this->input->post("positionname");
		$comapnyname = $this->input->post("comapnyname");
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$startyear = $this->input->post("startyear");
		$startmonth = $this->input->post("startmonth");
		$currentcompany = $this->input->post("currentcompany");
		$user_token = $this->session->userdata('user_token');
		if ($currentcompany=="Yes") {
			$present = "Present";
			if ($this->Profilecandidatemodel->updateexprencedatamodal($u_token, $user_token, $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $present))
			{
				echo "Successfully updated";
			}else{
				echo "Something error";
			}
		}else{
			$endyear = $this->input->post("endyear");
			$endmonth = $this->input->post("endmonth");
			if ($this->Profilecandidatemodel->updateexprencedatamodal1($u_token, $user_token, $positionname, $comapnyname, $state, $city, $startyear, $startmonth, $endyear, $endmonth)) {
					echo "Successfully updated";
			}else{
				echo "Something error";
			}
		}
	}


	public function deleteexprencedata(){
		$u_token = $this->input->post('delete_id');
		$user_token = $this->session->userdata('user_token');
	
		if ($this->Profilecandidatemodel->deleteexprencedatamodal($u_token, $user_token))
		{
			echo "Deleted Successfully";
		}else{
			echo "Something error";
		}
	}


		/*for fatching the data  for education*/


	public function deleteeducationdata(){
		$delete_education_id = $this->input->post('delete_education_id');
		$user_token = $this->session->userdata('user_token');
		
		if ($this->Profilecandidatemodel->deleteeducationdatamodal($delete_education_id, $user_token))
		{
			echo "Deleted Successfully";
		}else{
			echo "Something error";
		}
	}

	public function educationgetdata(){

		if ($getexpdata = $this->Profilecandidatemodel->getedudatamodel($this->session->userdata('user_token'))) {
			?>
			<h1 class="section_title"  id="Certicifation">Certicifation  </h1>
                <a href="" class="add_link float-right" data-toggle="modal" data-target="#education">Add</a>
                <ul class="cpmmon_ul">
			<?php
			$count = 1;
			foreach ($getexpdata as $k_value) {
				?>
					<li>
                        <div class="w-100 float-left">
                            <span class="font_14 w-100 bold float-left"><?php echo $k_value->academic_qualifications_course_name; ?>
                            	<a href="" class="educationedit" id="<?php echo $k_value->academic_qualifications_token; ?>">Edit</a>
                            	<a href="" class="educationdelete" id="<?php echo $k_value->academic_qualifications_token; ?>">Delete</a>
                            </span>
                            <span class="second_subtitle w-100 float-left"><?php echo $k_value->academic_qualifications_school_name; ?></span>
                            <span class="second_subtitle w-100"><?php echo $k_value->academic_qualifications_start_year; ?></span>
                        </div>
                    </li>
            	
				<?php
			
			}
			?>
			</ul>
			<?php
		}else{
			?>
			<h1 class="section_title">Certicifation </h1>
                <a href="" class="add_link float-right" data-toggle="modal" data-target="#education">Add</a>
                <!-- If there is no data =========== -->
                <div class="w-100 float-left mt_20" id="notfound">
                	<img src="<?php echo base_url('assets/images/icon_1.svg'); ?>" class="float-left">
                	<span class="subtitle float-left w-100 mt_10"> Mention your employment details including your current and previous company work experience. </span> 
                </div>
			<?php
		}
	}

	public function updatedataexp(){

		$this->load->library('form_validation');
		$this->load->model('Profilecandidatemodel');

		$this->form_validation->set_rules('classname', 'Class name', 'trim|required');
		$this->form_validation->set_rules('schoolname', 'School Name', 'trim|required');

		if ($this->form_validation->run()) {
			$classname = $this->input->post("classname");
			$schoolname = $this->input->post("schoolname");
			$startingyear = $this->input->post("startingyear");
			
			$token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;

			if ($this->Profilecandidatemodel->inserteducationmodel($token, $this->session->userdata('user_token'), $classname, $schoolname, $startingyear)) {
				echo "Successfully Inserted data";
			}else{
				echo "Something error";
			}
			
		}else{
			echo "Something error";
		}

	}


	public function addmoreeducation(){

		$this->load->library('form_validation');
		$this->load->model('Profilecandidatemodel');

		$this->form_validation->set_rules('classname', 'Class name', 'trim|required');
		$this->form_validation->set_rules('schoolname', 'School Name', 'trim|required');

		if ($this->form_validation->run()) {
			$classname = $this->input->post("classname");
			$schoolname = $this->input->post("schoolname");
			$startingyear = $this->input->post("startingyear");
			
			$token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;

			if ($this->Profilecandidatemodel->inserteducationmodel($token, $this->session->userdata('user_token'), $classname, $schoolname, $startingyear)) {
				echo "Successfully Inserted data";
			}else{
				echo "Something error";
			}
			
		}else{
			echo "Something error1";
		}

	}


	/*fetch data form  database education*/

	public function fetcheducationdata(){
		$education_id = $this->input->post('education_id');
		$user_token = $this->session->userdata('user_token');
		if ($fetchdata = $this->Profilecandidatemodel->geteducationdataforfetch($education_id, $user_token)) {	
			echo json_encode($fetchdata);
		}else{
			show_404();
		}
	}

	/*update education section for database*/

	public function updateeducationdata(){
		$u_token = $this->input->post('educationtoken');
		$classname = $this->input->post("classname1");
		$schoolname = $this->input->post("schoolname1");
		$startingyear = $this->input->post("startingyear1");
		$user_token = $this->session->userdata('user_token');
		if ($this->Profilecandidatemodel->updateeducationdatamodal($u_token, $user_token, $classname, $schoolname, $startingyear))
		{
			echo "Successfully updated";
		}else{
			echo "Something error";
		}
	}

	/*preferenrces*/

	
	public function fetchpregetdata(){

		if ($getexpdata = $this->Profilecandidatemodel->getpreferencemodel($this->session->userdata('user_token'))) {
			?>
			<h1 class="section_title">Preferences</h1>
                <a href="" class="add_link float-right" data-toggle="modal" id="editprefre" data-target="#preferences1">Edit</a>
                    
                <ul class="cpmmon_ul">
			<?php
			foreach ($getexpdata as $k_value) {
				?>
				
                    <li>
                        <div class="w-100 float-left">
                            <span class="font_14 w-100 bold float-left"><?php echo $k_value->preferences_position; ?>
                            <input type="hidden" name="data" value="<?php echo $k_value->preferences_token; ?>">
                            </span>

                            <span class="second_subtitle w-100 float-left"><?php echo $k_value->preferences_job_type; ?></span>
                            <span class="second_subtitle w-100 float-left"><?php echo $k_value->preferences_location; ?></span>
                            <span class="second_subtitle w-100 float-left"><?php echo $k_value->preferences_business_type; ?></span>
                            <span class="second_subtitle w-100 float-left"><?php echo $k_value->preferences_salary." ".$k_value->preferances_salary_year; ?></span>
                        </div>
                        <form id="updateprefrence">
                        	<input type="hidden" name="prefrence_token" id="prefrence_token" value="<?php echo $k_value->preferences_token; ?>">
                        </form>
                    </li>
            	
				<?php
			
			}
			?>
			</ul>
			<?php
		}else{
			?>
			<h1 class="section_title">Preferences</h1>
                <a href="" class="add_link float-right" data-toggle="modal" data-target="#preferences">Add</a>
                <!-- If there is no data =========== -->
                <div class="w-100 float-left mt_20" id="notfound">
                	<img src="<?php echo base_url('assets/images/icon_1.svg'); ?>" class="float-left">
                	<span class="subtitle float-left w-100 mt_10"> Mention your employment details including your current and previous company work experience. </span> 
                </div>
			<?php
		}
	}	


	public function insertpereferenrcedata(){

		$this->load->library('form_validation');
		$this->load->model('Profilecandidatemodel');
		$this->form_validation->set_rules('presalary', 'Pre Salary', 'trim');

		if ($this->form_validation->run()) {
			
			$preposition = $this->input->post("preposition");
			$jobtype = $this->input->post("jobtype");
			if (is_array($jobtype)) {
				$jobstype = implode(", ", $jobtype);
				
			}else{
				$jobstype = NULL;
			}
			$state = $this->input->post("state");
			$city = $this->input->post("city");
			$jobindustry = $this->input->post("jobindustry");
			if (is_array($jobindustry)) {
				$jobsindustry = implode(", ", $jobindustry);
			}else{
				$jobsindustry = NULL;
			}
			
			
			$presalary = $this->input->post("presalary");
			$presalary1 = $this->input->post("presalary1");

			$token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;
			
			if ($this->Profilecandidatemodel->insertperferancesmodeldata($token, $this->session->userdata('user_token'), $preposition, $jobstype, $state, $city, $jobsindustry, $presalary, $presalary1)) {
				echo "Successfully Inserted data";
			}else{
				echo "Already personal information added";
			}
			
		}else{
			echo "Something error";
		}

	}


	/*for preference update data */
	public function preferenceupdate(){
		$prefrence_token = $this->input->post('prefrence_token');
		$preposition = $this->input->post("preposition1");
		$jobtype = $this->input->post("jobtype1");
		if (is_array($jobtype)) {
			$jobstype = implode(", ", $jobtype);
		}else{
			$jobstype = NULL;
		}
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$jobindustry = $this->input->post("jobindustry1");
		if (is_array($jobindustry)) {
			$jobsindustry = implode(", ", $jobindustry);
		}else{
			$jobsindustry = NULL;
		}
		$presalary1 = $this->input->post("presalary1");
		$presalary2 = $this->input->post("presalary2");
		if ($this->Profilecandidatemodel->updateperferancesmodeldata($this->session->userdata('user_token'), $preposition, $jobstype, $state, $city, $jobsindustry, $presalary1, $presalary2))
		{
			echo "Successfully Updated";
		}else{
			echo "Already personal information added";
			
		}
	}

	public function educationdatagetonload(){

		if ($getexpdata = $this->Profilecandidatemodel->educationdatagetmodel($this->session->userdata('user_token'))) {
			?>
			<h1 class="section_title"  id="Certicifation">Education  </h1>
                <a href="" class="add_link float-right" data-toggle="modal" data-target="#educationshow">Add</a>
                <ul class="cpmmon_ul">
			<?php
			foreach ($getexpdata as $k_value) {
				?>
					<li>
                        <div class="w-100 float-left">
                            <span class="font_14 w-100 bold float-left"><?php echo $k_value->academic_certifications_name; ?>
                            	<a href="" class="educationdatupdate" id="<?php echo $k_value->academic_certifications_token; ?>">Edit</a>
                            	<a href="" class="educationdatdelete" id="<?php echo $k_value->academic_certifications_token; ?>">Delete</a>
                            </span>
                            <span class="second_subtitle w-100 float-left"><?php echo $k_value->academic_certifications_course_type; ?></span>
                            <span class="second_subtitle w-100 float-left"><?php echo $k_value->academic_certifications_school_name; ?></span>
                        </div>
                    </li>
            	
				<?php
			
			}
			?>
			</ul>
			<?php
		}else{
			?>
			<h1 class="section_title">Education </h1>
                <a href="" class="add_link float-right" data-toggle="modal" data-target="#educationshow">Add</a>
                <!-- If there is no data =========== -->
                <div class="w-100 float-left mt_20" id="notfound">
                	<img src="<?php echo base_url('assets/images/icon_1.svg'); ?>" class="float-left">
                	<span class="subtitle float-left w-100 mt_10"> Mention your employment details including your current and previous company work experience. </span> 
                </div>
			<?php
		}
	}

	/*insert education section*/
	public function inserteducationsectiondata(){

		$this->load->library('form_validation');
		$this->load->model('Profilecandidatemodel');

		$this->form_validation->set_rules('universityname', 'University Name', 'trim|required');

		if ($this->form_validation->run()) {
			$qilification = $this->input->post("qilification");
			$universityname = $this->input->post("universityname");
			$coursename = $this->input->post("coursename");
			$passingyear = $this->input->post("passingyear");
			$passingendyear = $this->input->post("passingendyear");
			$token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;

			if ($this->Profilecandidatemodel->firstinsertecidationsection($token, $this->session->userdata('user_token'), $qilification, $universityname, $coursename, $passingyear, $passingendyear)) {
				echo "Successfully Inserted data";
			}else{
				echo "Something error";
			}
			
		}else{
			echo "Something error";
		}

	}

	/*add  more function in education section*/

	public function educationsectionforaddmore(){

		$this->load->library('form_validation');
		$this->load->model('Profilecandidatemodel');

		$this->form_validation->set_rules('universityname', 'University Name', 'trim|required');

		if ($this->form_validation->run()) {
			$qilification = $this->input->post("qilification");
			$universityname = $this->input->post("universityname");
			$coursename = $this->input->post("coursename");
			$passingyear = $this->input->post("passingyear");
			$passingendyear = $this->input->post("passingendyear");
			$token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;
			
			if ($this->Profilecandidatemodel->addmorefirstinsertecidationsection($token, $this->session->userdata('user_token'), $qilification, $universityname, $coursename, $passingyear, $passingendyear)) {
				echo "Successfully Inserted data";
			}else{
				echo "Something error";
			}
			
		}else{
			echo "Something error";
		}

	}

	/*for education section fetch data*/

	public function educationsectionfetch(){
		$edu_token = $this->input->post('employee_id');
		$user_token = $this->session->userdata('user_token');
		if ($fetchdata = $this->Profilecandidatemodel->educationsetionfetchmodal($edu_token, $user_token)) {	
			echo json_encode($fetchdata);
		}else{
			show_404();
		}
	}


	/*for delete this section*/

	public function deducationdeleteexprencedata(){
		$u_token = $this->input->post('delete_id');
		$user_token = $this->session->userdata('user_token');
	
		if ($this->Profilecandidatemodel->educationdeleteexprencedatamodal($u_token, $user_token))
		{
			echo "Deleted Successfully";
		}else{
			echo "Something error";
		}
	}

	/*upadte education section*/

	public function updateeducationsectionfor(){

		$this->load->library('form_validation');
		$this->load->model('Profilecandidatemodel');

		$this->form_validation->set_rules('universityname1', 'University Name', 'trim|required');

		if ($this->form_validation->run()) {
			$e_token = $this->input->post("aaaaa");
			$qilification = $this->input->post("qilification1");
			$universityname = $this->input->post("universityname1");
			$coursename = $this->input->post("coursename1");
			$passingyear = $this->input->post("passingyear1");
			$passingendyear = $this->input->post("passingendyear1");
			$token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;
			
			if ($this->Profilecandidatemodel->updateeducationsection($e_token, $this->session->userdata('user_token'), $qilification, $universityname, $coursename, $passingyear, $passingendyear)) {
				echo "Successfully Updated data";
			}else{
				echo "Something error";
			}
			
		}else{
			echo "Something error";
		}

	}

	/*prrof of identification*/
	public function uploadImage() { 
		
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|jpeg|jpg|png';
        $config['max_size']             = 1024;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        $token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;

        $new_name = $this->upload->do_upload('file-input');

        if ($new_name)
        {	
        	$data = array('upload_data' => $this->upload->data());
        	foreach ($data as $e) {
        		$name = $e['file_name'];
        		if ($this->Profilecandidatemodel->save_upload_model($this->session->userdata('user_token'),$name,$token)) {
        			echo "Upload Successfully";
        		}else{
        			echo "Upload Successfully";
        		}
        		
        	}
        	
        }
        else
        {
        	print_r($error = array('error' => $this->upload->display_errors()));
        }
   }

   public function fetchimage(){
   		$id = $this->session->userdata('user_token');

   		if ($variable = $this->Profilecandidatemodel->getimageadhar($id)) {
   			echo json_encode($variable);
   		}else{
   			echo "Document image uploading error";
   		}

   }


   public function deleteprofimage(){
		$id = $this->session->userdata('user_token');
			if ($data = $this->Profilecandidatemodel->getimagedata($id)) {
				foreach ($data as $imgvaluedata) {
		   				@unlink("./uploads/".$imgvaluedata->candidate_profile_adharcard);
		   			}
				if ($this->Profilecandidatemodel->deleteimageadhar($id)) {
					echo "Successfully Deleted";
		   		} else{
		   			echo "Something error";
		   		}
			}
	   		
   }


   /*profile upload section*/
	public function profileuploadImage() { 
		
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 1024;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        $token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;

        $new_name = $this->upload->do_upload('profile');

        if ($new_name)
        {	
        	$data = array('upload_data' => $this->upload->data());
        	foreach ($data as $e) {
        		$name = $e['file_name'];
        		if ($this->Profilecandidatemodel->profile_save_upload_model($this->session->userdata('user_token'),$name,$token)) {
        			echo "Upload Successfully";
        		}else{
        			echo "Upload Successfully";
        		}
        		
        	}
        	
        }
        else
        {
        	print_r($error = array('error' => $this->upload->display_errors()));
        }
   }

   public function profilefetchimage(){
   		$id = $this->session->userdata('user_token');

   		if ($variable = $this->Profilecandidatemodel->profilegetimageadhar($id)) {

   			echo json_encode($variable);
   		}else{
   			echo "image empty";
   		}

   }

   public function deleteprofimagedata(){
		$id = $this->session->userdata('user_token');
			if ($data = $this->Profilecandidatemodel->getimagedata($id)) {
				foreach ($data as $imgvaluedata) {
		   				@unlink("./uploads/".$imgvaluedata->candidate_profile_image);
		   			}
				if ($this->Profilecandidatemodel->peofiledeleteimageadhar($id)) {
					echo "Successfully Deleted";
		   		} else{
		   			echo "Something error";
		   		}
			}
	   		
   }

   public function citynamefetch(){
   	$state = $this->input->post('state');
   	if ($data = $this->Profilecandidatemodel->fetchcitymodal($state)) {
   		foreach ($data as $citydata) {
   			echo json_encode($data);
   		}
   		
   	}else{
   		show_404();
   	}
   }

}
