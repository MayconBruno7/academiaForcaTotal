<?php

use Core\Library\Request;

function formTitulo($titulo, $btnNovo = false)
{
    $request = new Request();

    if ($btnNovo) {
        $cHtmlBtn = '<a href="' . baseUrl() . $request->getController() . '/form/insert/0" title="Novo" class="btn btn-outline-secondary btn-sm">Novo</a>';
    } else {
        $cHtmlBtn = '<a href="' . baseUrl() . $request->getController() . '" title="Voltar" class="btn btn-outline-secondary btn-sm">Voltar</a>';
    }

    $cHtml = '
        <div class="row align-items-center border-bottom pb-2 mx-2 mt-4 mb-4">
            <div class="col-9">
                <h4 class="fw-semibold text-dark mb-0">' . $titulo . formSubTitulo($request->getAction()) . '</h4>
            </div>
            <div class="col-3 text-end">
                ' . $cHtmlBtn . '
            </div>
        </div>';

    $cHtml .= exibeAlerta();

    return $cHtml;
}


/**
 * formSubTitulo
 *
 * @param string $action 
 * @return string
 */
function formSubTitulo($action)
{
    if ($action == "insert") {
        return " - Novo";
    } elseif ($action == "update") {
        return " - Alteração";
    } elseif ($action == "delete") {        
        return " - Exclusão";
    } elseif ($action == "view") {
        return " - Visualização";
    } else {
        return "";
    }
}

/**
 * formButton
 *
 * @return string
 */
function formButton()
{
    $request = new Request();

    $cHtml = '<a href="' . baseUrl() . $request->getController() . '" 
                    title="Voltar" 
                    class="btn btn-secondary">
                        Voltar
                </a>';

    if ($request->getAction() != "view") {
        $cHtml .= '&nbsp;<button type="submit" class="btn btn-primary">Enviar</button>';
    }
    
    return $cHtml;
}

