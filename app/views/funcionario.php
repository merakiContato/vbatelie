<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento - Funcionário</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">

    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">

    <script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="public/assets/js/jquery.mask.js"></script>
    <script src="public/assets/js/jquery.maskedinput.js"></script>
    <script src="public/assets/js/script.js"></script>
</head>

<body id="body">

    <!-- Menu -->
    <nav class="nav navbar d-flex justify-content-between mx-0 gerenciamento">
        <div class="col-md-3">
            <button type="button" class="btn btn-painel py-1 px-2"><a href="login">Voltar ao login</a></button>
        </div>
        <div class="col-md-2 img-logo">
            <img src="public/assets/images/Logo1.png" alt="Logo do atelie VBatelie">
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <div class="container-fluid geren text-center">
        <div class="row mb-3 mt-5 justify-content-center">
            <div class="col-md-6">
                <h1 class="pt-1 pb-1">Boas vindas, funcionário</h1>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <h3 class="mb-3">O que você deseja fazer?</h3>
            </div>
        </div>
        <div class="row my-3 justify-content-center">
            <div class="col-lg-6 mb-4 mx-auto">
                <h5 class="mb-3">Informações do cliente</h5>
                <div class="row mb-3">
                    <div class="col text-center">
                        <button onclick="window.location.href='viewCliente'" class="btn btn-primary d-block mx-auto">Acessar cliente</button>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col text-center">
                        <button onclick="window.location.href='viewPedido'" class="btn btn-primary d-block mx-auto">Acessar pedidos</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5 class="mb-3">Informações serviços</h5>
                <div class="row mb-3">
                    <div class="col text-center">
                        <button onclick="window.location.href='viewServico'" class="btn btn-primary d-block mx-auto">Acessar serviços</button>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col text-center">
                        <button onclick="window.location.href='viewCatalogo'" class="btn btn-primary d-block mx-auto">Acessar catálogo</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <h5 class="mb-3">Informações finanças</h5>
                <div class="row mb-3">
                    <div class="col text-center">
                        <button onclick="window.location.href='viewContas'" class="btn btn-primary d-block mx-auto">Acessar contas</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <h5 class="mb-3">Informações materiais</h5>
                <div class="row mb-3">
                    <div class="col text-center">
                        <button onclick="window.location.href='viewMaterial'" class="btn btn-primary d-block mx-auto">Acessar materiais</button>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col text-center">
                        <button onclick="window.location.href='viewPedidomaterial'" class="btn btn-primary d-block mx-auto">Acessar materiais pedido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-3">
        <div class="mt-3 meraki d-flex align-items-center justify-content-center">
            <a href="https://talentosdoifsp.gru.br/meraki/" class="d-flex">
                <img src="public/assets/images/logo_meraki.png" alt="Logo da Meraki">
                <h6 class="ms-1">Desenvolvido por Meraki</h6>
            </a>
        </div>
    </footer>
</body>

</html>