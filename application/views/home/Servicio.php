    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?= base_url()?>Home">INTOOLS</a> 
                </div>
                <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> 
                    Ultimo Ingreso: 10 Jul 2015 &nbsp; <a href="<?= base_url()?>Salir" class="btn btn-danger"><i class="fa fa-sign-out"></i> Salir</a> 
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
                            <a class="active-menu" href="<?= base_url()?>Home" ><i class="fa fa-home fa-2x fa-fw" ></i>Inicio</a>
                        </li>
                       <?php
                            $session_data = $this->session->userdata('logged_in');
                            if($session_data['rol_id']=='2'){
                        ?>
                        <li>
                            <a href="<?= base_url()?>User/Consultar"><i class="fa fa-users fa-2x fa-fw"></i> Usuarios</a>
                        </li>                     
                        <li>
                            <a  href="<?= base_url()?>Client/Consultar" ><i class="fa fa-laptop fa-2x fa-fw"></i> Clientes</a>
                        </li>
                        <?php
                            }
                        ?> 
                        <li>
                            <a  href="<?= base_url()?>Bitacora/Actividad" ><i class="fa fa-list-alt fa-2x fa-fw"></i> Bitacora</a>
                        </li> 
                        <li>
                            <a href="" ><i class="fa fa-wrench  fa-2x fa-fw"></i> Componentes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url()?>Asignar/CrearActividad"> Actividad</a>
                                </li>
                                <li>
                                    <a href="<?= base_url()?>Asignar/CrearServicio"> Servicio</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url()?>Actividad/Consultar" ><i class="fa fa-clock-o fa-2x fa-fw"></i> Actividades</span></a>
                        </li>                                          
                        <li>
                            <a href="<?= base_url()?>Servicio/Consultar" ><i class="fa fa-tty fa-2x fa-fw"></i> Servicios</span></a>
                        </li>       
                    </ul>
                    </ul>
                </div>
            </nav> 
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="HNav">Inicio</h2>   
                        </div>
                    </div><!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                Servicio Trabajado Actualmente
                                </div> 
                                <div class="panel-body">
                                    <ul class="nav nav-tabs">
                                        <li><a href="<?= base_url()?>Home/index" ><h4>Actividades</h4></a>
                                        </li>
                                        <li class="active"><a href="#2" data-toggle="tab"><h4>Servicios</h4></a>
                                        </li>
                                        <li><a href="<?= base_url()?>Home/Ingresos" ><h4>Historial Ingresos</h4></a>
                                        </li>
                                    </ul>
                                    <!--toma de los datos para el almacenamiento de las horas de los servicios -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="1">
                                            <hr>
                                            <!--<div class="row">
                                                <div class="col-md-12">
                                                    <a class="btn btn-primary">Continuar</a>
                                                    <a class="btn btn-danger">Pausar</a>
                                                </div>
                                            </div>-->
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="table-responsive">
                                                        <table  class="table table-condensed table-bordered table-hover" id="dataTables-example1" data-sort-name="fecha" data-sort-order="desc">
                                                            <thead>
                                                                <tr class="info">
                                                                    <th>Acciones</th>
                                                                    <th>Fecha Creacion</th>
                                                                    <th>Servicio</th>
                                                                    <th>Estado</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php  
                                                                    foreach ($service as $a):
                                                                        if ($session_data['id'] == $a->responsable) {
                                                                            if ($a->nom_actser=="Activo") {
                                                                                    
                                                                        $session_data = $this->session->userdata('logged_in');         
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <a href="<?= base_url('Home/InicioServicio/'.$a->id) ?>" class="btn btn-primary"><i class="fa fa-play" title="Continuar"></i></a>
                                                                        <a href="<?= base_url('Home/PausaServicio/'.$a->id) ?>" class="btn btn-danger"><i class="fa fa-pause" title="Pausar"></i></a>
                                                                    </td>
                                                                    <td><?= $a->fecha_creada; ?></td>
                                                                    <td><?= $a->nom_servicio; ?></td>
                                                                    <td><span class="label label-success"><?= $a->nom_actser; ?></span></td>
                                                                </tr>
                                                                <?php 
                                                                            }
                                                                        }
                                                                    endforeach; 
                                                                ?> 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="table-responsive">
                                                        <table  class="table table-condensed table-bordered table-hover" id="dataTables-example2" data-sort-name="fecha" data-sort-order="desc">
                                                            <thead>
                                                                <tr class="info">
                                                                    <th>Fecha</th>
                                                                    <th>Inicio</th>
                                                                    <th>Pausa</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php  
                                                                    foreach ($horas as $h):       
                                                                ?>
                                                                <tr>
                                                                    <td><?= $h->fecha_inicio ?></td>
                                                                    <td><?= $h->hora1 ?></td>
                                                                    <td><?= $h->hora2 ?></td>
                                                                </tr>
                                                                <?php 
                                                                            
                                                                        
                                                                    endforeach; 
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                ---
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /. ROW  -->       
                </div><!-- /. PAGE INNER  -->
                <div class="panel panel-default" style="margin: 10px 0px 0px 0px;">
                    <div class="row">
                        <center>
                            <p id="legal">&copy;2015 Lender | Designed by Juan Martinez - GymSoft
                        </center>
                    </div>
                </div>
                </div><!-- /. PAGE WRAPPER  -->
            </div><!-- /. WRAPPER  -->
    </body>
    <script src="<?= base_url()?>plantilla/js/jquery-1.10.2.js"></script>
    <script src="<?= base_url()?>plantilla/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>plantilla/js/jquery.metisMenu.js"></script>
    <script src="<?= base_url()?>plantilla/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?= base_url()?>plantilla/js/dataTables/dataTables.bootstrap.js"></script>
    
    

    
    <script src="<?= base_url()?>plantilla/js/custom.js"></script>
</html>