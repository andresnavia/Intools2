<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('ModeloHome');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			$datos['activity']= $this->ModeloHome->Actividad();
			
			$this->load->view('Head');
			$this->load->view('home/Actividad',$datos);
	}
	public function Servicios()
	{
		$this->load->model('ModeloHome');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			$datos['service']= $this->ModeloHome->Servicio();
			
			$this->load->view('Head');
			$this->load->view('home/Servicio',$datos);
	}
	public function logout()
	{
    	$this->session->unset_userdata('logged_in');
    	$this->session->unset_userdata('permisos');

    	redirect('Home', 'refresh');
  	}

  	public function Consultar()
		{
			$this->load->model('ModeloActividad');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
			$datos['horas']= $this->ModeloActividad->HorasAct();
			$datos['activity']= $this->ModeloActividad->Actividad();

			$this->load->view('Head');
			$this->load->view('activity/Consultar',$datos);
			
		}


	public function InicioActividad($id=null){

		$this->load->model('ModeloActividad');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			date_default_timezone_set("America/Bogota");
			$data = array(
				
		    	'id_actividad'=>$id, 
		       	'fecha_inicio'=>date("Y-m-d"),
		       	'hora1'=>date("H:i:s"),
		       	'hora2'=>0
			); 

			if($this->db->insert('horas_actividad',$data))
				{
					redirect('Home/index');
				}
	}
	public function InicioActividad2($id=null){

			$this->load->model('ModeloActividad');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
			{
				redirect(base_url().'Login');
			}
			$this->db->select('ha.id, ha.id_actividad, ha.fecha_inicio, ha.hora1, ha.hora1');
			$this->db->from('horas_actividad ha, actividad a, usuarios u');
			$this->db->where('ha.hora2=0 AND ha.id_actividad=a.id AND a.responsable='.$session_data['id']);
			$query = $this->db->get();
			if($query -> num_rows() > 0)
			{
				echo "<script>alert('Ya se inicio esta Actiidad');
				document.location='http://localhost/Intools2'; </script>";  
			}
			else
			{
				date_default_timezone_set("America/Bogota");
				$data = array(

					'id_actividad'=>$id, 
					'fecha_inicio'=>date("Y-m-d"),
					'hora1'=>date("H:i:s"),
					'hora2'=>0
					); 

				if($this->db->insert('horas_actividad',$data))
				{
					redirect('Home/index');
				}
			}

		}


		public function PausaActividad($id=null){
			$chora=date("Y-m-d");
			$this->load->model('ModeloActividad');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
			{
				redirect(base_url().'Login');
			}
			date_default_timezone_set("America/Bogota");
			$data = array(

	    	//'id_actividad'=>$id, 
	       	//'fecha_inicio'=>date("Y-m-d"),
				'hora2'=>date("H:i:s")
				); 
			$this->db->select('*');
			$this->db->from('horas_actividad');
			$this->db->where('horas_actividad.hora2=0 and horas_actividad.id_actividad='.$id);

			$query = $this->db->get();
			if($query -> num_rows() > 0){
			$this->db->where('horas_actividad.id_actividad',$id);
			$this->db->where('horas_actividad.fecha_inicio',$chora);
			$this->db->where('horas_actividad.hora2','0');
			$this->db->update('horas_actividad',$data);
			redirect('Home/index');
		}else{
			echo "<script>alert('Primero se debe iniciar una Actividad');
			document.location='http://localhost/Intools2'; </script>";  

		}
	}

}
