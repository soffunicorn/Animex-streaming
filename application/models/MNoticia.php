
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MNoticia extends CI_Model

{
	function lista()
	{
		$query = $this->db->query("SELECT * FROM `noticias`");
		return $query->result();
	}

		 function listanot($LIMIT=false,$WHERE='',$ORDEN='order by id DESC')
	{    
		if ($LIMIT!=false){$var="$LIMIT";}else{$var="";}
		if ($WHERE == ''){$WHERE="";}else{$WHERE="where $WHERE";}
		$sql ="SELECT * FROM `noticias` $WHERE $ORDEN $var";
		  $query = $this->db->query($sql);
		        if ($var!='') {
		   	    $query=$query->result();
		        }
		        return $query;
	}

	

	function consultar($id)
	{
		$query = $this->db->query("SELECT * FROM `noticias` WHERE id='$id'");
		return $query->result();
	}

	function eliminar($id)
	{
		$query = $this->db->query("DELETE FROM `noticias` WHERE id='$id'");
		return $query;
	}

	function editar($id, $titulo, $descripcion_corta,$contenido,$tag,$imagen,$portada)
	{
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `noticias` Set titulo='$titulo',descripcion_corta='$descripcion_corta',contenido='$contenido',tag='$tag', imagen='$imagen', portada='$portada', fecha_m='$fecha_m' WHERE `noticias`.`id`='$id'");
		return $query;
	}

	function editar_portada($id, $portada)
	{
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `noticias` Set portada='$portada', fecha_m='$fecha_m' WHERE `noticias`.`id`='$id'");
		return $query;
	}
	function editar_img($id, $img)
	{
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `noticias` Set imagen='$img', fecha_m='$fecha_m' WHERE `noticias`.`id`='$id'");
		return $query;
	}

	function crear($titulo, $descripcion_corta,$contenido,$tag,$imagen,$portada)
	{
		$query = $this->db->query("SELECT * FROM `noticias` WHERE titulo='$titulo'");
		if ($query->num_rows() == 0)
		{
			$fecha_r = $fecha_m = date("Y-m-d");
			$query = $this->db->query("INSERT INTO `noticias`(`id`, `titulo`, `descripcion_corta`, `contenido`, `tag`, `imagen`, `portada`, `fecha_r`, `fecha_m`) VALUES (NULL,'$titulo','$descripcion_corta','$contenido','$tag','$imagen','$portada','$fecha_r','$fecha_m')");
							// $id = $this->db->insert_id();
				return $query;
			
		}
		else
		{
			return false;
		}
	}

	
}

