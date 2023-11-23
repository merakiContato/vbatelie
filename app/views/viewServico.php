<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de serviços</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">

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
        <h2 class="text-center mb-4">Gerenciamento de Serviço</h2>

        <form id="newServico" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-4">
                <label for="idCatalogo" class="form-label">ID Catálogo</label>
                <input type="number" class="form-control" id="idCatalogo" name="idCatalogo" required>
            </div>
            <div class="col-md-4">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="col-md-4">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Adicionar Serviço</button>
            </div>
        </form>

        <div id="tableServicoContainer"></div>
    </div>

    <script>
        var ctrlServicoUrl = "servico";
        var listAllServico = "servico";
        var labelsServico = ['idServico', 'nome', 'idCatalogo', 'descricao', 'preco'];

        $(document).ready(function() {
            loadTable(listAllServico, labelsServico, ctrlServicoUrl);

            $('#newServico').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: ctrlServicoUrl,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Serviço adicionado com sucesso!');
                        loadTable(listAllServico, labelsServico, ctrlServicoUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar serviço.');
                    }
                });
            });
        });


        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();
            console.log(formData);
            // Envia uma requisição AJAX para salvar as alterações no Material
            $.ajax({
                url: ctrlServicoUrl,
                method: 'PUT',
                success: function(response) {
                    console.log(response);
                    alert('Servico editado com sucesso!');
                    loadTable(listAllMateriais, labelsServico, ctrlServicoUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Servico:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Servico.');
                }

            });
        }

        function delFormData(idform) {
            var formData = $("#" + idform).serialize();
            console.log(formData);
            return;
            // Envia uma requisição AJAX para excluir o material
            $.ajax({
                url: ctrlServicoUrl,
                method: 'DELETE',
                data: formData,
                success: function(response) {
                	console.log(response);
                    alert('Servico excluído com sucesso!');
                    // Recarrega a tabela após excluir o Servico
                    loadTable(listAllMateriais, labelsServico, ctrlServicoUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao excluir o Servico:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao excluir o Servico.');
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
                    $.each(data, function(i, servico) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        // Preenche as células da tabela com os dados do material
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
                                '<input type="text" name="' + labelsServico[i] + '" form="' + formId + '" value="' + (servico[label] || '') + '" >'

                                +
                                '</td>'; // Usa || '' para evitar valores nulos
                        });

                        // Adicione um campo oculto para armazenar o idMaterial
                        tableHtml += '<input type="hidden" name="idServico" form="' + formId + '" value="' + servico['idServico'] + '" >';

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
                    $('#tableServicoContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar Serviço.');
                }
            });
        }
    </script>
</body>

</html>