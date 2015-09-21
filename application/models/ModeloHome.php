<?php
	Class ModeloHome extends CI_Model
	{

	    function Servicio()
	    {
	        $this->db-> select('servicio.*, tipo_servicio.nom_servicio,usuarios.nombre,usuarios.apellido,estado_actser.nom_actser,clientes.nom_cliente');
	        $this->db-> from('servicio');
	       	$this->db-> join('usuarios', 'usuarios.id = servicio.responsable');
	       	$this->db-> join('tipo_servicio', 'tipo_servicio.id = servicio.tipo_servicio');
	       	$this->db-> join('estado_actser', 'estado_actser.id = servicio.estado');
	       	$this->db-> join('clientes', 'clientes.id = servicio.cliente');


	        $query = $this->db->get();
	        if($query -> num_rows() > 0)
	            {
	                return $query->result();
	            }
	            else
	                {
	                    return false;
	                }
	    }

	    function Actividad()
	    {
	        $this->db-> select('actividad.*, tipo_actividad.nom_actividad,usuarios.nombre,usuarios.apellido,estado_actser.nom_actser');
	        $this->db-> from('actividad');
	       	$this->db-> join('usuarios', 'usuarios.id = actividad.responsable');
	       	$this->db-> join('tipo_actividad', 'tipo_actividad.id = actividad.actividad');
	       	$this->db-> join('estado_actser', 'estado_actser.id = actividad.estado');

	        $query = $this->db->get();
	        if($query -> num_rows() > 0)
	            {
	                return $query->result();
	            }
	            else
	                {
	                    return false;
	                }
	    }





	}

?>

