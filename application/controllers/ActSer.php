<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActSer extends CI_Controller {

	public function index()
	{		
			$this->load->model('ModeloBitacora');
			$datos['activity']= $this->ModeloBitacora->Actividad();
			$datos['service']= $this->ModeloBitacora->Servicio();
			$datos['element']= $this->ModeloBitacora->Elemento();

			$this->load->view('ActSer',$datos);
	}

	

	public function InicioActividad($id=null){

		$this->load->model('ModeloActividad');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
			  $data = array(
		       		'id_actividad'=>$id
			    );

			if($this->db->insert('horas_actividad',$data))
				{
					redirect('Home/Actividad');
				}
	}

	public function PausaActividad($id=null){

		$this->load->model('ModeloActividad');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
			 $data = array(
		       		'hora2'=>$this->input->post('pausa')
		       		
			    );

			$this->db->where('horas_actividad.id_actividad',$id);
            $this->db->update('horas_actividad',$data);

					redirect('Home/Actividad');
	}


}
