<?php echo $this->extend("template/layout"); ?>
<?php echo $this->section('contenido'); ?>
<br>

<form 
action="<?= base_url('empleados/actualizar/'.$empleado['id_empleado']) ?>"
 method="post" 
 enctype="multipart/form-data" 
 >
 <h5>Datos del empleado </h5>
    Nombre: 
    <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $empleado['nombre'] ?>">
    <br>

    Correo:
    <input  class="form-control" type="text" name="correo" id="correo" value="<?= $empleado['correo'] ?>">
    <br>
    
Puesto:
    <select class="form-select" name="id_puesto" id="id_puesto">
        <?php foreach ($puestos as $puesto): ?>
        <option value="<?= $puesto['id_puesto'] ?>"  <?= $empleado['id_puesto']==  $puesto['id_puesto']?'selected':''  ?>>
            <?= $puesto['nombre_puesto'] ?>
        </option>
        <?php endforeach; ?>
    </select>

    <br>
    Foto:
    <input class="form-control" type="file" name="foto" id="foto">

    <br>
    <input class="btn btn-success" type="submit" value="Actualizar">
    <a class="btn btn-warning" href="<?= base_url('empleados');?>">Cancelar</a>
    
</form>

<?php echo $this->endSection('contenido'); ?>