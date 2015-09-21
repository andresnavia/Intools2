
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginVerificar extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('ModeloLogin','',TRUE);
  }

  function index()
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

    if($this->form_validation->run() == FALSE)
    {
      echo "error";
      $this->load->view('Login');
    }
    else
    {
      redirect('Home', 'refresh');
    }

  }

  function check_database($password )
  {
    $username = $this->input->post('username');

    $result = $this->ModeloLogin->login($username, $password);

    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'id' => $row->id,
          'username' => $row->username,
          'user' => $row->nombre . ' ' . $row->apellido,
          'rol' => $row->nombre_rol,
          'rol_id' => $row->idrol,
          'estado' => $row->nombre_estado
        );

        $this->session->set_userdata('logged_in', $sess_array);
      }

      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Nombre de usuario o Contrase&ntilde;a son Incorrectos');
      return false;
    }
  }

}
?>
