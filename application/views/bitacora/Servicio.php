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
                            <a  href="<?= base_url()?>Client/Consultar" ><i class="fa fa-laptop fa-2x fa-fw"></i> Clientes</a>
                        </li>
                        <?php
                            }
                        ?> 
                        <li>
                            <a class="active-menu" href="<?= base_url()?>Bitacora/Actividad" ><i class="fa fa-list-alt fa-2x fa-fw"></i> Bitacora</a>
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
                            <h2 class="HNav">Bitacora / Consultar</h2>   
                        </div>
                    </div><!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                ...
                                </div> 
                                <div class="panel-body">
                                    <ul class="nav nav-tabs">
                                        <li><a href="<?= base_url()?>Bitacora/Actividad" ><h4>Actividades</h4></a>
                                        </li>
                                        <li class="active"><a href="#2" data-toggle="tab"><h4>Servicios</h4></a>
                                        </li>
                                        <li><a href="<?= base_url()?>Bitacora/Elemento" ><h4>Elementos</h4></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="2">
                                            <hr/>  
                                            <div class="table-responsive">
                                                <table class="table table-condensed table-bordered table-hover" id="dataTables-example2">
                                                    <thead>
                                                        <tr class="info">
                                                            <th>Fecha Creacion</th>
                                                            <th>Tipo Servicio</th>
                                                            <th>Responsable</th>
                                                            <th>Estado</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            foreach ($service as $s):
                                                                $session_data = $this->session->userdata('logged_in');
                                                        ?>
                                                        <tr>
                                                            <td><?= $s->fecha_creada; ?></td>
                                                            <td><?= $s->nom_servicio; ?></td>
                                                            <td><?= $s->nombre," ",$s->apellido ?></td>
                                                            <td><?= $s->nom_actser; ?></td>
                                                            <td>
                                                                <a title="Componentes" href="<?= base_url('Servicio/VerComponentes/'.$s->id) ?>" class="btn btn-success btn-sm"><i class="fa fa-cogs"></i></a>
                                                                <a title="Ver" href="<?= base_url('Servicio/Ver/'.$s->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                            endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
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
    
    <script>
        $(document).ready(function () {
            $('#dataTables-example2').dataTable();
        });
    </script>
    <script>
        $.extend( true, $.fn.dataTable.defaults, {
            "searching": true,
            "ordering": true,
            "order": [0]
        } );
    </script>
    <script src="<?= base_url()?>plantilla/js/custom.js"></script>
</html>