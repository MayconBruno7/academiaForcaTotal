<?php
    $aFichas = $dados['aFichaTreino'] ?? [];
?>

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

<?= formTitulo("Acompanhamento") ?>

<div class="m-2">
    <div class="form-container">
        <form method="POST" action="<?= $this->request->formAction() ?>">
            <?php if (setValor("id") != "" && setValor("id") != "0"): ?>
                <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
            <?php endif; ?>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="ficha_id" class="form-label">Ficha de Treino</label>
                    <select class="form-select" name="ficha_id" id="ficha_id" <?= !empty($aFichas) ? 'required' : "" ?>>
                        <option value="">Selecione</option>
                        <?php foreach ($aFichas as $ficha): ?>
                            <option value="<?= $ficha['id'] ?>" <?= setValor("ficha_id") == $ficha['id'] ? 'selected' : '' ?>>
                                <?= 'Aluno: ' . $ficha['nome_aluno'] . ' - Início: ' . date('d/m/Y', strtotime($ficha['data_inicio'])) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= setMsgFilderError("ficha_id") ?>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="data" class="form-label">Data do Acompanhamento</label>
                    <input type="date" class="form-control" id="data" name="data" value="<?= setValor("data") ?>" required>
                    <?= setMsgFilderError("data") ?>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="peso" class="form-label">Peso (kg)</label>
                    <input type="number" step="0.01" class="form-control" id="peso" name="peso" value="<?= setValor("peso") ?>" required>
                    <?= setMsgFilderError("peso") ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="medidas" class="form-label">Medidas (ex: Peito: 100cm, Braço: 35cm...)</label>
                <textarea class="form-control" id="medidas" name="medidas" rows="2" required><?= setValor("medidas") ?></textarea>
                <?= setMsgFilderError("medidas") ?>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="frequencia" class="form-label">Frequência (dias/semana)</label>
                    <input type="number" class="form-control" id="frequencia" name="frequencia" value="<?= setValor("frequencia") ?>" required>
                    <?= setMsgFilderError("frequencia") ?>
                </div>

                <div class="col-md-9 mb-3">
                    <label for="observacoes" class="form-label">Observações</label>
                    <textarea class="form-control" id="observacoes" name="observacoes" rows="2" required><?= setValor("observacoes") ?></textarea>
                    <?= setMsgFilderError("observacoes") ?>
                </div>
            </div>

            <?= formButton() ?>
        </form>
    </div>
</div>
