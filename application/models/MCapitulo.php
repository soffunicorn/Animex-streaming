<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCapitulo extends CI_Model {


	function consultar($id)
	{
		$query = $this->db->query("SELECT capitulo.id, capitulo.id_temporada, capitulo.numero, capitulo.nombre, capitulo.duracion, capitulo.fecha_estreno, serie.nombre as 'nombre_serie', temporada.numero as 'numero_temporada', serie.id as 'id_serie' FROM `capitulo` INNER JOIN temporada ON temporada.id=capitulo.id_temporada INNER JOIN serie ON serie.id=temporada.id_serie WHERE capitulo.id='$id'");
		return $query->result();
	}


 
	 function lista($id=false)
	{    

		if ($id==false){$var='';}else{$var="INNER JOIN temporada ON temporada.id=capitulo.id_temporada INNER JOIN serie ON serie.id=temporada.id_serie WHERE serie.id='$id'";}
		    $query = $this->db->query("SELECT capitulo.id as 'id', id_temporada, capitulo.numero as 'numero', capitulo.nombre as 'nombre', capitulo.duracion, capitulo.fecha_estreno, capitulo.fecha_m, temporada.numero as 'temporada' FROM `capitulo` $var");
		return $query->result();
	}

	 function listacap($LIMIT=false,$WHERE='',$ORDEN='')
	{    
		if ($LIMIT!=false){$var="$LIMIT";}else{$var="";}
		if ($WHERE == ''){$WHERE="";}else{$WHERE="where $WHERE";}
		$sql ="SELECT capitulo.id as 'id', id_temporada, capitulo.numero as 'numero', capitulo.nombre as 'nombre', capitulo.duracion, capitulo.fecha_estreno, capitulo.fecha_m, temporada.numero as 'temporada', serie.imagen, serie.imagen2,serie.nombre as 'name' FROM `capitulo` INNER JOIN temporada ON temporada.id=capitulo.id_temporada INNER JOIN serie ON serie.id=temporada.id_serie INNER JOIN serie_genero ON serie.id=serie_genero.id_serie $WHERE $ORDEN $var";
		  $query = $this->db->query($sql);
		        if ($var!='') {
		   	    $query=$query->result();
		        }
		        return $query;
	}

	 function eliminar($id)
	{    
		$query = $this->db->query("DELETE FROM `Capitulo` WHERE id='$id'");
		return $query;
	}

	 function editar($numero,$id,$estreno)
	{    
		
		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `capitulo` Set numero='$numero',fecha_estreno='estreno' fecha_m='$fecha_m' WHERE `Capitulo`.`id`='$id'");
		return $query;
	}

	function editar_video($numero,$nombre, $fecha_estreno,$duracion,$id_temporada,$id){

		$fecha_m = date("Y-m-d");
		$query = $this->db->query("UPDATE `capitulo` Set numero='$numero',nombre = '$nombre', fecha_estreno='$fecha_estreno', duracion = '$duracion',id_temporada = '$id_temporada', fecha_m='$fecha_m' WHERE `Capitulo`.`id`='$id'");
		return $query;	
	}

	 function crear($id_temporada,$numero,$nombre,$duracion,$fecha_estreno)
	{    
		$query = $this->db->query("SELECT * FROM `capitulo` WHERE numero='$numero' and id_temporada='$id_temporada'");
        if ($query->num_rows() == 0) {
        	$fecha_c = $fecha_m = date("Y-m-d");
            $query = $this->db->query("INSERT INTO `capitulo` (`id_temporada`,`numero`,`nombre`,`duracion`,`fecha_estreno`,`fecha_c`, `fecha_m`) VALUES ('$id_temporada','$numero','$nombre','$duracion','$fecha_estreno','$fecha_c','$fecha_m')");
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
 


  }
