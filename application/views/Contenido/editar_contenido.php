<h1 class="text-center page-header">Editar Contenido</h1>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-es.js"></script>  
   
<script>
$(function () {
 $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };    
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#fechainicio").datepicker({
minDate: "0D",
//maxDate: "+1M, 5D"
});
});
</script>

<script>
$(function () {
 $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };    
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#fechatermino").datepicker({
minDate: "0D",
//maxDate: "+1M, 5D"
});
});
</script>

<div class="container-fluid">
    <div class="row-fluid">  

    <?= form_open(base_url('index.php/contenido_planificacion/editar/'.$id. '/'.$query->cod_clasificacion)); ?>
    <?php
    $unidad = array(
        'name' => 'unidad',
        'id' => 'unidad',
        'placeholder' => 'Unidad',
        'value' => $query->unidad
    );
    $semanaAnual = array(
        'name' => 'semana_anual',
        'id' => 'semana_anual',
        'placeholder' => 'Semana',
        'value' => $query->num_semana_anual
    );
    $semanaSemestral = array(
        'name' => 'semana_semestral',
        'id' => 'semana_semestral',
        'placeholder' => 'Semana',
        'value' => $query->num_sem_semestral
    );
    $obj_esp = array(
        'name' => 'objetivos',
        'id' => 'objetivos',
        'placeholder' => 'Objetivos',
        'rows'=>'5',
        'class'=>'field span12',
        'value' => $query->objetivos_esp
    );

    $fechainicial = array(
        'name' => 'fechainicio',
        'id' => 'fechainicio',
        'type' => 'text',
        'value' => $query->fecha_iniciosemana
    );

    $fechatermino = array(
        'name' => 'fechatermino',
        'id'=>'fechatermino',
        'type' => 'text',
        'value' => $query->fecha_terminosemana
    );
    $contTematico = array(
        'name' => 'ContenidoTematico',
        'id' => 'ContenidoTematico',
        'placeholder' => 'Contenido Tematico',
        'rows'=>'5',
         'class'=>'field span12',
        'value' => $query->contenido_tematico
    );
    $evaluaciones = array(
        'name' => 'evaluaciones',
        'id' => 'evaluaciones',
        'placeholder' => 'Evaluaciones',
        'rows'=>'5',
        'class'=>'field span12',
        'value' => $query->evaluaciones
    );
    $boton = array(
        'name' => 'enviar',
        'id' => 'enviar',
        'value' => 'Enviar',
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
<?= form_hidden('planificacion',$query->cod_clasificacion); ?>
    <div class="text-center">
        <?= anchor('index.php/inicio', 'Cancelar', array('class' => 'btn btn-danger'));?>   
        <?=  form_submit('','Actualizar','class="btn btn-primary"')?>
    </div>  
<?= form_close() ?>
    
    
  
    <div class="text-error text-center">
        <br>
<?php echo validation_errors(); ?>
    </div>