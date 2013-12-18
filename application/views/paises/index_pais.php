<h1 class="text-center page-header">Paises</h1>


<table class="table table-striped" >

  <tr>

    <th>ID</th>

    <th>Codigo País</th>    

    
    <th>Alfa 3</th>
    
    <th>Alfa 2</th>
    
    <th>Nombre</th>
    <th>Editar</th>
    <th>Eliminar</th>
  </tr>
                        <?php 
               
                        foreach ($query as $datos)
                        {
                                ?>
                        <tr>
                        <td><?php echo $datos->pk;?></td>
                        <td><?php echo $datos->cod_num?></td>
                        <td><?php echo $datos->alfa_tres?></td>
                        <td><?php echo $datos->alfa_dos?></td>
                        <td><?php echo $datos->nombre;?></td>
                        <td>
                            <a
                                href="<?php echo base_url()?>index.php/paises/editar/<?php echo $datos->pk;?>" class="btn">Editar</a>
                        </td>
                        <td> 
                        <a href="<?php echo base_url()?>index.php/paises/eliminar/<?php echo $datos->pk?>" onclick="return confirm('¿Desea eliminar este País?')" class="btn btn-warning" >Eliminar</a>
                            
                        </td>
                        
                        

                </tr>
                <?php 
        } ?>
  </table>

<h2 class="text-center page-header">Agregar País</h2>

<div class="text-center">
<?= form_open('index.php/paises/crear')?>    

<?php

$codigo_pais = array(
    'id' => 'codigopais',
    'name'=> 'codigopais',
    'placeholder' => 'Codigo',
    'value' => set_value('codigopais'),
    
);


$pais = array(
    'id' => 'nombre',
    'name'=> 'nombre',
    'placeholder' => 'Nombre',
    'value' => set_value('nombre'),
    
);

$alfa_tres = array(
    'id' => 'alfatres',
    'name'=> 'alfatres',
    'placeholder' => 'Numero',
    'value' => set_value('alfatres')
    
);

$alfa_dos = array(
    'id' => 'alfados',
    'name'=> 'alfados',
    'placeholder' => 'Numero',
    'value' => set_value('alfados')
    
);



?>
      
<?= form_label('Codigo:','codigo') ?>  
<?=form_input($codigo_pais)?>   
<?= form_label('Nombre:','pais') ?>  
<?=form_input($pais)?>
<?= form_label('Alfa Tres:','alfa3') ?>  
<?=form_input($alfa_tres)?>
<?= form_label('Alfa Dos:','alfa2') ?>  
<?=form_input($alfa_dos)?>
    
    
    <br>   
<?= anchor('index.php/inicio', 'Cancelar', array('class' => 'btn btn-primary'));?>    
<?=  form_submit('','Agregar','class="btn btn-danger"')?>
    
 
    <div class="text-error">
        <br>
<?php echo validation_errors(); ?>
    </div>
 <?= form_close()?> 
    
</div>    


