<?php 

class modeloReportes extends CI_Model {

 
 public function get($tabla){


    if($tabla =='usuarios'){
          $this->db->select('id','nombre','apellido');
          $this->db->where('id = ' . "'" . $id . "'");
          $this->db->from($tabla);
          $this->db-> limit(1);
          $consulta=$this->db->get();
          $res= $consulta;        
            
          return $res;

  
    }

  }
  
}