<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('inc/header');
error_reporting(0);
ini_set('display_errors', 0);
if ($this->session->userdata('user_type') == 2) {
    redirect('/login/');
}
?>


<div class="gradient_bg" style="width: 100%; height: 101px; float: left; display: block;" ></div>


<div class="container">
    <div class="row">
    <div class="col-md-8 float-left col-12">
    <?php 
    if (is_array($jobid)) {
        foreach ($jobid as $valuedata) {
    ?>

        <div class="common_box float-left" style="margin-top: -40px;">
            <div class="col-md-8 col-10 float-left no-padding"> 
                <span class="section_title w-100 float-left"><?php if (isset($valuedata['job_title'])) {
                        echo $valuedata['job_title'];
                    }
                     ?> </span>
                <span class="second_subtitle w-100 mt_5 float-left"><?php if (isset($valuedata['company_name'])) {
                        echo $valuedata['company_name'];
                    }
                     ?> </span>
            </div>

            <input type="hidden" id="job_token" name="job_token" value="<?php if (isset($valuedata['Job_detail_token'])) {
                        echo base64_encode($valuedata['Job_detail_token']);
                    }
                     ?>">
            <input type="hidden" id="emp_token" name="emp_token" value="<?php if (isset($valuedata['employeer_user_token'])) {
                        echo base64_encode($valuedata['employeer_user_token']);
                    }
                     ?>">
            
      <?php      if (is_array($fetchapplytoken)) {
                    foreach ($fetchapplytoken as $aplly) {
                        if (!empty($aplly['job_token'])) {
                        ?>
                        <div id="alreadyapply" class="primary_btn apply_now">All ready applied</div>
                        <?php
                    }
                }
            }else{
                    ?>
                    <div id="apply"><a href="" id="apply" class="primary_btn apply_now"> Apply now</a></div>
                <?php } ?>
            <table class="table spec_table">
                <tbody>
                            <td class="lable_text">
                            <span class="grey">Experience</span> </br>
                            <span class=""> <?php if (isset($valuedata['experience'])) {
                        echo $valuedata['experience'];
                    }
                     ?> </span>
                        </td>
                        <td class="lable_text text-right">
                            <span class="grey">Job Location</span> </br>
                            <span class=""><?php if (isset($valuedata['job_location'])) {
                        echo $valuedata['job_location'];
                    }
                     ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="lable_text">
                            <span class="grey">Posted Date</span> </br>
                            <span class=""><?php if (isset($valuedata['posted_days_ago'])) {
                                $convertDate = date("d M Y", strtotime($valuedata['posted_days_ago']));
                                print_r($convertDate);
                                }
                            ?> </span>
                        </td>
                        <td class="lable_text text-right">
                            <span class="grey">Job Type</span> </br>
                            <span class=""><?php if (isset($valuedata['job_type'])) {
                        echo $valuedata['job_type'];
                    }
                     ?> </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="common_box float-left mt_15 mb_30">
            <span class="primery_title w-100 float-left mt_10"> Job description </span>
            <span class="font_14 w-100 float-left mt_5 grey mb_10 pr_20" style="line-height: 20px;">
                <?php if (isset($valuedata['job_description'])) {
                        echo $valuedata['job_description'];
                    }
                     ?> 
            </span>

            <div class="col-md-8 float-left no-padding mt_10">
                <table class="table spec_table">
                    <tr>
                        <td class="lable_text">Job ID </td>
                        <td class="infp_text"><?php if (isset($valuedata['job_id'])) {
                        echo $valuedata['job_id'];
                    }
                     ?>  <!-- ADD890001  --></td>
                    </tr>
                    <tr>
                        <td class="lable_text">Monthly Salary </td>
                        <td class="infp_text">INR <?php if (isset($valuedata['monthly_salary'])) {
                        echo $valuedata['monthly_salary'];
                    }
                     ?></td>
                    </tr>
                    <tr>
                        <td class="lable_text">Working Hours </td>
                        <td class="infp_text"><?php if (isset($valuedata['working_hours'])) {
                        echo $valuedata['working_hours'];
                    }
                     ?></td>
                    </tr>
                    <tr>
                        <td class="lable_text"> Monthly Paid Off</td>
                        <td class="infp_text"><?php if (isset($valuedata['monthly_paid_pff_days'])) {
                        echo $valuedata['monthly_paid_pff_days'];
                    }
                     ?> Days</td>
                    </tr>
                    <tr>
                        <td class="lable_text"> Accommodation </td>
                        <td class="infp_text"><?php if (isset($valuedata['accommodation_provided'])) {
                        echo $valuedata['accommodation_provided'];
                    }
                     ?></td>
                    </tr>
                    <tr>
                        <td class="lable_text"> On Duty Food </td>
                        <td class="infp_text"><?php if (isset($valuedata['pn_duty_food_provided'])) {
                        echo $valuedata['pn_duty_food_provided'];
                    }
                     ?></td>
                    </tr>
                    <tr>
                        <td class="lable_text">ESI  </td>
                        <td class="infp_text"><?php if (isset($valuedata['ESI_provided'])) {
                        echo $valuedata['ESI_provided'];
                    }
                     ?> </td>
                    </tr>
                    <tr>
                        <td class="lable_text">PF (Provident Fund) </td>
                        <td class="infp_text"><?php if (isset($valuedata['PF_provided'])) {
                        echo $valuedata['PF_provided'];
                    }
                     ?> </td>
                    </tr>
                </table> 
            </div>
            
        </div>
        <?php
        }
    } ?>
    </div>
    <!-- COL MD8 End here -->
    <div class="col-md-4 float-left col-12 mb_mob_60">
        <div class="w-100 float-left common_box mt_mob_0" style="margin-top: -40px;" id="">
            <span class="primery_title  w-100 float-left"> About company </span>
                <div class="job_img">
                <img src="<?php echo base_url('assets/images/job_3.png'); ?>" class="mr-3 job_img">
                </div>
                
            <span class="font_14 w-100 float-left grey mt_10">
                Impelsys provides solution development expertise to help customers develop bespoke solutions and lending its domain expertise for solution definition, architecture and development. Our technology expertise includes Open source (LAMP, Java), Microsoft and Oracle technologies. Impelsys has a dedicated Apps development team, specializing in development of iOS & Android apps for content delivery and eLearning. This team has 100+ live apps to their credit.
            </span>
        </div>
    </div>
    <!-- COL MD 4 End here -->
    </div>

</div>
<?php $this->load->view('inc/footer'); ?>