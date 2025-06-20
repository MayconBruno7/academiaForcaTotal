<?php
$aMeuExercicio = $dados['aMeuExercicio'];
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
        <h4 class="fw-semibold text-dark mb-0">Meus exercicios</h4>
    </div>

    <div class="col-3 text-end">
        <button class="btn btn-outline-primary" onclick="goBack()">Voltar</button>
    </div>
</div>

<?php if (!empty($aMeuExercicio)): ?>
    <div class="d-flex justify-content-around m-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm table-responsive">
                <thead>
                    <tr>
                        <th>Exercício</th>
                        <th>Série</th>
                        <th>Repetições</th>
                        <th>Carga</th>
                        <th>Validade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($aMeuExercicio as $ex): ?>
                        <tr>
                            <td><?= htmlspecialchars($ex['nome']) ?></td>
                            <td><?= htmlspecialchars($ex['series']) ?></td>
                            <td><?= htmlspecialchars($ex['repeticoes']) ?></td>
                            <td><?= $ex['carga'] ? number_format($ex['carga'], 2, ',', '.') . ' kg' : '-' ?></td>
                            <td><?= formatarData($ex['validade']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Nenhum exercício cadastrado para a sua ficha de treino.
    </div>
<?php endif; ?>