<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Gerenciamento de catálogo</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">

=======
    <title>Gerenciamento do catálogo</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">

    <!-- Links das bibliotecas, estão internas agora-->
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de catálogo</h2>

        <form id="newCatalogo" class="row g-4 m-4">
            <div class="col-md-6">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="col-md-6">
=======

    <div class="container mt-4">
        <h2 class="text-center mb-4">Gerenciamento de Catálogo</h2>

        <!-- Formulário para adicionar novo item de catálogo -->
        <form id="newCatalogo" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="col-md-4">
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-12">
<<<<<<< HEAD
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar catálogo</button>
            </div>
        </form>
=======
                <button type="submit" class="btn btn-primary">Adicionar Item</button>
            </div>
        </form>

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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
<<<<<<< HEAD
                
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
=======

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
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    }
                });
            });
        });

<<<<<<< HEAD
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

=======
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
            $.ajax({
                url: urlDataTable,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
<<<<<<< HEAD
                    var tableHtml = '<div class="table-responsive m-4" style="overflow-x: auto;">';
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">';

                    tableHtml += '<thead class="table-header">';
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>';
                    });
                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    $.each(data, function(i, catalogo) {
=======
                    var tableHtml = '<div class="table-responsive" style="overflow-x: auto;">'; // Adiciona estilo para a barra de rolagem horizontal
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">'; // Define um máximo de largura para a tabela

                    tableHtml += '<thead><tr>';

                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>'; // Capitaliza os rótulos
                    });

                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    $.each(data, function(i, item) {
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
<<<<<<< HEAD
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsDataTable[i] + '" form="' + formId + '" value="' + (catalogo[label] || '') + '" >' +
=======
                            tableHtml += '<td>' +
                                '<input type="text" name="' + labelsDataTable[i] + '" form="' + formId + '" value="' + (item[label] || '') + '" >' +
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                                '</td>';
                        });
                        tableHtml +=
                            '<td>' +
<<<<<<< HEAD
                            '<button class="btn btnSave" onclick="saveFormData( \'' + formId + '\' );" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btnDelete" onclick="delFormData( \'' + formId + '\' );" >Excluir</button>' +
=======
                            '<button class="btn btn-primary btnSave" onclick="saveFormData( \'' + formId + '\' );" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btn-danger btnDelete" onclick="delFormData( \'' + formId + '\' );" >Excluir</button>' +
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                            '</td>' +
                            '</tr>';
                        tableHtml += '</form">';
                    });

                    tableHtml += '</tbody></table>';
<<<<<<< HEAD
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
=======
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
                    url: ctrlCatalogoUrl,
                    method: 'DELETE',
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
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
</body>

</html>