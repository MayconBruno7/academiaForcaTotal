<div class="hs-item set-bg" data-setbg="<?= baseUrl() ?>assets/img/hero/hero-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="hi-text">

                </div>
            </div>
        </div>
    </div>
</div>

<?= formTitulo("Lista de Acompanhamentos", true) ?>

<?php if (count($dados) > 0): ?>
    <div class="d-flex justify-content-around m-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm" id="tbListaAcompanhamento">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Peso (kg)</th>
                        <th>Frequência</th>
                        <th>Aluno</th>
                        <th>Professor</th>
                        <th>Observações</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $value): ?>
                        <tr>
                            <th scope="row"><?= $value['id'] ?></th>
                            <td><?= date('d/m/Y', strtotime($value['data'])) ?></td>
                            <td><?= isset($value['peso']) ? number_format($value['peso'], 2, ',', '.') : '-' ?></td>
                            <td><?= $value['frequencia'] ?? '-' ?></td>
                            <td><?= $value['nome_aluno'] ?? 'Não informado' ?></td>
                            <td><?= $value['nome_professor'] ?? 'Não informado' ?></td>
                            <td><?= $value['observacoes'] ?? '-' ?></td>
                            <td>
                                <a href="<?= baseUrl() ?>Acompanhamento/form/view/<?= $value['id'] ?>"
                                    class="btn btn-sm btn-outline-primary me-1" title="Visualizar">
                                    <i class="bi bi-eye"></i> Visualizar
                                </a>

                                <a href="<?= baseUrl() ?>Acompanhamento/form/update/<?= $value['id'] ?>"
                                    class="btn btn-sm btn-outline-warning me-1" title="Alterar">
                                    <i class="bi bi-pencil-square"></i> Alterar
                                </a>

                                <a href="<?= baseUrl() ?>Acompanhamento/form/delete/<?= $value['id'] ?>"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir este acompanhamento?')"
                                    title="Excluir">
                                    <i class="bi bi-trash"></i> Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Não foram localizados acompanhamentos...
    </div>
<?php endif; ?>
<?= datatables('tbListaAcompanhamento') ?>