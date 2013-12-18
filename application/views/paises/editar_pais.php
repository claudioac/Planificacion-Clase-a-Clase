
<h2 class="text-center page-header">Editar País</h2>

<div class="text-center">
<?= form_open('index.php/paises/editar/'.$query->pk)?>    

<?php

$codigo_pais = array(
    'id' => 'codigopais',
    'name'=> 'codigopais',
    'placeholder' => 'Codigo',
    'value' => $query->cod_num,
    
);


$pais = array(
    'id' => 'nombre',
    'name'=> 'nombre',
    'placeholder' => 'nombre',
    'value' => $query->nombre,
    
);

$alfa_tres = array(
    'id' => 'alfatres',
    'name'=> 'alfatres',
    'placeholder' => 'Numero',
    'value' => $query->alfa_tres,
    
);

$alfa_dos = array(
    'id' => 'alfados',
    'name'=> 'alfados',
    'placeholder' => 'Numero',
    'value' => $query->alfa_dos,
    
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
<?= anchor('index.php/paises', 'Cancelar', array('class' => 'btn btn-primary'));?>    
<?=  form_submit('','Actualizar','class="btn btn-danger"')?>
    
 
    <div class="text-error">
        <br>
<?php echo validation_errors(); ?>
    </div>
 <?= form_close()?> 
    
</div>    

