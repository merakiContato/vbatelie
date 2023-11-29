<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de pedidos</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">

    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">

    <script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="public/assets/js/jquery.mask.js"></script>
    <script src="public/assets/js/jquery.maskedinput.js"></script>
    <script src="public/assets/js/script.js"></script>
</head>

<body id="body">
    <div class="d-flex flex-column min-vh-100">

        <nav class="nav navbar d-flex justify-content-between mx-0 gerenciamento">
            <div class="col-md-2"></div>
            <div class="col-md-2 img-logo">
                <img src="public/assets/images/Logo1.png" alt="Logo do atelie VBatelie">
            </div>
        </nav>

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de pedidos</h2>

        <form id="newPedido" class="formgeren row g-4 m-4">
            <div class="col-md-4">
                <label for="cpf" class="form-label mb-2">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required placeholder="Insira o CPF">
            </div>
            <div class="col-md-4">
                <label for="idProfissional" class="form-label mb-2">ID Profissional</label>
                <input type="number" class="form-control" id="idProfissional" name="idProfissional" required placeholder="Insira o ID do Profissional">
            </div>
            <div class="col-md-4">
                <label for="valorOrcamento" class="form-label mb-2">Valor do Orçamento</label>
                <input type="number" step="0.01" class="form-control" id="valorOrcamento" name="valorOrcamento" required placeholder="Insira o valor do orçamento">
            </div>
            <div class="col-md-4">
                <label for="idServico" class="form-label mb-2">ID Serviço</label>
                <input type="number" class="form-control" id="idServico" name="idServico" required placeholder="Insira o ID do Serviço">
            </div>
            <div class="col-md-4">
                <label for="valorEntrada" class="form-label mb-2">Valor de Entrada</label>
                <input type="number" step="0.01" class="form-control" id="valorEntrada" name="valorEntrada" required placeholder="Insira o valor de entrada">
            </div>
            <div class="col-md-4">
                <label for="valorFinal" class="form-label mb-2">Valor Final</label>
                <input type="number" step="0.01" class="form-control" id="valorFinal" name="valorFinal" required placeholder="Insira o valor final">
            </div>
            <div class="col-md-4">
                <label for="medidasPedido" class="form-label mb-2">Medidas do Pedido</label>
                <input type="text" class="form-control" id="medidasPedido" name="medidasPedido" placeholder="Insira as medidas do pedido">
            </div>
            <div class="col-md-4">
                <label for="dtPrevIni" class="form-label mb-2">Data Prevista de Início</label>
                <input type="date" class="form-control" id="dtPrevIni" name="dtPrevIni" placeholder="Selecione a data prevista de início">
            </div>
            <div class="col-md-4">
                <label for="dtPagEntrada" class="form-label mb-2">Data de Pagamento da Entrada</label>
                <input type="date" class="form-control" id="dtPagEntrada" name="dtPagEntrada" placeholder="Selecione a data de pagamento da entrada">
            </div>
            <div class="col-md-4">
                <label for="dtFim" class="form-label mb-2">Data de Conclusão</label>
                <input type="date" class="form-control" id="dtFim" name="dtFim" placeholder="Selecione a data de conclusão">
            </div>
            <div class="col-md-4">
                <label for="valorTotalFim" class="form-label mb-2">Valor Total Final</label>
                <input type="number" step="0.01" class="form-control" id="valorTotalFim" name="valorTotalFim" placeholder="Insira o valor total final">
            </div>
            <div class="col-md-4">
                <label for="dtPagFim" class="form-label mb-2">Data de Pagamento Final</label>
                <input type="date" class="form-control" id="dtPagFim" name="dtPagFim" placeholder="Selecione a data de pagamento final">
            </div>
            <div class="col-md-4">
                <label for="tipoPag" class="mb-2">Selecione o tipo do pagamento</label>
                <select id="tipoPag" name="tipoPag" class="form-control" required>
                    <option value="" disabled selected>Escolha o tipo</option>
                    <option value="Débito">Débito</option>
                    <option value="Crédito">Crédito</option>
                    <option value="Dinheiro">Dinheiro</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="sitPag" class="mb-2">Selecione a situação do pagamento</label>
                <select id="sitPag" name="sitPag" class="form-control" required>
                    <option value="" disabled selected>Escolha a situação</option>
                    <option value="Efetuada">Efetuada</option>
                    <option value="Pendente">Pendente</option>
                    <option value="Atrasada">Atrasada</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="dtExpedicao" class="form-label mb-2">Data de Expedição</label>
                <input type="date" class="form-control" id="dtExpedicao" name="dtExpedicao" placeholder="Selecione a data de expedição">
            </div>
            <div class="col-md-4">
                <label for="dtEntrada" class="form-label mb-2">Data de Entrada</label>
                <input type="date" class="form-control" id="dtEntrada" name="dtEntrada" placeholder="Selecione a data de entrada">
            </div>
            <div class="col-md-4">
                <label for="dtCancelamento" class="form-label mb-2">Data de Cancelamento</label>
                <input type="date" class="form-control" id="dtCancelamento" name="dtCancelamento" placeholder="Selecione a data de cancelamento">
            </div>
            <div class="col-md-4">
                <label for="observacao" class="form-label mb-2">Observação</label>
                <input type="text" class="form-control" id="observacao" name="observacao" placeholder="Insira uma observação">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar Pedido</button>
            </div>
        </form>


        <div id="tablePedidoContainer" class="table-responsive"></div>
    </div>

    <script>
        var ctrlPedidoUrl = "pedido";
        var listAllPedido = "pedido";
        var labelsPedido = ['idPedido', 'cpf', 'idProfissional', 'valorOrcamento', 'idServico', 'valorEntrada', 'valorFinal', 'medidasPedido', 'dtPrevIni', 'dtPagEntrada', 'dtFim', 'valorTotalFim', 'dtPagFim', 'tipoPag', 'sitPag', 'dtExpedicao', 'dtEntrada', 'dtCancelamento', 'observacao'];

        $(document).ready(function() {
            loadTable(listAllPedido, labelsPedido, ctrlPedidoUrl);

            $('#newPedido').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: ctrlPedidoUrl,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Pedido adicionado com sucesso!');
                        loadTable(listAllPedido, labelsPedido, ctrlPedidoUrl);
                    },
                    error: function(xhr, status, error) {
                        alert('Erro ao adicionar o pedido. Detalhes: ' + error);
                    }
                });
            });
        });

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

        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
            $.ajax({
                url: urlDataTable,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tableHtml = '<div class="table-responsive m-4" style="overflow-x: auto;">';
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">';

                    tableHtml += '<thead class="table-header">';
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>';
                    });

                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    $.each(data, function(i, pedido) {
                        var formId = "frm" + i;

                        tableHtml += '<tr>';
                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsPedido[i] + '" form="' + formId + '" value="' + (pedido[label] || '') + '" >' +
                                '</td>';
                        });
                        tableHtml +=
                            `<td>` +
                            `<button class="btn btnSave" onclick="saveFormData('${formId}')" >Salvar</button>` +
                            `</td>` +
                            `<td>` +
                            `<button class="btn btnDelete" onclick="delFormData('${formId}')" >Excluir</button>` +
                            `</td>` +
                            `</tr>`;

                        tableHtml += '</form>';
                    });

                    tableHtml += '</tbody></table>';
                    $('#tablePedidoContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar os pedidos.');
                }
            });
        }
    </script>

    <footer class="py-3">
        <div class="mt-3 meraki d-flex align-items-center justify-content-center">
            <a href="https://talentosdoifsp.gru.br/meraki/" class="d-flex">
                <img src="public/assets/images/logo_meraki.png" alt="Logo da Meraki">
                <h6 class="ms-1">Desenvolvido por Meraki</h6>
            </a>
        </div>
    </footer>
</body>

</html>