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


<h1 class="text-center page-header">Planificaciones</h1>

<table class="table table-striped" >

  <tr>
    <th>Codigo</th>
    <th>Nombre Profesor</th>
    <th>Apellidos</th>
    <th>Fecha</th>
    <th>Semestre</th>
    <th>Contenido</th>
    <th>Objetivos y Estrategias</th>
    <th>Descargar</th>
  </tr>
  
                                
  
                        <?php 
                           if (count ($query)<=0)
                        echo 
                        '<script language="javascript" type="text/javascript">
                        alert("No existen datos");
                        </script>';
                         else
               
                        foreach ($query as $datos)
                        {
                                ?>
                        <tr>
                        <td><?php echo $datos->cod_clasificacion;?></td>
                        <td><?php echo $datos->nombre?></td>
                        <td><?php echo $datos->apellidos?></td>
                        <td><?php echo $datos->fecha?></td>
                        <td><?php echo $datos->semestre;?></td>
                        <td>
                            <a
                                href="<?php echo base_url()?>index.php/alumno_planificacion/contenidos/<?php echo $datos->cod_clasificacion?>" class="btn btn-info">Contenidos</a>
                        </td>
                        <td>
                            <a href="<?php echo base_url()?>index.php/alumno_planificacion/objetivosyestrategias/<?php echo $datos->cod_clasificacion?>" class="btn-small btn btn-success">Objetivos y Estrategia</a>
                            
                        </td>
                        <td>
                            <a href="<?php echo base_url()?>index.php/Descargar/index/<?php echo $datos->cod_clasificacion?>" onclick="return confirm('¿Desea Descargar esta Planificación?')" class="btn btn-mini btn-inverse">Descargar</a>
                            
                        </td>
                        
                        
                        

                </tr>
                <?php 
        } ?>
  </table>

    <div class="text-center">
     <input type="button" value="Atrás" class="btn btn-large btn-inverse" onclick="history.back(-1)" />
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