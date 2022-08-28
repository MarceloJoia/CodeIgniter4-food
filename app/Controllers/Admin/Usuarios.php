<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Usuarios extends BaseController
{

    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    public function index() {

        $data = [
            'titulo' => 'Listando os usuários',
            'usuarios' => $this->usuarioModel->findAll(),
        ];
        return view('Admin/Usuarios/index', $data);
    }

    public function procurar () {
        if(!$this->request->isAJAX()){
            exit('Página não encontrada.');
        }

        $usuarios = $this->usuarioModel->procurar($this->request->getGet('term'));

        $retorno = [];
        foreach($usuarios as $usuario){
            $data['id'] = $usuario->id;
            $data['value'] = $usuario->name;

            $retorno = $data;
        }

        return $this->response->setJSON($retorno);
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function show($id = null) {
        $usuario = $this->buscaUsuarioOu404($id);

        //dd($usuario);

        $data = [
            'titulo' => "Detalhando o usuário $usuario->name",
            'usuario' => $usuario,//chave
        ];

        return view('Admin/usuarios/show', $data);
    }

    public function editar($id = null) {
        $usuario = $this->buscaUsuarioOu404($id);
        //dd($usuario);

        $data = [
            'titulo' => "Editando o usuário $usuario->name",
            'usuario' => $usuario,//chave
        ];

        return view('Admin/usuarios/editar', $data);
    }

    /**
     * @param int $id
     * @return objeto usuario
     */
    private function buscaUsuarioOu404 (int $id = null) {
        if(!$id || !$usuario = $this->usuarioModel->where('id', $id)->first()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos o usuário $id");
        }
        return $usuario;
    }
}
