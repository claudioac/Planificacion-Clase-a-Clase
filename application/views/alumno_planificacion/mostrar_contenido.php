
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Objetivos y Estrategias</title>
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

<h1 class="text-center page-header">Contenido</h1>

<div class="container-fluid">
    <div class="row-fluid">  

    <?php
    $unidad = array(
        'name' => 'unidad',
        'id' => 'unidad',
        'placeholder' => 'Unidad',
        'value' => $query->unidad,
        'Readonly' => 'Readonly'  
    );
    $semanaAnual = array(
        'name' => 'semana_anual',
        'id' => 'semana_anual',
        'placeholder' => 'Semana',
        'value' => $query->num_semana_anual,
        'Readonly' => 'Readonly'  
    );
    $semanaSemestral = array(
        'name' => 'semana_semestral',
        'id' => 'semana_semestral',
        'placeholder' => 'Semana',
        'value' => $query->num_sem_semestral,
        'Readonly' => 'Readonly'  
    );
    $obj_esp = array(
        'name' => 'objetivos',
        'id' => 'objetivos',
        'placeholder' => 'Objetivos',
        'rows'=>'5',
        'class'=>'field span12',
        'value' => $query->objetivos_esp,
        'Readonly' => 'Readonly'  
    );

    $fechainicial = array(
        'name' => 'fechainicio',
        'type' => 'date',
        'value' => $query->fecha_iniciosemana,
        'Readonly' => 'Readonly'  
    );

    $fechatermino = array(
        'name' => 'fechatermino',
        'type' => 'date',
        'value' => $query->fecha_terminosemana,
        'Readonly' => 'Readonly'  
    );
    $contTematico = array(
        'name' => 'ContenidoTematico',
        'id' => 'ContenidoTematico',
        'placeholder' => 'Contenido Tematico',
        'rows'=>'5',
         'class'=>'field span12',
        'value' => $query->contenido_tematico,
            'Readonly' => 'Readonly'  
    );
    $evaluaciones = array(
        'name' => 'evaluaciones',
        'id' => 'evaluaciones',
        'placeholder' => 'Evaluaciones',
        'rows'=>'5',
        'class'=>'field span12',
        'value' => $query->evaluaciones,
        'Readonly' => 'Readonly'    
    );
    
    ?>
<div class="span2 offset1" >
    <table>
        <tr>
            <td>
    <?= form_label('Unidad', 'unidad') ?>

<?= form_input($unidad) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= form_label('Semana Anual', 'semana') ?>
                <?= form_input($semanaAnual) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= form_label('Semana Semestral', 'semana') ?>
                <?= form_input($semanaSemestral) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= form_label('Fecha Inicio', 'fechainicio') ?>
                <?= form_input($fechainicial) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= form_label('Fecha Termino', 'fechatermino') ?>
                <?= form_input($fechatermino) ?>
            </td>
        </tr>
            </table>
    </div>
    <div class="span6 offset2 ">

                <?= form_label('Objetivo Especifico', 'obj_esp') ?>
                <?= form_textarea($obj_esp) ?>
    </div>
    <div class="span6 offset2 ">
                <?= form_label('Contenido Tematico', 'contTematico') ?>

                <?= form_textarea($contTematico) ?>
    </div>
    <div class="span6 offset2 ">
                <?= form_label('Evaluaciones', 'evaluaciones') ?>
                <?= form_textarea($evaluaciones) ?>
    </div>

     </div>    
</div>  




<div class="text-center">
      <input type="button" value="Atrás" class="btn btn-large btn-inverse" onclick="history.back(-1)" />
    </div>

</div> <!-- /container -->


</br>

<div class="footer text-center ">
        <p>&copy; Universidad Tecnológica Metropolitana</p>
        <p>Estado de Chile</p>
      </div>

  



  </body>
</html>