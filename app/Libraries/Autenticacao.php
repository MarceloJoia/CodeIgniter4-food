<?php

namespace App\Libraries;

use \App\Models\UsuarioModel;

class Autenticacao {

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

    public function logout() {
        session()->destroy();
    }

    public function pegaUsuarioLogado () {
        
        if($this->usuario === null) {
            $this->usuario = $this->pegaUsuarioDaSessao();
        }

        return $this->usuario;
    }

    /**
     * @descrição: O método só permite ficar logado na aplicação aquele que ainda existe na base e que esteja ativo.
     *             Do contrário, será feito o logout do mesmo, caso uma mudançã na sua conta durante a sessão.
     * 
     * @user: No filtro loginFiter
     * @return true se o metodo pegaUsuarioLogado() no for null. Ou seja, se o usuario estiver logado. 
     */
    public function estaLogado () {
        // Enquanto null, não está logado
        return $this->pegaUsuarioLogado() !== null;
    }


    private function pegaUsuarioDaSessao () {

        if(! session()->has('usuario_id')) {
            return null;
        }

        // Instanciamos o model usuário
        $usuarioModel = new UsuarioModel();

        // Recupera o usuário de acordo com a chave da sessão
        $usuario = $usuarioModel->find(session()->get('usuario_id'));

        // Só retorna o objeto usuário se o mesmo for encontrado e estiver ativo
        if($usuario && $usuario->ativo) {
            return $usuario;
        }
    }

    private function logaUsuario(object $usuario) {
        $session = session();
        $session->regenerate();
        $session->set('usuario_id', $usuario->id);
    }
}