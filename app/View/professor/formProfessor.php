<?php

$aUsuarios = $dados['aUsuario'];

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

<?= formTitulo("Professor") ?>

<div class="m-2">
    <form method="POST" action="<?= $this->request->formAction() ?>" enctype="multipart/form-data">
        <?php if (setValor("id") != "" && setValor("id") != "0"): ?>
            <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text"
                    class="form-control"
                    id="nome"
                    name="nome"
                    maxlength="100"
                    value="<?= setValor("nome") ?>"
                    required
                    autofocus>
                <?= setMsgFilderError("nome") ?>
            </div>

            <div class="col-md-3 mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text"
                    class="form-control"
                    id="cpf"
                    name="cpf"
                    maxlength="11"
                    placeholder="Somente números"
                    value="<?= setValor("cpf") ?>"
                    required>
                <?= setMsgFilderError("cpf") ?>
            </div>

            <div class="col-md-3 mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text"
                    class="form-control"
                    id="telefone"
                    name="telefone"
                    placeholder="(XX) XXXXX-XXXX"
                    value="<?= setValor("telefone") ?>">
                <?= setMsgFilderError("telefone") ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    value="<?= setValor("email") ?>">
                <?= setMsgFilderError("email") ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="usuario_id" class="form-label">Usuário</label>
                <select class="form-select" name="usuario_id" id="usuario_id" required>
                    <option value="">Selecione</option>
                    <?php foreach ($aUsuarios as $usuario): ?>
                        <option value="<?= $usuario['id'] ?>" <?= setValor("usuario_id") == $usuario['id'] ? 'selected' : '' ?>>
                            <?= $usuario['nome'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= setMsgFilderError("usuario_id") ?>
            </div>

            <div class="col-md-3 mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date"
                    class="form-control"
                    id="data_nascimento"
                    name="data_nascimento"
                    value="<?= setValor("data_nascimento") ?>">
                <?= setMsgFilderError("data_nascimento") ?>
            </div>

            <div class="col-md-3 mb-3">
                <label for="especialidade" class="form-label">Especialidade</label>
                <select class="form-select" name="especialidade" id="especialidade" required>
                    <option value="">Selecione</option>
                    <option value="Musculação" <?= setValor("especialidade") == "Musculação" ? 'selected' : '' ?>>Musculação</option>
                    <option value="Pilates" <?= setValor("especialidade") == "Pilates" ? 'selected' : '' ?>>Pilates</option>
                    <option value="Yoga" <?= setValor("especialidade") == "Yoga" ? 'selected' : '' ?>>Yoga</option>
                    <option value="Crossfit" <?= setValor("especialidade") == "Crossfit" ? 'selected' : '' ?>>Crossfit</option>
                    <option value="Natação" <?= setValor("especialidade") == "Natação" ? 'selected' : '' ?>>Natação</option>
                </select>
                <?= setMsgFilderError("especialidade") ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <textarea class="form-control"
                name="endereco"
                id="endereco"
                rows="2"><?= setValor("endereco") ?></textarea>
            <?= setMsgFilderError("endereco") ?>
        </div>

        <div class="row">
            <?php if (in_array($this->request->getAction(), ['insert', 'update'])): ?>
                <div class="mb-3 col-12">
                    <label for="imagem" class="form-label">Foto do professor</label>
                    <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Anexar a Foto do professor" maxlength="100" value="<?= setValor('imagem') ?>">
                    <?= setMsgFilderError('imagem') ?>
                </div>
            <?php endif; ?>

            <?php if (trim(setValor("imagem")) != ""): ?>
                <div class="mb-3 col-12">

                    <h5>Imagem</h5>
                    <img src="<?= baseUrl() . 'imagem.php?file=professor/' . setValor("imagem") ?>" class="img-thumbnail" height="120" width="240" alt="Imagem">
                    <input type="hidden" name="nomeImagem" id="nomeImagem" value="<?= setValor("imagem") ?>">
                </div>
            <?php endif; ?>
        </div>

        <?= formButton() ?>
    </form>
</div>