
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	#Controlador Principal Al Cargar La Aplicacion
	
	class Login extends CI_Controller {
 
		function __construct(){
			
			parent::__construct();
		}
 
		function index(){
			
			$this->load->view('Login');
		}
	}
	
?>
