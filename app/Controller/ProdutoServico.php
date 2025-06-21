<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Files;
use Core\Library\Redirect;
use Core\Library\Session;
use Core\Library\Validator;

class ProdutoServico extends ControllerMain
{

    protected $files;

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
        $this->files = new Files();
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

        return $this->loadView("produtoServico/listaProdutoServico", $this->model->listaProdutoServico());
    }

    public function form($action, $id)
    {

        if (!verificaSeUsuarioEstaLogado()) {
            return Redirect::page('login');
        }

        $dados = [
            'data' => $this->model->getById($id),                // Busca ProdutoServico       
        ];

        return $this->loadView("produtoServico/formProdutoServico", $dados);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();


        // faz upload da imagem

        if (!empty($_FILES['imagem']['name'])) {

            // Faz upload da imagem
            $nomeRetornado = $this->files->upload($_FILES, 'produtoServico');

            // se for boolean, significa que o upload falhou
            if (is_bool($nomeRetornado)) {
                Session::set('inputs', $post);
                return Redirect::page($this->controller . "/form/insert/" . $post['id']);
            } else {
                $post['imagem'] = $nomeRetornado[0];
            }
        } else {
            $post['imagem'] = $post['nomeImagem'];
        }

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

        if (!empty($_FILES['imagem']['name'])) {

            // Faz upload da imagem
            $nomeRetornado = $this->files->upload($_FILES, 'produtoServico');

            // se for boolean, significa que o upload falhou
            if (is_bool($nomeRetornado)) {
                Session::set('inputs', $post);
                return Redirect::page($this->controller . "/form/insert/" . $post['id']);
            } else {
                $post['imagem'] = $nomeRetornado[0];
            }
        } else {
            $post['imagem'] = $post['nomeImagem'];
        }

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
