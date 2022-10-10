<?php

use App\Models\UsuarioModel;
use App\Controllers\Admin\Usuarios;

class Autentication {

    private $usuario;
    
    /**
     * Undocumented function
     *
     * @param string $email
     * @param string $password
     * @return boolean
     */
    public function login (string $email, string $password) {
        $usuarioModel = new UsuarioModel();

        $usuario = $usuarioModel->buscaUsuarioPorEmail($email);

        // Retorna usuário por e-mail
        if($usuario === null) {
            return false;
        }

        // Se a senha não coincider com o Hash retorna false
        if(! $usuario->verificaPassword($password)) {
            return false;
        }

        // Permitir o login de usuários ativos
        if(! $usuario->ativo) {
            return false;
        }

        // Usuário aprovado para golar
        $this->logaUsuario($usuario);

        return true;
    }

    private function logaUsuario(object $usuario) {
        $session = session();
        $session->regenerate();
        $session->set('usuario_id', $usuario->id);
    }
}