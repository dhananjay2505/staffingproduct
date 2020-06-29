<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Businessprofile extends CI_Controller {

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
		$this->load->view('businessprofile');
	}

	public function insertbusinessprofiledata(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('business_name', 'Business Name', 'required|trim');
		$this->form_validation->set_rules('business_about', 'Business About', 'required|trim');
		$this->form_validation->set_rules('business_type', 'Business Type', 'required|trim');
		$this->form_validation->set_rules('business_type', 'Business Type', 'required|trim');

		if ($this->form_validation->run()) {
			$business_name = $this->input->post("business_name");
			$business_about = $this->input->post("business_about");
			$business_type = $this->input->post("business_type");
			$business_website = $this->input->post("business_website");
			$business_outlet = $this->input->post("business_outlet");
			$business_people = $this->input->post("business_people");
			$business_cuissing = $this->input->post("business_cuissing");
			$business_address = $this->input->post("business_address");
			$business_state = $this->input->post("business_state");
			$business_city = $this->input->post("business_city");
			$business_pin = $this->input->post("business_pin");
			$business_c_person = $this->input->post("business_c_person");
			$business_c_number = $this->input->post("business_c_number");
			$business_operational_1 = $this->input->post("business_operational_1");
			$business_operational_2 = $this->input->post("business_operational_2");
			$business_gst = $this->input->post("business_gst");
			$business_fssai = $this->input->post("business_fssai");
			$token1 = bin2hex(uniqid());
			$token2 = bin2hex(openssl_random_pseudo_bytes(16));
			$token = $token1.$token2;
			
			if ($this->Businessprofilemodel->businessprofilemodeladata($token, $this->session->userdata('user_token'), $business_name, $business_about, $business_type, $business_website, $business_outlet, $business_people,$business_cuissing, $business_address, $business_state, $business_city, $business_pin, $business_c_person, $business_c_number, $business_operational_1, $business_operational_2, $business_gst,$business_fssai)) {
				echo "Successfully Inserted data";
			}else{
				echo "Something error";
			}
			
		}else{
			echo "Something error";
		}
	}

	public function getprifileinfo(){

		if ($data = $this->Businessprofilemodel->getprofilemodel($this->session->userdata('user_token'))) {
			foreach ($data as $profile) {
				
				?>

				<span class="primery_title float-left text-white w-100"> <?php echo $profile->business_name; ?></span>
				<?php
				

				?>
			        <div class="text-white mt_10 float-left w-100">
			        	<?php if ($profile->business_website) {
			        	?>
			            <span class="mr_10"><span class="icon_set icon-work mr_10"></span><?php echo $profile->business_website; ?> </span> 
			            <?php }
			            	if ($profile->user_email_id) {
			            		?>

			            <span class="mr_10"><span class="icon_set icon-mail-1 mr_10"></span><?php echo $profile->user_email_id; ?> </span>
			            <?php }
			             ?> 
			        </div> 
			        <div class="text-white mt_10 float-left w-100">
			        	<?php if ($profile->user_mobile_number) { 
			        		?>
			            <span class="mr_10"><span class="icon_set icon-telephone mr_10"></span>+91 <?php echo $profile->user_mobile_number; ?> </span> 
			            <?php } 
			            if ($profile->business_city) {  ?>
			            <span class="mr_10"><span class="icon_set icon-placeholder mr_10"></span><?php echo ucfirst($profile->business_city); ?> </span> 
			            <?php } ?>
			        </div>
			        <a class="edit_icon" data-toggle="modal" data-target="#business_profile">
			            <span class="icon_set icon-pen mr-1"></span> Edit profile
			        </a> 
			    </div>
				<?php
			}
		}
		else{
			show_404();
		}
	}

	public function getdataforprofile(){

		if ($profile = $this->Businessprofilemodel->getprofiledatamodel()) {
			foreach ($profile as $profiledata) {

				if ($profiledata->business_about) {
					?>
				<div class="common_box mt_10 float-left personalshow">
		            <h1 class="section_title">About us </h1>
		            <span class="font_14 float-left w-100 mt_15"><?php echo $profiledata->business_about; ?></span>
		        </div> <!-- End of common_box -->
					<?php
				}
		?>
		
        <div class="common_box mt_10 float-left personalshow">
            <h1 class="section_title">Other information us </h1>
            <table class="table spec_table">
                <tbody>
                	<?php if ($profiledata->business_people) { ?>
                    <tr>
                        <td class="lable_text">People Working </td>
                        <td class="infp_text"><?php echo $profiledata->business_people; ?></td>
                    </tr>
                    <?php }
                    	if ($profiledata->business_type) {
                    	 ?>
                    <tr>
                        <td class="lable_text">Type of business  </td>
                        <td class="infp_text"><?php echo $profiledata->business_type; ?></td>
                    </tr>
                    <?php }
                    if ($profiledata->business_c_person) { ?>
                    <tr>
                        <td class="lable_text">Contact Person  </td>
                        <td class="infp_text"><?php echo $profiledata->business_c_person; ?></td>
                    </tr>
                    <tr>
                    	<?php }
                    if ($profiledata->business_address) { ?>
                        <td class="lable_text">Address </td>
                        <td class="infp_text"><?php echo $profiledata->business_address; ?></td>
                    </tr>
                    <?php }
                    if ($profiledata->business_state) { ?>
                    <tr>
                        <td class="lable_text">State </td>
                        <td class="infp_text"><?php echo $profiledata->business_state; ?></td>
                    </tr>
                    <?php }
                    if ($profiledata->business_city) { ?>
                    <tr>
                        <td class="lable_text">City </td>
                        <td class="infp_text"><?php echo $profiledata->business_city; ?></td>
                    </tr>
                    <?php }
                    if ($profiledata->business_pin) { ?>
                    <tr>
                        <td class="lable_text">Pin </td>
                        <td class="infp_text"><?php echo $profiledata->business_pin; ?></td>
                    </tr>
                    <?php }
                    if ($profiledata->business_outlet) { ?>
                    <tr>
                        <td class="lable_text">No of outlets </td>
                        <td class="infp_text"><?php echo $profiledata->business_outlet; ?></td>
                    </tr>
                    <?php }
                    if ($profiledata->business_gst) { ?>
                    <tr>
                        <td class="lable_text">GSTIN </td>
                        <td class="infp_text"><?php echo $profiledata->business_gst; ?></td>
                    </tr>
                    <?php }
                    if ($profiledata->business_fssai) { ?>
                    <tr>
                        <td class="lable_text">FSSAI licence Number</td>
                        <td class="infp_text"><?php echo $profiledata->business_fssai; ?></td>
                    </tr>
                    <?php }
                    if ($profiledata->business_operational_1 && $profiledata->business_operational_2) { ?>
                    <tr>
                        <td class="lable_text">Operational Hours </td>
                        <td class="infp_text"> <?php echo $profiledata->business_operational_1; ?> - <?php echo $profiledata->business_operational_2; ?> </td>
                    </tr>
                    <?php }
                    if ($profiledata->business_cuissing) { ?>
                    <tr>
                        <td class="lable_text">Type of Cuisine </td>
                        <td class="infp_text"> <?php echo $profiledata->business_cuissing; ?> </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div> <!-- End of common_box -->
		<?php
			}
		}else{
			?>
			<div class="common_box mt_10 float-left mt_10">
		<h1 class="section_title">Add Your Business Profile </h1>
                <a href="" class="add_link float-right" data-toggle="modal" data-target="#business_profile">Add</a>
                <!-- If there is no data =========== -->
                <div class="w-100 float-left mt_20" id="notfound">
                	<img src="<?php echo base_url('assets/images/icon_1.svg'); ?>" class="float-left">
                	<span class="subtitle float-left w-100 mt_10"> Mention your employment details including your current and previous company work experience. </span> 
                </div>
            </div>
			<?php
		}
	}


	public function profile(){
		$user_token = $this->session->userdata('user_token');
		if ($fetchdata = $this->Businessprofilemodel->profiledatafetch($user_token)) {	
			echo json_encode($fetchdata);
		}else{
			show_404();
		}
	}

	public function profiletwo(){
		$user_token = $this->session->userdata('user_token');
		if ($fetchdata = $this->Businessprofilemodel->profiledatafetchdata($user_token)) {	
			foreach ($fetchdata as $profile) {
				?>
			        <div class="text-white mt_10 float-left w-100">
			        	<?php
			            	if ($profile->user_email_id) {
			            		?>

			            <span class="mr_10"><span class="icon_set icon-mail-1 mr_10"></span><?php echo $profile->user_email_id; ?> </span>
			            <?php }
			             ?> 
			        </div> 
			        <div class="text-white mt_10 float-left w-100">
			        	<?php if ($profile->user_mobile_number) { 
			        		?>
			            <span class="mr_10"><span class="icon_set icon-telephone mr_10"></span>+91 <?php echo $profile->user_mobile_number; ?> </span> 
			            <?php } 
			            ?>
			        </div>
			        <a class="edit_icon" data-toggle="modal" data-target="#business_profile">
			            <span class="icon_set icon-pen mr-1"></span> Edit profile
			        </a> 
			    </div>
				<?php
			}
		}else{
			show_404();
		}
	}


	/*public function abouusadd(){
		$user_token = $this->session->userdata('user_token');
		if ($fetchdata = $this->Businessprofilemodel->checkvalue($user_token)) {
			# code...
		}
		?>
	
		<?php
	}*/


	public function updatebusiness0profiledata(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('business_name', 'Business Name', 'required|trim');
		$this->form_validation->set_rules('business_about', 'Business About', 'required|trim');
		$this->form_validation->set_rules('business_type', 'Business Type', 'required|trim');
		$this->form_validation->set_rules('business_type', 'Business Type', 'required|trim');

		if ($this->form_validation->run()) {
			$business_name = $this->input->post("business_name");
			$business_about = $this->input->post("business_about");
			$business_type = $this->input->post("business_type");
			$business_website = $this->input->post("business_website");
			$business_outlet = $this->input->post("business_outlet");
			$business_people = $this->input->post("business_people");
			$business_cuissing = $this->input->post("business_cuissing");
			$business_address = $this->input->post("business_address");
			$business_state = $this->input->post("business_state");
			$business_city = $this->input->post("business_city");
			$business_pin = $this->input->post("business_pin");
			$business_c_person = $this->input->post("business_c_person");
			$business_c_number = $this->input->post("business_c_number");
			$business_operational_1 = $this->input->post("business_operational_1");
			$business_operational_2 = $this->input->post("business_operational_2");
			$business_gst = $this->input->post("business_gst");
			$business_fssai = $this->input->post("business_fssai");

			
			if ($this->Businessprofilemodel->businessprofilemodelupdate($this->session->userdata('user_token'), $business_name, $business_about, $business_type, $business_website, $business_outlet, $business_people,$business_cuissing, $business_address, $business_state, $business_city, $business_pin, $business_c_person, $business_c_number, $business_operational_1, $business_operational_2, $business_gst,$business_fssai)) {
				echo "Successfully Updated data";
			}else{
				echo "Already Insertded";
			}
			
		}else{
			echo "Something error";
		}
	}

	public function businessprofileimage(){
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
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
        		if ($this->Businessprofilemodel->business_save_upload_image($this->session->userdata('user_token'),$name,$token)) {
        			echo "Updated Successfully peofile image";
        		}else{
        			echo "Inserted Successfully peofile image";
        		}
        		
        	}
        	
        }
        else
        {
        	print_r($error = array('error' => $this->upload->display_errors()));
        }
	}


	public function fetchbusinessprofileimage(){

   		$id = $this->session->userdata('user_token');

   		if ($variable = $this->Businessprofilemodel->getbusinessimageadhar($id)) {
   			echo json_encode($variable);
   		}
	}

	public function deletebusinessprofileimage(){
		$id = $this->session->userdata('user_token');
			if ($data = $this->Businessprofilemodel->deleteimagedata($id)) {
				foreach ($data as $imgvaluedata) {
		   				@unlink("./uploads/".$imgvaluedata->business_logo);
		   			}
				if ($this->Businessprofilemodel->deleteimagedata($id)) {
					echo "Successfully Deleted";
		   		} else{
		   			echo "Image Not deleted some technical problem send your feedback";
		   		}
			}
	}
}
