<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MComentario_serie extends CI_Model {


	function lista($id)
	{    
		$query = $this->db->query("SELECT * FROM `comentario_serie`INNER JOIN user ON user.id=comentario_serie.id_user WHERE id_serie='$id'" );
		return $query->result();
	}

	 function eliminar($id)
	{    
		$query = $this->db->query("DELETE FROM `comentario_serie` WHERE id='$id'");
		return $query;
	}

	 function editar($comentario,$id)
	{    
		
		$query = $this->db->query("UPDATE `comentario_serie` Set comentario='$comentario',  WHERE `comentario_serie`.`id`='$id'");
		return $query;
	}

	 function crear($comentario,$id_serie,$id_user)
	{    
		$query = $this->db->query("SELECT * FROM `comentario_serie` WHERE comentario='$comentario'");
        if ($query->num_rows() == 0) {
        	$fecha_c = $fecha_m = date("Y-m-d"); // agarra las fechas
            $query = $this->db->query("INSERT INTO `comentario_serie` (`comentario`, `id_serie`, `id_user`) VALUES ('$comentario','$id_serie','$id_user')");
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
