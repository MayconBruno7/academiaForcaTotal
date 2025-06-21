<?php

$aPlano = $dados['aPlano'];
$aProfessor = $dados['aProfessor'];
$aProdutoServico = $dados['aProdutoServico'];

?>

<section class="hero-section">
    <div class="hs-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="<?= baseUrl() ?>assets/img/hero/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="hi-text">
                            <span>Molde seu corpo</span>
                            <h1>Seja <strong>forte</strong> treinando duro</h1>
                            <button onclick="enviarWhatsapp('Olá,  gostaria de saber mais sobre o funcionamento da academia.')" class="primary-btn">Saiba mais</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hs-item set-bg" data-setbg="<?= baseUrl() ?>assets/img/hero/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="hi-text">
                            <span>Molde seu corpo</span>
                            <h1>Seja <strong>forte</strong> treinando duro</h1>
                            <button onclick="enviarWhatsapp('Olá,  gostaria de saber mais sobre o funcionamento da academia.')" class="primary-btn">Saiba mais</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="classes-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Nossas Aulas</span>
                    <h2>O QUE NÓS OFERECEMOS</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ($aProdutoServico as $value) : ?>
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="<?= baseUrl() . 'imagem.php?file=produtoServico/' . $value['imagem'] ?>" alt="">
                    </div>
                    <div class="ci-text">
                        <span><?= $value['nome'] ?></span>
                        <!-- <h5><?= $value['decricao'] ?></h5> -->
                        <!-- <a href="#"><i class="fa fa-angle-right"></i></a> -->
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="banner-section set-bg" data-setbg="<?= baseUrl() ?>assets/img/banner-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="bs-text">
                    <h2>Cadastre-se agora para aproveitar mais ofertas</h2>
                    <div class="bt-tips">Onde saúde, beleza e condicionamento físico se encontram.</div>
                    <a href="<?= baseUrl() ?>login/formCadastrarLogin" class="primary-btn btn-normal">Criar conta</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pricing-section spad" id="planos">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Nosso Plano</span>
                    <h2>Escolha seu plano de preços</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($aPlano as $value) : ?>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>Plano <?= $value['nome'] ?></h3>
                        <div class="pi-price">
                            <h2><?= formatarValor($value['valor']) ?></h2>
                        </div>
                        <ul>
                            <li><?= $value['treinos_semanais'] ?> Treinos semanais</li>
                            <li>Equipamentos ilimitados</li>
                            <li>Acompanhamento com professor</li>
                            <li>Sem restrição de horário</li>
                        </ul>
                        <?php
                        $mensagem = "Olá, gostaria de me inscrever no plano {$value['nome']} de valor R$ " . number_format($value['valor'], 2, ',', '.') . " com {$value['treinos_semanais']} treinos semanais!";
                        ?>

                        <button onclick="enviarWhatsapp('<?= addslashes($mensagem) ?>')" class="primary-btn pricing-btn">
                            Inscreva-se agora
                        </button>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

    </div>
</section>

<section class="team-section spad" id="equipe">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="team-title">
                    <div class="section-title">
                        <span>Nossa Equipe</span>
                        <h2>TREINE COM ESPECIALISTAS</h2>
                    </div>
                    <button onclick="enviarWhatsapp('Gostaria de agendar uma aula!')" class="primary-btn btn-normal appoinment-btn"> Agende sua aula</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ts-slider owl-carousel">
                <?php foreach ($aProfessor as $value) : ?>
                    <div class="ts-item set-bg"
                        data-setbg="<?= baseUrl() . 'imagem.php?file=professor/' . $value['imagem'] ?>"
                        style="margin: 0 10px; width: 320px;">
                        <div class="ts_text">
                            <h4><?= $value['nome'] ?></h4>
                            <span><?= $value['especialidade'] ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>