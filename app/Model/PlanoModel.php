<?php

namespace App\Model;

use Core\Library\ModelMain;

class PlanoModel extends ModelMain
{
    protected $table = "planos";
    
    public $validationRules = [
        "nome"  => [
            "label" => 'Nome',
            "rules" => 'required|min:3|max:50'
        ],
        "valor"  => [
            "label" => 'Valor Plano',
            "rules" => 'required|min:2|max:7'
        ],
        "treinos_semanais"  => [
            "label" => 'Treinos mensais',
            "rules" => 'required|int'
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