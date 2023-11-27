<!DOCTYPE html>
<<<<<<< HEAD
<html lang="pt-br">
=======
<html lang="en">
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Links das bibliotecas, estão internas agora-->
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">

    <script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="public/assets/js/jquery.mask.js"></script>
    <script src="public/assets/js/jquery.maskedinput.js"></script>
    <script src="public/assets/js/script.js"></script>
</head>

<<<<<<< HEAD
<body id="body" class="login">

    <div class="container-fluid">
        <div class="row vh-100">
            <!-- Coluna 1 -->
            <div class="col-md-6 col-colorida">
                <div class="d-flex justify-content-center mb-3">
                    <div class="acesso btn btn-primary">Você está acessando como gerente</div>
                </div>

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
                            <label for="senha" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn2 p-2 mt-3" onclick="login()">Entrar</button>
                        </div>
                    </form>
                </div>

                <div class="d-flex justify-content-center">
                    <button class="btn3 p-2"><a href="home">Voltar</a></button>
                </div>
            </div>

            <div class="col-md-6 col-direita-ge"></div>
        </div>
=======
<body id="body">

    <div class="container mt-4">
        <h2 class="text-center mb-4">Login</h2>

        <!-- Formulário de Login -->
        <form id="login-form" class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-primary" onclick="login()">Entrar</button>
            </div>
        </form>

        <!-- Mensagem de erro -->
        <div id="error-message" style="color: red;"></div>
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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
                    window.location.href = "gerenciamento";
                },
                error: function(xhr, status, error) {
                    console.error("Erro na solicitação AJAX:", error);
                    console.log("Detalhes do erro:", xhr.responseText);
                    displayErrorMessage("Erro na solicitação AJAX");
                }
            });
        }

        function displayErrorMessage(message) {
            $("#error-message").text(message);
        }
    </script>
<<<<<<< HEAD
=======

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
</body>

</html>