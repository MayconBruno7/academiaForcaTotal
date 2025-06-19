<?php

namespace App\Model;

use Core\Library\ModelMain;

class FichaTreinoModel extends ModelMain
{
    protected $table = "fichas_treino";

    public $validationRules = [
        // "nome"  => [
        //     "label" => 'Nome',
        //     "rules" => 'required|min:3|max:50'
        // ],
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
    public function listaFichaTreino()
    {
        return $this->db
        ->select('
            fichas_treino.*,
            alunos.nome AS aluno_nome,
            professores.nome AS professor_nome
        ')
        ->join('alunos', 'alunos.id = fichas_treino.aluno_id', 'left')
        ->join('professores', 'professores.id = fichas_treino.professor_id', 'left')
        ->findAll();
    }
}
