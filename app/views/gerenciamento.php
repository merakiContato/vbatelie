<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">

    <!-- Links das bibliotecas, estão internas agora-->
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">

    <script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="public/assets/js/jquery.mask.js"></script>
    <script src="public/assets/js/jquery.maskedinput.js"></script>
    <script src="public/assets/js/script.js"></script>
</head>

<body class="body">

    <nav class="gerenciamento navbar navbar-default" style="background-color: #F7C5DE;">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="navbar-brand" src="public/assets/images/logo1.png">
            </div>
            <button class="p-1 navbar-btn float-end"><a href="index.php">Voltar a página inicial</a></button>
        </div>
    </nav>

    <div class="container-fluid geren text-center">
        <div class="row mb-1 mt-5 d-flex justify-content-center">
            <div class="col-md-6">
                <h1>Boas vindas, gerente</h1>
            </div>
        </div>
        <div class="row mb-4">
            <h3>O que você deseja fazer?</h3>
        </div>
        <div class="row my-3">
            <div class="col-md-6 mb-2">
                <h5>Informações do cliente</h5>
                <div class="row">
                    <button class="p-2"><a href="viewCliente">Acessar cliente</a></button>
                </div>
                <div class="row">
                    <button class="p-2"><a href="viewPedido">Acessar pedidos</a></button>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <h5>Informações do funcionário</h5>
                <div class="row">
                    <button class="p-2"><a href="viewProfissional">Acessar funcionários</a></button>
                </div>
                <div class="row">
                    <button class="p-2"><a href="viewServcontratado">Serviços temporários</a></button>
                </div>
                <div class="row">
                    <button class="p-2"><a href="viewUsuario">Acessar usuários</a></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-2">
                <h5>Informações serviços</h5>
                <div class="row">
                    <button class="p-2"><a href="viewServico">Acessar serviços</a></button>
                </div>
                <div class="row">
                    <button class="p-2"><a href="viewCatalogo">Acessar catálogo</a></button>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <h5>Informações finanças</h5>
                <div class="row">
                    <button class="p-2"><a href="viewCatalogo">Acessar contas</a></button>
                </div>
                <div class="row">
                    <button class="p-2"><a href="relatorios">Relatórios</a></button>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <h5>Informações materiais</h5>
                <div class="row">
                    <button class="p-2"><a href="viewMaterial">Acessar materiais</a></button>
                </div>
                <div class="row">
                    <button class="p-2"><a href="viewPedidomaterial">Acessar materias pedido</a></button>
                </div>
            </div>
        </div>
    </div>

    <footer class="pt-4 pb-4">
        <div class="col mt-3 meraki d-flex align-items-center justify-content-center">
            <a href="https://talentosdoifsp.gru.br/meraki/" class="d-flex">
                <img src="public/assets/images/logo_meraki.png" alt="Logo da Meraki">
                <h5 class="ms-1">Desenvolvido por Meraki</h5>
            </a>
        </div>
    </footer>
</body>

</html>