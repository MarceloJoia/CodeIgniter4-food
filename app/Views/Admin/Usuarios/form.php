<div class="form-row">

    <div class="form-group col-md-6">
        <label for="name">Nome: </label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $usuario->name; ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="cpf">CPF: </label>
        <input type="text" class="form-control" name="cpf" id="cpf" value="<?= $usuario->cpf; ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="telefone">Telefone: </label>
        <input type="text" class="form-control" name="telefone" id="telefone" value="<?= $usuario->telefone; ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="email">E-mail: </label>
        <input type="text" class="form-control" name="email" id="email" value="<?= $usuario->email; ?>">
    </div>


</div>


<div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
<div class="form-group">
    <label for="exampleInputConfirmPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
</div>
<div class="form-check form-check-flat form-check-primary">
    <label class="form-check-label">
        <input type="checkbox" class="form-check-input">
        Remember me
    </label>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>
<button class="btn btn-light">Cancel</button>