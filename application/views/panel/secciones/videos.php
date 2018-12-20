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
      Videos
      <small>Lista</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?=base_url();?>plantilla/panel/#"><i class="fa fa-dashboard"></i>Series</a></li>
      <li class="active">Videos</li>
   </ol>
</section>

<section class="content container-fluid">
   <nav class="nav" style="margin-bottom:25px;">
      <div class="btn-group">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Nuevo video <i class="fa fa-plus-circle"></i></button>
      </div>
   </nav>
   <table id="grid" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
         <tr>
            <th>Url</th>
            <th>Tipo</th>
            <th>Proveedor</th>
            <th>#</th>
            <th>#</th>
         </tr>
      </thead>
      <tfoot>
         <tr>
            <th>Url</th>
            <th>Tipo</th>
            <th>Proveedor</th>
            <th>#</th>
            <th>#</th>
         </tr>
      </tfoot>
      <tbody>
         <?php foreach ($datos as $key) { ?>
         <tr>
            <td><?=$key->url_video;?></td>
            <td><?=$key->tipo;?></td>
            <td><?=$key->provedor;?></td>
            <td>
               <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?=$key->id;?>" ><span class="glyphicon glyphicon-pencil"></span></button></p>
            </td>
            <td>
               <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete<?=$key->id;?>" ><span class="glyphicon glyphicon-trash"></span></button></p>
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
                          $('#id<?=$key->id;?>').val(), 
                          $('#id_capitulo<?=$key->id;?>').val()
                                );return false; ">
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <label>Url</label>
                                 <input type="text" name="url_video" id="url_video" value="<?=$key->url_video;?>" required="" class="form-control" placeholder="Url">
                              </div>
                              <div class="form-group col-md-12">
                                 <label>Tipo</label>
                                 <select  name="tipo" id="tipo" value="<?=$key->tipo;?>" required="" class="form-control" >
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-12">
                                 <label>Proveedor</label>
                                 <input type="text" name="proveedor" id="proveedor" required="" class="form-control" value="<?=$key->provedor;?>" placeholder="Proveedor">
                              </div>
                              
                              
                              <input type="hidden" name="id" id="id" value="<?=$key->id;?>">
                              <!-- <input type="hidden" name="id_capitulo" id="id_capitulo" value="<?=$key->id_capitulo;?>"> -->
                              <input type="hidden" name="id<?=$key->id;?>" id="id<?=$key->id;?>" value="<?=$key->id;?>">
                              <input type="hidden" name="id_capitulo<?=$key->id;?>" id="id_capitulo<?=$key->id;?>" value="<?=$key->id_capitulo;?>">
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
            
            <!-- Modal ELIMINAR -->
            <div id="delete<?=$key->id;?>" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-body text-center">
                        <h3> ¿Esta seguro que desea eliminar estos datos?</h3>
                     </div>
                     <div class="modal-footer">
                        <a href="<?=base_url();?>capitulovideo/eliminar_video/<?=$key->id;?>/<?=$key->id_capitulo;?>"><button type="button" class="btn btn-danger">Si</button></a>
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
            <h4 class="modal-title">Nuevo Video</h4>
         </div>
         <div class="modal-body">
            <form id="nuevo_video" >
               <div class="row">
                  <div class="form-group col-md-12">
                     <label>Url</label>
                     <input type="text" name="url_video" id="url_video"  required="" class="form-control" placeholder="Url">
                  </div>
                  <div class="form-group col-md-12">
                     <label>Tipo</label>
                     <select  name="tipo" id="tipo"  required="" class="form-control" >
                        <option value="0">0</option>
                        <option value="1">1</option>
                     </select>
                  </div>
                  <div class="form-group col-md-12">
                     <label>Proveedor</label>
                     <input type="text" name="proveedor" id="proveedor" required="" class="form-control"  placeholder="Proveedor">
                  </div>
                     <input type="hidden" id="id_capitulo<?=$id?>" name="id_capitulo" value="<?=$id?>">
                     

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
<script type="text/javascript">
  
function realizaProceso(id, id_capitulo) {

  var msj = '1';
         //validaciones con js
         
  if (msj === "1") {
    var formData = new FormData(jQuery('#editar'+id) [0]);
    jQuery.ajax({
      url: '<?=base_url();?>CapituloVideo/editar_video',
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
        window.location.href ='<?=base_url();?>panel/capitulo_video/'+id_capitulo;
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
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery("#nuevo_video").submit(function(event) {
      event.preventDefault();
         
      var msj = '1';
         //validaciones con js
         
      if (msj === "1") {
        var formData = new FormData(jQuery('#nuevo_video') [0]);
        jQuery.ajax({
          url: '<?=base_url();?>CapituloVideo/crear_video',
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
            window.location.href ='<?=base_url();?>panel/capitulo_video/<?=$id?>';
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