<?php

namespace App\Model;

use Core\Library\ModelMain;

class ProfessorModel extends ModelMain
{
    protected $table = "professores";

    public $validationRules = [
        "usuario_id" => [
            "label" => "Usuário",
            "rules" => "required|integer"
        ],
        "nome" => [
            "label" => "Nome",
            "rules" => "required|min:3|max:100"
        ],
        "cpf" => [
            "label" => "CPF",
            "rules" => "required|numeric|exact_len:11|is_unique:professores.cpf,id,{id}"
        ],
        "telefone" => [
            "label" => "Telefone",
            "rules" => "required|min:8|max:20"
        ],
        "email" => [
            "label" => "E-mail",
            "rules" => "required|valid_email|max:100"
        ],
        "data_nascimento" => [
            "label" => "Data de Nascimento",
            "rules" => "required|valid_date"
        ],
        "especialidade" => [
            "label" => "Especialidade",
            "rules" => "required|min:3|max:50"
        ],
        "endereco" => [
            "label" => "Endereço",
            "rules" => "required|min:5"
        ],
        "imagem" => [
            "label" => "Imagem",
            "rules" => "permit_empty|max_length[255]"
            // Se for upload, valide tipo/tamanho no controller
        ]
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
