<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Food Delivery | <?= $this->renderSection('titulos') ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= site_url('admin/') ?>vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= site_url('admin/') ?>vendors/base/vendor.bundle.base.css">
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= site_url('admin/') ?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= site_url('admin/') ?>images/favicon.png" />

  <!-- Essa Section Renderizará os estilos espessíficos da View que estender esse layout -->
  <?= $this->renderSection('estilos') ?>
</head>

<body>
  <div class="container-scroller">

  
  <!-- Essa Section Renderizará os conteúdos espessíficos da View que estender esse layout -->
  <?= $this->renderSection('conteudo') ?>

    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= site_url('admin/') ?>vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= site_url('admin/') ?>js/off-canvas.js"></script>
  <script src="<?= site_url('admin/') ?>hoverable-collapse.js"></script>
  <script src="<?= site_url('admin/') ?>js/template.js"></script>
  <!-- endinject -->
</body>

</html>