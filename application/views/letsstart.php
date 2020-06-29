<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!$this->session->userdata('user_token')) {
	redirect('/login/');
}
if ($this->session->userdata('loginin')) {
	$this->session->set_flashdata('msg','<div class="alert alert-success text-center" id="successMessage">You are successfully registered.</div>');
}


?>
	<div id="h"><?php echo  $this->session->flashdata('msg');?>
	            <?php if(isset($msg)){?>
	             <?php echo $msg;?>
	               <?php } ?></div>

<script src="<?php echo base_url('assets/js/jquery-3.4.0.min.js'); ?>"></script>

<div class="container">
  <div class="row">
		<div class="col-md-12 float-left col-12 mt_30">
			<div class="common_box float-left pb_60 pt_60">
				<h1 class="section_title w-100 float-left">Welcome</h1>

						<div class="w-100 float-left">
							<img src="<?php echo base_url('assets/images/lets_start.svg'); ?>" style="max-width: 300px;">
						</div>
						<span class="w-100 float-left section_title mt_20"> Let’s Complete your profile.  </span>
						<span class="w-100 float-left font_14 mb_20 mt_10"> It will help us to serve you a better job portal experience.   </span>

					<?php echo form_open('/userlogout/'); ?>
					<input type="submit" name="logout" value="Logout">
					</form>
					<?php if ($this->session->userdata('user_type')==1) {
						?>
						<a href="<?php echo base_url('profilecandidate/'); ?>" class="primary_btn"> Let's get stat  </a>
						<?php
					}else{
						?>
						<a href="<?php echo base_url('businessprofile/'); ?>" class="primary_btn"> Let's get stat  </a>
						<?php
					}
					?>
					

			</div>
			
		</div>
	</div>
</div>
<script src="<?php echo base_url('assets/js/jquery-3.4.0.min.js'); ?>"></script>
<script type="text/javascript">
	setTimeout(function () {
		$("#h").hide();
	}, 2000);
	<?php $this->session->unset_userdata('loginin'); ?>
</script>