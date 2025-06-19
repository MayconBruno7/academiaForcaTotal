<style>
.hs-item {
    width: 100%;
    height: 25vh; /* Ocupa 25% da altura da viewport */
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center; /* Centraliza verticalmente */
}
</style>

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

<?= formTitulo("Lista de Planos", true) ?>

<?php if (count($dados) > 0): ?>
    <div class="m-2">
        <table class="table table-bordered table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor (R$)</th>
                    <th scope="col">Treinos Semanais</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $value): ?>
                    <tr>
                        <th scope="row"><?= $value['id'] ?></th>
                        <td><?= $value['nome'] ?></td>
                        <td><?= number_format($value['valor'], 2, ',', '.') ?></td>
                        <td><?= $value['treinos_semanais'] ?></td>
                        <td>
                            <a href="<?= baseUrl() ?>Plano/form/view/<?= $value['id'] ?>" title="Visualizar">Visualizar</a>
                            <a href="<?= baseUrl() ?>Plano/form/update/<?= $value['id'] ?>" title="Alterar">Alterar</a>
                            <a href="<?= baseUrl() ?>Plano/form/delete/<?= $value['id'] ?>" title="Excluir">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Não foram localizados registros...
    </div>
<?php endif; ?>
