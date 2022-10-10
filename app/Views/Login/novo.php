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
      <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
          <div class="brand-logo">
            <img src="<?= site_url('admin/');?>images/logo.svg" alt="logo">
          </div>
          <h4>Bem vindo a FoodDelivery</h4>
          <h6 class="font-weight-light">Faça login para continuar.</h6>
          <form class="pt-3">
            <div class="form-group">
              <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Nome de Usuário">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Senha">
            </div>
            <div class="mt-3">
              <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
              <div class="form-check">
                <label class="form-check-label text-muted">
                  <input type="checkbox" class="form-check-input">
                  Keep me signed in
                </label>
              </div>
              <a href="#" class="auth-link text-black">Forgot password?</a>
            </div>
            <div class="mb-2">
              <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                <i class="mdi mdi-facebook mr-2"></i>Connect using facebook
              </button>
            </div>
            <div class="text-center mt-4 font-weight-light">
              Don't have an account? <a href="register.html" class="text-primary">Create</a>
            </div>
          </form>
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