<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Carrusel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MCarrusel');
        $this->load->library('session');
        $this->load->model('MFunctionsg');
    }
    

     public function eliminar_carrusel($id)
    {
        $var = $this->MCarrusel->eliminar($id);// consulta carrusels existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/carrusel");
         exit; 
        }
    }

       public function editar_carrusel()
    {
        $id = $this->input->post('id');
        $titulo = $this->input->post('titulo');
        $var = $this->MCarrusel->editar($titulo,$id);// 
        if ($var != false) { 
              $response['status'] = 'ok';
              $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar la tabla";
        }else{
               $response['status'] = 0;
               $response['error']  = 'No se edito correctamente';
        }
        echo json_encode($response); 
    }

       public function crear_carrusel()
    {

        $titulo = $this->input->post('titulo');
        $imagen      = $_FILES['imagen'];
        $posicion  = $this->input->post('posicion');
        $url  = $this->input->post('url');


        $mensaje   = '';
        $imagenurl = $this->MFunctionsg->archivo($imagen, $mensaje, 'img', 'img');
        
        
        if ($imagenurl != false) {

        $var = $this->MCarrusel->crear($imagenurl,$titulo,$posicion,$url);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['code'] = "La carrusel ha sido creada de forma";
        }else{
                $response['status'] = 0;
                $response['error'] = "Ya existe una carrusel con este titulo";
        }

         } else {
            $response['status'] = 0;
            $response['error']  = $mensaje;
        }
        echo json_encode($response);
    }
}