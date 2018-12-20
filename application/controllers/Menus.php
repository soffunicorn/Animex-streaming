<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MMenu');
        $this->load->library('session');
    }
    

     public function eliminar_menu($id)
    {
        $var = $this->MMenu->eliminar($id);// consulta menus existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/menus");
         exit; 
        }
    }

       public function editar_menu()
    {
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $url = $this->input->post('url');
        $id_menus = $this->input->post('id_menus');
        $posicion = $this->input->post('posicion');

        $var = $this->MMenu->editar($id, $nombre, $url, $id_menus, $posicion);// 
        if ($var != false) { 
              $response['status'] = 'ok';
              $response['code']   = " Edición hecha correctamente recargue la pagina para actualizar la tabla";
        }else{
               $response['status'] = 0;
               $response['error']  = ' Algo a salido mal, por favor verifique los datos ingresados';
        }
        echo json_encode($response); 
    }

       public function crear_menu()
    {
        $nombre = $this->input->post('nombre');
        $url = $this->input->post('url');
        $id_menus = $this->input->post('id_menus');
        $posicion = $this->input->post('posicion');

        $var = $this->MMenu->crear_menu($nombre, $url, $id_menus, $posicion);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['code'] = "La menu ha sido creada de forma";
        }else{
                $response['status'] = 0;
                $response['error'] = "Algo a salido mal, por favor verifique los datos ingresados";
        }
        echo json_encode($response);
    }
}