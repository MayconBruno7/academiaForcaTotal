
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

<div class="card col-lg-4 card-background">
    <div class="card-header">
        <h3 class="mt-1">Esqueceu sua Senha</h3>
    </div>
    <div class="card-body">
        <form action="<?= baseUrl() ?>login/esqueciASenhaEnvio" method="POST">
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="email" class="form-label"><strong>Informe seu Email</strong></label>
                    <input type="text" class="form-control border-dark mt-2" id="email" name="email" placeholder="Informe seu email" value="<?= setValor("email") ?>" required autofocus>
                    <p class="mt-2">Você irá receber um e-mail com um link para recuperar sua senha</p>
                </div>
                <div class="col-12">
                    <?= exibeAlerta() ?>
                </div>                        
                <div class="mt-3 mb-3 col-12 d-flex justify-content-between">
                    <div class="col-sm-6 col-lg-4">
                        <button class="btn btn-primary">Enviar</button>
                    </div>
                    <div class="col-sm-6 col-lg-4 d-flex justify-content-end">
                        <a href="<?= baseUrl() ?>login" class="btn btn-outline-primary">Voltar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

