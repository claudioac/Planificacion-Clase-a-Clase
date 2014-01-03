 <div class="jumbutron">
    <h1 class="text-center page-header">Editar Planificación</h1>
    
    <script type="text/javascript">
        
        $(document).ready(function() {
            $("#facultad").change(function() {
                $("#facultad option:selected").each(function() { 
                   facultad = $('#facultad').val();
                    $.post("<?= base_url('/index.php/editar_planificacion/llena_departamentos')?>", {
                        facultad : facultad
                    }, function(data) {
                        $("#departamento").html(data);
                    });
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#departamento").change(function() {
                $("#departamento option:selected").each(function() { 
                   departamento = $('#departamento').val();
                    $.post("<?= base_url('/index.php/editar_planificacion/llena_escuelas')?>", {
                        departamento : departamento
                    }, function(data) {
                        $("#escuela").html(data);
                    });
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#escuela").change(function() {
                $("#escuela option:selected").each(function() { 
                   escuela = $('#escuela').val();
                    $.post("<?= base_url('/index.php/editar_planificacion/llena_carreras')?>", {
                        escuela : escuela
                    }, function(data) {
                        $("#carrera").html(data);
                    });
                });
            });
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function() {
            $("#carrera").change(function() {
                $("#carrera option:selected").each(function() { 
                   carrera = $('#carrera').val();
                    $.post("<?=base_url('/index.php/editar_planificacion/llena_asignaturas')?>", {
                        carrera : carrera
                    }, function(data) {
                        $("#ramo").html(data);
                    });
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
           $('#rut_profesor').Rut({
        on_error: function(){ alert('Rut incorrecto'); }
            });
                });
    </script>
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
$("#fecha").datepicker({
minDate: "0D",
//maxDate: "+1M, 5D"
});
});
</script>
    
   

    
     <?= form_open('index.php/editar_planificacion/editar/'.$query->cod_clasificacion)?>
    </div>
    
    <div class="container-fluid">
        <div class="row-fluid">
             <div class="span2 offset1" >
                 
    <?= form_label('Facultad: ','facultad')?>             
    <select required name="facultad" id="facultad" value="<?php echo set_value('facultad')?>">
        <option value="">Ingrese su facultad</option>
        <?php 
        foreach($facultades->result() as $fila)
        {
        ?>
        
            <option value="<?=$fila->pk?>"><?= $fila->facultad ?></option>
        <?php
        }
        ?>        
    </select>
    <?= form_label('Departamento: ','departamento')?>
     <select required name="departamento" id="departamento"  >
         
         <option value="">Selecciona Departamento</option>
    </select>
    <?= form_label('Escuela: ','facultad')?>   
    <select required name="escuela" id="escuela" >
            
            <option value="">Selecciona Escuela</option>
    </select>
   <?= form_label('Carrera : ','carrera')?>   
    <select required name="carrera" id="carrera">
       
        <option value="">Selecciona Carrera</option>
        
    </select>
    <?= form_label('Asignatura: ','asignatura')?>   
    <select required name="ramo" id="ramo" >
       
        <option value="">Selecciona Asignatura</option>
        
    </select>
        <?php $profesor=array(
             'id'=>'rut_profesor',
             'name'=>'rut_profesor',
             'placeholder'=>'12.345.678-9',
             'required type'=> 'text',
            'value' => $query->rut
         );
         $fecha=array(
             'name'=>'fecha',
             'type'=>'text',
             'id'=>'fecha',
             'value' => $query->fecha
         );
//         $semestre=array(
//             'name'=>'semestre',
//             'placeholder'=>'Número del Semestre',
//             'required type'=> 'text',
//             'value' => $query->semestre
//         );
         ?>
                 
      <?= form_label('Profesor Encargado: ','rut')?>
      <?= form_input($profesor)?>
      <?= form_label('Fecha: ','Fecha')?>
       <?= form_input($fecha)?>
          <select name="semestre" id="semestre">
                     <option value="<?php echo $query->semestre ?>" <?php echo set_select('semestre') ?>><?php echo $query->semestre ?></option>
                     <option value="1" <?php echo set_select('semestre') ?>>1</option>
                     <option value="2" <?php echo set_select('semestre') ?>>2</option>
                 </select>
                 
     </div>
            
                 
    <div class="span6 offset2 ">
           <?php   $objetivo=array(
             'name'=>'objetivo',             
             'rows'=>'10',
             'class'=>'field span12',
             'value' => $query->objetivo
         );   ?>
        
            <?= form_label('Objetivos: <br> ','objetivo')?>
            <?= form_textarea($objetivo)?>
    </div>  
    <div class="span6 offset2">
     <?php   $estrategia=array(
             'name'=>'estrategia',
             'rows'=>'10',
             'class'=>'field span12',
         'value' => $query->estrategia
             
             
     );?>
        
            <?= form_label('Estrategia: <br> ','estrategia')?>
            <?= form_textarea($estrategia)?>
    </div>          
            
        </div>
        
    </div>
    
    <div class="text-center">
        <?= anchor('index.php/mostrar_planificacion', 'Cancelar', array('class' => 'btn btn-danger'));?>   
        <?=  form_submit('','Actualizar','class="btn btn-primary"')?>
    </div>  
     <div class="text-error text-center">
        <br>
        <?php echo validation_errors(); ?>
    </div>
     <?= form_close()?>
    
    <br>