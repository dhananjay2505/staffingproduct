    <script src="<?php echo base_url('assets/js/jquery-3.4.0.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/owl.carousel.js'); ?>"></script>
    
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script src="//geodata.solutions/includes/statecity.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>     -->
    <script src="<?php echo base_url('assets/js/jquery.typeahead.js'); ?>"></script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "100%";
            //document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("mySidenav").style.transition = "all 300ms ease-out";
            //document.getElementById("main").style.marginLeft= "0";
        }
    </script>
</body>

</html>
<!-- for state fetch accroding city -->


<script type="text/javascript">
$("#state").change(function(){

        var state = $("#state option:selected").val();
        alert(state);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url('/city-name/'); ?>",
            data: {state:state}
            success: function (data) {
                alert(data);
            }
        });

    });
</script>
<script type="text/javascript">
    $("#apply").click(function(){
        var job = $("#job_token").val();
        var emp = $("#emp_token").val();
        $.ajax({
        type: 'post',
        url: "<?php echo base_url('jobdetails/jobdetailsaplly/'); ?>",
        cache: false,
        data: {job:job, emp:emp},
        success: function (abc) {
            if (abc =="success") {
                window.location.replace("<?php echo base_url('/jobsearch/#successapply'); ?>");
            }else{

            }
            
            
        }
    });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var pageURL = $(location).attr("href");
        if (pageURL==="http://localhost/staff/jobsearch/#successapply") {
                $("#thanku").show();
                setTimeout(function() { $("#thanku").hide(); }, 2000);
                window.setTimeout(function() { window.location.href = "<?php echo base_url('/jobsearch/'); ?>"; }, 2000);
            }else{
                
            }
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $(".loader_bg").hide();
});
</script>