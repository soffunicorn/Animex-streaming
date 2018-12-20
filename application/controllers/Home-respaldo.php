
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller

{

    // CONSTRUCTOR Funciones comunes usadas por el panel

    public

    function __construct()
    {
        parent::__construct();
        $this->load->model('MFunctionsg'); // CARGA LAS FUNCIONES GENERALES PARA EL Perfil
        $this->load->model('MDatos'); // CARGA LAS FUNCIONES GENERALES PARA EL Perfil
        $this->load->library('session'); // CARGA LAS SESSIONES
        $DATOS['datos'] = $this->MDatos->lista();
        $DATOS['datos'] = end($DATOS['datos']);
        $DATOS['user'] = $this->session->userdata('id'); // PASO LOS DATOS DEL USUARIO
        $this->load->view('website/header', $DATOS); //Mi carpeta y mi archivo que corresponden a la vista
    }

    // **PAGINA DE INICIO DEL HOME**

    public

    function index()
    {
        $this->load->model('MSerie'); // Carga el modelo de categorías
        $this->load->model('MCategoria'); // Carga el modelo de categorías
        $this->load->model('MGenero'); // Carga el modelo de categorías
        $this->load->model('MTemporada'); // Carga el modelo de categorías
        $this->load->model('MCapitulo'); // Carga el modelo de categorías
        $this->load->model('MCarrusel'); // Carga el modelo de categorías
        $this->load->model('MPelicula'); // Carga el modelo de categorías
        $DATOS['carrusel'] = $this->MCarrusel->lista(6);
        $DATOS['capitulo'] = $this->MCapitulo->listacap('LIMIT 6');
        $DATOS['series'] = $this->MSerie->listades('LIMIT 5');
        $DATOS['Temporadar'] = $this->MTemporada->recientes('LIMIT 10');
        $DATOS['peliculas'] = $this->MPelicula->recientes('LIMIT 10');
        $this->load->view('website/cuerpo-home', $DATOS);
        $this->load->view('website/footer');
    }

    public

    function detalle_series($id)
    {
        $this->load->model('MSerie'); // Carga el modelo de categorías
        $this->load->model('MCategoria'); // Carga el modelo de categorías
        $this->load->model('MGenero'); // Carga el modelo de categorías
        $this->load->model('MTemporada'); // Carga el modelo de categorías
        $this->load->model('MCapitulo'); // medidas de seguridad
        $csrf = array(
            'name' => $this->security->get_csrf_token_name() ,
            'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $consultas = $this->MSerie->consultar($id);
        $DATOS['serie'] = end($consultas);
        $DATOS['temporada'] = $this->MTemporada->lista($id);
        $DATOS['capitulo'] = $this->MCapitulo->lista($id);
         $DATOS['capitulos'] = $this->MCapitulo->listacap('LIMIT 6');
        $DATOS['categorias'] = $this->MCategoria->lista(); // consulta categorías existente
        $DATOS['generos'] = $this->MGenero->lista(); // consulta categorías existente
        $this->load->view('website/detalles_series', $DATOS);
        $this->load->view('website/footer');
    }

    public

    function mas_destacados($pagina = 1)
    {
        $this->load->model('MSerie'); // Carga el modelo de categorías
        $paginas = $this->MFunctionsg->pagina($this->MSerie->listades() , $pagina); //pg
        $DATOS['data'] = $this->MSerie->listades($paginas['limite']); // consulta paginada
        $DATOS['pagina'] = $paginas['pagina']; // valores para los botones
        $DATOS['total_paginas'] = $paginas['total_paginas']; // valores para los s
        $this->load->view('website/mas', $DATOS);
        $this->load->view('website/footer');
    }

    public

    function mas($tipo = 1, $genero = 'Todas', $desde = '1100-01-01', $hasta = '2090-01-01', $categoria = 'Todas', $orden = '1', $buscar = 'false', $pagina = '1')
    {
        $this->load->model('MSerie'); // Carga el modelo de categorías
        $this->load->model('MCategoria'); // Carga el modelo de categorías
        $this->load->model('MGenero'); // Carga el modelo de categorías
        $this->load->model('MTemporada'); // Carga el modelo de categorías
        $this->load->model('MCapitulo'); // medidas de seguridad
        $this->load->model('MPelicula'); // medidas de seguridad
        $DATOS['genero'] = $this->MGenero->lista();
        $DATOS['categoria'] = $this->MCategoria->lista();
        $where = '';
        $k = '';
        
       //Tabla que voy a usar segun el tipo de busqueda 
      
       

        if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        }
        if (isset($_GET['tipo'])) {
            $tipo = $_GET['tipo'];
        }

         if (($tipo == 1) or ($tipo == 5)){$tabla = 'serie';}if($tipo == 2){$tabla = 'temporada';} if ($tipo == 3) {$tabla = 'capitulo';}if ($tipo == 4){$tabla = 'peliculas';}

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
                $j= $tabla;
                if ($tipo==4) {
                    $j='pelicula';
                }else{
                    $j='serie';
                }
                $where.= "(".$j."_genero.id_genero='$genero')";
                $k = ' AND ';
            }
            $where.= $k . "($tabla.fecha_estreno>='$desde' AND ";
            $where.=  "$tabla.fecha_estreno<='$hasta')";
            $k = ' AND ';
               if ($tipo != 4) {
                if ($categoria != 'Todas') {
                    $where.= $k . "(serie.categoria='$categoria')";
                    $k = ' AND ';
                }
            }

        if ($tipo == 1) {
            $paginas = $this->MFunctionsg->pagina($this->MSerie->listahome(false, $where) , $pagina); //pg
            $DATOS['data'] = $this->MSerie->listahome($paginas['limite'], $where); // consulta paginada
        }

        if ($tipo == 2) {
            $paginas = $this->MFunctionsg->pagina($this->MTemporada->recientes(false,$where), $pagina, 3); //pg
            $DATOS['data'] = $this->MTemporada->recientes($paginas['limite'],$where); // consulta paginada
        }

        if ($tipo == 3) {
            $paginas = $this->MFunctionsg->pagina($this->MCapitulo->listacap(false,$where) , $pagina, 3); //pg
            $DATOS['data'] = $this->MCapitulo->listacap($paginas['limite'],$where); // consulta paginada
        }

        if ($tipo == 4) {
            $paginas = $this->MFunctionsg->pagina($this->MPelicula->recientes(false,$where) , $pagina, 3); //pg
            $DATOS['data'] = $this->MPelicula->recientes($paginas['limite'],$where); // consulta paginada
        }

        if ($tipo == 5) {
            $paginas = $this->MFunctionsg->pagina($this->MSerie->listades(false, $where) , $pagina, 3);
            $DATOS['data'] = $this->MSerie->listades($paginas['limite']); // consulta paginada
        }
        $DATOS['tipo']= $tipo;
        $DATOS['pagina'] = $paginas['pagina']; // valores para los botones
        $DATOS['total_paginas'] = $paginas['total_paginas']; // valores para los s
        $DATOS['url'] = base_url() . "Home/mas/$tipo/$genero/$desde/$hasta/$categoria/$orden/$buscar";
        $this->load->view('website/mas', $DATOS);
        $this->load->view('website/footer');
    }

    public

    function capitulo($id)
    {
        $this->load->model('MCapitulo'); // medidas de seguridad
        $DATOS['capitulos'] = $this->MCapitulo->listacap('LIMIT 6');
        $DATOS['capitulo'] = $this->MCapitulo->consultar($id);
        $this->load->view('website/capitulo', $DATOS);
        $this->load->view('website/footer');
    }
}

