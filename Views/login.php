<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Sistema AE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .bg-custom-primary {
      background-color: #0a4275 !important;
    }
    .btn-custom-dark {
      background-color: #0a4275 !important;
      color:rgb(255, 255, 255);
      border: none;
    }
    .btn-custom-dark:hover {
      background-color:rgb(12, 14, 103);
    }
  </style>
</head>
<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10 col-md-6 col-lg-5">
        
        <?php if (isset($mensaje)) : ?>
          <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Mensaje:</strong> El usuario o la contraseña no existen.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
          </div>
        <?php endif; ?>

        <div class="card shadow rounded border-0 mt-4">
          <div class="card-header bg-custom-primary text-white text-center">
            <h4 class="mb-0">Ingreso al Sistema AE</h4>
          </div>
          <div class="card-body px-4 py-3">
            <form action="<?= base_url('/verificaracceso'); ?>" method="post" autocomplete="off">
              <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-custom-dark">
                  Iniciar sesión
                </button>
              </div>
            </form>
          </div>
          <div class="card-footer text-center small text-muted">
            Transportes Luz © <?= date('Y') ?>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
