
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?= base_url()?>dashboard" title="ir a Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="<?= base_url()?>/user/password" class="tip-bottom">Cambiar contraseña</a>
    </div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Datos de Acceso</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Contraseña Actual :</label>
                <div class="controls">
                  <input type="password" class="span11"  id="pass" ">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nueva Contraseña:</label>
                <div class="controls">
                  <input type="password" class="span11" id="pass1" >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Repita la contraseña: </label>
                <div class="controls">
                  <input type="password" class="span11"  id="pass2" >
                </div>
              </div>
              

              <div class="form-actions">
                <button type="submit" id="btn-password" class="btn btn-success">Cambiar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> 
  </div>
</div>


<script>
  $("#btn-password").on("click", function(){
    var datos = {
		"pass"  : $("#pass").val(),
		"pass1" : $("#pass1").val(),
		"pass2" : $("#pass2").val()
	}


    $.ajax({
      type    : "GET",
      dataType: "json",
      data    : datos,
      url     : "<?= base_url()?>user/password/updatePass",
      beforeSend: function () {
           $('#btn-password').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
        },
      success(data){
        if (data.success == false) {

        	if (data.valid == true) {
        		  var campos = data.campos;
		          $.each(campos, function(i, item) {
		            if (item != "") {
		              var id = "#"+i;
		              var cont = $(id).parent().parent().addClass("error");
		              $(id).parent().children("span").remove();
		              cont = $(id).parent().append(item);
		            }else{
		              var id = "#"+i;
		              var cont = $(id).parent().parent().removeClass("has-error");
		              $(id).parent().children("span").remove();
		            }
		         });
        	}else{
        		$.gritter.add({
	            title:  'Notificacion',
	            text: data.message,
	            sticky: false,
	          }); 
        	}
          
        }else{
          $.gritter.add({
            title:  'Notificacion',
            text: data.message,
            sticky: false,
              class_name: 'sticky-success',
          }); 
        }
      }

    }).done((data, textStatus, jqXHR) => {
      if (jqXHR.status === 200) {
      }

    })
    .always(() => {
        $('#btn-password').text('Cambiar').removeAttr('disabled');
      });
    //console.log(datos);
  })
</script>
