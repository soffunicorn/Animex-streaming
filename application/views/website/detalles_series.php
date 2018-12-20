<section id="detalle-seriexdxd">
    <div class="container detas">
        <div class="row">
            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-5">
                        <img src="<?=base_url().$serie->imagen;?>" class="img-fluid img-serie" />
                        <?php if(isset($user->id)){ ?>


                        <div class="reaccion">
                            <ul class="nav nav-bar fav">
                                <form id="me_gusta">
                                    <li class="nav-item">
                                        <button class="<?php if (isset($favoritos->id)) echo 'btn' ?> nav-link" id="favorite" title="Favorito" data-toggle="tooltip" type='submit'><i class="fas fa-heart" style="color:#FF0000;"></i></button>
                                        <input type="hidden" name="id_serie" id='id_serie' value="<?=$serie->id?>">
                                        <input type="hidden" name="id_user" id='id_user' value="<?=$user->id?>">
                                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">
                                        <?php if (isset($favoritos->id)) { ?>
                                        <input type="hidden" name="favoritos" id='favoritos' value="<?=$favoritos->id?>">
                                        <?php  }else{ ?>
                                        <input type="hidden" name="favoritos" id='favoritos' value="false">
                                        <?php  } ?>
                                    </li>
                                </form>






                                <li class="nav-item">

                                    <span class="navbar-text">
                                      <a href="#"  title="Calificacion" data-toggle="tooltip"><i class="fas fa-star" ></i>
                                      </a>
                                    </span>

                                    <span class="navbar-text">
                                      <a href="#" title="Calificacion" data-toggle="tooltip"  onclick="cambio(1)"><i class="fas fa-star" id="star"></i>
                                      </a>
                                    </span>

                                    <span class="navbar-text">
                                      <a href="#" title="Calificacion" data-toggle="tooltip"><i class="fas fa-star" ></i>
                                      </a>
                                    </span>

                                    <span class="navbar-text">
                                      <a href="#" title="Calificacion" data-toggle="tooltip"><i class="fas fa-star"></i>
                                      </a>
                                    </span>

                                    <span class="navbar-text"><a href="#" title="Calificacion" data-toggle="tooltip"><i class="fas fa-star" ></i></a></span>

                                </li>
                                    <form id="Lista">
                                    <li class="nav-item">
                                        <button class="<?php if (isset($id->id)) echo 'btn' ?> nav-link" id="Listas" title="Favorito" data-toggle="tooltip" type='submit'>Agregar a mi lista</button>
                                        <input type="hidden" name="id_serie" id='id_serie' value="<?=$serie->id?>">
                                        <input type="hidden" name="id_user" id='id_user' value="<?=$user->id?>">
                                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">
                                        <?php if (isset($id->id)) { ?>
                                        <input type="hidden" name="id" id='id' value="<?=$id->id?>">
                                        <?php  }else{ ?>
                                        <input type="hidden" name="id" id='id' value="false">
                                        <?php  } ?>
                                    </li>
                                </form>
                                </li>
                            </ul>
                            <script>
                                function cambio(number,var){
                                   var series = <?=$serie->id?>;
                                   var user = <?=$user->id?>;
                                   var parametros = {
                                   "series": series,
                                   "user": user,
                                   "var" : var,
                                   "number": number
                                   };
                                  $.ajax({
                                  data: parametros, //datos que se envian a traves de ajax
                                  url: '<?=base_url();?>Interanciones/califica_serie', 
                                  type: 'post', //método de envio
                                  success: function ( response ) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                  $( "#resultado" ).html( response );
                                  document.getElementById("star").style.color="#FFFF00";
                                  }
                                  });
                                   
                                }
                            </script>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="col-md-7" id="descripcion-p">
                        <div class="text-nun">
                            <h2 class="tit-anun">
                                <?=$serie->nombre;?>
                            </h2>
                        </div>
                        <p><b>Categorias:</b><br>
                            <?=$serie->categoria?>
                        </p>

                        <p class="status"><b>Estado:</b><br>
                            <?=$serie->estado?>
                        </p>

                        <p class="sipnosis"><b>Sinopsis:</b><br>
                            <?=$serie->descripcion;?>
                        </p>
                        <p><b>Dias de estreno de nuevos capitulos:</b><br>
                            <?=$serie->dias;?>
                        </p>
                        <p><b>Fecha de estreno de la serie:</b><br>
                            <?=$serie->fecha_estreno;?>
                        </p>
                        <p><b>Duración de los cápitulos:</b><br>
                            <?=$serie->duracion;?>
                        </p>





                    </div>

                </div>
            </div>
            <div class="col-md-4 anun">
                <div class="capitulos card">
                    <h3>Lista de capitulo</h3>

                    <div class="row text-center" style="color:#ff6414;margin-bottom:20px;">
                        <div class="col-6">
                            <b>#Capitulo / #Temporada</b>
                        </div>
                        <div class="col-6">
                            <b> Nombre </b>
                        </div>

                    </div>
                    <div>
                        <?php $cond=0; 
                  foreach ($capitulo as $key) {
                     if($cond!=$key->temporada){ $cond=$key->temporada; ?>
                        <div class="text-center col-12" id="temporada<?=$key->temporada;?>">
                            <b>Temporada numero <?=$key->temporada;?></b>
                        </div>
                        <?php } ?>
                        <div class="">
                            <a href="<?php echo base_url();?>home/capitulo/<?=$key->id?>"> 
                           <span class="col-6">
                           
                           <i class="fas fa-check-double"></i>Cap.<?=$key->numero;?>/Tem.<?=$key->temporada;?> 
                      
                           </span> 
                           <span class="col-6">
                            
                            <?=$key->nombre;?>   
                          
                           </span>
                          </a>

                        </div>
                        <?php } ?>
                    </div>



                </div>

            </div>


        </div>
    </div>
</section>
<section id="second-part-capi">
    <div class="container grey-capi">
        <div class="row">
            <div class="col-md-8">
                <h3 class="subt-capitulo">Comentarios</h3>
                <!--<p class="capitulo-text">"La mayoría del anime" mejores programas de comentario literario, compartir historias del hombre detrás de cada ACG trabaja con usted para darle otra forma de decir que la animación! </p>-->
                <div class="comentarios">
                    <?php foreach ($comentarios as $key) { ?>

                    <div class="row alert alert-warning" style="margin:10px;">
                        <div class="col-2">
                            <?php if($key->foto==''){ ?>
                            <img src="<?=base_url()?>file/img/user/default.png" class="rounded-circle img-fluid" />
                            <?php }else{ ?>
                            <img src="<?=base_url().$key->foto;?>" class="rounded-circle img-fluid" />
                            <?php } ?>
                        </div>
                        <div class="col-10">
                            <h5><b><?=$key->nombre;?></b></h5>
                            <p>
                                <?=$key->comentario;?>
                            </p>
                        </div>
                    </div>
                    <?php } ?>



                    <div class="row col-12">
                        <div class="col-md-3" style="padding:20px;">
                            <?php if(isset($user->foto)){ ?>
                            <?php if($user->foto==''){ ?>
                            <img src="<?=base_url()?>file/img/user/default.png" class="rounded-circle img-fluid" />
                            <?php }else{ ?>
                            <img src="<?=base_url().$user->foto;?>" class="rounded-circle img-fluid" />
                            <?php } ?>
                            <?php }else{ ?>
                            <img src="<?=base_url();?>file/img/user/default.png" class="rounded-circle img-fluid" />
                            <?php } ?>
                        </div>

                        <?php if(isset($user->id)){ ?>
                        <div class="col-md-9 comment-box">
                            <form id="comments">
                                <div class="form-group">
                                    <label for="comment">Comment:</label>
                                    <textarea class="form-control" rows="5" name="comentario" id="comentario"></textarea>
                                    <input type="hidden" name="id_serie" name="id_serie" value="<?=$serie->id?>">
                                    <input type="hidden" name="id_user" id="id_user" value="<?=$user->id?>">
                                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">
                                </div>
                                <div class="col-md-12" id="resultado" style="margin-top:15px;"></div>
                                <button class="btn btn-comentar " type="submit">Comentar</button>
                            </form>
                        </div>
                        <?php }else{ ?>
                        <div class="col-md-9 comment-box">
                            <p> Debe iniciar sección para poder comentar </p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                  <ul class="comen-regis">
                     <li><a href="#">Inciar sesion</a></li>
                     <li><a href="#">Registrarse</a></li>
                  </ul>
               </div>
               <div class="col-md-6">
                  <div class="contador"><span>0/300</span></div>
               </div>-->
            </div>
            <div class="col-md-4">
                <h4 class="subt-capitulo">Ultimos Capitulos</h4>
                <div class="row">

                    <?php foreach ($capitulos as $key) { ?>

                    <div class="col-md-6 img-text">
                        <a href="<?php echo base_url();?>home/capitulo/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->name;?> <?=$key->temporada;?>-<?=$key->numero;?>"> <img src="<?=base_url().$key->imagen2;?>" class="img-fluid "/></a>
                    </div>
                    <div class="col-md-6 img-text">
                        <a href="<?php echo base_url();?>home/capitulo/<?=$key->id?>" data-toggle="tooltip" title="<?=$key->name;?> <?=$key->temporada;?>-<?=$key->numero;?>"><b><?=$key->name;?> </b>
                  <br><b>Temp:</b><?=$key->temporada;?>-<b>Cap:</b><?=$key->numero;?> <i class="far fa-clock"></i></a>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- NUEVAS generoS -->
<script>
    jQuery(document).ready(function() {
    jQuery("#me_gusta").submit(function(event) {
        event.preventDefault();

        var msj = '1';
        //validaciones con js

        if (msj === "1") {
            var formData = new FormData(jQuery('#me_gusta')[0]);
            jQuery.ajax({
                    url: '<?=base_url();?>Interanciones/Favorito_serie',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: formData,

                })
                .done(function(data, textStatus, jqXHR) {
                    var getData = jqXHR.responseJSON; // dejar esta linea
                    if (data.status == 'ok') {
                        var element = document.getElementById("favorite");
                        element.classList.add("btn");
                        $("#favoritos").val(data.resultado);
                    } else {
                        var element = document.getElementById("favorite");
                        element.classList.remove("btn");
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
    jQuery("#Lista").submit(function(event) {
        event.preventDefault();

        var msj = '1';
        //validaciones con js

        if (msj === "1") {
            var formData = new FormData(jQuery('#Lista')[0]);
            jQuery.ajax({
                    url: '<?=base_url();?>Interanciones/lista_serie',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: formData,

                })
                .done(function(data, textStatus, jqXHR) {
                    var getData = jqXHR.responseJSON; // dejar esta linea
                    if (data.status == 'ok') {
                        var element = document.getElementById("Listas");
                        element.classList.add("btn");
                        $("#id").val(data.resultado);
                    } else {
                        var element = document.getElementById("Listas");
                        element.classList.remove("btn");
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
    jQuery("#comments").submit(function(event) {
        event.preventDefault();

        var msj = '1';
        //validaciones con js

        if (msj === "1") {
            var formData = new FormData(jQuery('#comments')[0]);
            jQuery.ajax({
                    url: '<?=base_url();?>Comentario_serie/crear_comentario',
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
                    if (data.status == 'ok') {
                        $("#resultado").html('<div class="alert alert-success">' + data.code + '</div>');
                        window.location.href = '<?=base_url();?>home/detalle_series/<?=$serie->id;?>';
                    } else {
                        $("#resultado").html('<div class="alert alert-danger"><strong>ERROR!</strong>' + data.error + '</div>');
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

}); //fin ready
</script>