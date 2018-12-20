<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MAdmin');
        $this->load->library('session');
    }
    public function index()
    {   
        //TOTEN DE SEGURIDAD
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $this->load->view('admin/admin',$DATOS);
    }
    public function ingreso()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user      = $this->input->post('user');
            $password  = $this->input->post('password');
            $consultas = $this->MAdmin->consultar($user);
            $consulta  = end($consultas);
            if ($consulta != false) {
                if ($consulta->pass == $password) {
                    $data_login = array('id'        => $consulta,
                                        'login'     => TRUE);
                    $this->session-> set_userdata($data_login);
                    $response['status'] = 'ok';
                    $response['code']   = "Bienvenido";
                } else {
                    $response['status'] = 0;
                    $response['error']  = ' La contraseña es incorrecta';
                }
            } else {
                $response['status'] = 0;
                $response['error']  = ' El Usuario es incorrecto';
            }
            echo json_encode($response);
        }
    }
}