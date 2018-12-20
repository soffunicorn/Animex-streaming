<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCarrusel extends CI_Model {


	function lista($LIMIT=999999)
	{    
		$query = $this->db->query("SELECT * FROM `carrusel` LIMIT $LIMIT" );
		return $query->result();
	}

	 function eliminar($id)
	{    
		$query = $this->db->query("DELETE FROM `carrusel` WHERE id='$id'");
		return $query;
	}

	 function editar($titulo,$id)
	{    
		
		$url = date("Y-m-d");
		$query = $this->db->query("UPDATE `carrusel` Set titulo='$titulo', url='$url' WHERE `carrusel`.`id`='$id'");
		return $query;
	}

	 function crear($imagen,$titulo='',$posicion='',$url='')
	{    
		if ($posicion=='') {
			$var = '-1';
		}else{
			$var = $posicion;
		}
		
		$query = $this->db->query("SELECT * FROM `carrusel` WHERE posicion='$var'");
        
        if ($query->num_rows() == 0) {
        
            $query = $this->db->query("INSERT INTO `carrusel` (`titulo`, `imagen`,`posicion`, `url`) VALUES ('$titulo','$imagen','$posicion','$url')");
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
