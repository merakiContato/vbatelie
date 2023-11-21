<?php

use core\utils\Router;

/**
 * index.php
 * @package ZaitTinyFrameworkPHP
 * @author  Msc Cleber Silva de Oliveira, Yossef Zait
 * @version 0.0.0.1
 * @see     https://cleberoliveira.info
 */



<<<<<<< HEAD
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Diretório raiz da aplicação
$rootPath = __DIR__; // Diretório Raiz  
// Arquivo de Configuraões 
$config = array();  // é necessário global pra usar $config em '/app/etc/config.php'
=======
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
>>>>>>> 6fa76c70e0584365a1e33243ac4338fd558fa8a6

require_once $rootPath . '/app/etc/config.php';
require_once $rootPath . '/autoload.php'; // Arquivo do Autoloader de classes

<<<<<<< HEAD
$router = new Router();
// se uri estiver vazia considera chamar a rota de home

$module = ( ( $_GET["uri"] == "") || str_starts_with($_GET["uri"] ,"index.php" ) || ! isset($_GET["uri"]) ? "home" : $_GET["uri"] );

$router->dispatch( $module );

/**
* Este é o script principal de inicialização para a aplicação.
 * Ele define algumas variáveis úteis, lida com a configuração,
 * realiza o autoload de classes e inicia a roteamento da aplicação.
 *
 * As seguintes operações são realizadas, em ordem:
 *
 * 1. Importa a classe Router do namespace core.
 * 2. Define $rootPath como o diretório atual, que será usado posteriormente para resolver caminhos na aplicação.
 * 3. Define $folderBase como o caminho relativo entre o diretório raiz do servidor e o diretório atual.
 * 4. Inclui o arquivo de configuração principal, o autoloader de classes, e a classe Router.
 * 5. Se a sessão PHP ainda não foi iniciada, inicia uma.
 * 6. Define $routersFile como o caminho para o arquivo json que contém as rotas da aplicação.
 * 7. Cria uma nova instância da classe Router, passando o arquivo de rotas como argumento.
 * 8. Chama o método dispatch() na instância do Router para iniciar a roteamento da aplicação.
 *
 * Requisitos:
 * - PHP 7.4 ou superior e Mysql 8.1 ou superior; 
 * - A extensão json do PHP deve estar habilitada.
 * - O arquivo app/etc/config.php deve existir e ser válido.
 * - O autoloader em autoload.php deve estar funcionando corretamente.
 * - A classe Router deve estar definida em core/Router.class.php e ser carregável pelo autoloader.
 * - O arquivo de rotas em app/etc/routes.json deve existir e ser um JSON válido.
 * 
 */
?>
=======
</html>
>>>>>>> 6fa76c70e0584365a1e33243ac4338fd558fa8a6
