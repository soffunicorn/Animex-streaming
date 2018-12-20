<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categorias extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MCategoria');
        $this->load->library('session');
    }
    

     public function eliminar_categoria($id)
    {
        $var = $this->MCategoria->eliminar($id);// consulta categorías existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/categorias");
         exit; 
        }
    }

       public function editar_categoria()
    {
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $var = $this->MCategoria->editar($nombre,$id);// 
        if ($var != false) { 
              $response['status'] = 'ok';
              $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar la tabla";
        }else{
               $response['status'] = 0;
               $response['error']  = 'No se edito correctamente';
        }
        echo json_encode($response); 
    }

       public function crear_categoria()
    {
        $nombre = $this->input->post('nombre');
        
        $var = $this->MCategoria->crear($nombre);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['code'] = "La categoría ha sido creada de forma";
        }else{
                $response['status'] = 0;
                $response['error'] = "Ya existe una categoría con este nombre";
        }
        echo json_encode($response);
    }
}