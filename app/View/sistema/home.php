<style>
    /* Seção principal */
    .admin-section {
        background-color: #f9f9fb;
        padding: 3rem 1rem;
        min-height: 75vh;
    }

    /* Cards */
    .admin-card {
        background-color: #fff;
        border-radius: 16px;
        padding: 2rem 1rem;
        text-align: center;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }

    .admin-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .admin-card i {
        font-size: 2.2rem;
        margin-bottom: 1rem;
        color: #343a40;
    }

    .admin-card a {
        text-decoration: none;
        display: block;
        color: #212529;
        font-size: 1.05rem;
        font-weight: 600;
        transition: color 0.2s;
    }

    .admin-card a:hover {
        color: #0d6efd;
    }

    .admin-section h1 {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 2.5rem;
        font-weight: 700;
        color: #343a40;
    }
</style>

<!-- Banner superior -->
<div class="hs-item" style="background-image: url('<?= baseUrl() ?>assets/img/hero/hero-1.jpg');">

</div>
<!-- Conteúdo principal -->
<div class="admin-section container">

    <?= exibeAlerta() ?>
    <?php

    use Core\Library\Session; ?>

    <?php if ((int)Session::get("userNivel") <= 20): ?>
        <h1>Bem-vindo à área administrativa</h1>
        <div class="row g-4">
            <?php
            $adminLinks = [
                ["icon" => "bi-person-gear", "text" => "Usuário", "url" => "usuario"],
                ["icon" => "bi-journal-plus", "text" => "Adicionar acompanhamento", "url" => "acompanhamento"],
                ["icon" => "bi-person-plus", "text" => "Cadastrar Alunos", "url" => "aluno"],
                ["icon" => "bi-person-badge", "text" => "Cadastrar Professores", "url" => "professor"],
                ["icon" => "bi-card-checklist", "text" => "Cadastrar Planos", "url" => "plano"],
                ["icon" => "bi-barbell", "text" => "Cadastrar Exercícios", "url" => "exercicio"],
                ["icon" => "bi-clipboard-data", "text" => "Cadastrar Fichas de treino", "url" => "fichaTreino"],
                ["icon" => "bi-ui-checks", "text" => "Cadastrar Fichas de exercício", "url" => "fichaExercicio"],
                ["icon" => "bi-key", "text" => "Trocar Senha", "url" => "Usuario/formTrocarSenha"],
                ["icon" => "bi-geo", "text" => "UF", "url" => "uf"],
                ["icon" => "bi-buildings", "text" => "Cidade", "url" => "cidade"],
                ["icon" => "bi-journal-check", "text" => "Meu plano", "url" => "aluno/meuPlano"],
                ["icon" => "bi-heart-pulse", "text" => "Meus acompanhamentos", "url" => "aluno/meuAcompanhamento"],
                ["icon" => "bi-list-check", "text" => "Minha ficha", "url" => "aluno/minhaFicha"],
                ["icon" => "bi-bounding-box", "text" => "Meus exercícios", "url" => "aluno/meuExercicio"],
                ["icon" => "bi-key", "text" => "Trocar Senha", "url" => "Usuario/formTrocarSenha"],
            ];

            foreach ($adminLinks as $link): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="admin-card">
                        <i class="bi <?= $link["icon"] ?>"></i>
                        <a href="<?= baseUrl() . $link["url"] ?>"><?= $link["text"] ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ((int)Session::get("userNivel") > 20): ?>
        <h1>Bem-vindo à sua área do aluno</h1>
        <div class="row g-4">
            <?php
            $alunoLinks = [
                ["icon" => "bi-journal-check", "text" => "Meu plano", "url" => "aluno/meuPlano"],
                ["icon" => "bi-heart-pulse", "text" => "Meus acompanhamentos", "url" => "aluno/meuAcompanhamento"],
                ["icon" => "bi-list-check", "text" => "Minha ficha", "url" => "aluno/minhaFicha"],
                ["icon" => "bi-bounding-box", "text" => "Meus exercícios", "url" => "aluno/meuExercicio"],
                ["icon" => "bi-key", "text" => "Trocar Senha", "url" => "Usuario/formTrocarSenha"],
            ];

            foreach ($alunoLinks as $link): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="admin-card">
                        <i class="bi <?= $link["icon"] ?>"></i>
                        <a href="<?= baseUrl() . $link["url"] ?>"><?= $link["text"] ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>