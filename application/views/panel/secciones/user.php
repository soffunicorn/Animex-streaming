<!-- Content Header (Page header) -->
<section class="content-header panel-body">
   <h1>
      Editar Usuario
      <?php foreach ($user as $key) { ?>
      <small><?=$key->nombre; ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?=base_url();?>plantilla/panel/#"><i class="fa fa-dashboard"></i>Perfil</a></li>
      <li class="active">Editar Usuario</li>
   </ol>
</section>
<!-- Main content -->
<section class="content container-fluid row">
   <div class="col-md-4">
      <h4>Datos de la cuenta</h4>
      <?php if($key->foto==''){ ?>
      <img src="<?=base_url();?>plantilla/panel/dist/img/user2-160x160.jpg" class="img-responsive img-circle" alt="User Image">
      <?php }else{ ?>
      <img src="<?=base_url().$key->foto;?>" class="img-circle img-responsive" alt="User Image">
      <?php } ?>
      <div class="form-group col-md-12">
         <a href="#" class="btn  form-control" data-title="imagen" data-toggle="modal" data-target="#imagen" >Cambiar imagen</a>
      </div>
      <div class="form-group col-md-12">
         <a href="#" class="btn  form-control" data-title="nick" data-toggle="modal" data-target="#nick" >Nickname</a>
      </div>

   </div>
   <div class="col-md-8 row">
      <h4>Datos Personales</h4>
      <form id="editarUser">
         <div class="form-group col-md-6">
            <label>Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required="" placeholder="Nombre" value="<?=$key->nombre;?>">
         </div>
         <div class="form-group col-md-6">
            <label>Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required="" placeholder="Apellido" value="<?=$key->apellido;?>">
         </div>
         <div class="form-group col-md-6">
            <label>Mail:</label>
            <input type="mail" class="form-control" id="mail" name="mail" required="" placeholder="Mail" value="<?=$key->mail;?>">
         </div>
         <div class="form-group col-md-6">
            <label>Sexo:</label>
            <select  class="form-control" id="sexo" name="sexo" required="">
               <option value="M">Masculino</option>
               <option value="F">Femenino</option>
            </select>
         </div>
         <div class="form-group col-md-6">
            <label>Fecha de nacimiento:</label>
            <input type="date" class="form-control" id="nacimiento" name="nacimiento" required value="<?=$key->nacimiento;?>">
         </div>
         <div class="form-group col-md-6">
            <label>Tipo:</label>
            
            <select  class="form-control" id="tipo" name="tipo">
               <?php if ($key->tipo == '1'): ?>
               <option value="1">Admin</option>
               <option value="0">User</option>
               <?php elseif($key->tipo == '0'): ?>
               <option value="0">User</option>
               <option value="1">Admin</option>
               <?php endif ?>
            </select>
            
         </div>
         <input type="hidden" name="id" id="id" value="<?=$key->id;?>">
         <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
         <div class="col-md-12" id="resultado" style="margin-top:15px;"></div>
         <div class="form-group col-md-12">
            <hr>
            <button type="submit" class="btn btn-default btn-lg">Enviar</button>
         </div>
      </form>
   </div>
</section>
<!-- /.content -->
<!-- Modal ELIMINAR -->
<div id="imagen" class="modal fade " role="dialog">
   <div class="modal-dialog" style="margin-top:10vw;">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-body text-center">
            <form id="subir_imagen" >
               <h4>Subir imagen</h4>
               <div class="form-group">
                  <input type="file" name="imagen" id="imagen" class="form-control" required="">
                  <input type="hidden" name="id" id="id" value="<?=$key->id;?>" />
                  <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                  <div class="col-md-12" id="resultado2"></div>
               </div>
         </div>
         <div class="modal-footer">
         <button type="submit" name="enviar" class="btn btn-info">Subir imagen</button>
         <button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
         </div>
         </form>
      </div>
   </div>
</div>
</div>

<div id="nick" class="modal fade " role="dialog">
   <div class="modal-dialog" style="margin-top:10vw;">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-body text-center">
            <form id="editar_nick" >
               <h4>Nickname</h4>
               <div class="form-group">
                  <input type="text" name="nickname" id="nick" class="form-control" required="">
                  <input type="hidden" name="id" id="id" value="<?=$key->id;?>" />
                  <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                  <div class="col-md-12" id="resultado3"></div>
               </div>
         
         <div class="modal-footer">
         <button type="submit" name="enviar" class="btn btn-info">Enviar</button>
         <button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
         </div>
         </form>
      </div>
   </div>
</div>
</div>
<!-- /.content -->
<script >
   jQuery(document).ready(function() {
      jQuery("#editarUser").submit(function(event) {
         event.preventDefault();
         
         var msj = '1';
         //validaciones con js
         
        if (msj === "1") {
         var formData = new FormData(jQuery('#editarUser') [0]);
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
             window.location.href ='<?=base_url();?>/panel/usuario/<?=$key->id;?>';
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
      
      jQuery("#subir_imagen").submit(function(event) {
         event.preventDefault();
         var msj = '1';
        //validaciones con js
        
       if (msj === "1") {
        var formData = new FormData(jQuery('#subir_imagen') [0]);
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
           window.location.href ='<?=base_url();?>panel/usuario/<?=$key->id;?>';
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
      jQuery("#editar_nick").submit(function(event) {
         event.preventDefault();
         var msj = '1';
        //validaciones con js
        
       if (msj === "1") {
        var formData = new FormData(jQuery('#editar_nick') [0]);
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
           window.location.href ='<?=base_url();?>panel/usuario/<?=$key->id;?>';
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
   });//fin ready
   <?php }  ?>  
</script>
