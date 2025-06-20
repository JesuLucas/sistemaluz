<?php echo $this->extend("template/layout_check"); ?>
<?php echo $this->section('contenido'); ?>

<div class="card shadow-sm border-0">
  <div class="card-header text-white text-center" style="background-color: #1e3a5f;">
    <h2 class="mb-0">Registro de Asistencia de Empleado</h2>
  </div>

  <div class="card-body">
    <?php if (isset($mensaje)) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <i class="bi bi-info-circle-fill me-2"></i>
      <strong>Mensaje:</strong> <?= $mensaje; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
    <script>
      var alertList = document.querySelectorAll(".alert");
      alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
      });
    </script>
    <?php } ?>

    <form action="" method="post">
      <h5 class="mb-3">Escriba su clave de empleado:</h5>
      <input class="form-control mb-4" type="text" name="clave" id="clave" required />

      <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4">
        <button class="btn btn-success me-2" type="submit" value="entrada" name="entrada">
          <i class="bi bi-person-check-fill me-1"></i> Checar entrada
        </button>
        <button class="btn btn-warning text-dark me-2" type="submit" value="salida" name="salida">
          <i class="bi bi-person-x-fill me-1"></i> Checar salida
        </button>
        <a class="btn btn-primary" href="<?= base_url('revisar'); ?>">
          <i class="bi bi-eye-fill me-1"></i> Revisar entradas y salidas
        </a>
      </div>
    </form>
  </div>

  <div class="card-footer text-muted text-end small">
    Última actualización: <?= date('d/m/Y H:i'); ?>
  </div>
</div>

<?php echo $this->endSection('contenido'); ?>
