    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">12345</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url()?>Home">INTOOLS</a> 
                </div>
                <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> 
                    Ultimo Ingreso: 10 Jul 2015 &nbsp; <a href="<?= base_url()?>Salir" class="btn btn-danger "><i class="fa fa-sign-out"></i> Salir</a> 
                </div>
            </nav><!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="<?= base_url() ?>plantilla/img/indel.png" class="user-image img-responsive"/>
                        <h5 class=""style="color:#ffffff"> <?php  $session_data = $this->session->userdata('logged_in'); echo $session_data['rol'];?></h5> 
                        <h5 class=""style="color:#ffffff"> <?php  $session_data = $this->session->userdata('logged_in'); echo $session_data['user'];?></h5> 
                    
                        </li>
                        
                        <li>
                            <a href="<?= base_url()?>Home" ><i class="fa fa-home fa-2x fa-fw" ></i>Inicio</a>
                        </li>
                        <?php
                            $session_data = $this->session->userdata('logged_in');
                            if($session_data['rol_id']=='2'){
                        ?>
                         <li>
                            <a href="<?= base_url()?>User/Consultar"><i class="fa fa-users fa-2x fa-fw"></i> Usuarios</a>
                        </li>
                                             
                        <li>
                            <a href="<?= base_url()?>Client/Consultar" ><i class="fa fa-laptop fa-2x fa-fw"></i> Clientes</a>
                        </li> 
                        <?php
                            }
                        ?>
                        <li>
                            <a  href="<?= base_url()?>Bitacora/Actividad" ><i class="fa fa-list-alt fa-2x fa-fw"></i> Bitacora</a>
                        </li> 
                        <li>
                            <a class="active-menu" href="" ><i class="fa fa-wrench fa-2x fa-fw"></i> Componentes<span class="fa arrow"></span></a>
                        </li>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a  href="<?= base_url()?>Asignar/CrearActividad"> Actividad</a>
                                </li>
                                <li>
                                    <a href="<?= base_url()?>Asignar/CrearServicio"> Servicio</a>
                                </li>
                            </ul>
                        <li>
                            <a href="<?= base_url()?>Actividad/Consultar" ><i class="fa fa-clock-o fa-2x fa-fw"></i> Actividades</span></a>
                        </li>                                          
                        <li>
                            <a href="<?= base_url()?>Servicio/Consultar" ><i class="fa fa-tty fa-2x fa-fw"></i> Servicios</span></a>
                         </li>       
                    </ul>
                </div>
            </nav> 
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="HNav">Componentes / Actividades</h2>   
                        </div>
                    </div><!-- /. ROW  -->
                    <hr />
                    <div class="row">
                       <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Asignar Componentes
                                </div>  
                                <div class="panel-body">
                                    
                                    <?= form_open(base_url('Actividad/InsertarComponente'))?>
                                        <?php
                                            $actividad=array(  'id' => 'inputSuccess',
                                                        'class' => 'form-control',
                                                        'name' => 'Act'

                                                    );
                                            $nombre=array( 'id' => 'inputSuccess',
                                                        'class' => 'form-control',
                                                        'name' => 'Nom'

                                                    );
                                            $cantidad=array( 'id' => 'inputSuccess',
                                                        'class' => 'form-control',
                                                        'name' => 'Can',
                                                        'type' => 'number'

                                                    );
                                           
                                        ?>
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <?= form_label('Numero Actividad:','Act')?>
                                                <?= form_input($actividad)?>
                                                <?= form_label('Componente:','Nom')?>
                                                <?= form_input($nombre)?>
                                                <?= form_label('Cantidad:','Can')?>
                                                <?= form_input($cantidad)?>
                                            </div>
                                        </div>
                                        <?php
                                            $descripcion=array( 'id' => 'inputSuccess',
                                                        'class' => 'form-control',
                                                        'name' => 'Des'

                                                    );
                                        ?>
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <?= form_label('Descripcion:','Des')?>
                                                <?= form_textarea($descripcion)?>
                                            </div>
                                        </div>
                                        <?php 
                                            $btn1=array('class' => 'btn btn-success',
                                                        'value' => 'Guardar',
                                                        'name'  => 'Guardar' 
                                                        );                   
                                                                                          
                                            $btn2=array('name' => 'button',
                                                        'id' => 'button',
                                                        'value' => 'true',
                                                        'type' => 'reset',
                                                        'content' => 'Cancelar',
                                                        'class' => 'btn btn-danger',
                                                        'onClick' => "window.location.href = '".base_url()."Componente/CrearActividad';return false;"
                                                        );
                                        ?>
                                        <div class="col-md-11" style="text-align: right; margin:10px 0 auto;">
                                            <div class="col-md-12">
                                                <?= form_submit($btn1)?>
                                                <?= form_button($btn2)?>
                                            </div>
                                        </div>
                                    <?= form_close()?>
                                </div>
                            </div>
                        </div>
                    </div><!-- /. ROW  -->  
                </div><!-- /. PAGE INNER  -->
                <div class="panel panel-default" style="margin: 10px 0px 0px 0px;">
                    <div class="row">
                        <center>
                            <p id="legal">&copy;2015 Intools2 | Designed by Juan Martinez - GymSoft
                        </center>
                    </div>
                </div><!-- /. PAGE WRAPPER  -->
                </div><!-- /. WRAPPER  -->
            </div><!-- /. PAGE WRAPPER  -->

            </div><!-- /. WRAPPER  -->
           
    </body>
    <script src="<?= base_url()?>plantilla/js/jquery-1.10.2.js"></script>
    <script src="<?= base_url()?>plantilla/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>plantilla/js/jquery.metisMenu.js"></script>
    <script src="<?= base_url()?>plantilla/js/custom.js"></script>
</html>