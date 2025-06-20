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

    <title>Academia | Força Total</title>

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
        <!-- <div class="canvas-search search-switch">
            <i class="fa fa-search"></i>
        </div> -->
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li class="active"><a href="<?= baseUrl() ?>">Início</a></li>
                <!-- <li><a href="#">Quem Somos</a></li>
                            <li><a href="#">Aulas</a></li>
                            <li><a href="#">Serviços</a></li> -->
                <li><a href="<?= baseUrl() ?>#equipe">Nossa Equipe</a></li>
                <li><a href="<?= baseUrl() ?>home/sobre">Sobre</a></li>
                <li><a href="<?= baseUrl() ?>home/contato">Contato</a></li>
                <?php if (Session::get("userId")): ?>
                    <li><a href="<?= baseUrl() ?>sistema"><?= Session::get('userNome') ?></a>
                        <ul class="dropdown">
                            <?php if ((int)Session::get("userNivel") <= 20): ?>
                                <li><a href="<?= baseUrl() ?>usuario">Usuário</a></li>
                                <li><a href="<?= baseUrl() ?>acompanhamento">Adicionar acompanhamento</a></li>
                                <li><a href="<?= baseUrl() ?>aluno">Cadastrar Alunos</a></li>
                                <li><a href="<?= baseUrl() ?>professor">Cadastrar Professores</a></li>
                                <li><a href="<?= baseUrl() ?>plano">Cadastrar Planos</a></li>
                                <li><a href="<?= baseUrl() ?>exercicio">Cadastrar Exercicios</a></li>
                                <li><a href="<?= baseUrl() ?>fichaTreino">Cadastrar Fichas de treino</a></li>
                                <li><a href="<?= baseUrl() ?>fichaExercicio">Cadastrar Fichas de exercicio</a></li>

                                <li><a href="<?= baseUrl() ?>uf">UF</a></li>
                                <li><a href="<?= baseUrl() ?>cidade">Cidade</a></li>
                                <div class="divider">
                                    <span>ou</span>
                                </div>
                            <?php endif; ?>

                            <li><a href="<?= baseUrl() ?>aluno/meuPlano">Meu plano</a></li>
                            <li><a href="<?= baseUrl() ?>aluno/meuAcompanhamento">Meus acompanhamentos</a></li>
                            <li><a href="<?= baseUrl() ?>aluno/minhaFicha">Minha ficha</a></li>
                            <li><a href="<?= baseUrl() ?>aluno/meuExercicio">Meus exercicios</a></li>
                            <li><a href="<?= baseUrl() ?>Usuario/formTrocarSenha">Trocar senha</a></li>
                            <li><a href="<?= baseUrl() ?>login/signOut">Sair</a></li>
                        </ul>
                    </li>
                <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= baseUrl() ?>Login">Entrar</a>
                    </li>

                <?php endif; ?>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Fim do Menu Offcanvas -->

    <!-- Início do Cabeçalho -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <!-- <div class="logo">
                        <a href="<?= baseUrl() ?>">
                            <img src="<?= baseUrl() ?>assets/img/logo.png" alt="Logo da Academia">
                        </a>
                    </div> -->
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li class="active"><a href="<?= baseUrl() ?>">Início</a></li>
                            <!-- <li><a href="#">Quem Somos</a></li>
                            <li><a href="#">Aulas</a></li>
                            <li><a href="#">Serviços</a></li> -->
                            <li><a href="<?= baseUrl() ?>#equipe">Nossa Equipe</a></li>
                            <li><a href="<?= baseUrl() ?>home/sobre">Sobre</a></li>
                            <li><a href="<?= baseUrl() ?>home/contato">Contato</a></li>
                            <?php if (Session::get("userId")): ?>
                                <li><a href="<?= baseUrl() ?>sistema"><?= Session::get('userNome') ?></a>
                                    <ul class="dropdown">
                                        <?php if ((int)Session::get("userNivel") <= 20): ?>
                                            <li><a href="<?= baseUrl() ?>usuario">Usuário</a></li>
                                            <li><a href="<?= baseUrl() ?>acompanhamento">Adicionar acompanhamento</a></li>
                                            <li><a href="<?= baseUrl() ?>aluno">Cadastrar Alunos</a></li>
                                            <li><a href="<?= baseUrl() ?>professor">Cadastrar Professores</a></li>
                                            <li><a href="<?= baseUrl() ?>plano">Cadastrar Planos</a></li>
                                            <li><a href="<?= baseUrl() ?>exercicio">Cadastrar Exercicios</a></li>
                                            <li><a href="<?= baseUrl() ?>fichaTreino">Cadastrar Fichas de treino</a></li>
                                            <li><a href="<?= baseUrl() ?>fichaExercicio">Cadastrar Fichas de exercicio</a></li>

                                            <li><a href="<?= baseUrl() ?>uf">UF</a></li>
                                            <li><a href="<?= baseUrl() ?>cidade">Cidade</a></li>
                                            <div class="divider">
                                                <span>ou</span>
                                            </div>
                                        <?php endif; ?>

                                        <li><a href="<?= baseUrl() ?>aluno/meuPlano">Meu plano</a></li>
                                        <li><a href="<?= baseUrl() ?>aluno/meuAcompanhamento">Meus acompanhamentos</a></li>
                                        <li><a href="<?= baseUrl() ?>aluno/minhaFicha">Minha ficha</a></li>
                                        <li><a href="<?= baseUrl() ?>aluno/meuExercicio">Meus exercicios</a></li>
                                        <li><a href="<?= baseUrl() ?>Usuario/formTrocarSenha">Trocar senha</a></li>
                                        <li><a href="<?= baseUrl() ?>login/signOut">Sair</a></li>
                                    </ul>
                                </li>
                            <?php else: ?>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?= baseUrl() ?>Login">Entrar</a>
                                </li>

                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <!-- <div class="to-search search-switch">
                            <i class="fa fa-search"></i>
                        </div> -->
                        <div class="to-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Fim do Cabeçalho -->