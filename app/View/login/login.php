
<style>
.hs-item {
    width: 100%;
    height: 25vh; /* Ocupa toda a altura da viewport */
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center; /* Centraliza verticalmente */
}

</style>
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

<div class="card col-lg-4 card-background container mb-5" style="margin-top: 10%;">
    <div class="card-header">
        <h3>Login</h3>
    </div>
    <div class="card-body">
        <form action="Login/signIn" method="POST">
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control border-dark" id="email" name="email" placeholder="Informe seu e-mail" value="<?= setValor("email") ?>" required autofocus>
                </div>
                <div class="mb-3 col-12">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control border-dark" id="senha" name="senha" required>
                </div>
                <div class="col-12 d-flex justify-content-between mt-3 mb-2">
                    <h6><a href="<?= baseUrl() ?>Login/esqueciASenha" class="text-decoration-none">Esqueci minha senha!</a></h6>
                    <!--
                    <h6><a href="/Login/cadastrarLogin" class="link-secondary fw-bold">Quero criar uma conta</a></h6>
                    -->
                </div>
                <div class="col-12 mb-3">
                    <?= exibeAlerta() ?>
                </div>
                <div class="mb-3 col-12 d-flex justify-content-between">
                    <div class="col-sm-6 col-lg-4">
                        <button class="btn btn-primary">Entrar</button>
                    </div>
                    <div class="col-sm-6 col-lg-4 d-flex justify-content-end">
                        <a href="<?= baseUrl() ?>" class="btn btn-outline-primary">Voltar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>