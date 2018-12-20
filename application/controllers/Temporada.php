<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Temporada extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MTemporada');
        $this->load->library('session');
    }
    

     public function eliminar_temporada($id,$id_serie)
    {
        $var = $this->MTemporada->eliminar($id);// consulta temporadas existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/viewserie/".$id_serie);
         exit; 
        }
    }

       public function editar_temporada()
    {
        $id = $this->input->post('id');
        $numero = $this->input->post('numero');
        $estreno = $this->input->post('fecha');
        $id_serie = $this->input->post('id_serie');
        $var = $this->MTemporada->editar($numero,$id,$estreno,$id_serie);// 
        if ($var != false) { 
              $response['status'] = 'ok';
              $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar la tabla";
        }else{
               $response['status'] = 0;
               $response['error']  = 'La Temporada ya existe';
        }
        echo json_encode($response); 
    }

       public function crear_temporada()
    {
        $numero = $this->input->post('numero');
        $id = $this->input->post('id_serie');
        $fecha = $this->input->post('fecha');
        $var = $this->MTemporada->crear($numero,$id,$fecha);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['code'] = "La temporada ha sido creada de forma";
        }else{
                $response['status'] = 0;
                $response['error'] = "Ya existe una temporada con este numero";
        }
        echo json_encode($response);
    }
}