<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Destacadas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDestacadas');
        $this->load->library('session');
    }
    

     public function eliminar($id)
    {
        $var = $this->MDestacadas->eliminar($id);// consulta destacadas existente 
        if ($var == true) {
         header("Location:" . base_url() . "panel/series");
         exit; 
        }
    }

     
       public function crear($id)
    {        
        $var = $this->MDestacadas->crear($id);// 
        if ($var == true) {
         header("Location:" . base_url() . "panel/series");
         exit; 
        }
      }
}