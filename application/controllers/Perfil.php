<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    // CONSTRUCTOR Funciones comunes usadas por el panel 
    public function __construct() {
        parent::__construct();
        $this->load->model('MFunctionsg'); // CARGA LAS FUNCIONES GENERALES PARA EL Perfil
        $this->load->library('session'); // CARGA LAS SESSIONES
        // VERIFICA QUE EL USER ESTE LOGUEADO (La función esta dentro de Mfuntionsg)

        $this->MFunctionsg->comprobar_sesion($this->session->userdata('login'));//Busca la variable de sesion que sea login2 
        $this->load->model('MDatos'); // CARGA LAS FUNCIONES GENERALES PARA EL Perfil
        $DATOS['datos'] = $this->MDatos->lista();
        $DATOS['datos'] = end($DATOS['datos']);
        $DATOS['user'] = $this->session->userdata('id'); // PASO LOS DATOS DEL USUARIO 
        $this->load->view('website/header', $DATOS);
    }
    
    // **PAGINA DE INICIO DEL HOME**
	public function index()
	{
		$this->load->view('website/perfil/perfil'); //Mi carpeta perfil archivo perfil
        $this->load->view('website/footer');

	}
    
  public function salir() {
        session_destroy();
        echo "<script>location.href ='" . base_url() . "';</script>";
    }
	  

  public function editar(){
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;

        $this->load->view('website/perfil/editar',$DATOS);
        $this->load->view('website/footer');
    }

    public function usuario($id){
            $this->load->model('MUser'); // Carga el modelo de usuario 
        $DATOS['user'] = $this->MUser->perfil($id);// Trae datos del perfil
        // SEGURIDAS
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
    }
    





}
