<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDatos');
        $this->load->library('session');
        $this->load->model('MFunctionsg'); // CARGA LAS FUNCIONES GENERALES PARA EL PANEL

    }
    

     public function eliminar_datos($id)
    {
        $var = $this->MDatos->eliminar($id);// consulta menus existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/datos_sitio");
         exit; 
        }
    }

       public function editar_datos()
    {

        // $id,$nombre, $descripcion,$correo, $telefono
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $correo = $this->input->post('correo');
        $telefono = $this->input->post('telefono');

        $var = $this->MDatos->editar_datos($id,$nombre, $descripcion,$correo, $telefono);// 
        if ($var != false) { 
              $response['status'] = 'ok';
              $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar la tabla";
        }else{
               $response['status'] = 0;
               $response['error']  = 'No se edito correctamente';
        }
        echo json_encode($response); 
    }

       public function crear_datos()
    {
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $correo = $this->input->post('correo');
        $telefono = $this->input->post('telefono');

        $var = $this->MDatos->crear_datos($nombre, $descripcion,$correo, $telefono);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['code'] = "Los datos han sido guardados exitosamente";
        }else{
                $response['status'] = 0;
                $response['error'] = "Ya existen estos datos";
        }
        echo json_encode($response);
    }

    public function editar_icon()
    {
        $id        = $this->input->post('id');
        $icon    = $_FILES['icon'];
        //guardar fotos
        $mensaje   = '';
        $iconurl = $this->MFunctionsg->archivo($icon, $mensaje, 'img', 'img');
         
        if ($iconurl != false) {
            
            $var = $this->MDatos->editar_icon($id, $iconurl); // 
            if ($var != false) {
                $response['status'] = 'ok';
                $response['code']   = "Edición realizada correctamente";
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

    public function editar_logo2()
    {
        $id        = $this->input->post('id');
        $logo2    = $_FILES['logo2'];
        //guardar fotos
        $mensaje   = '';
        $logo2url = $this->MFunctionsg->archivo($logo2, $mensaje, 'img', 'img');
         
        if ($logo2url != false) {
            
            $var = $this->MDatos->editar_logo2($id, $logo2url); // 
            if ($var != false) {
                $response['status'] = 'ok';
                $response['code']   = "Edición realizada correctamente";
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

    public function editar_logo()
    {
        $id = $this->input->post('id');
        $logo = $_FILES['logo'];
        //guardar fotos
        $mensaje   = '';
        $logourl = $this->MFunctionsg->archivo($logo, $mensaje, 'img', 'img');
         
        if ($logourl != false) {
            
            $var = $this->MDatos->editar_logo($id, $logourl); // 
            if ($var != false) {
                $response['status'] = 'ok';
                $response['code']   = "Edición realizada correctamente";
            } else {
                $response['status'] = 0;
                $response['error']  = 'Ha ocurrido un error al procesar los datos';
            }
        } else {
            $response['status'] = 0;
            $response['error']  = $mensaje;
        }
        echo json_encode($response);
    }
}