
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?= base_url()?>dashboard" title="ir a Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="<?= base_url()?>registrar/transporte" class="tip-bottom">Transporte</a>
      <a href="<?= base_url()?>registrar/transporte/add" class="tip-bottom">Registrar</a>
    </div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Solicitud de Transporte</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?= base_url()?>registrar/transporte/store" class="form-horizontal"  name="formFoto" method="POST" enctype="multipart/form-data">
              <?php if($this->session->flashdata('error')): ?>
                 <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
                    <?=  $this->session->flashdata('error'); ?>
                  </div>
              <?php endif; ?>

              <?php if($this->session->flashdata('valid')): ?>
                 <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
                    <?=  $this->session->flashdata('valid'); ?>
                  </div>
              <?php endif; ?>
              <div class="control-group">
                <label class="control-label">Tipo de Vehiculo :</label>
                <div class="controls">
                 <select class="span6" name="id_tipo_vehiculo" id="id_tipo_vehiculo">
                  <option value="">Seleccione..</option>
                 	<?php foreach ($type_vehiculos as $value): ?>
                 		<option value="<?= $value->id?>"><?= $value->descripcion?></option>
                 	<?php endforeach ?>
                 </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Tipo de Capacidad :</label>
                <div class="controls">
                 <select class="span6" name="id_tipo_capacidad_carga" id="id_tipo_capacidad_carga">
                  <option value="">Seleccione..</option>
                 	<?php foreach ($type_capacidad as $value): ?>
                 		<option value="<?= $value->id?>"><?= $value->descripcion?></option>
                 	<?php endforeach ?>
                 </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Año de fabricacion:</label>
                <div class="controls">
                  <input type="number" name="ano_fabricacion" class="span11" id="ano_fabricacion" value="<?= set_value("ano_fabricacion")?>" >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Marca:</label>
                <div class="controls">
                  <input type="text" name="marca" class="span11" id="marca" value="<?= set_value("marca")?>" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Modelo:</label>
                <div class="controls">
                  <input type="text" name="modelo" class="span11" id="modelo" value="<?= set_value("modelo")?>" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Permiso de Circulacion:</label>
                <div class="controls">
                  <input type="file" name="permiso_circulacion" class="span11" id="permiso_circulacion" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Revicion tecnica:</label>
                <div class="controls">
                  <input type="file" name="revision_tecnica" class="span11" id="revision_tecnica" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Seguro obligatorio:</label>
                <div class="controls">
                  <input type="file" name="seguro_obligatorio" class="span11" id="seguro_obligatorio" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">licencia de conducir:</label>
                <div class="controls">
                  <input type="file" name="licencia_conducir" class="span11" id="licencia_conducir" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Cedula de identidad:</label>
                <div class="controls">
                  <input type="file" name="cedula_identidad" class="span11" id="cedula_identidad" >
                </div>
              </div>

              <div class="form-actions">
                <button type="submit" id="btn-registrarss" class="btn btn-success">Registrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> 
  </div>
</div>


<script>
  $("#btn-registrar").on("click", function(){
    var datos = {
  		"id_tipo_vehiculo"        : $("#id_tipo_vehiculo").val(),
  		"id_tipo_capacidad_carga" : $("#id_tipo_capacidad_carga").val(),
  		"ano_fabricacion"         : $("#ano_fabricacion").val(),
      "marca"                   : $("#marca").val(),
      "modelo"                  : $("#modelo").val(),
      "permiso_circulacion"     : $("#permiso_circulacion").val(),
      "revision_tecnica"        : $("#revision_tecnica").val(),
      "seguro_obligatorio"      : $("#seguro_obligatorio").val(),
      "licencia_conducir"       : $("#licencia_conducir").val(),
      "cedula_identidad"        : $("#cedula_identidad").val()
	}


    $.ajax({
      type    : "GET",
      dataType: "json",
      data    : datos,
      url     : "<?= base_url()?>registrar/transporte/store",
      beforeSend: function () {
           $('#btn-registrar').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
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

          setTimeout(function(){
              location.href="<?= base_url()?>registrar/transporte/";
            }, 3000);
        }
      }

    }).done((data, textStatus, jqXHR) => {
      if (jqXHR.status === 200) {
      }

    })
    .always(() => {
        $('#btn-registrar').text('Registrar').removeAttr('disabled');
      });
    //console.log(datos);
  })
</script>
