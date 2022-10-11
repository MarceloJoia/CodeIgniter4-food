<?php

namespace App\Controllers;

use \App\Controllers\BaseController;
use Autenticacao;

class Login extends BaseController
{
    public function novo() {
        
        $data = [
            'titulo' => 'Realize o Login'
        ];

        return view('Login/novo', $data);
    }

    public function criar() {
        if($this->request->getMethod() === 'post')  {
            //dd($this->request->getPost());
            //Recuperar o formulário
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Instanciar a classe de autenticação
            $autenticacao = service('autenticacao');
            //dd($autenticacao);
            if($autenticacao->login($email, $password)) {
                $usuario = $autenticacao->pegaUsuarioLogado();
                dd($usuario);
            }
            else {
                return redirect()->back()->with('atencao', 'Não encontramos suas credenciais de acesso!');
            }

        }
        else {
            return redirect()->back();
        }
    }
}
