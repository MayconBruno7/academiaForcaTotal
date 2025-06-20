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

    /**
     * Retorna fichas com nome do aluno e data de início para uso em selects
     *
     * @return array
     */
    public function listaSelectFichas()
    {
        return $this->db
        ->select('
                fichas_treino.id,
                fichas_treino.data_inicio,
                alunos.nome AS nome_aluno
            ')
            ->join('alunos', 'alunos.id = fichas_treino.aluno_id', 'left')
            ->orderBy('alunos.nome', 'ASC')
            ->findAll();
    }
}
