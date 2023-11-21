<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento do catálogo</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">

    <!-- Links das bibliotecas, estão internas agora-->
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
        <h2 class="text-center mb-4">Gerenciamento de Catálogo</h2>

        <!-- Formulário para adicionar novo item de catálogo -->
        <form id="newCatalogo" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="col-md-4">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Adicionar Item</button>
            </div>
        </form>

        <div id="tableCatalogoContainer"></div>
    </div>

    <script>
        var ctrlCatalogoUrl = "ctrlCatalogo";
        var listAllCatalogo = "ctrlCatalogo";
        var labelsCatalogo = ['idCatalogo', 'descricao', 'nome'];

        $(document).ready(function() {
            loadTable(listAllCatalogo, labelsCatalogo, ctrlCatalogoUrl);

            $('#newCatalogo').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: ctrlCatalogoUrl,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Item de catálogo adicionado com sucesso!');
                        loadTable(listAllCatalogo, labelsCatalogo, ctrlCatalogoUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar item de catálogo.');
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
                    var tableHtml = '<div class="table-responsive" style="overflow-x: auto;">'; // Adiciona estilo para a barra de rolagem horizontal
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">'; // Define um máximo de largura para a tabela

                    tableHtml += '<thead><tr>';

                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>'; // Capitaliza os rótulos
                    });

                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    $.each(data, function(i, item) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
                                '<input type="text" name="' + labelsDataTable[i] + '" form="' + formId + '" value="' + (item[label] || '') + '" >' +
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
                    $('#tableCatalogoContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar itens de catálogo.');
                }
            });
        }

        function saveFormData(idform) {
            var id = $("#" + idform + " input[name='idCatalogo']").val();
            $.ajax({
                url: ctrlCatalogoUrl + '?action=save&id=' + id,
                type: 'POST',
                success: function(response) {
                    alert('Item do catálogo editado com sucesso!');
                    loadTable(listAllCatalogo, labelsCatalogo, ctrlCatalogoUrl);
                },
                error: function() {
                    alert('Erro ao salvar as alterações no item do catálogo.');
                }
            });
        }

        function delFormData(formId) {
            var idCatalogo = $('#' + formId + ' input[name="idCatalogo"]').val();

            if (confirm('Tem certeza que deseja excluir este item de catálogo?')) {
                $.ajax({
                    url: 'ctrlCatalogo',
                    type: 'delete',
                    data: {
                        idCatalogo: idCatalogo
                    },
                    success: function(response) {

                        if (response === 'success') {
                            loadTable(listAllCatalogo, labelsCatalogo, ctrlCatalogoUrl);
                            alert('Registro excluído com sucesso!');
                        } else {
                            alert('Falha ao excluir o registro do catálogo.');
                        }
                    },
                    error: function() {
                        alert('Erro ao excluir o registro do catálogo.');
                    }
                });
            }
        }
    </script>
</body>

</html>