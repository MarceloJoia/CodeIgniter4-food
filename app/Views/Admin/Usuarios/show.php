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
                <p class="card-text">
                    <span class="font-weight-bold">Nome: </span>
                    <?= esc($usuario->name); ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Email: </span>
                    <?= esc($usuario->email); ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Ativo: </span>
                    <?= $usuario->ativo ? 'Sim' : 'Não'; ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Perfil: </span>
                    <?= $usuario->is_admin ? 'Administrador' : 'Cliente'; ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Criado: </span>
                    <?= $usuario->criado_em->humanize(); ?>
                </p>


                <?php if ($usuario->deletado_em == null) : ?>
                    <p class="card-text">
                        <span class="font-weight-bold">Atualizado: </span>
                        <?= $usuario->atualizado_em->humanize(); ?>
                    </p>
                <?php else : ?>
                    <p class="card-text">
                        <span class="font-weight-bold text-danger">Desativado: </span>
                        <?= $usuario->deletado_em->humanize(); ?>
                    </p>
                <?php endif; ?>


            </div>

            <!-- Footer -->
            <div class="card-footer bg-light">
                <a href="<?= site_url("admin/usuarios"); ?>" class="btn btn-success btn-sm mr-3 mdi mdi-reply">
                    Voltar
                </a>

                <?php if ($usuario->deletado_em == null) : ?>
                    <a href="<?= site_url("admin/usuarios/editar/$usuario->id"); ?>" class="btn btn-primary btn-sm mr-3 mdi mdi-pencil">
                        Editar
                    </a>

                    <a href="<?= site_url("admin/usuarios/delete/$usuario->id"); ?>" class="btn btn-danger btn-sm mr-3 mdi mdi-delete-forever">
                        Excluir
                    </a>
                <?php else : ?>
                    <a data-toggle="tooltip" data-placement="top" title="Ativar o Usuário!" href="<?php echo site_url("admin/usuarios/desfazerexclusao/" . $usuario->id); ?>" class="btn btn-sm btn-danger mdi mdi-account-plus"> Ativar
                    </a>
                <?php endif; ?>

                <hr>

                <!-- Suporte -->
                <?= $this->include("Admin/Util/suporte"); ?>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- scripts -->
<?= $this->section('scripts') ?>

<?= $this->endSection() ?>