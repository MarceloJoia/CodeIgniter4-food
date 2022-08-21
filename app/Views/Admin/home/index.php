<?= $this->extend('Admin/layout/principal') ?>

<!-- Title -->
<?= $this->section('titulos') ?> <?php echo $titulo ?> <?= $this->endSection() ?>

<!-- styles -->
<?= $this->section('conteudo') ?>

<?= $this->endSection() ?>

<!-- contents -->
<?= $this->section('conteudo') ?>
    <h1><?= $titulo ?></h1>
<?= $this->endSection() ?>

<!-- scripts -->
<?= $this->section('scripts') ?>

<?= $this->endSection() ?>