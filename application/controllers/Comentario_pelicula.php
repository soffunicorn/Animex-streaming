<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Comentario_pelicula extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MComentario_pelicula');
        $this->load->library('session');
    }
    

     public function eliminar_comentario($id)
    {
        $var = $this->MComentario_pelicula->eliminar($id);// consulta comentario_pelicula existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/comentario_pelicula");
         exit; 
        }
    }

       public function editar_comentario()
    {
        $id = $this->input->post('id');
        $comentario = $this->input->post('comentario');
        $var = $this->MComentario_pelicula->editar($comentario,$id);// 
        if ($var != false) { 
              $response['status'] = 'ok';
              $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar la tabla";
        }else{
               $response['status'] = 0;
               $response['error']  = 'No se edito correctamente';
        }
        echo json_encode($response); 
    }

       public function crear_comentario()
    {
        $comentario = $this->input->post('comentario');
        $id_pelicula = $this->input->post('id_pelicula');
        $id_user = $this->input->post('id_user');
        
        
        $var = $this->MComentario_pelicula->crear($comentario,$id_pelicula,$id_user);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['code'] = "La comentario ha sido creada de forma";
        }else{
                $response['status'] = 0;
                $response['error'] = "Ya existe una comentario con este comentario";
        }
        echo json_encode($response);
    }
}