<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de clientes</title>
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
        <h2 class="text-center mb-4">Gerenciamento de Cliente</h2>

        <form id="newCliente" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-4">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="col-md-4">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
            </div>
            <div class="col-md-4">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
            <div class="col-md-4">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" required>
            </div>
            <div class="col-md-4">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Adicionar Cliente</button>
            </div>
        </form>

        <div id="tableClienteContainer"></div>
    </div>

    <script>
        var ctrlClienteUrl = "ctrlCliente";
        var listAllCliente = "ctrlCliente";
        var labelsCliente = ['cpf', 'nome', 'cep', 'endereco', 'complemento', 'telefone', 'email'];

        $(document).ready(function() {
            loadTable(listAllCliente, labelsCliente, ctrlClienteUrl);

            $('#newCliente').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: ctrlClienteUrl,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Cliente adicionado com sucesso!');
                        loadTable(listAllCliente, labelsCliente, ctrlClienteUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar cliente.');
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

                    $.each(data, function(i, cliente) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
                                '<input type="text" name="' + labelsDataTable[i] + '" form="' + formId + '" value="' + (cliente[label] || '') + '" >' +
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
                    $('#tableClienteContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar clientes.');
                }
            });
        }

        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();
            $.ajax({
                url: ctrlClienteUrl,
                type: 'POST',
                data: formData + '&action=save',
                success: function(response) {
                    alert('Cliente editado com sucesso!');
                    loadTable(listAllCliente, labelsCliente, ctrlClienteUrl);
                },
                error: function() {
                    alert('Erro ao salvar as alterações no cliente.');
                }
            });
        }

        function delFormData(idform) {
            var formData = $("#" + idform).serialize();
            $.ajax({
                url: ctrlClienteUrl,
                type: 'POST',
                data: formData + '&action=delete',
                success: function(response) {
                    alert('Cliente excluído com sucesso!');
                    loadTable(listAllCliente, labelsCliente, ctrlClienteUrl);
                },
                error: function() {
                    alert('Erro ao excluir o cliente.');
                }
            });
        }
    </script>
</body>

</html>