<?php echo $this->extend("template/layout"); ?>
<?php echo $this->section('contenido'); ?>

<h5>Lista de entradas</h5>

<div
    class="table-responsive"
>
    <table
        class="table"
    >
        <thead>
            <tr>
            <th>ID</th>
        <th>Nombre del empleado </th>
        <th>Fecha </th>
        <th>Entrada </th>
        <th>Salida</th>

        <th>Total de horas</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($entradas_salidas as $entrada): ?>
    <tr>
        <td><?= $entrada['id_registro']; ?></td>
        <td><?= $entrada['nombre_empleado']; ?></td>
        <td><?= $entrada['fecha']; ?></td>
        <td><?= $entrada['hora_entrada']; ?></td>
        <td><?= $entrada['hora_salida']; ?></td>
        <td><?= $entrada['total_horas']; ?></td>
    </tr>
    <?php endforeach; ?>
           
        </tbody>
    </table>
</div>



<?php echo $this->endSection('contenido'); ?>