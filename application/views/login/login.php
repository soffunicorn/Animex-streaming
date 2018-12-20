<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Iniciar sesion</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="<?=base_url();?>plantilla/login-user/css/style.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Shojumaru" rel="stylesheet"> 
   </head>
   <body>
     
         <section id="login" style="background-image:url('<?=base_url();?>plantilla/admin/images/nime.jpeg');" >
          <div class="opaco">
          <section class="padding-b">
            <header class="headerlog" >
              <div class="container">
                <div class="row">
                  <div class="col-sm-4 no-re">
                    <h3 class="portal">Tu portal de anime</h3>
                  </div>
                  <div class="col-sm-4 no-re">
                   <span class="logo navbar-text ">A</span>
                  </div>
                  <div class="col-sm-4 no-re">
                    <div class="registrar-div">
                    <a href="#" class="login-b">LOGIN</a>
                    <button class="btn btn-regi" type="submit" onclick="window.location.href='<?=base_url();?>login/registrar'">REGISTRARSE</button>
                  </div>
                </div>
                <div class="col-md-12 respon-he">   <span class="logo navbar-text pull-left">A</span>
                  <div class="registrar-div pull-right">
                    <a href="#" class="login-b">LOGIN</a>
                    <button class="btn btn-regi" type="submit" onclick="window.location.href='<?=base_url();?>login/registrar'">REGISTRARSE</button>
                  </div>
                </div>
                </div>
              </div>
            </header>
          </section>
            <div class="container loginbg">
               <div class="row">
                  <div class="col-md-12 border-bo">
                    <h1 class="saludo">Konnichi wa! 今日は</h1>
                  </div>
                 <div class="col-md-6">
                  <div class="border">
                  <h3>Entra con tu cuenta</h3>
                   <form  id="formu">
                      <div class="form-group">
                        <label for="usr">Correo</label>
                        <input type="email" class="form-control inp-wtb" id="mail" name="mail" required="">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Contraseña</label>
                        <input type="password" class="form-control inp-wtb" id="pass" name="pass" required="">
                      </div>
                      <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                     <div class="col-md-12" id="resultado" style="margin-top:15px;"></div>
                      <button class="btn btn-block btn-ingresar">Iniciar sesión</button> 
                      <p class="crear-cuento">¿No tienes cuenta? Create <a class="una" href="#">una</a></p>
                   </form>
                 </div>
                 </div>
                 <div class="col-md-6">
                   <div clas="box-login" style="padding:1em; ">
                    <span class="info-title"><h3>¿No has recibido el email de confirmación?</h3></span>
                    <p class="info-text">
                      Si ya te has registrado y no has recibido el email de confirmación para activar tu cuenta haz clic
                      <a class="una" href="https://socialani.me/confirm-email" title="Ir a ...">aquí</a></p>
                      <h3>¿Has olvidado tu contraseña?</h3>
                       <p>Si no te acuerdas de la contraseña no te preocupes, tenemos una sección para recuperarla haz clic
                      <a class="una" href="https://socialani.me/confirm-email" title="Ir a ...">aquí</a> para solicitar una nueva. 
                      <h3>¿Tienes alguna duda?</h3>
                      No te preocupes nosotros te solucionaremos cualquier duda o consulta que tengas, envianos un email <a class="una" href="https://socialani.me/confirm-email" title="Ir a ...">aquí</a> </p>
                  </div>
                 </div>

               </div>
             </div>
           </div>
           </section>
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
   </body>
</html>
