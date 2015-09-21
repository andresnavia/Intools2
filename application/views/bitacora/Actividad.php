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
                                        <li class="active"><a href="#1" data-toggle="tab"><h4>Actividades</h4></a>
                                        </li>
                                        <li><a href="<?= base_url()?>Bitacora/Servicio" ><h4>Servicios</h4></a>
                                        </li>
                                        <li><a href="<?= base_url()?>Bitacora/Elemento" ><h4>Elementos</h4></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="1">
                                            <hr>
                                            <div class="table-responsive">
                                                <table  class="table table-condensed table-bordered table-hover" id="dataTables-example1" data-sort-name="fecha" data-sort-order="desc">
                                                    <thead>
                                                        <tr class="info">
                                                            <th data-field="fecha" data-sortable="true">Fecha Creacion</th>
                                                            <th>Actividad</th>
                                                            <th>Responsable</th>
                                                            <th>Estado</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            foreach ($activity as $a):
                                                                $session_data = $this->session->userdata('logged_in');         
                                                        ?>
                                                        <tr>
                                                            <td><?= $a->fecha_creada; ?></td>
                                                            <td><?= $a->nom_actividad; ?></td>
                                                            <td><?= $a->nombre," ",$a->apellido ?></td>
                                                            <td><?= $a->nom_actser; ?></td>
                                                            <td>
                                                                <a title="Componentes Modal" href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#VerComponentes<?= $a->id; ?>"><i class="fa fa-cogs"></i></a>
                                                                <a title="Ver Modal" href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Ver<?= $a->id; ?>"><i class="fa fa-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                        <!--  Modals View-->
                                                    <div class="modal fade" id="Ver<?= $a->id; ?>" tabindex="-1" role="dialog" aria-labelledby="VerLabel<?= $a->id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                   
                                                                    <h1><span class="label label-primary"> Datos Usuario</span></h1>
                                                                
                                                                </div>
                                                                
                                                                <div class="modal-body">
                                                                
                                                                    <div class="col-md-12">
                                                                        <br>      
                                                                        <strong>Fecha:</strong> <?= $a->fecha_creada; ?><br>
                                                                        <strong>Actividad:</strong> <?= $a->nom_actividad; ?><br>
                                                                        <strong>Estado:</strong> <?= $a->nom_actser; ?><br>
                                                                        <strong>Responsable:</strong> <?= $a->nombre," ",$a->apellido ?><br> 
                                                                        <strong>Asistente:</strong> <?= $a->nombre," ",$a->apellido ?><br>
                                                                        <strong>Descripcion:</strong><textarea readonly class="form-control" rows="5" style="border: 0px"><?= $a->descripcion ?></textarea><br>
                                                                        <strong>Archivos Comprimidos:</strong><a href="#"> ...</a></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="col-md-12">
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- End Modals-->
                                                <!--  Modals ViewC-->
                                                    <div class="modal fade" id="VerComponentes<?= $a->id; ?>" tabindex="-1" role="dialog" aria-labelledby="VerComponentesLabel<?= $a->id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h1><span class="label label-success"> Componentes Actividad</span></h1>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="col-md-12">
                                                                    <br>
                                                                        <?php  
                                                                            foreach ($comp as $c) :
                                                                                if ($c->id_actividad == $a->id) { 
                                                                        ?>
                                                                            <strong>Codigo Actividad:</strong> <?= $c->id_actividad; ?><strong>|</strong>
                                                                            <strong>Componente:</strong> <?= $c->nom_componente; ?><strong>|</strong>
                                                                            <strong>Cantidad:</strong> <?= $c->cantidad; ?><strong>|</strong>
                                                                            <strong>Descripcion:</strong> <?= $c->descripcion; ?><strong>|</strong>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="col-md-12">
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- End Modals-->
                                                <?php
                                                            }
                                                        endforeach; 
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
            $('#dataTables-example1').dataTable();

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