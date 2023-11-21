<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Profissional</title>
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
        <h2 class="text-center mb-4">Gerenciamento de Profissionais</h2>

        <!-- Formulário para adicionar novo material -->
        <form id="newProfissional" class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="idUsuario" class="form-label">ID do usuário</label>
                <input type="number" class="form-control" id="idUsuario" name="idUsuario" required>
            </div>
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
                <input type="number" class="form-control" id="cpf" name="cpf" required>
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
                <label for="telefone" class="form-label">Telefone</label>
                <input type="number" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Adicionar profissional</button>
            </div>
        </form>

        <!-- Contêiner para exibir a tabela de materiais -->
        <div id="tableProfissionalContainer"></div>
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
        var ctrlProfissionalUrl = "ctrlProfissional"; //rota da ctrl
        var listAllProfissional = "ctrlProfissional"; //rota da função list all
        var labelsProfissional = ['idProfissional', 'idUsuario', 'nome', 'cargo', 'hrTrabalho', 'cpf', 'cep', 'endereco', 'complemento', 'telefone', 'email']; //campos da tabela

        // Função que é executada quando o documento está pronto
        $(document).ready(function() {
            // Carrega a tabela de materiais ao carregar a página
            loadTable(listAllProfissional, labelsProfissional, ctrlProfissionalUrl);

            // Manipula o evento de envio do formulário para adicionar novo material
            $('#newProfissional').on('submit', function(e) {
                e.preventDefault(); //evitar eventos pré definidos da página, tipo recarregar
                var formData = $(this).serialize(); //serializar é tipo salvar?
                console.log( formData );
                // Envia uma requisição AJAX para adicionar um novo Profissional
                $.ajax({
                    url: ctrlProfissionalUrl,
                    type: 'POST',
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

        });

        function saveFormData( idform ){ //tinha aquela funçãozona com js, porém ela foi modificada e altera para algo vanila
        	var formData = $( "#"+idform ).serialize(); 
            console.log( "POST: " +formData ); //Antes a alteração/salvamento era feita pelo PUT, mas agora vai ser pelo POST também
            // Envia uma requisição AJAX para salvar as alterações no material
           $.ajax({
                url: ctrlProfissionalUrl,
                type: 'POST',
                data: formData + '&action=save', // Adiciona a ação 'save' aos dados do formulário
                success: function(response) { // se der sucesso no post
                    alert('Profissional editado com sucesso! <BR> ' + response );
                    console.log('Profissional editado com sucesso! <BR> ' + response );
                    // Recarrega a tabela após salvar as alterações no Profissional
                    loadTable(listAllProfissional, labelsProfissional, ctrlProfissionalUrl);
                    // Fecha o modal de edição
                    // $('#editProfissionalModal').modal('hide'); Não estamos mais usando também
                },
                error: function() {
                    alert('Erro ao salvar as alterações no profissional.');
                }
           });
        }

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

            // Envia uma requisição AJAX para salvar as alterações no Profissional
            $.ajax({
                url: ctrlProfissionalUrl + '?action=save',
                type: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify(jsonData),
                success: function(response) {
                    // Adicione logs para depuração
                    console.log("Resposta do servidor após salvar:", response);

                    alert('Profissional editado com sucesso!');
                    loadTable(listAllMateriais, labelsProfissional, ctrlProfissionalUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Profissional:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Profissional.');
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
                    var tableHtml = '<div class="table-responsive" style="overflow-x: auto;">'; // Adiciona estilo para a barra de rolagem horizontal
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">'; // Define um máximo de largura para a tabela

                    // Cria cabeçalhos da tabela com base nos rótulos fornecidos
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>'; // Capitaliza os rótulos
                    });
                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    // Preenche os dados na tabela
                    $.each(data, function(i, profissional) {
                        tableHtml += '<tr>';
						var formId = "frm"+i;
                        
                        tableHtml += '<form id="'+formId+'" name="'+formId+'" class="frmCadastro">';
                        // Preenche as células da tabela com os dados do profissional
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
							'<input type="text" name="'+labelsProfissional[i]+'" form="'+formId+'" value="' +(profissional[label] || '')+'" >' 
                             
                             + '</td>'; // Usa || '' para evitar valores nulos
                        });
                        // Adiciona botões de ação para editar, salvar e excluir
                        tableHtml += 
                            '<td>'+
                            //'<button class="btn btn-warning btnEdit">Editar</button>' + (fazia parte do modal lá)
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
                    $('#tableProfissionalContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar Profissional.');
                }
            });
        }
    </script>
</body>

</html>