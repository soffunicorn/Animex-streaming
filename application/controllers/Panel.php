<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

    // CONSTRUCTOR Funciones comunes usadas por el panel 
    public function __construct() {
        parent::__construct();
        $this->load->model('MFunctionsg'); // CARGA LAS FUNCIONES GENERALES PARA EL PANEL
        $this->load->library('session'); // CARGA LAS SESSIONES
        // VERIFICA QUE EL USER ESTE LOGUEADO (La función esta dentro de Mfuntionsg)
        $this->MFunctionsg->comprobar_sesion($this->session->userdata('login')); 
        $this->MFunctionsg->comprobar_tipo($this->session->userdata('tipo')); 
        $DATOS['user'] = $this->session->userdata('id'); // PASO LOS DATOS DEL USUARIO 
        
        $this->load->view('panel/header', $DATOS);	// LLAMA AL LA SECCION DE VISTA NAV DE LA WEB
        $this->load->view('panel/menu/menu');
		$this->load->view('panel/menu/menufooter');	
    }
    
    // **PAGINA DE INICIO DEL HOME**
	public function index()
	{
		// PANEL
		$this->load->view('panel/footer');
	}

    public function salir() {
        session_destroy();
        echo "<script>location.href ='" . base_url() . "';</script>";
    }

    
    
    // **SERIES**


    public function series()
    {
        $this->load->model('Mserie'); // Carga el modelo de categorías 
        $this->load->model('MDestacadas'); // Carga el modelo de categorías 
        $DATOS['series'] = $this->Mserie->lista();// consulta categorías existente  
        $DATOS['destacadas'] = $this->MDestacadas->lista();
        // SEGURIDAS
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;

        $this->load->view('panel/secciones/series',$DATOS);
        $this->load->view('panel/footer'); 
    }

	public function newserie()
	{
		$this->load->model('MCategoria'); // Carga el modelo de categorías 
        $this->load->model('MGenero'); // Carga el modelo de categorías 
         // SEGURIDAS
      
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;

        $DATOS['categorias'] = $this->MCategoria->lista();// consulta categorías existente  
        $DATOS['generos'] = $this->MGenero->lista();// consulta categorías existente   	
        $this->load->view('panel/secciones/newserie', $DATOS );
		$this->load->view('panel/footer'); 
	}

    public function viewserie($id)
    {
        $this->load->model('Mserie'); // Carga el modelo de categorías 
        $this->load->model('MCategoria'); // Carga el modelo de categorías 
        $this->load->model('MGenero'); // Carga el modelo de categorías
        $this->load->model('MTemporada'); // Carga el modelo de categorías  
        $this->load->model('MCapitulo'); // Carga el modelo de categorías  
         // SEGURIDAS
        
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        
        $consultas = $this->Mserie->consultar($id);
        $DATOS['serie'] = end($consultas);

        $DATOS['temporada'] = $this->MTemporada->lista($id);
        $DATOS['capitulo'] = $this->MCapitulo->lista($id);
    

        $DATOS['categorias'] = $this->MCategoria->lista();// consulta categorías existente  
        $DATOS['generos'] = $this->MGenero->lista();// consulta categorías existente    
        $this->load->view('panel/secciones/viewseries', $DATOS );
        $this->load->view('panel/footer'); 
    }

    // CATEGORIAS
     public function categorias()
	{
		$this->load->model('MCategoria'); // Carga el modelo de categorías 
        $DATOS['categorias'] = $this->MCategoria->lista();// consulta categorías existente  
        // SEGURIDAS
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;

        $this->load->view('panel/secciones/categorias',$DATOS);
		$this->load->view('panel/footer'); 
	}

    public function carrusel()
    {
        $this->load->model('MCarrusel'); // Carga el modelo de categorías 
        $DATOS['Carrusel'] = $this->MCarrusel->lista();// consulta categorías existente  
        // SEGURIDAS
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;

        $this->load->view('panel/secciones/carrusel',$DATOS);
        $this->load->view('panel/footer'); 
    }


    //GENERO

	  public function generos()
	{
		$this->load->model('MGenero'); // Carga el modelo de categorías 
        $DATOS['generos'] = $this->MGenero->lista();// consulta categorías existente  
        // SEGURIDAS
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;

        $this->load->view('panel/secciones/generos',$DATOS);
		$this->load->view('panel/footer'); 
	}

    public function user()
    {
        $user = $this->session->userdata('id');
        $this->load->model('MUser'); // Carga el modelo de usuario 
        $DATOS['user'] = $this->MUser->perfil($user->id);// Trae datos del perfil
        // SEGURIDAS
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $this->load->view('panel/secciones/useredit',$DATOS);
        $this->load->view('panel/footer'); 
    }
 
    public function usuarios()
    {
        $this->load->model('MUser'); // Carga el modelo de usuario 
        $DATOS['datos'] = $this->MUser->consultar();// Trae datos del perfil
        // SEGURIDAS
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $this->load->view('panel/secciones/usuarios',$DATOS);
        $this->load->view('panel/footer'); 
    }

    public function usuario($id)
    {   
        $this->load->model('MUser'); // Carga el modelo de usuario 
        $DATOS['user'] = $this->MUser->perfil($id);// Trae datos del perfil
        // SEGURIDAS
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $this->load->view('panel/secciones/user',$DATOS);
        $this->load->view('panel/footer'); 
    }

    public function nuevo_usuario()
    {       
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $this->load->view('panel/secciones/newuser',$DATOS);
        $this->load->view('panel/footer'); 
    }

    public function menus(){

        $this->load->model('MMenu'); // Carga el modelo de menus 
        $DATOS['datos'] = $this->MMenu->lista();// Trae datos del menu
        $DATOS['menus'] = $this->MMenu->menus();// Trae datos del menu

        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $this->load->view('panel/secciones/menus',$DATOS);
        $this->load->view('panel/footer');


    }

    public function datos_sitio(){

        $this->load->model('MDatos'); // Carga el modelo de datos 
        $DATOS['datos'] = $this->MDatos->lista();// Trae datos de la tabla

         $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $this->load->view('panel/secciones/datos',$DATOS);
        $this->load->view('panel/footer');


    }
    public function capitulo_video($id){

        $this->load->model('MCapituloVideo'); // Carga el modelo de datos 
        $DATOS['datos'] = $this->MCapituloVideo->lista($id);// Trae datos de la tabla
        $DATOS['id'] = $id;// Trae datos de la tabla
        // $DATOS['capitulo'] = $this->MCapitulo->consultar($id);// Trae datos de la tabla


         $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $this->load->view('panel/secciones/videos',$DATOS);
        $this->load->view('panel/footer');


    }
    public function peliculas(){

        $this->load->model('MPelicula'); // Carga el modelo de datos 
        $DATOS['datos'] = $this->MPelicula->lista();// Trae datos de la tabla

         $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $this->load->view('panel/secciones/peliculas',$DATOS);
        $this->load->view('panel/footer');


    }

    public function newpelicula()
    {
        $this->load->model('MGenero'); // Carga el modelo de categorías 
         // SEGURIDAS
      
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;

        $DATOS['generos'] = $this->MGenero->lista();// consulta categorías existente    
        $this->load->view('panel/secciones/newpelicula', $DATOS );
        $this->load->view('panel/footer'); 
    }

    public function viewpelicula($id)
    {
        $this->load->model('MPelicula'); // Carga el modelo de categorías 
        $this->load->model('MPeliculaVideo'); // Carga el modelo de categorías 
        $this->load->model('MGenero'); // Carga el modelo de categorías
         // SEGURIDAS
        
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        
        $consultas = $this->MPelicula->consultar($id);
        $DATOS['pelicula'] = end($consultas);

        $DATOS['videos'] = $this->MPeliculaVideo->lista($id);


        $DATOS['generos'] = $this->MGenero->lista();// consulta categorías existente    
        $this->load->view('panel/secciones/viewpelicula', $DATOS );
        $this->load->view('panel/footer'); 
    }

    public function noticias()
    {
        $this->load->model('MNoticia'); // Carga el modelo de categorías 
         // SEGURIDAS
      
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;

        $DATOS['noticias'] = $this->MNoticia->lista();// consulta categorías existente    
        $this->load->view('panel/secciones/noticias', $DATOS );
        $this->load->view('panel/footer'); 
    }

    public function newnoticia(){

        $this->load->model('MGenero'); // Carga el modelo de categorías 
        $this->load->model('MNoticia'); // Carga el modelo de categorías 

         // SEGURIDAS
      
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        
        // $DATOS['noticia'] = $this->MNoticia->consultar();// consulta categorías existente    

        $DATOS['generos'] = $this->MGenero->lista();// consulta categorías existente    
        $this->load->view('panel/secciones/newnoticia', $DATOS );
        $this->load->view('panel/footer'); 
    }

    public function editnoticia($id){

        $this->load->model('MGenero'); // Carga el modelo de categorías 
        $this->load->model('MNoticia'); // Carga el modelo de categorías 

         // SEGURIDAS
      
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        
        $DATOS['noticia'] = $this->MNoticia->consultar($id);// consulta categorías existente    

        $this->load->view('panel/secciones/editnoticia', $DATOS);
        $this->load->view('panel/footer'); 
    }

}
