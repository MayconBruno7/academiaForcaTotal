<?php
$aMeuAcompanhamento = $dados['aMeuAcompanhamento'];

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
        <h4 class="fw-semibold text-dark mb-0">Historico de acompanhamentos</h4>
    </div>

    <div class="col-3 text-end">
        <button class="btn btn-outline-primary" onclick="goBack()">Voltar</button>
    </div>
</div>

<?php if (!empty($aMeuAcompanhamento)): ?>
    <div class="d-flex justify-content-around m-5">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped table-sm" id="tbHistoricoAcompanhamento">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Data</th>
                        <th>Peso (kg)</th>
                        <th>Frequência</th>
                        <th>Medidas</th>
                        <th>Observações</th>
                        <th>Início Ficha</th>
                        <th>Validade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($aMeuAcompanhamento as $acomp): ?>
                        <tr>
                            <td><?= $acomp['id'] ?></td>
                            <td><?= date('d/m/Y', strtotime($acomp['data'])) ?></td>
                            <td><?= $acomp['peso'] ? number_format($acomp['peso'], 2, ',', '.') . ' kg' : '-' ?></td>
                            <td><?= $acomp['frequencia'] ?? '-' ?></td>
                            <td><?= $acomp['medidas'] ? nl2br(htmlspecialchars($acomp['medidas'])) : '-' ?></td>
                            <td><?= $acomp['observacoes'] ? nl2br(htmlspecialchars($acomp['observacoes'])) : '-' ?></td>
                            <td><?= date('d/m/Y', strtotime($acomp['data_inicio'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($acomp['validade'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Nenhum acompanhamento registrado até o momento.
    </div>
<?php endif; ?>

<?= datatables('tbHistoricoAcompanhamento') ?>