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

<?= formTitulo("Lista de Exercícios da Ficha", true) ?>

<?php if (count($dados) > 0): ?>
    <div class="m-2">
        <table class="table table-bordered table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Ficha ID</th>
                    <th scope="col">Aluno</th>
                    <th scope="col">Exercício</th>
                    <th scope="col">Grupo Muscular</th>
                    <th scope="col">Séries</th>
                    <th scope="col">Repetições</th>
                    <th scope="col">Carga (kg)</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $value): ?>
                    <tr>
                        <th scope="row"><?= $value['id'] ?></th>
                        <td><?= $value['ficha_id'] ?></td>
                        <td><?= $value['aluno_nome'] ?? '-' ?></td>
                        <td><?= $value['exercicio_nome'] ?></td>
                        <td><?= $value['grupo_muscular'] ?></td>
                        <td><?= $value['series'] ?? '-' ?></td>
                        <td><?= $value['repeticoes'] ?? '-' ?></td>
                        <td><?= $value['carga'] ?? '-' ?></td>
                         <td>
                            <a href="<?= baseUrl() ?>FichaExercicio/form/view/<?= $value['id'] ?>"
                                class="btn btn-sm btn-outline-primary me-1"
                                title="Visualizar">
                                <i class="bi bi-eye"></i> Visualizar
                            </a>

                            <a href="<?= baseUrl() ?>FichaExercicio/form/update/<?= $value['id'] ?>"
                                class="btn btn-sm btn-outline-warning me-1"
                                title="Alterar">
                                <i class="bi bi-pencil-square"></i> Alterar
                            </a>

                            <a href="<?= baseUrl() ?>FichaExercicio/form/delete/<?= $value['id'] ?>"
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
<?php else: ?>
    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Não foram localizados registros...
    </div>
<?php endif; ?>
