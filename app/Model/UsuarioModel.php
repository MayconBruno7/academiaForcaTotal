<?php

namespace App\Model;

use Core\Library\ModelMain;
use Core\Library\Session;

class UsuarioModel extends ModelMain
{
    protected $table = "usuario";

    public $validationRules = [
        'nivel' => [
            'rules' => 'required|integer|in_list[1,11,21]',
            'errors' => [
                'required' => 'O nível é obrigatório.',
                'integer' => 'O nível deve ser um número inteiro.',
                'in_list' => 'O nível deve ser 1 (Super Administrador), 11 (Administrador) ou 21 (Usuário).',
            ],
        ],
        'nome' => [
            'rules' => 'required|string|max_length[60]',
            'errors' => [
                'required' => 'O nome é obrigatório.',
                'max_length' => 'O nome pode ter no máximo 60 caracteres.',
            ],
        ],
        'email' => [
            'rules' => 'required|valid_email|max_length[150]',
            'errors' => [
                'required' => 'O e-mail é obrigatório.',
                'valid_email' => 'Informe um e-mail válido.',
                'max_length' => 'O e-mail pode ter no máximo 150 caracteres.',
            ],
        ],
        'senha' => [
            'rules' => 'required|string|min_length[6]|max_length[250]',
            'errors' => [
                'required' => 'A senha é obrigatória.',
                'min_length' => 'A senha deve ter no mínimo 6 caracteres.',
                'max_length' => 'A senha pode ter no máximo 250 caracteres.',
            ],
        ],
        'statusRegistro' => [
            'rules' => 'required|integer|in_list[1,2,3]',
            'errors' => [
                'required' => 'O status do registro é obrigatório.',
                'integer' => 'O status do registro deve ser um número inteiro.',
                'in_list' => 'O status do registro deve ser 1 (Ativo), 2 (Inativo) ou 3 (Bloqueado).',
            ],
        ],
    ];

    /**
     * getUserEmail
     *
     * @param string $email 
     * @return array
     */
    public function getUserEmail($email)
    {
        return $this->db->where("email", $email)->first();
    }

    /**
     * criaSuperUser
     *
     * @return void
     */
    public function criaSuperUser()
    {
        $dados = [
            "nivel"             => 1,
            "nome"              => "Administrador",
            "email"             => "administrador@gmail.com",
            "senha"             => password_hash("admin", PASSWORD_DEFAULT),
            "statusRegistro"    => 1
        ];

        $aSuperUser = $this->getUserEmail($dados['email']);

        if (count($aSuperUser) > 0) {
            // exit("count($aSuperUser) > 0");
            return false;
        } else {
            if ($this->insert($dados)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function listaUsuarioAluno()
    {
        return $this->db
            ->where('nivel', 21)
            ->findAll();
    }
}
