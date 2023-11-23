<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de pedidos</title>
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
        <h2 class="text-center mb-4">Gerenciamento de Pedidos</h2>

        <form id="newPedido" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="col-md-4">
                <label for="idProfissional" class="form-label">ID Profissional</label>
                <input type="number" class="form-control" id="idProfissional" name="idProfissional" required>
            </div>
            <div class="col-md-4">
                <label for="valorOrcamento" class="form-label">Valor do Orçamento</label>
                <input type="number" step="0.01" class="form-control" id="valorOrcamento" name="valorOrcamento" required>
            </div>
            <div class="col-md-4">
                <label for="idServico" class="form-label">ID Serviço</label>
                <input type="number" class="form-control" id="idServico" name="idServico" required>
            </div>
            <div class="col-md-4">
                <label for="valorEntrada" class="form-label">Valor de Entrada</label>
                <input type="number" step="0.01" class="form-control" id="valorEntrada" name="valorEntrada" required>
            </div>
            <div class="col-md-4">
                <label for="valorFinal" class="form-label">Valor Final</label>
                <input type="number" step="0.01" class="form-control" id="valorFinal" name="valorFinal" required>
            </div>
            <div class="col-md-4">
                <label for="medidasPedido" class="form-label">Medidas do Pedido</label>
                <input type="text" class="form-control" id="medidasPedido" name="medidasPedido">
            </div>
            <div class="col-md-4">
                <label for="dtPrevIni" class="form-label">Data Prevista de Início</label>
                <input type="date" class="form-control" id="dtPrevIni" name="dtPrevIni">
            </div>
            <div class="col-md-4">
                <label for="dtPagEntrada" class="form-label">Data de Pagamento da Entrada</label>
                <input type="date" class="form-control" id="dtPagEntrada" name="dtPagEntrada">
            </div>
            <div class="col-md-4">
                <label for="dtFim" class="form-label">Data de Conclusão</label>
                <input type="date" class="form-control" id="dtFim" name="dtFim">
            </div>
            <div class="col-md-4">
                <label for="valorTotalFim" class="form-label">Valor Total Final</label>
                <input type="number" step="0.01" class="form-control" id="valorTotalFim" name="valorTotalFim">
            </div>
            <div class="col-md-4">
                <label for="dtPagFim" class="form-label">Data de Pagamento Final</label>
                <input type="date" class="form-control" id="dtPagFim" name="dtPagFim">
            </div>
            <div class="col-md-4">
                <label for="tipoPag" class="form-label">Tipo de Pagamento</label>
                <input type="text" class="form-control" id="tipoPag" name="tipoPag">
            </div>
            <div class="col-md-4">
                <label for="sitPag" class="form-label">Situação de Pagamento</label>
                <input type="text" class="form-control" id="sitPag" name="sitPag">
            </div>
            <div class="col-md-4">
                <label for="dtExpedicao" class="form-label">Data de Expedição</label>
                <input type="date" class="form-control" id="dtExpedicao" name="dtExpedicao">
            </div>
            <div class="col-md-4">
                <label for="dtEntrada" class="form-label">Data de Entrada</label>
                <input type="date" class="form-control" id="dtEntrada" name="dtEntrada">
            </div>
            <div class="col-md-4">
                <label for="dtCancelamento" class="form-label">Data de Cancelamento</label>
                <input type="date" class="form-control" id="dtCancelamento" name="dtCancelamento">
            </div>
            <div class="col-md-4">
                <label for="observacao" class="form-label">Observação</label>
                <input type="text" class="form-control" id="observacao" name="observacao">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Adicionar Pedido</button>
            </div>
        </form>

        <div id="tablePedidoContainer" class="table-responsive"></div>
    </div>

    <script>
        var ctrlPedidoUrl = "ctrlPedido";
        var listAllPedido = "ctrlPedido";
        var labelsPedido = ['idPedido', 'cpf', 'idProfissional', 'valorOrcamento', 'idServico', 'valorEntrada', 'valorFinal', 'medidasPedido', 'dtPrevIni', 'dtPagEntrada', 'dtFim', 'valorTotalFim', 'dtPagFim', 'tipoPag', 'sitPag', 'dtExpedicao', 'dtEntrada', 'dtCancelamento', 'observacao'];

        $(document).ready(function() {
            loadTable(listAllPedido, labelsPedido, ctrlPedidoUrl);

            $('#newPedido').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: ctrlPedidoUrl,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Pedido adicionado com sucesso!');
                        loadTable(listAllPedido, labelsPedido, ctrlPedidoUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar o pedido.');
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
                    var tableHtml = '<table class="table table-striped">';
                    tableHtml += '<thead><tr>';

                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>';
                    });

                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    $.each(data, function(i, pedido) {
                        var formId = "frm" + i;

                        tableHtml += '<tr>';
                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
                                '<input type="text" name="' + labelsPedido[i] + '" form="' + formId + '" value="' + (pedido[label] || '') + '" >' +
                                '</td>';
                        });
                        tableHtml +=
                            '<td>' +
                            '<button class="btn btn-primary btnSave" onclick="saveFormData(\'' + formId + '\');" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btn-danger btnDelete" onclick="delFormData(\'' + formId + '\');" >Excluir</button>' +
                            '</td>' +
                            '</tr>';
                        tableHtml += '</form">';
                    });

                    tableHtml += '</tbody></table>';
                    $('#tablePedidoContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar os pedidos.');
                }
            });
        }

        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();
            $.ajax({
                url: ctrlPedidoUrl,
                type: 'POST',
                data: formData + '&action=save',
                success: function(response) {
                    alert('Pedido editado com sucesso!');
                    loadTable(listAllPedido, labelsPedido, ctrlPedidoUrl);
                },
                error: function() {
                    alert('Erro ao salvar as alterações no pedido.');
                }
            });
        }

        function delFormData(idform) {
            var formData = $("#" + idform).serialize();
            $.ajax({
                url: ctrlPedidoUrl,
                type: 'POST',
                data: formData + '&action=delete',
                success: function(response) {
                    alert('Pedido excluído com sucesso!');
                    loadTable(listAllPedido, labelsPedido, ctrlPedidoUrl);
                },
                error: function() {
                    alert('Erro ao excluir o pedido.');
                }
            });
        }
    </script>
</body>

</html>