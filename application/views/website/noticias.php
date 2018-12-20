<section id="home">
   <div class="container">
      <div class="row mg">
         <div class="col-lg-4 row">
           <div class="col-lg-12" id="Resultados">
               <h4><i class="fas fa-tv"></i> Ultimos capitulos</h4>
            </div>
     <?php foreach ($capitulos as $key) { ?>
             
               <div class="col-md-6 img-text">
                 <a href="<?php echo base_url();?>home/capitulo/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->name;?> <?=$key->temporada;?>-<?=$key->numero;?>"> <img src="<?=base_url().$key->imagen2;?>" class="img-fluid "/></a>
               </div>
               <div class="col-md-6 img-text">
                  <a class="link" href="<?php echo base_url();?>home/capitulo/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->name;?> <?=$key->temporada;?>-<?=$key->numero;?>"></a><b><?=$key->name;?> </b>
                  <br><b>Temp:</b><?=$key->temporada;?>-<b>Cap:</b><?=$key->numero;?> <i class="far fa-clock"></i>
               </div>
            <?php } ?> 
         </div>
         <!--Diva para la barra lateral 3-->
        <div class="col-md-8 row">
            <div class="col-lg-12" id="Resultados">
               <h4><i class="fas fa-newspaper"></i> Noticias</h4>
            </div>
            <?php foreach ($data as $key){?> 
            <div class="col-md-6 series" id='noticias'>
               <div class="noticia">
                  <a href="<?php echo base_url();?>home/noticia/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->titulo;?>"> <img src="<?=base_url().$key->imagen;?>" class="img-fluid imgmd">
                 
                  <span class="titular">
                  <b><?=$key->titulo;?></b><br>
                  </span>
                   <div class="titulard">
                  <?=$key->descripcion_corta;?> 
                  </div>
                  </a>
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
