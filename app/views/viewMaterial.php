<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Materiais</title>
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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de Materiais</h2>

        <!-- Formulário para adicionar novo material -->
        <form id="newMaterial" class="row g-4 m-4 ">
            <div class="col-md-4">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="col-md-4">
=======
    <div class="container mt-4">
        <h2 class="text-center mb-4">Gerenciamento de Materiais</h2>

        <!-- Formulário para adicionar novo material -->
        <form id="newMaterial" class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="col-md-6">
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="col-12">
<<<<<<< HEAD
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar Material</button>
=======
                <button type="submit" class="btn btn-primary">Adicionar Material</button>
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
            </div>
        </form>

        <!-- Contêiner para exibir a tabela de materiais -->
        <div id="tableMateriaisContainer"></div>
<<<<<<< HEAD
    
=======
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
    </div>

    <script>
        // URLs e nomes usados no controle de materiais
        var ctrlMaterialUrl = "material"; //rota da ctrl
        var listAllMateriais = "material"; //rota da função list all
        var labelsMaterial = ['idMaterial', 'titulo', 'descricao']; //campos da tabela

        // Função que é executada quando o documento está pronto
        $(document).ready(function() {
            // Carrega a tabela de materiais ao carregar a página
            loadTable(listAllMateriais, labelsMaterial, ctrlMaterialUrl);

            // Manipula o evento de envio do formulário para adicionar novo material
            $('#newMaterial').on('submit', function(e) {
                e.preventDefault(); //evitar eventos pré definidos da página, tipo recarregar
                var formData = $(this).serialize(); //serializar é tipo salvar?
<<<<<<< HEAD
=======
                console.log(formData);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                // Envia uma requisição AJAX para adicionar um novo material
                $.ajax({
                    url: ctrlMaterialUrl,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Material adicionado com sucesso!');
                        // Recarrega a tabela após adicionar um novo material
                        loadTable(listAllMateriais, labelsMaterial, ctrlMaterialUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar material.');
                    }
                });
            });

        });

        // Função para salvar os dados do formulário
        function saveFormData(idform) {
<<<<<<< HEAD
            var formData = $("#" + idform).serialize();

            // Envia uma requisição AJAX para salvar as alterações no Material
            $.ajax({
                url: ctrlMaterialUrl,
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded', // Alterado para o tipo de conteúdo correto
                data: formData,
                success: function(response) {
                    alert('Material editado com sucesso!');
                    loadTable(listAllMateriais, labelsMaterial, ctrlMaterialUrl);
                },
                error: function() {
                    alert('Erro ao salvar as alterações no Material.');
                }
            });
        }


        // Função para excluir os dados do formulário
        function delFormData(idform) {
            var formData = $("#" + idform).serialize();

            // Envia uma requisição AJAX para excluir o material
            $.ajax({
                url: ctrlMaterialUrl,
                method: 'DELETE',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
=======
            var formData = $("#" + idform).serializeArray();
            var jsonData = {};

            // Converte o array de dados serializados em um objeto
            formData.forEach(function(entry) {
                jsonData[entry.name] = entry.value;
            });

            // Envia uma requisição AJAX para salvar as alterações no Material
            $.ajax({
                url: ctrlMaterialUrl + '?action=save',
                method: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify(jsonData),
                success: function(response) {

                    alert('Material editado com sucesso!');
                    loadTable(listAllMateriais, labelsMaterial, ctrlMaterialUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Material:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Material.');
                }

            });
        }

        function delFormData(idform) {
            var formData = $("#" + idform).serializeArray();
            var jsonData = {};

            // Converte o array de dados serializados em um objeto
            formData.forEach(function(entry) {
                jsonData[entry.name] = entry.value;
            });

            // Adicione um console.log para verificar se o ID está correto
            console.log("ID do Material a ser excluído:", jsonData.idMaterial);

            // Envia uma requisição AJAX para excluir o material
            $.ajax({
                url: ctrlMaterialUrl + '?action=delete',
                method: 'DELETE',
                contentType: 'application/json',
                data: JSON.stringify({
                    idMaterial: jsonData.idMaterial
                }),
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                success: function(response) {
                    alert('Material excluído com sucesso!');
                    // Recarrega a tabela após excluir o material
                    loadTable(listAllMateriais, labelsMaterial, ctrlMaterialUrl);
                },
<<<<<<< HEAD
                error: function() {
=======
                error: function(xhr, status, error) {
                    console.error("Erro ao excluir o material:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    alert('Erro ao excluir o material.');
                }
            });
        }

<<<<<<< HEAD

=======
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
        // Função para carregar e exibir a tabela de materiais, aquela tabelinha bonita
        function loadTable(urlDataTable, labelsDataTable, sendCtrlSaveDeleteUrl) {
            // Envia uma requisição AJAX para obter os dados da tabela
            $.ajax({
                url: urlDataTable,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
<<<<<<< HEAD
                    var tableHtml = '<div class="table-responsive m-4" style="overflow-x: auto;">';
                    tableHtml += '<table class="table table-striped" style="max-width: 100%;">';

                    tableHtml += '<thead class="table-header">';
=======
                    var tableHtml = '<table class="table table-striped"><thead><tr>';
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                    // Cria cabeçalhos da tabela com base nos rótulos fornecidos
                    $.each(labelsDataTable, function(i, label) {
                        tableHtml += '<th>' + label.charAt(0).toUpperCase() + label.slice(1) + '</th>'; // Capitaliza os rótulos
                    });
                    tableHtml += '<th>Ações</th></tr></thead><tbody>';

                    // Preenche os dados na tabela
                    $.each(data, function(i, material) {
                        tableHtml += '<tr>';
                        var formId = "frm" + i;

                        tableHtml += '<form id="' + formId + '" name="' + formId + '" class="frmCadastro">';
                        // Preenche as células da tabela com os dados do material
                        $.each(labelsDataTable, function(i, label) {
                            tableHtml += '<td>' +
                                '<input type="text" name="' + labelsMaterial[i] + '" form="' + formId + '" value="' + (material[label] || '') + '" >'

                                +
                                '</td>'; // Usa || '' para evitar valores nulos
                        });

<<<<<<< HEAD
=======
                        // Adicione um campo oculto para armazenar o idMaterial
                        tableHtml += '<input type="hidden" name="idMaterial" form="' + formId + '" value="' + material['idMaterial'] + '" >';

>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
                        // Adiciona botões de ação para editar, salvar e excluir
                        tableHtml +=
                            '<td>' +
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
                    $('#tableMateriaisContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar materiais.');
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
</body>

</html>
=======
</body>

</html>
>>>>>>> 8e64c128849c7fa748a262399d9370d29ec44465
