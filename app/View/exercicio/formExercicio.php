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

<?= formTitulo("Exercício") ?>

<div class="m-2">
    <form method="POST" action="<?= $this->request->formAction() ?>">
        <?php if (setValor("id") != "" && setValor("id") != "0"): ?>
            <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome do Exercício</label>
                <input
                    type="text"
                    class="form-control"
                    id="nome"
                    name="nome"
                    minlength="3"
                    maxlength="100"
                    value="<?= setValor("nome") ?>"
                    required
                    autofocus
                >
                <?= setMsgFilderError("nome") ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="grupo_muscular" class="form-label">Grupo Muscular</label>
                <select
                    class="form-select"
                    name="grupo_muscular"
                    id="grupo_muscular"
                    required
                >
                    <option value="">Selecione</option>
                    <option value="Peito" <?= setValor("grupo_muscular") == "Peito" ? 'selected' : '' ?>>Peito</option>
                    <option value="Costas" <?= setValor("grupo_muscular") == "Costas" ? 'selected' : '' ?>>Costas</option>
                    <option value="Pernas" <?= setValor("grupo_muscular") == "Pernas" ? 'selected' : '' ?>>Pernas</option>
                    <option value="Ombros" <?= setValor("grupo_muscular") == "Ombros" ? 'selected' : '' ?>>Ombros</option>
                    <option value="Bíceps" <?= setValor("grupo_muscular") == "Bíceps" ? 'selected' : '' ?>>Bíceps</option>
                    <option value="Tríceps" <?= setValor("grupo_muscular") == "Tríceps" ? 'selected' : '' ?>>Tríceps</option>
                    <option value="Abdômen" <?= setValor("grupo_muscular") == "Abdômen" ? 'selected' : '' ?>>Abdômen</option>
                </select>
                <?= setMsgFilderError("grupo_muscular") ?>
            </div>
        </div>

        <?= formButton() ?>
    </form>
</div>
