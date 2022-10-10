<?= $this->extend('Login/principal_autenticacao') ?>

<!-- Title -->
<?= $this->section('titulos') ?> <?php echo $titulo ?> <?= $this->endSection() ?>

<!-- styles -->
<?= $this->section('conteudo') ?>

<?= $this->endSection() ?>


<!-- contents -->
<?= $this->section('conteudo') ?>


<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
      <div class="col-lg-5 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">


          <!----- Mansagens advertências ----->
          <?=$this->include("Util/avisos");?>
          <!---------------------------------->


          <div class="brand-logo text-center">
            <img src="<?= site_url('admin/');?>images/logo.svg" alt="logo">
          </div>
          <h4 class="text-center mb-3">Olá seja bem vindo(a)</h4>
          <h6 class="font-weight-light text-center mb-5">Faça login para continuar.</h6>
          

          <?=form_open('login/criar');?>
          
            <div class="form-group">
              <input type="email" name="email" id="email" placeholder="E-mail" value="<?=old('email')?>" class="form-control form-control-lg" >
            </div>

            <div class="form-group">
              <input type="password" name="password" id="password" placeholder="Digite sua senha" class="form-control form-control-lg">
            </div>

            <div class="mt-3">
              <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Entrar</button>
            </div>

            <div class="text-center mt-4 font-weight-light">
            Não tem uma conta? <a href="<?=site_url('registrar')?>" class="text-primary">Crie uma conta</a>
            </div>

          <?=form_close();?>

        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>

<?= $this->endSection() ?>


<!-- scripts -->
<?= $this->section('scripts') ?>

<?= $this->endSection() ?>