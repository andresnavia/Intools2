<?php
    $sesion = $this->session->userdata('logged_in');

    if(!$sesion){
        redirect('Login');
    }else{
        if($sesion['estado'] <> 'Activo'){
        	
            $this->session->sess_destroy();
            
            redirect('Login');
        }
    }
?>