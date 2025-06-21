<?php

use Core\Library\Redirect;
use Core\Library\Session;

    /**
     * baseUrl
     *
     * @return string
     */
    function baseUrl()
    {
        return $_ENV['BASEURL'];
    }

    function verificaSeUsuarioEstaLogado()
    {
        if (!Session::get("userId")) {
            return false;
        }
        return true;

    }