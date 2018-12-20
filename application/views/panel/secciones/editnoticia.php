<!-- Content Header (Page header) -->
<section class="content-header panel-body">
   <h1>
      Editar noticia
      <small>Editar noticia</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?=base_url();?>plantilla/panel/#"><i class="fa fa-dashboard"></i>Noticias</a></li>
      <li class="active">Editar noticia</li>
   </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
   <form id="nuevaser">
    <?php foreach ($noticia as $key ): ?>
      
      <div class="form-group col-md-12">
         <label>Título:</label>
         <input type="text" class="form-control" id="titulo" name="titulo" required="" value="<?=$key->titulo;?>" placeholder="Título">
      </div>
      <div class="form-group col-md-12">
        <label for="">Descripción corta</label>
        <textarea class="form-control" id="descripcion_corta" name="descripcion_corta" required="" ><?=$key->descripcion_corta;?></textarea>
      </div>
       <div class="form-group col-md-4">
         <label>Portada:</label>
         <input type="file" class="form-control" id="portada" name="portada" required="">
      </div>
      <div class="form-group col-md-4">
         <label>Imagen:</label>
         <input type="file" class="form-control" id="imagen" name="imagen" required="">
      </div>
       <div class="form-group col-md-4">
         <label>Tag:</label>
         <input type="text" value="<?=$key->tag;?>" class="form-control" id="tag" name="tag" required="" placeholder="Tag">
      </div>
      <div class="form-group col-md-12">
         <label>Contenido:</label>
         <textarea name="contenido" id="contenido"  required="">
           <?=$key->contenido;?>
         </textarea>
         <script>
            ClassicEditor
                .create( document.querySelector( '#contenido' ) )
                .catch( error => {
                    console.error( error );
                } );
         </script>
      </div>
      
      <input type="hidden" name="id" value="<?=$key->id;?>" />
      <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
      <div class="col-md-12" id="resultado" style="margin-top:15px;"></div>
      <div class="form-group col-md-12">
         <hr>
         <button type="submit" class="btn btn-default btn-lg">Enviar</button>
      </div>
   </form>
    <?php endforeach ?>
</section>
<!-- /.content -->
<!-- NUEVAS noticiaS -->
      <script >
         jQuery(document).ready(function() {
               jQuery("#nuevaser").submit(function(event) {
               event.preventDefault();
         
             var msj = '1';
         //validaciones con js
         
        if (msj === "1") {
         var formData = new FormData(jQuery('#nuevaser') [0]);
         jQuery.ajax({
           url: '<?=base_url();?>noticias/editar_noticia',
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
             window.location.href ='<?=base_url();?>panel/noticias';
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
