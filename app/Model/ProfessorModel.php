<?php

namespace App\Model;

use Core\Library\ModelMain;

class ProfessorModel extends ModelMain
{
    protected $table = "professores";

    public $validationRules = [
        "nome"  => [
            "label" => 'Nome',
            "rules" => 'required|min:3|max:50'
        ],
        // "valor"  => [
        //     "label" => 'Valor Plano',
        //     "rules" => 'required|min:2|max:7'
        // ],
        // "treinos_semanais"  => [
        //     "label" => 'Treinos mensais',
        //     "rules" => 'required|int'
        // ]
    ];


    /**
     * lista
     *
     * @param string $orderby 
     * @return array
     */
    public function listaProfessor()
    {
          return $this->db
            ->select('professores.*')
            ->findAll();
    }
}
