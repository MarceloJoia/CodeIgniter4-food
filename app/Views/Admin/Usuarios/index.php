<?= $this->extend('Admin/layout/principal') ?>

<!-- Title -->
<?= $this->section('titulos') ?> <?php echo $titulo ?> <?= $this->endSection() ?>

<!-- styles -->
<?= $this->section('estilos') ?>

<link rel="stylesheet" href="<?= site_url('Admin/vendors/auto-complete/jquery-ui.css'); ?>" />

<?= $this->endSection() ?>

<!-- contents -->
<?= $this->section('conteudo') ?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title"><?= $titulo; ?></h4>

                <!-- Search -->
                <div class="ui-widget">
                    <input id="query" name="query" placeholder="Pesquisar por usuário" class="form-control bg-light mb-5">
                </div>

                <!-- Navegação -->
                <a href="<?= site_url("admin/usuarios/criar"); ?>" class="btn btn-success mr-3 mdi mdi-account-plus float-right mb-5">
                    Cadastrar
                </a>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>

                            <tr>
                                <th>NOME</th>
                                <th>E-MAIL</th>
                                <th>CPF</th>
                                <th>ESTATUS</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php foreach ($usuarios as $usuario) : ?>
                                <tr>
                                    <td>
                                        <a href="<?= site_url("admin/usuarios/show/$usuario->id"); ?>">
                                            <?= $usuario->name; ?></a>
                                    </td>
                                    <td><?= $usuario->email; ?></td>
                                    <td><?= $usuario->cpf; ?></td>

                                    <?php if ($usuario->ativo && $usuario->deletado_em == null) : ?>
                                        <td>
                                            <label class="btn btn-sm badge btn-success  mdi mdi-account-plus"> Ativo</label>
                                        </td>
                                    <?php else : ?>
                                        <td>
                                            <a href="<?php echo site_url("admin/usuarios/desfazerexclusao/" . $usuario->id); ?>" class="btn btn-sm btn-danger mdi mdi-account-plus"> Ativar
                                            </a>
                                        </td>
                                    <?php endif; ?>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer text-muted">
                <?= $pager->links() ?>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>

<!-- scripts -->
<?= $this->section('scripts') ?>

<script src="<?= site_url('Admin/vendors/auto-complete/jquery-ui.js') ?>"></script>

<script>
    $(function() {
        $("#query").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?= site_url('admin/usuarios/procurar'); ?>",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        if (data.length < 1) {
                            var data = [{
                                label: 'Usuário não encontrado',
                                value: -1,
                            }];
                        }
                        response(data);
                    },
                }); // Fim Ajax
            },

            //select
            minLenght: 1,
            select: function(event, ui) {
                if (ui.item.value == -1) {
                    $(this).val("");
                    return false;
                } else {
                    window.location.href = '<?= site_url('admin/usuarios/show'); ?>' + ui.item.id;
                }
            },

        }); //Fim autocomplete
    });
</script>

<?= $this->endSection() ?>