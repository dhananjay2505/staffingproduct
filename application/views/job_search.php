<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('inc/header');
error_reporting(0);
ini_set('display_errors', 0);
if ($this->session->userdata('user_type') == 2) {
    redirect('/login/');
}
?>


<style type="text/css">
    #thanku{
        display: none;
    }
    .box
     {
      width:100%;
      max-width: 650px;
      margin:0 auto;
     }
</style>
<ul class="filterSticky mobile_view">
    <li>
        <a href="">
            <span class="icon-sort-1 icon_set"></span>
            Sort
        </a>
    </li>
    <li>
        <a href="" data-toggle="modal" data-target="#filter">
            <span class="icon-filter icon_set"></span>
            <span class="count">2</span>
            Filter
        </a>
    </li>
    
</ul>



<div class="container main_wrapper">
<div class="col-md-4 float-left col-12">

<div class="sidebar mt_20 desktop_view float-left">

    <span class="section_divider"></span>
    <div class="col-12 col-md-12 float-left mt_20">
        <div class="js-result-container"></div>

        <form action="<?php echo base_url("jobsearch/search/"); ?>">
            <div class="typeahead__container">
                <div class="typeahead__field">
                    <div class="typeahead__query">
                        <input class="js-typeahead"
                               name="q"
                               autofocus
                               autocomplete="off">
                    </div>
                    <div class="typeahead__button">
                        <button type="submit">
                            <span class="typeahead__search-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div> 

    <div class="accordion" id="accordionExample">

        <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Location
            </button>
        </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <ul class="check_list">
                <?php 
                if (is_array($locationdata)) {
                    $count = 1;
                    foreach ($locationdata as $location) {
                        ?>
                        <li>
                            <div class="form-check check_list">
                                <input class="form-check-input common_selector state" type="checkbox" value="<?php echo $location->job_location; ?>" id="ch_a<?php echo $count; ?>">
                                <label class="form-check-label" for="ch_a<?php echo $count; ?>">
                                    <?php echo $location->job_location; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                        $count++;
                    }
                }
                
                 ?>
            </ul>
        </div>
        </div>
    </div>

        <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            City
            </button>
            
        </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <ul class="check_list">
                <?php 
                if (is_array($state)) {
                    $count = 1;
                    foreach ($state as $statedata) {
                        ?>
                        <li>
                            <div class="form-check check_list">
                                <input class="form-check-input common_selector city" type="checkbox" value="<?php echo $statedata->Job_state; ?>" id="ch_b<?php echo $count; ?>">
                                <label class="form-check-label" for="ch_b<?php echo $count; ?>">
                                    <?php echo $statedata->Job_state; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                        $count++;
                    }
                }
                
                 ?>
            </ul>
        </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Experience
            </button>
            
        </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <ul class="check_list">
                <?php 
                if (is_array($expreince)) {
                    $count = 1;
                    foreach ($expreince as $expreinces) {
                        ?>
                        <li>
                            <div class="form-check check_list">
                                <input class="form-check-input common_selector expreinces" type="checkbox" value="<?php echo $expreinces->experience; ?>" id="ch_c<?php echo $count; ?>">
                                <label class="form-check-label" for="ch_c<?php echo $count; ?>">
                                    <?php echo $expreinces->experience; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                    $count++;
                    }
                }
                
                 ?>
            </ul>
        </div>
        </div>
    </div>

    <!-- for job type section  -->

    <div class="card">
        <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            Jobs by Industry
            </button>
        </h2>
        </div>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
        <ul class="check_list">
            <?php 
                if (is_array($job_type)) {
                    $count = 1;
                    foreach ($job_type as $job_types) {
                        ?>
                        <li>
                            <div class="form-check check_list">
                                <input class="form-check-input common_selector job_type" type="checkbox" value="<?php echo $job_types->job_type; ?>" id="ch_t<?php echo $count; ?>">
                                <label class="form-check-label" for="ch_t<?php echo $count; ?>">
                                    <?php echo $job_types->job_type; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                    $count++;
                    }
                }
                
                 ?>
            </ul>
        </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            Jobs by Industry
            </button>
        </h2>
        </div>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
        <ul class="check_list">
            <?php 
                if (is_array($business)) {
                    $count = 1;
                    foreach ($business as $job_typedata) {
                        ?>
                        <li>
                            <div class="form-check check_list">
                                <input class="form-check-input common_selector industry" type="checkbox" value="<?php echo $job_typedata->business_type; ?>" id="ch_d<?php echo $count; ?>">
                                <label class="form-check-label" for="ch_d<?php echo $count; ?>">
                                    <?php echo $job_typedata->business_type; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                    $count++;
                    }
                }
                
                 ?>
            </ul>
        </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Salary
            </button>
        </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <ul class="check_list">
                <li>
                    <div class="form-check check_list">
                        <input type="hidden" id="hidden_minimum_price" value="0" />
                        <input type="hidden" id="hidden_maximum_price" value="1000000" />
                        <p id="price_show">0 - 10,00,000</p>
                        <div id="salary_range"></div>
                
                    </div>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>
    

</div>
</div> <!-- ===  OL_MD 4 right side section end here ========== -->
    <div class="col-md-8 float-left col-12 no-padding">
        <div class="wrapper">

            <div class="w-100 float-left desktop_view">
                <h1 class="font_14 pt_20 float-left count">  number of job </h1>    
                <!-- <div class="dropdown float-right">
                    <a class="btn btn-secondary dropdown-toggle" id="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort by: Type
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item sortby" class="common_selector Relevance" href="#">Relevance</a>
                        <a class="dropdown-item sortby" class="common_selector Recently" href="#">Recently</a>
                        <a class="dropdown-item sortby" class="common_selector last7" href="#">Last 7 days</a>
                        <a class="dropdown-item sortby" class="common_selector last30" href="#">Last 30 days</a>
                    </div>
                </div> -->
            </div>
            
            <div class="media common_box pb_10 mb_20" id="thanku">
                <img src="<?php echo base_url('assets/images/thankyou_tick.svg'); ?>" class="mr-3 mt_20" alt="...">
                <div class="media-body">
                    <h5 class="font_16 bold">You have successfully applied to this job</h5>
                    <p class="font_14 grey">
                    Our expert will match your profile based on your experiance and others details. We will get back to you shortly forther details.
                    </p>
                    
                </div>
            </div>
        
            <ul class="jobs filter_data"></ul>

            
                <nav aria-label="Page navigation example" id="pagination_link">

                </nav>

        


        </div>
    </div><!-- ====  COL_MD 8 right side section end here ========== -->
    
</div>



<!-- ========================================================================
-----------================  2nd Modal================================================-->
<!-- Modal -->
<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="section_title" id="exampleModalLabel">Filter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding:0;overflow: hidden; overflow-y: scroll;">

      <div class="accordion" id="accordionExample">
        <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Location
            </button>
        </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <ul class="check_list">
                <?php 
                if (is_array($locationdata)) {
                    $count = 1;
                    foreach ($locationdata as $location) {
                        ?>
                        <li>
                            <div class="form-check check_list">
                                <input class="form-check-input common_selector state" type="checkbox" value="<?php echo $location->job_location; ?>" id="ch_5<?php echo $count; ?>">
                                <label class="form-check-label" for="ch_5<?php echo $count; ?>">
                                    <?php echo $location->job_location; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                    $count++;
                    }
                }
                
                 ?>
            </ul>
        </div>
        </div>
        </div>
        <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            City
            </button>
            
        </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <ul class="check_list">
                <?php 
                if (is_array($state)) {
                    $count = 1;
                    foreach ($state as $statedata) {
                        ?>
                        <li>
                            <div class="form-check check_list">
                                <input class="form-check-input common_selector city" type="checkbox" value="<?php echo $statedata->Job_state; ?>" id="ch_e<?php echo $count; ?>">
                                <label class="form-check-label" for="ch_e<?php echo $count; ?>">
                                    <?php echo $statedata->Job_state; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                        
                        $count++;
                    }
                }
                
                 ?>
            </ul>
        </div>
        </div>
    </div>
    

    <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Experience
            </button>
            
        </h2>
        </div>
       

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <ul class="check_list">
                <?php 
                if (is_array($expreince)) {
                    $count = 1;
                    foreach ($expreince as $expreinces) {
                        ?>
                        <li>
                            <div class="form-check check_list">
                                <input class="form-check-input common_selector expreinces" type="checkbox" value="<?php echo $expreinces->experience; ?>" id="ch_f<?php echo $count; ?>">
                                <label class="form-check-label" for="ch_f<?php echo $count; ?>">
                                    <?php echo $expreinces->experience; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                    $count++;
                    }
                }
                
                 ?>
            </ul>
        </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            Jobs by Industry
            </button>
        </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
        <ul class="check_list">
            <?php 
                if (is_array($job_type)) {
                    $count = 1;
                    foreach ($job_type as $job_typedata) {
                        ?>
                        <li>
                            <div class="form-check check_list">
                                <input class="form-check-input common_selector industry" type="checkbox" value="<?php echo $job_typedata->job_type; ?>" id="ch_g<?php echo $count; ?>">
                                <label class="form-check-label" for="ch_g<?php echo $count; ?>">
                                    <?php echo $job_typedata->job_type; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                    $count++;
                    }
                }
                
                 ?>
            </ul>
        </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Salary
            </button>
        </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <ul class="check_list">
                <li>
                    <div class="form-check check_list">
                        <input type="hidden" id="hidden_minimum_price" value="0" />
                        <input type="hidden" id="hidden_maximum_price" value="2000000" />
                        <p id="price_show">0 - 2000000</p>
                        <div id="salary_range"></div>
                
                    </div>
                </li>
            </ul>
        </div>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="applyfilter" class="btn primary_btn">Apply Filter</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('inc/footer'); ?>

<script>
$(document).ready(function(){

    filter_data(1);

    function filter_data(page)
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var search = "<?php echo $this->input->get('q'); ?>";
        var city = get_filter('city');
        var state = get_filter('state');
        var relevance = anchor_filter('Relevance');
        var expreinces = get_filter('expreinces');
        var job_type = get_filter('job_type');
        var industry = get_filter('industry');
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        $.ajax({
            url:"<?php echo base_url(); ?>Jobsearch/fetch_data/"+page,
            method:"POST",
            dataType:"JSON",
            data:{action:action, search:search, city:city, state:state, expreinces:expreinces, job_type:job_type, industry:industry, minimum_price:minimum_price, maximum_price:maximum_price},
            success:function(data)
            {
                $('.filter_data').html(data.product_list);
                $('#pagination_link').html(data.pagination_link);
                $(".count").html(data.count+" number of jobs");
            }
        });

        $("#applyfilter").click(function(){
            $.ajax({
                url:"<?php echo base_url(); ?>Jobsearch/fetch_data/"+page,
                method:"POST",
                dataType:"JSON",
                data:{action:action, search_box_data:search_box_data, city:city, state:state, expreinces:expreinces, industry:industry, minimum_price:minimum_price, maximum_price:maximum_price},
                success:function(data)
                {
                    $('.filter_data').html(data.product_list);
                    $('#pagination_link').html(data.pagination_link);
                    $(".count").html(data.count);
                    $("#filter").modal('hide');
                }
            });
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    function anchor_filter(class_name)
    {
        var filter;
        $('.'+class_name).click(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $(document).on('click', '.pagination li a', function(event){
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        filter_data(page);
    });

    $('.common_selector').click(function(){
        filter_data(1);
    });
    
    

    $('#salary_range').slider({
        range:true,
        min:0,
        max:1000000,
        values:[0,1000000],
        step:5000,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data(1);
        }

    });

});

</script>

<script type="text/javascript">
var abc = <?php $this->CI->fetch_search();  ?>;
    var data = {
            JobList: abc,
        };
typeof $.typeahead === 'function' && $.typeahead({
                input: ".js-typeahead",
                minLength: 1,
                order: "asc",
                group: true,
                maxItemPerGroup: 10,
                groupOrder: function (node, query, result, resultCount, resultCountPerGroup) {

                    var scope = this,
                        sortGroup = [];

                    for (var i in result) {
                        sortGroup.push({
                            group: i,
                            length: result[i].length
                        });
                    }

                    sortGroup.sort(
                        scope.helper.sort(
                            ["length"],
                            false, // false = desc, the most results on top
                            function (a) {
                                return a.toString().toUpperCase()
                            }
                        )
                    );

                    return $.map(sortGroup, function (val, i) {
                        return val.group
                    });
                },
                hint: true,
                href: '<?php echo base_url("jobsearch/search/?q={{display}}") ?>',
                template: "{{display}}",
                emptyTemplate: "no result for {{query}}",
                source: {
                    JobList: {
                        data: data.JobList
                    }
                },
                callback: {
                    onClickAfter: function (node, a, item, event) {
                        event.preventDefault();
                        window.open(item.href);
                        

                        $('.js-result-container').text('');

                    },
                    onResult: function (node, query, obj, objCount) {

                        var text = "";
                        if (query !== "") {
                            text = objCount + ' elements matching "' + query + '"';
                        }
                        $('.js-result-container').text(text);

                    }
                },
                debug: true
            }); 
</script>