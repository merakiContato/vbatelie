<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de usuario</title>
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

<body id="body">

    <div class="container mt-4">
        <h2 class="text-center mb-4">Gerenciamento de usuario</h2>

        <!-- Formulário para adicionar novo material -->
        <form id="newUsuario" class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="col-md-6">
                <label for="nivAcesso" class="form-label">Nivel de acesso</label>
                <input type="text" class="form-control" id="nivAcesso" name="nivAcesso" required>
            </div>
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Adicionar usuario</button>
                <input type="hidden" name="action" value="insert"> 
            </div>
        </form>

        <!-- Contêiner para exibir a tabela de materiais -->
        <div id="tableUsuarioContainer"></div>
    </div>

    <script>
        // URLs e nomes usados no controle de materiais
        var ctrlUsuarioUrl = "usuario"; //rota da ctrl
        var listAllUsuario = "usuario"; //rota da função list all
        var labelsUsuario = ['nivAcesso', 'nome', 'email']; //campos da tabela

        $(document).ready(function() {
            // Carrega a tabela de materiais ao carregar a página
            loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);

            // Manipula o evento de envio do formulário para adicionar novo material
            $('#newUsuario').on('submit', function(e) {
                e.preventDefault(); //evitar eventos pré definidos da página, tipo recarregar
                var formData = $(this).serialize(); 
                // Envia uma requisição AJAX para adicionar um novo Usuario
                $.ajax({
                    url: ctrlUsuarioUrl,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                            alert('Usuário adicionado com sucesso!');
                            loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);
                    },
                    error: function(xhr, status, error) {
                        alert('Erro ao adicionar Usuario. Detalhes: ' + error);
                    }
                });

            });
        });

        // Função para salvar os dados do formulário
        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();
            console.log(formData);

            // Adicione logs para depuração
            console.log("Dados enviados para o servidor:", jsonData);

            // Envia uma requisição AJAX para salvar as alterações no Usuario
            $.ajax({
                url: ctrlUsuarioUrl,
                method: 'PUT',
                success: function(response) {
                    // Adicione logs para depuração
                    console.log("Resposta do servidor após salvar:", response);

                    alert('Usuario editado com sucesso!');
                    loadTable(listAllMateriais, labelsUsuario, ctrlUsuarioUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Usuario:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Usuario.');
                }

            });
        }

        function delFormData(idform) { //Literalmente o mesmo esquema
            var formData = $("#" + idform).serialize();
            // Envia uma requisição AJAX para salvar as alterações no material
            $.ajax({
                url: ctrlUsuarioUrl,
                method: 'PUT',
                data: formData, // Adiciona a ação 'save' aos dados do formulário
                success: function(response) {
                    alert('Usuario editado com sucesso!');
                    // Recarrega a tabela após salvar as alterações no Usuario
                    loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);
                },
                error: function() {
                    alert('Erro ao salvar as alterações no Usuario.');
                }

            });
        }

        // Função para carregar e exibir a tabela de materiais, aquela tabelinha bonita
        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
            // Envia uma requisição AJAX para obter os dados da tabela
            $.ajax({
                url: urlDataTable,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tableHtml = '<table class="table table-striped"><thead><tr>';
                    // Cria cabeçalhos da tabela com base nos rótulos fornecidos
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>'; // Capitaliza os rótulos
                    });
                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    // Preenche os dados na tabela
                    $.each(data, function(i, usuario) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        // Preenche as células da tabela com os dados do profissional
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
                                '<input type="text" name="' + labelsUsuario[i] + '" form="' + formId + '" value="' + (usuario[label] || '') + '" >'

                                +
                                '</td>'; // Usa || '' para evitar valores nulos
                        });
                        // Adiciona botões de ação para editar, salvar e excluir
                        tableHtml +=
                            '<td>' +
                            '<button class="btn btn-primary btnSave" onclick="saveFormData( \'' + formId + '\' );" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btn-danger btnDelete" onclick="delFormData( \'' + formId + '\' );" >Excluir</button>' +
                            '</td>' +
                            '</tr>';
                        tableHtml += '</form">';
                    });

                    tableHtml += '</tbody></table>';
                    // Exibe a tabela no contêiner especificado lá em cima
                    $('#tableUsuarioContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar usuários.');
                }
            });
        }
    </script>
</body>


</body>

</html>