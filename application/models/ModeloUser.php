<?php
	Class ModeloUser extends CI_Model
	{
	    function user()
	    {
	        $this -> db -> select('usuarios.*, roles.nombre_rol, estado_usuario.nombre_estado');
	        $this -> db -> from('usuarios');
	        $this -> db -> where('username = ' . "'" . $username . "'");
	        $this -> db -> where('contraseña = ' . "'" . $password . "'");
	        $this -> db -> join('roles', 'roles.id = usuarios.idrol');
	        $this -> db -> join('estado_usuario', 'estado_usuario.id = usuarios.estado');
	        $this -> db -> limit(1);

	        $query = $this -> db -> get();
	        if($query -> num_rows() == 1)
	            {
	                return $query->result();
	            }
	            else
	                {
	                    return false;
	                }
	    }

	    function Usuario()
	    {
	        $this -> db -> select('usuarios.*, roles.nombre_rol, estado_usuario.nombre_estado');
	        $this -> db -> from('usuarios');
	        $this -> db -> join('roles', 'roles.id = usuarios.idrol');
	        $this -> db -> join('estado_usuario', 'estado_usuario.id = usuarios.estado');

	        $query = $this -> db -> get();
	        if($query -> num_rows() > 0)
	            {
	                return $query->result();
	            }
	            else
	                {
	                    return false;
	                }
	    }
	    function Usuario2()
	   {
	        $this -> db -> select('usuarios.*, roles.nombre_rol, estado_usuario.nombre_estado');
	        $this -> db -> from('usuarios');
	        $this -> db -> join('roles', 'roles.id = usuarios.idrol');
	        $this -> db -> join('estado_usuario', 'estado_usuario.id = usuarios.estado');

	        $query = $this -> db -> get();
	        if($query -> num_rows() > 0)
	            {
	                return $query->result();
	            }
	            else
	                {
	                    return false;
	                }
	    }

	    function VerUsuario()
	    {
	        $this -> db -> select('usuarios.*, roles.nombre_rol, estado_usuario.nombre_estado');
	        $this -> db -> from('usuarios');
	        $this -> db -> join('roles', 'roles.id = usuarios.idrol');
	        $this -> db -> join('estado_usuario', 'estado_usuario.id = usuarios.estado');

	         $this -> db -> limit(1);

	        $query = $this -> db -> get();
	        if($query -> num_rows() == 1)
	            {
	                return $query->result();
	            }
	            else
	                {
	                    return false;
	                }
	    }
	   
	    public function VerRol($tabla, $campo){

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

		public function VerEstado($tabla, $campo){

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

		function getUsuarios()
		{
			$query = $this->db->get('usuarios');
			if($query->num_rows()>0)
			{
				foreach ($query->result() as $fila)
				{
					$data[] = $fila;
				}
					return $data;
			}
		}

			function getRoles()
		{
			$sql = $this->db->query('SELECT id,nombre_rol FROM roles');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nombre_rol;
			}
			return $data;
		}

		function getEstado()
		{
			$sql = $this->db->query('SELECT id,nombre_estado FROM estado_usuario');
			foreach ($sql ->result() as $r) {
				$data[$r->id] = $r->nombre_estado;
			}
			return $data;
		}


		public function EditarUsuario($id, $data){
			$this->db->where('id',$id);
			return $this->db->update('usuarios',$data);
		}

		






	}

?>
