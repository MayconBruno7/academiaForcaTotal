<?php

namespace App\Controller;

use App\Model\PlanoModel;
use App\Model\UsuarioModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Validator;

class Aluno extends ControllerMain
{

    protected $planoModel;
    protected $usuarioModel;

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
        $this->planoModel = new PlanoModel();
        $this->usuarioModel = new UsuarioModel();
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

        return $this->loadView("aluno/listaAluno", $this->model->listaAluno());
    }

    public function form($action, $id)
    {

        if (!verificaSeUsuarioEstaLogado()) {
            return Redirect::page('login');
        }

        $dados = [
            'data' => $this->model->getById($id),
            'aPlano' => $this->planoModel->listaPlano(),               // Busca Aluno       
            'aUsuario' => $this->usuarioModel->listaUsuarioAluno(),
        ];

        return $this->loadView("aluno/formAluno", $dados);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();

        if (Validator::make($post, $this->model->validationRules)) {
            return Redirect::page($this->controller . "/form/insert/0");
        } else {
            if ($this->model->insert($post)) {
                return Redirect::page($this->controller, ["msgSucesso" => "Registro inserido com sucesso."]);
            } else {
                return Redirect::page($this->controller . "/form/insert/0");
            }
        }
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $post = $this->request->getPost();

        if (Validator::make($post, $this->model->validationRules)) {
            return Redirect::page($this->controller . "/form/insert/0");
        } else {
            if ($this->model->update($post)) {
                return Redirect::page($this->controller, ["msgSucesso" => "Registro alterado com sucesso."]);
            } else {
                return Redirect::page($this->controller . "/form/update/" . $post['id']);
            }
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

        if ($this->model->delete($post)) {
            return Redirect::page($this->controller, ["msgSucesso" => "Registro Excluído com sucesso."]);
        } else {
            return Redirect::page($this->controller);
        }
    }

    public function meuPlano()
    {
        if (!verificaSeUsuarioEstaLogado()) {
            return Redirect::page('login');
        }

        $dados = [
            'aMeuPlano' => $this->model->meuPlano(),
        ];

        return $this->loadView("aluno/meuPlano", $dados);
    }

    public function meuAcompanhamento()
    {
        if (!verificaSeUsuarioEstaLogado()) {
            return Redirect::page('login');
        }

        $dados = [
            'aMeuAcompanhamento' => $this->model->meuAcompanhamento(),
        ];

        return $this->loadView("aluno/meuAcompanhamento", $dados);
    }

    public function minhaFicha()
    {
        if (!verificaSeUsuarioEstaLogado()) {
            return Redirect::page('login');
        }

        $dados = [
            'aMinhaFicha' => $this->model->minhaFicha(),
        ];

        return $this->loadView("aluno/minhaFicha", $dados);
    }

    public function meuExercicio()
    {
        if (!verificaSeUsuarioEstaLogado()) {
            return Redirect::page('login');
        }

        $dados = [
            'aMeuExercicio' => $this->model->meuExercicio(),
        ];

        return $this->loadView("aluno/meuExercicio", $dados);
    }
}
