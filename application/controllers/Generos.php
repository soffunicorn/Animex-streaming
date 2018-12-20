<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class generos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MGenero');
        $this->load->library('session');
    }
    

     public function eliminar_genero($id)
    {
        $var = $this->MGenero->eliminar($id);// consulta Generos existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/generos");
         exit; 
        }
    }

       public function editar_genero()
    {
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $var = $this->MGenero->editar($nombre,$id);// 
        if ($var != false) { 
              $response['status'] = 'ok';
              $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar la tabla";
        }else{
               $response['status'] = 0;
               $response['error']  = 'No se edito correctamente';
        }
        echo json_encode($response); 
    }

       public function crear_genero()
    {
        $nombre = $this->input->post('nombre');
        
        $var = $this->MGenero->crear($nombre);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['code'] = "La Genero ha sido creada de forma";
        }else{
                $response['status'] = 0;
                $response['error'] = "Ya existe una Genero con este nombre";
        }
        echo json_encode($response);
    }
}