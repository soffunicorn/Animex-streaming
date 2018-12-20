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
      Peliculas
      <small>Category</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?=base_url();?>plantilla/panel/#"><i class="fa fa-dashboard"></i>Peliculas</a></li>
      <li class="active">Peliculas</li>
   </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
   <nav class="nav" style="margin-bottom:25px;">
      <div class="btn-group">
         <a href="<?=base_url();?>panel/newpelicula"><button type="button" class="btn btn-primary">Nueva Pelicula <i class="fa fa-plus-circle"></i></button></a>
      </div>
   </nav>
   <table id="grid" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
         <tr>

            <th>ID</th>
            <th>Nombre</th>
            <th>Duración</th>
            <th>Idioma</th>
            <th>Formato</th>
            <th>Estreno</th>
            <th>#</th>
 
         </tr>
      </thead>
      <tfoot>
         <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Duración</th>
            <th>Idioma</th>
            <th>Formato</th>
            <th>Estreno</th>
            <th style="width:75px;">#</th>
          
         </tr>
      </tfoot>
      <tbody>
         <?php foreach ($datos as $key) { ?>
         <tr>
            <td><?=$key->id;?></td>
            <td><?=$key->nombre;?></td>
            <td><?=$key->duracion;?></td>
            <td><?=$key->idioma;?></td>
            <td><?=$key->formato;?></td>
            <td><?=$key->fecha_estreno;?></td>
            <td>
               <a href="<?=base_url();?>panel/viewpelicula/<?=$key->id;?>">
                  <button class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>
                     </button>
                  
               </a>
               <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete<?=$key->id;?>" ><i class="fas fa-trash-alt"></i></button><br>
                
               </td>
           
            </td>
            <!-- Modal Editar-->
            <!-- /.content -->
            <!-- Modal ELIMINAR -->
            <div id="delete<?=$key->id;?>" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-body text-center">
                        <h3> ¿Esta Seguro que desea eliminar la Pelicula: <b><?=$key->nombre;?></b>?</h3>
                     </div>
                     <div class="modal-footer">
                        <a href="<?=base_url();?>peliculas/eliminar_pelicula/<?=$key->id;?>"><button type="button" class="btn btn-danger">Si</button></a>
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
            <h4 class="modal-title">Nueva Pelicula</h4>
         </div>
         <div class="modal-body">
            <form id="nuevacap">
               <div class="row">
                  <div class="col-sm-12">
                     <label>Nombre de la Pelicula</label>
                     <input type="text" name="nombre" id="nombre" required="" class="form-control" placeholder="Ej: Anime">
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
<!-- EDITAR Pelicula -->
