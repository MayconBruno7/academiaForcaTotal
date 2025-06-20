<?php

use Core\Library\Session;

if (! function_exists('setValor')) {

    /**
     * setValor
     *
     * @param string $campo 
     * @param mixed $default 
     * @return mixed
     */
    function setValor($campo, $default = "")
    {
        if (isset($_POST[$campo])) {
            return $_POST[$campo];
        } else {
            return $default;
        }
    }

}

if (! function_exists('setMsgFilderError')) {
    /**
     * setMsgFilderError
     *
     * @param string $campo 
     * @return string
     */
    function setMsgFilderError($campo)
    {
        $cRet   = '';

        if (isset($_POST['formErrors'][$campo])) {
            $cRet .= '<div class="mt-2 text-danger">';
                $cRet .= $_POST['formErrors'][$campo];
            $cRet .= '</div>';
        }

        return $cRet;
    }
}

if (! function_exists('exibeAlerta')) {
    /**
     * exibeAlerta
     *
     * @return string
     */
    function exibeAlerta()
    {
        $msgSucesso = Session::getDestroy('msgSucesso');
        $msgError   = Session::getDestroy('msgError');
        $msgAlerta  = Session::getDestroy('msgAlerta');
        $mensagem   = '';
        $classAlert = '';

        if ($msgSucesso != "") {
            $mensagem   = $msgSucesso;
            $classAlert = 'success';
        } elseif ($msgError != "") {
            $mensagem   = $msgError;
            $classAlert = 'danger';
        } elseif ($msgAlerta != "") {
            $mensagem   = $msgAlerta;
            $classAlert = 'warning';
        }

        if ($mensagem == "") {
            return "";
        } else {
            return  '<div class="m-2 alert alert-' . $classAlert . ' alert-dismissible fade show" role="alert">
                        ' . $mensagem . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
    }
}

function formatarData($data)
{
    if (!$data || $data == '0000-00-00') return '';
    return date('d/m/Y', strtotime($data));
}

function formatarValor($valor)
{
    return 'R$ ' . number_format($valor, 2, ',', '.');
}


function formatarCpf($cpf)
{
    $cpf = preg_replace('/[^0-9]/', '', $cpf); // Remove caracteres não numéricos
    if (strlen($cpf) != 11) return $cpf; // Se não tiver 11 dígitos, retorna como está

    return substr($cpf, 0, 3) . '.' .
           substr($cpf, 3, 3) . '.' .
           substr($cpf, 6, 3) . '-' .
           substr($cpf, 9, 2);
}

function formatarTelefone($telefone)
{
    // Remove tudo que não for número
    $telefone = preg_replace('/[^0-9]/', '', $telefone);

    // Verifica se tem DDI (ex: 55)
    if (strlen($telefone) > 11) {
        $telefone = substr($telefone, -11); // pega os 11 últimos dígitos (sem DDI)
    }

    if (strlen($telefone) === 11) {
        // Ex: 11987654321 → (11) 98765-4321
        return '(' . substr($telefone, 0, 2) . ') ' .
               substr($telefone, 2, 5) . '-' .
               substr($telefone, 7);
    } elseif (strlen($telefone) === 10) {
        // Ex: 1132654321 → (11) 3265-4321
        return '(' . substr($telefone, 0, 2) . ') ' .
               substr($telefone, 2, 4) . '-' .
               substr($telefone, 6);
    }

    // Se não for possível formatar, retorna o número como está
    return $telefone;
}

if (! function_exists('datatables')) {
    /**
     * datatables
     *
     * @param string $idTable 
     * @return string
     */
    function datatables($idTable)
{
    return '
        <script src="' . baseUrl() . 'assets/DataTables/datatables.min.js"></script>
        <style>
            div.dataTables_filter {
                text-align: right !important;
            }
        </style>
        <script>
            $(document).ready(function() {
                $("#' . $idTable . '").DataTable({
                    language: {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    }
                });
            });
        </script>';
}

}