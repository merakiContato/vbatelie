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

<body class="body">

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
        var ctrlServicoUrl = "ctrlServico";
        var listAllServico = "ctrlServico";
        var labelsServico = ['idServico', 'nome', 'idCatalogo', 'descricao', 'preco'];

        $(document).ready(function() {
            loadTable(listAllServico, labelsServico, ctrlServicoUrl);

            $('#newServico').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: ctrlServicoUrl,
                    type: 'POST',
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

        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
            $.ajax({
                url: urlDataTable,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tableHtml = '<div class="table-responsive" style="overflow-x: auto;">';
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">';

                    tableHtml += '<thead><tr>';

                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>';
                    });

                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    $.each(data, function(i, servico) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
                                '<input type="text" name="' + labelsServico[i] + '" form="' + formId + '" value="' + (servico[label] || '') + '" >' +
                                '</td>';
                        });
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
                    tableHtml += '</div>'
                    $('#tableServicoContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar serviços.');
                }
            });
        }

        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();
            $.ajax({
                url: ctrlServicoUrl,
                type: 'POST',
                data: formData + '&action=save',
                success: function(response) {
                    alert('Serviço editado com sucesso!');
                    loadTable(listAllServico, labelsServico, ctrlServicoUrl);
                },
                error: function() {
                    alert('Erro ao salvar as alterações no serviço.');
                }
            });
        }

        function delFormData(idform) {
            var formData = $("#" + idform).serialize();
            $.ajax({
                url: ctrlServicoUrl,
                type: 'POST',
                data: formData + '&action=delete',
                success: function(response) {
                    alert('Serviço excluído com sucesso!');
                    loadTable(listAllServico, labelsServico, ctrlServicoUrl);
                },
                error: function() {
                    alert('Erro ao excluir o serviço.');
                }
            });
        }
    </script>
</body>

</html>