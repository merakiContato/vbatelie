<div class="container-fluid mb-3">
    <div class="row justify-content-center d-flex mx-3">
        <?php
        // Array com os dados dos produtos
        $produtos = array(
            array(
                'imagem' => 'public/assets/images/cat1.jpg',
                'titulo' => 'Fantasia de Bruxa',
                'descricao' => 'Vestido de veludo molhado com tule fantasia prata',
            ),
            array(
                'imagem' => 'public/assets/images/cat2.jpg',
                'titulo' => 'Fantasia amazonas',
                'descricao' => 'Vestido de tule com brilho e fita de cetim',
            ),
            array(
                'imagem' => 'public/assets/images/cat3.jpg',
                'titulo' => 'Vestido palhaço - Infantil',
                'descricao' => 'Vestido de suplex com tule segunda pele, tule filó e organza tipo repolinho.',
            ),
            array(
                'imagem' => 'public/assets/images/cat4.jpg',
                'titulo' => 'Vestido - Infantil',
                'descricao' => 'Vestido suplex com collant, organza e bember.',
            ),
            array(
                'imagem' => 'public/assets/images/cat5.jpg',
                'titulo' => 'Fantasia Bela Adormecida - Infantil',
                'descricao' => 'Vestido de suplex tipo collant com cetim e tule fino.',
            ),
            array(
                'imagem' => 'public/assets/images/cat6.jpg',
                'titulo' => 'Vestido marinheiro',
                'descricao' => 'Vestido em suplex tipo collant com tule filó, bember, fita de cetim, tipo repolinho.',
            ),
            array(
                'imagem' => 'public/assets/images/cat7.jpg',
                'titulo' => 'Corset',
                'descricao' => 'Renda rosa.',
            ),
            array(
                'imagem' => 'public/assets/images/cat8.jpg',
                'titulo' => 'Collant Ballet',
                'descricao' => 'Collant em helanca de ballet e saia de tule filó.',
            ),
            array(
                'imagem' => 'public/assets/images/cat9.jpg',
                'titulo' => 'Fantasia de malabarista - Infantil',
                'descricao' => 'Vestido tipo collant com suplex e bember.',
            ),
            array(
                'imagem' => 'public/assets/images/cat10.jpg',
                'titulo' => 'Fantasia mágico - Infantil',
                'descricao' => 'Vestido suplex metalizado, suplex liso, tule filó e fita de cetim.',
            ),
            array(
                'imagem' => 'public/assets/images/cat11.jpg',
                'titulo' => 'Vestido palhaço colorido - Infantil',
                'descricao' => 'Vestido de suplex com tule filó e cetim.',
            ),
            array(
                'imagem' => 'public/assets/images/cat12.jpg',
                'titulo' => 'Chapéu com penas - rosa',
                'descricao' => 'EVA, pena, fita de cetim.',
            ),
            array(
                'imagem' => 'public/assets/images/cat13.jpg',
                'titulo' => 'Chapéu com penas - branco',
                'descricao' => 'EVA, pena, fita de cetim e cetim.',
            ),
            array(
                'imagem' => 'public/assets/images/cat14.jpg',
                'titulo' => 'Chapéu com penas - rosa com glitter',
                'descricao' => 'EVA, pena, fita de cetim e cetim.',
            ),
            array(
                'imagem' => 'public/assets/images/cat15.jpg',
                'titulo' => 'Fantasia de Palhaço',
                'descricao' => 'Vestido em veludo cristal, cetim, tule filó tipo titi prato.',
            ),
            array(
                'imagem' => 'public/assets/images/cat16.jpg',
                'titulo' => 'Vestido camponesa',
                'descricao' => 'Vestido em suplex, chifon, tule fino e fita de cetim.',
            ),
            array(
                'imagem' => 'public/assets/images/cat17.jpg',
                'titulo' => 'Collant',
                'descricao' => 'Collant de suplex com organza.',
            ),
            array(
                'imagem' => 'public/assets/images/cat18.jpg',
                'titulo' => 'Fantasia Cinderela',
                'descricao' => 'Vestido em veludo cristal e tule filó.',
            ),
            array(
                'imagem' => 'public/assets/images/cat19.jpg',
                'titulo' => 'Agasalho',
                'descricao' => 'Agasalho de tectel forrado em tecido algodão.',
            ),
            // Mais produtos aqui
        );

        // Loop para exibir os produtos
        foreach ($produtos as $produto) {
        ?>
            <div class=" catalogo mt-4 col-lg-3 col-md-5 d-flex justify-content-center align-items-center">
                <div class="card card-catalogo">
                    <div  class="card-header">
                        <img class="card-img" src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['titulo']; ?>">
                    </div>
                    <div class="card-body">
                        <h2 class="card-titulo"><?php echo $produto['titulo']; ?></h2>
                        <p class="card-texto"><?php echo $produto['descricao']; ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>


</html>