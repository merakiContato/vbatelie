<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de serviços</title>
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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de serviços</h2>

        <form id="newServico" class="formgeren row g-4 m-4">
            <div class="col-md-4">
                <label for="nome" class="form-label mb-2">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required placeholder="Insira o nome do serviço">
            </div>
            <div class="col-md-4">
                <label for="idCatalogo" class="form-label mb-2">ID Catálogo</label>
                <input type="number" class="form-control" id="idCatalogo" name="idCatalogo" required placeholder="Insira o ID do catálogo">
            </div>
            <div class="col-md-4">
                <label for="descricao" class="form-label mb-2">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required placeholder="Insira a descrição do serviço">
            </div>
            <div class="col-md-4">
                <label for="preco" class="form-label mb-2">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" required placeholder="Insira o preço do serviço">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar Serviço</button>
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

            // Envia uma requisição AJAX para salvar as alterações no Material
            $.ajax({
                url: ctrlServicoUrl + '?action=save',
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded', // Alterado para o tipo de conteúdo correto
                data: formData, // Não é necessário mais o JSON.stringify
                success: function(response) {
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

            console.log("Dados do formulário a serem excluídos:", formData);

            // Envia uma requisição AJAX para excluir o material
            $.ajax({
                url: ctrlServicoUrl,
                method: 'DELETE',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
                success: function(response) {
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

                    $.each(data, function(i, servico) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsServico[i] + '" form="' + formId + '" value="' + (servico[label] || '') + '" >' +
                                '</td>';
                        });

                        tableHtml += '<input type="hidden" name="idServico" form="' + formId + '" value="' + servico['idServico'] + '" >';

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
                    $('#tableServicoContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar Serviço.');
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