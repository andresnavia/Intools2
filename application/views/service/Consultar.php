
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
                            <a href="<?= base_url()?>Actividad/Consultar" ><i class="fa fa-clock-o fa-2x fa-fw"></i> Actividades</span></a>
                        </li>                                          
                        <li>
                            <a class="active-menu" href="<?= base_url()?>Servicio/Consultar" ><i class="fa fa-tty fa-2x fa-fw"></i> Servicios</span></a>
                        </li>       
                    </ul>
                </div>
            </nav> 
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="HNav">Servicio / Consultar</h2>   
                        </div>
                    </div><!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Ver Servicios
                                </div> 
                                <div class="panel-body">
                                    <a title="Crear Modal" href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Crear"><i class="fa fa-plus"></i>  Crear Servicio</a>
                                    <hr/>  
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-hover" id="dataTables-example" data-sort-order="desc">
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
                                                    foreach ($service as $s) :
                                                        
                                                        $session_data = $this->session->userdata('logged_in');
                                                        if ($session_data['id'] == $s->responsable) {
                                                             
                                                ?>
                                                <tr>
                                                    <td><?= $s->fecha_creada; ?></td>
                                                    <td><?= $s->nom_servicio; ?></td>
                                                    <td><?= $s->nombre," ",$s->apellido ?></td>
                                                    <td><?= $s->nom_actser; ?></td>
                                                    <td>
                                                        <a title="Componentes Modal" href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#VerComponentes<?= $s->id; ?>"><i class="fa fa-cogs"></i></a>
                                                        <a title="Ver Modal" href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Ver<?= $s->id; ?>"><i class="fa fa-eye"></i></a>
                                                        <a title="Editar Modal" href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Editar<?= $s->id; ?>"><i class="fa fa-pencil"></i></a>
                                                        
                                                        <!--<a title="Componentes" href="<?= base_url('Servicio/VerComponentes/'.$s->id) ?>" class="btn btn-success btn-sm"><i class="fa fa-cogs"></i></a>
                                                        <a title="Ver" href="<?= base_url('Servicio/Ver/'.$s->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                        <a title="Editar" href="<?= base_url('Servicio/Editar/'.$s->id) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>-->
                                                        <a title="Eliminar" href="<?= base_url('Servicio/Eliminar/'.$s->id) ?>" onclick="return confirm('Realmente Desea Eliminar el Servicio?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                                                                        <?= form_open_multipart(base_url('Servicio/Insertar'))?>
                                                                            <?php
                                                                                $desc=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Desc'

                                                                                        );
                                                                                $comp=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Comp'

                                                                                        );
                                                                                $conc=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Conc'

                                                                                        );
                                                                                $maq=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Maq'

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
                                                                                    <?= form_label('Tipo Servicio:','Ser')?>
                                                                                    <?= form_dropdown('Ser', $Ser,null,"class='form-control'")?>
                                                                                    <?= form_label('Estado:','Est')?>
                                                                                    <?= form_dropdown('Est', $EA,null,"class='form-control'")?>
                                                                                    <?= form_label('Cliente:','Cli')?>
                                                                                    <?= form_dropdown('Cli', $Cli,null,"class='form-control'")?>
                                                                                    <?= form_label('Maquina:','Maq')?>
                                                                                    <?= form_input($maq) ?>
                                                                                    <?= form_label('Responsable:')?>
                                                                                    <?= form_input($resp)?>
                                                                                    <?php if($session_data['user']!=$Asis){ ?>
                                                                                    <?= form_label('Asistente:','Asis')?>
                                                                                    <?= form_dropdown('Asis', $Asis,null,"class='form-control'")?>
                                                                                    <?= form_label('Documentos Comprimidos:','DC')?>
                                                                                    <?= form_upload() ?>
                                                                                    <?php  } ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="col-md-10">
                                                                                    <?= form_label('Descripcion:','Desc')?>
                                                                                    <?= form_textarea($desc) ?>
                                                                                    <?= form_label('Compromisos:','Comp')?>
                                                                                    <?= form_textarea($comp) ?>
                                                                                    <!--<?= form_label('Conclusion:','Conc')?>
                                                                                    <?= form_textarea($conc) ?>-->
                                                                                    
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
                                                                                            'onClick' => "window.location.href = '".base_url()."Servicio/Consultar';return false;"
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
                                                    <div class="modal fade" id="Ver<?= $s->id; ?>" tabindex="-1" role="dialog" aria-labelledby="VerLabel<?= $s->id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                   
                                                                    <h1><span class="label label-primary"> Datos Servicio</span></h1>
                                                                
                                                                </div>
                                                                
                                                                <div class="modal-body">
                                                                
                                                                    <div class="col-md-12">
                                                                        <br>
                                                                        <strong>Fecha:</strong> <?= $s->fecha_creada; ?><br>
                                                                        <strong>Tipo Servicio:</strong> <?= $s->nom_servicio; ?><br>
                                                                        <strong>Estado:</strong> <?= $s->nom_actser; ?><br>
                                                                        <strong>Cliente:</strong> <?= $s->nom_cliente ?><br>
                                                                        <strong>Maquina:</strong> <?= $s->maquina ?><br>
                                                                        <strong>Responsable:</strong> <?= $s->nombre," ",$s->apellido ?> <br>
                                                                        <strong>Asistente:</strong> <?= $s->nombre," ",$s->apellido ?><br><br>
                                                                        <strong>Descripcion:</strong><textarea readonly class="form-control" rows="5" style="border: 0px"><?= $s->descripcion ?></textarea>
                                                                        <strong>Compromisos:</strong><textarea readonly class="form-control" rows="5" style="border: 0px"><?= $s->compromisos ?></textarea>
                                                                        <strong>Archivos Comprimidos:</strong><a href="#"> Ejemplo</a></textarea>
                                                                                                                                   
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
                                                    <div class="modal fade" id="Editar<?= $s->id; ?>" tabindex="-1" role="dialog" aria-labelledby="EditarLabel<?= $s->id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                   
                                                                    <h1><span class="label label-warning"> Editar Servicio</span></h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-12">
                                                                        <?= form_open_multipart(base_url('Servicio/Actualizar/'.$s->id))?>
                                                                            <?php
                                                                                $desc=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Desc',
                                                                                            'value' => $s->descripcion

                                                                                        );
                                                                                $comp=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Comp',
                                                                                            'value' => $s->compromisos

                                                                                        );
                                                                                $conc=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Conc'

                                                                                        );
                                                                                $maq=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Maq',
                                                                                            'value' => $s->maquina

                                                                                        );
                                                                                $resp=array(  'id' => 'inputSuccess',
                                                                                            'class' => 'form-control',
                                                                                            'name' => 'Resp',
                                                                                            'value' => $session_data['user'],
                                                                                            'readonly'=>'readonly'

                                                                                        );
                                                                                $TS= $this->ModeloServicio->TServicio('tipo_servicio','nom_servicio');
                                                                                $Estservicio= $this->ModeloServicio->EstadoA('estado_actser','nom_actser');
                                                                                $Cli= $this->ModeloServicio->Clientes('clientes','nombre');
                                                                                $Asis= $this->ModeloServicio->Asistente('usuarios','nombre');

                                                                            ?>
                                                                            <div class="col-md-6">
                                                                                <div class="col-md-12">
                                                                                    <?= form_label('Tipo Servicio:','Ser')?>
                                                                                    <?php
                                                                                        if (is_array($TS)) {
                                                                                    ?>
                                                                                    <?= form_dropdown('Ser',$TS,$s->tipo_servicio,'class=form-control') ?>
                                                                                    <?= form_label('Estado:','Est')?>
                                                                                    <?php
                                                                                        if (is_array($Estservicio)) {
                                                                                    ?>
                                                                                    <?= form_dropdown('Est', $Estservicio,$s->estado,"class='form-control'")?>
                                                                                    <?= form_label('Cliente:','Cli')?>
                                                                                    <?php
                                                                                        if (is_array($Cli)) {
                                                                                    ?>
                                                                                    <?= form_dropdown('Cli', $Cli,$s->cliente,"class='form-control'")?>
                                                                                    <?= form_label('Maquina:','Maq')?>
                                                                                    <?= form_input($maq) ?>
                                                                                    <?= form_label('Responsable:')?>
                                                                                    <?= form_input($resp)?>
                                                                                    <?php if($session_data['user']!=$Asis){ ?>
                                                                                    <?= form_label('Asistente:','Asis')?>
                                                                                    <?php
                                                                                        if (is_array($Asis)) {
                                                                                    ?>
                                                                                    <?= form_dropdown('Asis', $Asis,$s->asistente,"class='form-control'")?>
                                                                                    <?= form_label('Documentos Comprimidos:','DC')?>
                                                                                    <?= form_upload() ?>
                                                                                    <?php  
                                                                                                        }
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
                                                                                    <?= form_label('Compromisos:','Comp')?>
                                                                                    <?= form_textarea($comp) ?>
                                                                                    
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
                                                                                            'onClick' => "window.location.href = '".base_url()."Servicio/Consultar';return false;"
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
                                                    <div class="modal fade" id="VerComponentes<?= $s->id; ?>" tabindex="-1" role="dialog" aria-labelledby="VerComponentesLabel<?= $s->id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h1><span class="label label-success"> Componentes Servicio</span></h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-12">
                                                                    <br>
                                                                        <?php  
                                                                            foreach ($Componente as $c) :
                                                                                if ($c->id_servicio == $s->id) { 
                                                                        ?>
                                                                            <strong>Codigo Servicio:</strong> <?= $c->id_servicio; ?>
                                                                            <strong>Componente:</strong> <?= $c->nom_componente; ?>
                                                                            <strong>Cantidad:</strong> <?= $c->cantidad; ?>
                                                                            <strong>Descripcion:</strong> <?= $c->descripcion; ?>
                                                                        
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