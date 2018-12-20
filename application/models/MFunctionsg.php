<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MFunctionsg extends CI_Model
{
    
    
    function comprobar_sesion($rev)
    {
        if ($rev !== true) {
            header("Location:" . base_url() . "login");
            exit;
        }
    }
    
    function comprobar_sesion2($rev)
    {
        if ($rev == true) {
            header("Location:" . base_url() . "perfil");
            exit;
        }
    }
    
    function comprobar_tipo($rev)
    {
        if ($rev != 1) {
            header("Location:" . base_url() . "perfi");
            exit;
            // echo $rev;
        }
    }
    
    function archivo($documento, &$mensaje, $file = '', $name = 'file')
    {
        $ruta                = "file/" . $file . "/"; //ruta carpeta donde queremos copiar las  
        $uploadfile_temporal = $documento['tmp_name']; // archivo a subir
        $size                = $documento['size']; // peso de archivo 
        $extencion           = new SplFileInfo($documento['name']); // Verifica la extensión 
        $uploadfile_nombre   = $ruta . $name . date("Y_m_d_s") . '.' . $extencion->getExtension(); //Guarda ruta y nombre
        if ($size < 20000000) {
            if (is_uploaded_file($uploadfile_temporal)) {
                move_uploaded_file($uploadfile_temporal, $uploadfile_nombre);
                return $uploadfile_nombre;
            } else {
                $mensaje = "error";
                return 0;
            }
        } else {
            $mensaje = "El archivo pesa mucho";
            return 0;
            
        }
    }
    
    function pagina($consultap, $pagina, $TAMANO_PAGINA = 10)
    {
        $num_total_registros = $consultap->num_rows();
        //Limito la busqueda
        $respuesta['pagina'] = $pagina;
        //examino la página a mostrar y el inicio del registro a mostrar
        if (!$pagina) {
            $inicio              = 0;
            $respuesta['pagina'] = $pagina = 1;
        } else {
            $inicio = ($pagina - 1) * $TAMANO_PAGINA;
        }
        //calculo el total de páginas
        
        $respuesta['total_paginas'] = ceil($num_total_registros / $TAMANO_PAGINA);
        $respuesta['limite']        = "LIMIT $inicio,$TAMANO_PAGINA";
        return $respuesta;
    }



    
}