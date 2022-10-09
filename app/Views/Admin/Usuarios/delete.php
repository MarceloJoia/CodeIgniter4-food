<?= $this->extend('Admin/layout/principal') ?>

<!-- Title -->
<?= $this->section('titulos') ?> <?php echo $titulo ?> <?= $this->endSection() ?>

<!-- styles -->
<?= $this->section('estilos') ?>


<?= $this->endSection() ?>

<!-- contents -->
<?= $this->section('conteudo') ?>

<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
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


                <!-- Formulário para deletar usuáios -->
                <?php echo form_open("admin/usuarios/delete/$usuario->id"); ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Atenção!</strong>
                    Você deseja realmente <strong>deletar</strong> o usuário <strong><?= esc($usuario->name); ?></strong>?
                </div>

                <button type="submit" class="btn btn-danger btn-sm mr-3 mdi mdi-delete">
                    Deletar
                </button>

                <a href="<?= site_url("admin/usuarios/show/$usuario->id"); ?>" class="btn btn-success btn-sm mr-3 mdi mdi-reply">
                    Voltar
                </a>
                <?= form_close(); ?>

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