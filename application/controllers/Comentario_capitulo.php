<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Comentario_capitulo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MComentario_capitulo');
        $this->load->library('session');
    }
    

     public function eliminar_comentario($id)
    {
        $var = $this->MComentario_capitulo->eliminar($id);// consulta comentario_capitulo existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/comentario_capitulo");
         exit; 
        }
    }

       public function editar_comentario()
    {
        $id = $this->input->post('id');
        $comentario = $this->input->post('comentario');
        $var = $this->MComentario_capitulo->editar($comentario,$id);// 
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
        $id_capitulo = $this->input->post('id_capitulo');
        $id_user = $this->input->post('id_user');
        
        
        $var = $this->MComentario_capitulo->crear($comentario,$id_capitulo,$id_user);// 
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