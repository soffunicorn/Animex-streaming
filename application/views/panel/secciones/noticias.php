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
      Noticias
      <small>Noticias</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?=base_url();?>plantilla/panel/#"><i class="fa fa-dashboard"></i>Noticias</a></li>
      <li class="active">Noticias</li>
   </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
   <nav class="nav" style="margin-bottom:25px;">
      <div class="btn-group">
         <a href="<?=base_url();?>panel/newnoticia"><button type="button" class="btn btn-primary">Nueva noticia <i class="fa fa-plus-circle"></i></button></a>
      </div>
   </nav>
   <table id="grid" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
         <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Portada</th>
            <th>#</th>
         </tr>
      </thead>
      <tfoot>
         <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Portada</th>
            <th>#</th>
         </tr>
      </tfoot>
      <tbody>
         <?php foreach ($noticias as $key) { ?>
         <tr>
            <td><?=$key->id;?></td>
            <td><?=$key->titulo;?></td>
            <td><?=$key->descripcion_corta;?></td>
            <td><img height="100" width="100" src="<?=base_url().$key->portada;?>" alt="<?=$key->titulo;?> portada"></td>
            <td>
               <a href="<?=base_url();?>panel/editnoticia/<?=$key->id;?>">
                  <button class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>
                     </button>
                  
               </a>
               <button class="btn btn-danger btn-xs btn-deleted" data-title="Delete" data-toggle="modal" data-target="#delete<?=$key->id;?>"><i class="fas fa-trash-alt"></i></button><br>
                
                
           
            </td>
            <!-- Modal Editar-->
            <!-- /.content -->
            <!-- Modal ELIMINAR -->
            <div id="delete<?=$key->id;?>" class="modal fade " role="dialog">
               <div class="modal-dialog" style="margin-top:10vw;">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-body text-center">
                        <h3> ¿Esta Seguro que desea eliminar la serie: <b><?=$key->titulo;?></b>?</h3>
                     </div>
                     <div class="modal-footer">
                        <a href="<?=base_url();?>noticias/eliminar_noticia/<?=$key->id;?>"><button type="button" class="btn btn-danger">Si</button></a>
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

<!-- /.content -->
<!-- EDITAR noticias -->
