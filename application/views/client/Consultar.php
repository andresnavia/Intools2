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
                        <?php
                            $session_data = $this->session->userdata('logged_in');
                            if($session_data['rol_id']=='2'){
                        ?>
                        <li>
                            <a href="<?= base_url()?>Home" ><i class="fa fa-home fa-2x fa-fw" ></i>Inicio</a>
                        </li>
                       
                        <li>
                            <a href="<?= base_url()?>User/Consultar"><i class="fa fa-users fa-2x fa-fw"></i> Usuarios</a>
                        </li>
                        <?php
                            }
                        ?>                      
                        <li>
                            <a class="active-menu" href="<?= base_url()?>Client/Consultar" ><i class="fa fa-laptop fa-2x fa-fw"></i> Clientes</a>
                        </li>
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
                            <h2 class="HNav">Clientes / Consultar</h2>   
                        </div>
                    </div><!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Ver Clientes
                                </div> 
                                <div class="panel-body">
                                   <a title="Crear Modal" href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Crear"><i class="fa fa-plus"></i>  Crear Cliente</a>
                                    <hr/>  
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr class="info">
                                                    <th>Nit</th>
                                                    <th>Nombre</th>
                                                    <th>Direccion</th>
                                                    <!--<th>Telefono</th>-->
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    foreach ($cli as $c):
                                                        $session_data = $this->session->userdata('logged_in');
                                                        if($session_data['id']!=$c->id){
                                                            if($c->id!='0'){

                                                ?>
                                                <tr>
                                                    <td><?= $c->nit; ?></td>
                                                    <td><?= $c->nom_cliente; ?></td>
                                                    <td><?= $c->direccion; ?></td>
                                                    <!--<td><?= $c->telefono; ?></td>-->
                                                    <td>
                                                        <!--   <a title="Ver" href="<?= base_url('Client/Ver/'.$c->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>-->
                                                        <a title="Ver Modal" href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Ver<?= $c->id; ?>"><i class="fa fa-eye"></i></a>
                                                        <!--<a title="Editar" href="<?= base_url('Client/Editar/'.$c->id) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>-->
                                                        <a title="Editar Modal" href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Editar<?= $c->id; ?>"><i class="fa fa-pencil"></i></a>
                                                        <a title="Eliminar" href="<?= base_url('Client/Eliminar/'.$c->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Realmente Desea Eliminar el Cliente?');" ><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php  
                                                            }
                                                        }
                                                    
                                                ?>
                                                <!--  Modals Crear-->
                                                    <div class="modal fade" id="Crear" tabindex="-1" role="dialog" aria-labelledby="CrearLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                   
                                                                    <h1><span class="label label-info"> Crear Cliente</span></h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-12">
                                                                        <?= form_open(base_url('Client/Insertar'))?>
                                                                            <?php
                                                                                $nit=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Nit'

                                                                                        );
                                                                                $nom=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Nom'

                                                                                        );
                                                                                $dir=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Dir'

                                                                                        );
                                                                                $con=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Con'

                                                                                        );
                                                                                $tel=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Tel'

                                                                                        );
                                                                                
                                                                                $email=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Email'

                                                                                        );
                                                                               
                                                                            ?>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-10">
                                                                                    <?= form_label('Nit :','Nit')?>
                                                                                    <?= form_input($nit)?>
                                                                                    <?= form_label('Nombre:','Nombre')?>
                                                                                    <?= form_input($nom)?>
                                                                                    <?= form_label('Direccion:','Direccion')?>
                                                                                    <?= form_input($dir)?>
                                                                                    <?= form_label('Contacto:','Contacto')?>
                                                                                    <?= form_input($con)?>
                                                                                    <?= form_label('Telefono:','Telefono')?>
                                                                                    <?= form_input($tel)?>
                                                                                    <?= form_label('Email :','Email')?>
                                                                                    <?= form_input($email)?>
                                                                                </div>
                                                                            </div>                   
                                                                            
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="col-md-12">
                                                                        <hr>
                                                                            <?php 
                                                                                $btn1=array('class' => 'btn btn-success',
                                                                                            'value' => 'Guardar',
                                                                                            'name'  => 'Guardar' 
                                                                                            );                   
                                                                                                                              
                                                                               
                                                                            ?>
                                                                            <div class="col-md-11" style="text-align: right; margin:10px 0 auto;">
                                                                                <div class="col-md-12">
                                                                                    <?= form_submit($btn1)?>
                                                                                </div>
                                                                            </div>
                                                                        <?= form_close()?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- End Modals-->
                                                <!--  Modals View-->
                                                    <div class="modal fade" id="Ver<?= $c->id; ?>" tabindex="-1" role="dialog" aria-labelledby="VerLabel<?= $c->id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                   
                                                                    <h1><span class="label label-primary"> Datos Cliente</span></h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-4">
                                                                            <p>
                                                                                <strong>Nit:</strong> <?= $c->nit; ?><br>
                                                                                <strong>Nombre:</strong> <?= $c->nom_cliente; ?><br>
                                                                                <strong>Direccion:</strong> <?= $c->direccion; ?><br>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <p>
                                                                                <strong>Contacto:</strong> <?= $c->contacto; ?><br>
                                                                                <strong>Telefono:</strong> <?= $c->telefono; ?><br>
                                                                                <strong>Email:</strong> <?= $c->email; ?><br>
                                                                            </p>

                                                                        </div>
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
                                                <!--  Modals Edit-->
                                                    <div class="modal fade" id="Editar<?= $c->id; ?>" tabindex="-1" role="dialog" aria-labelledby="EditarLabel<?= $c->id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                   
                                                                    <h1><span class="label label-warning"> Editar Cliente</span></h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-12">
                                                                        <?= form_open(base_url('Client/Actualizar/'.$c->id))?>
                                                                            <?php
                                                                                $nit=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Nit',
                                                                                            'value' => $c->nit

                                                                                        );
                                                                                $nom=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Nom',
                                                                                            'value' => $c->nom_cliente

                                                                                        );
                                                                                $dir=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Dir',
                                                                                            'value' => $c->direccion

                                                                                        );
                                                                                $con=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Con',
                                                                                            'value' => $c->contacto

                                                                                        );
                                                                                $tel=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Tel',
                                                                                            'value' => $c->telefono

                                                                                        );
                                                                                
                                                                                $email=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Email',
                                                                                            'value' => $c->email

                                                                                        );

                                                                               
                                                                            ?>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-10">
                                                                                    <?= form_label('Nit :','Nit')?>
                                                                                    <?= form_input($nit)?>
                                                                                    <?= form_label('Nombre:','Nombre')?>
                                                                                    <?= form_input($nom)?>
                                                                                    <?= form_label('Direccion:','Direccion')?>
                                                                                    <?= form_input($dir)?>
                                                                                    <?= form_label('Contacto:','Contacto')?>
                                                                                    <?= form_input($con)?>
                                                                                    <?= form_label('Telefono:','Telefono')?>
                                                                                    <?= form_input($tel)?>
                                                                                    <?= form_label('Email :','Email')?>
                                                                                    <?= form_input($email)?>
                                                                                    
                                                                                </div>
                                                                            </div>                   
                                                                            <?php 
                                                                                $btn1=array('class' => 'btn btn-success',
                                                                                            'value' => 'Guardar',
                                                                                            'name'  => 'Guardar' 
                                                                                            );
                                                                            ?>       
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="col-md-12">
                                                                        <hr>
                                                                        <div class="col-md-12" style="text-align: right; margin:10px 0 auto;">
                                                                                <div class="col-md-12">
                                                                                    <?= form_submit($btn1)?>
                                                                                </div>
                                                                            </div>
                                                                        <?= form_close()?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- End Modals-->
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
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
            $('#dataTables-example').dataTable();
        });
    </script>
    <script src="<?= base_url()?>plantilla/js/custom.js"></script>
</html>