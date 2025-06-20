<style>
.aboutus-section .row {
  display: flex;
  align-items: stretch; /* força colunas com mesma altura */
  min-height: 550px; /* altura mínima para garantir espaço, ajuste se quiser */
}

.aboutus-section .col-lg-6.p-0 {
  padding: 0;
  display: flex;
  flex-direction: column;
  height: auto;
}

.about-video {
  flex: 1 1 auto; /* ocupa todo o espaço vertical disponível */
  display: flex;
  align-items: stretch;
}

.about-video .ratio {
  flex: 1 1 auto;
  height: 100%;
  width: 100%;
}

.about-video iframe {
  height: 100% !important;
  width: 100% !important;
}

</style>

<!-- Início da Seção de Navegação -->
<section class="breadcrumb-section set-bg" data-setbg="<?= baseUrl() ?>assets/img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb-text">
                    <h2>Sobre Nós</h2>
                    <div class="bt-option">
                        <a href="<?= baseUrl() ?>">Início</a>
                        <span>Sobre</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fim da Seção de Navegação -->

<!-- Início da Seção Por que nos escolher -->
<section class="choseus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Por que nos escolher?</span>
                    <h2>SUPERE SEUS LIMITES</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-034-stationary-bike"></span>
                    <h4>Equipamentos modernos</h4>
                    <p>Oferecemos equipamentos de última geração para melhorar seu desempenho com conforto e segurança.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-033-juice"></span>
                    <h4>Plano nutricional saudável</h4>
                    <p>Orientações para uma alimentação equilibrada que complementa seus treinos e objetivos.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-002-dumbell"></span>
                    <h4>Plano de treino profissional</h4>
                    <p>Treinamentos elaborados por profissionais qualificados para resultados mais rápidos e seguros.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-014-heart-beat"></span>
                    <h4>Atendimento personalizado</h4>
                    <p>Cada aluno recebe atenção individual, com treinos adaptados às suas necessidades e objetivos.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fim da Seção Por que nos escolher -->

<!-- Início da Seção Sobre Nós -->
<section class="aboutus-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="about-video">
                    <div class="ratio ratio-16x9">
                        <iframe
                            src="https://www.youtube.com/embed/eApINgrw2I4"
                            title="Vídeo Institucional"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 p-0">
                <div class="about-text">
                    <div class="section-title">
                        <span>Sobre nós</span>
                        <h2>O que já conquistamos</h2>
                    </div>
                    <div class="at-desc">
                        <p>Temos orgulho em oferecer um ambiente completo para seu bem-estar. Com uma equipe dedicada, estrutura moderna e serviços personalizados, ajudamos nossos alunos a superarem seus limites e alcançarem seus objetivos com saúde e segurança.</p>
                    </div>
                    <div class="about-bar">
                        <div class="ab-item">
                            <p>Musculação</p>
                            <div id="bar1" class="barfiller">
                                <span class="fill" data-percentage="80"></span>
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                            </div>
                        </div>
                        <div class="ab-item">
                            <p>Treinamento</p>
                            <div id="bar2" class="barfiller">
                                <span class="fill" data-percentage="85"></span>
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                            </div>
                        </div>
                        <div class="ab-item">
                            <p>Fitness</p>
                            <div id="bar3" class="barfiller">
                                <span class="fill" data-percentage="75"></span>
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fim da Seção Sobre Nós -->