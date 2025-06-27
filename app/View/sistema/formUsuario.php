<div class="hs-item set-bg" data-setbg="<?= baseUrl() ?>assets/img/hero/hero-1.jpg">
    <div class="container py-5">
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <div class="hi-text text-white">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= baseUrl(); ?>assets/js/usuario.js"></script>

<?= formTitulo('Usuário') ?>

<form method="POST" action="<?= $this->request->formAction() ?>" novalidate>

    <?php if (setValor("id") != "" && setValor("id") != "0"): ?>
        <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
    <?php endif; ?>

    <div class="container my-4">
        <div class="row g-3">

            <!-- Nome -->
            <div class="col-md-8">
                <label for="nome" class="form-label">Nome <span class="text-danger">*</span></label>
                <input
                    type="text"
                    class="form-control <?= setMsgFilderError('nome') ? 'is-invalid' : '' ?>"
                    id="nome"
                    name="nome"
                    placeholder="Nome do Usuário"
                    maxlength="60"
                    value="<?= setValor('nome') ?>"
                    required
                    autofocus>
                <?= setMsgFilderError('nome') ?>
            </div>

            <!-- Nível -->
            <div class="col-md-4">
                <label for="nivel" class="form-label">Nível <span class="text-danger">*</span></label>
                <select
                    class="form-select <?= setMsgFilderError('nivel') ? 'is-invalid' : '' ?>"
                    name="nivel"
                    id="nivel"
                    required
                    aria-label="Selecione o nível do usuário">
                    <option value="0" <?= (setValor('nivel') == ""   ? 'selected' : "") ?>>...</option>
                    <option value="1" <?= (setValor('nivel') == "1"  ? 'selected' : "") ?>>Super Administrador</option>
                    <option value="11" <?= (setValor('nivel') == "11" ? 'selected' : "") ?>>Administrador</option>
                    <option value="21" <?= (setValor('nivel') == "21" ? 'selected' : "") ?>>Aluno</option>
                </select>
                <?= setMsgFilderError('nivel') ?>
            </div>

            <!-- Email -->
            <div class="col-md-8">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input
                    type="email"
                    class="form-control <?= setMsgFilderError('email') ? 'is-invalid' : '' ?>"
                    id="email"
                    name="email"
                    placeholder="Email do Usuário"
                    maxlength="150"
                    value="<?= setValor('email') ?>"
                    required>
                <?= setMsgFilderError('email') ?>
            </div>

            <!-- Status -->
            <div class="col-md-4">
                <label for="statusRegistro" class="form-label">Status <span class="text-danger">*</span></label>
                <select
                    class="form-select <?= setMsgFilderError('statusRegistro') ? 'is-invalid' : '' ?>"
                    name="statusRegistro"
                    id="statusRegistro"
                    required
                    aria-label="Selecione o status">
                    <option value="0" <?= (setValor('statusRegistro') == ""  ? 'selected' : "") ?>>...</option>
                    <option value="1" <?= (setValor('statusRegistro') == "1" ? 'selected' : "") ?>>Ativo</option>
                    <option value="2" <?= (setValor('statusRegistro') == "2" ? 'selected' : "") ?>>Inativo</option>
                </select>
                <?= setMsgFilderError('statusRegistro') ?>
            </div>

            <?php if (in_array($this->request->getAction(), ['insert', 'update'])): ?>

                <!-- Senha -->
                <div class="col-md-6">
                    <label for="senha" class="form-label">Senha <?= ($this->request->getAction() == "insert" ? '<span class="text-danger">*</span>' : '') ?></label>
                    <input
                        type="password"
                        class="form-control <?= setMsgFilderError('senha') ? 'is-invalid' : '' ?>"
                        id="senha"
                        name="senha"
                        placeholder="Informe uma senha"
                        maxlength="60"
                        onkeyup="checa_segur_senha('senha', 'msgSenha', 'btEnviar');"
                        <?= ($this->request->getAction() == "insert" ? 'required' : '') ?>>
                    <div id="msgSenha" class="form-text mt-2"></div>
                    <?= setMsgFilderError('senha') ?>
                </div>

                <!-- Confirma Senha -->
                <div class="col-md-6">
                    <label for="confSenha" class="form-label">Confirme a Senha <?= ($this->request->getAction() == "insert" ? '<span class="text-danger">*</span>' : '') ?></label>
                    <input
                        type="password"
                        class="form-control <?= setMsgFilderError('confSenha') ? 'is-invalid' : '' ?>"
                        id="confSenha"
                        name="confSenha"
                        placeholder="Digite a senha para conferência"
                        maxlength="60"
                        onkeyup="checa_segur_senha('confSenha', 'msgConfSenha', 'btEnviar');"
                        <?= ($this->request->getAction() == "insert" ? 'required' : '') ?>>
                    <div id="msgConfSenha" class="form-text mt-2"></div>
                    <?= setMsgFilderError('confSenha') ?>
                </div>

            <?php endif; ?>

        </div>

        <div class="mt-4">
            <?= formButton() ?>
        </div>
    </div>

</form>