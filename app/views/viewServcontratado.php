<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de serviço contratado</title>
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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de serviço contratado</h2>

        <form id="newServcontratado" class="row g-4 m-4">
            <div class="col-md-6">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" required>
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
            </div>
            <div class="col-md-6">
                <label for="endereco" class="form-label">Endereco</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <label for="idPedido" class="form-label">ID do pedido</label>
                <input type="text" class="form-control" id="idPedido" name="idPedido" required>
            </div>
            <div class="col-md-6">
                <label for="idServico" class="form-label">ID do serviço</label>
                <input type="text" class="form-control" id="idServico" name="idServico" required>
                <label for="pagServ" class="form-label">Valor do pagamento</label>
                <input type="number" step="0.01" class="form-control" id="pagServ" name="pagServ" required>
            </div>
            <div class="col-md-6">
                <label for="dtPagServ" class="form-label">Data do pagamento</label>
                <input type="date" class="form-control" id="dtPagServ" name="dtPagServ" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar Serviço contratado</button>
            </div>
        </form>

        <div id="tableServcontratadoContainer"></div>
    </div>

    <script>
        var ctrlServcontratadoUrl = "servcontratado";
        var listAllServcontratado = "servcontratado";
        var labelsServcontratado = ['idServContratado', 'cpf', 'nome', 'telefone', 'cep', 'endereco', 'complemento', 'email', 'idPedido', 'idServico', 'pagServ', 'dtPagServ'];

         // Função que é executada quando o documento está pronto
         $(document).ready(function() {
            // Carrega a tabela de materiais ao carregar a página
            loadTable(listAllServcontratado, labelsServcontratado, ctrlServcontratadoUrl);

            // Manipula o evento de envio do formulário para adicionar novo material
            $('#newServcontratado').on('submit', function(e) {
                e.preventDefault(); //evitar eventos pré definidos da página, tipo recarregar
                var formData = $(this).serialize();
                console.log( formData );
                // Envia uma requisição AJAX para adicionar um novo Servcontratado
                $.ajax({
                    url: ctrlServcontratadoUrl,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Servcontratado adicionado com sucesso!');
                        // Recarrega a tabela após adicionar um novo Servcontratado
                        loadTable(listAllServcontratado, labelsServcontratado, ctrlServcontratadoUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar Servcontratado.');
                    }
                });
            });
        });

       // Função para salvar os dados do formulário
       function saveFormData(idform) {
            var formData = $("#" + idform).serialize();

            // Envia uma requisição AJAX para salvar as alterações no Servcontradado
            $.ajax({
                url: ctrlServcontratadoUrl + '?action=save',
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded', // Alterado para o tipo de conteúdo correto
                data: formData,
                success: function(response) {
                    // Adicione logs para depuração

                    alert('Servcontratado editado com sucesso!');
                    loadTable(listAllServcontratado, labelsServcontratado, ctrlServcontratadoUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Servcontratado:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Servcontratado.');
                }

            });
        }

		function delFormData( idform ){ //Literalmente o mesmo esquema
           	var formData = $( "#"+idform ).serialize();
        
               console.log("Dados do formulário a serem excluídos:", formData);
               // Envia uma requisição AJAX para salvar as alterações no material
              $.ajax({
                    url: ctrlservcontratadoUrl,
                    method: 'DELETE',
                    contentType: 'application/x-www-form-urlencoded',
                    data: formData,
                    success: function(response) {
                       alert('servcontratado editado com sucesso!');
                       // Recarrega a tabela após salvar as alterações no servcontratado
                       loadTable(listAllservcontratado, labelsservcontratado, ctrlservcontratadoUrl);
                   },
                   error: function() {
                       alert('Erro ao salvar as alterações no servcontratado.');
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
                    tableHtml += '<table class="table table-striped custom-table" style="max-width: 100%;">';

                    tableHtml += '<thead class="table-header">';
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>';
                    });
                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    $.each(data, function(i, servcontratado) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;
                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';

                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsDataTable[i] + '" form="' + formId + '" value="' + (servcontratado[label] || '') + '" >' +
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
                    $('#tableServcontratadoContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar ServContratado.');
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