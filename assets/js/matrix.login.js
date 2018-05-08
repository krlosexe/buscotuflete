$(document).ready(function(){

	var login = $('#loginform');
	var recover = $('#recoverform');
	var speed = 400;

	$('#to-recover').click(function(){
		
		$("#loginform").slideUp();
		$("#recoverform").fadeIn();
	});
	$('#to-login').click(function(){
		
		$("#recoverform").hide();
		$("#loginform").fadeIn();
	});


	$('#to-create').click(function(){
		$("#loginform").slideUp();
		$("#formcreate").fadeIn();
	});

	$('#to-login-2').click(function(){
		
		$("#formcreate").hide();
		$("#loginform").fadeIn();
	});
	
	
	$('#to-login').click(function(){
	
	});
    
    if($.browser.msie == true && $.browser.version.slice(0,3) < 10) {
        $('input[placeholder]').each(function(){ 
       
        var input = $(this);       
       
        $(input).val(input.attr('placeholder'));
               
        $(input).focus(function(){
             if (input.val() == input.attr('placeholder')) {
                 input.val('');
             }
        });
       
        $(input).blur(function(){
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
            }
        });
    });

        
        
    }



    $("#btn-login").on("click", function(){
    	var datos = {
			"username"  : $("#username_login").val(),
			"password"  : $("#password_login").val()
		}

		$.ajax({
			type    : "GET",
			dataType: "json",
			data    : datos,
			url     : url+"auth/login",

			beforeSend: function () {
		       $('#btn-login').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
		    },

			success(data){
				if (data.success == true) {
					$.gritter.add({
						title:	'Notificacion',
						text:	data.message,
						sticky: false,
					    class_name: 'sticky-success',
					});	
					 window.location.href =url+"dashboard";
				}else{
					$.gritter.add({
						title:	'Error',
						text:	data.message,
						sticky: false
					});	
				}
			}
		}).done((data, textStatus, jqXHR) => {
		    if (jqXHR.status === 200) {
		        
		    }
	  })
	  .always(() => {
        $('#btn-login').text('Entrar').removeAttr('disabled');
      });
    })

    $("#btn-registro").on("click", function(){
    	var datos = {
			"tipo_user" : $("#tipo_user").val(),
			"username"  : $("#username").val(),
			"email"     : $("#email").val(),
			"password"  : $("#password").val()
		}

		$.ajax({
			type    : "GET",
			dataType: "json",
			data    : datos,
			url     : url+"auth/store",

			beforeSend: function () {
		       $('#btn-registro').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
		    },

			success(data){
				if (data.success == true) {
					$.gritter.add({
						title:	'Notificacion',
						text:	data.message,
						sticky: false,
					    class_name: 'sticky-success',
					});	
					window.location.href =url+"dashboard";
				}else{
					$.gritter.add({
						title:	'Error',
						text:	data.message,
						sticky: false
					});	
				}
			}
		}).done((data, textStatus, jqXHR) => {
		    if (jqXHR.status === 200) {
		        
		    }
	  })
	  .always(() => {
        $('#btn-registro').text('Registrarme').removeAttr('disabled');
      });
    })
});