<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Financeiro</title>
    <link rel="icon" type="image/png" href="public/assets/images/Logo2.png">
    
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
    <div class="d-flex flex-column min-vh-100">

        <nav class="nav navbar d-flex justify-content-between mx-0 gerenciamento">
            <div class="col-md-2">
            </div>
            <div class="col-md-2 img-logo">
                <img src="public/assets/images/Logo1.png" alt="Logo do atelie VBatelie">
            </div>
        </nav>
        <div class="container-fluid relatorio my-5 text-center justify-content-center align-items-center flex-grow-1">
            <div class="row">
                <h1 class="mb-5">Relatório Financeiro</h1>
            </div>

            <div class="row mb-5 text-center justify-content-center align-items-center">
                <div class="col-md-4">
                    <label for="mes">Selecione o mês:</label>
                    <select id="mes" name="mes" class="form-control">
                        <option value="Janeiro">Janeiro</option>
                        <option value="Fevereiro">Fevereiro</option>
                        <option value="Março">Março</option>
                        <option value="Abril">Abril</option>
                        <option value="Maio">Maio</option>
                        <option value="Junho">Junho</option>
                        <option value="Julho">Julho</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Setembro">Setembro</option>
                        <option value="Outubro">Outubro</option>
                        <option value="Novembro">Novembro</option>
                        <option value="Dezembro">Dezembro</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="ano">Digite o ano:</label>
                    <input type="number" id="ano" name="ano" class="form-control" placeholder="Ano">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-relatorio mt-4" onclick="carregarRelatorio()">Carregar Relatório</button>
                </div>
            </div>

            <div class="row mx-4">
                <table class="table table-bordered d-none" id="relatorioTable">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody id="relatorioTableBody">
                        <!-- Os dados da tabela serão inseridos aqui dinamicamente -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <h4>Total</h4>
                            </td>
                            <td id="total"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
        <footer class="py-3">
            <div class="mt-3 meraki d-flex align-items-center justify-content-center">
                <a href="https://talentosdoifsp.gru.br/meraki/" class="d-flex">
                    <img src="public/assets/images/logo_meraki.png" alt="Logo da Meraki">
                    <h6 class="ms-1">Desenvolvido por Meraki</h6>
                </a>
            </div>
        </footer>
    </div>

    <script>
        function carregarRelatorio() {
            var mes = $('#mes').val();
            var ano = $('#ano').val();

            $.ajax({
                url: 'contas', // Substitua pelo caminho real do seu controlador
                type: 'PUT',
                data: {
                    mes: mes,
                    ano: ano,
                    action: 'relatorio'
                },
                dataType: 'json',
                success: function(data) {
                    // Limpar a tabela antes de adicionar novos dados
                    $('#relatorioTableBody').empty();

                    var total = 0;

                    // Adicionar os dados na tabela
                    $.each(data, function(index, row) {
                        $('#relatorioTableBody').append('<tr><td>' + row.tipo + '</td><td>' + row.valor + '</td></tr>');

                        // Adicionar o valor à soma total
                        total += parseFloat(row.valor);
                    });

                    // Exibir a soma total
                    $('#total').text(total.toFixed(2)); // Ajuste conforme a necessidade de formatação

                    // Remover a classe de ocultar para mostrar a tabela
                    $('#relatorioTable').removeClass('d-none');
                },
                error: function(error) {
                    console.error('Erro ao carregar relatório:', error);
                }
            });
        }
    </script>

</body>

</html>