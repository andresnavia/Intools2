<?php
	Class ModeloCliente extends CI_Model
	{
	    function getCalificacion()
		{
			$sql = $this->db->query('SELECT id,nombre_calificacion FROM calificacion_cliente');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nombre_calificacion;
			}
			return $data;
		}

		function getCobrador()
		{
			$sql = $this->db->query('SELECT id,nombre,apellido FROM usuarios');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nombre." ".$r->apellido;
			}
			return $data;
		}


		

		






	}

?>
