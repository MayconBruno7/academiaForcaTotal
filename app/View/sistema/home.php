<style>
    /* Banner de topo */
    .hs-item {
        width: 100%;
        height: 25vh;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.6);
        font-size: 2rem;
        font-weight: bold;
    }

    /* Área de cards */
    .admin-section {
        background-color: #f4f6f9;
        padding: 3rem 1rem;
        min-height: 75vh;
    }

    .admin-card {
        background-color: white;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        transition: 0.3s;
        height: 100%;
    }

    .admin-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    }

    .admin-card i {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #007bff;
    }

    .admin-card a {
        text-decoration: none;
        color: #333;
        font-weight: 600;
    }

    .admin-card a:hover {
        color: #007bff;
    }
</style>

<!-- Banner superior -->
<div class="hs-item" style="background-image: url('<?= baseUrl() ?>assets/img/hero/hero-1.jpg');">
</div>

<!-- Conteúdo da área administrativa -->
<div class="admin-section container">
       <h1>Bem vindo a área administrativa</h1>
    <div class="row g-4">
        <div class="col-lg-3 col-md-6">
            <div class="admin-card">
                <i class="fas fa-user-cog"></i>
                <a href="<?= baseUrl() ?>usuario">Usuário</a>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="admin-card">
                <i class="fas fa-key"></i>
                <a href="<?= baseUrl() ?>Usuario/formTrocarSenha">Trocar Senha</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="admin-card">
                <i class="fas fa-map"></i>
                <a href="<?= baseUrl() ?>uf">UF</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="admin-card">
                <i class="fas fa-city"></i>
                <a href="<?= baseUrl() ?>cidade">Cidade</a>
            </div>
        </div>
    </div>
</div>
