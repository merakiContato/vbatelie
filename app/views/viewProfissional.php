<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de profissionais</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">
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
            <div class="col-md-3">
                <button type="button" class="btn btn-painel py-1 px-2"><a href="gerenciamento">Painel de gerenciamento</a></button>
            </div>
            <div class="col-md-2 img-logo">
                <img src="public/assets/images/Logo1.png" alt="Logo do atelie VBatelie">
            </div>
        </nav>

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de profissionais</h2>

        <form id="newProfissional" class="row g-4 m-4">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-6">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="cargo" name="cargo" required>
            </div>
            <div class="col-md-6">
                <label for="hrTrabalho" class="form-label">Horário de Trabalho</label>
                <input type="text" class="form-control" id="hrTrabalho" name="hrTrabalho" required>
            </div>
            <div class="col-md-6">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="col-md-6">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
            </div>
            <div class="col-md-6">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
            <div class="col-md-6">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" required>
            </div>
            <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar profissional</button>
            </div>
        </form>

        <div id="tableProfissionalContainer"></div>
    </div>

    <script>
        var ctrlProfissionalUrl = "profissional";
        var listAllProfissional = "profissional";
        var labelsProfissional = ['idProfissional', 'nome', 'cargo', 'hrTrabalho', 'cpf', 'cep', 'endereco', 'complemento', 'telefone', 'email'];

        // Função que é executada quando o documento está pronto
        $(document).ready(function() {
            // Carrega a tabela de materiais ao carregar a página
            loadTable(listAllProfissional, labelsProfissional, ctrlProfissionalUrl);

            // Manipula o evento de envio do formulário para adicionar novo material
            $('#newProfissional').on('submit', function(e) {
                e.preventDefault(); //evitar eventos pré definidos da página, tipo recarregar
                var formData = $(this).serialize(); 
                console.log( formData );
                // Envia uma requisição AJAX para adicionar um novo Profissional
                $.ajax({
                    url: ctrlProfissionalUrl,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Profissional adicionado com sucesso!');
                        // Recarrega a tabela após adicionar um novo Profissional
                        loadTable(listAllProfissional, labelsProfissional, ctrlProfissionalUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar Profissional.');
                    }
                });
            });
        });

		 // Função para salvar os dados do formulário
         function saveFormData(idform) {
            var formData = $("#" + idform).serialize();
            console.log(formData);
            // Envia uma requisição AJAX para salvar as alterações no Profissional
            $.ajax({
                url: ctrlProfissionalUrl  + '?action=save',
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded', // Alterado para o tipo de conteúdo correto
                data: formData,
                success: function(response) {
                    // Adicione logs para depuração
                    console.log("Resposta do servidor após salvar:", response);

                    alert('Profissional editado com sucesso!');
                    loadTable(listAllProfissional, labelsProfissional, ctrlProfissionalUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Profissional:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Profissional.');
                }

            });
        }

        function delFormData(idform) {
            var formData = $("#" + idform).serialize();
            
            console.log("Dados do formulário a serem excluídos:", formData);
            // Envia uma requisição AJAX para excluir o material
            $.ajax({
                url: ctrlProfissionalUrl,
                method: 'DELETE',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
                success: function(response) {
                	
                    alert('Profissional excluído com sucesso!');
                    // Recarrega a tabela após excluir o Profissional
                    loadTable(listAllProfissional, labelsProfissional, ctrlProfissionalUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao excluir o Profissional:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao excluir o Profissional.');
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

                    $.each(data, function(i, profissional) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;
                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';

                        
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsProfissional[i] + '" form="' + formId + '" value="' + (profissional[label] || '') + '" >' +
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
                        tableHtml += '</form">';
                    });

                    tableHtml += '</tbody></table>';
                    $('#tableProfissionalContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar Profissional.');
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