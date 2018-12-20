<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PeliculaVideo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPeliculaVideo');
        $this->load->library('session');
    }
    

    public function eliminar_video($id,$id_pelicula)
    {
        $var = $this->MPeliculaVideo->eliminar($id);// consulta peliculas existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/viewpelicula/".$id_pelicula);
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

        $var = $this->MPeliculaVideo->editar($id, $url_video, $tipo);// 
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
        $id_pelicula   = $this->input->post('id_pelicula');
        $url_video   = $this->input->post('url_video');
        $tipo   = $this->input->post('tipo');
        
        $var = $this->MPeliculaVideo->crear($id_pelicula, $url_video, $tipo);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['code'] = "El video ha sido creado exitosamente, por favor recargue la pagina.";
        }else{
                $response['status'] = 0;
                $response['error'] = "Error al procesar los datos";
        }
        echo json_encode($response);
    }
}