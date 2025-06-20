<?php echo $this->extend("template/layout"); ?>
<?php echo $this->section('contenido'); ?>

<form action="" method="post">
<br/>
    Fecha de inicio: 
    <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio">
    <br>
    Fecha de fin: 
    <input class="form-control" type="date" name="fecha_fin" id="fecha_fin">
    <br>
    <button class="btn btn-success" type="submit" value="ver" name="ver"> Consultar datos</button>
</form>
<br/>
Lista de entradas
<br/>
<?php if(!empty($entradas_salidas)):?>

<table class="table" >
    <thead>
    <tr>
        <th>Nombre </th>
        <th>Puesto</th>
        <th>Días trabajados</th>
        <th>Total de tiempo trabajado</th>

      
    

    </tr>
    </thead>
    <?php foreach($entradas_salidas as $entrada): ?>
    <tr>
       
        <td><?= $entrada['nombre']; ?></td>
        <td><?= $entrada['nombre_puesto']; ?></td>
        <td><?= $entrada['dias_trabajados']; ?></td>
        <td><?= $entrada['horas_trabajadas']; ?></td>

       
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>

<?php echo $this->endSection('contenido'); ?>