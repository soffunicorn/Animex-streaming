<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MFunctionsg');
        $this->load->model('MDatos');
        $this->load->library('session');
        $DATOS['datos'] = $this->MDatos->lista();
        $DATOS['datos'] = end($DATOS['datos']);
        $DATOS['user']  = $this->session->userdata('id');
        $this->load->view('website/header', $DATOS);
    }
    
    
    public function index()
    {
        $this->load->model('MSerie');
        $this->load->model('MCategoria');
        $this->load->model('MGenero');
        $this->load->model('MTemporada');
        $this->load->model('MCapitulo');
        $this->load->model('MCarrusel');
        $this->load->model('MPelicula');
        $this->load->model('MNoticia');
        $DATOS['carrusel']   = $this->MCarrusel->lista(6);
        $DATOS['capitulo']   = $this->MCapitulo->listacap('LIMIT 6');
        $DATOS['series']     = $this->MSerie->listades('LIMIT 4');
        $DATOS['Temporadar'] = $this->MTemporada->recientes('LIMIT 10');
        $DATOS['peliculas']  = $this->MPelicula->recientes('LIMIT 10');
        $DATOS['noticias']   = $this->MNoticia->listanot('LIMIT 30');
        
         //$this->load->view('website/header2');
        $this->load->view('website/nav');
        $this->load->view('website/cuerpo-home', $DATOS);
        $this->load->view('website/footer');
    }
    
    public function detalle_series($id)
    {
        $this->load->model('MSerie');
        $this->load->model('MComentario_serie');
        $this->load->model('MFavorito_serie');
        $this->load->model('MLista_serie');
        $this->load->model('MGenero');
        
        $this->load->model('MCapitulo');
        $consultas      = $this->MSerie->consultar($id);
        $DATOS['serie'] = end($consultas);
        
        $csrf                 = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf']        = $csrf;
        $DATOS['capitulos']   = $this->MCapitulo->listacap('LIMIT 6');
        $DATOS['comentarios'] = $this->MComentario_serie->lista($id);
        $DATOS['capitulo']    = $this->MCapitulo->lista($id);
        $id_user = $this->session->userdata('id');
 
        if(isset($id_user->id)){
        $consultas2=$this->MFavorito_serie->lista($id,$id_user->id);
        $consultas3=$this->MLista_serie->lista($id,$id_user->id);

        if($consultas2->num_rows()!=0){
        $consultas2 = $consultas2->result();    
        $consulta2     =  end($consultas2);
        $DATOS['favoritos'] = $consulta2;
        }else{
        $DATOS['favoritos'] = false;
        }

       if($consultas3->num_rows()!=0){
        $consultas3 = $consultas3->result();    
        $consulta3     =  end($consultas3);
        $DATOS['id'] = $consulta3;
        }else{
        $DATOS['id'] = false;
        }






        }else{
        $DATOS['id'] = false;    
        $DATOS['favoritos'] = false;   
        }
        
        
        $this->load->view('website/detalles_series', $DATOS);
        $this->load->view('website/footer');
    }
    
    public function noticias($pagina = 1)
    {
        $this->load->model('MNoticia');
        $this->load->model('MCapitulo');
        $paginas                = $this->MFunctionsg->pagina($this->MNoticia->listanot(), $pagina);
        $DATOS['data']          = $this->MNoticia->listanot($paginas['limite']);
        $DATOS['pagina']        = $paginas['pagina'];
        $DATOS['total_paginas'] = $paginas['total_paginas'];
        $DATOS['url']           = base_url() . "Home/noticias";
        $DATOS['capitulos']     = $this->MCapitulo->listacap('LIMIT 6');
        //$this->load->view('website/header2');
        $this->load->view('website/nav');
        $this->load->view('website/noticias', $DATOS);
        $this->load->view('website/footer');
    }
    
    public function noticia($id)
    {
        $this->load->model('MNoticia');
        $DATOS['noticias'] = $this->MNoticia->listanot('LIMIT 6');
        $consultas         = $this->MNoticia->consultar($id);
        $DATOS['noticia']  = end($consultas);
        $this->load->view('website/noticia', $DATOS);
        $this->load->view('website/footer');
    }
    
    
    
    
    public function pelicula($id = '')
    {
        $this->load->model('MCapitulo');
        $this->load->model('MPelicula');
        $this->load->model('MPeliculaVideo');
        $this->load->model('MComentario_capitulo');
        $csrf                 = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf']        = $csrf;
        $DATOS['capitulos']   = $this->MCapitulo->listacap('LIMIT 6');
        $DATOS['comentarios'] = $this->MComentario_capitulo->lista($id);
        $DATOS['video']       = $this->MPeliculaVideo->lista($id);
        
        $consultas         = $this->MPelicula->consultar($id);
        $consulta          = end($consultas);
        $DATOS['pelicula'] = $consulta;
        
        $this->load->view('website/pelicula', $DATOS);
        $this->load->view('website/footer');
    }
    
    
    
    public function mas($tipo = 1, $genero = 'Todas', $desde = '1100-01-01', $hasta = '2090-01-01', $categoria = 'Todas', $orden = '1', $buscar = 'false', $pagina = '1')
    {
        $this->load->model('MSerie');
        $this->load->model('MCategoria');
        $this->load->model('MGenero');
        $this->load->model('MTemporada');
        $this->load->model('MCapitulo');
        $this->load->model('MPelicula');
        
        $DATOS['genero']    = $this->MGenero->lista();
        $DATOS['categoria'] = $this->MCategoria->lista();
        $where              = '';
        $k                  = '';
        
        
        
        
        if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        }
        if (isset($_GET['tipo'])) {
            $tipo = $_GET['tipo'];
        }
        
        if (($tipo == 1) or ($tipo == 5)) {
            $tabla = 'serie';
        }
        if ($tipo == 2) {
            $tabla = 'temporada';
        }
        if ($tipo == 3) {
            $tabla = 'capitulo';
        }
        if ($tipo == 4) {
            $tabla = 'peliculas';
        }
        
        if (isset($_GET['genero'])) {
            $genero = $_GET['genero'];
        }
        if (isset($_GET['desde'])) {
            $desde = $_GET['desde'] . '-01-01';
        }
        if (isset($_GET['hasta'])) {
            $hasta = $_GET['hasta'] . '-12-31';
        }
        if (isset($_GET['categoria'])) {
            $categoria = $_GET['categoria'];
        }
        if (isset($_GET['orden'])) {
            $orden = $_GET['orden'];
        }
        if (isset($_GET['buscar'])) {
        }
        
        if ($genero != 'Todas') {
            $j = $tabla;
            if ($tipo == 4) {
                $j = 'pelicula';
            } else {
                $j = 'serie';
            }
            $where .= "(" . $j . "_genero.id_genero='$genero')";
            $k = ' AND ';
        }
        $where .= $k . "($tabla.fecha_estreno>='$desde' AND ";
        $where .= "$tabla.fecha_estreno<='$hasta')";
        $k = ' AND ';
        if ($tipo != 4) {
            if ($categoria != 'Todas') {
                $where .= $k . "(serie.categoria='$categoria')";
                $k = ' AND ';
            }
        }
        
        if ($tipo == 1) {
            $paginas       = $this->MFunctionsg->pagina($this->MSerie->listahome(false, $where), $pagina);
            $DATOS['data'] = $this->MSerie->listahome($paginas['limite'], $where);
        }
        
        if ($tipo == 2) {
            $paginas       = $this->MFunctionsg->pagina($this->MTemporada->recientes(false, $where), $pagina, 3);
            $DATOS['data'] = $this->MTemporada->recientes($paginas['limite'], $where);
        }
        
        if ($tipo == 3) {
            $paginas       = $this->MFunctionsg->pagina($this->MCapitulo->listacap(false, $where), $pagina, 3);
            $DATOS['data'] = $this->MCapitulo->listacap($paginas['limite'], $where);
        }
        
        if ($tipo == 4) {
            $paginas       = $this->MFunctionsg->pagina($this->MPelicula->recientes(false, $where), $pagina, 3);
            $DATOS['data'] = $this->MPelicula->recientes($paginas['limite'], $where);
        }
        
        if ($tipo == 5) {
            $paginas       = $this->MFunctionsg->pagina($this->MSerie->listades(false, $where), $pagina, 3);
            $DATOS['data'] = $this->MSerie->listades($paginas['limite']);
        }
        $DATOS['tipo']          = $tipo;
        $DATOS['pagina']        = $paginas['pagina'];
        $DATOS['total_paginas'] = $paginas['total_paginas'];
        $DATOS['url']           = base_url() . "Home/mas/$tipo/$genero/$desde/$hasta/$categoria/$orden/$buscar";
        //$this->load->view('website/header2');
        $this->load->view('website/nav');
        
        $this->load->view('website/mas', $DATOS);
        $this->load->view('website/footer');
    }
    
    public function capitulo($id)
    {
        $this->load->model('MCapitulo');
        $this->load->model('MCapituloVideo');
        $this->load->model('MComentario_capitulo');
        $csrf                 = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf']        = $csrf;
        $DATOS['capitulos']   = $this->MCapitulo->listacap('LIMIT 6');
        $DATOS['comentarios'] = $this->MComentario_capitulo->lista($id);
        $DATOS['video']       = $this->MCapituloVideo->lista($id);
        $consultas            = $this->MCapitulo->consultar($id);
        $consulta             = end($consultas);
        $DATOS['capitulo']    = $consulta;
        $DATOS['capituloss']  = $this->MCapitulo->lista($consulta->id_serie);
        $this->load->view('website/capitulo', $DATOS);
        $this->load->view('website/footer');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}