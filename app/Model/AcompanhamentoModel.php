<?php

namespace App\Model;

use Core\Library\ModelMain;

class AcompanhamentoModel extends ModelMain
{
    protected $table = "acompanhamentos";

    public $validationRules = [
        "data" => [
            "label" => "Data",
            "rules" => "required|date"
        ],
        "peso" => [
            "label" => "Peso (kg)",
            "rules" => "required|numeric|min:0|max:999.99"
        ],
        "medidas" => [
            "label" => "Medidas",
            "rules" => "required|min:5"
        ],
        "frequencia" => [
            "label" => "Frequência",
            "rules" => "required|int|min:1|max:14"
        ],
        "observacoes" => [
            "label" => "Observações",
            "rules" => "required|min:3"
        ]
    ];

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
