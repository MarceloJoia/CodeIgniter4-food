<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['name', 'email', 'cpf', 'telefone'];
    protected $useTimestamps    = true;
    protected $createdField     = 'criado_em';
    protected $updatedField     = 'atualizado_em';
    protected $deletedField     = 'deletado_em';

    /**
     * @uso controller usuários no método procurar com o autocomplete
     * @param string $term
     * @return array usuários
     */
    public function procurar($term)
    {
        if ($term === null) {
            return [];
        }
        
        return $this->select('id, name')
            ->like('name', $term)
            ->get()
            ->getResult();
    }
}
