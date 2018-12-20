<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPeliculaVideo extends CI_Model {



	function lista($id_pelicula)
	{    

		// if ($id==false){$var='';}else{$var="INNER JOIN temporada ON temporada.id=pelicula.id_temporada INNER JOIN serie ON serie.id=temporada.id_serie WHERE serie.id='$id'";}
	    $query = $this->db->query("SELECT * FROM `pelicula_video` WHERE `id_pelicula` = '$id_pelicula' ");

		return $query->result();
	}
	 function eliminar($id)
	{    
		$query = $this->db->query("DELETE FROM `pelicula_video` WHERE id='$id'");
		return $query;
	}

	 function editar($id, $url_video, $tipo)
	{    
		
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `pelicula_video` Set url_video='$url_video', tipo = '$tipo', fecha_m='$fecha_m' WHERE `pelicula_video`.`id`='$id'");
		return $query;
	}

	 function crear($id_pelicula, $url_video, $tipo)
	{    
    	
    	$fecha_c = $fecha_m = date("Y-m-d");
        $query = $this->db->query("INSERT INTO `pelicula_video` (`id`, `id_pelicula`, `tipo`, `url_video`,  `fecha_c`, `fecha_m`) VALUES (NULL, '$id_pelicula', '$tipo', '$url_video', '$fecha_c', '$fecha_m')");
        	# code...
    	return $query;
	}

	// function ver($id){

	// 	$query = $this->db->query("SELECT * FROM `pelicula_video` WHERE id='$id'");
	// 	return $query->result();

	// }
 


  }
