<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $returnType       = 'App\Entities\Usuario';
    protected $allowedFields    = ['name', 'email', 'cpf', 'telefone'];
    //Datas
    protected $useTimestamps    = true;
    protected $createdField     = 'criado_em';
    protected $updatedField     = 'atualizado_em';
    protected $dateFormat       = 'datetime'; // Para usar com o $useSoftDeletes
    protected $useSoftDeletes   = true;//Não deleta do DataBase [true]
    protected $deletedField     = 'deletado_em';
    //Validações
    protected $validationRules = [
        'name'     => 'required|min_length[3]|max_length[120]',
        'email'    => 'required|valid_email|is_unique[usuarios.email]',
        'cpf'      => 'required|validaCpf|exact_length[14]|is_unique[usuarios.cpf]',
        'telefone' => 'required|min_length[15]|max_length[16]|is_unique[usuarios.telefone]',
        'password' => 'required|min_length[6]',
        'password_confirmation' => 'required_with[password]|matches[password]',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'O campo Nome é obrigatório',
        ],
        'email' => [
            'required' => 'O campo de e-mail é obrigatório',
            'is_unique' => 'Deslculpe-nos, mas esse e-mail já existe! Tente com um e-mail diferente.',
        ],
        'cpf' => [
            'required' => 'O campo CPF é obrigatório',
            'is_unique' => 'Deslculpe-nos, mas esse CPF já está cadastrada. Tente recuperar a senha!',
        ],
        'telefone' => [
            'required' => 'Precisamos do Celular para avisar que o seu pedido está a caminho ou tirar dúvidas sobre a localização',
            'is_unique' => 'Desculpe-nos, mas esse Celular já está cadastrado.',
        ],
    ];

    /** Eventos CallBack
     * Undocumented variable
     *
     * @var array
     */
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

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

    /**
     * Desabilita a semha para Update se estiver vasia
     */
    public function dasabilitaValidacaoSenha() {
        unset($this->validationRules['password']);
        unset($this->validationRules['password_confirmation']);
    }

    protected function hashPassword(array $data) {
        //Verificar se está vindo o valor que estou esperando do Controler que está instanciando o modelo
        if (isset($data['data']['password'])) {

            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            unset($data['data']['password']);
            unset($data['data']['password_confirmation']);
            //dd($data);

            return $data;
        }
    }

    public function ativarUsuario(int $id) {

        return $this->protect(false)
                    ->where('id', $id)
                    ->set('deletado_em', null)
                    ->update();
    }

}
