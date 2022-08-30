<div class="form-row">

    <div class="form-group col-md-3">
        <label for="name">Nome: </label>
        <input type="text" class="form-control" name="name" id="name" value="<?= esc($usuario->name); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="cpf">CPF: </label>
        <input type="text" class="form-control cpf" name="cpf" id="cpf" value="<?= esc($usuario->cpf); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="telefone">Celular: </label>
        <input type="text" class="form-control phone_with_ddd" name="telefone" id="telefone" value="<?= esc($usuario->telefone); ?>">
    </div>
  
    <div class="form-group col-md-3">
        <label for="email">E-mail: </label>
        <input type="text" class="form-control" name="email" id="email" value="<?= esc($usuario->email); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="ativo">Ativo: </label>
        <select name="ativo" class="form-control ">
            <?php if ($usuario->id) : ?>
                <option value="1" <?= $usuario->ativo ? 'selected' : ''; ?>>Sim</option>
                <option value="0" <?= !$usuario->ativo ? 'selected' : ''; ?>>Não</option>
            <?php else : ?>
                <option value="1">Sim</option>
                <option value="0" selected="">Não</option>
            <?php endif; ?>
        </select>
    </div>

    <div class="form-group col-md-3">
    <label for="ativo">Perfil: </label>
        <select name="is_admin" class="form-control ">
            <?php if ($usuario->id) : ?>
                <option value="1" <?= $usuario->is_admin ? 'selected' : ''; ?>>Administrador</option>
                <option value="0" <?= !$usuario->is_admin ? 'selected' : ''; ?>>Usuário</option>
            <?php else : ?>
                <option value="1">Sim</option>
                <option value="0" selected="">Não</option>
            <?php endif; ?>
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="password">Senha: </label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <div class="form-group col-md-3">
        <label for="password_confirmatio">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmatio" id="password_confirmatio">
    </div>

</div>
