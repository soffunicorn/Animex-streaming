<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MGenero extends CI_Model {


	function lista()
	{    
		$query = $this->db->query("SELECT * FROM `generos`");
		return $query->result();
	}

	 function eliminar($id)
	{    
		$query = $this->db->query("DELETE FROM `generos` WHERE id='$id'");
		return $query;
	}

	 function editar($nombre,$id)
	{    
		
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `generos` Set nombre='$nombre', fecha_m='$fecha_m' WHERE `generos`.`id`='$id'");
		return $query;
	}

	 function crear($nombre)
	{    
		$query = $this->db->query("SELECT * FROM `generos` WHERE nombre='$nombre'");
        if ($query->num_rows() == 0) {
        	$fecha_c = $fecha_m = date("Y-m-d"); // agarra las fechas
            $query = $this->db->query("INSERT INTO `generos` (`nombre`, `fecha_c`, `fecha_m`) VALUES ('$nombre','$fecha_c','$fecha_m')");
            if ($query == true) {
                $id = $this->db->insert_id();
                return $id; // 0
            } else {
                return false;
            }
        } else {
            $id = false;
            return $id;
        }
	}
 


  }
