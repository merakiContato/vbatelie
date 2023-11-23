<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Serviço contratado</title>
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

<body id="body">

    <div class="container mt-4">
        <h2 class="text-center mb-4">Gerenciamento de Serviço contratado</h2>

        <!-- Formulário para adicionar novo material -->
        <form id="newServcontratado" class="row g-3 mb-4">
            <div class="col-md-6">
            <div class="col-md-6">
                <label for="cpf" class="form-label">CPF</label>
                <input type="number" class="form-control" id="cpf" name="cpf" required>
            </div>
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="number" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="col-md-6">
                <label for="cep" class="form-label">CEP</label>
                <input type="number" class="form-control" id="cep" name="cep" required>
            </div>
            <div class="col-md-6">
                <label for="endereco" class="form-label">Endereco</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
            <div class="col-md-6">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="idPedido" class="form-label">ID do pedido</label>
                <input type="number" class="form-control" id="idPedido" name="idPedido" required>
            </div>
            <div class="col-md-6">
                <label for="idServico" class="form-label">ID do serviço</label>
                <input type="number" class="form-control" id="idServico" name="idServico" required>
            </div>
            <div class="col-md-6">
                <label for="pagServ" class="form-label">Valor do pagamento</label>
                <input type="number" step="0.01" class="form-control" id="pagServ" name="pagServ" required>
            </div>
            <div class="col-md-6">
                <label for="dtPagServ" class="form-label">Data do pagamento</label>
                <input type="date" class="form-control" id="dtPagServ" name="dtPagServ" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Adicionar Serviço contratado</button>
            </div>
        </form>

        <!-- Contêiner para exibir a tabela de materiais -->
        <div id="tableServcontratadoContainer"></div>
    </div>

    <script>
    
        // URLs e nomes usados no controle de materiais
        var ctrlServcontratadoUrl = "servcontratado"; //rota da ctrl
        var listAllServcontratado = "servcontratado"; //rota da função list all
        var labelsServcontratado = ['idServContratado', 'cpf', 'nome', 'telefone', 'cep', 'endereco', 'complemento', 'email', 'idPedido', 'idServico', 'pagServ', 'dtPagServ']; //campos da tabela

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
            console.log(formData);

            // Envia uma requisição AJAX para salvar as alterações no Servcontradado
            $.ajax({
                url: ctrlServcontratadoUrl,
                method: 'PUT',
                success: function(response) {
                    // Adicione logs para depuração
                    console.log("Resposta do servidor após salvar:", response);

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
               console.log( "PUT: " +formData );
               // Envia uma requisição AJAX para salvar as alterações no material
              $.ajax({
                   url: ctrlservcontratadoUrl,
                   type: 'POST',
                   data: formData + '&action=save', // Adiciona a ação 'save' aos dados do formulário
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

        // Função para carregar e exibir a tabela de materiais, aquela tabelinha bonita
        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
            // Envia uma requisição AJAX para obter os dados da tabela
            $.ajax({
                url: urlDataTable,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tableHtml = '<div class="table-responsive" style="overflow-x: auto;">'; // Adiciona estilo para a barra de rolagem horizontal
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">'; // Define um máximo de largura para a tabela

                    // Cria cabeçalhos da tabela com base nos rótulos fornecidos
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>'; // Capitaliza os rótulos
                    });
                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    // Preenche os dados na tabela
                    $.each(data, function(i, servcontratado) {
                        tableHtml += '<tr>';
						var formId = "frm"+i;
                        
                        tableHtml += '<form id="'+formId+'" name="'+formId+'" class="frmCadastro">';
                        // Preenche as células da tabela com os dados do servcontratado
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
							'<input type="text" name="'+labelsServcontratado[i]+'" form="'+formId+'" value="' +(servcontratado[label] || '')+'" >' 
                             
                             + '</td>'; // Usa || '' para evitar valores nulos
                        });
                        // Adiciona botões de ação para editar, salvar e excluir
                        tableHtml += 
                            '<td>'+
                            	'<button class="btn btn-primary btnSave" onclick="saveFormData( \''+formId+'\' );" >Salvar</button>' +
                            '</td>'+
                            '<td>'+
	                            '<button class="btn btn-danger btnDelete" onclick="delFormData( \''+formId+'\' );" >Excluir</button>' +
                            '</td>'+
                        '</tr>';
                        tableHtml += '</form">';
                    });

                    tableHtml += '</tbody></table>';
                    // Exibe a tabela no contêiner especificado lá em cima
                    $('#tableServcontratadoContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar Servcontratado.');
                }
            });
        }
    </script>
</body>

</html>