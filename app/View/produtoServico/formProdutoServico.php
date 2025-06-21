<?php
    $aTipos = ['produto' => 'Produto', 'servico' => 'Serviço'];
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

<?= formTitulo("Produto/Serviço") ?>

<div class="m-2">
    <form method="POST" action="<?= $this->request->formAction() ?>" enctype="multipart/form-data">
        <?php if (setValor("id") != "" && setValor("id") != "0"): ?>
            <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input
                    type="text"
                    class="form-control"
                    id="nome"
                    name="nome"
                    maxlength="100"
                    value="<?= setValor("nome") ?>"
                    required
                    autofocus
                >
                <?= setMsgFilderError("nome") ?>
            </div>

            <div class="col-md-3 mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-select" name="tipo" id="tipo" required>
                    <option value="">Selecione</option>
                    <?php foreach ($aTipos as $key => $label): ?>
                        <option value="<?= $key ?>" <?= setValor("tipo") == $key ? 'selected' : '' ?>>
                            <?= $label ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= setMsgFilderError("tipo") ?>
            </div>

            <div class="col-md-3 mb-3">
                <label for="preco" class="form-label">Preço (R$)</label>
                <input
                    type="number"
                    step="0.01"
                    min="0"
                    class="form-control"
                    id="preco"
                    name="preco"
                    value="<?= setValor("preco") ?>"
                    required
                >
                <?= setMsgFilderError("preco") ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="unidade" class="form-label">Unidade</label>
                <input
                    type="text"
                    class="form-control"
                    id="unidade"
                    name="unidade"
                    maxlength="50"
                    value="<?= setValor("unidade") ?>"
                >
                <?= setMsgFilderError("unidade") ?>
            </div>

            <div class="col-md-4 mb-3">
                <label for="estoque" class="form-label">Estoque</label>
                <input
                    type="number"
                    class="form-control"
                    id="estoque"
                    name="estoque"
                    value="<?= setValor("estoque") ?>"
                    min="0"
                >
                <?= setMsgFilderError("estoque") ?>
            </div>

            <div class="col-md-4 mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    <option value="1" <?= setValor("status") == "1" ? 'selected' : '' ?>>Ativo</option>
                    <option value="0" <?= setValor("status") == "0" ? 'selected' : '' ?>>Inativo</option>
                </select>
                <?= setMsgFilderError("status") ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea
                class="form-control"
                name="descricao"
                id="descricao"
                rows="3"
            ><?= setValor("descricao") ?></textarea>
            <?= setMsgFilderError("descricao") ?>
        </div>

        <div class="row">
            <?php if (in_array($this->request->getAction(), ['insert', 'update'])): ?>
                <div class="mb-3 col-12">
                    <label for="imagem" class="form-label">Imagem do Produto/Serviço</label>
                    <input
                        type="file"
                        class="form-control"
                        id="imagem"
                        name="imagem"
                        value="<?= setValor('imagem') ?>"
                    >
                    <?= setMsgFilderError('imagem') ?>
                </div>
            <?php endif; ?>

            <?php if (trim(setValor("imagem")) != ""): ?>
                <div class="mb-3 col-12">
                    <h5>Imagem Atual</h5>
                    <img
                        src="<?= baseUrl() . 'imagem.php?file=produtoServico/' . setValor("imagem") ?>"
                        class="img-thumbnail"
                        height="120"
                        width="240"
                        alt="Imagem"
                    >
                    <input type="hidden" name="nomeImagem" id="nomeImagem" value="<?= setValor("imagem") ?>">
                </div>
            <?php endif; ?>
        </div>

        <?= formButton() ?>
    </form>
</div>
