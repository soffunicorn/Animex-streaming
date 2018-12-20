<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MFunctionsg');
        $this->load->model('MLogin');
        $this->load->library('session');
        $this->MFunctionsg->comprobar_sesion2($this->session->userdata('login'));
    }
    public function index()
    {
        $csrf          = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $this->load->view('login/login', $DATOS);
        
    }
    public function ingreso()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario   = $this->input->post('mail');
            $password  = $this->input->post('pass');
            $consultas = $this->MLogin->consultar($usuario);
            $consulta  = end($consultas);
            if ($consulta != false) {
                if ($consulta->pass == $password) {
                    $data_login = array(
                        'id' => $consulta,
                        'tipo' => $consulta->tipo,
                        'login' => TRUE
                    );
                    $this->session->set_userdata($data_login);
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
    
    
    
    
    public function registrar()
    {
        $csrf          = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $DATOS['csrf'] = $csrf;
        $this->load->view('login/registrar', $DATOS);
    }
    
    
    public function registrarme(){
        $this->load->model('MUser');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newuser     = $this->input->post('nombre');
            $apellido    = $this->input->post('apellido');
            $newmail     = $this->input->post('mail');
            $newpassword = $this->input->post('contrasena');
            $fecha_n     = $this->input->post('fecha_n');
            $sexo        = $this->input->post('sexo');
            
            $id = $this->MLogin->registrar($newuser, $apellido, $newmail, $newpassword, $fecha_n, $sexo);
            if ($id != false) {
                $consultas  = $this->MUser->consultar($id);
                $consulta   = end($consultas);
                $data_login = array(
                    'id' => $consulta,
                    'tipo' => $consulta->tipo,
                    'login' => TRUE
                );
                $this->session->set_userdata($data_login);
                require 'libreria/mailer/PHPMailer.php';
                require 'libreria/mailer/SMTP.php';
                require 'libreria/mailer/Exception.php';
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                
                $mail->IsSMTP();
                $mail->SMTPAuth   = true;
                $mail->SMTPSecure = "ssl";
                $mail->Host       = "smtp.gmail.com";
                $mail->Port       = 465;
                $mail->Username   = "edwin.jme@gmail.com";
                $mail->Password   = "Mandriva20499564";
                $mail->SetFrom('soporte@fet.org.ec', 'El Mejor Anime');
                $mail->Subject = "Bienvenido/a a FET";
                $mail->Body    = "hola";
                $mail->AltBody = "Plain text message";
                $destino       = $newmail;
                $mail->AddAddress($destino, $newuser);
                
                if ($mail->Send()) {
                    $response['status'] = 'ok';
                    $response['code']   = "El usuario ha sido creado exitosamente";
                } else {      
                    $response['status'] = 0;
                    $response['code']   = "No se mando el carro";
                }
            } else {
                $response['status'] = 0;
                $response['error']  = "Email existente. Pruebe con otro";
            }
            
            echo json_encode($response);
        } 
    }


public function resetPass()
    {
        $email = $this->input->get("email");
        $consultas = $this->MLogin->consultar($email);
        $consulta = end($consultas);
        if ($consulta != false){
            $config = Array(
                      'protocol' => 'smtp',
                      'smtp_host' => 'ssl://mail.fet.org.ec',
                      'smtp_port' => 465,
                      'smtp_user' => 'soporte@fet.org.ec',
                      'smtp_pass' => 'Fet2018$',
                      'crlf' => "\r\n",
                      'newline' => "\r\n"
                    );
            $this->load->library('email', $config);
                     $this->email->from('soporte@fet.org.ec', 'fet.com.ec');
                     $this->email->to($email);
            $this->email->subject('Bienvenido/a a FET');
                     $this->email->message('<h2> gracias por registrarte</h2><hr><br><br>
                     Tu nombre de usuario es: ' . $email . '.<br>Tu password es: '.$consulta->password);
            $this->email->send();
             $response['status'] = 'ok';
             $response['error'] = 'Se a enviado 1 correo con las instrucciones';
             echo json_encode($response);
        }else{
            $response['status'] = 0;
            $response['error'] = 'El email es incorrecto';
            echo json_encode($response);
        }
    }




    
}

