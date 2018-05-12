
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?= base_url()?>dashboard" title="ir a Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="<?= base_url()?>registrar/transporte" class="tip-bottom">Transporte</a>
    </div>


  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado de Vehiculos</h5>
            <a href="<?= base_url()?>registrar/transporte/add" class="btn btn-primary pull-right" style="margin-top: 3px;">Nuevo Registro</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tipo de Vehiculo</th>
                  <th>Capacidad de Carga</th>
                  <th>Año</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Status</th>
                  <th>Accion</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($vehiculos)): ?>
                  <?php foreach ($vehiculos as $vehiculo): ?>
                    <tr>
                      <td><?= $vehiculo->id?></td>
                      <td><?= $vehiculo->tipodevehiculo?></td>
                      <td><?= $vehiculo->tipocapacidadcarga?></td>
                      <td><?= $vehiculo->ano_fabricacion?></td>
                      <td><?= $vehiculo->marca?></td>
                      <td><?= $vehiculo->modelo?></td>
                      <td>
                        <?php if ($vehiculo->estatus == 0): ?>
                          <span class="badge  badge-important">en epera de aprobacion</span>
                        <?php else: ?>
                          <span class="badge  badge-success">activo</span>
                        <?php endif ?>
                      </td>
                      <td></td>
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
              </tbody>
            </table>
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
