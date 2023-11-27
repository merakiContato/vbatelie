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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de pedidos</h2>

        <form id="newPedido" class="row g-4 m-4">
=======

    <div class="container mt-4">
        <h2 class="text-center mb-4">Gerenciamento de Pedidos</h2>

        <form id="newPedido" class="row g-3 mb-4">
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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
<<<<<<< HEAD
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar Pedido</button>
=======
                <button type="submit" class="btn btn-primary">Adicionar Pedido</button>
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
            </div>
        </form>

        <div id="tablePedidoContainer" class="table-responsive"></div>
    </div>

    <script>
<<<<<<< HEAD
        var ctrlPedidoUrl = "pedido";
        var listAllPedido = "pedido";
=======
        var ctrlPedidoUrl = "ctrlPedido";
        var listAllPedido = "ctrlPedido";
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        var labelsPedido = ['idPedido', 'cpf', 'idProfissional', 'valorOrcamento', 'idServico', 'valorEntrada', 'valorFinal', 'medidasPedido', 'dtPrevIni', 'dtPagEntrada', 'dtFim', 'valorTotalFim', 'dtPagFim', 'tipoPag', 'sitPag', 'dtExpedicao', 'dtEntrada', 'dtCancelamento', 'observacao'];

        $(document).ready(function() {
            loadTable(listAllPedido, labelsPedido, ctrlPedidoUrl);

            $('#newPedido').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: ctrlPedidoUrl,
<<<<<<< HEAD
                    method: 'POST',
=======
                    type: 'POST',
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    data: formData,
                    success: function(response) {
                        alert('Pedido adicionado com sucesso!');
                        loadTable(listAllPedido, labelsPedido, ctrlPedidoUrl);
                    },
<<<<<<< HEAD
                    error: function(xhr, status, error) {
                        alert('Erro ao adicionar o pedido. Detalhes: ' + error);
=======
                    error: function() {
                        alert('Erro ao adicionar o pedido.');
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    }
                });
            });
        });

<<<<<<< HEAD
        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();

            $.ajax({
                url: ctrlPedidoUrl,
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
                success: function(response) {
                    alert('Pedido editado com sucesso!');
                    loadTable(listAllPedido, labelsPedido, ctrlPedidoUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no pedido: ", error);
                    console.log("Resposta do servidor após erro: ", xhr.responseText);
                    alert('Erro ao salvar as alterações no pedido.');
                }
            });
        }

        function delFormData(idform) {
            var formData = $("#" + idform).serialize();

            $.ajax({
                url: ctrlPedidoUrl,
                method: 'DELETE',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
                success: function(response) {
                    alert('Pedido excluído com sucesso!');
                    loadTable(listAllPedido, labelsPedido, ctrlPedidoUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no pedido: ", error);
                    console.log("Resposta do servidor após erro: ", xhr.responseText);
                    alert('Erro ao salvar as alterações no pedido.');
                }
            });
        }

=======
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
            $.ajax({
                url: urlDataTable,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
<<<<<<< HEAD
                    var tableHtml = '<div class="table-responsive m-4" style="overflow-x: auto;">';
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">';

                    tableHtml += '<thead class="table-header">';
=======
                    var tableHtml = '<table class="table table-striped">';
                    tableHtml += '<thead><tr>';

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>';
                    });

                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    $.each(data, function(i, pedido) {
                        var formId = "frm" + i;

                        tableHtml += '<tr>';
                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
<<<<<<< HEAD
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsPedido[i] + '" form="' + formId + '" value="' + (pedido[label] || '') + '" >' +
=======
                            tableHtml += '<td>' +
                                '<input type="text" name="' + labelsPedido[i] + '" form="' + formId + '" value="' + (pedido[label] || '') + '" >' +
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                                '</td>';
                        });
                        tableHtml +=
                            '<td>' +
<<<<<<< HEAD
                            '<button class="btn btnSave" onclick="saveFormData(\'' + formId + '\');" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btnDelete" onclick="delFormData(\'' + formId + '\');" >Excluir</button>' +
=======
                            '<button class="btn btn-primary btnSave" onclick="saveFormData(\'' + formId + '\');" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btn-danger btnDelete" onclick="delFormData(\'' + formId + '\');" >Excluir</button>' +
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
</body>

</html>