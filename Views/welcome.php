<?= $this->extend('template/layout'); ?>
<?= $this->section('contenido'); ?>

<!-- Asegúrate de tener Font Awesome incluido en tu layout principal -->
<!-- Ejemplo en tu <head>: 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
-->

<section class="bg-light rounded-3 p-5 mb-4">
  <div class="container-fluid py-5 text-center">

    <!-- Ícono representativo de Transportes Luz -->
    <div class="mb-4">
      <i class="fas fa-bus fa-4x text-primary"></i>
    </div>

    <h1 class="display-5 fw-bold">Bienvenid@</h1>
    <p class="fs-4 col-md-8 mx-auto">
      Al sistema de control de asistencias.
    </p>

    <a href="<?= base_url('empleados'); ?>" class="btn btn-primary btn-lg mt-3">
      Empezar
    </a>
    
  </div>
</section>

<?= $this->endSection(); ?>
