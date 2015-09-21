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
                            <a href="<?= base_url()?>User/Consultar" ><i class="fa fa-users fa-2x fa-fw"></i> Usuarios</span></a>
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
                            <a class="active-menu" href="<?= base_url()?>Actividad/Consultar" ><i class="fa fa-clock-o fa-2x fa-fw"></i> Actividades</span></a>
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
                            <h2 class="HNav">Actividad / Consultar</h2>   
                        </div>
                    </div><!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Ver Actividades
                                </div> 
                                <div class="panel-body">
                                    <a title="Crear Modal" href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Crear"><i class="fa fa-plus"></i>  Crear Actividad</a>
                                    <hr/>  
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr class="info">
                                                    <th>Fecha Creacion</th>
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
                                                        if ($session_data['id'] == $a->responsable) {
                                                             
                                                ?>
                                                <tr>
                                                    <td><?= $a->fecha_creada; ?></td>
                                                    <td><?= $a->nom_actividad; ?></td>
                                                    <td><?= $a->nombre," ",$a->apellido ?></td>
                                                    <td><!--<a class="btn btn-warning btn-sm">--><?= $a->nom_actser; ?></td>
                                                    <td>
                                                        <a title="Componentes Modal" href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#VerComponentes<?= $a->id; ?>"><i class="fa fa-cogs"></i></a>
                                                        <!--<a title="Componentes" href="<?= base_url('Actividad/VerComponentes/'.$a->id) ?>" class="btn btn-success btn-sm"><i class="fa fa-cogs"></i></a>-->
                                                        <a title="Ver Modal" href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Ver<?= $a->id; ?>"><i class="fa fa-eye"></i></a>
                                                        <!--<a title="Ver" href="<?= base_url('Actividad/Ver/'.$a->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>-->
                                                        <a title="Editar Modal" href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Editar<?= $a->id; ?>"><i class="fa fa-pencil"></i></a>
                                                        <!--<a title="Editar" href="<?= base_url('Actividad/Editar/'.$a->id) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>-->
                                                        <a title="Eliminar" href="<?= base_url('Actividad/Eliminar/'.$a->id) ?>" onclick="return confirm('Realmente Desea Eliminar la Actividad?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php  
                                                        }
                                                ?>
                                                <!--Modals Create-->
                                                    <div class="modal fade" id="Crear" tabindex="-1" role="dialog" aria-labelledby="Crear" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                   
                                                                    <h1><span class="label label-info"> Crear Actividad</span></h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                
                                                                    <div class="col-md-12">
                                                                    <br> 
                                                                        <?= form_open_multipart(base_url('Actividad/Insertar'))?>
                                                                            <?php
                                                                                $desc=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Desc'

                                                                                        );
                                                                                $resp=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Resp',
                                                                                            'value' => $session_data['user'],
                                                                                            'readonly'=>'readonly'

                                                                                        );
                                                                            ?>
                                                                            <div class="col-md-6">
                                                                                <div class="col-md-10">
                                                                                    <?= form_label('Actividad:','Act')?>
                                                                                    <?= form_dropdown('Act', $Act,null,"class='form-control'")?>
                                                                                    <?= form_label('Estado:','Est')?>
                                                                                    <?= form_dropdown('Est', $EA,null,"class='form-control'")?>
                                                                                    <?= form_label('Responsable:')?>
                                                                                    <?= form_input($resp)?>
                                                                                    <?php if($session_data['user']!=$Asis){ ?>
                                                                                    <?= form_label('Asistente:','Asis')?>
                                                                                    <?= form_dropdown('Asis', $Asis,null,"class='form-control'")?>
                                                                                    <?php  } ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="col-md-10">
                                                                                    <?= form_label('Descripcion:','Desc')?>
                                                                                    <?= form_textarea($desc) ?>
                                                                                    
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
                                                                            
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <hr>
                                                                        <div class="col-md-12" style="text-align: right; margin:5px 0 auto;">
                                                                                <div class="col-md-12">
                                                                                    <?= form_submit($btn1)?>
                                                                                </div>
                                                                            </div>
                                                                        <?= form_close()?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- End Modals-->
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
                                                <!--  Modals Edit-->
                                                    <div class="modal fade" id="Editar<?= $a->id; ?>" tabindex="-1" role="dialog" aria-labelledby="EditarLabel<?= $a->id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                   
                                                                    <h1><span class="label label-warning"> Editar Actividad</span></h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                
                                                                    <div class="col-md-12">
                                                                    <br> 
                                                                        <?= form_open_multipart(base_url('Actividad/Actualizar/'.$a->id))?>
                                                                            <?php
                                                                                $desc=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Desc',
                                                                                            'value' => $a->descripcion

                                                                                        );

                                                                                
                                                                                $resp=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Resp',
                                                                                            'value' => $session_data['user'],
                                                                                            'readonly'=>'readonly'

                                                                                        );
                                                                                $TActividad= $this->ModeloActividad->TActividad('tipo_actividad','nom_actividad');
                                                                                $EstActividad= $this->ModeloActividad->EstadoA('estado_actser','nom_actser');
                                                                                $Asis= $this->ModeloActividad->Asistente('usuarios','nombre');

                                                                            ?>
                                                                            <div class="col-md-6">
                                                                                <div class="col-md-12">
                                                                                    <?= form_label('Tipo Actividad:','Act')?>
                                                                                    <?php
                                                                                        if (is_array($TActividad)) {
                                                                                    ?>
                                                                                    <?= form_dropdown('Act',$TActividad,$a->actividad,'class=form-control') ?>
                                                                                    <?= form_label('Estado:','Est')?>
                                                                                    <?php
                                                                                        if (is_array($EstActividad)) {
                                                                                    ?>
                                                                                    <?= form_dropdown('Est', $EstActividad,$a->estado,"class='form-control'")?>
                                                                                    <?= form_label('Responsable:')?>
                                                                                    <?= form_input($resp)?>
                                                                                    <?php if($session_data['user']!=$Asis){ ?>
                                                                                    <?= form_label('Asistente:','Asis')?>
                                                                                    <?php
                                                                                        if (is_array($Asis)) {
                                                                                    ?>
                                                                                    <?= form_dropdown('Asis', $Asis,$a->asistente,"class='form-control'")?>
                                                                                    <?= form_label('Documentos Comprimidos:','DC')?>
                                                                                    <?= form_upload() ?>
                                                                                    <?php  
                                                                                                        
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }

                                                                                     ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="col-md-12">
                                                                                    <?= form_label('Descripcion:','Desc')?>
                                                                                    <?= form_textarea($desc) ?>
                                                                                    
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
                                                                        <div class="col-md-12" style="text-align: right; margin:5px 0 auto;">
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
    <script>
        $.extend( true, $.fn.dataTable.defaults, {
            "searching": true,
            "ordering": true,
            "order": [0]
        } );
    </script>
    <script src="<?= base_url()?>plantilla/js/custom.js"></script>
</html>