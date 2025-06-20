<?php

namespace App\Model;

use Core\Library\ModelMain;

class AcompanhamentoModel extends ModelMain
{
    protected $table = "acompanhamentos";

    // public $validationRules = [
    //     "nome"  => [
    //         "label" => 'Nome',
    //         "rules" => 'required|min:3|max:50'
    //     ],
    // "valor"  => [
    //     "label" => 'Valor Plano',
    //     "rules" => 'required|min:2|max:7'
    // ],
    // "treinos_semanais"  => [
    //     "label" => 'Treinos mensais',
    //     "rules" => 'required|int'
    // ]
    // ];


    /**
     * lista
     *
     * @param string $orderby 
     * @return array
     */
    public function listaAcompanhamento()
    {
        return $this->db
            ->select('
                acompanhamentos.*,
                fichas_treino.data_inicio,
                fichas_treino.validade,
                fichas_treino.anotacoes AS anotacoes_ficha,
                alunos.nome AS nome_aluno,
                professores.nome AS nome_professor
            ')
            ->join('fichas_treino', 'fichas_treino.id = acompanhamentos.ficha_id', 'left')
            ->join('alunos', 'alunos.id = fichas_treino.aluno_id', 'left')
            ->join('professores', 'professores.id = fichas_treino.professor_id', 'left')
            ->findAll();
    }
}
