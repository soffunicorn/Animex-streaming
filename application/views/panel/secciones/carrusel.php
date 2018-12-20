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
      Carrusel
      <small>Category</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?=base_url();?>plantilla/panel/#"><i class="fa fa-dashboard"></i>Series</a></li>
      <li class="active">Carrusel</li>
   </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
   <nav class="nav" style="margin-bottom:25px;">
      <div class="btn-group">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Nueva Carrusel <i class="fa fa-plus-circle"></i></button>
      </div>
   </nav>
   <table id="grid" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
         <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Titulo</th>
            <th>Posición</th>        
            <th>#</th>
           
         </tr>
      </thead>
      <tfoot>
         <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Titulo</th>
            <th>Posición</th>        
            <th>#</th>
       
         </tr>
      </tfoot>
      <tbody>
         <?php foreach ($Carrusel as $key) { ?>
         <tr>
            <td><?=$key->id;?></td>
            <td class="td-carrusel"><img src="<?=base_url().$key->imagen;?>" class="img-responsive img-thumbnail"></td>
            <td><?=$key->titulo;?></td>
            <td><?=$key->posicion ;?></td>
           <!-- <td>
               <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?=$key->id;?>" ><span class="glyphicon glyphicon-pencil"></span></button></p>
            </td>-->
            <td>
               <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete<?=$key->id;?>" ><i class="fas fa-trash-alt"></i></button></p>
            </td>
            <!-- Modal Editar-->
            <div id="edit<?=$key->id;?>" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Carrusel</h4>
                     </div>
                     <div class="modal-body">
                        <form id="editar<?=$key->id;?>" onsubmit="realizaProceso(
                                $('#id<?=$key->id;?>').val() 
                                );return false; ">
                           <div class="row">
                              <div class="col-sm-12">
                                 <label>Nombre de la Carrusel</label>
                                 <input type="text" name="nombre" id="nombre" value="<?=$key->nombre;?>" required="" class="form-control" placeholder="Ej: Anime">
                                 <input type="hidden" name="id" id="id" value="<?=$key->id;?>">
                                 
                                 <input type="hidden" name="id<?=$key->id;?>" id="id<?=$key->id;?>" value="<?=$key->id;?>">

                                 <input type="hidden" name="lugar" id="lugar" value="series">
                                 
                                 <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                              </div>
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
            <!-- Modal ELIMINAR -->
            <div id="delete<?=$key->id;?>" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-body text-center">
                        <h3> ¿Esta Seguro que desea eliminar la Carrusel: <b><?=$key->id;?></b>?</h3>
                     </div>
                     <div class="modal-footer">
                        <a href="<?=base_url();?>Carrusel/eliminar_Carrusel/<?=$key->id;?>"><button type="button" class="btn btn-danger">Si</button></a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">no</button>
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
<!-- Modal -->
<div id="myModal" class="modal fade " role="dialog">
   <div class="modal-dialog" style="margin-top:10vw;">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Nueva Carrusel</h4>
         </div>
         <div class="modal-body">
            <form id="nuevacap">
               <div class="row">
                  <div class="col-sm-12">
                    <h6>Nota solo la imagen es requerida</h6>
                    <label>Imagen</label>
                    <input type="file" name="imagen" required="" id="imagen" class="form-control">
                    <label>Url</label>
                    <input type="text" name="url" id="url" class="form-control" placeholder="Url">
                    <label>Posición</label>
                    <input type="number" name="posicion" id="posicion"  class="form-control" placeholder="Posición">
                    <label>Titulo</label>
                    <input type="text" name="titulo" id="titulo"  class="form-control" placeholder="Nota campo es opcional">
                  </div>
                  <div class="col-md-12" id="resultado" style="margin-top:15px;"></div>
                  <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                  <div class="col-sm-12" style="margin-top:20px;">
                     <button class="btn btn-lg btn-block btn-primary">
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
<!-- /.content -->

<!-- NUEVAS Carrusel -->
      <script >
         jQuery(document).ready(function() {
               jQuery("#nuevacap").submit(function(event) {
               event.preventDefault();
         
             var msj = '1';
         //validaciones con js
         
        if (msj === "1") {
         var formData = new FormData(jQuery('#nuevacap') [0]);
         jQuery.ajax({
           url: '<?=base_url();?>Carrusel/crear_carrusel',
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
             window.location.href ='<?=base_url();?>/panel/Carrusel';
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

      <!-- EDITAR Carrusel -->
      <script >
        
      function realizaProceso(id) {

          var msj = '1';
         //validaciones con js
         
        if (msj === "1") {
         var formData = new FormData(jQuery('#editar'+id) [0]);
         jQuery.ajax({
           url: '<?=base_url();?>Carrusel/editar_Carrusel',
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
