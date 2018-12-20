<!DOCTYPE html>
<html lang="en">
<head>
	 <title>Acceso de Administracción</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=base_url();?>plantilla/admin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/admin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/admin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/admin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/admin/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/admin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image:url('<?=base_url();?>plantilla/admin/images/nime.jpeg');" >
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
          <img src="<?=base_url();?>plantilla/admin/images/img-01.png" alt="IMG" id="img">
          <img src="<?=base_url();?>plantilla/admin/images/death-note.jpg" alt="IMG" id="imgr">
				</div>
        
				<form class="login100-form validate-form" id="formu">
                  <span class="login100-form-title">
                  Inicia sesion para disfrutar del mejor contenido
                  </span>
                  <form id="formu">
                  <div class="wrap-input100 validate-input" >
                     <input type="email" id="email" name="email" class="form-control input100" placeholder="Ingresar email" >
                     <span class="focus-input100"></span>
                     <span class="symbol-input100">
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                     </span>
                  </div>
                  <div class="wrap-input100 validate-input">
                     <input  type="password" id="pass" name="pass" placeholder="Clave" class="form-control input100"   />
                     <span class="focus-input100"></span>
                     <span class="symbol-input100">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                     </span>
                  </div>
                  <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                  <div class="container-login100-form-btn">
                     <button type="submit" id="enviar" name="enviar" class="btn btn-primary btn-round btn-lg btn-block login100-form-btn ">INGRESAR</button>
                     <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                      <div class="col-md-12" id="resultado" style="margin-top:15px;"></div>
                     <button type="submit" id="registrar" name="registrar" onclick="doble()" class="btn btn-primary btn-round btn-lg btn-block btn-regi ">REGISTRARSE</button>
                  </div>
                  <div class="col-md-12" id="resultado" style="margin-top:15px;"></div>
                  <div class="text-center p-t-12">
                     <span class="txt1">
                     Olvido su
                     </span>
                     <a class="txt2" href="<?=base_url();?>plantilla/admin/#">
                     Usuario / Contraseña?
                     </a>
                  </div>
               </form>
               <form id="formr" class="validate-form login100-form" >
                  <h3 class="login100-form-title ">Inicia con nosotros y no te pierdas ni una aventura más</h3>
                  <input type="text" id="nombre" name="nombre" class="form-control input100 in-t" placeholder="Nombre" required="">
                  <input type="text" id="apellido" name="apellido" class="form-control input100 in-t" placeholder="Apellido" required="">
                  <input  type="email" id="mail" name="mail" class="form-control input100 in-t" placeholder="Email" required="">
                   <input type="password" id="contrasena" name="contrasena" class="form-control input100 in-t" placeholder="Contraseña" required="">
                   <input type="date" id="fecha_n" name="fecha_n"  class="form-control input100 in-t"  required="">
                  <button type="submit" id="registrar" name="registrar" onclick="oculta()" class="btn btn-primary btn-round btn-lg btn-block btn-regi ">REGISTRARSE</button>
                </form>
               <script>
                 function doble(){
                  document.getElementById("formr").style.display="block";
                  document.getElementById("formu").style.display="none";
                  document.getElementById("img").style.display="none";
                  document.getElementById("imgr").style.display="block";
                 }
                 function oculta(){
                  document.getElementById("formr").style.display="none";
                  document.getElementById("formu").style.display="block";
                  document.getElementById("img").style.display="block";
                  document.getElementById("imgr").style.display="none";
                 }
               </script>
			</div>
		</div>
	</div>
	
  <script > //Ajax para mi form ingresar
         jQuery(document).ready(function() { //Cuando el doc se cargue, hacelas ejecuciones siguientes
               jQuery("#formu").submit(function(event) {  //Se activa el form, activa el ajax
               event.preventDefault(); 
         
             var msj = '1'; 
         //validaciones con js
         
        if (msj === "1") { //tres igual para decir que es identico
         var formData = new FormData(jQuery('#formu') [0]); //Se crea el arreglo con los datos del form
         jQuery.ajax({
           url: '<?=base_url();?>login/ingreso', // Al controlador donde van mis datos 
           type: 'POST', 
           contentType: false,
           processData: false, //Le dice que tipo de dato va a recibir
           dataType: 'json',
           data: formData,  
           beforeSend: function() {
             $("#resultado").html('<div class="alert alert-success">Procesando...!</div>');
           }
         })
         .done(function(data, textStatus, jqXHR) {
           var getData = jqXHR.responseJSON; // vguarda los errores si los hay en la ejecucion del js
         
           if(data.status=='ok'){ //ver controlador, status es el nombre la clave cuando se creo
            $("#resultado").html('<div class="alert alert-success">'+data.code+'</div>'); //controlador
             window.location.href ='<?=base_url();?>perfil'; //te manda la direccion a donde vas
           }else{
           $("#resultado").html('<div class="alert alert-danger"><strong>ERROR!</strong>'+data.error+'</div>');
           }
         })
               .fail(function(jqXHR, textStatus, errorThrown) { //Si ocurre errores el jquery
                 var getErr = jqXHR.responseText;
                 console.log(getErr);
         
               })
          // Fin de ajax
          } else {
              swal("¡Error! ", msj, "error");
          }
          });
         
         });//fin ready
      </script>

      <script > //Ajax para mi form registrar
         jQuery(document).ready(function() { //Cuando el doc se cargue, hacelas ejecuciones siguientes
               jQuery("#formr").submit(function(event) {  //Se activa el form, activa el ajax
               event.preventDefault(); 
         
             var msj = '1'; 
         //validaciones con js
         
        if (msj === "1") { //tres igual para decir que es identico
         var formData = new FormData(jQuery('#formr') [0]); //Se crea el arreglo con los datos del form
         jQuery.ajax({
           url: '<?=base_url();?>login/registrar', // Al controlador donde van mis datos y la funcion que los ejecuta
           type: 'POST', 
           contentType: false,
           processData: false, //Le dice que tipo de dato va a recibir
           dataType: 'json',
           data: formData,  
           beforeSend: function() {
             $("#resultado").html('<div class="alert alert-success">Procesando...!</div>');
           }
         })
         .done(function(data, textStatus, jqXHR) {
           var getData = jqXHR.responseJSON; // guarda los errores si los hay en la ejecucion del js
         
           if(data.status=='ok'){ //ver controlador, status es el nombre la clave cuando se creo
            $("#resultado").html('<div class="alert alert-success">'+data.code+'</div>'); //controlador
             window.location.href ='<?=base_url();?>perfil'; //te manda la direccion a donde vas
           }else{
           $("#resultado").html('<div class="alert alert-danger"><strong>ERROR!</strong>'+data.error+'</div>');
           }
         })
               .fail(function(jqXHR, textStatus, errorThrown) { //Si ocurre errores el jquery
                 var getErr = jqXHR.responseText;
                 console.log(getErr);
         
               })
          // Fin de ajax
          } else {
              swal("¡Error! ", msj, "error");
          }
          });
         
         });//fin ready
      </script>

	
<!--===============================================================================================-->	
	<script src="<?=base_url();?>plantilla/admin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>plantilla/admin/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url();?>plantilla/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>plantilla/admin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>plantilla/admin/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	  
<!--===============================================================================================-->
	<script src="<?=base_url();?>plantilla/admin/js/main.js"></script>

</body>
</html>