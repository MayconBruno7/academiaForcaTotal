<!-- Seção Hero (mantida como está) -->
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

<!-- Centralização do card -->
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card col-lg-4 card-background">
        <div class="card-header text-center">
            <h3>Cadastro</h3>
        </div>
        <div class="card-body">
            <form action="<?= baseUrl() ?>Login/cadastrarLogin" method="post">
                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control border-dark" id="nome" name="nome" placeholder="Escreva seu Nome">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control border-dark" id="email" name="email" placeholder="Escreva seu email de registro">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control border-dark" id="senha" name="senha">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="confirm-senha" class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-control border-dark" id="confirm-senha" name="confirm-register-password">
                    </div>
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <h6><a href="<?= baseUrl() ?>login" class="text-decoration-none fw-bold">Já tem uma Conta?</a></h6>
                        <button class="btn btn-OrangeBlack">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
