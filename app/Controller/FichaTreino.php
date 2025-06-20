<?php

namespace App\Controller;

use App\Model\AlunoModel;
use App\Model\ProfessorModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;

class FichaTreino extends ControllerMain
{

    protected $alunoModel;
    protected $professorModel;

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
        $this->alunoModel = new AlunoModel();
        $this->professorModel = new ProfessorModel();
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
        return $this->loadView("fichaTreino/listaFichaTreino", $this->model->listaFichaTreino());
    } 

    public function form($action, $id)
    {

             if (!verificaSeUsuarioEstaLogado()) {
            return Redirect::page('login');
        }
        $dados = [
            'data' => $this->model->getById($id),  
            'aAluno' => $this->alunoModel->listaAluno(),               // Busca FichaTreino           
            'aProfessor' => $this->professorModel->listaProfessor(),               // Busca FichaTreino           
        ];
        
        return $this->loadView("fichaTreino/formFichaTreino", $dados);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();

        if ($this->model->insert($post)) {
            return Redirect::page($this->controller, ["msgSucesso" => "Registro inserido com sucesso."]);
        } else {
            return Redirect::page($this->controller . "/form/insert/0");
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

        if ($this->model->update($post)) {
            return Redirect::page($this->controller, ["msgSucesso" => "Registro alterado com sucesso."]);
        } else {
            return Redirect::page($this->controller . "/form/update/" . $post['id']);
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
}