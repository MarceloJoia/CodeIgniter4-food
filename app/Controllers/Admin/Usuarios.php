<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Usuario;
use App\Models\UsuarioModel;
use CodeIgniter\Config\Services;

class Usuarios extends BaseController
{

    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function index() {

        $usuario = service('autenticacao');


        $data = [
            'titulo' => 'Listando os usuários',
            'usuarios' => $this->usuarioModel->withDeleted(true)->paginate(10),
            'pager' => $this->usuarioModel->pager,
        ];
        //session()->set('sucesso', 'Olá Marcelo que bom ter você conosco!');
        //session()->remove('sucesso');

        return view('Admin/Usuarios/index', $data);
    }

    public function procurar()
    {
        if (!$this->request->isAJAX()) {
            exit('Página não encontrada.');
        }

        $usuarios = $this->usuarioModel->procurar($this->request->getGet('term'));

        $retorno = [];
        foreach ($usuarios as $usuario) {
            $data['id'] = $usuario->id;
            $data['value'] = $usuario->name;

            $retorno = $data;
        }

        return $this->response->setJSON($retorno);
    }

    public function criar()
    {
        $usuario = new Usuario();
        //dd($usuario);
        $data = [
            'titulo' => "Criar novo usuário",
            'usuario' => $usuario,
        ];

        return view('Admin/usuarios/criar', $data);
    }

    public function cadastrar()
    {
        if ($this->request->getMethod() === 'post') {

            $usuario = new Usuario($this->request->getPost());
            //dd($usuario);

            if ($this->usuarioModel->protect(false)->save($usuario)) {
                return redirect()->to(site_url("admin/usuarios/show/" . $this->usuarioModel->getInsertID()))
                                 ->with('sucesso', "Usuário <u>$usuario->name</u>, cadastrado com sucesso.");
            } else {
                return redirect()->back()->with('errors_model', $this->usuarioModel->errors())
                    ->with('atencao', 'Por favor, verifique os erros a baixo!')
                    ->withInput();
            }
        } else {
            /* Não é um post */
            //return redirect()->back()->with('info', 'Por favor envie um Post!');
            return redirect()->back();
        }
    }


    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function show($id = null)
    {
        $usuario = $this->buscaUsuarioOu404($id);

        $data = [
            'titulo' => "Detalhando o usuário $usuario->name",
            'usuario' => $usuario, //chave
        ];

        return view('Admin/usuarios/show', $data);
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function editar($id = null)
    {
        $usuario = $this->buscaUsuarioOu404($id);
        //dd($usuario);

        if($usuario->deletado_em != null) {
            return redirect()->back()->with('info', "O usuário <b>$usuario->name</b> está desativado, não é possível editar!");
        }

        $data = [
            'titulo' => "Editando o usuário $usuario->name",
            'usuario' => $usuario, //chave
        ];
        //dd($usuario);

        return view('Admin/usuarios/editar', $data);
    }

    /**
     * Undocumented function
     *
     * @param integer|null $id
     * @return void
     */
    public function atualizar(int $id = null)
    {

        if ($this->request->getMethod() === 'post') {

            $usuario = $this->buscaUsuarioOu404($id);

            if($usuario->deletado_em != null) {
                return redirect()->back()->with('info', "O usuário <b>$usuario->name</b> está desativado!");
            }

            $post = $this->request->getPost();

            if (empty($post['password'])) {
                $this->usuarioModel->dasabilitaValidacaoSenha();
                unset($post['password']);
                unset($post['password_confirmatio']);
            }

            // Prepara os dados para enviar para o Banco
            $usuario->fill($post);

            //Verifica se houve mudanças no conteudo a ser feito Update
            if (!$usuario->hasChanged()) {
                return redirect()->back()->with('info', "Não houve auteração no usuário $usuario->name!");
            }

            if ($this->usuarioModel->protect(false)->save($usuario)) {
                return redirect()->to(site_url("admin/usuarios/show/$usuario->id"))
                    ->with('sucesso', "Usuário <u>$usuario->name</u>, atualizado com sucesso.");
            } else {
                return redirect()->back()->with('errors_model', $this->usuarioModel->errors())
                    ->with('atencao', 'Por favor, verifique os erros a baixo!')
                    ->withInput();
            }
        } else {
            /* Não é um post */
            //return redirect()->back()->with('info', 'Por favor envie um Post!');
            return redirect()->back();
        }
    }

    /** Deletando usuários
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id = null)
    {
        $usuario = $this->buscaUsuarioOu404($id);

        if($usuario->deletado_em != null) {
            return redirect()->back()->with('info', "O usuário <b>$usuario->name</b> já escontra-se excluido!");
        }

        // Não permiter a exclusão do Admin
        if ($usuario->is_admin) {
            return redirect()->back()->with('info', 'Não é possível excluir um usuário <b>Administrador</b>!');
        }

        if ($this->request->getMethod() === 'post') {

            $this->usuarioModel->delete($id);

            return redirect()->to(site_url('admin/usuarios'))
                ->with('sucesso', "$usuario->name, excluido com sucesso!");
        }

        $data = [
            'titulo' => "Deletar o usuário $usuario->name",
            'usuario' => $usuario,
        ];

        return view('Admin/usuarios/delete', $data);
    }



    public function desfazerExclusao($id = null) {
        
        $usuario = $this->buscaUsuarioOu404($id);
        if($usuario->deletado_em == null) {
            return redirect()->back()->with('info', 'Esse usuário está ativo!');
        }
        if($this->usuarioModel->ativarUsuario($id)) {
            return redirect()->back()->with('sucesso', "Restauração do usuário bem sucedida!");
        }
        else {
            return redirect()
                ->back()->with('errors_model', $this->usuarioModel->errors())
                ->with('atencao', 'Por favor, verifique os erros a baixo!')
                ->withInput();
        }
    }

    public function verificaPassword(string $password) {
        return password_verify($password, $this->password_hash);
    }

    /**
     * @param int $id
     * @return objeto usuario
     */
    private function buscaUsuarioOu404(int $id = null)
    {
        if (!$id || !$usuario = $this->usuarioModel->withDeleted(true)->where('id', $id)->first()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos o usuário $id");
        }
        return $usuario;
    }
}
