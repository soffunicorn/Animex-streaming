<!-- Content Header (Page header) -->
<section class="content-header panel-body">
   <script>
      $.noConflict();
      jQuery( document ).ready(function( $ ) {
          $('#cap').DataTable();
      });
      // Code that uses other library's $ can follow here.
   </script>
   <!-- Content Header (Page header) -->
   <section class="content-header panel-body">
      <ol class="breadcrumb">
         <li><a href="<?=base_url();?>plantilla/panel/#"><i class="fa fa-dashboard"></i>Pelicula</a></li>
         <li class="active">Pelicula</li>
      </ol>
   </section>
   <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Pelicula</a></li>
      <li><a data-toggle="tab" href="#menu1">Lista de videos</a></li>
      <li><a data-toggle="tab" href="#menu2">Editar datos</a></li>
   </ul>
   <!-- Main content -->
   <div class="tab-content">
      <div id="menu2" class="content container-fluid tab-pane fade">
         <form id="editar_pelicula" onsubmit="editar_pelicula();return false; ">
            <div class="form-group col-md-6">
               <label>Nombre:</label>
               <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$pelicula->nombre?>" required="" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6">
               <label>Idioma:</label>
               <input type="text" class="form-control" id="idioma" name="idioma" value="<?=$pelicula->idioma?>" required="" placeholder="Idioma">
            </div>
            <div class="form-group col-md-6">
               <label>Duración:</label>
               <input type="text" class="form-control" id="duracion" name="duracion" value="<?=$pelicula->duracion?>" required="" placeholder="De 20 a 40min">
            </div>
            <div class="form-group col-md-4">
               <label>Fecha de estreno:</label>
               <input type="date" class="form-control" id="fecha_estreno" value="<?=$pelicula->fecha_estreno?>" name="fecha_estreno" required="" placeholder="Fecha de estreno">
            </div>
            <div class="form-group col-md-4">
               <label>Dirección:</label>
               <input type="text" class="form-control" id="direccion" value="<?=$pelicula->direccion?>" name="direccion" required="" placeholder="Dirección">
            </div>
            
            <div class="form-group col-md-4">
               <label>Formato:</label>
               <input type="text" class="form-control" id="formato" name="formato" value="<?=$pelicula->formato?>" required="" placeholder="Formato">
            </div>
            <div class="form-group col-md-12">
               <label>Sinopsis:</label>
               <textarea name="content" id="sinopsis" name="sinopsis" required="" placeholder="Sinopsis">
              <?=$pelicula->descripcion?>
          </textarea>
               <script>
                  ClassicEditor
                      .create( document.querySelector( '#sinopsis' ) )
                      .catch( error => {
                          console.error( error );
                      } );
               </script>
            </div>
               <input type="hidden" name="id" id="id" value="<?=$pelicula->id;?>" />

            <div class="col-md-12">
               <label>Generos</label>
               <?php foreach ($generos as $key) { ?>
               <div class="form-check-inline">
                  <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" id='genero[]' name="genero[]" value="<?=$key->id;?>"> <?=$key->nombre;?>
                  </label>
               </div>
               <?php }  ?>  
            </div>
            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
            <div class="col-md-12" id="resultado" style="margin-top:15px;"></div>
            <div class="form-group col-md-12">
               <hr>
               <button type="submit" class="btn btn-default btn-lg">Enviar</button>
            </div>
         </form>
      </div>
      <div id="home" class="content container-fluid tab-pane fade row in active">
         <div class="col-md-4">
            <img src="<?=base_url().$pelicula->imagen;?>" class="img-responsive">
            <form id="peliculasimagen" onsubmit="realizaProceso2();return false; ">
               <input type="file" name="imagen" id="imagen" class="form-control" required="">
               <input type="hidden" name="id" id="id" value="<?=$pelicula->id;?>" />
               <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
               <div class="col-md-12" id="resultado2"></div>
               <button type="submit" name="enviar" class="form-control">Editar</button>
            </form>
         </div>
         <div class="col-md-6">
            <span style="font-size:1.9em;"><?=$pelicula->nombre;?></span> <span>(<?=$pelicula->fecha_estreno;?>)</span>
            <br>
            <i class="fa fa-heart" aria-hidden="true"></i> <span>2944</span> Favoritos &nbsp;
            <i class="fa fa-star" aria-hidden="true"></i> <span>2944</span> Calificaciones &nbsp;
            <i class="fa fa-check" aria-hidden="true"></i> <span>2944</span> Suscritos &nbsp;
            <hr>
            <h3>Sinopsis</h3>
            <p><?=$pelicula->descripcion;?></p>
         </div>
         
         
      </div>
      <div id='menu1'  class="content container-fluid tab-pane fade row">
         <div class="btn-group ">
            <button type="button" class="btn float-right btn-primary" data-toggle="modal" data-target="#nuevocap">Nueva video <i class="fa fa-plus-circle"></i></button>
         </div>
         <table class="table " id="cap">
            <thead>
               <tr>
                  <th>Tipo</th>
                  <th>Url</th>
                  <th>#</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($videos as $key) { ?>
               <tr>
                  <td><?=$key->tipo;?></td>
                  <td><?=$key->url_video;?></td>
                  <td>
                     <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?=$key->id;?>" ><span class="glyphicon glyphicon-pencil"></span></button>
                     <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete<?=$key->id;?>" ><span class="glyphicon glyphicon-trash"></span></button>
                  </td>
                  <!-- DF -->
                  <!-- Modal ELIMINAR -->
                  <div id="delete<?=$key->id;?>" class="modal fade " role="dialog">
                     <div class="modal-dialog" style="margin-top:10vw;">
                        <!-- Modal content-->
                        <div class="modal-content">
                           <div class="modal-body text-center">
                              <h3> ¿Esta Seguro que desea eliminar el video?</h3>
                           </div>
                           <div class="modal-footer">
                              <a href="<?=base_url();?>capitulo/eliminar_capitulo/<?=$key->id;?>/<?=$pelicula->id;?>"><button type="button" class="btn btn-danger">Si</button></a>
                              <button type="button" class="btn btn-default" data-dismiss="modal">no</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.content -->
                  <!-- Modal Editar-->
                  <div id="edit<?=$key->id;?>" class="modal fade " role="dialog">
                     <div class="modal-dialog" style="margin-top:10vw;">
                        <!-- Modal content-->
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Editar video</h4>
                           </div>
                           <div class="modal-body">
                              <form id="editar<?=$key->id;?>" onsubmit="realizaProceso(
                                 $('#id<?=$key->id;?>').val() 
                                 );return false; ">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <label>Url</label>
                                       <input type="text" name="url_video" id="url_vidpeliculavideored="" class="form-control" placeholder="Url" value="<?=$key->url_video?>">
                                       <label>Tipo</label>
                                       <select class="form-control" name="tipo" id="tipo">
                                          <option value="0">0</option>
                                          <option value="1">1</option>
                                       </select>
                                       <input type="hidden" name="id" id="id"  class="form-control"value="<?=$key->id?>">
                                       <input type="hidden" name="id" id="id"  class="form-control"value="<?=$key->id?>">
                                       <input type="hidden" name="id<?=$key->id?>" id="id<?=$key->id?>"  class="form-control"value="<?=$key->id?>">

                                       <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                       
                                       
                                    </div>
                                    <div class="col-md-12" id="resultado3<?=$key->id;?>" style="margin-top:15px;"></div>
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
                  
               </tr>
               <?php }  ?>  
            </tbody>
         </table>
      </div>
   </div>
</section>

<!-- Modal -->
<div id="nuevocap" class="modal fade " role="dialog">
   <div class="modal-dialog" style="margin-top:10vw;">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Nueva Video</h4>
         </div>
         <div class="modal-body">
            <form id="nc" onsubmit="realizaProceso1();return false;">
               <div class="row">
                  <div class="col-sm-12">
                     <label>Url</label>
                     <input type="text" name="url_video" id="url_video" required="" class="form-control" placeholdpeliculavideo
                     <label>Tipo</label>
                     <select name="tipo" class="form-control" id="tipo">
                        <option value="0">0</option>
                        <option value="1">1</option>
                     </select>
                     
                  <div class="col-md-12" id="resultadonc" style="margin-top:15px;"></div>
                  <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                  <input type="hidden" name="id_pelicula" id="id_pelicula" value="<?=$pelicula->id;?>" />

                  <div class="col-sm-12" style="margin-top:20px;">
                     <button  type="submit" class="btn btn-lg btn-block btn-primary">
                     Crear
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
</div>

<!-- /.content -->
<script>  
   function realizaProceso(id) {
       var msj = '1';
      //validaciones con js
      
     if (msj === "1") {
      var formData = new FormData(jQuery('#editar'+id) [0]);
      jQuery.ajax({
        url: '<?=base_url();?>peliculavideo/editar_video',
        type: 'POST',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: formData,
        beforeSend: function() {
          $("#resultado3"+id).html('<div class="alert alert-success">Procesando...!</div>');
        }
      })
      .done(function(data, textStatus, jqXHR) {
         var getData = jqXHR.responseJSON; // dejar esta linea
        if(data.status=='ok'){
         $("#resultado3"+id).html('<div class="alert alert-success">'+data.code+'</div>');
         window.location.href ='<?=base_url();?>panel/viewpelicula/<?=$pelicula->id;?>';
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
</script>
<script>  
   function realizaProceso1() {
       var msj = '1';
      //validaciones con js
      
     if (msj === "1") {
      var formData = new FormData(jQuery('#nc') [0]);
      jQuery.ajax({
        url: '<?=base_url();?>peliculavideo/crear_video',
        type: 'POST',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: formData,
        beforeSend: function() {
          $("#resultadonc").html('<div class="alert alert-success">Procesando...!</div>');
        }
      })
      .done(function(data, textStatus, jqXHR) {
         var getData = jqXHR.responseJSON; // dejar esta linea
        if(data.status=='ok'){
         $("#resultadonc").html('<div class="alert alert-success">'+data.code+'</div>');
          window.location.href ='<?=base_url();?>panel/viewpelicula/<?=$pelicula->id;?>';
        }else{
        $("#resultadonc").html('<div class="alert alert-danger"><strong>ERROR!</strong>'+data.error+'</div>');
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
<script>  
   function realizaProceso2() {
       var msj = '1';
      //validaciones con js
      
     if (msj === "1") {
      var formData = new FormData(jQuery('#peliculasimagen') [0]);
      jQuery.ajax({
        url: '<?=base_url();?>peliculas/editar_imagen',
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
         window.location.href ='<?=base_url();?>panel/viewpelicula/<?=$pelicula->id;?>';
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
       };
</script>

<!-- EDITAR generoS -->
<script >
   function realizaProcesot(id) {
   
       var msj = '1';
      //validaciones con js
      
     if (msj === "1") {
      var formData = new FormData(jQuery('#editart'+id) [0]);
      jQuery.ajax({
        url: '<?=base_url();?>temporada/editar_temporada',
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
         // window.location.href ='<?=base_url();?>/panel';
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
      
     
</script>
