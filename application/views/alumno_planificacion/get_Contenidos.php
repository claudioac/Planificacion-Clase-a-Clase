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


<h1 class="text-center page-header">Contenidos</h1>




<table class="table table-striped" >

  <tr>

    <th>Unidad</th>

    <th>Objetivos</th>    

    
    <th>Contenido</th>
    
    <th>Evaluaciones</th>
    
    <th>Inicio de Semana</th>
    <th>Termino de Semana</th>
    <th>Especificaciones</th>
    
  </tr>
                        <?php 
               
                        foreach ($query as $datos)
                        {
                                ?>
                        <tr>
                        <td><?php echo $datos->unidad;?></td>
                        <td><?php echo $datos->objetivos_esp?></td>
                        <td><?php echo $datos->contenido_tematico?></td>
                        <td><?php echo $datos->evaluaciones?></td>
                        <td><?php echo $datos->fecha_iniciosemana;?></td>
                        <td><?php echo $datos->fecha_terminosemana;?></td>
                        <td>
                            <a
                                href="<?php echo base_url()?>index.php/alumno_planificacion/mostrar_contenido/<?php echo $datos->id_contenido;?>/<?php echo $datos->cod_clasificacion?>" class="btn btn-success">Especificaciones</a>
                        </td>
                        
                        
                        

                </tr>
                <?php 
        } ?>
  </table>




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