<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Planificación Clase a Clase</title>
        <link href="<?php echo base_url('css/bootstrap.css') ?>" rel="stylesheet">
        <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
        <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('rut/jquery.Rut.js'); ?>"></script>
    </head>
    <body>

        <div class="container">

            <h1 class="text-center page-header">Portal Planificación Clase a Clase</h1>
            <div class="row">
                <div id="myCarousel" class="carousel slide" style="width: 700px; margin: 0 auto">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?php echo base_url('img/imagen1.jpg') ?>"  alt="">
                            <div class="carousel-caption">
                                <h4>Planificación Clase a Clase</h4>
                                <p>Aplicación de administracion de planificaciones semestrales</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url('img/utem3.jpg') ?>" height="120" width="600" alt="">
                            <div class="carousel-caption">
                                <h4>Universidad Tecnológica Metropolitana</h4>
                                <p>Del Estado de Chile</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url('img/imagen2.jpg') ?>" alt="">
                            <div class="carousel-caption">
                                <h4>Departamento de Computación e Informática</h4>
                                <p>Escuela de Informática</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url('img/imagen1.jpg') ?>"alt="">
                            <div class="carousel-caption">
                                <h4>Ingenieria en Software</h4>
                                <p>Profesor: Sebastián Salazar Molina</p>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
            
            <br>

            <div class="text-center">
                <a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">Inicia sesion</a>
                <a class="btn btn-success" href="<?= base_url('index.php/alumno_planificacion') ?>">Buscar Planificación</a>

            </div>
            <?= form_open('index.php/logeo/login') ?>    
            <div id="myModal" class="modal hide fade text-center">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h3>Portal UTEM</h3>	
                </div>
                <div class="modal-body">
                    <for class="form-horizontal" role="form">

                        <div class="form-gruop control-gruop">
                            <script type="text/javascript">
                                jQuery(document).ready(function() {
                                    jQuery('#Usuario').Rut({
                                        on_error: function() {
                                            alert('Rut incorrecto');
                                        }
                                    });
                                });
                            </script>  

                            <label for="Usuario" class=" control-label">Usuario</label>
                            <div class="controls">
                                <input type="text" name="Usuario" id="Usuario" placeholder="12.345.678-9" value="<?php echo set_value("Usuario") ?>">
                            </div>
                        </div>
                        <h4></h4>
                        <div>
                            <div class="for-group control-group">
                                <label for="Password" class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" name="Password" id="Password" placeholder="Password" value="<?php echo set_value("Password") ?>">
                                </div>

                            </div>
                        </div>


                    </for>
                </div>	
                <div class="text-error">
                    <br>

                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-inverse" data-dismiss="modal">Salir</a>
                    <?= form_submit('', 'Ingresar', 'class="btn btn-success"') ?>

                </div>
            </div>
            <?= form_close() ?> 

            <div class="text-center"> 

                <?php
                $error_msg = trim($this->session->flashdata('ControllerMessage'));
                if (!empty($error_msg)) {
                    error_log($error_msg);
                    ?>
                    <p style="color: red;"><?php echo $error_msg; ?></p>
                    <?php
                }
                ?>


            </div>


        </div>


        <br />
        <div class="footer text-center ">
            <p>&copy; Universidad Tecnológica Metropolitana</p>
            <p>Estado de Chile</p>
        </div>

    </div> <!-- /container -->
</body>
</html>