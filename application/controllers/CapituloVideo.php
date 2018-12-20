<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CapituloVideo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MCapituloVideo');
        $this->load->library('session');
    }
    

    public function eliminar_video($id,$id_capitulo)
    {
        $var = $this->MCapituloVideo->eliminar($id);// consulta capitulos existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/capitulo_video/".$id_capitulo);
         exit; 
        }
    }

    public function editar_video()
    {
        // $id,$id_capitulo, $url_video, $tipo, $provedor
        $id = $this->input->post('id');
        // $id_capitulo   = $this->input->post('id_capitulo');
        $url_video   = $this->input->post('url_video');
        $tipo   = $this->input->post('tipo');
        $provedor = $this->input->post('proveedor');       
        $var = $this->MCapituloVideo->editar($id, $url_video, $tipo, $provedor);// 
        if ($var != false) { 
              $response['status'] = 'ok';
              $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar la tabla";
        }else{
               $response['status'] = 0;
               $response['error']  = 'No se edito correctamente';
        }
        echo json_encode($response); 
    }

       public function crear_video()
    {
        // $id_capitulo, $url_video, $tipo, $provedor
        $id_capitulo   = $this->input->post('id_capitulo');
        $url_video   = $this->input->post('url_video');
        $tipo   = $this->input->post('tipo');
        $provedor = $this->input->post('proveedor');
        
        $var = $this->MCapituloVideo->crear($id_capitulo, $url_video, $tipo, $provedor);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['code'] = "La capitulo ha sido creado exitosamente, por favor recargue la pagina.";
        }else{
                $response['status'] = 0;
                $response['error'] = "Error al procesar los datos";
        }
        echo json_encode($response);
    }
}