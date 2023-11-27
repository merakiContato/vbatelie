<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Gerenciamento de pedido material</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
=======
    <title>Gerenciamento de Pedido material</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    <link rel="shortcut icon" href="public/assets/images/icon.ico" type="image/x-ico">

    <!-- Links das bibliotecas, estão internas agora-->
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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de pedido material</h2>

        <form id="newPedidomaterial" class="row g-4 m-4">
            <div class="col-md-6">
                <label for="idPedido" class="form-label">ID do pedido</label>
                <input type="text" class="form-control" id="idPedido" name="idPedido" required>
            </div>
            <div class="col-md-6">
                <label for="idMaterial" class="form-label">ID do Material</label>
                <input type="text" class="form-control" id="idMaterial" name="idMaterial" required>
=======

    <div class="container mt-4">
        <h2 class="text-center mb-4">Gerenciamento de pedido material</h2>

        <!-- Formulário para adicionar novo material -->
        <form id="newPedidomaterial" class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="idPedido" class="form-label">ID do pedido</label>
                <input type="number" class="form-control" id="idPedido" name="idPedido" required>
            </div>
            <div class="col-md-6">
                <label for="idMaterial" class="form-label">ID do Material</label>
                <input type="number" class="form-control" id="idMaterial" name="idMaterial" required>
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
            </div>
            <div class="col-md-6">
                <label for="dtCompra" class="form-label">Data da compra</label>
                <input type="date" class="form-control" id="dtCompra" name="dtCompra" required>
            </div>
            <div class="col-md-6">
                <label for="qtd" class="form-label">Quantidade</label>
                <input type="number" class="form-control" id="qtd" name="qtd" required>
            </div>
            <div class="col-md-6">
                <label for="unidadeMedida" class="form-label">Unidade de medida</label>
                <input type="text" class="form-control" id="unidadeMedida" name="unidadeMedida" required>
            </div>
            <div class="col-md-6">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
            </div>
            <div class="col-12">
<<<<<<< HEAD
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar material</button>
            </div>
        </form>

=======
                <button type="submit" class="btn btn-primary">Adicionar material</button>
            </div>
        </form>

        <!-- Contêiner para exibir a tabela de materiais -->
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        <div id="tablePedidomaterialContainer"></div>
    </div>

    <script>
<<<<<<< HEAD
        var ctrlPedidomaterialUrl = "pedidomaterial";
        var listAllPedidomaterial = "pedidomaterial";
        var labelsPedidomaterial = ['idPedidoMaterial', 'idPedido', 'idMaterial', 'dtCompra', 'qtd', 'unidadeMedida', 'preco'];

        $(document).ready(function() {
            loadTable(listAllPedidomaterial, labelsPedidomaterial, ctrlPedidomaterialUrl);

            $('#newPedidomaterial').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);

=======
    
        // URLs e nomes usados no controle de materiais
        var ctrlPedidomaterialUrl = "pedidomaterial"; //rota da ctrl
        var listAllPedidomaterial = "pedidomaterial"; //rota da função list all
        var labelsPedidomaterial = ['idPedidoMaterial', 'idPedido', 'idMaterial', 'dtCompra', 'qtd', 'unidadeMedida', 'preco']; //campos da tabela

        // Função que é executada quando o documento está pronto
        $(document).ready(function() {
            // Carrega a tabela de materiais ao carregar a página
            loadTable(listAllPedidomaterial, labelsPedidomaterial, ctrlPedidomaterialUrl);

            // Manipula o evento de envio do formulário para adicionar novo material
            $('#newPedidomaterial').on('submit', function(e) {
                e.preventDefault(); //evitar eventos pré definidos da página, tipo recarregar
                var formData = $(this).serialize();
                console.log( formData );
                // Envia uma requisição AJAX para adicionar um novo Pedidomaterial
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                $.ajax({
                    url: ctrlPedidomaterialUrl,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Pedidomaterial adicionado com sucesso!');
<<<<<<< HEAD
=======
                        // Recarrega a tabela após adicionar um novo Pedidomaterial
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                        loadTable(listAllPedidomaterial, labelsPedidomaterial, ctrlPedidomaterialUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar Pedidomaterial.');
                    }
                });
            });
        });

<<<<<<< HEAD
        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();
            $.ajax({
                url: ctrlPedidomaterialUrl,
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
                success: function(response) {
                    alert('Pedidomaterial excluido com sucesso!');
=======
         // Função para salvar os dados do formulário
         function saveFormData(idform) {
            var formData = $("#" + idform).serialize();
            console.log(formData);

            // Envia uma requisição AJAX para salvar as alterações no Profissional
            $.ajax({
                url: ctrlPedidomaterialUrl,
                method: 'PUT',
                success: function(response) {
                    // Adicione logs para depuração
                    console.log("Resposta do servidor após salvar:", response);

                    alert('Pedidomaterial editado com sucesso!');
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    loadTable(listAllMateriais, labelsPedidomaterial, ctrlPedidomaterialUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Pedidomaterial:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Pedidomaterial.');
                }
<<<<<<< HEAD
            });
        }

        function delFormData(idform) {
            var formData = $("#" + idform).serialize();

            console.log("Dados do formulário a serem excluídos:", formData);

            $.ajax({
                url: ctrlPedidomaterialUrl,
                method: 'DELETE',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
                success: function(response) {
                    alert('Pedidomaterial excluido com sucesso!');
                    loadTable(listAllPedidomaterial, labelsPedidomaterial, ctrlPedidomaterialUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao excluir o pedido do material:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar excluir o pedido do material.');
                }
            });
        }

        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
=======

            });
        }

		function delFormData( idform ){ //Literalmente o mesmo esquema
           	var formData = $( "#"+idform ).serialize();
               console.log(formData );
               return;
               // Envia uma requisição AJAX para salvar as alterações no material
              $.ajax({
                   url: ctrlPedidomaterialUrl,
                   method: 'DELETE',
                   data: formData, // Adiciona a ação 'save' aos dados do formulário
                   success: function(response) {
                       alert('Pedidomaterial editado com sucesso!');
                       // Recarrega a tabela após salvar as alterações no Pedidomaterial
                       loadTable(listAllPedidomaterial, labelsPedidomaterial, ctrlPedidomaterialUrl);
                   },
                   error: function() {
                       alert('Erro ao salvar as alterações no pedidomaterial.');
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

                    $.each(data, function(i, pedidomaterial) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;
                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td class="td-centered">' +
                                '<input type="text" class="form-control input-large" name="' + labelsPedidomaterial[i] + '" form="' + formId + '" value="' + (pedidomaterial[label] || '') + '" >' +
                                '</td>';
                        });
                        tableHtml +=
                            '<td>' +
                            '<button class="btn btnSave" onclick="saveFormData(\'' + formId + '\');" >Salvar</button>' +
                            '</td>' +
                            '<td>' +
                            '<button class="btn btnDelete" onclick="delFormData(\'' + formId + '\');" >Excluir</button>' +
                            '</td>' +
                            '</tr>';
=======
                    var tableHtml = '<div class="table-responsive" style="overflow-x: auto;">'; // Adiciona estilo para a barra de rolagem horizontal
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">'; // Define um máximo de largura para a tabela
                    // Cria cabeçalhos da tabela com base nos rótulos fornecidos
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>'; // Capitaliza os rótulos
                    });
                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    // Preenche os dados na tabela
                    $.each(data, function(i, pedidomaterial) {
                        tableHtml += '<tr>';
						var formId = "frm"+i;
                        
                        tableHtml += '<form id="'+formId+'" name="'+formId+'" class="frmCadastro">';
                        // Preenche as células da tabela com os dados do profissional
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
							'<input type="text" name="'+labelsPedidomaterial[i]+'" form="'+formId+'" value="' +(pedidomaterial[label] || '')+'" >' 
                             
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
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                        tableHtml += '</form">';
                    });

                    tableHtml += '</tbody></table>';
<<<<<<< HEAD
=======
                    // Exibe a tabela no contêiner especificado lá em cima
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    $('#tablePedidomaterialContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar Pedidomaterial.');
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
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
</body>

</html>