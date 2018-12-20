<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MComentario_capitulo extends CI_Model {


	function lista($id)
	{    
		$query = $this->db->query("SELECT * FROM `comentario_capitulo`INNER JOIN user ON user.id=comentario_capitulo.id_user WHERE id_capitulo='$id'" );
		return $query->result();
	}

	 function eliminar($id)
	{    
		$query = $this->db->query("DELETE FROM `comentario_capitulo` WHERE id='$id'");
		return $query;
	}

	 function editar($comentario,$id)
	{    
		
		$query = $this->db->query("UPDATE `comentario_capitulo` Set comentario='$comentario',  WHERE `comentario_capitulo`.`id`='$id'");
		return $query;
	}

	 function crear($comentario,$id_capitulo,$id_user)
	{    
		$query = $this->db->query("SELECT * FROM `comentario_capitulo` WHERE comentario='$comentario'");
        if ($query->num_rows() == 0) {
        	$fecha_c = $fecha_m = date("Y-m-d"); // agarra las fechas
            $query = $this->db->query("INSERT INTO `comentario_capitulo` (`comentario`, `id_capitulo`, `id_user`) VALUES ('$comentario','$id_capitulo','$id_user')");
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
