<!--Header-part-->
<div id="header">
  <h1><a href="http://wrappixel.com/demos/free-admin-templates/matrix-admin/dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido <?= $user->p_nombre." ".$user->p_apellido?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="<?= base_url()?>user/profile"><i class="icon-user"></i> Mi Perfil</a></li>
        <li class="divider"></li>
        <li><a href="<?= base_url()?>user/password"><i class="icon-lock"></i> Cambiar contraseña</a></li>
        <li class="divider"></li>
        <li><a href="<?= base_url()?>auth/loguot"><i class="icon-key"></i> Cerrar Sesion</a></li>
      </ul>
    </li>
    
    <li class=""><a title="" href="<?= base_url()?>auth/loguot"><i class="icon icon-share-alt"></i> <span class="text">Cerrar Sesion</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->