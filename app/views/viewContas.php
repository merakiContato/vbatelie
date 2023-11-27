<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Gerenciamento de contas</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
=======
    <title>Gerenciamento de Contas</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">

    <!-- Links das bibliotecas, estão internas agora-->
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
    <script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="public/assets/js/jquery.mask.js"></script>
    <script src="public/assets/js/jquery.maskedinput.js"></script>
    <script src="public/assets/js/script.js"></script>
</head>

<body id="body">
<<<<<<< HEAD
    <div class="d-flex flex-column min-vh-100">
        <nav class="nav navbar d-flex justify-content-between mx-0 gerenciamento">
            <div class="col-md-3">
                <button type="button" class="btn btn-painel py-1 px-2"><a href="gerenciamento">Painel de gerenciamento</a></button>
            </div>
            <div class="col-md-2 img-logo">
                <img src="public/assets/images/Logo1.png" alt="Logo do atelie VBatelie">
            </div>
        </nav>

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de contas</h2>

        <form id="newConta" class="row g-4 m-4">
=======

    <div class="container mt-4">
        <h2 class="text-center mb-4">Gerenciamento de Contas</h2>

        <!-- Formulário para adicionar nova conta -->
        <form id="newConta" class="row g-3 mb-4">
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
            <div class="col-md-4">
                <label for="mes" class="form-label">Mês</label>
                <input type="text" class="form-control" id="mes" name="mes" required>
            </div>
            <div class="col-md-4">
                <label for="ano" class="form-label">Ano</label>
                <input type="number" class="form-control" id="ano" name="ano" required>
            </div>
            <div class="col-md-4">
                <label for="idPedidoMaterial" class="form-label">ID Pedido de Material</label>
                <input type="number" class="form-control" id="idPedidoMaterial" name="idPedidoMaterial" required>
            </div>
            <div class="col-md-4">
                <label for="idServContratado" class="form-label">ID Serviço Contratado</label>
                <input type="number" class="form-control" id="idServContratado" name="idServContratado" required>
            </div>
            <div class="col-md-4">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>
            <div class="col-md-4">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
            </div>
            <div class="col-md-4">
                <label for="dtPag" class="form-label">Data de Pagamento</label>
                <input type="date" class="form-control" id="dtPag" name="dtPag" required>
            </div>
            <div class="col-md-4">
                <label for="sitPag" class="form-label">Situação de Pagamento</label>
                <input type="text" class="form-control" id="sitPag" name="sitPag" required>
            </div>
            <div class="col-12">
<<<<<<< HEAD
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar Conta</button>
            </div>
        </form>
=======
                <button type="submit" class="btn btn-primary">Adicionar Conta</button>
            </div>
        </form>

        <!-- Contêiner para exibir a tabela de contas -->
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        <div id="tableContasContainer"></div>
    </div>

    <script>
<<<<<<< HEAD
        var ctrlContasUrl = "contas";
        var listAllContas = "contas";
        var labelsContas = ['idContas', 'mes', 'ano', 'idPedidoMaterial', 'idServContratado', 'tipo', 'preco', 'dtPag', 'sitPag'];

        $(document).ready(function() {
            loadTable(listAllContas, labelsContas, ctrlContasUrl);

            $('#newConta').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
=======
        // URLs e nomes usados no controle de contas
        var ctrlContasUrl = "contas"; // Rota do controle de contas
        var listAllContas = "contas"; // Rota da função list all
        var labelsContas = ['idContas', 'mes', 'ano', 'idPedidoMaterial', 'idServContratado', 'tipo', 'preco', 'dtPag', 'sitPag']; // Campos da tabela

        // Função executada quando o documento está pronto
        $(document).ready(function() {
            // Carrega a tabela de contas ao carregar a página
            loadTable(listAllContas, labelsContas, ctrlContasUrl);

            // Manipula o evento de envio do formulário para adicionar nova conta
            $('#newConta').on('submit', function(e) {
                e.preventDefault(); // Evita eventos pré-definidos da página, como recarregar
                var formData = $(this).serialize(); // Serializa os dados do formulário
                // Envia uma requisição AJAX para adicionar uma nova conta
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                $.ajax({
                    url: ctrlContasUrl,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Conta adicionada com sucesso!');
<<<<<<< HEAD
                        loadTable(listAllContas, labelsContas, ctrlContasUrl);
                    },
                    error: function(xhr, status, error) {
                        alert('Erro ao adicionar conta. Detalhes: ' + error);
                    }
                });

            });
        });

        function saveFormData(idform) {
            var formData = $("#" + idform).serializeArray();
            var jsonData = {};

            formData.forEach(function(entry) {
                jsonData[entry.name] = entry.value;
            });

            console.log("Dados enviados para o servidor:", jsonData);

            $.ajax({
                url: ctrlContasUrl + '?action=save',
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded',
                data: JSON.stringify(jsonData),
                success: function(response) {
                    // console.log("Resposta do servidor após salvar:", response);
                    alert('Contas editado com sucesso!');
                    loadTable(listAllContas, labelsContas, ctrlContasUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Contas:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Contas.');
                }

            });
        }

        function delFormData(idform) {
            var formData = $("#" + idform).serialize();
            $.ajax({
                url: ctrlContasUrl,
                method: 'DELETE',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
                success: function(response) {
                    alert('Conta excluída com sucesso!');
                    loadTable(listAllContas, labelsContas, ctrlContasUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao excluir a conta: ", error);
                    console.log("Resposta do servidor após erro: ", xhr.responseText);
                    alert('Erro ao excluir a conta.');
                }
            });
        }

        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
=======
                        // Recarrega a tabela após adicionar uma nova conta
                        loadTable(listAllContas, labelsContas, ctrlContasUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar conta.');
                    }
                });
            });
        });

        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
            // Envia uma requisição AJAX para obter os dados da tabela
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
            $.ajax({
                url: urlDataTable,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
<<<<<<< HEAD
                    var tableHtml = '<div class="table-responsive m-4" style="overflow-x: auto;">';
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">';

                    tableHtml += '<thead class="table-header">';
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>';
=======
                    var tableHtml = '<div class="table-responsive" style="overflow-x: auto;">'; // Adiciona estilo para a barra de rolagem horizontal
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">'; // Define um máximo de largura para a tabela

                    tableHtml += '<thead><tr>';

                    // Cria cabeçalhos da tabela com base nos rótulos fornecidos
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>'; // Capitaliza os rótulos
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    });

                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

<<<<<<< HEAD
=======
                    // Preenche os dados na tabela
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    $.each(data, function(i, conta) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
<<<<<<< HEAD
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsContas[i] + '" form="' + formId + '" value="' + (conta[label] || '') + '" >' +
                                '</td>';
                        });

                        tableHtml +=
                            '<td>' +
                            '<button class="btn btnSave" onclick="saveFormData( \'' + formId + '\' );" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btnDelete" onclick="delFormData( \'' + formId + '\' );" >Excluir</button>' +
=======
                        // Preenche as células da tabela com os dados da conta
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
                                '<input type="text" name="' + labelsContas[i] + '" form="' + formId + '" value="' + (conta[label] || '') + '" >' +
                                '</td>'; // Usa || '' para evitar valores nulos
                        });
                        // Adiciona botões de ação para salvar e excluir
                        tableHtml +=
                            '<td>' +
                            '<button class="btn btn-primary btnSave" onclick="saveFormData( \'' + formId + '\' );" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btn-danger btnDelete" onclick="delFormData( \'' + formId + '\' );" >Excluir</button>' +
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                            '</td>' +
                            '</tr>';
                        tableHtml += '</form">';
                    });

                    tableHtml += '</tbody></table>';
                    tableHtml += '</div>'
<<<<<<< HEAD
=======
                    // Exibe a tabela no contêiner especificado
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    $('#tableContasContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar contas.');
                }
            });
        }
<<<<<<< HEAD
    </script>

    <footer class="py-3">
        <div class="mt-3 meraki d-flex align-items-center justify-content-center">
            <a href="https://talentosdoifsp.gru.br/meraki/" class="d-flex">
                <img src="public/assets/images/logo_meraki.png" alt="Logo da Meraki">
                <h6 class="ms-1">Desenvolvido por Meraki</h6>
            </a>
        </div>
    </footer>
=======

        // Função para salvar os dados do formulário
        function saveFormData(idform) {
            var formData = $("#" + idform).serializeArray();
            var jsonData = {};

            // Converte o array de dados serializados em um objeto
            formData.forEach(function(entry) {
                jsonData[entry.name] = entry.value;
            });

            // Adicione logs para depuração
            console.log("Dados enviados para o servidor:", jsonData);

            // Envia uma requisição AJAX para salvar as alterações no Contas
            $.ajax({
                url: ctrlContasUrl + '?action=save',
                method: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify(jsonData),
                success: function(response) {
                    // Adicione logs para depuração
                    console.log("Resposta do servidor após salvar:", response);

                    alert('Contas editado com sucesso!');
                    loadTable(listAllMateriais, labelsContas, ctrlContasUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Contas:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Contas.');
                }

            });
        }
        // Função para deletar os dados do formulário
        function delFormData(idform) {
            var formData = $("#" + idform).serialize();
            // Envia uma requisição AJAX para deletar os dados
            $.ajax({
                url: ctrlContasUrl,
                method: 'POST',
                data: formData + '&action=delete', // Adiciona a ação 'delete' aos dados do formulário
                success: function(response) {
                    alert('Conta excluída com sucesso!');
                    // Recarrega a tabela após excluir os dados
                    loadTable(listAllContas, labelsContas, ctrlContasUrl);
                },
                error: function() {
                    alert('Erro ao excluir a conta.');
                }
            });
        }
    </script>
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
</body>

</html>