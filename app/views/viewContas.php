<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de contas</title>
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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de contas</h2>

        <form id="newConta" class="formgeren row g-4 m-4">
            <div class="col-md-4">
                <label for="mes" class="mb-2">Selecione o mês:</label>
                <select id="mes" name="mes" class="form-control" required>
                    <option value="" disabled selected>Escolha o mês</option>
                    <option value="Janeiro">Janeiro</option>
                    <option value="Fevereiro">Fevereiro</option>
                    <option value="Março">Março</option>
                    <option value="Abril">Abril</option>
                    <option value="Maio">Maio</option>
                    <option value="Junho">Junho</option>
                    <option value="Julho">Julho</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Setembro">Setembro</option>
                    <option value="Outubro">Outubro</option>
                    <option value="Novembro">Novembro</option>
                    <option value="Dezembro">Dezembro</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="ano" class="form-label mb-2">Ano</label>
                <input type="number" class="form-control" id="ano" name="ano" pattern="\d{4}" required placeholder="Ex: 2023">
            </div>
            <div class="col-md-4">
                <label for="idPedidoMaterial" class="form-label mb-2">ID Pedido de Material</label>
                <input type="number" class="form-control" id="idPedidoMaterial" name="idPedidoMaterial" required placeholder="Ex: 123">
            </div>
            <div class="col-md-4">
                <label for="idServContratado" class="form-label mb-2">ID Serviço Contratado</label>
                <input type="number" class="form-control" id="idServContratado" name="idServContratado" required placeholder="Ex: 456">
            </div>
            <div class="col-md-4">
                <label for="tipo" class="mb-2">Selecione o tipo da conta</label>
                <select id="tipo" name="tipo" class="form-control" required>
                    <option value="" disabled selected>Escolha o tipo</option>
                    <option value="Água">Água</option>
                    <option value="Luz">Luz</option>
                    <option value="Internet">Internet</option>
                    <option value="Pagamento funcionário">Pagamento funcionário</option>
                    <option value="Material">Material</option>
                    <option value="Emergência">Emergência</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="preco" class="form-label mb-2">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" required placeholder="Ex: 150.00">
            </div>
            <div class="col-md-4 custom-date">
                <label for="dtPag" class="form-label mb-2">Data de Pagamento</label>
                <input type="date" class="form-control" id="dtPag" name="dtPag" required>
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
            <div class="col-12">
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar Conta</button>
            </div>
        </form>

        <div id="tableContasContainer"></div>
    </div>

    <script>
        var ctrlContasUrl = "contas";
        var listAllContas = "contas";
        var labelsContas = ['idContas', 'mes', 'ano', 'idPedidoMaterial', 'idServContratado', 'tipo', 'preco', 'dtPag', 'sitPag'];

        $(document).ready(function() {
            loadTable(listAllContas, labelsContas, ctrlContasUrl);

            $('#newConta').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: ctrlContasUrl,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Conta adicionada com sucesso!');
                        loadTable(listAllContas, labelsContas, ctrlContasUrl);
                    },
                    error: function(xhr, status, error) {
                        alert('Erro ao adicionar conta. Detalhes: ' + error);
                    }
                });
            });
        });

        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();

            // Envia uma requisição AJAX para salvar as alterações no Material
            $.ajax({
                url: ctrlContasUrl,
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded', // Alterado para o tipo de conteúdo correto
                data: formData,
                success: function(response) {
                    alert('Contas editado com sucesso!');
                    loadTable(listAllContas, labelsContas, ctrlContasUrl);
                },
                error: function() {
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
            $.ajax({
                url: urlDataTable,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tableHtml = '<div class="table-responsive m-4" style="overflow-x: auto;">';
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">';

                    tableHtml += '<thead class="table-header">';
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>';
                    });

                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    $.each(data, function(i, conta) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsContas[i] + '" form="' + formId + '" value="' + (conta[label] || '') + '" >' +
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
                    tableHtml += '</div>'
                    $('#tableContasContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar contas.');
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