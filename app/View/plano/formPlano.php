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

<?= formTitulo("Plano") ?>

<div class="m-2">
    <form method="POST" action="<?= $this->request->formAction() ?>">
                <?php if (setValor("id") != "" && setValor("id") != "0"): ?>
            <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome do Plano</label>
                <input type="text" 
                    class="form-control" 
                    id="nome" 
                    name="nome" 
                    placeholder="Mensal, Trimestral, Anual"
                    maxlength="50"
                    value="<?= setValor("nome") ?>"
                    required
                    autofocus>
                <?= setMsgFilderError("nome") ?>
            </div>

            <div class="col-md-3 mb-3">
                <label for="valor" class="form-label">Valor (R$)</label>
                <input type="text" 
                    class="form-control" 
                    id="valor" 
                    name="valor" 
                    placeholder="Ex: 129.90"
                    value="<?= setValor("valor") ?>"
                    required>
                <?= setMsgFilderError("valor") ?>
            </div>

            <div class="col-md-3 mb-3">
                <label for="treinos_semanais" class="form-label">Treinos Semanais</label>
                <input type="number" 
                    class="form-control" 
                    id="treinos_semanais" 
                    name="treinos_semanais" 
                    placeholder="Ex: 3"
                    value="<?= setValor("treinos_semanais") ?>"
                    min="1"
                    max="7"
                    required>
                <?= setMsgFilderError("treinos_semanais") ?>
            </div>
        </div>

        <?= formButton() ?>
    </form>
</div>
