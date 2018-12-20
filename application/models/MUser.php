<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUser extends CI_Model {


	 function perfil($id)
	{    
		$query = $this->db->query("SELECT * FROM `user` WHERE id = $id");
		return $query->result();
	}


	 function editar_usuario($id, $mail,$nombre, $apellido, $nacimiento, $sexo,  $tipo='0')
	{    


		$query = $this->db->query("SELECT * FROM `user` WHERE mail='$mail'"); //Selecciona la variable que tiene que ser distinta. El que dice email es la celda
        if ($query->num_rows() == 0) {  //Me pregunta si existe el email
    		# code...
		    $fecha_m = date("Y-m-d");
            $query = $this->db->query("UPDATE `user` Set mail ='$mail',  nombre = '$nombre', apellido = '$apellido', nacimiento = '$nacimiento', sexo = '$sexo', tipo = '$tipo', fecha_m = '$fecha_m' WHERE `user`.`id`='$id'");
            return $query;
        	
		} else {
           $query = $this->db->query("SELECT * FROM `user` WHERE id='$id'");
           $c = $query->result(); 
           $query = end($c); 
           if ($query->mail== $mail){ 
        		# code...
			    $fecha_m = date("Y-m-d");
	            $query = $this->db->query("UPDATE `user` Set mail ='$mail', nombre = '$nombre', apellido = '$apellido', nacimiento = '$nacimiento', sexo = '$sexo', tipo = '$tipo', fecha_m = '$fecha_m' WHERE `user`.`id`='$id'");
	            return $query;
            
            }else{ 
	            $id = false;
	            return $id;
        	}
        }

       
	}

	function editar_nick($id,$nickname){
	    
	    $query = $this->db->query("SELECT * FROM `user` WHERE nickname='$nickname'");
	    if ($query->num_rows() == 0) {
    		# code...
		    $fecha_m = date("Y-m-d");
            $query = $this->db->query("UPDATE `user` Set nickname = '$nickname', fecha_m = '$fecha_m' WHERE `user`.`id`='$id'");
            return $query;
    	}else{
    		$id = false;
    		return false;
    	}

	}

	function crear($nombre, $apellido, $mail, $nickname, $pass,   $nacimiento, $sexo,  $tipo)
	{    
		$query = $this->db->query("SELECT * FROM `user` WHERE mail='$mail'"); //Selecciona la variable que tiene que ser distinta. El que dice email es la celda
		if ($query->num_rows() == 0) {
			# code...
			$query2 = $this->db->query("SELECT * FROM `user` WHERE nickname='$nickname'");

	    	if ($query2->num_rows() == 0) {
				$fecha_m = date("Y-m-d");
				$query = $this->db->query("INSERT INTO `user` (`id`, `mail`, `nickname`, `pass`, `nombre`, `apellido`, `nacimiento`, `sexo`, `foto`, `tipo`, `fecha_c`, `fecha_m`) VALUES (NULL, '$mail', '$nickname', '$pass', '$nombre', '$apellido', '$nacimiento', '$sexo', '', '$tipo', '$fecha_m', '$fecha_m')");
				return $query;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}	
 
	 function consultar()
	{    
		$query = $this->db->query("SELECT * FROM `user` ");
		return $query->result();
    }

     function detalle($id)
	{    
		$query = $this->db->query("SELECT * FROM `user` WHERE id='$id'");
		return $query->result();
    }

     function eliminar($id)
	{    
		$query = $this->db->query("DELETE FROM `user` WHERE id='$id'");
		return $query;
	}

	function editar_img($img,$id)
	{    
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `user` Set foto='$img', fecha_m='$fecha_m' WHERE `user`.`id`='$id'");
		return $query;
	}

	function editar_pass($pass){
		$query = $this->db->query("SELECT * FROM `user` WHERE mail='$mail'");
	}

  }
