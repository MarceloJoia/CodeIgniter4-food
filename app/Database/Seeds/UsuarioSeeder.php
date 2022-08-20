<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Config\App;

class UsuarioSeeder extends Seeder
{
    public function run() {

        // Recuperar uma intância do usuário
        $usuarioModel = new \App\Models\UsuarioModel;
        
        $usuario = [
            'name' => 'Marcelo Joia',
            'email' => 'marcelo@marcelo.com',
            'telefone' => '(16) 9.9964-9067',
        ];
        //Inserir na Tabela
        // protect(false) dasabilita a proteção da tabela
        $usuarioModel->protect(false)->insert($usuario);

        $usuario = [
            'name' => 'Telma Braga',
            'email' => 'telma@telma.com',
            'telefone' => '(16) 9.9988-9847',
        ];
        $usuarioModel->protect(false)->insert($usuario);

        // Debug na variável
        dd($usuarioModel->errors());
    }
}
