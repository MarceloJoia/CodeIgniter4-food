<?php if (session()->has('sucesso')) : ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Perfeito!</strong> <?= session('sucesso'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php endif; ?>

<!-- Menságem de Informação -->
<?php if (session()->has('info')) : ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Informação!</strong> <?= session('info'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<!-- Menságem de Atenção -->
<?php if (session()->has('atencao')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Atenção!</strong> <?= session('atencao'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<!-- Captura os erros de CSRF - Ação não permitida -->
<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Erro!</strong> <?= session('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>