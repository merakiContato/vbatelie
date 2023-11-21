<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma de Contas</title>
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

    <div class="container mt-4">
        <h2 class="text-center mb-4">Escolha o Mês para Soma das Contas</h2>

        <!-- Formulário para calcular a soma das contas -->
        <form id="somaContasForm" class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="mes" class="form-label">Digite o Mês (ex: Janeiro):</label>
                <input type="text" class="form-control" id="mes" name="mes" required>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-primary" onclick="calcularSomaContas()">Calcular Soma</button>
            </div>
        </form>

        <!-- Resultado da soma das contas -->
        <div id="resultado" class="mt-3"></div>
    </div>

    <script>
        function calcularSomaContas() {
            var form = document.getElementById('somaContasForm');
            var mesInput = form.elements['mes'];

            if (mesInput.value) {
                var mes = mesInput.value;

                // Utilize Ajax para enviar a solicitação ao servidor
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'ctrlContas', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            handleSuccess(xhr.responseText);
                        } else {
                            handleFailure(xhr.status);
                        }
                    }
                };

                // Modifique o envio dos dados para incluir o campo 'mes'
                xhr.send('mes=' + mes + '&action=calcularSomaContas');
            } else {
                alert("Por favor, digite o mês.");
            }
        }

        function handleSuccess(responseText) {
            try {
                if (!responseText) {
                    throw new Error('Resposta vazia do servidor.');
                }

                var resposta = JSON.parse(responseText);

                // Adicione logs para depuração
                console.log('Resposta JSON analisada:', resposta);

                // Exiba o resultado ou mensagem de erro
                if (resposta.success !== undefined && resposta.success) {
                    console.log('Exibindo resultado de sucesso.');
                    document.getElementById('resultado').innerHTML = '<p class="alert alert-success">Total: R$ ' + resposta.soma + '</p>';
                } else if (resposta.error !== undefined) {
                    console.log('Exibindo mensagem de erro.');
                    document.getElementById('resultado').innerHTML = '<p class="alert alert-danger">Erro: ' + resposta.error + '</p>';
                }
            } catch (error) {
                console.error('Erro ao analisar a resposta JSON:', error);
                console.log('Resposta JSON do servidor:', responseText);
                alert('Erro ao analisar a resposta JSON. Consulte o console para mais detalhes.');
            }
        }



        function handleFailure(status) {
            console.error('Erro na requisição AJAX. Código de status:', status);
            alert('Erro ao calcular a soma das contas. Código de status: ' + status);
        }
    </script>

</body>

</html>