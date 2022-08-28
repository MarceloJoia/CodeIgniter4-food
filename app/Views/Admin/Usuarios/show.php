<?= $this->extend('Admin/layout/principal') ?>

<!-- Title -->
<?= $this->section('titulos') ?> <?php echo $titulo ?> <?= $this->endSection() ?>

<!-- styles -->
<?= $this->section('estilos') ?>

<?= $this->endSection() ?>

<!-- contents -->
<?= $this->section('conteudo') ?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-header bg-primary pb-0 pt-4">
                    <h4 class="card-title text-white"><?= esc($titulo); ?></h4>
                </div>

                <p class="card-text pt-3"><?= esc($usuario->name); ?></p>

                <input name="name" value="Alguem" class="bg-success">

            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<!-- scripts -->
<?= $this->section('scripts') ?>

<?= $this->endSection() ?>