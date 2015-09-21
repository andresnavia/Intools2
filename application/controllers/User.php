<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
			$this->load->model('ModeloUser');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$data['rolUser'] = $this->ModeloUser->getRoles();
			$data['estUser'] = $this->ModeloUser->getEstado();			
			$this->load->view('Head');
			$this->load->view('user/Crear',$data);
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
			$data['username']=$this->input->post('User');
			$data['password']=$this->input->post('Pass');
			$data['idrol']=$this->input->post('Rol');
			$data['estado']=$this->input->post('Est');

			if($this->db->insert('usuarios',$data))
				{
					redirect('user/Consultar');
				}

		}
		public function Consultar()
		{

			$this->load->model('ModeloUser');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			//$this->db->select('*');

			//$datos['users'] = $this->db->get('usuarios')->result();
			
			$datos['rolUser'] = $this->ModeloUser->getRoles();
			$datos['estUser'] = $this->ModeloUser->getEstado();	
			$datos['users']= $this->ModeloUser->Usuario();

			$this->load->view('Head',$datos);
			$this->load->view('user/Consultar',$datos);
		}

		public function Ver($id=null)
		{

			$this->load->model('ModeloUser');
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}
			
			$this->db->where('usuarios.id',$id);
			$datos['users']= $this->ModeloUser->VerUsuario();

			$this->load->view('Head');
			$this->load->view('user/Ver',$datos);
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
			$this->load->view('user/Editar',$datos);
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
            redirect('user/Consultar');
		}


		public function Eliminar($id=null)
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['rol_id']!='2')
				{
					redirect(base_url().'Login');
				}

			$this->db->where('id',$id);
            $this->db->delete('usuarios');
                redirect('User/Consultar');
		}


		public function PDF($id)
		{
			
		
		}

}
