<script type="text/javascript">
        $(document).ready(function(){
           $('#rut_profesor').Rut({
        on_error: function(){ alert('Rut incorrecto'); }
            });
                });
</script>

<h1 class="text-center page-header">Eliminar</h1>

<div class="form-inline text-center">
<?= form_open('index.php/eliminar_planificacion/recibirdatos')?>    

<?php $rut_profesor = array(
    'id' => 'rut_profesor',
    'name'=> 'rut_profesor',
    'placeholder' => '12.345.678-9',
    'required type'=> 'text'
    
);
?>
    <div class="offset">
<?= form_label('Rut Docente:','rut') ?>
    </div>
<?=form_input($rut_profesor)?>

<?=  form_submit('','Enviar','class="btn btn-primary"')?>    
 <?= form_close()?>   


 

    
</div>    
