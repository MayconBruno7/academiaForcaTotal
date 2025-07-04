<?php

namespace App\Controller;

use App\Model\ExercicioModel;
use App\Model\FichaTreinoModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Validator;

class FichaExercicio extends ControllerMain
{

    protected $fichaTreinoModel;
    protected $exercicioModel;

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
        $this->fichaTreinoModel = new FichaTreinoModel();
        $this->exercicioModel = new ExercicioModel();
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
        return $this->loadView("fichaExercicio/listaFichaExercicio", $this->model->listaFichaExercicio());
    }

    public function form($action, $id)
    {

        if (!verificaSeUsuarioEstaLogado()) {
            return Redirect::page('login');
        }
        $dados = [
            'data' => $this->model->getById($id),
            'aFichaTreino' => $this->fichaTreinoModel->listaFichaTreino(),
            'aExercicio' => $this->exercicioModel->listaExercicio(),
        ];

        return $this->loadView("fichaExercicio/formFichaExercicio", $dados);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();

        $post['ficha_id'] = empty($post['ficha_id']) ? null : $post['ficha_id'];
        $post['exercicio_id'] = empty($post['exercicio_id']) ? null : $post['exercicio_id'];

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

        $post['ficha_id'] = empty($post['ficha_id']) ? null : $post['ficha_id'];
        $post['exercicio_id'] = empty($post['exercicio_id']) ? null : $post['exercicio_id'];
        
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
}
