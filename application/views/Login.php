<?php
    $sesion = $this->session->userdata('logged_in');

    if($sesion){
        redirect('Home');
    }
?>
<!DOCTYPE html>
<html lang="es">
    
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Ing. Juan David Martinez">

        <link rel="shortcut icon" href="<?= base_url()?>plantilla/img/LogoIn.png" type="image/vnd.microsoft.icon">
        <link href="<?= base_url() ?>plantilla/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>plantilla/css/style.css" rel="stylesheet">

        <title>
            INTOOLS
        </title>
    
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="account-wall">
                        <img class="profile-img" src="<?= base_url() ?>plantilla/img/indelec.png" alt="">
                        <form class="form-signin" action="LoginVerificar" method="post">
                            <input type="text" name="username"class="form-control" placeholder="Usuario" required autofocus>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            <button class="btn-login btn-block" type="submit">
                                Ingresar
                            </button>
                            <a href="#" class="pull-right need-help">Ayuda? </a><span class="clearfix"></span>
                        </form>
                    </div>
                </div> 
            </div>
        </div>

    </body>

</html>
