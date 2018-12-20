<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLista_serie extends CI_Model {


	function lista($id_serie,$id_user="false")
	{    
	$sql = "SELECT lista_series.id AS 'id' FROM `lista_series`INNER JOIN user ON user.id=lista_series.id_user WHERE id_serie='$id_serie' AND id_user='$id_user'";
		$query = $this->db->query($sql);
		return $query;
	}


	 function editar($lista,$id)
	{    
		
		$query = $this->db->query("UPDATE `lista_series` Set lista='$lista',  WHERE `lista_series`.`id`='$id'");
		return $query;
	}

	 function crear($id,$id_serie,$id_user)
	{    
		$query = $this->db->query("SELECT * FROM `lista_series` WHERE id='$id'");
        if ($query->num_rows() == 0) {
           $sql = "INSERT INTO `lista_series` (`id_serie`, `id_user`) 
            	VALUES ('$id_serie','$id_user')";
            $query = $this->db->query($sql);
            if ($query == true) {
                $id = $this->db->insert_id();
                return $id; // 0
            } else {
                return false;
            }
        } else {
            	$query = $this->db->query("DELETE FROM `lista_series` WHERE id='$id'");
		        return false;
        }
	}
 


  }
