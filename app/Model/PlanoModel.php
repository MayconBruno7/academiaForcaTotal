<?php

namespace App\Model;

use Core\Library\ModelMain;

class PlanoModel extends ModelMain
{
    protected $table = "planos";

    public $validationRules = [
        "nome" => [
            "label" => "Nome",
            "rules" => "required|min:3|max:50"
        ],
        "valor" => [
            "label" => "Valor",
            "rules" => "required|decimal|greater_than_equal_to[0]"
        ],
        "treinos_semanais" => [
            "label" => "Treinos Semanais",
            "rules" => "required|integer|greater_than[0]|less_than_equal_to[14]"
        ]
    ];


    /**
     * lista
     *
     * @param string $orderby 
     * @return array
     */
    public function listaPlano()
    {
        return $this->db
            ->select('planos.*')
            ->findAll();
    }
}
