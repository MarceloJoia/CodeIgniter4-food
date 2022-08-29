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
        //session()->set('sucesso', 'Olá Marcelo que bom ter você conosco!');
        //session()->remove('sucesso');

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

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function editar($id = null) {
        $usuario = $this->buscaUsuarioOu404($id);
        //dd($usuario);

        $data = [
            'titulo' => "Editando o usuário $usuario->name",
            'usuario' => $usuario,//chave
        ];

        return view('Admin/usuarios/editar', $data);
    }


    public function atualizar(int $id = null) {

        if($this->request->getMethod() === 'post') {
            $usuario = $this->buscaUsuarioOu404($id);
            $post = $this->request->getPost();
            //dd($post);

            // Prepara os dados para enviar para o Banco
            $usuario->fill($post);
            dd($usuario);

        } 
        else {
            /* Não é um post */
            //return redirect()->back()->with('info', 'Por favor envie um Post!');
            return redirect()->back();
        }
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
