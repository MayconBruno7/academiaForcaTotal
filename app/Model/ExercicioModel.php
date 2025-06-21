<?php

namespace App\Model;

use Core\Library\ModelMain;

class ExercicioModel extends ModelMain
{
    protected $table = "exercicios";

    public $validationRules = [
        "nome" => [
            "label" => "Nome",
            "rules" => "required|min:3|max:100"
        ],
        "grupo_muscular" => [
            "label" => "Grupo Muscular",
            "rules" => "required|min:3|max:50"
        ]
    ];

    /**
     * lista
     *
     * @param string $orderby 
     * @return array
     */
    public function listaExercicio()
    {
        return $this->db
            ->select('exercicios.*')
            ->findAll();
    }
}
