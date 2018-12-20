
    <div class="container clearfix" id="noticiad">
    <div class=" row">

        <div class="col-md-9 card-body">
        <?php if (isset($noticia)){ ?>
            <div class="title-new">
                <h2><b><?php echo $noticia->titulo; ?></b></h2>
            </div>    
            <div>
            <img class="img-fluid" src="<?=base_url().$noticia->portada;?>">
            </div>    
            <div class="entry">
                <?php echo $noticia->contenido; ?>
            </div>
            
        <?php } ?>           
        </div>
        <div class="col-md-3 row card-body">
            <h4 class="news-title navbar-text"><i class="fas fa-newspaper"></i> Noticias</h4> 
              <div class="text-right col-2">
                    <a href="<?php base_url();?>home/noticias">
                        <button class="btn mas btn-dark" style=""><b><i class="fas fa-plus"></i></b>
                        </button>
                    </a>
                </div>
    <?php foreach ($noticias as $key){?>
        <a class="link row" href="<?php echo base_url();?>home/noticia/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->titulo;?>">
            <div class="col-12 titulares">
                <?=$key->titulo;?>
            </div>
               <div class="col-md-12  imgssm" style="background: url('<?=base_url().$key->imagen;?>');background-repeat: no-repeat;background-size: cover;">
               </div>
               
                <?php } ?>
            </a>
            </div>
</div>
    </div>
