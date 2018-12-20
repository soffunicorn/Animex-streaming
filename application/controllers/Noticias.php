<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Noticias extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MNoticia');
        $this->load->library('session');
        $this->load->model('MFunctionsg'); // CARGA LAS FUNCIONES GENERALES PARA EL PANEL
        
    }
  
    
    
    public function eliminar_noticia($id)
    {
        $var = $this->MNoticia->eliminar($id); // consulta noticias existente 
        if ($var == true) {
            header("Location:" . base_url() . "panel/noticias");
            exit;
        }
    }
    
    public function editar_noticia()
    {
        // $titulo, $descripcion_corta,$contenido,$tag,$imagen,$portada
        $id     = $this->input->post('id');
        $id        = $this->input->post('id');
        $titulo      = $this->input->post('titulo');
        $descripcion_corta = $this->input->post('descripcion_corta');
        $contenido   = $this->input->post('contenido');
        $tag      = $this->input->post('tag');
        $imagen      = $_FILES['imagen'];
        $portada      = $_FILES['portada'];
        
        
        //guardar fotos
        $mensaje   = '';
        $imagenurl = $this->MFunctionsg->archivo($imagen, $mensaje, 'img', 'img');
        $portadaurl = $this->MFunctionsg->archivo($portada, $mensaje, 'img', 'img');
        
        $var    = $this->MNoticia->editar($id, $titulo, $descripcion_corta,$contenido,$tag,$imagenurl,$portadaurl); // 
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
        //guardar fotos
        $mensaje   = '';
        $imagenurl = $this->MFunctionsg->archivo($imagen, $mensaje, 'img', 'img');
        
        
        if ($imagenurl != false) {
            
            $var = $this->MNoticia->editar_img($id,$imagenurl); // 
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
    public function editar_portada()
    {
        $id        = $this->input->post('id');
        $portada    = $_FILES['portada'];
        //guardar fotos
        $mensaje   = '';
        $portadaurl = $this->MFunctionsg->archivo($portada, $mensaje, 'img', 'img');
        
        
        if ($portadaurl != false) {
            
            $var = $this->MNoticia->editar_portada($id,$portadaurl); // 
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
    
    
    public function crear_noticia()
    {
        // Recibe datos 
        // $titulo, $descripcion_corta,$contenido,$tag,$imagen,$portada
        $titulo      = $this->input->post('titulo');
        $descripcion_corta = $this->input->post('descripcion_corta');
        $contenido   = $this->input->post('contenido');
        $tag      = $this->input->post('tag');
        $imagen      = $_FILES['imagen'];
        $portada      = $_FILES['portada'];
        
        
        //guardar fotos
        $mensaje   = '';
        $imagenurl = $this->MFunctionsg->archivo($imagen, $mensaje, 'img', 'img');
        $portadaurl = $this->MFunctionsg->archivo($portada, $mensaje, 'img', 'img');
        
        
        if ($imagenurl != false) {

            if ($portadaurl != false) {
                # code...
            
                $var = $this->MNoticia->crear($titulo, $descripcion_corta, $contenido, $tag, $imagenurl, $portadaurl); // 
                if ($var != false) {
                    $response['status'] = 'ok';
                    $response['code']   = "La noticia ha sido creada de forma exitosa";
                } else {
                    $response['status'] = 0;
                    $response['error']  = "Ya existe una noticia con este nombre";
                }
            
            }
        } else {
            $response['status'] = 0;
            $response['error']  = $mensaje;
        }
        echo json_encode($response);
    }

}