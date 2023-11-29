<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de usuários</title>
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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de usuários</h2>

        <form id="newUsuario" class="formgeren row g-4 m-4">
            <div class="col-md-6">
                <label for="senha" class="form-label mb-2">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required placeholder="Insira a senha">
            </div>
            <div class="col-md-6">
                <label for="nivAcesso" class="mb-2">Selecione o nível de acesso</label>
                <select id="nivAcesso" name="nivAcesso" class="form-control" required>
                    <option value="" disabled selected>Escolha o nível</option>
                    <option value="1">Funcionário</option>
                    <option value="2">Gerente</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="nome" class="form-label mb-2">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required placeholder="Insira o nome">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label mb-2">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Insira um email existente no cadastro dos seus funcionários">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar usuário</button>
                <input type="hidden" name="action" value="insert">
            </div>
        </form>


        <div id="tableUsuarioContainer"></div>
    </div>

    <script>
        var ctrlUsuarioUrl = "usuario";
        var listAllUsuario = "usuario";
        var labelsUsuario = ['nivAcesso', 'nome', 'email'];

        $(document).ready(function() {
            // Carrega a tabela de materiais ao carregar a página
            loadTable(listAllUsuario, labelsUsuario, ctrlUsuarioUrl);

            // Manipula o evento de envio do formulário para adicionar novo Usuario
            $('#newUsuario').on('submit', function(e) {
                e.preventDefault(); //evitar eventos pré definidos da página, tipo recarregar
                var formData = $(this).serialize();
                // Envia uma requisição AJAX para adicionar um novo Usuario
                $.ajax({
                    url: ctrlUsuarioUrl,
                    method: 'POST',
                    data: formData,
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

        // Função para salvar os dados do formulário
        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();

            // Envia uma requisição AJAX para salvar as alterações no Usuario
            $.ajax({
                url: ctrlUsuarioUrl,
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded', // Alterado para o tipo de conteúdo correto
                data: formData, // Não é necessário mais o JSON.stringify
                success: function(response) {
                    alert('Usuario editado com sucesso!');
                    loadTable(listAllUsuario, labelsUsuario, ctrlUsulabelsUsuarioUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Usuario:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Usuario.');
                }
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

                    $.each(data, function(i, usuario) {
                        console.log(usuario)
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';

                        tableHtml += '<input type="hidden" name="idUsuario" form="' + formId + '" value="' + usuario['idUsuario'] + '" >';

                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsUsuario[i] + '" form="' + formId + '" value="' + (usuario[label] || '') + '" >'

                                +
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
                    $('#tableUsuarioContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar usuários.');
                }
            });
        }
    </script>

    <footer class="py-3">
        <div class="mt-3 meraki d-flex align-items-center justify-content-center">
            <a href="https://talentosdoifsp.gru.br/meraki/" class="d-flex">
                <img src="public/assets/images/logo_meraki.png" width="42" alt="Logo da Meraki">
                <h6 class="ms-1">Desenvolvido por Meraki</h6>
            </a>
        </div>
    </footer>
</body>

</html>