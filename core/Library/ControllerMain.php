<?php

namespace Core\Library;

use Core\Library\Request;

class ControllerMain
{
    protected $controller;
    protected $method;
    protected $action;
    protected $request;
    public $model;

    use RequestTrait;

    /**
     * construct
     */
    public function __construct()
    {
        $this->auxiliarConstruct();
    }

    /**
     * auxiliarconstruct
     *
     * @return void
     */
    public function auxiliarconstruct()
    {
        $aParametros        = Self::getRotaParametros();
        $this->controller   = $aParametros['controller'];
        $this->method       = $aParametros['method'];
        $this->action       = $aParametros['action'];
        $this->model        = $this->loadModel($this->controller);
        $this->request      = new Request();

        // carregar helper padrão
        $this->loadHelper(["formulario", "utilits"]);

        if (substr($this->controller, 0, 3) !== "Api") {

            // Se não for um controller público (autenticado)
            if (!in_array($this->controller, CONTROLLER_AUTH)) {

                // Se não for o método de acesso permitido publicamente de Plano ou Professor
                $liberadoSemLogin = !(
                    ($this->controller === 'Plano' && $this->method === 'listaPlano') ||
                    ($this->controller === 'Professor' && $this->method === 'listaProfessor')
                );

                // Se for um controller que exige login, mas o usuário não está logado
                if ($liberadoSemLogin && !Session::get("userId")) {
                    Session::set('msgError', "Para acessar a rotina, favor efetuar o login.");
                    return Redirect::page("login");
                }

                $liberadoAluno = !(
                    $this->controller === 'Aluno' || $this->controller === 'Sistema' || $this->controller === 'Usuario' &&
                    in_array($this->method, ['meuPlano', 'meuAcompanhamento', 'minhaFicha', 'meuExercicio', 'index', 'formTrocarSenha'])
                );

                // Apenas usuários com nível 20 ou menos podem acessar os métodos liberados do aluno
                if ($liberadoAluno && Session::get("userNivel") > 20) {
                    Session::set('msgError', "Você não possui permissão neste programa!");
                    return Redirect::page("login");
                }
            }
        }
    }

    /**
     * validaNivelAcesso
     *
     * @param int $nivelMinino 
     * @return void
     */
    public function validaNivelAcesso(int $nivelMinino = 20)
    {
        if (!((int)Session::get("userNivel") <= $nivelMinino)) {
            return Redirect::page("sistema", ["msgError" => "Você não possui permissão neste programa"]);
            exit;
        }
    }


    /**
     * loadModel
     *
     * @param string $nomeModel 
     * @return void|object
     */
    public function loadModel($nomeModel)
    {
        $pathModel = "App\Model\\" . $nomeModel . "Model";

        if (class_exists($pathModel)) {
            return new $pathModel();
        }
    }

    /**
     * loadHelper
     *
     * @param string|array $nomeHelper 
     * @return void
     */
    public function loadHelper($nomeHelper)
    {
        if (gettype($nomeHelper) == "string") {
            $nomeHelper = [$nomeHelper];
        }

        foreach ($nomeHelper as $value) {
            $pathHelperAtom = ".." . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "Helper" . DIRECTORY_SEPARATOR . "{$value}.php";

            if (file_exists($pathHelperAtom)) {
                require_once $pathHelperAtom;
            } else {
                $pathHelperUser = ".." . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "Helper" . DIRECTORY_SEPARATOR . "{$value}.php";

                if (file_exists($pathHelperUser)) {
                    require_once $pathHelperUser;
                }
            }
        }
    }

    /**
     * loadView
     *
     * @param string $nome 
     * @param array $dados 
     * @param bool $exibeCabRodape 
     * @return void
     */
    public function loadView($nome, $dados = [], $exibeCabRodape = true)
    {
        $aDados = $dados;
        $pathView = ".." . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR;

        // carrega cabeçalho
        if ($exibeCabRodape) {
            require_once $pathView . "comuns" . DIRECTORY_SEPARATOR . "cabecalho.php";
        }

        // erros na validação do formulário
        if (Session::get("inputs") != false) {
            $dados['data'] = Session::getDestroy("inputs");
        }

        // Será utilizado para recuperar valores e preencher o formulário
        if (isset($dados['data'])) {
            $_POST = $dados['data'];
        } else {
            if (count($dados) > 0) {
                $_POST = $dados;
            }
        }

        // Será utilizado futuramente para recuperar valores quando idenficado
        if (Session::get("errors") != false) {
            $_POST['formErrors'] = Session::getDestroy('errors');
        }

        // carrega a página
        if (file_exists($pathView . $nome . ".php")) {
            require_once $pathView . $nome . ".php";
        } else {
            require_once $pathView . "comuns" . DIRECTORY_SEPARATOR . "erros.php";
        }

        // carrega rodapé
        if ($exibeCabRodape) {
            require_once $pathView . "comuns" . DIRECTORY_SEPARATOR . "rodape.php";
        }
    }
}
