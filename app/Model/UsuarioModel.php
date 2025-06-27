<?php

namespace App\Model;

use Core\Library\ModelMain;
use Core\Library\Session;

class UsuarioModel extends ModelMain
{
    protected $table = "usuario";

    public $validationRules = [
        "nome"  => [
            "label" => 'Nome',
            "rules" => 'required|min:3|max:60'
        ],
        "email"  => [
            "label" => 'Email',
            "rules" => 'required|min:5|max:150'
        ],
        "nivel"  => [
            "label" => 'Nível',
            "rules" => 'required|int'
        ],
        "statusRegistro"  => [
            "label" => 'Status',
            "rules" => 'required|int'
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
