<?php echo $this->extend("template/layout"); ?>
<?php echo $this->section('contenido'); ?>
<br>

<form action="<?= base_url('puestos/guardar');?>" method="post">
    Nombre del puesto:
    <input class="form-control" type="text" name="nombre_puesto" id="nombre_puesto" required>
    <br>
    <button class="btn btn-success" type="submit"> Guardar </button>
    
    <a class="btn btn-warning" href="<?= base_url('puestos');?>">Cancelar</a>
</form>


<?php echo $this->endSection('contenido'); ?>