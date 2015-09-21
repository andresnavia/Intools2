<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividad extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('grocery_CRUD_model');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');

		     $session_data = $this->session->userdata('logged_in');
    }

	public function Insertar()
		{	

			 $session_data = $this->session->userdata('logged_in');

			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$letra1 = $this->LetraAleatoria();
			$letra2 = $this->LetraAleatoria();
			$letra3 = $this->LetraAleatoria();
			$letra4 = $this->LetraAleatoria();
			$letra5 = $this->LetraAleatoria();
			$letra6 = $this->LetraAleatoria();
				
			$codbarra = date('Y').$letra2.$letra3.$letra4.$letra5.$this->input->post('actividad');
			
			$data = array(
					'codbarra'=>$codbarra,
					'actividad'=>$this->input->post('Act'),
					'estado'=>$this->input->post('Est'),
					'responsable' => $session_data['id'],
					'asistente' => $this->input->post('Asis'),
					'descripcion'=>$this->input->post('Desc')
			    );

			if($this->db->insert('Actividad',$data))
				{
					redirect('Actividad/Consultar');
				}

		}

	public function LetraAleatoria(){
		$mis_letras = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N', 'O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$num_aleatorio = mt_rand(0, 25);
		return $mis_letras[$num_aleatorio];
	}

	public function Consultar()
		{
			$this->load->model('ModeloActividad');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
			//$this->db->select('*');
			//$datos['activity'] = $this->db->get('actividad')->result();	
			//$datos['users'] = $this->db->get('usuarios')->result();
			//$datos['componentes']= $this->ModeloActividad->ComponentesUsados();
			$datos['EA'] = $this->ModeloActividad->EstadoA();
			$datos['Resp'] = $this->ModeloActividad->Responsable();
			$datos['Act'] = $this->ModeloActividad->TActividad();
			$datos['Asis'] = $this->ModeloActividad->Asistente();
			$datos['comp']= $this->ModeloActividad->ComponentesUsados();	
			$datos['activity']= $this->ModeloActividad->Actividad();

			$this->load->view('Head');
			$this->load->view('activity/Consultar',$datos);
			
		}

	public function Ver($id=null)
		{
			$this->load->model('ModeloActividad');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			

			$this->db->where('actividad.id',$id);
			$datos['activity']= $this->ModeloActividad->Actividad();

			$this->load->view('Head');
			$this->load->view('activity/Ver',$datos);
		}

	public function Editar($id=null)
		{
			$this->load->model('ModeloActividad');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$this->db->where('id',$id);
			$datos['act'] = $this->db->get('actividad')->result();

			$this->load->view('Head');
			$this->load->view('activity/Editar',$datos);
		}

	public function Actualizar($id=null)
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
            $data = array(
		       		'actividad'=>$this->input->post('Act'),
					'estado'=>$this->input->post('Est'),
					'asistente' => $this->input->post('Asis'),
					'descripcion'=>$this->input->post('Desc')
			    );
            
            $this->db->where('id',$id);
            $this->db->update('actividad',$data);
            redirect('Actividad/Consultar');
               
		}


	public function Eliminar($id=null)
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$this->db->where('id',$id);
            $this->db->delete('actividad');
                redirect('Actividad/Consultar');
		}

	public function InsertarComponente()
		{	

			 $session_data = $this->session->userdata('logged_in');

			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
				
			
			$data = array(
					'id_actividad'=>$this->input->post('Act'),
					'nom_componente'=>$this->input->post('Nom'),
					'cantidad' => $this->input->post('Can'),
					'descripcion'=>$this->input->post('Des')
			    );

			if($this->db->insert('componentes_act',$data))
				{
					redirect('Actividad/Consultar');
				}

		}
	
	public function VerComponentes($id=null)
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			if($this->db->where('id_actividad ='."'".$id."'")) {
				$this->db->select('*');				
				$datos['comp'] = $this->db->get('componentes_act')->result();

				$this->load->view('Head');
				$this->load->view('activity/ComponentesUsados',$datos);
			}else{
				$datos['mensaje'] = 'No se usuaron componentes en esta actividad';

				$this->load->view('Head');
				$this->load->view('activity/ComponentesUsados',$datos);
			}

			
		}

}
