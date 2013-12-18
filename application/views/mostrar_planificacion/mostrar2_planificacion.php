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
                                href="<?php echo base_url()?>index.php/mostrar_planificacion/contenido/<?php echo $datos->cod_clasificacion?>" class="btn btn-info">Contenido</a>
                        </td>
                        <td>
                            <a href="<?php echo base_url()?>index.php/mostrar_planificacion/editar/<?php echo $datos->cod_clasificacion?>" class="btn btn-success">Editar</a>
                            
                        </td>
                        
                        
                        

                </tr>
                <?php 
        } ?>
  </table>
