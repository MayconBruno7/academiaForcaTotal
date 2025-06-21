<?php

use Core\Library\Session;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Modelo para Academia">
    <meta name="keywords" content="Academia, única, criativo, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= baseUrl() ?>assets/img/logo.png">

    <title>Academia | Muriaé GYM</title>

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/style.css" type="text/css">

    <script src="<?= baseUrl() ?>assets/js/jquery-3.3.1.min.js"></script>

    <style>
        /* Cabeçalho fixo e transparente */
        .header-section {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            background-color: transparent !important;
            padding: 20px 0;
        }

        /* Links do menu */
        .header-section .nav-menu ul li a {
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
            padding: 8px 12px;
            text-decoration: none;
            transition: 0.3s;
            display: block;
        }

        .header-section .nav-menu ul li a:hover {
            color: #f1c40f;
        }

        /* Dropdown container (pai) */
        .dropdown {
            position: relative;
        }

        /* Submenu */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            /* logo abaixo do pai, sem espaço */
            left: 0;
            background-color: rgba(0, 0, 0, 0.85);
            border-radius: 8px;
            min-width: 180px;
            z-index: 1000;
            padding: 8px 0;
        }

        /* Mostrar submenu ao hover no pai ou submenu */
        .dropdown:hover>.dropdown-menu,
        .dropdown-menu:hover {
            display: block;
        }

        /* Itens do submenu */
        .dropdown-menu li {
            padding: 0;
        }

        /* Links submenu */
        .dropdown-menu li a {
            color: #fff;
            padding: 8px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu li a:hover {
            color: #f1c40f;
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Divisor */
        .divider {
            text-align: center;
            color: #ccc;
            font-size: 12px;
            margin: 8px 0;
        }

        /* Fundo fixo da página */
        body {
            background: url('<?= baseUrl() ?>assets/img/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            font-family: 'Muli', sans-serif;
        }
    </style>
</head>

<body>
    <!-- Pré-carregamento da Página -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Início do Menu Offcanvas -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>

        <nav class="canvas-menu mobile-menu">
            <ul>
                <li class="active"><a class="text-decoration-none" href="<?= baseUrl() ?>">Início</a></li>
                <li><a class="text-decoration-none" href="<?= baseUrl() ?>#equipe">Nossa Equipe</a></li>
                <li><a class="text-decoration-none" href="<?= baseUrl() ?>home/sobre">Sobre</a></li>
                <li><a class="text-decoration-none" href="<?= baseUrl() ?>home/contato">Contato</a></li>
                <?php if (Session::get("userId")): ?>
                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>sistema"><?= Session::get('userNome') ?></a>
                        <ul class="dropdown">
                            <?php if ((int)Session::get("userNivel") <= 20): ?>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>usuario">Usuário</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>acompanhamento">Adicionar acompanhamento</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>aluno">Cadastrar Alunos</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>professor">Cadastrar Professores</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>plano">Cadastrar Planos</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>exercicio">Cadastrar Exercicios</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>fichaTreino">Cadastrar Fichas de treino</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>fichaExercicio">Cadastrar Fichas de exercicio</a></li>

                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>uf">UF</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>cidade">Cidade</a></li>
                                <div class="divider">
                                    <span>ou</span>
                                </div>
                            <?php endif; ?>

                            <li><a class="text-decoration-none" href="<?= baseUrl() ?>aluno/meuPlano">Meu plano</a></li>
                            <li><a class="text-decoration-none" href="<?= baseUrl() ?>aluno/meuAcompanhamento">Meus acompanhamentos</a></li>
                            <li><a class="text-decoration-none" href="<?= baseUrl() ?>aluno/minhaFicha">Minha ficha</a></li>
                            <li><a class="text-decoration-none" href="<?= baseUrl() ?>aluno/meuExercicio">Meus exercicios</a></li>
                            <li><a class="text-decoration-none" href="<?= baseUrl() ?>Usuario/formTrocarSenha">Trocar senha</a></li>
                            <li><a class="text-decoration-none" href="<?= baseUrl() ?>login/signOut">Sair</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= baseUrl() ?>login">Entrar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Fim do Menu Offcanvas -->

    <!-- Início do Cabeçalho -->
    <header class="header-section">
        <div class="container-fluid d-flex flex-column align-items-center justify-content-center text-center">
            <!-- Logo -->
            <div class="logo mb-2">
                <a href="<?= baseUrl() ?>">
                    <img src="<?= baseUrl() ?>assets/img/logo.png" alt="Logo da Academia" style="max-height: 100px;">
                </a>
            </div>

            <!-- Menu principal -->
            <nav class="nav-menu">
                <ul class="d-flex flex-wrap justify-content-center align-items-center gap-4 list-unstyled m-0">
                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>">Início</a></li>
                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>#equipe">Nossa Equipe</a></li>
                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>home/sobre">Sobre</a></li>
                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>home/contato">Contato</a></li>

                    <?php if (Session::get("userId")): ?>
                        <li class="dropdown">
                            <a href="<?= baseUrl() ?>sistema" class="text-decoration-none"><?= Session::get('userNome') ?></a>
                            <ul class="dropdown-menu list-unstyled text-start p-2">
                                <?php if ((int)Session::get("userNivel") <= 20): ?>
                                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>usuario">Cadastrar Usuário</a></li>
                                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>acompanhamento">Cadastrar acompanhamento</a></li>
                                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>aluno">Cadastrar Alunos</a></li>
                                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>professor">Cadastrar Professores</a></li>
                                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>plano">Cadastrar Planos</a></li>
                                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>exercicio">Cadastrar Exercícios</a></li>
                                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>fichaTreino">Cadastrar Fichas de treino</a></li>
                                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>fichaExercicio">Cadastrar Fichas de exercício</a></li>
                                    <li><a class="text-decoration-none" href="<?= baseUrl() ?>ProdutoServico">Cadastro Produtos/Serviços</a></li>
                                    <div class="divider"><span>ou</span></div>
                                <?php endif; ?>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>Usuario/formTrocarSenha">Trocar senha</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>login/signOut">Sair</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="text-decoration-none">Aluno</a>
                            <ul class="dropdown-menu list-unstyled text-start p-2">
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>aluno/meuPlano">Meu plano</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>aluno/meuAcompanhamento">Meus acompanhamentos</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>aluno/minhaFicha">Minha ficha</a></li>
                                <li><a class="text-decoration-none" href="<?= baseUrl() ?>aluno/meuExercicio">Meus exercícios</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li><a class="text-decoration-none" href="<?= baseUrl() ?>login">Entrar</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Fim do Cabeçalho -->