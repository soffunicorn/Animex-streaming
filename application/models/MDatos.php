<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDatos extends CI_Model {


	function lista()
	{    
		$query = $this->db->query("SELECT * FROM `st_datos` ");
		return $query->result();
	}
	

	 function eliminar($id)
	{    
		$query = $this->db->query("DELETE FROM `st_datos` WHERE id='$id'");
		return $query;
	}

	 function editar_datos($id,$nombre, $descripcion,$correo, $telefono)
	{    
		
		$query = $this->db->query("UPDATE `st_datos` Set nombre='$nombre', descripcion='$descripcion', correo='$correo', telefono='$telefono' WHERE `st_datos`.`id`='$id'");
		return $query;
	}

	 function crear_datos($nombre, $descripcion,$correo, $telefono)
	{    
		$query = $this->db->query("SELECT * FROM `st_datos` WHERE nombre='$nombre'");
        if ($query->num_rows() == 0) {
            $query = $this->db->query("INSERT INTO `st_datos` (`id`, `nombre`, `descripcion`, `logo`, `logo2`, `icon`,`correo`,`telefono`) VALUES (NULL,'$nombre', '$descripcion','','','','$correo','$telefono')");
        
        	return $query;
        } else {
            $id = false;
            return $id;
        }
	}
	function editar_icon($id, $icon){

		$query = $this->db->query("UPDATE `st_datos` Set icon='$icon' WHERE `st_datos`.`id`='$id'");
		return $query;

	}
	function editar_logo2($id, $logo2){

		$query = $this->db->query("UPDATE `st_datos` Set logo2='$logo2' WHERE `st_datos`.`id`='$id'");
		return $query;

	}
	function editar_logo($id, $logo){

		$query = $this->db->query("UPDATE `st_datos` Set logo='$logo' WHERE `st_datos`.`id`='$id'");
		return $query;

	}
 


  }
