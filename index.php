<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VBatelie</title>
    <link rel="icon" type="image/png" href="imagens/Logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="imagens/icon.ico" type="image/x-ico">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="script.js"></script>
    <script>
        $(document).ready(function() {
            $('#home').load("view/home.php");

            $(".links").click(function(event) {
                event.preventDefault();
                $('#home').load($(event.target).attr("data"));
            });

            $('#carouselExample').carousel({
                interval: 4000 // Altere o valor para ajustar a velocidade do carrossel (em milissegundos)
            });
        });

    </script>
</head>

<body class="body">
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid text-center justify-content-center">
            <div class="navbar-header">
                <div class="logo1 navbar-brand mx-auto" href="#">
                    <img src="imagens/Logo1.png" alt="Logo" class="img-fluid">
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link links" data="view/home.php" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link links" data="view/sobre.php" href="#">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link links" data="view/catalogo.php" href="#">Catálogo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id="home"></div>
    <footer class="container-fluid">
        <hr class="linhahorizontal">
        <div class="row p-3 text-center pb-3">
            <div class="col-md-2 p-2">
                <h5><strong>Páginas</strong></h5>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link links" data="view/home.php" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link links" data="view/sobre.php" href="#">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link links" data="view/catalogo.php" href="#">Catálogo</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 p-2 text-center pb-3">
                <h5><strong>Formas de pagamento</strong></h5>
                <img src="imagens/pix.png" alt="Pix" class="img-fluid">
                <img src="imagens/mastercard.png" alt="Mastercard" class="img-fluid">
                <img src="imagens/visa.png" alt="Visa" class="img-fluid">
                <img src="imagens/dinheiro.png" alt="Dinheiro" class="img-fluid">
            </div>
            <div class="col-md-3 p-2 pb-3">
                <h5><strong>Contato</strong></h5>
                <p class="p-0 m-0">(11) 50028922</p>
                <a href="mailto:vbatelie@gmail.com" class="me-3">vbatelie.contato@gmail.com</a>
                <a href="https://instagram.com/vbatelieoficial?igshid=MzNlNGNkZWQ4Mg==" class="me-3 d-flex justify-content-center" target="_blank">
                    <i class="fa fa-instagram" aria-hidden="true" alt="Ícone do instagram"></i>
                    <p class="pt-1 px-1">@vbatelieoficial</p>
                </a>
            </div>
            <div class="col-md-3 part4">
                <h5><strong>Fale conosco</strong></h5>
                <form action="https://formsubmit.co/vbatelie.contato@gmail.com" method="POST" target="_blank" class="mx-auto">
                    <div class="mb-3">
                        <input type="text" name="name" placeholder="Digite seu nome" required class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" placeholder="Digite seu email" required class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <textarea cols="30" rows="10" name="message" placeholder="Digite sua mensagem" class="form-control" required></textarea>
                    </div>
                    <div class="justify-content-center d-flex">
                        <button type="submit" class="btn px-3 py-2" target="_blank">Enviar</button>
                    </div>
                    <input type="hidden" name="_subject" value="Novo contato!">
                    <input type="text" name="_honey" style="display:none">
                    <input type="hidden" name="_captcha" value="false">
                </form>
            </div>
        </div>
        <div class="row direitos">
            <div class="col-md-12 d-flex justify-content-center">
                <img src="imagens/Logo3.png" alt="Logo3" class="img-fluid">
                <p class="pt-1">&COPY; Todos os direitos reservados</p>
            </div>
        </div>
    </footer>

</body>

</html>
