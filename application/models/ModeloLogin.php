<?php
Class ModeloLogin extends CI_Model
{
    function login($username,$password )
    {
        $this -> db -> select('usuarios.*, roles.nombre_rol, estado_usuario.nombre_estado');
        $this -> db -> from('usuarios');
        $this -> db -> where('username = ' . "'" . $username . "'");
        $this -> db -> where('password = ' . "'" . $password . "'");
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

    function acciones($rol)
    {
        $this -> db -> select('accion.nombre, accion.url, accion.categoria');
        $this -> db -> from('accion');
        $this -> db -> where('rol_id = ' . $rol );
        $this -> db -> join('permisos', 'permisos.accion_id = accion.id');

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

}




/*
Class User extends CI_Model
{
    function datos( )
    {
        $this -> db -> select('servicio.*');
        $this -> db -> from('servicio');
        #$this -> db -> where('username = ' . "'" . $username . "'");
        #$this -> db -> where('password = ' . "'" . $password . "'");
        $this -> db -> join('responsable', 'responsable.id = servicio.responsable');
        #$this -> db -> join('estado', 'estado.id = responsable.estado');
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

}*/

?>
