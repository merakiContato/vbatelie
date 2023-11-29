<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="public/assets/js/jquery.mask.js"></script>
    <script src="public/assets/js/jquery.maskedinput.js"></script>
    <script src="public/assets/js/script.js"></script>
</head>

<body id="body" class="login">

    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-md-6 col-colorida">

                <div class="img1 d-flex justify-content-center">
                    <img class="w-25 h-25" src="public/assets/images/logo2.png" alt="">
                </div>

                <!-- Formulário: -->
                <div class="form-container mt-3">
                    <form id="login-form">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="senha" class="form-label mt-3">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn2 p-2 mt-3" onclick="login()">Entrar</button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn3 p-2 mt-3"><a href="home">Voltar</a></button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Imagem da direita -->
            <div class="col-md-6 col-direita-ge">
                <img src="public/assets/images/loginfun.jpg" alt="" class="img-fluid w-100 h-100">
            </div>
        </div>
    </div>

    <script>
        function login() {
            var email = $("#email").val();
            var senha = $("#senha").val();

            $.ajax({
                type: "POST",
                url: "usuario",
                data: {
                    action: "login",
                    email: email,
                    senha: senha
                },
                success: function(response) {
                    console.log(response); // Verifique a resposta no console do navegador

                    // Converta o JSON para um objeto JavaScript
                    var responseObject = JSON.parse(response);
                    // Verifique o nivAcesso do usuário
                    var nivAcesso = responseObject.nivAcesso;

                    // Redirecione com base no nivAcesso
                    if (nivAcesso == 1) {
                        window.location.href = "funcionario";
                    } else if (nivAcesso == 2) {
                        window.location.href = "gerente";
                    }
                },

                error: function(xhr, status, error) {
                    console.error("Erro na solicitação AJAX:", error);
                    console.log("Detalhes do erro:", xhr.responseText);
                    displayErrorMessage("Erro na solicitação AJAX");

                    // Adicione mensagens de log para debug
                    error_log('Erro na solicitação AJAX: '.error);
                    error_log('Detalhes do erro: '.xhr.responseText);
                }

            });
        }

        function displayErrorMessage(message) {
            $("#error-message").text(message);
        }
    </script>
</body>

</html>