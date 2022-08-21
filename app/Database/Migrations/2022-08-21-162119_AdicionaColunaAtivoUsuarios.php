<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdicionaColunaAtivoUsuarios extends Migration
{
    public function up()
    {
        $field = [
            'ativo' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => false,
            ],
        ];
        // Essa intrução diz, Crie o campo para mim na tabela
        $this->forge->addColumn('usuarios', $field);
    }

    public function down()
    {
        $this->forge->dropColumn('usuarios', 'ativo');
    }
}
