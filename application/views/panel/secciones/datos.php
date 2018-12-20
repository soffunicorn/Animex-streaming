<!-- Content Header (Page header) -->
<section class="content-header panel-body">
   <script>
      $.noConflict();
      jQuery( document ).ready(function( $ ) {
          $('#grid').DataTable();
      });
      // Code that uses other library's $ can follow here.
   </script>
   <h1>
      DATOS DEL SITIO
      <small>Lista</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?=base_url();?>plantilla/panel/#"><i class="fa fa-dashboard"></i>Configuracion</a></li>
      <li class="active">Datos del sitio</li>
   </ol>
</section>
<section class="content container-fluid">
   <table class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
         <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Logo 1</th>
            <th>Logo 2</th>
            <th>Icono</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>#</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($datos as $key) { ?>
         <tr>
            <td><?=$key->nombre;?></td>
            <td><?=$key->descripcion;?></td>
            <td>
               <img src="<?=base_url().$key->logo;?>" alt="logo" style="width: 100px; height: 100px;">
               <button class="btn form-control btn-xs" data-title="Edit" data-toggle="modal" data-target="#cambiar_logo" ><span class="glyphicon glyphicon-pencil"></span> Cambiar</button>
            </td>
            <td>
               <img src="<?=base_url().$key->logo2;?>" alt="logo 2" style="width: 100px; height: 100px;">
               <button class="btn form-control btn-xs" data-title="Edit" data-toggle="modal" data-target="#cambiar_logo2" ><span class="glyphicon glyphicon-pencil"></span> Cambiar</button>
            </td>
            <td>
               <img src="<?=base_url().$key->icon;?>" alt="Icon" style="width: 100px; height: 100px;">
               <button class="btn form-control btn-xs" data-title="Edit" data-toggle="modal" data-target="#cambiar_icono" ><span class="glyphicon glyphicon-pencil"></span>Cambiar</button>
            </td>
            <td><?=$key->correo;?></td>
            <td><?=$key->telefono;?></td>
            <td>
               <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?=$key->id;?>" ><span class="glyphicon glyphicon-pencil"></span></button></p>
            </td>
            <!-- Modal Editar-->
            <div id="edit<?=$key->id;?>" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar datos</h4>
                     </div>
                     <div class="modal-body">
                        <form id="editar<?=$key->id;?>" onsubmit="realizaProceso(
                           $('#id<?=$key->id;?>').val() 
                           );return false; ">
                           <div class="row">
                              <div class="form-group col-md-4">
                                 <label>Nombre</label>
                                 <input type="text" name="nombre" id="nombre" value="<?=$key->nombre;?>" required="" class="form-control" placeholder="Nombre">
                              </div>
                              <div class="form-group col-md-4">
                                 <label>Teléfono</label>
                                 <input type="text" name="telefono" id="telefono" value="<?=$key->telefono;?>" required="" class="form-control" placeholder="Teléfono">
                              </div>
                              <div class="form-group col-md-4">
                                 <label>Correo</label>
                                 <input type="mail" name="correo" id="correo" required="" class="form-control" value="<?=$key->correo;?>" placeholder="example@example.com">
                              </div>
                              <div class="form-group col-md-12">
                                 <label>Descripción</label>
                                 <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripción..."><?=$key->descripcion;?></textarea>
                              </div>
                              <input type="hidden" name="id" id="id" value="<?=$key->id;?>">
                              <input type="hidden" name="id<?=$key->id;?>" id="id<?=$key->id;?>" value="<?=$key->id;?>">
                              <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                              <div class="col-md-12" id="resultado2<?=$key->id;?>" style="margin-top:15px;"></div>
                              <div class="col-sm-12" style="margin-top:20px;">
                                 <button class="btn btn-lg btn-block btn-primary" type="submit">
                                 Editar
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.content -->
            <!-- Modal cambiar logo1-->
            <div id="cambiar_logo" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cambiar Logo 1</h4>
                     </div>
                     <div class="modal-body">
                        <form id="cambiar_l" onsubmit="cambiar_logo();return false; ">
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <input type="file" class='form-control' name="logo" id="logo" >
                              </div>
                              <input type="hidden" name="id" id="id" value="<?=$key->id;?>">
                              <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                              <div class="col-md-12" id="resultado3" style="margin-top:15px;"></div>
                              <div class="col-sm-12" style="margin-top:20px;">
                                 <button class="btn btn-lg btn-block btn-primary" type="submit">
                                 Editar
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.content -->
            <!-- Modal cambiar logo2-->
            <div id="cambiar_logo2" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cambiar Logo 2</h4>
                     </div>
                     <div class="modal-body">
                        <form id="cambiar_l2" onsubmit="cambiar_logo2();return false; ">
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <input type="file" class='form-control' name="logo2" id="logo2" >
                              </div>
                              <input type="hidden" name="id" id="id" value="<?=$key->id;?>">
                              <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                              <div class="col-md-12" id="resultado4" style="margin-top:15px;"></div>
                              <div class="col-sm-12" style="margin-top:20px;">
                                 <button class="btn btn-lg btn-block btn-primary" type="submit">
                                 Editar
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.content -->
            <!-- Modal cambiar icono-->
            <div id="cambiar_icono" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cambiar Icono</h4>
                     </div>
                     <div class="modal-body">
                        <form id="cambiar_ic" onsubmit="cambiar_icono();return false; ">
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <input type="file" class='form-control' name="icon" id="icono" >
                              </div>
                              <input type="hidden" name="id" id="id" value="<?=$key->id;?>">
                              <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                              <div class="col-md-12" id="resultado5" style="margin-top:15px;"></div>
                              <div class="col-sm-12" style="margin-top:20px;">
                                 <button class="btn btn-lg btn-block btn-primary" type="submit">
                                 Editar
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.content -->
            
         </tr>
         <?php }  ?>  
      </tbody>
   </table>
</section>

<script type="text/javascript">
   function realizaProceso(id) {
   
     var msj = '1';
            //validaciones con js
            
     if (msj === "1") {
       var formData = new FormData(jQuery('#editar'+id) [0]);
       jQuery.ajax({
         url: '<?=base_url();?>datos/editar_datos',
         type: 'POST',
         contentType: false,
         processData: false,
         dataType: 'json',
         data: formData,
         beforeSend: function() {
           $("#resultado2"+id).html('<div class="alert alert-success">Procesando...!</div>');
         }
       })
       .done(function(data, textStatus, jqXHR) {
         var getData = jqXHR.responseJSON; // dejar esta linea
         if(data.status=='ok'){
           $("#resultado2"+id).html('<div class="alert alert-success">'+data.code+'</div>');
           window.location.href ='<?=base_url();?>panel/datos_sitio';
         }else{
           $("#resultado2"+id).html('<div class="alert alert-danger"><strong>ERROR!</strong>'+data.error+'</div>');
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
   };
   function cambiar_logo() {
   
     var msj = '1';
            //validaciones con js
            
     if (msj === "1") {
       var formData = new FormData(jQuery('#cambiar_l') [0]);
       jQuery.ajax({
         url: '<?=base_url();?>datos/editar_logo',
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
           window.location.href ='<?=base_url();?>panel/datos_sitio';
         }else{
           $("#resultado3"+id).html('<div class="alert alert-danger"><strong>ERROR!</strong>'+data.error+'</div>');
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
   };       
   function cambiar_logo2() {
   
     var msj = '1';
            //validaciones con js
            
     if (msj === "1") {
       var formData = new FormData(jQuery('#cambiar_l2') [0]);
       jQuery.ajax({
         url: '<?=base_url();?>datos/editar_logo2',
         type: 'POST',
         contentType: false,
         processData: false,
         dataType: 'json',
         data: formData,
         beforeSend: function() {
           $("#resultado4").html('<div class="alert alert-success">Procesando...!</div>');
         }
       })
       .done(function(data, textStatus, jqXHR) {
         var getData = jqXHR.responseJSON; // dejar esta linea
         if(data.status=='ok'){
           $("#resultado4").html('<div class="alert alert-success">'+data.code+'</div>');
           window.location.href ='<?=base_url();?>panel/datos_sitio';
         }else{
           $("#resultado4").html('<div class="alert alert-danger"><strong>ERROR!</strong>'+data.error+'</div>');
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
   };
   function cambiar_icono() {
   
     var msj = '1';
            //validaciones con js
            
     if (msj === "1") {
       var formData = new FormData(jQuery('#cambiar_ic') [0]);
       jQuery.ajax({
         url: '<?=base_url();?>datos/editar_icon',
         type: 'POST',
         contentType: false,
         processData: false,
         dataType: 'json',
         data: formData,
         beforeSend: function() {
           $("#resultado5").html('<div class="alert alert-success">Procesando...!</div>');
         }
       })
       .done(function(data, textStatus, jqXHR) {
         var getData = jqXHR.responseJSON; // dejar esta linea
         if(data.status=='ok'){
           $("#resultado5").html('<div class="alert alert-success">'+data.code+'</div>');
           window.location.href ='<?=base_url();?>panel/datos_sitio';
         }else{
           $("#resultado5").html('<div class="alert alert-danger"><strong>ERROR!</strong>'+data.error+'</div>');
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
   };
</script>
<script type="text/javascript">
   jQuery(document).ready(function() {
     jQuery("#nuevos_datos").submit(function(event) {
       event.preventDefault();
          
       var msj = '1';
          //validaciones con js
          
       if (msj === "1") {
         var formData = new FormData(jQuery('#nuevos_datos') [0]);
         jQuery.ajax({
           url: '<?=base_url();?>datos/crear_datos',
           type: 'POST',
           contentType: false,
           processData: false,
           dataType: 'json',
           data: formData,
           beforeSend: function() {
             $("#resultado").html('<div class="alert alert-success">Procesando...!</div>');
           }
         })
         .done(function(data, textStatus, jqXHR) {
           var getData = jqXHR.responseJSON; // dejar esta linea
           if(data.status=='ok'){
             $("#resultado").html('<div class="alert alert-success">'+data.code+'</div>');
             window.location.href ='<?=base_url();?>panel/datos_sitio';
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
          
   });//fin ready
</script>
