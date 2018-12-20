<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDestacadas extends CI_Model {




	function lista()
	{    
		$query = $this->db->query("SELECT * FROM `series_destacadas`");
		return $query->result();
	}

	 function eliminar($id)
	{    
		$query = $this->db->query("DELETE FROM `series_destacadas` WHERE id='$id'");
		return $query;
	}

	 function editar($nombre,$id)
	{    
		
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `series_destacadas` Set nombre='$nombre', fecha_m='$fecha_m' WHERE `series_destacadas`.`id`='$id'");
		return $query;
	}

	 function crear($id)
	{    
		$query = $this->db->query("SELECT * FROM `series_destacadas` WHERE id_serie='$id'");
        if ($query->num_rows() == 0) {
        	$fecha_c = $fecha_m = date("Y-m-d"); // agarra las fechas
            $query = $this->db->query("INSERT INTO `series_destacadas` (`id_serie`, `fecha_c`, `fecha_m`) VALUES ('$id','$fecha_c','$fecha_m')");
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
