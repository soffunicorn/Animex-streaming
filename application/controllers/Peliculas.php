<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Peliculas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPelicula');
        $this->load->library('session');
        $this->load->model('MFunctionsg'); // CARGA LAS FUNCIONES GENERALES PARA EL PANEL
        
    }
  
    
    
    public function eliminar_pelicula($id)
    {
        $var = $this->MPelicula->eliminar($id); // consulta Peliculas existente 
        if ($var == true) {
            header("Location:" . base_url() . "panel/peliculas");
            exit;
        }
    }
    
    public function editar_pelicula()
    {
        // $id, $nombre, $descripcion, $duracion,$idioma,$direccion,$formato,$fecha_estreno
        $id     = $this->input->post('id');
        $nombre      = $this->input->post('nombre');
        $descripcion = $this->input->post('content');
        $duracion   = $this->input->post('duracion');
        $idioma      = $this->input->post('idioma');
        $direccion       = $this->input->post('direccion');
        $formato        = $this->input->post('formato');
        $fecha_estreno    = $this->input->post('fecha_estreno');
        
        $var    = $this->Mpelicula->editar($nombre, $id); // 
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
        // $lugar        = $this->input->post('lugar');
        //guardar fotos
        $mensaje   = '';
        $imagenurl = $this->MFunctionsg->archivo($imagen, $mensaje, 'img', 'img');
        
        
        if ($imagenurl != false) {
            
            $var = $this->MPelicula->editarimg($id,$imagenurl); // 
            if ($var != false) {
                $response['status'] = 'ok';
                $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar";
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
    
    
    public function crear_pelicula()
    {
        // Recibe datos 
        // $nombre, $imagenurl, $descripcion, $duracion,$idioma,$direccion,$formato,$fecha_estreno
        $nombre      = $this->input->post('nombre');
        $imagen      = $_FILES['imagen'];
        $descripcion = $this->input->post('content');
        $duracion   = $this->input->post('duracion');
        $idioma      = $this->input->post('idioma');
        $direccion       = $this->input->post('direccion');
        $formato        = $this->input->post('formato');
        $fecha_estreno    = $this->input->post('fecha_estreno');
        //$tipo = $this->input->post('tipo');
        $genero      = $this->input->post('genero');
        
        //guardar fotos
        $mensaje   = '';
        $imagenurl = $this->MFunctionsg->archivo($imagen, $mensaje, 'img', 'img');
        
        
        if ($imagenurl != false) {
            
            $var = $this->MPelicula->crear($nombre, $imagenurl, $descripcion, $duracion,$idioma,$direccion,$formato,$fecha_estreno); // 
            if ($var != false) {
                $response['status'] = 'ok';
                $response['code']   = "La pelicula ha sido creada de forma exitosa";
            } else {
                $response['status'] = 0;
                $response['error']  = "Ya existe una pelicula con este nombre";
            }
            
            if ($var) {
                foreach ($genero as $key) {
                    $datos = array(
                        'id_pelicula' => $var,
                        'id_genero' => $key
                    );
                    $this->MPelicula->setgenero($datos);
                }
            }
            
        } else {
            $response['status'] = 0;
            $response['error']  = $mensaje;
        }
        echo json_encode($response);
    }
}