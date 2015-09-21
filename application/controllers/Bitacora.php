<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitacora extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('grocery_CRUD_model');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');

		     $session_data = $this->session->userdata('logged_in');
    }

     
	
    public function Crear()
		{
			$this->load->model('ModeloActividad');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$data['EA'] = $this->ModeloActividad->EstadoA();
			$data['Resp'] = $this->ModeloActividad->Responsable();
			$data['Act'] = $this->ModeloActividad->TActividad();
			$data['Asis'] = $this->ModeloActividad->Asistente();
			
			$this->load->view('Head');
			$this->load->view('activity/Crear',$data);
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
			$this->load->model('ModeloBitacora');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
			$datos['activity']= $this->ModeloBitacora->Actividad();
			$datos['service']= $this->ModeloBitacora->Servicio();
			$datos['element']= $this->ModeloBitacora->Elemento();


			$this->load->view('Head');
			$this->load->view('bitacora/Consultar',$datos);
			
		}

	public function Actividad()
		{
			$this->load->model('ModeloBitacora');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
			$datos['activity']= $this->ModeloBitacora->Actividad();

			$this->load->view('Head');
			$this->load->view('bitacora/Actividad',$datos);
			
		}

	public function Servicio()
		{
			$this->load->model('ModeloBitacora');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
			$datos['service']= $this->ModeloBitacora->Servicio();

			$this->load->view('Head');
			$this->load->view('bitacora/Servicio',$datos);
			
		}

	public function Elemento()
		{
			$this->load->model('ModeloBitacora');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
			$datos['element']= $this->ModeloBitacora->Elemento();

			$this->load->view('Head');
			$this->load->view('bitacora/Elemento',$datos);
			
		}

	public function Ver($id=null)
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			

			$this->db->where('id',$id);
			$this->db->select('*');
			$datos['user'] = $this->db->get('usuarios')->result();

			$this->load->view('Head');
			$this->load->view('activity/Ver',$datos);
		}

	public function Editar($id=null)
		{
			$this->load->model('ModeloUser');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$this->db->where('id',$id);
			$datos['user'] = $this->db->get('usuarios')->result();

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
		       		'nombre'=>$this->input->post('Nom'),
		       		'apellido'=>$this->input->post('Ape'),
		       		'telefono'=>$this->input->post('Tel'),
		       		'direccion'=>$this->input->post('Dir'),
		       		'email'=>$this->input->post('Email'),
					'username'=>$this->input->post('User'),
			        'idrol' => $this->input->post('Rol'),
					'estado' => $this->input->post('Est')
			    );
            
            $this->db->where('id',$id);
            $this->db->update('usuarios',$data);
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
