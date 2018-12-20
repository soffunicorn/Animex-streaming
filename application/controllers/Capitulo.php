<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Capitulo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MCapitulo');
        $this->load->library('session');
    }
    

     public function eliminar_capitulo($id,$id_serie)
    {
        $var = $this->MCapitulo->eliminar($id);// consulta capitulos existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/viewserie/".$id_serie);
         exit; 
        }
    }

       public function editar_capitulo()
    {
        $id = $this->input->post('id');
        $id_temporada   = $this->input->post('temporada');
        $numero   = $this->input->post('numero');
        $nombre   = $this->input->post('nombre');
        $duracion = $this->input->post('duracion');
        $fecha_estreno = $this->input->post('fecha_estreno');

        $var = $this->MCapitulo->editar_capitulo($numero,$nombre, $fecha_estreno,$duracion,$id_temporada,$id);// 
        if ($var != false) { 
              $response['status'] = 'ok';
              $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar la tabla";
        }else{
               $response['status'] = 0;
               $response['error']  = 'No se edito correctamente';
        }
        echo json_encode($response); 
    }

       public function crear_capitulo()
    {
        $id_temporada   = $this->input->post('temporada');
        $numero   = $this->input->post('numero');
        $nombre   = $this->input->post('nombre');
        $duracion = $this->input->post('duracion');
        $fecha_estreno = $this->input->post('fecha_estreno');
        
        $var = $this->MCapitulo->crear($id_temporada,$numero,$nombre,$duracion,$fecha_estreno);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['code'] = "La capitulo ha sido creada de forma";
        }else{
                $response['status'] = 0;
                $response['error'] = "Ya existe una capitulo con este numero";
        }
        echo json_encode($response);
    }
}