
$(document).ready(function() {
	  $("#myform").submit(function(e){

      e.preventDefault();

      var firstname = $("input[name='firstname']").val();

      var lastname = $("input[name='lastname']").val();


      $.ajax({

          url: $(this).closest('form').attr('action'),

          type:$(this).closest('form').attr('method'),

          dataType: "json",

          data: {name:name, email:email, message:message},

          success: function(data) {

              if($.isEmptyObject(data.error)){

                $(".alert-danger").css('display','none');

                alert(data.success);

              }else{

                $(".alert-danger").css('display','block');

                $(".alert-danger").html(data.error);

              }

          }

      });

  });
});
