<ul class="ul">
<li class="header">MENU DE ADMINISTRACION</li>
        <!-- Optionally, you can add icons to the links -->
           <li class="trw">
          <a href="<?=base_url();?>panel/carrusel"><i class="fa fa-language" aria-hidden="true"></i>
 <span>CARRUSEL</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-tv"></i> <span>SERIES</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url();?>panel/series"><b>Todas mis series</b></a></li>
            <li><a href="<?=base_url();?>panel/newserie">Nueva serie</a></li>
            <li><a href="<?=base_url();?>panel/generos">Géneros</a></li>
            <li><a href="<?=base_url();?>panel/categorias">Categorías</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#"><i class="fa fa-film"></i> <span>PELICULAS</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url();?>panel/peliculas"><b>Todas mis películas</b></a></li>
            <li><a href="<?=base_url();?>panel/newpelicula">Nueva Película</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#"><i class="fa fa-newspaper-o"></i><span>NOTICIAS</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
        <ul class="treeview-menu">
            <li><a href="<?=base_url();?>panel/noticias"><b>Todas mis Noticias</b></a></li>
            <li><a href="<?=base_url();?>panel/newnoticia">Crear Noticia</a></li>
          </ul>
        </li>
        <li class="trw">
          <a href="<?=base_url();?>panel/usuarios"><i class="fa fa-users"></i> <span>USUARIOS</span>
          </a>
        </li>
         <li class="treeview">
          <a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span>CONFIGURACIÓN</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url();?>panel/menus"><b>Menús</b></a></li>
            <li><a href="<?=base_url();?>panel/datos_sitio">Datos del sitio</a></li>
          </ul>
        </li>
      </ul>