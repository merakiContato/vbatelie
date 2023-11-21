<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de usuario</title>
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
        <h2 class="text-center mb-4">Gerenciamento de usuario</h2>

        <!-- Formulário para adicionar novo material -->
        <form id="newUsuario" class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="col-md-6">
                <label for="nivAcesso" class="form-label">Nivel de acesso</label>
                <input type="text" class="form-control" id="nivAcesso" name="nivAcesso" required>
            </div>
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Adicionar usuario</button>
            </div>
        </form>

        <!-- Contêiner para exibir a tabela de materiais -->
        <div id="tableUsuarioContainer"></div>
    </div>

    <!-- --- Modal para editar material, não estamos usando mais -----
    <div class="modal fade" id="editMaterialModal" tabindex="-1" aria-labelledby="editMaterialModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMaterialModalLabel">Editar Material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    -- Formulário para editar material --
                    <form id="editMaterialForm">
                        <div class="mb-3">
                            <label for="editTitulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="editTitulo" name="editTitulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescricao" class="form-label">Descrição</label>
                            <input type="text" class="form-control" id="editDescricao" name="editDescricao" required>
                        </div>
                        <input type="hidden" id="editMaterialId" name="editMaterialId">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <script>
        // URLs e nomes usados no controle de materiais
        var ctrlUsuarioUrl = "ctrlUsuario"; //rota da ctrl
        var listAllUsuario = "ctrlUsuario"; //rota da função list all
        var labelsUsuario = ['nivAcesso', 'nome', 'email']; //campos da tabela

        $(document).ready(function() {
            // Carrega a tabela de materiais ao carregar a página
            loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);

            // Manipula o evento de envio do formulário para adicionar novo material
            $('#newUsuario').on('submit', function(e) {
                e.preventDefault(); //evitar eventos pré definidos da página, tipo recarregar
                var formData = $(this).serialize(); //serializar é tipo salvar?
                console.log(formData);

                // Envia uma requisição AJAX para adicionar um novo Usuario
                $.ajax({
                    url: ctrlUsuarioUrl,
                    type: 'POST',
                    data: formData + '&action=insert',
                    success: function(response) {
                            alert('Usuário adicionado com sucesso!');
                            loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);
                    },
                    error: function(xhr, status, error) {
                        alert('Erro ao adicionar Usuario. Detalhes: ' + error);
                    }
                });

            });
        });


        /* --- uso da modal, que não estamos mais utilizando (Manipula o evento de envio do formulário de edição para salvar alterações) ---
        // Manipula o evento de exibição do modal de edição ao clicar em "Editar"
        $(document).on('click', '.btnEdit', function() {
            var row = $(this).closest('tr');
            var materialData = {};
            // Coleta dados da linha selecionada
            $.each(labelsMaterial, function(i, label) {
                materialData[label] = row.find('td').eq(i).text();
            });
            // Preenche os campos do formulário de edição com os dados do material
            $('#editMaterialId').val(materialData['idMaterial']);
            $('#editTitulo').val(materialData['titulo']);
            $('#editDescricao').val(materialData['descricao']);
            // Exibe o modal de edição
            $('#editMaterialModal').modal('show');
        });
        */



        // Função para salvar os dados do formulário
        function saveFormData(idform) {
            var formData = $("#" + idform).serializeArray();
            var jsonData = {};

            // Converte o array de dados serializados em um objeto
            formData.forEach(function(entry) {
                jsonData[entry.name] = entry.value;
            });

            // Adicione logs para depuração
            console.log("Dados enviados para o servidor:", jsonData);

            // Envia uma requisição AJAX para salvar as alterações no Usuario
            $.ajax({
                url: ctrlUsuarioUrl + '?action=save',
                type: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify(jsonData),
                success: function(response) {
                    // Adicione logs para depuração
                    console.log("Resposta do servidor após salvar:", response);

                    alert('Usuario editado com sucesso!');
                    loadTable(listAllMateriais, labelsUsuario, ctrlUsuarioUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Usuario:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Usuario.');
                }

            });
        }

        function delFormData(idform) { //Literalmente o mesmo esquema
            var formData = $("#" + idform).serialize();
            console.log("PUT: " + formData);
            // Envia uma requisição AJAX para salvar as alterações no material
            $.ajax({
                url: ctrlUsuarioUrl,
                type: 'PUT',
                data: formData + '&action=save', // Adiciona a ação 'save' aos dados do formulário
                success: function(response) {
                    alert('Usuario editado com sucesso!');
                    // Recarrega a tabela após salvar as alterações no Usuario
                    loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);
                    // Fecha o modal de edição
                    // $('#editMaterialModal').modal('hide'); Não estamos mais usando
                },
                error: function() {
                    alert('Erro ao salvar as alterações no Usuario.');
                }

            });
        }

        // Função para carregar e exibir a tabela de materiais, aquela tabelinha bonita
        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
            // Envia uma requisição AJAX para obter os dados da tabela
            $.ajax({
                url: urlDataTable,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tableHtml = '<table class="table table-striped"><thead><tr>';
                    // Cria cabeçalhos da tabela com base nos rótulos fornecidos
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>'; // Capitaliza os rótulos
                    });
                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    // Preenche os dados na tabela
                    $.each(data, function(i, usuario) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
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
                            //'<button class="btn btn-warning btnEdit">Editar</button>' + (fazia parte do modal lá)
                            '<button class="btn btn-primary btnSave" onclick="saveFormData( \'' + formId + '\' );" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btn-danger btnDelete" onclick="delFormData( \'' + formId + '\' );" >Excluir</button>' +
                            '</td>' +
                            '</tr>';
                        tableHtml += '</form">';
                    });

                    tableHtml += '</tbody></table>';
                    // Exibe a tabela no contêiner especificado lá em cima
                    $('#tableUsuarioContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar usuários.');
                }
            });
        }
    </script>
</body>


</body>

</html>