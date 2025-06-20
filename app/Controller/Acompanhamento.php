<?php

namespace App\Controller;

use App\Model\FichaTreinoModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;

class Acompanhamento extends ControllerMain
{

    protected $fichaTreinoModel;

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
        $this->fichaTreinoModel = new FichaTreinoModel();
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return $this->loadView("acompanhamento/listaAcompanhamento", $this->model->listaAcompanhamento());
    }

    public function form($action, $id)
    {

        $dados = [
            'data' => $this->model->getById($id),  
            'aFichaTreino' => $this->fichaTreinoModel->listaSelectFichas(),               // Busca Acompanhamento       
        ];
        
        return $this->loadView("acompanhamento/formAcompanhamento", $dados);
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