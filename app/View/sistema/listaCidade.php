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

<?= formTitulo("Lista Cidade", true) ?>

<?php if (count($dados) > 0): ?>

    <div class="m-2">

        <table class="table table-bordered table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">UF</th>
                    <th scope="col">Código IBGE</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $value): ?>
                    <tr>
                        <th scope="row"><?= $value['id'] ?></th>
                        <td><?= $value['nome'] ?></td>
                        <td><?= $value['sigla'] ?></td>
                        <td><?= $value['codIBGE'] ?></td>                    
                        <td>
                            <a href="<?= baseUrl() ?>Cidade/form/view/<?= $value['id'] ?>"
                                class="btn btn-sm btn-outline-primary me-1"
                                title="Visualizar">
                                <i class="bi bi-eye"></i> Visualizar
                            </a>

                            <a href="<?= baseUrl() ?>Cidade/form/update/<?= $value['id'] ?>"
                                class="btn btn-sm btn-outline-warning me-1"
                                title="Alterar">
                                <i class="bi bi-pencil-square"></i> Alterar
                            </a>

                            <a href="<?= baseUrl() ?>Cidade/form/delete/<?= $value['id'] ?>"
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