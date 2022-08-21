<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdicionaColunaCpfUsuarios extends Migration {
    public function up() {
        $fieldS = [
            'cpf' => [
                'type' => 'VARCHAR',
                'constraint'     => 12,
            ],
        ];
        // Essa intrução diz, Crie o campo para mim na tabela
        $this->forge->addColumn('usuarios', $fieldS);
    }

    public function down() {
        $this->forge->dropColumn('usuarios', 'cpf');
    }
}
