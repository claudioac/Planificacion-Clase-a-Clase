<script type="text/javascript">
        $(document).ready(function(){
           $('#rut_profesor').Rut({
        on_error: function(){ alert('Rut incorrecto'); }
            });
                });
</script>

<h1 class="text-center page-header">Eliminar</h1>

<div class="form-inline">
<?= form_open('index.php/eliminar_planificacion/recibirdatos')?>    

<?php $rut_profesor = array(
    'id' => 'rut_profesor',
    'name'=> 'rut_profesor',
    'placeholder' => '12.345.678-9',
    'class' => 'required rut'
    
);
?>
    <div class="offset">
<?= form_label('Rut Docente:','rut') ?>
    </div>
<?=form_input($rut_profesor)?>

<?=  form_submit('','Enviar','class="btn btn-primary"')?>    
 <?= form_close()?>   

<table border="1">

  <tr>

    <th>ID</th>

    <th>Rut</th>    

    <th>Facultad</th>    

    <th>Departamento</th>
    <th>facultad</th>
    <th>escuela</th> 
    <th>objetivo</th>
    <th>asignatura</th>
    <th>semestre</th>
    <th>fecha</th>
    <th>estrategia</th>
    <th>carrera</th> 
  </tr>

<?php 

foreach($query as $row){

  echo "<tr>";

    echo "<td>". $row->cod_clasificacion."</td>";

    echo "<td>". $row->rut."</td>";

    echo "<td>". $row->facultad."</td>";

    echo "<td>". $row->departamento."</td>";
    
    echo "<td>". $row->escuela."</td>";
  
    echo "<td>". $row->objetivo."</td>";
    
    echo "<td>". $row->asignatura."</td>";

    echo "<td>". $row->semestre."</td>";

    echo "<td>". $row->fecha."</td>";

    echo "<td>". $row->estrategia."</td>";

    echo "<td>". $row->carrera."</td>";




  echo "</tr>";   

}

?>
</table>
 

    
</div>    
