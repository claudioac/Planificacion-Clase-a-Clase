<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Planificacion Clase a Clase</title>
    <link href="<?php echo base_url('css/bootstrap.css')?>" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('rut/jquery.Rut.js'); ?>"></script>
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 60px;
      }

      /* Custom container */
      .container {
        margin: 10 auto;
        max-width: 1000px;
      }
      .container > hr {
        margin: 60px 0;
        
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 80px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 100px;
        line-height: 5;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
      }
      .jumbotron .btn {
        font-size: 20px;
        padding: 10px 14px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }


      /* Customize the navbar links to be fill the entire space of the .navbar */
      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
    </style>
   
  </head>

  <body>
 <div class="container">
<h1 class="text-center page-header"> Planificación Clase a Clase</h1>
     
      <!-- Jumbotron -->
      <div class="jumbotron well">
        <h3>Buscador</h3>
        <hr>
        <?= form_open('index.php/alumno_planificacion/buscar')?> 
        
        <?php

        $codigo_carrera = array(
            'id' => 'codigo_carrera',
            'name'=> 'codigo_carrera',
            'placeholder' => 'Codigo',
            'value' => set_value('codigo_carrera'),

        );


        $codigo_asignatura = array(
            'id' => 'codigo_asignatura',
            'name'=> 'codigo_asignatura',
            'placeholder' => 'Ej: INF-638',
            'value' => set_value('codigo_asignatura'),

        );



        $nombre_profesor = array(
            'id' => 'nombre_profesor',
            'name'=> 'nombre_profesor',
            'placeholder' => 'Nombre',
            'value' => set_value('nombre_profesor')

        );
        $apellidos_profesor = array(
            'id' => 'apellidos_profesor',
            'name'=> 'apellidos_profesor',
            'placeholder' => 'Apellido1 Apellido2',
            'value' => set_value('apellidos_profesor')

        );



        ?>
        
         <?php 
            if ( $this->session->flashdata('ControllerMessage') != '' ) 
                {
            ?>
            <p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
            <?php 
            } 
            ?>
        <?= form_label('Codigo Carrera:','codigo_carrera') ?>  
        <?=form_input($codigo_carrera)?>   
        <?= form_label('Codigo Asignatura:','codigo_asignatura') ?>  
        <?=form_input($codigo_asignatura)?>
            
       <?= form_label('Semestre:','semestre') ?>      
        <select name="semestre" id="semestre">
                     <option value="0"> Seleccione Semestre</option>
                     <option value="1" <?php echo set_select('semestre') ?>>1</option>
                     <option value="2" <?php echo set_select('semestre') ?>>2</option>
         </select>
        <?= form_label('Nombre Profesor:','nombre_profesor') ?>  
        <?=form_input($nombre_profesor)?>
        <?= form_label('Nombre Apellidos:','apellidos_profesor') ?>  
        <?=form_input($apellidos_profesor)?>
    
    
            <br>   
        <?= anchor('index.php/logeo', 'Inicio', array('class' => 'btn btn-mini btn-primary'));?>    
        <?=  form_submit('','Buscar','class="btn btn-success"')?>
        
        
        
        <div class="text-error">
        <br>
        <?php echo validation_errors(); ?>
        </div>
        <?= form_close()?> 
        
</div>


      
      <hr>


  
</br>
<div class="footer text-center ">
        <p>&copy; Universidad Tecnológica Metropolitana</p>
        <p>Estado de Chile</p>
      </div>

    </div> <!-- /container -->



  </body>
</html>