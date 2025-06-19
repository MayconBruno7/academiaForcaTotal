<?php

namespace App\Model;

use Core\Library\ModelMain;

class AlunoModel extends ModelMain
{
    protected $table = "alunos";

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
    public function listaAluno()
    {
        return $this->db
            ->select('alunos.*, planos.nome AS plano_nome, planos.valor, planos.treinos_semanais')
            ->join('planos', 'planos.id = alunos.plano_id', 'left') 
            ->findAll();
    }
}
