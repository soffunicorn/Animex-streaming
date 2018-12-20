<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    
    // CONSTRUCTOR Funciones comunes usadas por el panel 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MUser'); // Carga el modelo de usuarios
        $this->load->model('MFunctionsg'); // CARGA LAS FUNCIONES GENERALES PARA EL PANEL
        $this->load->library('session'); // CARGA LAS SESSIONES
    }
    
    public function crear_usuario()
    {
        // $this->load->model('MUser'); // Carga el modelo de usuarios
        
        // $id, $mail, $nickname, $nombre, $apellido, $nacimiento, $sexo,  $tipo
        $nombre     = $this->input->post('nombre');
        $apellido   = $this->input->post('apellido');
        $mail       = $this->input->post('mail');
        $nickname   = $this->input->post('nickname');
        $pass       = $this->input->post('pass');
        $nacimiento = $this->input->post('nacimiento');
        $sexo       = $this->input->post('sexo');
        $tipo       = $this->input->post('tipo');
        
        $var = $this->MUser->crear($nombre, $apellido, $mail, $nickname, $pass, $nacimiento, $sexo, $tipo); // 
        if ($var != false) {
            $response['status'] = 'ok';
            $response['code']   = "Edición hecha correctamente recargue la pagina para actualizar la tabla";
        } else {
            $response['status'] = 0;
            $response['error']  = 'No se edito correctamente';
        }
        echo json_encode($response);
        
    }
    
    public function editar_usuario()
    {
        
        // $id, $mail, $pass, $nombre, $apellido, $nacimiento, $sexo, $foto, $tipo
        $id         = $this->input->post('id');
        $mail       = $this->input->post('mail');
        $nombre     = $this->input->post('nombre');
        $apellido   = $this->input->post('apellido');
        $nacimiento = $this->input->post('nacimiento');
        $sexo       = $this->input->post('sexo');
        $tipo       = $this->input->post('tipo');
        
        $var = $this->MUser->editar_usuario($id, $mail,  $nombre, $apellido, $nacimiento, $sexo, $tipo); // 
        if ($var != false) {
            $id = $this->session->userdata('id');
            $consultas = $this->MUser->detalle($id->id);
            $consulta  = end($consultas); //funcion que me trae el ultimo registro de la consulta
            $data_login = array(
                'id'        => $consulta,
                'tipo'      => $consulta->tipo, 
                'login'     => TRUE
            ); 
            $this->session-> set_userdata($data_login); //se crea la sesion con los datod del 
            $response['status'] = 'ok';
            $response['code']   = "Datos editados exitosamente";
        } else {
            $response['status'] = 0;
            $response['error']  = ' Lo sentimos el correo que intenta colocar ya esta en uso por otro cuenta';
        }
        echo json_encode($response);
        
    }

    public function editar_nick()
    {         
        $id         = $this->input->post('id');      
        $nickname   = $this->input->post('nickname');
        $var = $this->MUser->editar_nick($id,$nickname);
        if ($var) {
            $id = $this->session->userdata('id');
            $consultas = $this->MUser->detalle($id->id);
            $consulta  = end($consultas); //funcion que me trae el ultimo registro de la consulta
            $data_login = array(
                'id'        => $consulta,
                'tipo'      => $consulta->tipo, 
                'login'     => TRUE
            ); 
            $this->session-> set_userdata($data_login); //se crea la sesion con los datod del 
            $response['status'] = 'ok';
            $response['code']   = "Nickname actualizado exitosamente";
        } else {
            $response['status'] = 0;
            $response['error']  = " Lo sentimos, $nickname ya está en uso por otro usuario";
        }
        echo json_encode($response);
    }
    
    public function eliminar_usuario($id)
    { 
        $var = $this->MUser->eliminar($id); // consulta series existente 
        if ($var == true) {
            header("Location:" . base_url() . "panel/usuarios");
            exit;
        }
    }
    
    public function editar_img()
    {
        $id        = $this->input->post('id');
        $imagen    = $_FILES['imagen'];
        //guardar fotos
        $mensaje   = '';
        $imagenurl = $this->MFunctionsg->archivo($imagen, $mensaje, 'img', 'img');
         
        if ($imagenurl != false) {
            
            $var = $this->MUser->editar_img($imagenurl, $id); // 
            if ($var != false) {
                $id = $this->session->userdata('id');
                $consultas = $this->MUser->detalle($id->id);
                $consulta  = end($consultas); //funcion que me trae el ultimo registro de la consulta
                $data_login = array(
                'id'        => $consulta,
                'tipo'      => $consulta->tipo, 
                'login'     => TRUE
                 ); 
                $this->session-> set_userdata($data_login); //se crea la sesion con los datod del 
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

    public function editar_pass(){
         $id  = $this->input->post('id'); 
         $pass = $this->input->post('change-pass');
         $conpass = $this->input->post('confirm-pass');
         if ($pass === $conpass){
            $res = $this->MUser->editar_pass($pass);
            $response['status']== 'ok';
            $response['code']   = "Contraseña cambiada correctamente";
            }
            else
             $response['status']== 'not';
            $response['code']   = "La Contraseña no coincide"; 
         }
    }
    
    
    
    
    
    
    
    
    
    
}