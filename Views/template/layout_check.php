<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema</title>

  <!-- Tema Bootswatch (Flatly) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/flatly/bootstrap.min.css" rel="stylesheet"/>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

  <!-- Estilo personalizado para unificar el color de botones -->
  <style>
    .btn {
      background-color:rgb(24, 4, 174) !important; /* Cambia este color si deseas */
      border-color: #007bff !important;
      color: white !important;
    }
  </style>

  <!-- jQuery y DataTables -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
</head>
<body>
<br>
<div class="container">
  <?php echo $this->renderSection('contenido'); ?>
</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>

<!-- Script de inicialización de DataTables -->
<script>
  $(document).ready(function(){
    $('table').DataTable({
      "pageLength": 5,
      lengthMenu: [
        [5, 10, 25, 50],
        [5, 10, 25, 50]
      ],
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/2.1.8/i18n/es-MX.json"
      }
    });
  });
</script>
</body>
</html>
