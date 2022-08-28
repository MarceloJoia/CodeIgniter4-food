<div class="form-row">

    <div class="form-group col-md-6">
        <label for="name">Nome: </label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $usuario->name; ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="cpf">CPF: </label>
        <input type="text" class="form-control cpf" name="cpf" id="cpf" value="<?= $usuario->cpf; ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="celular">Celular: </label>
        <input type="text" class="form-control phone_with_ddd" name="celular" id="celular" value="<?= $usuario->telefone; ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="email">E-mail: </label>
        <input type="text" class="form-control" name="email" id="email" value="<?= $usuario->email; ?>">
    </div>

</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="password">Senha: </label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <div class="form-group col-md-6">
        <label for="confirmatio_password">Confirm Password</label>
        <input type="password" class="form-control" name="confirmatio_password" id="confirmatio_password">
    </div>
</div>
