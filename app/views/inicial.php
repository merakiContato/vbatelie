<!-- CARROSSEL -->
<div class="container-fluid px-0">
    <div id="myCarousel" class="carousel slide m-3" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="carousel-button active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" class="carousel-button" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" class="carousel-button" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="public/assets/images/imagem1.jpg" alt="Primeira imagem do carrossel" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="public/assets/images/imagem2.jpg" alt="Segunda imagem do carrossel" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="public/assets/images/imagem3.jpg" alt="Terceira imagem do carrossel" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
    <!-- FAIXA 1 -->
    <div class="faixa_01 text-center mb-4 mt-5" style="color: #b93171;">
        <h1>Do ateliê para você!</h1>
        <h5>Conheça o nosso trabalho</h5>
    </div>
    <!-- CARDS -->
    <div class="container mb-4">
        <div class="row justify-content-center">
            <!-- ARRAY DOS CARDS -->

            <div class="container mb-4">
                <div class="row justify-content-center">

                    <?php
                    // Array com os dados dos produtos
                    $produtos = array(
                        array(
                            'imagem' => 'public/assets/images/cat1.jpg',
                            'titulo' => 'Fantasia de Bruxa',
                            'descricao' => 'Vestido confeccionado em veludo molhado, adornado com tule fantasia prata.',
                        ),
                        array(
                            'imagem' => 'public/assets/images/cat2.jpg',
                            'titulo' => 'Fantasia amazonas',
                            'descricao' => 'Vestido elaborado com tule brilhante e detalhes em fita de cetim.',
                        ),
                        array(
                            'imagem' => 'public/assets/images/cat3.jpg',
                            'titulo' => 'Vestido palhaço - Infantil',
                            'descricao' => 'Vestido confeccionado em suplex, com camadas de tule segunda pele, tule filó e organza leve e volumosa.',
                        ),
                        array(
                            'imagem' => 'public/assets/images/cat4.jpg',
                            'titulo' => 'Vestido - Infantil',
                            'descricao' => 'Vestido confeccionado em suplex, com detalhes em collant, organza e tecido bember.',
                        )
                    );
                    // Loop para exibir os produtos
                    foreach ($produtos as $produto) {
                    ?>
                        <div class="col-lg-3 col-md-5 mt-4 d-flex justify-content-center align-items-center">
                            <div class="card card-home">
                                <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['titulo']; ?>" class="card-img">
                                <div class="overlay"></div>
                                <h6><?php echo $produto['titulo']; ?></h6>
                                <div class="card-content">
                                    <p><?php echo $produto['descricao']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
    <!-- BOTÃO CARD -->
    <div class="row justify-content-center mb-5">
        <div class="col-auto">
            <h5 class="produtos py-1 px-2">Veja mais em catálogo</h5>
    </div>
    <!-- INSTAGRAM -->
    <div class="row text-center instagram p-4 my-5">
        <div class="col">
            <h5 style="font-style: italic;">Em todo lugar. A todo momento</h5>
            <h2 style="margin: 0;"><strong>@VBATELIE</strong> no Instagram</h2>
        </div>
    </div>
</div>