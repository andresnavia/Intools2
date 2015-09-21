<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('grocery_CRUD_model');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

    public function Crear()
		{
			$this->load->model('ModeloCliente');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			$this->load->view('Head');
			$this->load->view('client/Crear');
		}

	public function Consultar()
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}


			$this->db->select('*');
			$datos['cli'] = $this->db->get('clientes')->result();
			$this->load->view('Head');
			$this->load->view('Client/Consultar',$datos);
		}

	public function Insertar()
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$data['nit']=$this->input->post('Nit');
			$data['nom_cliente']=$this->input->post('Nom');
			$data['direccion']=$this->input->post('Dir');
			$data['contacto']=$this->input->post('Con');
			$data['telefono']=$this->input->post('Tel');
			$data['email']=$this->input->post('Email');
			
			if($this->db->insert('clientes',$data))
				{
					redirect('client/Consultar');
				}
					
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
			$datos['cli'] = $this->db->get('clientes')->result();

			$this->load->view('Head');
			$this->load->view('client/Ver',$datos);
		}

		public function Editar($id=null)
		{
			$this->load->model('ModeloCliente');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$this->db->where('id',$id);
			$datos['client'] = $this->db->get('clientes')->result();

			$this->load->view('Head');
			$this->load->view('client/Editar',$datos);
		}
		
	public function Actualizar($id=null)
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
            $data = array(
		       		'nit'=>$this->input->post('Nit'),
					'nombre'=>$this->input->post('Nom'),
					'direccion'=>$this->input->post('Dir'),
					'contacto'=>$this->input->post('Con'),
					'telefono'=>$this->input->post('Tel'),
					'email'=>$this->input->post('Email')
			    );
            
            $this->db->where('id',$id);
            $this->db->update('clientes',$data);
            redirect('client/Consultar');
		}

	public function Eliminar($id=null)
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$this->db->where('id',$id);
            $this->db->delete('clientes');
                redirect('Client/Consultar');
		}
}
