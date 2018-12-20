
       <div class="">
            <div class="banner">
               <img src="http://placehold.it/1400x250" class="img-responsive" style="width:100%">
            </div>
      </div>
      <nav class="text-center">
         
      </nav>
      <div class="container-fluid">
         <!-- Banner 900 x 150 -->
         <!-- FIN Banner 900 x 150 --> 
         <div class="container">
            <!-- Ultimos Carrousel -->
            <div class="row">
               <div class="col-md-6" style="margin-bottom:15px;">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
   <?php $i=0; foreach ($carrusel as $key) { ?>
    <li data-target="#myCarousel" data-slide-to="<?=$i;?>" <?php if($i==0) echo 'class="active"';?> ></li>
   <?php $i++; } ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
   <?php $i=0; foreach ($carrusel as $key) { ?>
    <div class="item  <?php if($i==0) echo 'active';?>">
      <img src="<?=base_url().$key->imagen;?>" style="height:247px;width:100%;">
    </div>
   <?php $i++; } ?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
               </div>
               <div class="col-md-6">
                  <div class="row">
                      <?php $i=0; foreach ($series as $key){ ?>
                     <div class="col-sm-4 mb-3">
                     <a href="<?php echo base_url();?>home/capitulo/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->nombre;?>"> 
                     <div style="height:113px; background:url('<?=base_url().$key->imagen2;?>');background-size:cover;overflow:hidden;border-radius:3px;" >
                     <div class="fondo panel-boby" style="background-color: rgba(0,0,0,0.3);height:100%;color:#fff;">
                     <span class="spanhovertag" style="position:absolute;bottom:3px;margin-left:3px;">
                     <?=$key->nombre;?>  <i class="far fa-clock"></i>
                     </span>
                     </div>
                     </div>
                     </a>
                     </div>
                    <?php } ?>
                    
                
                  </div>
               </div>
            </div>
            <div class="row">
               <!-- contenido -->
               <div id="Content" class="col-md-9">
                  <!-- noticias -->
                  <div class="row">
                     <div class="col-sm-12">
                        <h5 class="my-2"><i class="fas fa-award"></i>  Noticias Anime</h5>
                     </div>
                     <?php foreach ($noticias as $key){?>
                     <div class="col-md-3 col-sm-6 mb-4">
                         <a class="link row" href="<?php echo base_url();?>home/noticia/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->titulo;?>">
                        <img class="img-responsive img-rounded" src="<?=base_url().$key->imagen;?>" style="height:105px;width:100%" alt="">
                        <div>
                           <b class="card-title"><?=$key->titulo;?></b>
                           <p class="card-text"><small class="text-muted">Descripción text anime</small></p>
                        </div>
                        </a>
                     </div>
                      <?php } ?>
                     
                  </div>
                  <div class="programacion">
                     <h5 class="my-2"><i class="far fa-star"></i> Progrmacion</h5>
                     <table width="100%">
                        <tr>
                           <th>
                              Lunes
                           </th>
                           <th>
                              Martes
                           </th>
                           <th>
                              Miercoles
                           </th>
                           <th>
                              Jueves
                           </th>
                           <th>
                              Viernes
                           </th>
                           <th>
                              Sabado
                           </th>
                           <th>
                              Domingo
                           </th>
                        </tr>
                        <tr>
                           <td>
                              <img class="img-responsive mb-3 mb-md-0" src="http://placehold.it/750x340" alt="">
                           </td>
                           <td>
                              <img class="img-responsive mb-3 mb-md-0" src="http://placehold.it/750x340" alt="">
                           </td>
                           <td>
                              <img class="img-responsive mb-3 mb-md-0" src="http://placehold.it/750x340" alt="">
                           </td>
                           <td>
                              <img class="img-responsive mb-3 mb-md-0" src="http://placehold.it/750x340" alt="">
                           </td>
                           <td>
                              <img class="img-responsive mb-3 mb-md-0" src="http://placehold.it/750x340" alt="">
                           </td>
                           <td>
                              <img class="img-responsive mb-3 mb-md-0" src="http://placehold.it/750x340" alt="">
                           </td>
                           <td>
                              <img class="img-responsive mb-3 mb-md-0" src="http://placehold.it/750x340" alt="">
                           </td>
                        </tr>
                        <tr>
                           <td>
                              Purbea
                           </td>
                           <td>
                              Purbea
                           </td>
                           <td>
                              Purbea
                           </td>
                           <td>
                              Purbea
                           </td>
                           <td>
                              Purbea
                           </td>
                           <td>
                              Purbea
                           </td>
                           <td>
                              Purbea
                           </td>
                        </tr>
                     </table>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <h5 class="my-2"><i class="fas fa-award"></i>  Nuevos capitulos</h5>
                     </div>
                     <?php foreach ($capitulo as $key){?>
                     <div class="col-md-3 col-sm-6 mb-4">
                        <a href="<?php echo base_url();?>home/capitulo/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->name;?> <?=$key->temporada;?>-<?=$key->numero;?>"> 
                        <img style="height:105px;width:100%" class="img-responsive img-rounded" src="<?=base_url().$key->imagen2;?>">
                        
                        <div class="card-body" style="width: 18rem;">
                           <b class="card-title"><?=$key->name;?></b>
                         </div>
                         <div class="card-body" style="width: 18rem;">                            
                           <p class="card-text">Temp:<?=$key->temporada;?>-Cap:<?=$key->numero;?></p>
                        </div>
                        </a>
                     </div>
                     <?php } ?>
                  
                  </div>
                  <div class="public row">
                     <div class="col-sm-12">
                        <img src="http://placehold.it/1400x250" class="img-responsive" style="width:100%">
                     </div>
                  </div>
                  <!-- Series Destacadas -->
                  <div class="row">
                     <div class="col-md-6">
                        <h5 class="my-2"><i class="far fa-star"></i> Series Destacadas</h5>
                     </div>
                     <div class="col-md-6 text-right">
                        Ver mas
                     </div>
                     <div class="col-lg-12">
                        <div class="row">
                           <?php $i=0; foreach ($series as $key){
                           if($i==0){ ?>
                           <div class="col-lg-6">
                              <div class="">
                                 <img  height="600" class="img-responsive mb-3 mb-md-0 cuadro" src="http://placehold.it/750x340">
                              </div>
                           </div>

                            <div class="col-lg-6">
                              <div class="row">
                           <?php }else{ ?>
                          
                                 <div class="col-md-<?php if($i<6){echo '4';}else{echo '3';}?> col-sm-6 mb-4">
                                    <a href="#">
                                    <img class="img-responsive" src="<?=base_url().$key->imagen2;?>" alt="">
                                    </a>
                                    <div class="card-body" style="width: 18rem;">
                                       <h6 class="card-title">Anime Title</h6>
                                       <p class="card-text"><small class="text-muted">Descripción text anime</small></p>
                                    </div>
                                 </div>
                              
                          <?php } ?>
                         <?php $i++;} ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
                  <div class="row">
                     <div class="col-md-6">
                        <h5 class="my-2"><i class="far fa-star"></i> Peliculas Destacadas</h5>
                     </div>
                     <div class="col-md-6 text-right">
                        Ver mas
                     </div>
                     <div class="col-lg-12">
                        <div class="row">
                           <?php $i=0; foreach ($peliculas as $key){
                           if($i==0){ ?>
                           <div class="col-lg-5">
                              <div class="">
                                  <a href="<?php echo base_url();?>home/pelicula/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->nombre;?>">
                                 <img  class="img-responsive img-rounded cuadro" src="<?=base_url().$key->imagen;?>">
                                 </a>
                                 <div class="card-body" style="width: 18rem;">
                                     <?=$key->nombre;?> 
                                    </div>
                              </div>
                           </div>

                            <div class="col-lg-7">
                              <div class="row">
                           <?php }else{ ?>
                          
                                 <div class="col-md-<?php if($i<6){echo '4';}else{echo '3';}?> col-sm-6 mb-4">
                                    <a href="<?php echo base_url();?>home/pelicula/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->nombre;?>">
                                    <img class="img-responsive img-rounded" src="<?=base_url().$key->imagen;?>">
                                    </a>
                                    <div class="card-body" style="width: 18rem;">
                                     <?=$key->nombre;?> 
                                    </div>
                                 </div>
                              
                          <?php } ?>
                         <?php $i++;} ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
                  <!-- /.row -->
                  <!-- FIN Series -->
               </div>
               <!-- sidebar -->
               <div id="sidebar" class="col-md-3">
                <div class="public2">
                  <a href="#">
                        <img class="img-responsive" src="http://placehold.it/500x300" alt="">
                  </a>
               </div>
               <div class="recomendar_lateral">
               <div class="titlelateral"><b>Te recomendamos Ver </b></div>
                    <div class="recomendar_lateral_u">
                              <a href="#">
                              <img class="img-responsive" src="http://placehold.it/500x300" alt="">
                              </a>
                              <div class="card-body" style="width: 18rem;">
                                 <h6 class="card-title">Anime Title</h6>
                                 <p class="card-text"><small class="text-muted">Descripción text anime</small></p>
                              </div>
                     </div>
                       <div class="recomendar_lateral_u">
                              <a href="#">
                              <img class="img-responsive" src="http://placehold.it/500x300" alt="">
                              </a>
                              <div class="card-body" style="width: 18rem;">
                                 <h6 class="card-title">Anime Title</h6>
                                 <p class="card-text"><small class="text-muted">Descripción text anime</small></p>
                              </div>
                     </div>
                       <div class="recomendar_lateral_u">
                              <a href="#">
                              <img class="img-responsive" src="http://placehold.it/500x300" alt="">
                              </a>
                              <div class="card-body" style="width: 18rem;">
                                 <h6 class="card-title">Anime Title</h6>
                                 <p class="card-text"><small class="text-muted">Descripción text anime</small></p>
                              </div>
                     </div>
               </div>

                  </div>
               </div> <!-- FIN DE LA BARRA LATERA -->
            </div>
         </div>
      </div>
      <!-- /.container -->
      <!-- Footer -->
   
      <!-- Bootstrap core JavaScript -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </body>
</html>
