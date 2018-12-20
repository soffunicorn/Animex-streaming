<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCapituloVideo extends CI_Model {



	function lista($id_capitulo)
	{    

		// if ($id==false){$var='';}else{$var="INNER JOIN temporada ON temporada.id=capitulo.id_temporada INNER JOIN serie ON serie.id=temporada.id_serie WHERE serie.id='$id'";}
	    $query = $this->db->query("SELECT * FROM `capitulo_video` WHERE `id_capitulo` = '$id_capitulo' ");

		return $query->result();
	}
	 function eliminar($id)
	{    
		$query = $this->db->query("DELETE FROM `capitulo_video` WHERE id='$id'");
		return $query;
	}

	 function editar($id,  $url_video, $tipo, $provedor)
	{    
		
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `capitulo_video` Set url_video='$url_video', tipo = '$tipo', provedor = '$provedor', fecha_m='$fecha_m' WHERE `capitulo_video`.`id`='$id'");
		return $query;
	}

	 function crear($id_capitulo, $url_video, $tipo, $provedor)
	{    
    	
    	$fecha_c = $fecha_m = date("Y-m-d");
        $query = $this->db->query("INSERT INTO `capitulo_video` (`id`, `id_capitulo`, `url_video`, `tipo`, `provedor`, `fecha_c`, `fecha_m`) VALUES (NULL, '$id_capitulo', '$url_video', '$tipo', '$provedor', '$fecha_c', '$fecha_m')");
        	# code...
    	return $query;
	}

	// function ver($id){

	// 	$query = $this->db->query("SELECT * FROM `capitulo_video` WHERE id='$id'");
	// 	return $query->result();

	// }
 


  }
