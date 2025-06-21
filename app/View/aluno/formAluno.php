<?php
$aPlano = $dados['aPlano'];
$aUsuarios = $dados['aUsuario'];
?>

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

<?= formTitulo("Aluno") ?>

<div class="container my-4">
    <div class="form-container">
        <form method="POST" action="<?= $this->request->formAction() ?>" novalidate>

            <?php if (setValor("id") != "" && setValor("id") != "0"): ?>
                <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">
            <?php endif; ?>

            <div class="row g-3">
                <!-- Nome -->
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        class="form-control <?= setMsgFilderError("nome") ? 'is-invalid' : '' ?>"
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

                <!-- CPF -->
                <div class="col-md-3">
                    <label for="cpf" class="form-label">CPF <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        class="form-control <?= setMsgFilderError("cpf") ? 'is-invalid' : '' ?>"
                        id="cpf"
                        name="cpf"
                        maxlength="11"
                        minlength="11"
                        pattern="\d{11}"
                        placeholder="Somente números"
                        value="<?= setValor("cpf") ?>"
                        required
                        inputmode="numeric"
                    >
                    <?= setMsgFilderError("cpf") ?>
                </div>

                <!-- Telefone -->
                <div class="col-md-3">
                    <label for="telefone" class="form-label">Telefone <span class="text-danger">*</span></label>
                    <input
                        type="tel"
                        class="form-control <?= setMsgFilderError("telefone") ? 'is-invalid' : '' ?>"
                        id="telefone"
                        name="telefone"
                        minlength="8"
                        maxlength="20"
                        placeholder="(XX) XXXXX-XXXX"
                        value="<?= setValor("telefone") ?>"
                        required
                        inputmode="tel"
                    >
                    <?= setMsgFilderError("telefone") ?>
                </div>
            </div>

            <div class="row g-3 mt-1">
                <!-- Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                    <input
                        type="email"
                        class="form-control <?= setMsgFilderError("email") ? 'is-invalid' : '' ?>"
                        id="email"
                        name="email"
                        maxlength="100"
                        value="<?= setValor("email") ?>"
                        required
                    >
                    <?= setMsgFilderError("email") ?>
                </div>

                <!-- Data de Nascimento -->
                <div class="col-md-3">
                    <label for="data_nascimento" class="form-label">Data de Nascimento <span class="text-danger">*</span></label>
                    <input
                        type="date"
                        class="form-control <?= setMsgFilderError("data_nascimento") ? 'is-invalid' : '' ?>"
                        id="data_nascimento"
                        name="data_nascimento"
                        value="<?= setValor("data_nascimento") ?>"
                        required
                    >
                    <?= setMsgFilderError("data_nascimento") ?>
                </div>

                <!-- Plano -->
                <div class="col-md-3">
                    <label for="plano_id" class="form-label">Plano</label>
                    <select
                        class="form-select <?= setMsgFilderError("plano_id") ? 'is-invalid' : '' ?>"
                        name="plano_id"
                        id="plano_id"
                        <?= !empty($aPlano) ? 'required' : "" ?>
                    >
                        <option value="">Selecione</option>
                        <?php foreach ($aPlano as $plano): ?>
                            <option value="<?= $plano['id'] ?>" <?= setValor("plano_id") == $plano['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($plano['nome']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= setMsgFilderError("plano_id") ?>
                </div>
            </div>

            <div class="row g-3 mt-1">
                <!-- Usuário -->
                <div class="col-md-12">
                    <label for="usuario_id" class="form-label">Usuário</label>
                    <select
                        class="form-select <?= setMsgFilderError("usuario_id") ? 'is-invalid' : '' ?>"
                        name="usuario_id"
                        id="usuario_id"
                        <?= !empty($aUsuarios) ? 'required' : "" ?>
                    >
                        <option value="">Selecione</option>
                        <?php foreach ($aUsuarios as $usuario): ?>
                            <option value="<?= $usuario['id'] ?>" <?= setValor("usuario_id") == $usuario['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($usuario['nome'] . " (" . $usuario['email'] . ")") ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= setMsgFilderError("usuario_id") ?>
                </div>
            </div>

            <!-- Endereço -->
            <div class="mb-3 mt-3">
                <label for="endereco" class="form-label">Endereço <span class="text-danger">*</span></label>
                <textarea
                    class="form-control <?= setMsgFilderError("endereco") ? 'is-invalid' : '' ?>"
                    name="endereco"
                    id="endereco"
                    rows="3"
                    minlength="5"
                    required
                ><?= setValor("endereco") ?></textarea>
                <?= setMsgFilderError("endereco") ?>
            </div>

            <div class="mt-4">
                <?= formButton() ?>
            </div>
        </form>
    </div>
</div>
