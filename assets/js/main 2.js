$(document).ready(function () {
    _bindhome_slider();
    _bindService_Post();
    _bindSend_Post();
});

function _bindSend_Post(){
    $( function() {
        //$( "#datepicker" ).datepicker();
        var date = $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();
    } );

}

//== Featured Car Slider ==============
function _bindhome_slider() {
    var offerslider = $('#home_slider');
    offerslider.owlCarousel({
        //center: true,
        items: 1,
        autoplay: false,
        loop: false,
        nav: true,
        margin: 0,
        dots: false,
        autoplayHoverPause: true,
        responsive: {
            680: {
                items: 1,
                singleItem: true
            },
            1268: {
                //items: 3
                items: 1,
                singleItem: true
            }
        }
    });
}

//Service Page Send User data to Service Lead Table
function _bindService_Post(){
    $('#form_register').parsley().on('field:validated', function() {
        var ok = $('.parsley-error').length === 0;
        $('.bs-callout-info').toggleClass('hidden', !ok);
        $('.bs-callout-warning').toggleClass('hidden', ok);
    })
    .on('form:submit', function() {
        //return false; // Don't submit form for this demo
        //alert('hello');
        event.preventDefault();
        $.ajax({
            url : "lead/service_post.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage){
                $('#message').text(strMessage);
                $(".service_lead")[0].reset();
            }

        })
        // $('.bs-callout-info').toggleClass('hidden', !ok);
    });

}
