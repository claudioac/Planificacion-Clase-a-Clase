<h1 class="text-center page-header">Planificaciones</h1>

<table class="table table-striped" >

  <tr>
    <th>Codigo</th>
    <th>Rut</th>
    <th>Asignatura</th>
    <th>Fecha</th>
    <th>Semestre</th>
    <th>Contenido</th>
    <th>Editar</th>
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
                        <td><?php echo $datos->rut?></td>
                        <td><?php echo $datos->asignatura?></td>
                        <td><?php echo $datos->fecha?></td>
                        <td><?php echo $datos->semestre;?></td>
                        <td>
                            <a
                                href="<?php echo base_url()?>index.php/contenido_planificacion/mostrarContenido/<?php echo $datos->cod_clasificacion?>" class="btn btn-info">Contenido</a>
                        </td>
                        <td>
                            <a href="<?php echo base_url()?>index.php/editar_planificacion/editar/<?php echo $datos->cod_clasificacion?>" class="btn btn-success">Editar</a>
                            
                        </td>
                         <td>
                            <a href="<?php echo base_url()?>index.php/Descargar/index/<?php echo $datos->cod_clasificacion?>" onclick="return confirm('¿Desea Descargar esta Planificación?')" class="btn btn-mini btn-inverse">Descargar</a>
                            
                        </td>
                        
                        
                        

                </tr>
                <?php 
        } ?>
  </table>
