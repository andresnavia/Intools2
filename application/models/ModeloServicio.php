<?php
	Class ModeloServicio extends CI_Model
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

	    function ComponentesUsados()
	    {
	        $this->db-> select('componentes_serv.*');
	        $this->db-> from('componentes_serv');
	       	$this->db-> join('servicio', 'servicio.id = componentes_serv.id_servicio');

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

	    public function General($tabla, $campo){

			$resultado = $this->db->get($tabla);

			if($resultado->num_rows() > 0){
	            foreach ($resultado->result_array() as $row) {
	                $datos[] = $row;
	            }
	            $result[] = '';
	            foreach ($datos as $valor) {
	                $result["{$valor['id']}"] = $valor[$campo]; //$valor['nombre'];
	            }
	            return $result;
	        }else{
	            return "<span>No hay $tabla creados!</span>
	                    | <a href='#'>Crear $tabla</a>";
	        }
		}

	    function Clientes()
		{
			$sql = $this->db->query('SELECT id,nom_cliente FROM clientes');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nom_cliente;
			}
			return $data;
		}


	    function EstadoA()
		{
			$sql = $this->db->query('SELECT id,nom_actser FROM estado_actser');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nom_actser;
			}
			return $data;
		}

		function Responsable()
		{
			$sql = $this->db->query('SELECT id,nombre,apellido FROM usuarios');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nombre." ".$r->apellido;;
			}
			return $data;
		}

		function TServicio()
		{
			$sql = $this->db->query('SELECT id,nom_servicio FROM tipo_servicio');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nom_servicio;
			}
			return $data;
		}

		function Asistente()
		{
			$sql = $this->db->query('SELECT id,nombre,apellido FROM usuarios');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nombre." ".$r->apellido;
			}
			return $data;
		}







	}

?>

