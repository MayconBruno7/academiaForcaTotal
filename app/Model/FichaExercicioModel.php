<?php

namespace App\Model;

use Core\Library\ModelMain;

class FichaExercicioModel extends ModelMain
{
    protected $table = "ficha_exercicio";
    
    public $validationRules = [
        "series" => [
            "label" => "Séries",
            "rules" => "permit_empty|integer|greater_than[0]|less_than_equal_to[100]"
        ],
        "repeticoes" => [
            "label" => "Repetições",
            "rules" => "permit_empty|integer|greater_than[0]|less_than_equal_to[100]"
        ],
        "carga" => [
            "label" => "Carga (kg)",
            "rules" => "permit_empty|decimal"
        ]
    ];



    public function listaFichaExercicio()
    {
        return $this->db
            ->select('
                ficha_exercicio.*,
                fichas_treino.data_inicio,
                fichas_treino.validade,
                fichas_treino.anotacoes,
                alunos.nome AS aluno_nome,
                professores.nome AS professor_nome,
                exercicios.nome AS exercicio_nome,
                exercicios.grupo_muscular
            ')
                    ->join('fichas_treino', 'fichas_treino.id = ficha_exercicio.ficha_id', 'left')
                    ->join('alunos', 'alunos.id = fichas_treino.aluno_id', 'left')
                    ->join('professores', 'professores.id = fichas_treino.professor_id', 'left')
                    ->join('exercicios', 'exercicios.id = ficha_exercicio.exercicio_id', 'left')
                    ->findAll();
    }
}
