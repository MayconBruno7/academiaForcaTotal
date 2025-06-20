<?php

namespace App\Model;

use Core\Library\ModelMain;
use Core\Library\Session;

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

    public function meuPlano()
    {
        return $this->db
            ->select('alunos.*, planos.nome AS plano_nome, planos.valor, planos.treinos_semanais')
            ->join('planos', 'planos.id = alunos.plano_id', 'left')
            ->where('alunos.usuario_id', Session::get('userId'))
            ->first();
    }

    public function meuAcompanhamento()
    {
        return $this->db
            ->select('
                acompanhamentos.*,
                fichas_treino.data_inicio,
                fichas_treino.validade,
                alunos.nome AS aluno_nome
            ')
            ->join('fichas_treino', 'fichas_treino.aluno_id = alunos.id', 'left')
            ->join('acompanhamentos', 'acompanhamentos.ficha_id = fichas_treino.id', 'left')
            ->where('alunos.usuario_id', Session::get('userId'))
            ->findAll();
    }

    public function minhaFicha()
    {
        return $this->db
            ->select('
            fichas_treino.*,
            professores.nome AS professor_nome,
            alunos.nome AS aluno_nome
        ')
            ->join('fichas_treino', 'fichas_treino.aluno_id = alunos.id', 'left')
            ->join('professores', 'professores.id = fichas_treino.professor_id', 'left')
            ->where('alunos.usuario_id', Session::get('userId'))
            ->findAll();
    }

    public function meuExercicio()
    {
        return $this->db
        ->select('
            exercicios.nome,
            exercicios.grupo_muscular,
            ficha_exercicio.series,
            ficha_exercicio.repeticoes,
            ficha_exercicio.carga,
            fichas_treino.data_inicio,
            fichas_treino.validade
        ')
        ->join('fichas_treino', 'fichas_treino.aluno_id = alunos.id', 'left')
        ->join('ficha_exercicio', 'ficha_exercicio.ficha_id = fichas_treino.id', 'left')
        ->join('exercicios', 'exercicios.id = ficha_exercicio.exercicio_id', 'left')
        ->where('alunos.usuario_id', Session::get('userId'))
        ->findAll();
    }
}
