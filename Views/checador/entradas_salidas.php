<?= $this->extend("template/layout_check"); ?>
<?= $this->section('contenido'); ?>

<div class="card shadow-sm border-0">
  <div class="card-header text-white text-center" style="background-color: #1e3a5f;">
    <h2 class="mb-0">Busque sus asistencias (entradas y salidas)</h2>
  </div>

  <div class="card-body">
    <form action="" method="post" class="px-2">
      <h5 class="mb-3">Escriba su clave de empleado:</h5>
      <input class="form-control mb-3" type="text" name="clave" id="clave" required />

      <div class="row">
        <div class="col-md-6">
          <label for="fecha_inicio" class="form-label">Fecha inicio:</label>
          <input class="form-control mb-3" type="date" name="fecha_inicio" id="fecha_inicio" required />
        </div>
        <div class="col-md-6">
          <label for="fecha_fin" class="form-label">Fecha fin:</label>
          <input class="form-control mb-3" type="date" name="fecha_fin" id="fecha_fin" required />
        </div>
      </div>

      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <button class="btn btn-success me-2" type="submit" name="ver" value="ver">
          <i class="bi bi-search me-1"></i> Consultar
        </button>
        <a class="btn btn-primary" href="<?= base_url('checador'); ?>">
          <i class="bi bi-arrow-left-circle me-1"></i> Regresar
        </a>
      </div>
    </form>
  </div>

  <div class="card-footer text-muted text-end small">
    Actualizado el <?= date('d/m/Y H:i'); ?>
  </div>
</div>

<?php if (!empty($entradas_salidas)): ?>
  <div class="my-4 card shadow-sm border-0">
    <div class="card-header text-white" style="background-color: #1e3a5f;">
      <strong>Entradas y salidas</strong>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Fecha</th>
            <th>Hora Entrada</th>
            <th>Hora Salida</th>
            <th>Total de horas</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($entradas_salidas as $registro): ?>
            <tr>
              <td><?= $registro['fecha']; ?></td>
              <td><?= $registro['hora_entrada']; ?></td>
              <td><?= $registro['hora_salida']; ?></td>
              <td><?= $registro['total_horas']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="card-footer text-muted text-end small">
      Resultados generados: <?= count($entradas_salidas); ?>
    </div>
  </div>
<?php endif; ?>

<?= $this->endSection('contenido'); ?>
