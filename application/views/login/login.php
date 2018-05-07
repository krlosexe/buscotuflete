 <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="http://www.wrappixel.com/demos/free-admin-templates/matrix-admin/index.html">
				 <div class="control-group normal_text"> <h3><img src="<?= base_url()?>assets/img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Olvido su contraseña?</a></span>
                    <span class="pull-right"><a type="submit" href="index.html" class="btn btn-success" /> Entrar</a></span>
                </div>

                <div class="form-actions">
                   <a href="#" class="flip-link btn btn-success" id="to-create">Registrarme</a>
                </div>

            </form>
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Atras</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Recuperar</a></span>
                </div>
            </form>


             <form id="formcreate" action="#" class="form-vertical">
                <p class="normal_text">Registre sus datos de acceso</p>
                    <div class="control-group">
                      <div class="controls">
                        <div class="main_input_box">
                            <select id="tipo_user">
                              <option value="">Tipo de Usuario</option>
                              <option value="2">Cliente</option>
                              <option value="3">Transporte</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Nombre de Usuario" id="username" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_lg"><i class="icon-envelope"> </i></span><input type="email" placeholder="Email" id="email" />
                            </div>
                        </div>
                    </div>

                    
                    <div class="control-group">
                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Contraseña" id="password" />
                            </div>
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login-2">&laquo; Atras</a></span>
                    <span class="pull-right"><a class="btn btn-info" id="btn-registro" />Registrarme</a></span>
                </div>
            </form>
        </div>




    <script>
        var url = "<?= base_url()?>";
    </script>