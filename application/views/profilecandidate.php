<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('inc/header');

if ($this->session->userdata('user_type') == 2) {
    redirect('/login/');
}

?>
<div class="container main_wrapper">
    <div class="alert alert-success" style="display: none;"></div>
    <div class="alert alert-danger" style="display: none;"></div>
<div class="common_box mt_20 float-left gradient_bg pb_30 pt_30">
    <?php foreach ($h as $value) {
        ?>
        <style type="text/css">
            .image-upload > input
            {
                display: none;
            }

            .image-upload img
            {
                width: 80px;
                cursor: pointer;
            }

            .image-upload2 > #profile
            {
                display: none;
            }

            .image-upload2 img
            {
                width: 80px;
                cursor: pointer;
            }
        </style>
    <a href="" style="color: #fff; text-decoration: none;position: absolute; right: 20px; top: 15px; font-size: 14px;"> </a> 
    <div class="col-md-2 float-left pr_0">
    <?php
    $attributes = array('id' => 'upload');
     echo form_open_multipart('', $attributes);?>
        <div class="image-upload2">
            <label for="profile" class="upload">
                <img src="" id="uploadprofile" class='round_img_big' />
            </label>
            </label><div class="cross1"><span id="cross1" style="color: #fff;">X</span></div>

            <input id="profile" type="file"/>
        </div>
    </form>    
    </div>
    <div class="col-md-8 float-left no-padding">
        <?php if (is_array($get_personal)) {
        foreach ($get_personal as $p_value) { ?>
    <span class="primery_title float-left text-white w-100"><?php if (isset($p_value->candidate_profile_first_name) && isset($p_value->candidate_profile_last_name)) {
            echo ucfirst($p_value->candidate_profile_first_name)." ".ucfirst($p_value->candidate_profile_last_name);
        }  ?></span>
    <?php    }
    }?> 
    <div class="text-white mt_10 float-left w-100">
        <span class="mr_10"><span class="icon_set icon-wall-clock mr_10"></span><?php if (isset($value->user_email_id)) {
            echo $value->user_email_id;
        }  ?></span> 
        <span class="ml_10"><span class="icon_set icon-placeholders-1 mr_10"></span><?php if (isset($value->user_mobile_number)) {
            echo $value->user_mobile_number;
        }  ?></span> 
    </div>
    <div class="text-white mt_10 float-left w-100">
        <?php if (isset($p_value->candidate_profile_total_years_of_exp)) { ?>
        <span class="mr_10"><span class="icon_set icon-wall-clock mr_10"></span><?php 
            echo strtolower($p_value->candidate_profile_total_years_of_exp);
        }  ?></span> 
        <?php if (isset($p_value->candidate_profile_state_name)) { ?>
        <span class="ml_10"><span class="icon_set icon-placeholders-1 mr_10"></span><?php 
            echo strtolower($p_value->candidate_profile_state_name);
        }  ?></span> 
    </div>
    </div>
   <?php }
    
    ?>
</div>

<div class="col-md-4 float-left col-12">
<div class="sidebar mt_20 desktop_view float-left">
    <span class="primery_title float-left pt_5">Quick link</span>
    <ul class="quick_link">
        <li><a href=""> Experience</a></li>
        <li><a href=""> Personal information</a></li>
        <li><a href=""> Education</a></li>
        <li><a href=""> Preferences</a></li>
        <li><a href="#Certicifation"> Certicifation</a></li>
    </ul>
</div>

</div> <!-- ===  OL_MD 4 right side section end here ========== -->

    <!-- personal section -->
    <div class="col-md-8 float-left col-12 no-padding">
        <div class="wrapper">
            <!-- personal section start -->
            <div class="common_box mt_10 float-left personalshow">
                <div style="text-align: center;"><span id="msg"></span></div>
                    <h1 class="section_title">Personal Information </h1>

                        <a href="" class="add_link float-right" data-toggle="modal" data-target="#personal"><?php
                        if (is_array($get_personal)) {
                            echo "Edit";
                        }else{
                            echo "Add";
                        }
                        ?> </a>

                        <?php if (is_array($get_personal)) {
                             foreach ($get_personal as $p_value) { ?>
                            <table class="table spec_table">
                                <?php if (isset($p_value->candidate_profile_dob) && !empty($p_value->candidate_profile_dob)){ ?>

                                <tr>
                                    <td class="lable_text">Date of birth </td>
                                    <td class="infp_text"><?php echo $p_value->candidate_profile_dob; ?></td>
                                </tr>
                                <?php } 
                                if (isset($p_value->candidate_profile_gender) && !empty($p_value->candidate_profile_gender)){ ?>
                                <tr>
                                    <td class="lable_text">Gender </td>
                                    <td class="infp_text"><?php echo $p_value->candidate_profile_gender; ?></td>
                                </tr>
                                <?php } 
                                if (isset($p_value->candidate_profile_current_location) && !empty($p_value->candidate_profile_current_location)) {
                                   ?>
                                   <tr>
                                    <td class="lable_text">Current Location </td>
                                    <td class="infp_text"><?php echo $p_value->candidate_profile_current_location; ?></td>
                                </tr>
                                   <?php
                                }
                                if (isset($p_value->preferences_location) && !empty($p_value->preferences_location)) {
                                    ?>
                                    <tr>
                                    <td class="lable_text">Preferred Location</td>
                                    <td class="infp_text"><?php echo $p_value->preferences_location; ?></td>
                                </tr>
                                    <?php
                                }

                                if (isset($p_value->candidate_profile_current_salary) && !empty($p_value->candidate_profile_current_salary)) {
                                    ?>
                                    <tr>
                                        <td class="lable_text">Last Salary </td>
                                        <td class="infp_text"><?php echo strtolower($p_value->candidate_profile_current_salary); ?></td>
                                    </tr>
                                    <?php
                                }

                                if (isset($p_value->preferences_salary) && !empty($p_value->preferences_salary)) {
                                    ?>
                                    <tr>
                                        <td class="lable_text">Expecting Salary </td>
                                        <td class="infp_text"><?php echo $p_value->preferences_salary; ?></td>
                                    </tr>
                                <?php }

                                if (isset($p_value->candidate_profile_permanent_address) && !empty($p_value->candidate_profile_permanent_address)) {
                                    ?>
                                    <tr>
                                        <td class="lable_text">Address </td>
                                        <td class="infp_text"><?php echo $p_value->candidate_profile_permanent_address; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    if (isset($p_value->candidate_profile_language_spoken) && !empty($p_value->candidate_profile_language_spoken)) {
                                        ?>
                                        <tr>
                                            <td class="lable_text">Languages</td>
                                            <td class="infp_text"><?php echo $p_value->candidate_profile_language_spoken; ?></td>
                                        </tr>
                                        <?php
                                    } ?>
                            </table> 
                        <?php }
                        }
                        else { ?>
                    <!-- If there is no data =========== -->
                    <div class="w-100" id="">
                        <img src="<?php echo base_url('assets/images/icon_3.svg'); ?>" class="float-left">     
                        <span class="subtitle float-left w-100 mt_10">Mention your Personal information </span> 
                    </div>
                  
                <?php }
                
                ?>
                <!-- Modal -->
                <div class="modal fade reset" id="personal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="section_title" id="exampleModalLabel">Personal Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="personalform" class="w-100 float-left">
                            <div class="row">
                            <div class="col-md-6 float-left col-6 mb_20">
                                <label for="">First name</label>
                                <input type="text" name="firstname" class="form-control" value="<?php if(isset($p_value->candidate_profile_first_name)){
                                    echo $p_value->candidate_profile_first_name;
                                } ?>" placeholder="Enter first name">
                                <span class="help-block"></span>
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                <label for="">Last name</label>
                                <input type="text" name="lastname" class="form-control" value="<?php if(isset($p_value->candidate_profile_last_name)){
                                    echo $p_value->candidate_profile_last_name;
                                } ?>" placeholder="Last name">
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                    <label for="">Current State </label>
                                    <input type="hidden" name="country" id="countryId" value="IN"/>
                                <select name="state" class="form-control states order-alpha" id="stateId">
                                    <option value="">Select State</option>
                                </select>
                            </div>

                            <div class="col-md-6 float-left col-6 mb_20">
                                <label for="">Current Location </label>
                                <select name="city" id="cityId" class="form-control cities order-alpha">
                                    <option value="">Select City</option>
                                </select>
                            </div>

                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Permanent Address</label>
                                <textarea class="form-control" name="address" id="" rows="3"><?php if(isset($p_value->candidate_profile_permanent_address)){
                                    echo $p_value->candidate_profile_permanent_address;
                                } ?></textarea>
                            </div>
                            <div class="col-md-4 float-left col-6 mb_20">
                                <label for="">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="col-md-4 float-left col-6 mb_20">
                                <label for="">DOB</label>
                                <input type="text" name="dob" value="<?php if(isset($p_value->candidate_profile_dob)){
                                    echo $p_value->candidate_profile_dob;
                                } ?>" id="datepicker" class="form-control">
                            </div>
                            <?php foreach ($h as $value) {
                            ?>
                            <div class="col-md-4 float-left col-6 mb_20">
                                <label for="">Phone</label>
                                <input type="number" class="form-control" value="<?php if(isset($value->user_mobile_number)){
                                    echo $value->user_mobile_number;
                                } ?>" placeholder="Phone number" readonly="">
                            </div>
                            <div class="col-md-5 float-left col-5 mb_20 pr_0">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="<?php if(isset($value->user_email_id)){
                                    echo $value->user_email_id;
                                } ?>" placeholder="Email" readonly="">
                            </div>
                        <?php } ?>
                            <div class="col-md-4 float-left col-6 mb_20 pr_0">
                                <label for="">Total Exp</label>
                                <select name="expyear" id="expyear" class="form-control">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="2 Years">2 Years</option>
                                    <option value="3 Years">3 Years</option>
                                </select>
                            </div>
                            <div class="col-md-3 float-left col-6 mb_20">
                                <label for="">Month</label>
                                <select name="expmonth" id="expmonth" class="form-control">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="Jan">Jan </option>
                                    <option value="Feb">Feb</option>
                                    <option value="March">March</option>
                                    
                                </select>
                            </div>
                            <div class="col-md-4 float-left col-6 mb_20 pr_0">
                                <label for="">Current Salary</label>
                            </div>
                            <div class="col-md-4 float-left col-6 mb_20 pr_0">
                                <select name="c_salary_lac" id="c_salary_lac" class="form-control">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="0-1 LAC">0-1 LAC</option>
                                    <option value="1-2 LAC">1-2 LAC</option>
                                    <option value="2-3 LAC">2-3 LAC</option>
                                </select>
                            </div>
                            <div class="col-md-4 float-left col-6 mb_20">
                                <select name="c_salary_thousand" id="c_salary_thousand" class="form-control">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="10 THOUSAND">10 THOUSAND</option>
                                    <option value="20 THOUSAND">20 THOUSAND</option>
                                    <option value="20 THOUSAND">30 THOUSAND</option>
                                    
                                </select>
                            </div>
                            <div class="col-md-12 float-left col-6 mb_20">
                                <label for="">Languages Spoken</label>
                                <input type="text" name="languages" class="form-control" value="<?php if(isset($p_value->candidate_profile_language_spoken)){
                                    echo $p_value->candidate_profile_language_spoken;
                                } ?>" placeholder="Languages Spoken">
                            </div>
                            </div> <!--================= End of ROW-============ == -->
                        </form>
                      
                      </div>
                      <div class="modal-footer">
                        <button type="Submit" id="<?php if(isset($p_value->user_token)){
                                    echo "Update";
                                }else{
                                    echo "save";
                                } ?>" class="btn primary_btn"><?php if(isset($p_value->user_token)){
                                    echo "Update changes";
                                }else{
                                    echo "Save changes";
                                } ?></button>
                      </div>
                    </div>
                  </div>
                </div>
            </div> 
            <!--  ================== Experience START -->
            <div class="common_box mt_10 float-left" id="Successfullydatasave"></div> 

            <div class="modal fade" id="experience" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="section_title" id="exampleModalLabel">Experience</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        
                  <form id="experiencedata">
                            <div class="row">
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Position name</label>
                                <select name="positionname" id="positionname" class="form-control">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="Junior Chef">Junior Chef</option>
                                    <option value="Senior Chef">Senior Chef</option>
                                    <option value="Master Chef">Master Chef</option>
                                </select>
                            </div>
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Company name</label>
                                <input type="text" name="comapnyname" id="comapnyname" class="form-control" value="" placeholder="Position name">
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                     <label for="">State </label>
                                    <input type="hidden" name="country" id="countryId" value="IN"/>
                                    <select name="state" class="form-control states order-alpha" id="stateId">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20">
                                    <label for="">Location </label>
                                    <select name="city" id="cityId" class="form-control cities order-alpha">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20">
                                    <label for="">Started Working (Year)</label>
                                    <select name="startyear" id="startyear" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20">
                                    <label for="">Month</label>
                                    <select name="startmonth" id="startmonth" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="Jan">Jan</option>
                                        <option value="Feb">Feb</option>
                                        <option value="March">March</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-12 float-left col-12 mb_20">
                                    <label for="">Is this your current company?</label>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20">
                                    <input type="radio" name="currentcompany" class="form-control currentcompany" checked="checked" value="Yes">YES
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20">
                                    <input type="radio" name="currentcompany" class="form-control currentcompany" value="No">NO
                                        
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20 yearshow">
                                    <label for="">End Working (Year)</label>
                                    <select name="endyear" id="endyear" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20 yearshow">
                                    <label for="">Month</label>
                                    <select name="endmonth" id="endmonth" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="Jan">Jan</option>
                                        <option value="Feb">Feb</option>
                                        <option value="March">March</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20 present">
                                    <span id="present">Present</span>
                                    
                                </div>
                            </div> <!--End of ROW-->
                        </form>
                  </div>
                  <div class="modal-footer">

                    <span id="msgdata"></span>
                    <button type="submit" id="Updateepx" class="btn btn-secondary">Save & Add more</button>
                    <button type="submit" id="saveexp" class="btn primary_btn">Save changes</button>
                  </div>
                </div>
              </div>
            </div><!--  ================== Certicifation Start -->

            <!-- second form -->

            <div class="modal fade" id="experience1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="section_title" id="exampleModalLabel">Experience</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        
                  <form id="experiencedata1">
                            <div class="row">
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Position name</label>
                                <select name="positionname" id="positionname1" class="form-control">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="Junior Chef">Junior Chef</option>
                                    <option value="Senior Chef">Senior Chef</option>
                                    <option value="Master Chef">Master Chef</option>
                                </select>
                            </div>
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Company name</label>
                                <input type="text" name="comapnyname" id="comapnyname1" class="form-control" value="" placeholder="Position name">
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                     <label for="">State </label>
                                    <input type="hidden" name="country" id="countryId" value="IN"/>
                                    <select name="state" class="form-control states order-alpha" id="stateId">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20">
                                    <label for="">Location </label>
                                    <select name="city" id="cityId" class="form-control cities order-alpha">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20">
                                    <label for="">Started Working (Year)</label>
                                    <select name="startyear" id="startyear1" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20">
                                    <label for="">Month</label>
                                    <select name="startmonth" id="startmonth1" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="Jan">Jan</option>
                                        <option value="Feb">Feb</option>
                                        <option value="March">March</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-12 float-left col-12 mb_20">
                                    <label for="">Is this your current company?</label>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20">
                                    <input type="radio" name="currentcompany" class="form-control currentcompany1" checked="checked" value="Yes">YES
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20">
                                    <input type="radio" name="currentcompany" class="form-control currentcompany1" value="No">NO
                                        
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20 yearshow1">
                                    <label for="">End Working (Year)</label>
                                    <select name="endyear" id="endyear1" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20 yearshow1">
                                    <label for="">Month</label>
                                    <select name="endmonth" id="endmonth1" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="Jan">Jan</option>
                                        <option value="Feb">Feb</option>
                                        <option value="March">March</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-6 float-left col-6 mb_20 present">
                                    <span id="present1">Present</span>
                                    
                                </div>
                            </div> <!--End of ROW-->
                            <input type="hidden" id="abcdata" name="abcdata" value="">
                        </form>
                  </div>
                  <div class="modal-footer">

                    <span id="msgdata"></span>
                    
                    <button type="submit" id="updateexp" class="btn primary_btn">Update</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- for delete -->
            <div id="deletedata" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  
                  <div class="modal-body">
                    <p>Are you sure you want to delete this record</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="nodatalete">No</button>
                    <button type="submit" id="delete" class="btn btn-default">Yes</button>
                  </div>
                </div>

              </div>
            </div>
            <!-- end personal section -->


            <!-- education section starrt -->
            <div class="common_box mt_10 float-left" id="educationsectionshow"></div>    


            <!-- for education modal -->

            <div class="modal fade" id="educationshow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="section_title" id="exampleModalLabel">Education</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        
                  <form id="educationsectiondata">
                    <div class="row">
                        <div class="col-md-12 float-left col-12 mb_20">
                            <label for="">Education</label>
                            <select name="qilification" id="qilification" class="form-control">
                                <option selected="" disabled="" value="">Choose...</option>
                                <option value="10th">10th</option>
                                <option value="12th">12th</option>
                                <option value="BscIT">BscIT</option>
                                <option value="BCA">BCA</option>
                                <option value="BCA">MCA</option>
                                <option value="BCA">BBA</option>
                                <option value="BCA">MBA</option>
                                <option value="OTHER">OTHER</option>
                            </select>
                        </div>
                        <div class="col-md-12 float-left col-12 mb_20">
                            <label for="">University/ Institutions Name</label>
                            <input type="text" name="universityname" id="universityname" class="form-control" value="" placeholder="University / Institutions Name">
                        </div>

                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Course type</label>
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                <input type="radio" name="coursename" class="form-control coursetype" checked="checked" value="Full time">Full time
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                <input type="radio" name="coursename" class="form-control coursetype" value="Part time">Part time
                            </div>

                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Passing out year</label>
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                <select name="passingyear" id="passingyear" class="form-control">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                </select>
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                    <select name="passingendyear" id="passingendyear" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="JAN">JAN</option>
                                        <option value="FEB">FEB</option>
                                        <option value="MARCH">MARCH</option>
                                    </select>
                                </div>

                                
                            </div> <!--End of ROW-->
                        </form>
                  </div>
                  <div class="modal-footer">

                    <span id="msgdata"></span>
                    <button type="submit" id="updatemore" class="btn btn-secondary">Save & Add more</button>
                    <button type="submit" id="saveone" class="btn primary_btn">Save changes</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- second education modal -->

            <div class="modal fade" id="educationshowdata" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="section_title" id="exampleModalLabel">Education</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        
                  <form id="educationsectiondata1">
                    <div class="row">
                        <div class="col-md-12 float-left col-12 mb_20">
                            <label for="">Education</label>
                            <select name="qilification1" id="qilification1" class="form-control">
                                <option selected="" disabled="" value="">Choose...</option>
                                <option value="10th">10th</option>
                                <option value="12th">12th</option>
                                <option value="BscIT">BscIT</option>
                                <option value="BCA">BCA</option>
                                <option value="BCA">MCA</option>
                                <option value="BCA">BBA</option>
                                <option value="BCA">MBA</option>
                                <option value="OTHER">OTHER</option>
                            </select>
                        </div>
                        <div class="col-md-12 float-left col-12 mb_20">
                            <label for="">University/ Institutions Name</label>
                            <input type="text" name="universityname1" id="universityname1" class="form-control" value="" placeholder="University / Institutions Name">
                        </div>

                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Course type</label>
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                <input type="radio" name="coursename1" class="form-control coursetype1" checked="checked" value="Full time">Full time
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                <input type="radio" name="coursename" class="form-control coursetype1" value="Part time">Part time
                            </div>

                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Passing out year</label>
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                <select name="passingyear1" id="passingyear1" class="form-control">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                </select>
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                    <select name="passingendyear1" id="passingendyear1" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="JAN">JAN</option>
                                        <option value="FEB">FEB</option>
                                        <option value="MARCH">MARCH</option>
                                    </select>
                                </div>
                                
                            </div> <!--End of ROW-->
                            <input type="hidden" id="aaaaa" name="aaaaa" value="">
                        </form>
                  </div>
                  <div class="modal-footer">

                    <span id="msgdata"></span>
                    <button type="submit" id="updateone" class="btn primary_btn">Update</button>
                  </div>
                </div>
              </div>
            </div>

            <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
            <!-- education section end -->


            <!-- certification sectio -->

            <div class="common_box mt_10 float-left" id="educationsuccessfully"></div> 

            <div class="modal fade" id="education" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="section_title" id="exampleModalLabel">Certificaton</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        
                  <form id="educationdata">
                            <div class="row">
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Certificaton Name</label>
                                <input type="text" name="classname" class="form-control" value="" placeholder="Class / Certificaton Name">
                            </div>
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">School Name / College name / Institutions Name</label>
                                <input type="text" name="schoolname" class="form-control" value="" placeholder="School Name / College name / Institutions Name">
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                    <label for=""> Year </label>
                                    <select name="startingyear" id="" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                                
                            </div> <!--End of ROW-->
                        </form>
                  </div>
                  <div class="modal-footer">

                    <span id="msgdata"></span>
                    <button type="submit" id="Updateedu" class="btn btn-secondary">Save & Add more</button>
                    <button type="submit" id="saveedu" class="btn primary_btn">Save changes</button>
                  </div>
                </div>
              </div>
            </div><!--  ================== Certicifation Start -->

            <!-- for second section -->
            <div class="modal fade" id="education1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="section_title" id="exampleModalLabel">Certificaton</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        
                  <form id="educationdata1">
                            <div class="row">
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Certificaton Name</label>
                                <input type="text" id="classname1" name="classname1" class="form-control" value="" placeholder="Class / Certificaton Name">
                            </div>
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Institutions Name</label>
                                <input type="text" id="schoolname1" name="schoolname1" class="form-control" value="" placeholder="Institutions Name">
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                    <label for=""> Year </label>
                                    <select name="startingyear1" id="startingyear1" class="form-control">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                               <input type="hidden" id="educationtoken" name="educationtoken" value=""> 
                            </div> <!--End of ROW-->
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" id="updateeducation" class="btn primary_btn">Update</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- for delete -->
            <div id="deletedataedu" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  
                  <div class="modal-body">
                    <p>Are you sure you want to delete this record</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="nodelete" data-dismiss="modal">No</button>
                    <button type="submit" id="deleteeducation" class="btn btn-default">Yes</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- end cerfication section -->

            <!--  === Preferences Start here ===========================-->
            <div class="common_box mt_10 float-left mb_30" id="preferencesdatafetch"></div>
            <!-- Modal -->
                <div class="modal fade" id="preferences" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="section_title" id="exampleModalLabel">Preferences </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="preferencesdata">
                            <div class="row">
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Positions Preferred</label>
                                <select name="preposition" id="" class="form-control">
                                    <option value="Junior Chef">Junior Chef</option>
                                    <option value="Senior Chef">Senior Chef</option>
                                    <option value="Master Chef">Master Chef</option>
                                </select>
                            </div>
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Job Type</label>
                            </div>
                                <div class="form-check check_list col-md-4">
                                    <label class="form-check-label">Part Time</label><input class="form-check-input" name="jobtype[]" type="checkbox" value="Part Time">
                                </div>
                                <div class="form-check check_list col-md-4">
                                    <label class="form-check-label"> Full Time </label><input class="form-check-input" name="jobtype[]" type="checkbox" value="Full Time">
                                </div>
                                <div class="form-check check_list col-md-4">
                                    <label class="form-check-label"> Both </label><input class="form-check-input" name="jobtype[]" type="checkbox" value="Both">
                                </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                    <label for="">Preferred Location </label>
                                <input type="hidden" name="country" id="countryId" value="IN"/>
                                <select name="state" class="form-control states order-alpha" id="stateId">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                <label for="">City</label>
                                <select name="city" id="cityId" class="form-control cities order-alpha">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Type of Job indusrty</label>
                            </div>
                                
                                <div class="form-check check_list col-md-3">
                                            <input class="form-check-input" type="checkbox" value="Bakarey" name="jobindustry[]">
                                            <label class="form-check-label">Bakarey</label>
                                        </div>
                                <div class="form-check check_list col-md-3">
                                            <input class="form-check-input" type="checkbox" value="Spa & Sallon" name="jobindustry[]">
                                            <label class="form-check-label"> Spa & Sallon </label>
                                        </div>
                                    <div class="form-check check_list col-md-3">
                                            <input class="form-check-input" type="checkbox" name="jobindustry[]" value="Restrurent">
                                            <label class="form-check-label">Restrurent</label>
                                        </div>
                                    <div class="form-check check_list col-md-3">
                                            <input class="form-check-input" type="checkbox" name="jobindustry[]" value="Hotel & Spa">
                                            <label class="form-check-label"> Hotel & Spa </label>
                                        </div>
                            <div class="col-md-6 float-left col-6 mb_20 pr_0">
                                <label for="">Preferred Salary </label>
                                <input type="text" name="presalary" class="form-control" placeholder="e.g 22000">
                            </div>
                            <div class="col-md-4 float-left col-6 mb_20">
                                <label for="">.</label>
                                <select name="presalary1" id="" class="form-control">
                                    <option value="Lakhs (Annual)"> Lakhs (Annual) </option>
                                    <option value="Thousand (Annual)"> Thousand (Annual) </option>
                                    <option value="Lakhs (Mohtly)"> Lakhs (Mohtly) </option>
                                    <option value="Thousand (Monthly)"> Thousand (Monthly) </option>
                                </select>
                            </div>
                            </div> <!--================= End of ROW-============ == -->
                        </form>
                      
                      </div>
                      <div class="modal-footer">
                        <button type="submit" id="predatasubmit" class="btn primary_btn">Save</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- second data -->
                <div class="modal fade" id="preferences1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="section_title" id="exampleModalLabel">Preferences </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="preferencesdata1">
                            <div class="row">
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Positions Preferred</label>
                                <select name="preposition1" id="preposition1" class="form-control">
                                    <option value="Junior Chef">Junior Chef</option>
                                    <option value="Senior Chef">Senior Chef</option>
                                    <option value="Master Chef">Master Chef</option>
                                </select>
                            </div>
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Job Type</label>
                            </div>
                                <div class="form-check check_list col-md-4">
                                    <label class="form-check-label">Part Time</label><input class="form-check-input" name="jobtype1[]" type="checkbox" value="Part Time">
                                </div>
                                <div class="form-check check_list col-md-4">
                                    <label class="form-check-label"> Full Time </label><input class="form-check-input" name="jobtype1[]" type="checkbox" value="Full Time">
                                </div>
                                <div class="form-check check_list col-md-4">
                                    <label class="form-check-label"> Both </label><input class="form-check-input" name="jobtype1[]" type="checkbox" value="Both">
                                </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                    <label for="">Preferred Location </label>
                                <input type="hidden" name="country" id="countryId" value="IN"/>
                                <select name="state" class="form-control states order-alpha" id="stateId">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                            <div class="col-md-6 float-left col-6 mb_20">
                                <label for="">City</label>
                                <select name="city" id="cityId" class="form-control cities order-alpha">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="col-md-12 float-left col-12 mb_20">
                                <label for="">Type of Job indusrty</label>
                            </div>
                                
                                <div class="form-check check_list col-md-3">
                                            <input class="form-check-input" type="checkbox" value="Bakarey" name="jobindustry1[]">
                                            <label class="form-check-label">Bakarey</label>
                                        </div>
                                <div class="form-check check_list col-md-3">
                                            <input class="form-check-input" type="checkbox" value="Spa & Sallon" name="jobindustry1[]">
                                            <label class="form-check-label"> Spa & Sallon </label>
                                        </div>
                                    <div class="form-check check_list col-md-3">
                                            <input class="form-check-input" type="checkbox" name="jobindustry1[]" value="Restrurent">
                                            <label class="form-check-label">Restrurent</label>
                                        </div>
                                    <div class="form-check check_list col-md-3">
                                            <input class="form-check-input" type="checkbox" name="jobindustry1[]" value="Hotel & Spa">
                                            <label class="form-check-label"> Hotel & Spa </label>
                                        </div>
                            <div class="col-md-6 float-left col-6 mb_20 pr_0">
                                <label for="">Preferred Salary </label>
                                <input type="text" name="presalary2" class="form-control" placeholder="e.g 22000">
                            </div>
                            <div class="col-md-4 float-left col-6 mb_20">
                                <label for="">.</label>
                                <select name="presalary1" id="" class="form-control">
                                    <option value="Lakhs (Annual)"> Lakhs (Annual) </option>
                                    <option value="Thousand (Annual)"> Thousand (Annual) </option>
                                    <option value="Lakhs (Mohtly)"> Lakhs (Mohtly) </option>
                                    <option value="Thousand (Monthly)"> Thousand (Monthly) </option>
                                </select>
                            </div>
                            </div> <!--================= End of ROW-============ == -->
                        </form>
                      
                      </div>
                      <div class="modal-footer">
                        <button type="submit" id="updatepre" class="btn primary_btn">Update</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Proof of identification -->

            <div class="common_box mt_10 float-left mb_30">
                <h1 class="section_title mb_15">Proof of identification  </h1>
                <div class="job_container">
                    <div class="job_caption">
                        <?php $attributes = array('id' => 'idproof');
                        echo form_open_multipart('', $attributes);?>
                        <div class="image-upload">
                        <label for="file-input" id="edini">
                            <img src="" id="edu">
                            
                        </label><div class="cross"><span id="cross">X</span></div>

                        <input id="file-input" name="file" type="file"/>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
  

        </div>
    </div><!-- ====  COL_MD 8 right side section end here ========== -->
    
    <!-- for msg show -->
    <div id="msgshow" class="mse_sticky" style="">
        <p id="msggg"></p>        
    </div>
    <!-- Modal -->


<!-- ========================================================================
-----------================  2nd Modal================================================-->


<?php $this->load->view('inc/footer'); ?>





<!-- this function for personal information -->

<script type="text/javascript">
$(function () {
    $('#save').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('profilecandidate-insert'); ?>",
            data: $('#personalform').serialize(),
            success: function (data) {
                setTimeout(function () {
                       //Redirect with JavaScript
                       window.location.href= "<?php echo base_url('/profilecandidate/'); ?>";
                    }, 1000);
                $("#personal").hide();
                $("#msgshow").show();
                setTimeout(function() {$('#msgshow').hide();}, 4000);
                $("#msggg").text(data);
            }
        });
     });

     $('#Update').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('profilecandidate/updatepersonaldata'); ?>",
            data: $('#personalform').serialize(),
            success: function (data) {
                setTimeout(function () {
                       //Redirect with JavaScript
                       window.location.href= "<?php echo base_url('/profilecandidate/'); ?>";
                    }, 1000);
                $("#personal").modal("hide");
                $("#msgshow").show();
                setTimeout(function() {$('#msgshow').hide();}, 4000);
                $("#msggg").text(data);
                
            }
        });       
    });
});
</script>


<!-- load get data for personal indormation -->
<script type="text/javascript">
    $.ajax({
            url: "<?php echo base_url('/get-data/'); ?>",
            cache: false,
            success: function (get) {
                $("#Successfullydatasave").html(get);
            }
        });
</script>

<!-- fet and update personal section -->
<script type="text/javascript">
$(document).ready(function(){
    $('#saveexp').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('/insert-experience/'); ?>",
            data: $('#experiencedata').serialize(),
            
            success: function(data) {
                    if (data == "Something error") {
                        $("#msgshow").show();
                            setTimeout(function() {$('#msgshow').hide();}, 4000);
                            $("#msggg").text("Something Error");
                    }else{
                        $("#experience").modal('hide');
                        $("#experiencedata")[0].reset();
                        $.ajax({
                            url: "<?php echo base_url('/get-data/'); ?>",
                            cache: false,
                            success: function (get) {
                                $("#msgshow").show();
                                setTimeout(function() {$('#msgshow').hide();}, 4000);
                            $("#msggg").text("Inserted Successfully");
                                $("#Successfullydatasave").html(get);
                            }
                        });
                        
                    }
                
            }
        });
     });

     $('#Updateepx').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('/addmore-experience/'); ?>",
            data: $('#experiencedata').serialize(),
            success: function (data) {
                if (data =="Successfully Inserted data") {
                    $("#experiencedata")[0].reset();
                    $("#msgdata").text(data);
                    setTimeout(function () {
                       //Redirect with JavaScript
                       $("#msgdata").hide(data);
                    }, 2000);
                    $.ajax({
                            url: "<?php echo base_url('/get-data/'); ?>",
                            cache: false,
                            success: function (get) {
                                $("#Successfullydatasave").html(get);
                            }
                        });

                }else if (data == "Something error") {
                        $("#msgshow").show();
                        setTimeout(function() {$('#msgshow').hide();}, 4000);
                            $("#msggg").text("Please fill all fields");
                }
            }
        });
    });
});

/*for data add and fetch more buttonexperince*/

$(document).ready(function(){
    $("#editexp").click(function(e){
       e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('/addmore-experience/'); ?>",
            data: $('#experiencedata').serialize(),
            success: function (data) {
                if (data =="Successfully Inserted data") {
                    $("#experiencedata")[0].reset();
                    $("#msgdata").text(data);
                    setTimeout(function () {
                       //Redirect with JavaScript
                       $("#msgdata").hide(data);
                    }, 2000);
                    $.ajax({
                            url: "<?php echo base_url('/get-data/'); ?>",
                            cache: false,
                            success: function (get) {
                                $("#Successfullydatasave").html(get);
                            }
                        });

                }else if (data == "Something error") {
                    $("#msgshow").show();
                    setTimeout(function() {$('#msgshow').hide();}, 4000);
                            $("#msggg").text("Please fill all fields");
                }
            }
        }); 
    });      
});

/*for edit with insertted in exprence*/
$(document).ready(function(){

    $(document).on('click', '.editexp', function(e){
        e.preventDefault();
        var employee_id = $(this).attr("id"); 
        
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('Profilecandidate/fetchexpdata/'); ?>",
            data: {employee_id:employee_id},
            dataType: 'json',
            success: function (data) {
                $('#experience1').modal('show');
                $('#positionname1  option[value="'+data[0].work_experience_position+'"]').prop("selected", true);
                $('#comapnyname1').val(data[0].work_experience_company_name);
                $('#stateId  option[value="'+data[0].work_experience_state+'"]').prop("selected", true);
                $('#cityId  option[value="'+data[0].work_experience_city+'"]').prop("selected", true);
                $('#startyear1  option[value="'+data[0].work_experience_start_year+'"]').prop("selected", true);
                $('#startmonth1  option[value="'+data[0].work_experience_start_month+'"]').prop("selected", true);
                $("#abcdata").val(data[0].work_experience_token);
                $("#updateexp").click(function(e){
                e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url('/update-exprence-data/'); ?>",
                        data: $("#experiencedata1").serialize(),
                        success: function (abc) {
                            $("#experience1").modal('hide');
                            $("#msgshow").show();
                            setTimeout(function() {$('#msgshow').hide();}, 4000);
                            $("#msggg").text(abc);

                            $.ajax({
                                url: "<?php echo base_url('/get-data/'); ?>",
                                cache: false,
                                success: function (get) {
                                    $("#Successfullydatasave").html(get);
                                }
                            });
                        }
                    });
                });
            }
        }); 
    });
});


/*delete*/

    $(document).on('click', '.deleteexp', function(e){
        e.preventDefault();
        var delete_id = $(this).attr("id"); 
        var a = confirm("Do you really want to delete record?");
            if (a) {
                $.ajax({
                    type: 'post',
                    url: "<?php echo base_url('delete-exprence-data'); ?>",
                    data: {delete_id:delete_id},
                    success: function (ghi) {
                        $("#deletedata").modal('hide');
                        $("#msgshow").show();
                        setTimeout(function() {$('#msgshow').hide();}, 4000);
                        $("#msggg").text(ghi);
                        $.ajax({
                            url: "<?php echo base_url('/get-data/'); ?>",
                            cache: false,
                            success: function (get) {
                                $("#Successfullydatasave").html(get);
                            }
                        });
                    }
                }); 
            }else{

            }
            
        
    });

    /*$("#nodatalete").click(function(){

        $.ajax({
            url: "<?php echo base_url('/get-data/'); ?>",
            cache: false,
            success: function (get) {
                $("#nodatalete").attr('data-dismiss', 'modal');
                $("#Successfullydatasave").html(get);
            }
        });

    })*/
</script>


<!-- /*insert load certification data*/ -->
<script type="text/javascript">
    $.ajax({
            url: "<?php echo base_url('Profilecandidate/educationgetdata/'); ?>",
            cache: false,
            success: function (get) {
                $("#educationsuccessfully").html(get);
            }
        });
</script>


<script type="text/javascript">
$(document).ready(function(){
    $('#saveedu').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('Profilecandidate/updatedataexp/'); ?>",
            data: $('#educationdata').serialize(),
            
            success: function(data) {
                    if (data == "Something error") {
                        alert("Please fill all fields");
                    }else{

                        $("#education").modal('hide');
                        $("#educationdata")[0].reset();
                        $("#msgshow").show();
                        setTimeout(function() {$('#msgshow').hide();}, 4000);
                        $("#msggg").text(data);
                        $.ajax({
                            url: "<?php echo base_url('Profilecandidate/educationgetdata/'); ?>",
                            cache: false,
                            success: function (get) {
                                $("#educationsuccessfully").html(get);
                            }
                        });
                        
                    }
                
            }
        });
     });

     $('#Updateedu').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('Profilecandidate/addmoreeducation/'); ?>",
            data: $('#educationdata').serialize(),
            success: function (data) {
                if (data =="Successfully Inserted data") {
                    $("#educationdata")[0].reset();
                    $("#msgdata").text(data);
                    setTimeout(function () {
                       //Redirect with JavaScript
                       $("#msgdata").hide(data);
                    }, 2000);
                    $.ajax({
                            url: "<?php echo base_url('Profilecandidate/educationgetdata/'); ?>",
                            cache: false,
                            success: function (get) {
                                $("#educationsuccessfully").html(get);
                            }
                        });

                }else if (data == "Something error1") {
                        alert("error2");
                }
            }
        });
    });
});

</script>

<!-- for update delete education section -->

<script type="text/javascript">
$(document).ready(function(){

    $(document).on('click', '.educationedit', function(e){
        e.preventDefault();
        var education_id = $(this).attr("id"); 
        
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('Profilecandidate/fetcheducationdata/'); ?>",
            data: {education_id:education_id},
            dataType: 'json',
            success: function (data) {
                $('#education1').modal('show');
                $('#classname1').val(data[0].academic_qualifications_course_name);
                $('#schoolname1').val(data[0].academic_qualifications_school_name);
                $('#startingyear1  option[value="'+data[0].academic_qualifications_start_year+'"]').prop("selected", true);
                $("#educationtoken").val(data[0].academic_qualifications_token);
                $("#updateeducation").click(function(e){
                    e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url('/update-education-data/'); ?>",
                        data: $("#educationdata1").serialize(),
                        success: function (ghj) {
                            $("#education1").modal('hide');
                            $("#msgshow").show();
                            setTimeout(function() {$('#msgshow').hide();}, 4000);
                            $("#msggg").text(ghj);

                            $.ajax({
                                url: "<?php echo base_url('Profilecandidate/educationgetdata/'); ?>",
                                cache: false,
                                success: function (get) {
                                    $("#educationsuccessfully").html(get);
                                }
                            });
                        }
                    });
                });
            }
        }); 
    });
});


/*delete*/
    $(document).on('click', '.educationdelete', function(e){
        e.preventDefault();

        var delete_education_id = $(this).attr("id"); 
        var a = confirm("Do you really want to delete record?");
        if (a) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url('/delete-education-data/'); ?>",
                data: {delete_education_id:delete_education_id},
                success: function (set) {
                    $("#deletedataedu").modal('hide');
                    $("#msgshow").show();
                    setTimeout(function() {$('#msgshow').hide();}, 4000);
                    $("#msggg").text(set);
                    $.ajax({
                        url: "<?php echo base_url('Profilecandidate/educationgetdata/'); ?>",
                        cache: false,
                        success: function (get) {
                            $("#educationsuccessfully").html(get);
                        }
                    });
                }
            }); 
        }
    });

</script>

<!-- preferences section -->

<script type="text/javascript">
    $.ajax({
            url: "<?php echo base_url('Profilecandidate/fetchpregetdata/'); ?>",
            cache: false,
            success: function (get) {

                $("#preferencesdatafetch").html(get);
            }
        });
</script>


<script type="text/javascript">
$(document).ready(function(){
    $('#predatasubmit').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('/insert-preferance/'); ?>",
            data: $('#preferencesdata').serialize(),
            success: function (geta) {
                if (geta == "Something error") {
                    alert("Please fill all fields");
                }else if(geta == "Successfully Inserted data"){
                    $("#preferencesdata")[0].reset();
                    $("#preferences").modal('hide');
                    $.ajax({
                        url: "<?php echo base_url('Profilecandidate/fetchpregetdata/'); ?>",
                        cache: false,
                        success: function (get) {
                            $("#msgshow").show();
                            setTimeout(function() {$('#msgshow').hide();}, 4000);
                            $("#msggg").text("Successfully Inserted data");
                            $("#preferencesdatafetch").html(get);
                        }
                    });
                        
                }
                
            }
        });
     });

    /*get datat*/

     $('#updatepre').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('profilecandidate/preferenceupdate'); ?>",
            data: $('#updateprefrence, #preferencesdata1').serialize(),
            success: function (data) {
                $("#preferences1").modal('hide');
                $("#msgshow").show();
                setTimeout(function() {$('#msgshow').hide();}, 4000);
                $("#msggg").text(data);
         
            }
        });       
    });
});
</script>

<script type="text/javascript">
    $("#stateId option[value='<?php if (isset($p_value->candidate_profile_state_name)) { echo $p_value->candidate_profile_state_name; }; ?>']").attr("selected","selected");
    $("#cityId option[value='<?php if (isset($p_value->candidate_profile_city_name)) { echo $p_value->candidate_profile_city_name; }; ?>']").attr("selected","selected");
    $("#gender option[value='<?php if (isset($p_value->candidate_profile_gender)) { echo $p_value->candidate_profile_gender; }; ?>']").attr("selected","selected");
    $("#expyear option[value='<?php if (isset($p_value->candidate_profile_total_years_of_exp)) { $year = explode(" ", $p_value->candidate_profile_total_years_of_exp); echo $year[0]." ".$year[1]; }; ?>']").attr("selected","selected");
    $("#expmonth option[value='<?php if (isset($p_value->candidate_profile_total_years_of_exp)) { $year = explode(" ", $p_value->candidate_profile_total_years_of_exp); echo $year[2]; }; ?>']").attr("selected","selected");

    $("#c_salary_lac option[value='<?php if (isset($p_value->candidate_profile_current_salary)) { $year = explode(" ", $p_value->candidate_profile_current_salary); echo $year[0]." ".$year[1]; }; ?>']").attr("selected","selected");
    $("#c_salary_thousand option[value='<?php if (isset($p_value->candidate_profile_current_salary)) { $year = explode(" ", $p_value->candidate_profile_current_salary); echo $year[2]." ".$year[3]; }; ?>']").attr("selected","selected");
</script>

<script type="text/javascript">

$(document).ready(function(){
    $(".yearshow").hide()
    $('.currentcompany').click(function(){

        var inputValue = $(this).attr("value");
   
        if (inputValue=="Yes") {
            $("#present").show();
            $(".yearshow").hide();
        }else{
            $("#present").hide();
            $(".yearshow").show();
        }
        
        

    });

});
$(document).ready(function(){
    $(".yearshow1").hide()
    $('.currentcompany1').click(function(){

        var inputValue = $(this).attr("value");
   
        if (inputValue=="Yes") {
            $("#present1").show();
            $(".yearshow1").hide();
        }else{
            $("#present1").hide();
            $(".yearshow1").show();
        }
        
        

    });

});
</script>


<!-- education section get data -->
<script type="text/javascript">
$.ajax({
    url: "<?php echo base_url('/get-education-data/'); ?>",
    cache: false,
    success: function (get) {
        $("#educationsectionshow").html(get);
    }
});
</script>

<!-- save and addmore education section -->

<script type="text/javascript">
$(document).ready(function(){
    $('#saveone').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('/education-section-data/'); ?>",
            data: $('#educationsectiondata').serialize(),
            
            success: function(data) {
                    if (data == "Something error") {
                        $("#msgshow").show();
                            setTimeout(function() {$('#msgshow').hide();}, 2000);
                            $("#msggg").text("Something Error");
                    }else{
                        $("#educationshow").modal('hide');
                        $("#educationsectiondata")[0].reset();
                        $.ajax({
                            url: "<?php echo base_url('/get-education-data/'); ?>",
                            cache: false,
                            success: function (get) {
                                $("#msgshow").show();
                                setTimeout(function() {$('#msgshow').hide();}, 2000);
                                $("#msggg").text("Inserted Successfully");
                                $("#educationsectionshow").html(get);
                            
                            }
                        });
                    }
                
            }
        });
     });

     $('#updatemore').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('/educationsection-foraddmore/'); ?>",
            data: $('#educationsectiondata').serialize(),
            success: function (data) {
                if (data =="Successfully Inserted data") {
                    $("#educationsectiondata")[0].reset();
                    $("#msgdata").text(data);
                    setTimeout(function () {
                       //Redirect with JavaScript
                       $("#msgdata").hide(data);
                    }, 2000);
                    $.ajax({
                        url: "<?php echo base_url('/get-education-data/'); ?>",
                        cache: false,
                        success: function (get) {
                            $("#msgshow").show();
                            setTimeout(function() {$('#msgshow').hide();}, 2000);
                            $("#msggg").text("Inserted Successfully");
                            $("#educationsectionshow").html(get);
                            }
                        });
                }else if (data == "Something error") {
                        $("#msgshow").show();
                            setTimeout(function() {$('#msgshow').hide();}, 4000);
                            $("#msggg").text("Something Error");
                }
            }
        });
    });
});



</script>

<!-- delete for education section  -->

<script type="text/javascript">
    $(document).on('click', '.educationdatdelete', function(e){
        e.preventDefault();
        var delete_id = $(this).attr("id"); 
        var a = confirm("Do you really want to delete record?");
            if (a) {
                $.ajax({
                    type: 'post',
                    url: "<?php echo base_url('deducationdelete-data'); ?>",
                    data: {delete_id:delete_id},
                    success: function (chi) {
                        $("#msgshow").show();
                        setTimeout(function() {$('#msgshow').hide();}, 4000);
                        $("#msggg").text(chi);
                        $.ajax({
                        url: "<?php echo base_url('/get-education-data/'); ?>",
                        cache: false,
                        success: function (get) {
                            $("#msgshow").show();
                            setTimeout(function() {$('#msgshow').hide();}, 2000);
                            $("#msggg").text("Deleted Successfully");
                            $("#educationsectionshow").html(get);
                            }
                        });
                    }
                }); 
            }else{

            }
            
        
    });
</script>


<!-- edit snd upadte education section -->
<script type="text/javascript">
$(document).ready(function(){

    $(document).on('click', '.educationdatupdate', function(e){
        e.preventDefault();
        var employee_id = $(this).attr("id"); 
        
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('Profilecandidate/educationsectionfetch/'); ?>",
            data: {employee_id:employee_id},
            dataType: 'json',
            success: function (data) {
                $('#educationshowdata').modal('show');
                $('#qilification1  option[value="'+data[0].academic_certifications_name+'"]').prop("selected", true);
                $('#universityname1').val(data[0].academic_certifications_school_name);
                $('.coursename1  option[value="'+data[0].academic_certifications_course_type+'"]').prop("checked", true);
                $('#passingyear1  option[value="'+data[0].academic_certifications_passing_year+'"]').prop("selected", true);
                $('#passingendyear1  option[value="'+data[0].passing_month+'"]').prop("selected", true);
                $('#aaaaa').val(data[0].academic_certifications_token);
                
                $("#updateone").click(function(e){
                e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url('/update-education-section/'); ?>",
                        data: $("#educationsectiondata1").serialize(),
                        success: function (abc) {
                            $("#educationshowdata").modal('hide');
                            $("#msgshow").show();
                            setTimeout(function() {$('#msgshow').hide();}, 2000);
                            $("#msggg").text(abc);

                            $.ajax({
                            url: "<?php echo base_url('/get-education-data/'); ?>",
                            cache: false,
                            success: function (get) {
                                $("#educationsectionshow").html(get);
                                }
                            });
                        }
                    });
                });
            }
        }); 
    });
});

</script>




<!-- Proof of identification -->
<script type="text/javascript">

 /*for fetching document fetch image*/
 $(document).ready(function(){
    $("#edu").attr("src", "<?php echo base_url('assets/images/Aadhaar-card-sample-300x212.png'); ?>");
    $("#cross").hide();
    $.ajax({
        url:'<?php echo base_url('/fetch-image/'); ?>',
        dataType: 'json',
        success: function(ghk){
            if (ghk[0].candidate_profile_adharcard==null) {
                $("#edu").attr("src", "<?php echo base_url('assets/images/Aadhaar-card-sample-300x212.png'); ?>");
                $("#cross").hide();
            }else{
                $("#edu").attr("src", "<?php echo base_url()."uploads/"; ?>"+ghk[0].candidate_profile_adharcard+"");
                $("#cross").show();
            }
        }
    });
});

$(document).ready(function(){
 $(document).on('change', '#file-input', function(){
  var name = document.getElementById("file-input").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['pdf','png','jpg','jpeg']) == -1) 
  {
    $('.alert-danger').html('Invalid Image File').fadeIn().delay(2000).fadeOut('slow');
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file-input").files[0]);
  var f = document.getElementById("file-input").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
    $('.alert-danger').html('Image File Size is very big').fadeIn().delay(2000).fadeOut('slow');
  }
  else
  {
   form_data.append("file-input", document.getElementById('file-input').files[0]);
   $.ajax({
    url:"<?php echo base_url('/upload-image-using-ajax/'); ?>",
    method:"POST",
    data: form_data,
    async: false,
    processData: false,
    contentType: false,
    beforeSend:function(){
        $('.alert-success').html('Image Uploading Processing...').fadeIn().delay(2000).fadeOut('slow');
    },   
    success:function(data)
    {
     $.ajax({
             url:'<?php echo base_url('/fetch-image/'); ?>',
             dataType: 'json',
             
             success: function(ghk){
                if (ghk[0].candidate_profile_adharcard==null) {
                    $("#edu").attr("src", "<?php echo base_url('assets/images/Aadhaar-card-sample-300x212.png'); ?>");
                    $("#cross").hide();
                }else{
                    $('.alert-success').html('Image Successfully uploaded').fadeIn().delay(2000).fadeOut('slow');
                    $("#edu").attr("src", "<?php echo base_url()."uploads/"; ?>"+ghk[0].candidate_profile_adharcard+"");
                    $("#cross").show();
                }
                
             }
             });

    }
   });
  }
 });
});


/*for indefication detele*/
$(document).ready(function(){
    $("#cross").click(function(){
        var a = confirm("Do you really want to delete record?");
        if (a) {
        $.ajax({
            url:'<?php echo base_url('/delete-image/'); ?>',
            success: function(ghk){
                alert(ghk);
                $.ajax({
                 url:'<?php echo base_url('/fetch-image/'); ?>',
                 dataType: 'json',
                 
                 success: function(ghk){
                    if (ghk[0].candidate_profile_adharcard==null) {
                        $("#edu").attr("src", "<?php echo base_url('assets/images/Aadhaar-card-sample-300x212.png'); ?>");
                        $("#cross").hide();
                    }else{
                        $('.alert-success').html('Image Successfully deleted').fadeIn().delay(2000).fadeOut('slow');
                        $("#edu").attr("src", "<?php echo base_url()."uploads/"; ?>"+ghk[0].candidate_profile_adharcard+"");
                        $("#cross").show();
                    }
                    
                 }
                 });
            }
        });
    }
    });
});
</script>


<!-- Profile image -->
<script type="text/javascript">

/*for fetching profile fetch image*/
$(document).ready(function(){
    $("#uploadprofile").attr("src", "<?php echo base_url('assets/images/profile.png'); ?>");
    $("#cross1").hide();
    $.ajax({
        url:'<?php echo base_url('/profile-fetch-image/'); ?>',
        dataType: 'json',
        success: function(ghk){
            if (ghk[0].candidate_profile_image==null) {
                $("#uploadprofile").attr("src", "<?php echo base_url('assets/images/profile.png'); ?>");
                $("#cross1").hide();
            }else if (ghk[0].candidate_profile_image=="image empty") {
                $("#uploadprofile").attr("src", "<?php echo base_url('assets/images/profile.png'); ?>");
                $("#cross1").hide();
            }else{
                $("#uploadprofile").attr("src", "<?php echo base_url()."uploads/"; ?>"+ghk[0].candidate_profile_image+"");
                $("#cross1").show();
            }
        }
    });
});


$(document).ready(function(){
 $(document).on('change', '#profile', function(){
  var name = document.getElementById("profile").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("profile").files[0]);
  var f = document.getElementById("profile").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 1000000)
  {
   alert("Image File Size not more then 1 MB");
  }
  else
  {
   form_data.append("profile", document.getElementById('profile').files[0]);
   $.ajax({
    url:"<?php echo base_url('/profile-upload/'); ?>",
    method:"POST",
    data: form_data,
    async: false,
    processData: false,
    contentType: false,
    beforeSend:function(){
     alert("Image Uploading...");

    },   
    success:function(data)
    {   
        alert(data);
        $.ajax({
            url:'<?php echo base_url('/profile-fetch-image/'); ?>',
            dataType: 'json',
            success: function(ghk){
                if (ghk[0].candidate_profile_image==null) {
                    $("#uploadprofile").attr("src", "<?php echo base_url('assets/images/profile.png'); ?>");
                    $("#cross1").hide();
                }else{
                    $("#uploadprofile").attr("src", "<?php echo base_url()."uploads/"; ?>"+ghk[0].candidate_profile_image+"");
                    $("#cross1").show();
                }
            }
        });

    }
   });
  }
 });
});


/*for profile detele*/
$(document).ready(function(){
    $("#cross1").click(function(){
        var a = confirm("Do you really want to delete record?");
        if (a) {
        $.ajax({
            url:'<?php echo base_url('/profile-delete-image/'); ?>',
            success: function(ghk){
                $.ajax({
                 url:'<?php echo base_url('/profile-fetch-image/'); ?>',
                 dataType: 'json',
                 
                 success: function(ghk){
                    if (ghk[0].candidate_profile_image==null) {
                        $("#uploadprofile").attr("src", "<?php echo base_url('assets/images/profile.png'); ?>");
                        $("#cross1").hide();
                    }else{
                        $("#uploadprofile").attr("src", "<?php echo base_url()."uploads/"; ?>"+ghk[0].candidate_profile_image+"");
                        $("#cross1").show();

                    }
                    
                 }
                 });
            }
        });
    }
    });
});

</script>
<!-- for state fetch accroding city -->


<script type="text/javascript">
$(document).ready(function(){
    $("#state").change(function(){

        var state = $("#state option:selected").val();
        alert(state);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('/city-name/'); ?>",
            data: {state:state}
            dataType: 'json',
            success: function (data) {
                alert(data);
            }
        });

    });
});
</script>