<!DOCTYPE html>
<html lang="en">

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

<body class="body">

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
    </div>

    <script>
        function login() {
            var email = $("#email").val();
            var senha = $("#senha").val();

            $.ajax({
                type: "POST",
                url: "ctrlUsuario",
                data: {
                    action: "login",
                    email: email,
                    senha: senha
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = "viewMaterial";
                    } else {
                        displayErrorMessage(response.error);
                    }
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

</body>

</html>