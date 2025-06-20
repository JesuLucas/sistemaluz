<?php echo $this->extend("template/layout"); ?>
<?php echo $this->section('contenido'); ?>
<br>

<form 
action="<?= base_url('puestos/actualizar');?>/<?= $puesto['id_puesto'];?>" 
method="post">

    <input class="form-control" type="text" name="nombre_puesto" value="<?= $puesto['nombre_puesto'];?>" id="nombre_puesto">
    <br>
    <button class="btn btn-success" type="submit"> Actualizar </button>
    
    <a class="btn btn-warning" href="<?= base_url('puestos');?>">Cancelar</a>
</form>

<?php echo $this->endSection('contenido'); ?>