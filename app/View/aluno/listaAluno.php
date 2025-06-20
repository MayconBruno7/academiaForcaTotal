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

<?= formTitulo("Lista de Alunos", true) ?>

<?php if (count($dados) > 0): ?>
    <div class="d-flex justify-content-around m-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm" id="tbListaAluno">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Plano</th>
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
                            <td><?= formatarCpf($value['cpf']) ?></td>
                            <td><?= formatarTelefone($value['telefone']) ?></td>
                            <td><?= $value['plano_nome'] ?? 'Sem plano' ?></td>
                            <td><?= isset($value['valor']) ? 'R$ ' . number_format($value['valor'], 2, ',', '.') : '-' ?></td>
                            <td><?= $value['treinos_semanais'] ?? '-' ?></td>
                            <td>
                                <a href="<?= baseUrl() ?>Aluno/form/view/<?= $value['id'] ?>"
                                    class="btn btn-sm btn-outline-primary me-1"
                                    title="Visualizar">
                                    <i class="bi bi-eye"></i> Visualizar
                                </a>

                                <a href="<?= baseUrl() ?>Aluno/form/update/<?= $value['id'] ?>"
                                    class="btn btn-sm btn-outline-warning me-1"
                                    title="Alterar">
                                    <i class="bi bi-pencil-square"></i> Alterar
                                </a>

                                <a href="<?= baseUrl() ?>Aluno/form/delete/<?= $value['id'] ?>"
                                    class="btn btn-sm btn-outline-danger"
                                    title="Excluir"
                                    onclick="return confirm('Tem certeza que deseja excluir este registro?')">
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
        Não foram localizados registros...
    </div>
<?php endif; ?>

<?= datatables('tbListaAluno') ?>