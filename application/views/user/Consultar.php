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
                            <a  href="<?= base_url()?>Home" ><i class="fa fa-home fa-2x fa-fw" ></i> Inicio</a>
                        </li>
                        <li>
                            <a class="active-menu" href="<?= base_url()?>User/Consultar" class="active-menu"  ><i class="fa fa-users fa-2x fa-fw"></i> Usuarios</span></a>
                        </li>
                        <?php
                            }
                        ?>                      
                        <li>
                            <a href="<?= base_url()?>Client/Consultar" ><i class="fa fa-laptop fa-2x fa-fw"></i> Clientes</a>
                        </li>
                        <li>
                            <a  href="<?= base_url()?>Bitacora/Actividad" ><i class="fa fa-list-alt fa-2x fa-fw"></i> Bitacora</a>
                        </li> 
                        <li>
                            <a href="" ><i class="fa fa-wrench fa-2x fa-fw"></i> Componentes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a  href="<?= base_url()?>Asignar/CrearActividad"> Actividad</a>
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
                </div>
            </nav> 
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="HNav">Usuarios / Consultar</h2>   
                        </div>
                    </div><!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Ver Usuarios
                                </div> 
                                <div class="panel-body">
                                    <a title="Ver Modal" href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Crear"><i class="fa fa-plus"></i>  Crear Usuario</a>
                                    <hr/>  
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr class="info">
                                                    <th>Identificacion</th>
                                                    <th>Nombre</th>
                                                    <th>Direccion</th>
                                                    <th>Telefono</th>
                                                    <th>Estado</th> 
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($users as $u) :
                                                        $session_data = $this->session->userdata('logged_in');
                                                        if($session_data['id']!=$u->id){ 
                                                            if ($u->id != 1) {
                                                                                                     
                                                ?>
                                                <tr>
                                                    <td><?= $u->id; ?></td>
                                                    <td><?= $u->nombre," ",$u->apellido; ?></td>
                                                    <td><?= $u->direccion; ?></td>
                                                    <td><?= $u->telefono; ?></td>
                                                    <td><?= $u->nombre_estado; ?></td>
                                                    <td>
                                                        <a title="Ver Modal" href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Ver<?= $u->id; ?>"><i class="fa fa-eye"></i></a>
                                                        <!--<a title="Ver" href="<?= base_url('User/Ver/'.$u->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>-->
                                                        <a title="Editar Modal" href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Editar<?= $u->id; ?>"><i class="fa fa-pencil"></i></a>
                                                        <!--<a title="Editar" href="<?= base_url('User/Editar/'.$u->id) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>-->
                                                        <a title="Eliminar" href="<?= base_url('User/Eliminar/'.$u->id) ?>" onclick="return confirm('Realmente Desea Eliminar el Usuario?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>

                                                <?php   
                                                        }
                                                    }
                                                    
                                                ?>
                                                <!--  Modals Create-->
                                                    <div class="modal fade" id="Crear" tabindex="-1" role="dialog" aria-labelledby="CrearLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                   
                                                                    <h1><span class="label label-info"> Crear Usuario</span></h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-12">
                                                                        <?= form_open_multipart(base_url('User/Insertar'))?>
                                                                            <?php
                                                                                $id=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Id',
                                                                                            'placeholder' => 'Identificacion para cada Usuario'

                                                                                        );
                                                                                $nom=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Nom',
                                                                                            'placeholder' => 'Nombre del Usuario'

                                                                                        );
                                                                                $ape=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Ape',
                                                                                            'placeholder' => 'Apellido del Usuario'

                                                                                        );
                                                                                $tel=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Tel',
                                                                                            'placeholder' => 'Telefono del Usuario'

                                                                                        );
                                                                                $dir=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Dir',
                                                                                            'placeholder' => 'Direccion del Usuario'

                                                                                        );
                                                                                
                                                                            ?>
                                                                            <div class="col-md-6">
                                                                                <div class="col-md-12">
                                                                                    <?= form_label('Identificacion:','Id')?>
                                                                                    <?= form_input($id)?>
                                                                                    <?= form_label('Nombre:','Nombre')?>
                                                                                    <?= form_input($nom)?>
                                                                                    <?= form_label('Apellido:','Apellido')?>
                                                                                    <?= form_input($ape)?>
                                                                                    <?= form_label('Telefono:','Telefono')?>
                                                                                    <?= form_input($tel)?>
                                                                                    <?= form_label('Direccion:','Direccion')?>
                                                                                    <?= form_input($dir)?>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <?php
                                                                                $email=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Email',
                                                                                            'placeholder' => 'Email del Usuario'

                                                                                        );
                                                                                $user=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'User',
                                                                                            'placeholder' => 'Usuario para el ingreso'

                                                                                        );
                                                                                $pass=array( 'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Pass',
                                                                                            'placeholder' => 'Contraseña para el ingreso',
                                                                                            'type' => 'password'

                                                                                        );
                                                    
                                                                            ?>
                                                                           
                                                                            <div class="col-md-6" style=" margin:5px 0 auto;">
                                                                                <div class="col-md-12">
                                                                                    <?= form_label('Email:','Email')?>
                                                                                    <?= form_input($email)?>
                                                                                    <?= form_label('Usuario:','User')?>
                                                                                    <?= form_input($user)?>
                                                                                    <?= form_label('Contraseña:','Pass')?>
                                                                                    <?= form_input($pass)?>
                                                                                    <?= form_label('Rol:','Rol')?>
                                                                                    <?= form_dropdown('Rol', $rolUser,null,"class='form-control'")?>
                                                                                    <?= form_label('Estado:','Est')?>
                                                                                    <?= form_dropdown('Est', $estUser,null,"class='form-control'")?>
                                                                                </div>
                                                                            </div>
                                                                            <?php 
                                                                                $btn1=array('class' => 'btn btn-success',
                                                                                            'value' => 'Guardar',
                                                                                            'name'  => 'Guardar' 

                                                                                            ); 
                                                                            ?>
                                                                            <div class="col-md-12" style="text-align: left; margin:10px 0 auto;">
                                                                                <div class="col-md-12">
                                                                                    <?= form_upload() ?>
                                                                                </div>
                                                                            </div>
                                                                            <?php 
                                                                                $btn1=array('class' => 'btn btn-success',
                                                                                            'value' => 'Guardar',
                                                                                            'name'  => 'Guardar' 

                                                                                            ); 
                                                                            ?>
                                                                            <div class="col-md-12" style="text-align: right; margin:5px 0 auto;">
                                                                                <div class="col-md-12">
                                                                                    <?= form_submit($btn1)?>
                                                                                </div>
                                                                            </div>
                                                                        <?= form_close()?>  
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
                                                 <!--  Modals View-->
                                                    <div class="modal fade" id="Ver<?= $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="VerLabel<?= $u->id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                   
                                                                    <h1><span class="label label-primary"> Datos Usuario</span></h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                   <div class="col-md-12">
                                                                        <div class="col-md-6">
                                                                            <p>
                                                                                <strong>Identificacion:</strong> <?= $u->id; ?><br>
                                                                                <strong>Nombre:</strong> <?= $u->nombre," ",$u->apellido; ?><br>
                                                                                <strong>Direccion:</strong> <?= $u->direccion; ?><br>
                                                                                <strong>Telefono:</strong> <?= $u->telefono; ?><br>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p>
                                                                                <strong>Email:</strong> <?= $u->email; ?><br>
                                                                                <strong>Usuario:</strong> <?= $u->username; ?><br>
                                                                                <strong>Rol:</strong> <?= $u->nombre_rol; ?><br>
                                                                                <strong>Estado:</strong> <?= $u->nombre_estado; ?><br>
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
                                                    <div class="modal fade" id="Editar<?= $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="EditarLabel<?= $u->id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                   
                                                                    <h1><span class="label label-warning"> Editar Usuario</span></h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                   <div class="col-md-12">

                                                                            <?= form_open_multipart(base_url('User/Actualizar/'.$u->id))?>
                                                                                <?php
                                                                                
                                                                                    $id=array(  'id' => 'inputSuccess',
                                                                                                'class' => 'form-control',
                                                                                                'name' => 'Id',
                                                                                                'readonly'=>'readonly',
                                                                                                'value' => $u->id

                                                                                            );
                                                                                    $nom=array( 'id' => 'inputSuccess',
                                                                                                'class' => 'form-control',
                                                                                                'name' => 'Nom',
                                                                                                'value' => $u->nombre

                                                                                            );
                                                                                    $ape=array( 'id' => 'inputSuccess',
                                                                                                'class' => 'form-control',
                                                                                                'name' => 'Ape',
                                                                                                'value' => $u->apellido

                                                                                            );
                                                                                    $tel=array( 'id' => 'inputSuccess',
                                                                                                'class' => 'form-control',
                                                                                                'name' => 'Tel',
                                                                                                'value' => $u->telefono

                                                                                            );
                                                                                    $dir=array( 'id' => 'inputSuccess',
                                                                                                'class' => 'form-control',
                                                                                                'name' => 'Dir',
                                                                                                'value' => $u->direccion

                                                                                            );
                                                                                    
                                                                                ?>
                                                                                <div class="col-md-6">
                                                                                    <div class="col-md-12">
                                                                                        <?= form_label('Identificacion:','Id')?>
                                                                                        <?= form_input($id)?>
                                                                                        <?= form_label('Nombre:','Nombre')?>
                                                                                        <?= form_input($nom)?>
                                                                                        <?= form_label('Apellido:','Apellido')?>
                                                                                        <?= form_input($ape)?>
                                                                                        <?= form_label('Telefono:','Telefono')?>
                                                                                        <?= form_input($tel)?>
                                                                                        <?= form_label('Direccion:','Direccion')?>
                                                                                        <?= form_input($dir)?>
                                                                                    </div>
                                                                                </div>
                                                                                <?php
                                                                                    $email=array( 'id' => 'inputSuccess',
                                                                                                'class' => 'form-control',
                                                                                                'name' => 'Email',
                                                                                                'value' => $u->email
                                                                                            );
                                                                                    $user=array( 'id' => 'inputSuccess',
                                                                                                'class' => 'form-control',
                                                                                                'name' => 'User',
                                                                                                'value' => $u->username

                                                                                            );
                                                                                     $pass=array( 'id' => 'inputSuccess',
                                                                                                'class' => 'form-control',
                                                                                                'name' => 'Pass',
                                                                                                'value' => $u->password

                                                                                            );
                                                                                    $rol= $this->ModeloUser->VerRol('roles','nombre_rol');
                                                                                    $estado= $this->ModeloUser->VerEstado('estado_usuario','nombre_estado');
                                                                                      
                                                        
                                                                                ?>
                                                                               
                                                                                <div class="col-md-6" style=" margin:5px 0 auto;">
                                                                                    <div class="col-md-12">
                                                                                        <?= form_label('Email:','Email')?>
                                                                                        <?= form_input($email)?>
                                                                                        <?= form_label('Usuario:','User')?>
                                                                                        <?= form_input($user)?>
                                                                                        <?= form_label('Contraseña:','Pass')?>
                                                                                        <?= form_input($pass)?>
                                                                                        <?= form_label('Rol:','rol') ?>
                                                                                        <?php
                                                                                            if (is_array($rol)) {
                                                                                        ?>
                                                                                        <?= form_dropdown('Rol',$rol,$u->idrol,'class=form-control') ?>
                                                                                        <?= form_label('Estado:','est') ?>
                                                                                        <?php
                                                                                            if (is_array($estado)) {
                                                                                        ?>
                                                                                        <?= form_dropdown('Est',$estado,$u->estado,'class=form-control') ?>
                                                                                        <?php
                                                                                            }}
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                                <?php 
                                                                                    $btn1=array('class' => 'btn btn-success',
                                                                                                'value' => 'Guardar',
                                                                                                'name'  => 'Guardar' 

                                                                                                ); 
                                                                                ?>
                                                                                <div class="col-md-12" style="text-align: left; margin:10px 0 auto;">
                                                                                    <div class="col-md-12">
                                                                                        <?= form_upload() ?>
                                                                                    </div>
                                                                                </div>
                                                                                <?php 
                                                                                    $btn1=array('class' => 'btn btn-success',
                                                                                                'value' => 'Guardar',
                                                                                                'name'  => 'Guardar' 

                                                                                                );                                                     
                                                                                    
                                                                                    
                                                                                ?>
                                                                                <div class="col-md-12" style="text-align: right; margin:5px 0 auto;">
                                                                                    <div class="col-md-12">
                                                                                        <?= form_submit($btn1)?>
                                                                                    </div>
                                                                                </div>
                                                                        <?= form_close()?>
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
                                                    endforeach;
                                                ?>
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
    <script src="<?= base_url()?>plantilla/js/funciones.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('New message to ' + recipient)
          modal.find('.modal-body input').val(recipient)
        })
    </script>
    
    <script src="<?= base_url()?>plantilla/js/custom.js"></script>
</html>