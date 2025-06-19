<style>
    .hs-item {
        width: 100%;
        height: 25vh;
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
    }
</style>

<?php

    use Core\Library\Session;

    $aAluno = $dados['aAluno'];

    $professorId = Session::get('userId'); // pega o ID da sessão
    $professorNome = Session::get('userNome'); // se tiver o nome na sessão
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

<?= formTitulo("Ficha de Treino") ?>

<div class="m-2">
    <form method="POST" action="<?= $this->request->formAction() ?>">
        <?php if (setValor("id") != "" && setValor("id") != "0"): ?>
            <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="aluno_id" class="form-label">Aluno</label>
                <select class="form-select" name="aluno_id" id="aluno_id" required>
                    <option value="">Selecione</option>
                    <?php foreach ($aAluno as $aluno): ?>
                        <option value="<?= $aluno['id'] ?>" <?= setValor("aluno_id") == $aluno['id'] ? 'selected' : '' ?>>
                            <?= $aluno['nome'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= setMsgFilderError("aluno_id") ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="professor_id" class="form-label">Professor Responsável</label>
                <select class="form-select" name="professor_id" id="professor_id" required>
                    <option value="<?= $professorId ?>" selected><?= $professorNome ?: 'Professor atual' ?></option>
                </select>
                <?= setMsgFilderError("professor_id") ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="data_inicio" class="form-label">Data de Início</label>
                <input type="date"
                    class="form-control"
                    id="data_inicio"
                    name="data_inicio"
                    value="<?= setValor("data_inicio") ?>"
                    required>
                <?= setMsgFilderError("data_inicio") ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="validade" class="form-label">Validade</label>
                <input type="date"
                    class="form-control"
                    id="validade"
                    name="validade"
                    value="<?= setValor("validade") ?>"
                    required>
                <?= setMsgFilderError("validade") ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="anotacoes" class="form-label">Anotações</label>
            <textarea class="form-control"
                name="anotacoes"
                id="anotacoes"
                rows="3"><?= setValor("anotacoes") ?></textarea>
            <?= setMsgFilderError("anotacoes") ?>
        </div>

        <?= formButton() ?>
    </form>
</div>