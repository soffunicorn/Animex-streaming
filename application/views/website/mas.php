<section id="home">
   <div class="container">
      <div class="row mg">
         <div class="col-lg-3">
         <div class="" style="position:-webkit-sticky;position:sticky;top:0px;">
            <div class="col-lg-12 bordert" id="SERIES_DESTACAS">
               <h2><i class="fas fa-filter"></i>Filtros</h2>
            </div>
            <style>
               label { margin-top: 10px; }
            </style>
            <form method="GET" id="filtro">
            <div class="row col-12" style="padding-top:2em;">
               <label><b>Tipo de búsqueda</b></label>
               <select class="form-control" id="tipo" name="tipo">
                  <option value="1">Series</option>
                  <option value="2">Temporadas</option>
                  <option value="3">Capítulos</option>
                  <option value="4">Películas</option>
                  <option value="5">Series Destacadas</option>
               </select>
               <input type="hidden" name="pagina" id="pagina" value="1">
               <label><b>Categoría</b></label>
               <select class="form-control" id="categoria" name="categoria">
                  <option value="Todas">Todas</option>
                  <?php foreach ($categoria as $key) { ?>
                     <option value="<?=$key->nombre?>"><?=$key->nombre?></option>
                  <?php } ?>
               </select>
               <label><b>Genero</b></label>
               <select class="form-control" id="genero" name="genero">
                    <option value="Todas">Todas</option>
                  <?php foreach ($genero as $key) { ?>
                     <option value="<?=$key->id?>"><?=$key->nombre?></option>
                  <?php } ?>
               </select>
               <label><b>Estreno</b></label>
               <div class="row col-12">
                  <span class="col-6">Desde</span> <span class="col-6">Hasta</span>  
                  <input class="form-control col-6" style="display:inline-block;" type="number" name="desde" id="desde" required="" placeholder="Desde" value="1900" >
                  <input class="form-control col-6" style="display:inline-block;" type="number" name="hasta" id="hasta" required="" placeholder="Hasta " value="<?php echo date('Y'); ?>">
               </div>
               <div style="margin-top:20px" class="row col-12"  >
               <button type="submit" class="btn btn-light btn-block col-sm-6"><i class="fas fa-filter"></i>Filtrar</button>
               <a href="<?=base_url();?>/home/mas" class="col-sm-3 offset-sm-1 btn btn-dark btn-block">
                   <i class="fas fa-retweet"></i>
               </a>
            </div>
            </div>
         </form>
      </div>
         </div>
         <!--Diva para la barra lateral 3-->
         <div class="col-lg-9 row">
            <?php
             if($tipo==1){ $tipo='<i class="fas fa-fighter-jet"></i> Series';}
             if($tipo==2){ $tipo='<i class="fab fa-cloudscale"></i> Temporadas';}
             if($tipo==3){ $tipo='<i class="fas fa-tv"></i> Capítulos';}
             if($tipo==4){ $tipo='<i class="fas fa-film"></i></i> Películas';}
             if($tipo==5){ $tipo='<i class="fas fa-star"></i> Series destacadas';} 
             ?>
            <div class="col-lg-12" id="Resultados">
               <h2><?=$tipo;?></h2>
            </div>
            <?php foreach ($data as $key){?> 
            <div class="col-md-3 series" id='destacadas'>
               <div class="card">
                  <a href="<?php echo base_url();?>home/detalle_series/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->nombre;?>"> <img src="<?=base_url().$key->imagen;?>" class="img-fluid imglg"></a>
                 
                  <span class="spanhovertilte">
                  <?=$key->nombre;?> 
                  </span>
               </div>
            </div>
            <?php } ?> 
            <div class="center-block text-center col-12">
               <ul class="pagination pagination-lg justify-content-center">
                  <?php
                     if ($total_paginas > 1) {
                             if ($pagina != 1)
                                 echo '<li class="page-item"><a class="page-link" href="' . $url . '?pagina=' . (($total_paginas - $total_paginas) + 1) . '"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a></li>';
                         
                             for ($i = $pagina - 1; $i <= $pagina + 5; $i++) {
                                 if ($pagina == $i) {
                         //si muestro el índice de la página actual, no coloco enlace
                                     ?>
                  <li class="active disabled page-item"><a class="page-link"  href="#"> <?php echo $pagina; ?> </a></li>
                  <?php
                     } else
                     //si el índice no corresponde con la página mostrada actualmente,
                     //coloco el enlace para ir a esa página
                     if (($i <= $total_paginas) and ( $i != 0)) {
                         echo ' <li class="page-item"> <a class="page-link" href="' . $url . '/' . $i . '">' . $i . '</a> </li>';
                     }
                     }
                     if ($pagina != $total_paginas)
                     echo '<li class="page-item"><a class="page-link" href="' . $url . '/' . ($total_paginas) . '"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>';
                     }
                     ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<script>
   $(document).ready(function(){
       $('[data-toggle="tooltip"]').tooltip();   
   });
</script>
