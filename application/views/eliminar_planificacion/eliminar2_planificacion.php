<h1 class="text-center page-header">Eliminar</h1>

<table class="table table-striped" >

  <tr>

    <th>Codigo</th>

    <th>Rut</th>    

    
    <th>Asignatura</th>
    
    <th>Fecha</th>
    
    <th>Semestre</th> 
    
    <th>Eliminar</th>
  </tr>
                        <?php 
               
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
                        <a href="<?php echo base_url()?>index.php/eliminar_planificacion/eliminar/<?php echo $datos->cod_clasificacion?>/<?php echo $datos->rut?>" onclick="return confirm('¿Desea eliminar esta Planificación?')" class="btn btn-warning" >Eliminar</a>
                            
                        </td>
                        
                        
                        

                </tr>
                <?php 
        } ?>
  </table>


<div class="text-center">

<?= anchor('index.php/inicio', 'Cancelar', array('class' => 'btn btn-primary'));?>    

</div>    