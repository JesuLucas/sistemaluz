<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sistema</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/lumen/bootstrap.min.css" rel="stylesheet"/>

  <!-- DataTables -->
  <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
  <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css" rel="stylesheet"/>

  <!-- Estilos personalizados -->
  <style>
    :root {
      --primary-color: #1e3a5f;
      --primary-hover: #162b45;
    }

    .navbar-brand {
      font-weight: bold;
      color: var(--primary-color) !important;
    }

    .nav-link {
      transition: all 0.3s ease-in-out;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .nav-link:hover {
      background-color: #f0f4f9;
      border-radius: 0.375rem;
      color: var(--primary-hover) !important;
    }

    .nav-link i {
      font-size: 1.1rem;
      color: var(--primary-color);
    }

    .nav-link.active {
      font-weight: 600;
      color: var(--primary-color) !important;
    }

    .card-footer {
      background-color: #f8f9fa;
      color: #6c757d;
      font-size: 0.9rem;
    }

    .btn-success {
      background-color: var(--primary-color) !important;
      border-color: var(--primary-color) !important;
    }

    .btn-success:hover {
      background-color: var(--primary-hover) !important;
      border-color: var(--primary-hover) !important;
    }

    .card-header {
      background-color: var(--primary-color) !important;
      color: #fff;
      text-align: center;
      font-weight: bold;
    }

    footer {
      background-color: #f3f6f9;
      font-size: 0.95rem;
    }

    footer a:hover {
      color: var(--primary-color) !important;
    }

    /* Cambios de colores para botones naranja, rojo y azul cielo */
    .btn-warning,
    .btn-danger,
    .btn-info {
      background-color:rgb(24, 4, 174) !important;
      border-color: #4894c7 !important;
      color: #ffffff !important;
    }

    .btn-warning:hover,
    .btn-danger:hover,
    .btn-info:hover {
      background-color: #498ec2 !important;
      border-color:rgb(24, 4, 174) !important;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="bi bi-truck-front-fill me-1"></i>Transportes Luz</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>"><i class="bi bi-stars"></i>Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('empleados'); ?>"><i class="bi bi-person-heart"></i>Empleados</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('puestos'); ?>"><i class="bi bi-award-fill"></i>Puestos</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('entradas_salidas'); ?>"><i class="bi bi-arrow-repeat"></i>Entradas y salidas</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('reportes'); ?>"><i class="bi bi-graph-up-arrow"></i>Reportes</a></li>
          <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url('checador'); ?>"><i class="bi bi-person-lines-fill"></i>Checador</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('cerrarsesion'); ?>"><i class="bi bi-door-closed-fill"></i>Cerrar sesión</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container my-4">
    <div class="card shadow-sm">
      <div class="card-header">Panel Principal</div>
      <div class="card-body">
        <?= $this->renderSection('contenido'); ?>
      </div>
      <div class="card-footer text-end">Transportes Luz © <?= date('Y') ?></div>
    </div>
  </main>

  <footer class="bg-light text-center text-lg-start mt-5 border-top shadow-sm">
    <div class="container p-3">
      <div class="row">
        <div class="col-md-6 text-start">
          <span class="text-muted">Transportes Luz &copy; <?= date('Y') ?> — Todos los derechos reservados</span>
        </div>
        <div class="col-md-6 text-end">
          <a href="https://www.instagram.com/transportesluz/" target="_blank" class="text-decoration-none me-3 text-dark">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="https://www.facebook.com/transportesluzm/" target="_blank" class="text-decoration-none me-3 text-dark">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="mailto:coordsistemastluz@gmail.com" class="text-decoration-none text-dark">
            <i class="bi bi-envelope-fill"></i> coordsistemastluz@gmail.com
          </a>
        </div>
      </div>
    </div>
  </footer>

  <!-- JS Libraries -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

  <!-- Inicialización DataTables -->
  <script>
    $(document).ready(function() {
      $('table').DataTable({
        pageLength: 5,
        lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]],
        language: {
          url: "https://cdn.datatables.net/plug-ins/2.1.8/i18n/es-MX.json"
        },
        dom: 'Bfrtip',
        buttons: [{
          extend: 'excelHtml5',
          title: 'Exportación_Datos',
          text: '<i class="bi bi-file-earmark-excel-fill"></i> Exportar a Excel',
          className: 'btn btn-success'
        }]
      });
    });
  </script>
</body>
</html>
