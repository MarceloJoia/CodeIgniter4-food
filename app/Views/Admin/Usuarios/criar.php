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
            <!-- Header -->
            <div class="card-header bg-primary pb-0 pt-4">
                <!-- esc() escapa o que está vindo do banco de dados -->
                <h4 class="card-title text-white"><?= esc($titulo); ?></h4>
            </div>


            <!-- Body -->
            <div class="card-body">

                <!--Erros de validação do formulário que foi detectado pelo Model - Flash data message -->
                <?php if (session()->has('errors_model')) : ?>
                    <ul>
                        <?php foreach (session('errors_model') as $error) : ?>
                            <li class="text-danger"><?= $error; ?></li>
                        <?php endforeach ?>
                    </ul>
                <?php endif; ?>


                <?php echo form_open("admin/usuarios/cadastrar"); ?>
                <?= $this->include('Admin/Usuarios/form'); ?>

                <a href="<?= site_url("admin/usuarios"); ?>" class="btn btn-success btn-sm mr-3 mdi mdi-reply">
                    Voltar
                </a>
                <?php echo form_close(); ?>
                

            </div>

            <!-- Suporte -->
            <div class="card-footer bg-light">
                <?= $this->include("Admin/Util/suporte"); ?>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>


<!-- scripts -->
<?= $this->section('scripts') ?>

<script src="<?= site_url('Admin/vendors/mask/app.js') ?>"></script>
<script src="<?= site_url('Admin/vendors/mask/jquery.mask.min.js') ?>"></script>

<?= $this->endSection() ?>