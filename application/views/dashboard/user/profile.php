
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?= base_url()?>dashboard" title="ir a Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="<?= base_url()?>/user/profile" title="ir a Perfil" class="tip-bottom">Perfil</a>
    </div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Datos Personales</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Primer Nombre :</label>
                <div class="controls">
                  <input type="text" class="span11"  id="name1" value="<?= $user->p_nombre?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Segundo Nombre:</label>
                <div class="controls">
                  <input type="text" class="span11" id="name2" value="<?= $user->s_nombre?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Primer Apellido: </label>
                <div class="controls">
                  <input type="text" class="span11"  id="lastname1"  value="<?= $user->p_apellido?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Segundo Apellido :</label>
                <div class="controls">
                  <input type="text" class="span11" id="lastname2" value="<?= $user->s_apellido?>" >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tipo de documento:</label>
                  <div class="controls">
                    <select  class="span6" id="type_document">
                      <option value="">Seleccione</option>
                      <?php foreach ($type_documents as $value): ?>

                        <option value="<?= $value->id?>" <?= $value->id == $user->id_identidad ? 'selected' : ''?>><?=$value->nombre?></option>

                      <?php endforeach ?>
                    </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Numero de Documento :</label>
                <div class="controls">
                  <input type="text" class="span11" id="num_document" value="<?= $user->identidad?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Serie :</label>
                <div class="controls">
                  <input type="text" class="span11" id="serie" disabled value="<?= $user->serie?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Fecha de Nacimiento :</label>
                <div class="controls controls-row">
                  <input type="number" placeholder="Dia" id="dia" class="span3" value="<?= $user->dia_nac?>">
                  <input type="number" placeholder="Mes" id="mes" class="span4" value="<?= $user->mes_nac?>">
                  <input type="number" placeholder="Año" id="anio" class="span4" value="<?= $user->ano_nac?>">
                </div>
              </div>

              <div class="form-actions">
                <button type="submit" id="btn-personales" class="btn btn-success">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>


      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Datos de Contacto</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Correo Electronico :</label>
                <div class="controls">
                  <input type="text" class="span11"  id="email" value="<?= $user->email?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Telefono Residencial:</label>
                <div class="controls">
                  <input type="text" class="span11" id="telefono_casa" value="<?= $user->telefono?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Telefono Movil: </label>
                <div class="controls">
                  <input type="text" class="span11"  id="phone"  value="<?= $user->celular?>">
                </div>
              </div>


              <div class="form-actions">
                <button type="submit" id="btn-contacto" class="btn btn-success">Guardar</button>
              </div>
            </form>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Direccion</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Regiones :</label>
                <div class="controls">
                  <select class="span11" id="provincias">
                    <option value="">Seleccione</option>
                    <?php foreach ($provincias as $value): ?>
                      <option value="<?= $value->id ?>" <?= $user->id_region == $value->id ? 'selected': ''?>><?=$value->descripcion?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Comuna :</label>
                <div class="controls">
                  <select class="span11" id="comunas" disabled>
                    <option value="">Seleccione</option>
                    <?php if ($user->id_region != 0): ?>
                      <?php foreach ($comunas as $value): ?>
                        <?php if ($value->id == $user->id_comuna): ?>
                          <option value="<?= $user->id_comuna ?>" selected><?= $value->descripcion?></option>
                        <?php endif ?>
                      <?php endforeach ?>
                    <?php endif ?>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Direccion: </label>
                <div class="controls">
                 <textarea id="direccion"><?= $user->direccion?></textarea>
                </div>
              </div>


              <div class="form-actions">
                <button type="submit" id="btn-location" class="btn btn-success">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> 
  </div>
</div>


<script>
  $("#type_document").on("change", function(){
    var id_select = $("#type_document").val();
    if (id_select == 2) {
      $("#serie").removeAttr("disabled");
    }else{
      $("#serie").attr("disabled", "disabled").val("");
    }
  });
</script>


<script>
  $("#btn-personales").on("click", function(){
    var datos = {
      "name1"         : $("#name1").val(),
      "name2"         : $("#name2").val(),
      "lastname1"     : $("#lastname1").val(),
      "lastname2"     : $("#lastname2").val(),
      "type_document" : $("#type_document").val(),
      "num_document"  : $("#num_document").val(),
      "serie"         : $("#serie").val(),
      "dia"           : $("#dia").val(),
      "mes"           : $("#mes").val(),
      "anio"          : $("#anio").val()
    }


    $.ajax({
      type    : "GET",
      dataType: "json",
      data    : datos,
      url     : "<?= base_url()?>user/profile/updatePerfilPersonales",
      beforeSend: function () {
           $('#btn-personales').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
        },
      success(data){
        if (data.success == false) {
          var campos = data.campos;
          console.log(campos)
          $.each(campos, function(i, item) {
            if (item != "") {
              var id = "#"+i;
              var cont = $(id).parent().parent().addClass("error");
              $(id).parent().children("span").remove();
              cont = $(id).parent().append(item);
            }else{
              var id = "#"+i;
              var cont = $(id).parent().removeClass("has-error");
              $(id).parent().children("span").remove();
            }
         });
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
        $('#btn-personales').text('Actualizar').removeAttr('disabled');
      });
    //console.log(datos);
  })
</script>


<script>
  $("#btn-contacto").on("click", function(){
    var datos = {
      "email"         : $("#email").val(),
      "telefono_casa" : $("#telefono_casa").val(),
      "phone"       : $("#phone").val()

    }

    $.ajax({
      type    : "GET",
      dataType: "json",
      data    : datos,
      url     : "<?= base_url()?>user/profile/updatePerfilContacto",
      beforeSend: function () {
           $('#btn-contacto').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
        },
      success(data){
        if (data.success == false) {
          var campos = data.campos;
          console.log(campos)
          $.each(campos, function(i, item) {
            if (item != "") {
              var id = "#"+i;
              var cont = $(id).parent().parent().addClass("error");
              $(id).parent().children("span").remove();
              cont = $(id).parent().append(item);
            }else{
              var id = "#"+i;
              var cont = $(id).parent().removeClass("has-error");
              $(id).parent().children("span").remove();
            }
         });
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
        $('#btn-contacto').text('Actualizar').removeAttr('disabled');
      });
    //console.log(datos);
  })
</script>



<script>
      $("#provincias").on("change", function(){
        $('#comunas option').remove();
        var datos = {
          "id" : this.value
        }
        $.ajax({
          type    : "get",
          dataType: "json",
          data    : datos,
          url     : "<?= base_url()?>user/profile/getComunas",
          beforeSend: function () {
              // $('#btn-contacto').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
          },

          success(data){
            var campos = data;

            $('#comunas').removeAttr('disabled');
            if (data.length > 0) {
              $('#comunas').append($('<option>',
               {
                  value: "",
                  text : "Seleccione..."

              }));

              $.each(campos, function(i, item){
                $('#comunas').append($('<option>',
               {
                  value: item.id,
                  text : item.descripcion 

                }));
              });
            }else{
              $('#comunas').append($('<option>',
               {
                  value: 0,
                  text : "No Aplica"

                }));
            }
            
          }
        })
      });
</script>



<script>
  $("#btn-location").on("click", function(){
    var datos = {
      "provincias" : $("#provincias").val(),
      "comunas"    : $("#comunas").val(),
      "direccion"  : $("#direccion").val()
    }

    $.ajax({
      type    : "GET",
      dataType: "json",
      data    : datos,
      url     : "<?= base_url()?>user/profile/updatePerfillocation",
      beforeSend: function () {
           $('#btn-location').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
        },
      success(data){
        if (data.success == false) {
          var campos = data.campos;
          console.log(campos)
          $.each(campos, function(i, item) {
            if (item != "") {
              var id = "#"+i;
              var cont = $(id).parent().parent().addClass("error");
              $(id).parent().children("span").remove();
              cont = $(id).parent().append(item);
            }else{
              var id = "#"+i;
              var cont = $(id).parent().removeClass("has-error");
              $(id).parent().children("span").remove();
            }
         });
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
        $('#btn-location').text('Actualizar').removeAttr('disabled');
      });
    //console.log(datos);
  })
</script>
