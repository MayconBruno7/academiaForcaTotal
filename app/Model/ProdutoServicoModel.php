<?php

namespace App\Model;

use Core\Library\ModelMain;

class ProdutoServicoModel extends ModelMain
{
    protected $table = "produtos_servicos";

    public $validationRules = [
        "nome" => [
            "label" => "Nome",
            "rules" => "required|min:3|max:100"
        ],
        "descricao" => [
            "label" => "Descrição",
            "rules" => "permit_empty|string"
        ],
        "imagem" => [
            "label" => "Imagem",
            "rules" => "permit_empty|max_length[255]"
        ],
        "tipo" => [
            "label" => "Tipo",
            "rules" => "required|in_list[produto,servico]"
        ],
        "preco" => [
            "label" => "Preço",
            "rules" => "required|decimal|greater_than_equal_to[0]"
        ],
        "unidade" => [
            "label" => "Unidade",
            "rules" => "permit_empty|max_length[50]"
        ],
        "estoque" => [
            "label" => "Estoque",
            "rules" => "permit_empty|integer|greater_than_equal_to[0]"
        ],
        "status" => [
            "label" => "Status",
            "rules" => "permit_empty|in_list[0,1]"
        ],
        "criado_em" => [
            "label" => "Data de Criação",
            "rules" => "permit_empty|valid_datetime"
        ],
        "atualizado_em" => [
            "label" => "Data de Atualização",
            "rules" => "permit_empty|valid_datetime"
        ]
    ];

    /**
     * lista
     *
     * @param string $orderby 
     * @return array
     */
    public function listaProdutoServico()
    {
        return $this->db
            ->select('*')
            ->findAll();
    }
}
