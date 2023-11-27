<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de clientes</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">
<<<<<<< HEAD
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
=======

    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de clientes</h2>

        <form id="newCliente" class="row g-4 m-4">
            <div class="col-md-4">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
            </div>
=======

    <div class="container mt-4">
        <h2 class="text-center mb-4">Gerenciamento de Cliente</h2>

        <form id="newCliente" class="row g-3 mb-4">
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
            <div class="col-md-4">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-4">
<<<<<<< HEAD
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" pattern="\d{5}-\d{3}" required>
=======
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="col-md-4">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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
<<<<<<< HEAD
                <input type="tel" class="form-control" id="telefone" name="telefone" pattern="\(\d{2}\)\s\d{4,5}-\d{4}" required>
=======
                <input type="text" class="form-control" id="telefone" name="telefone" required>
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
<<<<<<< HEAD
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar Cliente</button>
            </div>
        </form>
=======
                <button type="submit" class="btn btn-primary">Adicionar Cliente</button>
            </div>
        </form>

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        <div id="tableClienteContainer"></div>
    </div>

    <script>
        var ctrlClienteUrl = "cliente";
        var listAllCliente = "cliente";
        var labelsCliente = ['cpf', 'nome', 'cep', 'endereco', 'complemento', 'telefone', 'email'];

<<<<<<< HEAD
        // Função que é executada quando o documento está pronto
        $(document).ready(function() {
             // Carrega a tabela de cliente ao carregar a página
            loadTable(listAllCliente, labelsCliente, ctrlClienteUrl);

            // Manipula o evento de envio do formulário para adicionar novo cliente
            $('#newCliente').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                // Envia uma requisição AJAX para adicionar um novo cliente
=======
        $(document).ready(function() {
            loadTable(listAllCliente, labelsCliente, ctrlClienteUrl);

            $('#newCliente').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                $.ajax({
                    url: ctrlClienteUrl,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
<<<<<<< HEAD
                        console.log('Cliente adicionado com sucesso!', response);
                         // Recarrega a tabela após adicionar um novo material
                        loadTable(listAllCliente, labelsCliente, ctrlClienteUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar material.');
                    }
                });

            });
        });

         // Função para salvar os dados do formulário
        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();

            // Envia uma requisição AJAX para salvar as alterações no Material
            $.ajax({
                url: ctrlClienteUrl,
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded', // Alterado para o tipo de conteúdo correto
                data: formData,
                success: function(response) {
                    alert('Cliente editado com sucesso!');
                    loadTable(listAllCliente, labelsCliente, ctrlClienteUrl);
                },
                error: function() {
                    alert('Erro ao salvar as alterações no cliente.');
                }
            });
        }

        // Função para excluir os dados do formulário
        function delFormData(idform) {
            var formData = $("#" + idform).serialize();
            // Envia uma requisição AJAX para excluir o cliente
            $.ajax({
                url: ctrlClienteUrl,
                method: 'DELETE',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
                success: function(response) {
                    alert('Cliente excluído com sucesso!');
                    // Recarrega a tabela após excluir o cliente
                    loadTable(listAllCliente, labelsCliente, ctrlClienteUrl);
                },
                error: function() {
                    alert('Erro ao excluir o cliente.');
                }
            });
        }

=======
                        alert('Cliente adicionado com sucesso!');
                        loadTable(listAllCliente, labelsCliente, ctrlClienteUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar cliente.');
                    }
                });
            });
        });

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
=======
                    var tableHtml = '<div class="table-responsive" style="overflow-x: auto;">';
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">';

                    tableHtml += '<thead><tr>';

                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>';
                    });

                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    $.each(data, function(i, cliente) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
<<<<<<< HEAD
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsCliente[i] + '" form="' + formId + '" value="' + (cliente[label] || '') + '" >' +
                                '</td>';
                        });
                        //tableHtml += '<input type="hidden" name="idServico" form="' + formId + '" value="' + cliente['cpf'] + '" >';
                        tableHtml +=
                            '<td>' +
                            '<button class="btn btnSave" onclick="saveFormData( \'' + formId + '\' );" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btnDelete" onclick="delFormData( \'' + formId + '\' );" >Excluir</button>' +
=======
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
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                            '</td>' +
                            '</tr>';
                        tableHtml += '</form">';
                    });
<<<<<<< HEAD
                    tableHtml += '</tbody></table>';
                    $('#tableClienteContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar cliente.');
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
                method: 'PUT',
                data: formData,
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
                method: 'DELETE',
                data: formData,
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
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
</body>

</html>