<?php echo $this->extend("template/layout"); ?>
<?php echo $this->section('contenido'); ?>
<h2>  Gestión de Empleados</h2>
<a class="btn btn-success" href="<?= base_url('empleados/crear');?>"> 
    <i class="bi bi-people icon"></i>  Crear nuevo </a>
<br/><br/>
<div
    class="table-responsive"
>
    <table
        class="table"
    >
        <thead>
            <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Clave</th>
            <th>Correo</th>
            <th>Puesto</th>
            <th>Foto</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($empleados as $empleado) : ?>
            <tr>
                <td><?= esc($empleado['id_empleado']) ?></td>
                <td><?= esc($empleado['nombre']) ?></td>
                <td><?= esc($empleado['clave']) ?></td>
                <td><?= esc($empleado['correo']) ?></td>
                <td><?= esc($empleado['nombre_puesto']) ?></td>
                <td><img src="<?= base_url('uploads/'.$empleado['foto']) ?>" width="50"></td>
                <td>

                    <a class="btn btn-warning"
                     href="<?= base_url('empleados/editar/'.$empleado['id_empleado'])?>">
                     <i class="bi bi-pen icon"></i>
                     Editar
                    </a>
                    <a class="btn btn-danger" href="<?= base_url('empleados/eliminar/'.$empleado['id_empleado'])?>"
                    onclick="return confirm('¿Estas seguro de eliminar este empleado?')"
                    ><i class="bi bi-trash icon"></i> Eliminar</a>

                    <a 
                    class="btn btn-info" 
                    href="<?= base_url('entradas_salidas/'.$empleado['id_empleado'])?>">
                    <i class="bi bi-clock icon"></i>
                    Asistencia</a>
                    
                </td>
            </tr>
        <?php endforeach; ?>
           
        </tbody>
    </table>
</div>




<?php echo $this->endSection('contenido'); ?>
