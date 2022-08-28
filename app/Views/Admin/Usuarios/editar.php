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

                <form class="forms-sample">

                    <?=$this->include('Admin/Usuarios/form');?>
                   
                </form>

            </div>

            <!-- Footer -->
            <div class="card-footer bg-light">

                <a href="<?= site_url("admin/usuarios/editar/$usuario->id"); ?>" class="btn btn-success btn-sm mr-3 mdi mdi-reply">
                    Voltar
                </a>

                <a href="<?= site_url("admin/usuarios/editar/$usuario->id"); ?>" class="btn btn-primary btn-sm mr-3 mdi mdi-pencil">
                    Editar
                </a>

                <a href="<?= site_url("admin/usuarios/editar/$usuario->id"); ?>" class="btn btn-danger btn-sm mr-3 mdi mdi-delete-forever">
                    Excluir
                </a>

                <hr>

                <a href="https://api.whatsapp.com/send?phone=5516991502332&text=Estou%20precisando%20de%20ajuda,%20com%20o%20LetsFood!" target="_blank" alt="Joia Marketing" title="Joia Marketing" class="btn btn-link btn-sm mdi mdi-bullhorn">
                    Precisa de ajuda? Fale com a gente!
                </a>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- scripts -->
<?= $this->section('scripts') ?>

<?= $this->endSection() ?>