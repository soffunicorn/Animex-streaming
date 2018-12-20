<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPelicula extends CI_Model {


	 function lista()
	{    
		$query = $this->db->query("SELECT * FROM `peliculas`");
		return $query->result();
	}

	 function recientes($LIMIT = false, $WHERE = '', $ORDEN = 'ORDER BY peliculas.fecha_c')
	{    
		if ($LIMIT!=false){$var="$LIMIT";}else{$var="";}
		if ($WHERE == ''){$WHERE="";}else{$WHERE="where $WHERE";}

		    $sql = "SELECT peliculas.id as 'id', peliculas.nombre, peliculas.imagen  FROM peliculas INNER JOIN pelicula_genero ON peliculas.id=pelicula_genero.id_pelicula  $WHERE $ORDEN $LIMIT ";
		       $query = $this->db->query($sql);
		 if ($var!='') {
		   	$query=$query->result();
		 }
		   return $query;
	}

	 function consultar($id)
	{    
		$query = $this->db->query("SELECT * FROM `peliculas` WHERE id='$id'");
		return $query->result();
	}

	 function eliminar($id)
	{    
		$query = $this->db->query("DELETE FROM `peliculas` WHERE id='$id'");
		return $query;
	}

	 function editar($id, $nombre, $descripcion, $duracion,$idioma,$direccion,$formato,$fecha_estreno)
	{    
		
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `peliculas` Set nombre='$nombre',descripcion='$descripcion', duracion='$duracion',idioma='$idioma',direccion='$direccion',formato='$formato',fecha_estreno='$fecha_estreno',fecha_m='$fecha_m' WHERE `peliculas`.`id`='$id'");
		return $query;
	}

	 function editarimg($id,$img)
	{    
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `peliculas` Set imagen='$img', fecha_m='$fecha_m' WHERE `peliculas`.`id`='$id'");
		return $query;
	}

	 function crear($nombre, $imagenurl, $descripcion, $duracion,$idioma,$direccion,$formato,$fecha_estreno)
	{    
		$query = $this->db->query("SELECT * FROM `peliculas` WHERE nombre='$nombre'");
        if ($query->num_rows() == 0) {
        	$fecha_c = $fecha_m = date("Y-m-d");

            $query = $this->db->query("INSERT INTO `peliculas`( `nombre`, `imagen`, `descripcion`, `duracion`, `idioma`, `direccion`, `formato`, `fecha_estreno`, `fecha_c`, `fecha_m`) VALUES ('$nombre','$imagenurl','$descripcion','$duracion','$idioma','$direccion','$formato','$fecha_estreno','$fecha_c','$fecha_m')");
            if ($query == true) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return false;
            }
        } else {
            $id = false;
            return $id;
        }
	}


    function setgenero($datos) {
        $this->db->insert('pelicula_genero', $datos);
    }
 


  }
