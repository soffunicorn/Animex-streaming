
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MSerie extends CI_Model

{
	function lista()
	{
		$query = $this->db->query("SELECT * FROM `serie`");
		return $query->result();
	}

	

	function consultar($id)
	{
		$query = $this->db->query("SELECT * FROM `serie` WHERE id='$id'");
		return $query->result();
	}

	function eliminar($id)
	{
		$query = $this->db->query("DELETE FROM `serie` WHERE id='$id'");
		return $query;
	}

	function editar($nombre, $id)
	{
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `serie` Set nombre='$nombre', fecha_m='$fecha_m' WHERE `series`.`id`='$id'");
		return $query;
	}

	function editarimg($img, $id, $lugar = '')
	{
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `serie` Set imagen$lugar='$img', fecha_m='$fecha_m' WHERE `serie`.`id`='$id'");
		return $query;
	}

	function crear($nombre, $descripcion, $imagenurl, $categoria, $estado, $fecha, $dias, $duracion)
	{
		$query = $this->db->query("SELECT * FROM `serie` WHERE nombre='$nombre'");
		if ($query->num_rows() == 0)
		{
			$fecha_c = $fecha_m = date("Y-m-d");
			$query = $this->db->query("INSERT INTO `serie` (`nombre`,`descripcion`,`imagen`,`categoria`,`estado`,`fecha_estreno`, `dias`,`duracion`,`fecha_c`, `fecha_m`) VALUES ('$nombre','$descripcion','$imagenurl','$categoria','$estado','$fecha','$dias','$duracion','$fecha_c','$fecha_m')");
			if ($query == true)
			{
				$id = $this->db->insert_id();
				return $id;
			}
			else
			{
				return false;
			}
		}
		else
		{
			$id = false;
			return $id;
		}
	}

	function listades($LIMIT = false, $WHERE = '', $ORDEN = '')
	{
		if ($LIMIT != false)
		{
			$var = "$LIMIT";
		}
		else
		{
			$var = "";
		}

		if ($WHERE == '')
		{
			$WHERE = "";
		}
		else
		{
			$WHERE = "where $WHERE";
		}

		$sql = "SELECT * FROM `series_destacadas` INNER JOIN serie ON serie.id=series_destacadas.id_serie INNER JOIN serie_genero ON serie.id=serie_genero.id_serie $WHERE $ORDEN $var";
		$query = $this->db->query($sql);
		if ($var != '')
		{
			$query = $query->result();
		}

		return $query;
	}

	function listahome($LIMIT = false, $WHERE = '', $ORDEN = '')
	{
		if ($LIMIT != false)
		{
			$var = "$LIMIT";
		}
		else
		{
			$var = "";
		}

		if ($WHERE == '')
		{
			$WHERE = "";
		}
		else
		{
			$WHERE = "where $WHERE";
		}

		 $sql = "SELECT * FROM `serie` INNER JOIN serie_genero ON serie.id=serie_genero.id_serie $WHERE $ORDEN $var";
		$query = $this->db->query($sql);
		if ($var != '')
		{
			$query = $query->result();
		}

		return $query;
	}

	function setgenero($datos)
	{
		$this->db->insert('serie_genero', $datos);
	}
}

