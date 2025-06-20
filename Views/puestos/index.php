<?php echo $this->extend("template/layout"); ?>

<?php echo $this->section('contenido'); ?>

<h2>  Gestión de puestos</h2>
<a class="btn btn-success" href="<?= base_url('puestos/crear');?>"> 
    <i class="bi bi-person-bounding-box icon"></i>  Crear nuevo </a>
<br><br>

<table  class="table" >
<thead>
    <tr>
        <th>Id</th>
        <th>Puesto</th>
        <th>Acciones</th>
        
    </tr>
</thead>
    <?php foreach($puestos as $puesto): ?>
    <tr>
        <td><?= $puesto['id_puesto']; ?></td>
        <td><?= $puesto['nombre_puesto']; ?></td>
        <td>
            <a class="btn btn-warning" 
            href="<?= base_url('puestos/editar/'.$puesto['id_puesto']);?>">
            <i class="bi bi-pen icon"></i>
            Editar</a>

            <a class="btn btn-danger" 
            href="<?= base_url('puestos/eliminar/'.$puesto['id_puesto']);?>"
            onclick="return confirm('¿Estás seguro de eliminar este puesto?')"
            ><i class="bi bi-trash icon"></i>  Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<?php echo $this->endSection('contenido'); ?>