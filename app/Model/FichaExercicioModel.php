<?php

namespace App\Model;

use Core\Library\ModelMain;

class FichaExercicioModel extends ModelMain
{
    protected $table = "ficha_exercicio";

    // public $validationRules = [
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
    // ];


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
