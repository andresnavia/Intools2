<?php
	Class ModeloActividad extends CI_Model
	{

	    function Actividad()
	    {
	        $this->db-> select('actividad.*, tipo_actividad.nom_actividad,usuarios.nombre,usuarios.apellido,estado_actser.nom_actser');
	        $this->db-> from('actividad');
	       	$this->db-> join('usuarios', 'usuarios.id = actividad.responsable');
	       	$this->db-> join('tipo_actividad', 'tipo_actividad.id = actividad.actividad');
	       	$this->db-> join('estado_actser', 'estado_actser.id = actividad.estado');
	       	$this->db-> where('actividad.estado!=3');

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
	        $this->db-> select('componentes_act.*');
	        $this->db-> from('componentes_act');
	       	$this->db-> join('actividad', 'actividad.id = componentes_act.id_actividad');

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

	    function R()
		{
			$sql = $this->db->query('SELECT id,nombre FROM usuarios');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nombre;
			}
			return $data;
		}


	    function EstadoAE()
		{
			$sql = $this->db->query('SELECT id,nom_actser FROM estado_actser');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nom_actser;
			}
			return $data;
		}

		function EstadoA()
		{
			$session_data = $this->session->userdata('logged_in');
			$q = $this->db->query("SELECT * FROM actividad where estado=1 and responsable=".$session_data['id']);
			if($q -> num_rows() > 0){
				$sql = $this->db->query('SELECT id,nom_actser FROM estado_actser where id=2 or id=3');
				foreach ($sql ->result() as $r) {
					$data[$r->id] = $r->nom_actser;
				}
			}else{
					$sql = $this->db->query('SELECT id,nom_actser FROM estado_actser');
					foreach ($sql ->result() as $r) {
						$data[$r->id] = $r->nom_actser;
				}
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

		function TActividad()
		{
			$sql = $this->db->query('SELECT id,nom_actividad FROM tipo_actividad');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nom_actividad;
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


		function HorasAct()
	    {
	        $this->db-> select('*');
	        $this->db-> from('horas_actividad');

	       
	    }




	}

?>

