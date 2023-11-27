<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Gerenciamento de usuários</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">

=======
    <title>Gerenciamento de usuario</title>
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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de usuários</h2>

        <form id="newUsuario" class="row g-4 m-4">
=======
    <div class="container mt-4">
        <h2 class="text-center mb-4">Gerenciamento de usuario</h2>

        <!-- Formulário para adicionar novo material -->
        <form id="newUsuario" class="row g-3 mb-4">
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
            <div class="col-md-6">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="col-md-6">
<<<<<<< HEAD
                <label for="nivAcesso" class="form-label">Nível de acesso</label>
=======
                <label for="nivAcesso" class="form-label">Nivel de acesso</label>
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                <input type="text" class="form-control" id="nivAcesso" name="nivAcesso" required>
            </div>
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-6">
<<<<<<< HEAD
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar usuário</button>
                <input type="hidden" name="action" value="insert">
            </div>
        </form>

=======
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Adicionar usuario</button>
                <input type="hidden" name="action" value="insert"> 
            </div>
        </form>

        <!-- Contêiner para exibir a tabela de materiais -->
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        <div id="tableUsuarioContainer"></div>
    </div>

    <script>
<<<<<<< HEAD
        var ctrlUsuarioUrl = "usuario";
        var listAllUsuario = "usuario";
        var labelsUsuario = ['nivAcesso', 'nome', 'email'];
=======
        // URLs e nomes usados no controle de materiais
        var ctrlUsuarioUrl = "usuario"; //rota da ctrl
        var listAllUsuario = "usuario"; //rota da função list all
        var labelsUsuario = ['nivAcesso', 'nome', 'email']; //campos da tabela
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465

        $(document).ready(function() {
            // Carrega a tabela de materiais ao carregar a página
            loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);

<<<<<<< HEAD
            // Manipula o evento de envio do formulário para adicionar novo Usuario
            $('#newUsuario').on('submit', function(e) {
                e.preventDefault(); //evitar eventos pré definidos da página, tipo recarregar
                var formData = $(this).serialize();
=======
            // Manipula o evento de envio do formulário para adicionar novo material
            $('#newUsuario').on('submit', function(e) {
                e.preventDefault(); //evitar eventos pré definidos da página, tipo recarregar
                var formData = $(this).serialize(); 
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                // Envia uma requisição AJAX para adicionar um novo Usuario
                $.ajax({
                    url: ctrlUsuarioUrl,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
<<<<<<< HEAD
                        alert('Usuário adicionado com sucesso!');
                        loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);
=======
                            alert('Usuário adicionado com sucesso!');
                            loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    },
                    error: function(xhr, status, error) {
                        alert('Erro ao adicionar Usuario. Detalhes: ' + error);
                    }
                });

            });
        });

        // Função para salvar os dados do formulário
        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();
<<<<<<< HEAD
=======
            console.log(formData);

            // Adicione logs para depuração
            console.log("Dados enviados para o servidor:", jsonData);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465

            // Envia uma requisição AJAX para salvar as alterações no Usuario
            $.ajax({
                url: ctrlUsuarioUrl,
                method: 'PUT',
<<<<<<< HEAD
                contentType: 'application/x-www-form-urlencoded', // Alterado para o tipo de conteúdo correto
                data: formData, // Não é necessário mais o JSON.stringify
                success: function(response) {
                    alert('Usuario editado com sucesso!');
                    loadTable(listAllUsuario, labelsUsuario, ctrlUsulabelsUsuarioUrl);
=======
                success: function(response) {
                    // Adicione logs para depuração
                    console.log("Resposta do servidor após salvar:", response);

                    alert('Usuario editado com sucesso!');
                    loadTable(listAllMateriais, labelsUsuario, ctrlUsuarioUrl);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Usuario:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Usuario.');
                }
<<<<<<< HEAD
            });
        }

        function delFormData(formId) {
            var formData = $("#" + formId).serialize();

            // Envia uma requisição AJAX para excluir o Usuario
            $.ajax({
                url: ctrlUsuarioUrl,
                method: 'DELETE',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
                success: function(response) {
                    alert('Usuario excluído com sucesso!');
                    // Recarrega a tabela após excluir o Usuario
                    loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao excluir o Usuario:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao excluir o Usuario.');
                }
            });
        }

        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
=======

            });
        }

        function delFormData(idform) { //Literalmente o mesmo esquema
            var formData = $("#" + idform).serialize();
            // Envia uma requisição AJAX para salvar as alterações no material
            $.ajax({
                url: ctrlUsuarioUrl,
                method: 'PUT',
                data: formData, // Adiciona a ação 'save' aos dados do formulário
                success: function(response) {
                    alert('Usuario editado com sucesso!');
                    // Recarrega a tabela após salvar as alterações no Usuario
                    loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);
                },
                error: function() {
                    alert('Erro ao salvar as alterações no Usuario.');
                }

            });
        }

        // Função para carregar e exibir a tabela de materiais, aquela tabelinha bonita
        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
            // Envia uma requisição AJAX para obter os dados da tabela
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
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
                    var tableHtml = '<table class="table table-striped"><thead><tr>';
                    // Cria cabeçalhos da tabela com base nos rótulos fornecidos
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>'; // Capitaliza os rótulos
                    });
                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    // Preenche os dados na tabela
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    $.each(data, function(i, usuario) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
<<<<<<< HEAD
                        
                        tableHtml += '<input type="hidden" name="idUsuario" form="' + formId + '" value="' + usuario['idUsuario'] + '" >';
                        
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsUsuario[i] + '" form="' + formId + '" value="' + (usuario[label] || '') + '" >'

                                +
                                '</td>';
                        });

                        tableHtml +=
                            '<td>' +
                            '<button class="btn btnSave" onclick="saveFormData( \'' + formId + '\' );" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btnDelete" onclick="delFormData( \'' + formId + '\' );" >Excluir</button>' +
=======
                        // Preenche as células da tabela com os dados do profissional
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
                                '<input type="text" name="' + labelsUsuario[i] + '" form="' + formId + '" value="' + (usuario[label] || '') + '" >'

                                +
                                '</td>'; // Usa || '' para evitar valores nulos
                        });
                        // Adiciona botões de ação para editar, salvar e excluir
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

                    tableHtml += '</tbody></table>';
<<<<<<< HEAD
=======
                    // Exibe a tabela no contêiner especificado lá em cima
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    $('#tableUsuarioContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar usuários.');
                }
            });
        }
    </script>
<<<<<<< HEAD

    <footer class="py-3">
        <div class="mt-3 meraki d-flex align-items-center justify-content-center">
            <a href="https://talentosdoifsp.gru.br/meraki/" class="d-flex">
                <img src="public/assets/images/logo_meraki.png" alt="Logo da Meraki">
                <h6 class="ms-1">Desenvolvido por Meraki</h6>
            </a>
        </div>
    </footer>
=======
</body>


>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
</body>

</html>