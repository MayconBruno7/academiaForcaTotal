<?php
$meuPlano = $dados['aMeuPlano'];

?>

<div class="hs-item set-bg" data-setbg="<?= baseUrl() ?>assets/img/hero/hero-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="hi-text">
                    <h1><strong></strong></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row align-items-center border-bottom pb-2 mx-2 mt-4 mb-4">
    <div class="col-9">
        <h4 class="fw-semibold text-dark mb-0">Informações do meu plano</h4>
    </div>

    <div class="col-3 text-end">
        <button class="btn btn-outline-primary" onclick="goBack()">Voltar</button>
    </div>
</div>

<div class="container mt-4 mb-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Olá, <?= $meuPlano['nome'] ?>!</h5>
        </div>
        <div class="card-body">
            <?php if ($meuPlano['plano_nome']): ?>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Plano:</strong> <?= $meuPlano['plano_nome'] ?>
                    </div>
                    <div class="col-md-3">
                        <strong>Valor:</strong> R$ <?= number_format($meuPlano['valor'], 2, ',', '.') ?>
                    </div>
                    <div class="col-md-3">
                        <strong>Treinos por semana:</strong> <?= $meuPlano['treinos_semanais'] ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-warning">
                    Você ainda não possui um plano vinculado.
                </div>
            <?php endif; ?>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <strong>CPF:</strong> <?= formatarCpf($meuPlano['cpf']) ?>
                </div>
                <div class="col-md-6">
                    <strong>Email:</strong> <?= $meuPlano['email'] ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <strong>Telefone:</strong> <?= formatarTelefone($meuPlano['telefone']) ?>
                </div>
                <div class="col-md-6">
                    <strong>Data de nascimento:</strong> <?= date('d/m/Y', strtotime($meuPlano['data_nascimento'])) ?>
                </div>
            </div>

            <div class="mt-3">
                <strong>Endereço:</strong> <?= $meuPlano['endereco'] ?>
            </div>
        </div>
        <div class="text-center mt-4 mb-4">
            <button onclick="enviarWhatsapp('Olá,  gostaria de trocar de plano.')" class="btn btn-success btn-lg">
                <i class="bi bi-whatsapp"></i> Trocar de plano
            </button>
        </div>
    </div>
</div>