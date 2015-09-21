<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {

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
			$this->load->model('ModeloServicio');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$data['EA'] = $this->ModeloServicio->EstadoA();
			$data['Resp'] = $this->ModeloServicio->Responsable();
			$data['Ser'] = $this->ModeloServicio->TServicio();
			$data['Asis'] = $this->ModeloServicio->Asistente();
			$data['Cli'] = $this->ModeloServicio->Clientes();

			$this->load->view('Head');
			$this->load->view('service/Crear',$data);
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
				
			$codbarra = date('Y').$letra2.$letra3.$letra4.$letra5.$this->input->post('servicio');
			
			$data = array(
					'codbarra'=>$codbarra,
					'tipo_servicio'=>$this->input->post('Ser'),
					'estado'=>$this->input->post('Est'),
					'responsable' => $session_data['id'],
					'asistente' => $this->input->post('Asis'),
					'cliente' => $this->input->post('Cli'),
					'maquina' => $this->input->post('Maq'),
					'descripcion' => $this->input->post('Desc'),
					'compromisos'=>$this->input->post('Comp')
			    );

			if($this->db->insert('servicio',$data))
				{
					redirect('Servicio/Consultar');
				}

		}

	public function LetraAleatoria(){
		$mis_letras = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N', 'O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$num_aleatorio = mt_rand(0, 25);
		return $mis_letras[$num_aleatorio];
	}

	public function Consultar()
		{
			$this->load->model('ModeloServicio');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			$datos['EA'] = $this->ModeloServicio->EstadoA();
			$datos['Resp'] = $this->ModeloServicio->Responsable();
			$datos['Ser'] = $this->ModeloServicio->TServicio();
			$datos['Asis'] = $this->ModeloServicio->Asistente();
			$datos['Cli'] = $this->ModeloServicio->Clientes();
			$datos['Componente']= $this->ModeloServicio->ComponentesUsados();
			$datos['service']= $this->ModeloServicio->Servicio();

			$this->load->view('Head');
			$this->load->view('service/Consultar',$datos);
			
		}

	public function Ver($id=null)
		{
			$this->load->model('ModeloServicio');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			

			/*$this->db->where('id',$id);
			$this->db->select('*');
			$datos['ser'] = $this->db->get('servicio')->result();*/


			$this->db->where('servicio.id',$id);
			$datos['ser']= $this->ModeloServicio->Servicio();

			$this->load->view('Head');
			$this->load->view('service/Ver',$datos);
		}

	public function Editar($id=null)
		{
			$this->load->model('ModeloServicio');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$this->db->where('id',$id);
			$datos['ser'] = $this->db->get('servicio')->result();

			$this->load->view('Head');
			$this->load->view('service/Editar',$datos);
		}

	public function Actualizar($id=null)
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
            $data = array(

					'tipo_servicio'=>$this->input->post('Ser'),
					'estado'=>$this->input->post('Est'),
					'asistente' => $this->input->post('Asis'),
					'cliente' => $this->input->post('Cli'),
					'maquina' => $this->input->post('Maq'),
					'descripcion' => $this->input->post('Desc'),
					'compromisos'=>$this->input->post('Comp')
			    );
            
            $this->db->where('id',$id);
            $this->db->update('servicio',$data);
            
            redirect('Servicio/Consultar');
		}


	public function Eliminar($id=null)
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$this->db->where('id',$id);
            $this->db->delete('servicio');
                redirect('Servicio/Consultar');
		}

	public function InsertarComponente()
		{	

			 $session_data = $this->session->userdata('logged_in');

			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
				
			
			$data = array(
					'id_servicio'=>$this->input->post('Ser'),
					'nom_componente'=>$this->input->post('Nom'),
					'cantidad' => $this->input->post('Can'),
					'descripcion'=>$this->input->post('Des')
			    );

			if($this->db->insert('componentes_serv',$data))
				{
					redirect('Servicio/Consultar');
				}

		}
	
	public function VerComponentes($id=null)
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			if($this->db->where('id_servicio ='."'".$id."'")) {
				$this->db->select('*');				
				$datos['comp'] = $this->db->get('componentes_serv')->result();

				$this->load->view('Head');
				$this->load->view('service/UsadosComponentes',$datos);
			}else{
				$datos['mensaje'] = 'No se han usuado componentes en esta Servicio';

				$this->load->view('Head');
				$this->load->view('service/UsadosComponentes',$datos);
			}

			
		}

}
