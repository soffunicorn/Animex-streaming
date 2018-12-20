<section id="editarPerfil">
   <div class="container">
      <div class="row">
       <div class="col-md-12"> <h2 class="welcome">Bienvenido al area donde podras editar tu perfil y personalizarlo a tu gusto</h2>
         <h3 class="user-titulo">Nombre de Usuario: <?=$user->nombre;?></h3>

            <button type="submit" class="salir btn" onclick="salir()">Salir</button>
       </div>
         <div class="col-md-5">
            <!-- Nav pills -->
            <ul class="nav nav-pills  flex-column">
               <li class="nav-item">
                  <a class="n-Pill " data-toggle="pill" href="#home">
                     <h3 class="subt-editar">Perfil<i class="fas fa-user fa-lg"></i></i></h3>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="n-Pill" data-toggle="pill" href="#menu1">
                     <h3 class="subt-editar">Datos Personales <i class="fas fa-users-cog fa-lg"></i></h3>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="n-Pill" data-toggle="pill" href="#menu2">
                     <h3 class="subt-editar">Datos de Seguridad <i class="fas fa-user-lock fa-lg"></i></h3>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="n-Pill" data-toggle="pill" href="#menu3">
                     <h3 class="subt-editar">Cambiar Nickname <i class="fas fa-user-check fa-lg"></i></h3>
                  </a>
               </li>
            </ul>
         </div>
         <div class="col-md-7">
            <!-- Tab panes -->
            <div class="tab-content">
               <!-- First-->
               <div class="tab-pane container active" id="home">
                  <?php if($user->foto==''){ ?>
                  <img src="<?=base_url()?>file/img/user/default.png" class="rounded-circle change-p mx-auto d-block"/>
                  <?php }else{ ?>
                  <img src="<?=base_url().$user->foto;?>" class="change-p" style="width:100%"/>
                  <?php } ?> 
                  <div class="col-md-12"><button type="button" class="btn btn-cargar mx-auto d-block" id="mostrarm">
                     Cambiar Imagen
                     </button>
                  </div>
                  <!--Modal-->
                  <div class="modal" id="miimagen">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <!-- Modal body -->
                           <form id="change-img">
                              <div class="modal-body">
                                 <input type="file" name="imagen" id="imagen" class="form-control" required=""> 
                                 <input type="hidden" name="id" id="id" value="<?=$user->id;?>" />
                                  <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />  
                              </div>
                           
                           <!-- Modal footer -->
                           <div class="modal-footer">
                            <button type="submit" name="enviar" class="btn btn-info">Subir imagen</button>
                              </form> 
                              <button type="reset" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--second-->
               <div class="tab-pane container fade" id="menu1">
                  <h3 class="subt-editar" style="padding:0;">Datos Personales <i class="fas fa-users-cog fa-lg"></i></h3>
                
                  <form id="Form-cambio">
                     <div class="form-group twice">
                        <label for="usr">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="name" value="<?=$user->nombre;?>">
                     </div>
                     <div class="form-group twice">
                        <label for="pwd">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?=$user->apellido;?>">
                     </div>
                     <div class="form-group">
                        <label for="pwd">Email:</label>
                        <input type="Email" class="form-control" id="mail" name="mail"  value="<?=$user->mail;?>"  required="">
                     </div>
                     <div class="form-group">
                        <label for="pwd">Sexo:</label>
                        <div class="form-group">
                           <select class="form-control" id="sexo" name="sexo" required="">
                            <?php if ($user->sexo == 'M'): ?>
                              <option value="M">Masculino</option>
                              <option value="F">Femenino</option>
                                <?php elseif($user->sexo == 'F'): ?>
                              <option value="F">Femenino</option>
                              <option value="M">Masculino</option>
                              <?php endif ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="pwd">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="nacimiento" value="<?=$user->nacimiento;?>">
                     </div>
                     <button  type="submit" class="btn btn-cargar mx-auto d-block">Enviar</button>
                  </form>
                  <div class="col-md-12" id="resultado" style="margin-top:15px;"></div>
               </div>
            
            <!--third-->
            <div class="tab-pane container fade" id="menu2">
               <h3 class="subt-editar">Datos de Seguridad <i class="fas fa-user-lock fa-lg"></i></h3>
                    <form id="security">
               <div class="form-group">
                  <label for="pwd">Nueva Contraseña</label>
                  <input type="password" class="form-control" id="change-pass" name="change-pass" >
               </div>
               <div class="form-group">
                  <label for="pwd">Confirmar Contraseña</label>
                  <input type="password" class="form-control" id="confirm-pass" name="confirm-pass">
               </div>
                 <input type="hidden" name="id" id="id" value="<?=$user->id;?>" />
                            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                  <button type="button" class="btn btn-cargar mx-auto d-block">
                     Enviar 
                     </button>
                   </form>
            </div>
            <!--Final del tercero-->
            <div class="tab-pane container fade" id="menu3">
               <h3 class="subt-editar">Aqui podrás escoger tú nickname que aparecera en tu perfil y en las interacciones que hagas con tus series preferidas.</h3>
               <form id="nickname">
                       <div class="form-group">
                <label for="pwd">Nickname</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" required="">
                          <input type="hidden" name="id" id="id" value="<?=$user->id;?>" />
                            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                      </div>
                    

                                <button type="submit" class="btn btn-cargar mx-auto d-block">
                     Guardar
                     </button>
                      <div class="col-md-12" id="resultado3"></div>
                     </form>
                   </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
<script>
   $(document).ready(function(){
      $("#mostrarm").click(function(){
          $("#miimagen").show();
      });
      $("#close").click(function(){
          $("#miimagen").hide();
      });
   });
   
   jQuery(document).ready(function(){
   
        jQuery("#Form-cambio").submit(function(event) {
           event.preventDefault();
           
           var msj = '1';
           //validaciones con js
           
          if (msj === "1") {
           var formData = new FormData(jQuery('#Form-cambio') [0]);
           jQuery.ajax({
             url: '<?=base_url();?>user/editar_usuario',
             type: 'POST',
             contentType: false,
             processData: false,
             dataType: 'json',
             data: formData,
             beforeSend: function() {
               $("#resultado").html('<div class="alert alert-success">Procesando...</div>');
             }
           })
           .done(function(data, textStatus, jqXHR) {
              var getData = jqXHR.responseJSON; // dejar esta linea
             if(data.status=='ok'){
              $("#resultado").html('<div class="alert alert-success">'+data.code+'</div>');
               window.location.href ='<?=base_url();?>/panel/user';
             }else{
             $("#resultado").html('<div class="alert alert-danger"><strong>ERROR!</strong>'+data.error+'</div>');
             }
           })
           .fail(function(jqXHR, textStatus, errorThrown) {
             var getErr = jqXHR.responseText;
             
             console.log(getErr);
     
           })
            // Fin de ajax
            } else {
                swal("¡Error! ", msj, "error");
            }
        });
   
        jQuery("#change-img").submit(function(event) {
           event.preventDefault();
           var msj = '1';
          //validaciones con js
          
         if (msj === "1") {
          var formData = new FormData(jQuery('#change-img') [0]);
          jQuery.ajax({
            url: '<?=base_url();?>user/editar_img',
            type: 'POST',
            contentType: false,
            processData: false,
            dataType: 'json',
            data: formData,
            beforeSend: function() {
              $("#resultado2").html('<div class="alert alert-success">Procesando...!</div>');
            }
          })
          .done(function(data, textStatus, jqXHR) {
             var getData = jqXHR.responseJSON; // dejar esta linea
            if(data.status=='ok'){
             $("#resultado2").html('<div class="alert alert-success">'+data.code+'</div>');
             window.location.href ='<?=base_url();?>perfil/editar<?=$user->id;?>';
            }else{
            $("#resultado2").html('<div class="alert alert-danger"><strong>ERROR!</strong>'+data.error+'</div>');
            }
          })
                .fail(function(jqXHR, textStatus, errorThrown) {
                  var getErr = jqXHR.responseText;
                  
                  console.log(getErr);
          
                })
           // Fin de ajax
           } else {
               swal("¡Error! ", msj, "error");
           }
         });
   });
   
   //Para el nickname
    jQuery("#nickname").submit(function(event) {
         event.preventDefault();
         var msj = '1';
        //validaciones con js
        
       if (msj === "1") {
        var formData = new FormData(jQuery('#nickname') [0]);
        jQuery.ajax({
          url: '<?=base_url();?>user/editar_nick',
          type: 'POST',
          contentType: false,
          processData: false,
          dataType: 'json',
          data: formData,
          beforeSend: function() {
            $("#resultado3").html('<div class="alert alert-success">Procesando...!</div>');
          }
        })
        .done(function(data, textStatus, jqXHR) {
           var getData = jqXHR.responseJSON; // dejar esta linea
          if(data.status=='ok'){
           $("#resultado3").html('<div class="alert alert-success">'+data.code+'</div>');
           window.location.href ='<?=base_url();?>perfil/index';
          }else{
          $("#resultado3").html('<div class="alert alert-danger"><strong>ERROR!</strong>'+data.error+'</div>');
          }
        })
              .fail(function(jqXHR, textStatus, errorThrown) {
                var getErr = jqXHR.responseText;
                
                console.log(getErr);
        
              })
         // Fin de ajax
         } else {
             swal("¡Error! ", msj, "error");
         }
       });
   function salir(){
      window.location.href ='<?=base_url();?>perfil/index';
   }
   

</script>
