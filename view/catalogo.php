<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="imagens/Logo2.png">
    <title>Catálogo</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row mx-5">
            <?php
            // Array com os dados dos produtos
            $produtos = array(
                array(
                    'imagem' => 'imagens/cat1.jpg',
                    'titulo' => 'Fantasia de Bruxa',
                    'descricao' => 'Vestido de veludo molhado com tule fantasia prata',
                ),
                array(
                    'imagem' => 'imagens/cat2.jpg',
                    'titulo' => 'Fantasia amazonas',
                    'descricao' => 'Vestido de tule com brilho e fita de cetim',
                ),
                array(
                    'imagem' => 'imagens/cat3.jpg',
                    'titulo' => 'Vestido palhaço - Infantil',
                    'descricao' => 'Vestido de suplex com tule segunda pele, tule filó e organza tipo repolinho.',
                ),
                array(
                    'imagem' => 'imagens/cat4.jpg',
                    'titulo' => 'Vestido - Infantil',
                    'descricao' => 'Vestido suplex com collant, organza e bember.',
                ),
                array(
                    'imagem' => 'imagens/cat5.jpg',
                    'titulo' => 'Fantasia Bela Adormecida - Infantil',
                    'descricao' => 'Vestido de suplex tipo collant com cetim e tule fino.',
                ),
                array(
                    'imagem' => 'imagens/cat6.jpg',
                    'titulo' => 'Vestido marinheiro',
                    'descricao' => 'Vestido em suplex tipo collant com tule filó, bember, fita de cetim, tipo repolinho.',
                ),
                array(
                    'imagem' => 'imagens/cat7.jpg',
                    'titulo' => 'Corset',
                    'descricao' => 'Renda rosa.',
                ),
                array(
                    'imagem' => 'imagens/cat8.jpg',
                    'titulo' => 'Collant Ballet',
                    'descricao' => 'Collant em helanca de ballet e saia de tule filó.',
                ),
                array(
                    'imagem' => 'imagens/cat9.jpg',
                    'titulo' => 'Fantasia de malabarista - Infantil',
                    'descricao' => 'Vestido tipo collant com suplex e bember.',
                ),
                array(
                    'imagem' => 'imagens/cat10.jpg',
                    'titulo' => 'Fantasia mágico - Infantil',
                    'descricao' => 'Vestido suplex metalizado, suplex liso, tule filó e fita de cetim.',
                ),
                array(
                    'imagem' => 'imagens/cat11.jpg',
                    'titulo' => 'Vestido palhaço colorido - Infantil',
                    'descricao' => 'Vestido de suplex com tule filó e cetim.',
                ),
                array(
                    'imagem' => 'imagens/cat12.jpg',
                    'titulo' => 'Chapéu com penas - rosa',
                    'descricao' => 'EVA, pena, fita de cetim.',
                ),
                array(
                    'imagem' => 'imagens/cat13.jpg',
                    'titulo' => 'Chapéu com penas - branco',
                    'descricao' => 'EVA, pena, fita de cetim e cetim.',
                ),
                array(
                    'imagem' => 'imagens/cat14.jpg',
                    'titulo' => 'Chapéu com penas - rosa com glitter',
                    'descricao' => 'EVA, pena, fita de cetim e cetim.',
                ),
                array(
                    'imagem' => 'imagens/cat15.jpg',
                    'titulo' => 'Fantasia de Palhaço',
                    'descricao' => 'Vestido em veludo cristal, cetim, tule filó tipo titi prato.',
                ),
                array(
                    'imagem' => 'imagens/cat16.jpg',
                    'titulo' => 'Vestido camponesa',
                    'descricao' => 'Vestido em suplex, chifon, tule fino e fita de cetim.',
                ),
                array(
                    'imagem' => 'imagens/cat17.jpg',
                    'titulo' => 'Collant',
                    'descricao' => 'Collant de suplex com organza.',
                ),
                array(
                    'imagem' => 'imagens/cat18.jpg',
                    'titulo' => 'Fantasia Cinderela',
                    'descricao' => 'Vestido em veludo cristal e tule filó.',
                ),
                array(
                    'imagem' => 'imagens/cat19.jpg',
                    'titulo' => 'Agasalho',
                    'descricao' => 'Agasalho de tectel forrado em tecido algodão.',
                ),
                // Mais produtos aqui
            );

            // Loop para exibir os produtos
            foreach ($produtos as $produto) {
            ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['titulo']; ?>">
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
</body>

</html>
