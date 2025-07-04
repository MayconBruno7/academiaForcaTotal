<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Session;

class Usuario extends ControllerMain
{
    /**
     * construct
     */
    public function __construct()
    {
        $this->auxiliarConstruct();
        $this->loadHelper(['formHelper', 'tabela']);
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {

        if (!verificaSeUsuarioEstaLogado()) {
            return Redirect::page('login');
        }

        return $this->loadView("sistema/listaUsuario", $this->model->lista("nome"));
    }

    /**
     * form
     *
     * @param string $action 
     * @param integeger $id 
     * @return void
     */
    public function form($action = null, $id = null)
    {

        if (!verificaSeUsuarioEstaLogado()) {
            return Redirect::page('login');
        }

        if ($this->action == "insert") {
            $dados = [
                "nivel" => 21,
                "trocarSenha" => "S",
                "statusRegistro" => 1
            ];
        } else {
            $dados = $this->model->getById($id);
        }


        return $this->loadView(
            "sistema/formUsuario",
            $dados
        );
    }

    /**
     * save
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();
        $lError = false;

        if (empty($post['senha'])) {
            $lError = true;
            $errors['senha'] = "O campo <b>Senha</b> deve ser preenchido.";
            Session::set('errors', $errors);
        } else {
            unset($post['confSenha']);
        }

        if (!$lError) {

            $dados = [
                "nivel"             => $post['nivel'],
                "nome"              => $post['nome'],
                "email"             => $post['email'],
                "senha"             => password_hash($post['senha'], PASSWORD_DEFAULT),
                "statusRegistro"    => $post['statusRegistro']
            ];

            if ($this->model->insert($dados)) {
                return Redirect::page($this->controller, ["msgSucesso" => "Registro atualizado com sucesso."]);
            } else {
                $lError = true;
                return Redirect::page($this->controller, ["msgError" => "Erro ao inserir registro."]);
            }
        } else {
            Session::set("inputs", $post);
            return Redirect::page($this->controller . '/form/' . $post['action'] . '/' . $post['id']);
        }
    }

    /**
     * save
     *
     * @return void
     */
    public function update()
    {
        $post = $this->request->getPost();
        $lError = false;

        unset($post['confSenha']);

        // Prepara o array de dados para update
        $dados = [
            'id'                 => $post['id'],
            'nivel'              => $post['nivel'],
            'nome'               => $post['nome'],
            'email'              => $post['email'],
            'statusRegistro'     => $post['statusRegistro'],
        ];

        if (empty($post['senha'])) {
            unset($post['senha']);
        } else {
            $post['senha'] = password_hash($post['senha'], PASSWORD_DEFAULT);
            $dados['senha'] = $post['senha'];
        }

        // var_dump($dados);
        // exit;
        if (!$lError) {
            if ($this->model->update($dados)) {
                return Redirect::page($this->controller, ["msgSucesso" => "Registro atualizado com sucesso."]);
            } else {
                $lError = true;
            }
        } else {
            Session::set("inputs", $post);
            return Redirect::page($this->controller . '/form/' . $post['action'] . '/' . $post['id']);
        }
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        $post = $this->request->getPost();

        if ($this->model->delete(["id" => $post['id']])) {
            return Redirect::page($this->controller, ['msgSucesso' => "Registro excluído com sucesso."]);
        } else {
            return Redirect::page($this->controller . "/form/new/0", ["msgError" => "Falha ao excluir os dados na base de dados."]);
        }
    }

    /**
     * formTrocarSenha
     *
     * @return void
     */
    public function formTrocarSenha()
    {
        return $this->loadView("sistema/formTrocaSenha");
    }

    /**
     * updateNovaSenha
     *
     * @return void
     */
    public function updateNovaSenha()
    {
        $post       = $this->request->getPost();
        $userAtual  = $this->model->getById($post["id"]);

        if ($userAtual) {

            if (password_verify(trim($post["senhaAtual"]), $userAtual['senha'])) {

                if (trim($post["novaSenha"]) == trim($post["novaSenha2"])) {

                    $novaSenhaCripyt = password_hash(trim($post["novaSenha"]), PASSWORD_DEFAULT);

                    $lUpdate = $this->model->db->where(['id' => $post['id']])->update([
                        'senha' => $novaSenhaCripyt
                    ]);

                    if ($lUpdate) {
                        // Atualiza sessão de senhas
                        Session::set("userSenha", $novaSenhaCripyt);

                        return Redirect::page("Usuario/formTrocarSenha", [
                            "msgSucesso"    => "Senha alterada com sucesso !"
                        ]);
                    } else {
                        return Redirect::page("Usuario/formTrocarSenha");
                    }
                } else {
                    return Redirect::page("Usuario/formTrocarSenha", [
                        "msgError"    => "Nova senha e conferência da senha estão divergentes !"
                    ]);
                }
            } else {
                return Redirect::page("Usuario/formTrocarSenha", [
                    "msgError"    => "Senha atual informada não confere!"
                ]);
            }
        } else {
            return Redirect::page("Usuario/formTrocarSenha", [
                "msgError"    => "Usuário inválido !"
            ]);
        }
    }
}
