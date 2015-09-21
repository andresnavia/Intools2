<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignar extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('grocery_CRUD_model');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

    public function CrearActividad()
		{
			$this->load->model('ModeloCliente');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			$this->load->view('Head');
			$this->load->view('component/CrearActividad');
		}

	public function CrearServicio()
		{
			$this->load->model('ModeloCliente');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			$this->load->view('Head');
			$this->load->view('component/CrearServicio');
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

			$data['id']=$this->input->post('Id');
			$data['nombre']=$this->input->post('Nom');
			$data['apellido']=$this->input->post('Ape');
			$data['telefono']=$this->input->post('Tel');
			$data['direccion']=$this->input->post('Dir');
			$data['email']=$this->input->post('Email');
			$data['calificacion']=$this->input->post('Cal');
			$data['cobrador']=$this->input->post('Cob');

			if($this->db->insert('clientes',$data))
				{
					redirect('client/Consultar');
				}
					
		}
}
