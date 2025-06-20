<?php
// app\controller\Home.php

namespace App\Controller;

use App\Model\PlanoModel;
use App\Model\ProfessorModel;
use Core\Library\ControllerMain;

class Home extends ControllerMain
{

    protected $planoModel;
    protected $professorModel;

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->planoModel = new PlanoModel();
        $this->professorModel = new ProfessorModel();
    }

    public function index()
    {
        $dados = [ 
            'aPlano' => $this->planoModel->listaPlano(),               // Busca FichaTreino           
            'aProfessor' => $this->professorModel->listaProfessor(),               // Busca FichaTreino           
        ];

        return $this->loadView("home", $dados);
    }

    public function sobre($action = null)
    {
        return $this->loadView("sobre");
    }

    public function contato($action = null)
    {
        return $this->loadView("contato");
    }

}