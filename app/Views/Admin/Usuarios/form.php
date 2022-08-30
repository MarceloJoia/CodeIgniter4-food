<div class="form-row">

    <div class="form-group col-md-3">
        <label for="name">Nome: </label>
        <input type="text" class="form-control" name="name" id="name" value="<?= old('name', esc($usuario->name)); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="cpf">CPF: </label>
        <input type="text" class="form-control cpf" name="cpf" id="cpf" value="<?= old('cpf', esc($usuario->cpf)); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="telefone">Celular: </label>
        <input type="text" class="form-control phone_with_ddd" name="telefone" id="telefone" value="<?= old('telefone', esc($usuario->telefone)); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="email">E-mail: </label>
        <input type="text" class="form-control" name="email" id="email" value="<?= old('email', esc($usuario->email)); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="ativo">Ativo: </label>
        <select name="ativo" class="form-control ">
            <?php if ($usuario->id) : ?>
                <option value="1" <?= set_select('ativo', '1'); ?><?= $usuario->ativo ? 'selected' : ''; ?>>Sim</option>
                <option value="0" <?= set_select('ativo', '0'); ?><?= !$usuario->ativo ? 'selected' : ''; ?>>Não</option>
            <?php else : ?>
                <option value="1" <?= set_select('ativo', '1'); ?>>Sim</option>
                <option value="0" <?= set_select('ativo', '0'); ?> selected="">Não</option>
            <?php endif; ?>
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="ativo">Perfil de usuário: </label>
        <select name="is_admin" class="form-control ">
            <?php if ($usuario->id) : ?>
                <option value="1" <?= set_select('is_admin', '1'); ?> <?= $usuario->is_admin ? 'selected' : ''; ?>>Administrador</option>
                <option value="0" <?= set_select('is_admin', '0'); ?> <?= !$usuario->is_admin ? 'selected' : ''; ?>>Cliente</option>
            <?php else : ?>
                <option value="1" <?= set_select('is_admin', '1'); ?>>Administrador</option>
                <option value="0" <?= set_select('is_admin', '0'); ?> selected="">Cliente</option>
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


<button type="submit" class="btn btn-primary btn-sm mr-3 mdi mdi-content-save">
    Salvar
</button>