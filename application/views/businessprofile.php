<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ($this->session->userdata('user_type') == 1) {
    redirect('/login/');
}

?>

<style>
.modal-dialog{
    max-width:66%;
}
#updatepro{
    display: none;
}

</style>
<div class="container main_wrapper">
<div class="alert alert-success" style="display: none;"></div>
<div class="common_box mt_20 float-left gradient_bg pb_30 pt_30">

<div class="profile_box">
        <?php  ?>
        <style type="text/css">
            .image-upload2 > #profileimage { display: none; }
            .image-upload2 img { width: 80px; cursor: pointer; }
        </style>
        
        <?php
        echo form_open_multipart('');?>
            <div class="image-upload2">
                <label for="profileimage" class="upload">
                    <div class="profile_img">
                        <!-- This image is default Profile Img -->
                        <img src="" id="uploadprofile" class="">
                        <!-- This image is default CAMERA Icon Img -->
                        <img src="<?php echo base_url('assets/images/camera_icon.svg'); ?>" class="camera_icon">
                        
                    </div>
                </label>
                </label><div class="cross"><span id="cross" style="color: #fff;">X</span></div>

                <input id="profileimage" type="file"/>
            </div>
        </form>
    

    <div class="profile_caption" id="profile">
        
    </div>

</div>
<div class="col-md-4 float-left col-12 pl_0">
    <div class="common_box mt_10 float-left mt_10 desktop_view float-left ">
        <span class="primery_title float-left pt_5">Quick link</span>
        <ul class="quick_link pl_0 pt_0">
            <li><a href=""> Home</a></li>
            <li><a href=""> Edit profile information</a></li>
            <li><a href=""> Post Jobs</a></li>
            <li><a href=""> Logout</a></li>
        </ul>
    </div>

</div> <!-- ===  OL_MD 4 right side section end here ========== -->
<div class="col-md-8 float-left col-12 no-padding">
    <div class="wrapper" id="profiledata">
        
    </div> <!-- End of WRAPPER Here -->
</div>
<!-- =========== End of COl MD-8  Here =============  -->
</div> <!--End of Container-->



<div class="modal fade" id="business_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="section_title" id="exampleModalLabel">Profile Information</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
            <form action="" id="businesspro">
                <div class="row">
                <div class="col-md-6 no-padding col-12">
                    <span class="primery_title w-100 float-left pl_15 mb_10">Primary Information</span>
                    <div class="col-md-12 float-left col-12 mb_20">
                        <label for="">Business name</label>
                        <input type="text" name="business_name" class="form-control" placeholder="e.g Master chef">
                    </div>
                    <div class="col-md-12 float-left col-12 mb_20">
                        <label for="">About business</label>
                        <textarea class="form-control" name="business_about" id="" rows="5"> </textarea>
                    </div>
                    <div class="col-md-12 float-left col-6 mb_20">
                        <label for="">Type of Business</label>
                        <select name="business_type" class="form-control">
                            <option selected="" disabled="" value="">Choose...</option>
                            <option value="Fast food & chain"> Fast food & chain </option>
                            <option value="Hotel and spa"> Hotel and spa </option>
                        </select>
                    </div>
                    <div class="col-md-12 float-left col-6 mb_20">
                        <label for="">Website URL</label>
                        <input type="text" name="business_website" class="form-control" placeholder="e.g www.website.com">
                    </div>
                </div><!-- COLmd 6 Colse Hew -->
                <div class="col-md-6 no-padding col-12">
                    <span class="primery_title w-100 float-left pl_15 mb_10">Others Information</span>
                    <div class="col-md-6 float-left col-6 mb_20">
                        <label for="">No of Outlet</label>
                        <input type="text" name="business_outlet" class="form-control" placeholder="No of Outlet">
                    </div>
                    <div class="col-md-6 float-left col-6 mb_20">
                        <label for="">People Working</label>
                        <input type="text" name="business_people" class="form-control" placeholder="no of people ">
                    </div>
                    <div class="col-md-12 float-left col-12 mb_20">
                        <label for="">Type of Cuisine</label>
                        <input type="text" name="business_cuissing" class="form-control" placeholder="e.g South India, Italian">
                    </div>
                    <div class="col-md-12 float-left col-12 mb_20">
                        <label for="">Address</label>
                        <input type="text" name="business_address" class="form-control" placeholder="e.g Post box no 234, Galli no 234">
                    </div>
                    <div class="col-md-6 float-left col-12 mb_20">
                        <label for="">State</label>
                        <select name="business_state" class="form-control">
                            <option selected="" disabled="" value="">Choose...</option>
                            <option value="Karnataka">Karnataka</option>
                        </select>
                    </div>
                    <div class="col-md-6 float-left col-12 mb_20">
                        <label for="">City</label>
                        <select name="business_city" class="form-control">
                            <option selected="" disabled="" value="">Choose...</option>
                            <option value="Bangalore">Bangalore</option>
                        </select>
                    </div>
                    <div class="col-md-6 float-left col-12 mb_20">
                        <label for="">Pin</label>
                        <input type="text" name="business_pin" class="form-control" placeholder="Pin Code">
                    </div>
                    <div class="col-md-6 float-left col-12 mb_20">
                        <label for="">Contact person</label>
                        <input type="text" name="business_c_person" class="form-control" placeholder="Contact Person">
                    </div>
                    <div class="col-md-12 float-left col-12 mb_20">
                        <label for="">Contact Number</label>
                        <input type="text" name="business_c_number" class="form-control" placeholder="Contact Person">
                    </div>
                    <div class="col-md-6 float-left col-6 mb_20">
                        <label for="">Operational Start</label>
                        <select name="business_operational_1" class="form-control">
                            <option selected="" disabled="" value="">Choose...</option>
                            <option value="01:00 am"> 01:00 am</option>
                            <option value="02:00 am"> 02:00 am</option>
                            <option value="03:00 am"> 03:00 am</option>
                            <option value="04:00 am"> 04:00 am</option>
                            <option value="05:00 am"> 05:00 am</option>
                            <option value="06:00 am"> 06:00 am</option>
                            <option value="07:00 am"> 07:00 am</option>
                            <option value="08:00 am"> 08:00 am</option>
                            <option value="09:00 am"> 09:00 am</option>
                            <option value="10:00 am"> 10:00 am</option>
                            <option value="11:00 am"> 11:00 am</option>
                            <option value="12:00 am"> 12:00 am</option>
                        </select>
                    </div>
                    <div class="col-md-6 float-left col-6 mb_20">
                        <label for="">End at</label>
                        <select name="business_operational_2" class="form-control">
                            <option selected="" disabled="" value="">Choose...</option>
                            <option value="01:00 pm"> 01:00 pm</option>
                            <option value="02:00 pm"> 02:00 pm</option>
                            <option value="03:00 pm"> 03:00 pm</option>
                            <option value="04:00 pm"> 04:00 pm</option>
                            <option value="05:00 pm"> 05:00 pm</option>
                            <option value="06:00 pm"> 06:00 pm</option>
                            <option value="07:00 pm"> 07:00 pm</option>
                            <option value="08:00 pm"> 08:00 pm</option>
                            <option value="09:00 pm"> 09:00 pm</option>
                            <option value="10:00 pm"> 10:00 pm</option>
                            <option value="11:00 pm"> 11:00 pm</option>
                            <option value="12:00 pm"> 12:00 pm</option>
                        </select>
                    </div>
                    <div class="col-md-12 float-left col-12 mb_20">
                        <label for="">GSTIN</label>
                        <input type="text" name="business_gst" class="form-control" placeholder="e.g 29ZAQDD7093D15Z">
                    </div>
                    <div class="col-md-12 float-left col-12 mb_20">
                        <label for="">FSSAI licence Number (optional)</label>
                        <input type="text" name="business_fssai" class="form-control" placeholder="e.g 29ZAQDD7093D15Z">
                    </div>
                    
                </div><!-- COLmd 6 Colse Hew -->
       
                </div>
                
            </form>    
    </div>
    <div class="modal-footer">

        <span id="msgdata"></span>
        <button type="submit" id="savepro" class="btn primary_btn">Save</button>
        <button type="submit" id="updatepro" class="btn primary_btn">Update</button>
    </div>
</div>
</div>
</div><!--  ================== Certicifation Start -->

<?php $this->load->view('inc/footer'); ?>


<script type="text/javascript">
$(document).ready(function(){
    $.ajax({
        url: "<?php echo base_url('/get-prifile-info/'); ?>",
        cache: false,
        type:'post',
        success: function (get) {
            $("#profile").html(get);
        }
    });
});

$(document).ready(function(){
    $.ajax({
        url: "<?php echo base_url('Businessprofile/abouusadd'); ?>",
        cache: false,
        type:'post',
        success: function (get) {
            $("#profiledata").html(get);
        }
    });
});

$(document).ready(function(){
    $.ajax({
        url: "<?php echo base_url('Businessprofile/profiletwo/'); ?>",
        cache: false,
        type:'post',
        success: function (get) {
            $("#profile").html(get);
        }
    });
});
</script>


<script type="text/javascript">
$(document).ready(function(){
    $.ajax({
        url: "<?php echo base_url('getdata-for-profile'); ?>",
        cache: false,
        type:'post',
        success: function (get) {
            $("#profiledata").html(get);
        }
    });
});
    $.ajax({
            url: "<?php echo base_url('businessprofile/profile/'); ?>",
            cache: false,
            type:'post',
            dataType: 'json',
            success: function (get) {
                $("#savepro").hide();
                $("#updatepro").show();
                $('input[name=business_name]').val(get[0].business_name);
                $('textarea[name=business_about]').html(get[0].business_about);
                $('select[name=business_type]  option[value="'+get[0].business_type+'"]').prop("selected", true);
                $('input[name=business_website]').val(get[0].business_website);
                $('input[name=business_outlet]').val(get[0].business_outlet);
                $('input[name=business_people]').val(get[0].business_people);
                $('input[name=business_cuissing]').val(get[0].business_cuissing);
                $('input[name=business_address]').val(get[0].business_address);
                $('select[name=business_state]  option[value="'+get[0].business_state+'"]').prop("selected", true);
                $('select[name=business_city]  option[value="'+get[0].business_city+'"]').prop("selected", true);
                $('input[name=business_pin]').val(get[0].business_pin);
                $('input[name=business_c_person]').val(get[0].business_c_person);
                $('input[name=business_c_number]').val(get[0].business_c_number);
                $('select[name=business_operational_1]  option[value="'+get[0].business_operational_1+'"]').prop("selected", true);
                $('select[name=business_operational_2]  option[value="'+get[0].business_operational_2+'"]').prop("selected", true);
                $('input[name=business_gst]').val(get[0].business_gst);
                $('input[name=business_fssai]').val(get[0].business_fssai);
            }
        });
</script>


<script type="text/javascript">
$(function () {
    $('#savepro').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('Businessprofile/insertbusinessprofiledata'); ?>",
            data: $('#businesspro').serialize(),
            success: function (data) {
                if (data=="Successfully Inserted data") {
                    $("#business_profile").modal('hide');
                    $('.alert-success').html('Successfully Inserted data').fadeIn().delay(4000).fadeOut('slow');
                    setTimeout(function () {
                       //Redirect with JavaScript
                       window.location.href= "<?php echo base_url('/businessprofile/'); ?>";
                    }, 1000);
                };
                
            }
        });
     });

     $('#updatepro').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('Businessprofile/updatebusiness0profiledata'); ?>",
            data: $('#businesspro').serialize(),
            success: function (data) {
                $("#business_profile").modal("hide");
                $('.alert-success').html('Updated successfully').fadeIn().delay(4000).fadeOut('slow');
                setTimeout(function () {
                       //Redirect with JavaScript
                       window.location.href= "<?php echo base_url('/businessprofile/'); ?>";
                    }, 1000);
                
            }
        });       
    });
});
</script>

<script type="text/javascript">

$(document).ready(function(){
 $(document).on('change', '#profileimage', function(){
  var name = document.getElementById("profileimage").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("profileimage").files[0]);
  var f = document.getElementById("profileimage").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("profile", document.getElementById('profileimage').files[0]);
   $.ajax({
    url:"<?php echo base_url('Businessprofile/businessprofileimage/'); ?>",
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
        
        $.ajax({
             url:'<?php echo base_url('Businessprofile/fetchbusinessprofileimage/'); ?>',
             dataType: 'json',
             
             success: function(ghk){
                
                if (ghk[0].business_logo==null) {
                    $("#uploadprofile").attr("src", "<?php echo base_url('assets/images/business_img.png'); ?>");
                    $("#cross").hide();
                }else{
                    $("#uploadprofile").attr("src", "<?php echo base_url()."uploads/"; ?>"+ghk[0].business_logo+"");
                    $("#cross").show();

                }
                
             }
             });

    }
   });
  }
 });
});

        
        /*for fetching profile fetch image*/
        $.ajax({
             url:'<?php echo base_url('Businessprofile/fetchbusinessprofileimage/'); ?>',
             dataType: 'json',
             
             success: function(ghk){
                
                if (ghk[0].business_logo==null) {
                    $("#uploadprofile").attr("src", "<?php echo base_url('assets/images/business_img.png'); ?>");
                    $("#cross").hide();
                }else{
                    $("#uploadprofile").attr("src", "<?php echo base_url()."uploads/"; ?>"+ghk[0].business_logo+"");
                    $("#cross").show();

                }
                
             }
             });


/*for profile detele*/
$(document).ready(function(){
    $("#cross").click(function(){
        var a = confirm("Do you really want to delete record?");
        if (a) {
        $.ajax({
            url:'<?php echo base_url('Businessprofile/deletebusinessprofileimage/'); ?>',
            success: function(ghk){
                $.ajax({
                 url:'<?php echo base_url('Businessprofile/fetchbusinessprofileimage/'); ?>',
                 dataType: 'json',
                 
                 success: function(ghk){
                    
                    if (ghk[0].business_logo==null) {
                        $("#uploadprofile").attr("src", "<?php echo base_url('assets/images/business_img.png'); ?>");
                        $("#cross").hide();
                    }else{
                        $("#uploadprofile").attr("src", "<?php echo base_url()."uploads/"; ?>"+ghk[0].business_logo+"");
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