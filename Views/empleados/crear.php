<?php echo $this->extend("template/layout"); ?>
<?php echo $this->section('contenido'); ?>
<br>

<form action="<?= base_url('empleados/guardar')?>" 
method="post" 
enctype="multipart/form-data" >
<h5>Datos del empleado </h5>
Nombre: 
<input class="form-control" type="text" name="nombre" id="nombre" required />
<br>

Correo:
<input class="form-control" type="text" name="correo" id="correo" required />
<br>

Puesto:
<select class="form-select" name="id_puesto" id="id_puesto">
    
    <?php foreach ($puestos as $puesto): ?>

    <option value="<?= $puesto['id_puesto'] ?>">
        <?= $puesto['nombre_puesto'] ?>
    </option>
    <?php endforeach; ?>

</select>
<br>
Foto:
<input class="form-control" type="file" name="foto" id="foto" />
<br>

<input class="btn btn-success" type="submit" value="Guardar" />
<a class="btn btn-warning" href="<?= base_url('empleados');?>">Cancelar</a>

</form>

<?php echo $this->endSection('contenido'); ?>
