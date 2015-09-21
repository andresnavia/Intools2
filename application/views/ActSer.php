<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Ing. Juan David Martinez">
        
        <link href="<?= base_url()?>plantilla/img/LogoIn.png"  rel="shortcut icon" type="image/vnd.microsoft.icon">
        
        <link href="<?= base_url()?>plantilla/css/bootstrap2.css" rel="stylesheet" />
        <link href="<?= base_url()?>plantilla/css/font-awesome.css" rel="stylesheet" />
        <link href="<?= base_url()?>plantilla/css/custom2.css" rel="stylesheet" />
        <link href="<?= base_url()?>plantilla/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        

        <title>
            INTOOLS
        </title>
      
    </head>
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
                    <img src="<?= base_url() ?>plantilla/img/indel.png" class="user-image img-responsive"/>
                </div>
                <a class="navbar-brand" href="<?= base_url()?>Home">INTOOLS</a>
                <div style="color: white; float: right; font-size: 16px;">
                    <a href="<?= base_url()?>Home" target="blank"><img src="<?= base_url() ?>plantilla/img/find_user.png" class="user-image1 img-responsive"/></a>
                </div>
            </nav><!-- /. NAV TOP  -->
            
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                ...
                                </div> 
                                <div class="panel-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#home" data-toggle="tab">Actividades</a>
                                        </li>
                                        <li class=""><a href="#profile" data-toggle="tab">Servicios</a>
                                        </li>
                                        <li class=""><a href="#messages" data-toggle="tab">Messages</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="home">
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-condensed table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr class="info">
                                                            <th>Fecha Creacion</th>
                                                            <th>Actividad</th>
                                                            <th>Responsable</th>
                                                            <th>Asistente</th>
                                                            <th>Descripcion</th>
                                                            <th>Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            foreach ($activity as $a):
                                                                
                                                                $session_data = $this->session->userdata('logged_in');
                                                                if ($a->nom_actser == 'Activo') {
                                                                     
                                                        ?>
                                                        <tr>
                                                            <td><?= $a->fecha_creada; ?></td>
                                                            <td><?= $a->nom_actividad; ?></td>
                                                            <td><?= $a->nombre," ",$a->apellido ?></td>
                                                            <td><?= $a->nombre," ",$a->apellido ?></td>
                                                            <td width="30%"><?= $a->descripcion?></td>
                                                           <td><span class="label label-success"><?= $a->nom_actser; ?></span></td>
                                                        </tr>
                                                        <?php  
                                                                }
                                                            endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>    
                                        </div>
                                        <div class="tab-pane fade" id="profile">
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-condensed table-bordered table-hover" id="dataTables-example2" data-sort-order="desc">
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
                                                                if ($s->nom_actser=='Activo') {
                                                                     
                                                        ?>
                                                        <tr>
                                                            <td><?= $s->fecha_creada; ?></td>
                                                            <td><?= $s->nom_servicio; ?></td>
                                                            <td><?= $s->nombre," ",$s->apellido ?></td>
                                                            <td><?= $s->nom_actser; ?></td>
                                                            <td>
                                                                
                                                            </td>
                                                        </tr>
                                                        <?php  
                                                                }
                                                            endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div> 
                                        </div>
                                        <div class="tab-pane fade" id="messages">
                                            
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
            $('#dataTables-example').dataTable();
        });
    </script>
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