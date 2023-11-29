<div class="container-fluid mb-3">
    <div class="row justify-content-center d-flex mx-3">
        <?php
        // Array com os dados dos produtos
        $produtos = array(
            array(
                'imagem' => 'public/assets/images/cat1.jpg',
                'titulo' => 'Fantasia de Bruxa',
                'descricao' => 'Vestido de veludo molhado com tule prata.',
            ),

            array(
                'imagem' => 'public/assets/images/cat2.jpg',
                'titulo' => 'Fantasia Amazona',
                'descricao' => 'Vestido de tule brilhante com fita de cetim.',
            ),

            array(
                'imagem' => 'public/assets/images/cat3.jpg',
                'titulo' => 'Vestido Palhaço - Infantil',
                'descricao' => 'Vestido de suplex com camadas de tule e organza.',
            ),

            array(
                'imagem' => 'public/assets/images/cat4.jpg',
                'titulo' => 'Vestido - Infantil',
                'descricao' => 'Vestido de suplex com collant, organza e bember.',
            ),

            array(
                'imagem' => 'public/assets/images/cat5.jpg',
                'titulo' => 'Fantasia Bela Adormecida - Infantil',
                'descricao' => 'Vestido de suplex tipo collant com cetim e tule.',
            ),

            array(
                'imagem' => 'public/assets/images/cat6.jpg',
                'titulo' => 'Vestido Marinheiro',
                'descricao' => 'Vestido em suplex tipo collant com várias camadas de tecido.',
            ),

            array(
                'imagem' => 'public/assets/images/cat7.jpg',
                'titulo' => 'Corset',
                'descricao' => 'Corset de renda rosa.',
            ),

            array(
                'imagem' => 'public/assets/images/cat8.jpg',
                'titulo' => 'Collant Ballet',
                'descricao' => 'Collant de helanca para ballet com saia de tule.',
            ),

            array(
                'imagem' => 'public/assets/images/cat9.jpg',
                'titulo' => 'Fantasia Malabarista - Infantil',
                'descricao' => 'Vestido tipo collant com suplex e bember.',
            ),

            array(
                'imagem' => 'public/assets/images/cat10.jpg',
                'titulo' => 'Fantasia Mágico - Infantil',
                'descricao' => 'Vestido com tecidos variados incluindo suplex metalizado e tule.',
            ),

            array(
                'imagem' => 'public/assets/images/cat11.jpg',
                'titulo' => 'Vestido Palhaço Colorido - Infantil',
                'descricao' => 'Vestido de suplex com tule filó e cetim.',
            ),

            array(
                'imagem' => 'public/assets/images/cat12.jpg',
                'titulo' => 'Chapéu com Penas - Rosa',
                'descricao' => 'Chapéu feito de EVA, pena e fita de cetim.',
            ),

            array(
                'imagem' => 'public/assets/images/cat13.jpg',
                'titulo' => 'Chapéu com Penas - Branco',
                'descricao' => 'Chapéu feito de EVA, pena e fita de cetim.',
            ),

            array(
                'imagem' => 'public/assets/images/cat14.jpg',
                'titulo' => 'Chapéu com Penas - Rosa com Glitter',
                'descricao' => 'Chapéu feito de EVA, pena e fita de cetim com detalhes de glitter.',
            ),

            array(
                'imagem' => 'public/assets/images/cat15.jpg',
                'titulo' => 'Fantasia de Palhaço',
                'descricao' => 'Vestido em veludo cristal, cetim e tule filó.',
            ),

            array(
                'imagem' => 'public/assets/images/cat16.jpg',
                'titulo' => 'Vestido Camponesa',
                'descricao' => 'Vestido em suplex, chiffon, tule fino e fita de cetim.',
            ),

            array(
                'imagem' => 'public/assets/images/cat17.jpg',
                'titulo' => 'Collant',
                'descricao' => 'Collant de suplex com detalhes em organza.',
            ),

            array(
                'imagem' => 'public/assets/images/cat18.jpg',
                'titulo' => 'Fantasia Cinderela',
                'descricao' => 'Vestido em veludo cristal e tule filó.',
            ),

            array(
                'imagem' => 'public/assets/images/cat19.jpg',
                'titulo' => 'Agasalho',
                'descricao' => 'Agasalho de tectel forrado com tecido de algodão.',
            ),
            // Mais produtos aqui
        );

        // Loop para exibir os produtos
        foreach ($produtos as $produto) {
        ?>
            <div class=" catalogo mt-4 col-lg-3 col-md-5 d-flex justify-content-center align-items-center">
                <div class="card card-catalogo">
                    <div class="card-header">
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