<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 


       
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/perfil/assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/website/css/style.css?E">
      <link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/website/css/home.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/website/css/medios.css">
      <title>Animax</title>
   </head>
   <body>
      <header id="navi-principal">
         <nav class="navbar navbar-expand-sm fixed-top">
            <div class="container-fluid">
               <div class="row" id="row-header">
                  <div class="col-3">
                     <?php  
                        if($datos->logo==''){ 
                         $var = 'plantilla/website/img/logo.png';
                         }
                         else{ 
                         $var = $datos->logo; 
                         }
                         ?>   
                     <a class="nav-link" href="<?=base_url();?>"><img src="<?=base_url().$var;?>"></a>
                  </div>
                  <div class="col-6">
                     <div id="buscar" class="ocultar">
                        <form class="form-inline" action="/action_page.php" id="buscar">
                           <div style="margin: auto;">
                              <input style="margin-right:-5px;" class="form-control input-buscar" type="text" >
                              <button class="btn btn-buscar" type="submit"><i class="fas fa-search"></i></button>
                           </div>
                        </form>
                     </div>
                     <button  id="boton-menu" class="btn" type="button" onclick="ocultar()"/>
                     <i class="fas fa-bars" style="color:#000;"></i>
                     </button>
                  </div>
                  <div class="col-3">
                     <div  id="mi-menu" class="float-right">
                        <div class="registrar-div">
                           <?php if (isset($user->id)==false) { ?>                  
                           <a  href="<?=base_url();?>login" class="login-b navbar-text">LOGIN</a>
                           <a  href='<?=base_url();?>login/registrar' class="navbar-text registrarbtn"><b>REGISTRARSE</b></a> 
                           <?php  }else{ ?>
                           <a  href="<?=base_url();?>login" class="navbar-text registrarbtn"><?php echo $user->nombre." ".$user->apellido;?></a>
                           <?php   } ?> 
                        </div>
                     </div>
                  </div>
                  <button onclick="oculta()" class="font-s btn"><i class="fas fa-search"></i></button>
               </div>
            </div>
         </nav>
      </header>
      <header id="responsivenav">
         <nav class="nav navbar fixed-top">
            <div class="navbar-header row">
            <div class="col-5 no-padding">
               <?php  
                  if($datos->logo==''){ 
                   $var = 'plantilla/website/img/logo.png';
                   }
                   else{ 
                   $var = $datos->logo; 
                   }
                   ?>   
               <a class="nav-link" href="<?=base_url();?>"><img src="<?=base_url().$var;?>"></a>
            </div>
            <div class="col-7">
               <!-- espacio para login/registrarse-->
               <div  id="mi-menu">
                  <div class="registrar-div float-right">
                     <?php if (isset($user->id)==false) { ?>                  
                     <a  href="<?=base_url();?>login" class="login-b navbar-text">LOGIN</a>
                     <a  href='<?=base_url();?>login/registrar' class="navbar-text registrarbtn"><b>REGISTRARSE</b></a> 
                     <?php  }else{ ?>
                     <a  href="<?=base_url();?>login" class="navbar-text registrarbtn"><?php echo $user->nombre." ".$user->apellido;?></a>
                     <?php   } ?> 
                  </div>
               </div>
            </div>
            <div class="col-12 no-padding">
              <div class="mx-auto d-block">
               <form class="form-inline" action="/action_page.php" id="buscar">
                  <div style="margin: auto;">
                     <input style="margin-right:-5px;display:inline;" class="form-control input-buscar input-look" type="text" >
                     <button  class="btn btn-buscar " type="submit"><i class="fas fa-search"></i></button>
                  </div>
               </form>
             </div>
            </div>
            <!-- aca -->
         </nav>
      </header>
      <!--Modal -->
      <!--DropDown-->
      <section style="margin-top:2em;" >
     