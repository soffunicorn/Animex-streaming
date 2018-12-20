<section id="inicio-perfil">
<div class="container">
   <div class="bgi" style="background-image:url('<?=base_url();?>plantilla/perfil/assets/img/bgi.jpg');">
      <?php if($user->foto==''){ ?>
      <img src="<?=base_url()?>file/img/user/default.png" class="rounded-circle cic"/>
      <?php }else{ ?>
      <img src="<?=base_url().$user->foto;?>" class="rounded-circle cic"/>
      <?php } ?> 
      <h3 class="user-name"><?=$user->nickname;?></h3>
   </div>
   <nav id="second-nav" class="navbar navbar-expand-sm bg-light">
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-home fa-lg"></i>Home</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-asterisk fa-lg"></i>Dinamico</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-tv fa-lg"></i>Publicado</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>perfil/editar"><i class="fas fa-user-edit fa-lg"></i>Editar Perfil</a>
         </li>
         <li  class="nav-item">
            <a  class="nav-link" href="<?=base_url();?>perfil/salir"> <i class="fas fa-power-off fa-lg"></i>Cerrar sesión</a>
         </li>
      </ul>
      <h3  class="level">Level</h3>
   </nav>
      <div class="container">
         <div class="row">
          <div class="col-md-12">  <h3 class="titulos-perfil">Videos que te Gustaron</h3></div>
            <div class="col-md-3 space">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>
            <div class="col-md-3 space">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>
            <div class="col-md-3 space">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>
            <div class="col-md-3 space">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>

            <div class="col-md-12"><h3 class="titulos-perfil">Recomendados para ti</h3></div>
            <div class="col-md-3 space">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>
            <div class="col-md-3 space">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>
            <div class="col-md-3 space">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>
            <div class="col-md-3 space">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>
            <div class="col-md-12"><h3 class="titulos-perfil">Lo mas visto de la semana</h3></div>
              <div class="col-md-3 space">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>
            <div class="col-md-3 space ">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>
            <div class="col-md-3 space">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>
            <div class="col-md-3 space">
               <img src="<?=base_url();?>plantilla/perfil/assets/img/1032.jpg" class="img-fluid">
            </div>
         </div>
      </div>
</div>
</section>
