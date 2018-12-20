<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class series extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MSerie');
        $this->load->library('session');
        $this->load->model('MFunctionsg'); // CARGA LAS FUNCIONES GENERALES PARA EL PANEL
        
    }
  
    
    
    public function eliminar_serie($id)
    {
        $var = $this->MSerie->eliminar($id); // consulta series existente 
        if ($var == true) {
            header("Location:" . base_url() . "panel/series");
            exit;
        }
    }
    
    public function editar_serie()
    {
        $id     = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $var    = $this->MSerie->editar($nombre, $id); // 
        if ($var != false) {
            $response['status'] = 'ok';
            $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar la tabla";
        } else {
            $response['status'] = 0;
            $response['error']  = 'No se edito correctamente';
        }
        echo json_encode($response);
    }
    
    public function editar_imagen()
    {
        $id        = $this->input->post('id');
        $imagen    = $_FILES['imagen'];
        $lugar        = $this->input->post('lugar');
        //guardar fotos
        $mensaje   = '';
        $imagenurl = $this->MFunctionsg->archivo($imagen, $mensaje, 'img', 'img');
        
        
        if ($imagenurl != false) {
            
            $var = $this->MSerie->editarimg($imagenurl,$id,$lugar); // 
            if ($var != false) {
                $response['status'] = 'ok';
                $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar la tabla";
            } else {
                $response['status'] = 0;
                $response['error']  = 'No se edito correctamente';
            }
        } else {
            $response['status'] = 0;
            $response['error']  = $mensaje;
        }
        echo json_encode($response);
    }
    
    
    public function crear_serie()
    {
        // Recibe datos 
        $nombre      = $this->input->post('nombre');
        $descripcion = $this->input->post('content');
        $categoria   = $this->input->post('categoria');
        $estado      = $this->input->post('estado');
        $fecha       = $this->input->post('fecha');
        $dias        = $this->input->post('dias');
        $duracion    = $this->input->post('duracion');
        //$tipo = $this->input->post('tipo');
        $genero      = $this->input->post('genero');
        $imagen      = $_FILES['imagen'];
        
        //guardar fotos
        $mensaje   = '';
        $imagenurl = $this->MFunctionsg->archivo($imagen, $mensaje, 'img', 'img');
        
        
        if ($imagenurl != false) {
            
            $var = $this->MSerie->crear($nombre, $descripcion, $imagenurl, $categoria, $estado, $fecha, $dias, $duracion); // 
            if ($var != false) {
                $response['status'] = 'ok';
                $response['code']   = "La serie ha sido creada de forma";
            } else {
                $response['status'] = 0;
                $response['error']  = "Ya existe una serie con este nombre";
            }
            
            if ($var) {
                foreach ($genero as $key) {
                    $datos = array(
                        'id_serie' => $var,
                        'id_genero' => $key
                    );
                    $this->MSerie->setgenero($datos);
                }
            }
            
        } else {
            $response['status'] = 0;
            $response['error']  = $mensaje;
        }
        echo json_encode($response);
    }

}