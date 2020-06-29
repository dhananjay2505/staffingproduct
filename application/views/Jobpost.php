<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ($this->session->userdata('user_type') == 1) {
    redirect('/login/');
}
?>


<div class="gradient_bg" style="width: 100%; height: 101px; float: left; display: block;" ></div>

<div class="alert alert-success mse_sticky" style="display: none;"></div>
<div class="alert alert-danger mse_sticky" style="display: none;"></div>
<div class="container">
    <div class="row">
    <div class="col-md-8 float-left col-12">
        <div class="common_box float-left" style="margin-top: -40px;" id="profilegetdata">
            
        </div>

        <div class="common_box float-left mt_15 mb_20">
            <span class="primery_title w-100 float-left mt_10"> Post your job </span>
            <span class="font_12 grey w-100 float-left">This will apear in candidate search section.</span>
        <form class="w-100 float-left mt_20" id="jobpostdata">
            <div class="row">
            <div class="col-md-12 float-left col-12 mb_20">
                <label for="">Job Title</label>
                <input type="text" name="job_title" class="form-control" placeholder="e.g Master chef">
            </div>
            <div class="col-md-12 float-left col-12 mb_20">
                <label for="">Job description</label>
                <textarea class="form-control" name="job_description" id="" rows="5"> </textarea>
            </div>
            <div class="col-md-6 float-left col-6 mb_20">
                    <label for="">Job Location </label>
                <input type="hidden" name="country" id="countryId" value="IN"/>
                <select name="job_location" class="form-control states order-alpha" id="stateId">
                    <option value="">Select State</option>
                </select>
            </div>
            
            <div class="col-md-6 float-left col-6 mb_20">
                <label for="">City</label>
                <select name="Job_state" id="cityId" class="form-control cities order-alpha">
                    <option value="">Select City</option>
                </select>
            </div>

            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">Min Experiance </label>
                <select name="experience" id="job_type" class="form-control">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="0-1 Years">0-1 Years</option>
                    <option value="1-2 Years">1-2 Years</option>
                    <option value="2-3 Years">2-3 Years</option>
                    <option value="3-4 Years">3-4 Years</option>
                    <option value="4-5 Years">4-5 Years</option>
                    <option value="5-6 Years">5-6 Years</option>
                    <option value="5-7 Years">5-7 Years</option>
                    <option value="7-8 Years">7-8 Years</option>
                    <option value="8-9 Years">8-9 Years</option>
                    <option value="9-10 Years">9-10 Years</option>
                    <option value="10-11 Years">10-11 Years</option>
                    <option value="11-12 Years">11-12 Years</option>
                    <option value="12-13 Years">12-13 Years</option>
                    
                </select>
            </div>

            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">Job Type</label>
                <select name="job_type" id="job_type" class="form-control">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="Full time">Full time </option>
                    <option value="Part time">Part time </option>
                </select>
            </div>
            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">Accommodation</label>
                <select name="accommodation_provided" id="accommodation_provided" class="form-control">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No </option>
                </select>
            </div>
            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">On Duty Food</label>
                <select name="pn_duty_food_provided" id="pn_duty_food_provided" class="form-control">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No </option>
                </select>
            </div>

            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">Salary </label>
                <input type="text" name="monthly_salary" class="form-control" placeholder="e.g 22000">
            </div>
            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">.</label>
                <select name="salary_annual" id="" class="form-control">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="Lakhs (Annual)"> Lakhs (Annual) </option>
                    <option value="Thousand (Annual)"> Thousand (Annual) </option>
                </select>
            </div>

            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">ESI Provide</label>
                <select name="ESI_provided" id="" class="form-control">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="Yes"> Yes </option>
                    <option value="No"> No </option>
                </select>
            </div>

            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">PF Provide</label>
                <select name="PF_provided" id="" class="form-control">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="Yes"> Yes </option>
                    <option value="No"> No </option>
                </select>
            </div>

            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">Minimum Contract Period</label>
                <select name="minimum_contract_period" id="" class="form-control">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="1 Month"> 1 Month </option>
                    <option value="2 Month"> 2 Month </option>
                    <option value="3 Month"> 3 Month </option>
                    <option value="4 Month"> 4 Month </option>
                    <option value="5 Month"> 5 Month </option>
                    <option value="6 Month"> 6 Month </option>
                    <option value="7 Month"> 7 Month </option>
                    <option value="8 Month"> 8 Month </option>
                    <option value="9 Month"> 9 Month </option>
                    <option value="10 Month"> 10 Month </option>
                    <option value="11 Month"> 11 Month </option>
                    <option value="12 Month"> 12 Month </option>
                </select>
            </div>
            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">Business Type</label>
                <select name="business_type" id="" class="form-control">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="Shape Salon"> Shape Salon </option>
                    <option value="Hotel"> Hotel </option>
                    <option value="Resort"> Resort </option>
                </select>
            </div>

            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">Working Hours</label>
                <select name="working_hours" id="" class="form-control">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="1 Hours"> 1 Hours </option>
                    <option value="2 Hours"> 2 Hours </option>
                    <option value="3 Hours"> 3 Hours </option>
                    <option value="4 Hours"> 4 Hours </option>
                    <option value="5 Hours"> 5 Hours </option>
                    <option value="6 Hours"> 6 Hours </option>
                    <option value="7 Hours"> 7 Hours </option>
                    <option value="8 Hours"> 8 Hours </option>
                    <option value="9 Hours"> 9 Hours </option>
                    <option value="10 Hours"> 10 Hours </option>
                    <option value="11 Hours"> 11 Hours </option>
                    <option value="12 Hours"> 12 Hours </option>
                    <option value="13 Hours"> 13 Hours </option>
                    <option value="14 Hours"> 14 Hours </option>
                    <option value="15 Hours"> 15 Hours </option>
                    <option value="16 Hours"> 16 Hours </option>
                    <option value="17 Hours"> 17 Hours </option>
                    <option value="18 Hours"> 18 Hours </option>
                    <option value="19 Hours"> 19 Hours </option>
                    <option value="20 Hours"> 20 Hours </option>
                    <option value="21 Hours"> 21 Hours </option>
                    <option value="22 Hours"> 22 Hours </option>
                    <option value="23 Hours"> 23 Hours </option>
                    <option value="24 Hours"> 24 Hours </option>

                </select>
            </div>
            <div class="col-md-4 float-left col-6 mb_20">
                <label for="">Monthly Paid Off Days</label>
                <select name="monthly_paid_pff_days" id="" class="form-control">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="1 Day"> 1 Day </option>
                    <option value="2 Day"> 2 Day </option>
                    <option value="3 Day"> 3 Day </option>
                    <option value="4 Day"> 4 Day </option>
                    <option value="5 Day"> 5 Day </option>
                    <option value="6 Day"> 6 Day </option>
                    <option value="7 Day"> 7 Day </option>
                    <option value="8 Day"> 8 Day </option>
                    <option value="9 Day"> 9 Day </option>
                    <option value="10 Day"> 10 Day </option>
                    <option value="11 Day"> 11 Day </option>
                    <option value="12 Day"> 12 Day </option>
                    

                </select>
            </div>

        </div>
            <button type="submit" id="postnow" name="postnow" class="primary_btn mb_30"> Post now </button>
        </form>    
        </div> <!-- ============ End of Common Box ================== -->

    </div>
    <!-- COL MD8 End here -->
    <div class="col-md-4 float-left col-12 mb_mob_60">
        <div class="w-100 float-left common_box mt_mob_0" style="margin-top: -40px;" id="">
            <span class="primery_title mb_20 w-100 float-left"> How it Work </span>
              
            <ul class="how_work">
                <li>
                    <span class="circle_no">1</span>
                    <span class="font_16 bold w-100 float-left">Account</span>
                    <span class="font_12 float-left w-100 grey"> Create profile and complete your business profile.</span>
                </li>
                <li>
                    <span class="circle_no">2</span>
                    <span class="font_16 bold w-100 float-left">Post your jobs</span>
                    <span class="font_12 float-left w-100 grey"> Post your vacancy (full time/part time) as per your requirements.</span>
                </li>
                <li>
                    <span class="circle_no">3</span>
                    <span class="font_16 bold w-100 float-left">Shortlist</span>
                    <span class="font_12 float-left w-100 grey"> We Do Filter, Short List, Screen & Interview. </span>
                </li>
                <li>
                    <span class="circle_no">4</span>
                    <span class="font_16 bold w-100 float-left">Get placed</span>
                    <span class="font_12 float-left w-100 grey">Get Three Best Profile For Your Vacancy And Onbord Your Great One Out Of Three</span>
                </li>
            </ul>
                
            
        </div>
    </div>
    <!-- COL MD 4 End here -->
    </div>

</div>

<?php $this->load->view('inc/footer'); ?>

<script type="text/javascript">
    $.ajax({
            url: "<?php echo base_url('Jobpost/fetchdataforprofile'); ?>",
            cache: false,
            type:'post',
            success: function (get) {
                $("#profilegetdata").html(get);
            }
        });

$(function () {
    $('#postnow').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('insert-post'); ?>",
            data: $('#jobpostdata').serialize(),
            success: function (data) {
                if (data=="Successfully Inserted data") {
                    $('#jobpostdata')[0].reset();
                    $('.alert-success').html('Job Posted Successfully').fadeIn().delay(4000).fadeOut('slow');
                }else{
                    $('.alert-danger').html('All fields are required').fadeIn().delay(4000).fadeOut('slow');
                }
                
            }
        });
     });
});
</script>