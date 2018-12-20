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
      Menús
      <small>Menús</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?=base_url();?>plantilla/panel/#"><i class="fa fa-dashboard"></i>Menús</a></li>
      <li class="active">Menús</li>
   </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
   <nav class="nav" style="margin-bottom:25px;">
      <div class="btn-group">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Nuevo menú <i class="fa fa-plus-circle"></i></button>
      </div>
   </nav>
   <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Menú Navar</a></li>
          <li><a href="#tab_2" data-toggle="tab">Menú Footer 1</a></li>
          <li><a href="#tab_3" data-toggle="tab">Menú Footer 2</a></li>
          
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table id="grid" class="table  table-striped table-bordered" cellspacing="0" width="100%">
             <thead>
                <tr>
                   <th>ID</th>
                   <th>Nombre</th>
                   <th>Url</th>
                   <th>Posición</th>
                   <th>#</th>
                   <th>#</th>
                </tr>
             </thead>
             <tfoot>
                <tr>
                   <th>ID</th>
                   <th>Nombre</th>
                   <th>Url</th>
                   <th>Posición</th>
                   <th>#</th>
                   <th>#</th>
                </tr>
             </tfoot>
             <tbody>
                <tr>
                <?php foreach ($datos as $key) { ?>
                  <?php if ($key->id_menus == 1): ?>
                    
                   <td><?=$key->id;?></td>
                   <td><?=$key->nombre;?></td>
                   <td><?=$key->url;?></td>
                   <td><?=$key->posicion;?></td>
                   <td>
                      <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?=$key->id;?>" ><span   class="glyphicon glyphicon-pencil"></span></button></p>
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
                        <h4 class="modal-title">Editar Menú</h4>
                     </div>
                     <div class="modal-body">
                        <form id="editar<?=$key->id;?>" onsubmit="realizaProceso(
                                $('#id<?=$key->id;?>').val() 
                                );return false; ">
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label>Nombre del menu</label>
                                 <input type="text" name="nombre" id="nombre" value="<?=$key->nombre;?>" required="" class="form-control" placeholder="Ej: Anime">
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Url del menú</label>
                                 <input type="text" name="url" id="url" required="" class="form-control" value="<?=$key->url;?>" placeholder="Ej: Anime">
                              </div>
                              <div class="form-group col-md-6">
                                <select name="id_menus" id="" class="form-control">
                                  <?php foreach ($menus as $menu): ?>
                                    <option value="<?=$menu->id?>"><?=$menu->nombre?></option>
                                  <?php endforeach ?>
                                </select>
                              </div>
                              <div class="form-group col-md-6">
                                <select name="posicion" id="" class="form-control">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
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
            <!-- Modal ELIMINAR -->
            <div id="delete<?=$key->id;?>" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-body text-center">
                        <h3> ¿Esta Seguro que desea eliminar la Menú: <b><?=$key->nombre;?></b>?</h3>
                     </div>
                     <div class="modal-footer">
                        <a href="<?=base_url();?>menus/eliminar_menu/<?=$key->id;?>"><button type="button" class="btn btn-danger">Si</button></a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">no</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.content -->
                 </tr>
                  <?php endif ?>
                <?php }  ?>  
             </tbody>
           </table>
          </div>
          <div class="tab-pane " id="tab_2">
            <table id="grid" class="table  table-striped table-bordered" cellspacing="0" width="100%">
                 <thead>
                    <tr>
                       <th>ID</th>
                       <th>Nombre</th>
                       <th>Url</th>
                       <th>Posición</th>
                       <th>#</th>
                       <th>#</th>
                    </tr>
                 </thead>
                 <tfoot>
                    <tr>
                       <th>ID</th>
                       <th>Nombre</th>
                       <th>Url</th>
                       <th>Posición</th>
                       <th>#</th>
                       <th>#</th>
                    </tr>
                 </tfoot>
                 <tbody>
                    <tr>
                    
                    <?php foreach ($datos as $key) { ?>
                      <?php if ($key->id_menus == 2): ?>
                        
                       <td><?=$key->id;?></td>
                       <td><?=$key->nombre;?></td>
                       <td><?=$key->url;?></td>
                       <td><?=$key->posicion;?></td>
                       <td>
                          <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?=$key->id;?>" ><span   class="glyphicon glyphicon-pencil"></span></button></p>
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
                        <h4 class="modal-title">Editar Menú</h4>
                     </div>
                     <div class="modal-body">
                        <form id="editar<?=$key->id;?>" onsubmit="realizaProceso(
                                $('#id<?=$key->id;?>').val() 
                                );return false; ">
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label>Nombre del menu</label>
                                 <input type="text" name="nombre" id="nombre" value="<?=$key->nombre;?>" required="" class="form-control" placeholder="Ej: Anime">
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Url del menú</label>
                                 <input type="text" name="url" id="url" required="" class="form-control" value="<?=$key->url;?>" placeholder="Ej: Anime">
                              </div>
                              <div class="form-group col-md-6">
                                <select name="id_menus" id="" class="form-control">
                                  <?php foreach ($menus as $menu): ?>
                                    <option value="<?=$menu->id?>"><?=$menu->nombre?></option>
                                  <?php endforeach ?>
                                </select>
                              </div>
                              <div class="form-group col-md-6">
                                <select name="posicion" id="" class="form-control">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
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
            <!-- Modal ELIMINAR -->
            <div id="delete<?=$key->id;?>" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-body text-center">
                        <h3> ¿Esta Seguro que desea eliminar la Menú: <b><?=$key->nombre;?></b>?</h3>
                     </div>
                     <div class="modal-footer">
                        <a href="<?=base_url();?>menus/eliminar_menu/<?=$key->id;?>"><button type="button" class="btn btn-danger">Si</button></a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">no</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.content -->
                     <tr>
                      <?php endif ?>
                   <?php }  ?>    

                 </tbody>
                </table>
              </div>
          <div class="tab-pane" id="tab_3">
            <table id="grid" class="table  table-striped table-bordered" cellspacing="0" width="100%">
             <thead>
                <tr>
                   <th>ID</th>
                   <th>Nombre</th>
                   <th>Url</th>
                   <th>Posición</th>
                   <th>#</th>
                   <th>#</th>
                </tr>
             </thead>
             <tfoot>
                <tr>
                   <th>ID</th>
                   <th>Nombre</th>
                   <th>Url</th>
                   <th>Posición</th>
                   <th>#</th>
                   <th>#</th>
                </tr>
             </tfoot>
             <tbody>
                <tr>
                <?php foreach ($datos as $key) { ?>
                  <?php if ($key->id_menus == 3): ?>
                    
                   <td><?=$key->id;?></td>
                   <td><?=$key->nombre;?></td>
                   <td><?=$key->url;?></td>
                   <td><?=$key->posicion;?></td>
                   <td>
                      <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?=$key->id;?>" ><span   class="glyphicon glyphicon-pencil"></span></button></p>
                   </td>
                   <td>
                      <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete<?=$key->id;?>" ><span class="glyphicon glyphicon-trash"></span></button></p>
                   </td>
                 </tr>

  <!-- Modal Editar-->
            <div id="edit<?=$key->id;?>" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Menú</h4>
                     </div>
                     <div class="modal-body">
                        <form id="editar<?=$key->id;?>" onsubmit="realizaProceso(
                                $('#id<?=$key->id;?>').val() 
                                );return false; ">
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label>Nombre del menu</label>
                                 <input type="text" name="nombre" id="nombre" value="<?=$key->nombre;?>" required="" class="form-control" placeholder="Ej: Anime">
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Url del menú</label>
                                 <input type="text" name="url" id="url" required="" class="form-control" value="<?=$key->url;?>" placeholder="Ej: Anime">
                              </div>
                              <div class="form-group col-md-6">
                                <select name="id_menus" id="" class="form-control">
                                  <?php foreach ($menus as $menu): ?>
                                    <option value="<?=$menu->id?>"><?=$menu->nombre?></option>
                                  <?php endforeach ?>
                                </select>
                              </div>
                              <div class="form-group col-md-6">
                                <select name="posicion" id="" class="form-control">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
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
            <!-- Modal ELIMINAR -->
            <div id="delete<?=$key->id;?>" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-body text-center">
                        <h3> ¿Esta Seguro que desea eliminar la Menú: <b><?=$key->nombre;?></b>?</h3>
                     </div>
                     <div class="modal-footer">
                        <a href="<?=base_url();?>menus/eliminar_menu/<?=$key->id;?>"><button type="button" class="btn btn-danger">Si</button></a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">no</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.content -->
                  <?php endif ?>


                <?php }  ?>  

             </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>         
</section>
<!-- Modal -->
<div id="myModal" class="modal fade " role="dialog">
   <div class="modal-dialog" style="margin-top:10vw;">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Nueva Menú</h4>
         </div>
         <div class="modal-body">
            <form id="nuevo_menu">
               <div class="row">
                  <div class="form-group col-md-6">
                     <label>Nombre del menú</label>
                     <input type="text" name="nombre" id="nombre" required="" class="form-control" placeholder="Ej: Anime">
                  </div>
                  <div class="form-group col-md-6">
                     <label>Url del menú</label>
                     <input type="text" name="url" id="url" required="" class="form-control" placeholder="Ej: Anime">
                  </div>
                  <div class="form-group col-md-6">
                    <select name="id_menus" id="" class="form-control">
                      <?php foreach ($menus as $key): ?>
                        <option value="<?=$key->id?>"><?=$key->nombre?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <select name="posicion" id="" class="form-control">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
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

<!-- NUEVAS MenúS -->
      <script >
         jQuery(document).ready(function() {
               jQuery("#nuevo_menu").submit(function(event) {
               event.preventDefault();
         
             var msj = '1';
         //validaciones con js
         
        if (msj === "1") {
         var formData = new FormData(jQuery('#nuevo_menu') [0]);
         jQuery.ajax({
           url: '<?=base_url();?>menus/crear_menu',
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
             window.location.href ='<?=base_url();?>panel/menus';
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

      <!-- EDITAR MenúS -->
      <script >
        
      function realizaProceso(id) {

          var msj = '1';
         //validaciones con js
         
        if (msj === "1") {
         var formData = new FormData(jQuery('#editar'+id) [0]);
         jQuery.ajax({
           url: '<?=base_url();?>menus/editar_menu',
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
            window.location.href ='<?=base_url();?>panel/menus';
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
