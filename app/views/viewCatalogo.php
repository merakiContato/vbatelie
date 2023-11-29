<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de catálogo</title>
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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de catálogo</h2>

        <form id="newCatalogo" class="formgeren row g-4 m-4">
            <div class="col-md-6">
                <label for="descricao" class="form-label mb-2">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required placeholder="Digite a descrição do catálogo">
            </div>
            <div class="col-md-6">
                <label for="nome" class="form-label mb-2">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required placeholder="Digite o nome do catálogo">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar catálogo</button>
            </div>
        </form>

        <div id="tableCatalogoContainer"></div>
    </div>

    <script>
        var ctrlCatalogoUrl = "catalogo";
        var listAllCatalogo = "catalogo";
        var labelsCatalogo = ['idCatalogo', 'descricao', 'nome'];

        $(document).ready(function() {
            loadTable(listAllCatalogo, labelsCatalogo, ctrlCatalogoUrl);

            $('#newCatalogo').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                // Envia uma requisição AJAX para adicionar um novo catalogo
                $.ajax({
                    url: ctrlCatalogoUrl,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Catálogo adicionado com sucesso!');
                        // Recarrega a tabela após adicionar um novo catalogo
                        loadTable(listAllCatalogo, labelsCatalogo, ctrlCatalogoUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar catálogo.');
                    }
                });
            });
        });

        // Função para salvar os dados do formulário
        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();

            // Envia uma requisição AJAX para salvar as alterações no catalogo
            $.ajax({
                url: ctrlCatalogoUrl,
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded', // Alterado para o tipo de conteúdo correto
                data: formData,
                success: function(response) {
                    alert('Catalogo editado com sucesso!');
                    loadTable(listAllCatalogo, labelsCatalogo, ctrlCatalogoUrl);
                },
                error: function() {
                    alert('Erro ao salvar as alterações no catalogo.');
                }
            });
        }

        function delFormData(formId) {
            var formData = $("#" + idform).serialize();

            // Envia uma requisição AJAX para excluir o catalogo
            $.ajax({
                url: ctrlCatalogoUrl,
                method: 'DELETE',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
                success: function(response) {
                    console.log(response);
                    alert('Catálogo excluído com sucesso!');
                    loadTable(listAllCatalogo, labelsCatalogo, ctrlCatalogoUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao excluir o catálogo: ", error);
                    console.log("Resposta do servidor após erro: ", xhr.responseText);
                    alert('Erro ao excluir o catálogo.');
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

                    $.each(data, function(i, catalogo) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsDataTable[i] + '" form="' + formId + '" value="' + (catalogo[label] || '') + '" >' +
                                '</td>';
                        });
                        tableHtml +=
                            '<td>' +
                            '<button class="btn btnSave" onclick="saveFormData( \'' + formId + '\' );" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btnDelete" onclick="delFormData( \'' + formId + '\' );" >Excluir</button>' +
                            '</td>' +
                            '</tr>';
                        tableHtml += '</form>';
                    });

                    tableHtml += '</tbody></table>';
                    $('#tableCatalogoContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar catálogo.');
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