<h1 class="text-center page-header">Eliminar</h1>

<table class="table table-striped" >

  <tr>

    <th>Codigo</th>

    <th>Rut</th>    

    
    <th>Asignatura</th>
    
    <th>Fecha</th>
    
    <th>Semestre</th> 
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
                        
                        
                        

                </tr>
                <?php 
        } ?>
  </table>


<div class="text-center">
<?= form_open('index.php/eliminar_planificacion/eliminar')?>    

<?php $elimnar_planificacion = array(
    'id' => 'eliminar_planificacion',
    'name'=> 'eliminar_planificacion',
    'placeholder' => 'Codigo',
    'required type'=> 'text'
    
);
?>
      
    <div class="offset">
<?= form_label('Codigo:','elimnar_planificacion') ?>
    </div>
<?=form_input($elimnar_planificacion)?>
    <br>
<?= anchor('index.php/inicio', 'Cancelar', array('class' => 'btn btn-primary'));?>    
<?=  form_submit('','Eliminar','class="btn btn-danger"')?>

 <?= form_close()?>   


 

    
</div>    