<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de pedido material</title>
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

        <h2 class="text-center mt-4 mb-0 text-geren">Gerenciamento de pedido material</h2>

        <form id="newPedidomaterial" class="formgeren row g-4 m-4">
            <div class="col-md-6">
                <label for="idPedido" class="form-label mb-2">ID do pedido</label>
                <input type="text" class="form-control" id="idPedido" name="idPedido" required placeholder="Insira o ID do pedido">
            </div>
            <div class="col-md-6">
                <label for="idMaterial" class="form-label mb-2">ID do Material</label>
                <input type="text" class="form-control" id="idMaterial" name="idMaterial" required placeholder="Insira o ID do Material">
            </div>
            <div class="col-md-6 custom-date">
                <label for="dtCompra" class="form-label mb-2">Data da compra</label>
                <input type="date" class="form-control" id="dtCompra" name="dtCompra" required placeholder="Selecione a data da compra">
            </div>
            <div class="col-md-6">
                <label for="qtd" class="form-label mb-2">Quantidade</label>
                <input type="number" class="form-control" id="qtd" name="qtd" required placeholder="Insira a quantidade">
            </div>
            <div class="col-md-6">
                <label for="unidadeMedida" class="mb-2">Selecione a unidade de medida</label>
                <select id="unidadeMedida" name="unidadeMedida" class="form-control" required>
                    <option value="" disabled selected>Escolha a unidade</option>
                    <option value="cm">cm</option>
                    <option value="Kg">Kg</option>
                    <option value="m">m</option>
                    <option value="g">g</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="preco" class="form-label mb-2">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" required placeholder="Insira o preço">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-add py-1 px-2">Adicionar pedido material</button>
            </div>
        </form>


        <div id="tablePedidomaterialContainer"></div>
    </div>

    <script>
        var ctrlPedidomaterialUrl = "pedidomaterial";
        var listAllPedidomaterial = "pedidomaterial";
        var labelsPedidomaterial = ['idPedido', 'idMaterial', 'dtCompra', 'qtd', 'unidadeMedida', 'preco'];

        $(document).ready(function() {
            loadTable(listAllPedidomaterial, labelsPedidomaterial, ctrlPedidomaterialUrl);

            $('#newPedidomaterial').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);

                $.ajax({
                    url: ctrlPedidomaterialUrl,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Pedidomaterial adicionado com sucesso!');
                        loadTable(listAllPedidomaterial, labelsPedidomaterial, ctrlPedidomaterialUrl);
                    },
                    error: function() {
                        alert('Erro ao adicionar Pedidomaterial.');
                    }
                });
            });
        });

        function saveFormData(idform) {
            var formData = $("#" + idform).serialize();
            $.ajax({
                url: ctrlPedidomaterialUrl,
                method: 'PUT',
                contentType: 'application/x-www-form-urlencoded',
                data: formData,
                success: function(response) {
                    alert('Pedidomaterial salvo com sucesso!');
                    loadTable(listAllPedidomaterial, labelsPedidomaterial, ctrlPedidomaterialUrl);
                },
                error: function(xhr, status, error) {
                    console.error("Erro ao salvar as alterações no Pedidomaterial:", error);
                    console.log("Resposta do servidor após erro:", xhr.responseText);
                    alert('Erro ao salvar as alterações no Pedidomaterial.');
                }
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
                    $('#tablePedidomaterialContainer').html(tableHtml);
                },
                error: function() {
                    alert('Erro ao carregar Pedidomaterial.');
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