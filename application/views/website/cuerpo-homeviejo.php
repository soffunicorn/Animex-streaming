
<section id="home">
    <div class="container">
        <div class="row mg">
            <div class="col-lg-5">
                <!--Slider-->
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <?php $i=0; foreach ($carrusel as $key) { ?>
                        <li data-target="#demo" data-slide-to="<?=$i?>" <?php if($i==0) echo 'class="active"';?> > </li>
                        <?php $i++; } ?>
                    </ul>
                    <!-- The slideshow -->

                    <div class="carousel-inner">
                        <?php $i=0; foreach ($carrusel as $key) { ?>
                        <div class="carousel-item <?php if($i==0) echo 'active';?>">
                            <a href="#">
                     <img class="carrusel" src="<?=base_url().$key->imagen;?>" alt="Los Angeles">
                     </a>
                        </div>
                        <?php $i++; } ?>
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <?php foreach ($capitulo as $key){?>
                    <div class="col-md-4" id="cap">
                        <div class="">
                            <a href="<?php echo base_url();?>home/capitulo/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->name;?> <?=$key->temporada;?>-<?=$key->numero;?>"> <img src="<?=base_url().$key->imagen2;?>" class="img-fluid imgssm"></a>
                            <span class="spanhovertag">
                     <b>Temp:</b><?=$key->temporada;?>-<b>Cap:</b><?=$key->numero;?> <i class="far fa-clock"></i>
                     </span>
                            <span class="spanhovertag">
                     <?=$key->name;?> 
                     </span>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!--Diva para la barra lateral 3-->
            <div class="col-lg-9 row">
                
      

<div class="row titulos col-md-12">
                <div class="col-md-10 bordert" id="SERIES_DESTACAS">
                    <h5><i class="fas fa-tv"></i> NUEVOS CAPITULOS</h5>
                </div>
                <div class="text-right col-md-2">
                    <a href="<?php base_url();?>home/mas?tipo=3&pagina=1&categoria=Todas&genero=Todas&desde=1900&hasta=2099">
                        <button class="btn mas btn-dark" style=""><b><i class="fas fa-plus"></i></b>
                        </button>
                    </a>
                </div>
            </div>
               <?php foreach ($capitulo as $key){?>
                    <div class="col-md-3 series" id="cap">
                        <div class="">
                            <a href="<?php echo base_url();?>home/capitulo/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->name;?> <?=$key->temporada;?>-<?=$key->numero;?>"> <img src="<?=base_url().$key->imagen2;?>" class="img-fluid imgsm"></a>
                            <span class="spanhovertag">
                     <b>Temp:</b><?=$key->temporada;?>-<b>Cap:</b><?=$key->numero;?> <i class="far fa-clock"></i>
                     </span>
                            <span class="spanhovertilte">
                     <?=$key->name;?> 
                     </span>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-xs-12">
                    <img style="width:100%;" class="pd" src="<?=base_url();?>plantilla/website/img/1534667129353.jpg">
                    </div>
                         <div class="row titulos col-md-12">
                <div class="col-md-10 bordert" id="SERIES_DESTACAS">
                    <h5><i class="far fa-star"></i> SERIES DESTACADAS</h5>
                </div>
                <div class="text-right col-md-2">
                    <a href="<?php base_url();?>home/mas?tipo=2&pagina=1&categoria=Todas&genero=Todas&desde=1900&hasta=2099">
                        <button class="btn mas btn-dark" style=""><b><i class="fas fa-plus"></i></b>
                        </button>
                    </a>
                </div>
            </div>
                <?php $i=0; foreach ($series as $key){
                if($i==0){
                    ?>
              <div class="col-md-6 series">
                    <div class="" id='destacadas'>
                        <a class="hovere" href="<?php echo base_url();?>home/detalle_series/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->nombre;?>">
                         <img src="<?=base_url().$key->imagen2;?>" class="img-fluid imglg"></a>
                        <span class="spanhovertag">
                  DESTACA <i class="far fa-star"></i>
                  </span>
                       <span class="spanhovertilte">
                  <?=$key->nombre;?> 
                  </span>
                    </div>
             </div>
                <div class="col-md-6">
                <div class="row">
                <?php }else{ ?>
                <div class="col-md-4 series">
                    <div class="" id='destacadas'>
                        <a class="hovere" href="<?php echo base_url();?>home/detalle_series/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->nombre;?>"> <img src="<?=base_url().$key->imagen2;?>" class="img-fluid imgsm"></a>
                        <span class="spanhovertag">
                  DESTACA <i class="far fa-star"></i>
                  </span>
                       <span class="spanhovertilte">
                  <?=$key->nombre;?> 
                  </span>
                    </div>
                </div>
            <?php } ?>
                <?php $i++;} ?>
                </div>
                </div>

                <div class="row titulos col-md-12">
                <div class="col-md-10 bordert" id="TEMPORADAS_RECIENTES">
                    <h5><i class="fab fa-cloudscale"></i> TEMPORADAS RECIENTES</h5>
                </div>
                <div class="text-right col-md-2">
                    <a href="<?php base_url();?>home/mas?tipo=2&pagina=1&categoria=Todas&genero=Todas&desde=1900&hasta=2099">
                        <button class="btn mas btn-dark" style=""><b><i class="fas fa-plus"></i></b>
                        </button>
                    </a>

                </div>
            </div>
                <?php foreach ($Temporadar as $key){?>
                <div class="col-md-3 series">
                    <div class="" id='temporadas_recientes'>
                        <a href="<?php echo base_url();?>home/detalle_series/<?=$key->id_serie?>" data-toggle="tooltip" title="<?=$key->nombre;?>"> <img src="<?=base_url().$key->imagen2;?>" class="img-fluid imgsm"></a>
                        <span class="spanhovertag">
                  ESTRENO <i class="far fa-clock"></i>
                  </span>
                       <span class="spanhovertilte">
                  <?=$key->nombre;?> 
                  </span>
                    </div>
                </div>
                <?php } ?>
<div class="row titulos col-md-12">
                <div class="col-md-10 bordert" id="PELICULAS_RECIENTES">
                    <h5><i class="fas fa-film"></i> PELÍCULAS RECIENTES</h5>
                </div>
                <div class="text-right col-md-2">
                    <a href="<?php base_url();?>home/mas?tipo=4&pagina=1&categoria=Todas&genero=Todas&desde=1900&hasta=2099">
                        <button class="btn mas btn-dark" style=""><b><i class="fas fa-plus"></i></b>
                        </button>
                    </a>
                </div>
            </div>
                <?php foreach ($peliculas as $key){?>
                <div class="col-lg-3 series">
                    <div class="" id='pelicula_recientes'>
                        <a href="<?php echo base_url();?>home/pelicula/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->nombre;?>"> <img src="<?=base_url().$key->imagen;?>" class="img-fluid imglg"></a>
                        <span class="spanhovertag">
                  ESTRENO <i class="far fa-clock"></i>
                  </span>
                       <span class="spanhovertilte">
                  <?=$key->nombre;?> 
                  </span>
                    </div>
                </div>
                <?php } ?>
                <div class="col-xs-12">
                 <img style="width:100%;" class="pd" src="<?=base_url();?>plantilla/website/img/1534667129353.jpg">
                    </div>

            </div>
            <div class="col-lg-3 news panel">
            <div class="row titulos ">
                <div class="col-xs-8 bordert" id="NOTICIAS">
                    <h5><i class="far fa-newspaper"></i> NOTICIAS</h5> </div>
                <div class=" col-xs-2">
                    <a href="<?php base_url();?>home/noticias">
                        <button class="btn mas btn-dark" style=""><b><i class="fas fa-plus"></i></b>
                        </button>
                    </a>
                </div>
            </div>

<div class="row  panel-body">
<?php foreach ($noticias as $key){?>
    <a class="link row" href="<?php echo base_url();?>home/noticia/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->titulo;?>">
          
               <div class="col-md-12  imgssm" style="background: url('<?=base_url().$key->imagen;?>');background-repeat: no-repeat;background-size: cover;">
                  
               </div>
                 <div class="col-12 titulares">
                <?=$key->titulo;?>
            </div>

             <!--  <div class="col-md-12" style="max-height:140px;overflow:hidden;">
                  <p  class="padding"><?=$key->descripcion_corta;?> </p>
               </div> -->
           </a>
                <?php } ?>
</div>

            </div>

        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>