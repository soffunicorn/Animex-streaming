<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Interanciones extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MFavorito_serie');
        $this->load->model('MLista_serie');
        $this->load->library('session');
    }
    

    

       public function favorito_serie()
    {
        $id_serie   = $this->input->post('id_serie');
        $id_user   = $this->input->post('id_user');
        $favorito  = $this->input->post('favoritos');
        $var = $this->MFavorito_serie->crear($favorito,$id_serie,$id_user);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['resultado'] = $var;
        }else{
                $response['status'] = 0;
        }
        echo json_encode($response); 
    }

        public function lista_serie()
    {
        $id_serie   = $this->input->post('id_serie');
        $id_user   = $this->input->post('id_user');
        $id  = $this->input->post('id');
        $var = $this->MLista_serie->crear($id,$id_serie,$id_user);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['resultado'] = $var;
        }else{
                $response['status'] = 0;
        }
        echo json_encode($response); 
    }

          public function califica_serie()
    {
        $id_serie   = $this->input->post('id_serie');
        $id_user   = $this->input->post('id_user');
        $favorito  = $this->input->post('id');
        $var = $this->MFavorito_serie->crear($favorito,$id_serie,$id_user);// 
        if ($var != false) { 
                $response['status'] = 'ok';
                $response['resultado'] = $var;
        }else{
                $response['status'] = 0;
        }
        echo json_encode($response); 
    }

}