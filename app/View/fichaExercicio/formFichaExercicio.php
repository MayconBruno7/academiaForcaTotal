<?php
    $aFicha = $dados['aFichaTreino'];
    $aExercicio = $dados['aExercicio'];
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

<?= formTitulo("Exercício da Ficha") ?>

<div class="m-2">
    <form method="POST" action="<?= $this->request->formAction() ?>">
        <?php if (setValor("id") != "" && setValor("id") != "0"): ?>
            <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="ficha_id" class="form-label">Ficha de Treino</label>
                <select class="form-select" name="ficha_id" id="ficha_id" required>
                    <option value="">Selecione</option>
                    <?php foreach ($aFicha as $ficha): ?>
                        <option value="<?= $ficha['id'] ?>" <?= setValor("ficha_id") == $ficha['id'] ? 'selected' : '' ?>>
                            Ficha #<?= $ficha['id'] ?> - <?= $ficha['aluno_nome'] ?? 'Aluno' ?> (<?= date('d/m/Y', strtotime($ficha['data_inicio'])) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= setMsgFilderError("ficha_id") ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="exercicio_id" class="form-label">Exercício</label>
                <select class="form-select" name="exercicio_id" id="exercicio_id" required>
                    <option value="">Selecione</option>
                    <?php foreach ($aExercicio as $ex): ?>
                        <option value="<?= $ex['id'] ?>" <?= setValor("exercicio_id") == $ex['id'] ? 'selected' : '' ?>>
                            <?= $ex['nome'] ?> (<?= $ex['grupo_muscular'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= setMsgFilderError("exercicio_id") ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="series" class="form-label">Séries</label>
                <input type="number"
                    class="form-control"
                    id="series"
                    name="series"
                    value="<?= setValor("series") ?>"
                    min="1"
                    max="10"
                    required>
                <?= setMsgFilderError("series") ?>
            </div>

            <div class="col-md-4 mb-3">
                <label for="repeticoes" class="form-label">Repetições</label>
                <input type="number"
                    class="form-control"
                    id="repeticoes"
                    name="repeticoes"
                    value="<?= setValor("repeticoes") ?>"
                    min="1"
                    max="50"
                    required>
                <?= setMsgFilderError("repeticoes") ?>
            </div>

            <div class="col-md-4 mb-3">
                <label for="carga" class="form-label">Carga (kg)</label>
                <input type="number"
                    step="0.5"
                    class="form-control"
                    id="carga"
                    name="carga"
                    value="<?= setValor("carga") ?>"
                    min="0"
                    required>
                <?= setMsgFilderError("carga") ?>
            </div>
        </div>

        <?= formButton() ?>
    </form>
</div>
