<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MFavorito_serie extends CI_Model {


	function lista($id_serie,$id_user="false")
	{    
	$sql = "SELECT favoritoS_serie.id AS 'id' FROM `favoritos_serie`INNER JOIN user ON user.id=favoritos_serie.id_user WHERE id_serie='$id_serie' AND id_user='$id_user'";
		$query = $this->db->query($sql);
		return $query;
	}


	 function editar($favorito,$id)
	{    
		
		$query = $this->db->query("UPDATE `favoritos_serie` Set favorito='$favorito',  WHERE `favoritos_serie`.`id`='$id'");
		return $query;
	}

	 function crear($id,$id_serie,$id_user)
	{    
		$query = $this->db->query("SELECT * FROM `favoritos_serie` WHERE id='$id'");
        if ($query->num_rows() == 0) {
           $sql = "INSERT INTO `favoritos_serie` (`id_serie`, `id_user`) 
            	VALUES ('$id_serie','$id_user')";
            $query = $this->db->query($sql);
             $id = $this->db->insert_id();
                
            if ($query == true) {
            	 $consultas = $this->db->query("SELECT puntos FROM `user` WHERE id='$id_user'");
                 $consultas=$consultas->result();
                 $consulta = end($consultas);
                 $puntos = $consulta->puntos + 10;
                 $this->db->query("UPDATE `user` Set puntos='$puntos' WHERE id='$id_user'");
                return $id; // 0
            } else {
                return false;
            }
        } else { 
            	$query = $this->db->query("DELETE FROM `favoritos_serie` WHERE id='$id'");
            	$consultas = $this->db->query("SELECT puntos FROM `user` WHERE id='$id_user'");
                $consultas=$consultas->result();
                $consulta = end($consultas);
                $puntos = $consulta->puntos - 10;
                $this->db->query("UPDATE `user` Set puntos='$puntos' WHERE id='$id_user'");
		        return false;
        }
	}
 


  }