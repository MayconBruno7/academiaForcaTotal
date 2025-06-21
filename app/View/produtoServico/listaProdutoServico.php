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

<?= formTitulo("Lista de Produtos e Serviços", true) ?>

<?php if (count($dados) > 0): ?>
    <div class="d-flex justify-content-around m-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm" id="tbListaProdutoServico">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Unidade</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $item): ?>
                        <tr>
                            <th scope="row"><?= $item['id'] ?></th>
                            <td><?= $item['nome'] ?></td>
                            <td><?= ucfirst($item['tipo']) ?></td>
                            <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                            <td><?= $item['unidade'] ?></td>
                            <td><?= $item['estoque'] ?? '-' ?></td>
                            <td><?= $item['status'] == 1 ? 'Ativo' : 'Inativo' ?></td>
                            <td>
                                <a href="<?= baseUrl() ?>ProdutoServico/form/view/<?= $item['id'] ?>"
                                    class="btn btn-sm btn-outline-primary me-1"
                                    title="Visualizar">
                                    <i class="bi bi-eye"></i> Visualizar
                                </a>

                                <a href="<?= baseUrl() ?>ProdutoServico/form/update/<?= $item['id'] ?>"
                                    class="btn btn-sm btn-outline-warning me-1"
                                    title="Alterar">
                                    <i class="bi bi-pencil-square"></i> Alterar
                                </a>

                                <a href="<?= baseUrl() ?>ProdutoServico/form/delete/<?= $item['id'] ?>"
                                    class="btn btn-sm btn-outline-danger"
                                    title="Excluir"
                                    onclick="return confirm('Tem certeza que deseja excluir este item?')">
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

<?= datatables('tbListaProdutoServico') ?>
