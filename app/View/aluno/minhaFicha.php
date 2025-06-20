<?php 
    $aMinhaFicha = $dados['aMinhaFicha'];
?>

<div class="hs-item set-bg" data-setbg="<?= baseUrl() ?>assets/img/hero/hero-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="hi-text">
                    <h1><strong></strong></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row align-items-center border-bottom pb-2 mx-2 mt-4 mb-4">
    <div class="col-9">
        <h4 class="fw-semibold text-dark mb-0">Minhas fichas</h4>
    </div>

    <div class="col-3 text-end">
        <button class="btn btn-outline-primary" onclick="goBack()">Voltar</button>
    </div>
</div>
<?php if (count($aMinhaFicha) > 0): ?>
    <div class="d-flex justify-content-around m-5">
        <div class="table-responsive">
    <table id="tbListaFicha" class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Início</th>
                <th>Validade</th>
                <th>Professor</th>
                <th>Anotações</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aMinhaFicha as $ficha): ?>
            <tr>
                <td><?= $ficha['id'] ?></td>
                <td><?= date('d/m/Y', strtotime($ficha['data_inicio'])) ?></td>
                <td><?= date('d/m/Y', strtotime($ficha['validade'])) ?></td>
                <td><?= htmlspecialchars($ficha['professor_nome'] ?? 'Não informado') ?></td>
                <td><?= nl2br(htmlspecialchars(mb_strimwidth($ficha['anotacoes'] ?? '', 0, 30, '...'))) ?></td>
                <td>
                    <a href="<?= baseUrl() ?>Aluno/verFichaDetalhes/<?= $ficha['id'] ?>" class="btn btn-sm btn-outline-primary">Detalhes</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
            </div>
<?php else: ?>
    <div class="alert alert-info text-center mt-4">Nenhuma ficha de treino encontrada para você.</div>
<?php endif; ?>

<?= datatables('tbListaFicha') ?>